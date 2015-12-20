<?php

/**
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */

class fileLoaderTest extends PHPUnit_Framework_TestCase {
    protected $fl;

    function setUp() {
        $this->fl = new fileLoader();
    }

    function tearDown() {
        $this->fl = NULL;
    }

    public function testCheckMatches() {

        $this->assertEquals($this->fl->_r("test1"), "TEST 1");
        $this->assertEquals($this->fl->_r("test2"), "TEST 2");
        $this->assertEquals($this->fl->_r("test3"), "TEST 3");
        $this->assertEquals($this->fl->_r("test4"), NULL);

        // Testing they return the wrong values
        $this->assertNotEquals($this->fl->_r("test3"), "TEST 1");
        $this->assertNotEquals($this->fl->_r("test1"), "TEST 2");
        $this->assertNotEquals($this->fl->_r("test2"), "TEST 3");
        $this->assertNotEquals($this->fl->_r("test4"), "TEST 1");
    }

}
