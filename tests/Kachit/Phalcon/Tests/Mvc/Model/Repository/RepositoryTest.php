<?php
/**
 * Class FilterTestable
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Tests\Mvc\Model\Repository;

use Kachit\Phalcon\Testable\Mvc\Model\Repository\RepositoryTestable;
use Kachit\Phalcon\Testable\Mvc\Model\QueryFilter\FilterTestable;
use Kachit\Phalcon\Testable\Mvc\Model\QueryFilter\FilterTestableInvalid;

class RepositoryTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var RepositoryTestable
     */
    private $testable;

    /**
     * @var FilterTestable
     */
    private $filterTestable;

    /**
     * Init
     */
    protected function setUp() {
        $this->testable = new RepositoryTestable();
        $this->filterTestable = new FilterTestable();
    }

    public function testGetEntityName() {
        $result = $this->testable->getEntityName();
        $this->assertTrue(is_string($result));
        $this->assertEquals('Kachit\Phalcon\Testable\Mvc\Model\ModelTestable', $result);
    }

    public function testGetQueryFilterName() {
        $result = $this->testable->getQueryFilterName();
        $this->assertTrue(is_string($result));
        $this->assertEquals('Kachit\Phalcon\Testable\Mvc\Model\QueryFilter\FilterTestable', $result);
    }

    public function testGetModelEntity() {
        $result = $this->testable->getModelEntity();
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf('Kachit\Phalcon\Testable\Mvc\Model\ModelTestable', $result);
        $this->assertInstanceOf('Phalcon\Mvc\Model', $result);
    }

    public function testGetQueryFilter() {
        $result = $this->testable->getQueryFilter();
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf('Kachit\Phalcon\Testable\Mvc\Model\QueryFilter\FilterTestable', $result);
    }

    public function testGetModelsManager() {
        $result = $this->testable->getModelsManager();
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf('Phalcon\Mvc\Model\Manager', $result);
    }

    public function testCreateQuery() {
        $result = $this->testable->createQuery();
        $expectedSql = 'SELECT [Kachit\Phalcon\Testable\Mvc\Model\ModelTestable].* FROM [Kachit\Phalcon\Testable\Mvc\Model\ModelTestable]';
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf('Phalcon\Mvc\Model\Query\Builder', $result);
        $this->assertEquals($expectedSql, $result->getPhql());
    }

    public function testCreateQueryWithAlias() {
        $result = $this->testable->createQuery('foo');
        $expectedSql = 'SELECT [foo].* FROM [Kachit\Phalcon\Testable\Mvc\Model\ModelTestable] AS [foo]';
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf('Phalcon\Mvc\Model\Query\Builder', $result);
        $this->assertEquals($expectedSql, $result->getPhql());
    }

    public function testCheckQueryFilterIsNull() {
        $result = $this->testable->checkQueryFilter();
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf('Kachit\Phalcon\Testable\Mvc\Model\QueryFilter\FilterTestable', $result);
    }

    public function testCheckQueryFilterValid() {
        $result = $this->testable->checkQueryFilter($this->filterTestable);
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf('Kachit\Phalcon\Testable\Mvc\Model\QueryFilter\FilterTestable', $result);
    }

    public function testFilterQueryPost() {
        $this->filterTestable->setLimit(10)->setOffset(50);
        $result = $this->testable->createQuery();
        $this->testable->filterQueryPost($result, $this->filterTestable);
        $expectedSql = 'SELECT [Kachit\Phalcon\Testable\Mvc\Model\ModelTestable].* FROM [Kachit\Phalcon\Testable\Mvc\Model\ModelTestable] LIMIT 10 OFFSET 50';
        $this->assertEquals(50, $result->getOffset());
        $this->assertEquals(10, $result->getLimit());
        $this->assertEquals($expectedSql, $result->getPhql());
    }

    public function testCreateQueryByFilter() {
        $this->filterTestable->setIds([1, 2, 3]);
        $result = $this->testable->createQueryByFilter($this->filterTestable);
        $expectedSql = 'SELECT [Kachit\Phalcon\Testable\Mvc\Model\ModelTestable].* FROM [Kachit\Phalcon\Testable\Mvc\Model\ModelTestable] WHERE id IN (:phi0:, :phi1:, :phi2:)';
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf('Phalcon\Mvc\Model\Query\Builder', $result);
        $this->assertEquals($expectedSql, $result->getPhql());
    }

    /**
     * @expectedException \Kachit\Phalcon\Mvc\Model\Repository\Exception
     * @expectedExceptionMessage Query filter object "Kachit\Phalcon\Testable\Mvc\Model\QueryFilter\FilterTestableInvalid" is not available for this repository
     */
    public function testCheckQueryFilterNotValid() {
        $this->testable->checkQueryFilter(new FilterTestableInvalid());
    }

    public function testGetEntitiesFactory() {
        $result = $this->testable->getEntitiesFactory();
        $this->assertInstanceOf('Kachit\Phalcon\Mvc\Model\Entity\EntitiesFactory', $result);
    }

    public function testGetFiltersFactory() {
        $result = $this->testable->getFiltersFactory();
        $this->assertInstanceOf('Kachit\Phalcon\Mvc\Model\Query\Filter\FiltersFactory', $result);
    }
}
