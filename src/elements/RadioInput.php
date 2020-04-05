<?php

namespace hoalzein\Prof4Net\Html\Elements;

use hoalzein\Prof4Net\Html\Elements\Elements;

class RadioInput extends Elements {

    public $form_element = true;
    public $wrapper_class = '';
    public $readonly = false;

    //$name, $value='', $default=-99, $other='', $trennung='', $tr=false
    public function __construct($name, $label = '', $value = '', $default = -99, $other = '', $trennung = '', $tr = false) {
        if ($name != '') {
            parent::__construct($name, null, $other);
        } else {
            parent::__construct($label, null, $other);
        }
        $this->setLabel($label);
        if ($value == true) {
            $this->setValue($value);
        }
    }

    public static function init() {
        return new self(...func_get_args());
    }

    public function setValue($value) {
        $this->value = $value;
    }

    public function setLabel($label) {
        $this->label = $label;
    }

}
