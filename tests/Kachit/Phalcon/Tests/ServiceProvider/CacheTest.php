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

    /**
     * @var CacheTestable
     */
    private $testable;

    protected function setUp() {
        $this->getTester()->setTestableConfig($this->getTestableConfig());
        parent::setUp();
        $this->testable = new CacheTestable($this->getTester()->getDi());
    }

    public function testGetCacheAdapterBackend() {
        $result = $this->testable->getCacheAdapterBackend();
        $this->assertInstanceOf('Phalcon\Cache\BackendInterface', $result);
        $this->assertInstanceOf('Phalcon\Cache\Backend\File', $result);
    }

    public function testGetCacheAdapterFrontend() {
        $result = $this->testable->getCacheAdapterFrontend();
        $this->assertInstanceOf('Phalcon\Cache\FrontendInterface', $result);
        $this->assertInstanceOf('Phalcon\Cache\Frontend\Data', $result);
    }

    public function testRegister() {
        $this->testable->register();
        $this->assertTrue($this->getTester()->getDi()->has('cache'));
        $this->assertInstanceOf('Phalcon\Cache\Backend\File', $this->getTester()->getDi()->get('cache'));
        $this->assertInstanceOf('Phalcon\Cache\BackendInterface', $this->getTester()->getDi()->get('cache'));
    }

    /**
     * @return array
     */
    protected function getTestableConfig() {
        return [
            'cache' => [
                'frontend' => [
                    'adapter' => 'Data',
                ],
                'backend' => [
                    'adapter' => 'File',
                    'cacheDir' => TESTS_ROOT,
                ],
            ],
        ];
    }
}
