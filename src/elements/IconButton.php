<?php
namespace hoalzein\Prof4Net\Html\Elements;

use hoalzein\Prof4Net\Html\Elements\Button;

class IconButton extends Button {
    function __construct($text='',$href='javascript:void(0);',$bild='',$abfrage='',$other='')
    {
        
        //$name='',$value='submit',$other='', $image=''
        parent::__construct($text,$href,$bild,$abfrage,$other);
        if ($bild!='') {
        $this->setIconName($bild);
        }
    }
    public static function init()
    {
        return new self(...func_get_args());
    }

    public function setIconName($iconName)
    {
        $this->iconName = $iconName;
    }
}