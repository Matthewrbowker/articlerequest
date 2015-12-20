<?php

/**
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */

class siteTest extends PHPUnit_Framework_TestCase
{
    private $s;

    public function setUp() {
        ob_start();
        $t = new Translate("en", "testpage" );
        $string=strtolower(ob_get_contents());
        $this->s = new site($t);
        $string2=strtolower(ob_get_contents());
        ob_end_clean();
        $this->assertNotContains($string, "Unable to");
        $this->assertNotContains($string2, "KEY FILE BROKEN!");
    }

    public function tearDown() {
        $this->s = NULL;
    }

    public function testOpening() {
        ob_start();
        $this->s->gen_opening();
        $string=strtolower(ob_get_contents());
        ob_end_clean();
        $this->assertContains($string, "<html>");
        $this->assertContains($string, "<head>");
        $this->assertContains($string, "</head>");
        $this->assertContains($string, "<body>");
    }

    public function testClosing() {
        ob_start();
        $this->s->gen_closing();
        $string=strtolower(ob_get_contents());
        ob_end_clean();
        $this->assertContains($string, "</body>");
        $this->assertContains($string, "</html>");
    }
}
