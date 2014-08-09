<?php
/**
 * DI
 *
 * @author Kachit
 */
namespace Kachit\Phalcon;

use Phalcon\DI as Container;
use Phalcon\Http\Request;

class DI extends Container {

    const DI_REQUEST = 'request';
    const DI_DATABASE = 'db';
    const DI_ROUTER = 'router';

    /**
     * Get DB
     *
     * @return mixed
     */
    public function getDb() {
        return $this->get(self::DI_DATABASE);
    }

    /**
     * Get request
     *
     * @return mixed
     */
    public function getRequest() {
        return $this->get(self::DI_REQUEST);
    }

    /**
     * Get request
     *
     * @return mixed
     */
    public function getRouter() {
        return $this->get(self::DI_REQUEST);
    }
}