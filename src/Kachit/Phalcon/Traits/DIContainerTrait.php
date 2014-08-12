<?php
/**
 * ConfigTrait
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Traits;

use Kachit\Phalcon\DI;

trait DIContainerTrait {

    /**
     * @var DI
     */
    protected $container;

    /**
     * Set Container
     *
     * @param DI $container
     * @return $this;
     */
    public function setContainer(DI $container) {
        $this->container = $container;
        return $this;
    }

    /**
     * Get Container
     *
     * @return DI
     */
    public function getContainer() {
        return $this->container;
    }
} 