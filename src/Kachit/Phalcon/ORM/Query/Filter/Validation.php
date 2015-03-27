<?php
/**
 * Class Validator
 * 
 * @author antoxa <kornilov@realweb.ru>
 * @package Kachit\Phalcon\ORM\Query\Filter
 */
namespace Kachit\Phalcon\ORM\Query\Filter;

use Kachit\Phalcon\Validation\AbstractValidation;

use Phalcon\Validation\Validator\Regex;
use Phalcon\Validation\Validator\PresenceOf;

class Validation extends AbstractValidation {

    /**
     * Init validators list
     *
     */
    protected function initValidators() {
        $this->validation->add('limit', new PresenceOf());
        $this->validation->add('offset', new PresenceOf());
    }
}