<?php
/**
 * Class ReplacerTestable
 */
namespace Kachit\Phalcon\Testable\Assets\Filters;

use Kachit\Phalcon\Assets\Filters\Replacer;

class ReplacerTestable extends Replacer {

    /**
     * prepareData
     *
     * @return array
     */
    public function prepareData() {
        return parent::prepareData();
    }

    /**
     * prepareKey
     *
     * @param $key
     * @return string
     */
    public function prepareKey($key) {
        return parent::prepareKey($key);
    }

    /**
     * prepareValue
     *
     * @param $value
     * @return mixed
     */
    public function prepareValue($value) {
        return parent::prepareValue($value);
    }
}