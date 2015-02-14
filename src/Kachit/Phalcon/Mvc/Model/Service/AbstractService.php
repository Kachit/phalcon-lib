<?php
/**
 * Abstract service layer
 * 
 * @author Kachit
 */
namespace Kachit\Phalcon\Mvc\Model\Service;

use Phalcon\Cache\BackendInterface;
use Phalcon\Config;
use Phalcon\DI\Injectable;

use Kachit\Phalcon\Mvc\Model\Repository\RepositoryInterface;

abstract class AbstractService extends Injectable {

    /**
     * @var RepositoryInterface
     */
    protected $repository;

    /**
     * @var BackendInterface
     */
    protected $cache;

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
     * Get repository
     *
     * @return RepositoryInterface
     */
    abstract protected function getRepository();
}