<?php
namespace hoalzein\Prof4Net\Html\Elements;

use hoalzein\Prof4Net\Html\Elements\Elements;

class Html extends Elements
{
    public $html;
    
    public function __construct($html='') {
        parent::__construct();
        $this->setHtml2($html);
    }
    
    public static function init()
    {
        return new self(...func_get_args());
    }
    
    public function setHtml2($html='') {
        $this->html=$html;
    }
    
    
    public function getHtml2() {
        return $this->html;
    }
    
    
   
}