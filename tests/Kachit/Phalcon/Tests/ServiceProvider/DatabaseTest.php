<?php
/**
 * HmvcTest
 *
 * @author Kachit
 * @package Kachit\Phalcon\Tests\ServiceProvider
 */
namespace Kachit\Phalcon\Tests\ServiceProvider;

use Kachit\Phalcon\ServiceProvider\Database;
use Kachit\Phalcon\Tester\PhpUnit\TestCase;

class DatabaseTest extends TestCase {

    /**
     * @var Database
     */
    private $testable;

    /**
     * Init
     */
    protected function setUp() {
        parent::setUp();
        $this->testable = new Database($this->getTester()->getDi());
    }

    public function testRegister() {
        $this->testable->register();
        $this->assertTrue($this->getTester()->getDi()->has('db'));
    }
}
