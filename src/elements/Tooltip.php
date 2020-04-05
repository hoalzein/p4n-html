<?php

namespace hoalzein\Prof4Net\Html\Elements;

use hoalzein\Prof4Net\Html\Elements\Elements;

class Tooltip extends Elements {

    public $tooltip;

    function __construct($text, $linktext = '', $link = '', $ueberschrift = '', $breite = 300, $extras = '', $keine_werte = false, $kein_bild = false, $tag = 'a') {
        parent::__construct('', $linktext);

        if ($text != null && $text != '') {
            $this->addElements($this, $text, 'tooltip');
        }
    }

    public static function init() {
        return new self(...func_get_args());
    }

}
