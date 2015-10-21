<?php

/**
 * Created by PhpStorm.
 * User: Matthew
 * Date: 10/19/15
 * Time: 11:04
 */

require ("vars/fileLoader.php");

class fileLoaderTest extends PHPUnit_Framework_TestCase
{
    protected $fl;

    function setUp() {
        $this->fl = new fileLoader();
    }

    function tearDown() {
        $this->fl = NULL;
    }

}
