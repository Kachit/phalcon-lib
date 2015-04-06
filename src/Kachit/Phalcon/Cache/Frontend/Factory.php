<?php
/**
 * Frontend cache adapters factory
 *
 * @author Kachit
 * @package Kachit\Phalcon\Cache\Frontend
 */
namespace Kachit\Phalcon\Cache\Frontend;

use Kachit\Phalcon\Common\Factory\AbstractFactory;
use Phalcon\Cache\FrontendInterface;

class Factory extends AbstractFactory {

    /**
     * @var array
     */
    protected $options = [];

    /**
     * Get cache adapter
     *
     * @param string $name
     * @param array $options
     * @return FrontendInterface
     */
    public function getAdapter($name, array $options) {
        $this->options = $options;
        return $this->getObject($name);
    }

    /**
     * Create new class
     *
     * @param string $className
     * @return FrontendInterface
     */
    protected function createObject($className) {
        return new $className($this->options);
    }

    /**
     * Get class namespace
     *
     * @return string
     */
    protected function getNamespace() {
        return 'Phalcon\Cache\Frontend';
    }
}