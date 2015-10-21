<?php

/**
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */

require ("vars/translate.php");

class TranslateTest extends PHPUnit_Framework_TestCase
{
    protected $translate;
    protected $translateZYX;
    protected $translateSt;
    protected $translateLive;

    function setUp() {
        $this->translate = new Translate("en", "testpage" );
        $this->translateZYX = new Translate("zyx", "testpage" );

        /*
        // Dev
        $GLOBALS["role"] = "staging";
        $this->translateSt = new Translate("en", "testpage");

        // Live
        $GLOBALS["role"] = "live";
        $this->translateLive = new Translate("en", "testpage");

        $GLOBALS["role"] = "autotest";*/
    }

    function tearDown() {
        $this->translate = NULL;
    }

    public function testReturn() {

        // Testing that they return the correct values
        $this->assertEquals($this->translate->_r("test1"), "TEST 1");
        $this->assertEquals($this->translate->_r("test2"), "TEST 2");
        $this->assertEquals($this->translate->_r("test3"), "TEST 3");

        // Testing they return the wrong values
        $this->assertNotEquals($this->translate->_r("test3"), "TEST 1");
        $this->assertNotEquals($this->translate->_r("test1"), "TEST 2");
        $this->assertNotEquals($this->translate->_r("test2"), "TEST 3");

        // Test for an invalid key
        ob_start();
        $this->assertEquals($this->translate->_r("test4"), "{{test4}}");
        $string=ob_get_contents();
        ob_end_clean();
        print $string . "\r\n";
        $this->assertRegExp("/not found in the configuration file/", $string);
    }

    public function testLangCode() {
        $this->assertContains("zyx", $this->translateZYX->_r("wp-page"));
        $this->assertNotContains("zyx", $this->translate->_r("wp-page"));
    }

    public function testDev() {
        // $this->assertContains("/dev", $this->translateSt->_r("wp-page"));
        $this->assertNotContains("/dev", $this->translate->_r("wp-page"));
    }

    public function testKeys() {
        $_GET["keys"] = 1;
        $this->assertEquals($this->translate->_r("test1"), "{{test1}}");
        unset($_GET["keys"]);
    }

    public function testEcho() {
        ob_start();
        $this->translate->_e("test1");
        $string=ob_get_contents();
        ob_end_clean();
        $this->assertEquals($this->translate->_r("test1"), $string);
    }

    public function testError() {

        //$this->markTestIncomplete("Test not implemented");
        $errorString = "This is a test Error Message";
        $expectedString = "Error: $errorString";
        ob_start();
        $this->translate->errorMessage($errorString);
        $string=ob_get_contents();
        ob_end_clean();
        $this->assertContains($expectedString, $string);
        $this->assertContains("<TITLE>
$errorString
</TITLE>", $string);
    }
}
