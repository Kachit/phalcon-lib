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
    private $isHmvcMode = false;

    /**
     * After execute route event
     *
     * @param Dispatcher $dispatcher
     */
    public function afterExecuteRoute(Dispatcher $dispatcher) {
        if ($this->isHmvcMode) {
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
     * @param int $code
     * @param string $message
     * @return $this
     */
    protected function setStatusCode($code, $message = null) {
        $this->response->setStatusCode($code, $message);
        return $this;
    }

    /**
     * Set status code Not Found
     *
     * @return Controller
     */
    protected function setStatusNotFound() {
        return $this->setStatusCode(StatusCode::NOT_FOUND);
    }

    /**
     * Create hmvc response
     *
     * @param Dispatcher $dispatcher
     */
    protected function createHmvcResponse(Dispatcher $dispatcher) {
        $this->view->render($dispatcher->getControllerName(), $dispatcher->getActionName());
        $this->response->setContent($this->view->getContent());
    }

    /**
     * Enable hmvc
     *
     * @return $this
     */
    protected function enableHmvc() {
        $this->isHmvcMode = true;
        return $this;
    }

    /**
     * Disable hmvc
     *
     * @return $this
     */
    protected function disableHmvc() {
        $this->isHmvcMode = false;
        return $this;
    }
} 