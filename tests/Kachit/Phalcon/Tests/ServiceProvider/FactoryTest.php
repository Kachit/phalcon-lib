<?php
/**
 * Class FactoryTest
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Tests\ServiceProvider;

use Kachit\Phalcon\ServiceProvider\Factory;
use Kachit\Phalcon\Tester\PhpUnit\TestCase;

class FactoryTest extends TestCase {

    /**
     * @var Factory
     */
    private $testable;

    /**
     * Init
     */
    protected function setUp() {
        $this->getTester()->setTestableConfig(['volt' => []]);
        parent::setUp();
        $this->testable = new Factory($this->getTester()->getDi());
    }

    public function testGetProviderValid() {
        $result = $this->testable->getProvider('volt');
        $result->register();
        $this->assertInstanceOf('Kachit\Phalcon\ServiceProvider\Volt', $result);
        $this->assertInstanceOf('Kachit\Phalcon\ServiceProvider\AbstractProvider', $result);
        $this->assertInstanceOf('Kachit\Phalcon\ServiceProvider\ServiceProviderInterface', $result);
        $this->assertTrue($this->getTester()->getDi()->has('volt'));
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Class "fake" is not exists in this namespaces ["Kachit\\Phalcon\\ServiceProvider"]
     */
    public function testGetProviderInvalid() {
        $this->testable->getProvider('fake');
    }
}
