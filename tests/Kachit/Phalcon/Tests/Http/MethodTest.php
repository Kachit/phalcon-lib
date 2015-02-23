<?php
/**
 * MethodTest
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Tests\Http;

use Kachit\Phalcon\Http\Method;

class MethodTest extends \PHPUnit_Framework_TestCase {

    public function testConstants() {
        $this->assertEquals('GET', Method::GET);
        $this->assertEquals('POST', Method::POST);
        $this->assertEquals('PUT', Method::PUT);
    }

    public function testGetAllowedMethod() {
        $result = Method::getAllowedHttpMethods();
        $this->assertTrue(is_array($result));
        $this->assertCount(9, $result);
    }
}
