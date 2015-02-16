<?php
/**
 * Class AbstractFactoryTestable
 */
namespace Kachit\Phalcon\Testable\Common\Factory;

use Kachit\Phalcon\Common\Factory\AbstractFactoryCascade;

class AbstractFactoryCascadeTestable extends AbstractFactoryCascade {

    /**
     * @var array
     */
    protected $namespaces;

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
     * Check class exists
     *
     * @param string $className
     * @return bool
     */
    public function checkClassExists($className) {
        return parent::checkClassExists($className);
    }

    /**
     * Get class namespaces
     *
     * @return array
     */
    protected function getNamespaces() {
        return $this->namespaces;
    }

    /**
     * @param array $namespaces
     * @return $this
     */
    public function setNamespaces($namespaces) {
        $this->namespaces = $namespaces;
        return $this;
    }
}