<?php
/**
 * Class Factory
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Cache\Backend;

use Kachit\Phalcon\Common\Factory\AbstractFactory;
use Phalcon\Cache\BackendInterface;
use Phalcon\Cache\FrontendInterface;

class Factory extends AbstractFactory {

    /**
     * @var FrontendInterface
     */
    protected $frontendAdapter;

    /**
     * @var array
     */
    protected $options = [];

    /**
     * Get cache adapter
     *
     * @param string $name
     * @param FrontendInterface $frontendAdapter
     * @param array $options
     * @return BackendInterface
     */
    public function getAdapter($name, FrontendInterface $frontendAdapter, array $options) {
        $this->frontendAdapter = $frontendAdapter;
        $this->options = $options;
        return $this->getObject($name);
    }

    /**
     * Create new class
     *
     * @param string $className
     * @return BackendInterface
     */
    protected function createObject($className) {
        return new $className($this->frontendAdapter, $this->options);
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