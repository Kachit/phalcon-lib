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
use Kachit\Phalcon\Config\Loader as ConfigLoader;
use Kachit\Phalcon\ServiceProvider\Factory as ProvidersFactory;

abstract class AbstractModule implements ModuleDefinitionInterface {

    use InjectableTrait;

    /**
     * @var ConfigLoader
     */
    protected $configLoader;

    /**
     * @var Config
     */
    protected $config;

    /**
     * Init
     */
    public function __construct() {
        $this->configLoader = new ConfigLoader();
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
        $services = $this->config->module->services->toArray();
        foreach ($services as $service) {
            $provider = $this->providersFactory->getProvider($service);
            $provider->register();
        }
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
        $config = $this->configLoader->load($this->getConfigPath());
        /* @var Config $globalConfig */
        $globalConfig = $this->getDi()->get('config');
        $globalConfig->merge($config);
        return $globalConfig;
    }
} 