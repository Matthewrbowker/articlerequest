<?php

/**
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */

require ("vars/translate.php");

class TranslateTest extends PHPUnit_Framework_TestCase
{
    protected $translate;

    function setUp() {
        $this->translate = new Translate("en", "testpage" );
    }

    function tearDown() {
        $this->translate = NULL;
    }

    public function testAdd()
    {
        // $calculator = new vars\translate;

        // $result = $calculator->add(3, 4);

        $this->assertEquals($this->translate->_r("test1"), "TEST 1");
    }
}
