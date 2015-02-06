<?php
/**
 * Bootstrap
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Tests;

use Kachit\Phalcon\Bootstrap;

class BootstrapTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Bootstrap
     */
    private $testable;

    /**
     * Set up
     */
    protected function setUp() {
        $this->testable = new Bootstrap([]);
    }

    public function testInitApplication() {
        $result = $this->testable->registerApplication();
        $this->assertInstanceOf('Phalcon\Mvc\Application', $result);
    }
}
