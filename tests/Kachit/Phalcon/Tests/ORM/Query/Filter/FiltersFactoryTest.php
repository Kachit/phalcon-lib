<?php
/**
 * Class FiltersFactoryTest
 */
namespace Kachit\Phalcon\Test\ORM\Query\Filter;

use Kachit\Phalcon\ORM\Query\Filter\FiltersFactory;

class FiltersFactoryTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var FiltersFactory
     */
    private $testable;

    /**
     * Init
     */
    protected function setUp() {
        $this->testable = new FiltersFactory();
    }

    /**
     * Init
     */
    public function testGetObjectValid() {
        $entityName = 'Kachit\Phalcon\Testable\ORM\Query\Filter\FilterTestable';
        $result = $this->testable->getObject($entityName);
        $this->assertInstanceOf($entityName, $result);
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Class "Kachit\Phalcon\Filter\Foo" is not exists
     */
    public function testGetObjectInvalid() {
        $entityName = 'Kachit\Phalcon\Filter\Foo';
        $this->testable->getObject($entityName);
    }
}
