<?php
/**
 * Class AbstractFactoryTest
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Tests\Common\Factory;

use Kachit\Phalcon\Testable\Common\Factory\AbstractFactoryTestable;

class AbstractFactoryTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var AbstractFactoryTestable
     */
    private $testable;

    /**
     * Init
     */
    protected function setUp() {
        $this->testable = new AbstractFactoryTestable();
    }

    public function testFilterClassName() {
        $result = $this->testable->filterClassName('foo ');
        $this->assertEquals('Foo', $result);
    }

    public function testCheckClassExistsValid() {
        $result = $this->testable->checkClassExists('Phalcon\Mvc\Application');
        $this->assertTrue($result);
    }

    public function testCheckClassExistsInvalid() {
        $result = $this->testable->checkClassExists('Phalcon\Mvc\Application\Bad');
        $this->assertFalse($result);
    }

    public function testCreateObject() {
        $result = $this->testable->createObject('Phalcon\Mvc\Application');
        $this->assertInstanceOf('Phalcon\Mvc\Application', $result);
    }

    public function testLoadClassValid() {
        $result = $this->testable->loadClass('Phalcon\Mvc\Application');
        $this->assertInstanceOf('Phalcon\Mvc\Application', $result);
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Class "Phalcon\Mvc\Foo" is not exists
     */
    public function testLoadClassInValid() {
        $this->testable->loadClass('Phalcon\Mvc\Foo');
    }

    public function testGenerateClassName() {
        $result = $this->testable->generateClassName('bar');
        $this->assertEquals('Foo\Bar', $result);
    }

    public function testGenerateClassNameWithSuffix() {
        $this->testable->setClassSuffix('Test');
        $result = $this->testable->generateClassName('bar');
        $this->assertEquals('Foo\BarTest', $result);
    }
}