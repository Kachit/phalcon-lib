<?php
/**
 * BuilderTest
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Test\Mvc\Model\Query;

use Kachit\Phalcon\Testable\Mvc\Model\Query\BuilderTestable;
use Kachit\Phalcon\Tester\PhpUnit\TestCase;

class BuilderTest extends TestCase {

    /**
     * @var BuilderTestable
     */
    private $testable;

    protected function setUp() {
        parent::setUp();
        $this->testable = new BuilderTestable();
        $this->testable->initFrom();
    }

    public function testCountSimple() {
        $result = $this->testable->count();
        $this->assertInstanceOf('Kachit\Phalcon\Mvc\Model\Query\Builder', $result);
        $this->assertEquals('COUNT (*)', $result->getColumns());
        $this->assertEquals('SELECT COUNT (*) FROM [Kachit\Phalcon\Testable\Mvc\Model\Query\BuilderTestable]', $result->getPhql());
    }

    public function testCountWithAlias() {
        $result = $this->testable->count(null, 'foo');
        $this->assertEquals('COUNT (*) AS foo', $result->getColumns());
        $this->assertEquals('SELECT COUNT (*) AS foo FROM [Kachit\Phalcon\Testable\Mvc\Model\Query\BuilderTestable]', $result->getPhql());
    }

    public function testCountWithFieldAndAlias() {
        $result = $this->testable->count('id', 'foo');
        $this->assertEquals('COUNT (id) AS foo', $result->getColumns());
        $this->assertEquals('SELECT COUNT (id) AS foo FROM [Kachit\Phalcon\Testable\Mvc\Model\Query\BuilderTestable]', $result->getPhql());
    }

    public function testSumSimple() {
        $result = $this->testable->sum('price');
        $this->assertEquals('SUM (price)', $result->getColumns());
        $this->assertEquals('SELECT SUM (price) FROM [Kachit\Phalcon\Testable\Mvc\Model\Query\BuilderTestable]', $result->getPhql());
    }

    public function testAverageSimple() {
        $result = $this->testable->average('price');
        $this->assertEquals('AVG (price)', $result->getColumns());
        $this->assertEquals('SELECT AVG (price) FROM [Kachit\Phalcon\Testable\Mvc\Model\Query\BuilderTestable]', $result->getPhql());
    }

    public function testMaxSimple() {
        $result = $this->testable->maximum('id');
        $this->assertEquals('MAX (id)', $result->getColumns());
        $this->assertEquals('SELECT MAX (id) FROM [Kachit\Phalcon\Testable\Mvc\Model\Query\BuilderTestable]', $result->getPhql());
    }

    public function testMinSimple() {
        $result = $this->testable->minimum('id');
        $this->assertEquals('MIN (id)', $result->getColumns());
        $this->assertEquals('SELECT MIN (id) FROM [Kachit\Phalcon\Testable\Mvc\Model\Query\BuilderTestable]', $result->getPhql());
    }
}
