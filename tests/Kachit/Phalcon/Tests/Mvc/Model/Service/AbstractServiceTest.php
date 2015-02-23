<?php
/**
 * AbstractServiceTest
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Tests\Mvc\Model\Service;

use Kachit\Phalcon\Tester\PhpUnit\TestCase;
use Kachit\Phalcon\Testable\Mvc\Model\Service\ServiceTestable;

class AbstractServiceTest extends TestCase {

    /**
     * @var ServiceTestable
     */
    private $testable;

    protected function setUp() {
        parent::setUp();
        $this->testable = new ServiceTestable();
    }

    public function testGetRepository() {
        $result = $this->testable->getRepository();
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf('Kachit\Phalcon\Mvc\Model\Repository\RepositoryInterface', $result);
        $this->assertInstanceOf('Kachit\Phalcon\Testable\Mvc\Model\Repository\RepositoryTestable', $result);
    }

    public function testCount() {
        $result = $this->testable->count();
        $this->assertTrue(is_int($result));
    }

    public function testFindAll() {
        $result = $this->testable->findAll();
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf('Phalcon\Mvc\Model\Resultset\Simple', $result);
    }

    public function testFindFirst() {
        $result = $this->testable->findFirst();
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf('Phalcon\Mvc\Model', $result);
    }

    public function testFindById() {
        $result = $this->testable->findById(123);
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf('Phalcon\Mvc\Model', $result);
    }
}
