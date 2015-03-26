<?php
/**
 * Class AbstractRepositoryTestable
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Testable\ORM\Repository;

use Kachit\Phalcon\ORM\Repository\Database;
use Kachit\Phalcon\ORM\Query\Filter\FilterInterface;
use Kachit\Phalcon\ORM\Entity\EntityInterface;
use Kachit\Phalcon\ORM\Query\BuilderInterface;
use Kachit\Phalcon\ORM\Repository\Exception;

use Phalcon\Mvc\Model\Resultset\Simple as Resultset;

use Kachit\Phalcon\Testable\ORM\Query\Filter\FilterTestable;
use Kachit\Phalcon\Testable\Mvc\Model\ResultsetTestable;
use Kachit\Phalcon\Testable\ORM\Entity\EntityTestable;

class RepositoryTestable extends Database {

    /**
     * Delete entity from storage by PK
     *
     * @param mixed $pk
     * @return bool
     * @throws Exception
     */
    public function delete($pk) {
        return true;
    }

    /**
     * Save entity to storage
     *
     * @param EntityInterface $entity
     * @return bool
     * @throws Exception
     */
    public function save(EntityInterface $entity) {
        return true;
    }

    /**
     * Get model entity
     *
     * @return EntityInterface
     */
    public function getEntity() {
        return new EntityTestable();
    }

    /**
     * Get query filter
     *
     * @return FilterInterface
     */
    public function getQueryFilter() {
        return new FilterTestable();
    }

    /**
     * Create query by filter
     *
     * @param FilterTestable $filter
     * @return BuilderInterface
     */
    public function createQueryByFilter(FilterInterface $filter) {
        $query = $this->createQuery();
        if ($filter->getIds()) {
            $query->inWhere('id', $filter->getIds());
        }
        return $query;
    }

    /**
     * Find first row by filter
     *
     * @param FilterInterface $filter
     * @return EntityInterface
     */
    public function findFirst(FilterInterface $filter = null) {
        return $this->getEntity();
    }

    /**
     * Find by primary key
     *
     * @param mixed $pk
     * @return EntityInterface
     */
    public function findByPk($pk) {
        return $this->getEntity();
    }

    /**
     * Find all rows by filter
     *
     * @param FilterInterface $filter
     * @return Resultset
     */
    public function findAll(FilterInterface $filter = null) {
        return new ResultsetTestable();
    }

    /**
     * Count rows by filter
     *
     * @param FilterInterface $filter
     * @return int
     * @throws Exception
     */
    public function count(FilterInterface $filter = null) {
        return 123;
    }

    /**
     * Create query builder
     *
     * @param string $alias
     * @return BuilderInterface
     */
    public function createQuery($alias = null) {
        return parent::createQuery($alias);
    }

    /**
     * Check query filter
     *
     * @param FilterTestable $filter
     * @return FilterTestable|string
     * @throws Exception
     */
    public function checkQueryFilter(FilterInterface $filter = null) {
        return parent::checkQueryFilter($filter);
    }

    /**
     * Filter query post processing
     *
     * @param BuilderInterface $query
     * @param FilterInterface $filter
     */
    public function filterQueryPost(BuilderInterface $query, FilterInterface $filter) {
        parent::filterQueryPost($query, $filter);
    }
}