<?php
/**
 * Class AbstractService
 * 
 * @author antoxa <kornilov@realweb.ru>
 */
namespace Kachit\Phalcon\Mvc\Model\Service;

use Phalcon\DI\Injectable;
use Kachit\Phalcon\Mvc\Model\Repository\AbstractRepository;

use Phalcon\Cache\BackendInterface;
use Phalcon\Cache\FrontendInterface;
use Phalcon\Config;

abstract class AbstractService extends Injectable {

    /**
     * @var AbstractRepository
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
     * @return AbstractRepository
     */
    abstract protected function getRepository();
}