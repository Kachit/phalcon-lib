<?php
/**
 * Controller
 *
 * @author Kachit
 * @package Kachit\Phalcon\Mvc
 */
namespace Kachit\Phalcon\Mvc;

use Phalcon\Mvc\Controller as PhalconController;
use Kachit\Phalcon\Http\Response\StatusCode;

class Controller extends PhalconController {

    /**
     * @param $code
     * @param string $message
     */
    protected function setStatusCode($code, $message = null) {
        $this->response->setStatusCode($code, $message);
    }

    /**
     *
     */
    protected function setStatusNotFound() {
        $this->setStatusCode(StatusCode::NOT_FOUND);
    }
} 