<?php

namespace hoalzein\Prof4Net\Html\Elements;

use hoalzein\Prof4Net\Html\Elements\Link;

class Button extends Link {

    function __construct($text = '', $href = 'javascript:void(0);', $bild = '', $abfrage = '', $other = '') {
        parent::__construct($text, $href, $bild, $abfrage, $other);
    }

    public static function init() {
        return new self(...func_get_args());
    }

}
