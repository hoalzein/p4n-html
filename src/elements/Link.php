<?php

namespace hoalzein\Prof4Net\Html\Elements;

use hoalzein\Prof4Net\Html\Elements\Elements;
use hoalzein\Prof4Net\Html\Elements\Text;

class Link extends Elements {

    //$text, $ziel, $bild, $abfrage, $other
    public function __construct($text = '', $href = 'javascript:void(0);', $bild = '', $abfrage = '', $other = '') {

        if ($abfrage != '') {
            $other .= ' onClick="return confirm(\'' . $abfrage . '\')" ';
        }
        if ($this->name == '' && (is_string($text) || is_numeric($text)) && $text != '') {
            parent::__construct($text, new Text($text), $other);
        } else if ($this->name != '' && (is_string($text) || is_numeric($text)) && $text != '') {
            parent::__construct($this->name, new Text($text), $other);
        } else {
            parent::__construct('', $text, $other);
        }

        if ($href == '') {
            $href = 'javascript:void(0);';
        }

        $this->addCustomAttr('href', $href);
        $this->addCustomAttr('data-href', $href);
    }

    public static function init() {
        return new self(...func_get_args());
    }

}
