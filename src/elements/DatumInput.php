<?php

namespace hoalzein\Prof4Net\Html\Elements;

use hoalzein\Prof4Net\Html\Elements\Elements;
use hoalzein\Prof4Net\Html\Elements\Traits\Form\RequiredField;
use hoalzein\Prof4Net\Html\Elements\Traits\Form\ValidationField;
use hoalzein\Prof4Net\Html\Elements\Traits\Object\Helper;

class DatumInput extends Elements {

    use RequiredField;
    use ValidationField;
    use Helper;

    public $form_element = true;
    public $value = '';
    public $label = 'Label';
    public $options = array();
    public $readonly = false;
    public $wrapper_class = '';

    //$name, $value='', $other='onBlur=" cdat(this); ti2(this);"', $ohnepo=false, $mitjs=false, $valsmcurrent=false, $onSelectCallback = null
    public function __construct($label = '', $name = '', $value = '', $other = 'onBlur=" cdat(this); ti2(this);"', $ohnepo = false, $mitjs = false, $valsmcurrent = false, $onSelectCallback = null) {
        global $db;
        if ($name != '') {
            parent::__construct($name, '', $other);
        } else {
            parent::__construct($label, '', $other);
        }
        $this->setLabel($label);
        if ($value != '') {
            if (preg_match("/\d\-/", $value)) {
                $value = $db->unixdate($value);
            }
            if ($value == 'now()') {
                $value = adodb_date(_LOCAL_DATEFORMAT_);
            }
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
