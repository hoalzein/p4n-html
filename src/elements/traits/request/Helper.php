<?php

namespace hoalzein\Prof4Net\Html\Elements\Traits\Request;

trait Helper {

    public function setRequest($obj, $url, $werte) {
        $target_tag = '';
        if ($obj->id != '') {
            $target_tag = '#' . $obj->id;
        } else if ($obj->name != '') {
            $target_tag = '[name=\'' . $obj->id . '\']';
        }

        $this->customEvent .= ',template_request';
        $this->addCustomAttr('request-target', $target_tag);
        $this->addCustomAttr('request-method', 'POST');
        $this->addCustomAttr('request-url', $url);
        $this->addCustomAttr('request-data', $werte);

        return $this;
    }

}
