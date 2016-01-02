<?php

/**
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */

class exceptionTest extends PHPUnit_Framework_TestCase
{
    private $ex;

    public function setUp() {
        try {
            throw new arException("This is a test message");
        }
        catch (arException $ex) {
            $this->ex = $ex;
        }
    }

    public function testRenderBanner() {
        ob_start();
        $this->ex->renderHTML();
        $string=strtolower(ob_get_contents());
        ob_end_clean();
        $this->assertContains("<div class=\"alert alert-danger\">", $string);
        $this->assertContains("this is a test message", $string);

    }

    public function testRenderHTML() {
        ob_start();
        $this->ex->renderHTML();
        $string=strtolower(ob_get_contents());
        ob_end_clean();
        $this->assertContains("this is a test message", $string);
        $this->assertContains("<html>", $string);
        $this->assertContains("<head>", $string);
        $this->assertContains("</head>", $string);
        $this->assertContains("<body>", $string);
        $this->assertContains("<pre>", $string);
        $this->assertContains("exceptiontest->setup()", $string);
        $this->assertContains("<a href='https://phabricator.wikimedia.org/maniphest/task/create/?", $string);
    }

}
