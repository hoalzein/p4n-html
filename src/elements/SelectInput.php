<?php

namespace hoalzein\Prof4Net\Html\Elements;

use hoalzein\Prof4Net\Html\Elements\Elements;
use hoalzein\Prof4Net\Html\Elements\Traits\Form\RequiredField;
use hoalzein\Prof4Net\Html\Elements\Traits\Form\ValidationField;
use hoalzein\Prof4Net\Html\Elements\Traits\Object\Helper as ObjectHelper;
use hoalzein\Prof4Net\Html\Elements\Traits\Request\Helper as RequestHelper;

class SelectInput extends Elements {

    use RequiredField;
    use ValidationField;
    use ObjectHelper;
    use RequestHelper;

    public $form_element = true;
    public $value = '';
    public $options = array();
    public $selected = array();
    public $wrapper_class = '';
    public $readonly = false;

    //$name, $inhaltfeld, $default=-99, $bw=false, $other='', $multiple=false, $multiple_rows=5, $cache=array()
    public function __construct($label = '', $name = '', $inhaltfeld = array(), $default = -99, $bw = false, $other = '', $multiple = false, $multiple_rows = 5, $cache = array()) {

        if ($multiple != '') {
            $name = $name . '[]';
            $other .= ' multiple="multiple" size="' . $multiple_rows . '" ';
        }


        if ($name != '') {
            parent::__construct($name, $label, $other);
        } else {
            parent::__construct($label, $label, $other);
        }




        if (is_array($default)) {
            $this->selected = $default;
        } else {
            if (array_key_exists($default, $inhaltfeld)) {
                $this->selected = array($default);
            } else {
                $this->selected = array(-1);
            }
        }


        if ($bw !== false && is_string($bw)) {
            $inhaltfeld = array(-1 => $bw) + $inhaltfeld;
        }

        if (is_array($inhaltfeld)) {
            $this->setOptions($inhaltfeld);
        }
    }

    public static function init() {
        return new self(...func_get_args());
    }

    public function setValue($value) {
        $this->value = $value;
    }

    public function setOptions($options) {
        $this->options = $options;
    }

}
