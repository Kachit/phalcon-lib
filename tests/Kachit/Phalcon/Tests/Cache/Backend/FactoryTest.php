<?php
/**
 * Class FactoryTest
 */
namespace Kachit\Phalcon\Tests\Cache\Backend;

use Kachit\Phalcon\Cache\Backend\Factory as FactoryBackend;
use Kachit\Phalcon\Cache\Frontend\Factory as FactoryFrontend;

use Phalcon\Cache\FrontendInterface;

class FactoryTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var FactoryBackend
     */
    private $testable;

    /**
     * @var FrontendInterface
     */
    private $frontendAdapter;

    /**
     * Init
     */
    protected function setUp() {
        $this->testable = new FactoryBackend();
        $factory = new FactoryFrontend();
        $this->frontendAdapter = $factory->getAdapter('Data', []);
    }

    public function testGetAdapterFile() {
        $result = $this->testable->getAdapter('File', $this->frontendAdapter, $this->getCacheOptions());
        $this->assertInstanceOf('Phalcon\Cache\Backend\File', $result);
        $this->assertInstanceOf('Phalcon\Cache\BackendInterface', $result);
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Class "Phalcon\Cache\Backend\Fake" is not exists
     */
    public function testGetAdapterFake() {
        $this->testable->getAdapter('Fake', $this->frontendAdapter, $this->getCacheOptions());
    }

    /**
     * @return array
     */
    protected function getCacheOptions() {
        return [
            'cacheDir' => __DIR__
        ];
    }
}
