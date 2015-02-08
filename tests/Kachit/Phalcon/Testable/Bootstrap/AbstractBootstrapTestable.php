<?php
/**
 * Class AbstractBootstrapTestable
 */
namespace Kachit\Phalcon\Testable\Bootstrap;

use Kachit\Phalcon\Bootstrap\AbstractBootstrap;
use Phalcon\DI\FactoryDefault as DI;
use Phalcon\Mvc\Application;
use Phalcon\Config;

class AbstractBootstrapTestable extends AbstractBootstrap {

    /**
     * Create Ioc container
     */
    protected function createDiContainer() {
        $this->di = new DI();
    }

    /**
     * Create application
     */
    protected function createApplication() {
        $this->application = new Application($this->di);
    }

    /**
     * Register config
     */
    public function registerConfig() {
        parent::registerConfig();
    }

    /**
     * Register services
     */
    public function registerServices() {
        parent::registerServices();
    }

    /**
     * Register single service provider
     *
     * @param string $service
     */
    public function registerServiceProvider($service) {
        parent::registerServiceProvider($service);
    }

    /**
     * Register modules
     */
    protected function registerModules() {
    }

    /**
     * Get modules list
     *
     * @return array
     */
    public function getModulesList() {
        return parent::getModulesList();
    }

    /**
     * Get services list
     *
     * @return array
     */
    public function getServicesList() {
        return parent::getServicesList();
    }

    /**
     * @return DI
     */
    public function getDi() {
        return $this->di;
    }
}