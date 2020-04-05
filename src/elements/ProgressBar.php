<?php

namespace hoalzein\Prof4Net\Html\Elements;

use hoalzein\Prof4Net\Html\Elements\Elements;

class ProgressBar extends Elements {

    public $id;

    public function __construct($id) {
        parent::__construct();
        $this->id = name2jsname($id);
    }

    public static function init() {
        return new self(...func_get_args());
    }

}
