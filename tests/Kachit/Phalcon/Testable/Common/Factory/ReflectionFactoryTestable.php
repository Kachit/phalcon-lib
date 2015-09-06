<?php
/**
 * Class ReflectionFactoryTestable
 * 
 * @author Kachit
 * @package Kachit\Phalcon\Testable\Common\Factory
 */
namespace Kachit\Phalcon\Testable\Common\Factory;

use Kachit\Phalcon\Common\Factory\ReflectionFactory;

class ReflectionFactoryTestable extends ReflectionFactory {

    /**
     * @var string
     */
    protected $namespace = '';

    /**
     * @var array
     */
    protected $arguments = [];


    /**
     * Get class namespace
     *
     * @return string
     */
    protected function getNamespace() {
        return $this->namespace;
    }

    /**
     * @param string $namespace
     * @return $this
     */
    public function setNamespace($namespace) {
        $this->namespace = $namespace;
        return $this;
    }

    /**
     * Get new instance constructor arguments
     *
     * @return array
     */
    protected function getConstructorArguments() {
        return $this->arguments;
    }

    /**
     * @param array $arguments
     * @return $this
     */
    public function setArguments($arguments) {
        $this->arguments = $arguments;
        return $this;
    }
}