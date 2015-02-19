<?php
/**
 * CacheTestable
 *
 * @author Kachit
 * @package Kachit\Phalcon\Testable\ServiceProvider
 */
namespace Kachit\Phalcon\Testable\ServiceProvider;

use Kachit\Phalcon\ServiceProvider\Cache;

class CacheTestable extends Cache {

    /**
     * @return \Phalcon\Cache\BackendInterface
     */
    protected function getCacheAdapterBackend() {
        return parent::getCacheAdapterBackend();
    }

    /**
     * @return \Phalcon\Cache\FrontendInterface
     */
    protected function getCacheAdapterFrontend() {
        return parent::getCacheAdapterFrontend();
    }
}