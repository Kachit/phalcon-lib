<?php
/**
 * Class FilterTestable
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Tests\ORM\Repository;

use Kachit\Phalcon\Testable\ORM\Repository\RepositoryTestable;
use Kachit\Phalcon\Testable\ORM\Query\Filter\FilterTestable;
use Kachit\Phalcon\Testable\ORM\Query\Filter\FilterTestableInvalid;

use Phalcon\DI;

class RepositoryTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var RepositoryTestable
     */
    private $testable;

    /**
     * @var FilterTestable
     */
    private $filterTestable;

    /**
     * Init
     */
    protected function setUp() {
        $this->testable = new RepositoryTestable();
        $this->filterTestable = new FilterTestable();
    }

    public function testGetEntitiesFactory() {
        $result = $this->testable->getEntitiesFactory();
        $this->assertInstanceOf('Kachit\Phalcon\ORM\Entity\EntitiesFactory', $result);
    }

    public function testGetFiltersFactory() {
        $result = $this->testable->getFiltersFactory();
        $this->assertInstanceOf('Kachit\Phalcon\ORM\Query\Filter\FiltersFactory', $result);
    }
}
