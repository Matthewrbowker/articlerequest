<?php
/*
	Copyright (c) 2015-2017, Maximilian Doerr
*/

/**
 * @file
 * OAuth object
 * @author Maximilian Doerr (Cyberpower678)
 * @license https://www.gnu.org/licenses/gpl.txt
 * @copyright Copyright (c) 2015-2017, Maximilian Doerr
 */
/**
 * OAuth class
 * OAuth manager of the web interface and API handler.
 * @author Maximilian Doerr (Cyberpower678)
 * @license https://www.gnu.org/licenses/gpl.txt
 * @copyright Copyright (c) 2015-2017, Maximilian Doerr
 */

date_default_timezone_set( "UTC" );

class OAuth {

    protected $sessionOpen = false;

    protected $OAuthErrorMessage = false;

    public function __construct() {
        $this->sessionStart();

        //If we have a callback, it probably means the user approved the application, so let's finish authorization by getting the access token.
        if( isset( $_GET['oauth_verifier'] ) && $_GET['oauth_verifier'] ) {
            if( !$this->getAccessToken() ) return;
        }

        if( isset( $_SESSION['accesstokenKey'] ) && isset( $_SESSION['accesstokenSecret'] ) &&
            !isset( $_SESSION['username'] )
        ) {
            if( $this->identify() ) {
                $_SESSION['auth_time'] = time();
                $_SESSION['csrf'] =
                    md5( md5( $_SESSION['auth_time'] . CONSUMERKEY . CONSUMERSECRET ) . $_SESSION['username'] .
                        $_SESSION['auth_time']
                    );
                $_SESSION['wiki'] = WIKIPEDIA;
            }
            if( !isset( $_SESSION['checksum'] ) ) $this->createChecksumToken();
        }

        if( $this->isLoggedOn()
        ) {
            define( 'ACCESSTOKEN', $_SESSION['accesstokenKey'] );
            define( 'ACCESSSECRET', $_SESSION['accesstokenSecret'] );
            define( 'USERNAME', $_SESSION['username'] );
        }
    }

    public function sessionStart() {
        session_name( "IABotManagementConsole" );
        $cookie_life = "30 days";
        session_set_cookie_params( strtotime( $cookie_life ) - time(), dirname( $_SERVER['SCRIPT_NAME'] ) );
        session_start();
        $this->sessionOpen = true;
        setcookie( session_name(), session_id(), strtotime( $cookie_life ), dirname( $_SERVER['SCRIPT_NAME'] ) );
        if( file_exists( 'testSession' ) ) $_SESSION = unserialize( file_get_contents( 'testSession' ) );
    }

