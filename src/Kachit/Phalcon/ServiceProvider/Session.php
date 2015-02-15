<?php
/**
 * Session service provider
 *
 * @author Kachit
 * @package Kachit\Phalcon\ServiceProvider
 */
namespace Kachit\Phalcon\ServiceProvider;

use Phalcon\DI;

use Kachit\Phalcon\Session\Adapter\Factory as AdaptersFactory;

class Session extends AbstractProvider {

    /**
     * @var Factory
     */
    protected $sessionAdaptersFactory;

    /**
     * @param DI $container
     */
    public function __construct(DI $container) {
        parent::__construct($container);
        $this->sessionAdaptersFactory = new AdaptersFactory();
    }

    /**
     * Register services
     */
    public function register() {
        $this->container->set('session', function () {
            $session = $this->sessionAdaptersFactory->getAdapter($this->config->session->adapter);
            $session->start();
            return $session;
        });
    }
}