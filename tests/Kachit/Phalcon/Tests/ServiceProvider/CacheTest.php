<?php
/**
 * CacheTest
 *
 * @author Kachit
 * @package Kachit\Phalcon\Tests\ServiceProvider
 */
namespace Kachit\Phalcon\Tests\ServiceProvider;

use Kachit\Phalcon\Testable\ServiceProvider\CacheTestable;
use Kachit\Phalcon\Tester\PhpUnit\TestCase;

class CacheTest extends TestCase {

    private $testable;

    protected function setUp() {
        $this->getTester()->setTestableConfig($this->getTestableConfig());
        parent::setUp();
        $this->testable = new CacheTestable($this->getTester()->getDi());
    }

    public function test() {

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
        ];
    }
}
