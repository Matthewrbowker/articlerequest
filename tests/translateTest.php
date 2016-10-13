<?php
/**
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */

class TranslateTest extends PHPUnit_Framework_TestCase
{
    protected $translate;
    protected $translateZYX;
    protected $translateSt;
    protected $translateLive;

    function setUp() {
        $this->markTestSkipped("Class was rewritten, skipping test for now");
        $this->translate = new Translate("en", "test" );
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
        $this->assertRegExp("/not found in the configuration file/", $string);
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
}
