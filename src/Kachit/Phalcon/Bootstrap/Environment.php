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
     * Property os
     *
     * @var string
     */
    public function __construct() {

    }

    /**
     * @return string
     */
    public static function getEnvironment() {
        return 'develop';
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
    public function getOS() {
        return strtoupper(substr(PHP_OS, 0, 3));
    }

    /**
     * isWin
     *
     * @return bool
     */
    public function isWindows() {
        return $this->getOS() == self::OS_WINDOWS;
    }

    /**
     * isLinux
     *
     * @return bool
     */
    public function isLinux() {
        return $this->getOS() == self::OS_LINUX;
    }
}