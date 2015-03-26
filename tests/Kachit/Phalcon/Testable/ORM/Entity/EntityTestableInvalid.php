<?php
/**
 * Entity testable
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Testable\ORM\Entity;

use Kachit\Phalcon\ORM\Entity\EntityInterface;
use Phalcon\Mvc\Model;

class EntityTestableInvalid extends Model implements EntityInterface{

    /**
     * Get primary key field
     *
     * @return mixed
     */
    public function getPrimaryKey() {
        // TODO: Implement getPrimaryKey() method.
    }
}