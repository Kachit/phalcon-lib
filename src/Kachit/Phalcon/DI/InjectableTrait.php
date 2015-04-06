<?php
/**
 * InjectableTrait
 *
 * @author Kachit
 * @package Kachit\Phalcon\DI
 */
namespace Kachit\Phalcon\DI;

use Phalcon\DI;

trait InjectableTrait {

    /**
     * @var DI
     */
    private $di;

    /**
     * Get di
     *
     * @return DI
     */
    public function getDi() {
        if (empty($this->di)) {
            $this->di = DI::getDefault();
        }
        return $this->di;
    }

    /**
     * Set di
     *
     * @param DI $di
     * @return $this;
     */
    public function setDi(DI $di) {
        $this->di = $di;
        return $this;
    }
}