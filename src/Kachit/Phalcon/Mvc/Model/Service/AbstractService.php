<?php
/**
 * Abstract service layer
 * 
 * @author Kachit
 */
namespace Kachit\Phalcon\Mvc\Model\Service;

use Phalcon\Config;
use Phalcon\Mvc\Model\Resultset\Simple as Resultset;
use Phalcon\Mvc\Model;

use Kachit\Phalcon\Mvc\Model\Repository\RepositoryInterface;
use Kachit\Phalcon\Mvc\Model\Query\Filter\FilterInterface;
use Kachit\Phalcon\DI\InjectableTrait;

abstract class AbstractService {

    use InjectableTrait;

    /**
     * @var RepositoryInterface
     */
    protected $repository;

    /**
     * @var Config
     */
    protected $config;

    /**
     * Init
     */
    public function __construct() {
        $this->repository = $this->getRepository();
        $this->config = $this->getDI()->get('config');
    }

    /**
     * findById
     *
     * @param int $id
     * @return Model
     */
    public function findById($id) {
        return $this->repository->findByPk($id);
    }

    /**
     * findAll
     *
     * @param FilterInterface $filter
     * @return Resultset
     */
    public function findAll(FilterInterface $filter = null) {
        return $this->repository->findAll($filter);
    }

    /**
     * Get repository
     *
     * @return RepositoryInterface
     */
    abstract protected function getRepository();
}