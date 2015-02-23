<?php
/**
 * Manager
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Mvc\Model;

use Phalcon\Mvc\Model\Manager as PhalconModelsManager;

use Kachit\Phalcon\Mvc\Model\Query\Builder;

class Manager extends PhalconModelsManager {

    /**
     * Creates a Kachit\Phalcon\Mvc\Model\Query\Builder
     *
     * @param string|array $params
     * @return Builder
     * @throws \Exception
     */
    public function createBuilder($params = null) {
        if (!is_object($this->_dependencyInjector)) {
            throw new \Exception("A dependency injection object is required to access ORM services");
        }
        return new Builder($params, $this->_dependencyInjector);
    }
}