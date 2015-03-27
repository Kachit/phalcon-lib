<?php
/**
 * Filter fields validator
 * 
 * @author antoxa <kornilov@realweb.ru>
 * @package Kachit\Phalcon\Validation
 */
namespace Kachit\Phalcon\Validation;

use Phalcon\Validation;

abstract class AbstractValidation implements ValidationInterface {

    /**
     * @var array
     */
    protected $data = [];

    /**
     * @var Validation
     */
    protected $validation;

    /**
     * Init
     *
     * @param array $data
     */
    public function __construct(array $data = []) {
        $this->setData($data);
        $this->validation = new Validation();
        $this->initValidators();
    }

    /**
     * Check is valid filter
     *
     * @return bool
     */
    public function isValid() {
        $valid = $this->validation->validate($this->data);
        return !count($valid);
    }

    /**
     * Set data for validation
     *
     * @param array $data
     * @return $this
     */
    public function setData(array $data) {
        $this->data = $data;
        return $this;
    }

    /**
     * Get error messages
     *
     * @return array
     */
    public function getMessages() {
        $messages = [];
        foreach ($this->validation->getMessages() as $messageObject) {
            $messages[$messageObject->getField()][$messageObject->getType()] = $messageObject->getMessage();
        }
        return $messages;
    }

    /**
     * Init validators and filters list
     *
     */
    abstract protected function initValidators();
}