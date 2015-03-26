<?php
/**
 * Class FilterTestable
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Tests\ORM\Repository;

use Kachit\Phalcon\Testable\ORM\Repository\RepositoryTestable;
use Kachit\Phalcon\Testable\ORM\Query\Filter\FilterTestable;
use Kachit\Phalcon\Testable\ORM\Query\Filter\FilterTestableInvalid;
use Kachit\Phalcon\Testable\ORM\Entity\EntityTestable;
use Kachit\Phalcon\Testable\ORM\Entity\EntityTestableInvalid;

use Phalcon\DI;

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

    public function testGetEntity() {
        $result = $this->testable->getEntity();
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf('Kachit\Phalcon\Testable\ORM\Entity\EntityTestable', $result);
        $this->assertInstanceOf('Kachit\Phalcon\ORM\Entity\EntityInterface', $result);
        $this->assertInstanceOf('Phalcon\Mvc\Model', $result);
    }

    public function testGetQueryFilter() {
        $result = $this->testable->getQueryFilter();
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf('Kachit\Phalcon\Testable\ORM\Query\Filter\FilterTestable', $result);
        $this->assertInstanceOf('Kachit\Phalcon\ORM\Query\Filter\FilterInterface', $result);
    }

    public function testCheckQueryFilterIsNull() {
        $result = $this->testable->checkQueryFilter();
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf('Kachit\Phalcon\Testable\ORM\Query\Filter\FilterTestable', $result);
        $this->assertInstanceOf('Kachit\Phalcon\ORM\Query\Filter\FilterInterface', $result);
    }

    public function testCheckQueryFilterValid() {
        $result = $this->testable->checkQueryFilter($this->filterTestable);
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf('Kachit\Phalcon\Testable\ORM\Query\Filter\FilterTestable', $result);
        $this->assertInstanceOf('Kachit\Phalcon\ORM\Query\Filter\FilterInterface', $result);
    }

    /**
     * @expectedException \Kachit\Phalcon\ORM\Repository\Exception
     * @expectedExceptionMessage Query filter object "Kachit\Phalcon\Testable\ORM\Query\Filter\FilterTestableInvalid" is not available for this repository
     */
    public function testCheckQueryFilterNotValid() {
        $this->testable->checkQueryFilter(new FilterTestableInvalid());
    }

    public function testFindById() {
        $result = $this->testable->findByPk(123);
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf('Kachit\Phalcon\ORM\Entity\EntityInterface', $result);
        $this->assertInstanceOf('Phalcon\Mvc\Model', $result);
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
        $this->assertInstanceOf('Kachit\Phalcon\ORM\Entity\EntityInterface', $result);
    }

    public function testFilterQueryPost() {
        $this->filterTestable->setLimit(10)->setOffset(50);
        $result = $this->testable->createQuery();
        $this->testable->filterQueryPost($result, $this->filterTestable);
        $expectedSql = 'SELECT [Kachit\Phalcon\Testable\ORM\Entity\EntityTestable].* FROM [Kachit\Phalcon\Testable\ORM\Entity\EntityTestable] LIMIT 10 OFFSET 50';
        $this->assertEquals(50, $result->getOffset());
        $this->assertEquals(10, $result->getLimit());
        $this->assertEquals($expectedSql, $result->getPhql());
    }

    public function testCreateQueryByFilter() {
        $this->filterTestable->setIds([1, 2, 3]);
        $result = $this->testable->createQueryByFilter($this->filterTestable);
        $expectedSql = 'SELECT [Kachit\Phalcon\Testable\ORM\Entity\EntityTestable].* FROM [Kachit\Phalcon\Testable\ORM\Entity\EntityTestable] WHERE id IN (:phi0:, :phi1:, :phi2:)';
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf('Phalcon\Mvc\Model\Query\Builder', $result);
        $this->assertEquals($expectedSql, $result->getPhql());
    }

    public function testDelete() {
        $result = $this->testable->delete(123);
        $this->assertTrue(is_bool($result));
    }

    public function testSave() {
        $entity = new EntityTestable();
        $result = $this->testable->save($entity);
        $this->assertTrue(is_bool($result));
    }

    public function testCheckEntityValid() {
        $entity = new EntityTestable();
        $this->testable->checkEntity($entity);
    }

    /**
     * @expectedException \Kachit\Phalcon\ORM\Repository\Exception
     * @expectedExceptionMessage Entity object "Kachit\Phalcon\Testable\ORM\Entity\EntityTestableInvalid" is not available for this repository
     */
    public function testCheckEntityInValid() {
        $entity = new EntityTestableInvalid();
        $this->testable->checkEntity($entity);
    }
}
