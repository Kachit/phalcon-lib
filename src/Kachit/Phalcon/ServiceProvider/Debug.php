<?php
/**
 * Debug panel provider
 *
 * @author Kachit
 * @package Kachit\Phalcon\ServiceProvider
 */
namespace Kachit\Phalcon\ServiceProvider;

use Snowair\Debugbar\ServiceProvider;

class Debug extends AbstractProvider {

    /**
     * Register services
     */
    public function register() {
        $provider = new ServiceProvider();
        $provider->register();
        $provider->boot();
    }
}