<?php

namespace hoalzein\Prof4Net\Html\Elements;

use hoalzein\Prof4Net\Html\Elements\Elements;
use hoalzein\Prof4Net\Html\Elements\TableRow;
use hoalzein\Prof4Net\Html\Elements\TableColumn;
use hoalzein\Prof4Net\Html\Elements\TableHeader;
use hoalzein\Prof4Net\Html\Elements\GridTable;
use hoalzein\Prof4Net\Html\Elements\Sorts;

class Table extends Elements {

    public $search = true;
    public $bordered = true;
    public $hover = true;
    public $filter = array();
    public $sort = array();
    public $align = array();
    public $table;
    public $js = '';
    public $priority = array();
    private $names = array();
    public $search_tooltip = null;

    public function __construct($rows = array(), $options = array()) {
        parent::__construct();

        if (count($rows) > 0) {
            $this->addRows($rows);
        }


        if (count($options) > 0) {
            if (isset($options['sort'])) {
                if ($options['sort'] == false) {
                    $this->setSort('', false);
                } else {
                    $this->setSort($options['sort']);
                }
            }
            if (isset($options['priority'])) {
                $this->responsivePriorityAdd($options['priority']);
            }
            if (isset($options['filter'])) {
                $this->addFilterElements($options['filter']);
            }
            if (isset($options['sortable'])) {
                $this->setSortable($options['sortable']);
            }
            if (isset($options['search'])) {
                $this->setSearch($options['search']);
            }
        }
    }

    public static function init() {
        return new self(...func_get_args());
    }

    public function setSearch($bool = true) {
        $this->search = $bool;
    }

    /*
     * @param textAlign | LEFT, CENTER, RIGHT
     */

    public function addRow($arr = array(), $key) {

        if (is_array($arr)) {
            $row = new TableRow($key);

            foreach ($arr as $name => $obj) {
                if (!is_string($name)) {
                    $col = new TableColumn;
                } else {
                    $col = new TableHeader($name);
                    $this->names[] = name2jsname($name);
                    $this->original_names[] = $name;
                }

                $this->addElements($col, $obj);

                if (!is_string($name)) {
                    $col->name = $this->names[$row->count];
                    $col->original_name = $this->original_names[$row->count];
                } else {
                    $col->original_name = $name;
                    $col->name = name2jsname($name);
                }
                $row->addElement($col);
            }
            $this->addElement($row);
        }
    }

    public function addRows($arr = array()) {
        if (is_array($arr)) {
            foreach ($arr as $key => $a) {
                $this->addRow($a, $key);
            }
        }
    }

    public function addFilterElement($element) {
        $this->filter[$element->name] = $element;
    }

    public function addFilterElements($elements) {
        if (is_array($elements)) {
            foreach ($elements as $element) {
                $this->filter[$element->name] = $element;
            }
        }
    }

    public function findFilterValues($object) {
        $returnwert = array();

        if (is_object($object)) {

            if (is_array($object->tooltip)) {
                $object->elements = $object->tooltip;
            }
            if (is_object($object->tooltip)) {
                $object->elements = array($object->tooltip);
            }

            $elements = $object->getElements();
            if (count($elements) > 0) {
                foreach ($elements as $ele) {
                    $returnwert = array_merge($returnwert, $this->findFilterValues($ele));
                }
            } else if ($object->text != '') {
                $returnwert[] = $object->text;
            }
        }

        return $returnwert;
    }

    public function findFilterElements($object) {
        $returnwert = array();
        // var_dump($object);
        if (is_object($object)) {
            $elements = $object->getElements();
            if (count($elements) > 0) {
                foreach ($elements as $ele) {
                    $returnwert = array_merge($returnwert, $this->findFilterElements($ele));
                }
            }
            if (count($object->tooltip) > 0) {
                foreach ($object->tooltip as $ele) {
                    $returnwert = array_merge($returnwert, $this->findFilterElements($ele));
                }
            }

            if ($object->filterable == true) {
                $returnwert[] = $object;
            }
        }
        return $returnwert;
    }

