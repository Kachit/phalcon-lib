<?php
/**
 * Json template engine
 * 
 * @author antoxa <kornilov@realweb.ru>
 */
namespace Kachit\Phalcon\Mvc\View\Engine;

use Phalcon\Mvc\View\Engine\Php;
use Phalcon\Mvc\ViewInterface;
use Phalcon\DI;

class Json extends Php {

    /**
     * @var ViewInterface
     */
    protected $_view;

    /**
     * @var
     */
    protected $jsonHelper;

    /**
     * Init
     *
     * @param ViewInterface $view
     * @param DI $dependencyInjector
     */
    public function __construct($view, $dependencyInjector = null) {
        parent::__construct($view, $dependencyInjector);
    }

    /**
     * Render template
     *
     * @param string $path
     * @param array $params
     * @param null $mustClean
     * @throws \Exception
     */
    public function render($path, $params, $mustClean = null) {
        $content = json_encode($params);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception(json_last_error_msg());
        }

        $this->_view->setContent($content);
    }

    /**
     * Load template
     *
     * @param string $path
     * @return bool|mixed
     */
    protected function loadTemplate($path) {
        return (is_file($path)) ? include $path : false;
    }
}