<?php
/**
 * Session adapters factory
 *
 * @author Kachit
 * @package Kachit\Phalcon\Session\Adapter
 */
namespace Kachit\Phalcon\Session\Adapter;

use Kachit\Phalcon\Common\AbstractFactory;
use Phalcon\Session\Adapter;

class Factory extends AbstractFactory {
    /**
     * @return string
     */
    protected function getNamespace() {
        return 'Phalcon\Session\Adapter';
    }

    /**
     * @param $name
     * @return object
     */
    public function getAdapter($name) {
        return $this->getObject($name);
    }
}