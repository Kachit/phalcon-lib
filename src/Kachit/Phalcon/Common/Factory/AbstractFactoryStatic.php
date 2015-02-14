<?php
/**
 * Abstract factory static
 *
 * @author Kachit
 * @package Kachit\Phalcon\Common
 */
namespace Kachit\Phalcon\Common\Factory;

abstract class AbstractFactoryStatic {

    /**
     * Get object
     *
     * @param $name
     * @return object
     */
    public static function getObject($name) {
        $className = static::generateClassName($name);
        return static::loadClass($className);
    }

    /**
     * Generate class name
     *
     * @param $name
     * @return string
     */
    protected static function generateClassName($name) {
        return static::getNamespace() . '\\' . static::filterClassName($name);
    }

    /**
     * Filter class name
     *
     * @param string $name
     * @return string
     */
    protected static function filterClassName($name) {
        return ucfirst(trim($name));
    }

    /**
     * Get class namespace
     *
     * @return string
     */
    protected static function getNamespace() {
        return __NAMESPACE__;
    }

    /**
     * Load class
     *
     * @param $className
     * @return mixed
     */
    protected static function loadClass($className) {
        if (!static::checkClassExists($className)) {
            static::handleError(static::getErrorMessageClassNotExists($className));
        }
        return static::createNewClass($className);
    }

    /**
     * Create new class
     *
     * @param string $className
     * @return object
     */
    protected static function createNewClass($className) {
        return new $className();
    }

    /**
     * Check class exists
     *
     * @param string $className
     * @return bool
     */
    protected static function checkClassExists($className) {
        return class_exists($className);
    }

    /**
     * Handle error
     *
     * @param string $message
     * @throws \Exception
     */
    protected static function handleError($message) {
        throw new \Exception($message);
    }

    /**
     * Get error message
     *
     * @param string $className
     * @return string
     */
    protected static function getErrorMessageClassNotExists($className) {
        return 'Class "' . $className . '" is not exists';
    }
}