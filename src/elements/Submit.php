<?php

namespace hoalzein\Prof4Net\Html\Elements;

use hoalzein\Prof4Net\Html\Elements\Link;

class Submit extends Link {

    public $name;

    //$text='',$href='javascript:void(0);',$bild='',$abfrage='',$other=''
    function __construct($name, $value = 'submit', $other = '', $image = '', $bed = '', $bedother = '') {
        //$name='',$value='submit',$other='', $image=''
        $this->value = $value;
        $this->name = $name;
        parent::__construct($value, '', '', '', $other);
    }

    public static function init() {
        return new self(...func_get_args());
    }

}
