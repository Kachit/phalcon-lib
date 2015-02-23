<?php
/**
 * AbstractRepository
 *
 * @author Kachit
 * @package Kachit\Phalcon\Mvc\Model\Repository
 */
namespace Kachit\Phalcon\Mvc\Model\Repository;

use Kachit\Phalcon\Mvc\Model\Query\Filter\FilterInterface as QueryFilter;
use Kachit\Phalcon\Mvc\Model\Entity\EntitiesFactory;
use Kachit\Phalcon\Mvc\Model\Query\Filter\FiltersFactory;
use Kachit\Phalcon\Mvc\Model\Query\Builder;

use Kachit\Phalcon\DI\InjectableTrait;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Resultset\Simple as Resultset;

abstract class AbstractRepository implements RepositoryInterface {

    use InjectableTrait;

    /**
     * Default primary key field
     */
    const PRIMARY_KEY_DEFAULT_FIELD = 'id';

    /**
     * @var Builder
     */
    private $queryBuilder;

    /**
     * @var EntitiesFactory
     */
    private $entitiesFactory;

    /**
     * @var FiltersFactory
     */
    private $filtersFactory;

    /**
     * Find by primary key
     *
     * @param mixed $pk
     * @return Model
     */
    public function findByPk($pk) {
        $pkField = $this->getPrimaryKeyField();
        return $this->createQuery()->where($pkField . ' = ' . $pk)->getQuery()->getSingleResult();
    }

    /**
     * Find first row by filter
     *
     * @param QueryFilter $filter
     * @return Model
     */
    public function findFirst(QueryFilter $filter = null) {
        $filter = $this->checkQueryFilter($filter);
        $query = $this->createQueryByFilter($filter);
        return $query->getQuery()->getSingleResult();
    }

    /**
     * Find all rows by filter
     *
     * @param QueryFilter $filter
     * @return Resultset
     */
    public function findAll(QueryFilter $filter = null) {
        $filter = $this->checkQueryFilter($filter);
        $query = $this->createQueryByFilter($filter);
        $this->filterQueryPost($query, $filter);
        return $query->getQuery()->execute();
    }

    /**
     * Count rows by filter
     *
     * @param QueryFilter $filter
     * @return int
     * @throws Exception
     */
    public function count(QueryFilter $filter = null) {
        $filter = $this->checkQueryFilter($filter);
        $query = $this->createQueryByFilter($filter);
        $this->filterQueryPost($query, $filter);
        $query->count();
        return $this->fetchColumn($query);
    }

    /**
     * Get model entity
     *
     * @return Model
     */
    public function getModelEntity() {
        $entity = $this->getEntityName();
        return $this->getEntitiesFactory()->getObject($entity);
    }

    /**
     * Get query filter
     *
     * @return QueryFilter
     */
    public function getQueryFilter() {
        $filter = $this->getQueryFilterName();
        return $this->getFiltersFactory()->getObject($filter);
    }

    /**
     * Create query by filter
     *
     * @param QueryFilter $filter
     * @return Builder
     */
    abstract protected function createQueryByFilter(QueryFilter $filter);

    /**
     * Get entity name
     *
     * @return string
     */
    abstract protected function getEntityName();

    /**
     * Get query filter name
     *
     * @return string
     */
    abstract protected function getQueryFilterName();

    /**
     * Create query builder
     *
     * @param string $alias
     * @return Builder
     */
    protected function createQuery($alias = null) {
        if (empty($this->queryBuilder)) {
            $this->queryBuilder = new Builder();
            $this->queryBuilder->addFrom($this->getEntityName(), $alias);
        }
        return $this->queryBuilder;
    }

    /**
     * Check query filter
     *
     * @param QueryFilter $filter
     * @return QueryFilter
     * @throws Exception
     */
    protected function checkQueryFilter(QueryFilter $filter = null) {
        $filterName = $this->getQueryFilterName();
        if (is_object($filter) && !($filter instanceof $filterName)) {
            $badFilterClass = get_class($filter);
            throw new Exception('Query filter object "' . $badFilterClass . '" is not available for this repository');
        }
        return ($filter) ? $filter : $this->getQueryFilter();
    }

    /**
     * Filter query post processing
     *
     * @param Builder $query
     * @param QueryFilter $filter
     */
    protected function filterQueryPost(Builder $query, QueryFilter $filter) {
        if ($filter->getLimit()) {
            $query->limit($filter->getLimit());
        }
        if ($filter->getOffset()) {
            $query->offset($filter->getOffset());
        }
        if ($filter->getGroupBy()) {
            $query->groupBy($filter->getGroupBy());
        }
        if ($filter->getOrderBy()) {
            $query->orderBy($filter->getOrderBy());
        }
    }

    /**
     * Get entities factory
     *
     * @return EntitiesFactory
     */
    protected function getEntitiesFactory() {
        if (empty($this->entitiesFactory)) {
            $this->entitiesFactory = new EntitiesFactory();
        }
        return $this->entitiesFactory;
    }

    /**
     * Get filters factory
     *
     * @return FiltersFactory
     */
    protected function getFiltersFactory() {
        if (empty($this->filtersFactory)) {
            $this->filtersFactory = new FiltersFactory();
        }
        return $this->filtersFactory;
    }

    /**
     * Get primary key field
     *
     * @return mixed
     */
    protected function getPrimaryKeyField() {
        return self::PRIMARY_KEY_DEFAULT_FIELD;
    }

    /**
     * Fetch column
     *
     * @param Builder $query
     * @return mixed
     */
    protected function fetchColumn(Builder $query) {
        $result = $query->getQuery()->getSingleResult()->toArray();
        return current($result);
    }
}