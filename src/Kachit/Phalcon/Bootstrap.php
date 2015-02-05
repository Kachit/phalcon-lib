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
use Kachit\Phalcon\ServiceProvider\Factory as ProvidersFactory;

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
     * @var ProvidersFactory
     */
    protected $providersFactory;

    /**
     * @param array $config
     */
    public function __construct(array $config) {
        $this->registerContainer();
        $this->registerConfig($config);
        $this->createApplication();
        $this->createServiceFactory();
    }

    /**
     * Init application
     *
     * @return $this
     */
    public function initApplication() {
        $this->registerServices();
        return $this->application;
    }

    /**
     * Register config
     *
     * @param $config
     */
    protected function registerConfig($config) {
        $this->container->set('config', function() use ($config){
            $config['services'] = [];
            $config['modules'] = [];
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

    /**
     *
     */
    protected function createServiceFactory() {
        $this->providersFactory = new ProvidersFactory($this->container);
    }

    /**
     *
     */
    protected function registerServices() {
        $config = $this->container->get('config');
        foreach ($config->services as $service) {
            $this->registerServiceProvider($service);
        }
    }

    protected function registerServiceProvider($service) {
        $serviceProvider = $this->providersFactory->getProvider($service);
        $serviceProvider->register();
    }

    protected function registerApplicationModules() {
        $config = $this->container->get('config');
        foreach ($config->modules as $module => $params) {
            $this->registerModule($module, $params);
        }
    }

    protected function registerModule($module, $params) {

    }
} 