<?php
/**
 * Class ServiceProviderInterface
 * 
 * @author antoxa <kornilov@realweb.ru>
 * @package Kachit\Phalcon\ServiceProvider
 */
namespace Kachit\Phalcon\ServiceProvider;

interface ServiceProviderInterface {

    /**
     * Register services
     */
    public function register();
}