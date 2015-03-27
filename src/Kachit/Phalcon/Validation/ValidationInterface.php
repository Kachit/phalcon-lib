<?php
/**
 * Filter fields validator interface
 * 
 * @author antoxa <kornilov@realweb.ru>
 * @package Kachit\Phalcon\Validation
 */
namespace Kachit\Phalcon\Validation;

interface ValidationInterface {

    /**
     * Check is valid filter
     *
     * @return bool
     */
    public function isValid();

    /**
     * Set data for validation
     *
     * @param array $fields
     * @return $this
     */
    public function setData(array $fields);

    /**
     * Get error messages
     *
     * @return array
     */
    public function getMessages();
}