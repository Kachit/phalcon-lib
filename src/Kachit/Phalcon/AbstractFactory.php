<?php
/**
 * Service providers factory
 *
 * @author Kachit
 * @package Kachit\Phalcon\ServiceProvider
 */
namespace Kachit\Phalcon;

abstract class AbstractFactory {

    /**
     * @var string
     */
    protected $namespace = __NAMESPACE__;

    /**
     * @param $name
     * @return object
     */
    public function getObject($name) {
        $className = $this->generateClassName($name);
        return $this->loadClass($className);
    }

    /**
     * @param $name
     * @return string
     */
    protected function generateClassName($name) {
        return $this->getNamespace() . '\\' . ucfirst($name);
    }

    /**
     * @return string
     */
    abstract protected function getNamespace();

    /**
     * @param $className
     * @return mixed
     */
    protected function loadClass($className) {
        return new $className();
    }
}