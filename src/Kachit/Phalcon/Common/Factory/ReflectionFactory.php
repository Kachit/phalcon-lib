<?php
/**
 * Abstract reflection factory
 * 
 * @author Kachit
 * @package Kachit\Phalcon\Common\Factory
 */
namespace Kachit\Phalcon\Common\Factory;

abstract class ReflectionFactory extends AbstractFactory {

    /**
     * Get class reflection
     *
     * @param string $className
     * @return \ReflectionClass
     */
    protected function getClassReflection($className) {
        return new \ReflectionClass($className);
    }

    /**
     * Create object
     *
     * @param string $className
     * @return object
     */
    protected function createObject($className) {
        $reflection = $this->getClassReflection($className);
        return $reflection->newInstanceArgs($this->getConstructorArguments());
    }

    /**
     * Get new instance constructor arguments
     *
     * @return array
     */
    protected function getConstructorArguments() {
        return [];
    }
}