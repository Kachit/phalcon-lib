<?php
/**
 * Abstract repository
 * 
 * @author antoxa <kornilov@realweb.ru>
 * @package Kachit\Phalcon\ORM\Repository
 */
namespace Kachit\Phalcon\ORM\Repository;

use Kachit\Phalcon\ORM\Query\Filter\FilterInterface;
use Kachit\Phalcon\Mvc\Model\Entity\EntitiesFactory;
use Kachit\Phalcon\Mvc\Model\Query\Filter\FiltersFactory;

use Phalcon\Mvc\Model\Query\BuilderInterface;

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
}