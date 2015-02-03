<?php
/**
 * Class Database
 * 
 * @author antoxa <kornilov@realweb.ru>
 */

namespace Kachit\Phalcon\ServiceProvider;

use Phalcon\Mvc\View\Engine\Volt as VoltEngine;

class Volt extends AbstractProvider {

    /**
     * Register services
     */
    public function register() {
        $this->container->set('volt', function($view, $di) {
            $volt = new VoltEngine($view, $di);
            $volt->setOptions($this->config->volt->toArray());
            return $volt;
        });
    }
}