<?php

namespace hoalzein\Prof4Net\Html\Elements\Traits\Object;

use hoalzein\Prof4Net\Html\Elements\Text;
use hoalzein\Prof4Net\Html\Elements\Icon;

trait Helper {

    public $textObj = null;

    public function holeLabel($mitlabel = false) {
        $a = array();
        if ($mitlabel) {
            foreach ($this->getElements() as $obj) {
                $a[] = $obj;
            }
        }
        return $a;
    }

    public function generateTextObj($truncate, $mitlabel = false) {
        //  echo 'generateTextObj<br>';
        if ($this->phpClass == 'Template_TextInput') {
            if ($mitlabel) {
                $a = $this->holeLabel($mitlabel);
                $a[] = new Text($this->value, $truncate);
                $this->textObj = $a;
            } else {
                $this->textObj = new Text($this->value, $truncate);
            }
        }
        if ($this->phpClass == 'Template_DatumInput') {
            if ($this->value == '') {
                $this->value = '-';
            }
            $this->textObj = new Text($this->value, $truncate);
        }
        if ($this->phpClass == 'Template_CheckInput') {
            if ($mitlabel) {
                $a = $this->holeLabel($mitlabel);
                $a[] = new Icon(($this->checked == true ? 'check' : 'check_box_outline_blank'));
                $this->textObj = $a;
            } else {
                $this->textObj = new Icon(($this->checked == true ? 'check' : 'check_box_outline_blank'));
            }
        }
        if ($this->phpClass == 'Template_TextArea') {
            if ($mitlabel) {
                $a = $this->holeLabel($mitlabel);
                $a[] = new Text($this->value, $truncate);
                $this->textObj = $a;
            } else {
                $this->textObj = new Text($this->value, $truncate);
            }
        }
        if ($this->phpClass == 'Template_SelectInput') {
            $text = '';
            foreach ($this->selected as $selected) {
                $text .= $this->options[$selected] . ', ';
            }
            if ($text != '') {
                $text = substr($text, 0, -2);
            }

            if ($mitlabel) {
                $a = $this->holeLabel($mitlabel);
                $a[] = new Text($text, $truncate);
                $this->textObj = $a;
            } else {
                $this->textObj = new Text($text, $truncate);
            }
        }
    }

    public function getText($truncate = -1) {
        $this->generateTextObj(false, $truncate);
        return $this->textObj;
    }

    public function getLabelText($truncate = -1) {
        $this->generateTextObj(true, $truncate);
        return $this->textObj;
    }

}
