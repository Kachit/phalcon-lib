<?php
/**
 * Bootstrap application loader
 *
 * @author Kachit
 * @package Kachit\Phalcon\Bootstrap
 */
namespace Kachit\Phalcon\Bootstrap;

use Phalcon\Config;
use Phalcon\DI;
use Phalcon\Mvc\Application;

use Kachit\Phalcon\ServiceProvider\Factory as ProvidersFactory;
use Kachit\Phalcon\Config\LoaderTrait;

abstract class AbstractBootstrap {

    use LoaderTrait;

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
     * @var array default services
     */
    protected $defaultServices = [];

    /**
     * Init
     *
     * @param string $configPath
     */
    public function __construct($configPath) {
        $this->createConfig($configPath);
        $this->createDiContainer();
        $this->createApplication();
        $this->createServiceFactory();
    }

    /**
     * Init application
     *
     * @return Application
     */
    public function registerApplication() {
        $this->registerConfig();
        $this->registerServices();
        $this->registerModules();
        $this->application->setDI($this->di);
        return $this->application;
    }

    /**
     * Set DI
     *
     * @param DI $di
     */
    public function setDi(DI $di) {
        $this->di = $di;
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
     * Create services factory
     */
    protected function createServiceFactory() {
        $this->providersFactory = new ProvidersFactory($this->di);
    }

    /**
     * Create config
     *
     * @param string $configPath
     */
    protected function createConfig($configPath) {
        $this->config = $this->getConfigLoader()->load($configPath);
    }

    /**
     * Register services
     */
    protected function registerServices() {
        $services = $this->getServicesList();
        foreach ($services as $service) {
            $this->registerServiceProvider($service);
        }
    }

    /**
     * Register single service provider
     *
     * @param string $service
     */
    protected function registerServiceProvider($service) {
        $serviceProvider = $this->providersFactory->getProvider($service);
        $serviceProvider->register();
    }

    /**
     * Register modules
     */
    protected function registerModules() {
        $modules = $this->getModulesList();
        $this->application->registerModules($modules);
    }

    /**
     * Get modules list
     *
     * @return array
     */
    protected function getModulesList() {
        return $this->config->modules->toArray();
    }

    /**
     * Get services list
     *
     * @return array
     */
    protected function getServicesList() {
        return array_merge($this->defaultServices, $this->config->services->toArray());
    }
} 