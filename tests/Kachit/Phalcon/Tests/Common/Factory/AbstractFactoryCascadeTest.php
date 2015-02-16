<?php
/**
 * Class AbstractFactoryCascadeTest
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Tests\Common\Factory;

use Kachit\Phalcon\Testable\Common\Factory\AbstractFactoryCascadeTestable;

class AbstractFactoryCascadeTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var AbstractFactoryCascadeTestable
     */
    private $testable;

    /**
     * Init
     */
    protected function setUp() {
        $this->testable = new AbstractFactoryCascadeTestable();
    }

    public function testLoadClassValid() {
        $result = $this->testable->loadClass('Phalcon\Mvc\Application');
        $this->assertInstanceOf('Phalcon\Mvc\Application', $result);
    }

    public function testLoadClassInValid() {
        $result = $this->testable->loadClass('Phalcon\Mvc\Foo');
        $this->assertFalse($result);
    }

    public function testGetObjectCascadeFirst() {
        $namespaces = [
            'Kachit\Phalcon\Cache\Backend',
            'Kachit\Phalcon\Cache\Boo',
        ];
        $this->testable->setNamespaces($namespaces);
        $result = $this->testable->getObject('Factory');
        $this->assertInstanceOf('Kachit\Phalcon\Cache\Backend\Factory', $result);
    }

    public function testGetObjectCascadeSecond() {
        $namespaces = [
            'Kachit\Phalcon\Cache\Boo',
            'Kachit\Phalcon\Cache\Backend',
        ];
        $this->testable->setNamespaces($namespaces);
        $result = $this->testable->getObject('Factory');
        $this->assertInstanceOf('Kachit\Phalcon\Cache\Backend\Factory', $result);
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Class "Factory" is not exists in this namespaces ["Kachit\\Phalcon\\Cache\\Boo","Kachit\\Phalcon\\Cache\\Bar"]
     */
    public function testGetObjectCascadeInvalid() {
        $namespaces = [
            'Kachit\Phalcon\Cache\Boo',
            'Kachit\Phalcon\Cache\Bar',
        ];
        $this->testable->setNamespaces($namespaces);
        $this->testable->getObject('Factory');
    }
}
