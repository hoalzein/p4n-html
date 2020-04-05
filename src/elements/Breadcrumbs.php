<?php

namespace hoalzein\Prof4Net\Html\Elements;

use hoalzein\Prof4Net\Html\Elements\Elements;
use hoalzein\Prof4Net\Html\Elements\GridTable;

class Breadcrumbs extends Elements {

    private $title = '';

    public function __construct($objectList = null) {
        parent::__construct('');
        if (is_array($objectList)) {
            if (count($objectList) == 1) {
                $objectList[] = '';
            }
            $this->addElement(new GridTable(array($objectList)));
        }
    }

    public static function init() {
        return new self(...func_get_args());
    }

    public function setTitle($title) {
        $this->title = $title;
    }

}
