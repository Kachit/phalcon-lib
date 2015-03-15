<?php
/**
 * Abstract service layer
 * 
 * @author Kachit
 */
namespace Kachit\Phalcon\Mvc\Model\Service;

use Phalcon\Config;
use Phalcon\Mvc\Model\Resultset\Simple as Resultset;

use Kachit\Phalcon\Mvc\Model\Entity\AbstractEntity;
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
     * Find item by id
     *
     * @param int $id
     * @return AbstractEntity
     */
    public function findById($id) {
        return $this->repository->findByPk($id);
    }

    /**
     * Count items by filter
     *
     * @param FilterInterface $filter
     * @return int
     */
    public function count(FilterInterface $filter = null) {
        return $this->repository->count($filter);
    }

    /**
     * Find item by filter
     *
     * @param FilterInterface $filter
     * @return AbstractEntity
     */
    public function findFirst(FilterInterface $filter = null) {
        return $this->repository->findFirst($filter);
    }

    /**
     * Find all items by filter
     *
     * @param FilterInterface $filter
     * @return Resultset
     */
    public function findAll(FilterInterface $filter = null) {
        return $this->repository->findAll($filter);
    }

    /**
     * Save entity
     *
     * @param array $data
     * @return bool
     */
    public function save(array $data) {
        /* @var AbstractEntity $entity */
        $entity = $this->repository->getModelEntity();
        return $entity->save($data);
    }

    /**
     * Delete entity
     *
     * @param int $id
     * @return bool
     */
    public function delete($id) {
        /* @var AbstractEntity $entity */
        $entity = $this->repository->findByPk($id);
        return $entity->delete();
    }

    /**
     * Get repository
     *
     * @return RepositoryInterface
     */
    abstract protected function getRepository();
}