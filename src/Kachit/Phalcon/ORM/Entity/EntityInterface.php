<?php
/**
 * Class EntityInterface
 *
 * @package Kachit\Phalcon\ORM\Entity
 */
namespace Kachit\Phalcon\ORM\Entity;

interface EntityInterface {

    /**
     * @return array
     */
    public function toArray();
}