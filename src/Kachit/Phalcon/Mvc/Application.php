<?php
/**
 * Application
 *
 * @author Kachit
 *
 * @method Kachit\Phalcon\DI getDI()
 */
namespace Kachit\Phalcon\Mvc;

use Kachit\Phalcon\DI;
use Phalcon\Mvc\Application as PhalconApp;
use Phalcon\Http\ResponseInterface;

class Application extends PhalconApp {

    /**
     * @param DI $di
     */
    public function __construct(DI $di){
        $di['app'] = $this;
        parent::__construct($di);
    }

    /**
     * Does a HMVC request in the application
     *
     * @param array $location
     * @return mixed
     */
    public function request(array $location) {
        $dispatcher = clone $this->getDI()->getDispatcher();
        $config = $this->getDI()->getConfig();

        $module = ($location['module']) ? $location['module'] : $config->defaultModule;
        $controller = ($location['controller']) ? $location['controller'] : $config->defaultController;
        $action = ($location['controller']) ? $location['controller'] : $config->defaultAction;
        $params = ($location['params']) ? $location['params'] : [];

        if (!is_array($params)) {
            $params = (array) $params;
        }

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
     * Returns the internal dependency injector
     *
     * @return DI
     */
    public function getDI(){
        return parent::getDI();
    }
} 