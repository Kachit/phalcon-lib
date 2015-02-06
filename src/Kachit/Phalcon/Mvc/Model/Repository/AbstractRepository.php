<?php
/**
 * AbstractRepository
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Mvc\Model\Repository;

use Kachit\Phalcon\Mvc\Model\Query\Filter\AbstractFilter;

use Phalcon\DI\Injectable;
use Phalcon\Mvc\Model\Manager;
use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Resultset\Simple as Resultset;
use Phalcon\Mvc\Model\Query\Builder;

abstract class AbstractRepository extends Injectable {

    /**
     * getModelName
     *
     * @return string
     */
    abstract public function getModelName();

    /**
     * @param string $alias
     *
     * @return Builder
     */
    public function createQuery($alias = null) {
        return $this->getModelsManager()->createBuilder($alias)
            ->addFrom($this->getModelName(), $alias);
    }

    /**
     * @param $id
     * @return Model
     */
    public function findByPk($id) {
        return $this->createQuery()->where('id = ' . $id)->getQuery()->getSingleResult();
    }

    /**
     * findFirst
     *
     * @param AbstractFilter $config
     * @return Model
     */
    public function findFirst(AbstractFilter $config) {
        $query = $this->createQueryByConfig($config);
        return $query->getQuery()->getSingleResult();
    }

    /**
     * findAll
     *
     * @param AbstractFilter $config
     * @return Resultset
     */
    public function findAll(AbstractFilter $config) {
        $query = $this->createQueryByConfig($config);
        if ($config->getLimit()) {
            $query->limit($config->getLimit());
        }
        if ($config->getOffset()) {
            $query->offset($config->getOffset());
        }
        return $query->getQuery()->execute();
    }

    /**
     * createQueryByConfig
     *
     * @param AbstractFilter $config
     * @return Builder
     */
    abstract protected function createQueryByConfig(AbstractFilter $config);

    /**
     * getModelEntity
     *
     * @return Model
     */
    public function getModelEntity() {
        $entity = $this->getModelName();
        return new $entity;
    }

    /**
     * getModelsManager
     *
     * @return Manager
     */
    protected function getModelsManager() {
        return $this->getDi()->get('modelsManager');
    }
}