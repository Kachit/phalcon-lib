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

    public function testCreateNewClass() {
        $result = $this->testable->createNewClass('Phalcon\Mvc\Application');
        $this->assertInstanceOf('Phalcon\Mvc\Application', $result);
    }

    public function testGenerateClassName() {
        $result = $this->testable->generateClassName('bar');
        $this->assertEquals('Foo\Bar', $result);
    }
}