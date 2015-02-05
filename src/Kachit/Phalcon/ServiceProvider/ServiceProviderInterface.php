<?php
/**
 * Service provider interface
 * 
 * @author Kachit
 * @package Kachit\Phalcon\ServiceProvider
 */
namespace Kachit\Phalcon\ServiceProvider;

interface ServiceProviderInterface {

    /**
     * Register services
     */
    public function register();
}