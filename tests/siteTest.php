<?php

/**
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */

class siteTest extends PHPUnit_Framework_TestCase
{
    private $s;

    function setUp() {
        $t = new Translate("en", "Testpage" );
        $this->s = new site($t);
    }

    public function tearDown() {
        $this->s = NULL;
    }

    public function testOpening() {
        ob_start();
        $this->s->gen_opening();
        $string=strtolower(ob_get_contents());
        ob_end_clean();
        $this->assertNotContains("unable to", $string);
        $this->assertNotContains("key file broken!", $string);
        $this->assertContains("<html>", $string);
        $this->assertContains("<head>", $string);
        $this->assertContains("</head>", $string);
        $this->assertContains("<body", $string);
        // Nothing is going to be active, as everything is "off"
        $this->assertNotContains ("class='active'", $string);
    }

    public function testClosing() {
        ob_start();
        $this->s->gen_closing();
        $string=strtolower(ob_get_contents());
        ob_end_clean();
        $this->assertContains("</body>", $string);
        $this->assertContains("</html>", $string);
    }

    public function testInvalidKeyFile() {
        try {
            new site(NULL, "testpage");
        }

        catch (arException $expected) {
            return;
        }

        $this->fail('An expected exception has not been raised.');

    }
}
