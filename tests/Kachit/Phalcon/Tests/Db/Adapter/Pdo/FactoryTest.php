<?php
/**
 * Class FactoryTest
 */
namespace Kachit\Phalcon\Tests\Db\Adapter\Pdo;

use Kachit\Phalcon\Db\Adapter\Pdo\Factory;

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

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Class "Phalcon\Db\Adapter\Pdo\Fake" is not exists
     */
    public function testGetAdapterFake() {
        $this->testable->getAdapter('Fake', []);
    }
}
