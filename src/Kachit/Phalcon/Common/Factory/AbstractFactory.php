<?php
/**
 * Abstract factory
 *
 * @author Kachit
 * @package Kachit\Phalcon\Common
 */
namespace Kachit\Phalcon\Common\Factory;

abstract class AbstractFactory {

    /**
     * Get object
     *
     * @param string $name
     * @return object
     */
    public function getObject($name) {
        $className = $this->generateClassName($name);
        return $this->loadClass($className);
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
        return $namespace . '\\' . $this->filterClassName($name);
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
     * Get class namespace
     *
     * @return string
     */
    abstract protected function getNamespace();

    /**
     * Load class
     *
     * @param string $className
     * @return object
     */
    protected function loadClass($className) {
        if (!$this->checkClassExists($className)) {
            $this->handleError($this->getErrorMessageClassNotExists($className));
        }
        return $this->createObject($className);
    }

    /**
     * Create object
     *
     * @param string $className
     * @return object
     */
    protected function createObject($className) {
        return new $className();
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
}