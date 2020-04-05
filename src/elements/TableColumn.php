<?php

namespace hoalzein\Prof4Net\Html\Elements;

use hoalzein\Prof4Net\Html\Elements\Elements;

class TableColumn extends Elements {

    function __construct($name = '') {
        parent::__construct($name);
    }

    public static function init() {
        return new self(...func_get_args());
    }

}
