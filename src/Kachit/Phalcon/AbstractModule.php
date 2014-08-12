<?php
/**
 * Module
 *
 * @author Kachit
 */
namespace Kachit\Phalcon;

use Phalcon\Loader,
    Phalcon\Mvc\Dispatcher,
    Phalcon\Mvc\View,
    Phalcon\Mvc\View\Engine\Volt,
    Phalcon\Config,
    Phalcon\Mvc\ModuleDefinitionInterface;

use Kachit\Phalcon\Traits\ConfigTrait;

abstract class AbstractModule implements ModuleDefinitionInterface {

    /**
     * @var Loader
     */
    protected $loader;

    /**
     * Init
     */
    public function __construct() {
        $this->config = new Config($this->getConfigFile());
    }

    /**
     * Registers an autoloader related to the module
     */
    public function registerAutoloaders() {
        $this->getLoader()->registerNamespaces($this->config->namespaces->toArray());
        $this->getLoader()->register();
    }

    /**
     * Registers services related to the module
     *
     * @param DI $dependencyInjector
     */
    public function registerServices($dependencyInjector) {
        $this->initConfig($dependencyInjector);
        // Register dispatcher
        $this->registerDispatcher($dependencyInjector);
        // Register view
        //$this->registerVolt($dependencyInjector);
        $this->registerView($dependencyInjector);
    }

    /**
     * getConfigPath
     *
     * @return string
     */
    abstract protected function getConfigFile();

    /**
     * Get loader
     *
     * @return Loader
     */
    protected function getLoader() {
        if (empty($this->loader)) {
            $this->loader = new Loader();
        }
        return $this->loader;
    }

    /**
     * Init config
     *
     * @param DI $dependencyInjector
     * @return $this
     */
    protected function initConfig(DI $dependencyInjector) {
        $dependencyInjector->getConfig()->merge($this->config->application);
        return $this;
    }

    /**
     * registerView
     *
     * @param DI $dependencyInjector
     * @return $this
     */
    protected function registerView(DI $dependencyInjector) {
        $dependencyInjector->setView(function() use ($dependencyInjector) {
                $view = new View();
                $view->setViewsDir($this->config->view->viewsDir);
                $view->registerEngines([
                        '.volt' => function($view , $dependencyInjector) {
                                $volt = new Volt($view, $dependencyInjector);
                                $volt->setOptions($this->config->volt->toArray());
                                return $volt;
                            }
                    ]);
                return $view;
            });
        return $this;
    }

    /**
     * registerDispatcher
     *
     * @param DI $dependencyInjector
     * @return $this
     */
    protected function registerDispatcher(DI $dependencyInjector) {
        $dependencyInjector->setDispatcher(function() {
                $dispatcher = new Dispatcher();
                $dispatcher->setDefaultNamespace($this->config->defaultNamespace);
                return $dispatcher;
            });
        return $this;
    }
} 