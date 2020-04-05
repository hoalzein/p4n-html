<?php
namespace hoalzein\Prof4Net\Html\Elements;

use hoalzein\Prof4Net\Html\Elements\Elements;
class GridTableRow  extends Elements {
    function __construct()
    {
        parent::__construct('');
    }
    
    public static function init()
    {
        return new self(...func_get_args());
    }
}

