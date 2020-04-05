<?php

namespace hoalzein\Prof4Net\Html\Elements;

use hoalzein\Prof4Net\Html\Elements\Elements;
use hoalzein\Prof4Net\Html\Elements\Traits\Form\RequiredField;
use hoalzein\Prof4Net\Html\Elements\Traits\Form\ValidationField;
use hoalzein\Prof4Net\Html\Elements\Traits\Object\Helper;

class TextArea extends Elements {

    use RequiredField;
    use ValidationField;
    use Helper;

    public $form_element = true;
    public $value = '';
    public $label = '';
    public $placeholder = '';
    public $wrapper_class = '';

    //$name, $value='', $breite=20, $hoehe=3, $other=''
    public function __construct($name, $label = '', $value = '', $breite = 20, $hoehe = 3, $other = '') {
        if ($name != '') {
            parent::__construct($name);
        } else {
            parent::__construct($label);
        }

        $this->setLabel($label);
        $this->setValue($value);
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

    public function setPlaceholder($placeholder) {
        $this->placeholder = $placeholder;
    }

}
