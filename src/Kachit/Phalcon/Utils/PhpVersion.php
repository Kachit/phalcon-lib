<?php
/**
 * Class PhpVersion
 * 
 * @author Kachit
 * @package Kachit\Phalcon\Utils
 */
namespace Kachit\Phalcon\Utils;


class PhpVersion {

    /**
     * Php version compare
     *
     * @param $version
     * @param null $operator
     * @return bool
     */
    public static function compare($version, $operator = null) {
        return version_compare(PHP_VERSION, $version, $operator) >= 0;
    }
}