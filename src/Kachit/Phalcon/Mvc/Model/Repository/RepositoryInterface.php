<?php
/**
 * Repository Interface
 *
 * @author Kachit
 * @package Kachit\Phalcon\Mvc\Model\Repository
 */
namespace Kachit\Phalcon\Mvc\Model\Repository;

use Kachit\Phalcon\Mvc\Model\Entity\EntityInterface;
use Kachit\Phalcon\Mvc\Model\Query\Filter\FilterInterface;

interface RepositoryInterface {

    /**
     * Find by primary key
     *
     * @param mixed $pk
     * @return EntityInterface
     */
    public function findByPk($pk);

    /**
     * Find first row by filter
     *
     * @param FilterInterface $filter
     * @return EntityInterface
     */
    public function findFirst(FilterInterface $filter = null);

    /**
     * Find all rows by filter
     *
     * @param FilterInterface $filter
     * @return mixed
     */
    public function findAll(FilterInterface $filter = null);

    /**
     * Get model entity
     *
     * @return EntityInterface
     */
    public function getModelEntity();

    /**
     * Get query filter
     *
     * @return FilterInterface
     */
    public function getQueryFilter();
}