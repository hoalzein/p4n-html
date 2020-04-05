<?php

namespace hoalzein\Prof4Net\Html\Elements\Traits\Html;

trait Helper {

    private static function getExistingAttributes($other = '') {
        $attribute = array();
        if ($other !== '') {
            preg_match_all("/([A-Z0-9-]+)[\s]*=[\s]*[\"]([^\"]*)[\"]|([A-Z0-9-]+)[\s]*=[\s]*[']([^']*)[']/Uis", $other, $ausgabe, PREG_SET_ORDER);
            if (count($ausgabe) > 0) {
                /*  echo '<pre>';
                  print_r($ausgabe);
                  echo '</pre>'; */
                foreach ($ausgabe as $arr) {
                    if ($arr[1] != '' && $arr[2] != '') {
                        $attribute[$arr[1]] = $arr[2];
                    }
                }
            }
        }
        return $attribute;
    }

}
