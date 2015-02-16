<?php
/**
 * Class FactoryTest
 */
namespace Kachit\Phalcon\Tests\Config;

use Kachit\Phalcon\Config\Factory;

class FactoryTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Factory
     */
    private $testable;

    /**
     * Init
     */
    protected function setUp() {
        $this->testable = new Factory();
    }

    public function testGetAdapterPhp() {
        $filePath = $this->getTestableFile('config.php');
        $result = $this->testable->getAdapter('php', $filePath);
        $this->assertInstanceOf('Phalcon\Config\Adapter\Php', $result);
        $this->assertEquals('Foo', $result->name);
    }

    public function testGetAdapterIni() {
        $filePath = $this->getTestableFile('config.ini');
        $result = $this->testable->getAdapter('ini', $filePath);
        $this->assertInstanceOf('Phalcon\Config\Adapter\Ini', $result);
        $this->assertEquals('Foo', $result->name);
    }

    public function testGetAdapterJson() {
        $filePath = $this->getTestableFile('config.json');
        $result = $this->testable->getAdapter('json', $filePath);
        $this->assertInstanceOf('Phalcon\Config\Adapter\Json', $result);
        $this->assertEquals('Foo', $result->name);
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Class "Phalcon\Config\Adapter\Fake" is not exists
     */
    public function testGetAdapterFake() {
        $filePath = $this->getTestableFile('config.json');
        $this->testable->getAdapter('fake', $filePath);
    }

    /**
     * @expectedException \Phalcon\Config\Exception
     * @expectedExceptionMessage Configuration file 'not-found.php' cannot be loaded
     */
    public function testGetAdapterPhpWithoutFilePath() {
        $filePath = 'not-found.php';
        $this->testable->getAdapter('php', $filePath);
    }

    /**
     * Get testable filename
     *
     * @param string $fileName
     * @return string
     */
    protected function getTestableFile($fileName) {
        return TESTS_ROOT . '/stubs/configs/' . $fileName;
    }
}
