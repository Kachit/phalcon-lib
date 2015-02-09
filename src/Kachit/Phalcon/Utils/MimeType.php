<?php
/**
 * Class ContentType
 * 
 * @author Kachit
 * @package Kachit\Phalcon\Utils
 */
namespace Kachit\Phalcon\Utils;

class MimeType {

    const DEFAULT_FILE = 'application/octet-stream';
    const DEFAULT_HTTP = self::HTML;

    const TXT = 'text/plain';
    //web
    const HTML = 'text/html';
    const JSON = 'application/json';
    const CSS = 'text/css';
    const JS = 'application/javascript';

    /**
     * @var array
     */
    static $mimeTypes = array(
        'txt' => self::TXT,
        //web
        'htm' => self::HTML,
        'html' => self::HTML,
        'php' => self::HTML,
        'css' => 'text/css',
        'js' => 'application/javascript',
        'json' => self::JSON,
        'xml' => 'application/xml',
        'swf' => 'application/x-shockwave-flash',
        'flv' => 'video/x-flv',
        // Images
        'png' => 'image/png',
        'jpe' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'jpg' => 'image/jpeg',
        'gif' => 'image/gif',
        'bmp' => 'image/bmp',
        'ico' => 'image/vnd.microsoft.icon',
        'tiff' => 'image/tiff',
        'tif' => 'image/tiff',
        'svg' => 'image/svg+xml',
        'svgz' => 'image/svg+xml',
        // Archives
        'zip' => 'application/zip',
        'rar' => 'application/x-rar-compressed',
        'exe' => 'application/x-msdownload',
        'msi' => 'application/x-msdownload',
        'cab' => 'application/vnd.ms-cab-compressed',
        // Audio/video
        'mp3' => 'audio/mpeg',
        'qt' => 'video/quicktime',
        'mov' => 'video/quicktime',
        // Adobe
        'pdf' => 'application/pdf',
        'psd' => 'image/vnd.adobe.photoshop',
        'ai' => 'application/postscript',
        'eps' => 'application/postscript',
        'ps' => 'application/postscript',
        // MS Office
        'doc' => 'application/msword',
        'rtf' => 'application/rtf',
        'xls' => 'application/vnd.ms-excel',
        'ppt' => 'application/vnd.ms-powerpoint',
        // Open Office
        'odt' => 'application/vnd.oasis.opendocument.text',
        'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
    );

    /**
     * @param $filename
     * @return string
     */
    public static function get($filename) {
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        return (array_key_exists($extension, self::$mimeTypes)) ? self::$mimeTypes[$extension] : self::DEFAULT_FILE;
    }
}