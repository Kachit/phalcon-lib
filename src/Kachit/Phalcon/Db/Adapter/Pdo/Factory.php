<?php
/**
 * Database adapters factory
 *
 * @author Kachit
 * @package Kachit\Phalcon\Db\Adapter\Pdo
 */
namespace Kachit\Phalcon\Db\Adapter\Pdo;

use Kachit\Phalcon\Common\AbstractFactory;
use Phalcon\Db\Adapter\Pdo;

class Factory extends AbstractFactory {

    /**
     * @var array pdo connection params
     */
    protected $params = [];

    /**
     * @param array $params
     */
    public function __construct(array $params) {
        $this->params = $params;
    }

    /**
     * Get adapter
     *
     * @param string $name
     * @return Pdo
     */
    public function getAdapter($name) {
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
        return new $className($this->params);
    }
}