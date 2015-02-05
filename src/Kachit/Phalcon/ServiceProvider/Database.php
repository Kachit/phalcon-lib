<?php
/**
 * Database service provider
 * 
 * @author Kachit
 * @package Kachit\Phalcon\ServiceProvider
 */
namespace Kachit\Phalcon\ServiceProvider;

use Phalcon\DI\FactoryDefault as DI;
use Phalcon\Db\Adapter\Pdo\Mysql;

class Database extends AbstractProvider {

    /**
     * Register services
     */
    public function register() {
        $this->container->set('db', function() {
            return new Mysql($this->config->database->toArray());
        });
    }
}