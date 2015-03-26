<?php
/**
 * Class AbstractRepositoryTestable
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Testable\ORM\Repository;

use Kachit\Phalcon\ORM\Repository\AbstractRepository;
use Kachit\Phalcon\ORM\Query\Filter\FilterInterface;
use Kachit\Phalcon\ORM\Entity\EntitiesFactory;
use Kachit\Phalcon\ORM\Entity\EntityInterface;
use Kachit\Phalcon\ORM\Query\Filter\FiltersFactory;
use Kachit\Phalcon\ORM\Query\BuilderInterface;

use Kachit\Phalcon\ORM\Repository\Exception;

use Phalcon\Mvc\Model\Resultset\Simple as Resultset;

class RepositoryTestable extends AbstractRepository {

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

    /**
     * Create query by filter
     *
     * @param FilterInterface $filter
     * @return BuilderInterface
     */
    protected function createQueryByFilter(FilterInterface $filter) {
        // TODO: Implement createQueryByFilter() method.
    }

    /**
     * Get entity name
     *
     * @return string
     */
    protected function getEntityName() {
        // TODO: Implement getEntityName() method.
    }

    /**
     * Get query filter name
     *
     * @return string
     */
    protected function getQueryFilterName() {
        // TODO: Implement getQueryFilterName() method.
    }

    /**
     * Create query builder
     *
     * @param string $alias
     * @return BuilderInterface
     */
    protected function createQuery($alias = null) {
        // TODO: Implement createQuery() method.
    }

    /**
     * Delete entity from storage by PK
     *
     * @param mixed $pk
     * @return bool
     * @throws Exception
     */
    public function delete($pk) {
        // TODO: Implement delete() method.
    }

    /**
     * Save entity to storage
     *
     * @param EntityInterface $entity
     * @return bool
     * @throws Exception
     */
    public function save(EntityInterface $entity) {
        // TODO: Implement save() method.
    }

    /**
     * Get model entity
     *
     * @return EntityInterface
     */
    public function getEntity() {
        // TODO: Implement getEntity() method.
    }

}