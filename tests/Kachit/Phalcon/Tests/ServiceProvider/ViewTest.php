<?php
/**
 * HmvcTest
 *
 * @author Kachit
 * @package Kachit\Phalcon\Tests\ServiceProvider
 */
namespace Kachit\Phalcon\Tests\ServiceProvider;

use Kachit\Phalcon\Testable\ServiceProvider\ViewTestable;
use Kachit\Phalcon\Tester\PhpUnit\TestCase;

class ViewTest extends TestCase {

    /**
     * @var ViewTestable
     */
    private $testable;

    /**
     * Init
     */
    protected function setUp() {
        $this->getTester()->setTestableConfig($this->getTestableConfig());
        parent::setUp();
        $this->testable = new ViewTestable($this->getTester()->getDi());
    }

    public function testRegister() {
        $this->testable->register();
        $this->assertTrue($this->getTester()->getDi()->has('view'));
    }

    public function testGetViewsDir() {
        $result = $this->testable->getViewsDir();
        $this->assertEquals(TESTS_ROOT, $result);
    }

    public function testGetEnginesList() {
        $result = $this->testable->getEnginesList();
        $this->assertEquals(['foo' => 'bar', 'fii' => 'baz'], $result);
    }

    /**
     * @return array
     */
    protected function getTestableConfig() {
        return [
            'module' => [
                'view' => [
                    'viewsDir' => TESTS_ROOT,
                    'engines' => [
                        'foo' => 'bar', 'fii' => 'baz'
                    ]
                ],
            ],
        ];
    }
}
