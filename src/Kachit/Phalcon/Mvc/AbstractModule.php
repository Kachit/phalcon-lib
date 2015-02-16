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

abstract class AbstractModule implements ModuleDefinitionInterface {

    use InjectableTrait;

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