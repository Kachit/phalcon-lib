<?php
/**
 * CacheTest
 *
 * @author Kachit
 * @package Kachit\Phalcon\Tests\ServiceProvider
 */
namespace Kachit\Phalcon\Tests\ServiceProvider;

use Kachit\Phalcon\Testable\ServiceProvider\CacheTestable;

use Phalcon\DI;
use Phalcon\Config;

class CacheTest extends \PHPUnit_Framework_TestCase {

    private $testable;

    /**
     * @var DI
     */
    private $di;

    protected function setUp() {
        $this->testable = new CacheTestable($this->getTestableDi());
    }

    public function test() {

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
        return new Config(
            [
                'application' => [
                    'defaultModule' => 'foo',
                    'defaultNamespace' => 'bar',
                ],
                'router' => [
                    'removeExtraSlashes' => true,
                    'enableDefaultRoutes' => true,
                ],
            ]
        );
    }
}
