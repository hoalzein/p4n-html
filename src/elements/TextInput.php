<?php

namespace hoalzein\Prof4Net\Html\Elements;

use hoalzein\Prof4Net\Html\Elements\Elements;
use hoalzein\Prof4Net\Html\Elements\Traits\Form\RequiredField;
use hoalzein\Prof4Net\Html\Elements\Traits\Form\ValidationField;
use hoalzein\Prof4Net\Html\Elements\Traits\Object\Helper;

class TextInput extends Elements {

    use RequiredField;
    use ValidationField;
    use Helper;

    public $form_element = true;
    public $value = '';
    public $label = '';
    public $wrapper_class = '';

    //$name, $value='', $size='', $other=''
    public function __construct($label = '', $name = '', $value = '', $size = '', $other = '') {
        if ($size != '') {
            $other .= ' size="' . $size . '" ';
        }

        if ($name != '') {
            parent::__construct($name, $label, $other);
        } else {
            parent::__construct($label, $label, $other);
        }

        $this->setValue($value);
    }

    public static function init() {
        return new self(...func_get_args());
    }

    public function setValue($value) {
        $this->value = $value;
    }

}
