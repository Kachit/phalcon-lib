<?php
/**
 * Abstract module loader
 *
 * @author Kachit
 * @package Kachit\Phalcon\Mvc
 */
namespace Kachit\Phalcon\Mvc;

use Phalcon\Loader;
use Phalcon\Config;
use Phalcon\DiInterface;
use Phalcon\Mvc\ModuleDefinitionInterface;

use Kachit\Phalcon\DI\InjectableTrait;
use Kachit\Phalcon\Config\LoaderTrait;
use Kachit\Phalcon\ServiceProvider\Factory as ProvidersFactory;

abstract class AbstractModule implements ModuleDefinitionInterface {

    use InjectableTrait;
    use LoaderTrait;

    /**
     * @var Config
     */
    protected $config;

    /**
     * Init
     */
    public function __construct() {
        $this->config = $this->getModuleConfig();
        $this->providersFactory = new ProvidersFactory($this->getDi());
    }

    /**
     * Registers an autoloader related to the module
     */
    public function registerAutoloaders() {
        $loader = $this->getLoader();
        $loader->registerNamespaces($this->config->module->loader->namespaces->toArray());
        $loader->register();
    }

    /**
     * Registers services related to the module
     *
     * @param DiInterface $dependencyInjector
     */
    public function registerServices($dependencyInjector) {
        $this->registerAvailableServices();
        $this->registerCustomServices();

    }

    /**
     * Register services available in module config
     */
    protected function registerAvailableServices() {
        $services = $this->config->module->services->toArray();
        foreach ($services as $service) {
            $provider = $this->providersFactory->getProvider($service);
            $provider->register();
        }
    }

    /**
     * Register custom services
     */
    protected function registerCustomServices() {

    }

    /**
     * Get config file path
     *
     * @return string
     */
    abstract protected function getConfigPath();

    /**
     * Get loader
     *
     * @return Loader
     */
    protected function getLoader() {
        return new Loader();
    }

    /**
     * Get module config
     *
     * @return Config
     */
    protected function getModuleConfig() {
        $config = $this->getConfigLoader()->load($this->getConfigPath());
        /* @var Config $globalConfig */
        $globalConfig = $this->getDi()->get('config');
        $globalConfig->merge($config);
        return $globalConfig;
    }
} 