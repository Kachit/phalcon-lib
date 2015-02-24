<?php
/**
 * HmvcTest
 *
 * @author Kachit
 * @package Kachit\Phalcon\Tests\ServiceProvider
 */
namespace Kachit\Phalcon\Tests\ServiceProvider;

use Kachit\Phalcon\ServiceProvider\Session;
use Kachit\Phalcon\Tester\PhpUnit\TestCase;

class SessionTest extends TestCase {

    /**
     * @var Session
     */
    private $testable;

    /**
     * Init
     */
    protected function setUp() {
        parent::setUp();
        $this->testable = new Session($this->getTester()->getDi());
    }

    public function testRegister() {
        $this->testable->register();
        $this->assertTrue($this->getTester()->getDi()->has('session'));
    }
}
