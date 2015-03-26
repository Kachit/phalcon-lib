<?php
/**
 * Builder
 *
 * @author Kachit
 * @package Kachit\Phalcon\ORM\Query
 */
namespace Kachit\Phalcon\ORM\Query;

use Phalcon\Mvc\Model\Query\Builder as PhalconQueryBuilder;

class Builder extends PhalconQueryBuilder implements BuilderInterface {

    const SQL_WILDCARD = '*';

    const OPERATION_COUNT = 'COUNT';
    const OPERATION_AVG = 'AVG';
    const OPERATION_SUM = 'SUM';
    const OPERATION_MAX = 'MAX';
    const OPERATION_MIN = 'MIN';

    /**
     * Create COUNT operation
     *
     * @param string $field
     * @param null $alias
     * @return Builder
     */
    public function count($field = self::SQL_WILDCARD, $alias = null) {
        $field = ($field) ? $field : self::SQL_WILDCARD;
        return $this->createOperation(self::OPERATION_COUNT, $field, $alias);
    }

    /**
     * Create AVG operation
     *
     * @param string $field
     * @param null $alias
     * @return Builder
     */
    public function average($field, $alias = null) {
        return $this->createOperation(self::OPERATION_AVG, $field, $alias);
    }

    /**
     * Create MAX operation
     *
     * @param string $field
     * @param null $alias
     * @return Builder
     */
    public function maximum($field, $alias = null) {
        return $this->createOperation(self::OPERATION_MAX, $field, $alias);
    }

    /**
     * Create MIN operation
     *
     * @param string $field
     * @param null $alias
     * @return Builder
     */
    public function minimum($field, $alias = null) {
        return $this->createOperation(self::OPERATION_MIN, $field, $alias);
    }

    /**
     * Create SUM operation
     *
     * @param string $field
     * @param null $alias
     * @return Builder
     */
    public function sum($field, $alias = null) {
        return $this->createOperation(self::OPERATION_SUM, $field, $alias);
    }

    /**
     * Create operation
     *
     * @param $operation
     * @param string $field
     * @param string $alias
     * @return $this
     */
    protected function createOperation($operation, $field = null, $alias = null) {
        $column = $operation .' (' . $field .')';
        $column .= ($alias) ? ' AS ' . $alias : '';
        $this->columns($column);
        return $this;
    }
}