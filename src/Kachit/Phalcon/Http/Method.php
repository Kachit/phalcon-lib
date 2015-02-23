<?php
/**
 * Http methods
 */
namespace Kachit\Phalcon\Http;

class Method {

    const GET = 'GET';
    const POST = 'POST';
    const PUT = 'PUT';
    const PATCH = 'PATCH';
    const DELETE = 'DELETE';
    const HEAD = 'HEAD';
    const OPTIONS = 'OPTIONS';
    const TRACE = 'TRACE';
    const CONNECT = 'CONNECT';

    /**
     * @return array
     */
    public static function getAllowedHttpMethods() {
        return [
            self::GET,
            self::POST,
            self::PUT,
            self::PATCH,
            self::DELETE,
            self::HEAD,
            self::OPTIONS,
            self::TRACE,
            self::CONNECT,
        ];
    }
}