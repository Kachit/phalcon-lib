<?php
/**
 * ArrayElementsTest
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Tests\Validation\Validator;

use Kachit\Phalcon\Validation\Validator\ArrayElements;
use Phalcon\Validation;
use Phalcon\Validation\Validator\Email;

class ArrayElementsTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var ArrayElements
     */
    private $testable;

    /**
     * @var Validation
     */
    private $validation;

    protected function setUp() {
        $this->testable = new ArrayElements();
        $validator = new Email();
        $this->testable->setElementsValidator($validator);
        $this->validation = new Validation();
    }

    public function testValid() {
        $array = ['ids' => ['foo@foo.ru', 'bar@bar.ru']];
        $this->validation->add('ids', $this->testable);
        $messages = $this->validation->validate($array);
        $this->assertEquals(0, count($messages));
    }

    public function testInValid() {
        $array = ['ids' => ['foo@foo.ru', 'bar@bar.ru', 1234]];
        $this->validation->add('ids', $this->testable);
        $messages = $this->validation->validate($array);
        $this->assertEquals(1, count($messages));
    }
}
