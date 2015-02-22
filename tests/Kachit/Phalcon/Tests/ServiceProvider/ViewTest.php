<?php
/**
 * HmvcTest
 *
 * @author Kachit
 * @package Kachit\Phalcon\Tests\ServiceProvider
 */
namespace Kachit\Phalcon\Tests\ServiceProvider;

use Kachit\Phalcon\ServiceProvider\View;
use Kachit\Phalcon\Tester\PhpUnit\TestCase;

class ViewTest extends TestCase {

    /**
     * @var View
     */
    private $testable;

    /**
     * Init
     */
    protected function setUp() {
        parent::setUp();
        $this->testable = new View($this->getTester()->getDi());
    }

    public function testRegister() {
        $this->testable->register();
        $this->assertTrue($this->getTester()->getDi()->has('view'));
    }
}
