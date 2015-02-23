<?php
/**
 * ServiceTestable
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Testable\Mvc\Model\Service;

use Kachit\Phalcon\Mvc\Model\Repository\RepositoryInterface;
use Kachit\Phalcon\Mvc\Model\Service\AbstractService;
use Kachit\Phalcon\Testable\Mvc\Model\Repository\RepositoryTestable;

class ServiceTestable extends AbstractService {

    /**
     * Get repository
     *
     * @return RepositoryInterface
     */
    public function getRepository() {
        return new RepositoryTestable();
    }
}