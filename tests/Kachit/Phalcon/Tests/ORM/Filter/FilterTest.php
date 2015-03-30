<?php
/**
 *
 */
namespace Kachit\Phalcon\Test\ORM\Query;

use Kachit\Phalcon\Testable\ORM\Query\Filter\FilterTestable;

class FilterTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var  FilterTestable
     */
    private $testable;

    /**
     * Init
     */
    protected function setUp() {
        $this->testable = new FilterTestable();
    }

    public function testGetValidation() {
        $result = $this->testable->getValidation();
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf('Kachit\Phalcon\Validation\AbstractValidation', $result);
        $this->assertInstanceOf('Kachit\Phalcon\Validation\ValidationInterface', $result);
    }

    public function testIsValidSuccess() {
        $result = $this->testable->setLimit(123)->setOffset(222)->isValid();
        $this->assertTrue($result);
    }

    public function testIsValidFail() {
        $result = $this->testable->setLimit('foo')->setOffset(null)->isValid();
        $this->assertFalse($result);
    }

    public function testIsValidFailGetErrorMessages() {
        $this->testable->setLimit('foo')->setOffset(null)->isValid();
        $result = $this->testable->getValidation()->getMessages();
        $this->assertTrue(is_array($result));
    }
}
