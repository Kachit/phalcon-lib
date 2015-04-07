<?php
/**
 * Reflection factory tests
 *
 * @author Kachit
 * @package Kachit\Phalcon\Common\Factory
 */
namespace Kachit\Phalcon\Tests\Common\Factory;

use Kachit\Phalcon\Testable\Common\Factory\ReflectionFactoryTestable;

use Phalcon\DI;
use Phalcon\Mvc\Application;

use Kachit\Phalcon\Tester\PhpUnit\TestCase;

class ReflectionFactoryTest extends TestCase {

    /**
     * @var ReflectionFactoryTestable
     */
    private $testable;

    /**
     * Init
     */
    protected function setUp() {
        $this->testable = new ReflectionFactoryTestable();
    }

    public function testGetObjectSimple() {
        $di = new DI();
        $this->testable->setNamespace('Phalcon\Mvc');
        /* @var Application $result */
        $result = $this->testable->getObject('Application');
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf('Phalcon\Mvc\Application', $result);
        $this->assertNotEquals($result->getDI(), $di);
    }

    public function testGetObjectWithArguments() {
        $di = new DI();
        $this->testable->setNamespace('Phalcon\Mvc');
        $this->testable->setArguments([$di]);
        /* @var Application $result */
        $result = $this->testable->getObject('Application');
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf('Phalcon\Mvc\Application', $result);
        $this->assertEquals($result->getDI(), $di);
    }
}
