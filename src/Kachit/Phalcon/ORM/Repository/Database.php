<?php
/**
 * Database
 *
 * @author Kachit
 * @package Kachit\Phalcon\ORM\Repository
 */
namespace Kachit\Phalcon\ORM\Repository;

use Kachit\Phalcon\Mvc\Model\Query\Builder;
use Phalcon\Mvc\Model\Query\BuilderInterface;

abstract class Database extends AbstractRepository {

    /**
     * Create query builder
     *
     * @param string $alias
     * @return BuilderInterface
     */
    protected function createQuery($alias = null) {
        $queryBuilder = new Builder();
        $queryBuilder->addFrom($alias, $this->getEntityName());
        return $queryBuilder;
    }
}