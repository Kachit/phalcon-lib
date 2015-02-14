<?php
/**
 * Entities factory
 *
 * @author Kachit
 * @package Kachit\Phalcon\Mvc\Model\Entity
 */
namespace Kachit\Phalcon\Mvc\Model\Entity;

use Kachit\Phalcon\Common\Factory\AbstractFactory;
use Phalcon\Mvc\Model;

class EntitiesFactory extends AbstractFactory {

    /**
     * Get object by class name
     *
     * @param $className
     * @return Model
     */
    public function getObject($className) {
        return $this->loadClass($className);
    }

    /**
     * Get class namespace
     *
     * @return string
     */
    protected function getNamespace() {
        // TODO: Implement getNamespace() method.
    }
}