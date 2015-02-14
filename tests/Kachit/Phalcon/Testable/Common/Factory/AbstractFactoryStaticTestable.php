<?php
/**
 * Class AbstractFactoryTestable
 */
namespace Kachit\Phalcon\Testable\Common\Factory;

use Kachit\Phalcon\Common\Factory\AbstractFactoryStatic;

class AbstractFactoryStaticTestable extends AbstractFactoryStatic {

    /**
     * Get class namespace
     *
     * @return string
     */
    protected static function getNamespace() {
        return 'Foo';
    }

    /**
     * Generate class name
     *
     * @param $name
     * @return string
     */
    public static function generateClassName($name) {
        return parent::generateClassName($name);
    }

    /**
     * Filter class name
     *
     * @param string $name
     * @return string
     */
    public static function filterClassName($name) {
        return parent::filterClassName($name);
    }

    /**
     * Create new class
     *
     * @param string $className
     * @return object
     */
    public static function createNewClass($className) {
        return parent::createNewClass($className);
    }

    /**
     * Check class exists
     *
     * @param string $className
     * @return bool
     */
    public static function checkClassExists($className) {
        return parent::checkClassExists($className);
    }
}