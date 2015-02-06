<?php
/**
 * Bootstrap
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Bootstrap;

use Phalcon\Config;
use Phalcon\DI\FactoryDefault as DI;
use Phalcon\Mvc\Application;
use Kachit\Phalcon\ServiceProvider\Factory as ProvidersFactory;

abstract class AbstractBootstrap {

    /**
     * @var DI
     */
    protected $di;

    /**
     * @var Application
     */
    protected $application;

    /**
     * @var ProvidersFactory
     */
    protected $providersFactory;

    /**
     * @var Config
     */
    protected $config;

    /**
     * @param array $config
     */
    public function __construct(array $config) {
        $this->createDiContainer();
        $this->createApplication();
        $this->createServiceFactory();
        $this->createConfig($config);
    }

    /**
     * Init application
     *
     * @return $this
     */
    public function registerApplication() {
        $this->registerConfig();
        $this->registerServices();
        $this->registerModules();
        return $this->application;
    }

    /**
     * Create Ioc container
     */
    abstract protected function createDiContainer();

    /**
     * Create application
     */
    abstract protected function createApplication();

    /**
     * Register config
     */
    protected function registerConfig() {
        $this->di->set('config', function(){
            return $this->config;
        });
    }

    /**
     *
     */
    protected function createServiceFactory() {
        $this->providersFactory = new ProvidersFactory($this->di);
    }

    /**
     * Create config
     *
     * @param $config
     */
    protected function createConfig(array $config) {
        $this->config = new Config($config);
    }

    /**
     *
     */
    protected function registerServices() {
        foreach ($this->config->services->toArray() as $service) {
            $this->registerServiceProvider($service);
        }
    }

    /**
     * @param $service
     */
    protected function registerServiceProvider($service) {
        $serviceProvider = $this->providersFactory->getProvider($service);
        $serviceProvider->register();
    }

    /**
     *
     */
    protected function registerModules() {
        $this->application->registerModules($this->config->modules->toArray());
    }
} 