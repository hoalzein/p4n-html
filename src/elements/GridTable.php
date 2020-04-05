<?php

namespace hoalzein\Prof4Net\Html\Elements;

use hoalzein\Prof4Net\Html\Elements\Elements;
use hoalzein\Prof4Net\Html\Elements\GridTableRow;
use hoalzein\Prof4Net\Html\Elements\GridTableColumn;

class GridTable extends Elements {

    public $sgrid = array(1 => 12, 2 => 6, 3 => 4, 4 => 3, 5 => 200, 6 => 2, 7 => 142, 8 => 125, 9 => 111, 10 => 100, 11 => 909, 12 => 1);
    public $mgrid = array(1 => 12, 2 => 6, 3 => 4, 4 => 6, 5 => 6, 6 => 6, 7 => 4, 8 => 6, 9 => 4, 10 => 6, 11 => 4, 12 => 4);
    public $lgrid = array(1 => 12, 2 => 6, 3 => 4, 4 => 3, 5 => 200, 6 => 2, 7 => 142, 8 => 125, 9 => 111, 10 => 100, 11 => 909, 12 => 1);
    public $title = '';
    public $table;

    public function __construct($rows = array()) {
        parent::__construct();
        if (count($rows) > 0) {
            $this->addRows($rows);
        }
    }

    public static function init() {
        return new self(...func_get_args());
    }

    public function addRow($arr = array()) {
        if (is_array($arr)) {
            $row = new GridTableRow;
            foreach ($arr as $obj) {
                if ($obj->phpClass == 'GridTableCol') {

                    $col = $obj;
                } else {
                    $col = new GridTableColumn;
                }
                $this->addElements($col, $obj);

                $row->addElement($col);
            }
            $this->addElement($row);
        } else {
            
        }
    }

    public function addRows($arr = array()) {
        if (is_array($arr)) {
            ksort($arr);
            foreach ($arr as $a) {
                $this->addRow($a);
            }
        }
    }

}
