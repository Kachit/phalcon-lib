<?php
/**
 * Module
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Mvc;

use Phalcon\Loader,
    Phalcon\Config,
    Phalcon\Mvc\ModuleDefinitionInterface;

abstract class AbstractModule implements ModuleDefinitionInterface {

    /**
     * Registers an autoloader related to the module
     *
     * @param \Phalcon\DiInterface $dependencyInjector
     */
    public function registerAutoloaders() {
        // TODO: Implement registerAutoloaders() method.
    }

    /**
     * Registers services related to the module
     *
     * @param \Phalcon\DiInterface $dependencyInjector
     */
    public function registerServices($dependencyInjector) {
        // TODO: Implement registerServices() method.
    }
} 