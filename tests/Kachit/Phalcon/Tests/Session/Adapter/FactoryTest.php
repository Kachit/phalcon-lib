<?php
/**
 * Class FactoryTest
 */
namespace Kachit\Phalcon\Tests\Session\Adapter;

use Kachit\Phalcon\Session\Adapter\Factory;

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

    public function testGetAdapterFiles() {
        $result = $this->testable->getAdapter('files');
        $this->assertInstanceOf('Phalcon\Session\Adapter\Files', $result);
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Class "Phalcon\Session\Adapter\Fake" is not exists
     */
    public function testGetAdapterNotFound() {
        $this->testable->getAdapter('fake');
    }
}
