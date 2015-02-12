<?php
/**
 * Class Factory
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Cache\Backend;

use Kachit\Phalcon\Common\AbstractFactory;
use Phalcon\Cache\BackendInterface;

class Factory extends AbstractFactory {

    /**
     * Get cache adapter
     *
     * @param string $name
     * @return BackendInterface
     */
    public function getAdapter($name) {
        return $this->getObject($name);
    }

    /**
     * Get class namespace
     *
     * @return string
     */
    protected function getNamespace() {
        return 'Phalcon\Cache\Backend';
    }
}