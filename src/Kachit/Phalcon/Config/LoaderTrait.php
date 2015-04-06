<?php
/**
 * Config loader trait
 *
 * @author Kachit
 * @package Kachit\Phalcon\Config
 */
namespace Kachit\Phalcon\Config;

trait LoaderTrait {

    /**
     * @var Loader
     */
    private $configLoader;

    /**
     * Get configLoader
     *
     * @return Loader
     */
    protected function getConfigLoader() {
        if (empty($this->configLoader)) {
            $this->configLoader = new Loader();
        }
        return $this->configLoader;
    }
}