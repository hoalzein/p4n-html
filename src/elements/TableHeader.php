<?php

namespace hoalzein\Prof4Net\Html\Elements;

use hoalzein\Prof4Net\Html\Elements\TableColumn;

class TableHeader extends TableColumn {

    var $sort = true;
    var $is_header = true;

    public function __construct($name) {
        parent::__construct($name);
    }

    public static function init() {
        return new self(...func_get_args());
    }

}
