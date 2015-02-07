<?php
/**
 * Abstract factory
 *
 * @author Kachit
 * @package Kachit\Phalcon\Common
 */
namespace Kachit\Phalcon\Common;

abstract class AbstractFactory {

    /**
     * @param $name
     * @return object
     */
    public function getObject($name) {
        $className = $this->generateClassName($name);
        return $this->loadClass($className);
    }

    /**
     * Generate class name
     *
     * @param $name
     * @return string
     */
    protected function generateClassName($name) {
        return $this->getNamespace() . '\\' . $this->filterClassName($name);
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
     * @param $className
     * @return mixed
     */
    protected function loadClass($className) {
        if (!$this->checkClassExists($className)) {
            $this->handleError($this->getErrorMessageClassNotExists($className));
        }
        return $this->createNewClass($className);
    }

    /**
     * Create new class
     *
     * @param string $className
     * @return object
     */
    protected function createNewClass($className) {
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