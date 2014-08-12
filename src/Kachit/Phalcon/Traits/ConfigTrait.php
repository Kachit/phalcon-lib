<?php
/**
 * ConfigTrait
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Traits;

use Phalcon\Config;

trait ConfigTrait {

    /**
     * @var \Phalcon\Config
     */
    protected $config;

    /**
     * Set Config
     *
     * @param \Phalcon\Config $config
     * @return $this;
     */
    public function setConfig(Config $config) {
        $this->config = $config;
        return $this;
    }

    /**
     * Get Config
     *
     * @return \Phalcon\Config
     */
    public function getConfig() {
        return $this->config;
    }
} 