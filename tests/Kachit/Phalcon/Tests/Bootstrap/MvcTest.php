<?php
/**
 * Bootstrap
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Tests\Bootstrap;

use Kachit\Phalcon\Bootstrap\Mvc;

class McvTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Mvc
     */
    private $testable;

    /**
     * Set up
     */
    protected function setUp() {
        $this->testable = new Mvc($this->getTestableConfig());
    }

    public function testInitApplication() {
        $result = $this->testable->registerApplication();
        $this->assertInstanceOf('Phalcon\Mvc\Application', $result);
    }

    public function testGetDi() {
        $result = $this->testable->registerApplication()->getDI();
        $this->assertInstanceOf('Phalcon\DI\FactoryDefault', $result);
    }

    /**
     * @return array
     */
    protected function getTestableConfig() {
        return [
            'services' => [],
            'modules' => [],
        ];
    }
}
