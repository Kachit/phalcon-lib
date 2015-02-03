<?php
/**
 * Bootstrap
 *
 * @author Kachit
 */
namespace Kachit\Phalcon;

use Phalcon\Config;
use Phalcon\DI\FactoryDefault as DI;
use Phalcon\Mvc\Application;

class Bootstrap {

    /**
     * @var DI
     */
    protected $container;

    /**
     * @var Application
     */
    protected $application;

    /**
     * @param array $config
     */
    public function __construct(array $config) {
        $this->registerContainer();
        $this->registerConfig($config);
        $this->createApplication();
    }

    /**
     * Init application
     *
     * @return $this
     */
    public function initApplication() {
        return $this->application;
    }

    /**
     * Register config
     *
     * @param $config
     */
    protected function registerConfig($config) {
        $this->container->set('config', function() use ($config){
            return new Config($config);
        });
    }

    /**
     * Register container
     */
    protected function registerContainer() {
        $this->container = new DI();
    }

    /**
     * Create application
     */
    protected function createApplication() {
        $this->application = new Application($this->container);
    }
} 