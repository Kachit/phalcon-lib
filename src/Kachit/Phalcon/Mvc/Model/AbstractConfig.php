<?php
/**
 * AbstractConfig
 *
 * @author antoxa <kornilov@realweb.ru>
 * @package Kachit\Phalcon\Mvc\Model
 */
namespace Kachit\Phalcon\Mvc\Model;

abstract class AbstractConfig {

    /**
     * @var int
     */
    protected $limit;

    /**
     * @var int
     */
    protected $offset;

    /**
     * @var array group
     */
    protected $group = [];

    /**
     * @var array order
     */
    protected $order = [];

    /**
     * Get Group
     *
     * @return mixed
     */
    public function getGroup() {
        return $this->group;
    }

    /**
     * Set Group
     *
     * @param array $group
     * @return $this
     */
    public function setGroup(array $group) {
        $this->group = $group;
        return $this;
    }

    /**
     * Add group
     *
     * @param string $group
     * @return $this
     */
    public function addGroup($group) {
        $this->group[] = $group;
        return $this;
    }

    /**
     * Get Limit
     *
     * @return int
     */
    public function getLimit() {
        return $this->limit;
    }

    /**
     * Set Limit
     *
     * @param int $limit
     * @return $this
     */
    public function setLimit($limit) {
        $this->limit = (int)$limit;
        return $this;
    }

    /**
     * Get Offset
     *
     * @return int
     */
    public function getOffset() {
        return $this->offset;
    }

    /**
     * Set Offset
     *
     * @param int $offset
     * @return $this
     */
    public function setOffset($offset) {
        $this->offset = (int)$offset;
        return $this;
    }

    /**
     * Get Order
     *
     * @return array
     */
    public function getOrder() {
        return $this->order;
    }

    /**
     * Set Order
     *
     * @param array $order
     * @return $this
     */
    public function setOrder(array $order) {
        $this->order = $order;
        return $this;
    }

    /**
     * Add order
     *
     * @param string $order
     * @return $this
     */
    public function addOrder($order) {
        $this->order[] = $order;
        return $this;
    }
} 