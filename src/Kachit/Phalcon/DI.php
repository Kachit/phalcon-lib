<?php
/**
 * DI
 *
 * @author Kachit
 */
namespace Kachit\Phalcon;

use Phalcon\DI\FactoryDefault as Container;
use Phalcon\Http\Request;
use Phalcon\Config;
use Phalcon\Mvc\Router;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Db\Adapter\Pdo\Mysql;
use Phalcon\Mvc\View\Engine\Volt;

class DI extends Container {

    const DI_REQUEST = 'request';
    const DI_DATABASE = 'db';
    const DI_ROUTER = 'router';
    const DI_DISPATCHER = 'dispatcher';
    const DI_CONFIG = 'config';
    const DI_VIEW = 'view';
    const DI_VOLT = 'volt';

    /**
     * Get DB
     *
     * @return Mysql
     */
    public function getDb() {
        return $this->get(self::DI_DATABASE);
    }

    /**
     * Get request
     *
     * @return Request
     */
    public function getRequest() {
        return $this->get(self::DI_REQUEST);
    }

    /**
     * Get request
     *
     * @return Router
     */
    public function getRouter() {
        return $this->get(self::DI_ROUTER);
    }

    /**
     * Get request
     *
     * @return Dispatcher
     */
    public function getDispatcher() {
        return $this->get(self::DI_DISPATCHER);
    }

    /**
     * Get request
     *
     * @return Config
     */
    public function getConfig() {
        return $this->get(self::DI_CONFIG);
    }

    /**
     * Get request
     *
     * @return Volt
     */
    public function getVolt() {
        return $this->get(self::DI_VOLT);
    }

    /**
     * Set router
     *
     * @param mixed $router
     * @param bool $shared
     * @return $this
     */
    public function setRouter($router, $shared = null) {
        return $this->set(self::DI_ROUTER, $router, $shared);
    }

    /**
     * Set DB
     *
     * @param mixed $db
     * @param bool $shared
     * @return $this
     */
    public function setDb($db, $shared = null) {
        return $this->set(self::DI_DATABASE, $db, $shared);
    }

    /**
     * Set config
     *
     * @param mixed $config
     * @param bool $shared
     * @return $this
     */
    public function setConfig($config, $shared = null) {
        return $this->set(self::DI_CONFIG, $config, $shared);
    }

    /**
     * Set view
     *
     * @param mixed $view
     * @param bool $shared
     * @return $this
     */
    public function setView($view, $shared = null) {
        return $this->set(self::DI_VIEW, $view, $shared);
    }

    /**
     * Set dispatcher
     *
     * @param mixed $dispatcher
     * @param bool $shared
     * @return $this
     */
    public function setDispatcher($dispatcher, $shared = null) {
        return $this->set(self::DI_DISPATCHER, $dispatcher, $shared);
    }

    /**
     * Set volt
     *
     * @param mixed $volt
     * @param bool $shared
     * @return $this
     */
    public function setVolt($volt, $shared = null) {
        return $this->set(self::DI_VOLT, $volt, $shared);
    }
}