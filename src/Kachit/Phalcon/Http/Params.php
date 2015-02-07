<?php
/**
 * Http Params
 */
namespace Kachit\Phalcon\Http;

class Params {

    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_PUT = 'PUT';
    const METHOD_DELETE = 'DELETE';
    const METHOD_HEAD = 'HEAD';
    const METHOD_OPTIONS = 'OPTIONS';

    /**
     * @return array
     */
    public static function getAllowedHttpMethods() {
        return [
            self::METHOD_GET,
            self::METHOD_POST,
            self::METHOD_PUT,
            self::METHOD_DELETE,
            self::METHOD_HEAD,
            self::METHOD_OPTIONS,
        ];
    }
}