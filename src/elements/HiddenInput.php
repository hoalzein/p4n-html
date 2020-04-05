<?php
namespace hoalzein\Prof4Net\Html\Elements;

use hoalzein\Prof4Net\Html\Elements\Elements;
class HiddenInput extends Elements
{
    public $form_element=true;
    //$name, $value='', $other='', $nameals_id = false
    public function __construct($name='',$value=false, $other='', $nameals_id = false) {
        parent::__construct($name,null,$other);
        if ($value==true) {
            $this->setValue($value);
        }
    }
    
    public static function init()
    {
        return new self(...func_get_args());
    }
    
    public function setValue($value) {
        $this->value=$value;
    }
}