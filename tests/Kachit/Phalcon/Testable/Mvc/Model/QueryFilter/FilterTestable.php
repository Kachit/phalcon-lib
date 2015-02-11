<?php
/**
 * Class FilterTestable
 * 
 * @author antoxa <kornilov@realweb.ru>
 */
namespace Kachit\Phalcon\Testable\Mvc\Model\QueryFilter;

use Kachit\Phalcon\Mvc\Model\Query\Filter\AbstractFilter;

class FilterTestable extends AbstractFilter {

    /**
     * @var array
     */
    protected $ids = [];

    /**
     * @return array
     */
    public function getIds() {
        return $this->ids;
    }

    /**
     * @param array $ids
     * @return $this
     */
    public function setIds($ids) {
        $this->ids = $ids;
        return $this;
    }
}