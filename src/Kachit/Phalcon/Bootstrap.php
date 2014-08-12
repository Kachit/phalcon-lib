<?php
/**
 * Bootstrap
 *
 * @author Kachit
 */
namespace Kachit\Phalcon;

use Phalcon\Config;
use Kachit\Phalcon\Mvc\Application;
use Phalcon\Mvc\Router;
use Phalcon\Db\Adapter\Pdo\Mysql;

use Kachit\Phalcon\Traits\ApplicationTrait;
use Kachit\Phalcon\Traits\DIContainerTrait;
use Kachit\Phalcon\Traits\ConfigTrait;

class Bootstrap {

    use ApplicationTrait;
    use DIContainerTrait;
    use ConfigTrait;

    /**
     * @var bool
     */
    protected $needDb;

    /**
     * @param array $config
     */
    public function __construct(array $config) {
        $this->config = new Config($config);
        $this->container = new DI();
        $this->application = new Application($this->container);
    }

    /**
     * Init application
     *
     * @return $this
     */
    public function init() {
        $this->registerModules();
        $this->registerRouter();
        $this->registerConfig();
        $this->registerDb();
        return $this;
    }

    /**
     * Set NeedDb
     *
     * @param boolean $needDb
     * @return $this;
     */
    public function setNeedDb($needDb = true) {
        $this->needDb = (bool)$needDb;
        return $this;
    }

    /**
     * registerModules
     *
     * @return $this
     */
    protected function registerModules() {
        $this->application->registerModules($this->config->modules->toArray());
        return $this;
    }

    /**
     * Register Router
     *
     * @return $this
     */
    protected function registerRouter() {
        $router = new Router();
        $router->setDefaultModule($this->config->application->defaultModule);
        /* @var Config $params */
        foreach ($this->config->router->routes as $routeName => $params) {
            $router->add($routeName, $params->toArray());
        }
        $this->container->setRouter($router);
        return $this;
    }

    /**
     * Register Db
     *
     * @return $this
     */
    protected function registerDb() {
        $this->container->setDb(function(){
                return new Mysql($this->config->database->toArray());
            });
        return $this;
    }

    /**
     * Register config
     *
     * @return $this
     */
    protected function registerConfig() {
        $this->container->setConfig($this->config->application);
        return $this;
    }
} 