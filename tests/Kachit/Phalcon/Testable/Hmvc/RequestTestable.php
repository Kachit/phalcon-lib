<?php
/**
 * RequestTestable
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Testable\Hmvc;

use Kachit\Phalcon\Hmvc\Request;

class RequestTestable extends Request {

    public function getDispatcher() {
        return parent::getDispatcher();
    }

    public function getConfig() {
        return parent::getConfig();
    }
}