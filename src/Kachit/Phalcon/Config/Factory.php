<?php
/**
 * Class Factory
 * 
 * @author antoxa <kornilov@realweb.ru>
 * @package Kachit\Phalcon\Config
 */
namespace Kachit\Phalcon\Config;

use Kachit\Phalcon\Common\Factory\AbstractFactory;
use Phalcon\Config;

class Factory extends AbstractFactory {

    /**
     * @var string
     */
    protected $filePath;

    /**
     * Get config adapter
     *
     * @param string $name
     * @param string $filePath
     * @return Config
     */
    public function getAdapter($name, $filePath) {
        $this->filePath = $filePath;
        return $this->getObject($name);
    }

    /**
     * Create new class
     *
     * @param string $className
     * @return Config
     */
    protected function createNewClass($className) {
        return new $className($this->filePath);
    }

    /**
     * Get class namespace
     *
     * @return string
     */
    protected function getNamespace() {
        return 'Phalcon\Config\Adapter';
    }
}