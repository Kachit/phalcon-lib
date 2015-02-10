<?php
/**
 * Json template engine
 *
 * @author Kachit
 * @package Kachit\Phalcon\Mvc\View\Engine
 */
namespace Kachit\Phalcon\Mvc\View\Engine;

use Phalcon\Mvc\View\Engine\Php;
use Phalcon\Mvc\ViewInterface;
use Phalcon\DI;
use Kachit\Phalcon\Utils\Helper\Json as JsonHelper;

class Json extends Php {

    /**
     * @var ViewInterface
     */
    protected $_view;

    /**
     * @var JsonHelper
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
        $this->jsonHelper = new JsonHelper();
    }

    /**
     * Render json content
     *
     * @param string $path
     * @param array $params
     * @param null $mustClean
     * @throws \Exception
     */
    public function render($path, $params, $mustClean = null) {
        $content = $this->jsonHelper->encode($params);
        $this->jsonHelper->checkJsonErrors();
        $this->_view->setContent($content);
    }

    /**
     * Set encode options
     *
     * @param array $options
     * @return $this
     */
    public function setEncodeOptions(array $options) {
        $this->jsonHelper->setEncodeOptions($options);
        return $this;
    }
}