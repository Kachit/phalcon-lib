<?php
/**
 * Class Database
 * 
 * @author antoxa <kornilov@realweb.ru>
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