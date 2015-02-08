<?php
/**
 * CLI bootstrap application loader
 *
 * @author Kachit
 * @package Kachit\Phalcon\Bootstrap
 */
namespace Kachit\Phalcon\Bootstrap;

use Phalcon\DI\FactoryDefault\CLI as DI;
use Phalcon\CLi\Console;

class Cli extends AbstractBootstrap {

    /**
     * Create Ioc container
     */
    protected function createDiContainer() {
        $this->di = new DI();
    }

    /**
     * Create application
     */
    protected function createApplication() {
        $this->application = new Console($this->di);
    }
}