<?php
/**
 * DatabaseTableEntity
 *
 * @author Kachit
 * @package Kachit\Phalcon\ORM\Entity
 */
namespace Kachit\Phalcon\ORM\Entity;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Behavior\SoftDelete;

class DatabaseTableEntity extends Model implements EntityInterface {

    const SOFT_DELETE_FIELD = 'deleted';
    const SOFT_DELETE_VALUE = 1;

    /**
     * @var bool use soft delete flag
     */
    protected $useSoftDelete = false;

    /**
     * @return array
     */
    public function getMessagesArray() {
        $messages = [];
        foreach ($this->getMessages() as $messageObject) {
            $messages[$messageObject->getField()][$messageObject->getType()] = $messageObject->getMessage();
        }
        return $messages;
    }

    /**
     * Initialize
     */
    public function initialize() {
        if ($this->useSoftDelete) {
            $this->addBehavior($this->getSoftDeleteBehavior());
        }
    }

    /**
     * Get soft delete behavior
     *
     * @return SoftDelete
     */
    protected function getSoftDeleteBehavior() {
        return new SoftDelete(['field' => self::SOFT_DELETE_FIELD, 'value' => self::SOFT_DELETE_VALUE]);
    }
}