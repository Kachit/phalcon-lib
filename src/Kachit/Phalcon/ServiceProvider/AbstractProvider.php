<?php
/**
 * Abstract service provider
 * 
 * @author Kachit
 * @package Kachit\Phalcon\ServiceProvider
 */
namespace Kachit\Phalcon\ServiceProvider;

use Phalcon\DI\FactoryDefault as DI;
use Phalcon\Config;

abstract class AbstractProvider implements ServiceProviderInterface {

    /**
     * @var DI
     */
    protected $container;

    /**
     * @var Config
     */
    protected $config;

    /**
     * @param DI $container
     */
    public function __construct(DI $container) {
        $this->container = $container;
        $this->config = $container->get('config');
    }
}