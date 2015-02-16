<?php
/**
 * Service providers factory
 *
 * @author Kachit
 * @package Kachit\Phalcon\ServiceProvider
 */
namespace Kachit\Phalcon\ServiceProvider;

use Phalcon\DI;

use Kachit\Phalcon\Common\Factory\AbstractFactory;

class Factory extends AbstractFactory {

    /**
     * @var DI
     */
    protected $di;

    /**
     * @param DI $di
     */
    public function __construct(DI $di) {
        $this->di = $di;
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
    protected function createObject($className) {
        return new $className($this->di);
    }

    /**
     * @return string
     */
    protected function getNamespace() {
        return __NAMESPACE__;
    }
}