<?php
/**
 * AbstractModuleTest
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Tests\Mvc;

use Phalcon\DI;

use Kachit\Phalcon\Testable\Mvc\ModuleTestable;
use Kachit\Phalcon\Tester\PhpUnit\TestCase;

class AbstractModuleTest extends TestCase {

    /**
     * @var ModuleTestable
     */
    private $testable;

    /**
     * Init
     */
    protected function setUp() {
        $this->getTester()->setDi(DI::getDefault());
        $this->getTester()->setTestableConfig($this->getTestableConfig());
        parent::setUp();
        $this->testable = new ModuleTestable();
    }

    public function testGetLoader(){
        $result = $this->testable->getLoader();
        $this->assertInstanceOf('Phalcon\Loader', $result);
    }

    public function testGetModuleConfig(){
        $result = $this->testable->getModuleConfig();
        $this->assertInstanceOf('Phalcon\Config', $result);
        $this->assertEquals('bar', $result->application->foo);
        $this->assertEquals('bar', $result->module->services->foo);
    }

    public function testGetConfigPath() {
        $result = $this->testable->getConfigPath();
        $this->assertTrue(is_string($result));
        $this->assertFileExists($result);
    }

    /**
     * @return array
     */
    protected function getTestableConfig() {
        return ['application' => ['foo' => 'bar']];
    }
}
