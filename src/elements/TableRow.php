<?php

namespace hoalzein\Prof4Net\Html\Elements;

use hoalzein\Prof4Net\Html\Elements\Elements;

class TableRow extends Elements {

    function __construct($key) {
        parent::__construct();
        $this->addCustomAttr('data-row-id', $key);
    }

    public static function init() {
        return new self(...func_get_args());
    }

}
