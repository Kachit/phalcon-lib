<?php
/**
 * Query filter abstract
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Mvc\Model\Query\Filter;

abstract class AbstractFilter {

    const ORDER_BY_ASC = 'asc';
    const ORDER_BY_DESC = 'desc';

    /**
     * @var int
     */
    protected $limit = 0;

    /**
     * @var int
     */
    protected $offset = 0;

    /**
     * @var mixed
     */
    protected $groupBy;

    /**
     * @var mixed
     */
    protected $orderBy;

    /**
     * Get Limit
     *
     * @return mixed
     */
    public function getLimit() {
        return $this->limit;
    }

    /**
     * Set Limit
     *
     * @param mixed $limit
     * @return $this;
     */
    public function setLimit($limit) {
        $this->limit = $limit;
        return $this;
    }

    /**
     * Get Offset
     *
     * @return mixed
     */
    public function getOffset() {
        return $this->offset;
    }

    /**
     * Set Offset
     *
     * @param mixed $offset
     * @return $this;
     */
    public function setOffset($offset) {
        $this->offset = $offset;
        return $this;
    }
}