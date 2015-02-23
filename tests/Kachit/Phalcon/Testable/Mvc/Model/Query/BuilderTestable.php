<?php
/**
 * Builder
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Testable\Mvc\Model\Query;

use Kachit\Phalcon\Mvc\Model\Query\Builder;

class BuilderTestable extends Builder {

    public function initFrom() {
        $this->from(__CLASS__);
    }
}