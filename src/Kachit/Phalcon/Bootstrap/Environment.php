<?php
/**
 * Environment settings detector
 *
 * @https://github.com/ventoviro/windwalker-environment
 */
namespace Kachit\Phalcon\Bootstrap;

class Environment {

    const OS_WINDOWS = 'WIN';
    const OS_LINUX = 'LIN';

    const DEVELOP = 'develop';
    const PRODUCTION = 'production';
    const TESTING = 'testing';

    /**
     * @return string
     */
    public static function detectEnvironment() {
        return self::DEVELOP;
    }

    /**
     * Check is web
     *
     * @return boolean
     */
    public static function isWeb() {
        return in_array(PHP_SAPI, ['apache','cgi','fast-cgi','srv']);
    }
    /**
     * isCli
     *
     * @return boolean
     */
    public static function isCli() {
        return in_array(PHP_SAPI, ['cli', 'cli-server']);
    }

    /**
     * isHHVM
     *
     * @return boolean
     */
    public static function isHHVM() {
        return defined('HHVM_VERSION');
    }

    /**
     * Get os
     *
     * @return string
     */
    public static function getOS() {
        return strtoupper(substr(PHP_OS, 0, 3));
    }

    /**
     * isWin
     *
     * @return bool
     */
    public static function isWindows() {
        return self::getOS() == self::OS_WINDOWS;
    }

    /**
     * isLinux
     *
     * @return bool
     */
    public static function isLinux() {
        return self::getOS() == self::OS_LINUX;
    }
}