<?php
/**
 * Hmvc request
 *
 * @author Kachit
 * @package Kachit\Phalcon\DI
 */
namespace Kachit\Phalcon\Hmvc;

use Phalcon\Config;
use Phalcon\Mvc\Dispatcher;

use Kachit\Phalcon\DI\InjectableTrait;

class Request {

    use InjectableTrait;

    /**
     * Does a HMVC request in the application
     *
     * @param array $location
     * @return mixed
     */
    public function get(array $location) {
        $dispatcher = $this->getDispatcher();
        $config = $this->getConfig();

        $namespace = ($location['namespace']) ? $location['namespace'] : $dispatcher->getNamespaceName();
        $controller = ($location['controller']) ? $location['controller'] : $config->application->defaultController;
        $action = ($location['action']) ? $location['action'] : $config->application->defaultAction;
        $params = ($location['params']) ? (array) $location['params'] : [];

        $dispatcher->setNamespaceName($namespace);
        $dispatcher->setControllerName($controller);
        $dispatcher->setActionName($action);
        $dispatcher->setParams($params);
        try {
            /* @var \Phalcon\Mvc\Controller $dispatchedController */
            $dispatchedController = $dispatcher->dispatch();
            $content = $dispatchedController->response->getContent();
        } catch (\Exception $exception) {
            $content = $exception->getMessage();
        }
        return $content;
    }

    /**
     * Get dispatcher
     *
     * @return Dispatcher
     */
    protected function getDispatcher() {
        $dispatcher = clone $this->getDI()->get('dispatcher');
        return $dispatcher;
    }

    /**
     * Get config
     *
     * @return Config
     */
    protected function getConfig() {
        return $this->getDI()->get('config');
    }
}