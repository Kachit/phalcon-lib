<?php
/**
 * HmvcTest
 *
 * @author Kachit
 * @package Kachit\Phalcon\Tests\ServiceProvider
 */
namespace Kachit\Phalcon\Tests\ServiceProvider;

use Kachit\Phalcon\ServiceProvider\Volt;
use Kachit\Phalcon\Tester\PhpUnit\TestCase;

class VoltTest extends TestCase {

    /**
     * @var Volt
     */
    private $testable;

    /**
     * Init
     */
    protected function setUp() {
        parent::setUp();
        $this->testable = new Volt($this->getTester()->getDi());
    }

    public function testRegister() {
        $this->testable->register();
        $this->assertTrue($this->getTester()->getDi()->has('volt'));
    }
}
