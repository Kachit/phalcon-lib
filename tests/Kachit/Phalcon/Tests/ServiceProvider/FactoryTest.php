<?php
/**
 * Class FactoryTest
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Tests\ServiceProvider;

use Kachit\Phalcon\ServiceProvider\Factory;

use Phalcon\DI\FactoryDefault as DI;
use Phalcon\Config;

class FactoryTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Factory
     */
    private $testable;

    /**
     * @var DI
     */
    private $di;

    /**
     * Init
     */
    protected function setUp() {
        $this->testable = new Factory($this->getTestableDi());
    }

    public function testGetProviderValid() {
        $result = $this->testable->getProvider('volt');
        $result->register();
        $this->assertInstanceOf('Kachit\Phalcon\ServiceProvider\Volt', $result);
        $this->assertInstanceOf('Kachit\Phalcon\ServiceProvider\AbstractProvider', $result);
        $this->assertInstanceOf('Kachit\Phalcon\ServiceProvider\ServiceProviderInterface', $result);
        $this->assertTrue($this->di->has('volt'));
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Class "fake" is not exists in this namespaces ["Kachit\\Phalcon\\ServiceProvider"]
     */
    public function testGetProviderInvalid() {
        $this->testable->getProvider('fake');
    }

    /**
     * @return DI
     */
    protected function getTestableDi() {
        if (empty($this->di)) {
            $di = new DI();
            $di->set('config', function() {
                return $this->getTestableConfig();
            });
            $this->di = $di;
        }
        return $this->di;
    }

    /**
     * @return Config
     */
    protected function getTestableConfig() {
        return new Config(['volt' => []]);
    }
}
