<?php
/**
 * Class FactoryTest
 */
namespace Kachit\Phalcon\Tests\Config;

use Kachit\Phalcon\Config\Loader;

class LoaderTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Loader
     */
    private $testable;

    /**
     * Init
     */
    protected function setUp() {
        $this->testable = new Loader();
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

    public function testGetAdapterPhp() {
        $filePath = $this->getTestableFile('config.php');
        $result = $this->testable->load($filePath);
        $this->assertInstanceOf('Phalcon\Config\Adapter\Php', $result);
        $this->assertEquals('Foo', $result->name);
    }

    public function testGetAdapterIni() {
        $filePath = $this->getTestableFile('config.ini');
        $result = $this->testable->load($filePath);
        $this->assertInstanceOf('Phalcon\Config\Adapter\Ini', $result);
        $this->assertEquals('Foo', $result->name);
    }

    public function testGetAdapterJson() {
        $filePath = $this->getTestableFile('config.json');
        $result = $this->testable->load($filePath);
        $this->assertInstanceOf('Phalcon\Config\Adapter\Json', $result);
        $this->assertEquals('Foo', $result->name);
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Class "Phalcon\Config\Adapter\Fake" is not exists
     */
    public function testGetAdapterFake() {
        $this->testable->load('config.fake');
    }
}
