<?php

namespace hoalzein\Prof4Net\Html\Elements;

use hoalzein\Prof4Net\Html\Elements\Elements;

class GridTableColumn extends Elements {

    public $col_s = 0;
    public $col_m = 0;
    public $col_l = 0;
    public $push_s = 0;
    public $push_m = 0;
    public $push_l = 0;
    public $pull_s = 0;
    public $pull_m = 0;
    public $pull_l = 0;
    public $offset_s = 0;
    public $offset_m = 0;
    public $offset_l = 0;

    function __construct($s = 0, $m = 0, $l = 0, $obj = null) {
        parent::__construct('', $obj);
        $this->col_s = $s;
        $this->col_m = $m;
        $this->col_l = $l;
    }

    public static function init() {
        return new self(...func_get_args());
    }

    public function ownGrid() {
        $grid = 'col';
        $i = 0;
        if ($this->col_s > 0) {
            $grid .= ' s' . $this->col_s;
            $i++;
        }
        if ($this->pull_s > 0) {
            $grid .= ' pull-s' . $this->pull_s;
            $i++;
        }
        if ($this->push_s > 0) {
            $grid .= ' push-s' . $this->push_s;
            $i++;
        }
        if ($this->offset_s > 0) {
            $grid .= ' offset-s' . $this->offset_s;
            $i++;
        }



        if ($this->col_m > 0) {
            $grid .= ' m' . $this->col_m;
            $i++;
        }
        if ($this->pull_m > 0) {
            $grid .= ' pull-m' . $this->pull_m;
            $i++;
        }
        if ($this->push_m > 0) {
            $grid .= ' push-m' . $this->push_m;
            $i++;
        }
        if ($this->offset_m > 0) {
            $grid .= ' offset-m' . $this->offset_m;
            $i++;
        }


        if ($this->col_l > 0) {
            $grid .= ' l' . $this->col_l;
            $i++;
        }
        if ($this->pull_l > 0) {
            $grid .= ' pull-l' . $this->pull_l;
            $i++;
        }
        if ($this->push_l > 0) {
            $grid .= ' push-l' . $this->push_l;
            $i++;
        }
        if ($this->offset_l > 0) {
            $grid .= ' offset-l' . $this->offset_l;
            $i++;
        }

        if ($i > 0) {
            return $grid;
        }

        return '';
    }

}
