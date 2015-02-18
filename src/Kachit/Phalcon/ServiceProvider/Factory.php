<?php
/**
 * Service providers factory
 *
 * @author Kachit
 * @package Kachit\Phalcon\ServiceProvider
 */
namespace Kachit\Phalcon\ServiceProvider;

use Phalcon\DI;

use Kachit\Phalcon\Common\Factory\AbstractFactoryCascade;

class Factory extends AbstractFactoryCascade {

    /**
     * @var DI
     */
    protected $di;

    /**
     * Init
     *
     * @param DI $di
     */
    public function __construct(DI $di) {
        $this->di = $di;
    }

    /**
     * Get provider
     *
     * @param string $name
     * @return ServiceProviderInterface
     */
    public function getProvider($name) {
        return $this->getObject($name);
    }

    /**
     * Create object
     *
     * @param string $className
     * @return object
     */
    protected function createObject($className) {
        return new $className($this->di);
    }

    /**
     * Get namespace
     *
     * @return string
     */
    protected function getNamespaces() {
        return [__NAMESPACE__];
    }
}