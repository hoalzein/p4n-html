<?php

namespace hoalzein\Prof4Net\Html;

use hoalzein\Prof4Net\Html\Elements\Breadcrumbs;
use hoalzein\Prof4Net\Html\Elements\Button;
use hoalzein\Prof4Net\Html\Elements\Card;
use hoalzein\Prof4Net\Html\Elements\CheckInput;
use hoalzein\Prof4Net\Html\Elements\DatePicker;
use hoalzein\Prof4Net\Html\Elements\DatumInput;
use hoalzein\Prof4Net\Html\Elements\Divider;
use hoalzein\Prof4Net\Html\Elements\FileInput;
use hoalzein\Prof4Net\Html\Elements\Form;
use hoalzein\Prof4Net\Html\Elements\GridTable;
use hoalzein\Prof4Net\Html\Elements\GridTableColumn;
use hoalzein\Prof4Net\Html\Elements\GridTableRow;
use hoalzein\Prof4Net\Html\Elements\HiddenInput;
use hoalzein\Prof4Net\Html\Elements\Icon;
use hoalzein\Prof4Net\Html\Elements\IconButton;
use hoalzein\Prof4Net\Html\Elements\InlineOverlay;
use hoalzein\Prof4Net\Html\Elements\Link;
use hoalzein\Prof4Net\Html\Elements\LinkList;
use hoalzein\Prof4Net\Html\Elements\ProgressBar;
use hoalzein\Prof4Net\Html\Elements\RadioInput;
use hoalzein\Prof4Net\Html\Elements\SelectInput;
use hoalzein\Prof4Net\Html\Elements\Submit;
use hoalzein\Prof4Net\Html\Elements\Table;
use hoalzein\Prof4Net\Html\Elements\TableColumn;
use hoalzein\Prof4Net\Html\Elements\TableHeader;
use hoalzein\Prof4Net\Html\Elements\TableRow;
use hoalzein\Prof4Net\Html\Elements\Tabs;
use hoalzein\Prof4Net\Html\Elements\Text;
use hoalzein\Prof4Net\Html\Elements\TextArea;
use hoalzein\Prof4Net\Html\Elements\TextInput;
use hoalzein\Prof4Net\Html\Elements\TimePicker;
use hoalzein\Prof4Net\Html\Elements\Tooltip;
use hoalzein\Prof4Net\Html\Elements\ZeitInput;

class P4NHtml {

    public function Breadcrumbs($objectList) {
        return new Breadcrumbs($objectList);
    }

    public function Button($text = '', $href = 'javascript:void(0);', $bild = '', $abfrage = '', $other = '') {
        return new Button($text, $href, $bild, $abfrage, $other);
    }

    public function Card($titel, $object = null) {
        return new Card($titel, $object);
    }

    public function CheckInput($name, $label = '', $checked = false, $other = '', $value = '') {
        return new CheckInput($name, $label, $checked, $other, $value);
    }

    public function DatePicker() {
        return new DatePicker();
    }

    public function DatumInput($label = '', $name = '', $value = '', $other = 'onBlur=" cdat(this); ti2(this);"', $ohnepo = false, $mitjs = false, $valsmcurrent = false, $onSelectCallback = null) {
        return new DatumInput($label, $name, $value, $other, $ohnepo, $mitjs, $valsmcurrent, $onSelectCallback);
    }

    public function Divider($name = '') {
        return new Divider($name);
    }

    public function FileInput($fileUploadId, $uploadErrorList = []) {
        return new FileInput($fileUploadId, $uploadErrorList);
    }

    public function Form($name = 'leer', $action = '', $method = 'POST', $file = false, $other = '', $readonly = false, $mitaltwert = false, $keinjs = false, $object = null) {
        return new Form($name, $action, $method, $file, $other, $readonly, $mitaltwert, $keinjs, $object);
    }

    public function GridTable($rows = array()) {
        return new GridTable($rows);
    }

    function GridTableColumn($s = 0, $m = 0, $l = 0, $obj = null) {
        return new GridTableColumn($s, $m, $l, $obj);
    }

    public function GridTableRow() {
        return new GridTableRow();
    }

    public function HiddenInput($name = '', $value = false, $other = '', $nameals_id = false) {
        return new HiddenInput($name, $value, $other, $nameals_id);
    }

    public function Icon($name) {
        return new Icon($name);
    }

    public function IconButton($text = '', $href = 'javascript:void(0);', $bild = '', $abfrage = '', $other = '') {
        return new IconButton($text, $href, $bild, $abfrage, $other);
    }

    public function InlineOverlay() {
        return new InlineOverlay();
    }

    public function Link($text = '', $href = 'javascript:void(0);', $bild = '', $abfrage = '', $other = '') {
        return new Link($text, $href, $bild, $abfrage, $other);
    }

    public function LinkList($linkElementList = array()) {
        return new LinkList($linkElementList);
    }

    public function ProgressBar($id) {
        return new ProgressBar($id);
    }

    public function RadioInput($name, $label = '', $value = '', $default = -99, $other = '', $trennung = '', $tr = false) {
        return new RadioInput($name, $label, $value, $default, $other, $trennung, $tr);
    }

    public function SelectInput($label = '', $name = '', $inhaltfeld = array(), $default = -99, $bw = false, $other = '', $multiple = false, $multiple_rows = 5, $cache = array()) {
        return new SelectInput($label, $name, $inhaltfeld, $default, $bw, $other, $multiple, $multiple_rows, $cache);
    }

    public function Submit($name, $value = 'submit', $other = '', $image = '', $bed = '', $bedother = '') {
        return new Submit($name, $value, $other, $image, $bed, $bedother);
    }

    public function Table($rows = array(), $options = array()) {
        return new Table($rows, $options);
    }

    public function TableColumn($name = '') {
        return new TableColumn($name);
    }

    public function TableHeader($name) {
        return new TableHeader($name);
    }

    public function TableRow($key) {
        return new TableRow($key);
    }

    public function Tabs() {
        return new Tabs();
    }

    public function Text($text = '', $zeichen = -1) {
        return new Text($text, $zeichen);
    }

    public function TextArea($name, $label = '', $value = '', $breite = 20, $hoehe = 3, $other = '') {
        return new TextArea($name, $label, $value, $breite, $hoehe, $other);
    }

    public function TextInput($label = '', $name = '', $value = '', $size = '', $other = '') {
        return new TextInput($label, $name, $value, $size, $other);
    }

    public function TimePicker() {
        return new TimePicker();
    }

    public function Tooltip($text, $linktext = '', $link = '', $ueberschrift = '', $breite = 300, $extras = '', $keine_werte = false, $kein_bild = false, $tag = 'a') {
        return new Tooltip($text, $linktext, $link, $ueberschrift, $breite, $extras, $keine_werte, $kein_bild, $tag);
    }

    public function ZeitInput($label = '', $name = '', $value = '', $other = 'onBlur="ti2(this);"', $ohnepo = false, $mitjs = false, $valsmcurrent = false, $onSelectCallback = null) {
        return new ZeitInput($label, $name, $value, $other, $ohnepo, $mitjs, $valsmcurrent, $onSelectCallback);
    }

}
