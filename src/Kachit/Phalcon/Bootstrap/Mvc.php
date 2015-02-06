<?php
/**
 * MVC bootstrap application loader
 * 
 * @author antoxa <kornilov@realweb.ru>
 */
namespace Kachit\Phalcon\Bootstrap;

use Phalcon\DI\FactoryDefault as DI;
use Phalcon\Mvc\Application;

class Mvc extends AbstractBootstrap {

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
        $this->application = new Application($this->di);
    }
}