<?php
/**
 * Builder
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Testable\ORM\Query;

use Kachit\Phalcon\ORM\Query\Builder;

class BuilderTestable extends Builder {

    public function initFrom() {
        $this->from(__CLASS__);
    }
}