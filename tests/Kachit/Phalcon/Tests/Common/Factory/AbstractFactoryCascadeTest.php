<?php
/**
 * Class AbstractFactoryCascadeTest
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Tests\Common\Factory;

use Kachit\Phalcon\Testable\Common\Factory\AbstractFactoryCascadeTestable;

class AbstractFactoryCascadeTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var AbstractFactoryCascadeTestable
     */
    private $testable;

    /**
     * Init
     */
    protected function setUp() {
        $this->testable = new AbstractFactoryCascadeTestable();
    }

    public function testCheckClassExistsInvalid() {
        $result = $this->testable->checkClassExists('Foo\Bar');
        $this->assertFalse($result);
    }

    public function testGetObjectSimpleCascade() {
        $namespaces = [
            'Kachit\Phalcon\Cache\Boo',
            'Kachit\Phalcon\Cache\Backend',
        ];
        $this->testable->setNamespaces($namespaces);
        $result = $this->testable->getObject('Factory');
        //$this->assertInstanceOf('Kachit\Phalcon\Cache\Backend\Factory', $result);
    }
}
