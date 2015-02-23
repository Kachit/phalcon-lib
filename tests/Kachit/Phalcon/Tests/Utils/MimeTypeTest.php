<?php
/**
 * MimeTypeTest
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Tests\Utils;

use Kachit\Phalcon\Utils\MimeType;

class MimeTypeTest extends \PHPUnit_Framework_TestCase {

    public function testGet() {
        $file = TESTS_ROOT . '/stubs/bootstrap/config-main.php';
        $result = MimeType::get($file);
        $this->assertEquals(MimeType::HTML, $result);
    }

    public function testConstants() {
        $this->assertEquals('text/html', MimeType::HTML);
        $this->assertEquals('text/plain', MimeType::TXT);
        $this->assertEquals('application/json', MimeType::JSON);
    }
}
