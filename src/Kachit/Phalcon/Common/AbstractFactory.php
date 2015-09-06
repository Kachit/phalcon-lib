<?php
/**
 * Abstract factory
 * 
 * @author Kachit
 * @package Kachit\Phalcon\Common\Factory
 */
namespace Kachit\Phalcon\Common;

abstract class AbstractFactory {

    /**
     * @var string delimiter between class prefix and class name
     */
    protected $delimiter = '\\';

    /**
     * Get object
     *
     * @param string $name
     * @param array $arguments
     * @return object
     */
    public function getObject($name, array $arguments = []) {
        $className = $this->generateClassName($name);
        return $this->loadClass($className, $arguments);
    }

    /**
     * Generate class name
     *
     * @param string $name
     * @param string $namespace
     * @return string
     */
    protected function generateClassName($name, $namespace = null) {
        $namespace = ($namespace) ? $namespace : $this->getNamespace();
        return $namespace . $this->delimiter . $this->filterClassName($name) . $this->getClassSuffix();
    }

    /**
     * Get class suffix
     *
     * @return string
     */
    protected function getClassSuffix() {
        return '';
    }

    /**
     * Get class suffix
     *
     * @return string
     */
    protected function getClassPrefix() {
        return '';
    }

    /**
     * Filter class name
     *
     * @param string $name
     * @return string
     */
    protected function filterClassName($name) {
        return ucfirst(trim($name));
    }

    /**
     * Load class
     *
     * @param string $className
     * @param array $arguments
     * @return object
     */
    protected function loadClass($className, array $arguments = []) {
        if (!$this->checkClassExists($className)) {
            $this->handleError($this->getErrorMessageClassNotExists($className));
        }
        return $this->createObject($className, $arguments);
    }

    /**
     * Create object
     *
     * @param string $className
     * @param array $arguments
     * @return object
     */
    protected function createObject($className, array $arguments = []) {
        if ($arguments) {
            $reflection = $this->getClassReflection($className);
            $object = $reflection->newInstanceArgs($arguments);
        } else {
            $object = new $className();
        }
        return $object;
    }

    /**
     * Check class exists
     *
     * @param string $className
     * @return bool
     */
    protected function checkClassExists($className) {
        return class_exists($className);
    }

    /**
     * Handle error
     *
     * @param string $message
     * @throws \Exception
     */
    protected function handleError($message) {
        throw new \Exception($message);
    }

    /**
     * Get error message
     *
     * @param string $className
     * @return string
     */
    protected function getErrorMessageClassNotExists($className) {
        return 'Class "' . $className . '" is not exists';
    }

    /**
     * Get class reflection
     *
     * @param string $className
     * @return \ReflectionClass
     */
    protected function getClassReflection($className) {
        return new \ReflectionClass($className);
    }
}