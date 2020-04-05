<?php

namespace hoalzein\Prof4Net\Html\Elements;

use hoalzein\Prof4Net\Html\Elements\Elements;

class ElementList extends Elements {

    public $id = '';

    public function __construct($elements = null, $id = '', $class = '') {

        parent::__construct('', $elements);
        if ($id != '') {
            $this->addCustomAttr('id', $id);
            $this->id = $id;
        }
        if ($class != '') {
            $this->addCustomClass($class);
        }
    }

    public static function init() {
        return new self(...func_get_args());
    }

}
