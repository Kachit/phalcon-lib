<?php
/**
 * Service providers factory
 *
 * @author Kachit
 * @package Kachit\Phalcon\ServiceProvider
 */
namespace Kachit\Phalcon\ServiceProvider;

use Phalcon\DI\FactoryDefault as DI;
use Kachit\Phalcon\Common\AbstractFactory;

class Factory extends AbstractFactory {

    /**
     * @param DI $di
     */
    public function __construct(DI $di) {
        $this->container = $di;
    }

    /**
     * @param $name
     * @return ServiceProviderInterface
     */
    public function getProvider($name) {
        return $this->getObject($name);
    }

    /**
     * Create new class
     *
     * @param string $className
     * @return object
     */
    protected function createNewClass($className) {
        return new $className($this->container);
    }

    /**
     * @return string
     */
    protected function getNamespace() {
        return __NAMESPACE__;
    }


}