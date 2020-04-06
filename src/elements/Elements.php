<?php

namespace hoalzein\Prof4Net\Html\Elements;

use hoalzein\Prof4Net\Html\Elements\Template;
use hoalzein\Prof4Net\Html\Elements\Traits\Html\Helper;
use hoalzein\Prof4Net\Html\Elements\Html;
use hoalzein\Prof4Net\Html\Elements\Text;

abstract class Elements extends Template {

    use Helper;

    public $class = '';
    public $customClass = '';
    public $name = '';
    public $customAttr = '';
    public $elements = array();
    public $element = null;
    public $count = 0;
    public $original_name = '';
    static $last = null;

    public function __construct($name = '', $object = null, $prevAttributeString = '') {

        if (!defined('DIR_TO_ROOT')) {
            include_once(base_path('vendor/hoalzein/p4n-html/src/output.php'));
        }
        parent::__construct();
        if (isset($this->wrapper_class)) {
            $this->wrapper_class = strtolower(str_replace("\\", "_", str_replace(__NAMESPACE__, "Template", $this->phpClass)));
        } else {
            $this->class = strtolower(str_replace("\\", "_", str_replace(__NAMESPACE__, "Template", $this->phpClass)));
        }
        if ($name != '') {
            $this->original_name = $name;
            $this->name = name2jsname($name);
        } else if ($this->name == '') {
            unset($this->name);
            unset($this->original_name);
        }

        if ($object !== null && $object !== '') {
            $this->elements = $this->addElements($this, $object);
        }

        if ($prevAttributeString != '') {
            // echo htmlentities($prevAttributeString).'<br>';
            $existinggAttributes = $this->getExistingAttributes($prevAttributeString);
            if (count($existinggAttributes) > 0) {
                if ($existinggAttributes['class'] != '') {
                    $this->addCustomClass($existinggAttributes['class']);
                    unset($existinggAttributes['class']);
                }
                if (count($existinggAttributes) > 0) {
                    foreach ($existinggAttributes as $attr => $value) {
                        $this->addCustomAttr($attr, $value);
                    }
                }
            }
        }
    }

    public function addCustomVarToObjs($object, $var) {
        if (is_object($object)) {
            if ($var != null) {
                $object->{'is_' . $var} = true;
            }
            $elements = $object->getElements();
            if (count($elements) > 0) {
                foreach ($elements as $ele) {
                    $this->addCustomVarToObjs($ele, $var);
                }
            }
        }
    }

    public function addElements($root, $obj, $var = null) {
        if (is_array($obj) && !is_object($obj)) {
            foreach ($obj as $o) {
                $this->addElements($root, $o, $var);
            }
        } else {
            if (!is_object($obj)) {
                if (preg_match('/<[^>]*>[^<]*<\/[^>]*>/is', $obj)) {
                    $obj = new Html($obj);
                } else {
                    $obj = new Text($obj);
                }
                $root->addElement($obj, $var);
            } else {
                $root->addElement($obj, $var);
            }
        }
        if ($var != null) {
            return $this->{$var};
        }
        return $root->elements;
    }

    public function addElement($object, $var = null) {
        if (is_array($object)) {
            ksort($object);
            foreach ($object as $obj) {
                $this->addElement($obj);
            }
        } else {
            if ($var != null) {
                $this->addCustomVarToObjs($object, $var);
                $this->{$var}[] = $object;
            } else {
                $this->elements[] = $object;
                $this->count++;
            }
        }
    }

    public function getElement() {
        return $this->element;
    }

    public function getElements() {
        return $this->elements;
    }

    public function convertObjectToText($object = null) {
        if ($object === null) {
            $object = $this;
            $object = unserialize(serialize($object));
        }
        if (is_object($object)) {
            $elements = $object->getElements();
            if (count($elements) > 0) {
                foreach ($elements as $ele) {
                    $this->convertObjectToText($ele);
                }
            }

            if (method_exists($object, 'getText')) {
                $object->converted = true;
                $object = $object->getText();
            }
        }
        return $object;
    }

    public function addCustomClass($customClass) {
        $this->class .= ' ' . $customClass;
        return $this;
    }

    public function addCustomAttr($attr, $value) {
        $this->customAttr .= ' ' . $attr . ' = "' . $value . '"';
        return $this;
    }

}
