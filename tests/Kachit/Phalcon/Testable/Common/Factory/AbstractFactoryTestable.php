<?php
/**
 * Class AbstractFactoryTestable
 */
namespace Kachit\Phalcon\Testable\Common\Factory;

use Kachit\Phalcon\Common\Factory\AbstractFactory;

class AbstractFactoryTestable extends AbstractFactory {

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
     * @param $name
     * @return string
     */
    public function generateClassName($name) {
        return parent::generateClassName($name);
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
    public function createNewClass($className) {
        return parent::createNewClass($className);
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
}