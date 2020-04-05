<?php

namespace hoalzein\Prof4Net\Html\Elements;

use hoalzein\Prof4Net\Html\Elements\Elements;

class Text extends Elements {

    public $text;
    public $original_text;
    public $filterable = false;
    public $searchable = false;

    public function __construct($text = '', $zeichen = -1) {
        parent::__construct();
        $this->setText($text);
        if ($zeichen > 0) {
            $this->truncate($zeichen);
        }
    }

    public static function init() {
        return new self(...func_get_args());
    }

    public function setText($text = '') {
        $this->text = $text;
        $this->original_text = $text;
    }

    public function truncate($zeichen) {
        //$calc=(($zeichen+2)*100)/strlen($this->text);
        //$this->addCustomAttr('style', 'width:'.$calc.'%');
        $this->addCustomAttr('truncated-text', $this->text);
        $this->text = substr($this->text, 0, $zeichen) . '..';
        return $this;
    }

    public function getText() {
        return $this->text;
    }

    public function setSearchable($bool = true) {
        if ($bool) {
            $this->addCustomClass('searchable');
            $this->searchable = true;
        }
        return $this;
    }

    public function setFilterable($bool = true) {
        if ($bool) {
            $this->addCustomClass('filterable');
            $this->filterable = true;
        }
        return $this;
    }

}
