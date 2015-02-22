<?php
/**
 * HmvcTest
 *
 * @author Kachit
 * @package Kachit\Phalcon\Tests\ServiceProvider
 */
namespace Kachit\Phalcon\Tests\ServiceProvider;

use Kachit\Phalcon\ServiceProvider\Loader;
use Kachit\Phalcon\Tester\PhpUnit\TestCase;

class LoaderTest extends TestCase {

    /**
     * @var Loader
     */
    private $testable;

    /**
     * Init
     */
    protected function setUp() {
        $this->getTester()->setTestableConfig($this->getTestableConfig());
        parent::setUp();
        $this->testable = new Loader($this->getTester()->getDi());
    }

    public function testRegister() {
        $this->testable->register();
        $this->assertTrue($this->getTester()->getDi()->has('loader'));
    }

    protected function getTestableConfig() {
        return [
            'loader' => ['namespaces' => []],
        ];
    }
}