    private function filterInit() {
        foreach ($this->filter as $arr) {
            if ($arr->phpClass == 'Template_SelectInput') {
                $options = array(-1 => _KEINE_AUSWAHL_);
                foreach ($this->getElements() as $i => $row) {
                    if ($i == 0) {
                        continue;
                    }
                    foreach ($row->getElements() as $col) {
                        $searchable_elements = $this->findFilterElements($col);
                        foreach ($searchable_elements as $sobj) {
                            if ($col->name == name2jsname($arr->name)) {
                                $options[$sobj->original_text] = $sobj->original_text;
                            }
                        }
                    }
                }
                $arr->setOptions($options);
            }
        }
    }

    public function findSearchableElements($object) {
        $returnwert = array();
        if (is_object($object)) {
            $elements = $object->getElements();
            if (count($elements) > 0) {
                foreach ($elements as $ele) {
                    $returnwert = array_merge($returnwert, $this->findSearchableElements($ele));
                }
            }
            if (count($object->tooltip) > 0) {
                foreach ($object->tooltip as $ele) {
                    $returnwert = array_merge($returnwert, $this->findSearchableElements($ele));
                }
            }

            if ($object->searchable == true) {
                $returnwert[] = $object;
            }
        }
        return $returnwert;
    }

    private function searchInit() {
        $search_tooltip = array();
        foreach ($this->getElements() as $i => $row) {
            if ($i == 0) {
                continue;
            }
            foreach ($row->getElements() as $col) {
                $searchable_elements = $this->findSearchableElements($col);
                if (count($searchable_elements) > 0) {
                    $search_tooltip[$col->name][$col->name] = $col->original_name;
                }
            }
        }
        if (count($search_tooltip) > 0) {
            $this->search_tooltip = Template_Tooltip::init(new GridTable($search_tooltip), Template_Icon::init('search'))->addCustomClass('search-icon');
        }
    }

    public function setSort($name, $bool = true) {
        if (is_array($name)) {
            foreach ($name as $key => $value) {
                foreach ($this->getElements() as $row) {
                    foreach ($row->getElements() as $col) {
                        if ($col->name == name2jsname($key)) {
                            $col->sort = $value;
                        }
                    }
                }
            }
        } else {
            foreach ($this->getElements() as $row) {
                foreach ($row->getElements() as $col) {
                    if ($name == '') {
                        $col->sort = $bool;
                    }
                    if ($col->name == name2jsname($name)) {
                        $col->sort = $bool;
                    }
                }
            }
        }
    }

    public function setSortable($bool = '') {
        $this->sortable = $bool;
    }

    public function sortInit() {
        foreach ($this->getElements() as $row) {
            foreach ($row->getElements() as $col) {
                if ($col->sort == true) {
                    $sorts = new Sorts;
                    $col->addElement($sorts);
                }
            }
        }
    }

    public function responsivePriorityAdd($name) {
        if (is_array($name)) {
            foreach ($name as $value) {
                $this->priority[] = name2jsname($value);
            }
        } else {
            $this->priority[] = name2jsname($name);
        }
    }

    private function responsivePriorityinit() {
        $priority = 1;
        if (count($this->priority) > 0) {
            foreach ($this->priority as $ref) {
                foreach ($this->getElements()[0]->getElements() as $i => $col) {
                    if ($col->name == $ref) {
                        $col->priority = $priority;
                        $priority++;
                    }
                }
            }
        } else {
            $this->responsivePriorityAdd(end($this->getElements()[0]->getElements())->name);
            $this->responsivePriorityAdd(reset($this->getElements()[0]->getElements())->name);
            $this->responsivePriorityinit();
        }
    }

    public function getHtml() {
        $this->sortInit();
        $this->filterInit();
        $this->searchInit();
        $this->responsivePriorityinit();
        return parent::getHtml();
    }

}
