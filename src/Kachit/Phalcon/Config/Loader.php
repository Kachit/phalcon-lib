<?php
/**
 * Loader
 * 
 * @author antoxa <kornilov@realweb.ru>
 */
namespace Kachit\Phalcon\Config;

class Loader {

    /**
     * @var Factory
     */
    protected $factory;

    /**
     * Init
     */
    public function __construct() {
        $this->factory = new Factory();
    }

    /**
     * Load config from file path
     *
     * @param string $filePath
     * @return \Phalcon\Config
     */
    public function load($filePath) {
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);
        return $this->factory->getAdapter($extension, $filePath);
    }
}