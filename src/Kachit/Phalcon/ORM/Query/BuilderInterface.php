<?php
/**
 * Query builder interface
 *
 * @author Kachit
 * @package Kachit\Phalcon\ORM\Query
 */
namespace Kachit\Phalcon\ORM\Query;

use Phalcon\Mvc\Model\Query\BuilderInterface as PhalconBuilderInterface;

interface BuilderInterface extends PhalconBuilderInterface {

    /**
     * Create COUNT operation
     *
     * @param string $field
     * @param null $alias
     * @return $this
     */
    public function count($field = null, $alias = null);

    /**
     * Create AVG operation
     *
     * @param string $field
     * @param null $alias
     * @return $this
     */
    public function average($field, $alias = null);

    /**
     * Create MAX operation
     *
     * @param string $field
     * @param null $alias
     * @return $this
     */
    public function maximum($field, $alias = null);

    /**
     * Create MIN operation
     *
     * @param string $field
     * @param null $alias
     * @return $this
     */
    public function minimum($field, $alias = null);

    /**
     * Create SUM operation
     *
     * @param string $field
     * @param null $alias
     * @return $this
     */
    public function sum($field, $alias = null);
}