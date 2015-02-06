<?php
/**
 * CLI bootstrap application loader
 * 
 * @author antoxa <kornilov@realweb.ru>
 */
namespace Kachit\Phalcon\Bootstrap;

use Phalcon\DI\FactoryDefault\CLI as DI;
use Phalcon\CLi\Console;

class Cli extends AbstractBootstrap {

    /**
     * Register container
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