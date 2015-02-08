<?php
/**
 * Class AbstractBootstrapTest
 *
 * @package Kachit\Phalcon\Tests\Bootstrap
 */
namespace Kachit\Phalcon\Tests\Bootstrap;

use Kachit\Phalcon\Testable\Bootstrap\AbstractBootstrapTestable;

class AbstractBootstrapTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var AbstractBootstrapTestable
     */
    private $testable;

    /**
     * Init
     */
    protected function setUp() {
        $this->testable = new AbstractBootstrapTestable($this->getTestableConfig());
    }

    public function testGetModulesList() {
        $result = $this->testable->getModulesList();
        $expected = $this->getTestableConfig();
        $this->assertEquals($expected['modules'], $result);
    }

    public function testGetServicesList() {
        $result = $this->testable->getServicesList();
        $expected = $this->getTestableConfig();
        $this->assertEquals($expected['services'], $result);
    }

    public function testRegisterConfig() {
        $this->testable->registerConfig();
        $di = $this->testable->getDi();
        $expected = $this->getTestableConfig();
        $this->assertTrue($di->has('config'));
        $result = $di->get('config');
        $this->assertInstanceOf('Phalcon\Config', $result);
        $this->assertEquals($expected, $result->toArray());
    }

    public function testRegisterServiceProvider() {
        $this->testable->registerConfig();
        $this->testable->registerServiceProvider('volt');
        $di = $this->testable->getDi();
        $this->assertTrue($di->has('volt'));
    }

    /**
     * @return array
     */
    protected function getTestableConfig() {
        return [
            'services' => [
                'volt'
            ],
            'volt' => [],
            'modules' => [
                'frontend',
                'backend',
                'api',
            ],
        ];
    }
}
