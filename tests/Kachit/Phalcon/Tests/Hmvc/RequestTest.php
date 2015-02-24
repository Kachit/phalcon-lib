<?php
/**
 * RequestTest
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Tests\ServiceProvider;

use Kachit\Phalcon\Testable\Hmvc\RequestTestable;
use Kachit\Phalcon\Tester\PhpUnit\TestCase;

use Phalcon\Mvc\Dispatcher;
use Phalcon\DI;

class RequestTest extends TestCase {

    /**
     * @var RequestTestable
     */
    private $testable;

    /**
     * @var Dispatcher
     */
    private $dispatcher;

    protected function setUp() {
        parent::setUp();
        $this->initDispatcher();
        $this->testable = new RequestTestable();
    }

    public function testGetConfig() {
        $this->testable->setDi($this->getTester()->getDi());
        $result = $this->testable->getConfig();
        $this->assertInstanceOf('Phalcon\Config', $result);
    }

    public function testGetDispatcher() {
        $result = $this->testable->getDispatcher();
        $this->assertInstanceOf('Phalcon\Mvc\Dispatcher', $result);
        $this->assertNotEquals($this->dispatcher, $result);
    }

    protected function initDispatcher() {
        $this->dispatcher = new Dispatcher();
        $this->getTester()->getDi()->set('dispatcher', function(){
            return $this->dispatcher;
        });
    }
}
