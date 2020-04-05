<?php

// pickadate api documentation https://amsul.ca/pickadate.js/api/#method-get-value

namespace hoalzein\Prof4Net\Html\Elements;

use hoalzein\Prof4Net\Html\Elements\Elements;

class DatePicker extends Elements {

    public function __construct() {
        parent::__construct();
    }

    public static function init() {
        return new self(...func_get_args());
    }

}
