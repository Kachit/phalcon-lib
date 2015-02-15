<?php
/**
 * Class FiltersFactory
 *
 * @package Kachit\Phalcon\Mvc\Model\Query\Filter
 */
namespace Kachit\Phalcon\Mvc\Model\Query\Filter;

use Kachit\Phalcon\Common\Factory\AbstractFactory;

class FiltersFactory extends AbstractFactory {

    /**
     * Get object by class name
     *
     * @param $className
     * @return FilterInterface
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