<?php
/**
 * Class AbstractFactoryTestable
 */
namespace Kachit\Phalcon\Testable\Common\Factory;

use Kachit\Phalcon\Common\Factory\AbstractFactory;

class AbstractFactoryTestable extends AbstractFactory {

    /**
     * @var
     */
    protected $classSuffix;

    /**
     * Get class namespace
     *
     * @return string
     */
    protected function getNamespace() {
        return 'Foo';
    }

    /**
     * Generate class name
     *
     * @param string $name
     * @param string $namespace
     * @return string
     */
    public function generateClassName($name, $namespace = null) {
        return parent::generateClassName($name, $namespace);
    }

    /**
     * Filter class name
     *
     * @param string $name
     * @return string
     */
    public function filterClassName($name) {
        return parent::filterClassName($name);
    }

    /**
     * Create new class
     *
     * @param string $className
     * @return object
     */
    public function createObject($className) {
        return parent::createObject($className);
    }

    /**
     * Check class exists
     *
     * @param string $className
     * @return bool
     */
    public function checkClassExists($className) {
        return parent::checkClassExists($className);
    }

    /**
     * Load class
     *
     * @param string $className
     * @return object
     */
    public function loadClass($className) {
        return parent::loadClass($className);
    }

    /**
     * @return string
     */
    protected function getClassSuffix() {
        return $this->classSuffix;
    }

    /**
     * Set classSuffix
     *
     * @param mixed $classSuffix
     * @return $this;
     */
    public function setClassSuffix($classSuffix) {
        $this->classSuffix = $classSuffix;
        return $this;
    }
}