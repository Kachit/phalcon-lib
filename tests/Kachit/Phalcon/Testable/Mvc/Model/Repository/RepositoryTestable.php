<?php
/**
 * Class AbstractRepositoryTestable
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Testable\Mvc\Model\Repository;

use Kachit\Phalcon\Mvc\Model\Query\Filter\FilterInterface as QueryFilter;
use Kachit\Phalcon\Testable\Mvc\Model\Query\Filter\FilterTestable;
use Kachit\Phalcon\Mvc\Model\Repository\AbstractRepository;
use Kachit\Phalcon\Mvc\Model\Repository\Exception;
use Kachit\Phalcon\Mvc\Model\Entity\EntitiesFactory;
use Kachit\Phalcon\Mvc\Model\Query\Filter\FiltersFactory;

use Kachit\Phalcon\Mvc\Model\Query\Builder;
use Phalcon\Mvc\Model\Manager;

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
     * Get models manager
     *
     * @return Manager
     */
    public function getModelsManager() {
        return parent::getModelsManager();
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