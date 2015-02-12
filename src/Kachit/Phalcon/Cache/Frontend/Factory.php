<?php
/**
 * Class Factory
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Cache\Frontend;

use Kachit\Phalcon\Common\AbstractFactory;
use Phalcon\Cache\FrontendInterface;

class Factory extends AbstractFactory {

    /**
     * Get cache adapter
     *
     * @param string $name
     * @return FrontendInterface
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
        return 'Phalcon\Cache\Frontend';
    }
}