<?php
/**
 * ModuleTestable
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Testable\Mvc;

use Kachit\Phalcon\Mvc\AbstractModule;

use Phalcon\Loader;
use Phalcon\Config;

class ModuleTestable extends AbstractModule {

    /**
     * Get config file path
     *
     * @return string
     */
    public function getConfigPath() {
        return TESTS_ROOT . '/stubs/module/config.php';
    }

    /**
     * @return Loader
     */
    public function getLoader() {
        return parent::getLoader();
    }


    /**
     * @return Config
     */
    public function getModuleConfig() {
        return parent::getModuleConfig();
    }
}