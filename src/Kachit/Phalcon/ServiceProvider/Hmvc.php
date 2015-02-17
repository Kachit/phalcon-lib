<?php
/**
 * Class loader provider
 *
 * @author Kachit
 * @package Kachit\Phalcon\ServiceProvider
 */
namespace Kachit\Phalcon\ServiceProvider;

use Kachit\Phalcon\Hmvc\Request;

class Hmvc extends AbstractProvider {

    /**
     * Register services
     */
    public function register() {
        $this->container->set('hmvc', function () {
            return new Request();
        }, true);
    }
}