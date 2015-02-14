<?php
/**
 * Object Converter Trait
 *
 * @package Kachit\Phalcon\Utils\Helper
 */
namespace Kachit\Phalcon\Utils\Helper;

trait ObjectConverterTrait {
    /**
     * To array
     *
     * @return array
     */
    public function toArray() {
        return get_object_vars($this);
    }
    /**
     * Fill from array
     *
     * @param array $params
     * @return $this;
     */
    public function fillFromArray(array $params) {
        $expectedParams = $this->toArray();
        foreach ($expectedParams as $key => $value) {
            $this->$key = (isset($params[$key])) ? $params[$key] : $value;
        }
        return $this;
    }
}