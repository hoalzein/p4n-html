<?php
namespace hoalzein\Prof4Net\Html\Elements;

use hoalzein\Prof4Net\Html\Elements\Elements;
class Card extends Elements
{
    public $title='';
    public $fill=false;
    
    public function __construct($titel,$object=null) {
        parent::__construct($titel,$object);
        $this->setTitle($titel);
    }
    
    public static function init()
    {
        return new self(...func_get_args());
    }
    
    public function setTitle($title) {
        $this->title=$title;
    }
    

}


