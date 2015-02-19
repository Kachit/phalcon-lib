<?php
/**
 * AbstractModuleTest
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Tests\Mvc;

use Phalcon\DI;
use Phalcon\Config;

use Kachit\Phalcon\Testable\Mvc\ModuleTestable;

class AbstractModuleTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var DI
     */
    private $di;

    /**
     * @var ModuleTestable
     */
    private $testable;

    /**
     * Init
     */
    protected function setUp() {
        $this->getTestableDi();
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
     * @return DI
     */
    protected function getTestableDi() {
        if (empty($this->di)) {
            $di = DI::getDefault();
            $di->set('config', function() {
                return $this->getTestableConfig();
            });
            $this->di = $di;
        }
        return $this->di;
    }

    /**
     * @return Config
     */
    protected function getTestableConfig() {
        return new Config(['application' => ['foo' => 'bar']]);
    }
}
