<?php

function name2jsname($name = '') {
    $name = p4n_mb_string('str_replace', array('ä', 'ö', 'ü', 'Ä', 'Ö', 'Ü', 'ß'), array('ae', 'oe', 'ue', 'Ae', 'Oe', 'Ue', 'ss'), $name);
    $name = strtolower(preg_replace("/[^0-9a-zA-Z\_\-\[\]]/", "", $name));
    return $name;
}

function p4n_mb_string($art, $t, $par1 = '', $par2 = '', $par3 = '') {
    global $cfg_ws_avag_kroatien;

    if (isset($_SESSION['db_utf8']) && $_SESSION['db_utf8']) {
        mb_internal_encoding("UTF-8");

        if ($art == 'htmlspecialchars') {
            return htmlspecialchars($t, ENT_COMPAT, 'UTF-8', true);
        } elseif ($art == 'htmlentities') {
            return htmlentities($t, ENT_COMPAT, 'UTF-8', true);
        } elseif ($art == 'html_entity_decode') {
            return html_entity_decode($t, ENT_COMPAT, 'UTF-8');
        } elseif ($art == 'str_replace') {
            return str_replace($t, $par1, $par2);
        } elseif ($art == 'utf8_encode') {
            return $t;
        } elseif ($art == 'utf8_encode2') {
            return $t;
        } elseif ($art == 'utf8_decode') {
            return $t;
        } elseif ($art == 'utf8_decode2') {
            return $t;
        } elseif ($art == 'ucfirst') {
            if (function_exists('mb_strtoupper') && function_exists('mb_substr') && !empty($t)) {
                $e = 'UTF-8';
                $t = mb_strtolower($t, $e);
                $upper = mb_strtoupper($t, $e);
                preg_match('#(.)#us', $upper, $matches);
                $t = $matches[1] . mb_substr($t, 1, mb_strlen($t, $e), $e);
            } else {
                $t = ucfirst($t);
            }
            return $t;
        } elseif ($art == 'strlen') {
            return mb_strlen($t);
        } elseif ($art == 'strpos') { // int strpos ( string $haystack , mixed $needle [, int $offset = 0 ] )
            if ($par1 == '') {
                return false;
            }
            return mb_strpos($t, strval($par1));
        } elseif ($art == 'strrpos') {
            return mb_strrpos($t, $par1);
        } elseif ($art == 'substr') {
//echo mb_internal_encoding().': '.$t.'/'.$par1.'/'.$par2.' - '.mb_substr($t, $par1, $par2).'///'.mb_substr($t, $par1).'<br>';
            if ($par2 == '') {
                if (intval($par1) < 0 and p4n_mb_string('strlen', $t) < ($par1 * -1)) {
                    return $t;
                }
                return mb_substr($t, $par1);
            }
            return mb_substr($t, $par1, $par2);
        } elseif ($art == 'strtolower') {
            return mb_strtolower($t);
        } elseif ($art == 'strtoupper') {
            return mb_strtoupper($t);
        } elseif ($art == 'stripos') {
            return mb_stripos($t, strval($par1));
        } elseif ($art == 'strripos') {
            return mb_strripos($t, $par1);
        } elseif ($art == 'strstr') {
            return mb_strstr($t, $par1);
        } elseif ($art == 'stristr') {
            return mb_stristr($t, $par1);
        } elseif ($art == 'strrchr') {
            return mb_strrchr($t, $par1);
        } elseif ($art == 'substr_count') {
            return mb_substr_count($t, $par1);
        } elseif ($art == 'split') {
            return mb_split($t, $par1);
        } elseif ($art == 'ucwords') {
            return mb_convert_case($t, MB_CASE_TITLE, "UTF-8");
        }
    } else {
        $kodierung = 'iso-8859-1';
        $umwandel_array = array('html_entity_decode', 'htmlspecialchars', 'htmlentities');
        if ($cfg_ws_avag_kroatien && in_array($art, $umwandel_array) && is_string($t)) {
            $t = p4n_mb_string('utf8_encode', $t);
            $kodierung = 'utf-8';
        }
        $standard_wert = ENT_SUBSTITUTE | ENT_COMPAT;
        if ($par1 !== '') {
            $standard_wert = $par1;
        }
        if ($par2 !== '') {
            $kodierung = $par2;
        }
        if ($art == 'htmlspecialchars') {
            $temp = htmlspecialchars($t, $standard_wert, $kodierung);
            if ($cfg_ws_avag_kroatien) {
                $temp = p4n_mb_string('utf8_decode', $temp);
            }
            return $temp;
        } elseif ($art == 'htmlentities') {
            $temp = htmlentities($t, $standard_wert, $kodierung);
            if ($cfg_ws_avag_kroatien) {
                $temp = p4n_mb_string('utf8_decode', $temp);
            }
            return $temp;
        } elseif ($art == 'html_entity_decode') {
            $temp = html_entity_decode($t, ENT_COMPAT, $kodierung);
            if ($cfg_ws_avag_kroatien) {
                $temp = p4n_mb_string('utf8_decode', $temp);
            }
            return $temp;
        } elseif ($art == 'str_replace') {
            if ($par2 === '') {
                return $par2;
            }
            return str_replace($t, $par1, $par2);
        } elseif ($art == 'utf8_encode') {
            if ($cfg_ws_avag_kroatien) {
                return iconv('windows-1250', 'UTF-8', $t);
            } else {
                return utf8_encode($t);
            }
        } elseif ($art == 'utf8_decode') {
            if ($cfg_ws_avag_kroatien) {
                return iconv('UTF-8', 'windows-1250', $t);
            } else {
                return utf8_decode($t);
            }
        } elseif ($art == 'utf8_encode2') {
            if ($cfg_ws_avag_kroatien) {
                return iconv('windows-1250', 'UTF-8', $t);
            } else {
                return iconv('windows-1252', 'UTF-8', $t);
            }
        } elseif ($art == 'utf8_decode2') {
            if ($cfg_ws_avag_kroatien) {
                return iconv('UTF-8', 'windows-1250', $t);
            } else {
                return iconv('UTF-8', 'windows-1252', $t);
            }
        } elseif ($art == 'ucfirst') {
            return ucfirst($t);
        } elseif ($art == 'strlen') {
            return strlen($t);
        } elseif ($art == 'strpos') { // int strpos ( string $haystack , mixed $needle [, int $offset = 0 ] )
            if ($par1 == '') {
                return false;
            }
            return strpos($t, strval($par1));
        } elseif ($art == 'strrpos') {
            return strrpos($t, $par1);
        } elseif ($art == 'substr') {
            if ($par2 == '') {
                if (intval($par1) < 0 and strlen($t) < ($par1 * -1)) {
                    return $t;
                }
                return substr($t, $par1);
            }
            return substr($t, $par1, $par2);
        } elseif ($art == 'strtolower') {
            return strtolower($t);
        } elseif ($art == 'strtoupper') {
            return strtoupper($t);
        } elseif ($art == 'stripos') {
            return stripos($t, strval($par1));
        } elseif ($art == 'strripos') {
            return strripos($t, $par1);
        } elseif ($art == 'strstr') {
            return strstr($t, $par1);
        } elseif ($art == 'stristr') {
            return stristr($t, $par1);
        } elseif ($art == 'strrchr') {
            return strrchr($t, $par1);
        } elseif ($art == 'substr_count') {
            return substr_count($t, $par1);
        } elseif ($art == 'split') {
            return split($t, $par1);
        } elseif ($art == 'ucwords') {
            return ucwords($t);
        }
    }
    return $t;
}
