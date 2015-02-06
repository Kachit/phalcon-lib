<?php
/**
 * Session service provider
 *
 * @author Kachit
 * @package Kachit\Phalcon\ServiceProvider
 */
namespace Kachit\Phalcon\ServiceProvider;

use Phalcon\Session\Adapter\Files as SessionAdapter;

class Session extends AbstractProvider {

    /**
     * Register services
     */
    public function register() {
        $this->container->set('session', function () {
            $session = new SessionAdapter();
            $session->start();
            return $session;
        });
    }
}