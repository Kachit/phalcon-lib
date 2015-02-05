<?php
/**
 * Router service provider
 *
 * @author Kachit
 * @package Kachit\Phalcon\ServiceProvider
 */
namespace Kachit\Phalcon\ServiceProvider;

use Phalcon\Mvc\Router as PhalconRouter;

class Router extends AbstractProvider {

    /**
     * Register services
     */
    public function register() {
        $this->container->set('router', function () {
            $router = new PhalconRouter();
            $router->setDefaultModule($this->config->application->defaultModule);
            $router->setDefaultNamespace($this->config->application->defaultNamespace);
            $router->removeExtraSlashes($this->config->router->removeExtraSlashes);
            return $router;
        });
    }
}