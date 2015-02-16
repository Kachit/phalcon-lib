<?php
/**
 * Abstract factory with cascade loading
 *
 * @author Kachit
 * @package Kachit\Phalcon\Common
 */
namespace Kachit\Phalcon\Common\Factory;

abstract class AbstractFactoryCascade extends AbstractFactory {

    /**
     * Get object
     *
     * @param string $name
     * @return object
     */
    public function getObject($name) {
        $object = null;
        foreach ($this->getNamespaces() as $namespace) {
            $className = $this->generateClassName($name, $namespace);
            $object = $this->loadClass($className);
            if ($object) {
                break;
            }
        }
        if (!$object) {
            $this->handleError($this->getErrorMessageClassNotExists($name));
        }
        return $object;
    }

    /**
     * Get class namespaces
     *
     * @return array
     */
    abstract protected function getNamespaces();

    /**
     * Load class
     *
     * @param string $className
     * @return object
     */
    protected function loadClass($className) {
        if (!$this->checkClassExists($className)) {
            return false;
        }
        return $this->createNewClass($className);
    }

    /**
     * Get error message
     *
     * @param string $className
     * @return string
     */
    protected function getErrorMessageClassNotExists($className) {
        return 'Class "' . $className . '" is not exists in this namespaces ' . json_encode($this->getNamespaces());
    }

    /**
     * Get class namespace
     *
     * @return string
     */
    protected function getNamespace() {

    }
}