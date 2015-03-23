<?php
/**
 * ArrayElements
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Validation\Validator;

use Phalcon\Validation\Validator;
use Phalcon\Validation\ValidatorInterface;
use Phalcon\Validation\Message;
use Phalcon\Validation;

class ArrayElements extends Validator implements ValidatorInterface {

    /**
     * @var ValidatorInterface
     */
    protected $elementsValidator;

    /**
     * Executes the validation
     *
     * @param Validator $validator
     * @param string $attribute
     * @return \Phalcon\Validation\Message\Group
     */
    public function validate($validator, $attribute) {
        /* @var Validator $validator */
        $values = $validator->getValue($attribute);
        $result = true;
        if ($this->elementsValidator) {
            $validation = new Validation();
            foreach ($values as $index => $element) {
                $validation->add($index, $this->elementsValidator);
            }
            $messages = $validation->validate($values);
            if (count($messages)) {
                foreach ($messages as $message) {
                    $validator->appendMessage($message);
                }
                $result = false;
            }
        }
        return $result;
    }

    /**
     * Set elements validator
     *
     * @param ValidatorInterface $validator
     * @return $this
     */
    public function setElementsValidator(ValidatorInterface $validator) {
        $this->elementsValidator = $validator;
        return $this;
    }
}