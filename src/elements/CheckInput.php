<?php

namespace hoalzein\Prof4Net\Html\Elements;

use hoalzein\Prof4Net\Html\Elements\Elements;
use hoalzein\Prof4Net\Html\Elements\Traits\Form\RequiredField;
use hoalzein\Prof4Net\Html\Elements\Traits\Form\ValidationField;
use hoalzein\Prof4Net\Html\Elements\Traits\Object\Helper;

class CheckInput extends Elements {

    use RequiredField;
    use ValidationField;
    use Helper;

    public $form_element = true;
    public $wrapper_class = '';

    //$name, $checked=false, $other='', $value=''
    public function __construct($name, $label = '', $checked = false, $other = '', $value = '') {

        parent::__construct($name, $label, $other);

        $this->setChecked($checked);
    }

    public static function init() {
        return new self(...func_get_args());
    }

    public function setChecked($bool) {
        $this->checked = $bool;
    }

}
