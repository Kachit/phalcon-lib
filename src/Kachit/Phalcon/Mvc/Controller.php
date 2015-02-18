<?php
/**
 * Controller
 *
 * @author Kachit
 * @package Kachit\Phalcon\Mvc
 */
namespace Kachit\Phalcon\Mvc;

use Phalcon\Mvc\Controller as PhalconController;
use Phalcon\Mvc\Dispatcher;

use Kachit\Phalcon\Http\Response\StatusCode;

class Controller extends PhalconController {

    /**
     * @var bool
     */
    protected $isHmvcResponse = false;

    /**
     * After execute route event
     *
     * @param Dispatcher $dispatcher
     */
    public function afterExecuteRoute(Dispatcher $dispatcher) {
        if ($this->isHmvcResponse) {
            $this->createHmvcResponse($dispatcher);
        }
    }

    /**
     * Not found Action
     */
    public function notFoundAction() {
        $this->setStatusNotFound();
    }

    /**
     * Set response status code
     *
     * @param string $code
     * @param string $message
     */
    protected function setStatusCode($code, $message = null) {
        $this->response->setStatusCode($code, $message);
    }

    /**
     * Set status code Not Found
     */
    protected function setStatusNotFound() {
        $this->setStatusCode(StatusCode::NOT_FOUND);
    }

    /**
     * Create hmvc response
     *
     * @param Dispatcher $dispatcher
     */
    protected function createHmvcResponse(Dispatcher $dispatcher) {
        $this->view->render($dispatcher->getControllerName(), $dispatcher->getActionName())->getContent();
        $this->response->setContent($this->view->getContent());
    }
} 