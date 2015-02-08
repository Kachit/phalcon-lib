<?php
/**
 * Class ReplacerTest
 */
namespace Kachit\Phalcon\Tests\Assets\Filters;

use Kachit\Phalcon\Testable\Assets\Filters\ReplacerTestable;

class ReplacerTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var ReplacerTestable
     */
    private $testable;

    protected function setUp() {
        $this->testable = new ReplacerTestable();
    }

    public function testPrepareKey() {
        $result = $this->testable->prepareKey('foo');
        $this->assertEquals("'{%foo%}'", $result);
    }

    public function testPrepareValueInt() {
        $value = 123;
        $result = $this->testable->prepareValue($value);
        $this->assertEquals($value, $result);
    }

    public function testPrepareValueFloat() {
        $value = 123.56789456;
        $result = $this->testable->prepareValue($value);
        $this->assertEquals($value, $result);
    }

    public function testPrepareValueString() {
        $value = 'foo';
        $result = $this->testable->prepareValue($value);
        $this->assertEquals("'foo'", $result);
    }

    public function testPrepareValueBoolean() {
        $value = true;
        $result = $this->testable->prepareValue($value);
        $this->assertEquals('true', $result);
    }

    public function testPrepareValueNull() {
        $value = null;
        $result = $this->testable->prepareValue($value);
        $this->assertEquals('null', $result);
    }

    public function testPrepareValueArray() {
        $value = [1, 2, 3];
        $result = $this->testable->prepareValue($value);
        $this->assertEquals(json_encode($value), $result);
    }

    public function testPrepareValueObject() {
        $value = new \StdClass();
        $value->name = 'Foo';
        $value->age = 23;
        $result = $this->testable->prepareValue($value);
        $this->assertEquals(json_encode($value), $result);
    }

    public function testPrepareData() {
        $array = [
            'id' => 1,
            'title' => 'Foo',
            'price' => 123.56,
            'active' => true,
            'params' => [
                'key' => 'foo',
                'value' => 'bar',
            ],
        ];
        $expected = [
            "'{%id%}'" => 1,
            '\'{%title%}\'' => "'Foo'",
            '\'{%price%}\'' => 123.56,
            '\'{%active%}\'' => "true",
            '\'{%params%}\'' => '{"key":"foo","value":"bar"}',
        ];
        $this->testable->setData($array);
        $result = $this->testable->prepareData();
        $this->assertEquals($expected, $result);
    }

    public function testFilter() {
        $array = [
            'id' => 1,
            'title' => 'Foo',
            'price' => 123.56,
            'active' => true,
            'params' => [
                'key' => 'foo',
                'value' => 'bar',
            ],
        ];
        $content = $this->getTestableFile('testable.js');
        $expected = $this->getTestableFile('expected.js');
        $this->testable->setData($array);
        $result = $this->testable->filter($content);
        $this->assertEquals($expected, $result);
    }

    /**
     * @param $fileName
     * @return string
     */
    protected function getTestableFile($fileName) {
        return file_get_contents(TESTS_ROOT . '/stubs/assets/' . $fileName);
    }
}
