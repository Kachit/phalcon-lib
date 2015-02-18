<?php
/**
 * Widgets
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Hmvc;

use Phalcon\Config;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Http\ResponseInterface;

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

        $module = ($location['module']) ? $location['module'] : $config->defaultModule;
        $controller = ($location['controller']) ? $location['controller'] : $config->defaultController;
        $action = ($location['action']) ? $location['action'] : $config->defaultAction;
        $params = ($location['params']) ? (array) $location['params'] : [];

        $dispatcher->setModuleName($module);
        $dispatcher->setControllerName($controller);
        $dispatcher->setActionName($action);
        $dispatcher->setParams($params);
        /* @var \Phalcon\Mvc\Controller $dispatchedController */
        $dispatchedController = $dispatcher->dispatch();
        return $dispatchedController->response->getContent();
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