<?php
/**
 * StatusCodeTest
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Tests\Http\Response;

use Kachit\Phalcon\Http\Response\StatusCode;

class StatusCodeTest extends \PHPUnit_Framework_TestCase {

    public function testStatusCodes() {
        //success
        $this->assertEquals(200, StatusCode::OK);
        $this->assertEquals(201, StatusCode::CREATED);
        //error
        $this->assertEquals(400, StatusCode::BAD_REQUEST);
        $this->assertEquals(404, StatusCode::NOT_FOUND);
    }
}
