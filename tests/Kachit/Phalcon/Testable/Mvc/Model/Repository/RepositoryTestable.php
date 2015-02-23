<?php
/**
 * Class AbstractRepositoryTestable
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Testable\Mvc\Model\Repository;

use Kachit\Phalcon\Mvc\Model\Query\Filter\FilterInterface as QueryFilter;
use Kachit\Phalcon\Mvc\Model\Query\Filter\FiltersFactory;
use Kachit\Phalcon\Mvc\Model\Query\Builder;

use Kachit\Phalcon\Mvc\Model\Repository\AbstractRepository;
use Kachit\Phalcon\Mvc\Model\Repository\Exception;
use Kachit\Phalcon\Mvc\Model\Entity\EntitiesFactory;

use Kachit\Phalcon\Testable\Mvc\Model\Query\Filter\FilterTestable;
use Kachit\Phalcon\Testable\Mvc\Model\ResultsetTestable;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Resultset\Simple as Resultset;

class RepositoryTestable extends AbstractRepository {

    /**
     * Create query by filter
     *
     * @param FilterTestable $filter
     * @return Builder
     */
    public function createQueryByFilter(QueryFilter $filter) {
        $query = $this->createQuery();
        if ($filter->getIds()) {
            $query->inWhere('id', $filter->getIds());
        }
        return $query;
    }

    /**
     * Find first row by filter
     *
     * @param QueryFilter $filter
     * @return Model
     */
    public function findFirst(QueryFilter $filter = null) {
        return $this->getModelEntity();
    }

    /**
     * Find by primary key
     *
     * @param mixed $pk
     * @return Model
     */
    public function findByPk($pk) {
        return $this->getModelEntity();
    }

    /**
     * Find all rows by filter
     *
     * @param QueryFilter $filter
     * @return Resultset
     */
    public function findAll(QueryFilter $filter = null) {
        return new ResultsetTestable();
    }

    /**
     * Count rows by filter
     *
     * @param QueryFilter $filter
     * @return int
     * @throws Exception
     */
    public function count(QueryFilter $filter = null) {
        return 123;
    }

    /**
     * Get entity name
     *
     * @return string
     */
    public function getEntityName() {
        return 'Kachit\Phalcon\Testable\Mvc\Model\ModelTestable';
    }

    /**
     * Get query filter name
     *
     * @return string
     */
    public function getQueryFilterName() {
        return 'Kachit\Phalcon\Testable\Mvc\Model\Query\Filter\FilterTestable';
    }

    /**
     * Create query builder
     *
     * @param string $alias
     * @return Builder
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
    public function checkQueryFilter(QueryFilter $filter = null) {
        return parent::checkQueryFilter($filter);
    }

    /**
     * Filter query post processing
     *
     * @param Builder $query
     * @param FilterTestable $filter
     */
    public function filterQueryPost(Builder $query, QueryFilter $filter) {
        parent::filterQueryPost($query, $filter);
    }

    /**
     * Get entities factory
     *
     * @return EntitiesFactory
     */
    public function getEntitiesFactory() {
        return parent::getEntitiesFactory();
    }

    /**
     * Get filters factory
     *
     * @return FiltersFactory
     */
    public function getFiltersFactory() {
        return parent::getFiltersFactory();
    }
}