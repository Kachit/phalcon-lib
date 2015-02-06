<?php
/**
 * Widgets
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Mvc;

use Phalcon\DI\Injectable;
use Phalcon\Config;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Http\ResponseInterface;

class Hmvc extends Injectable {

    /**
     * Does a HMVC request in the application
     *
     * @param array $location
     * @return mixed
     */
    public function request(array $location) {
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

        $dispatcher->dispatch();

        $response = $dispatcher->getReturnedValue();
        if ($response instanceof ResponseInterface) {
            return $response->getContent();
        }

        return $response;
    }

    /**
     * getDispatcher
     *
     * @return Dispatcher
     */
    protected function getDispatcher() {
        $dispatcher = new Dispatcher();
        $dispatcher->setDI($this->getDI());
        return $dispatcher;
    }

    /**
     * getConfig
     *
     * @return Config
     */
    protected function getConfig() {
        return $this->getDI()->get('config');
    }
}