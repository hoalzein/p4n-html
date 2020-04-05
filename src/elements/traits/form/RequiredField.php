<?php

namespace hoalzein\Prof4Net\Html\Elements\Traits\Form;

trait RequiredField {

    public $required = '';

    public function setRequired($bool = true) {
        $this->required = $bool;
        return $this;
    }

}
