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
            $view->setViewsDir($this->getViewsDir());
            $view->registerEngines($this->getEnginesList());
            return $view;
        });
    }

    /**
     * Get views dir
     *
     * @return string
     */
    protected function getViewsDir() {
        return $this->config->module->view->viewsDir;
    }

    /**
     * Get engines list
     *
     * @return array
     */
    protected function getEnginesList() {
        return $this->config->module->view->engines->toArray();
    }
}