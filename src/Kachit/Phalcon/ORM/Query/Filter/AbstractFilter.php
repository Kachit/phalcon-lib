<?php
/**
 * Query filter abstract
 *
 * @author Kachit
 * @package Kachit\Phalcon\ORM\Query\Filter
 */
namespace Kachit\Phalcon\ORM\Query\Filter;

use Kachit\Helper\ObjectConverterTrait;

abstract class AbstractFilter implements FilterInterface {

    use ObjectConverterTrait;

    const ORDER_BY_ASC = 'asc';
    const ORDER_BY_DESC = 'desc';

    /**
     * @var Validation
     */
    private $validation;

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
    protected $groupBy = [];

    /**
     * @var mixed
     */
    protected $orderBy = [];

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

    /**
     * Get group by
     *
     * @return array
     */
    public function getGroupBy() {
        return $this->groupBy;
    }

    /**
     * Set group by
     *
     * @param array $groupBy
     * @return $this;
     */
    public function setGroupBy(array $groupBy) {
        $this->groupBy = $groupBy;
        return $this;
    }

    /**
     * Get order by
     *
     * @return array
     */
    public function getOrderBy() {
        return $this->orderBy;
    }

    /**
     * Set order by
     *
     * @param array $orderBy
     * @return $this;
     */
    public function setOrderBy(array $orderBy) {
        $this->orderBy = $orderBy;
        return $this;
    }

    /**
     * Check is valid filter
     *
     * @return bool
     */
    public function isValid() {
        return $this->getValidation()->setData($this->toArray())->isValid();
    }

    /**
     * Get validation
     *
     * @return Validation
     */
    public function getValidation() {
        if (empty($this->validation)) {
            $this->validation = $this->createValidation();
        }
        return $this->validation;
    }

    /**
     * Init validation
     *
     * @return Validation
     */
    protected function createValidation() {
        return new Validation();
    }

    /**
     * Get object converter exclude fields
     *
     * @return array
     */
    protected function getObjectConverterExcludeFields() {
        return ['validation'];
    }
}