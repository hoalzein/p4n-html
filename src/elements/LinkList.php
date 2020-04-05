<?php

namespace hoalzein\Prof4Net\Html\Elements;

use hoalzein\Prof4Net\Html\Elements\Elements;

class LinkList extends Elements {

    public function __construct($linkElementList = array()) {
        parent::__construct();

        ksort($linkElementList);
        foreach ($linkElementList as $element) {
            $element->addCustomClass('has-ripple-effect');
            $this->addElement($element);
        }
    }

    public static function init() {
        return new self(...func_get_args());
    }

}
