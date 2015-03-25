<?php
/**
 * Repository Interface
 *
 * @author Kachit
 * @package Kachit\Phalcon\ORM\Repository
 */
namespace Kachit\Phalcon\ORM\Repository;

use Kachit\Phalcon\ORM\Query\Filter\FilterInterface;
use Kachit\Phalcon\ORM\Entity\EntityInterface;

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
     * Count rows by filter
     *
     * @param FilterInterface $filter
     * @return int
     * @throws Exception
     */
    public function count(FilterInterface $filter = null);

    /**
     * Get model entity
     *
     * @return EntityInterface
     */
    public function getEntity();

    /**
     * Get query filter
     *
     * @return FilterInterface
     */
    public function getQueryFilter();
}