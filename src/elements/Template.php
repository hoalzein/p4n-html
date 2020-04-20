<?php

namespace hoalzein\Prof4Net\Html\Elements;

class Template {

    public $phpClass = '';
    public $tplName = '';

    public function __construct() {
        $this->phpClass = get_class($this);
        $this->tplName = strtolower(str_replace('hoalzein\Prof4Net\Html\Elements', '', $this->phpClass));
    }

    private function getTpl() {
        if (defined('DIR_TO_ROOT')) {
            $file = DIR_TO_ROOT . '/p4n-html/src/phtml' . $this->tplName . '.phtml';
        } else {
            $file = str_replace("\\", "/", base_path('vendor/hoalzein/p4n-html/src/phtml') . $this->tplName . '.phtml');
        }
        if (!file_exists($file)) {
            return '';
        }
        ob_start();
        include($file);
        return ob_get_clean();
    }

    public function getHtml() {
        if (property_exists($this, 'textObj') && property_exists($this, 'converted')) {
            if (!is_null($this->textObj) && $this->converted) {
                $obj = $this->textObj;
                if (is_array($obj)) {
                    $r = '';
                    foreach ($obj as $o) {
                        $r .= $o->getTpl();
                    }
                    return $r;
                }
                return $obj->getTpl();
            }
        }
        return $this->getTpl();
    }

    public function html() {
        return $this->getHtml();
    }

}
