<?php

namespace hoalzein\Prof4Net\Html\Elements;

use hoalzein\Prof4Net\Html\Elements\Elements;
use hoalzein\Prof4Net\Html\Elements\Traits\Form\RequiredField;

class Signature extends Elements {

    use RequiredField;

    public $label = '';
    public $wrapper_class = '';

    public function __construct($label = '', $name = '', $size = '', $other = '') {
        if ($size != '') {
            $other .= ' size="' . $size . '" ';
        }
        if ($name != '') {
            parent::__construct($name, $label, $other);
        } else {
            parent::__construct($label, $label, $other);
        }
    }

}
