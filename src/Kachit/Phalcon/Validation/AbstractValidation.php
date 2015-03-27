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
    protected $fields = [];

    /**
     * @var Validation
     */
    protected $validation;

    /**
     * Init
     */
    public function __construct() {
        $this->validation = new Validation();
        $this->initValidators();
    }

    /**
     * Check is valid filter
     *
     * @return bool
     */
    public function isValid() {
        $valid = $this->validation->validate($this->fields);
        return !count($valid);
    }

    /**
     * Set data for validation
     *
     * @param array $fields
     * @return $this
     */
    public function setData(array $fields) {
        $this->fields = $fields;
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
     * Init validators list
     *
     */
    abstract protected function initValidators();
}