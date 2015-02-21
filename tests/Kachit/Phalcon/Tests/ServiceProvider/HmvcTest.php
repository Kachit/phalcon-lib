<?php
/**
 * HmvcTest
 *
 * @author Kachit
 * @package Kachit\Phalcon\Tests\ServiceProvider
 */
namespace Kachit\Phalcon\Tests\ServiceProvider;

use Kachit\Phalcon\ServiceProvider\Hmvc;
use Kachit\Phalcon\Tester\PhpUnit\TestCase;

class HmvcTest extends TestCase {

    /**
     * @var Hmvc
     */
    private $testable;

    /**
     * Init
     */
    protected function setUp() {
        parent::setUp();
        $this->testable = new Hmvc($this->getTester()->getDi());
    }

    public function testRegister() {
        $this->testable->register();
        $this->assertTrue($this->getTester()->getDi()->has('hmvc'));
        $this->assertInstanceOf('Kachit\Phalcon\Hmvc\Request', $this->getTester()->getDi()->get('hmvc'));
    }
}
