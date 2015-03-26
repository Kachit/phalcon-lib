<?php
/**
 * Abstract repository
 * 
 * @author antoxa <kornilov@realweb.ru>
 * @package Kachit\Phalcon\ORM\Repository
 */
namespace Kachit\Phalcon\ORM\Repository;

use Kachit\Phalcon\ORM\Query\Filter\FilterInterface;
use Kachit\Phalcon\ORM\Entity\EntitiesFactory;
use Kachit\Phalcon\ORM\Entity\EntityInterface;
use Kachit\Phalcon\ORM\Query\Filter\FiltersFactory;
use Kachit\Phalcon\ORM\Query\BuilderInterface;

use Phalcon\Mvc\Model\Resultset\Simple as Resultset;

abstract class AbstractRepository implements RepositoryInterface {

    /**
     * @var EntitiesFactory
     */
    private $entitiesFactory;

    /**
     * @var FiltersFactory
     */
    private $filtersFactory;

    /**
     * Get model entity
     *
     * @return EntityInterface
     */
    public function getModelEntity() {
        $entity = $this->getEntityName();
        return $this->getEntitiesFactory()->getObject($entity);
    }

    /**
     * Get query filter
     *
     * @return FilterInterface
     */
    public function getQueryFilter() {
        $filter = $this->getQueryFilterName();
        return $this->getFiltersFactory()->getObject($filter);
    }

    /**
     * Find by primary key
     *
     * @param mixed $pk
     * @return EntityInterface
     */
    public function findByPk($pk) {
        $pkField = $this->getEntity()->getPrimaryKey();
        return $this->createQuery()->where($pkField . ' = ' . $pk)->getQuery()->getSingleResult();
    }

    /**
     * Find first row by filter
     *
     * @param FilterInterface $filter
     * @return EntityInterface
     */
    public function findFirst(FilterInterface $filter = null) {
        $filter = $this->checkQueryFilter($filter);
        $query = $this->createQueryByFilter($filter);
        return $query->getQuery()->getSingleResult();
    }

    /**
     * Find all rows by filter
     *
     * @param FilterInterface $filter
     * @return Resultset
     */
    public function findAll(FilterInterface $filter = null) {
        $filter = $this->checkQueryFilter($filter);
        $query = $this->createQueryByFilter($filter);
        $this->filterQueryPost($query, $filter);
        return $query->getQuery()->execute();
    }

    /**
     * Count rows by filter
     *
     * @param FilterInterface $filter
     * @return int
     * @throws Exception
     */
    public function count(FilterInterface $filter = null) {
        $filter = $this->checkQueryFilter($filter);
        $query = $this->createQueryByFilter($filter);
        $this->filterQueryPost($query, $filter);
        $query->count();
        return $this->fetchColumn($query);
    }

    /**
     * Delete entity from storage by PK
     *
     * @param mixed $pk
     * @return bool
     * @throws Exception
     */
    public function delete($pk) {
        $entity = $this->findByPk($pk);
        $result = false;
        if ($entity) {
            $result = $entity->delete();
        }
        return $result;
    }

    /**
     * Save entity to storage
     *
     * @param EntityInterface $entity
     * @return bool
     * @throws Exception
     */
    public function save(EntityInterface $entity) {
        return $entity->save();
    }


    /**
     * Create query by filter
     *
     * @param FilterInterface $filter
     * @return BuilderInterface
     */
    abstract protected function createQueryByFilter(FilterInterface $filter);

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
     * @return BuilderInterface
     */
    abstract protected function createQuery($alias = null);

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
     * Check query filter
     *
     * @param FilterInterface $filter
     * @return FilterInterface
     * @throws Exception
     */
    protected function checkQueryFilter(FilterInterface $filter = null) {
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
     * @param BuilderInterface $query
     * @param FilterInterface $filter
     */
    protected function filterQueryPost(BuilderInterface $query, FilterInterface $filter) {
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
     * Fetch column
     *
     * @param BuilderInterface $query
     * @return mixed
     */
    protected function fetchColumn(BuilderInterface $query) {
        $result = $query->getQuery()->getSingleResult()->toArray();
        return current($result);
    }
}