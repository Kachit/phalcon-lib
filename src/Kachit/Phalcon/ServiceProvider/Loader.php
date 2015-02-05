<?php
/**
 * Session service provider
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
        $this->container->set('loader', function () {
            $loader = new PhalconLoader();
            $loader->registerNamespaces($this->config->autoload->namespaces);
            $loader->register();
            return $loader;
        });
    }
}