<?php
/**
 * Database service provider
 * 
 * @author Kachit
 * @package Kachit\Phalcon\ServiceProvider
 */
namespace Kachit\Phalcon\ServiceProvider;

use Phalcon\DI;
use Phalcon\Config;

use Kachit\Phalcon\Db\Adapter\Pdo\Factory as AdaptersFactory;

class Database extends AbstractProvider {

    /**
     * @var Factory
     */
    protected $dbAdaptersFactory;

    /**
     * @param DI $container
     */
    public function __construct(DI $container) {
        parent::__construct($container);
        $this->dbAdaptersFactory = new AdaptersFactory();
    }

    /**
     * Register services
     */
    public function register() {
        $this->container->set('db', function() {
            /* @var Config $dbConfig */
            $dbConfig = $this->config->database;
            return $this->dbAdaptersFactory->getAdapter($dbConfig->adapter, $dbConfig->toArray());
        });
    }
}