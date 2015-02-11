<?php
/**
 * Class AbstractFactoryTest
 */
namespace Kachit\Phalcon\Tests\Common;

use Kachit\Phalcon\Testable\Common\AbstractFactoryStaticTestable as Testable;

class AbstractFactoryStaticTest extends \PHPUnit_Framework_TestCase {

    public function testFilterClassName() {
        $result = Testable::filterClassName('foo ');
        $this->assertEquals('Foo', $result);
    }

    public function testCheckClassExistsValid() {
        $result = Testable::checkClassExists('Phalcon\Mvc\Application');
        $this->assertTrue($result);
    }

    public function testCheckClassExistsInvalid() {
        $result = Testable::checkClassExists('Phalcon\Mvc\Application\Bad');
        $this->assertFalse($result);
    }

    public function testCreateNewClass() {
        $result = Testable::createNewClass('Phalcon\Mvc\Application');
        $this->assertInstanceOf('Phalcon\Mvc\Application', $result);
    }

    public function testGenerateClassName() {
        $result = Testable::generateClassName('bar');
        $this->assertEquals('Foo\Bar', $result);
    }
}