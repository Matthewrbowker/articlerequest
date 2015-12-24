<?php

/**
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */

class siteTest extends PHPUnit_Framework_TestCase
{
    private $s;

    function setUp() {
        $t = new Translate("en", "testpage" );
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
    }

    public function testClosing() {
        ob_start();
        $this->s->gen_closing();
        $string=strtolower(ob_get_contents());
        ob_end_clean();
        $this->assertContains("</body>", $string);
        $this->assertContains("</html>", $string);
    }
}
