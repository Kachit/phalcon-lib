<?php
/**
 * Database adapters factory
 *
 * @author Kachit
 * @package Kachit\Phalcon\Db\Adapter\Pdo
 */
namespace Kachit\Phalcon\Db\Adapter\Pdo;

use Kachit\Phalcon\Common\Factory\AbstractFactory;
use Phalcon\Db\Adapter\Pdo;

class Factory extends AbstractFactory {

    /**
     * @var array pdo connection params
     */
    protected $options = [];

    /**
     * Get adapter
     *
     * @param string $name
     * @param array $options
     * @return object
     */
    public function getAdapter($name, array $options) {
        $this->options = $options;
        return $this->getObject($name);
    }
    /**
     * Get namespace
     *
     * @return string
     */
    protected function getNamespace() {
        return 'Phalcon\Db\Adapter\Pdo';
    }

    /**
     * Create new class
     *
     * @param string $className
     * @return object
     */
    protected function createNewClass($className) {
        return new $className($this->options);
    }
}