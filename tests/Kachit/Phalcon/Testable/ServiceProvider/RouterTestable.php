<?php
/**
 * RouterTestable
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Testable\ServiceProvider;

use Kachit\Phalcon\ServiceProvider\Router;

use Phalcon\Mvc\Router as PhalconRouter;
use Phalcon\DI;
use Phalcon\Mvc\Router\Group as RoutesGroup;

class RouterTestable extends Router {

    /**
     * Register routes for all modules
     */
    public function registerRoutes() {
        parent::registerRoutes();
    }

    /**
     * Get routes file
     *
     * @param $path
     * @return array
     */
    public function getRoutesFile($path) {
        return parent::getRoutesFile($path);
    }

    /**
     * @param array $groupParams
     * @return RoutesGroup
     */
    public function registerRoutesGroup(array $groupParams) {
        return parent::registerRoutesGroup($groupParams);
    }

    /**
     * Register route
     *
     * @param array $routeParams
     * @param RoutesGroup $router
     * @return PhalconRouter\Route
     */
    public function registerRoute(array $routeParams, $router = null) {
        return parent::registerRoute($routeParams, $router);
    }

    /**
     * Register single routes for module
     *
     * @param array $params
     */
    public function registerModuleRoutes(array $params) {
        parent::registerModuleRoutes($params);
    }

    /**
     * Register group of routes for module
     *
     * @param array $params
     */
    public function registerModuleRouteGroups(array $params) {
        parent::registerModuleRouteGroups($params);
    }
}