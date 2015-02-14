<?php
/**
 * Class FactoryTest
 */
namespace Kachit\Phalcon\Tests\Cache\Frontend;

use Kachit\Phalcon\Cache\Frontend\Factory;

class FactoryTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Factory
     */
    private $testable;

    /**
     * Init
     */
    protected function setUp() {
        $this->testable = new Factory();
    }

    public function testGetAdapterOutput() {
        $result = $this->testable->getAdapter('Output', []);
        $this->assertInstanceOf('Phalcon\Cache\Frontend\Output', $result);
        $this->assertInstanceOf('Phalcon\Cache\FrontendInterface', $result);
    }

    public function testGetAdapterData() {
        $result = $this->testable->getAdapter('Data', []);
        $this->assertInstanceOf('Phalcon\Cache\Frontend\Data', $result);
        $this->assertInstanceOf('Phalcon\Cache\FrontendInterface', $result);
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Class "Phalcon\Cache\Frontend\Fake" is not exists
     */
    public function testGetAdapterFake() {
        $this->testable->getAdapter('Fake', []);
    }
}
