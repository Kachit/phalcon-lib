<?php
/**
 * Abstract module loader
 *
 * @author Kachit
 * @package Kachit\Phalcon\Mvc
 */
namespace Kachit\Phalcon\Mvc;

use Phalcon\Loader,
    Phalcon\Config,
    Phalcon\DiInterface,
    Phalcon\Mvc\ModuleDefinitionInterface;

abstract class AbstractModule implements ModuleDefinitionInterface {

    /**
     * Registers an autoloader related to the module
     */
    public function registerAutoloaders() {
        // TODO: Implement registerAutoloaders() method.
    }

    /**
     * Registers services related to the module
     *
     * @param DiInterface $dependencyInjector
     */
    public function registerServices($dependencyInjector) {
        // TODO: Implement registerServices() method.
    }
} 