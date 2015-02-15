<?php
/**
 * Class FilterInterface
 * @package Kachit\Phalcon\Mvc\Model\Query\Filter
 */
namespace Kachit\Phalcon\Mvc\Model\Query\Filter;

interface FilterInterface {

    /**
     * Fill from array
     *
     * @param array $params
     * @return $this;
     */
    public function fillFromArray(array $params);

    /**
     * Convert to array
     *
     * @return array
     */
    public function toArray();

    /**
     * Get Limit
     *
     * @return int
     */
    public function getLimit();

    /**
     * Set Limit
     *
     * @param int $limit
     * @return $this;
     */
    public function setLimit($limit);

    /**
     * Get Offset
     *
     * @return int
     */
    public function getOffset();

    /**
     * Set Offset
     *
     * @param int $offset
     * @return $this;
     */
    public function setOffset($offset);

    /**
     * Get group by
     *
     * @return array
     */
    public function getGroupBy();

    /**
     * Set group by
     *
     * @param array $groupBy
     * @return $this;
     */
    public function setGroupBy(array $groupBy);

    /**
     * Get order by
     *
     * @return array
     */
    public function getOrderBy();

    /**
     * Set order by
     *
     * @param array $orderBy
     * @return $this;
     */
    public function setOrderBy(array $orderBy);
}