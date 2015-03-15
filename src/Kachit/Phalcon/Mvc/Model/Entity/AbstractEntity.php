<?php
/**
 * Abstract entity
 *
 * @author Kachit
 * @package Kachit\Phalcon\Mvc
 */
namespace Kachit\Phalcon\Mvc\Model\Entity;

use Phalcon\Mvc\Model;

abstract class AbstractEntity extends Model {

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
}