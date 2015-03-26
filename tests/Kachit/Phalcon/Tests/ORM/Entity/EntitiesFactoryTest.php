<?php
/**
 * Class EntitiesFactoryTest
 */
namespace Kachit\Phalcon\Test\ORM\Entity;

use Kachit\Phalcon\ORM\Entity\EntitiesFactory;

class EntitiesFactoryTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var EntitiesFactory
     */
    private $testable;

    /**
     * Init
     */
    protected function setUp() {
        $this->testable = new EntitiesFactory();
    }

    /**
     * Init
     */
    public function testGetObjectValid() {
        $entityName = 'Kachit\Phalcon\Testable\ORM\Entity\EntityTestable';
        $result = $this->testable->getObject($entityName);
        $this->assertInstanceOf($entityName, $result);
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Class "Kachit\Phalcon\Model\Foo" is not exists
     */
    public function testGetObjectInvalid() {
        $entityName = 'Kachit\Phalcon\Model\Foo';
        $this->testable->getObject($entityName);
    }
}
