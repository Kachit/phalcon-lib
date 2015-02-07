<?php
/**
 * Bootstrap
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Tests\Bootstrap;

use Kachit\Phalcon\Bootstrap\Cli;

class CliTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Cli
     */
    private $testable;

    /**
     * Set up
     */
    protected function setUp() {
        $this->testable = new Cli($this->getTestableConfig());
    }

    public function testInitApplication() {
        $result = $this->testable->registerApplication();
        $this->assertInstanceOf('Phalcon\CLI\Console', $result);
    }

    public function testGetDi() {
        $result = $this->testable->registerApplication()->getDI();
        $this->assertInstanceOf('Phalcon\DI\FactoryDefault\CLI', $result);
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
