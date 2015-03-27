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
     * @param array $data
     * @return $this
     */
    public function setData(array $data);

    /**
     * Get error messages
     *
     * @return array
     */
    public function getMessages();
}