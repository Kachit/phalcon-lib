<?php
/**
 * Model
 *
 * @author antoxa <kornilov@realweb.ru>
 */
namespace Kachit\Phalcon\Mvc\Model;

use Phalcon\Mvc\Model as PhalconModel;
use Phalcon\Mvc\Model\Criteria;

abstract class AbstractModel extends PhalconModel {

    /**
     * Find list
     *
     * @param AbstractConfig $config
     * @return PhalconModel\ResultsetInterface
     */
    public function getList(AbstractConfig $config) {
        $select = $this->buildSelect($config);
        $this->buildSelectCommon($select, $config);
        return $select->execute();
    }

    /**
     * Find one
     *
     * @param AbstractConfig $config
     * @return PhalconModel\ResultsetInterface
     */
    public function getOne(AbstractConfig $config) {
        return $this->getList($config)->getFirst();
    }

    /**
     * Get count
     *
     * @param AbstractConfig $config
     * @return PhalconModel\ResultsetInterface
     */
    public function getCount(AbstractConfig $config) {
        return $this->getAggregated($config, 'COUNT(*)');
    }

    /**
     * Build select common
     *
     * @param Criteria $select
     * @param AbstractConfig $config
     */
    protected function buildSelectCommon(Criteria $select, AbstractConfig $config) {
        $limit = ($config->getLimit()) ? $config->getLimit() : null;
        $offset = ($config->getOffset()) ? $config->getOffset() : null;
        $select->limit($limit, $offset);
        if ($config->getOrder()) {

        }
    }

    /**
     * Get aggregated
     *
     * @param AbstractConfig $config
     * @param $aggregate
     * @return PhalconModel\ResultsetInterface
     */
    protected function getAggregated(AbstractConfig $config, $aggregate) {
        $select = $this->buildSelect($config);
        $select->columns($aggregate);
        return $select->execute();
    }

    /**
     * Get query builder
     *
     * @return PhalconModel\Query\BuilderInterface
     */
    protected function getQueryBuilder() {
        return $this->getModelsManager()->createBuilder();
    }

    /**
     * Build select
     *
     * @param AbstractConfig $config
     * @return Criteria
     */
    abstract protected function buildSelect(AbstractConfig $config);

    /**
     * Get config class name
     *
     * @return string
     */
    abstract protected function getConfigClassName();
} 