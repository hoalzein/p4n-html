<?php
namespace hoalzein\Prof4Net\Html\Elements;

use hoalzein\Prof4Net\Html\Elements\Elements;
class Icon extends Elements {
    public function __construct($name) {
        parent::__construct($name);
        $this->iconName=$name;
    }
    
    public static function init()
    {
        return new self(...func_get_args());
    }
}

