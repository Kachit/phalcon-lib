<?php
/**
 * Class loader provider
 *
 * @author Kachit
 * @package Kachit\Phalcon\ServiceProvider
 */
namespace Kachit\Phalcon\ServiceProvider;

use Phalcon\Loader as PhalconLoader;

class Loader extends AbstractProvider {

    /**
     * Register services
     */
    public function register() {
        $loader = new PhalconLoader();
        $loader->registerNamespaces($this->config->loader->namespaces->toArray());
        $loader->register();
        $this->container->set('loader', function () use ($loader){
            return $loader;
        });
    }
}