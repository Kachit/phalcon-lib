<?php
/**
 * View service provider
 * 
 * @author Kachit
 * @package Kachit\Phalcon\ServiceProvider
 */
namespace Kachit\Phalcon\ServiceProvider;

use Phalcon\Mvc\View as PhalconView;

class View extends AbstractProvider {

    /**
     * Register services
     */
    public function register() {
        $this->container->set('view', function() {
            $view = new PhalconView();
            $view->setViewsDir($this->config->viewDir);
            return $view;
        });
    }
}