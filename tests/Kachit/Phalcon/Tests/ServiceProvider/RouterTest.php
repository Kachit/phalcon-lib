<?php
/**
 * RouterTest
 *
 * @author Kachit
 * @package Kachit\Phalcon\Tests\ServiceProvider
 */
namespace Kachit\Phalcon\Tests\ServiceProvider;

use Kachit\Phalcon\Testable\ServiceProvider\RouterTestable;

use Phalcon\DI;
use Phalcon\Config;

class RouterTest extends \PHPUnit_Framework_TestCase {

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
        $this->di = $this->getTestableDi();
        $this->testable = new RouterTestable($this->di);
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
    }

    /**
     * @return DI
     */
    protected function getTestableDi() {
        if (empty($this->di)) {
            $di = new DI();
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
        return new Config(['volt' => []]);
    }
}
