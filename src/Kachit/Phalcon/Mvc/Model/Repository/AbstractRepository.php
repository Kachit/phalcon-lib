<?php
/**
 * AbstractRepository
 *
 * @author Kachit
 * @package Kachit\Phalcon\Mvc\Model\Repository
 */
namespace Kachit\Phalcon\Mvc\Model\Repository;

use Kachit\Phalcon\Mvc\Model\Query\Filter\AbstractFilter as QueryFilter;

use Phalcon\DI\Injectable;
use Phalcon\Mvc\Model\Manager;
use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Resultset\Simple as Resultset;
use Phalcon\Mvc\Model\Query\Builder;
use Kachit\Phalcon\Mvc\Model\Entity\EntitiesFactory;

abstract class AbstractRepository extends Injectable {

    /**
     * Default primary key field
     */
    const PRIMARY_KEY_DEFAULT_FIELD = 'id';

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
        return new $filter;
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
        return $this->getModelsManager()->createBuilder($alias)
            ->addFrom($this->getEntityName(), $alias);
    }

    /**
     * Check query filter
     *
     * @param QueryFilter $filter
     * @return QueryFilter|string
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
    }

    /**
     * Get models manager
     *
     * @return Manager
     */
    protected function getModelsManager() {
        return $this->getDi()->get('modelsManager');
    }

    /**
     * Get entities factory
     *
     * @return EntitiesFactory
     */
    protected function getEntitiesFactory() {
        return new EntitiesFactory();
    }

    /**
     * Get primary key field
     *
     * @return mixed
     */
    protected function getPrimaryKeyField() {
        return self::PRIMARY_KEY_DEFAULT_FIELD;
    }
}