<?php
/**
 * Router service provider
 *
 * @author Kachit
 * @package Kachit\Phalcon\ServiceProvider
 */
namespace Kachit\Phalcon\ServiceProvider;

use Phalcon\Mvc\Router as PhalconRouter;
use Phalcon\DI;
use Phalcon\Mvc\Router\Group as RoutesGroup;

use Kachit\Phalcon\Config\Loader as ConfigLoader;

class Router extends AbstractProvider {

    /**
     * @var PhalconRouter
     */
    protected $router;

    /**
     * @var ConfigLoader
     */
    protected $configLoader;

    /**
     * Init
     *
     * @param DI $container
     */
    public function __construct(DI $container) {
        parent::__construct($container);
        $this->configLoader = new ConfigLoader();
        $this->router = new PhalconRouter();
    }

    /**
     * Register services
     */
    public function register() {
        $this->container->set('router', function () {
            //set router options
            $this->router->setDefaultModule($this->config->application->defaultModule);
            $this->router->setDefaultNamespace($this->config->application->defaultNamespace);
            $this->router->removeExtraSlashes($this->config->router->removeExtraSlashes);

            //register routes for all modules
            $this->registerRoutes();
            return $this->router;
        });
    }

    /**
     * Register routes for all modules
     */
    protected function registerRoutes() {
        foreach ($this->config->modules->toArray() as $module => $params) {
            if (isset($params['routes'])) {
                $routes = $this->getRoutesFile($params['routes']);
                $this->registerModuleRoutes($routes);
                $this->registerModuleRouteGroups($routes);
            }
        }
    }

    /**
     * Get routes file
     *
     * @param string $path
     * @return array
     */
    protected function getRoutesFile($path) {
        return (is_file($path)) ? $this->configLoader->load($path)->toArray() : [];
    }

    /**
     * Register routes group
     *
     * @param array $groupParams
     * @return RoutesGroup
     */
    protected function registerRoutesGroup(array $groupParams) {
        $paths = ['module' => $groupParams['module'], 'namespace' => $groupParams['namespace'],];
        $routeGroup = new RoutesGroup($paths);
        $routeGroup->setPrefix($groupParams['prefix']);
        if (isset($groupParams['name'])) {
            $routeGroup->setName($groupParams['name']);
        }
        if (isset($groupParams['hostname'])) {
            $routeGroup->setName($groupParams['hostname']);
        }
        foreach ($groupParams['routes'] as $routeParams) {
            $this->registerRoute($routeParams, $routeGroup);
        }
        return $routeGroup;
    }

    /**
     * Register route
     *
     * @param array $routeParams
     * @param RoutesGroup $router
     * @return PhalconRouter\Route
     */
    protected function registerRoute(array $routeParams, $router = null) {
        $router = ($router) ? $router : $this->router;
        $httpMethods = (isset($routeParams['methods'])) ? $routeParams['methods'] : null;
        $route = $router->add($routeParams['pattern'], $routeParams['params'], $httpMethods);
        if (isset($routeParams['name'])) {
            $route->setName($routeParams['name']);
        }
        if (isset($routeParams['hostname'])) {
            $route->setName($routeParams['hostname']);
        }
        return $route;
    }

    /**
     * Register single routes for module
     *
     * @param array $params
     */
    protected function registerModuleRoutes(array $params) {
        if (!isset($params['routes'])) {
            return;
        }
        foreach ($params['routes'] as $route) {
            $this->registerRoute($route);
        }
    }

    /**
     * Register group of routes for module
     *
     * @param array $params
     */
    protected function registerModuleRouteGroups(array $params) {
        if (!isset($params['groups'])) {
            return;
        }
        foreach ($params['groups'] as $group) {
            $routeGroup = $this->registerRoutesGroup($group);
            $this->router->mount($routeGroup);
        }
    }
}