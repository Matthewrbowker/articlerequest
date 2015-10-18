<?php

/**
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */

require ("vars/translate.php");

class TranslateTest extends PHPUnit_Framework_TestCase
{
    protected $translate;
    protected $translateES;

    function setUp() {
        $this->translate = new Translate("en", "testpage" );
        $this->translateES = new Translate("es", "testpage" );
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
        $this->assertEquals($this->translate->_r("test4"), "{{test4}}");
    }

    public function testLangCode() {
        $this->assertContains("es", $this->translateES->_r("wp-page"));
    }

    public function testDev() {
        $GLOBALS["role"] = "staging";
        $this->assertContains("/dev", $this->translate->_r("wp-page"));
        $GLOBALS["role"] = "autotest";
        $this->assertNotContains("/dev", $this->translate->_r("wp-page"));
    }
}
