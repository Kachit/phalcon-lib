<?php
/**
 * Cache service provider
 * 
 * @author Kachit
 * @package Kachit\Phalcon\ServiceProvider
 */
namespace Kachit\Phalcon\ServiceProvider;

use Phalcon\Cache\BackendInterface;
use Phalcon\Cache\FrontendInterface;
use Phalcon\DI;
use Phalcon\Config;

use Kachit\Phalcon\Cache\Frontend\Factory as FrontendFactory;
use Kachit\Phalcon\Cache\Backend\Factory as BackendFactory;

class Cache extends AbstractProvider {

    /**
     * @var FrontendFactory
     */
    protected $frontendFactory;

    /**
     * @var BackendFactory
     */
    protected $backendFactory;

    /**
     * @param DI $container
     */
    public function __construct(DI $container) {
        parent::__construct($container);
        $this->frontendFactory = new FrontendFactory();
        $this->backendFactory = new BackendFactory();
    }

    /**
     * Register services
     */
    public function register() {
        $this->container->set('cache', function() {
            return $this->getCacheAdapterBackend();
        });
    }

    /**
     * Get cache adapter backend
     *
     * @return BackendInterface
     */
    protected function getCacheAdapterBackend() {
        /* @var Config $cacheConfig */
        $cacheConfig = $this->config->cache->backend;
        $frontendAdapter = $this->getCacheAdapterFrontend();
        return $this->backendFactory->getAdapter($cacheConfig->adapter, $frontendAdapter, $cacheConfig->toArray());
    }

    /**
     * Get cache adapter frontend
     *
     * @return FrontendInterface
     */
    protected function getCacheAdapterFrontend() {
        /* @var Config $cacheConfig */
        $cacheConfig = $this->config->cache->frontend;
        return $this->frontendFactory->getAdapter($cacheConfig->adapter, $cacheConfig->toArray());
    }
}