<?php
/**
 * Application Trait
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Traits;

use Phalcon\Mvc\Application;

trait ApplicationTrait {

    /**
     * @var \Phalcon\Mvc\Application
     */
    protected $application;

    /**
     * Set Application
     *
     * @param \Phalcon\Mvc\Application $application
     * @return $this;
     */
    public function setApplication(Application $application) {
        $this->application = $application;
        return $this;
    }

    /**
     * Get Application
     *
     * @return \Phalcon\Mvc\Application
     */
    public function getApplication() {
        return $this->application;
    }
} 