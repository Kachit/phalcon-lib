<?php
/**
 * RouterTest
 *
 * @author Kachit
 * @package Kachit\Phalcon\Tests\ServiceProvider
 */
namespace Kachit\Phalcon\Tests\ServiceProvider;

use Kachit\Phalcon\Testable\ServiceProvider\RouterTestable;
use Kachit\Phalcon\Tester\PhpUnit\TestCase;

use Phalcon\DI;
use Phalcon\Config;
use Phalcon\Mvc\Router;

class RouterTest extends TestCase {

    /**
     * @var RouterTestable
     */
    private $testable;

    /**
     * @var DI
     */
    private $di;

    /**
     * Init
     */
    protected function setUp() {
        parent::setUp();
        $this->getTester()->setTestableConfig($this->getTestableConfig());
        $this->di = $this->getTester()->getDi();
        $this->testable = new RouterTestable($this->di);
    }

    public function testGetRoutesFile() {
        $result = $this->testable->getRoutesFile($this->getTestableFile('routes.php'));
        $this->assertTrue(is_array($result));
        $this->assertArrayHasKey('routes', $result);
        $this->assertArrayHasKey('groups', $result);
    }

    public function testGetDefaultRoutes() {
        /* @var Router $router */
        $router = $this->testable->getRouter();
        $this->assertNotEmpty($router->getRoutes());
        $this->assertTrue(is_array($router->getRoutes()));
        $this->assertCount(2, $router->getRoutes());
    }

    public function testRegister() {
        $this->testable->register();
        /* @var Router $router */
        $router = $this->di->get('router');
        $this->assertInstanceOf('Phalcon\Mvc\Router', $router);
        $this->assertEquals('bar', $router->getDefaultNamespace());
        $this->assertEquals('foo', $router->getDefaultModule());
        $this->assertNotEmpty($router->getRoutes());
        $this->assertTrue(is_array($router->getRoutes()));
        $this->assertCount(8, $router->getRoutes());
    }

    public function testRegisterRoutes() {
        $this->testable->registerRoutes();
        /* @var Router $router */
        $router = $this->testable->getRouter();
        $this->assertFalse($this->di->has('router'));
        $this->assertNotEmpty($router->getRoutes());
        $this->assertTrue(is_array($router->getRoutes()));
        $this->assertCount(8, $router->getRoutes());
        $this->assertInstanceOf('Phalcon\Mvc\Router\Route', $router->getRouteByName('fifi'));
        $this->assertInstanceOf('Phalcon\Mvc\Router\Route', $router->getRouteByName('get-all'));
    }

    public function testRegisterModuleRoutes() {
        $routes = $this->testable->getRoutesFile($this->getTestableFile('routes.php'));
        $this->testable->registerModuleRoutes($routes);
        /* @var Router $router */
        $router = $this->testable->getRouter();
        $this->assertNotEmpty($router->getRoutes());
        $this->assertTrue(is_array($router->getRoutes()));
        $this->assertInstanceOf('Phalcon\Mvc\Router\Route', $router->getRouteByName('fifi'));
        $this->assertFalse($router->getRouteByName('get-all'));
    }

    public function testRegisterModuleRouteGroups() {
        $routes = $this->testable->getRoutesFile($this->getTestableFile('routes.php'));
        $this->testable->registerModuleRouteGroups($routes);
        /* @var Router $router */
        $router = $this->testable->getRouter();
        $this->assertNotEmpty($router->getRoutes());
        $this->assertTrue(is_array($router->getRoutes()));
        $this->assertInstanceOf('Phalcon\Mvc\Router\Route', $router->getRouteByName('get-all'));
        $this->assertFalse($router->getRouteByName('fifi'));
    }

    public function testRegisterRoutesGroup() {
        $routes = $this->testable->getRoutesFile($this->getTestableFile('routes.php'));
        $result = $this->testable->registerRoutesGroup($routes['groups'][0]);
        $this->assertInstanceOf('Phalcon\Mvc\Router\Group', $result);
        $this->assertEquals('api', $result->getName());
        $this->assertEquals('/api', $result->getPrefix());
    }

    public function testRegisterRoute() {
        $params = [
            'pattern' => '/:controller/:action/:int',
            'params' => [
                'controller' => 'foo',
                'action' => 'bar',
            ],
        ];
        $result = $this->testable->registerRoute($params);
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf('Phalcon\Mvc\Router\Route', $result);
        $this->assertEquals('/:controller/:action/:int', $result->getPattern());
    }

    /**
     * @return array
     */
    protected function getTestableConfig() {
        return [
            'application' => [
                'defaultModule' => 'foo',
                'defaultNamespace' => 'bar',
            ],
            'router' => [
                'removeExtraSlashes' => true,
                'enableDefaultRoutes' => true,
            ],
            'modules' => [
                'foo' => [
                    'routes' => $this->getTestableFile('routes.php'),
                ],
            ]
        ];
    }

    /**
     * Get testable filename
     *
     * @param string $fileName
     * @return string
     */
    protected function getTestableFile($fileName) {
        return TESTS_ROOT . '/stubs/router/' . $fileName;
    }
}
