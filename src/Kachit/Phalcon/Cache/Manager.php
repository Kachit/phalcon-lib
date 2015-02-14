<?php
/**
 * Cache Manager
 */
namespace Kachit\Phalcon\Cache;

use Kachit\Phalcon\Mvc\Model\Query\Filter\FilterInterface;

class Manager {

    /**
     * Get unique key from filter
     *
     * @param FilterInterface $filter
     * @return string
     */
    public function getUniqueKeyFromFilter(FilterInterface $filter) {
        $data = $filter->toArray();
        $data['class'] = get_class($filter);
        return md5(json_encode($data));
    }
}