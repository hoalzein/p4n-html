<?php

namespace hoalzein\Prof4Net\Html\Elements;

use hoalzein\Prof4Net\Html\Elements\Elements;

class Form extends Elements {

    public $action;
    public $method = 'GET';

    //($name='leer', $action='', $method='POST', $file=false, $other='', $readonly=false, $mitaltwert=false, $keinjs=false
    function __construct($name = 'leer', $action = '', $method = 'POST', $file = false, $other = '', $readonly = false, $mitaltwert = false, $keinjs = false, $object = null) {
        parent::__construct($name);
        $this->setMethod($method);
        $this->setAction($action);
    }

    public static function init() {
        return new self(...func_get_args());
    }

    public function setAction($action) {
        $this->action = $action;
    }

    public function setMethod($method) {
        $this->method = $method;
    }

}
