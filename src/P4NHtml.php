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
        $breadcrumbs = new Breadcrumbs($objectList);
        return $breadcrumbs->getHtml();
    }

    public function Button($text = '', $href = 'javascript:void(0);', $bild = '', $abfrage = '', $other = '') {
        $button = new Button($text, $href, $bild, $abfrage, $other);
        return $button->getHtml();
    }

    public function Card($titel, $object = null) {
        $card = new Card($titel, $object);
        return $card->getHtml();
    }

    public function CheckInput($name, $label = '', $checked = false, $other = '', $value = '') {
        $check_input = new CheckInput($name, $label, $checked, $other, $value);
        return $check_input->getHtml();
    }

    public function DatePicker() {
        $date_picker = new DatePicker();
        return $date_picker->getHtml();
    }

    public function DatumInput($label = '', $name = '', $value = '', $other = 'onBlur=" cdat(this); ti2(this);"', $ohnepo = false, $mitjs = false, $valsmcurrent = false, $onSelectCallback = null) {
        $datum_input = new DatumInput($label, $name, $value, $other, $ohnepo, $mitjs, $valsmcurrent, $onSelectCallback);
        return $datum_input->getHtml();
    }

    public function Divider($name = '') {
        $divider = new Divider($name);
        return $divider->getHtml();
    }

    public function FileInput($fileUploadId, $uploadErrorList = []) {
        $file_input = new FileInput($fileUploadId, $uploadErrorList);
        return $file_input->getHtml();
    }

    public function Form($name = 'leer', $action = '', $method = 'POST', $file = false, $other = '', $readonly = false, $mitaltwert = false, $keinjs = false, $object = null) {
        $form = new Form($name, $action, $method, $file, $other, $readonly, $mitaltwert, $keinjs, $object);
        return $form->getHtml();
    }

    public function GridTable($rows = array()) {
        $grid_table = new GridTable($rows);
        return $grid_table->getHtml();
    }

    function GridTableColumn($s = 0, $m = 0, $l = 0, $obj = null) {
        $grid_table_column = new GridTableColumn($s, $m, $l, $obj);
        return $grid_table_column->getHtml();
    }

    public function GridTableRow() {
        $grid_table_row = new GridTableRow();
        return $grid_table_row->getHtml();
    }

    public function HiddenInput($name = '', $value = false, $other = '', $nameals_id = false) {
        $hidden_input = new HiddenInput($name, $value, $other, $nameals_id);
        return $hidden_input->getHtml();
    }

    public function Icon($name) {
        $icon = new Icon($name);
        return $icon->getHtml();
    }

    public function IconButton($text = '', $href = 'javascript:void(0);', $bild = '', $abfrage = '', $other = '') {
        $icon_button = new IconButton($text, $href, $bild, $abfrage, $other);
        return $icon_button->getHtml();
    }

    public function InlineOverlay() {
        $inline_overlay = new InlineOverlay();
        return $inline_overlay->getHtml();
    }

    public function Link($text = '', $href = 'javascript:void(0);', $bild = '', $abfrage = '', $other = '') {
        $link = new Link($text, $href, $bild, $abfrage, $other);
        return $link->getHtml();
    }

    public function LinkList($linkElementList = array()) {
        $link_list = new LinkList($linkElementList);
        return $link_list->getHtml();
    }

    public function ProgressBar($id) {
        $progress_bar = new ProgressBar($id);
        return $progress_bar->getHtml();
    }

    public function RadioInput($name, $label = '', $value = '', $default = -99, $other = '', $trennung = '', $tr = false) {
        $radio_input = new RadioInput($name, $label, $value, $default, $other, $trennung, $tr);
        return $radio_input->getHtml();
    }

    public function SelectInput($label = '', $name = '', $inhaltfeld = array(), $default = -99, $bw = false, $other = '', $multiple = false, $multiple_rows = 5, $cache = array()) {
        $select_input = new SelectInput($label, $name, $inhaltfeld, $default, $bw, $other, $multiple, $multiple_rows, $cache);
        return $select_input->getHtml();
    }

    public function Submit($name, $value = 'submit', $other = '', $image = '', $bed = '', $bedother = '') {
        $submit = new Submit($name, $value, $other, $image, $bed, $bedother);
        return $submit->getHtml();
    }

    public function Table($rows = array(), $options = array()) {
        $table = new Table($rows, $options);
        return $table->getHtml();
    }

    public function TableColumn($name = '') {
        $table_column = new TableColumn($name);
        return $table_column->getHtml();
    }

    public function TableHeader($name) {
        $table_header = new TableHeader($name);
        return $table_header->getHtml();
    }

    public function TableRow($key) {
        $table_row = new TableRow($key);
        return $table_row->getHtml();
    }

    public function Tabs() {
        $tabs = new Tabs();
        return $tabs->getHtml();
    }

    public function Text($text = '', $zeichen = -1) {
        $text_element = new Text($text, $zeichen);
        return $text_element->getHtml();
    }

    public function TextArea($name, $label = '', $value = '', $breite = 20, $hoehe = 3, $other = '') {
        $text_area = new TextArea($name, $label, $value, $breite, $hoehe, $other);
        return $text_area->getHtml();
    }

    public function TextInput($label = '', $name = '', $value = '', $size = '', $other = '') {
        $text_input = new TextInput($label, $name, $value, $size, $other);
        return $text_input->getHtml();
    }

    public function TimePicker() {
        $time_picker = new TimePicker();
        return $time_picker->getHtml();
    }

    public function Tooltip($text, $linktext = '', $link = '', $ueberschrift = '', $breite = 300, $extras = '', $keine_werte = false, $kein_bild = false, $tag = 'a') {
        $tool_tip = new Tooltip($text, $linktext, $link, $ueberschrift, $breite, $extras, $keine_werte, $kein_bild, $tag);
        return $tool_tip->getHtml();
    }

    public function ZeitInput($label = '', $name = '', $value = '', $other = 'onBlur="ti2(this);"', $ohnepo = false, $mitjs = false, $valsmcurrent = false, $onSelectCallback = null) {
        $zeit_input = new ZeitInput($label, $name, $value, $other, $ohnepo, $mitjs, $valsmcurrent, $onSelectCallback);
        return $zeit_input->getHtml();
    }

}