    private function getAccessToken() {
        $url = OAUTH . '/token';
        $url .= strpos( $url, '?' ) ? '&' : '?';
        $url .= http_build_query( [
                'format'                 => 'json',
                'oauth_verifier'         => $_GET['oauth_verifier'],

                // OAuth information
                'oauth_consumer_key'     => CONSUMERKEY,
                'oauth_token'            => $_SESSION['requesttokenKey'],
                'oauth_version'          => '1.0',
                'oauth_nonce'            => md5( microtime() . mt_rand() ),
                'oauth_timestamp'        => time(),

                // We're using secret key signatures here.
                'oauth_signature_method' => 'HMAC-SHA1',
            ]
        );
        $signature = $this->generateSignature( 'GET', $url );
        $url .= "&oauth_signature=" . urlencode( $signature );
        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_URL, $url );
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch, CURLOPT_USERAGENT, USERAGENT );
        curl_setopt( $ch, CURLOPT_HEADER, 0 );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
        $data = curl_exec( $ch );

        if( !$data ) {
            $this->OAuthErrorMessage = 'Curl error: ' . htmlspecialchars( curl_error( $ch ) );

            return false;
        }
        curl_close( $ch );
        $token = json_decode( $data );
        if( is_object( $token ) && isset( $token->error ) ) {
            $this->OAuthErrorMessage = 'Error retrieving token: ' . htmlspecialchars( $token->message );
            $this->clearTokens();

            return false;
        }
        if( !is_object( $token ) || !isset( $token->key ) || !isset( $token->secret ) ) {
            $this->OAuthErrorMessage = 'Invalid response from token request';

            return false;
        }

        // Save the access token
        $_SESSION['accesstokenKey'] = $token->key;
        $_SESSION['accesstokenSecret'] = $token->secret;

        return true;
    }

    private function generateSignature( $method, $url, $params = [] ) {
        $parts = parse_url( $url );

        // We need to normalize the endpoint URL
        $scheme = isset( $parts['scheme'] ) ? $parts['scheme'] : 'http';
        $host = isset( $parts['host'] ) ? $parts['host'] : '';
        $port = isset( $parts['port'] ) ? $parts['port'] : ( $scheme == 'https' ? '443' : '80' );
        $path = isset( $parts['path'] ) ? $parts['path'] : '';
        if( ( $scheme == 'https' && $port != '443' ) ||
            ( $scheme == 'http' && $port != '80' )
        ) {
            // Only include the port if it's not the default
            $host = "$host:$port";
        }

        // Also the parameters
        $pairs = [];
        parse_str( isset( $parts['query'] ) ? $parts['query'] : '', $query );
        $query += $params;
        unset( $query['oauth_signature'] );
        if( $query ) {
            $query = array_combine(
            // rawurlencode follows RFC 3986 since PHP 5.3
                array_map( 'rawurlencode', array_keys( $query ) ),
                array_map( 'rawurlencode', array_values( $query ) )
            );
            ksort( $query, SORT_STRING );
            foreach( $query as $k => $v ) {
                $pairs[] = "$k=$v";
            }
        }

        $toSign = rawurlencode( strtoupper( $method ) ) . '&' .
            rawurlencode( "$scheme://$host$path" ) . '&' .
            rawurlencode( join( '&', $pairs ) );
        $key = rawurlencode( CONSUMERSECRET ) . '&' .
            rawurlencode( ( isset( $_SESSION['accesstokenSecret'] ) ? $_SESSION['accesstokenSecret'] :
                ( isset( $_SESSION['requesttokenSecret'] ) ? $_SESSION['requesttokenSecret'] : "" ) )
            );

        return base64_encode( hash_hmac( 'sha1', $toSign, $key, true ) );
    }

    public function clearTokens() {
        if( isset( $_SESSION['requesttokenKey'] ) ) unset( $_SESSION['requesttokenKey'] );
        if( isset( $_SESSION['requesttokenSecret'] ) ) unset( $_SESSION['requesttokenSecret'] );
        if( isset( $_SESSION['accesstokenKey'] ) ) unset( $_SESSION['accesstokenKey'] );
        if( isset( $_SESSION['accesstokenSecret'] ) ) unset( $_SESSION['accesstokenSecret'] );
    }

    private function identify( $arguments = false ) {
        $url = OAUTH . '/identify';

        if( $arguments && isset( $arguments['oauth_consumer_key'] ) && isset( $arguments['oauth_token'] ) &&
            isset( $arguments['oauth_version'] ) && isset( $arguments['oauth_nonce'] ) &&
            isset( $arguments['oauth_timestamp'] ) && isset( $arguments['oauth_signature'] )
        ) {
            $headerArr = [
                // OAuth information
                'oauth_consumer_key'     => $arguments['oauth_consumer_key'],
                'oauth_token'            => $arguments['oauth_token'],
                'oauth_version'          => $arguments['oauth_version'],
                'oauth_nonce'            => $arguments['oauth_nonce'],
                'oauth_timestamp'        => $arguments['oauth_timestamp'],
                'oauth_signature_method' => 'HMAC-SHA1',
                'oauth_signature'        => $arguments['oauth_signature']
            ];
        } elseif( $arguments ) {
            $this->OAuthErrorMessage = 'Missing argument detected while attempting to identify';
        } else {
            $headerArr = [
                // OAuth information
                'oauth_consumer_key'     => CONSUMERKEY,
                'oauth_token'            => $_SESSION['accesstokenKey'],
                'oauth_version'          => '1.0',
                'oauth_nonce'            => md5( microtime() . mt_rand() ),
                'oauth_timestamp'        => time(),

                // We're using secret key signatures here.
                'oauth_signature_method' => 'HMAC-SHA1',
            ];
            $signature = $this->generateSignature( 'GET', $url, $headerArr );
            $headerArr['oauth_signature'] = $signature;
        }

        $header = [];
        foreach( $headerArr as $k => $v ) {
            $header[] = rawurlencode( $k ) . '="' . rawurlencode( $v ) . '"';
        }
        $header = 'Authorization: OAuth ' . join( ', ', $header );

        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_URL, $url );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, [ $header ] );
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch, CURLOPT_USERAGENT, USERAGENT );
        curl_setopt( $ch, CURLOPT_HEADER, 0 );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
        $data = curl_exec( $ch );
        if( !$data ) {
            $this->OAuthErrorMessage = 'Curl error: ' . htmlspecialchars( curl_error( $ch ) );

            return false;
        }
        $err = json_decode( $data );
        if( is_object( $err ) && isset( $err->error ) && $err->error === 'mwoauthdatastore-access-token-not-found' ) {
            // We're not authorized!
            $this->OAuthErrorMessage = "Missing authorization or authorization failed";
            $this->clearTokens();

            return false;
        }

        // There are three fields in the response
        $fields = explode( '.', $data );
        if( count( $fields ) !== 3 ) {
            $this->OAuthErrorMessage = 'Invalid identify response: ' . htmlspecialchars( $data );
            $this->clearTokens();

            return false;
        }

        // Validate the header. MWOAuth always returns alg "HS256".
        $header = base64_decode( strtr( $fields[0], '-_', '+/' ), true );
        if( $header !== false ) {
            $header = json_decode( $header );
        }
        if( !is_object( $header ) || $header->typ !== 'JWT' || $header->alg !== 'HS256' ) {
            $this->OAuthErrorMessage = 'Invalid header in identify response: ' . htmlspecialchars( $data );
            $this->clearTokens();

            return false;
        }

        // Verify the signature
        $sig = base64_decode( strtr( $fields[2], '-_', '+/' ), true );
        $check = hash_hmac( 'sha256', $fields[0] . '.' . $fields[1], CONSUMERSECRET, true );
        if( $sig !== $check ) {
            $this->OAuthErrorMessage = 'JWT signature validation failed: ' . htmlspecialchars( $data );
            $this->clearTokens();

            return false;
        }

        // Decode the payload
        $payload = base64_decode( strtr( $fields[1], '-_', '+/' ), true );
        if( $payload !== false ) {
            $payload = json_decode( $payload );
        }
        if( !is_object( $payload ) ) {
            $this->OAuthErrorMessage = 'Invalid payload in identify response: ' . htmlspecialchars( $data );
            $this->clearTokens();

            return false;
        }

        $_SESSION['username'] = $payload->username;
        $_SESSION['userid'] = $payload->sub;
        $_SESSION['registered'] = strtotime( $payload->registered );
        $_SESSION['usergroups'] = $payload->groups;
        $_SESSION['userrights'] = $payload->rights;
        $_SESSION['blocked'] = $payload->blocked;
        $_SESSION['editcount'] = $payload->editcount;

        return true;
    }

    public function createChecksumToken() {
        $_SESSION['checksum'] = md5( md5( time() . CONSUMERKEY . CONSUMERSECRET ) . $_SESSION['username'] .
            $_SESSION['auth_time'] . time()
        );
    }

    public function isLoggedOn() {
        if( isset( $_SESSION['username'] ) && isset( $_SESSION['csrf'] ) && isset( $_SESSION['auth_time'] ) &&
            isset( $_SESSION['usergroups'] ) && isset( $_SESSION['wiki'] )
        ) {
            if( $_SESSION['csrf'] ===
                md5( md5( $_SESSION['auth_time'] . CONSUMERKEY . CONSUMERSECRET ) . $_SESSION['username'] .
                    $_SESSION['auth_time']
                )
            ) {
                if( $_SESSION['wiki'] == WIKIPEDIA ) return true;
                else {
                    if( $this->identify() ) {
                        $_SESSION['wiki'] = WIKIPEDIA;

                        return true;
                    } else return false;
                }
            } else return false;
        } else return false;
    }

    public function authenticate() {
        //reqeust a request token
        if( !$this->getRequestToken() ) {
            return false;
        }
        // Then we send the user off to authorize
        $url = OAUTH . '/authorize';
        $url .= strpos( $url, '?' ) ? '&' : '?';
        $url .= http_build_query( [
                'oauth_token'        => $_SESSION['requesttokenKey'],
                'oauth_consumer_key' => CONSUMERKEY,
            ]
        );
        header( "Location: $url" );

        return true;
    }

    private function getRequestToken() {
        $this->requestTokenSecret = '';
        $url = OAUTH . '/initiate';
        $url .= strpos( $url, '?' ) ? '&' : '?';
        $url .= http_build_query( [
                'format'                 => 'json',

                // OAuth information
                'oauth_callback'         => 'oob', // Must be "oob" for MWOAuth
                'oauth_consumer_key'     => CONSUMERKEY,
                'oauth_version'          => '1.0',
                'oauth_nonce'            => md5( microtime() . mt_rand() ),
                'oauth_timestamp'        => time(),

                // We're using secret key signatures here.
                'oauth_signature_method' => 'HMAC-SHA1',
            ]
        );
        $signature = $this->generateSignature( 'GET', $url );
        $url .= "&oauth_signature=" . urlencode( $signature );
        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_URL, $url );
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch, CURLOPT_USERAGENT, USERAGENT );
        curl_setopt( $ch, CURLOPT_HEADER, 0 );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
        $data = curl_exec( $ch );
        if( !$data ) {
            $this->OAuthErrorMessage = 'Curl error: ' . htmlspecialchars( curl_error( $ch ) );

            return false;
        }
        curl_close( $ch );
        $token = json_decode( $data );
        if( is_object( $token ) && isset( $token->error ) ) {
            $this->OAuthErrorMessage = 'Error retrieving token: ' . htmlspecialchars( $token->error ) . print_r(json_decode($data, true));
            $this->clearTokens();

            return false;
        }
        if( !is_object( $token ) || !isset( $token->key ) || !isset( $token->secret ) ) {
            $this->OAuthErrorMessage = 'Invalid response from token request';

            return false;
        }

        // Now we have the request token, we need to save it for later.
        $_SESSION['requesttokenKey'] = $token->key;
        $_SESSION['requesttokenSecret'] = $token->secret;

        return true;
    }

    public function isBot() {
        if( isset( $_SESSION['usergroups'] ) ) return in_array( "bot", $_SESSION['usergroups'] );
        else return false;
    }

    public function logout() {
        session_unset();
        session_destroy();
        setcookie( session_name(), '', 0, '/' );
        session_regenerate_id( true );
    }

    public function getUsername() {
        if( isset( $_SESSION['username'] ) ) return $_SESSION['username'];
        else return false;
    }

    public function getUserID() {
        if( isset( $_SESSION['userid'] ) ) return $_SESSION['userid'];
        else return false;
    }

    public function getWiki() {
        if( isset( $_SESSION['wiki'] ) ) return $_SESSION['wiki'];
        else return "enwiki";
    }

    public function getRegistrationEpoch() {
        if( isset( $_SESSION['registered'] ) ) return $_SESSION['registered'];
        else return false;
    }

    public function getAuthTimeEpoch() {
        if( isset( $_SESSION['auth_time'] ) ) return $_SESSION['auth_time'];
        else return false;
    }

    public function getCSRFToken() {
        if( isset( $_SESSION['csrf'] ) ) return $_SESSION['csrf'];
        else return false;
    }

    public function getGroupRights() {
        if( isset( $_SESSION['usergroups'] ) ) return $_SESSION['usergroups'];
        else return false;
    }

    public function getRights() {
        if( isset( $_SESSION['userrights'] ) ) return $_SESSION['userrights'];
        else return false;
    }

    public function isBlocked() {
        if( isset( $_SESSION['blocked'] ) ) return $_SESSION['blocked'];
        else return false;
    }

    public function getEditCount() {
        if( isset( $_SESSION['editcount'] ) ) return $_SESSION['editcount'];
        else return false;
    }

    public function storeArguments() {
        $_SESSION['post'] = $_POST;
        $_SESSION['get'] = $_GET;
    }

    public function recallArguments() {
        $_POST = $_SESSION['post'];
        $_GET = $_SESSION['get'];
    }

    public function mergeArguments( $clearSession = false ) {
        if( isset( $_SESSION['post'] ) && isset( $_POST ) ) $_SESSION['post'] =
        $_POST = array_merge( $_SESSION['post'], $_POST );
        elseif( isset( $_SESSION['post'] ) ) $_POST = $_SESSION['post'];
        elseif( isset( $_POST ) ) $_SESSION['post'] = $_POST;

        if( isset( $_SESSION['get'] ) && isset( $_GET ) ) $_SESSION['get'] =
        $_GET = array_merge( $_SESSION['get'], $_GET );
        elseif( isset( $_SESSION['get'] ) ) $_GET = $_SESSION['get'];
        elseif( isset( $_GET ) ) $_SESSION['get'] = $_GET;

        if( $clearSession === true ) {
            if( isset( $_SESSION['get'] ) ) unset( $_SESSION['get'] );
            if( isset( $_SESSION['post'] ) ) unset( $_SESSION['post'] );
        }
    }

    public function getOAuthError() {
        return $this->OAuthErrorMessage;
    }

    public function getChecksumToken() {
        if( !isset( $_SESSION['checksum'] ) ) {
            if( $this->isLoggedOn() ) $this->createChecksumToken();
            else return false;
        }

        return $_SESSION['checksum'];
    }

    public function __destruct() {
        $this->sessionClose();
    }

    public function sessionClose() {
        if( $this->sessionOpen === true ) session_write_close();
        $this->sessionOpen = false;
    }
}