<?php
/**
 * ViewTestable
 *
 * @author Kachit
 * @package Kachit\Phalcon\Testable\Mvc
 */
namespace Kachit\Phalcon\Testable\ServiceProvider;

use Kachit\Phalcon\ServiceProvider\View;

class ViewTestable extends View {

    /**
     * @return string
     */
    public function getViewsDir() {
        return parent::getViewsDir();
    }

    /**
     * @return array
     */
    public function getEnginesList() {
        return parent::getEnginesList();
    }
}