<?php
	if (isset($_SESSION)) {
		$_SESSION['lead_art_sparte']=false;
		if ($cfg_betatest or $_SESSION['cfg_kunde']=='carlo_opel_prof4net') {
			$_SESSION['lead_art_sparte']=true;
		}
	}
	if (!class_exists('Modern_Register') && file_exists($cfg_basedir.'inc/Modern/Register.php')) {
        require_once($cfg_basedir.'inc/Modern/Register.php');
        $register=new Modern_Register();
        $register->setModern();
    }
    
    if (!empty($stammdaten_korrespondenz)) {
        $stammdaten_korrespondenz[111] = $lang['_FAHRZEUGAENDERUNG_'];
        $stammdaten_korrespondenz_ea[111] = 1;
        $k_art_symbole[111] = 'kfz_historie.png';
        
        $stammdaten_korrespondenz[112] = $lang['_MASSNAHME_'];
        $stammdaten_korrespondenz_ea[112] = 2;
        $k_art_symbole[112] = 'icon_flash.png';
    }
    
    if (version_compare(phpversion(), '7.1.0', '>')) {
        if (!function_exists('undefined_vars')) {
            function undefined_vars( $num, $str, $file, $line, $context = null ) {
                if ($num == 2 && substr($str, 0, strlen('Use of undefined constant')) == 'Use of undefined constant') {
                    $handle = fopen(dirname(__FILE__).'/__undefined_vars_7.2.txt', 'a+');
                    fwrite($handle, date('Y-m-d H:i:s').' - Zeile: '.$line.' - '.$file.' - '.$str."\n");
                    fclose($handle);
                    return true;
                }
            }
        }
        set_error_handler("undefined_vars");
    }
	if ($s4c_neu and !isset($cfg_dmsbezeichnung)) {
		$cfg_dmsbezeichnung='DMS';
	}
	if (!is_array($notOpelLeads) || empty($notOpelLeads)) {
        $notOpelLeads = array('Web Jassy', 'Ford LDS', 'OFDB', 'OFDB'.' '.$lang['_SP_AUFGABEN_'], 'MBNL', $lang['_KONTAKTFORMULAR_'], $lang['_FAHRZEUGBOERSEN_'], 'Toyota', 'Ferrari', 'Facebook', 'AutoUncle');
    }
    $retailerLeads = array('Ford LDS', 'MBNL', 'Toyota', 'Ferrari'); // Hier bitte alle Leads auflisten, die Hersteller Leads sind
    if (isset($cfg_retailer_leads) && !empty($cfg_retailer_leads)) {
        foreach ($cfg_retailer_leads as $retailname) {
            if ($retailname!='') {
                $retailerLeads[] = $retailname;
            }
        }
    }
	if (intval($cfg_logouttime) > 0 && $_SESSION['user_id'] > 0) {
	    if (intval($_SESSION['time_validation']) > 0 && intval($_SESSION['time_validation']) < time()) {
            destroySession();
	    }
        if (basename($phs) !== 'sofortnachricht.php') {
            $_SESSION['time_validation'] = time()+$cfg_logouttime;
        }
	}
    if (!isset($_SESSION['crm_version']) || $_SESSION['crm_version']=='61') { 
        if (!class_exists('auth') && file_exists($cfg_basedir.'inc/auth.php')) {
            require_once($cfg_basedir.'inc/auth.php');
        }
        if (class_exists('auth')) {
            $auth_output=new auth($cfg_basedir);
            $_SESSION['crm_version_complete'] = $auth_output->getVersion(true);
            $version_explode = explode('.', $_SESSION['crm_version_complete']);
            $digit_number='';
            for ($len_i = strlen($version_explode[2]); $len_i < 3; $len_i++) {
                $digit_number.='0';
            }
            $_SESSION['crm_version_float'] = floatval($version_explode[0].$version_explode[1].'.'.$digit_number.$version_explode[2]);
            $_SESSION['crm_version'] = str_replace('.', '', $auth_output->getVersion());
        }
    }
    if ($cfg_leadmanagement_2020) {
        if (!is_array($plugin_list) || empty($plugin_list)) {
            $plugin_list = array();
        }
        if (!in_array('Plugin_System_LeadTracker', $plugin_list)) {
            $plugin_list[] = 'Plugin_System_LeadTracker';
        }
    }
    if (substr($_SESSION['cfg_kunde'], 0, strlen('carlo_opel_avag'))=='carlo_opel_avag' && !isset($sc_crm_hostpfad)) {
        $neueavd=substr($_SERVER["HTTP_HOST"], 0, 3);
        $url_crm = 'http://'.$_SERVER["HTTP_HOST"];
        $crm_path = '/crm/';
        if (is_numeric($neueavd)) {
            $d_avag_bnr=$neueavd;
            $url_crm = 'http://'.$d_avag_bnr.'crm.avag.holding';
        }
        $sc_crm_hostpfad=$url_crm.$crm_path;
    }
	if (!class_exists('extract_form') && file_exists($cfg_basedir.'inc/htmlform_zusatz.php')) {
	    include($cfg_basedir.'inc/htmlform_zusatz.php');
	}
    
    if (!function_exists('adodb_date')) {
        function adodb_date($str, $time = '') {
            if ($time != '') {
                return date($str, $time);
            }
            return date($str);
        }
    }
    
    if (!function_exists('session_unregister')) {
        function session_unregister($wert = '') {
            unset($_SESSION[$wert]);
            unset(${$wert});
            return true;
        }
    }
    if (!function_exists('session_register')) {
        function session_register($key = '', $wert = true) {
            $_SESSION[$key] = $wert;
            return true;
        }
    }
    if (!function_exists('__checkLibSn')) {
        // Means we're including lbSn only when this function is called.
        // No harm done.
        function __checkLibSn() {
            if (!function_exists('template_parse')) {
                require_once('inc/lib_sn.php');
            }
        }
    }
    if (!function_exists('split')) {
        function split($p1, $p2) {
            return explode($p1, $p2);
        }
    }
    if (!function_exists('boolval')) {
        function boolval($p1) {
            return (bool)$p1;
        }
    }
    
    if (!function_exists('array_column')) {
        function array_column($input = null, $columnKey = null, $indexKey = null) {
            $argc = func_num_args();
            $params = func_get_args();
            if ($argc < 2) {
                trigger_error("array_column() expects at least 2 parameters, {$argc} given", E_USER_WARNING);
                return null;
            }
            if (!is_array($params[0])) {
                trigger_error('array_column() expects parameter 1 to be array, ' . gettype($params[0]) . ' given', E_USER_WARNING);
                return null;
            }
            if (!is_int($params[1]) && !is_float($params[1]) && !is_string($params[1]) && $params[1] !== null && !(is_object($params[1]) && method_exists($params[1], '__toString'))) {
                trigger_error('array_column(): The column key should be either a string or an integer', E_USER_WARNING);
                return false;
            }
            if (isset($params[2]) && !is_int($params[2]) && !is_float($params[2]) && !is_string($params[2]) && !(is_object($params[2]) && method_exists($params[2], '__toString'))) {
                trigger_error('array_column(): The index key should be either a string or an integer', E_USER_WARNING);
                return false;
            }
            $paramsInput = $params[0];
            $paramsColumnKey = ($params[1] !== null) ? (string) $params[1] : null;
            $paramsIndexKey = null;
            if (isset($params[2])) {
                if (is_float($params[2]) || is_int($params[2])) {
                    $paramsIndexKey = (int) $params[2];
                } else {
                    $paramsIndexKey = (string) $params[2];
                }
            }
            $resultArray = array();
            foreach ($paramsInput as $row) {
                $key = $value = null;
                $keySet = $valueSet = false;
                if ($paramsIndexKey !== null && array_key_exists($paramsIndexKey, $row)) {
                    $keySet = true;
                    $key = (string) $row[$paramsIndexKey];
                }
                if ($paramsColumnKey === null) {
                    $valueSet = true;
                    $value = $row;
                } elseif (is_array($row) && array_key_exists($paramsColumnKey, $row)) {
                    $valueSet = true;
                    $value = $row[$paramsColumnKey];
                }
                if ($valueSet) {
                    if ($keySet) {
                        $resultArray[$key] = $value;
                    } else {
                        $resultArray[] = $value;
                    }
                }
            }
            return $resultArray;
        }
    }
    
    $nutzen_sparte_array = array(
        'crm_vw_asbberlin' => 1,
        'crm_audi_berlin' => 1,
        'crm_audi_frankfurt' => 1,
        'carlo_vw_audihannover' => 1,
        'crm_audi_stuttgart' => 1,
        'carlo_vw_ba' => 1,
        'crm_vw_ulm' => 1,
        'carlo_vw_mahag' => 1,
        'crm_vw_schwaba' => 1,
        'carlo_vw_t4net_ab' => 1,
        'crm_vw_chemnitz' => 1,
        'crm_vw_frankfurt' => 1,
        'crm_vw_hamburg' => 1,
        'crm_audi_hamburg' => 1,
        'crm_audi_leipzig' => 1,
        'crm_vw_hannover' => 1,
        'kunde_kfz_leipzig' => 1,
        'crm_vw_rhein' => 1,
        'crm_vw_stuttgart' => 1,
        'crm_vw_hwgruppe' => 1,
        'carlo_opel_prof4net' => 1
    );
    
	function destroySession() {
	    $params = session_get_cookie_params();
	    setcookie(session_name(), '', time() - 42000,
		$params["path"], $params["domain"],
		$params["secure"], $params["httponly"]
	    );
	    //$_SESSION['time_validation'] = time() - 42000;
	    unset($_SESSION['time_validation']);
	    refreshSite();
	    //exit;
	}
	
	function refreshSite() {
	    clear_all_buffer();
        ob_start();
	    $header = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
			<html><head><meta http-equiv="refresh" content="0; URL=index.php"></head><body></body></html>';
	    echo $header;
	}
	function create_token($create_new = false) {
	    if ($create_new || !isset($_SESSION['p4ntoken'])) {
		$_SESSION['p4ntoken'] = str_replace(array('+', '=', '_', '-', ' '), '', base64_encode(md5(uniqid(rand(rand(0, time()), time()), TRUE))));
	    }
	    return $_SESSION['p4ntoken'];
	}
	
	function check_token(&$ar) {
	    $tokengueltig = true;
	    $token = create_token();
	    
	    if (is_array($ar) && count($ar) > 0) {
		if ($ar['p4ntoken'] == '' or $ar['p4ntoken'] != $token) {
		    $tokengueltig = false;
		}
		create_token(true);
		if (!$tokengueltig) {
		    $ar = array();
		    if ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
			header('p4ntoken: '.create_token());
		    }
		    $_SESSION['time_validation'] = time() - 42000;
		    refreshSite();
		    exit;
		}
		if ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
		    header('p4ntoken: '.create_token());
		}
	    }
	    return $ar;
	}
        

	function getpost_sec(&$ar) {
	    $ar = check_token($ar);
	    return getpost($ar);
	}
	
        function unescape3_output($source, $iconv_to = 'UTF-8') {
            $decodedStr = '';
            $pos = 0;
            $len = strlen($source);
            $is_utf8_source=false;
            while ($pos < $len) {
                $charAt = substr($source, $pos, 1);
                if ($charAt == '%') {
                    $pos++;
                    $charAt = substr($source, $pos, 1);
                    if ($charAt == 'u') {
                        // we got a unicode character
                        $pos++;
                        $unicodeHexVal = substr($source, $pos, 4);
                        $unicode = hexdec($unicodeHexVal);
                        $decodedStr .= code2utf($unicode);
                        $pos += 4;
                $is_utf8_source=true;
                    } elseif (1 == 2) {
                        // we have an escaped ascii character
                        $hexVal = substr($source, $pos, 2);
                        $decodedStr .= chr(hexdec($hexVal));
                        $pos += 2;
                    } else {
                        $decodedStr .= '%';
                    }
                } else {
                    $decodedStr .= $charAt;
                    $pos++;
                }
            }

            if ($iconv_to != "UTF-8" && $is_utf8_source) {
                $decodedStr = iconv("UTF-8", $iconv_to, $decodedStr);
            }

            return $decodedStr;
        }

        if (!function_exists('encode_big5_entities')) {
            function encode_big5_entities(&$data) {
                static $big5Entities = array(
                    '&#26080;',
                    '&#21129;',
                    '&#24833;',
                    '&#17746;',
                    '&#40175;',
                    '&#34137;',
                    '&#154928;',
                    '&#19314;',
                    '&#x25584;'
                );
                if (is_array($data)) {
                    foreach ($data as $key => $value) {
                        if (is_array($value)) {
                            encode_big5_entities($value);
                            $data[$key] = $value;
                        }
                        else {
                            foreach ($big5Entities as $entity) {
                                $val_html_decoded=html_entity_decode($entity, ENT_QUOTES | ENT_XML1, 'UTF-8');
                                if (strpos($value, $val_html_decoded) !== false) {
                                    $value = p4n_mb_string('str_replace', $val_html_decoded, $entity, $value);
                                }
                                $data[$key] = $value;
                            }
                        }
                    }
                }
                else {
                    foreach ($big5Entities as $entity) {
                        $val_html_decoded=html_entity_decode($entity, ENT_QUOTES | ENT_XML1, 'UTF-8');
                        if (strpos($data, $val_html_decoded) !== false) {
                            $data = p4n_mb_string('str_replace', $val_html_decoded, $entity, $data);
                        }
                    }
                }
            }
        }

        if (!function_exists('decode_big5_entities')) {
            function decode_big5_entities(&$data) {
                static $big5Entities = array(
                    '&#26080;',
                    '&#21129;',
                    '&#24833;',
                    '&#17746;',
                    '&#40175;',
                    '&#34137;',
                    '&#154928;',
                    '&#19314;',
                    '&#x25584;'
                );
                if (is_array($data)) {
                    foreach ($data as $key => $value) {
                        if (is_array($value)) {
                            decode_big5_entities($value);
                            $data[$key] = $value;
                        }
                        else {
                            foreach ($big5Entities as $entity) {
                                $val_html_decoded=html_entity_decode($entity, ENT_QUOTES | ENT_XML1, 'UTF-8');
                                if (p4n_mb_string('strpos', $value, $entity) !== false) {
                                    $value = p4n_mb_string('str_replace', $entity, $val_html_decoded, $value);
                                }
                                $data[$key] = $value;
                            }
                        }
                    }
                }
                else {
                    foreach ($big5Entities as $entity) {
                        $val_html_decoded=html_entity_decode($entity, ENT_QUOTES | ENT_XML1, 'UTF-8');
                        if (p4n_mb_string('strpos', $data, $entity) !== false) {
                            $data = p4n_mb_string('str_replace', $entity, $val_html_decoded, $data);
                        }
                    }
                }
            }
        }
	
        if (!function_exists('getpost')) {
                function getpost(&$ar) {
                    global $carlo_tw;
                    if (!empty($ar['order'])) {
                        if ($ar['order']!=='desc' && $ar['order']!=='asc') {
                            $ar['order']='';
                        }
                    }

                    while (list($key, $val)=@each($ar)) {
                        if (!is_numeric($key) && $key==='sort') {
                            continue;
                        }

                        if (is_array($val)) {
                            $ar[$key]=getpost($val);
                        } else {
                            $val = p4n_mb_string('str_replace', '__PLUS__', '+', $val);
                            if (p4n_mb_string('substr', $val, 0, 6) == 'p4nn4p') {//Alles in elseif weil einmal kodieren reicht
                                //$val = iconv('UTF-8', 'windows-1252', p4n_mb_string('str_replace', array('nafuhrungs', 'bockslsh', 'intstrihc'), array('\'', '\\', '_'), p4n_mb_string('substr', $val, 6)));
                                $val = p4n_mb_string('utf8_decode2', p4n_mb_string('str_replace', array('nafuhrungs', 'bockslsh', 'intstrihc'), array('\'', '\\', '_'), p4n_mb_string('substr', $val, 6)));
                            } elseif ($_SESSION['sprache']=='lang_kr.php') {
                                $val=unescape3_output($val, 'windows-1250');
                            } elseif ($_SESSION['cfg_kunde']=='carlo_opel_russland') {
                                $val=unescape3_output($val, 'cp1251');
                            } elseif (get_magic_quotes_gpc()) {
                                if ($_SESSION['ajx']==1) {
                                    $val=p4n_mb_string('utf8_decode', stripslashes($val));
                                } else {
                                    $val=stripslashes($val);
                                }
                            } elseif ($_SESSION['ajx']==1 and isset($_POST['utf_cod'])) {
                                $val=p4n_mb_string('utf8_decode', stripslashes($val));
                            }
                            if ($_SESSION['db_utf8']) {
                                $val=unescape3_output($val);//utf8_encode(stripslashes($val));
                            }
                            $ar[$key]=$val;
                        }
                    }
                    if ($carlo_tw) {
                        encode_big5_entities($ar);
                    }

                @reset($ar);
                return $ar; //  because we pass the array in as reference type, we shouldn't need to return it. Just saying.
            }
        }
	
        if (file_exists($cfg_basedir.'inc/PearAutoloader.php')) {
            require_once($cfg_basedir.'inc/PearAutoloader.php');
            // first call to instance() does SPL registering and such.
            // This also adds inc/ as a default base path. Plugins may use this method
            // To add their own namespace roots for shorter class names.
            PearAutoLoader::instance()->addSourceRoot($cfg_basedir.'inc');
            if (!empty($plugin_list) && class_exists('Plugin_Registry')) {
                Plugin_Registry::instance()->loadPlugins();
            }
            if (class_exists('System_Log') && (isset($_COOKIE['debug']) || isset($_GET['debug_theel']))) {
                if ($_COOKIE['debug_to_file']) {
                    $handle = fopen("temp/syslog_out.log", 'a+');
                    register_shutdown_function('System_Log::dump', $handle);
                }
                else {
                    register_shutdown_function('System_Log::dump');
                }
            }
        }
        if ($_SESSION['cfg_security_level']>0) {
            class xss {
                static function filter($in) {
                    if (is_array($in) && count($in) > 0) {
                    return self::filterXSS($in);
                    }
                    if (is_string($in) || is_numeric($in)) {
                        return self::encodeString($in);
                    }
                    return '';
                }

                static function filterXSS($array=array()) {
                    $output = array();
                    $whiteliste=array('extcrmziel','extcrmziel2','p4ntoken','sw','sql','kziel','sql2');

                    if (!empty($_GET) && isset($_GET['nav']) && $_GET['nav']=='Korrespondenz' && isset($_GET['kurzk']) && isset($_GET['apid']) && isset($_GET['nr']) && isset($_GET['ajax'])) {
                        $whiteliste[]='nr';
                    }


                    if (is_array($array) && count($array) > 0) {
                        foreach ($array as $key => $value) {
                            if (!in_array($key, $whiteliste)) {
                                $key = self::encodeString($key);
                            }
                            //echo output($key, 4) . '<br>';
                            if (!is_array($value)) {
                                if (is_string($value)) {
                                    if (!in_array($key, $whiteliste)) {
                                    $value = self::encodeString($value);
                                    }
                                    //echo output($value, 4) . '<br>';
                                }
                            } else {
                                //$output[$key] = self::filterXSS($value,$output);
                                $value = self::filterXSS($value);
                            }
                            //echo $key.' '.$value;
                            $output[$key] = $value;

                        }
                    }
                    return $output;
                }

                static function encodeString($string) {
                    if (is_null($string) || !is_string($string)) {
                        return $string;
                    }
                    
                    $reg = array(               //bis auf = und ; ist alles dabei aus der pdf
                        array(//<
                            '/[\<]/',
                            '/[\&][l][t](;)?/i',
                            '/[\&][\#]([0-9]{0,5})(60)[;]?/',
                            '/([\&][\#]|[\\\\])([x]|[u])([0-9]{0,5})(3C)[;]?/i',
                            '/[\%][3][C]/i'
                        ),
                        array(//> %3E &#62    &#x3E   &gt;
                            '/[\>]/',
                            '/[\&][g][t](;)?/i',
                            '/[\&][\#]([0-9]{0,5})(62)[;]?/',
                            '/([\&][\#]|[\\\\])([x]|[u])([0-9]{0,5})(3E)[;]?/i',
                            '/[\%][3][E]/i'
                        ),
                        array(// (  &#40 &#x28 %28
                            '/[\(]/',
                            '/[\&][\#]([0-9]{0,5})(40)[;]?/',
                            '/([\&][\#]|[\\\\])([x]|[u])([0-9]{0,5})(28)[;]?/i',
                            '/[\%][2][8]/i'
                        ),
                        array(// ) &#41 &#x29 %29 
                            '/[\)]/',
                            '/[\&][\#]([0-9]{0,5})(41)[;]?/',
                            '/([\&][\#]|[\\\\])([x]|[u])([0-9]{0,5})(29)[;]?/i',
                            '/[\%][2][9]/i'
                        ),
                        array(// [ &#91	&#x5B 	%5B
                            '/[\[]/',
                            '/[\&][\#]([0-9]{0,5})(91)[;]?/',
                            '/([\&][\#]|[\\\\])([x]|[u])([0-9]{0,5})(5B)[;]?/i',
                            '/[\%][5][B]/i'
                        ),
                        array(// ] &#93	 &#x5D  %5D
                            '/[\]]/',
                            '/[\&][\#]([0-9]{0,5})(93)[;]?/',
                            '/([\&][\#]|[\\\\])([x]|[u])([0-9]{0,5})(5D)[;]?/i',
                            '/[\%][5][D]/i'
                        ),
                        array(// { &#123    &#x7B   %7B
                            '/[\{]/',
                            '/[\&][\#]([0-9]{0,5})(123)[;]?/',
                            '/([\&][\#]|[\\\\])([x]|[u])([0-9]{0,5})(7B)[;]?/i',
                            '/[\%][7][B]/i'
                        ),
                        array(// } &#125    &#x7D   %7D
                            '/[\}]/',
                            '/[\&][\#]([0-9]{0,5})(125)[;]?/',
                            '/([\&][\#]|[\\\\])([x]|[u])([0-9]{0,5})(7D)[;]?/i',
                            '/[\%][7][D]/i'
                        ),
                        array(// \  &#92    &#x5C   %5C
                            '/[\\\\]/',
                            '/[\&][\#]([0-9]{0,5})(92)[;]?/',
                            '/([\&][\#]|[\\\\])([x]|[u])([0-9]{0,5})(5C)[;]?/i',
                            '/[\%][5][C]/i'
                        ),
                        array(// '  &#39    &#x27  %27
                            '/[\']/',
                            '/[\&][\#]([0-9]{0,5})(39)[;]?/',
                            '/([\&][\#]|[\\\\])([x]|[u])([0-9]{0,5})(27)[;]?/i',
                            '/[\%][2][7]/i'
                        ),
                        array(//" &quot; &#34;  &#x22;  %22
                            '/[\"]/',
                            '/[\&][q][u][o][t](;)?/i',
                            '/[\&][\#]([0-9]{0,5})(34)[;]?/',
                            '/([\&][\#]|[\\\\])([x]|[u])([0-9]{0,5})(22)[;]?/i',
                            '/[\%][2][2]/i'
                        ),
                        array(//& &amp;  &#38	&#x26  %26
                            '/[\&]/',
                            '/[\&][a][m][p](;)?/i',
                            '/[\&][\#]([0-9]{0,5})(38)[;]?/',
                            '/([\&][\#]|[\\\\])([x]|[u])([0-9]{0,5})(26)[;]?/i',
                            '/[\%][2][6]/i'
                        ),
                        array(//+ &#43   &#x2B   %2B
                            '/[\+]/',
                            '/[\&][\#]([0-9]{0,5})(43)[;]?/',
                            '/([\&][\#]|[\\\\])([x]|[u])([0-9]{0,5})(2B)[;]?/i',
                            '/[\%][2][B]/i'
                        ),
                        array(//# &#35  &#x23   %23
                            '/[\#]/',
                            '/[\&][\#]([0-9]{0,5})(35)[;]?/',
                            '/([\&][\#]|[\\\\])([x]|[u])([0-9]{0,5})(23)[;]?/i',
                            '/[\%][2][3]/i'
                        ),
                        array(//%   &#37   &#x25  %25
                            '/[\%]/',
                            '/[\&][\#]([0-9]{0,5})(37)[;]?/',
                            '/([\&][\#]|[\\\\])([x]|[u])([0-9]{0,5})(25)[;]?/i',
                            '/[\%][2][5]/i'
                        ),
                        array(//! &#33 &#x21 %21
                            '/[\!]/',
                            '/[\&][\#]([0-9]{0,5})(33)[;]?/',
                            '/([\&][\#]|[\\\\])([x]|[u])([0-9]{0,5})(21)[;]?/i',
                            '/[\%][2][1]/i'
                        ),
                        array(//= &#61  &#x3D  %3D
                            '/[\=]/',
                            '/[\&][\#]([0-9]{0,5})(61)[;]?/',
                            '/([\&][\#]|[\\\\])([x]|[u])([0-9]{0,5})(3D)[;]?/i',
                            '/[\%][3][D]/i'
                        ),
                        /*array(//; &#59  &#x3B %3B
                            '/[\;]/',
                            '/[\&][\#]([0-9]{0,5})(59)[;]?/',
                            '/([\&][\#]|[\\\\])([x]|[u])([0-9]{0,5})(3B)[;]?/i',
                            '/[\%][3][B]/i'
                        ),*/
                    );

                    $replaces = array(
                        'p4nxss60;', //<
                        'p4nxss62;', //>
                        'p4nxss40;', //(
                        'p4nxss41;', //)
                        'p4nxss91;', //[
                        'p4nxss93;', //]
                        'p4nxss123;', //{
                        'p4nxss125;', //}
                        'p4nxss92;', //\
                        'p4nxss39;', //'
                        'p4nxss34;', //"
                        'p4nxss38;', //&
                        'p4nxss43;', //+
                        'p4nxss23;', //#
                        'p4nxss37;', //%
                        'p4nxss33;', //!
                        'p4nxss61;', //=
                       // 'p4nxss59;', //;
                    );
                    $is_utf8 = false;
                    if ($_SESSION['db_utf8'] && substr($string, 0, 2) == '%u') {
                        $string = str_replace('%u', 'PREp4nzNoTU', $string);
                        $is_utf8 = true;
                    }
                    for ($i = 0; $i < count($reg); $i++) {
                        for ($j = 0; $j < count($reg[$i]); $j++) {
                            $string = preg_replace($reg[$i][$j], $replaces[$i], $string);
                        }
                    }
                    if ($is_utf8) {
                        $string = str_replace('PREp4nzNoTU', '%u', $string);
                    }
                    $string = str_replace('p4nxss', '&#', $string);
                    return $string;
                }

                static function decodeString($str='',$zeichen=array()) {
                    if (is_null($str) || !is_string($str)) {
                        return $str;
                    }
                    $reg = array(               //bis auf = und ; ist alles dabei aus der pdf
                            '/[\&][\#][6][0][\;]/',
                            '/[\&][\#][6][2][\;]/',
                            '/[\&][\#][4][0][\;]/',
                            '/[\&][\#][4][1][\;]/',
                            '/[\&][\#][9][1][\;]/',
                            '/[\&][\#][9][3][\;]/',
                            '/[\&][\#][1][2][3][\;]/',
                            '/[\&][\#][1][2][5][\;]/',
                            '/[\&][\#][9][2][\;]/',
                            '/[\&][\#][3][9][\;]/',
                            '/[\&][\#][3][4][\;]/',
                            '/[\&][\#][3][8][\;]/',
                            '/[\&][\#][4][3][\;]/',
                            '/[\&][\#][2][3][\;]/',
                            '/[\&][\#][3][7][\;]/',
                            '/[\&][\#][3][3][\;]/',
                            '/[\&][\#][6][1][\;]/',
                           // '/[\&][\#][5][9][\;]/',
                    );
                    $replaces = array(
                        '<', //<
                        '>', //>
                        '(', //(
                        ')', //)
                        '[', //[
                        ']', //]
                        '{', //{
                        '}', //}
                        '\\', //\
                        "'", //'
                        '"', //"
                        '&', //&
                        '+', //+
                        '#', //#
                        '%', //%
                        '!', //!
                        '=', //=
                       // ';', //;
                    );
                    for ($i = 0; $i < count($reg); $i++) {
                            if (is_array($zeichen) && count($zeichen)>0) {
                                if (in_array($replaces[$i],$zeichen)) {
                                    $str = preg_replace($reg[$i], $replaces[$i], $str);
                                } else {
                                   $str=$str; 
                                }
                            } else {
                                $str = preg_replace($reg[$i], $replaces[$i], $str);
                            }
                    }
                    return $str;
                }
                
                static function decodeMixed($mixed) {
                    $returnmixed = null;
                    if (is_array($mixed)) {
                        $returnmixed=array();
                        foreach ($mixed as $key => $value) {
                            $returnmixed[xss::decodeMixed($key)] = xss::decodeMixed($value);
                        }
                    } elseif (is_string($mixed)) {
                        $returnmixed = xss::decodeString($mixed);
                    } else {
                        $returnmixed = $mixed;
                    }
                    return $returnmixed;
                }
            }
        } else {
            class xss {
                static function filter($in) {
                    return $in;
                }

                static function filterXSS($array=array()) {
                    return $array;
                }

                static function encodeString($string) {
                    return $string;
                }

                static function decodeString($str='',$zeichen=array()) {
                    return $str;
                }
                
                static function decodeMixed($mixed) {
                    return $mixed;
                }
            }
        }
        if ($_SESSION['cfg_security_level'] == 9 || $_SESSION['cfg_security_level'] == 1 || $_SESSION['cfg_security_level'] == 4 || $_SESSION['cfg_security_level'] == 6) {
            

            
        $_GET=xss::filter($_GET);
        $_POST=xss::filter($_POST);
        if (!empty($getfeld)) {
            $getfeld = xss::filter($getfeld);
        }
        if (!empty($feld2)) {
            $feld2 = xss::filter($feld2);
        }
        if (!empty($postfeld)) {
            $postfeld = xss::filter($postfeld);
        }
        if (!empty($feld)) {
            $feld = xss::filter($feld);
        }
        function filterXSS_whitelist($postarray = array(), $whiteliste = array(), $keys_array = array()) {
                $output = array();
                if (!empty($postarray)) {
                    foreach ($postarray as $postkey => $postvalue) {
                        if (!is_array($postvalue) && is_string($postvalue)) {
                            if ($postvalue!='') {
                                if (is_array($whiteliste[$postkey])) {
                                    $postvalue = xss::decodeString($postvalue, $whiteliste[$postkey]);
                                } else {
                                    foreach ($keys_array as $postkey_oldvalues) {
                                        if (is_array($whiteliste[$postkey_oldvalues])) {
                                            $postvalue = xss::decodeString($postvalue, $whiteliste[$postkey_oldvalues]);
                                        }
                                    }
                                }
                            }
                        } elseif (is_array($postvalue)) {
                            $keys_array[] = $postkey;
                            $postvalue = filterXSS_whitelist($postvalue, $whiteliste, $keys_array);
                        }
                        $output[$postkey] = $postvalue;
                    }
                } 
                return $output;    
        }


        $whiteliste_post=array(
            'admin_filter2.php'=>array(
                'klammerauf' => array('('),
                'klammerzu' => array(')'),
                'vergleich' => array('=', '>', '<', '!'),
                'funktion'=> array('(',')'),
                'gbfeld'=>array('('),
            ),
            'stammdaten_main.php'=> array(
                'idstatus' => array('+'),
            ),
            'einstellungen.php'=>array(
                'mv5neu' => array(),
                'm3neu' => array(),
                'm_w3h'=>array(),
                'm_w3' => array(),
                'sms_passwort1'=>array()
            ),
            'benutzer.php'=>array(
                'alt' => array(),
                'neu1' => array(),
                'neu2' => array(),
                'cti_line' => array(),
                'dat_passwort' => array(),
                'smmail_passwort' => array()
            ),
            'admin_benutzer.php' => array(
                'passwort_neu' => array(),
                'passwort' => array()
            ),
            'admin_telefonreport.php' => array(
                'vtext'=>array()
            ),
            'admin_email_vorlagen.php' => array(
                'htmltext'=>array()
            ),
            'stammdaten_main.php' => array(
                'kon'=>array('+'),
                'kon_ffaltw'=>array('+')
            )
        );
        $whiteliste_get=array(
            'admin_filter2.php'=>array(
                'loesch'=>array('(', ')'),
                'sortfeld'=>array('(', ')')
            ),
            'stammdaten_suche_plz.php'=>array(
                'target'=>array('[', ']',"'"),
                'target2'=>array('[', ']',"'")
            ),
            'stammdaten_liste.php'=>array(
                'loeschdat'=>array('=')
            ),
        );

     $_POST=filterXSS_whitelist($_POST,$whiteliste_post[basename($phs)]);
     $_GET =filterXSS_whitelist($_GET,$whiteliste_get[basename($phs)]);

    $_SERVER["QUERY_STRING"]=xss::filter($_SERVER["QUERY_STRING"]);
       
    if (!empty($getfeld)) {
       $getfeld = filterXSS_whitelist($getfeld,$whiteliste_get[basename($phs)]);
    }
    if (!empty($feld2)) {
       $feld2 = filterXSS_whitelist($feld2,$whiteliste_get[basename($phs)]);
    }
    if (!empty($postfeld)) {
        $postfeld = filterXSS_whitelist($postfeld,$whiteliste_post[basename($phs)]);
    }
    if (!empty($feld)) {
        $feld = filterXSS_whitelist($feld,$whiteliste_post[basename($phs)]);
    }
     
     
	}
    
    if ($_SESSION['design_70'] && isset($_POST['run_utf8_decode'])) {
        function utf8_decode_recursive(&$item, $key) {
            $item = p4n_mb_string('utf8_decode', $item);
        }
        array_walk_recursive($_POST, 'utf8_decode_recursive');
    }
    
	if ($_SESSION['cfg_security_level'] == 9 || $_SESSION['cfg_security_level'] == 3 || $_SESSION['cfg_security_level'] == 4 || $_SESSION['cfg_security_level'] == 8) {
	    $_POST=getpost_sec($_POST);
        if (!empty($postfeld)) {
            $postfeld = getpost_sec($postfeld);
        }
        if (!empty($feld)) {
            $feld = getpost_sec($feld);
        }
	} else {
	    $_POST=getpost($_POST);
	}
	if (($_SESSION['cfg_security_level'] == 9 || $_SESSION['cfg_security_level'] == 3 || $_SESSION['cfg_security_level'] == 4 || $_SESSION['cfg_security_level'] == 8) && isset($_GET['p4ntoken']) && !isset($_SESSION['sec_token'])) {
            
	    
            $altertoken=$_GET['p4ntoken'];
            $_GET=getpost_sec($_GET);
            if (!empty($getfeld)) {
                $getfeld = getpost_sec($getfeld);
            }
            if (!empty($feld2)) {
                $feld2 = getpost_sec($feld2);
            }
            if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || $_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest') {
                $_SESSION['sec_token']=1;
                echo javas('
                geladen=false;
                var href=window.location.href;
		href=href.replace("p4ntoken='.$altertoken.'", "p4ntoken='.create_token().'");
                window.location.href=href;');
            exit;
            }
            
	} else {
	    $_GET=getpost($_GET);
        if (!empty($getfeld)) {
            $getfeld = getpost($getfeld);
	}
        if (!empty($feld2)) {
            $feld2 = getpost($feld2);
        }
	}
    
        if (isset($_GET['p4ntoken']) && isset($_SESSION['sec_token'])) {
	    unset($_SESSION['sec_token']);
        }
     if ($_SESSION['cfg_security_level'] == 9 || $_SESSION['cfg_security_level'] == 3 || $_SESSION['cfg_security_level'] == 8 || $_SESSION['cfg_security_level'] == 4) {
         echo javas('var p4ntoken = "'.create_token().'";
        function getNewToken(headerStr) {
          var token = headerStr;
          if (token) {
                try {
            var divs = document.getElementsByTagName("input");
            for (i=0; i < divs.length; i++) {    
            if (divs[i].name == "p4ntoken") {  
                divs[i].value = token;
            } 
                }
                } catch(e) {}
                try {
                var divs = topmain.document.getElementsByTagName("input");
            for (i=0; i < divs.length; i++) {    
            if (divs[i].name == "p4ntoken") {  
                divs[i].value = token;
            } 
                }
                } catch(e) {}
                try {
                var divs = parent.document.getElementsByTagName("input");
            for (i=0; i < divs.length; i++) {    
            if (divs[i].name == "p4ntoken") {  
                divs[i].value = token;
            } 
                }
                } catch(e) {}
                return token; 
              } 
            }');
        }
        function clear_all_buffer() {
            $to=ob_get_level();
            for ($i=0;$i<$to;$i++) {
                ob_end_clean();
            }
        }
	
        $kontakt_pg_feld = array(
            0 => $lang['_KONTAKT_GESCHAEFTLICH_ABK_'],
            1 => $lang['_KONTAKT_PRIVAT_ABK_'],
		    2 => $lang['_ZENTRAL_']
        );
        
        if (!function_exists('split_mandant')) {
            function split_mandant($id, $get_mandanten = array()) {
                global $db, $sql_tab, $sql_tabs;
                $lagid = 0;
                $mandid = ($id > 0) ? $id : 0;
                if (empty($_SESSION['split_mandant'][$id])) {
                    if (empty($get_mandanten) || !isset($get_mandanten[$id])) {
                        $res = $db->select(
                            $sql_tab['mandant'], 
                            array(
                                $sql_tabs['mandant']['parent_id'],
                            ), 
                            $sql_tabs['mandant']['mandant_id'].'='.$db->dbzahl($mandid)
                        );
                        while ($row = $db->zeile($res)) {
                            if ($row['parent_id'] > 0) {
                                $mandid = $row['parent_id'];
                                $lagid = $id;
                            } else {
                                $mandid = $id;
                                $lagid = 0;
                            }
                        }
                    } else {
                        $parent_id = $get_mandanten[$id];
                        if ($parent_id != 0) {
                            if ($parent_id != $id) {
                                $mandid = $parent_id;
                                $lagid = $id;
                            } else {
                                $mandid = $parent_id;
                                $lagid = 0;
                            }
                        }
                    }
                    if ($mandid > 0) {
                        $_SESSION['split_mandant'][$id] = array($mandid, $lagid);
                    }
                }
                return $_SESSION['split_mandant'][$id];
            }
        }
        
        if (file_exists($cfg_basedir.'inc/class_gettopost.php')) {
            require_once($cfg_basedir.'inc/class_gettopost.php');
            $GetToPost=new GetToPost();
        }
        
        if (isset($_POST['oltext_change'])) {
            preg_match('/onmouseover[\s]*=[\s]*[\"]([^\"]*)[\"]/Uis',oltext2($_POST['oltext_change'], $_POST['oltext_change_ueberschrift'], $_POST['oltext_change_breite']),$matches);
            Modern_Helper_Request::requestStart();
            echo $matches[1];
            exit;
        }
        
        function objReplace($eventType,$url,$data,$jqTarget='',$otherTarget='', $async=null) {
            /*
            Beispiel:
            echo $form->submit2('', 'Test', objReplace("onmouseover","stephan_test.php",array("a"=>1))).'<br>';
            echo '<div id="id">Test</div>'.objReplace("mouseover","stephan_test.php",array("a"=>1),'#id');
            */
            $data_string='';
            if (is_array($data)) {
                foreach ($data as $key => $value) {
                    $data_string.=$key.'='.$value.'&';
                }
            }
            $data_string=($data_string!=''?substr($data_string,0,-1):'');
            if ($async == null) {
                $async=true;
            }
            if ($jqTarget=='') {
                if ($eventType=='onscroll') {
                    return ' class="objReplaceScroll" data-url="'.$url.'" data-href="'.$data_string.'" data-other-target="'.$otherTarget.'" data-async="'.$async.'" ';
                }
                return ' '.$eventType.'="objReplace(this,\''.$url.'\',\''.$data_string.'\',\''.$otherTarget.'\',\''.$async.'\')" ';
            }

            if ($jqTarget!='') {
                if ($eventType=='onscroll') {
                    return javas('
                        jq1112(document).ready(function ($) {
                            if ($( "'.$jqTarget.'" ).length>0) {
                                $( "'.$jqTarget.'" ).addClass("objReplaceScroll");
                                $( "'.$jqTarget.'" ).attr("data-url","'.$url.'");
                                $( "'.$jqTarget.'" ).attr("data-href","'.$data_string.'");  
                                $( "'.$jqTarget.'" ).attr("data-other-target","'.$otherTarget.'");
                                $( "'.$jqTarget.'" ).attr("data-async","'.$async.'");
                            }
                        });
                    ');
                }
                return javas('
                    jq1112(document).ready(function ($) {
                        if ($( "'.$jqTarget.'" ).length>0) {
                            $( "'.$jqTarget.'" ).bind( "'.$eventType.'", function() {
                                objReplace($( "'.$jqTarget.'" )[0],"'.$url.'","'.$data_string.'","'.$otherTarget.'","'.$async.'");
                            });
                        }
                    });
                ');
            }
        }
    
        function cacheselect($name, $arr) {
            $returnwert='';
            $i=0;
            if (is_array($arr) && count($arr)>0) {
                $returnwert=' if (!cacheselect_array["cacheselect_'.$name.'"]) {cacheselect_array["cacheselect_'.$name.'"]=new Array();} '."\n";
                 $returnwert.=' if (!cacheselect_array_key["cacheselect_'.$name.'"]) {cacheselect_array_key["cacheselect_'.$name.'"]=new Array();} '."\n";
                foreach ($arr as $key => $value) {
                    if (is_string($key)) {
                        $key='"'.$key.'"';
                    }
                    $returnwert.=' cacheselect_array["cacheselect_'.$name.'"]['.$i.']="'.$value.'"; '."\n";
                    $returnwert.=' cacheselect_array_key["cacheselect_'.$name.'"]['.$i.']='.$key.'; '."\n";
                    $i++;
                }
            }
            if ($returnwert!='') {
                return $returnwert;
            }
        }
        
        class htmlform {
    var $fname='';
            /**
             * Read only
             * @var bool
             */
    var $ro=false;
    var $tel=false;
    var $mitaltwert=false;
        var $hastarget=false;

        /**
         * Returns an html form beginning string
         * @param string $name
         * @param string $action
         * @param string $method
         * @param bool|false $file
         * @param string $other
         * @param bool|false $readonly
         * @param bool|false $mitaltwert
         * @param bool|false $keinjs
         * @return string
         */
    function start($name='leer', $action='', $method='POST', $file=false, $other='', $readonly=false, $mitaltwert=false, $keinjs=false) {
        global $cfg_modern;
        
        if ($_SESSION['design_70'] && $other=='') {
            $other='target="main"';
        }
        
        $this->fname=$name;
        $this->ro=$readonly;
        $this->mitaltwert=$mitaltwert;
            $this->hastarget=(preg_match('/target/i', $other))?true:false;

        $input_autocomplete='
                            <script type="text/javascript">
                            if (typeof input_ac !== "function") {
                                eval("function input_ac(tpw,pw) { \n\
                                    pw.value = tpw.value; tpw.value=\'\'; } \n\
                                ");
                            }
                            </script>
                                ';
        $datum_check='
			<script type="text/javascript">function cdat(feld) {
				gef=false;
				if (feld.value.match(/(\\d)(\\d)(\\d)(\\d)(\\d)(\\d)(\\d)(\\d)/g)) {
					tag=RegExp.$1+RegExp.$2;
					if (tag.substring(0,1)=="0") {
						tag=tag.substring(1,2);
					}
					tag=parseInt(tag);
					monat=RegExp.$3+RegExp.$4;
					if (monat.substring(0,1)=="0") {
						monat=monat.substring(1,2);
					}
					monat=parseInt(monat);
					jahr=RegExp.$5+RegExp.$6+RegExp.$7+RegExp.$8;
					jahr=parseInt(jahr);
					gef=true;
				} else if (feld.value.match(/(\\d+)\\W+(\\d+)\\W+(\\d+)/g)) {
					tag=RegExp.$1;
					if (tag.length>=2 && tag.substring(0,1)=="0") {
						tag=tag.substring(1,2);
					}
					tag=parseInt(tag);
					monat=RegExp.$2;
					if (monat.length>=2 && monat.substring(0,1)=="0") {
						monat=monat.substring(1,2);
					}
					monat=parseInt(monat);
					jahr=parseInt(RegExp.$3);
					gef=true;
				} else if (feld.value.match(/(\\d+)\\W+(\\d+)/g)) {
					tag=RegExp.$1;
					if (tag.substring(0,1)=="0") {
						tag=tag.substring(1,2);
					}
					tag=parseInt(tag);
					monat=RegExp.$2;
					if (monat.substring(0,1)=="0") {
						monat=monat.substring(1,2);
					}
					monat=parseInt(monat);
					jahrheute=new Date();
					jahrheute=jahrheute.getYear();
					if (jahrheute<999) jahrheute+=1900;
					jahr=jahrheute;
					gef=true;
				} else if (feld.value.match(/(\\d)(\\d)(\\d)(\\d)(\\d)(\\d)/g)) {
					tag=RegExp.$1+RegExp.$2;
					if (tag.substring(0,1)=="0") {
						tag=tag.substring(1,2);
					}
					tag=parseInt(tag);
					monat=RegExp.$3+RegExp.$4;
					if (monat.substring(0,1)=="0") {
						monat=monat.substring(1,2);
					}
					monat=parseInt(monat);
					jahr=RegExp.$5+RegExp.$6;
					if (jahr.substring(0,1)=="0") {
						jahr=jahr.substring(1,2);
					}
					jahr=parseInt(jahr);
					jahr+=2000;
					gef=true;
				} else if (feld.value.match(/(\\d)(\\d)(\\d)(\\d)/g)) {
					tag=RegExp.$1+RegExp.$2;
					if (tag.substring(0,1)=="0") {
						tag=tag.substring(1,2);
					}
					tag=parseInt(tag);
					monat=RegExp.$3+RegExp.$4;
					if (monat.substring(0,1)=="0") {
						monat=monat.substring(1,2);
					}
					monat=parseInt(monat);
					jahrheute=new Date();
					jahrheute=jahrheute.getYear();
					if (jahrheute<999) jahrheute+=1900;
					jahr=jahrheute;
					gef=true;
				}
				if (gef) {
					neuw=feld.value;
					maxt=new Array(31,31,29,31,30,31,30,31,31,30,31,30,31);
					jahrheute=new Date();
					jahrheute=jahrheute.getYear();
					if (jahrheute<999) jahrheute+=1900;
					if (monat<=0) monat=1;
					if (monat>12) monat=12;
					if (tag<=0) tag=1;
					if (tag>maxt[monat]) tag=maxt[monat];
					if (jahr<0) jahr=jahrheute;
					if (jahr<100) {
						if (jahr<10) jahr="0"+jahr;
						jahr=String(jahrheute).substring(0,2)+jahr;
						if (parseInt(jahr)>(jahrheute+10)) jahr=parseInt(jahr)-100;
					}
					if (tag<10) tag="0"+String(tag);
					if (monat<10) monat="0"+String(monat);
					neuw=tag+"."+monat+"."+jahr;
					feld.value=neuw;
				}
				reg=/\\d\\d\\.\\d\\d.\\d\\d\\d\\d/;
				if (feld.value!="" && reg.exec(feld.value)==null) {
					alert("'._DATUM_INKORREKT_.'");
					feld.focus();
				}
			}</script>
			';
			
			$datum_check='
			<script type="text/javascript">function cdat(feld) {
    var tag = null,
        monat = null,
        jahr = null;
    if (
        (/(\d\d)(\d\d)(\d\d\d\d)/g).exec(feld.value) ||
        (/(\d+)\W+(\d+)\W+(\d+)/g).exec(feld.value) ||
        (/(\d\d)(\d\d)(\d\d)/g).exec(feld.value)
    ) {
        tag = parseInt(RegExp.$1, 10);
        monat = parseInt(RegExp.$2, 10);
        jahr = parseInt(RegExp.$3, 10);
    } else if (
        (/(\d+)\W+(\d+)/g).exec(feld.value) ||
        (/(\d\d)(\d\d)/g).exec(feld.value)
    ) {
        tag = parseInt(RegExp.$1, 10);
        monat = parseInt(RegExp.$2, 10);
        jahr = new Date().getFullYear();
    }
    if (tag && monat && jahr) {
        maxt = [31, 31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
        if (monat <= 0) { monat = 1 };
        if (monat > 12) { monat = 12 };
        if (tag <= 0) { tag = 1 };
        if (tag > maxt[monat]) { tag = maxt[monat] };
        if (jahr < 100) { jahr = 2000 + jahr; }
        feld.value = [  (tag < 10 ? "0" : "") + tag,
                        (monat < 10 ? "0" : "") + monat,
                        jahr].join(".");
    }
    if (feld.value != "" && (/\d\d\.\d\d\.\d\d\d\d/).exec(feld.value) == null) {
        alert("'._DATUM_INKORREKT_.'");
        feld.focus();
    }
}</script>';

        if ($_SESSION['ajx']==1) {

            $zus_o='';
            if (preg_match('/onsubmit="(.*)"/i', $other, $matches)) {
                $zus_o=$matches[1].' ';
                $other=p4n_mb_string('str_replace', $matches[0], '', $other);
            }
            $zus_o.='xr=form_submit(this); return xr;';
            $zus_o=' onSubmit="'.$zus_o.'"';
            $other.=$zus_o;
        }
        $zus_o='';
        if (preg_match('/onsubmit="([^\"]*)"/i', $other, $matches)) {
            $zus_o=$matches[1].' ';
            $other=p4n_mb_string('str_replace', $matches[0], '', $other);
        }
        $zus_o.='geladen=false;';
        $zus_o=' onSubmit="'.$zus_o.'"';
        $other.=$zus_o;
        //'.($_SESSION['ajx']==1?'id="'.$name.'" ':'').'
        return ((($keinjs==false) ? $input_autocomplete.$datum_check:'').'<form name="'.$name.'" method="'.$method.'" action="'.$action.'"'.($file?' ENCTYPE="multipart/form-data"':'')." $other>\n").$this->hidden('p4ntoken', create_token());//<input type=hidden name=\"hilfefeld\" value=\"\">
    }

    
    /**
     * @param string $id
     * @param string $value
     * @param string $placeholer
     * @param string $w
     * @return string
     */
    function searchinput($id='',$value='',$placeholer=_SUCHE_,$w='') {
        $html='<div class="searchdiv" style="width:'.($w!=''?$w:'').';"><table class="searchtable table-nostyle"><tr><td>';
        $html.=$this->textinput('', $value, '', 'placeholder="'.$placeholer.'" id="'.$id.'" style="width:100%;"');
        $html.='</td><td>'.$this->submit2('', '', 'class="search-btn" onclick="if (typeof triggerEvent != typeof undefined) { triggerEvent(document.getElementById(\''.$id.'\'),\'input\'); }" ', '');
        $html.='</td></tr></table></div>';
        return $html;
    }
    
    /**
     * @param $name
     * @param string $value
     * @param string $size
     * @param string $other
     * @return string
     */
    function textinput($name, $value='', $size='', $other='') {
        global $cfg_modern;

        if ($_SESSION['device']=='pda' and intval($size)>=13) {
            $size=13;
        }

		if ($_SESSION['device']!='pda' && !$cfg_modern) {
            $other.=' onFocus="ti1(this);" onBlur="ti2(this);"';
        }

        if ($cfg_modern) {
            $other=Modern_Helper_Html::expandTextinput($name,$other);
        }
        $zusw1='';
        if ($this->mitaltwert) {
            $name2='';
            if (preg_match('/([^\[]*)(\[[^\]]*\])/', $name, $match)) {
                $name2=$match[1].'_ffaltw'.$match[2];
            } else {
                $name2=$name.'_ffaltw';
            }
            $zusw1='<input type="hidden" name="'.$name2.'" value="'.$value.'">';
        }

        $value=p4n_mb_string('str_replace', '"', '&quot;', $value);
        if ($this->ro)
            return ($value==''?'-':$value);
        else
            return '<input type="text" name="'.$name.'" value="'.$value.'"'.($size!=''?' size="'.$size.'"':'').($other!=''?' '.$other:'')." >".$zusw1;
    }

            /**
             * @param $name
             * @param string $value
             * @param string $size
             * @param string $other
             * @return string
             */
    function zahlinput($name, $value='', $size='', $other='') {
        global $cfg_modern;
		if ($_SESSION['device']!='pda' && !$cfg_modern) {
            $other.=' onFocus="ti1(this);" onBlur="ti2(this);"';
        }

        $zusw1='';
        if ($this->mitaltwert) {
            $name2='';
            if (preg_match('/([^\[]*)(\[[^\]]*\])/', $name, $match)) {
                $name2=$match[1].'_ffaltw'.$match[2];
            } else {
                $name2=$name.'_ffaltw';
            }
            $zusw1='<input type="hidden" name="'.$name2.'" value="'.$value.'">';
        }

        if ($this->ro)
            return ($value==''?'-':$value);
        else
            return ('<input type="text" name="'.$name.'" value="'.$value.'"'.($size!=''?' size="'.$size.'"':'').($other!=''?' '.$other:'').">".$zusw1);
    }

            /**
             * @param $name
             * @param string $value
             * @param string $size
             * @param string $other
             * @return string
             */
    function telefoninput($name, $value='', $size='', $other='') {
		global $cfg_cti_msgserver, $cfg_modern, $cfg_sipgate;
        $z='';
        if ($this->tel==false) {
            $this->tel=true;
            if ($_SESSION['catch_cti_aktiv'] && !$cfg_sipgate) {
                $z='<script type="text/javascript">
	function anrufen(text) {';
                if ($_SESSION['cti']) {
                    $z.='topmenu.ilink.server_manually(text);';
                }
                $z.='
	}
</script>';  
            } elseif ($cfg_cti_msgserver) {
                $z='<script type="text/javascript">
	function anrufen(text) {
		window.open(\'anrufen_msgserver.php?nr='.($_SESSION['cti_vw']!=''?$_SESSION['cti_vw']:'').'\'+text, \'status\');
	}
</script>
';
            } else {
                $z='<script type="text/javascript">
	function anrufen(text) {
        var cti=(typeof cfg_modern != typeof undefined && cfg_modern==true)?topmenu.cti.document:parent.frames["cti"];
		cti.UserControl1.Waehle_Nummer = '.($_SESSION['cti_vw']!=''?'"'.$_SESSION['cti_vw'].'"+':'').'text;
	}
</script>
';
            }
        }

        $zusw1='';
        if ($this->mitaltwert) {
            $name2='';
            if (preg_match('/([^\[]*)(\[[^\]]*\])/', $name, $match)) {
                $name2=$match[1].'_ffaltw'.$match[2];
            } else {
                $name2=$name.'_ffaltw';
            }
            $zusw1='<input type="hidden" name="'.$name2.'" value="'.$value.'">';
        }

        if ($_SESSION['device']!='pda' && !$cfg_modern) {
            $other.=' onFocus="ti1(this);" onBlur="ti2(this);"';
        }
        if ($this->ro)
            return ($value==''?'-':$value);
        else {
            return ($z.'<input type="text" name="'.$name.'" value="'.$value.'"'.($size!=''?' size="'.$size.'"':'').($other!=''?' '.$other:'').">".'<input type=image onClick="x=document.'.$this->fname.'.elements[\''.$name.'\'].value; '.(($_SESSION['catch_cti_aktiv'] && !$cfg_sipgate)?'anrufen(x);':'x=x.replace(/\+49/, \'\'); x=x.replace(/^49 /, \'\'); x=x.replace(/^ 49 /, \'\'); x=x.replace(/\+|\s|\.|\-|\(|\)|\//g, \'\'); if (x.length>8 && x.charAt(0)!=\'0\') x=\'0\'+x; anrufen(x);').' return false;" src="bilder/k_fon.gif" border=0>'.$zusw1);//parent.frames(\'cti\').UserControl1.Waehle_Nummer = this.value
        }
    }

            /**
             * @param $name
             * @param string $value
             * @param string $size
             * @param string $other
             * @return string
             */
    function dateiinput($name, $value='', $size='', $other='') {
        global $form_dateifeld,$cfg_modern;
        if ($this->ro) {
            return '-';
        } else {
            if ($cfg_modern) {
                $other=Modern_Helper_Html::expandClass($other,'btn-upload');
                $disabled=Modern_Helper_Html::getAttr('disabled',$other);
                return ('<div class="fileUpload"><input '.($disabled=='disabled'?'disabled="disabled"':'').' class="btn-blue fileUpload_btn" type="button" onclick="fileUploadBtn(this);" value="'._DURCHSUCHEN_.'"><input type="file" name="'.$name.'" '.($other!=''?' '.$other:'').'></div>');
            }
			return ('<input type="file" name="'.$name.'" '.($cfg_modern?'':'value="'.$value.'"'.($size!=''?' size="'.$size.'"':'')).($other!=''?' '.$other:'').">");
        }
    }

            /**
             * @param $name
             * @param string $size
             * @param string $other
             * @return string
             */
    function passwordinput($name, $size='', $other='') {
        global $cfg_modern;
        if ($_SESSION['device']!='pda' && !$cfg_modern) {
            $other.=' onFocus="ti1(this);" onBlur="ti2(this);"';
        }
        if ($this->ro)
            return '-';
        else
            return ('<input autocomplete="off" autocorrect="off" autocapitalize="off" type="password" name="'.$name.'"'.($size!=''?' size="'.$size.'"':'').($other!=''?' '.$other:'').">");
    }
    /**
    * @param $name
    * @param string $value
    * @param string $other
    * @param bool|false $ohnepo
    * @param bool|false $mitjs
    * @return string
    */
    function datuminput($name, $value='', $other='onBlur=" cdat(this); ti2(this);"', $ohnepo=false, $mitjs=false, $valsmcurrent=false, $onSelectCallback = null) {
        global $db, $global_datum_ja, $cfg_modern;
        if ($this->ro)
            return (($value=='' or $value=='now()')?'-':(preg_match("/\-/",$value)?$db->dbzeitdatum_ausgabe($value, (preg_match("/:/",$value) ? 'datumzeit' : 'datum')):$value));
        if (preg_match("/\d\-/",$value))
            $value=$db->unixdate($value);
        if ($value=='now()')
            $value=adodb_date(_LOCAL_DATEFORMAT_);
        
        $zusw1='';
        if ($this->mitaltwert) {
            $name2='';
            if (preg_match('/([^\[]*)(\[[^\]]*\])/', $name, $match)) {
                $name2=$match[1].'_ffaltw'.$match[2];
            } else {
                $name2=$name.'_ffaltw';
            }
            $zusw1='<input type="hidden" name="'.$name2.'" value="'.$value.'">';
        }

        if ($cfg_modern) {
            /*if (!preg_match('/\bno\_datepicker\b/is', $other)) {
                $other=Modern_Helper_Html::expandClass($other,'datepicker');
            }*/
            $other=Modern_Helper_Html::expandOnBlur($other,'cdat(this);');
            $other=Modern_Helper_Html::deleteOnBlur($other,'ti2(this);');
        } else{
            if ($_SESSION['device']!='pda') {
                if (p4n_mb_string('strpos', $other, 'cdat(this);')!==false and p4n_mb_string('strpos', $other, 'ti2(this);')===false) {
                    if (preg_match('/onBlur="(.*)" /i', $other, $mat)) {
                        $other=p4n_mb_string('str_replace', $mat[1], $mat[1].' ti2(this);', $other);
                    }
                }
                if (!$cfg_modern) {
                    $other.=' onFocus="ti1(this);"';
                }
            } else {
                $other='';
            }
        }

        if ($valsmcurrent && p4n_mb_string('strpos', $other, 'valsmcurrent(this,\'datum\');')===false) {
            if (preg_match('/onBlur="(.*)" /i', $other, $mat)) {
                $other=p4n_mb_string('str_replace', $mat[1], $mat[1].'cdat(this); ti2(this); if (typeof valsmcurrent == \'function\') {valsmcurrent(this,\'datum\');}', $other);
            } else {
                $other.=' onBlur="cdat(this); ti2(this); if (typeof valsmcurrent == \'function\') {valsmcurrent(this,\'datum\');}"';
            }
            if (preg_match('/data-info="(.*)" /i', $other, $mat)) {
                $other=p4n_mb_string('str_replace', $mat[1], $mat[1].' datuminput', $other);
            } else {
                $other.=' data-info="datuminput"';
            }
        }
        $global_datum_ja=true;
        if ($onSelectCallback != null) {
            $onSelectCallback = ", $onSelectCallback";
        }
        if ($cfg_modern) { // TODO: Add custom extra change callbacks to modern version
            $tfi='<span class="calendar-wrapper">';
            if (!preg_match('/\bno\_datepicker\b/is', $other)) {
                $other=Modern_Helper_Html::expandClass($other,'datepicker');
            }
                $tfi.='<input type="text" name="'.$name.'" value="'.$value.'" size="'.($cfg_modern?'8':'7').'" maxlength="10"'.($other==''?'':' '.$other).' />';//(($_SESSION['device']=='pda' or $ohnepo)?'':"<img onClick=\"\" src=\"inc/Modern/images/icons/icon-calendar.png\" border=\"0\" id='sc_".$this->fname.'.'.$name."' />".$zusw1)
            $tfi.='</span>'.$zusw1;
        } else {
                $tfi='<input type="text" name="'.$name.'" value="'.$value."\" size=\"10\" maxlength=\"10\"".($other==''?'':' '.$other)." />".(($_SESSION['device']=='pda' or $ohnepo)?'':"<a href=\"javascript:void(0);\" onClick=\"nicht=true; mausklick(event, this); showCalendar1('".$this->fname."','".$name."');\" ><img src=\"bilder/show-calendar.gif\" border=0 id='sc_".$this->fname.'.'.$name."' /></a>".$zusw1);
        }
        if ($_SESSION['design_70']) {
            $tfi='<span class="datum"><input  type="text" name="'.$name.'" value="'.$value.'"  maxlength="10"/><i class="material-icons">date_range</i></span>';
        }
        if ($mitjs) {
            $tfi=p4n_mb_string('str_replace', "'", '\\\'', $tfi);
            $tfi=p4n_mb_string('str_replace', '"', "'", $tfi);
            return $tfi;
        } else {
            return $tfi;
            //return ('<input type="text" name="'.$name.'" value="'.$value."\" size=\"10\" maxlength=\"10\"".($other==''?'':' '.$other).">".(($_SESSION['device']=='pda' or $ohnepo)?'':"<a href=\"javascript:void(0);\" onClick=\"nicht=true; mausklick(event, this); showCalendar1('".$this->fname."','".$name."');\"><img src=\"bilder/show-calendar.gif\" border=0 id='sc_".$this->fname.'.'.$name."'></a>").$zusw1);
        }
    }
    
    

            /**
             * @param $name
             * @param $inhaltfeld
             * @param int $default
             * @param bool|mixed $bw Prepend this to the options list if not false
             * @param string $other
             * @param bool|false $multiple
             * @param int $multiple_rows
             * @return string
             */
    function selectinput($name, $inhaltfeld, $default=-99, $bw=false, $other='', $multiple=false, $multiple_rows=5, $cache=array()) {
        return $this->selectinput_case(true, $name, $inhaltfeld, $default, $bw, $other, $multiple, $multiple_rows,$cache);
    }

            /**
             * @param $casesearch
             * @param $name
             * @param $inhaltfeld
             * @param int $default
             * @param bool|mixed $bw Prepend this to the options list if not false
             * @param string $other
             * @param bool|false $multiple
             * @param int $multiple_rows
             * @return string
             */
    function selectinput_case($casesearch, $name, $inhaltfeld, $default=-99, $bw=false, $other='', $multiple=false, $multiple_rows=5, $cache=array()) {
        global $cfg_modern, $cfg_select_suche, $select_suche_menu, $keine_select_suche, $suchfeld_spaeter, $fix_menu_basename;
        
        if (!$cfg_modern) {
            $cache=array();
        }
        
        $suchfeld=false;
        $suchfeld_mit_cache=false;
        if (($_SESSION['crm_version']>62 || $cfg_select_suche) /*&& (!is_array($cache) || count($cache)==0)*/ && !preg_match('/chosen/i',$other) && $multiple==false && $keine_select_suche!=true) {
            if (!is_array($cache) || count($cache)==0) {
                $suchfeld=true; 
            } else {
                $suchfeld_mit_cache=true;
            }
            
        }
        //$suchfeld=false;
        $default_is_array = is_array($default);
        
        //$casesearch true dann wird Groß und Kleinschreibung beachtet
        //$casesearch false, dann ist groß und Kleinschreibung egal
        if ($this->ro) {
            if ($default_is_array) {
                $rueckgabe = '';
                $gefunden = false;
                foreach ($default as $key => $value) {
                    $value_strtolow = p4n_mb_string('strtolower', $value);
                    if (!$casesearch && is_array($inhaltfeld)) {
                        foreach ($inhaltfeld as $inhalt_key => $inhalt_value) {
                            if (p4n_mb_string('strtolower', $inhalt_key) == $value_strtolow) {
                                $rueckgabe .= $inhalt_value.'<br>';
                                $gefunden = true;
                                break;
                            }
                        }
                    } elseif ($inhaltfeld[$value]!='') {
                        $rueckgabe .= $inhaltfeld[$value].'<br>';
                        $gefunden = true;
                    }
                }
                if (!$gefunden) {
                    $rueckgabe .= '-<br>';
                }
                return p4n_mb_string('substr', $rueckgabe, 0, -4);
            } else {
                return (($inhaltfeld[$default]=='')?'-':$inhaltfeld[$default]);
            }
        }
        if ($_SESSION['ajx']==1) {
            $zd='';
            if (preg_match('/location.href=(.*);/i', $other, $matches)) {
                $zd=$matches[1];
            } elseif (preg_match('/window.open\([\'|"](.*)[\'|"],.*\);/i', $other, $matches)) {
                $zd=$matches[1];
            }
            if ($zd!='') {
                if (p4n_mb_string('substr', $zd, -1)=='"') {
                    $zd=p4n_mb_string('substr', $zd, 0, -1);
                }
                if (p4n_mb_string('substr', $zd, -1)==';') {
                    $zd=p4n_mb_string('substr', $zd, 0, -1);
                }
                $other=p4n_mb_string('str_replace', $matches[0], 'lade_s('.$zd.', \'div_main\');', $other);
            }
        }

        if ($_SESSION['device']!='pda') {
            //			$other.=' onFocus="ti1(this);" onBlur="ti2(this);"';
        }
        $val_sel_f='';
        $val_sel_ff=false;
        $val_sel='';
        $val_sel_t=false;

        if ($cfg_modern && !$multiple) {
            if ($other!='' && !preg_match('/noremove/',$other)) {
                $other=Modern_Helper_Html::removeStyle('width',$other);
            }
            $left=(basename($_SERVER['PHP_SELF'])=='menu4.php' || $fix_menu_basename)?' left':'';
            $text='<span class="'.(($multiple)?'styled-select styled-select-multiple'.$left:'styled-select'.$left).' '.($_SESSION['design_70']?'{prev_icon_selected2}':'{prev_icon_selected}').'">';
        } else {
            $text='';
        }
        if ($cfg_modern) {
            $other=Modern_Helper_Html::expandClass($other,'modern_select');
            if ($suchfeld) {
                $other=Modern_Helper_Html::expandClass($other,'select-js');
                if ($suchfeld_spaeter===true) {
                    $other=Modern_Helper_Html::expandClass($other,'select-js-all');
                } else {
                    $other=Modern_Helper_Html::expandClass($other,'select-js-ready');
                }
            }
        }
        
        $cache_string='';
        if (is_array($cache) && count($cache)>0) {
            $cache_string='[';
            foreach ($cache as $cval) {
                $cache_string.='\''.$cval.'\',';
            }
            $cache_string=substr($cache_string,0,-1);
            $cache_string.=']';
        }
        if ($default_is_array) {
            $default_neu = array();
            foreach ($default as $default_key => $default_value) {
                if (!$casesearch) {
                    $default_neu[p4n_mb_string('strtolower', $default_value)] = 1;
                } else {
                    $default_neu[$default_value] = 1;
                }
            }
            $default = $default_neu;
        } else {
            if (!$casesearch) {
                $default = p4n_mb_string('strtolower', $default);
            }
        }
        $zusw0='';
        $selected_options_default=array();
        if ($cache_string!='') {$text.='<div onmouseover="cacheselect('.$cache_string.',\''.$name.($multiple?'[]':'').'\','.($suchfeld_mit_cache?'true':'false').')" style="width:100%;height:100%;position:absolute;z-index:1;display:block;cursor:pointer"></div>';}
        $text.='<select '.($suchfeld && $suchfeld_spaeter!==true?'onfocus="if (typeof select_js_focus==\'function\') {select_js_focus(this);} "':'').' '.($cache_string!=''?'onfocus="cacheselect('.$cache_string.',\''.$name.($multiple?'[]':'').'\','.($suchfeld_mit_cache?'true':'false').')"':'').' name="'.$name.($multiple?'[]':'')."\" $other".($multiple?' multiple="multiple" size='.$multiple_rows.' ':'').">";
        if ($bw!==false && is_string($bw)) {
            $sele=false;
            if ($default==-1) {
                $sele=true;
            } elseif ($default_is_array) {
                if (isset($default['-1'])) {
                    $sele=true;
                }
            }
            $selected_options_default[]='<option value="-1" '.($sele?' selected':'').'>'.$bw;
//            $text.='<option value="-1" '.($sele?' selected':'').'>'.$bw;
            if ($cache_string!='') {
                $zusw0=javas('if (!cacheselect_bw_array[\''.$name.($multiple?'[]':'').'\']) {cacheselect_bw_array[\''.$name.($multiple?'[]':'').'\']=new Array();} cacheselect_bw_array[\''.$name.($multiple?'[]':'').'\'][-1]="'.$bw.'";');
            }
            $val_sel_f='-1';
            if ($sele) {
                $val_sel='-1';
            }
        }
        
        //@reset($inhaltfeld);
        //while (list($key,$val)=@each($inhaltfeld)) {
        $default_gefunden_anz = 0;
        $default_count = 1;
        if ($default_is_array) {
            $default_count = count($default);
        }
        $max=0;
        $max_val='';
        if ($cache_string!='') {
            if (!empty($inhaltfeld) && is_array($inhaltfeld)) {
                foreach ($inhaltfeld as $key => $val) {
                    if ($val!='') {
                        $max_laenge=p4n_mb_string('strlen', $val);
                        if ($max_laenge>$max) {
                            $max=$max_laenge;
                            $max_val=$val;
                        }
                    }
                }
            }
        }
        $prev_icon_selected='';
        if (!empty($inhaltfeld) && is_array($inhaltfeld)) {
            $select_options=array();
            $select_options_selected=array();
            $letzte_optgroup='';
            foreach ($inhaltfeld as $key => $val) {
                $prev_icon='';
                if (is_array($val) && isset($val['prev_icon'])) {
                    $prev_icon=$val['prev_icon'];
                    $val=$val['text'];
                }
                $option='';
                $selected=false;
                if ($val === 'OPTGROUP')  {
                    $select_options[]= '<optgroup label="'.$key.'"></optgroup>';
                    $letzte_optgroup='<optgroup label="'.$key.'"></optgroup>';
                    continue;
                }
                if ($val_sel_f=='' and !$val_sel_ff) {
                    $val_sel_f=$key;
                    $val_sel_ff=true;
                }
                $option.='<option value="'.$key.'"';
                if ($default_gefunden_anz < $default_count) {    
                    $such_key = $key;
                    if (!$casesearch) {
                        $such_key = p4n_mb_string('strtolower', $such_key);
                    }
                    if ($default_is_array) {
                        if (isset($default[$such_key])) {
                            $option.=' selected';
                            $val_sel=$key;
                            $val_sel_t=true;
                            $selected=true;
                            $default_gefunden_anz++;
                            $prev_icon_selected=$prev_icon;
                        }
                    } elseif ($default!=-99 and ''.$default==''.$such_key) {
                        if ($key==='00' and $default==='00') {
                            $option.=' selected';
                            $val_sel=$key;
                            $val_sel_t=true;
                            $selected=true;
                            $default_gefunden_anz++;
                            $prev_icon_selected=$prev_icon;
                        } elseif ($key=='0' and $default!=='0') {

                        } else {
                            $option.=' selected';
                            $val_sel=$key;
                            $val_sel_t=true;
                            $selected=true;
                            $default_gefunden_anz++;
                            $prev_icon_selected=$prev_icon;
                        }
                    } elseif ($default==-99) {
                        $default_gefunden_anz++; // Braucht man also nicht weiter suchen...
                    }
                }
                $option.=' class="{selected}"'.($prev_icon!=''?' data-prev-icon="'.$prev_icon.'"':'').'>'.$val.'</option>';

                if ($cache_string!='') {
                    if ($selected || $max_val==$val) {
                        if ($_SESSION['crm_version']>63 && $multiple && $selected /*&& !preg_match('/select_suche_multi/i',$other)*/) {
                            $select_options_selected[]=$letzte_optgroup.$option;
                            $letzte_optgroup='';
                        } else {
                            $select_options[]=$option;
                        }
                    }  
                } else {
                    if ($_SESSION['crm_version']>63 && $multiple && $selected /*&& !preg_match('/select_suche_multi/i',$other)*/) {
                        $select_options_selected[]=$letzte_optgroup.$option;
                        $letzte_optgroup='';
                    } else {
                        $select_options[]=$option;
                    }
                }
            }
            
            if (!empty($select_options_selected)) {
                if (count($select_options) > 0 ) {
                    $text.='<optgroup  onClick="var option_selected = this.closest(\'select\').getElementsByClassName(\'option_selected\'); for (i = 0; i < option_selected.length; i++) { option_selected[i].selected=true; }" style="font-weight: bold; font-size: 10px" label="'._AUSWAHL_.':"></optgroup>';
                }
                foreach ($select_options_selected as $option) {
                    $text.=str_replace('{selected}', 'option_selected', $option);
                }
                if (count($select_options) > 0) {
                    $text.='<optgroup onClick="var option_selected = this.closest(\'select\').getElementsByClassName(\'option_selected\'); for (i = 0; i < option_selected.length; i++) { option_selected[i].selected=false; }" style="font-weight: bold; font-size: 10px" label="'._KEINE_AUSWAHL_.':"></optgroup>';
                }
            } else {
                if (!empty($selected_options_default)) {
                    foreach ($selected_options_default as $option) {
                        $text.=$option;
                    }
                }
            }
            if (!empty($select_options)) {
                foreach ($select_options as $option) {
                    $text.=str_replace('{selected}', '', $option);
                }
            }
        } elseif (is_array($inhaltfeld) && empty($inhaltfeld)) {
            if (!empty($selected_options_default)) {
                foreach ($selected_options_default as $option) {
                    $text.=$option;
                }
            }
        }
        $text.="</select>";
        
        if ($prev_icon_selected!="") {
            if (!$_SESSION['design_70']) {
            $prev_icon_selected=explode(' ',$prev_icon_selected)[1];
            $text=str_replace('{prev_icon_selected}', ' '.$prev_icon_selected.' icon-select', $text);
            } else {
                $text=str_replace('{prev_icon_selected2}', ' icon-select2', $text);
                $text.='<i class="material-icons">'.explode(' ',$prev_icon_selected)[0].'</i>';
            }
        } else {
            $text=str_replace('{prev_icon_selected}', '', $text);
        }
            
        if ($multiple && $default == '') {
            $val_sel_f = '';
        }
        if ($cfg_modern && !$multiple) {
            if ($suchfeld && $suchfeld_spaeter!==true) {
                $text.='<span class="select-js-click" onclick="if (this.previousSibling.hasAttribute(\'disabled\')) {return false;}  if (this.className.indexOf(\'select_remove\')===-1) { if (typeof '.($select_suche_menu?'topmain.':'').'select_js_element==\'function\' && this.className.indexOf(\'select-js-event-ready\')===-1) { '.($select_suche_menu?'topmain.':'').'select_js_element(this); } } else { this.className=this.className.replace(\' select_remove\',\'\'); } "></span>';
            }  
            if ($_SESSION['design_70'] && $prev_icon_selected=='') {
                $text.='<i class="material-icons">keyboard_arrow_down</i>';
            }
            $text.="</span>";
        }

        if ($val_sel_t and $val_sel=='') {
            $val_sel='';
        } elseif ($val_sel=='' and $val_sel_f!='') {
            $val_sel=$val_sel_f;
        }

        $zusw1='';
        if ($this->mitaltwert) {
            $name2='';
            if (preg_match('/([^\[]*)(\[[^\]]*\])/', $name, $match)) {
                $name2=$match[1].'_ffaltw'.$match[2];
            } else {
                $name2=$name.'_ffaltw';
            }
            $zusw1='<input type="hidden" name="'.$name2.'" value="'.$val_sel.'">';//.$val_sel.'/'.$val_sel_f
        }

        return $zusw0.$text.$zusw1;
    }
    /**
     * simple javascript select
     * @param string $name post name
     * @param array $inhaltfeld choice options
     * @param int $default selected option
     * @param array $params other params
     * @return string
     */
    function selectinput_js($name, $inhaltfeld, $default=-99,$params=array()) {
        $quote=(is_array($params) && $params['quote']!='')?$params['quote']:'\'';
        $target=(is_array($params) && $params['target']!='')?$params['target']:'';
        
        $text='var selectinput_js = document.createElement('.$quote.'select'.$quote.');selectinput_js.name = '.$quote.''.$name.''.$quote.';';
        //@reset($inhaltfeld);
        //while (list($key,$val)=@each($inhaltfeld)) {
        if (is_array($default)) {
            $default_neu = array();
            foreach ($default as $default_key => $default_value) {
                $default_neu[$default_value] = $default_key;
            }
            $default = $default_neu;
        }
        
        
        if (!empty($inhaltfeld) && is_array($inhaltfeld)) {
            foreach ($inhaltfeld as $key => $val) {
                $text.='var option = document.createElement('.$quote.'option'.$quote.');';
                $such_key = $key;
                if (is_array($default)) {
                    if (isset($default[$such_key])) {
                        $text.='option.selected = '.$quote.'true'.$quote.';';
                    }
                } elseif ($default!=-99 and $default==$such_key) {
                    if ($key==='00' and $default==='00') {
                        $text.='option.selected = '.$quote.'true'.$quote.';';
                    } elseif ($key=='0' and $default!=='0') {

                    } else {
                        $text.='option.selected = '.$quote.'true'.$quote.';';
                    }
                }
                $text.='option.value = '.$quote.''.$key.''.$quote.';option.text = '.$quote.''.$val.''.$quote.';selectinput_js.appendChild(option);';
            }
        }
        if ($target!='') {
            $text.='document.getElementById('.$quote.''.$target.''.$quote.').innerHTML='.$quote.''.$quote.'; document.getElementById('.$quote.''.$target.''.$quote.').appendChild(selectinput_js);';
        }
        return $text;
    }
    
    /**
    * @param $name
    * @param string $value1
    * @param string $value2
    * @param string $other
    * @return string
    */
    function zeitinput($name, $value1='-', $value2='-', $other='', $valsmcurrent=false) {
        global $cfg_check_zeitinput, $carlo_tw, $cfg_vw,$cfg_modern;
        if ($this->ro) {
            return ' '.$value1.':'.$value2;
        }
        if ($value1=='-')
            $value1=date("H");
        if ($value2=='-')
            $value2=date("i");

        $name1=$name;
        $name2='';
        if (preg_match('/([a-zA-Z_\-1-9]+)(\[?.*\])/', $name1, $match)) {
            $name2=$match[1].'2'.$match[2];
        } else {
            $name2=$name.'2';
        }
		if ($_SESSION['device']!='pda' && !$cfg_modern) {
            $other.=' onFocus="ti1(this);" onBlur="ti2(this);"';
        }

        $zusw1='';
        if ($this->mitaltwert) {
            $name4='';
            if (preg_match('/([^\[]*)(\[[^\]]*\])/', $name, $match)) {
                $name4=$match[1].'_ffaltw'.$match[2];
            } else {
                $name4=$name.'_ffaltw';
            }
            $zusw1='<input type="hidden" name="'.$name4.'" value="'.$value1.'">';

            $name5='';
            if (preg_match('/([a-zA-Z_\-1-9]+)(\[?.*\])/', $name2, $match)) {
                $name5=$match[1].'_ffaltw'.$match[2];
            } else {
                $name5=$name2.'_ffaltw';
            }
            $zusw1.='<input type="hidden" name="'.$name5.'" value="'.$value2.'">';
        }
        $size=2;
		if ($cfg_modern) {
            $other=Modern_Helper_Html::expandClass($other,'datepicker_zeit');
            $size=1;
		}
        $bilder_uhr = '<img src="bilder/uhr.gif" border=0>';
        if ($carlo_tw && $cfg_vw) {
            $bilder_uhr = '';
        }

        if ($_SESSION['crm_version']>63 || $cfg_check_zeitinput || ($carlo_tw && $cfg_vw)) {
            if (preg_match('/onBlur="(.*)"/i', $other, $mat)) {
                $other=p4n_mb_string('str_replace', $mat[1], $mat[1].' if (typeof check_zeitinput == \'function\') {check_zeitinput(this);}', $other);
            } else {
                $other.=' onBlur="if (typeof check_zeitinput == \'function\') {check_zeitinput(this);}"';
            }
        }
        if ($valsmcurrent && p4n_mb_string('strpos', $other, 'valsmcurrent(this,\'zeit\');')===false) {
            if (preg_match('/onBlur="(.*)"/i', $other, $mat)) {
                $other=p4n_mb_string('str_replace', $mat[1], $mat[1].' if (typeof valsmcurrent == \'function\') {valsmcurrent(this,\'zeit\');}', $other);
            } else {
                $other.=' onBlur="if (typeof valsmcurrent == \'function\') {valsmcurrent(this,\'zeit\');}"';
            }
            if (preg_match('/data-info="(.*)"/i', $other, $mat)) {
                $other=p4n_mb_string('str_replace', $mat[1], $mat[1].' zeitinput', $other);
            } else {
                $other.=' data-info="zeitinput"';
            }
        }

        $return=('<input '.(($other!='')?$other:'').' type="text" name="'.$name1.'" value="'.$value1.'" size="2" maxlength="2">:<input '.(($other!='')?$other:'').' type="text" name="'.$name2.'" value="'.$value2.'" size="2" maxlength="2">'.$bilder_uhr.$zusw1);
        if ($cfg_modern) {
            $return='<span class="zeit-wrapper">'.$return.'</span>';
        }
        return $return;
    }
    /**
             * @param $name
             * @param bool|false $checked
             * @param string $other
             * @return string
             */
    function checkinput($name, $checked=false, $other='', $value='') {
        global $cfg_modern;
        if ($this->ro)
            $other.=' disabled';

        $other = str_replace(array('onchange="', 'onChange="'), 'onClick="', $other);
        $zusw1='';
        if ($this->mitaltwert) {
            $name2='';
            if (preg_match('/([^\[]*)(\[[^\]]*\])/', $name, $match)) {
                $name2=$match[1].'_ffaltw'.$match[2];
            } else {
                $name2=$name.'_ffaltw';
            }
            $zusw1='<input type="hidden" name="'.$name2.'" value="'.($checked?'1':'').'">';
        }

        if ($cfg_modern) {
            $other=Modern_Helper_Html::expandClass($other,'checkbox');
        }
			return ('<input type="checkbox" value="'.($value!=''?$value:'1').'" name="'.$name.'" '.($other!=''?' '.$other:'').($checked?' checked':'').">".$zusw1);
    }

            /**
             * @param $name
             * @param string $value
             * @param int $breite
             * @param int $hoehe
             * @param string $other
             * @return string
             */
    function textareainput($name, $value='', $breite=20, $hoehe=3, $other='') {
        if ($_SESSION['device']=='pda' and intval($breite)>=13) {
            $breite=13;
        }
        if ($this->ro)
            return ($value==''?'-':$value);

        if ($_SESSION['device']!='pda') {
            //		$other.=' onFocus="ti1(this);" onBlur="ti2(this);"';
        }

        $zusw1='';
        if ($this->mitaltwert) {
            $name2='';
            if (preg_match('/([^\[]*)(\[[^\]]*\])/', $name, $match)) {
                $name2=$match[1].'_ffaltw'.$match[2];
            } else {
                $name2=$name.'_ffaltw';
            }
            $zusw1='<input type="hidden" name="'.$name2.'" value="'.$value.'">';
        }

        return ('<textarea name="'.$name.'" cols="'.$breite.'" rows="'.$hoehe.'"'.($other!=''?' '.$other:'').'>'.$value.'</textarea>'.$zusw1);
    }

            /**
             * @return string
             */
    function absatz() {
        return ('<br>');
    }

            /**
             * @param $text
             * @return array|int|string
             */
    function text($text) {
        return p4n_mb_string('htmlspecialchars', $text);
    }

            /**
             * @param $name
             * @param string $value
             * @param string $other
             * @param string $image
             * @return string
             */
    function submit2($name, $value='submit', $other='', $image='') {
        global $cfg_modern;
        if ($this->ro)
            return '&nbsp;';
        
        if ($cfg_modern) {
            if (Modern_Helper_Html::matchClass('icon',$other)) {
                $image='';
                if ($value=='') {
                    $value='&nbsp;';
                }
            } else {
                $other=Modern_Helper_Html::expandClass($other,'btn-blue');
                $other=Modern_Helper_Html::removeStyle('border',$other);
            }
            if ($image!='') {
                $other=Modern_Helper_Html::expandClass($other,'btn-transp');
            }
        }
        return ('<input type="'.($image!=''?'image':'button').'" value="'.$value.'" name="'.$name.'"'.($other!=''?' '.$other:'').($image!=''?' src="'.$image.'"':'').">");
    }

    function secure_submit($name, $value = 'submit', $other = '', $image = '', $bed = '', $bedother = '') {
        if ($this->ro) {
            return '&nbsp;';
        }
        $shadowButtonName = $name . rand(0, 1024);
        // need some magic to get pre-existing onclicks to work
        if (preg_match('/(onclick=([\'"]))/i', $other, $matches)) {
            if ($matches[1] == '"') { // when we're captured in a
                $otherExpanded = "this.style.display = 'none'; document.getElementsByName('".$shadowButtonName."')[0].style.display = 'inherit'; ";
            }
            else {
                $otherExpanded = 'this.style.display = "none"; document.getElementsByName("'.$shadowButtonName.'")[0].style.display = "inherit"; ';
            }
            $otherExpanded = str_replace($matches[0], $matches[0] . $otherExpanded, $other);
        }
        else {
            $otherExpanded = 'onclick="this.style.display = \'none\'; document.getElementsByName(\''.$shadowButtonName.'\')[0].style.display = \'inherit\'" ' . $other;
        }

        $realSubmit = $this->submit($name, $value, $otherExpanded, $image, $bed, $bedother);

        $shadowSubmit = $this->submit($shadowButtonName, $value, 'style="display: none;" disabled', $image);
        return $realSubmit . $shadowSubmit;
    }

            /**
             * @param $name
             * @param string $value
             * @param string $other
             * @param string $image
             * @param string $bed
             * @return string
             */
    function submit($name, $value='submit', $other='', $image='', $bed='', $bedother='') {
		global $lang,$cfg_modern;

        if ($this->ro)
            return '&nbsp;';

        if ($bed!='') {
            $bfeld=explode(';', $bed);
            while (list($key,$val)=@each($bfeld)) {
                $xf=explode(':', $val);
                $art='';
                $feld='';
                $fehler='';
                // $xf[0]= si/ti/di/ci
                if (count($xf)==2) {
                    $art=trim($xf[0]);
                    $feld=trim($xf[1]);
                } elseif (count($xf)==3) {
                    $art=trim($xf[0]);
                    $feld=trim($xf[1]);
                    $fehler=trim($xf[2]);
                }
                if ($fehler!='')
                    $fehler=$lang[$fehler].'\\n';

                if ($art!='') {
                    $wert='';
                    $vergl='';
                    if ($x=preg_split('/(==|<=|>=|=|!=|>|<)/i', $feld)) {
                        if (count($x)==2) {
                            if (preg_match('/'.preg_quote($x[0]).'(.*)'.preg_quote($x[1]).'/', $feld, $m2)) {
                                $vergl=$m2[1];
                                if ($vergl=='=')
                                    $vergl='==';
                            }
                            $feld=$x[0];
                            $wert=$x[1];
                        }
                    }

                    $wert=p4n_mb_string('str_replace', '"', "'", $wert);

                    // Select-Auswahlfeld:
                    if ($art=='si') {
                        if ($wert!='' and $vergl!='')
                            $t.='if (document.forms[\''.$this->fname.'\'].elements[\''.$feld.'\'].options[document.forms[\''.$this->fname.'\'].elements[\''.$feld.'\'].selectedIndex].value'.$vergl.$wert.') { abbruch=true; t+=\''.$fehler.'\'; } ';
                    }
                    // Texteingabefeld:
                    if ($art=='ti') {
                        if ($wert!='' and $vergl!='')
							$t.='if (typeof document.forms[\''.$this->fname.'\'].elements[\''.$feld.'\'] !== typeof undefined && document.forms[\''.$this->fname.'\'].elements[\''.$feld.'\'] && document.forms[\''.$this->fname.'\'].elements[\''.$feld.'\'].value'.$vergl.$wert.') { abbruch=true; t+=\''.$fehler.'\'; } ';
                    }
                    // Zahlenfeld:
                    if ($art=='zi') {
                        if ($wert!='' and $vergl!='')
                            $t.='if (document.forms[\''.$this->fname.'\'].elements[\''.$feld.'\'].value'.$vergl.$wert.') { abbruch=true; t+=\''.$fehler.'\'; } ';
                    }
                    // Checkbox:
                    if ($art=='ci') {
                        if ($wert=='1' or $wert=='true') {
                            $t.='if (document.forms[\''.$this->fname.'\'].elements[\''.$feld.'\'].checked==true) { abbruch=true; t+=\''.$fehler.'\'; } ';
                        } else {
                            $t.='if (document.forms[\''.$this->fname.'\'].elements[\''.$feld.'\'].checked==false) { abbruch=true; t+=\''.$fehler.'\'; } ';
                        }
                    }
                    // Datumsfeld:
                    if ($art=='di') {
                        if ($fehler=='')
                            $fehler=$lang['_FEHLER_DATUM_'].'\\n';
                        if ($wert!='' and $vergl!='') {
                            $t.='reg=/\\d\\d\\.\\d\\d.\\d\\d\\d\\d/; if (reg.exec(document.forms[\''.$this->fname.'\'].elements[\''.$feld.'\'].value)==null || document.forms[\''.$this->fname.'\'].elements[\''.$feld.'\'].value'.$vergl.$wert.') { abbruch=true; t+=\''.$fehler.'\'; } ';
                        } else {
                            $t.='reg=/\\d\\d\\.\\d\\d.\\d\\d\\d\\d/; if (reg.exec(document.forms[\''.$this->fname.'\'].elements[\''.$feld.'\'].value)==null && document.forms[\''.$this->fname.'\'].elements[\''.$feld.'\'].value!=\'\') { abbruch=true; t+=\''.$fehler.'\'; } ';
                        }
                    }
                }
            }
            if ($t!='') {
                $t='t=\'\'; abbruch=false; '.$t.' if (abbruch==true) { if (typeof cfg_modern != typeof undefined && cfg_modern==true) {P4nBoxHelper.stoploading();} alert(\''._FEHLER_POPUP_.'\\n\\n\'+t); return false; } else {if (typeof cfg_modern != typeof undefined && cfg_modern==true) {P4nBoxHelper.startloading();}}';
                if ($other!='') {
                    if (preg_match('/onclick/i', $other)) {
                        $other=trim($other);
                        $other=p4n_mb_string('substr', $other, 0, -1).' '.$t.' '.$bedother.'"';
                    } else {
                        $other.=' onClick="'.$t.' '.$bedother.'"';
                    }
                } else {
                    $other='onClick="'.$t.' '.$bedother.'"';
                }
            }
        }

        if ($_SESSION['device']=='pda')
            $other='';
        if ($cfg_modern) {
            $other=Modern_Helper_Html::expandClass($other,'issubmit');
            if (Modern_Helper_Html::matchClass('icon',$other)) {
                $image='';
                if ($value=='') {
                    $value='&nbsp;';
                }
            } else {
                if ($value=='L' || $value==' L ') {
                    $image='';
                    $other=Modern_Helper_Html::expandClass($other,'icon icon-l');
                } else {
                    $other=Modern_Helper_Html::expandClass($other,'btn-blue');
                    $other=Modern_Helper_Html::removeStyle('border',$other);
                }
            }
            if ($image!='') {
                $other=Modern_Helper_Html::expandClass($other,'btn-transp');
            }
            if (!preg_match('/onclick/i', $other) && !$this->hastarget) {
                $other=Modern_Helper_Html::expandOnClick($other,'if (typeof cfg_modern != \'undefined\' && cfg_modern==true) {P4nBoxHelper.startloading();}');
            }
        }
        return ('<input type="'.($image!=''?'image':'submit').'" value="'.$value.'" name="'.$name.'"'.($other!=''?' '.$other:'').($image!=''?' src="'.$image.'"':'').">");
    }

            /**
             * @param $name
             * @param string $value
             * @param string $other
             * @param bool|false $nameals_id
             * @return string
             */
    function hidden($name, $value='', $other='', $nameals_id = false) {
        $zusw1='';
        if ($this->mitaltwert) {
            $name2='';
            if (preg_match('/([^\[]*)(\[[^\]]*\])/', $name, $match)) {
                $name2=$match[1].'_ffaltw'.$match[2];
            } else {
                $name2=$name.'_ffaltw';
            }
            $zusw1='<input type="hidden" name="'.$name2.'" value="'.$value.'">';
//				$zusw1='<input '.($nameals_id ? 'id="'.$name.'"' : '').' type="hidden" name="'.$name2.'" value="'.$value.'">';
        }
        if ($name == 'sql') {
            if (extension_loaded("mcrypt")) {
                $value = 'p4n'.verschluesseleWert($value);
            }
        }
        return ('<input '.($nameals_id ? 'id="'.$name.'"' : '').' type="hidden" value="'.$value.'" name="'.$name.'"'.($other!=''?' '.$other:'').">".$zusw1);
    }

            /**
             * @param $name
             * @param string $value
             * @param int $default
             * @param string $other
             * @param string $trennung
             * @param bool|false $tr
             * @return string
             */
    function radioinput($name, $value='', $default=-99, $other='', $trennung='', $tr=false) {
        global $cfg_modern;
        $text = '';
        if ($this->ro)
            $other.=' disabled';
        if (is_array($value)) {
            $schon=false;
            while (list($key, $val)=@each($value)) {
				$text.=(($tr)?'<tr><td>':'').'<input type="radio" name="'.$name.'" value="'.$key.'"';
                if ($default==-100) {

                } else {
                    if ($default!=-99 and $default==$key)
                        $text.=' checked';
                    if ($default==-99 and !$schon) {
                        $schon=true;
                        $text.=' checked';
                    }
                }
					$text.=''.($other!=''?' '.$other:'').'>'.$val.$trennung.(($tr)?'</td></tr>':'');
            }
        } elseif ($value=='' && $value!=0) {
			$text.=(($tr)?'<tr><td>':'').'<input type="radio" name="'.$name.'" value="1"'.($other!=''?' '.$other:'').'>ja <input type="radio" name="'.$name.'" value="0">nein'.(($tr)?'</td></tr>':'');
        } elseif ($value != '' || $value==0) {
            $checked='';
            if ($value===$default) {
                $checked ='checked ';
            }
            $text.=(($tr)?'<tr><td>':'').'<input type="radio" '.$checked.' name="'.$name.'" value="'.$value.'"'.($other!=''?' '.$other:'').'>'.(($tr)?'</td></tr>':'');
        }
        return $text;
    }

    /**
     * Spit out a bunch of checkbox inputs as array field
     * @param string $name the name
     * @param array  $value array mapping field names to checked or not checked. ('Has Car' => false, 'Has Bike' => true) etc
     * @param string $other stuff to append before closing the input tag
     * @param bool   $wrapTableRow wrap up the whole thing in a tr->td?
     *
     * @return string
     */
    function checkboxinputs($name, array $value, $other = '', $wrapTableRow = false) {
        $text = '';
        if ($this->ro) {
            $other .= ' disabled';
        }
        $idx = 0;
        foreach ($value as $key => $val) {
            $key = trim($key);
            if (empty($key) && $key != '0') {
                $key = ' - ';
            }
            $v = "%s<input type=\"checkbox\" name=\"$name"."[".$idx."]\" value='$key' " . ($val === true ? 'checked="checked' : '') . " %s> %s%s";

            $text .= sprintf($v,
                (($wrapTableRow) ? '<tr><td>' : ''),
                $other,
                $key,
                (($wrapTableRow) ? '</td></tr>' : '<br/>'));
            $idx++;
        }
        return $text;
    }
    /**
             * @param $name
             * @param $dbtab
             * @param $dbfeld
             * @param int $default
             * @param bool|false $bw
             * @param string $where
             * @param string $other
             * @param string $orderby
             * @return string
             */
    function dbselect($name, $dbtab, $dbfeld, $default=0, $bw=false, $where='', $other='', $orderby='') {
        global $cfg_modern;
        if ($this->ro and $default==0)
            return '-';
        elseif ($this->ro)
            $other.=' disabled';
        $db=new PDB;
        if ($_SESSION['device']!='pda') {
            $other.=' onFocus="ti1(this);" onBlur="ti2(this);"';
        }
        if ($cfg_modern) {
            $left=(basename($_SERVER['PHP_SELF'])=='menu4.php')?' left':'';
            $text='<span class="'.'styled-select'.$left.'">';
        } else {
            $text='';
        }
        $text.='<select name="'.$name."\" $other>";
        if ($bw!=false)
            $text.='<option value="-1">'.$bw;
//			$sql_felder=array($dbfeld[0], $dbfeld[1]);
        list($feld,$feld2)=@each($dbfeld);
        $sql_felder[]=$feld;
        if (is_array($feld2))
            while (list($key,$val)=@each($feld2))
                $sql_felder[]=$val;
        else
            $sql_felder[]=$feld2;
        $res=$db->select($dbtab, $sql_felder, $where, $orderby);
        while ($row=$db->zeile($res)) {
            $anzeigetext=$row[1].' ';
            for ($j=2; $j<count($sql_felder); $j++)
                $anzeigetext.=$row[$j].' ';
            $anzeigetext=p4n_mb_string('substr', $anzeigetext, 0, -1);
            $text.="<option value=\"".$row[0]."\"";
            if ($default!=0 and $default==$row[0])
                $text.=' selected';
            $text.=">".$anzeigetext;//."\n";
        }
        $text.="</select>";
        if ($cfg_modern) {
            $text.="</span>";
        }

        $zusw1='';
        if ($this->mitaltwert) {
            $name2='';
            if (preg_match('/([^\[]*)(\[[^\]]*\])/', $name, $match)) {
                $name2=$match[1].'_ffaltw'.$match[2];
            } else {
                $name2=$name.'_ffaltw';
            }
            $zusw1='<input type="hidden" name="'.$name2.'" value="'.$default.'">';
        }

        return $text.$zusw1;
    }

            /**
             * @param $name
             * @param $formname
             * @param string $value
             * @param string $stid
             * @param int $size
             * @return string
             */
    function kundeinput($name, $formname, $value='', $stid='', $size=20) {
        global $cfg_modern,$cfg_cti;
        if ($this->ro)
            return $value;
        $padding='';
        $text='<input type="text" name="'.$name.'" value="'.$value.'" size="'.$size.'" onKeyup="window.open(\'stammdaten_suche_name.php?formf='.$formname.'&options_menu=0'.$padding.'&tfeld='.$name.'&wort=\'+escape(this.value), \'status\');">';
        
        if ($cfg_modern) {
            $img='icon-ausrufe';
            if ($stid!='')
                $img='icon-check';
            $text.='<span name="stidok" class="icon '.$img.'"></span>';
        } else {
            $img='ausrufrot.gif';
            if ($stid!='')
                $img='hakengruen.gif';
            $text.='<img name="stidok" src="bilder/'.$img.'" border=0>';
        }
        
        $text.=$this->hidden('st_id', $stid);

        return $text;
    }

            /**
             * @param $name
             * @param string $value
             * @param string $stid
             * @param int $size
             * @return string
             */
    function kundeinput2($name, $value='', $stid='', $size=20) {
            global $cfg_modern;
        if ($this->ro)
            return $value;
            
            
        $text='<input type="text" name="t_'.$name.'" value="'.$value.'" size="'.$size.'" onKeyup="window.open(\'stammdaten_suche_name.php?formf='.$this->fname.'&vpok=b_'.$name.'&vpname=t_'.$name.'&vpid='.$name.'&wort=\'+escape(this.value), \'status\');">';
        //$text='<input type="text" name="'.$name.'" value="'.$value.'" size="'.$size.'" onKeyup="window.open(\'stammdaten_suche_name.php?formf='.$formname.'&tfeld='.$name.'&wort=\'+this.value, \'status\');">';
        if ($cfg_modern) {
            $img='icon-ausrufe';
            if ($stid!='')
                $img='icon-check';
            $text.='<span name="b_'.$name.'" class="icon '.$img.'"></span>';
        } else {
            $img='ausrufrot.gif';
            if ($stid!='')
                $img='hakengruen.gif';
            $text.='<img name="b_'.$name.'" src="bilder/'.$img.'" border=0>';
        }
        
        $text.=$this->hidden($name, $stid);

        if ($cfg_modern) {
             $text='<span class="kundeapinput">'.$text.'</span>';
        }
        
        return $text;
    }

            /**
             * @param $name
             * @param string $value
             * @param string $stid
             * @param int $size
             * @return string
             */
    function kundeinput3($name, $value='', $stid='', $size=20) {
        global $cfg_modern;
        if ($this->ro)
            return $value;
        $text='<input type="text" name="t_'.$name.'" value="'.$value.'" size="'.$size.'" onKeyup="window.open(\'stammdaten_suche_nameundap.php?formf='.$this->fname.'&vpok=b_'.$name.'&vpname=t_'.$name.'&vpid='.$name.'&wort=\'+escape(this.value), \'status\');">';
        //$text='<input type="text" name="'.$name.'" value="'.$value.'" size="'.$size.'" onKeyup="window.open(\'stammdaten_suche_name.php?formf='.$formname.'&tfeld='.$name.'&wort=\'+this.value, \'status\');">';
        
        if ($cfg_modern) {
            $img='icon-ausrufe';
            if ($stid!='')
                $img='icon-check';
            $text.='<span name="b_'.$name.'" class="icon '.$img.'"></span>';
        } else {
            $img='ausrufrot.gif';
            if ($stid!='')
                $img='hakengruen.gif';
            $text.='<img name="b_'.$name.'" src="bilder/'.$img.'" border=0>';
        }
        
        $text.=$this->hidden($name, $stid);

        if (preg_match('/([^\[]*)(\[[^\]]*\])/', $name, $match)) {
            $name2=$match[1].'_ap'.$match[2];
        } else {
            $name2=$name.'_ap';
        }

        $text.=$this->hidden($name2, '');

        return $text;
    }

            /**
             * @param $name
             * @param string $value
             * @param int $size
             * @param string $other
             * @param string $url
             * @return string
             */
        function kundeinput4($name, $value='', $size=20, $other='', $url='') {
            global $cfg_modern;
			if ($this->ro)
				return $value;
            
			return $text;
		}

            /**
             * @param $name
             * @param string $formname
             * @param string $value
             * @param string $stid
             * @param int $size
             * @param string $idfeld
             * @param bool|false $nurmail
             * @return string
             */
    function mitarbeiterinput($name, $formname='', $value='', $stid='', $size=20, $idfeld='', $nurmail=false) {
        global $lade_s_geladen, $lade_s_geladen6, $li_block, $cfg_modern;

        if (!$lade_s_geladen6) {
            echo '<script type="text/javascript" src="js/lade_s.js"></script>';
            echo javas('var timerk; function suchema2(nap_val, n1, n2) { lade_in_message(\'stammdaten_suche_ma.php?'.($nurmail?'nurmail=1&':'').(isset($_GET['druckoptimierung'])?'druckoptimierung=1&':'').'formf='.$this->fname.'&vpok=b_\'+n1+\'&vpname=\'+n1+\'&vpid=\'+n2+\'&wort=\'+nap_val, 750, 400); } function suchema1(nap_val, n1, n2) { timerk=setTimeout("suchema2(\'"+nap_val+"\', \'"+n1+"\', \'"+n2+"\')", 500); }');
            $mli_block=$li_block;
            $li_block='';
            echo lade_divinhalt('stammdaten_suche_ma.php', 750, 400, 'Suche', true, $ohne_iframe=true);
            $li_block=$mli_block;
            $lade_s_geladen6=true;
        }

        if ($this->ro)
            return $value;
        $text='<input type="text" name="'.$name.'" value="'.$value.'" size="'.$size.'" onKeyup="clearTimeout(timerk); if (this.value.length>0) { suchema1(this.value, \''.$name.'\', \''.$idfeld.'\'); } else { '.($cfg_modern?' p4n_changeIcon(document, \'b_'.$name.'\',\'icon icon-ausrufe-r\'); ':' document.images[\'b_'.$name.'\'].src=\'bilder/ausrufrot.gif\'; ').'  }">';
        
        if ($cfg_modern) {
            $img='icon-ausrufe';
            if ($stid!='')
                $img='icon-check';
            $text.='<span name="b_'.$name.'" class="icon '.$img.'"></span>';
        } else {
            $img='ausrufrot.gif';
            if ($stid!='')
                $img='hakengruen.gif';
            $text.='<img name="b_'.$name.'" src="bilder/'.$img.'" border=0>';
        }
        
        if ($cfg_modern) {
            $text='<span class="mitarbeiterinput">'.$text.'</span>';
        }
        
        return $text;
    }

            /**
             * @param $name
             * @param string $formname
             * @param string $value
             * @param string $stid
             * @param int $size
             * @param string $mit_tel
             * @param bool|false $smt_gk
             * @param bool|false $mit_betr
             * @param bool|false $opos_suche
             * @param string $anderer_formname
             * @param bool|false $sucheenter
             * @param string $jszusatz
             * @return string
             */
	function kundeapinput($name, $formname='', $value='', $stid='', $size=20, $mit_tel='', $smt_gk=false, $mit_betr=false, $opos_suche=false, $anderer_formname='', $sucheenter=false, $jszusatz='') {
        global $lade_s_geladen, $li_block, $ldi_schon, $cfg_modern, $cfg_neue_zentrale_suche;
        if ($jszusatz!='') {
            $jszusatz=urlencode($jszusatz);
        }
			
        if (preg_match('/([^\[]*)(\[[^\]]*\])/', $name, $match)) {
            $name2=$match[1].'_ap'.$match[2];
        } else {
            $name2=$name.'_ap';
        }
        $x1t=ob_get_contents();
        if (strlen($x1t)>0 and preg_match('/function lade_in_message/', $x1t)) {
            $lade_s_geladen=true;
        }
        echo javas('if (typeof escapeP4n !== "function") {function escapeP4n(s) {s = s.replace(/\'/g, "nafuhrungs");s = s.replace(String.fromCharCode(92), "bockslsh");s = s.replace(/\_/g, "intstrihc");return "p4nn4p"+encodeURIComponent(s);}}');
        $escape_funktion = 'escapeP4n';
        if ($cfg_modern) {
            $escape_funktion = 'escapeP4n_60';
        }
        if ($anderer_formname!='') {
            if (!$lade_s_geladen) {
                echo '<script type="text/javascript" src="js/lade_s.js"></script>';
                $lade_s_geladen=true;
            }
        	echo javas('var timerk; function suchekname2_'.$anderer_formname.'(nap_val, n1, n2) { nap_val='.$escape_funktion.'(nap_val.replace(/\+/, "%2B"), 1); lade_in_message(\'stammdaten_suche_nameundap2.php?'.($jszusatz!=''?'jsapp='.$jszusatz.'&':'').($smt_gk?'smtgk=1&':'').($mit_betr?'mit_betr=1&':'').($opos_suche?'opos_suche=1&':'').($mit_tel!=''?'mit_tel='.$mit_tel.'&':'').(isset($_GET['druckoptimierung'])?'druckoptimierung=1&':'').'formf='.($anderer_formname!=''?$anderer_formname:$this->fname).'&vpok=b_\'+n1+\'&vpname=t_\'+n1+\'&apid=\'+n2+\'&vpid=\'+n1+\'&wort=\'+nap_val, 750, 400); } function suchekname1_'.$anderer_formname.'(nap_val, n1, n2) { timerk=setTimeout("suchekname2_'.$anderer_formname.'(\'"+nap_val+"\', \'"+n1+"\', \'"+n2+"\')", 500); }');
            $mli_block=$li_block;
            $li_block='';
            echo lade_divinhalt('stammdaten_suche_nameundap2.php', 750, 400, 'Suche', true, $ohne_iframe=true);
            $li_block=$mli_block;
        } elseif (!$lade_s_geladen) {
            echo '<script type="text/javascript" src="js/lade_s.js"></script>';
            $lade_s_geladen=true;
        }
        $x1t=ob_get_contents();
        if ($anderer_formname=='' and strlen($x1t)>0 and !preg_match('/function suchekname2\(/', $x1t)) {
            if (empty($cfg_neue_zentrale_suche)) {
                $url_suche = 'stammdaten_suche_nameundap2.php?';
            } else {
                $url_suche = 'stammdaten_suche.php?quelle=kundeapinput&suche_eingrenzen=-1&';
            }
            echo javas('var timerk; function suchekname2(nap_val, n1, n2) { nap_val='.$escape_funktion.'(nap_val.replace(/\+/, "%2B"), 1); lade_in_message(\''.$url_suche.($jszusatz != '' ? 'jsapp='.$jszusatz.'&' : '').($smt_gk ? 'smtgk=1&' : '').($mit_betr ? 'mit_betr=1&' : '').($opos_suche ? 'opos_suche=1&' : '').($mit_tel != '' ? 'mit_tel='.$mit_tel.'&' : '').(isset($_GET['druckoptimierung']) ? 'druckoptimierung=1&' : '').'formf='.($anderer_formname != '' ? $anderer_formname : $this->fname).'&vpok=b_\'+n1+\'&vpname=t_\'+n1+\'&apid=\'+n2+\'&vpid=\'+n1+\'&wort=\'+nap_val, 750, 400); } function suchekname1_'.$anderer_formname.'(nap_val, n1, n2) { timerk=setTimeout("suchekname2(\'"+nap_val+"\', \'"+n1+"\', \'"+n2+"\')", 500); }');
            $mli_block=$li_block;
            $li_block='';
            echo lade_divinhalt('stammdaten_suche_nameundap2.php', 750, 400, 'Suche', true, $ohne_iframe=true);
            $li_block=$mli_block;
        }

        if ($this->ro)
            return $value;

        $suchzus1='';
        if ($sucheenter) {
            $js_te='onKeyPress="if (event.keyCode==13) { if (this.value.length>0) { suchekname1_'.$anderer_formname.'(this.value, \''.$name.'\', \''.$name2.'\'); } else { '.($cfg_modern?' p4n_changeIcon(document, \'b_'.$name.'\',\'icon icon-ausrufe-r\'); ':' document.images[\'b_'.$name.'\'].src=\'bilder/ausrufrot.gif\'; ').' } return false; }"';
				$suchzus1=$this->submit2('', '', (($cfg_modern)?'class="icon icon-search"':'style="width:17px;"').' onClick="suchekname1_'.$anderer_formname.'(this.form.elements[\'t_'.$name.'\'].value, \''.$name.'\', \''.$name2.'\'); return false;"', (($cfg_modern)?'bilder/fragezeichen.gif':'bilder/fragezeichen.gif'));
        } else {
            $js_te='onKeyup="clearTimeout(timerk); if (this.value.length>0) { suchekname1_'.$anderer_formname.'(this.value, \''.$name.'\', \''.$name2.'\'); } else { '.($cfg_modern?' p4n_changeIcon(document, \'b_'.$name.'\',\'icon icon-ausrufe-r\'); ':' document.images[\'b_'.$name.'\'].src=\'bilder/ausrufrot.gif\'; ').' }"';
        }
        if ($cfg_modern) {
                $text.= $this->textinput('t_'.$name, $value, $size, $js_te.' placeholder="'._SUCHE_.'" id="t_'.$name.'" autocomplete="off"').$suchzus1;
        } else {
            $text='<input id="t_'.$name.'" type="text" name="t_'.$name.'" value="'.$value.'" size="'.$size.'" '.$js_te.' autocomplete="off">'.$suchzus1;
        }
        
        if ($stid!='') {
            if ($cfg_modern) {
                $text.='<span name="b_'.$name.'" class="icon icon-check"></span>';
            } else {
                $text.='<img name="b_'.$name.'" src="bilder/hakengruen.gif" border=0>';
            }
        } else {
            if ($cfg_modern) {
                $text.='<span name="b_'.$name.'" class="icon icon-ausrufe"></span>';
            } else {
                $text.='<img name="b_'.$name.'" src="bilder/ausrufrot.gif" border=0>';
            }
        }
        
        $text.=$this->hidden($name, $stid, '', true);
        $text.=$this->hidden($name2, '', '', true);

        if ($cfg_modern) {
            $text='<span class="kundeapinput">'.$text.'</span>';
        }

        return $text;
    }

            /**
             * @param $name
             * @param string $value
             * @param string $vp
             * @param int $size
             * @param string $other
             * @param string $bed2
             * @return string
             */
    function vpinput($name, $value='', $vp='', $size=20, $other='', $bed2='') {
        if ($this->ro)
            return $value;
        if ($value=='0' and $vp=='0') {
            $value='';
            $vp='';
        }
        $text='<input type="text" name="t_'.$name.'" value="'.$value.'" size="'.$size.'" '.$other.' onKeyup="window.open(\'stammdaten_suche_vp.php?'.($bed2!=''?$bed2.'=1&':'').'formf='.$this->fname.'&vpok=b_'.$name.'&vpname=t_'.$name.'&vpid='.$name.'&wort=\'+this.value, \'status\');">';
        $img='ausrufrot.gif';
        if ($vp!='')
            $img='hakengruen.gif';
        $text.='<img name="b_'.$name.'" src="bilder/'.$img.'" border=0>';
        $text.=$this->hidden($name, $vp);

        return $text;
    }

    function blzinput($name, $value='', $target='', $size=12, $other='', $nr='') {
        global $blz_ajx_schon, $suche_ajx;
        if ($this->ro)
            return $value;

        $text='';

        if ($suche_ajx and !isset($blz_ajx_schon)) {
            $blz_ajx_schon=1;
            $text.=javas('function sucheaufruf_blz(wort2) {
		sfenster=document.getElementById("message");
		iheight=0;
		iwidth=0;
		mfr=this;//parent.main;
		docRoot="document.body";
		if (eval("mfr."+docRoot) && eval("typeof mfr."+docRoot+".clientHeight==\'number\'") && eval("mfr."+docRoot+".clientHeight")) {
			iheight = eval("mfr."+docRoot+".clientHeight");
			if (!document.all)
				iheight-=10;
		} else if (typeof(mfr.innerHeight)==\'number\') {
			iheight = mfr.innerHeight;
		}
		iheight+=document.body.scrollTop;
		if (eval("mfr."+docRoot) && eval("typeof mfr."+docRoot+".clientWidth==\'number\'") && eval("mfr."+docRoot+".clientWidth")) {
			iwidth = eval("mfr."+docRoot+".clientWidth");
		} else if (typeof(mfr.innerWidth)==\'number\') {
			iwidth = mfr.innerHeight;
			if (!document.all)
				iwidth-=50;
		}
		lade_s(wort2, "message");
		bv=750;
		hv=400;
		h=iheight-hv;
		b=iwidth-bv;
		sfenster.style.top=iheight-hv-50;
		sfenster.style.left=iwidth-bv-30;
		sfenster.style.width=bv;
		sfenster.style.height=hv;
		sfenster.style.zIndex=10;
		sfenster.style.overflow="auto";

		var IfrRef = document.getElementById(\'DivShim\');
		sfenster.style.display = "block";
		IfrRef.style.width = sfenster.offsetWidth;
		IfrRef.style.height = sfenster.offsetHeight;
		IfrRef.style.top = sfenster.style.top;
		IfrRef.style.left = sfenster.style.left;
		IfrRef.style.zIndex = sfenster.style.zIndex - 1;
		IfrRef.style.display = "block";
				}');
        } elseif ($suche_ajx) {
            $text.=javas('function sucheaufruf_blz'.$nr.'(wort2) {
		sfenster=document.getElementById("message");
		iheight=0;
		iwidth=0;
		mfr=this;//parent.main;
		docRoot="document.body";
		if (eval("mfr."+docRoot) && eval("typeof mfr."+docRoot+".clientHeight==\'number\'") && eval("mfr."+docRoot+".clientHeight")) {
			iheight = eval("mfr."+docRoot+".clientHeight");
			if (!document.all)
				iheight-=10;
		} else if (typeof(mfr.innerHeight)==\'number\') {
			iheight = mfr.innerHeight;
		}
		iheight+=document.body.scrollTop;
		if (eval("mfr."+docRoot) && eval("typeof mfr."+docRoot+".clientWidth==\'number\'") && eval("mfr."+docRoot+".clientWidth")) {
			iwidth = eval("mfr."+docRoot+".clientWidth");
		} else if (typeof(mfr.innerWidth)==\'number\') {
			iwidth = mfr.innerHeight;
			if (!document.all)
				iwidth-=50;
		}
		lade_s(wort2, "message");
		bv=750;
		hv=400;
		h=iheight-hv;
		b=iwidth-bv;
		sfenster.style.top=iheight-hv-50;
		sfenster.style.left=iwidth-bv-30;
		sfenster.style.width=bv;
		sfenster.style.height=hv;
		sfenster.style.zIndex=10;
		sfenster.style.overflow="auto";

		var IfrRef = document.getElementById(\'DivShim\');
		sfenster.style.display = "block";
		IfrRef.style.width = sfenster.offsetWidth;
		IfrRef.style.height = sfenster.offsetHeight;
		IfrRef.style.top = sfenster.style.top;
		IfrRef.style.left = sfenster.style.left;
		IfrRef.style.zIndex = sfenster.style.zIndex - 1;
		IfrRef.style.display = "block";
				}');
        }

        if ($suche_ajx) {
            if ($other!='') {
                $other=p4n_mb_string('substr', $other, 0, -1).' sucheaufruf_blz'.$nr.'(\'stammdaten_suche_blz.php?ajx=1&formf='.$this->fname.'&target='.$target.'&wort=\'+this.value);"';
            } else {
                $other='onKeyup="sucheaufruf_blz'.$nr.'(\'stammdaten_suche_blz.php?ajx=1&formf='.$this->fname.'&target='.$target.'&wort=\'+this.value);"';
            }
        } else {
            if ($other!='') {
                $other=p4n_mb_string('substr', $other, 0, -1).' window.open(\'stammdaten_suche_blz.php?formf='.$this->fname.'&target='.$target.'&wort=\'+this.value, \'status\');"';
            } else {
                $other='onKeyup="window.open(\'stammdaten_suche_blz.php?formf='.$this->fname.'&target='.$target.'&wort=\'+this.value, \'status\');"';
            }
        }

        $text.='<input type="text" name="'.$name.'" value="'.$value.'" size="'.$size.'" '.$other.'>';

        return $text;
    }

            /**
             * @return string
             */
    function ende() {
        global $phs, $form;
        if (!isset($form)) {
            $form=new htmlform;
        }
        $x='';
        if (preg_match("/stammdaten_main\.php/",$phs) or preg_match("/auftraege\.php/",$phs)) {
            $x=$form->hidden('mstid', $_SESSION['stammdaten_id']);
        }
        return ($x."</form>\n");
    }

    function vehicleSelectorInput($uniqueId, $makerField, $groupField, $modelField, $makerPreselect = '', $groupPreselect = '', $modelPreselect = '', $pflicht = false, $type = 0, $selectfirst = false, $addColorFields = false, $colorPreselects = array()) {
        __checkLibSn(); // for this we need the template_parse function
        $arr = array(
            'appendix' => $uniqueId,
            'maker_field' => $makerField,
            'group_field' => $groupField,// dis be new
            'model_field' => $modelField,

            'maker_preselect' => $makerPreselect,
            'group_preselect' => $groupPreselect,
            'model_preselect' => $modelPreselect,

            'ext_color_preselect' => $colorPreselects['ext_color'],
            'int_color_preselect' => $colorPreselects['int_color'],
            'year_preselect' => $colorPreselects['year'],

            'pflicht' => (($pflicht==true)?'<span>*</span>':''),
            'type' => $type,
            'selectfirst'=>$selectfirst,
            'color_field' => $uniqueId.'_ext_colour_field',
            'int_color_field' => $uniqueId.'_int_colour_field',
            'model_year' => $uniqueId.'_year_field',
        );
        if ($addColorFields) { // Just strip the helper tags
            return preg_replace('/(<colorform>)*(<\/colorform>)/', '', template_parse($arr, 'vehicle_selector.html'));
        }
        else {
            $selector = template_parse($arr, 'vehicle_selector.html');
            // Remove the color fields from the parsed template.
            return preg_replace('/(<colorform>[\s\S]+<\/colorform>)/', '', $selector);
//            return $selector;
        }

    }

    function vehicleSelectorStart() {
        return javas('var VehicleSelectorInput=new Array();');
    }
    function vehicleSelectorEnde() {
        return javas('VehicleSelectorCall(VehicleSelectorInput);');
    }
}
//    }

/**
 * @param string $wert
 * @param string $secret_pass
 * @return string
 */
	function verschluesseleWert($wert = '', $secret_pass = 'canon384p4nsp$ec!ial1234', $inblocks = 0) {
        $password_return = '';
        if ($inblocks > 0) {
            $new_wert = $wert;
            $password_return_array = array();
            for ($index = 0; $index < strlen($wert); $index+=$inblocks) {
                $key = substr(sha1($secret_pass, true), 0, 16);
                $iv = openssl_random_pseudo_bytes(16);
                $new_wert = substr($wert, $index, $inblocks);
                $password = $iv.openssl_encrypt($new_wert, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $iv);
                $password_return_array[] = base64_encode($password);
            }
            $password_return = implode('_p4nexploden4p_', $password_return_array);
        } else {
            $key = substr(sha1($secret_pass, true), 0, 16);
            $iv = openssl_random_pseudo_bytes(16);
            $password = $iv.openssl_encrypt($wert, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $iv);
            $password_return = base64_encode($password);
        }
        return $password_return;
    }

/**
 * @param string $wert
 * @param string $secret_pass
 * @return string
 */
	function entschluesseleWert($wert = '', $secret_pass = 'canon384p4nsp$ec!ial1234') {
        $password = base64_decode($wert);
	    $iv = substr($password, 0, 16);
        $ciphertext = substr($password, 16);
        $key = substr(sha1($secret_pass, true), 0, 16);
        $plaintext = openssl_decrypt($ciphertext, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $iv);
        return $plaintext;
    }

/**
 * @param $dbtab
 * @param $dbfeld
 * @param string $where
 * @return string
 */
	function dbout($dbtab, $dbfeld, $where='') {
		global $ADODB_FETCH_MODE;
        global $sql_tab;
		$merke=$ADODB_FETCH_MODE;
        
        $session_serial = '';
        if ($dbtab == $sql_tab['benutzer']) {
            $session_serial = md5(serialize(array($dbtab, $dbfeld, $where)));
            if (isset($_SESSION[$session_serial])) {
                return $_SESSION[$session_serial];
            }
        }
        $text='';
		$db=new PDB;
		$db->setfetchmode(true);
        $sql_felder = array();
		if (is_array($dbfeld)) {
			while (list($key,$val)=@each($dbfeld)) {
				$sql_felder[]=$val;
            }
        } else {
			$sql_felder[]=$dbfeld;
        }
		$res=$db->select($dbtab, $sql_felder, $where);
		if ($row=$db->zeile($res)) {
			for ($i=0; $i<count($row); $i++) {
				$text.=$row[$i].' ';
            }
//			while (list($key,$val)=@each($row))
			$text=trim(p4n_mb_string('substr', $text,0,-1));
			$dbtab2=str_replace(array("'", '"'), '', $dbtab);
			if (is_array($dbfeld) && count($dbfeld)==2 and ($dbtab2=='benutzer' or $dbtab2=='crm_benutzer')) {
				$text=trim($row[1].', '.$row[0]);
			}
		}
		$ADODB_FETCH_MODE=$merke;
        if ($session_serial != '') {
            $_SESSION[$session_serial] = $text;
        }
		return $text;
	}
    
    //echo $form->datuminput('datum1', '01.01.2015','id="test"').datuminputGetWvl('test',$_SESSION['user_id']);
    function datuminputGetWvl($id, $extra_text = '', $htmlelement='', $htmlChange=false) {
        $return='<span id="datuminputGetWvl_'.$id.'" style="color: #ff0000; line-height:0px;"></span>';
        $return.=javas('
            if (typeof datuminputGetWvlRequest != "function") {
                function datuminputGetWvlRequest(parameter,target,htmlId) {
                    if (typeof p4ntoken == "undefined") {p4ntoken="";}
                    var xmlhttp;
                    try { xmlhttp = new XMLHttpRequest(); } catch (error) {
                    try { xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); } catch (error) { return false;}}
                    xmlhttp.open("POST", "kalender_neu.php", false);
                    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xmlhttp.setRequestHeader("X-Requested-With", "XMLHttpRequest");
                    xmlhttp.onreadystatechange=function() {
                        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                            if (typeof getNewToken == "function") {
                                p4ntoken = getNewToken(xmlhttp.getResponseHeader("p4ntoken"));
                            }
                            if (xmlhttp.responseText!="") {
                                var targetHtmlElement = document.getElementById(target);
                                if (JSON.parse(xmlhttp.responseText)==" ") {
                                    targetHtmlElement.style.display="none";
                                } else {
                                    targetHtmlElement.innerHTML=JSON.parse(xmlhttp.responseText)+"'.$extra_text.'";
                                    targetHtmlElement.style.display="";
                                }
                            }
                        }
                    }
                    parameter+="&p4ntoken="+p4ntoken;
                    parameter+="&deutschdatum=1";
                    parameter+="&action=wvl";
                    var sessionID=0;
                    if (htmlId!="") {
                        var htmlElement=document.getElementById(htmlId);
                        if (typeof htmlElement != typeof undefined && htmlElement) {
                            sessionID=htmlElement.value;
                        } else {
                            sessionID='.$_SESSION['user_id'].';
                        }
                    } else {
                        sessionID='.$_SESSION['user_id'].';
                    }
                    parameter+="&uid="+sessionID;
                    if (sessionID>0) {
                        xmlhttp.send(parameter);
                    }
                }
            }
            if (typeof datuminputGetWvl != "function") {
                function datuminputGetWvl(id,target, htmlId, htmlChange) {
                    var sel = document.getElementById(id);
                    if (!sel) {
                        return;
                    }
                    if (typeof cal_uebernehmen != "function") { cal_uebernehmen= function() {}}
                    if (typeof sel.onchange != "function") { sel.onchange= function() {}}
                    if (typeof window.onload != "function") { window.onload= function() {}}
                    
                    if (htmlId!="" && htmlChange==true) {
                        var htmlElement=document.getElementById(htmlId);
                        if (typeof htmlElement != typeof undefined && htmlElement) {
                            if (typeof htmlElement.onchange != "function") { htmlElement.onchange= function() {}}
                            htmlElement.onchange = (function() {
                                var oldFunction = htmlElement.onchange;
                                return function() {
                                    oldFunction.apply(this, arguments);
                                    datuminputGetWvlRequest("terminstart="+sel.value,target, htmlId);
                                };
                            })();
                            var htmlElement2=document.getElementById(id);
                            if (typeof htmlElement2.onkeyup != "function") { htmlElement2.onkeyup= function() {};}
                            htmlElement2.onkeyup = (function() {
                                var oldFunction = htmlElement2.onkeyup;
                                return function() {
                                    oldFunction.apply(this, arguments);
                                    datuminputGetWvlRequest("terminstart="+sel.value,target, htmlId);
                                };
                            })();
                        }
                    }
                    cal_uebernehmen = (function() {
                        var oldFunction = cal_uebernehmen;
                        return function() {
                            oldFunction.apply(this, arguments);
                            datuminputGetWvlRequest("terminstart="+sel.value,target, htmlId);
                        }
                    })();
                    sel.onchange = (function() {
                        var oldFunction = sel.onchange;
                        return function() {
                            oldFunction.apply(this, arguments);
                            datuminputGetWvlRequest("terminstart="+sel.value,target, htmlId);
                        }
                    })();
                    window.onload = (function() {
                        var oldFunction = window.onload;
                        return function() {
                            oldFunction.apply(this, arguments);
                            datuminputGetWvlRequest("terminstart="+sel.value,target, htmlId);
                        }
                    })();
                    if (sel.value!=="") {
                        datuminputGetWvlRequest("terminstart="+sel.value,target, htmlId);
                    }
                }
            }
            datuminputGetWvl("'.$id.'","datuminputGetWvl_'.$id.'","'.$htmlelement.'", "'.$htmlChange.'");
        ');
        return $return;
    }

    function linkToTab($text, $ziel, $bild='', $abfrage='', $other='',$tabicon=-1, $iconl=false) {
        if ($tabicon>-1 && file_exists('tabs.php') && $_SESSION['widget_tabs'] && $_SESSION['widget_tabs']==true) {
            $onclick='onclick="if (typeof linkToTab == \'function\') { linkToTab(\''.$ziel.'\'); return false; }"';
            $icon='<span class="icon icon-tab">&nbsp;</span>';
            if ($iconl) {
                $icon='<span class="icon icon-l">&nbsp;</span>';
            }
            if ($tabicon==4) {
                if ($bild!='') {
                    if ($bild!='') {
                        if (preg_match('/inc\/Modern/Uis',$bild)) {
                        } else {
                            $bild='bilder/'.$bild;
                        }
                    }
                    $icon='<img src="'.$bild.'" border="0" alt="'.$text.'">';
                }
                return '<a href="javascript:void(0);" '.$onclick.'>'.$icon.'</a>';
            } elseif ($tabicon==3) {
                return $text.'<a href="javascript:void(0);" '.$onclick.'>'.$icon.'</a>';
            } elseif ($tabicon==2) {
                return '<a href="javascript:void(0);" '.$onclick.'>'.$icon.'</a>';
            } elseif($tabicon==1) {
                return link2($text, $ziel, $bild, $abfrage, $other).'<a href="javascript:void(0);" '.$onclick.'>'.$icon.'</a>';
            } else {
                $other.=' '.$onclick;
            }
            return link2($text, 'javascript:void(0);', '', '', $other);
        } else {
            if ($text=='' && $_SESSION['crm_version']>=60) {
                if (preg_match('/stammdaten_liste\.php/i',$ziel)) {
                    $text='<span class="icon icon-l">&nbsp;</span>';
                } else {
                    $text='<span class="icon icon-tab">&nbsp;</span>';
                }
            }
            return link2($text, $ziel, $bild, $abfrage, $other);
        }
    }
    
/**
 * @param $text
 * @param $ziel
 * @param string $bild
 * @param string $abfrage
 * @param string $other
 * @return string
 */
    
    
    
	function link2($text, $ziel, $bild='', $abfrage='', $other='') {
            global $cfg_modern, $entferne_string;
            
            if (preg_match('/handbuch\_suche\.php.*/i',$ziel)) {
                $other='onclick="var fenster=open(\''.$ziel.'\', \'catch_handbuch\', \'height=\'+((window_height/100*75))+\',width=1200, toolbar=no,statusbar=no,location=no,scrollbars=yes\'); fenster.focus();"';
                $ziel='javascript:void(0);';
            }
            
            if ($entferne_string != '') {
                $text = str_replace($entferne_string, '', $text);
            }
            if ($_SESSION['cfg_kunde']=='carlo_koltes') {
                global $phs;
                if (basename($phs)=='stammdaten_suche.php') {
                    $other.=' style="color:#0000BB;font-weight:bold;font-size: 14px;"';
                }
            } 
            
            $modern_zusatz1=$modern_zusatz2='';
            if ($cfg_modern) {
                $aktiv=false;

                if (preg_match('/pfeil_oben/Uis',$bild)) {
                    if ($_SESSION['design_70']) {
                        //$other=Modern_Helper_Html::expandClass($other,'material-icons');
                        $text='<i class="pfeil_oben material-icons">arrow_drop_up</i>';
                        if (preg_match('/\_a/Uis',$bild)) {
                        $aktiv=true;
                         $text='<i class="pfeil_oben material-icons aktive">arrow_drop_up</i>';
                    }
                    } else {
                    //$modern_zusatz1='<span class="sorts">';
                    $other=Modern_Helper_Html::expandClass($other,'sort sort-up');
                    if (preg_match('/\_a/Uis',$bild)) {
                        $aktiv=true;
                         $other=Modern_Helper_Html::expandClass($other,'sort-up-a');
                    }
                    }
                    $bild='';
                }
                if (preg_match('/pfeil_unten/Uis',$bild)) {
                    //$modern_zusatz2='</span>';
                    if ($_SESSION['design_70']) {
                        //$other=Modern_Helper_Html::expandClass($other,'material-icons');
                        $text='<i class="pfeil_unten material-icons">arrow_drop_down</i>';
                        if (preg_match('/\_a/Uis',$bild)) {
                        $aktiv=true;
                         $text='<i class="pfeil_unten material-icons aktive">arrow_drop_down</i>';
                    }
                    } else {
                    $other=Modern_Helper_Html::expandClass($other,'sort sort-down');
                    if (preg_match('/\_a/Uis',$bild)) {
                        $aktiv=true;
                         $other=Modern_Helper_Html::expandClass($other,'sort-down-a');
                    }
                    }
                    $bild='';
                }
            }
            
            $bildclass='';
            if ($bild!='') {
                if (preg_match('/inc\/Modern/Uis',$bild)) {
                } else {
                    $bild='bilder/'.$bild;
                }
            }
            
            
            $is_file=false;
            if (preg_match('/file\:/Uis',$ziel)) {
                $is_file=true;
                $ziel=p4n_mb_string('str_replace',array('file:///','file://','file:/'),'',$ziel);
            }
            
	        if ($is_file || (!empty($_SESSION['cfg_security_level']) &&
                ($_SESSION['cfg_security_level'] == 9 || $_SESSION['cfg_security_level'] == 5 || $_SESSION['cfg_security_level'] == 6 || $_SESSION['cfg_security_level'] == 8))) {
		    if (
			preg_match('/dokumente\//i', $ziel) ||
			preg_match('/Serienbriefe\//i', $ziel) ||
			preg_match('/export\//i', $ziel) ||
			preg_match('/vorlagen\//i', $ziel) ||
			preg_match('/temp\//i', $ziel) ||
			preg_match('/dokumente_korrespondenz\//i', $ziel) ||
            $is_file
            ) {
		       // $ziel='sec_download.php?out='.$ziel.'&p4ntoken='.session_id();
            $ziel = preg_replace('/[\?](.*)/i', '', $ziel);

            $ziel='sec_download.php?out='.$ziel.'';
            return $modern_zusatz1.'<a href="'.$ziel.'" '.($other=='' && !$cfg_modern?'onMouseOver="window.status=\''.$text.'\';return true;" onMouseOut="window.status=\'\';return true;"':$other).(($abfrage!='' and $bild=='')?' onClick="return confirm(\''.$abfrage.'\')"':'').'>'.($bild!=''?'<img src="'.$bild.'" border="0" alt="'.$text.'"'.($abfrage!=''?' onClick="return confirm(\''.$abfrage.'\')"':'').'>':$text).'</a>'.$modern_zusatz2;
		    }
		}
		if (!empty($_SESSION['ajx']) && $_SESSION['ajx']==1) {
			if (preg_match('/\.php/', $ziel) and !preg_match('/_blank/i', $other)) {
				if (preg_match('/target/i', $other)) {
					$other=preg_replace('/target="{0,1}[_a-z]+"{0,1}/i', '', $other);
				}
				$z2=urldecode($ziel);
				$z2=p4n_mb_string('str_replace', "'", '\\\'', $z2);
				if ($z2!=$ziel) {
					$ziel=urlencode($z2);
				}
				return $modern_zusatz1.'<a href="javascript:lade_s(\''.$ziel.'\', \'div_main\');" '.($other==''?'onMouseOver="window.status=\''.$text.'\';return true;" onMouseOut="window.status=\'\';return true;"':$other).(($abfrage!='' and $bild=='')?' onClick="return confirm(\''.$abfrage.'\')"':'').'>'.($bild!=''?'<img class="'.$bildclass.'" src="'.$bild.'" border="0" alt="'.$text.'"'.($abfrage!=''?' onClick="return confirm(\''.$abfrage.'\')"':'').'>':$text).'</a>'.$modern_zusatz2;
			} else {
                return $modern_zusatz1.'<a href="'.$ziel.'" '.($other=='' && !$cfg_modern?'onMouseOver="window.status=\''.$text.'\';return true;" onMouseOut="window.status=\'\';return true;"':$other).(($abfrage!='' and $bild=='')?' onClick="return confirm(\''.$abfrage.'\')"':'').'>'.($bild!=''?'<img class="'.$bildclass.'" src="'.$bild.'" border=0 alt="'.$text.'"'.($abfrage!=''?' onClick="return confirm(\''.$abfrage.'\')"':'').'>':$text).'</a>'.$modern_zusatz2;
			}
		} else {
			if ($_SESSION['cfg_kunde']=='crm_sensus') {
				$xpl=explode('/', $ziel);
				$ziel2=$xpl[count($xpl)-1];
				if (!preg_match('/=/', $ziel2) and !preg_match('/\?/', $ziel2) and !preg_match('/\;/', $ziel2) and !preg_match('/\(/', $ziel2)) {
					$ziel=p4n_mb_string('str_replace', $ziel2, rawurlencode($ziel2), $ziel);
				}
			}
            /*TT: 10.07.2017 Netzwerkfreigabe für den Server klären.
            if (substr($ziel, 0, 2) == '\\\\') {
                $ziel = preg_replace('/[\?](.*)/i', '', $ziel);
                $ziel='sec_download.php?out='.$ziel.'';
                return $modern_zusatz1.'<a href="'.$ziel.'" '.($other=='' && !$cfg_modern?'onMouseOver="window.status=\''.$text.'\';return true;" onMouseOut="window.status=\'\';return true;"':$other).(($abfrage!='' and $bild=='')?' onClick="return confirm(\''.$abfrage.'\')"':'').'>'.($bild!=''?'<img src="'.$bild.'" border="0" alt="'.$text.'"'.($abfrage!=''?' onClick="return confirm(\''.$abfrage.'\')"':'').'>':$text).'</a>'.$modern_zusatz2;
            }*/
            return $modern_zusatz1.'<a href="'.$ziel.'" '.($other=='' && !$cfg_modern?'onMouseOver="window.status=\''.$text.'\';return true;" onMouseOut="window.status=\'\';return true;"':$other).(($abfrage!='' and $bild=='')?' onClick="return confirm(\''.$abfrage.'\')"':'').'>'.($bild!=''?'<img class="'.$bildclass.'" src="'.$bild.'" border=0 alt="'.$text.'"'.($abfrage!=''?' onClick="return confirm(\''.$abfrage.'\')"':'').' />':$text).'</a>'.$modern_zusatz2;
		}
	}

/**
 * @param $id
 * @param $text
 * @param array $sql_param
 * @param string $bild
 * @param string $abfrage
 * @param string $other
 * @param bool|false $trenne
 * @return array|string
 */
function link3($id, $text, $sql_param = array('pfad' => 'stammdaten_liste.php', 'sql' => '', 'sqlnc' => 0, 'sw' => _TEMPFILTER_), $bild='', $abfrage='', $other='', $trenne=false) {
	    global $cfg_modern;

        $modern_zusatz1=$modern_zusatz2='';
        if ($cfg_modern) {
            if (preg_match('/pfeil_oben/Uis',$bild)) {
                $modern_zusatz1='<span class="sorts">';
                $other=Modern_Helper_Html::expandClass($other,'sort sort-up');
                $bild='';
            }
            if (preg_match('/pfeil_unten/Uis',$bild)) {
                $modern_zusatz2='</span>';
                $other=Modern_Helper_Html::expandClass($other,'sort sort-down');
                $bild='';
            }
        }
	    $sql = $sql_param['sql'];
	    $pfad = ($sql_param['pfad']) ? $sql_param['pfad'] : 'stammdaten_liste.php';
	    $sqlnc = intval($sql_param['sqlnc']);
	    $sw = ($sql_param['sw']) ? $sql_param['sw'] : _TEMPFILTER_;
            
            
            $form = new htmlform();
            $returnwert=$form->start('linkp4nID'.$id, $pfad, 'POST', false, 'class="form_link3" style="display:inline;"', false, false);
            //$returnwert='<form  id="" name="linkp4nID'.$id.'" action="'.$pfad.'" method="post" >';
	    $returnwert.= $form->hidden('sw', $sw);
            $sql = p4n_mb_string('str_replace', array('"', '%'), array("'", '___PROZ___'), $sql); 
            $returnwert.= $form->hidden('sql', $sql);
            $returnwert.= $form->hidden('sqlnc', $sqlnc);
            $returnwert.= $form->hidden('sqlp', '1');
            //$returnwert.='</form>';
             $returnwert.=$form->ende();
            
            if ($trenne) {$returnarray=array();$returnarray[0]=$returnwert;$returnwert='';}
            $returnwert.=$modern_zusatz1.'<a href="javascript: document.linkp4nID'.$id.'.submit();" '.($other==''?'onMouseOver="window.status=\''.$text.'\';return true;" onMouseOut="window.status=\'\';return true;"':$other).(($abfrage!='' and $bild=='')?' onClick="return confirm(\''.$abfrage.'\')"':'').'>'.($bild!=''?'<img src="bilder/'.$bild.'" border=0 alt="'.$text.'"'.($abfrage!=''?' onClick="return confirm(\''.$abfrage.'\')"':'').'>':$text).'</a>'.$modern_zusatz2;
            if ($trenne) {$returnarray[1]=$returnwert;return $returnarray;}

	    return $returnwert;	
	}

/**
 * @param $id
 * @param $text
 * @param $pfad
 * @param array $sql_param
 * @param string $bild
 * @param string $abfrage
 * @param string $other
 * @param bool|false $trenne
 * @param string $target
 * @param string $type
 * @return array|string
 */
        function link4($id, $text, $pfad, $sql_param = array(), $bild='', $abfrage='', $other='', $trenne=false, $target='', $type='a') {
            $form = new htmlform();
            $target=p4n_mb_string('str_replace',array('target="','"'),'',$target);
            $returnwert=$form->start('linkp4nID'.$id, $pfad, 'POST', false, 'class="form_link4" style="display:inline;"'.(($target!='')?' target="'.$target.'"':''), false, false);
            
            $returnwert.= $form->hidden('linkp4nID'.$id, '1');
            
            if (is_array($sql_param)) {
                foreach ($sql_param as $key => $val) {
                    if ($key=='sql2' || $key=='sql') {
                        $val=p4n_mb_string('str_replace', array('"', '%'), array("'", '___PROZ___'), $val);
                    }
                    $returnwert.= $form->hidden($key, $val);
                }
            }
          
            $returnwert.=$form->ende();
            
            if ($trenne) {$returnarray=array();$returnarray[0]=$returnwert;$returnwert='';}
            if ($type=='a') {
                $returnwert.='<a href="javascript: document.linkp4nID'.$id.'.submit();" '.($other==''?'onMouseOver="window.status=\''.$text.'\';return true;" onMouseOut="window.status=\'\';return true;"':$other).(($abfrage!='' and $bild=='')?' onClick="return confirm(\''.$abfrage.'\')"':'').'>'.($bild!=''?'<img src="bilder/'.$bild.'" border=0 alt="'.$text.'"'.($abfrage!=''?' onClick="return confirm(\''.$abfrage.'\')"':'').'>':$text).'</a>';
            }
            if ($type=='input') {
                $returnwert.='<input value="'.$text.'" type="button" onclick="javascript: document.linkp4nID'.$id.'.submit();" '.($other==''?'onMouseOver="window.status=\''.$text.'\';return true;" onMouseOut="window.status=\'\';return true;"':$other).' '.($bild!=''?'src="bilder/'.$bild.'"':'').'/>';
            }
            
            if ($trenne) {$returnarray[1]=$returnwert;return $returnarray;}

	    return $returnwert;	
	}

/**
 * @param string $linktext
 * @param string $mail
 * @param string $subject
 * @param string $body
 * @return string
 */
    function linkMailTo($linktext='LINK',$mail='', $subject='', $body='') {
        $returnwert = '';
        $body=p4n_mb_string('utf8_encode', $body);
        $body=rawurlencode($body);
        $body=p4n_mb_string('substr', $body, 0, 1900);

        $sMailto = 'mailto:' . $mail . '?subject=' . $subject . '&body=' . $body;
        $error='alert(\'Could not perform this operation because the default mail client is not properly installed\');';
        $returnwert.='<a href="javascript:" onClick="try{document.location.href =\'' . $sMailto . '\'} catch(e) {'.$error.'}" >' . $linktext . '</a>';
        return $returnwert;
    }

	function kopf_pda() {
		echo "<html>\n<head><title>"._TITEL."</title><LINK rel=\"stylesheet\" href=\"style_pda.css\">\n</head><body>\n";
		echo '<div class="header_prog">webCRM.4Net 3.0 - Prof4Net GmbH ';
		echo '&nbsp;'.link2('X', 'logout.php').'</span></div>';
	}

/**
 * prepares an html page
 */
	function kopf() {
		global $phs, $formabfrage, $cfg_stammdaten_bemerkung_htmleditor, $cfg_body_zusaetze, $kopf_ja, $cfg_callcenter, $cfg_basedir, $ohne_yahoo, $cfg_neustyle, $cfg_opos, $cfg_benutzer_style, $mit_jquery, $mit_formabfrage, $cfg_doctype, $ol, $echoscripts,$cfg_modern, $cfg_modern_secure,$cfg_manifest,$modernlayout, $cfg_vw, $carlo_tw,$cfg_check_zeitinput;

        $echoscripts=(!isset($echoscripts) || $echoscripts==true) ? true : false;
		$kopf_ja=true;
		
		if (isset($_GET['ajax']) or isset($_POST['ajax'])) {
			return;
		}
		
		$stiln1='';
		$stiln2=$cfg_basedir.(isset($_SESSION['stil'])?$_SESSION['stil']:'style.css');
		
		if ($cfg_neustyle && $echoscripts) {
			unset($cfg_benutzer_style['style_hellbraun.css']);
			unset($cfg_benutzer_style['style_okka.css']);
			unset($cfg_benutzer_style['style_hellblau.css']);
			
			if (isset($_SESSION['stil'])) {
				if (preg_match('/style(.*)\.css/i', $_SESSION['stil'], $sma1)) {
					$stiln1=$sma1[1];
					if (is_file($cfg_basedir.'style'.$stiln1.'_n.css')) {
						$stiln2=$cfg_basedir.'style'.$stiln1.'_n.css';
					}
					if (!is_file($cfg_basedir.'css/carlocrm'.$stiln1.'.css')) {
						$stiln1='';
					}
				}
			}
            if (empty($stiln1)) {
                $stiln1='';
                $_SESSION['stil']='style'.$stiln1.'.css';
                if (is_file($cfg_basedir.'style'.$stiln1.'_n.css')) {
                    $stiln2=$cfg_basedir.'style'.$stiln1.'_n.css';
                }
            }
		}
		
        if (($_GET['druckoptimierung']=='1' or $_POST['druckoptimierung']=='1')&& $cfg_modern) {
            $_GET['options_padding']='0';
            $_GET['options_menu']='0';
        }

        if ($cfg_modern && !$_SESSION['design_70']) {
            $modern_Template_StructureDoctype_class = new Modern_Template_StructureDoctype();
            echo $modern_Template_StructureDoctype_class->getHtml();
            if ($cfg_manifest==true) {
                echo '<html manifest="./crm.appcache">';
            } else {
                echo '<html>';
            }
            echo '<head>';
        } else {
            if (isset($cfg_doctype) and p4n_mb_string('strlen', $cfg_doctype)>0) {
                echo $cfg_doctype;
            } else {
                echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">';
            }
            echo '<html><head>';
        }
		
        if ($cfg_neustyle && $echoscripts && !$cfg_modern) {
            echo "<title>".($cfg_opos?'OPOS':_TITEL)."</title>
            <link rel=\"icon\" href=\"favicon.ico\" type=\"image/x-icon\">
            <link rel=\"stylesheet\" href=\"".$cfg_basedir."css/fenster.css\" media=\"screen\" type=\"text/css\"/>
            <link rel=\"stylesheet\" href=\"".$cfg_basedir."style_print.css\" media=\"print\" type=\"text/css\"/>
            <LINK rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"".$stiln2."\">";

            if ($stiln1=='') {
                $stiln1='_grau';
            }
            echo '<link href="css/carlocrm'.$stiln1.'.css?t='.time().'" rel="stylesheet" type="text/css" /><link href="css/content'.$stiln1.'.css?t='.time().'" rel="stylesheet" type="text/css" />';
        }
	
        if (($_GET['druckoptimierung']=='1' or $_POST['druckoptimierung']=='1') && !$cfg_modern) {
            echo '<STYLE>
			table {border: 1px solid #94948A; border-collapse: collapse; text-align: center; vertical-align: top; width: 100%; padding:1pt; font-size: 10px;}
			td {border-bottom: 0px dotted white; text-align: left; padding: 1px;}
			th { border: 0; background-color: #FFFFFF; text-align: left; padding: 1px;}
			table.hori {width: 100%; border: 1px solid #94948A; border-collapse: collapse; vertical-align: top; padding:1pt; font-size: 10px;}
			table.hori td {border: 1px dotted black; border-style: dotted; border-right: 1px dotted #94948A; padding:1pt; font-size: 10px;}
			table.hori th {border-bottom: 1px dashed #94948A; background-color: #FFFFFF; padding:1pt; font-size: 10px;}
			form {font-size: 10px;}
			INPUT, SELECT, TEXTAREA { font-size: 10px;}
            </STYLE>';
        }
	
        if ($cfg_modern && $echoscripts) {
            if (!$_SESSION['design_70']) {
                $modern_Template_StructureMeta_class = new Modern_Template_StructureMeta();
                echo $modern_Template_StructureMeta_class->getHtml();
            
                $modern_Template_StructureCss_class = new Modern_Template_StructureCss();
                echo $modern_Template_StructureCss_class->getHtml();
            
                $modern_Template_StructureJs_class = new Modern_Template_StructureJs('content');
                echo $modern_Template_StructureJs_class->getHtml();
            } else {
  
                //lade dann hier zusätzliche js/css dateien wie jqplot oder farbconf wenn benötigt
                $modern_Template_StructureJs_class = new Modern_Template_StructureJs('seperate');
                echo $modern_Template_StructureJs_class->getHtml();

                $modern_Template_StructureCss_class = new Modern_Template_StructureCss(false,'seperate');
                echo $modern_Template_StructureCss_class->getHtml();
            }
        }
	
        if ($echoscripts) {
	if (preg_match('/stammdaten_liste\.php/', $phs)) {
		echo '<script type="text/javascript">
		function testef() {
			var geaendert=false;
			
			for (i=0; i<document.forms.length; i++) {
				for (j=0; j<document.forms[i].elements.length; j++) {
					if (document.forms[i].elements[j].type=="checkbox") {
						if (document.forms[i].elements[j].name.substring(0,4)=="weg[") {
							if ((document.forms[i].elements[j].checked && document.forms[i].elements["wegalt["+document.forms[i].elements[j].name.substring(4)].value=="0") || (!document.forms[i].elements[j].checked && document.forms[i].elements["wegalt["+document.forms[i].elements[j].name.substring(4)].value=="1")) {
//								alert("ungleich"+document.forms[i].elements[j].name+" --- wegalt"+document.forms[i].elements[j].name.substring(4));
								geaendert=true;
							}
						}
					}
				}
			}
			if (geaendert) {';
                if ($_SESSION['crm_version']<65) {        
                    echo 'alert("'._LISTEHINWEIS_HAKEN_.'");';
                    echo 'return false;';
                }
        echo '}
			return true;
		}
			</script>';
	} elseif ($mit_formabfrage or ($_SESSION['ajx']==1 or ($formabfrage and (preg_match('/main/', $phs) or preg_match('/stammdaten\.php/', $phs)) and $_SESSION['karte']!='Uebersicht' and $_SESSION['karte']!='Korrespondenz'))) {
                echo '<script type="text/javascript">
                  
                    var ffeld=new Array();
                    var nicht=false;
                    var geladen=false;

                    function updateElement_a() {
                        try {
                        var allDivs=document.getElementsByTagName("a"), i=0,d;
                        var href="";
                        while(d=allDivs[i++]){
                            href=(d && d.attributes["href"] && d.attributes["href"].value!="") ? d.attributes["href"].value : "";
                            if(href!=""){
                                if (href.indexOf(".php")!==-1) {
                                    d.addEventListener("click", testef, false);
                                }
                            }
                        } 
                        } catch(e) {}
                        

                        try {allDivs=parent.menu.document.getElementsByTagName("a"), i=0,d;} catch(e) {
                        try {allDivs=parent.parent.menu.document.getElementsByTagName("a"), i=0,d;} catch(e) {}
                        }
                        try {
                        while(d=allDivs[i++]){
                            href=(d && d.attributes["href"] && d.attributes["href"].value!="") ? d.attributes["href"].value : "";
                            if(href!=""){
                                if (href.indexOf(".php")!==-1) {
                                    d.addEventListener("click", testef, false);
                                }
                            }
                        }
                        } catch(e) {}
                        

                        
                        try {var allDivs=parent.menu.document.getElementsByTagName("option"), i=0,d; } catch(e) {
                        try {var allDivs=parent.parent.menu.document.getElementsByTagName("option"), i=0,d; } catch(e) {}
                        }
                        try {
                        while(d=allDivs[i++]){
                            href=(d && d.attributes["href"] && d.attributes["href"].value!="") ? d.attributes["href"].value : "";
                            if(href!=""){
                                if (href.indexOf(".php")!==-1) {
                                    d.addEventListener("click", testef, false);
                                }
                            }
                        }
                        } catch(e) {}
                    }

                    function startef() {
                        if (geladen==true) {
                                merkef();
                        } else {
                                setTimeout("startef()", 100);
                        }
                    }

                    function merkef() {
                        if (navigator.appName!="Microsoft Internet Explorer") { 
                        document.body.addEventListener("click", updateElement_a, false);
                        try {parent.menu.document.body.addEventListener("click", updateElement_a, false);} catch(e) {
                        try {parent.parent.menu.document.body.addEventListener("click", updateElement_a, false);} catch(e) {}
                        }
                        }

                        var allforms=document.getElementsByTagName("form"), i=0,d;
                        ffeld=new Array();
                        while(d=allforms[i++]){
                            if (typeof d.attributes["name"] != typeof undefined) {
                                var formname=d.attributes["name"].value;
                                if (formname=="menuform") {
                                         continue;
                                }
                                for (j=0; j<document.forms[formname].elements.length; j++) {
                                    if (document.forms[formname].elements[j].type=="checkbox") {
                                    if (!ffeld[formname]) {ffeld[formname]=new Array();}
                                        ffeld[formname][j]=document.forms[formname].elements[j].checked;
                                    } else {
                                     if (!ffeld[formname]) {ffeld[formname]=new Array();}
                                        ffeld[formname][j]=document.forms[formname].elements[j].value;
                                    }
                                }
                            }
                        }
                    }


                    function testef() {
                            var allforms=document.getElementsByTagName("form"), i=0,d;
                            var isie=(navigator.appName=="Microsoft Internet Explorer") ? true : false;
                            var g=0;
                            var x=0;
                            var geaendert=false;
                            var cgi="";
                            var ch_f=new Array();
                            var ewert="";
                            while(d=allforms[i++]){
                                if (typeof d.attributes["name"] != typeof undefined) {
                                    var formname=d.attributes["name"].value;
                                    if (formname=="menuform") {
                                            continue;
                                    }
                                    if (ffeld[formname]) {
                                    for (j=0; j<document.forms[formname].elements.length; j++) {
                                            var testname=document.forms[formname].elements[j].getAttribute("name");
                                            if (typeof testname == "string" && testname=="") {
                                                continue;
                                            }
											if (typeof testname == "string" && testname=="submit_bd") {
												continue;
											}
                                            if (document.forms[formname].elements[j].type=="checkbox") {
                                                    if (document.forms[formname].elements[j].checked!=ffeld[formname][j]) {
                                                            geaendert=true;
                                                            ch_f[x]=true;
                                                            g++;
                                                    }
                                                    if (document.forms[formname].elements[j].checked)
                                                    cgi+=document.forms[formname].elements[j].name+"="+escape(document.forms[formname].elements[j].value)+"&";
                                            } else if (ffeld[formname][j]!=document.forms[formname].elements[j].value) {
                                                    if (document.forms[formname].elements[j].name!="pzauswahl" && document.forms[formname].elements[j].name!="fzauswahl" && document.forms[formname].elements[j].name!="filterdatum_start" && document.forms[formname].elements[j].name!="filterdatum_ende") {
                                                            ch_f[x]=true;
                                                            geaendert=true;
                                                            g++;
                                                            ewert=escape(document.forms[formname].elements[j].value);
                                                            ewert=ewert.replace(/\+/g, "%2B");
                                                            cgi+=document.forms[formname].elements[j].name+"="+ewert+"&";
                                                    }
                                            } else {
                                                    ewert=escape(document.forms[formname].elements[j].value);
                                                    ewert=ewert.replace(/\+/g, "%2B");
                                                    cgi+=document.forms[formname].elements[j].name+"="+ewert+"&";
                                            }
                                            x++;
                                    }
                                    }
                                }
                            }


                            if (geaendert && !nicht) {
                                try {
                                    e=confirm("'._SWECHSEL_FRAGE_.'");
                                    if (e) {
                                        if (typeof p4ntoken == "undefined") {p4ntoken="";}
                                        var xmlhttp;
                                        try { xmlhttp = new XMLHttpRequest(); } catch (error) {
                                                try { xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); } catch (error) { return false;	}
                                        }

                                        xmlhttp.open("POST", '.($_SESSION['ajx']==1?'"stammdaten_main.php"':'location.pathname').', false);
                                            
                                        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                        xmlhttp.setRequestHeader("X-Requested-With", "XMLHttpRequest");
                                        
                                        xmlhttp.onreadystatechange=function() { 
                                            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                                                if (typeof getNewToken == "function") {
                                                    p4ntoken=getNewToken(xmlhttp.getResponseHeader("p4ntoken")); 
                                                }
                                            } 
                                        };
					xmlhttp.send(cgi);
                                       // response=xmlhttp.responseText;
                                       
                                       if (isie) return "";
                                    } else {
                                        if (isie) return "";
                                    }
                                } catch(e) {
                                }
                            }
                            if (isie) {  return ""; }
                    }


                    function submitx() {
                            nicht=true;
                    }
                    
		</script>';
	}	else {
		echo '
		    <script type="text/javascript">
		    function submitx() {
			nicht=true;
		}
		</script>';
	}
        }

        if ($echoscripts && !$cfg_modern)
		echo '<link rel="stylesheet" href="'.$cfg_basedir.'css/calendar.css" type="text/css">';
	
	if ($ohne_yahoo) {
	
	} else {
            if ($echoscripts && !$cfg_modern) {
	echo '<script type="text/javascript" src="'.$cfg_basedir.'js/YAHOO.js"></script>
	<script type="text/javascript" src="'.$cfg_basedir.'js/dom.js" ></script>
	<script type="text/javascript" src="'.$cfg_basedir.'js/event.js" ></script>
	<script type="text/javascript" src="'.$cfg_basedir.'js/calendar.js"></script>';
//	<script type="text/javascript" src="'.$cfg_basedir.'js/Calendar2up_DE.js"></script>';
	$replacement = array(
	   '{weekdays_short}',
	   '{months_long}',
	   );
	$with_replacement = array(
	   '["'._TAG_ABKUERZUNG1_.'", "'._TAG_ABKUERZUNG2_.'", "'._TAG_ABKUERZUNG3_.'", "'._TAG_ABKUERZUNG4_.'", "'._TAG_ABKUERZUNG5_.'", "'._TAG_ABKUERZUNG6_.'", "'._TAG_ABKUERZUNG7_.'"]',
	   '["'._MONAT1_.'", "'._MONAT2_.'", "'._MONAT3_.'", "'._MONAT4_.'", "'._MONAT5_.'", "'._MONAT6_.'", "'._MONAT7_.'", "'._MONAT8_.'", "'._MONAT9_.'", "'._MONAT10_.'", "'._MONAT11_.'", "'._MONAT12_.'"]',
	);
	echo '<script>'.p4n_mb_string('str_replace', $replacement, $with_replacement, file_get_contents($cfg_basedir.'js/Calendar2up_DE.js')).'</script>';
            }
	}
	    if ($echoscripts) {
	echo javas('var cal1;
			var f_elem;
			
			var mausx;
			var mausy;
			
			if (\''.preg_match('/Chrome/i', $_SERVER["HTTP_USER_AGENT"]).'\' == true ) {
                            var orgOpen = window.open;
                            window.open = function (url, windowName, windowFeatures) {
                                if (windowName==\'status\') {
                                    win2=orgOpen(url, windowName, windowFeatures);
                                    win2.blur();
                                    window.focus();
                                } else {
                                    return orgOpen(url, windowName, windowFeatures);
                                }
                            }
			}
			function escapeP4n(s) {
                s = s.replace(/\'/g, "nafuhrungs");
                s = s.replace(/\\\/g, "bockslsh");
                s = s.replace(/\_/g, "intstrihc");
                return "p4nn4p"+encodeURIComponent(s);
            }
			function mausklick(e, docel) {
				if (e.pageX || e.pageY) {
			        mausx = e.pageX;
			        mausy = e.pageY;
			    } else if (e.clientX || e.clientY) {
			        mausx = e.clientX + document.body.scrollLeft + docel.scrollLeft;
			        mausy = e.clientY + document.body.scrollTop + docel.scrollTop;
			    }
			}
			'.(($cfg_modern)?'':'
			function cal_uebernehmen() {
				var datum1 = cal1.getSelectedDates()[0];
				d=datum1.getDate().toString();
				if (d.length==1) {
					d="0"+d;
				}
				m=datum1.getMonth()+1;
				m=m.toString();
				if (m.length==1) {
					m="0"+m;
				}
				ges=d+"."+m+"."+datum1.getFullYear();
				f_elem.value=ges;
				cal1.oDomContainer.style.display = "none";
				delete cal1;
				l=document.getElementById("kalenderdiv1");
				l.innerHTML="";
				ifr=document.getElementById("kalenderdiv1if");
				ifr.style.left = "-2000px";
				tm = setTimeout("nicht=false" , 1000);
                if (cal1.valsm) {
                    if (typeof valsmcurrent == "function") {
                        valsmcurrent(f_elem,"datum");
                    }
                }
			}
			function hideCalendar1() {
				cal1.oDomContainer.style.display = "none";
				delete cal1;
				l=document.getElementById("kalenderdiv1");
				l.innerHTML="";
				ifr=document.getElementById("kalenderdiv1if");
				ifr.style.left = "-2000px";
				nicht=false;
			}
			function showCalendar1(formname, elemname, valsm) {
				link1=document.getElementById("sc_"+formname+"."+elemname);
				f_ele=document.forms[formname].elements[elemname].value;
				m_fe=f_elem;
				f_elem=document.forms[formname].elements[elemname];
				
				if (cal1!=null) {
					cal1.oDomContainer.style.display = "none";
					delete cal1;
					l=document.getElementById("kalenderdiv1");
					l.innerHTML="";
					ifr=document.getElementById("kalenderdiv1if");
					ifr.style.left = "-2000px";
					
					if (f_elem==m_fe) {
						f_elem="";
						return false;
					}
				}
				
				vorg="";
				if (f_ele!="") {
					w=f_ele.split(".");
					if (w.length==3) {
						if (w[1].charAt(0)=="0") {
							w[1]=w[1].charAt(1);
						}
						vorg=w[1]+"/"+w[2];
					}
				}
				
				if (vorg!="") {
					cal1 = new YAHOO.widget.Calendar2up_DE_Cal("cal1","kalenderdiv1", vorg);
				} else {
					cal1 = new YAHOO.widget.Calendar2up_DE_Cal("cal1","kalenderdiv1");
				}
			//	cal1.addRenderer("1/1,1/6,5/1,8/15,10/3,10/31,12/25,12/26", cal1.pages[0].renderCellStyleHighlight1);
                cal1.valsm=valsm;
                cal1.onSelect=cal_uebernehmen;
				cal1.render();
				
				xp=link1.width+10;
				yp=link1.height-'.($cfg_callcenter?'200':'60').';
				el=link1;
				while(el){
					xp+=el.offsetLeft;
					yp+=el.offsetTop;
					el=el.offsetParent;
				}
				
				if (mausx>0) {
					xp=mausx;
				}
				if (mausy>0) {
					yp=mausy-60;
				}
				
				if (yp<0) {
					yp=0;
				}
				
				ifr=document.getElementById("kalenderdiv1if");
				ifr.style.left = xp + "px";
				ifr.style.top = yp + "px";
				l=document.getElementById("kalenderdiv1");
				
				cal1.oDomContainer.style.left = xp + "px";
				cal1.oDomContainer.style.top = yp + "px";
				cal1.oDomContainer.style.display="block";
				
				ifr.style.width = l.offsetWidth;
				ifr.style.height = l.offsetHeight;
				
//				nicht=false;
				
			}
			').'
			function ti1(ti_el) {
				ti_el.className = "eingabe_aktiv";
			}
			function ti2(ti_el) {
				ti_el.className = "eingabe_inaktiv";
			}
			
			');
                }
   
            if ($_SESSION['crm_version']>63 || $cfg_check_zeitinput || ($carlo_tw && $cfg_vw)) {
            echo javas('
                if (typeof check_zeitinput == "undefined") {
                    function check_zeitinput(input) {
                        if (input) {
                            var val=input.value;
                            var name=input.name.replace(/\[.*\]/,"");
                            if (name!="") {
                                if (name.substr(name.length-1, 1)==2) {
                                    if (input && val!="") {
                                        var matches = val.match(/^-?[0123456789]+$/);
                                        if (matches) {
                                            var res = val.substring(0, 1);
                                            if (res==0  && val.length>1) {val=val.substring(1, 2)}
                                            val=(val<0)?0:val;
                                            val=(val>59)?59:val;
                                        } else {
                                            val=0;
                                        }
                                        try {
                                            var prev=input.previousSibling.previousSibling.value;
                                            if (prev && prev==24) {
                                                val=0;
                                            }
                                        } catch(e){}
                                        val=(val<10)?"0"+val:val;
                                        input.value=val;
                                    }
                                } else {
                                    if (input &&  val!="") {
                                        var matches = val.match(/^-?[0123456789]+$/);
                                        if (matches) {
                                            var res = val.substring(0, 1);
                                            if (res==0 && val.length>1) {val=val.substring(1, 2)}
                                            val=(val<0)?0:val;
                                            val=(val>24)?24:val;
                                        } else {
                                            val=0;
                                        }
                                        try {
                                            var next=input.nextSibling.nextSibling.value;
                                            if (next && val==24 && next>0) {
                                                val=val-1;
                                            }
                                        } catch(e){}
                                        val=(val<10)?"0"+val:val;
                                        input.value=val;
                                    }
                                }
                            }
                        }
                    }
                }
                
                if (typeof valsmcurrent == "undefined") {
                    function valsmcurrent(element, art) {
                        function isobj(element) {
                            if (typeof element==="object" && element.nodeType===1) {
                                return true;
                            }
                            return false;
                        }
                        function cattr(e,a,w) {
                            if (e.getAttribute("data-info") && e.getAttribute(a).indexOf(w)!== -1) {
                                return true;
                            }
                            return false;
                        }
                        function z(w) {
                            return parseInt(w);
                        }
                        function s(w) {
                            return w+"";
                        }
                        function ad(w) {
                            w=s(w);
                            var res = w.substring(0, 1);
                            if (res==0  && w.length>1) {w=w.substring(1, 2);}
                            return ((z(w)<10)?"0"+w:w);
                        }
                        function datuminput(input,w) {
                            var datumok=true;
                            var datumfeld=null;
                            if (w==1 && isobj(input)) {
                                datumfeld=input.previousSibling.previousSibling;
                            } 
                            if (w==2 && isobj(input)) {
                                datumfeld=input.previousSibling.previousSibling.previousSibling.previousSibling;
                            }
                            if (isobj(datumfeld) && cattr(datumfeld,"data-info","datuminput")) {
                                var datumfeld_val=datumfeld.value;
                                if (datumfeld_val=="") {
                                    datumfeld.value=ad(a.getDate())+"."+ad(a.getMonth()+1)+"."+a.getFullYear();
                                }
                                if (datumfeld_val!="") {
                                    var res = datumfeld_val.split("."); 
                                    if (res && res.length==3) {
                                        var a2 = new Date (res[2],res[1]-1,res[0]);
                                        if (a && a2 && a2.getTime() > a.getTime()) {
                                            datumok=false;
                                        }
                                    }
                                }
                            }
                            return datumok;
                        }
                        if (art=="datum" && element) {
                            var value=element.value;
                            if (value != "") {
                                var datum1 = new Date(); 
                                var res = value.split("."); 
                                if (res && res.length==3) {
                                    var datum2 = new Date (res[2],res[1]-1,res[0]);
                                    if (datum1 && datum2 && datum2.getTime() < datum1.getTime()) {
                                        d=datum1.getDate().toString();
                                        if (d.length==1) {
                                            d="0"+d;
                                        }
                                        m=datum1.getMonth()+1;
                                        m=m.toString();
                                        if (m.length==1) {
                                            m="0"+m;
                                        }
                                        ges=d+"."+m+"."+datum1.getFullYear();
                                        element.value=ges;
                                    }
                                }
                                var zeitinput1=element.nextSibling.nextSibling;
                                if (isobj(zeitinput1) && cattr(zeitinput1,"data-info","zeitinput")) {
                                    valsmcurrent(zeitinput1,"zeit");
                                }
                            }
                        }
                        if (art=="zeit" && element) {
                            var val=element.value;
                            if (val!="") {
                                var name=element.name;
                                if (name!="") {

                                    var a = new Date(); 
                                    var h = a.getHours();
                                    var m = a.getMinutes();

                                    if (name.substr(name.length-1, 1)==2) {
                                        if (datuminput(element,2)==true) {
                                            var res = val.substring(0, 1);
                                            if (res==0  && val.length>1) {
                                                val=val.substring(1, 2);
                                            }
                                            var preve=element.previousSibling.previousSibling;
                                            if (isobj(preve) && cattr(preve,"data-info","zeitinput")) {
                                                var prev=preve.value;
                                                if (prev=="") {
                                                    prev=ad(h);
                                                    preve.value=prev;
                                                }
                                                if (prev!="") {
                                                    if (z(ad(prev)+""+ad(val)) >= z(ad(h)+""+ad(m))) {
                                                        return;
                                                    }
                                                }
                                            }
                                            if (z(val)<z(m)) {
                                               element.value=ad(m); 
                                            }
                                        }
                                    } else {
                                        if (datuminput(element,1)==true) {
                                            var res = val.substring(0, 1);
                                            if (res==0 && val.length>1) {
                                                val=val.substring(1, 2)
                                            }
                                            var next="";
                                            var nexte=element.nextSibling.nextSibling;
                                            if (isobj(nexte) && cattr(nexte,"data-info","zeitinput")) {
                                                next=nexte.value;
                                                if (next=="") {
                                                    if (z(val)<=z(h)) {
                                                        next=ad(m);
                                                        nexte.value=next;
                                                    } else {
                                                        nexte.value=ad(0);
                                                    }
                                                }
                                                if (next!="") {
                                                    if (z(ad(val)+""+ad(next)) >= z(ad(h)+""+ad(m))) {
                                                        return;
                                                    }
                                                }
                                            }
                                            if (z(val)<z(h)) {
                                               val=ad(h)
                                               element.value=val; 
                                            }
                                            if (next!="") {
                                                if (z((ad(val)+""+ad(next))) < z((ad(h)+""+ad(m)))) {
                                                    nexte.value=ad(m);
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            ');
        }

        if (!$_SESSION['design_70']) {        
        echo "</head>";
        }

        if ($cfg_modern) {
            $modern_Template_StructureContentStart_class = new Modern_Template_StructureContentStart();
            echo $modern_Template_StructureContentStart_class->getHtml();
        } else {
		echo "\n<body ID=\"crm_body\" ".$cfg_body_zusaetze;
		if ($mit_formabfrage or (!($_SESSION['ajx']==1) and $formabfrage and (preg_match('/main/', $phs) or preg_match('/stammdaten\.php/', $phs)) and $_SESSION['karte']!='Uebersicht')) {
			echo " onLoad=\"javascript: if (typeof startef == 'function') {startef()}\"  onbeforeunload=\"javascript: if (navigator.appName=='Microsoft Internet Explorer') {var x=testef(); if (x!='') {return x;} }\"  "; 
		}
		//'.($cfg_stammdaten_bemerkung_htmleditor?' && document.forms[i].elements[j].name!=""':'').'
//		echo ' onKeyPress="KeyEvents(event)"';
		
		if (preg_match('/suche/', $phs) or preg_match('/hilfe\.php/', $phs)) {
			echo ' class="suche"';
		}
		// onUnload=\"return false\"
		//testef(); 
		echo ">\n";
        }
        if ($cfg_modern_secure==true) {
            $menu='menu'.(($_SESSION['isdn']==1)?'2':'').'.php';
            echo javas('try {parent.document.getElementsByTagName("frameset")[0].rows="26,*,50"; topmenu.location.href="'.$menu.'";} catch(e) {}');
        }
        if ($cfg_modern && !$cfg_modern_secure) {
            echo javas('try {var url=topmenu.location.href; if (url.indexOf("menu4") === -1) {parent.document.getElementsByTagName("frameset")[0].rows="70,*,0"; topmenu.location.href="menu4.php";} }catch(e) {}');
        }

		if (preg_match('/kfz_websuche_setup/', $phs) or preg_match('/kfz_schnellsuche/', $phs) or (preg_match('/stammdaten_suche_telefon\.php/', $phs) and isset($_GET['liste'])) or !(preg_match('/suche/', $phs) or preg_match('/hilfe\.php/', $phs))) {
			echo '<iframe id="DivShim" src="javascript:false;" scrolling="no" frameborder="0" style="position:absolute; top:0px; left:0px; display:none;"></iframe>';
		
		
		$farbneu='#CCCBB7';
		if ($cfg_neustyle) {
		if (isset($_SESSION['stil'])) {
				if (preg_match('/style(.*)\.css/i', $_SESSION['stil'], $sma1)) {
					$stiln1=$sma1[1];
				}
				if ($stiln1=='_blau') {
					$farbneu='#9abbe1';
				}
				if ($stiln1=='_gruen') {
					$farbneu='#a2c8a2';
				}
				if ($stiln1=='_lila') {
					$farbneu='#d7b5ea';
				}
				if ($stiln1=='_gelb') {
					$farbneu='#f7f752';
				}
		}
		}
		
		echo '<div id="div_rez"></div><div '.($cfg_neustyle?' style="background: '.$farbneu.';"':'').' id="message" name="message" '.($cfg_modern?'':'onClick="if (document.all) { document.all.DivShim.style.display=\'none\'; document.all.message.style.left=-2000; } else if (document.getElementById) { document.getElementById(\'DivShim\').style.display=\'none\'; document.getElementById(\'message\').style.left=-2000; } "').'></div>';
		echo '<div  id="message2" name="message2" ></div>';
		echo '<div id="overlay"></div>';
		
		if ($_SESSION['ajx']==1) {
			echo '<div id="warten" style="left:-1000px;display:none;'.(($cfg_modern)?' 	visibility:hidden;':'').'"></div>';
		} else {
			echo '<div id="warten" style="'.(($cfg_modern)?' 	visibility:hidden;':'display:none;').'"><br>'._FILTER_WARTEN_.'<br /><br />'.($cfg_modern?'':'<img src="bilder/warten2.gif" border=0>').'<br /></div>';
		}
		

        if ($cfg_modern) {} else {
		echo '<iframe id="kalenderdiv1if" src="javascript:false;" scrolling="no" frameborder="0"
  style="position:absolute;border:none;display:block;z-index:1500;left:-2000;"></iframe><div id="kalenderdiv1" style="position:absolute;display:none;z-index:1500;"></div>';
        }
		if ($_SESSION['ajx']==1) {
			echo '<div id="overDiv" style="position:absolute; visibility:hide; z-index: 1000;"></div>
<script type="text/javascript" src="'.$cfg_basedir.'overlib.js"></script>
<script type="text/javascript" src="'.$cfg_basedir.'overlib_hideform.js"></script>';
		}
		
//		echo '<div id="warten" align=center valign=center style="position:absolute; z-Index:120; top:40%; left:-1000px;
//width:200px; height:110px; padding-left:5px; padding-right:5px; background-color:#FFC0C0; color:#000000;
//border-style:dotted; border-width:thin;"><br>'._FILTER_WARTEN_.'<br /><br /><img src="bilder/warten2.gif" border=0><br /></div>';
		}
                
                
        if ($echoscripts && !isset($ol))  {
            include_once($cfg_basedir."class.overlib.php");
            $ol = new Overlib();
        }
                
        if ($cfg_modern && $modernlayout) {
            echo '<div id="layout_top"></div><div id="layout_top_icon"><span></span></div>';
            echo '<div id="layout_left"></div><div id="layout_left_icon"><span></span></div>';
            echo '<div id="layout_center">';
        }

	}

/**
 * ends an html page
 */
	function fuss($html_is_ok=false) {
		global $phs, $db, $sql_tab, $sql_tabs, $tracking, $cfg_merke_zeit, $glob_sql_tab_stids, $cfg_filterupdate_onthefly, $global_datum_ja, $cfg_neustyle, $cfg_filter_keinehilfstabelle,$cfg_modern,$modernlayout, $tsessts1;
        if ($tracking) {
			$inhalt=ob_get_contents();
			if ($_SESSION['user_id']) {
				$db->delete(
					$sql_tab['verfolgung'],
					$sql_tabs['verfolgung']['benutzer_id'].'='.$db->dbzahl($_SESSION['user_id'])
				);
			}
			if (preg_match('/<form.* name="([a-zA-z]*)"/i', $inhalt, $matches)) {
				// Ausnahmen: filterform - admin_filter.php UND login - ...
				if ($matches[1]!='filterform' and $matches[1]!='login' and $_SESSION['karte']!='Uebersicht' && preg_match('/stammdaten_main\.php/i', $phs)) {
					$datensatz=$_SESSION['stammdaten_id'];
                    $res=$db->select(
                        $sql_tab['verfolgung'],
                        $sql_tabs['verfolgung']['benutzer_id'],
                        $sql_tabs['verfolgung']['skript'].'='.$db->str($phs).' and '.
                        $sql_tabs['verfolgung']['formular'].'='.$db->str($matches[1]).' and '.
                        $sql_tabs['verfolgung']['zeit'].'>='.$db->dbtimestamp(time()-10*60).' and '.
                        $sql_tabs['verfolgung']['datensatz'].'='.$db->dbzahl($datensatz)
                    );
                    if ($row=$db->zeile($res)) {
                        // Ja, jemand hat die Seite in den letzten 10 Minuten betreten und bearbeitet sie.
                        $inhalt=preg_replace('/<input type="submit"[^>]*>/i', '', $inhalt);
//                        $inhalt=preg_replace('/<a href.*loesch.*<\/a>/Ui', '', $inhalt);
                        $inhalt=preg_replace('/<a[\s]*href[^>]*loesch[^>]*>.*<\/a>/i', '', $inhalt);
                        ob_end_clean();
                        if (_FORM_IS_EDITED_BY_USER_!='_FORM_IS_EDITED_BY_USER_') {
                            $warnung = _FORM_IS_EDITED_BY_USER_;
                        } else {
                            $warnung = 'Diese Eingabemaske wird bereits vom Benutzer {user} bearbeitet.';
                        }
                        $inhalt.='<script type="text/javascript">alert("'.str_replace('{user}', '\''.dbout($sql_tab['benutzer'], array($sql_tabs['benutzer']['vorname'], $sql_tabs['benutzer']['name']), $sql_tabs['benutzer']['benutzer_id'].'='.$db->dbzahl($row[0])).'\'', $warnung).'");';
                        if (preg_match('/stammdaten_main\.php/i', $phs) and $_SESSION['karte']!='Uebersicht') {
                            $inhalt.='submitx();';
                        }
                        if ($cfg_modern) {
                            $modern_Template_StructureContentEnd_class = new Modern_Template_StructureContentEnd();
                            $inhalt.='</script>'.$modern_Template_StructureContentEnd_class->getHtml();
                            $inhalt = p4n_mb_string('str_replace', 'class="head"', 'class="header"', $inhalt);
                            $inhalt = p4n_mb_string('str_replace', array('<!stc1>', '<!stc2>', '<!shd1>', '<!shd2>','<!sbl>'), array('', '', '', '',''), $inhalt);
                            $parser= new Modern_HtmlParser();
                            if (isset($_GET['ajax']) or isset($_POST['ajax'])) {
                                echo $parser->DomParser($inhalt,false);
                            } else {
                                echo $parser->DomParser($inhalt);
                            }
                            die();
                        } else {
                            $inhalt.='</script></body></html>';
                            die($inhalt);
                        }
                    } else {
                    // alles ok, Schreibrecht! -> Update, dass der User jetzt drauf ist
                        $db->insert(
                            $sql_tab['verfolgung'],
                            array(
                                $sql_tabs['verfolgung']['benutzer_id'] => $db->dbzahl($_SESSION['user_id']),
                                $sql_tabs['verfolgung']['skript'] => $db->str($phs),
                                $sql_tabs['verfolgung']['formular'] => $db->str($matches[1]),
                                $sql_tabs['verfolgung']['datensatz'] => $db->dbzahl($datensatz),
                                $sql_tabs['verfolgung']['zeit'] => $db->dbtimestamp(time())
                            )
                        );
                    }
                }
			}
		}
		
		// Änderungen an FIltern:
		if (!$cfg_filter_keinehilfstabelle and $cfg_filterupdate_onthefly==true) {
			if (count($glob_sql_tab_stids)>0) {
//				echo zeitnahme().'<br>';
				while (list($key, $val)=@each($glob_sql_tab_stids)) {
					checkfilter_kunde($key);
				}
//				echo zeitnahme().'<br>';
				unset($glob_sql_tab_stids);
			}
		}
//		echo zeitnahme();
		
        if (!$cfg_modern) {
		if ($global_datum_ja==true) {
//			echo "<script type=\"text/javascript\" src=\"date-picker.js\"></script>";
		}
//		echo link2('wech', '#', '', '', 'onClick="var wartenf = document.getElementById(\'warten\'); alert(wartenf.style.left); wartenf.style.left=\'-2000px\';"');
            echo "<script type=\"text/javascript\">var geladen=true;</script>";


       if (isset($_GET['ajax']) or isset($_POST['ajax'])) {
           } else {
               if (!$_SESSION['design_70']) {    
                   echo '</body></html>';
               } else {
                   echo '<div>';
               }
        
           }

		if ($_SESSION['ajx']==1) {
			echo '</div>';
		}
            if ($cfg_neustyle and preg_match('/admin_filter2/', $phs)) {
		//	$x=p4n_mb_string('str_replace', 'class="ueberschrift"', 'class="header"', $x);
		}
            if ($cfg_neustyle and !preg_match('/admin_filter2/', $phs)) {
			$ovflw='auto';
			if (isset($_GET['ajax']) or isset($_POST['ajax'])) {
				$ovflw='hidden';
			}
			$x=ob_get_contents();
			ob_clean();
			$pre='
	<div class="boxshadow_top">
		<div class="edge_lo"> </div>
		<div class="edge_ro"> </div>
	</div>
	<div class="boxshadow_left">
		<div class="boxshadow_right">
			<div class="box" style="width: 100%; margin: 0 0 0 0;">';	// overflow:hidden;	// auto// overflow:'.$ovflw.';
	$sub='</div>
		</div>
	</div>
	<div class="boxshadow_bottom">
		<div class="edge_lu"> </div>
		<div class="edge_ru"> </div>
	</div>
';
                        $mr1=15;
                        $u = $_SERVER['HTTP_USER_AGENT'];
                        $isIE7  = (bool)preg_match('/msie 7./i', $u );
                        $isIE8  = (bool)preg_match('/msie 8./i', $u );
                        $isIE9  = (bool)preg_match('/msie 9./i', $u );
                        $compatible  = (bool)preg_match('/compatible/i', $u );
                        $isIE_edgefore= (isset($_SESSION['IEEdge_force']) && $_SESSION['IEEdge_force']==true) ? true : false;
			if (($isIE7 || $isIE8 || $isIE9) && !$compatible) {
				$mr1=0;
			} else if ($compatible && !$isIE_edgefore) {
                            $mr1=0;
                        }
                        
//			$x=p4n_mb_string('str_replace', array('<!stc1>', '<!stc2>', '<!shd1>', '<!shd2>'), array('<div style="margin-right: '.$mr1.'pt;"><div id="content" style="width: 100%;">', '</div></div>', $pre, $sub), $x);
//			$x=preg_replace('/<!shd1>(.*)<!shd2>/Uis', $pre.'\\1'.$sub, $x);
//			$x=p4n_mb_string('str_replace', '<!sbl>', '<tr><th colspan=100 class="oben1"></th></tr>', $x);
			
//			if (!preg_match('/<div id="content"/Uis', $x)) {
			//	$x=p4n_mb_string('str_replace', 'class="header"', 'class="ueberschrift"', $x);
//			}
			
			$repl_von=array(
				'<!stc1>',
				'<!stc2>',
				'<!shd1>',
				'<!shd2>',
				'<!sbl>',
				
				'class="head"',
				'bilder/overlib.gif"',
				'bilder/drucker.gif"',
				'bilder/kfz_historie.png"',
				'bilder/aendern.gif"',
				'bilder/vorlage.gif"',
				'bilder/hakengruen.gif"',
				'bilder/ausrufrot.gif"',
				'bilder/pfeil_rechts.gif"',
				'bilder/pfeil_links.gif"',
				
				'bilder/adresse.png',
				'bilder/kampagne.gif',
				'bilder/formular.gif',
				'bilder/k_fon.gif',
				'bilder/k_brief.gif',
				'bilder/k_pers-gespr.gif',
				'bilder/k_fax.gif',
				'bilder/k_email.gif',
				'bilder/k_serienbrief.gif',
				'bilder/k_termin.gif'
			);
			$repl_zu=array(
				'<div style="margin-right: '.$mr1.'pt;"><div id="content" style="width: 100%;">',
				'</div></div>',
				$pre,
				$sub,
				'<tr><th colspan=100 class="oben1"></th></tr>',
				
				'class="header"',
				'img/link_ask.gif"',
				'img/link_print2.gif"',
				'img/link_car.gif"',
				'img/link_ask.gif"',
				'img/link_dokument.gif"',
				'img/link_check.gif"',
				'img/link_ausrufe.gif"',
				'img/link_arrow_right.gif"',
				'img/link_arrow_left.gif"',
				
				'img/link_map.gif',
				'img/link_telefon.gif',
				'img/link_dokument.gif',
				'img/link_telefon.gif',
				'img/link_serienbrief.gif',
				'img/link_gespraech.gif',
				'img/link_handy.gif',
				'img/link_email.gif',
				'img/link_serienbrief.gif',
				'img/link_termin.gif'
			);
			$x=p4n_mb_string('str_replace', $repl_von, $repl_zu, $x);
			
			/*
			$x=p4n_mb_string('str_replace', 'class="head"', 'class="header"', $x);
			$x=p4n_mb_string('str_replace', 'bilder/overlib.gif"', 'img/link_ask.gif"', $x);
			$x=p4n_mb_string('str_replace', 'bilder/drucker.gif"', 'img/link_print2.gif"', $x);
			$x=p4n_mb_string('str_replace', 'bilder/kfz_historie.png"', 'img/link_car.gif"', $x);
			$x=p4n_mb_string('str_replace', 'bilder/aendern.gif"', 'img/link_ask.gif"', $x);
			$x=p4n_mb_string('str_replace', 'bilder/vorlage.gif"', 'img/link_dokument.gif"', $x);
			$x=p4n_mb_string('str_replace', 'bilder/hakengruen.gif"', 'img/link_check.gif"', $x);
			$x=p4n_mb_string('str_replace', 'bilder/ausrufrot.gif"', 'img/link_ausrufe.gif"', $x);
			$x=p4n_mb_string('str_replace', 'bilder/pfeil_rechts.gif"', 'img/link_arrow_right.gif"', $x);
			$x=p4n_mb_string('str_replace', 'bilder/pfeil_links.gif"', 'img/link_arrow_left.gif"', $x);
			
			$change_b=array(
				'bilder/adresse.png' => 'img/link_map.gif',
				'bilder/kampagne.gif' => 'img/link_telefon.gif',
				'bilder/formular.gif' => 'img/link_dokument.gif',
				'bilder/k_fon.gif' => 'img/link_telefon.gif',
				'bilder/k_brief.gif' => 'img/link_serienbrief.gif',
				'bilder/k_pers-gespr.gif' => 'img/link_gespraech.gif',
				'bilder/k_fax.gif' => 'img/link_handy.gif',
				'bilder/k_email.gif' => 'img/link_email.gif',
				'bilder/k_serienbrief.gif' => 'img/link_serienbrief.gif',
				'bilder/k_termin.gif' => 'img/link_termin.gif'
			);
			while (list($keyb, $valb)=@each($change_b)) {
				$x=p4n_mb_string('str_replace', $keyb, $valb, $x);
			}
			*/

/*			
			$ma=preg_split('/<div class="ueberschrift">/Uis', $x);
			for ($xi=1; $xi<count($ma); $xi++) {
				$x=p4n_mb_string('str_replace', '<div class="ueberschrift">'.$ma[$xi], $pre.'<div class="header">'.$ma[$xi].$sub, $x);
			}
			
			if (preg_match_all('/(<table(^>)*>(.*)<\/table>)/Uis', $x, $ma)) {
//				print_r($ma);
//				die();
//echo 'Anzahl: '.count($ma[0]);
				while (list($key, $val)=@each($ma[3])) {
					if (preg_match_all('/<tr.*(<t[h|d].*)+<\/tr>/Uis', $val, $ma2)) {
						$anzc=count($ma2[1]);
						while (list($key2, $val2)=@each($ma2[1])) {
							if (preg_match('/colspan=(\d+)/Uis', $val2, $ma3)) {
								$anzc+=intval($ma3[1])-1;
							}
						}
//						echo ++$zz.': '.$anzc.'<br>';
					}
					$anzc=100;
					$x=p4n_mb_string('str_replace', $val, '<tr><th colspan='.$anzc.' class="oben1"></th></tr>'.$val, $x);
				}
			}
*/
			$stiln1='';
			if (isset($_SESSION['stil'])) {
				if (preg_match('/style(.*)\.css/i', $_SESSION['stil'], $sma1)) {
					$stiln1=$sma1[1];
				}
			}
			$farbneu='#CCCBB7';
				if ($stiln1=='_blau') {
					$farbneu='#9abbe1';
				}
				if ($stiln1=='_gruen') {
					$farbneu='#a2c8a2';
				}
				if ($stiln1=='_lila') {
					$farbneu='';//'#d7b5ea';
				}
				if ($stiln1=='_gelb') {
					$farbneu='';//'#f7f752';
				}
			
			if ($farbneu!='' and preg_match_all('/div class="header">(.*)<\/div/Ui', $x, $ma)) {
				while (list($key1, $val1)=@each($ma[1])) {
					$val2=p4n_mb_string('str_replace', '<a ', '<a style="color: '.$farbneu.';" ', $val1);
					$x=p4n_mb_string('str_replace', $ma[0][$key1], p4n_mb_string('str_replace', $val1, $val2, $ma[0][$key1]),$x);
				}
			}
			if ($_SESSION['db_utf8']) {
//				$x=p4n_mb_string('str_replace', '€', '&euro;', $x);
			}
			echo $x;
		}
/*		$x=ob_get_contents();
		ob_clean();
		echo p4n_mb_string('str_replace', array('ä', 'ö', 'ü', 'Ä', 'Ö', 'Ü', 'ß'), array('&auml;', '&ouml;', '&uuml;', '&Auml;', '&Ouml;', '&Uuml;', '&szlig;'), $x);
*/		//echo iconv("ISO-8859-1","UTF-8",$x);
		}

        if ($cfg_modern) {
            if (!is_a($modern_Template_StructureContentEnd_class, 'Modern_Template_StructureContentEnd')) {
                $modern_Template_StructureContentEnd_class = new Modern_Template_StructureContentEnd();
            }
            echo $modern_Template_StructureContentEnd_class->getHtml();

            $ovflw = 'auto';
            if (isset($_GET['ajax']) or isset($_POST['ajax'])) {
                $ovflw = 'hidden';
            }
            $x=ob_get_contents();
            ob_end_clean();

            $x = p4n_mb_string('str_replace', 'bilder/overlib.gif"', 'img/link_ask.gif"', $x);
            $x = p4n_mb_string('str_replace', 'bilder/drucker.gif"', 'img/link_print2.gif"', $x);
            $x = p4n_mb_string('str_replace', 'bilder/kfz_historie.png"', 'img/link_car.gif"', $x);
            $x = p4n_mb_string('str_replace', 'bilder/aendern.gif"', 'img/link_ask.gif"', $x);
            $x = p4n_mb_string('str_replace', 'bilder/vorlage.gif"', 'img/link_dokument.gif"', $x);
            $x = p4n_mb_string('str_replace', 'bilder/hakengruen.gif"', 'img/link_check.gif"', $x);
            $x = p4n_mb_string('str_replace', 'bilder/ausrufrot.gif"', 'img/link_ausrufe.gif"', $x);
            $x = p4n_mb_string('str_replace', 'bilder/pfeil_rechts.gif"', 'img/link_arrow_right.gif"', $x);
            $x = p4n_mb_string('str_replace', 'bilder/pfeil_links.gif"', 'img/link_arrow_left.gif"', $x);

            $change_b = array(
                'bilder/adresse.png' => 'img/link_map.gif',
                'bilder/kampagne.gif' => 'img/link_telefon.gif',
                'bilder/formular.gif' => 'img/link_dokument.gif',
                'bilder/k_fon.gif' => 'img/link_telefon.gif',
                'bilder/k_brief.gif' => 'img/link_serienbrief.gif',
                'bilder/k_pers-gespr.gif' => 'img/link_gespraech.gif',
                'bilder/k_fax.gif' => 'img/link_handy.gif',
                'bilder/k_email.gif' => 'img/link_email.gif',
                'bilder/k_serienbrief.gif' => 'img/link_serienbrief.gif',
                'bilder/k_termin.gif' => 'img/link_termin.gif'
            );
            while (list($keyb, $valb) = @each($change_b)) {
                $x = p4n_mb_string('str_replace', $keyb, $valb, $x);
            }
            //$x = p4n_mb_string('str_replace', 'class="head"', 'class="header"', $x);

            //$x = p4n_mb_string('str_replace', array('<!stc1>', '<!stc2>', '<!shd1>', '<!shd2>','<!sbl>'), array('', '', '', '',''), $x);
            
            $parser= new Modern_HtmlParser();
            if (isset($_GET['ajax']) or isset($_POST['ajax'])) {
            echo $parser->DomParser($x,false);
            } else {
                echo $parser->DomParser($x);
            }
            
        }
		
		if (function_exists('fuss_zeitmesser')) {
			fuss_zeitmesser();
		}
		
		if ($_SESSION['cfg_kunde']=='carlo_opel_haeusler' or $_SESSION['cfg_kunde']=='carlo_opel_dello' or $_SESSION['cfg_kunde']=='carlo_vw_glinicke' or $_SESSION['cfg_kunde']=='carlo_vw_mahag' or $_SESSION['cfg_kunde']=='carlo_vw_schultz2' or $_SESSION['cfg_kunde']=='crm_vw_schwaba' or $_SESSION['cfg_kunde']=='crm_vw_ulm') {
			$startzeit1=$tsessts1;
			$endzeit1=microtime();
			$zt1=(substr($endzeit1,11)-substr($startzeit1,11))+(substr($endzeit1,0,9)-substr($startzeit1,0,9));
			$zt1=doubleval($zt1);
			if ($zt1>=1 and !preg_match('/import/i', $_SERVER["PHP_SELF"])) {
				if ($fp=@fopen('_log_aufruf_'.date('d_m_Y').'.txt', 'a')) {
					@fwrite($fp, "\r\n".''.number_format($zt1, 3, ",", '').'s / '.adodb_date('d.m.Y H:i:s', time()).' / '.$_SERVER["PHP_SELF"].' / User: '.$_SESSION['mitarbeiter_name2'].' ('.$_SESSION['user_id'].') / '.$_SESSION['stammdaten_id']);
					@fclose($fp);
				}
			}
		}
	}
	
	function fuss_zeitmesser($html_is_ok=false) {
		global $phs, $db, $sql_tab, $sql_tabs, $tracking, $cfg_merke_zeit, $glob_sql_tab_stids, $cfg_filterupdate_onthefly, $global_datum_ja, $cfg_neustyle, $cfg_filter_keinehilfstabelle,$cfg_modern,$modernlayout, $tsessts1, $tsessts2;
		
		if (isset($sql_tab['slowlog']) && $_SESSION['crm_version']>60) {
			$startzeit1=$tsessts1;
			if (isset($tsessts2) and isset($_SESSION['slowlog_zeit2'])) {
				$startzeit1=$tsessts2;
			}
			$endzeit1=microtime();
			$zt1=(substr($endzeit1,11)-substr($startzeit1,11))+(substr($endzeit1,0,9)-substr($startzeit1,0,9));
			$zt1=doubleval($zt1);
			$startzeit2=time()-round($zt1);
			if ($zt1>=1 and isset($db)) {
				$xpl1=explode('/', $_SERVER["PHP_SELF"]);
				$phpsk=$xpl1[count($xpl1)-1];
				$qu1='';
				if (preg_match('/stammdaten/', $phpsk)) {
					$qu1=$_SESSION['karte'];
				}
				if (isset($_SESSION['slowlog_quelle']) and $_SESSION['slowlog_quelle']!='') {
					$qu1=$_SESSION['slowlog_quelle'];
				}
				$qu2='';
				if (isset($_SESSION['slowlog_quelle2']) and $_SESSION['slowlog_quelle2']!='') {
					$qu2=$_SESSION['slowlog_quelle2'];
				}
				$wfid=0;
				if (isset($_SESSION['slowlog_wfid'])) {
					$wfid=$_SESSION['slowlog_wfid'];
				}
				$fid=0;
				if (isset($_SESSION['slowlog_fid'])) {
					$fid=$_SESSION['slowlog_fid'];
				}
				$stid1=$_SESSION['stammdaten_id'];
				if (isset($_SESSION['slowlog_stid'])) {
					$stid1=$_SESSION['slowlog_stid'];
				}
				$db->insert(
					$sql_tab['slowlog'],
					array(
						$sql_tabs['slowlog']['beginn'] => $db->dbtimestamp($startzeit2),
						$sql_tabs['slowlog']['ende'] => $db->dbtimestamp(time()),
						$sql_tabs['slowlog']['dauer'] => $db->dbzahl($zt1),
						$sql_tabs['slowlog']['phpskript'] => $db->str($phpsk),
						$sql_tabs['slowlog']['quelle'] => $db->str(p4n_mb_string('substr', $qu1, 0, 255)),
						$sql_tabs['slowlog']['quelle2'] => $db->str(p4n_mb_string('substr', $qu2, 0, 255)),
						$sql_tabs['slowlog']['benutzer_id'] => $db->dbzahl($_SESSION['user_id']),
						$sql_tabs['slowlog']['filter_id'] => $db->dbzahl($fid),
						$sql_tabs['slowlog']['makro_id'] => $db->dbzahl($wfid),
						$sql_tabs['slowlog']['leitfaden_id'] => $db->dbzahl(0),
						$sql_tabs['slowlog']['stammdaten_id'] => $db->dbzahl($stid1)
					)
				);
				unset($_SESSION['slowlog_quelle']);
				unset($_SESSION['slowlog_quelle2']);
				unset($_SESSION['slowlog_wfid']);
				unset($_SESSION['slowlog_fid']);
				unset($_SESSION['slowlog_stid']);
				unset($_SESSION['slowlog_zeit2']);
			}
		}
	}
/**
 * @param $seite
 * @param bool|false $ohne_aj
 */
	function wechsel($seite, $ohne_aj=false) {
		if ($_SESSION['ajx']==1 and !$ohne_aj) {
			//echo javas('lade_s(\'stammdaten_liste.php?fn=1\', \'div_main\');');
			echo javas('lade_s(\''.$seite.'\', \'div_main\');');
		} else {
            echo javas('location.href=\''.$seite.'\';');
			//header("Location: ".$seite);
		}
		die();
	}

	function menue() {
		
		global $db, $sql_tab, $sql_tabs, $ohne_menue, $cfg_modern;
		
		if ($_SESSION['isdn']==1 or $ohne_menue or $_SESSION['stephan_menu']==1 or $cfg_modern) {
			
		} else {
			echo '	<script type="text/javascript" src="inc/coolmenupro.js"></script>
				<script type="text/javascript"  src="inc/'.$_SESSION['cfg_kunde'].'/menu/'.$_SESSION['hash'].'.js?'.time().'"></script>
				<script type="text/javascript">
					var menu = new COOLjsMenuPRO("test",MENU_ITEMS);
					menu.initTop();menu.init();
				</script>';//'.$_SESSION['hash'].'
		}
		
		if ($_SESSION['ajx']==1 && !$cfg_modern) {
			$x=javas('
			var letztes_ziel="";
			var stm=0;
			
			function lade_s(ziel, div_el) {
			
			var response="";
			var raus=false;
			var ma=false;
			
			if (stm==1 && letztes_ziel.match(/stammdaten_main/) && !letztes_ziel.match(/Uebersicht/)) {
				x=testef();
				stm=0;
			}
			
			if (!ziel.match(/hilfe\.php/) && !ziel.match(/stammdaten_suche/)) {
				letztes_ziel=ziel;
			}
			
                        if (typeof p4ntoken == "undefined") {p4ntoken="";}
			var xmlhttp;
			try {
				xmlhttp = new XMLHttpRequest();
			} catch (error) {
				try {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (error) {
					return false;
				}
			}
			
			var met="GET";
			if (typeof fmet == "undefined") {
				
			} else {
				met=fmet;
			}
			var sends=null;
			if (typeof fsends=="undefined") {
				
			} else {
				sends=fsends;
			}
			
			if (ziel.match(/\?/)) {
				ziel+="&ajax=1";
			} else {
				ziel+="?ajax=1";
			}
			
                        if (met=="GET") {
                            if (ziel.match(/\?/)) {
                                    ziel+="&p4ntoken="+p4ntoken;
                            } else {
                                    ziel+="?p4ntoken="+p4ntoken;
                            }
                            ziel=ziel.replace("&&", "&"); 
                        } else {
                             if (sends.match(/\?/)) {
                                    sends+="&p4ntoken="+p4ntoken;
                            } else {
                                    sends+="?p4ntoken="+p4ntoken;
                            }
                            sends=sends.replace("&&", "&");
                        }
                        
			xmlhttp.open(met, ziel, false);
                        
			xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                        xmlhttp.setRequestHeader("X-Requested-With", "XMLHttpRequest");
                        
			xmlhttp.onreadystatechange=function() { 
                            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                                if (typeof getNewToken == "function") {
                                    p4ntoken = getNewToken(xmlhttp.getResponseHeader("p4ntoken"));
                                }
                                response=xmlhttp.responseText;
                                ma=response.match(/<script[^>]*>((.|\s)*?)<\/script>/gi);
                                var jsc_g="";
                                if (ma) {
                                        for (ar=0; ar<ma.length; ar++) {
                                                jsc=ma[ar];
                                                jsc=jsc.replace(/<script[^>]*>/i, "");
                                                jsc=jsc.replace(/<\/script>/i, "");
                                                if (jsc!="" && jsc.length>10) {
                                                        jsc_g+="\n"+jsc;
                                                }
                                        }
                                        if (jsc_g!="") {
                                                var text_s = document.createTextNode(jsc_g); 
                                                var js_script = document.createElement("script");
                                                js_script.type = "text/javascript";
                                                if (null == js_script.canHaveChildren) {
                                                        js_script.appendChild(text_s);
                                                } else {
                                                        js_script.text = jsc_g;
                                                }
                                                document.getElementsByTagName("head")[0].appendChild(js_script);
                                        }
                                }

                                fmet="GET";
                                fsends=null;

                                if (response.match(/_EXIT_/g)) {
                                        return;
                                }

                                var ele=document.getElementById(div_el);
                                ele.innerHTML=response;

                                if (stm==1 && ziel.match(/stammdaten_main/) && !ziel.match(/Uebersicht/)) {
                                        merkef();
                                }

                                if (met=="POST") {
                                        window.setTimeout("meldung_aus()", 1000);
                                }
                                if (typeof cfg_modern != "undefined" && cfg_modern==true) {
                                P4nBoxHelper.init({
                                    href:"#"+div_el,
                                    target:"body",
                                    width:"800px",
                                    height:"300px",
                                    autosize:true,
                                    type:"innerObj"
                                });
                            }
                            }
                        };
			xmlhttp.send(sends);
		}
		function meldung_ein(meldung) {
			var wartenf = document.getElementById("warten");
			wartenf.innerHTML="<br>"+meldung+"<br /><br /><img src=\"bilder/warten2.gif\" border=0><br />";
			wartenf.style.left="40%";
			wartenf.style.display="block";
		}
		function meldung_aus() {
			var wartenf = document.getElementById("warten");
			wartenf.style.left="-1000px";
			wartenf.style.display="none";
			wartenf.innerHTML="<br>'._FILTER_WARTEN_.'<br /><br /><img src=\"bilder/warten2.gif\" border=0><br />";
		}
		
		function form_submit(fname) {
				meldung_ein("'._WARTENTEXT_.'");
				cgi="";
				mit_datei_upload=false;
				fmet=fname.method.toUpperCase();
				for (j=0; j<fname.elements.length; j++) {
					if (fname.elements[j].type=="checkbox") {
						if (fname.elements[j].checked) {
							cgi+=fname.elements[j].name+"="+fname.elements[j].value+"&";
						}
					} else if(fname.elements[j].name!="") {
						if (fname.elements[j].type=="submit") {
							ewert=fname.elements[j].value;
						} else if (fname.elements[j].type=="file") {
							mit_datei_upload=true;
						} else {
							ewert=fname.elements[j].value;//escape(fname.elements[j].value);
						}
						ewert=ewert.replace(/\+/g, "%2B");
						cgi+=fname.elements[j].name+"="+ewert+"&";
					}
				}
				cgi+="ajax=1&utf_cod=1";
				fsends=cgi;
				
				if (mit_datei_upload) {
					return true;
				} else {
					lade_s(fname.action, "div_main");
					return false;
				}
				
				return true;
		}');
			echo $x;
			echo '<div id="div_menue" class="crm_menu">';//style="width:100%;position:fixed"
			include('menu2_aj.php');
			echo '</div>';
			
			echo '<div id="div_main" class="crm_inhalt">';//style="width:100%;position:relative; top:24px; overflow:auto;"
			//echo link2('hh', '#', '', '', 'onClick="lade_s(\''.($_SESSION['isdn']==1?'menu2.php':'menu.php').'\', \'div_menue\');"');
		}
	}
	
	class message {
        function __construct($inittext='', $ko=false) {
			global $kircheis;
			$zeit=time();
			if (isset($_SESSION['message'])) {
				@reset($_SESSION['message']);
				$inittext=$this->feld2text($_SESSION['message'][$_SESSION['user_id']]);
			} else {
				$_SESSION['message'][$_SESSION['user_id']]["$zeit"] = $inittext;
			}
		}
		
		function feld2text($mfeld) {
			$text='';
			while (list($key, $val)=@each($mfeld)) {
				$text.=date(_LOCAL_DATETIMEFORMAT_,$key).': '.$val.'<br>';
			}
			return $text;
		}
		
		function add($text) {
			global $kircheis;
			$zeit=time();
			$_SESSION['message'][$_SESSION['user_id']]["$zeit"] = $text;
			if ($_SESSION['device']!='pda') {
				if (!($_SESSION['ajx']==1)) {
					echo '<script type="text/javascript">open("status.php?showtext=1", "status")</script>';
				}
			}
		}
		
		function close() {
			
		}
	}
	
	function checkform() {
		
	}
	
	function navbar() {
/*		echo '<table width="100%"><tr>';
		echo '<th class="navigation"><a href="stammdaten_main.php?zurueck=1">'._STAMMDATEN_NAV_ZURUECK_.'</a></th>';
		echo '<th class="navigation"><a href="stammdaten_main.php?vor=1">'._STAMMDATEN_NAV_VOR_.'</a></th>';
		echo '<th class="navigation"><a href="stammdaten_main.php?liste=1">'._STAMMDATEN_NAV_LISTE_.'</a></th>';
		echo '<th class="navigation">Suche: <input type=text size=15 name="suchfeld" onkeyup="if (this.value.length>3) window.open(\'stammdaten_suche.php?wort=\'+this.value,\'status\');"></th>';
		echo '<th class="menuerechts">Navigation</th></tr></table>';
*/	}
	
	function karten($aktuell, $onlyitems=false) {
		global $kircheis, $cfg_fdl, $cfg_kfz, $cfg_immobilie, $sql_tab, $cfg_keinrecht_kartei, $cfg_kundenkarte, $cfg_reiter_fp, $cfg_reiter_gw, $cfg_reiter_lf, $cfg_neustyle, $cfg_kundenkarte_syrcon, $cfg_reiter_beziehung, $cfg_reiter_beziehung_bez, $cfg_reiter_dateien, $cfg_reiter_bank, $lang, $cfg_nora, $cfg_stammdatenblatt, $cfg_modern, $cfg_stammdaten_lead, $cfg_leadmanagement_2020;
		global $cfg_newsletterbaukasten_p4n, $cfg_newsletterbaukasten_2_p4n, $cfg_bm, $cfg_vap_topco, $cfg_s4_bmw20, $cfg_zusreiter;
        if ($cfg_fdl) {
			$items=array(
					_KARTEI_UEBERSICHT_		=>	"stammdaten_main.php?nav=Uebersicht",
					_KARTEI_STAMMDATEN_		=>	"stammdaten_main.php?nav=Stammdaten",
					_KARTEI_ZUSATZDATEN_	=>	"stammdaten_main.php?nav=Zusatzdaten",
					_KARTEI_GRUPPEN_		=>	"stammdaten_main.php?nav=Gruppen",
					_KARTEI_AUFTRAEGE_		=>	"stammdaten_main.php?nav=Auftraege",
					_KARTEI_VERTRAEGE_		=>	"stammdaten_main.php?nav=Vertraege"
			);
			
			if ($_SESSION['cfg_st_vp']==true or $onlyitems) {
				$items[_KARTEI_VP_]="stammdaten_main.php?nav=VP";
				$items[_KARTEI_UVP_]="stammdaten_main.php?nav=UVP";
			}
			$items[_KARTEI_KORRESPONDENZ_]	=	"stammdaten_main.php?nav=Korrespondenz";
			$items[_KARTEI_STATISTIK_]		=	"stammdaten_main.php?nav=Statistik";
			$items[_KARTEI_EXTRAS_]			=	"stammdaten_main.php?nav=Extras";
		} elseif ($cfg_kfz) {
			$items=array(
					_KARTEI_UEBERSICHT_		=>	"stammdaten_main.php?nav=Uebersicht",
					_KARTEI_STAMMDATEN_		=>	"stammdaten_main.php?nav=Stammdaten",
					_KARTEI_ZUSATZDATEN_	=>	"stammdaten_main.php?nav=Zusatzdaten",
					_KARTEI_GRUPPEN_		=>	"stammdaten_main.php?nav=Gruppen",
					_KARTEI_FAHRZEUGE_		=>	"stammdaten_main.php?nav=Fahrzeuge",
					_KARTEI_AUFTRAEGE_		=>	"stammdaten_main.php?nav=Auftraege2",
					_KARTEI_KORRESPONDENZ_	=>	"stammdaten_main.php?nav=Korrespondenz",
					_KARTEI_STATISTIK_		=>	"stammdaten_main.php?nav=Statistik"/*,
					_KARTEI_EXTRAS_			=>	"stammdaten_main.php?nav=Extras"*/
			);
			if ($_SESSION['crm_version']>=63) {
				$items[_DSGVO_]="stammdaten_main.php?nav=DS";
			}
			if ($_SESSION['cfg_kunde']=='kunde_kfz_leipzig') {
				$items[_KARTEI_EXTRAS_]="stammdaten_main.php?nav=Extras";
			}
			if ($_SESSION['cfg_kunde']=='carlo_kurlaender') {
				$items[_KARTEI_EXTRAS_]="stammdaten_main.php?nav=Extras";
			}
			if ($cfg_reiter_gw) {
				$items['INFO']="stammdaten_main.php?nav=GW";
			}
			if ($cfg_reiter_fp) {
				$items['FP']="stammdaten_main.php?nav=FP";
			}
			if ($cfg_s4_bmw20) {
				$items['Interesse an Fahrzeug']="stammdaten_main.php?nav=FPAT";
			}
			if ($cfg_reiter_beziehung) {
				if (isset($cfg_reiter_beziehung_bez) and $cfg_reiter_beziehung_bez!='') {
					$items[$cfg_reiter_beziehung_bez]="stammdaten_main.php?nav=Bez";
				} else {
					$items[_BEZIEHUNG_]="stammdaten_main.php?nav=Bez";
				}
			}
			if ($cfg_reiter_lf) {
				$items['LF']="stammdaten_main.php?nav=LF";
			}
			if (isset($sql_tab['bmw_sa_zusatzdaten'])) {
				$items['SA']="stammdaten_main.php?nav=SA";
			}
		} else
			$items=array(
					_KARTEI_UEBERSICHT_		=>	"stammdaten_main.php?nav=Uebersicht",
					_KARTEI_STAMMDATEN_		=>	"stammdaten_main.php?nav=Stammdaten",
					_KARTEI_ZUSATZDATEN_	=>	"stammdaten_main.php?nav=Zusatzdaten",
					_KARTEI_GRUPPEN_		=>	"stammdaten_main.php?nav=Gruppen",
					_KARTEI_AUFTRAEGE_		=>	"stammdaten_main.php?nav=Auftraege",
					_KARTEI_VERTRAEGE_		=>	"stammdaten_main.php?nav=Vertraege",
					_KARTEI_KORRESPONDENZ_	=>	"stammdaten_main.php?nav=Korrespondenz",
					_KARTEI_STATISTIK_		=>	"stammdaten_main.php?nav=Statistik",
					_KARTEI_EXTRAS_			=>	"stammdaten_main.php?nav=Extras"
			);
/*			if ($_SESSION['cfg_kunde']=='domaingo-bwk') {
				$items[_KARTEI_VP_]="stammdaten_main.php?nav=VP";
			}
*/
		//BK --Start
//		if ($cfg_immobilie) {
		if (isset($sql_tab['unterlagen'])) {
//			$items[_KARTEI_UNTERLAGEN_]="stammdaten_main.php?nav=Unterlagen";
		}
		//BK --Ende
		if (isset($cfg_zusreiter)) {
			@reset($cfg_zusreiter);
			while (list($keyr, $valr)=@each($cfg_zusreiter)) {
				$items[$valr]="stammdaten_main.php?nav=zus".$keyr;
			}
		}
		if (($cfg_newsletterbaukasten_p4n || $cfg_newsletterbaukasten_2_p4n) && $_SESSION['crm_version']>61) {
            $items[_NEWSLETTERX_]="stammdaten_main.php?nav=NLTab";
        }
		if ($cfg_nora) {
			$items['NORA']="stammdaten_main.php?nav=NORA";
		}
		if ($_SESSION['cfg_kunde']=='portal') {
			$items['Info']="stammdaten_main.php?nav=Info";
		}
		
		$nicht_anz=false;
		if ($_SESSION['cfg_kunde']=='crm_sensus') {
			if ($_SESSION['cfg_kunde']=='crm_sensus') {
				global $db, $sql_tabs, $sql_meta;
				$res=$db->select(
					$sql_tab['stammdaten_gruppe'],
					$sql_tabs['stammdaten_gruppe']['gruppe_id'],
					$sql_tabs['stammdaten_gruppe']['bezeichnung'].'='.$db->str('Leads')
				);
				if ($row=$db->zeile($res)) {
					$res=$db->select(
						$sql_tab['stammdaten_gruppe_zuordnung'],
						$sql_tabs['stammdaten_gruppe_zuordnung']['gruppe_id'],
						$sql_tabs['stammdaten_gruppe_zuordnung']['gruppe_id'].'='.$db->dbzahl($row[0]).' and '.
							$sql_tabs['stammdaten_gruppe_zuordnung']['stammdaten_id'].'='.$db->dbzahl($_SESSION['stammdaten_id'])
					);
					if ($row=$db->zeile($res)) {
						$nicht_anz=true;
					}
				}
			}
			if (!$nicht_anz) {
				$items['Account Opening']="stammdaten_main.php?nav=AccountOpening";
				$items['IB earning']="stammdaten_main.php?nav=IBearning";
			}
			$items['Add. Information']="stammdaten_main.php?nav=AdditionalInformation";
		}
		if ($cfg_reiter_bank and !$nicht_anz) {
			$items[$lang['_ZUSATZ-BK_']]="stammdaten_main.php?nav=Bank";
		}
		if ($cfg_reiter_dateien || $_SESSION['crm_version']>63) {
			$items[_DATEIEN_]="stammdaten_main.php?nav=Files";
		}
		
		if ($cfg_stammdatenblatt or $_SESSION['cfg_kunde']=='carlo_vw_mahag') {
			$items['Stammdatenblatt']="stammdaten_main.php?nav=Blatt";
		}
		if (false && $_SESSION['crm_version']>63) {//TT: false weil Marketing Reiter sollte gar nicht ausgerollt werden.
            $items[_MARKETING_]="stammdaten_main.php?nav=Marketing";
        }
		if ($_SESSION['cfg_kunde']!='ba') {
			$items[_KARTEI_OM_]="stammdaten_main.php?nav=OM";
			$items[_KARTEI_PM_]="stammdaten_main.php?nav=PM";
			$items[_KARTEI_BM_]="stammdaten_main.php?nav=BM";
			$items[_KARTEI_CC_]="stammdaten_main.php?nav=CC";
			$items[_KARTEI_VERANSTALTUNG_]="stammdaten_main.php?nav=Veranstaltung";
			$items[_KARTEI_FORMULARE_]="stammdaten_main.php?nav=FM";
		}
		//neu
		if ($_SESSION['cfg_kunde']=='ba') {
			$items[_KARTEI_BM_]="stammdaten_main.php?nav=BM";
			$items[_KARTEI_FORMULARE_]="stammdaten_main.php?nav=FM";
			$items[_KARTEI_CC_]="stammdaten_main.php?nav=CC";
		}
		if ($cfg_kundenkarte) {
			$items[_KUNDENKARTE_]="stammdaten_main.php?nav=KK";
		}
		if ($cfg_kundenkarte_syrcon) {
			$items['BC']="stammdaten_main.php?nav=KK2";
        }
        if ($cfg_vap_topco) {
            $items['VAP']="stammdaten_main.php?nav=VAP_Topco";
        }
		
		if (isset($_GET['ohnecc'])) {
			unset($items[_KARTEI_CC_]);
		}
		
		if ($cfg_stammdatenblatt) {
			global $db, $sql_tabs, $sql_meta;
			$ist_gkg=false;
            $res=$db->select(
                $sql_tab['stammdaten_gruppe'],
                $sql_tabs['stammdaten_gruppe']['gruppe_id'],
                $sql_tabs['stammdaten_gruppe']['bezeichnung'].'='.$db->str('Großkunden')
            );
            if ($row=$db->zeile($res)) {
                $script = $_SERVER["SCRIPT_FILENAME"];
                $administration = strstr($script, 'admin_benutzerrollen.php') || strstr($script, 'admin_benutzer.php');
                if ($administration) {
                    $ist_gkg=true;
                } else {
                    $res=$db->select(
                        $sql_tab['stammdaten_gruppe_zuordnung'],
                        $sql_tabs['stammdaten_gruppe_zuordnung']['gruppe_id'],
                        $sql_tabs['stammdaten_gruppe_zuordnung']['gruppe_id'].'='.$db->dbzahl($row[0]).' and '.
                        $sql_tabs['stammdaten_gruppe_zuordnung']['stammdaten_id'].'='.$db->dbzahl($_SESSION['stammdaten_id'])
                    );
                    if ($row=$db->zeile($res)) {
                        $ist_gkg=true;
                    }
                }
            }
			if (!$administration && $_SESSION['stammdaten_id']>=8000000 and $_SESSION['stammdaten_id']<=8999999) {
				$items=array(
					_KARTEI_UEBERSICHT_		=>	"stammdaten_main.php?nav=Uebersicht",
					_KARTEI_STAMMDATEN_		=>	"stammdaten_main.php?nav=Stammdaten",
					_KARTEI_ZUSATZDATEN_	=>	"stammdaten_main.php?nav=Zusatzdaten",
					'Stammdatenblatt'		=> "stammdaten_main.php?nav=Blatt"
				);
			}
			if (!$ist_gkg) {
				unset($items['Stammdatenblatt']);
			}
		}
        
        if ($cfg_stammdaten_lead || $cfg_leadmanagement_2020) {
            $items=array(_LEADPROZESS_=>'stammdaten_main.php?nav=lead')+$items;
        }
		if ($onlyitems) {
			@reset($cfg_keinrecht_kartei);
			while (list($key, $val)=@each($cfg_keinrecht_kartei)) {
                if ($cfg_bm && $val==_KARTEI_BM_) {
                    continue;
                }
				unset($items[$val]);
			}
			return $items;
		}
		
		$stiln1='';
		if ($cfg_neustyle) {
			if (isset($_SESSION['stil'])) {
				if (preg_match('/style(.*)\.css/i', $_SESSION['stil'], $sma1)) {
					$stiln1=$sma1[1];
				}
				if (!is_file('img/verlauf'.$stiln1.'.jpg')) {
					$stiln1='';
				}
			}
		}
		
		// neu
		if ($cfg_neustyle) {
		$text='<td width="100%" style="background: #fff url(img/verlauf'.$stiln1.'.jpg) repeat-x top left; vertical-align:bottom; text-align: right;{zusst}"><div id="header" style="height: 28px"><div id="nav"><!ulst1><ul>';
		$ki=0;
		$anz_items=0;
		$anz_buchst=0;
		$anz_buchst2=0;
		$umbruch2=0;
		$t_act='';
		
		@reset($items);
		while (list($key, $val)=each($items)) {
			if (p4n_mb_string('strstr', $_SESSION['rechte_reiter'], $val)) {
				$anz_buchst+=p4n_mb_string('strlen', $key)+4;
			}
		}
		@reset($items);
		while (list($key, $val)=each($items)) {
			if (p4n_mb_string('strstr', $_SESSION['rechte_reiter'], $val)) {
				$anz_items++;
				$anz_buchst2+=p4n_mb_string('strlen', $key)+4;
				if ($umbruch2==0 and $anz_buchst2>intval($anz_buchst/2)) {
					$umbruch2=$anz_items;
				}
			}
		}
		@reset($items);
		$umbruch=0;
		if ($anz_items>7) {
			$umbruch=intval(round($anz_items/2));
		}
	$umbruch=$umbruch2;
		$next_u=false;
		$next_u2=false;
		while (list($key, $val)=each($items)) {
			if (p4n_mb_string('strstr', $_SESSION['rechte_reiter'], $val)) {
				$zusc='';
				if ($ki==0 or $next_u) {
					$zusc=' class="first"';
					$next_u=false;
				}
				if ('stammdaten_main.php?nav='.$aktuell==$val) {
					$zusc=' class="active"';
				}
				$text.='<li'.$zusc.'>'.link2($key, $val.($_GET['druckoptimierung']=='1'?'&druckoptimierung=1':'').($_GET['ohnecc']=='1'?'&ohnecc=1':''), '', '', ''.($_GET['druckoptimierung']=='1'?' style="font-size:12px;"':'')).'</li>';
				$ki++;
				if ($umbruch>0 and $ki>=$umbruch and !$next_u2) {
					$text.='</ul><!ulst2></div></div></td><td style="width: 1px; background: #fff url(img/verlauf'.$stiln1.'.jpg) repeat-x top left;">&nbsp;</td></tr><tr><td class="leer" width="100%" style="background: #fff url(img/verlauf2'.$stiln1.'.jpg) repeat-x top left; vertical-align:bottom; text-align: right;"><div id="header" style="height: 28px"><div id="nav"><!ulst3><ul>'.$t_act;
					$next_u=true;
					$next_u2=true;
					$text=p4n_mb_string('str_replace', '{zusst}', ' height: 40px;', $text);
				}
			}
		}
		$text.='</ul><!ulst4></div></div></td>';
		if ($umbruch>0) {
			$mat1='';
			$mat2='';
			if (preg_match('/<!ulst1>(.*)<!ulst2>/Uis', $text, $ma1)) {
				$mat1=$ma1[1];
			}
			if (preg_match('/<!ulst3>(.*)<!ulst4>/Uis', $text, $ma1)) {
				$mat2=$ma1[1];
			}
			if ($mat1!='' and $mat2!='') {
				$text=preg_replace('/<!ulst3>(.*)<!ulst4>/Uis', $mat1, $text);
				$text=preg_replace('/<!ulst1>(.*)<!ulst2>/Uis', $mat2, $text);
			}
		}
		$text=p4n_mb_string('str_replace', array('<!ulst1>','<!ulst2>','<!ulst3>','<!ulst4>'), '', $text);
		$text=p4n_mb_string('str_replace', '{zusst}', '', $text);
		
		} else {
            if ($cfg_modern) {
                 $temp_links = '';
                 while (list($key, $val)=each($items)) {
                     if (p4n_mb_string('strstr', $_SESSION['rechte_reiter'], $val)) {
                         $temp_links.='<!SMke1>'.link2($key, $val.($_GET['druckoptimierung']=='1'?'&druckoptimierung=1':'').($_GET['ohnecc']=='1'?'&ohnecc=1':''), '', '', 'class="karten'.('stammdaten_main.php?nav='.$aktuell==$val?'_a':'').'" onClick="P4nBoxHelper.startloading();"'.($_GET['druckoptimierung']=='1'?' style="font-size:12px;"':'')).'<!SMke2>';
                     }
                 }
                 $temp = new Modern_Template_SubMenu;
                 $temp->class='karten';
                 $temp->mobile_id='stammdaten_main_karten';
                 $temp->setKarteiString($temp_links);
                 $text=$temp->getKartei();
             } else {
		$text='<td class="leer" width="100%" style="vertical-align:bottom;"><table width="100%" cellspacing="0" cellpadding="0" class="karten"><tr>';
		while (list($key, $val)=each($items)) {
			if (p4n_mb_string('strstr', $_SESSION['rechte_reiter'], $val)) {
				$text.='<td class="menu_karte">'.link2($key, $val.($_GET['druckoptimierung']=='1'?'&druckoptimierung=1':''), '', '', 'class="karten'.('stammdaten_main.php?nav='.$aktuell==$val?'_a':'').'"'.($_GET['druckoptimierung']=='1'?' style="font-size:12px;"':'')).'</td>';
/*				$text.='<td class="menu_karte"><a class="karten';
				if ('stammdaten_main.php?nav='.$aktuell==$val)
					$text.='_a';
				$text.='" href="'.$val.($_GET['druckoptimierung']=='1'?'&druckoptimierung=1':'').'"'.($_GET['druckoptimierung']=='1'?' style="font-size:12px;"':'').'>'.$key.'</a></td>';
                        */
		}
                }
		$text.='</tr></table></td><td width="100" class="weiss">&nbsp;</td>';
		}
        }

		return $text;
	}
	
	function karten_liste($aktuell, $ztext='', $onlyitems=false, $addget='') {
		global $cfg_fdl, $cfg_kfz, $lang, $cfg_keinrecht_kartei_liste, $cfg_neustyle, $cfg_sms, $cfg_sms_italy, $cfg_modern, $cfg_avag_sms, $cfg_ws_avag_kroatien;
		if ($cfg_kfz) {
			$items=array(
					_KARTEI_LISTE_			=>	"stammdaten_liste.php?nav=Liste",
					_KARTEI_EXPORT_			=>	"stammdaten_liste.php?nav=Export",
					_KARTEI_SERIENBRIEF_	=>	"stammdaten_liste.php?nav=Serienbrief",
					$lang['_KARTEI_EMAILING_']=>	"stammdaten_liste.php?nav=E-Mailing",
					_SMS_					=>  "stammdaten_liste.php?nav=SMS",
					_KAMPAGNE_				=>	"stammdaten_liste.php?nav=Kampagne",
					_KARTEI_TELEFONREPORT_	=>	"stammdaten_liste.php?nav=Telefonreport",
					_KARTEI_LOESCHEN_		=>	"stammdaten_liste.php?nav=Loeschen"
			);
        } elseif ($cfg_fdl) {
			$items=array(
					_KARTEI_LISTE_			=>	"stammdaten_liste.php?nav=Liste",
					_KARTEI_EXPORT_			=>	"stammdaten_liste.php?nav=Export",
					_KARTEI_SERIENBRIEF_	=>	"stammdaten_liste.php?nav=Serienbrief",
					$lang['_KARTEI_EMAILING_']=>	"stammdaten_liste.php?nav=E-Mailing",
					_KAMPAGNE_				=>	"stammdaten_liste.php?nav=Kampagne",
					_KARTEI_TELEFONREPORT_	=>	"stammdaten_liste.php?nav=Telefonreport",
					_KARTEI_LOESCHEN_		=>	"stammdaten_liste.php?nav=Loeschen"
			);
        } else {
			$items=array(
					_KARTEI_LISTE_			=>	"stammdaten_liste.php?nav=Liste",
					_KARTEI_EXPORT_			=>	"stammdaten_liste.php?nav=Export",
					_KARTEI_SERIENBRIEF_	=>	"stammdaten_liste.php?nav=Serienbrief",
					$lang['_KARTEI_EMAILING_']=>	"stammdaten_liste.php?nav=E-Mailing",
					_SMS_					=>  "stammdaten_liste.php?nav=SMS",
					_KAMPAGNE_				=>	"stammdaten_liste.php?nav=Kampagne",
					_KARTEI_TELEFONREPORT_	=>	"stammdaten_liste.php?nav=Telefonreport",
					_KARTEI_STATISTIK_		=>	"stammdaten_liste.php?nav=Statistik",
					_KARTEI_LOESCHEN_		=>	"stammdaten_liste.php?nav=Loeschen"
			);
        }
        if (!$cfg_sms and !$cfg_avag_sms and !$cfg_ws_avag_kroatien and !$cfg_sms_italy) {
			unset($items[_SMS_]);
		}
		
		unset($items[_KARTEI_TELEFONREPORT_]);
        if ($onlyitems) {
			@reset($cfg_keinrecht_kartei_liste);
			while (list($key, $val)=@each($cfg_keinrecht_kartei_liste)) {
				unset($items[$val]);
			}
            return $items;
		}
		
        if ($cfg_modern) {
            $links='';
            while (list($key, $val)=each($items)) {
                if (p4n_mb_string('strstr', $_SESSION['rechte_reiter'], $val)) {
                    if ($key==_KAMPAGNE_) {
                        $key=_WVL_.'-'._KAMPAGNE_;
                    }
                    $links.='<!SMke1>'.link2($key, $val.$addget, '', '', 'class="karten'.('stammdaten_liste.php?nav='.$aktuell==$val?'_a':'').'" onClick="P4nBoxHelper.startloading();"').'<!SMke2>';
                }
            }

            $temp=new Modern_Template_SubMenu();
            $temp->title_zweizeiler=true;
            $temp->wrapper_marginbottom=true;
            $temp->wrapper_small=false;
            $temp->setTitle($ztext);
            $temp->setKarteiString($links);
            $temp->setHtml();
            return $temp->getHtml();
        }
		$stiln1='';
		if ($cfg_neustyle) {
			if (isset($_SESSION['stil'])) {
				if (preg_match('/style(.*)\.css/i', $_SESSION['stil'], $sma1)) {
					$stiln1=$sma1[1];
				}
				if (!is_file('img/verlauf'.$stiln1.'.jpg')) {
					$stiln1='';
				}
			}
		}
		
		if ($cfg_neustyle) {
//		$text='<td class="menu_karten" width="100%" height="35" style="background: #fff url(img/verlauf.jpg) repeat-x top left; vertical-align:bottom; text-align: right;{zusst}"><table width="100%" height="10" border=0 class="karten" cellspacing=0 cellpadding=0><tr><td class="menu_karten_liste" width="30%" rowspan=2>'.$ztext.'</td><td colspan="10" class="menu_karten">&nbsp;</td></tr><tr>';
		$text='<td class="menu_karten_liste" width="40%" style="background: #fff url(img/verlauf'.$stiln1.'.jpg) repeat-x top left; vertical-align:middle; text-align: center;">'.$ztext.'</td><td class="leer" width="60%" style="background: #fff url(img/verlauf'.$stiln1.'.jpg) repeat-x top left; vertical-align:bottom; text-align: right;"><div id="header" style="height: 48px"><div id="nav"><ul>';
		$ki=0;
		while (list($key, $val)=each($items)) {
			if (p4n_mb_string('strstr', $_SESSION['rechte_reiter'], $val)) {
				
				if ($key==_KAMPAGNE_) {
					$key=_WVL_.'-'._KAMPAGNE_;
				}
				
				$zusc='';
				if ($ki==0) {
					$zusc=' class="first"';
				}
				if ('stammdaten_liste.php?nav='.$aktuell==$val) {
					$zusc=' class="active"';
				}
				
				$text.='<li'.$zusc.'>'.link2($key, $val.$addget);
				$text.='</li>';
				$ki++;
			}
		}
		$text.='</ul></div></div></td><td width="1px;" style="background: #fff url(img/verlauf'.$stiln1.'.jpg) repeat-x top left;"></td>';
		} else {
            $text='<td class="menu_karten" width="100%" height="35"><table width="100%" height="10" border=0 class="karten" cellspacing=0 cellpadding=0><tr><td class="menu_karten_liste" width="30%" rowspan=2>'.$ztext.'</td><td colspan="10" class="menu_karten">&nbsp;</td></tr><tr>';
            while (list($key, $val)=each($items)) {
                if (p4n_mb_string('strstr', $_SESSION['rechte_reiter'], $val)) {

                    if ($key==_KAMPAGNE_) {
                        $key=_WVL_.'-'._KAMPAGNE_;
                    }

                    $text.='<td class="menu_karte">'.link2($key, $val.$addget, '', '', 'class="karten'.('stammdaten_liste.php?nav='.$aktuell==$val?'_a':'').'"');
                    $text.='</td>';
                }
            }
            $text.='</tr></table></td>';
		}
		return $text;
	}

	function produktauswahl($id=0, $text_auswahl=array(), $huau=false, $stid=0, $abku=0, $p2id=false, $sortf='') {
		$db=new PDB;
		global $sql_tab, $sql_tabs, $kircheis, $cfg_kfz, $cfg_invitek, $cfg_fdl, $phs, $entferne_string;
		static $ebene=0;
		
		$abk=0;
		if ($abku>0) {
			$abk=$abku;
		} elseif (preg_match('/kalender\.php/i', $phs)) {
			$abk=30;
		}
		
		if ($cfg_kfz and !$p2id) {
			
			$ku_id=$_SESSION['stammdaten_id'];
			if ($stid>0) {
				$ku_id=$stid;
			}
            $sqlt = array(
                $sql_tabs['produktzuordnung']['produktzuordnung_id'],
                $sql_tabs['produktzuordnung']['kennzeichen'],
                $sql_tabs['produktzuordnung']['typ_modell'],
                $sql_tabs['produktzuordnung']['datum_ez'],
                $sql_tabs['produktzuordnung']['datum_tuev'],
                $sql_tabs['produktzuordnung']['datum_asu'],
                $sql_tabs['produktzuordnung']['fahrgestell']
            );
            $where = $sql_tabs['produktzuordnung']['stammdaten_id'].'='.$db->dbzahl($ku_id);
            if ($_SESSION['cfg_kunde'] === 'carlo_koltes') {
                $sqlt[] = $sql_tabs['produktzuordnung']['stammdaten_id'];
                $sqlt[] = $sql_tabs['produktzuordnung']['vorbesitzer'];
                $where_add = $sql_tabs['produktzuordnung']['vorbesitzer'].'='.$db->dbzahl($ku_id);
                $sales = $offers = array();
                $carSales = Car_History_Main::getCarSales($ku_id);
                foreach ($carSales as $carId => $newCust) {
                    $sales[] = $carId;
                }
                $res_a = $db->select(
                    $sql_tab['opportunity'],
                    $sql_tabs['opportunity']['produkt_id'],
                    $sql_tabs['opportunity']['stammdaten_id'].'='.$db->dbzahl($ku_id).' AND '.
                    $sql_tabs['opportunity']['produkt_id'].'>'.$db->dbzahl(0).' AND '.
                    $sql_tabs['opportunity']['phase'].'='.$db->str(_ANGEBOT_)
                );
                while ($row_a = $db->zeile($res_a)) {
                    $carId = $row_a[0];
                    if (!in_array($carId, $sales)) {
                        $offers[] = $carId;
                    }
                }
                if (!empty($offers) || !empty($sales)) {
                    $where_add .= ' or '.$db->dbzahlin(array_merge($sales, $offers), $sql_tabs['produktzuordnung']['produktzuordnung_id']);
                }
                $where='('.$where.' or '.$where_add.')';
                if (empty($sortf)) {
                    $sortf = $sql_tabs['produktzuordnung']['typ_modell'];
                }
            }
			if ($huau) {
				$where.=' and (('.$sql_tabs['produktzuordnung']['datum_tuev']
						.'>='.$db->str(humonat().'-01').' and '.
					$sql_tabs['produktzuordnung']['datum_tuev']
						.'<='.$db->str(humonat().'-28').') or ('.
					$sql_tabs['produktzuordnung']['datum_asu']
						.'>='.$db->str(humonat().'-01').' and '.
					$sql_tabs['produktzuordnung']['datum_asu']
						.'<='.$db->str(humonat().'-28').'))';
			}
			$res=$db->select(
				$sql_tab['produktzuordnung'],
                $sqlt,
				$where,
				$sortf
			);
			$anzahl_pz=0;
			while ($row2=$db->zeile($res)) {
				$te=$row2[1].' / '.produktbezeichnung($row2[2], $row2[6], $row2[0]).' / '._KFZ_EZ_.': '.$db->unixdate($row2[3]).($huau?' / HU/AU: '.$db->unixdate($row2[4]).($row2[5]!=$row2[4]?'/'.$db->unixdate($row2[5]):''):'');
				if ($abk>0) {
					$te=abkuerzung($te, $abk);
				}
				if ($entferne_string != '') {
                   $te = str_replace($entferne_string, '', $te);
                }
				$text_auswahl[$row2[0]]=$te;
				$anzahl_pz++;
                if ($_SESSION['cfg_kunde'] === 'carlo_koltes') {
                    if ($ku_id == $row2[7]) {
                        $optGroup = _IM_BESITZ_.' + '._ZUM_VERKAUF_;
                    } elseif ($ku_id == $row2[8] || in_array($row2[0], $sales)) {
                        $optGroup = _VERKAUFT_;
                    } else {
                        $optGroup = _ANGEBOT_;
                    }
                    $optGroups[$optGroup][] = $row2[0];
                }
			}
            if ($_SESSION['cfg_kunde'] === 'carlo_koltes') {
                $tmp = array();
                foreach (array(_ANGEBOT_, _IM_BESITZ_.' + '._ZUM_VERKAUF_, _VERKAUFT_) as $optGroup) {
                    if (!isset($optGroups[$optGroup])) {
                        continue;
                    }
                    $tmp[$optGroup] = 'OPTGROUP';
                    foreach ($optGroups[$optGroup] as $id) {
                        $tmp[$id] = $text_auswahl[$id];
                    }
                }
                $text_auswahl = $tmp;
            }
			return $text_auswahl;
		} else {
			$alle_gr=array();
			$res=$db->select(
				$sql_tab['produkt_gruppe'],
				array(
					$sql_tabs['produkt_gruppe']['gruppe_id'],
					$sql_tabs['produkt_gruppe']['bezeichnung']
				)
			);
			while ($row=$db->zeile($res)) {
				$alle_gr[$row[0]]=$row[1];
			}
            $res=$db->select(
                $sql_tab['produkt'],
                array(
                    $sql_tabs['produkt']['produkt_id'],
                    $sql_tabs['produkt']['bezeichnung'],
                    $sql_tabs['produkt']['gruppe_id']
                ),
                $sql_tabs['produkt']['parent_id'].'='.$db->dbzahl($id)
            );
            $anzahl_pz=0;
            while ($row2=$db->zeile($res)) {
                $text_auswahl[$row2[0]]=(isset($alle_gr[$row2[2]])?$alle_gr[$row2[2]].' - ':'').str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$ebene).$row2[1];
                $ebene++;
                $anzahl_pz++;
                produktauswahl($row2[0], $text_auswahl);
                $ebene--;
            }
            @asort($text_auswahl);
            return $text_auswahl;
        }		
	}
	
	function humonat($anders=false) {
		if (isset($_SESSION['huau_monat'])) {
			if ($anders) {
				return $_SESSION['huau_monat'].'.'.$_SESSION['huau_jahr'];
			} else {
				return $_SESSION['huau_jahr'].'-'.$_SESSION['huau_monat'];
			}
		}
		
		$x=60*60*24*30+mktime(0,0,0,date('m'), 15,date('Y'));
		if ($anders)
			$x=date('m.Y', $x);
		else
			$x=date('Y-m', $x);
		return $x;
	}
	
	function trmonat($anders=false) {
		if (isset($_SESSION['tr_monat'])) {
			if ($anders) {
				return $_SESSION['tr_monat'].' - '.$_SESSION['tr_jahr'];
			} else {
				return $_SESSION['tr_jahr'].'-'.$_SESSION['tr_monat'];
			}
		}
		
		$x=mktime(0,0,0,date('m'), 15,date('Y'));
		if ($anders)
			$x=date('m.Y', $x);
		else
			$x=date('Y-m', $x);
		return $x;
	}
	
	function produktbezeichnung($text, $fgnr='', $pid=0, $only_pid=false) {
		$db=new PDB;
		global $sql_tab, $sql_tabs;
		
        if (!$only_pid) {
            $zuswhere='';
            if ($fgnr!='') {
                $zuswhere=' and '.$sql_tabs['kfztypen']['bj'].' like '.$db->str('%'.p4n_mb_string('substr', $fgnr, 0, 3).'%');
            } elseif (intval($pid)>0) {
                $res=$db->select(
                    $sql_tab['produktzuordnung'],
                    $sql_tabs['produktzuordnung']['fahrgestell'],
                    $sql_tabs['produktzuordnung']['produktzuordnung_id'].'='.$db->dbzahl($pid)
                );
                if ($row=$db->zeile($res)) {
                    $fgnr=$row[0];
                    $zuswhere=' and '.$sql_tabs['kfztypen']['bj'].' like '.$db->str('%'.p4n_mb_string('substr', $fgnr, 0, 3).'%');
                }
            }
            
            if (p4n_mb_string('substr', $_SESSION['cfg_kunde'], 0, 10)!='carlo_opel' and p4n_mb_string('substr', $_SESSION['cfg_kunde'], 0, 9)!='carlo_bmw') {
                $res=$db->select(
                        $sql_tab['kfztypen'],
                        $sql_tabs['kfztypen']['bezeichnung'],
                        $sql_tabs['kfztypen']['typ'].'='.$db->str(trim($text))
                );
                if ($row=$db->zeile($res)) {
                    if (trim($row[0])!='') {
                        $text=$row[0];
                    }
                } else {
                    $res=$db->select(
                        $sql_tab['kfztypen'],
                        $sql_tabs['kfztypen']['bezeichnung'],
                        '('.$sql_tabs['kfztypen']['typ'].'='.$db->str(p4n_mb_string('substr', $text,0,3)).' or '.
                        $sql_tabs['kfztypen']['typ'].'='.$db->str(p4n_mb_string('substr', $text,0,4)).($zuswhere!=''?' or '.$sql_tabs['kfztypen']['typ'].'='.$db->str('NURFGNR'):'').')'.$zuswhere
                    );
                    if ($row=$db->zeile($res)) {
                        if (trim($row[0])!='') {
                            $text=$row[0];
                        }
                    }
                }
            }
            if ($_SESSION['cfg_kunde']!='carlo_vw_barth' and $pid>0 and (preg_match('/vw/i', $_SESSION['cfg_kunde']) or preg_match('/audi/i', $_SESSION['cfg_kunde']) or preg_match('/kunde/i', $_SESSION['cfg_kunde']))) {
                $res=$db->select(
                    $sql_tab['produktzuordnung'],
                    $sql_tabs['produktzuordnung']['typ'],
                    $sql_tabs['produktzuordnung']['produktzuordnung_id'].'='.$db->dbzahl($pid)
                );
                if ($row=$db->zeile($res)) {
                    if (p4n_mb_string('strlen', $row[0])>8 or !preg_match('/\d/', $row[0])) {
                        if ($row[0]!='') {
                            $text=$row[0];
                        }
                    }
                }
            }
            if ($pid>0 && $_SESSION['cfg_kunde']=='carlo_koltes') {
                $res=$db->select(
                    $sql_tab['produktzuordnung'],
                    array(
                        $sql_tabs['produktzuordnung']['typ_modell'],
                        $sql_tabs['produktzuordnung']['km_stand'],
                        $sql_tabs['produktzuordnung']['datum_ez'],
                        $sql_tabs['produktzuordnung']['kennzeichen'],
                        $sql_tabs['produktzuordnung']['fahrgestell']
                    ),
                    $sql_tabs['produktzuordnung']['produktzuordnung_id'].'='.$db->dbzahl($pid)
                );
                $alle_werte = array();
                global $entferne_string;
                //$entferne_string = '';
                if ($row=$db->zeile($res)) {
                    if (trim($row[0]) != '') {
                        $alle_werte[] = $row[0];
                    }
                    if (trim($row[1]) != '') {
                        $alle_werte[] = number_format(intval($row[1]), 0, ',', '.').' km';
                    }
                    /*
                    if (trim($row[2]) != '' && $row[2] != '0000-00-00') {
                        $alle_werte[] = $db->unixdate($row[2]);
                    }*/
                    if (trim($row[3]) != '') {
                        $entferne_string = $row[3].' / ';
                    }
                    if (trim($row[4])) {
                        $alle_werte[] = $row[4];
                    }
                }
                $alle_werte[] = 'ID: '.$pid;
                $text = implode(' / ', $alle_werte);
            } 
        } else {
            if ($pid > 0) {
               $res=$db->select(
                   $sql_tab['produktzuordnung'],
                   array(
                        $sql_tabs['produktzuordnung']['km_stand'],
                        $sql_tabs['produktzuordnung']['kennzeichen'],
                        $sql_tabs['produktzuordnung']['fahrgestell'],
                        $sql_tabs['produktzuordnung']['typ_modell'],
                        $sql_tabs['produktzuordnung']['datum_ez'],
                        $sql_tabs['produktzuordnung']['typ']
                   ),
                   $sql_tabs['produktzuordnung']['produktzuordnung_id'].'='.$db->dbzahl($pid)
               );
               $alle_werte = array();
               if ($row=$db->zeile($res)) {
                   $alle_werte = $row;
               }
               return $alle_werte;
           }   
        }
        $text=p4n_mb_string('str_replace', array('"', "'", '&gt;', '&lt;'), array('', '', '>', '<'), $text);
		return trim($text);
	}
	
	function kundenbezeichnung($text, $vp=false, $abk=15) {
		//$db=new PDB;
        global $sql_tab, $sql_tabs, $carlo_tw;
        global $kundenbezeichnung_array;
        global $db;        
        
        if (!is_a($db, 'PDB')) {
            $db=new PDB;
        }
        
        if (!is_array($kundenbezeichnung_array)) {
            $kundenbezeichnung_array = array();
        }
        
        if (isset($kundenbezeichnung_array[$text])) {
            $anzeigename = $kundenbezeichnung_array[$text];
        } else {
            $anzeigename = $text;
            $res=$db->select(
                    $sql_tab['stammdaten'],
                    array(
                        $sql_tabs['stammdaten']['anzeigename'],
                        $sql_tabs['stammdaten']['vpnr'],
                        $sql_tabs['stammdaten']['name'],
                        $sql_tabs['stammdaten']['vorname'],
                        $sql_tabs['stammdaten']['firma1']
                    ),
                    $sql_tabs['stammdaten']['id'].'='.$db->dbzahl($text)
                );
            if ($row=$db->zeile($res)) {
                $anzeigename = trim($row[0]);
                if ($carlo_tw) {
                    if ($row[4] == '') {
                    $anzeigename = trim($row[2].' '.$row[3]);
                    } else {
                        if ($anzeigename == '') {
                            $anzeigename = $row[4];
                        }
                    }
                }
            }
            $kundenbezeichnung_array[$text] = $anzeigename;
        }
		if ($vp) {
            return abkuerzung($anzeigename, $abk);//.(($row[1]!='0' and $row[1]!='')?' ('.$row[1].')':'');
        } else {
            return $anzeigename;
        }
	}
	
	function abkuerzung($text, $laenge=20, $trennzeichen='/') {
		$textb='';
        if (p4n_mb_string('strlen', $text)>$laenge) {
		//	$textb=p4n_mb_string('substr', $text, 0, $laenge-2).'..';
			$textb=p4n_mb_string('substr', $text, 0, $laenge-2).'..';
		} else {
			$textb=$text;
		}
        if (preg_match('/\<br\>/', $textb)) {
            $textb=p4n_mb_string('str_replace', '<br>', $trennzeichen,$textb);
        }
		return $textb;
	}
	
	function keinaus($janein) {
		if ($janein==1)
			return '<img src="bilder/pfeil_links.gif" border=0>';
		else
			return '<img src="bilder/pfeil_rechts.gif" border=0>';
	}
	function grafikhaken($janein, $nurl=false) {
		if ($nurl) {
			if ($janein==1)
				return 'hakengruen.gif';
			else
				return 'ausrufrot.gif';
		} else {
			if ($janein==1)
				return '<img src="bilder/hakengruen.gif" border=0>';
			else
				return '<img src="bilder/ausrufrot.gif" border=0>';
		}
	}
	
	function docbild($datei, $nurl=false) {
		$text='';
        switch (p4n_mb_string('substr', $datei,-4)) {
            case '.rtf':
            case '.doc':
            case 'docx':
            case '.pdf':
                if ($nurl) {
                    $text='vorlage.gif';
                } else {
                    $text='<img src="bilder/vorlage.gif" border=0>';
                }
                break;
            default:
                $text='Link';
                break;
        }
		return $text;
	}
	
	function leerestabelement($text) {
		if ($text=='')
			return '&nbsp;';
		else
			return $text;
	}
	
	function zahl($wert, $stellen=2) {
		return number_format(doubleval($wert), $stellen, ",", ".");
	}

    function zahl_prozent($wert, $stellen=2) {
        return zahl($wert*100, $stellen).' %';
    }

	function zahlkb($wert) {
        // changed b to B because its byte and not bit
		return number_format(((int)($wert))/1024, 2, ",", ".").' kB';
	}
    
    function zahl_seconds($secs=0, $trennzeichen = ', ', $short_language=false) {
        $tage=0;
        $stunden=0;
        $minuten=0;
        $sekunden = $secs;
        
        if ($secs >= 60) {
            $minuten = intval($secs / 60);
            $sekunden = $secs % 60;
        }
        if ($minuten > 60) {
            $stunden = intval($minuten / 60);
            $minuten = $minuten % 60;
        }
        if ($stunden > 24) {
            $tage = intval($stunden / 24);
            $stunden = $stunden % 24;
        }
        if ($tage > 30) {
            $monate = intval($tage / 30);
            $tage = $tage % 30;
        }
        if ($monate > 12) {
            $jahre = intval($monate / 12);
            $monate = $monate % 12;
        }
        $result = array();
        if ($jahre > 0) {
            $result[]=$jahre.' '.($short_language ? _JAHRE_KURZ_ : _JAHRE_);
        }
        if ($monate > 0) {
            $result[]=$monate.' '.($short_language ? _MONATE_KURZ_ : _MONATE_);
        }
        if ($tage > 0) {
            $result[]=$tage.' '.($short_language ? _LS_ABK_TAGE_ : _TAGE_);
        }
        if ($stunden > 0) {
            $result[]=$stunden.' '.($short_language ? _LS_ABK_STUNDEN_ : _TASK_HOURS_);
        }
        if ($minuten > 0) {
            $result[]=$minuten.' '.($short_language ? _LS_ABK_MINUTEN_ : _TASK_MINUTES_);
        }
        if ($sekunden > 0) {
            $result[]=$sekunden.' '.($short_language ? _LS_ABK_SEKUNDEN_ : _SEKUNDEN_);
        }
        return implode($trennzeichen, $result);
    }
    
	function zahlInByteFormat($wert, $format='b') {
	    $factor=0;
	    $type='';
	    switch ($format){
            case 'kb':
                $factor = 1;
                $type = 'kB';
                break;
            case 'mb':
                $factor = 2;
                $type = 'MB';
                break;
            case 'gb':
                $factor = 3;
                $type = 'GB';
                break;
            case 'tb':
                $factor = 4;
                $type = 'TB';
                break;
            case 'pb':
                $factor = 5;
                $type = 'PB';
                break;
            case 'eb':
                $factor = 6;
                $type = 'EB';
                break;
            case 'zb':
                $factor = 7;
                $type = 'ZB';
                break;
            case 'yb':
                $factor = 8;
                $type = 'YB';
                break;
            default:
                $factor=0;
                $type = 'B';
                break;
        }
		return number_format(((int)($wert))/($factor>0?pow(1024,$factor):1), ($factor>0?2:0), ",", ".").' '.$type;
	}
	
	function sb_ersetzen($pattern, $replacement, $text, $nureinmal=false) {
		global $sb_et_durch, $sb_et_durch2, $ist_docx, $alle_ersetzungen;
		$text2='';
		
		$m_pattern=$pattern;
		if (p4n_mb_string('strpos', $pattern, '/')===false) {
			$pattern='/'.preg_quote($pattern).'/';
		}
		
		if ($ist_docx) {
			$replacement=p4n_mb_string('utf8_encode', $replacement);
			$replacement=p4n_mb_string('str_replace', '&', '&amp;', $replacement);
		}
		
		if ((p4n_mb_string('strpos', $pattern, '_>>')!==false or p4n_mb_string('strpos', $pattern, '_\\>\\>')!==false) and $replacement!='' and $replacement!='-') {
			$replacement.=' \\par ';
		}
		if ((p4n_mb_string('strpos', $pattern, '<<_')!==false or p4n_mb_string('strpos', $pattern, '\\<\\<_')!==false) and $replacement!='' and $replacement!='-') {
			$replacement=' \\par '.$replacement;
		}
		
		$sub1='';
		if (substr($pattern, -2)=='/i') {
			$sub1='/i';
			$pattern2=substr($pattern, 0, -2);
		} elseif (substr($pattern, -1)=='/') {
			$sub1='/';
			$pattern2=substr($pattern, 0, -1);
		}
		$pre1='';
		if (substr($pattern, 0, 1)=='/') {
			$pre1='/';
			$pattern2=substr($pattern2, 1);
		}
		if ($pattern2!='') {
			$pattern2=str_replace('/', '', $pattern2);
			$pattern=$pre1.$pattern2.$sub1;
		}
		
		if (intval($nureinmal)==1) {
			if ($replacement=="Herr" and preg_match('/anrede/i', $pattern) and !preg_match('/anrede2/i', $pattern)) {
				$replacement="Herrn";
			}
			
			$text2=preg_replace($pattern, $replacement, $text, 1);
			if (isset($alle_ersetzungen)) {
				$alle_ersetzungen[]=array($pattern, $replacement, true);
			}
			if ($text==$text2) {
				$sb_et_durch2=true;
			}
		//	return $text2;
		} else {
			if (substr($replacement, 0, strlen('{\rtlch\fcs1 \af0\afs20'))=='{\rtlch\fcs1 \af0\afs20') {
				$text2=str_replace($m_pattern, $replacement, $text);
				if (isset($alle_ersetzungen)) {
					$alle_ersetzungen[]=array($m_pattern, $replacement);
				}
			} else {
				$text2=preg_replace($pattern, $replacement, $text);
				if (isset($alle_ersetzungen)) {
					$alle_ersetzungen[]=array($pattern, $replacement, true);
				}
			}
		//	return preg_replace($pattern, $replacement, $text);
		}
//echo $pattern.' / '.$replacement.'<br>';
		
		if (!$ist_docx) {
			$text2=p4n_mb_string('str_replace', array('&lt;', '&gt;'), array('<', '>'), $text2);
		}
		
		unset($text);
		return $text2;
	}
	
	function serienbrief($dokument_id, $stammdaten_id, $nurmitte=false, $zusatz='', $ap_id=0, $etiketten=false) {
		global $sql_tab, $sql_tabs, $ADODB_FETCH_MODE, $cfg_invitek, $sb_et_durch, $sbrief_2, $prefix, $l_aid2, $sql_tab_ids, $prefix, $cfg_kfz, $cfg_sb_firmaanrede, $cfg_kfzsuche_holland, $mandinfo, $beninfo, $lang, $lang_db_f, $dok_abweichend, $janein_haken, $x, $ist_docx, $cfg_serienbrief_ap_pers, $cfg_serienbrief_ap_keinefirma, $qrcode, $zusdaten_sb2, $cfg_serienbrief_nichtsplitten, $sb_pid, $ist_gesamtdok, $docx_zielbilder, $lao_aus_form, $cfg_form_sb_vorgabe_untereinander;
		global $cfg_survey_url, $ws_url_psurv, $cfg_autoupdate_proxy, $cfg_autoupdate_proxy_user, $cfg_autoupdate_proxy_password, $user1, $pass1, $vorschau;
		
		$monate=array('', _MONAT1_, _MONAT2_, _MONAT3_, _MONAT4_, _MONAT5_, _MONAT6_, _MONAT7_, _MONAT8_, _MONAT9_, _MONAT10_, _MONAT11_, _MONAT12_);
		
		$db=new PDB;
		$merke=$ADODB_FETCH_MODE;
		$db->setfetchmode(true);
		$returntext='';
		
		$dok_lesen=false;
		if ($etiketten) {
			if (!isset($sbrief_2) or $sbrief_2=='') {
				$dok_lesen=true;
			} else {
				$replace_text=$sbrief_2;
			}
		} else {
			$dok_lesen=true;
		}
		
		$where_sb1=$sql_tabs['dokument']['dokument_id'].'='.$db->dbzahl($dokument_id);
		if (isset($dok_abweichend)) {
			if ($dok_abweichend!='' and is_file($dok_abweichend)) {
				$where_sb1='';
			}
		}
		if ($dok_lesen) {
			$res=$db->select(
				$sql_tab['dokument'],
				array(
					$sql_tabs['dokument']['datei'],
					$sql_tabs['dokument']['mime']
				),
				$where_sb1
			);
			if ($row=$db->zeile($res)) {
				if (is_file('Serienbriefe/'.$row[0])) {
					$dateip='Serienbriefe/'.$row[0];
				} elseif (is_file('dokumente/'.$row[0])) {
					$dateip='dokumente/'.$row[0];
				}
				if (isset($dok_abweichend)) {
					if ($dok_abweichend!='') {
						$dateip=$dok_abweichend;
					}
				}
				
				$ende='';
				$ist_docx=false;
				if($fp=@fopen($dateip, 'rb')) {
					$inhalt=fread($fp, filesize($dateip));
					fclose($fp);
					
					if (p4n_mb_string('strtolower',p4n_mb_string('substr', $dateip, -5))=='.docx') {
						$ist_docx=true;
						$zielname1=$dateip;
						$inhalt=p4n_mb_string('str_replace', '&lt;&lt;', '<<', $inhalt);
						$inhalt=p4n_mb_string('str_replace', '&gt;&gt;', '>>', $inhalt);
						$beginn="";
						$ende='';
//echo p4n_mb_string('htmlentities', $inhalt);
						if (preg_match("/^(.*body>)(.*)(<\/w:body>.*)$/Uis",$inhalt,$gefunden)) {
							$beginn=$gefunden[1];
							$replace_text=$gefunden[2];
							$ende=$gefunden[3];
						} elseif (preg_match("/:body>(.*)(<\/w:body>.*)/imus",$inhalt,$gefunden)) {
							$replace_text=$gefunden[1];
							$inh2=p4n_mb_string('str_replace', $gefunden[1], '', $inhalt);
							if (preg_match("/^(.*body>)(.*)(<\/w:body>.*)$/Uis",$inh2,$gefunden)) {
								$beginn=$gefunden[1];
								$ende=$gefunden[3];
							}
						}
					} elseif (preg_match("/^\{(.*)(\{\\\info.*(\{[^\}]*\})\})(.*)\}$/Us",$inhalt,$gefunden)) {
						// Word:
						$beginn="";
						while (list($key,$val)=@each($gefunden))
							if ($key!=0 and $key!=(count($gefunden)-1) and $key!=(count($gefunden)-2))
								$beginn.=$gefunden[$key];
						$replace_text=$gefunden[count($gefunden)-1];
					} elseif(preg_match("/^\{(.*)(\{\\\info.*(\{.*\})\})(.*)\}/Uis",$inhalt,$gefunden)) {
						// ab PHP 5.2
						$beginn="";
						while (list($key,$val)=@each($gefunden)) {
							if ($key!=0 and $key!=(count($gefunden)-1) and $key!=(count($gefunden)-2)) {
								$beginn.=$gefunden[$key];
							}
						}
						$replace_text=$gefunden[count($gefunden)-1];
						
						$replace_text=p4n_mb_string('strstr', $inhalt, $replace_text);
						if (p4n_mb_string('substr', $replace_text, -1)=='}') {
							$replace_text=p4n_mb_string('substr', $replace_text, 0, -1);
						}
					} elseif(preg_match("/\{(.*)\}(.*)\}/s",$inhalt,$gefunden)) {
						// Wordpad:
						$beginn=$gefunden[1].'}';
						$replace_text=$gefunden[2];
					} elseif ($cfg_invitek) {
						$beginn='';
						$replace_text=$inhalt;
					} else {
						$replace_text="";
					}
				}
			}
		}
		
		// 3secur:
		if ($_SESSION['cfg_kunde']=='kunde_17' or $_SESSION['cfg_kunde']=='3secur') {
			include('inc/'.$_SESSION['cfg_kunde'].'/begruessung.php');
			// {\rtlch\fcs1 \af1\afs24 \ltrch\fcs0 \f1\fs24\insrsid15814167 [[preselection]]}
		}
		
		$m_replace_text=$replace_text;
		
			$aptext='';
			$ap_briefanrede='';
			$ap_anrede='';
			$ap_titel='';
			$ap_vorname='';
			$ap_name='';
			$ap_adresse='';
			$ap_plz='';
			$ap_ort='';
			$manredap='';
			if ($ap_id>0) {
				$res=$db->select(
					$sql_tab['stammdaten_ansprechpartner'],
					array(
						$sql_tabs['stammdaten_ansprechpartner']['anrede'],
						$sql_tabs['stammdaten_ansprechpartner']['titel'],
						$sql_tabs['stammdaten_ansprechpartner']['vorname'],
						$sql_tabs['stammdaten_ansprechpartner']['bezeichnung'],
						$sql_tabs['stammdaten_ansprechpartner']['adresse'],
						$sql_tabs['stammdaten_ansprechpartner']['plz'],
						$sql_tabs['stammdaten_ansprechpartner']['ort'],
						$sql_tabs['stammdaten_ansprechpartner']['zusatz4'],
						$sql_tabs['stammdaten_ansprechpartner']['zusatz5']
					),
/*					$sql_tabs['stammdaten_ansprechpartner']['stammdaten_id'].'='.$db->dbzahl($stammdaten_id).' and '.
*/						$sql_tabs['stammdaten_ansprechpartner']['ansprechpartner_id'].'='.$db->dbzahl($ap_id)
				);
				if ($row=$db->zeile($res)) {
					$aptext='\\par '.trim($row[1].' '.$row[2].' '.$row[3]);
					$manredap=$row[0];
					$ap_anrede=p4n_mb_string('strtolower',$row[0]);
					$ap_anrede2=p4n_mb_string('strtolower',$row[0]);
					if ($ap_anrede=='herr') {
						$ap_briefanrede='Sehr geehrter Herr';
					}
					if ($ap_anrede=='frau') {
						$ap_briefanrede='Sehr geehrte Frau';
					}
					$ap_titel=$row[1];
					$ap_titel2=$row[1];
					$ap_vorname=$row[2];
					$ap_vorname2=$row[2];
					$ap_name=$row[3];
					$ap_name2=$row[3];
					$ap_adresse=$row[4];
					$ap_plz=$row[5];
					$ap_ort=$row[6];
					if ($cfg_serienbrief_ap_pers and $ap_adresse=='') {
						$aptext.=' persönlich';
					}
					
					if ($cfg_kfzsuche_holland) {
						$aptext='\\par '.'T.a.v. '.strtolower($row[0]).($row[1]!=''?' '.$row[1]:'').' '.$row[2].($row[7]!=''?' '.$row[7]:'').' '.$row[3];
					}
				}
			}
			
			$res=$db->select(
                $sql_tab['stammdaten'],
                array(
                    $sql_tabs['stammdaten']['anrede'],
                    $sql_tabs['stammdaten']['briefanrede'],
                    $sql_tabs['stammdaten']['titel'],
                    $sql_tabs['stammdaten']['vorname'],
                    $sql_tabs['stammdaten']['name'],
                    $sql_tabs['stammdaten']['firma1'],		// 5
                    $sql_tabs['stammdaten']['firma2'],
                    $sql_tabs['stammdaten']['firma3'],
                    $sql_tabs['stammdaten']['beruf'],
                    $sql_tabs['stammdaten']['hobby'],
                    $sql_tabs['stammdaten']['branche'],		// 10
                    $sql_tabs['stammdaten']['bemerkung'],
                    $sql_tabs['stammdaten']['mandant'],
                    $sql_tabs['stammdaten']['vpb'],
                    $sql_tabs['stammdaten']['betreuer'],
                    $sql_tabs['stammdaten']['meinvp']		// 15
                ),
                $sql_tabs['stammdaten']['id'].'='.$db->dbzahl($stammdaten_id)
            );
            $row=$db->zeile($res);
//				if ($row[4]=='') {

            $manred=$row[0];
            if ($row[0]=='An') {
                $row[0]='Firma';
            }
			$m_row=$row;

			if (isset($lao_aus_form) and $lao_aus_form>0) {
				$row[13]=$lao_aus_form;
				$res2=$db->select(
					$sql_tab['mandant'],
					$sql_tabs['mandant']['parent_id'],
					$sql_tabs['mandant']['mandant_id'].'='.$db->dbzahl($row[13])
				);
				if ($row2=$db->zeile($res2)) {
					$row[12]=$row2[0];
				}
			}
			
            if ($_SESSION['cfg_kunde']=='carlo_opel_dinnebier') {
                if (!isset($mandinfo[$row[15]])) {
                    $sqltm=array(
                        $sql_tabs['mandant']['firma'],
                        $sql_tabs['mandant']['adresse'],
                        $sql_tabs['mandant']['plz'],
                        $sql_tabs['mandant']['ort'],
                        $sql_tabs['mandant']['briefkopf']
                    );
                    if (isset($sql_tabs['mandant']['telefon'])) {
                        $sqltm[]=$sql_tabs['mandant']['telefon'];
                        $sqltm[]=$sql_tabs['mandant']['fax'];
                        $sqltm[]=$sql_tabs['mandant']['email'];
                        $sqltm[]=$sql_tabs['mandant']['internet'];
                        $sqltm[]=$sql_tabs['mandant']['dealercode'];
                        if ($_SESSION['crm_version']>61 && isset($sql_tabs['mandant']['fusszeile'])) {
                            $sqltm[]=$sql_tabs['mandant']['fusszeile'];
                            $sqltm[]=$sql_tabs['mandant']['link1'];
                            $sqltm[]=$sql_tabs['mandant']['link2'];
                            $sqltm[]=$sql_tabs['mandant']['link3'];
                        }
                    }
                    $res4=$db->select(
                        $sql_tab['mandant'],
                        $sqltm,
                        $sql_tabs['mandant']['mandant_id'].'='.$db->dbzahl($row[15])
                    );
                    $row4=$db->zeile($res4);
                    $mandinfo[$row[15]]=$row4;
                }
                $replace_text=sb_ersetzen('/<<lagerort_letzte_rechnung_bezeichnung>>/', $mandinfo[$row[15]][0], $replace_text, $etiketten);
                $replace_text=sb_ersetzen('/<<lagerort_letzte_rechnung_adresse>>/', $mandinfo[$row[15]][1], $replace_text, $etiketten);
                $replace_text=sb_ersetzen('/<<lagerort_letzte_rechnung_plz>>/', $mandinfo[$row[15]][2], $replace_text, $etiketten);
                $replace_text=sb_ersetzen('/<<lagerort_letzte_rechnung_ort>>/', $mandinfo[$row[15]][3], $replace_text, $etiketten);
                $replace_text=sb_ersetzen('/<<lagerort_letzte_rechnung_briefkopf>>/', p4n_mb_string('str_replace', array("\n"), "<br>", $mandinfo[$row[15]][4]), $replace_text, $etiketten);
                $replace_text=sb_ersetzen('/<<lagerort_letzte_rechnung_telefon>>/', $mandinfo[$row[15]][5], $replace_text, $etiketten);
                $replace_text=sb_ersetzen('/<<lagerort_letzte_rechnung_fax>>/', $mandinfo[$row[15]][6], $replace_text, $etiketten);
                $replace_text=sb_ersetzen('/<<lagerort_letzte_rechnung_email>>/', $mandinfo[$row[15]][7], $replace_text, $etiketten);
                $replace_text=sb_ersetzen('/<<lagerort_letzte_rechnung_www>>/', $mandinfo[$row[15]][8], $replace_text, $etiketten);
                $replace_text=sb_ersetzen('/<<lagerort_letzte_rechnung_nummer>>/', $mandinfo[$row[15]][9], $replace_text, $etiketten);
                $replace_text=sb_ersetzen('/<<lagerort_letzte_rechnung_fusszeile>>/', p4n_mb_string('str_replace', array("\n"), "<br>", $mandinfo[$row[15]][10]), $replace_text, $etiketten);
                $replace_text=sb_ersetzen('/<<lagerort_letzte_rechnung_link1>>/', $mandinfo[$row[15]][11], $replace_text, $etiketten);
                $replace_text=sb_ersetzen('/<<lagerort_letzte_rechnung_link2>>/', $mandinfo[$row[15]][12], $replace_text, $etiketten);
                $replace_text=sb_ersetzen('/<<lagerort_letzte_rechnung_link3>>/', $mandinfo[$row[15]][13], $replace_text, $etiketten);
            }

            if (!isset($mandinfo[$row[12]])) {
                $sqltm=array(
                        $sql_tabs['mandant']['firma'],
                        $sql_tabs['mandant']['adresse'],
                        $sql_tabs['mandant']['plz'],
                        $sql_tabs['mandant']['ort'],
                        $sql_tabs['mandant']['briefkopf']
                );
                if (isset($sql_tabs['mandant']['telefon'])) {
                    $sqltm[]=$sql_tabs['mandant']['telefon'];
                    $sqltm[]=$sql_tabs['mandant']['fax'];
                    $sqltm[]=$sql_tabs['mandant']['email'];
                    $sqltm[]=$sql_tabs['mandant']['internet'];
                    $sqltm[]=$sql_tabs['mandant']['dealercode'];
                    if ($_SESSION['crm_version']>61 && isset($sql_tabs['mandant']['fusszeile'])) {
                        $sqltm[]=$sql_tabs['mandant']['fusszeile'];
                        $sqltm[]=$sql_tabs['mandant']['link1'];
                        $sqltm[]=$sql_tabs['mandant']['link2'];
                        $sqltm[]=$sql_tabs['mandant']['link3'];
                    }
                }
                $res4=$db->select(
                    $sql_tab['mandant'],
                    $sqltm,
                    $sql_tabs['mandant']['mandant_id'].'='.$db->dbzahl($row[12])
                );
                $row4=$db->zeile($res4);
                $mandinfo[$row[12]]=$row4;
            }
            $replace_text=sb_ersetzen('/<<'.bef_format(_MANDANT_.'_'._BEZEICHNUNG_).'>>/', $mandinfo[$row[12]][0], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_MANDANT_.'_'._ADRESSE_).'>>/', $mandinfo[$row[12]][1], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_MANDANT_.'_'._PLZ_).'>>/', $mandinfo[$row[12]][2], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_MANDANT_.'_'._ORT_).'>>/', $mandinfo[$row[12]][3], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_MANDANT_.'_'._BRIEFKOPF_).'>>/', p4n_mb_string('str_replace', array("\n", '<br>'), '\\par ', $mandinfo[$row[12]][4]), $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_MANDANT_.'_'._TELEFON2_).'>>/', $mandinfo[$row[12]][5], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_MANDANT_.'_'._FAX_).'>>/', $mandinfo[$row[12]][6], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_MANDANT_.'_'._EMAIL_).'>>/', $mandinfo[$row[12]][7], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_MANDANT_.'_'._WWW_).'>>/', $mandinfo[$row[12]][8], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_MANDANT_.'_'._NUMMER_).'>>/', $mandinfo[$row[12]][9], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_MANDANT_.'_'._FOOTER_).'>>/', p4n_mb_string('str_replace',array("\n", '<br>'), '\\par ', $mandinfo[$row[12]][10]), $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_MANDANT_.'_'._LINK_UPPERCASE_.'1').'>>/', $mandinfo[$row[12]][11], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_MANDANT_.'_'._LINK_UPPERCASE_.'2').'>>/', $mandinfo[$row[12]][12], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_MANDANT_.'_'._LINK_UPPERCASE_.'3').'>>/', $mandinfo[$row[12]][13], $replace_text, $etiketten);
            if (!isset($mandinfo[$row[13]])) {
                $sqltm=array(
                        $sql_tabs['mandant']['firma'],
                        $sql_tabs['mandant']['adresse'],
                        $sql_tabs['mandant']['plz'],
                        $sql_tabs['mandant']['ort'],
                        $sql_tabs['mandant']['briefkopf']
                );
                if (isset($sql_tabs['mandant']['telefon'])) {
                    $sqltm[]=$sql_tabs['mandant']['telefon'];
                    $sqltm[]=$sql_tabs['mandant']['fax'];
                    $sqltm[]=$sql_tabs['mandant']['email'];
                    $sqltm[]=$sql_tabs['mandant']['internet'];
                    $sqltm[]=$sql_tabs['mandant']['dealercode'];
                    if ($_SESSION['crm_version']>61 && isset($sql_tabs['mandant']['fusszeile'])) {
                        $sqltm[]=$sql_tabs['mandant']['fusszeile'];
                        $sqltm[]=$sql_tabs['mandant']['link1'];
                        $sqltm[]=$sql_tabs['mandant']['link2'];
                        $sqltm[]=$sql_tabs['mandant']['link3'];
                    }
                }
                $res4=$db->select(
                    $sql_tab['mandant'],
                    $sqltm,
                    $sql_tabs['mandant']['mandant_id'].'='.$db->dbzahl($row[13])
                );
                $row4=$db->zeile($res4);
                $mandinfo[$row[13]]=$row4;
            }
            $replace_text=sb_ersetzen('/<<'.bef_format(_LAGERORT_.'_'._BEZEICHNUNG_).'>>/', $mandinfo[$row[13]][0], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_LAGERORT_.'_'._ADRESSE_).'>>/', $mandinfo[$row[13]][1], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_LAGERORT_.'_'._PLZ_).'>>/', $mandinfo[$row[13]][2], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_LAGERORT_.'_'._ORT_).'>>/', $mandinfo[$row[13]][3], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_LAGERORT_.'_'._BRIEFKOPF_).'>>/', p4n_mb_string('str_replace', array("\n", '<br>'), '\\par ', $mandinfo[$row[13]][4]), $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_LAGERORT_.'_'._TELEFON2_).'>>/', $mandinfo[$row[13]][5], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_LAGERORT_.'_'._FAX_).'>>/', $mandinfo[$row[13]][6], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_LAGERORT_.'_'._EMAIL_).'>>/', $mandinfo[$row[13]][7], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_LAGERORT_.'_'._WWW_).'>>/', $mandinfo[$row[13]][8], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_LAGERORT_.'_'._NUMMER_).'>>/', $mandinfo[$row[13]][9], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_LAGERORT_.'_'._FOOTER_).'>>/', p4n_mb_string('str_replace',array("\n", '<br>'), '\\par ', $mandinfo[$row[13]][10]), $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_LAGERORT_.'_'._LINK_UPPERCASE_.'1').'>>/', $mandinfo[$row[13]][11], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_LAGERORT_.'_'._LINK_UPPERCASE_.'2').'>>/', $mandinfo[$row[13]][12], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_LAGERORT_.'_'._LINK_UPPERCASE_.'3').'>>/', $mandinfo[$row[13]][13], $replace_text, $etiketten);
			
			$alle_docx_bilder=array();
			
            if (!isset($beninfo[$row[14]])) {
                $res4=$db->select(
                    $sql_tab['benutzer'],
                    array(
                        $sql_tabs['benutzer']['vorname'],
                        $sql_tabs['benutzer']['name'],
                        $sql_tabs['benutzer']['telefon'],
                        $sql_tabs['benutzer']['email'],
                        $sql_tabs['benutzer']['signatur'],
                        $sql_tabs['benutzer']['fax'],
                        $sql_tabs['benutzer']['mobilfon'],
                        $sql_tabs['benutzer']['signatur2'],
                        $sql_tabs['benutzer']['standard_lagerort']
                    ),
                    $sql_tabs['benutzer']['benutzer_id'].'='.$db->dbzahl($row[14])
                );
                $row4=$db->zeile($res4);
                $res5=$db->select(
                    $sql_tab['mandant'],
                    $sql_tabs['mandant']['parent_id'],
                    $sql_tabs['mandant']['mandant_id'].'='.$db->dbzahl($row4[8])
                );
                if ($row5=$db->zeile($res5)) {
                    if (intval($row5[0])>0) {
                        $row4[9]=$row5[0];
                    }
                }
				if (1==1 || preg_match('/<<'.bef_format(_BETREUER_.'_'._DATENSCHUTZ1K_5_).'>>/i', $replace_text)) {
					if (is_file('dokumente/user_images/'.$row[14].'_2.jpg')) {
						$row4[98]='dokumente/user_images/'.$row[14].'_2.jpg';
						$row4[99]=file_get_contents('dokumente/user_images/'.$row[14].'_2.jpg');
					    list($userImage2_width, $userImage2_height) = getimagesize($row4[98]);
						$row4[96]=$userImage2_width;
						$row4[97]=$userImage2_height;
					}
				}
                $beninfo[$row[14]]=$row4;
            }
			if (preg_match('/<<'.bef_format(_BETREUER_.'_'._DATENSCHUTZ1K_5_).'>>/i', $replace_text)) {
				if (isset($beninfo[$row[14]][98])) {
					if ($ist_docx) {
						$bildunt_id='unt'.$row[14].'_'.xmd5();
						$alle_docx_bilder['rIdr'.$bildunt_id]=$beninfo[$row[14]][98];
						$replace_text=sb_ersetzen('<<'.bef_format(_BETREUER_.'_'._DATENSCHUTZ1K_5_).'>>', '<w:pict><v:shape id="_x0000_i1026" style="width:'.$beninfo[$row[14]][96].'.00pt;height:'.$beninfo[$row[14]][97].'.00pt" type="#_x0000_t75"><v:imagedata o:title="" r:id="rIdr'.$bildunt_id.'"/></v:shape></w:pict>', $replace_text, $etiketten);
					} else {
						$replace_text=sb_ersetzen('<<'.bef_format(_BETREUER_.'_'._DATENSCHUTZ1K_5_).'>>', '{\\pict \\picscalex100\\picscaley100\\jpegblip '.bin2hex($beninfo[$row[14]][99]).' } ', $replace_text, $etiketten);
					}
				} else {
					$replace_text=sb_ersetzen('/<<'.bef_format(_BETREUER_.'_'._DATENSCHUTZ1K_5_).'>>/', '', $replace_text, $etiketten);
				}
			}
            $replace_text=sb_ersetzen('/<<'.bef_format(_BETREUER_.'_'._VORNAME_).'>>/', $beninfo[$row[14]][0], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_BETREUER_.'_'._NAME_).'>>/', $beninfo[$row[14]][1], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_BETREUER_.'_'._TELEFON2_).'>>/', $beninfo[$row[14]][2], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_BETREUER_.'_'._EMAIL_).'>>/', $beninfo[$row[14]][3], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_BETREUER_.'_'.$lang['_ADMINBENUTZER-SIGNATUR_']).'>>/', p4n_mb_string('str_replace', array("\n", '<br>'), '\\par ', $beninfo[$row[14]][4]), $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_BETREUER_.'_'._FAX_).'>>/', $beninfo[$row[14]][5], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_BETREUER_.'_'._MOBILFON_).'>>/', $beninfo[$row[14]][6], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_BETREUER_.'_'._INFO_).'>>/', $beninfo[$row[14]][7], $replace_text, $etiketten);

            $replace_text=sb_ersetzen('/<<'.bef_format(_MITARBEITER_).'>>/', $_SESSION['mitarbeiter_name'], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_DATUM_).'>>/', adodb_date(_LOCAL_DATEFORMAT_), $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_KNTIME_).'>>/', date("H:i:s"), $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_MITARBEITER_.'_'._INFO_).'>>/', $_SESSION['mitarbeiter_infotext'], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_MITARBEITER_.'_'._EMAIL_).'>>/', $_SESSION['user_email'], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_MITARBEITER_.'_'._TELEFON2_).'>>/', $_SESSION['benutzer_tel'], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_MITARBEITER_.'_'._FAX_).'>>/', $_SESSION['benutzer_fax'], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_MITARBEITER_.'_'._MOBILFON_).'>>/', $_SESSION['benutzer_mob'], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_MITARBEITER_.'_'.$lang['_ADMINBENUTZER-SIGNATUR_']).'>>/', p4n_mb_string('str_replace', array("\n", '<br>'), '\\par ', $_SESSION['user_signatur']), $replace_text, $etiketten);
			
			if (preg_match('/<<'.bef_format(_MITARBEITER_.'_'._DATENSCHUTZ1K_5_).'>>/i', $replace_text)) {
				if (!isset($beninfo[$_SESSION['user_id']][98])) {
					$res4=$db->select(
                    $sql_tab['benutzer'],
                    array(
                        $sql_tabs['benutzer']['vorname'],
                        $sql_tabs['benutzer']['name'],
                        $sql_tabs['benutzer']['telefon'],
                        $sql_tabs['benutzer']['email'],
                        $sql_tabs['benutzer']['signatur'],
                        $sql_tabs['benutzer']['fax'],
                        $sql_tabs['benutzer']['mobilfon'],
                        $sql_tabs['benutzer']['signatur2'],
                        $sql_tabs['benutzer']['standard_lagerort']
                    ),
                    $sql_tabs['benutzer']['benutzer_id'].'='.$db->dbzahl($_SESSION['user_id'])
            	    );
        	        $row4=$db->zeile($res4);
    	            $res5=$db->select(
	                    $sql_tab['mandant'],
            	        $sql_tabs['mandant']['parent_id'],
        	            $sql_tabs['mandant']['mandant_id'].'='.$db->dbzahl($row4[8])
    	            );
	                if ($row5=$db->zeile($res5)) {
                	    if (intval($row5[0])>0) {
            	            $row4[9]=$row5[0];
        	            }
    	            }
					if (is_file('dokumente/user_images/'.$_SESSION['user_id'].'_2.jpg')) {
						$row4[98]='dokumente/user_images/'.$_SESSION['user_id'].'_2.jpg';
						$row4[99]=file_get_contents('dokumente/user_images/'.$_SESSION['user_id'].'_2.jpg');
					    list($userImage2_width, $userImage2_height) = getimagesize($row4[98]);
						$row4[96]=$userImage2_width;
						$row4[97]=$userImage2_height;
					}
                	$beninfo[$_SESSION['user_id']]=$row4;
				}
				if (isset($beninfo[$_SESSION['user_id']][98])) {
					if ($ist_docx) {
						$bildunt_id='unt'.$_SESSION['user_id'].'_'.xmd5();
						$alle_docx_bilder['rIdr'.$bildunt_id]=$beninfo[$_SESSION['user_id']][98];
						$replace_text=sb_ersetzen('<<'.bef_format(_MITARBEITER_.'_'._DATENSCHUTZ1K_5_).'>>', '<w:pict><v:shape id="_x0000_i1026" style="width:'.$beninfo[$_SESSION['user_id']][96].'.00pt;height:'.$beninfo[$_SESSION['user_id']][97].'.00pt" type="#_x0000_t75"><v:imagedata o:title="" r:id="rIdr'.$bildunt_id.'"/></v:shape></w:pict>', $replace_text, $etiketten);
					} else {
						$replace_text=sb_ersetzen('<<'.bef_format(_MITARBEITER_.'_'._DATENSCHUTZ1K_5_).'>>', '{\\pict \\picscalex100\\picscaley100\\jpegblip '.bin2hex($beninfo[$_SESSION['user_id']][99]).' } ', $replace_text, $etiketten);
					}
				} else {
					$replace_text=sb_ersetzen('/<<'.bef_format(_MITARBEITER_.'_'._DATENSCHUTZ1K_5_).'>>/', '', $replace_text, $etiketten);
				}
			}
			
            $replace_text=sb_ersetzen('/<<mn>>/i', p4n_mb_string('ucfirst', $row[7]), $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_MITARBEITER_).'>>/i', $_SESSION['mitarbeiter_name'], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<user>>/i', $_SESSION['mitarbeiter_name'], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_DATUM_).'>>/i', adodb_date(_LOCAL_DATEFORMAT_), $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format($lang_db_f['stammdaten']['beruf']).'>>/', $row[8], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format($lang_db_f['stammdaten']['hobby']).'>>/', $row[9], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format($lang_db_f['stammdaten']['branche']).'>>/', $row[10], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format($lang_db_f['stammdaten']['bemerkung']).'>>/', $row[11], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<datum>>/i', adodb_date(_LOCAL_DATEFORMAT_), $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<beruf>>/', $row[8], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<hobby>>/', $row[9], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<branche>>/', $row[10], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<bemerkung>>/', $row[11], $replace_text, $etiketten);
            
            if (!isset($beninfo[$_SESSION['user_id']])) {
                $res4=$db->select(
                    $sql_tab['benutzer'],
                    array(
                        $sql_tabs['benutzer']['vorname'],
                        $sql_tabs['benutzer']['name'],
                        $sql_tabs['benutzer']['telefon'],
                        $sql_tabs['benutzer']['email'],
                        $sql_tabs['benutzer']['signatur'],
                        $sql_tabs['benutzer']['fax'],
                        $sql_tabs['benutzer']['mobilfon'],
                        $sql_tabs['benutzer']['signatur2'],
                        $sql_tabs['benutzer']['standard_lagerort']
                    ),
                    $sql_tabs['benutzer']['benutzer_id'].'='.$db->dbzahl($_SESSION['user_id'])
                );
                $row4=$db->zeile($res4);
                $res5=$db->select(
                    $sql_tab['mandant'],
                    $sql_tabs['mandant']['parent_id'],
                    $sql_tabs['mandant']['mandant_id'].'='.$db->dbzahl($row4[8])
                );
                if ($row5=$db->zeile($res5)) {
                    if (intval($row5[0])>0) {
                        $row4[9]=$row5[0];
                    }
                }
                $beninfo[$_SESSION['user_id']]=$row4;
            }
            $std_laoid=$beninfo[$_SESSION['user_id']][8];
            $std_mandid=$beninfo[$_SESSION['user_id']][9];

            if (!isset($mandinfo[$std_mandid])) {
                $sqltm=array(
                        $sql_tabs['mandant']['firma'],
                        $sql_tabs['mandant']['adresse'],
                        $sql_tabs['mandant']['plz'],
                        $sql_tabs['mandant']['ort'],
                        $sql_tabs['mandant']['briefkopf']
                );
                if (isset($sql_tabs['mandant']['telefon'])) {
                    $sqltm[]=$sql_tabs['mandant']['telefon'];
                    $sqltm[]=$sql_tabs['mandant']['fax'];
                    $sqltm[]=$sql_tabs['mandant']['email'];
                    $sqltm[]=$sql_tabs['mandant']['internet'];
                    $sqltm[]=$sql_tabs['mandant']['dealercode'];
                }
                $res4=$db->select(
                    $sql_tab['mandant'],
                    $sqltm,
                    $sql_tabs['mandant']['mandant_id'].'='.$db->dbzahl($std_mandid)
                );
                $row4=$db->zeile($res4);
                $mandinfo[$std_mandid]=$row4;
            }
            $replace_text=sb_ersetzen('/<<'.bef_format(_STANDARD_.'_'._MANDANT_.'_'._BEZEICHNUNG_).'>>/', $mandinfo[$std_mandid][0], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_STANDARD_.'_'._MANDANT_.'_'._ADRESSE_).'>>/', $mandinfo[$std_mandid][1], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_STANDARD_.'_'._MANDANT_.'_'._PLZ_).'>>/', $mandinfo[$std_mandid][2], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_STANDARD_.'_'._MANDANT_.'_'._ORT_).'>>/', $mandinfo[$std_mandid][3], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_STANDARD_.'_'._MANDANT_.'_'._BRIEFKOPF_).'>>/', p4n_mb_string('str_replace', array("\n", '<br>'), '\\par ', $mandinfo[$std_mandid][4]), $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_STANDARD_.'_'._MANDANT_.'_'._TELEFON2_).'>>/', $mandinfo[$std_mandid][5], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_STANDARD_.'_'._MANDANT_.'_'._FAX_).'>>/', $mandinfo[$std_mandid][6], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_STANDARD_.'_'._MANDANT_.'_'._EMAIL_).'>>/', $mandinfo[$std_mandid][7], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_STANDARD_.'_'._MANDANT_.'_'._WWW_).'>>/', $mandinfo[$std_mandid][8], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_STANDARD_.'_'._MANDANT_.'_'._NUMMER_).'>>/', $mandinfo[$std_mandid][9], $replace_text, $etiketten);

            if (!isset($mandinfo[$std_laoid])) {
                $sqltm=array(
                        $sql_tabs['mandant']['firma'],
                        $sql_tabs['mandant']['adresse'],
                        $sql_tabs['mandant']['plz'],
                        $sql_tabs['mandant']['ort'],
                        $sql_tabs['mandant']['briefkopf']
                );
                if (isset($sql_tabs['mandant']['telefon'])) {
                    $sqltm[]=$sql_tabs['mandant']['telefon'];
                    $sqltm[]=$sql_tabs['mandant']['fax'];
                    $sqltm[]=$sql_tabs['mandant']['email'];
                    $sqltm[]=$sql_tabs['mandant']['internet'];
                    $sqltm[]=$sql_tabs['mandant']['dealercode'];
                }
                $res4=$db->select(
                    $sql_tab['mandant'],
                    $sqltm,
                    $sql_tabs['mandant']['mandant_id'].'='.$db->dbzahl($std_laoid)
                );
                $row4=$db->zeile($res4);
                $mandinfo[$std_laoid]=$row4;
            }
            $replace_text=sb_ersetzen('/<<'.bef_format(_STANDARD_.'_'._LAGERORT_.'_'._BEZEICHNUNG_).'>>/', $mandinfo[$std_laoid][0], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_STANDARD_.'_'._LAGERORT_.'_'._ADRESSE_).'>>/', $mandinfo[$std_laoid][1], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_STANDARD_.'_'._LAGERORT_.'_'._PLZ_).'>>/', $mandinfo[$std_laoid][2], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_STANDARD_.'_'._LAGERORT_.'_'._ORT_).'>>/', $mandinfo[$std_laoid][3], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_STANDARD_.'_'._LAGERORT_.'_'._BRIEFKOPF_).'>>/', p4n_mb_string('str_replace', array("\n", '<br>'), '\\par ', $mandinfo[$std_laoid][4]), $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_STANDARD_.'_'._LAGERORT_.'_'._TELEFON2_).'>>/', $mandinfo[$std_laoid][5], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_STANDARD_.'_'._LAGERORT_.'_'._FAX_).'>>/', $mandinfo[$std_laoid][6], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_STANDARD_.'_'._LAGERORT_.'_'._EMAIL_).'>>/', $mandinfo[$std_laoid][7], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_STANDARD_.'_'._LAGERORT_.'_'._WWW_).'>>/', $mandinfo[$std_laoid][8], $replace_text, $etiketten);
            $replace_text=sb_ersetzen('/<<'.bef_format(_STANDARD_.'_'._LAGERORT_.'_'._NUMMER_).'>>/', $mandinfo[$std_laoid][9], $replace_text, $etiketten);


            if ($_SESSION['cfg_kunde']=='carlo_opel_dinnebier') {
                if ($row[7]!='') {
                    $row[5].=' '.$row[7];
                }
                $row[5]=trim($row[5]);
            }

            // Firma splitten 2 Zeilen:
                $nexpl=explode('   ', $row[5]);
                $schonexpl=false;
                if (!$cfg_serienbrief_nichtsplitten and count($nexpl)>=2) {
                    $schonexpl=true;
                    $zk1=$nexpl[0];
                    $zk2='';
                    for ($zki=1; $zki<count($nexpl); $zki++) {
                        $zk2.=' '.$nexpl[$zki];
                    }
                    $row[5]=trim($zk1."\n\\par ".trim($zk2));
                }
                if ($cfg_serienbrief_nichtsplitten) {
                    $schonexpl=true;
                }
                if (p4n_mb_string('strlen', $row[5])>30 and !$schonexpl) {
                    $xp=preg_split('/\s+/', $row[5]);
                    $zk1='';
                    $zk2='';
                    $umbr=false;
                    while (list($key, $val)=@each($xp)) {
                        $val=trim($val);
                        if ($val=='') {
                            continue;
                        }
                        $val=trim($val);
                        if (!$umbr and p4n_mb_string('strlen', $zk1.' '.$val)<30 and p4n_mb_string('substr', p4n_mb_string('strtolower',$val), 0, 2)!='z.' and p4n_mb_string('substr', p4n_mb_string('strtolower',$val), 0, 3)!='c/o') {
                            $zk1.=$val.' ';
                        } else {
                            $umbr=true;
                            $zk2.=$val.' ';
                        }
                    }
                    $zk1=trim($zk1);
                    $zk2=trim($zk2);
                    if ($zk2!='') {
                        $row[5]=trim($zk1."\n\\par ".$zk2);
                    } else {

                    }
                }

            // Name splitten 2 Zeilen:
            $merkename_ba=p4n_mb_string('str_replace', '   ', ' ', $row[4]);

                $nexpl=explode('   ', $row[4]);
                $schonexpl=false;
                if (!$cfg_serienbrief_nichtsplitten and count($nexpl)>=2) {
                    $schonexpl=true;
                    $zk1=$nexpl[0];
                    $zk2='';
                    for ($zki=1; $zki<count($nexpl); $zki++) {
                        $zk2.=' '.$nexpl[$zki];
                    }
                    $merkename_ba=trim($zk1);
                    $row[4]=trim($zk1."\n\\par ".trim($zk2));
                }
                if ($cfg_serienbrief_nichtsplitten) {
                    $schonexpl=true;
                }
                if (p4n_mb_string('strlen', $row[4])>30 and !$schonexpl) {
                    $xp=preg_split('/\s+/', $row[4]);
                    $zk1='';
                    $zk2='';
                    $umbr=false;
                    while (list($key, $val)=@each($xp)) {
                        $val=trim($val);
                        if ($val=='') {
                            continue;
                        }
                        $val=trim($val);
                        if (!$umbr and p4n_mb_string('strlen', $zk1.' '.$val)<30 and p4n_mb_string('substr', p4n_mb_string('strtolower',$val), 0, 2)!='z.' and p4n_mb_string('substr', p4n_mb_string('strtolower',$val), 0, 3)!='c/o') {
                            $zk1.=$val.' ';
                        } else {
                            $umbr=true;
                            $zk2.=$val.' ';
                        }
                    }
                    $zk1=trim($zk1);
                    $zk2=trim($zk2);
                    if ($zk2!='') {
                        $row[4]=trim($zk1."\n\\par ".$zk2);
                    } else {

                    }
                }

            if ($cfg_serienbrief_nichtsplitten) {
                $row[4]=str_replace('   ', ' ', $row[4]);
                $row[5]=str_replace('   ', ' ', $row[5]);
            }

            // kein Titel:
            if ($_SESSION['cfg_kunde']=='carlo_opel_westphal') {
                $row[2]='';
            }
            if ($manredap!='') {
                $manred=$manredap;
            }
            $replace_text=sb_ersetzen('<<anrede2>>', $manred, $replace_text, $etiketten);

            $ist_ftext='';
            if ($etiketten) {
                if ($row[5]!='') {
                    $firma=$row[5];
                    if ($row[4]!='' and $row[4]!=$firma and $row[3]!='' and !preg_match('/'.preg_quote($row[3]).'/i', $firma)) {
                        if (!preg_match('/\n/', $row[4]) and !preg_match('/\n/', $firma)) {
                            $firma=trim(trim($row[3].' '.$row[4])."\n\\par ".$firma);
                        } else {
                            $firma=trim(trim($row[3].' '.$row[4]).' '.$firma);
                        }
                    } else {
                        if ($row[4]!='' and $row[4]!=$row[5]) {
                            $firma=trim($row[4].' '.$firma);
                        }
                        if ($row[3]!='' and !preg_match('/'.preg_quote($row[3]).'/i', $row[5])) {
                            $firma=trim($row[3].' '.$firma);
                        }
                    }
                }
                $ist_ftext=$firma;
            } elseif ($row[5]!='') {
                // Firma
                $firma=$row[5];
                if ($row[4]!='' and $row[4]!=$firma and $row[3]!='' and !preg_match('/'.preg_quote($row[3]).'/i', $firma)) {
                    if (!preg_match('/\n/', $row[4]) and !preg_match('/\n/', $firma)) {
                        $firma=trim(trim($row[3].' '.$row[4])."\n\\par ".$firma);
                    } else {
                        $firma=trim(trim($row[3].' '.$row[4]).' '.$firma);
                    }
                } else {
                    if ($row[4]!='' and $row[4]!=$row[5]) {
                        $firma=trim($row[4].' '.$firma);
                    }
                    if ($row[3]!='' and !preg_match('/'.preg_quote($row[3]).'/i', $row[5])) {
                        $firma=trim($row[3].' '.$firma);
                    }
                }
                if ($row[1]=='Sehr geehrter Herr')
                    $row[1]='Sehr geehrte Damen und Herren';

                if ($ap_anrede=='frau' or $ap_anrede=='herr') {
                    if ($ap_anrede=='frau') {
                        $row[1]='Sehr geehrte Frau';
                    } else {
                        $row[1]='Sehr geehrter Herr';
                    }
                    if ($ap_titel!='') {
                        $row[1].=' '.$ap_titel;
                    }
                    $row[1].=' '.$ap_name;
                } elseif ($row[1]=='Sehr geehrte Damen und Herren') {
                    $replace_text=sb_ersetzen('/<<briefanrede>>[^<]*<<name>>/i', ($row[1]==''?'Sehr geehrte Damen und Herren':$row[1]), $replace_text, $etiketten);
                    $replace_text=sb_ersetzen('/<<briefanrede>>.*<<titel>>.*<<name>>/i', ($row[1]==''?'Sehr geehrte Damen und Herren':$row[1]), $replace_text, $etiketten);
                }

                if ($ap_adresse!='' and $cfg_serienbrief_ap_keinefirma) {
                    $firma=$ap_anrede;
                    if (strtolower($firma)=='herr') {
                        $firma='Herrn';
                    }
                }
                if ($cfg_sb_firmaanrede) {
                    if (trim($manred)=='') {
                        $replace_text=sb_ersetzen('/<<anrede>> <<vorname>>/', '<<anrede>><<vorname>>', $replace_text, $etiketten);
                    }
                    $replace_text=sb_ersetzen('/<<anrede>>/', trim($manred), $replace_text, $etiketten);
                } else {
                    $replace_text=sb_ersetzen('/<<anrede>> <<vorname>>/', '<<anrede>><<vorname>>', $replace_text, $etiketten);
                }
                $replace_text=sb_ersetzen('/<<anrede>>/', '', $replace_text, $etiketten);
                $replace_text=sb_ersetzen('/<<titel>>[^<]*<<vorname>>/', '<<name>>', $replace_text, $etiketten);
                $replace_text=sb_ersetzen('/<<titel>>[^<]*<<name>>/', '<<name>>', $replace_text, $etiketten);
                $replace_text=sb_ersetzen('/<<vorname>>[^<]*<<name>>/', $firma.$aptext, $replace_text, $etiketten);
                $replace_text=sb_ersetzen('/<<briefanrede>>[^<]*<<titel>>/', '<<briefanrede>>', $replace_text, $etiketten);
                $replace_text=sb_ersetzen('/<<briefanrede>>[^<]*<<name>>/', ($row[1]==''?'Sehr geehrte Damen und Herren':$row[1]), $replace_text, $etiketten);
                $replace_text=sb_ersetzen('/<<name>>/', $firma.$aptext, $replace_text, $etiketten);
                $replace_text=sb_ersetzen('/<<titel>>/', '', $replace_text, $etiketten);
                $replace_text=sb_ersetzen('/<<briefanrede>>/', $row[1], $replace_text, $etiketten);
                if ($cfg_invitek) {
                    $replace_text=sb_ersetzen('/<anrede>/', '', $replace_text, $etiketten);
                    $replace_text=sb_ersetzen('/<titel>[^<]*<vorname>/', '<name>', $replace_text, $etiketten);
                    $replace_text=sb_ersetzen('/<titel>[^<]*<name>/', '<name>', $replace_text, $etiketten);
                    $replace_text=sb_ersetzen('/<vorname>[^<]*<name>/', $firma.$aptext, $replace_text, $etiketten);
                    $replace_text=sb_ersetzen('/<briefanrede>[^<]*<titel>/', '<briefanrede>', $replace_text, $etiketten);
                    $replace_text=sb_ersetzen('/<briefanrede>[^<]*<name>/', ($row[1]==''?'Sehr geehrte Damen und Herren':$row[1]), $replace_text, $etiketten);
                    $replace_text=sb_ersetzen('/<name>/', $firma.$aptext, $replace_text, $etiketten);
                    $replace_text=sb_ersetzen('/<titel>/', '', $replace_text, $etiketten);
                    $replace_text=sb_ersetzen('/<briefanrede>/', $row[1], $replace_text, $etiketten);
                }
            } else {
                // Privatkunde
                if ($row[0]=='Firma') {
                    if ($cfg_kfz) {
                        $row[1]='';
                    }
                    $replace_text=sb_ersetzen('/<<briefanrede>>[^<]*<<name>>/i', ($row[1]==''?'Sehr geehrte Damen und Herren':$row[1]), $replace_text, $etiketten);
                }
                if ($row[0]=="Herr") {
                    $replace_text=sb_ersetzen('<<anrede>>','Herrn', $replace_text, $etiketten);
                }
                $replace_text=sb_ersetzen('/<<titel>>[^<]*<<vorname>>/', '<<vorname>>', $replace_text, $etiketten);
                $replace_text=sb_ersetzen('/<<'.bef_format(_TITEL_).'>>[^<]*<<'.bef_format(_VORNAME_).'>>/', '<<'.bef_format(_VORNAME_).'>>', $replace_text, $etiketten);
                $replace_text=sb_ersetzen('/<<titel>>[^<]*<<name>>/', '<<name>>', $replace_text, $etiketten);
                $replace_text=sb_ersetzen('/<<'.bef_format(_TITEL_).'>>[^<]*<<'.bef_format(_NAME_).'>>/', '<<'.bef_format(_NAME_).'>>', $replace_text, $etiketten);
                $replace_text=sb_ersetzen('/<<vorname>>[^<]*<<name>>/', ($row[2]!=''?$row[2].' ':'').trim($row[3].' '.$row[4]), $replace_text, $etiketten);
                $replace_text=sb_ersetzen('/<<'.bef_format(_VORNAME_).'>>[^<]*<<'.bef_format(_NAME_).'>>/', ($row[2]!=''?$row[2].' ':'').trim($row[3].' '.$row[4]), $replace_text, $etiketten);
                if ($row[1]=='Sehr geehrte Damen und Herren') {
//						$replace_text=sb_ersetzen('/<<name>>/', '', $replace_text, $etiketten);
                }
                // neu:
                if ($_SESSION['cfg_kunde']=='carlo_bmw_ahg' and preg_match('/'.$merkename_ba.'/Uis', $row[1])) {
                    $replace_text=sb_ersetzen('/<<briefanrede>>[^<]*<<name>>/i', $row[1], $replace_text, $etiketten);
                }
                $replace_text=sb_ersetzen('/<<briefanrede>>[^<]*<<name>>/i', $row[1].' '.($row[2]!=''?$row[2].' ':'').(($cfg_kfzsuche_holland and $row[7]!='')?p4n_mb_string('ucfirst', $row[7]).' ':'').$merkename_ba, $replace_text, $etiketten);
                $replace_text=sb_ersetzen('/<<'.bef_format(_BRIEFANREDE_).'>>[^<]*<<'.bef_format(_NAME_).'>>/', $row[1].' '.($row[2]!=''?$row[2].' ':'').(($cfg_kfzsuche_holland and $row[7]!='')?p4n_mb_string('ucfirst', $row[7]).' ':'').$merkename_ba, $replace_text, $etiketten);
                $replace_text=sb_ersetzen('/<<name>>/', ($row[2]!=''?$row[2].' ':'').$row[4], $replace_text, $etiketten);
                $replace_text=sb_ersetzen('/<<'.bef_format(_NAME_).'>>/', ($row[2]!=''?$row[2].' ':'').$row[4], $replace_text, $etiketten);
                $replace_text=sb_ersetzen('/<<briefanrede>>/', $row[1], $replace_text, $etiketten);
                $replace_text=sb_ersetzen('/<<'.bef_format(_BRIEFANREDE_).'>>/', $row[1], $replace_text, $etiketten);
            }
			
			
			if (isset($l_aid2)) {
				$replace_text=sb_ersetzen('/<<referenz_ueberweisung>>/', $l_aid2, $replace_text, $etiketten);
			}
			
			$replace_text=sb_ersetzen('/<<qrcode>>/', $qrcode, $replace_text, $etiketten);
			
			$replace_text=sb_ersetzen('<<mitarbeiter>>', $_SESSION['mitarbeiter_name'], $replace_text, $etiketten);
			if (!isset($_SESSION['mitarbeiter_infotext'])) {
				$res4=$db->select(
					$sql_tab['benutzer'],
					$sql_tabs['benutzer']['signatur2'],
					$sql_tabs['benutzer']['benutzer_id'].'='.$db->dbzahl($_SESSION['user_id'])
				);
				$row4=$db->zeile($res4);
				$_SESSION['mitarbeiter_infotext']=p4n_mb_string('str_replace', array("\n", '<br>'), "\\par ", $row4[0]);
			}
			$replace_text=sb_ersetzen('<<mitarbeiter_info>>', $_SESSION['mitarbeiter_infotext'], $replace_text, $etiketten);
			$replace_text=sb_ersetzen('<<mitarbeiter_email>>', $_SESSION['user_email'], $replace_text, $etiketten);
			$replace_text=sb_ersetzen('<<mitarbeiter_telefon>>', $_SESSION['benutzer_tel'], $replace_text, $etiketten);
			$replace_text=sb_ersetzen('<<mitarbeiter_fax>>', $_SESSION['benutzer_fax'], $replace_text, $etiketten);
			$replace_text=sb_ersetzen('<<mitarbeiter_mobilfon>>', $_SESSION['benutzer_mob'], $replace_text, $etiketten);
			$replace_text=sb_ersetzen('<<datum>>', date("d.m.Y"), $replace_text, $etiketten);
			$replace_text=sb_ersetzen('<<zeit>>', date("H:i:s"), $replace_text, $etiketten);
			
			$replace_text=sb_ersetzen('<<'.bef_format(_MITARBEITER_).'>>', $_SESSION['mitarbeiter_name'], $replace_text, $etiketten);
			$replace_text=sb_ersetzen('<<'.bef_format(_DATUM_).'>>', adodb_date(_LOCAL_DATEFORMAT_), $replace_text, $etiketten);
			$replace_text=sb_ersetzen('<<'.bef_format(_KNTIME_).'>>', date("H:i:s"), $replace_text, $etiketten);
			$replace_text=sb_ersetzen('<<'.bef_format(_MITARBEITER_.'_'._INFO_).'>>', $_SESSION['mitarbeiter_infotext'], $replace_text, $etiketten);
			$replace_text=sb_ersetzen('<<'.bef_format(_MITARBEITER_.'_'._EMAIL_).'>>', $_SESSION['user_email'], $replace_text, $etiketten);
			$replace_text=sb_ersetzen('<<'.bef_format(_MITARBEITER_.'_'._TELEFON2_).'>>', $_SESSION['benutzer_tel'], $replace_text, $etiketten);
			$replace_text=sb_ersetzen('<<'.bef_format(_MITARBEITER_.'_'._FAX_).'>>', $_SESSION['benutzer_fax'], $replace_text, $etiketten);
			$replace_text=sb_ersetzen('<<'.bef_format(_MITARBEITER_.'_'._MOBILFON_).'>>', $_SESSION['benutzer_mob'], $replace_text, $etiketten);
			
			if (preg_match_all("/<<".p4n_mb_string('strtolower', _UMFRAGE_)."_(\d+)>>/m",$replace_text,$matches)) {
					@reset($matches[1]);
					while (list($keyu, $valu)=@each($matches[1])) {
						include_once('inc/lib_survey.php');
						$uwerte=array(array(
									'mail' => $stammdaten_id.'_'.$ap_id,
                                    'stdid' => $stammdaten_id,
                                    'apid' => $ap_id,
                                    'aufid' => 0,
                                    'pid' => 0
						));
						$li1='';
						if ($vorschau) {
							$li1='Vorschau';
						} else {
							$uerg=psurv_recht($valu, $uwerte);
							if (isset($uerg[0]['link'])) {
								$li1=psurv_getlink($valu, $stammdaten_id, $uerg[0]['link']);
							}
						}
						
						if (is_file('inc/phpqrcode.php')) {
							$scale_sbo=85;
							$sb_qr='';
							include_once('inc/phpqrcode.php');
							$datei_te='temp/_qrumf_'.$_SESSION['user_id'].'.jpg';
							if ($ist_docx) {
								$datei_te='temp/_qrumf_dx_'.$valu.'_'.$stammdaten_id.'_'.$ap_id.'_'.$_SESSION['user_id'].'.jpg';
							}
							QRcode::jpg($li1, $datei_te);
							if (is_file($datei_te)) {
								if ($ist_docx) {
									$alle_docx_bilder['rIdr'.$valu.'_'.$stammdaten_id.'_'.$ap_id]=$datei_te;
									$li1='<w:pict><v:shape id="_x0000_i1026" style="width:100.00pt;height:100.00pt" type="#_x0000_t75"><v:imagedata o:title="" r:id="'.'rIdr'.$valu.'_'.$stammdaten_id.'_'.$ap_id.'"/></v:shape></w:pict>';
								} else {
									$bildinh=file_get_contents($datei_te);
									$bildinh2=bin2hex($bildinh);
									$sb_qr='{\\pict \\picscalex'.$scale_sbo.'\\picscaley'.$scale_sbo.'\\jpegblip '.$bildinh2.' } ';
									unlink($datei_te);
									$li1=$sb_qr;
								}
							}
						}
						$replace_text=sb_ersetzen($matches[0][$keyu], $li1, $replace_text, $etiketten);
					}
			}
			
			if (intval($sb_pid)>0 and preg_match_all('/<<kfzdispo_panummer>>/', $replace_text)) {
				$res4=$db->select(
					$sql_tab['produktzuordnung_dispo'],
					array(
						$sql_tabs['produktzuordnung_dispo']['pa_nummer'],
						$sql_tabs['produktzuordnung_dispo']['ereignis']
					),
					$sql_tabs['produktzuordnung_dispo']['produktzuordnung_id'].'='.$db->dbzahl($sb_pid)
				);
				if ($row4=$db->zeile($res4)) {
					$replace_text=sb_ersetzen('<<kfzdispo_panummer>>', $row4[0], $replace_text, $etiketten);
				}
			}
			if (intval($sb_pid)>0 and preg_match_all('/<<ausstcode_farbe>>/', $replace_text)) {
				$res4=$db->select(
					$sql_tab['produktzuordnung_ausstattung'],
					array(
						$sql_tabs['produktzuordnung_ausstattung']['ausst_code'],
						$sql_tabs['produktzuordnung_ausstattung']['beschreibung'],
						$sql_tabs['produktzuordnung_ausstattung']['beschreibung2']
					),
					$sql_tabs['produktzuordnung_ausstattung']['produktzuordnung_id'].'='.$db->dbzahl($sb_pid).' and '.
						$sql_tabs['produktzuordnung_ausstattung']['ausst_kennzeichen_text'].'='.$db->str('Farbe')
				);
				if ($row4=$db->zeile($res4)) {
					$replace_text=sb_ersetzen('<<ausstcode_farbe>>', $row4[0], $replace_text, $etiketten);
				}
			}
			if (intval($sb_pid)>0 and preg_match_all('/<<ausstcode_polster>>/', $replace_text)) {
				$res4=$db->select(
					$sql_tab['produktzuordnung_ausstattung'],
					array(
						$sql_tabs['produktzuordnung_ausstattung']['ausst_code'],
						$sql_tabs['produktzuordnung_ausstattung']['beschreibung'],
						$sql_tabs['produktzuordnung_ausstattung']['beschreibung2']
					),
					$sql_tabs['produktzuordnung_ausstattung']['produktzuordnung_id'].'='.$db->dbzahl($sb_pid).' and '.
						$sql_tabs['produktzuordnung_ausstattung']['ausst_kennzeichen_text'].'='.$db->str('Polster')
				);
				if ($row4=$db->zeile($res4)) {
					$replace_text=sb_ersetzen('<<ausstcode_polster>>', $row4[0], $replace_text, $etiketten);
				}
			}
			if (intval($sb_pid)>0 and preg_match_all('/<<kfzcode_(\d+)>>/', $replace_text, $mas)) {
				$vin1='';
				$res4=$db->select(
					$sql_tab['produktzuordnung'],
					$sql_tabs['produktzuordnung']['fahrgestell'],
					$sql_tabs['produktzuordnung']['produktzuordnung_id'].'='.$db->dbzahl($sb_pid)
				);
				if ($row4=$db->zeile($res4)) {
					$vin1=trim($row4[0]);
				}
				$werte_kc=array();
				if ($vin1!='') {
					$sqltc=array($sql_tabs['produktzuordnung_codes']['produktzuordnung_codes_id']);
					for ($kc1=1; $kc1<=30; $kc1++) {
						$sqltc[]=$sql_tabs['produktzuordnung_codes']['code_'.$kc1];
					}
					$res4=$db->select(
						$sql_tab['produktzuordnung_codes'],
						$sqltc,
						$sql_tabs['produktzuordnung_codes']['fahrgestellnummer'].'='.$db->str($vin1)
					);
					if ($row4=$db->zeile($res4)) {
						while (list($keykc, $valkc)=@each($row4)) {
							if (is_numeric($keykc)) {
								$werte_kc[$keykc]=trim($valkc);
							}
						}
					}
				}
				while (list($key1, $val1)=@each($mas[1])) {
					$kcwert='';
					if (isset($werte_kc[$val1])) {
						$kcwert=$werte_kc[$val1];
					}
					$replace_text=sb_ersetzen('<<kfzcode_'.$val1.'>>', $kcwert, $replace_text, $etiketten);
				}
			}
			
			if (isset($sql_tab['produktzuordnung_weitere2']) and preg_match_all('/<<sbor_(\d+)[_|q|r|\d]*>>/', $replace_text, $mas)) {
				$sqlt_sbo=array();
				$sbo_reih=array();
				$xi2=0;
				while (list($key1, $val1)=@each($mas[1])) {
					$sqlt_sbo[]=$sql_tab['produktzuordnung_weitere2'].'.sbor_'.$val1;
					$sbo_reih[$xi2]=$val1;
					$xi2++;
				}
				$sbo_l=array();
				if (intval($sb_pid)>0 and count($sqlt_sbo)>0) {
					$res4=$db->select(
						$sql_tab['produktzuordnung_weitere2'],
						$sqlt_sbo,
						$sql_tabs['produktzuordnung_weitere2']['produktzuordnung_id'].'='.$db->dbzahl($sb_pid)
					);
					if ($row4=$db->zeile($res4)) {
						while (list($key1, $val1)=@each($row4)) {
							$sbo_l[$key1]=$val1;
							if (isset($sbo_reih[$key1])) {
								$sbo_l['sbor_'.$sbo_reih[$key1]]=$val1;
							}
						}
					}
				}
				@reset($mas[1]);
				while (list($key1, $val1)=@each($mas[1])) {
					$sbol='';
					if (isset($sbo_l['sbor_'.$val1])) {
						$sbol=$sbo_l['sbor_'.$val1];
					}
					$replace_text=sb_ersetzen('<<sbor_'.$val1.'>>', $sbol, $replace_text, $etiketten);
					if (preg_match('/_qr(\d*)/', $mas[0][$key1], $mas2)) {
						$sb_qr='';
						$scale_sbo=85;
						$zus_mas='';
						if (isset($mas2[1])) {
							$zus_mas=$mas2[1];
							if (intval($mas2[1])>0) {
								$scale_sbo=intval($mas2[1]);
							}
						}
						if (is_file('inc/phpqrcode.php')) {
							include_once('inc/phpqrcode.php');
							$datei_te='temp/_qrsbo_'.$_SESSION['user_id'].'.jpg';
							if ($ist_docx) {
								$datei_te='temp/_qrsbor'.$val1.'_'.$sb_pid.'_'.$_SESSION['user_id'].'.jpg';
							}
							QRcode::jpg($sbol, $datei_te);
							if (is_file($datei_te)) {
								if ($ist_docx) {
									$alle_docx_bilder['rIdr'.$val1.'_'.$sb_pid]=$datei_te;
								} else {
									$bildinh=file_get_contents($datei_te);
									$bildinh2=bin2hex($bildinh);
									$sb_qr='{\\pict \\picscalex'.$scale_sbo.'\\picscaley'.$scale_sbo.'\\jpegblip '.$bildinh2.' } ';
									unlink($datei_te);
								}
							}
						}
						if ($ist_docx) {
							$replace_text=sb_ersetzen('<<sbor_'.$val1.'_qr'.$zus_mas.'>>', '<w:pict><v:shape id="_x0000_i1026" style="width:100.00pt;height:100.00pt" type="#_x0000_t75"><v:imagedata o:title="" r:id="rIdr'.$val1.'_'.$sb_pid.'"/></v:shape></w:pict>', $replace_text, $etiketten);	//style="width:128.25pt;height:53.25pt" 
						} else {
							$replace_text=sb_ersetzen('<<sbor_'.$val1.'_qr'.$zus_mas.'>>', $sb_qr, $replace_text, $etiketten);
						}
					}
				}
			}
			if (isset($sql_tab['produktzuordnung_weitere']) and preg_match_all('/<<sbo_(\d+)[_|q|r|\d]*>>/', $replace_text, $mas)) {
				$sqlt_sbo=array();
				$sbo_reih=array();
				$xi2=0;
				while (list($key1, $val1)=@each($mas[1])) {
					$sqlt_sbo[]=$sql_tab['produktzuordnung_weitere'].'.sbo_'.$val1;
					$sbo_reih[$xi2]=$val1;
					$xi2++;
				}
				$sbo_l=array();
				if (intval($sb_pid)>0 and count($sqlt_sbo)>0) {
					$res4=$db->select(
						$sql_tab['produktzuordnung_weitere'],
						$sqlt_sbo,
						$sql_tabs['produktzuordnung_weitere']['produktzuordnung_id'].'='.$db->dbzahl($sb_pid)
					);
					if ($row4=$db->zeile($res4)) {
						while (list($key1, $val1)=@each($row4)) {
							$sbo_l[$key1]=$val1;
							if (isset($sbo_reih[$key1])) {
								$sbo_l['sbo_'.$sbo_reih[$key1]]=$val1;
							}
						}
					}
				}
				@reset($mas[1]);
				while (list($key1, $val1)=@each($mas[1])) {
					$sbol='';
					if (isset($sbo_l['sbo_'.$val1])) {
						$sbol=$sbo_l['sbo_'.$val1];
					}
					$replace_text=sb_ersetzen('<<sbo_'.$val1.'>>', $sbol, $replace_text, $etiketten);
					if (preg_match('/_qr(\d*)/', $mas[0][$key1], $mas2)) {
						$sb_qr='';
						$scale_sbo=85;
						$zus_mas='';
						if (isset($mas2[1])) {
							$zus_mas=$mas2[1];
							if (intval($mas2[1])>0) {
								$scale_sbo=intval($mas2[1]);
							}
						}
						if (is_file('inc/phpqrcode.php')) {
							include_once('inc/phpqrcode.php');
							$datei_te='temp/_qrsbo_'.$_SESSION['user_id'].'.jpg';
							if ($ist_docx) {
								$datei_te='temp/_qrsbo'.$val1.'_'.$sb_pid.'_'.$_SESSION['user_id'].'.jpg';
							}
							QRcode::jpg($sbol, $datei_te);
							if (is_file($datei_te)) {
								if ($ist_docx) {
									$alle_docx_bilder['rId'.$val1.'_'.$sb_pid]=$datei_te;
								} else {
									$bildinh=file_get_contents($datei_te);
									$bildinh2=bin2hex($bildinh);
									$sb_qr='{\\pict \\picscalex'.$scale_sbo.'\\picscaley'.$scale_sbo.'\\jpegblip '.$bildinh2.' } ';
									unlink($datei_te);
								}
							}
						}
						if ($ist_docx) {
							$replace_text=sb_ersetzen('<<sbo_'.$val1.'_qr'.$zus_mas.'>>', '<w:pict><v:shape id="_x0000_i1026" style="width:100.00pt;height:100.00pt" type="#_x0000_t75"><v:imagedata o:title="" r:id="rId'.$val1.'_'.$sb_pid.'"/></v:shape></w:pict>', $replace_text, $etiketten);	//style="width:128.25pt;height:53.25pt" 
						} else {
							$replace_text=sb_ersetzen('<<sbo_'.$val1.'_qr'.$zus_mas.'>>', $sb_qr, $replace_text, $etiketten);
						}
					}
				}
			}
			
			@reset($zusdaten_sb2);
			unset($schonreset);
			if (preg_match_all("|<<cmbr:(.*)>>|Us",$replace_text,$test, PREG_PATTERN_ORDER)) {
					for ($d=0;$d<sizeof($test[1]);$d++) {
						$inh_cmb='';
						$m=$test[1][$d];
						$pre1='';
						$pre2='';
						$sub1='';
						$sub2='';
						$m=$test[1][$d];
						if (preg_match_all('/(\[.*\])+/Uis', $m, $test2)) {
							while (list($key2, $val2)=@each($test2[0])) {
								$m=str_replace($val2, '', $m);
								$val2=str_replace(array('[', ']'), '', $val2);
								if (substr($val2, 0, 2)=='p:') {
									$val2=str_replace('p:', '', $val2);
									$xpl3=explode('|', $val2);
									$pre1=$xpl3[0];
									if ($ist_docx) {
										$pre1=p4n_mb_string('utf8_decode', $pre1);
									}
									$pre2=$xpl3[1];
									if ($ist_docx) {
										$pre2=p4n_mb_string('utf8_decode', $pre2);
									}
								}
								if (substr($val2, 0, 2)=='a:') {
									$val2=str_replace('a:', '', $val2);
									$xpl3=explode('|', $val2);
									$sub1=$xpl3[0];
									if ($ist_docx) {
										$sub1=p4n_mb_string('utf8_decode', $sub1);
									}
									$sub2=$xpl3[1];
									if ($ist_docx) {
										$sub2=p4n_mb_string('utf8_decode', $sub2);
									}
								}
							}
						}
						if (preg_match_all('/(\w)+/', $m, $test2)) {
							$m_m=$m;
							$abbruch=false;
							$z=0;
							while (!$abbruch) {
								$nf=false;
								$m_m=$m;
								@reset($test2[0]);
								$valx='';
								while (list($key2, $val2)=@each($test2[0])) {
									$anz_temp=count($zusdaten_sb2[$val2])-1;
									if (!isset($schonreset[$val2])) {
										$schonreset[$val2]=true;
										@reset($zusdaten_sb2[$val2]);
									}
									if (list($keyx, $valx)=@each($zusdaten_sb2[$val2])) {
									} else {
										$abbruch=true;
									}
									$xi++;
									$m_m=str_replace($val2, $valx, $m_m);
									$nf=true;
								}
								if (!$nf) {
									$abbruch=true;
								}
								if ($valx=='') {
								
								} else {
								$inh_cmb.=$m_m;
								$inh_cmb.="\\par ";
								}
								$z++;
							}
						}
						if (p4n_mb_string('substr', $inh_cmb,-strlen("\\par "))=="\\par ")
							$inh_cmb=p4n_mb_string('substr', $inh_cmb, 0, -strlen("\\par "));
						if (p4n_mb_string('substr', $inh_cmb,-2)==', ')
							$inh_cmb=p4n_mb_string('substr', $inh_cmb, 0, -2);
						if (p4n_mb_string('substr', $inh_cmb,-p4n_mb_string('strlen', ' '._UND_.' '))==' '._UND_.' ')
							$inh_cmb=p4n_mb_string('substr', $inh_cmb, 0, -p4n_mb_string('strlen', ' '._UND_.' '));
						$ers1=preg_quote($test[0][$d]);
						$z--;
						if ($z==1) {
							if ($pre1!='') {
								$inh_cmb=$pre1."\\par ".$inh_cmb;
							}
							if ($sub1!='') {
								$inh_cmb.="\\par ".$sub1;
							}
						} elseif ($z>=2) {
							if ($pre2!='') {
								$inh_cmb=$pre2."\\par ".$inh_cmb;
							}
							if ($sub2!='') {
								$inh_cmb.="\\par ".$sub2;
							}
						}
						$replace_text=sb_ersetzen('/'.$ers1.'/', $inh_cmb, $replace_text, $etiketten);
					}
			}
			@reset($zusdaten_sb2);
			unset($schonreset);
			if (preg_match_all("|<<cmb:(.*)>>|Us",$replace_text,$test, PREG_PATTERN_ORDER)) {
					for ($d=0;$d<sizeof($test[1]);$d++) {
						$inh_cmb='';
						$pre1='';
						$pre2='';
						$sub1='';
						$sub2='';
						$m=$test[1][$d];
						if (preg_match_all('/(\[.*\])+/Uis', $m, $test2)) {
							while (list($key2, $val2)=@each($test2[0])) {
								$m=str_replace($val2, '', $m);
								$val2=str_replace(array('[', ']'), '', $val2);
								if (substr($val2, 0, 2)=='p:') {
									$val2=str_replace('p:', '', $val2);
									$xpl3=explode('|', $val2);
									$pre1=$xpl3[0];
									if ($ist_docx) {
										$pre1=p4n_mb_string('utf8_decode', $pre1);
									}
									$pre2=$xpl3[1];
									if ($ist_docx) {
										$pre2=p4n_mb_string('utf8_decode', $pre2);
									}
								}
								if (substr($val2, 0, 2)=='a:') {
									$val2=str_replace('a:', '', $val2);
									$xpl3=explode('|', $val2);
									$sub1=$xpl3[0];
									if ($ist_docx) {
										$sub1=p4n_mb_string('utf8_decode', $sub1);
									}
									$sub2=$xpl3[1];
									if ($ist_docx) {
										$sub2=p4n_mb_string('utf8_decode', $sub2);
									}
								}
							}
						}
						if (preg_match_all('/(\w)+/', $m, $test2)) {
							$m_m=$m;
							$abbruch=false;
							$z=0;
							while (!$abbruch) {
								$nf=false;
								$m_m=$m;
								@reset($test2[0]);
								$valx='';
								while (list($key2, $val2)=@each($test2[0])) {
									$anz_temp=count($zusdaten_sb2[$val2])-1;
									if (!isset($schonreset[$val2])) {
										$schonreset[$val2]=true;
										@reset($zusdaten_sb2[$val2]);
									}
									if (list($keyx, $valx)=@each($zusdaten_sb2[$val2])) {
									} else {
										$abbruch=true;
									}
									$xi++;
									$m_m=str_replace($val2, $valx, $m_m);
									$nf=true;
								}
								if (!$nf) {
									$abbruch=true;
								}
								if ($valx=='') {
								
								} else {
								$inh_cmb.=$m_m;
								if ($z==($anz_temp-1))
									$inh_cmb.=' '._UND_.' ';
								else
									$inh_cmb.=', ';
								}
								$z++;
							}
						}
						if (p4n_mb_string('substr', $inh_cmb,-2)==', ')
							$inh_cmb=p4n_mb_string('substr', $inh_cmb, 0, -2);
						if (p4n_mb_string('substr', $inh_cmb,-p4n_mb_string('strlen', ' '._UND_.' '))==' '._UND_.' ')
							$inh_cmb=p4n_mb_string('substr', $inh_cmb, 0, -p4n_mb_string('strlen', ' '._UND_.' '));
						$ers1=preg_quote($test[0][$d]);
						$z--;
						if ($z==1) {
							if ($pre1!='') {
								$inh_cmb=$pre1.' '.$inh_cmb;
							}
							if ($sub1!='') {
								$inh_cmb.=' '.$sub1;
							}
						} elseif ($z>=2) {
							if ($pre2!='') {
								$inh_cmb=$pre2.' '.$inh_cmb;
							}
							if ($sub2!='') {
								$inh_cmb.=' '.$sub2;
							}
						}
						$replace_text=sb_ersetzen('/'.$ers1.'/', $inh_cmb, $replace_text, $etiketten);
					}
			}
			
			$m_row=$row;
			
			if ($zusatz!='') {
				$alle_func=array();
				$res=$db->select(
					$sql_tab['dokumentfelder'],
					array(
						$sql_tabs['dokumentfelder']['feldname'],
						$sql_tabs['dokumentfelder']['dbfeld'],
						$sql_tabs['dokumentfelder']['formatierung'],
						$sql_tabs['dokumentfelder']['funktion'],
						$sql_tabs['dokumentfelder']['mathop']
					),
					$sql_tabs['dokumentfelder']['dokument_id'].'='.$db->dbzahl($dokument_id).' and '.
					$sql_tabs['dokumentfelder']['dbfeld'].'!='.$db->str('filter')
				);
				while ($row=$db->zeile($res)) {
					$alle_func[$row[0]]=$row[2];
				}
				@reset($zusatz);
				while (list($key, $val)=@each($zusatz)) {
					$z=1;
					$zftext='';
					@sort($val);
					while (list($key2, $val2)=@each($val)) {
						
						if (isset($alle_func[$key])) {
						$feldfu=$alle_func[$key];
						if ($feldfu=='Geld')
							$val2=zahl($val2);
						if ($feldfu=='Datum' and preg_match('/\d\d\d\d\-\d\d\-\d\d/', $val2))
							$val2=$db->unixdate($val2);
						if ($feldfu=='1' and preg_match('/\d\d\d\d\-\d\d\-\d\d/', $val2))
							$val2=$monate[(int)date('m', $db->unixdate_ts($val2))];
						// Jahr:
						if ($feldfu=='2' and $zftext!='' and preg_match('/\d\d\d\d\-\d\d\-\d\d/', $val2))
							$val2=date('Y', $db->unixdate_ts($val2));
						// Tag/Monat
						if ($feldfu=='3' and $zftext!='' and preg_match('/\d\d\d\d\-\d\d\-\d\d/', $val2))
							$val2=date('d.m.', $db->unixdate_ts($val2));
						// Tag/Monat/jahr
						if ($feldfu=='4' and $zftext!='' and preg_match('/\d\d\d\d\-\d\d\-\d\d/', $val2))
							$val2=date('d.m.Y', $db->unixdate_ts($val2));
						// nur 1. Wort
						if ($feldfu=='5') {
							$woerter=preg_split('/\s/', $val2);
							$val2=p4n_mb_string('ucfirst', p4n_mb_string('strtolower',$woerter[0]));
						}
						// nur 2. Wort
						if ($feldfu=='6') {
							$woerter=preg_split('/\s/', $val2);
							if (isset($woerter[1])) {
								$val2=p4n_mb_string('ucfirst', p4n_mb_string('strtolower',$woerter[1]));
							}
						}
						// Tag/Monatsbez.
						if ($feldfu=='7' and $val2!='' and preg_match('/\d\d\d\d\-\d\d\-\d\d/', $val2)) {
							$val2=date('d', $db->unixdate_ts($val2)).'. '.$monate[(int)date('m', $db->unixdate_ts($val2))];
						}
						}
						
						$zftext.=$val2;
						if ($z==(count($val)-1))
							$zftext.=' '._UND_.' ';
						else
							$zftext.=', ';
						$z++;
					}
					$mehrere=false;
					if (p4n_mb_string('substr', $zftext,-2)==', ') {
						$zftext=p4n_mb_string('substr', $zftext, 0, -2);
						$mehrere=true;
					}
					if (p4n_mb_string('substr', $zftext,-p4n_mb_string('strlen', ' '._UND_.' '))==' '._UND_.' ') {
						$zftext=p4n_mb_string('substr', $zftext, 0, -p4n_mb_string('strlen', ' '._UND_.' '));
						$mehrere=true;
					}
					
					if (preg_match('/.*\[(.*)\].*/', $key, $matches)) {
						$erg=explode('|', $matches[1]);
						if (count($val)==1) {
							$zftext=$erg[0].' '.$zftext;
						} else {
							$zftext=$erg[1].' '.$zftext;
						}
					}
					
					if (!$mehrere and isset($alle_func[$key])) {
						$feldfu=$alle_func[$key];
						if ($feldfu=='Geld')
							$zftext=zahl($zftext);
						if ($feldfu=='Datum' and preg_match('/\d\d\d\d\-\d\d\-\d\d/', $zftext))
							$zftext=$db->unixdate($zftext);
						if ($feldfu=='1' and preg_match('/\d\d\d\d\-\d\d\-\d\d/', $zftext))
							$zftext=$monate[(int)date('m', $db->unixdate_ts($zftext))];
						// Jahr:
						if ($feldfu=='2' and $zftext!='' and preg_match('/\d\d\d\d\-\d\d\-\d\d/', $zftext))
							$zftext=date('Y', $db->unixdate_ts($zftext));
						// Tag/Monat
						if ($feldfu=='3' and $zftext!='' and preg_match('/\d\d\d\d\-\d\d\-\d\d/', $zftext))
							$zftext=date('d.m.', $db->unixdate_ts($zftext));
						// Tag/Monat/jahr
						if ($feldfu=='4' and $zftext!='' and preg_match('/\d\d\d\d\-\d\d\-\d\d/', $zftext))
							$zftext=date('d.m.Y', $db->unixdate_ts($zftext));
						// nur 1. Wort
						if ($feldfu=='5') {
							$woerter=preg_split('/\s/', $zftext);
							$zftext=p4n_mb_string('ucfirst', p4n_mb_string('strtolower',$woerter[0]));
						}
						// nur 2. Wort
						if ($feldfu=='6') {
							$woerter=preg_split('/\s/', $zftext);
							if (isset($woerter[1])) {
								$zftext=p4n_mb_string('ucfirst', p4n_mb_string('strtolower',$woerter[1]));
							}
						}
						// Tag/Monatsbez.
						if ($feldfu=='7' and $zftext!='' and preg_match('/\d\d\d\d\-\d\d\-\d\d/', $zftext)) {
							$zftext=date('d', $db->unixdate_ts($zftext)).'. '.$monate[(int)date('m', $db->unixdate_ts($zftext))];
						}
					}
					
					if ($cfg_invitek) {
						$replace_text=sb_ersetzen('/<<'.preg_quote($key).'>>/', $zftext, $replace_text, $etiketten);
						$replace_text=sb_ersetzen('/<'.preg_quote($key).'>/', $zftext, $replace_text, $etiketten);
					} else {
						$replace_text=sb_ersetzen('/<<'.preg_quote($key).'>>/', $zftext, $replace_text, $etiketten);
					}
				}
			}
			
			$row=$m_row;
			
			if ($ist_ftext!='') {
				$m_rpt=$replace_text;
				$replace_text=sb_ersetzen('/<<'.bef_format(_VORNAME_).'>>[^<]*<<'.bef_format(_NAME_).'>>/', $firma.$aptext, $replace_text, $etiketten);
				if ($m_rpt==$replace_text) {
					$replace_text=sb_ersetzen('/<<vorname>>[^<]*<<name>>/', $firma.$aptext, $replace_text, $etiketten);
				}
				if ($m_rpt==$replace_text) {
					$ist_ftext='';
				} else {
					$m_rpt=$replace_text;
					$replace_text=sb_ersetzen('/<<'.bef_format(_ANREDE_).'>>/', '', $replace_text, $etiketten);
					if ($m_rpt==$replace_text) {
						$replace_text=sb_ersetzen('/<<anrede>>/', '', $replace_text, $etiketten);
					}
				}
			}
			$res=$db->select(
				$sql_tab['dokumentfelder'],
				array(
					'distinct '.$sql_tabs['dokumentfelder']['feldname'],
					$sql_tabs['dokumentfelder']['dbfeld'],
					$sql_tabs['dokumentfelder']['formatierung'],
					$sql_tabs['dokumentfelder']['funktion'],
					$sql_tabs['dokumentfelder']['mathop']
				),
				$sql_tabs['dokumentfelder']['dokument_id'].'='.$db->dbzahl($dokument_id).' and '.
				$sql_tabs['dokumentfelder']['dbfeld'].'!='.$db->str('filter')
			);
			while ($row=$db->zeile($res)) {
           
				if (p4n_mb_string('substr', $row[1], 0, p4n_mb_string('strlen', $prefix.'produktzuordnung'))==$prefix.'produktzuordnung') {
					continue;
				}
				
				if ($row[1]==$prefix.'stammdaten.id') {
					$row[1]=$prefix.'stammdaten.stammdaten_id';
				}
				
				if ($row[1]=='-1') {
					
					if ($cfg_invitek) {
						$replace_text=p4n_mb_string('str_replace', '<<'.preg_quote($row[0]).'>>', '', $replace_text);
						$replace_text=p4n_mb_string('str_replace', '<'.preg_quote($row[0]).'>', '', $replace_text);
					} else {
						$replace_text=p4n_mb_string('str_replace', '<<'.preg_quote($row[0]).'>>', '', $replace_text);
					}
					continue;
				}
				$fwhere='';
				if (p4n_mb_string('strstr', $row[1], '___')) {
					$y=explode('___', $row[1]);
					$fwhere.=' and '.$y[1];
					$dbfeld=$y[0];
				} else
					$dbfeld=$row[1];
				$x=explode('.', $dbfeld);
				$dbfeld=$x[1];
				$dbtab=$x[0];
				$forder='';
			
				$ab_ds=0;
				$ab_limit=0;
			
				if ($dbtab=='zf') {
					$dbtab=$sql_tab['zusatzfelder'];
					$dbfeld='zf_'.$x[1];
					$fwhere='';
				}
				if (substr($dbtab, -18)=='stammdaten_adresse') {	// crm_
					$forder=$sql_tabs['stammdaten_adresse']['post'].' desc, '.$sql_tabs['stammdaten_adresse']['art'];
					if (p4n_mb_string('substr', $dbfeld, -1)=='2') {
						$dbfeld=p4n_mb_string('substr', $dbfeld, 0, -1);
						$ab_ds=1;
						$ab_limit=1;
					}
				}
				
				if ($dbtab!='' and $dbfeld!='') {
					$res2=$db->select($dbtab, $dbtab.'.'.$dbfeld.$row[4], $dbtab.'.'.'stammdaten_id='.$db->dbzahl($stammdaten_id).$fwhere, $forder, '', false, $ab_limit, $ab_ds);
//echo $db->last_sql.'<br><br>';
					if ($row2=$db->zeile($res2))
						$feldinhalt=$row2[0];
					else
						$feldinhalt='';
				} else
					$feldinhalt='';
				
				if ($etiketten and $ist_ftext!='') {
					if (substr($dbtab, -10)=='stammdaten' and ($dbfeld=='vorname' or $dbfeld=='name' or $dbfeld=='anrede')) {
						continue;
					}
				}
				
				if (substr($dbtab, -18)=='stammdaten_adresse' and $dbfeld=='adresse' and $ap_adresse!='' and $ap_plz!='' and $ap_ort!='') {
					$feldinhalt=$ap_adresse;
				}
				if (substr($dbtab, -18)=='stammdaten_adresse' and $dbfeld=='plz' and $ap_adresse!='' and $ap_plz!='' and $ap_ort!='') {
					$feldinhalt=$ap_plz;
				}
				if (substr($dbtab, -18)=='stammdaten_adresse' and $dbfeld=='ort' and $ap_adresse!='' and $ap_plz!='' and $ap_ort!='') {
					$feldinhalt=$ap_ort;
				}
				if (substr($dbtab, -10)=='stammdaten' and $dbfeld=='name' and $ap_name!='') {
					$feldinhalt=$ap_name;
				}
				if (substr($dbtab, -10)=='stammdaten' and $dbfeld=='vorname' and $ap_vorname!='') {
					$feldinhalt=$ap_vorname;
				}
				if (substr($dbtab, -10)=='stammdaten' and $dbfeld=='titel' and isset($ap_titel2)) {
					$feldinhalt=$ap_titel;
				}
				if (substr($dbtab, -10)=='stammdaten' and $dbfeld=='anrede' and isset($ap_anrede2)) {
					$feldinhalt=p4n_mb_string('ucfirst', $ap_anrede);
				}
				if (substr($dbtab, -10)=='stammdaten' and $dbfeld=='briefanrede' and $ap_briefanrede!='') {
					$feldinhalt=$ap_briefanrede;
				}
				
				if (substr($dbtab, -18)=='stammdaten_adresse' and $dbfeld=='land') {
					if ($feldinhalt=='Deutschland') {
						$feldinhalt='';
					}
					if ($cfg_kfzsuche_holland and $feldinhalt=='Nederland') {
						$feldinhalt='';
					}
				}
				
				if ($dbtab==$prefix.'produktzuordnung' and ($dbfeld=='typ_modell' or $dbfeld=='markencode')) {
					$xp=preg_split('/\s+/', $feldinhalt);
					
					$zk1='';
					while (list($key, $val)=@each($xp)) {
						if (p4n_mb_string('strlen', $val)>=4 and p4n_mb_string('strtoupper',$val)==$val) {
							$val=p4n_mb_string('ucfirst', p4n_mb_string('strtolower',$val));
						}
						$zk1.=$val.' ';
					}
					$feldinhalt=trim($zk1);
				}
				
				if (p4n_mb_string('substr', $row[0], -1)!='2' and $dbtab==$prefix.'stammdaten' and ($dbfeld=='name' or $dbfeld=='firma1')) {
					if (p4n_mb_string('strlen', $feldinhalt)>30) {
						$xp=preg_split('/\s+/', $feldinhalt);
						$zk1='';
						$zk2='';
						$umbr=false;
						while (list($key, $val)=@each($xp)) {
							$val=trim($val);
							if ($val=='') {
								continue;
							}
							$val=trim($val);
							if (!$umbr and p4n_mb_string('strlen', $zk1.' '.$val)<30 and p4n_mb_string('substr', p4n_mb_string('strtolower',$val), 0, 2)!='z.' and p4n_mb_string('substr', p4n_mb_string('strtolower',$val), 0, 3)!='c/o') {
								$zk1.=$val.' ';
							} else {
								$umbr=true;
								$zk2.=$val.' ';
							}
						}
						$zk1=trim($zk1);
						$zk2=trim($zk2);
						if ($zk2!='') {
							$feldinhalt=trim($zk1."\n\\par ".$zk2);
						} else {
							
						}
					}
				}
				
				if ($row[2]=='Geld')
					$feldinhalt=zahl($feldinhalt);
				if ($row[2]=='Datum')
					$feldinhalt=$db->unixdate($feldinhalt);
				if ($row[2]=='1')
					$feldinhalt=$monate[(int)date('m', $db->unixdate_ts($feldinhalt))];
				// Jahr:
				if ($row[2]=='2' and $feldinhalt!='')
					$feldinhalt=date('Y', $db->unixdate_ts($feldinhalt));
				// Tag/Monat
				if ($row[2]=='3' and $feldinhalt!='')
					$feldinhalt=date('d.m.', $db->unixdate_ts($feldinhalt));
				// Tag/Monat/jahr
				if ($row[2]=='4' and $feldinhalt!='')
					$feldinhalt=date('d.m.Y', $db->unixdate_ts($feldinhalt));
				// nur 1. Wort
				if ($row[2]=='5') {
					$woerter=preg_split('/\s/', $feldinhalt);
					$feldinhalt=p4n_mb_string('ucfirst', p4n_mb_string('strtolower',$woerter[0]));
				}
				// nur 2. Wort
				if ($row[2]=='6') {
					$woerter=preg_split('/\s/', $feldinhalt);
					if (isset($woerter[1])) {
						$feldinhalt=p4n_mb_string('ucfirst', p4n_mb_string('strtolower',$woerter[1]));
					}
				}
				// Tag/Monatsbez.
				if ($row[2]=='7' and $feldinhalt!='') {
					$feldinhalt=date('d', $db->unixdate_ts($feldinhalt)).'. '.$monate[(int)date('m', $db->unixdate_ts($feldinhalt))];
				}
				if (($dbfeld=="briefanrede" or $dbfeld=="anrede" or $dbfeld=="titel") and $feldinhalt=="") {
					if ($cfg_invitek) {
						$replace_text=sb_ersetzen('<<'.$row[0].'>> ','<<'.$row[0].'>>', $replace_text, $etiketten);
						$replace_text=sb_ersetzen('<'.$row[0].'> ','<'.$row[0].'>', $replace_text, $etiketten);
					} else {
						$replace_text=sb_ersetzen('<<'.$row[0].'>> ','<<'.$row[0].'>>', $replace_text, $etiketten);
					}
				}
				
				if (isset($sql_tabs[p4n_mb_string('str_replace', $prefix, '', $dbtab)][$dbfeld])) {
				if (isset($sql_tab_ids[$sql_tabs[p4n_mb_string('str_replace', $prefix, '', $dbtab)][$dbfeld]])) {
					$res5=$db->select(
						$sql_tab['benutzer'],
						array(
							$sql_tabs['benutzer']['telefon'],
							$sql_tabs['benutzer']['email']
						),
						$sql_tabs['benutzer']['benutzer_id'].'='.$db->dbzahl($feldinhalt)
					);
					if ($row5=$db->zeile($res5)) {
						$replace_text=sb_ersetzen('<<betreuer_telefon>>', $row5[0], $replace_text, $etiketten);
						$replace_text=sb_ersetzen('<<betreuer_email>>', $row5[1], $replace_text, $etiketten);
					}
					unset($res5);
					unset($row5);
					$feldinhalt=anzeige_idwert($sql_tabs[p4n_mb_string('str_replace', $prefix, '', $dbtab)][$dbfeld], $feldinhalt);
					if ($sql_tabs[p4n_mb_string('str_replace', $prefix, '', $dbtab)][$dbfeld]==$sql_tabs['stammdaten']['betreuer']) {
						$xp=explode(',', $feldinhalt);
						if (count($xp)==2) {
							$feldinhalt=trim(trim($xp[1]).' '.trim($xp[0]));
						}
					}
				}
				}
				
				if ($cfg_invitek) {
					$replace_text=sb_ersetzen('<<'.$row[0].'>>', $feldinhalt, $replace_text, $etiketten);
					$replace_text=sb_ersetzen('<'.$row[0].'>', $feldinhalt, $replace_text, $etiketten);
				} else {
					$replace_text=sb_ersetzen('<<'.$row[0].'>>', $feldinhalt, $replace_text, $etiketten);
				}
			}
			
			// Formularinhalte:
			$m_foid=0;
			if (preg_match_all("|<<(.*)>>|Us",$replace_text,$test, PREG_PATTERN_ORDER)) {
			for ($d=0;$d<sizeof($test[1]);$d++) {
				$m=$test[1][$d];
				
				if (!isset($fo_types)) {
					$fo_types=array();
					$fo_fragen=array();
					$res3=$db->select(
						$sql_tab['formular_fragen'],
						array(
							$sql_tabs['formular_fragen']['frage_id'],
							$sql_tabs['formular_fragen']['formular_id'],
							$sql_tabs['formular_fragen']['feldtyp'],
							$sql_tabs['formular_fragen']['frage']
						)
					);
					while ($row3=$db->zeile($res3)) {
						$fo_types[$row3[1]][$row3[0]]=$row3[2];
						$fo_fragen[$row3[1]][$row3[0]]=$row3[3];
					}
				}
				
				$test[1][$d]=p4n_mb_string('str_replace', array('{', '}', "\n", "\r"), '', $test[1][$d]);
				$test[1][$d]=p4n_mb_string('str_replace', array('\\rtlch', '\\ltrch'), '', $test[1][$d]);
				
				if ($cfg_invitek)
					$test[1][$d]=preg_replace('/:\d{1,2}/', '', $test[1][$d]);
				$test[1][$d]=sb_ersetzen("/\\\\[a-zA-Z]+[\d]+[ ]{0,1}/", '', $test[1][$d], $etiketten);
				
				if (preg_match('/f_(\d+)_(\d+)/i', $test[1][$d], $fmat)) {
					
					$fo_id2=0;
					if (isset($zusatz['form_id'][0])) {
						if (intval($zusatz['form_id'][0])>0) {
							$fo_id2=intval($zusatz['form_id'][0]);
						}
					}
					
					$fo_id=intval($fmat[1]);
					if (isset($fo_types[$fo_id][$fmat[2]])) {
						$res=$db->select(
							$prefix.'formular_'.$fo_id,
							$prefix.'formular_'.$fo_id.'.feld_'.$fmat[2],
							$prefix.'formular_'.$fo_id.'.stammdaten_id'.'='.$db->dbzahl($stammdaten_id).
								($fo_id2>0?' and '.$prefix.'formular_'.$fo_id.'.formular_'.$fo_id.'_id='.$db->dbzahl($fo_id2):''),
							$prefix.'formular_'.$fo_id.'.datum desc'
						);
						$row=$db->zeile($res);
					} else {
						$row=array('-');
					}
					$m_foid=$fo_id;
					
					$ist_j_n=false;
					if (isset($fo_types[$fo_id][$fmat[2]])) {
						if ($fo_types[$fo_id][$fmat[2]]=='7' or $fo_types[$fo_id][$fmat[2]]=='12') {
							if ($row[0]=='1') {
								$row[0]=_JA_;
								if ($janein_haken or $fo_types[$fo_id][$fmat[2]]=='12') {
									$row[0]=dse_rtf_wert(true);
									$ist_j_n=true;
								}
							} else {
								$row[0]=_NEIN_;
								if ($janein_haken or $fo_types[$fo_id][$fmat[2]]=='12') {
									$row[0]=dse_rtf_wert(false);
									$ist_j_n=true;
								}
							}
//echo $_SESSION['cfg_kunde'].'/'.$fo_id.'/'.$fmat[2].'/'.$row[0].'<br>';
							if ($_SESSION['cfg_kunde']=='carlo_opel_dbrent' and $fo_id==2 and intval($fmat[2])==41) {
								if ($row[0]=='ja' or $row[0]==dse_rtf_wert(true)) {
									$replace_text=sb_ersetzen('<<radmon>>', 'Bitte nach 50-100 km Radschrauben nachziehen lassen!', $replace_text, $etiketten);
								}
							}
						} elseif ($fo_types[$fo_id][$fmat[2]]=='4') {
							$row[0]=$db->unixdate($row[0]);
						} elseif ($fo_types[$fo_id][$fmat[2]]=='5') {
							$row[0]=$db->unixdatetime($row[0]);
						} elseif ($fo_types[$fo_id][$fmat[2]]=='8') {
							$row[0]=number_format(doubleval($row[0]), 2, ",", "");
						}
						if ($cfg_form_sb_vorgabe_untereinander and $fo_types[$fo_id][$fmat[2]]=='6') {
							$xplwe=explode(';', $row[0]);
							$wertneu2='';
							$anzwi2=0;
							while (list($keyw2, $valw2)=@each($xplwe)) {
								if (trim($valw2)!='') {
									$wertneu2.='-'.trim($valw2).'\\par ';
									$anzwi2++;
								}
							}
							if ($anzwi2>=1) {
								$row[0]=p4n_mb_string('substr', $wertneu2, 0, -5);
							}
                        }
						if ($_SESSION['cfg_kunde']=='kunde_17' or $_SESSION['cfg_kunde']=='3secur') {
							if ($fo_id=='27') {
								if (preg_match('/tag/i', $fo_fragen[$fo_id][$fmat[2]]) or preg_match('/datum/i', $fo_fragen[$fo_id][$fmat[2]]) or preg_match('/zeit/i', $fo_fragen[$fo_id][$fmat[2]]) or preg_match('/stunde/i', $fo_fragen[$fo_id][$fmat[2]])) {
									if ($row[0]=='0') {
										$row[0]='';
									}
								}
							}
						}
					}
					$wert1=$row[0];
					if ($ist_j_n) {
						$replace_text=p4n_mb_string('str_replace', '<<'.$m.'>>', $wert1, $replace_text);
					}
					$wert1=p4n_mb_string('str_replace', "\r\n", '\\par ', $wert1);
					$wert1=p4n_mb_string('str_replace', "\n", '\\par ', $wert1);
					$replace_text=sb_ersetzen('<<'.$m.'>>', $wert1, $replace_text, $etiketten);
				}
			}
			}
			
			$replace_text=sb_ersetzen('<<radmon>>', '', $replace_text, $etiketten);
//die();
			if ($m_foid>0) {
				$xfelder=$db->MetaColumns($prefix.'formular_'.$m_foid);
				$wertf_gef=false;
				while (list($key2, $val2)=@each($xfelder)) {
					if (preg_match('/werte/', $val2->name)) {
						$wertf_gef=true;
					}
				}
				if ($wertf_gef and preg_match_all("|<<(.*)>>|Us",$replace_text,$test, PREG_PATTERN_ORDER)) {
					for ($d=0;$d<sizeof($test[1]);$d++) {
						$m=$test[1][$d];
						$test[1][$d]=p4n_mb_string('str_replace', array('{', '}', "\n", "\r"), '', $test[1][$d]);
						$test[1][$d]=p4n_mb_string('str_replace', array('\\rtlch', '\\ltrch'), '', $test[1][$d]);
						$test[1][$d]=sb_ersetzen("/\\\\[a-zA-Z]+[\d]+[ ]{0,1}/", '', $test[1][$d], $etiketten);
						
						if (preg_match('/(ffeld_\w+_\w+)/i', $test[1][$d], $fmat) or preg_match('/(filterfeld_\d+)/i', $test[1][$d], $fmat)) {
							if (!isset($fo_werte1)) {
								$res=$db->select(
									$prefix.'formular_'.$m_foid,
									$prefix.'formular_'.$m_foid.'.werte',
									$prefix.'formular_'.$m_foid.'.stammdaten_id'.'='.$db->dbzahl($stammdaten_id).
										($fo_id2>0?' and '.$prefix.'formular_'.$m_foid.'.formular_'.$m_foid.'_id='.$db->dbzahl($fo_id2):''),
									$prefix.'formular_'.$m_foid.'.datum desc'
								);
								$row=$db->zeile($res);
								$vorwerte=array();
								$expl=explode(';', $row[0]);
								while (list($key2, $val2)=@each($expl)) {
									$expl2=explode('===', $val2);
									$vorwerte[trim($expl2[0])]=base64_decode($expl2[1]);
								}
								$fo_werte1=$vorwerte;
							}
							$wert1='';
							if (isset($fo_werte1[trim($fmat[1])])) {
								$wert1=$fo_werte1[trim($fmat[1])];
								$wert1=p4n_mb_string('str_replace', "\r\n", '\\par ', $wert1);
								$wert1=p4n_mb_string('str_replace', "\n", '\\par ', $wert1);
							}
							$replace_text=sb_ersetzen('<<'.$m.'>>', $wert1, $replace_text, $etiketten);
						}
					}
				}
			}
			if ($cfg_invitek and preg_match_all("|<(.*)>|Us",$replace_text,$test, PREG_PATTERN_ORDER)) {
			for ($d=0;$d<sizeof($test[1]);$d++) {
				$m=$test[1][$d];
				if ($cfg_invitek)
					$test[1][$d]=preg_replace('/:\d{1,2}/', '', $test[1][$d]);
				
				$test[1][$d]=p4n_mb_string('str_replace', array('{', '}', "\n", "\r"), '', $test[1][$d]);
				$test[1][$d]=preg_replace("/\\\\[a-zA-Z]+[\d]+[ ]{0,1}/", '', $test[1][$d]);
				if (preg_match('/f_(\d)+_(\d)+/i', $test[1][$d])) {
					$felder[$i++]=$test[1][$d];
				}
				}
			}
			
			// 3s Leerzeilen:
/*			if ($_SESSION['cfg_kunde']=='kunde_17' or $_SESSION['cfg_kunde']=='3secur') {
				include('inc/'.$_SESSION['cfg_kunde'].'/begruessung2.php');
			}
*/			
			// Aufträge:
			if (isset($_SESSION['inv_auftrag'])) {
				
//				if (preg_match("/trowd.*trowd.*(trowd.*inv.*trowd.*trowd)/is", $replace_text, $matc)) {
				if (preg_match("/".preg_quote('\\')."trowd.*trowd.*(".preg_quote('\\')."trowd.*trowd.*inv.*)".preg_quote('\\')."trowd.*trowd.*trowd/is", $replace_text, $matc)) {
//echo $matc[1].'<br><br>';
					//$a_block=' \\'.p4n_mb_string('substr', $matc[1], 5).' ';
//					$a_block=' \\'.$matc[1].' ';
//					$a_block=p4n_mb_string('substr', $matc[1], 5).' ';
					$a_block=$matc[1];
					
//					echo $a_block.'<br><br>';
					
					$gesbl='';
					$summe=0;
					@reset($_SESSION['inv_auftrag']);
					while (list($key, $val)=@each($_SESSION['inv_auftrag'])) {
						$abl=$a_block;
						$abl=p4n_mb_string('str_replace', 'inv_artnr', $val[0], $abl);
						$abl=p4n_mb_string('str_replace', 'inv_artbez', $val[1], $abl);
						$abl=p4n_mb_string('str_replace', 'inv_gr', $val[2], $abl);
						$abl=p4n_mb_string('str_replace', 'inv_anz', $val[3], $abl);
						$abl=p4n_mb_string('str_replace', 'inv_preis', number_format($val[4], 2, ",", "."), $abl);
						$abl=p4n_mb_string('str_replace', 'inv_summe', number_format($val[5], 2, ",", "."), $abl);
						$abl=p4n_mb_string('str_replace', 'inv_rabatt', number_format($val[6], 2, ",", "."), $abl);
						$summe+=doubleval(number_format($val[5], 2, ".", ""));
						$gesbl.=$abl;
					}
//					echo $gesbl;
					
					//$replace_text=p4n_mb_string('str_replace', p4n_mb_string('substr', $a_block, 2, -1), $gesbl, $replace_text);
					
					$replace_text=p4n_mb_string('str_replace', $matc[1], $gesbl, $replace_text);
					
					$replace_text=p4n_mb_string('str_replace', 'inv_gesamt', number_format($summe, 2, ",", "."), $replace_text);
					unset($_SESSION['inv_auftrag']);
				}
			}

			if ($_SESSION['cfg_kunde']=='carlo_koltes') {
                if (preg_match_all("|<<(.*)>>|Us",$replace_text,$test, PREG_PATTERN_ORDER)) {
                    foreach ($test[1] as  $item) {
                        $replace_text = p4n_mb_string('str_replace', '<<'.preg_quote($item).'>>', '', $replace_text);
                    }
                }
            }
			
			if ($ist_docx) {
				$dateip2=p4n_mb_string('str_replace', 'dokumente/', '', $dateip);
				$dateip2=p4n_mb_string('str_replace', 'Serienbriefe/', '', $dateip2);
				$zieldir1='dokumente/dir_'.$dateip2;
						if (count($alle_docx_bilder)>0) {
							@reset($alle_docx_bilder);
							$rels_dazu='';
							$xi_j=1;
							if (!$ist_gesamtdok) {
								$docx_zielbilder=array();
							}
							while (list($keyb, $valb)=@each($alle_docx_bilder)) {
								$zieldat_jpg=$keyb.'.jpg';
								if (!is_dir($zieldir1.'/word/media')) {
									mkdir($zieldir1.'/word/media');
								}
								if (copy($valb, $zieldir1.'/word/media/'.$zieldat_jpg)) {
									$docx_zielbilder[]=$zieldir1.'/word/media/'.$zieldat_jpg;
									$rels_dazu.='<Relationship Id="'.$keyb.'" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/image" Target="media/'.$zieldat_jpg.'"/>';
									$xi_j++;
								}
							}
							if (!is_file($zieldir1.'/word/_rels/document_orig.xml.rels')) {
								copy($zieldir1.'/word/_rels/document.xml.rels', $zieldir1.'/word/_rels/document_orig.xml.rels');
							} elseif (!$ist_gesamtdok) {
								unlink($zieldir1.'/word/_rels/document.xml.rels');
								copy($zieldir1.'/word/_rels/document_orig.xml.rels', $zieldir1.'/word/_rels/document.xml.rels');
								copy($zieldir1.'/word/_rels/document.xml.rels', $zieldir1.'/word/_rels/document_orig.xml.rels');
							}
							if (is_file($zieldir1.'/word/_rels/document.xml.rels')) {
								$docrels=file_get_contents($zieldir1.'/word/_rels/document.xml.rels');
								if (stristr($docrels, $rels_dazu)===false) {
									$docrels=str_replace('</Relationships>', $rels_dazu.'</Relationships>', $docrels);
									if ($fp=fopen($zieldir1.'/word/_rels/document.xml.rels', 'w')) {
										fwrite($fp, $docrels);
										fclose($fp);
									}
								}
							}
							if (is_file($zieldir1.'/[Content_Types].xml')) {
								$docrels=file_get_contents($zieldir1.'/[Content_Types].xml');
								if (!preg_match('/jpeg/i', $docrels)) {
									$docrels=str_replace('<Default Extension="xml" ContentType="application/xml"/>', '<Default ContentType="application/xml" Extension="xml"/><Default Extension="jpg" ContentType="image/jpeg"/>', $docrels);
								}
								if ($fp=fopen($zieldir1.'/[Content_Types].xml', 'w')) {
									fwrite($fp, $docrels);
									fclose($fp);
								}
							}
						}
			}
			
			if ($nurmitte) {
				if ($ist_docx) {
					$replace_text=p4n_mb_string('str_replace', "\r".'\\par ', '<w:br/>', $replace_text);
					$replace_text=p4n_mb_string('str_replace', "\n".'\\par ', '<w:br/>', $replace_text);
					$replace_text=p4n_mb_string('str_replace', '\\par '."\n", '<w:br/>', $replace_text);
					$replace_text=p4n_mb_string('str_replace', '\\par ', '<w:br/>', $replace_text);
				}
				$returntext=$replace_text;
			} elseif ($beginn!='') {
				if ($ist_docx) {
					// <w:p w:rsidR="00EC0050" w:rsidRDefault="00EC0050"/>
					$replace_text=p4n_mb_string('str_replace', "\r".'\\par ', '<w:br/>', $replace_text);
					$replace_text=p4n_mb_string('str_replace', "\n".'\\par ', '<w:br/>', $replace_text);
					$replace_text=p4n_mb_string('str_replace', '\\par '."\n", '<w:br/>', $replace_text);
					$replace_text=p4n_mb_string('str_replace', '\\par ', '<w:br/>', $replace_text);
					$returntext=$beginn.$replace_text.$ende;
					$returntext=p4n_mb_string('str_replace', '<<', '&lt;&lt;', $returntext);
					$returntext=p4n_mb_string('str_replace', '>>', '&gt;&gt;', $returntext);
					$dateip2=p4n_mb_string('str_replace', 'dokumente/', '', $dateip);
					$dateip2=p4n_mb_string('str_replace', 'Serienbriefe/', '', $dateip2);
					$zieldir1='dokumente/dir_'.$dateip2;
					if (!is_file($zieldir1.'/word/document_orig.xml')) {
						copy($zieldir1.'/word/document.xml', $zieldir1.'/word/document_orig.xml');
					}
					if ($fp=fopen($zieldir1.'/word/document.xml', 'w')) {
						fwrite($fp, $returntext);
						fclose($fp);
						
						$flist='';
						$x=array();
						dirinhalt_sbrief($zieldir1);
						while (list($key, $val)=@each($x)) {
							while (list($key2, $val2)=@each($val)) {
								$flist.=$key.'/'.$val2.',';
							}
						}
						
						include_once('pclzip.lib.php');
						if (is_file('temp/'.$dateip2)) {
							unlink('temp/'.$dateip2);
						}
						$archive=new PclZip('temp/'.$dateip2);
						$v_list=$archive->add(p4n_mb_string('substr', $flist, 0, -1), PCLZIP_OPT_REMOVE_PATH, $zieldir1);
						if ($v_list == 0) {
							die('ZIP-Fehler');
						}
						if (!$ist_gesamtdok) {
							@reset($docx_zielbilder);
							while (list($keyb, $valb)=@each($docx_zielbilder)) {
								if (is_file($valb)) {
									unlink($valb);
								}
							}
						}
						$returntext=file_get_contents('temp/'.$dateip2);
						unlink('temp/'.$dateip2);
					}
				} else {
					$returntext='{'.$beginn.$replace_text.'}';
				}
			}
			if ($cfg_invitek and $beginn=='') {
				$returntext=$replace_text;
			}
		
//		$db->setfetchmode(false);
		$ADODB_FETCH_MODE=$merke;
		
		if ($replace_text==$m_replace_text) {
			$sb_et_durch=true;
		}
		
		return $returntext;
	}
	
	function allefelder($datei) {
		global $cfg_invitek;
		if ($fp=@fopen($datei,"r")) {
			
		} else {
			return array();
		}
		$rtftext=fread($fp, filesize($datei));
		// $rtftext=preg_replace('/\}\{\\\\f1\\\\fs20\\\\insrsid\d+ /', '', $rtftext);
//								}{\f1\fs20\ insrsid12717136 
		$rtftext2=$rtftext;
		fclose($fp);
		
		$rtftext=p4n_mb_string('str_replace', '&lt;&lt;', '<<', $rtftext);
		$rtftext=p4n_mb_string('str_replace', '&gt;&gt;', '>>', $rtftext);
		
		$schon_vorh=array();
		$felder_prove=array();
		if (preg_match_all("|<<(.*)>>|Us",$rtftext,$test, PREG_PATTERN_ORDER))
		{
			for ($d=0;$d<sizeof($test[1]);$d++) {
				$m=$test[1][$d];
				
				$test[1][$d]=p4n_mb_string('str_replace', array('{', '}', "\n", "\r"), '', $test[1][$d]);
				
				$test[1][$d]=p4n_mb_string('str_replace', array('\\rtlch', '\\ltrch'), '', $test[1][$d]);
				
				if ($cfg_invitek)
					$test[1][$d]=preg_replace('/:\d{1,2}/', '', $test[1][$d]);
				$test[1][$d]=preg_replace("/\\\\[a-zA-Z]+[\d]+[ ]{0,1}/", '', $test[1][$d]);
				if ($m!=$test[1][$d]) {
					$rtftext=preg_replace('/'.preg_quote3($m).'/', $test[1][$d], $rtftext);
				}
				if (!isset($felder_prove[$test[1][$d]]) && $test[1][$d]!="mitarbeiter" && $test[1][$d]!="datum" && $test[1][$d]!="zeit" and !preg_match('/f_(\d)+_(\d)+/i', $test[1][$d])) {
					$felder[$i++]=$test[1][$d];
                    $felder_prove[$test[1][$d]]=1;
					$schon_vorh[$test[1][$d]]=1;
				}
			}
		}
		if ($cfg_invitek and preg_match_all("|<(.*)>|Us",$rtftext,$test, PREG_PATTERN_ORDER))
		{
			for ($d=0;$d<sizeof($test[1]);$d++) {
				$m=$test[1][$d];
				if ($cfg_invitek)
					$test[1][$d]=preg_replace('/:\d{1,2}/', '', $test[1][$d]);
				
				$test[1][$d]=p4n_mb_string('str_replace', array('{', '}', "\n", "\r"), '', $test[1][$d]);
				$test[1][$d]=preg_replace("/\\\\[a-zA-Z]+[\d]+[ ]{0,1}/", '', $test[1][$d]);
				if ($schon_vorh[p4n_mb_string('str_replace', array('<','>'), '',$test[1][$d])] ) {
					continue;
				}
				if ($m!=$test[1][$d]) {
					if (@preg_match('/'.preg_quote($m).'/', $rtftext)) {
						$rtftext=@preg_replace('/'.preg_quote($m).'/', $test[1][$d], $rtftext);
					}
				}
				$t2t=p4n_mb_string('str_replace', array('<','>'), '', $test[1][$d]);
				if (!isset($felder_prove[$t2t]) && $t2t!="mitarbeiter" && $t2t!="datum" && $t2t!="zeit" and !preg_match('/f_(\d)+_(\d)+/i', $t2t)) {
					$felder[$i++]=$t2t;
                    $felder_prove[$t2t]=1;
				}
			}
		}
		if ($rtftext!=$rtftext2) {
			if ($fp = @fopen($datei,"w")) {
				$rtftext=fwrite($fp, $rtftext);
				fclose($fp);
			}
		}
		return $felder;
	}
	
	function nl2br2($text) {
		return preg_replace("/(\r\n|\n|\r)/", "<br>", $text);
//		return p4n_mb_string('str_replace', "\n", '<br>', $text);
	}
	function nl2br3($text) {
		return preg_replace("/(\r\n|\n|\r)/", "", $text);
//		return p4n_mb_string('str_replace', "\n", '<br>', $text);
	}
	
	function datensatz($anzeigename, $neu=false) {
		global $form, $google_suche, $cfg_filter_cache, $cfg_speed, $cfg_erstaufruf_schnell, $cfg_modern;
		$anz2=p4n_mb_string('str_replace', array('ä','ö','ü','Ä','Ö','Ü','ß'), array('%C3%A4','%C3%B6','%C3%BC','%C3%84','%C3%96','%C3%9C','%C3%9F'), $anzeigename);
		if ($_SESSION['device']=='pda') {
			return (($cfg_modern)?'':'<font size=2 color=blue>').'<b '.(($cfg_modern)?'style="font-size:14px;"':'').'>'.$anzeigename.'</b>'.(($cfg_modern)?'':'</font>').($neu?'':' <font size=1 '.(($cfg_modern)?'style="font-size:8px;"':'').'>('._NR_.': '.$_SESSION['stammdaten_id'].')<br>'.(($cfg_speed and !$cfg_filter_cache)?'':_FILTERANZAHL_).': '.($cfg_filter_cache?(intval($_SESSION['stammdaten_id_nr']+1)).' '._VON_.' ':'').(($cfg_speed and !$cfg_filter_cache)?'':$_SESSION['anzahl_saetze']).((!$cfg_speed and $_SESSION['anzahl_saetze']!=$_SESSION['anzahl_saetze2'])?'/ '._DSAETZE_.': '.$_SESSION['anzahl_saetze2']:'')).' / '.link2(_STAMMDATEN_NAV_LISTE_, 'stammdaten_liste.php','','',(($cfg_modern)?' style="font-size:8px;"':'')).'</font>';
		} else {
			$xt=(($cfg_modern)?'':'<font size=3 color=blue>').'<b '.(($cfg_modern)?'style="font-size:14px;"':'').'>'.$anzeigename.'</b>'.(($cfg_modern)?'':'</font>').($neu?'':'<br><font size=1 '.(($cfg_modern)?'style="font-size:8px;"':'').'>('._NR_.': '.$_SESSION['stammdaten_id'].')'.($google_suche?' <a href="http://www.google.de/search?hl=de&ie=UTF-8&q='.p4n_mb_string('str_replace', ' ','+',$anz2).'+Potsdam&meta=lr%3Dlang_de" target="_blank">Google</a>':'').' / ');
			
			if ($cfg_speed and !$cfg_filter_cache) {
				
			} else {
				if (true or !$cfg_erstaufruf_schnell) {
					$xt.=_FILTERANZAHL_;
				}
			}
			if (true or !$cfg_erstaufruf_schnell) {
				$xt.=': ';
			}
			if ($cfg_filter_cache) {
				$xt.=intval($_SESSION['stammdaten_id_nr']+1).' '._VON_.' ';
			}
			if ($cfg_speed and !$cfg_filter_cache) {
				
			} else {
				if (true or !$cfg_erstaufruf_schnell) {
					$xt.=$_SESSION['anzahl_saetze'];
				}
			}
			if (!$cfg_speed and $_SESSION['anzahl_saetze']!=$_SESSION['anzahl_saetze2']) {
				if (true or !$cfg_erstaufruf_schnell) {
					$xt.='/ '._DSAETZE_.': '.$_SESSION['anzahl_saetze2'];
				}
			}
			if (p4n_mb_string('strpos', $_SESSION['rechte_reiter'], 'stammdaten_liste.php?nav=Liste')!=false and ($_SESSION['filteraktiv'] or $_SESSION['gruppeaktiv'] or $_SESSION['gruppeaktiv_n'])) {
				$xt.=' / '.link2(_STAMMDATEN_NAV_LISTE_, 'stammdaten_liste.php','','',(($cfg_modern)?' style="font-size:10px;"':''));
			}
			$xt.='</font>';
			
			return $xt;
		}
	}
	
    function sql_gruppe_stdmandant($mandanten_array = array()) {
        global $db, $sql_tab, $sql_tabs, $cfg_vw;
        
        if ($_SESSION['stdmandant'] != '') {
            //return $_SESSION['stdmandant'];
        }
        if (empty($mandanten_array)) {
            $mandanten_array = $_SESSION['benutzer_mandant'];
        }
        $where_sql = '';
        if ($mandanten_array != -1) {
            if (strlen(str_replace(',', '', $mandanten_array)) > 0) {
                $result = $db->select(
                    array(
                        $sql_tab['mandant'],
                    ),
                    array(
                        $sql_tabs['mandant']['mandant_id'],
                        $sql_tabs['mandant']['parent_id']
                    ),
                    $db->dbzahlin($mandanten_array,$sql_tabs['mandant']['mandant_id'])
                );
                $mandanten = array();
                $lagerorte = array();
                while ($row = $db->zeile($result)) {
                    if (intval($row[1]) > 0) {
                        $lagerorte[] = intval($row[0]);
                    } else {
                        $mandanten[] = intval($row[0]);
                    }
                }
                $where_sql_temp = '';
                if (count($mandanten) > 0) {
                    $where_sql_temp = $db->dbzahlin($mandanten,$sql_tabs['stammdaten']['mandant']);
                    if ($cfg_vw) {
                        $lagerorte[] = 0;
                }
                }
                if (count($lagerorte) > 0) {
                    if ($where_sql_temp != '') {
                        $where_sql_temp .= ' and ';
                    }
                    $where_sql_temp .= $db->dbzahlin($lagerorte,$sql_tabs['stammdaten']['vpb']);
                }
                if ($where_sql_temp != '') {
                    $where_sql = $where_sql_temp;
                }
            }
        }
        $_SESSION['stdmandant'] = $where_sql;
        return $_SESSION['stdmandant'];
    }
    
    function session_gruppe_aktiv_n($stid_feld = '') {
        global $db, $sql_tab, $sql_tabs;
        /*
        if ($stid_feld=='') {
            $stid_feld = 'global';
        }
        if (true or isset($_GET['gruppeneu']) or $_GET['fn']=='1') {
            unset($_SESSION['session_gruppe_aktiv'][$stid_feld]);
        }
        if (isset($_SESSION['session_gruppe_aktiv']) && isset($_SESSION['session_gruppe_aktiv'][$stid_feld]) && isset($_SESSION['session_gruppe_aktiv'][$stid_feld]['t']) && time() > intval($_SESSION['session_gruppe_aktiv'][$stid_feld]['t'])+300) {
            unset($_SESSION['session_gruppe_aktiv'][$stid_feld]);
        } elseif (!isset($_SESSION['session_gruppe_aktiv'])) {
            $_SESSION['session_gruppe_aktiv'] = array();
        }
        
        if (!isset($_SESSION['session_gruppe_aktiv'][$stid_feld])) {*/
            $res=$db->select(
                array(
                    $sql_tab['stammdaten'],
                    $sql_tab['stammdaten_gruppe_zuordnung']
                ),
                'distinct '.$sql_tabs['stammdaten']['id'],
                $db->dbzahlin($_SESSION['gruppeaktiv_n'],$sql_tabs['stammdaten_gruppe_zuordnung']['gruppe_id']),
                '',
                '',
                array(
                    $sql_tabs['stammdaten_gruppe_zuordnung']['stammdaten_id']
                        => $sql_tabs['stammdaten']['id']
                )
            );
            $nicht = array();
            while ($row=$db->zeile($res)) {
                $nicht[$row[0]] = $row[0];
            }
            return $nicht;
            //$_SESSION['session_gruppe_aktiv'][$stid_feld]=array('t' => time(), 'value' => $nicht);
        //}
        //return $_SESSION['session_gruppe_aktiv'][$stid_feld]['value'];
    }
    
    function get_liste_von_ids($stid_feld = '') {
        global $db, $sql_tab, $sql_tabs;
        /*
        if ($stid_feld=='') {
            $stid_feld = 'global';
        }
        if (true or isset($_GET['gruppeneu']) or $_GET['fn']=='1') {
            unset($_SESSION['liste_von_ids_sess'][$stid_feld]);
        }
        
        if (isset($_SESSION['liste_von_ids_sess']) && isset($_SESSION['liste_von_ids_sess'][$stid_feld]) && isset($_SESSION['liste_von_ids_sess'][$stid_feld]['t']) && time() > intval($_SESSION['liste_von_ids_sess'][$stid_feld]['t'])+300) {
            unset($_SESSION['liste_von_ids_sess'][$stid_feld]);
        } elseif (!isset($_SESSION['liste_von_ids_sess'])) {
            $_SESSION['liste_von_ids_sess'] = array();
        }
        
        if (!isset($_SESSION['liste_von_ids_sess'][$stid_feld])) {*/
            $liste_von_ids = array();
            if ($_SESSION['benutzer_ownlocation'] and $_SESSION['benutzer_mandant_auswertung'] != '-1') {
                $result_nur_betreuer = $db->select(
                    $sql_tab['stammdaten'], 
                    $sql_tabs['stammdaten']['id'], 
                    $sql_tabs['stammdaten']['vpb'].' in ('.$db->dbzahlin($_SESSION['benutzer_mandant_auswertung']).')'
                );
                while ($row_nur_betreuer = $db->zeile($result_nur_betreuer)) {
                    $liste_von_ids[$row_nur_betreuer[0]] = $row_nur_betreuer[0];
                }
            }

            if ($_SESSION['nur_betreuer']) {
                $result_nur_betreuer = $db->select(
                    $sql_tab['stammdaten'], 
                    $sql_tabs['stammdaten']['id'], 
                    $sql_tabs['stammdaten']['betreuer'].'='.$db->dbzahl($_SESSION['user_id']).' or '.
                    $sql_tabs['stammdaten']['betreuer2'].'='.$db->dbzahl($_SESSION['user_id'])
                );
                $recht_zusaetzlich_eingrenzen = false;
                $liste_von_ids_temp = array();
                if (!empty($liste_von_ids)) {
                    $recht_zusaetzlich_eingrenzen = true;
                }
                while ($row_nur_betreuer = $db->zeile($result_nur_betreuer)) {
                    if ($recht_zusaetzlich_eingrenzen) {
                        if (!isset($liste_von_ids[$row_nur_betreuer[0]])) {
                            continue;
                        }
                    }
                    $liste_von_ids_temp[$row_nur_betreuer[0]] = $row_nur_betreuer[0];
                }
                $liste_von_ids = $liste_von_ids_temp;
                if ($_SESSION['cfg_kunde'] == 'crm_sensus') {
                    $result_laender = $db->select(
                        array(
                            $sql_tab['benutzer_land'],
                            $sql_tab['crmcodes']
                        ), 
                        array(
                            $sql_tabs['crmcodes']['text1'],
                        ), 
                        $sql_tabs['benutzer_land']['benutzer_id'].'='.$db->dbzahl($_SESSION['user_id']).' and '.
                        $sql_tabs['benutzer_land']['land'].'='.$sql_tabs['crmcodes']['code1'].' and '.
                        $sql_tabs['crmcodes']['art'].'='.$db->str('SENSUS_LAND')
                    );
                    $tt_laender_k = array();
                    while ($row_laender = $db->zeile($result_laender)) {
                        $tt_laender_k[] = $db->str($row_laender[0]);
                    }
                    if (!empty($tt_laender_k)) {
                        $result_sgruppen = $db->select(
                            array(
                                $sql_tab['stammdaten_gruppe'],
                            ), 
                            $sql_tabs['stammdaten_gruppe']['gruppe_id'],
                            $sql_tabs['stammdaten_gruppe']['bezeichnung'].'='.$db->str('Leads').' or '.$sql_tabs['stammdaten_gruppe']['bezeichnung'].'='.$db->str('Potential IBs')
                        );
                        $gruppen_id_array = array();
                        while ($row_sgruppen = $db->zeile($result_sgruppen)) {
                            if (!isset($_SESSION['gruppeaktiv']) || $_SESSION['gruppeaktiv'] == $row_sgruppen[0]) {
                                $gruppen_id_array[$row_sgruppen[0]] = $row_sgruppen[0];
                            }
                        }
                        if (!empty($gruppen_id_array)) {
                            $result_laender_gruppen_ids = $db->select(
                                array(
                                    $sql_tab['stammdaten_gruppe_zuordnung'],
                                    $sql_tab['stammdaten_adresse']
                                ),
                                $sql_tabs['stammdaten_gruppe_zuordnung']['stammdaten_id'],
                                $db->dbzahlin($gruppen_id_array, $sql_tabs['stammdaten_gruppe_zuordnung']['gruppe_id']).' and '.
                                $db->dbstrin($tt_laender_k, $sql_tabs['stammdaten_adresse']['land']).' and '.
                                $sql_tabs['stammdaten_adresse']['stammdaten_id'].'='.$sql_tabs['stammdaten_gruppe_zuordnung']['stammdaten_id']
                            );
                            while ($row_laender_gruppen_ids = $db->zeile($result_laender_gruppen_ids)) {
                                $liste_von_ids[$row_laender_gruppen_ids[0]] = $row_laender_gruppen_ids[0];
                            }
                        }
                    }
                }
                if (is_array($liste_von_ids) && count($liste_von_ids) == 0) {
                    $liste_von_ids = array(0);
                }
            }
            return $liste_von_ids;
            //$_SESSION['liste_von_ids_sess'][$stid_feld] = array('value' => $liste_von_ids, 't' => time());
        //}
        //return $_SESSION['liste_von_ids_sess'][$stid_feld]['value'];
    }

    function sql_gruppe($stid_feld, $ohne_mand=false) {
		global $sql_tabs, $sql_tab, $cfg_db_subselects, $cfg_ignoriere_gruppenzuordnung;
		global $db, $cfg_kunde_mandlao;
        
        $sql='';
        // nicht zugeordnet:
        if (isset($_SESSION['gruppeaktiv']) and $_SESSION['gruppeaktiv']=='-2') {
            return '-2';
        }

        if (isset($_SESSION['gruppeaktiv']) and isset($_SESSION['gruppeaktiv_n']))
            $sql.='(';
        if (isset($_SESSION['gruppeaktiv']))
            $sql.=' '.$db->dbzahlin($_SESSION['gruppeaktiv'],$sql_tabs['stammdaten_gruppe_zuordnung']['gruppe_id']);

        if (isset($_SESSION['gruppeaktiv']) and isset($_SESSION['gruppeaktiv_n']))
            $sql.=' and ';

        if (isset($_SESSION['gruppeaktiv_n'])) {
            if ($cfg_db_subselects) {
                $nicht='select '.$sql_tabs['stammdaten_gruppe_zuordnung']['stammdaten_id'].' from '.$sql_tab['stammdaten_gruppe_zuordnung'].' where '.$db->dbzahlin($_SESSION['gruppeaktiv_n'],$sql_tabs['stammdaten_gruppe_zuordnung']['gruppe_id']);
                if (isset($_SESSION['filteraktiv'])) {
                    $sql_feld = ($stid_feld=='') ? $sql_tabs['stammdaten']['id'] : $stid_feld;
                    $sql.=$sql_feld.' not in ('.$nicht.')';
                } else {
                    $sql.=$sql_tabs['stammdaten']['id'].' not in ('.$nicht.')';
                }
            } else {
                $nicht=session_gruppe_aktiv_n($stid_feld);
                if (!empty($nicht)) {
                    if (isset($_SESSION['filteraktiv'])) {
                        $sql_feld = ($stid_feld=='') ? $sql_tabs['stammdaten']['id'] : $stid_feld;
                        $sql.=' '.$db->dbzahlin($nicht,$sql_feld,'NOT IN');
                    } else {
                        $sql.=' '.$db->dbzahlin($nicht,$sql_tabs['stammdaten']['id'],'NOT IN');
                    }
                } else {
                    $sql.='1=1';
                }
            } // ende if subsel.
            //$sql.=$sql_tabs['stammdaten_gruppe_zuordnung']['gruppe_id'].' not in ('.$_SESSION['gruppeaktiv_n'].')';
        }

        if (!$cfg_ignoriere_gruppenzuordnung and !$_SESSION['rechte_gruppen_alle'] and isset($_SESSION['rechte_gruppen'])) {
            if ($sql!='') {
                $sql.=' and ';
            }
            $sql.=' '.$db->dbzahlin($_SESSION['rechte_gruppen'],$sql_tabs['stammdaten_gruppe_zuordnung']['gruppe_id']);
        }

        if ($_SESSION['nur_rechte_marke']==1) {
            if ($sql!='') {
                $sql.=' and ';
            }
            if ($stid_feld!='' && $stid_feld!=$sql_tabs['stammdaten']['id']) {
                $sql.=' '.$stid_feld.' in (select '.$sql_tabs['stammdaten']['id'].' from '.$sql_tab['stammdaten'].' where '.$_SESSION['rechte_marke_sql'].')';
            } else {
                $sql.=' '.$_SESSION['rechte_marke_sql'];

            }
        }
        if ($_SESSION['nur_kfzbetreuer']==1) {
            if ($sql!='') {
                $sql.=' and ';
            }
            if ($stid_feld!='' && $stid_feld!=$sql_tabs['stammdaten']['id']) {
                $sql.=' '.$stid_feld.' in (select '.$sql_tabs['stammdaten']['id'].' from '.$sql_tab['stammdaten'].' where '.$_SESSION['rechte_kfzbetreuer_sql'].')';
            } else {
                $sql.=' '.$_SESSION['rechte_kfzbetreuer_sql'];
            }
        }
        $liste_von_ids = get_liste_von_ids($stid_feld);
        if (is_array($liste_von_ids) && count($liste_von_ids) > 0 && $stid_feld != '') {
            if ($sql!='') {
                $sql.=' and ';
            }
            global $carlo_tw;
            if ($_SESSION['user_id']>0 && $carlo_tw && count($liste_von_ids) > 100 && $stid_feld==$sql_tabs['stammdaten']['id']) {
                $temp_table_name = '##'.substr(md5(openssl_random_pseudo_bytes(15).time()), 0, 10);
                $temp_field = 'stammdaten_id';
                $db->select2('CREATE TABLE '.$temp_table_name.' ('.$temp_field.' integer PRIMARY KEY IDENTITY(1,1) not null);');
                $iz = 1;
                $liste_von_ids2 = array();
                foreach ($liste_von_ids as $idf) {
                    $liste_von_ids2[] = $idf;
                    if ($iz % 100 == 0) {
                        $temp_values=implode('),(', $liste_von_ids2);
                        $db->select2('insert into '.$temp_table_name.' ('.$temp_field.') values ('.$temp_values.');');
                        $liste_von_ids2 = array();
                    }
                    $iz++;
                }
                if (!empty($liste_von_ids2)) {
                    $temp_values=implode('),(', $liste_von_ids2);
                    $db->select2('insert into '.$temp_table_name.' ('.$temp_field.') values ('.$temp_values.');');
                }
                $sql.=' '.$stid_feld.' in (select '.$temp_field.' from '.$temp_table_name.')';
            } else {
                $sql.=' '.$db->dbzahlin($liste_von_ids,$stid_feld);
            }
        }

        if ($stid_feld!=$sql_tabs['stammdaten_ansprechpartner']['stammdaten_id']) {
            if (!$ohne_mand and $stid_feld!='' and $_SESSION['benutzer_mandant']!='-1' and $_SESSION['benutzer_mandant']!='') {
                $bm_feld=$sql_tabs['stammdaten'][($cfg_kunde_mandlao) ? 'vpb' : 'mandant'];
                // Filterfeld?
                if ($stid_feld != 'crm_filter_'.$_SESSION['filteraktiv'].'.stammdaten_id') { //TT: Das war der Grund, wieso ichs mal rausgenommen hatte. Bei aktivem Filter wird crm_filter_1.mandant_id gesucht... Fehler
                    if ($stid_feld!=$sql_tabs['stammdaten']['id']) {
                        $bm_feld=p4n_mb_string('str_replace', 'stammdaten_id', 'mandant_id', $stid_feld);
                    }
                    if ($_SESSION['benutzer_mandant']!='-1') {// && !isset($_SESSION['filteraktiv'])) {//TT: 17.08.2017 es muss auch für Filter das Recht eingeschränkt werden.
                        if ($sql!='') {
                            $sql.=' and ';
                        }
                        if ($stid_feld==$sql_tabs['stammdaten']['id'] && $_SESSION['benutzer_mandant']!='-2') {
                            global $carlo_tw, $cfg_vw;
                            if ($carlo_tw) {
                                $alle_mandant_ids = @explode(',', $_SESSION['benutzer_mandant']);
                                $mandanten_ = array();
                                if ($cfg_vw) {
                                    $vpbs_ = array(0);
                                }
                                else {
                                    $vpbs_ = array();
                                }

                                foreach ($alle_mandant_ids as $mandanten_values) {
                                    list($md, $lagid) = split_mandant($mandanten_values);
                                    if ($md > 0) {
                                        $mandanten_[$md] = $md;
                                    }
                                    if ($lagid > 0) {
                                        $vpbs_[$lagid] = $lagid;
                                    }
                                }
                                $add_and=true;
                                if (count($mandanten_) > 0) {
                                    $sql.=' '.$db->dbzahlin($mandanten_,$sql_tabs['stammdaten']['mandant']);
                                } else {
                                    $add_and=false;
                                }
                                if (count($vpbs_) > 0) {
                                    if ($sql!='' && $add_and) {
                                        $sql.=' and ';
                                    }
                                    $sql.=' '.$db->dbzahlin($vpbs_,$sql_tabs['stammdaten']['vpb']);
                                }
                            } else {
                                $sql.=' '.$db->dbzahlin($_SESSION['benutzer_mandant'],$bm_feld);
                            }
                        } else {
                            $sql.=' '.$db->dbzahlin($_SESSION['benutzer_mandant'],$bm_feld);
                        }
                        if ($_SESSION['cfg_kunde']=='carlo_vw_lundb' and $stid_feld==$sql_tabs['stammdaten']['id']) {
                            $sql.=' and '.$db->dbzahlin($_SESSION['benutzer_mandant'],$sql_tabs['stammdaten']['obervpnr']);
                        }
                    }
                }
            }
        }
        if (isset($_SESSION['gruppeaktiv']) and isset($_SESSION['gruppeaktiv_n'])) {
            $sql.=')';
        }

        if ($sql=='') {
            $sql='1=1';
        }
        return $sql;
	}
	
	function gruppe_filtername() {
		global $sql_tab, $sql_tabs;
		$db=new PDB;
		$text='';
		
		if ($_SESSION['gruppeaktiv']=='-2') {
			return _GRUPPENFILTER_NICHT_ZUGEORDNET_;
		}
		
		if (isset($_SESSION['gruppeaktiv'])) {
			$grfs=$_SESSION['gruppeaktiv'];
			if (trim($_SESSION['gruppeaktiv'])=='') {
				$grfs=-1;
			}
			$res=$db->select(
				$sql_tab['stammdaten_gruppe'],
				$sql_tabs['stammdaten_gruppe']['bezeichnung'],
				$db->dbzahlin($grfs,$sql_tabs['stammdaten_gruppe']['gruppe_id'])
			);
			while ($row=$db->zeile($res)) {
				$text.=$row[0].($_SESSION['gf_schnitt']==1?' '._UND_.' ':' / ');
			}
			if ($_SESSION['gf_schnitt']==1) {
				$text=p4n_mb_string('substr', $text,0,-5);
			} else {
				$text=p4n_mb_string('substr', $text,0,-3);
			}
		}
		
		if (isset($_SESSION['gruppeaktiv']) and isset($_SESSION['gruppeaktiv_n']))
			$text.=' // ';
		
		if (isset($_SESSION['gruppeaktiv_n'])) {
			$text.=' nicht ';
			$res=$db->select(
				$sql_tab['stammdaten_gruppe'],
				$sql_tabs['stammdaten_gruppe']['bezeichnung'],
				$db->dbzahlin($_SESSION['gruppeaktiv_n'],$sql_tabs['stammdaten_gruppe']['gruppe_id'])
			);
			while ($row=$db->zeile($res))
				$text.=$row[0].' / ';
			$text=p4n_mb_string('substr', $text,0,-3);
		}
        
        return $text;
	}
	
	function dirliste($verz, $anfang='', $loeschlink=false) {
		global $phs;
		$text='';
		$i=0;
		$files=array();
		$files_datum=array();
		$dp=opendir($verz);
		while ($file=readdir($dp)) {
			if ($file != "." && $file != ".." && $file!="index.html") {
				
				if ($anfang!='') {
					if (p4n_mb_string('substr', $file, 0, p4n_mb_string('strlen', $anfang))!=$anfang) {
						continue;
					}
				}
				
				$files[$i]=$file;
				$files_attrib[$i]=stat($verz.'/'.$file);
				$files_datum[$i]=$files_attrib[$i][10];
				$i++;
			}
		}
		closedir($dp);
		@array_multisort($files_datum, $files);
		for ($i=count($files)-1; $i>=0; $i--) {
			$file2=$files[$i];
			if ($anfang!='') {
				$file2=p4n_mb_string('substr', $files[$i], p4n_mb_string('strlen', $anfang));
			}
			$text.=date('d.m.Y H:i:s', $files_datum[$i]).': '.link2(abkuerzung($file2, 70), $verz.'/'.$files[$i], '', '', 'target="_blank"').($loeschlink?' '.link2(_LOESCHEN_, $phs.'?loeschdat='.base64_encode($verz.'/'.$files[$i]), 'loesch.gif', _ABFRAGE_LOESCHEN_):'').'<br>';
		}
		return '<font size=1>'.$text.'</font>';
	}
	
	function xmd5() {
		return md5(uniqid(rand(),1));
	}

/**
 * @param $werte
 * @param bool|false $quer
 * @param bool|false $mit_farbe
 * @param bool|false $width_auto
 * @return string
 */
	function htmltable($werte, $quer=false, $mit_farbe=false, $width_auto=false) {
        global $cfg_modern;
		$t='';
		@reset($werte);
		$t.='<table class="moderntable  table-nohover table-td-small"'.($width_auto?' style="width:auto;" data-small="0"':'').'><!sbl>'."\n";
		while (list($key,$val)=@each($werte)) {
		if ($mit_farbe)
			$t.="<tr".tabfarbe().">\n";
		else
			$t.="<tr>\n";
		
			while (list($key2,$val2)=@each($val)) {
				if ($quer) {
					if ($key2==0)
						$t.='	<th>'.$val2.'</th>';
					else {
						$t.='	<td>'.$val2.'</td>';
					}
				} else {
					if ($key==0) {
						$t.='	<th>'.$val2.'</th>';
                    } else {
						if ($val2!='') {
							$zi=$key+1;
							while (isset($werte[$zi][$key2]) and $werte[$zi][$key2]=='') {
								$zi++;
                            }
							if ($zi>($key+1)) {
								$t.='	<td rowspan="'.($zi-$key).'">'.$val2.'</td>';
                            } else {
								$t.='	<td>'.$val2.'</td>';
						}
					}
				}
			}
			}
			$t.="</tr>\n";
		}
		$t.="</table>\n";
		return $t;
	}
	
	function geld2sql($wert) {
		$wert=preg_replace('/[^0-9,\.]/', '', $wert);
		if (p4n_mb_string('strstr', $wert, ',')!=false)
			$wert=p4n_mb_string('str_replace', '.', '', $wert);
		$wert=p4n_mb_string('str_replace', ',', '.' ,$wert);
		if ($wert=='') {
			$wert=0;
		}
		return $wert;
	}
	function datum2sql($wert, $onlydate=false) {
		global $db;
//echo $wert.'<br>';
		
		$dt=false;
		if (is_numeric($wert))
			$wert=@date('d.m.Y', $wert);
		else {
			if (p4n_mb_string('substr_count', $wert, '.')==2 and p4n_mb_string('substr_count', $wert, ':')==1) {
				if (preg_match('/(\d{2})\.(\d{2})\.(\d{4}).*(\d{2}):(\d{2})/', $wert, $x)) {
					$wert=adodb_mktime($x[4], $x[5], 0, $x[2], $x[1], $x[3]);
				}
				$dt=true;
			} elseif (p4n_mb_string('substr_count', $wert, '.')==2 and p4n_mb_string('substr_count', $wert, ':')==2) {
				if (preg_match('/(\d{2})\.(\d{2})\.(\d{4}).*(\d{2}):(\d{2}):(\d{2})/', $wert, $x)) {
					$wert=adodb_mktime($x[4], $x[5], $x[6], $x[2], $x[1], $x[3]);
				}
				$dt=true;
			} elseif (p4n_mb_string('substr_count', $wert, '.')==2) {
				$x=explode('.', $wert);
				$wert=sprintf('%02d.%02d.%04d', $x[0],$x[1],$x[2]);
			} elseif (p4n_mb_string('substr_count', $wert, '-')==2) {
				$x=explode('-', $wert);
				$wert=sprintf('%02d.%02d.%04d', $x[2],$x[1],$x[0]);
			}
		}
		if ($onlydate==false) {
			if ($dt)
				$wert=$db->dbtimestamp($wert);
			else
				$wert=$db->dbdate($wert);
		}
		if ($wert=='null') {
			$wert=$db->dbdate('0000-00-00');
		}
		return $wert;
	}
	function strip_prefix($sql) {
		global $prefix;
		return p4n_mb_string('str_replace', $prefix,'',$sql);
	}
	function kontakt2db($wert) {
		global $kontakt_typ_db, $sql_tabs;
		if (is_numeric($wert)) {
			$wert=$kontakt_typ_db[$wert];
		}
		$fname=p4n_mb_string('str_replace', array(' ','-'), array('_',''), $wert);
		
		if (!isset($sql_tabs['stammdaten'][$fname])) {
			return '';
		}
		
		return $fname;
	}
	function eingabe2anzeigename($vorname, $name, $titel, $firma, $anrede='', $firma2='', $firma3='') {
		global $cfg_anzname;
		
		$text='';
		
		if (isset($cfg_anzname) and $cfg_anzname!='') {
			$text=$cfg_anzname;
			if (($firma!='' and p4n_mb_string('strpos', $cfg_anzname, 'f')===false) or ($firma!='' and $name=='')) {
				$text=preg_replace('/{f}/i', '', $text);
				$text=preg_replace('/{v.*n}/i', '{f}', $text);
				$text=preg_replace('/{n.*v}/i', '{f}', $text);
				$text=preg_replace('/{t}/i', '', $text);
				$text=preg_replace('/{a}/i', '', $text);
			}
			$text=p4n_mb_string('str_replace', '{a}', $anrede, $text);
			$text=p4n_mb_string('str_replace', '{t}', $titel, $text);
			$text=p4n_mb_string('str_replace', '{v}', $vorname, $text);
			$text=p4n_mb_string('str_replace', '{n}', $name, $text);
			$text=p4n_mb_string('str_replace', '{f}', $firma, $text);
			if ($firma2=='' and $firma3=='') {
				$firma2=$name;
                $firma3=$vorname;
            }
			$text=p4n_mb_string('str_replace', '{f2}', $firma2, $text);
			$text=p4n_mb_string('str_replace', '{f3}', $firma3, $text);
			
			$text=trim(p4n_mb_string('str_replace', array('  ', '()'), array(' ', ''), p4n_mb_string('str_replace', '  ', ' ', p4n_mb_string('str_replace', '  ', ' ', $text))));
		} else {
			if ($name!='') {
				$text.=$name;
				if ($vorname!='') {
					$text.=', '.$vorname;
				}
				if ($titel!='')
					$text=$titel.' '.$text;
			}
			if ($firma!='') {
				if ($text=='')
					$text=$firma;
				else
					$text.=' ('.$firma.')';
			}
		}
		
		$text=trim($text);
		if ($text=='' and $vorname!='') {
			$text=trim($vorname);
		}
		
		return $text;
	}
	
	function tabfarbe() {
        global $cfg_modern;
        if ($cfg_modern) {
            return '';
        }
		$text=' onMouseover="m=this.className; this.className=\'tabover\';" onMouseout="this.className=m;" ';
//		class="tabout" 
		return $text;
	}
	
	function anrufen($tel, $overlib=false) {
		global $ol,$cfg_modern, $cfg_sipgate, $cfg_cti_korrinsert;
		
		if ($overlib!==false) {
			if (!isset($ol)) {
				include_once("class.overlib.php");
				$ol = new Overlib();
			}
			$ol->set("width",300);
			$olt=oltext2($overlib, _CTI_ANRUFEN_);
		}
		$ctikorr='';
		if ($cfg_cti_korrinsert) {
			$ctikorr=' window.open(\'korrespondenz.php?uecti='.base64_encode($_SESSION['stammdaten_id'].'___'.$tel).'\', \'status\'); ';
		}
		$img='bilder/anrufen_cti.gif';
		return '<input type='.($cfg_modern?'submit':'image').' class="'.($cfg_modern?'icon icon-mic ':'').'vmitte" '.($cfg_modern?'value="&nbsp;"':'src="'.$img.'"').' onClick="'.$ctikorr.'x=\''.$tel.'\'; '.(($_SESSION['catch_cti_aktiv']&&!$cfg_sipgate)?'anrufen(x);':'x=x.replace(/\+49/, \'\'); x=x.replace(/^49 /, \'\'); x=x.replace(/^ 49 /, \'\'); x=x.replace(/\+|\s|\.|\-|\(|\)|\//g, \'\'); if (x.length>8 && x.charAt(0)!=\'0\') x=\'0\'+x; anrufen(x);').' return false;"'.$olt.'>';
	}
	
	function ansi2oem($text) {
		if ($_SESSION['db_utf8']) {
			return $text;
		}
	//	äöü ÄÖÜ ß
	//	õ÷³ -Í_ ¯
		$ansi2oem=array('õ'=>'ä', '÷'=>'ö', '³'=>'ü', 'Ä'=>'Ä', 'Í'=>'Ö', 'Ü'=>'Ü', '¯'=>'ß', 'Ú'=>'é');
		return strtr($text, $ansi2oem);
	}
	function oem2ansi($text) {
		if ($_SESSION['db_utf8']) {
			return $text;
		}
		$oem2ansi=array('á'=>'ß', 'Ž'=>'Ä', 'š'=>'Ü', '„'=>'ä', chr(hexdec('81'))=>'ü', '”'=>'ö', '™'=>'Ö');
		return strtr($text, $oem2ansi);
	}
	
	function stabwn($werte) {
		$ds=0;
		$anzahl=count($werte);
		
		if ($anzahl==0)
			return 0;
		
		@reset($werte);
		while (list($key, $val)=@each($werte)) {
			$ds+=$val;
		}
		$ds=$ds/$anzahl;
		
		$x=0;
		@reset($werte);
		while (list($key, $val)=@each($werte)) {
			$x+=($val-$ds)*($val-$ds);
		}
		
		if ($x==0)
			return 0;
		
		return (sqrt($x/$anzahl));
	}
	
	function name2filename($name) {
	    global $carlo_tw;
		$name=p4n_mb_string('str_replace', '.php', '.txt', $name);
		$name=p4n_mb_string('str_replace', '.html', '.txt', $name);
		$name=p4n_mb_string('str_replace', '.htm', '.txt', $name);
		$name=p4n_mb_string('str_replace', '.js', '.txt', $name);
		$name=p4n_mb_string('str_replace', '.py', '.txt', $name);
        if ($carlo_tw) {
            // strips anything multibyte out of the string.
            $name = preg_replace('/[\x80-\xFF]/', '', $name);
            $name=urlencode($name);
        }
		$name=p4n_mb_string('str_replace', array('%'), array('proz'), $name);
		$name=p4n_mb_string('str_replace', array('ä', 'ö', 'ü', 'Ä', 'Ö', 'Ü', 'ß'), array('ae', 'oe', 'ue', 'Ae', 'Oe', 'Ue', 'ss'), $name);
		$name=p4n_mb_string('str_replace', array('>', '<', '*', '?', '"', '|', ':', '/', "\\"), array(' '._GROESSER_.' ', ' '._KLEINER_.' ', ' x ', '_', '_', '_', '_', '_', '_'), $name);
		return $name;
	}
    
    function name2jsname($name='') {
        $name=p4n_mb_string('str_replace', array('ä', 'ö', 'ü', 'Ä', 'Ö', 'Ü', 'ß'), array('ae', 'oe', 'ue', 'Ae', 'Oe', 'Ue', 'ss'), $name);
        $name=strtolower(preg_replace("/[^0-9a-zA-Z\_\-\[\]]/", "", $name));
        return $name;
    }
    
	function phone2($nr, $nullplus=false, $ohnelandcity=false) {
		global $cfg_citycode, $cfg_countrycode;
		
		$nr=trim($nr);
		$mit49=false;
		if (p4n_mb_string('substr', $nr, 0, 2)=='00') {
			$nr='+'.p4n_mb_string('substr', $nr, 2);
			$mit49=true;
		} elseif ($nullplus and p4n_mb_string('substr', $nr, 0, 1)=='+') {
			$nr='00'.p4n_mb_string('substr', $nr, 1);
			$mit49=true;
		}
		if (preg_match('/^\+0{0,2}(\d\d)(.*)/', $nr, $matches) or preg_match('/^0{0,2}(\d\d)\s(.*)/', $nr, $matches) or preg_match('/^\+*0{0,2}\[(\d\d)\]\s*(.*)/', $nr, $matches)) {
			// mit Vorwahl
			$vorwahl=$matches[1];
			$tel=$matches[2];
			$tel=p4n_mb_string('str_replace', array('+',' ','.','-','(',')','/','[',']'), '', $tel);
			if (!$nullplus and p4n_mb_string('substr', $tel, 0, 1)=='0') {
				$tel=p4n_mb_string('substr', $tel, 1);
			}
			if ($nullplus and !$mit49) {
				if (p4n_mb_string('substr', $vorwahl, 0, 1)!='0') {
					$vorwahl='0'.$vorwahl;
				}
			}
			$nr=$vorwahl.$tel;
			if ($mit49) {
				$nr='00'.$nr;
			}
		} else {
			if (!$nullplus and p4n_mb_string('substr', $nr, 0, 1)=='0') {
				$nr=p4n_mb_string('substr', $nr, 1);
			} else {
				if (!$ohnelandcity) {
					$nr=$cfg_citycode.$nr;
				}
			}
			if (!$ohnelandcity) {
				$nr=$cfg_countrycode.$nr;
			}
		}
		$nr=p4n_mb_string('str_replace', array('+',' ','.','-','(',')','/','[',']'), '', $nr);
		return $nr;
	}
	
	function syncml_id() {
		return $_SESSION['user_id'].'_'.$_SESSION['stammdaten_id'];
	}
	
	function filter_ergebnis($ohne_gruppe=false, $ohne_mand=false, $param=array()) {
		global $sql_tab, $sql_tabs, $db, $cfg_speed, $cfg_liste_standardsort, $cfg_callcenter, $filter_ergebnis_zusbed_st, $cfg_db_subselects, $cfg_ignoriere_gruppenzuordnung;
		global $prefix, $lang_db_f;
		$sfrom2='and';
		$sfrom=$sql_tab['stammdaten'].','.$sql_tab['stammdaten_gruppe_zuordnung'].' where ';
		$swh=sql_gruppe($sql_tabs['stammdaten']['id'], $ohne_mand);
		
		if ($_SESSION['gruppeaktiv']=='-2') {
			$sfrom=$sql_tab['stammdaten'].' LEFT JOIN '.$sql_tab['stammdaten_gruppe_zuordnung'].' ON ';
			$sfrom2='where';
			$swh=$sql_tabs['stammdaten_gruppe_zuordnung']['gruppe_id'].' IS NULL';
		}
		
		if ($_SESSION['gf_schnitt']==1) {
//			$sfrom=$sql_tab['stammdaten'].','.$sql_tab['stammdaten_gruppe_zuordnung'];
			$sfrom=$sql_tab['stammdaten_gruppe_zuordnung'].','.$sql_tab['stammdaten'];
			$sfr=1;
			$expl_gr=explode(',', $_SESSION['gruppeaktiv']);
			while (list($key, $val)=@each($expl_gr)) {
				$sfrom.=' JOIN '.$sql_tab['stammdaten_gruppe_zuordnung'].' AS tab'.$sfr.' ON (tab'.$sfr.'.stammdaten_id='.$sql_tabs['stammdaten']['id'].' AND tab'.$sfr.'.gruppe_id='.$val.')';//
				$sfr++;
			}
			$sfrom.=' where ';
		}
		
		if (!preg_match('/'.$sql_tab['stammdaten_gruppe_zuordnung'].'/Uis', $swh) and !($_SESSION['gf_schnitt']==1)) {
			$sfrom=$sql_tab['stammdaten'];
		}
        if (!$ohne_gruppe and !isset($_SESSION['liste_sql']) and ((!$_SESSION['rechte_gruppen_alle'] or isset($_SESSION['gruppeaktiv']) or isset($_SESSION['gruppeaktiv_n'])) and !isset($_SESSION['filteraktiv']))) {
			$filter_name=gruppe_filtername();
			$serg='';
			if ($filter_name=='VP' or $filter_name=='Vertriebspartner')
				$serg=$sql_tabs['stammdaten']['vpnr'].' as VP_Nummer,';
            
            $filter_sql='select '.($cfg_speed?'':'distinct ').$sql_tabs['stammdaten']['id'].' as Stammdaten_ID,'.$serg.$sql_tabs['stammdaten']['vorname'].' as Vorname,'.$sql_tabs['stammdaten']['name'].' as Name,'.$sql_tabs['stammdaten']['firma1'].' as Firma from '.$sfrom.' '.$sql_tabs['stammdaten_gruppe_zuordnung']['stammdaten_id'].'='.$sql_tabs['stammdaten']['id'].' '.$sfrom2.' '.$swh;
			
			if (!$cfg_speed or $cfg_callcenter) {
				if (isset($cfg_liste_standardsort) and $cfg_liste_standardsort=='-1') {
					
				} else {
					$filter_sql.=' order by '.(isset($cfg_liste_standardsort)?$cfg_liste_standardsort:$sql_tabs['stammdaten']['name'].' asc,'.$sql_tabs['stammdaten']['vorname'].' asc,'.$sql_tabs['stammdaten']['firma1'].' asc');
				}
			}
			
		} elseif (isset($_SESSION['filteraktiv'])) {
			$f_ap_weg=array();
			$k_ids=array();
            if (!isset($param['ohneFilterWeg'])) {
                $res=$db->select(
                    $sql_tab['filter_weg'],
                    array(
                        $sql_tabs['filter_weg']['stammdaten_id'],
                        $sql_tabs['filter_weg']['ansprechpartner_id']
                    ),
                    $sql_tabs['filter_weg']['filter_id'].'='.$db->dbzahl($_SESSION['filteraktiv'])
                );
                while ($row=$db->zeile($res)) {
                    $k_ids[$row[0]]=1;
                    /*if (intval($row[1])>0) {
                        $f_ap_weg[$row[1]]=1;
                    }*/
                }
            }
			$res=$db->select(
				$sql_tab['filter'],
				array(
					$sql_tabs['filter']['sql'],
					$sql_tabs['filter']['name'],
					$sql_tabs['filter']['ausschluss']
				),
				$sql_tabs['filter']['filter_id'].'='.$db->dbzahl($_SESSION['filteraktiv'])
			);
			if ($row=$db->zeile($res)) {
				$filter_sql=$db->checksql($row[0], true);
				$filter_name=$row[1];
				$where_auss='';
				
				// Ausschluss?
				if (trim($row[2])!='') {
					$res3=$db->select(
						$sql_tab['filter'],
						array(
							$sql_tabs['filter']['sql'],
							$sql_tabs['filter']['name']
						),
						$db->dbzahlin($row[2],$sql_tabs['filter']['filter_id'])
					);
					while ($row3=$db->zeile($res3)) {
						if ($cfg_db_subselects) {
							$sqls1=$row3[0];
							$sqls1=preg_replace('/ order by.*/i', '', $sqls1);
							if (preg_match('/select (.*) from/i', $sqls1, $ma1)) {
								$sqls1=p4n_mb_string('str_replace', $ma1[1], $sql_tabs['stammdaten']['id'], $sqls1);
							}
//                            $sqls1=$db->checksql($sqls1);
                            $sqls1=$db->checksql($sqls1, false, true);//griga
							$where_auss.=$sql_tabs['stammdaten']['id'].' not in ('.$sqls1.') and ';
						} else {
							$res4=$db->select2($row3[0]);
							while ($row4=$db->zeile($res4)) {
								$k_ids[$row4[0]]=1;
							}
						}
					}
				}
			}
            if ($_SESSION['crm_version']>61) {
                $res6 = $db->select(
                    $sql_tab['filter_weg_multi'],
                    array(
                        $sql_tabs['filter_weg_multi']['ausschluss_id'],
                        $sql_tabs['filter_weg_multi']['filter_id'],
                        $sql_tabs['filter_weg_multi']['benutzer_id']
                    ),
                    $sql_tabs['filter_weg_multi']['ausschluss_art'].'='.$db->dbzahl(1)//1 = stammdaten_id, 2 = ap-id, 3 = prod_id, 4 = auftrag_id
                );
                while ($row6 = $db->zeile($res6)) {
                    if (($row6[1] > 0 && $row6[1] == $_SESSION['filteraktiv']) || $row6[1] == 0) {
                        if (($row6[2] > 0 && $row6[2] == $_SESSION['user_id']) || $row6[2] == 0) {
                            $k_ids[$row6[0]]=1;
                        }
                    }
                }
            }
            /*
			$f_s_weg='';
			if (count($k_ids)>0) {
				while (list($ukey, $uval)=@each($k_ids)) {
					$f_s_weg.=$ukey.',';
				}
//				$f_s_weg=p4n_mb_string('substr', $f_s_weg, 0, -1);
			}*/
			
			if (!$ohne_gruppe and (isset($_SESSION['gruppeaktiv']) or isset($_SESSION['gruppeaktiv_n']) or !$_SESSION['rechte_gruppen_alle'] or ($_SESSION['benutzer_mandant']!='-1' and $_SESSION['benutzer_mandant']!=''))) {
				if ($_SESSION['gf_schnitt']==1) {
                    // Schnittmenge
					$filter_sql=preg_replace('/(.*from )([^\s]*)(.*)/i', '\\1\\2,'.p4n_mb_string('str_replace', array('where', $sql_tab['stammdaten'].','), '', $sfrom).' \\3', $filter_sql);
					if (preg_match('/where/i', $filter_sql)) {
						$filter_sql=preg_replace('/(.*)(where )(.*)/i', '\\1\\2 '.$sql_tabs['stammdaten_gruppe_zuordnung']['stammdaten_id'].'='.$sql_tabs['stammdaten']['id'].' and '.sql_gruppe($sql_tabs['stammdaten']['id'], $ohne_mand).' and \\3', $filter_sql);
					}
				} elseif ($_SESSION['gruppeaktiv']=='-2') {
					// nicht in Gruppe
					if (preg_match('/(.*from )([^\s]*)(.*)/ie', $filter_sql, $match)) {
						
						if (preg_match('/LEFT JOIN/i', $filter_sql)) {
							
							$from2='';
							
							if (preg_match('/.*from (.*) where/ie', $filter_sql, $match2)) {
								
								$fxp=explode(',', $match2[1]);
								
								@reset($fxp);
								while (list($xkey, $xval)=@each($fxp)) {
									if ($xkey==0) {
										$xval.=' LEFT JOIN '.$sql_tab['stammdaten_gruppe_zuordnung'].' ON '.$sql_tabs['stammdaten']['id'].'='.$sql_tabs['stammdaten_gruppe_zuordnung']['stammdaten_id'];
									}
									$from2.=$xval.',';
								}
								$from2=p4n_mb_string('substr', $from2, 0, -1);
								$filter_sql=p4n_mb_string('str_replace', $match2[1], $from2, $filter_sql);
							}
						} else {
							
							$match[2]=p4n_mb_string('str_replace', $sql_tab['stammdaten'].',', ',', $match[2]);
							$match[2]=p4n_mb_string('str_replace', $sql_tab['stammdaten'].' ', ' ', $match[2]);
							
							$match[2]=p4n_mb_string('str_replace', array(',,', ', ', ' ,'), '', $match[2]);
							$match[2]=trim($match[2]);
							if (p4n_mb_string('substr', $match[2], 0, 1)==',')
								$match[2]=trim(p4n_mb_string('substr', $match[2], 1));
							if ($match[2]!='')
								$match[2].=',';
							$match[2].=$sql_tab['stammdaten']." LEFT JOIN ".$sql_tab['stammdaten_gruppe_zuordnung']." ON ".$sql_tabs['stammdaten_gruppe_zuordnung']['stammdaten_id'].'='.$sql_tabs['stammdaten']['id'];
//                            $filter_sql=preg_replace('/(.*from )([^\s]*)(.*)/i', '\\1'.$match[2].'\\3', $filter_sql);
                            $filter_sql=preg_replace('/(.*from)\s+([A-Z_a-z0-9\,]+)\s*((WHERE|LIMIT|ORDER|GROUP|$)=?.*)/i', '\\1 '.$match[2].' \\3', $filter_sql);//griga
						}
					}
					if (preg_match('/where/i', $filter_sql)) {
						$filter_sql=preg_replace('/(.*)(where )(.*)/i', '\\1\\2 '.$sql_tabs['stammdaten_gruppe_zuordnung']['gruppe_id'].' IS NULL and \\3', $filter_sql);
					}
				} else {
                    if (!preg_match('/'.$sql_tab['stammdaten_gruppe_zuordnung'].'/Uis', $filter_sql)) {
//                        $filter_sql=preg_replace('/(.*from )([^\s]*)(.*)/i', '\\1'.$sql_tab['stammdaten_gruppe_zuordnung'].',\\2 \\3', $filter_sql);

						$sqlgr=sql_gruppe($sql_tabs['stammdaten']['id'], $ohne_mand);
						if (preg_match('/'.$sql_tab['stammdaten_gruppe_zuordnung'].'/', $sqlgr)) {
	                        $filter_sql=preg_replace('/(.*from)\s+([A-Z_a-z0-9\,]+)\s*((LEFT JOIN|WHERE|LIMIT|ORDER|GROUP|$)=?.*)/i', '\\1 '.$sql_tab['stammdaten_gruppe_zuordnung'].',\\2 \\3', $filter_sql);//griga
						}
						if (preg_match('/where/i', $filter_sql)) {
							if (preg_match('/(.*)(where )(.*)/i', $filter_sql)) {
								if (preg_match('/'.$sql_tab['stammdaten_gruppe_zuordnung'].'/', $sqlgr)) {
									$filter_sql=preg_replace('/(.*)(where )(.*)/i', '\\1\\2 '.$sql_tabs['stammdaten_gruppe_zuordnung']['stammdaten_id'].'='.$sql_tabs['stammdaten']['id'].' and '.$sqlgr.' and \\3', $filter_sql);
								} else {
									$filter_sql=preg_replace('/(.*)(where )(.*)/i', '\\1\\2 '.$sqlgr.' and \\3', $filter_sql);
								}
							}
						}
					}
				}
				$filter_sql.='';
				$filter_name2=gruppe_filtername();
                if ($filter_name2 != '') {
                    $filter_name.=' / '.$filter_name2;
                }
			}
			if (!empty($k_ids)) {
				if (preg_match('/where/i', $filter_sql)) {
					if (preg_match('/(.*)(where )(.*)/i', $filter_sql)) {
						$filter_sql=preg_replace('/(.*)(where )(.*)/i', '\\1\\2 '.$db->dbzahlin(array_keys($k_ids),$sql_tabs['stammdaten']['id'],'NOT IN').' and \\3', $filter_sql);
					}
				}
			}
			if (!empty($f_ap_weg)) {
				if (preg_match('/where/i', $filter_sql) and preg_match('/'.$sql_tab['stammdaten_ansprechpartner'].'/i', $filter_sql)) {
					if (preg_match('/(.*)(where )(.*)/i', $filter_sql)) {
						$filter_sql=preg_replace('/(.*)(where )(.*)/i', '\\1\\2 '.$db->dbzahlin(array_keys($f_ap_weg),$sql_tabs['stammdaten_ansprechpartner']['ansprechpartner_id'],'NOT IN').' and \\3', $filter_sql);
					}
				}
			}
			if ($where_auss!='') {
				if (preg_match('/where/i', $filter_sql)) {
//					$filter_sql=preg_replace('/(.*)(where )(.*)/i', '\\1\\2'.$where_auss.' \\3', $filter_sql);
					$where_auss=' and '.p4n_mb_string('substr', $where_auss, 0, -5);
					if (preg_match('/(.*)(where )(.*)( group by.*)/i', $filter_sql)) {
						$filter_sql=preg_replace('/(.*)(where )(.*)( group by.*)/i', '\\1\\2\\3 '.$where_auss.' \\4', $filter_sql);
					} elseif (preg_match('/(.*)(where )(.*)( order by.*)/i', $filter_sql)) {
						$filter_sql=preg_replace('/(.*)(where )(.*)( order by.*)/i', '\\1\\2\\3 '.$where_auss.' \\4', $filter_sql);
					} elseif (preg_match('/(.*)(where )(.*)/i', $filter_sql)) {
						$filter_sql=preg_replace('/(.*)(where )(.*)/i', '\\1\\2\\3 '.$where_auss, $filter_sql);
					}
				}
			}
		}
        if ($filter_name=='') {
			$swh='1=1';
			if (!$ohne_gruppe) {
				$swh=sql_gruppe($sql_tabs['stammdaten']['id'], $ohne_mand);
			}
			if (!$ohne_gruppe and p4n_mb_string('stristr', $swh, $sql_tab['stammdaten_gruppe_zuordnung'])!=false) {
				$filter_sql='select '.($cfg_speed?'':'distinct ').$sql_tabs['stammdaten']['id'].' as Stammdaten_ID,'.$sql_tabs['stammdaten']['vorname'].' as Vorname,'.$sql_tabs['stammdaten']['name'].' as Name,'.$sql_tabs['stammdaten']['firma1'].' as Firma from '.$sql_tab['stammdaten'].','.$sql_tab['stammdaten_gruppe_zuordnung'].' where '.$swh.' and '.$sql_tabs['stammdaten_gruppe_zuordnung']['stammdaten_id'].'='.$sql_tabs['stammdaten']['id'];
				
				if (!$cfg_speed or $cfg_callcenter) {
					if (isset($cfg_liste_standardsort) and $cfg_liste_standardsort=='-1') {
						
					} else {
						$filter_sql.=' order by '.(isset($cfg_liste_standardsort)?$cfg_liste_standardsort:$sql_tabs['stammdaten']['name'].' asc,'.$sql_tabs['stammdaten']['vorname'].' asc,'.$sql_tabs['stammdaten']['firma1'].' asc');
					}
				}
				
			} else {
				$filter_sql='select '.($cfg_speed?'':'distinct ').$sql_tabs['stammdaten']['id'].' as Stammdaten_ID,'.$sql_tabs['stammdaten']['vorname'].' as Vorname,'.$sql_tabs['stammdaten']['name'].' as Name,'.$sql_tabs['stammdaten']['firma1'].' as Firma from '.$sql_tab['stammdaten'].' where '.$swh;
				
				if (!$cfg_speed or $cfg_callcenter) {
					if (isset($cfg_liste_standardsort) and $cfg_liste_standardsort=='-1') {
						
					} else {
						$filter_sql.=' order by '.(isset($cfg_liste_standardsort)?$cfg_liste_standardsort:$sql_tabs['stammdaten']['name'].' asc,'.$sql_tabs['stammdaten']['vorname'].' asc,'.$sql_tabs['stammdaten']['firma1'].' asc');
					}
				}
				
			}
			$filter_name=_TERMIN_S_W_T1_;
		}
		
		if ($_SESSION['nur_betreuer']) {
			if (preg_match('/ where (.*)/', $filter_sql, $ma)) {
				$filter_sql=p4n_mb_string('str_replace', $ma[1], '('.$sql_tabs['stammdaten']['betreuer'].'='.$db->dbzahl($_SESSION['user_id']).' or '.$sql_tabs['stammdaten']['betreuer2'].'='.$db->dbzahl($_SESSION['user_id']).') and '.$ma[1], $filter_sql);
			}
		}
		if ($_SESSION['nur_rechte_marke']==1) {
			if (preg_match('/ where (.*)/', $filter_sql, $ma)) {
				$filter_sql=p4n_mb_string('str_replace', $ma[1], $_SESSION['rechte_marke_sql'].' and '.$ma[1], $filter_sql);
			}
		}
		if ($_SESSION['nur_kfzbetreuer']==1) {
			if (preg_match('/ where (.*)/', $filter_sql, $ma)) {
				$filter_sql=p4n_mb_string('str_replace', $ma[1], $_SESSION['rechte_kfzbetreuer_sql'].' and '.$ma[1], $filter_sql);
			}
		}

		if (isset($filter_ergebnis_zusbed_st)) {
			if ($filter_ergebnis_zusbed_st!='') {
				if (preg_match('/ where (.*)/', $filter_sql, $ma)) {
					$filter_sql=p4n_mb_string('str_replace', $ma[1], $filter_ergebnis_zusbed_st.' and '.$ma[1], $filter_sql);
				}
			}
		}
		
		if (preg_match('/ from (.*) /Ui', $filter_sql, $ma)) {
			$expl=explode(',', $ma[1]);
			$fro2='';
			while (list($key, $val)=@each($expl)) {
				if ($fro2!='') {
					if (@p4n_mb_string('strpos', $fro2, $val)!==false) {
						$fro2=p4n_mb_string('str_replace', $val.',', '', $fro2);
					}
				}
				$fro2.=$val.',';
			}
			$fro2=p4n_mb_string('substr', $fro2, 0, -1);
			$filter_sql=p4n_mb_string('str_replace', $ma[0], ' from '.$fro2.' ', $filter_sql);
		}
        if (preg_match('/^select (.*) from (.*) where/Uism', $filter_sql, $fr)) {
            $froms=$fr[2];
            $froms2=$froms;
        }
        
        if ($froms!='' and preg_match('/^select (.*) from/Uism', $filter_sql, $m)) {
            $mfelder=$m[1];
            $subselect_array = array();
            if (preg_match_all('/(in \(select.*\))/Uism', $filter_sql, $mfund)) {
                if (!empty($mfund[1])) {
                    foreach ($mfund[1] as $mfund_key => $mfund_value) {
                        if ($mfund_value!='') {
                            $subselect_array[md5($mfund_key)] = $mfund_value;
                        }
                    }   
                }
            }
            foreach ($subselect_array as $sub_key => $subselect_value) {
                $filter_sql = str_replace($subselect_value, 'sub_'.$sub_key, $filter_sql);
            }
            if ($froms2 != '') {
            /*if (!preg_match('/'.preg_quote($sql_tab['stammdaten']).' left join/i', $froms2) and !preg_match('/'.preg_quote($sql_tab['stammdaten']).' join/i', $froms2)) {
                $froms2_explode = explode(',', $froms2);
                if (!empty($froms2_explode)) {
                    $new_froms2_array = array();
                    foreach ($froms2_explode as $tabelle) {
                        if ($tabelle != $sql_tab['stammdaten']) {
                            $new_froms2_array[] = $tabelle;
                        }
                    }
                    $new_froms2_array[] = $sql_tab['stammdaten'];
                    $froms2 = implode(',', $new_froms2_array).' ';
                }
                $froms2=p4n_mb_string('str_replace', $sql_tab['stammdaten'].','.$sql_tab['stammdaten'].' ', $sql_tab['stammdaten'].' ', $froms2);
            } else {*/
                $froms2_explode = explode(',', $froms2);
                if (!empty($froms2_explode)) {
                    $stammdaten_tabelle = array();
                    $nicht_stammdaten_tabelle = array();
                    $new_froms2_array = array();
                    foreach ($froms2_explode as $tabelle) {
                        if ($tabelle != $sql_tab['stammdaten'] && substr($tabelle, -strlen(' as '.$sql_tab['stammdaten'])) != ' as '.$sql_tab['stammdaten'] && !preg_match('/'.preg_quote($sql_tab['stammdaten']).' left join/i', $tabelle) and !preg_match('/'.preg_quote($sql_tab['stammdaten']).' join/i', $tabelle)) {
                            $nicht_stammdaten_tabelle[$tabelle] = $tabelle;
                        } else {
                            if (empty($stammdaten_tabelle)) {//Nur ein Wert aus stammdaten reicht
                                $stammdaten_tabelle[$tabelle] = $tabelle;
                            }
                        }
                    }
                    $new_froms2_array = array_merge($nicht_stammdaten_tabelle, $stammdaten_tabelle);
                    $froms2 = implode(',', $new_froms2_array).' ';
                }
            }
            $alle_zfs_tabs=array();
            if (!empty($_SESSION['liste_zfs'])) {
            @reset($_SESSION['liste_zfs']);
            while (list($key, $val)=@each($_SESSION['liste_zfs'])) {
                $tabelle='stammdaten';
                if (p4n_mb_string('strpos',$val, '.')!==false) {
                    $zf_ex=explode('.', $val);
                    $tabelle=p4n_mb_string('str_replace', $prefix, '', $zf_ex[0]);
                    $val=$zf_ex[1];
                    $alle_zfs_tabs[$tabelle]=1;
                }
                if (isset($sql_tabs[$tabelle][$val])) {
                    $mfelder.=','.$sql_tabs[$tabelle][$val].' as '.$tabelle.'___'.$val;//cutforsql($lang_db_f['stammdaten'][$val]);
                } elseif ($tabelle=='zusatzfelder') {
                    $mfelder.=','.$sql_tab[$tabelle].'.'.$val.' as '.$tabelle.'___'.cutforsql_j($lang_db_f['zusatzfelder'][$val]);
                }
            }
            while (list($key, $val)=@each($alle_zfs_tabs)) {
                $tabelle=$key;
                $zf_ex[0]=$prefix.$tabelle;

                    $fr2_ex=explode(',', $froms2);
                    $fr2_letzte=trim($fr2_ex[count($fr2_ex)-1]);
                    if (substr($fr2_letzte, -strlen(' as '.$sql_tab['stammdaten'])) == ' as '.$sql_tab['stammdaten']) {
                        $fr2_letzte = $sql_tab['stammdaten'];
                    }
                    if (isset($sql_tabs[p4n_mb_string('str_replace', $prefix, '', $fr2_letzte)]['stammdaten_id'])) {
                        $fr2_letzte=$sql_tabs[p4n_mb_string('str_replace', $prefix, '', $fr2_letzte)]['stammdaten_id'];
                    } elseif (isset($sql_tabs[p4n_mb_string('str_replace', $prefix, '', $fr2_letzte)]['id'])) {
                        $fr2_letzte=$sql_tabs[p4n_mb_string('str_replace', $prefix, '', $fr2_letzte)]['id'];
                    }
                    if (preg_match('/left join/i', $fr2_letzte)) {
                        $fr2_letzte='';
                    }
                    if (preg_match('/'.preg_quote($sql_tab['stammdaten']).' join/i', $froms2)) {
                        $fr2_letzte=$sql_tabs['stammdaten']['id'];
                    }

                    if ($tabelle!='stammdaten' and p4n_mb_string('substr',$froms, -p4n_mb_string('strlen',$zf_ex[0]))!=$zf_ex[0] and p4n_mb_string('strpos',$froms2, $zf_ex[0].',')===false and p4n_mb_string('strpos',$froms2, $zf_ex[0].' ')===false) {
                        $froms2.=' LEFT JOIN '.$sql_tab[$tabelle].' ON '.($fr2_letzte!=''?$fr2_letzte:$sql_tabs['stammdaten']['id']).'='.$zf_ex[0].'.stammdaten_id ';
                    }
                }
            }
            if ($mfelder!=$m[1]) {
                $filter_sql=p4n_mb_string('str_replace', $m[1], $mfelder, $filter_sql);
            }
            if (!preg_match('/'.$sql_tab['stammdaten_gruppe_zuordnung'].'/Uism', $froms2) && preg_match('/'.$sql_tab['stammdaten_gruppe_zuordnung'].'/Uism', $filter_sql)) {
                $froms2= trim($froms2).','.$sql_tab['stammdaten_gruppe_zuordnung'];
            }
            if ($froms!=$froms2) {
                $filter_sql=p4n_mb_string('str_replace', 'from '.$froms, 'from '.$froms2, $filter_sql);
            }
            foreach ($subselect_array as $sub_key => $subselect_value) {
                $filter_sql = str_replace('sub_'.$sub_key, $subselect_value, $filter_sql);
            }
        }
		
//echo $filter_sql.'<br>';
		return array($filter_sql, $filter_name);
	}
	
	function zeitnahme() {
		global $cfg_merke_zeit;
		$zwei=microtime();
		
		$z=(intval(p4n_mb_string('substr', $zwei,11))-intval(p4n_mb_string('substr', $cfg_merke_zeit,11)))+(intval(p4n_mb_string('substr', $zwei,0,9))-intval(p4n_mb_string('substr', $cfg_merke_zeit,0,9)));
		return number_format(doubleval($z), 2, ".", ".").' sek.';
	}
	
	function anzeige_idwert($idfeld, $wert, $ben_mit_nr=false) {
		global $db, $sql_tab, $sql_tabs, $id_werte_global, $sql_tab_id, $sql_tab_ids, $ADODB_FETCH_MODE, $cfg_carlo_appserver, $cfg_carlo_appserver_lagerorte, $cfg_kunde_mandlao, $lang, $cfg_filter_mandlao_sperre, $cfg_filter_alle_laosmands;
		global $markencode_felder, $carlo_tw, $sql_meta, $prefix;
        
        $merke=$ADODB_FETCH_MODE;
		$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
        if (isset($sql_tab_ids[$idfeld])) {
            $feld=$sql_tab_id[$sql_tab_ids[$idfeld]];
            @reset($feld);
			list($key, $replace)=@each($feld);
            list($art, $art_wert)=@each($feld);
			list($key, $wert_feld)=@each($feld);
			list($key, $sql_order)=@each($feld);
			list($key, $sql_where)=@each($feld);
            /*if ($wert==='' || is_null($wert)) {
                $ADODB_FETCH_MODE = $merke;
                return $wert;
			}*/
            if ($sql_where=='' or !isset($sql_where)) {
                $sql_where='1=1';
            }
            if (!isset($id_werte_global[$idfeld][$wert])) {
				if ($art=='array') {
                    if ($art_wert==$sql_tab['bdc'] && $idfeld==$sql_tabs['bdc']['art']) {
                        $res=$db->select(
                            $sql_tab['bdc'],
                            $sql_tabs['bdc']['art'],
                            $sql_tabs['bdc']['art'].'!='.$db->str(''),$sql_tabs['bdc']['art'].' ASC'
                        );
                        while ($row=$db->zeile($res)) {
                            $wert_feld['array1'][$row['art']]=$row['art'];
                        }
                    }
                    if ($art_wert==$sql_tab['bdc'] && $idfeld==$sql_tabs['bdc']['grund']) {
                        $res=$db->select(
                            $sql_tab['bdc'],
                            $sql_tabs['bdc']['grund'],
                            $sql_tabs['bdc']['grund'].'!='.$db->str(''),$sql_tabs['bdc']['grund'].' ASC'
                        );
                        while ($row=$db->zeile($res)) {
                            $wert_feld['array1'][$row['grund']]=$row['grund'];
                        }
                    }
         
                    if ($art_wert==$sql_tab['kampagne_lead_status']) {
                        $constantable = true;
                        if ($replace == 'kampagne_lead_status_leadstages_vgrd') {
                            $wert_feld['array1'] = Plugin_System_LeadTracker::getInternalCategories();
                            $constantable = false;
                        } elseif ($replace == 'kampagne_lead_status_leadstages') {
                            $wert_feld['array1'] = array_merge(array(0 => _KEINE_AUSWAHL_), Lead_Stages::instance()->getSortedLeadStages(false));
                            $constantable = false;
                        } elseif ($replace == 'kampagne_lead_status_loss_reason1') {
                            $formDefinitions = Lead_StagesRenderer::instance()->getFormDefinition(6);
                            $wert_feld['array1'] = $formDefinitions['status10_lossreason1']['value'];
                        } elseif ($replace == 'kampagne_lead_status_loss_reason2') {
                            $formDefinitions = Lead_StagesRenderer::instance()->getFormDefinition(6);
                            $wert_feld['array1'] = $formDefinitions['status10_lossreason2']['value'];
                        }
                        if ($constantable) {
                            foreach ($wert_feld['array1'] as $key_offer => $value_offer) {
                                $temp_wert = @constant($value_offer);
                                if ($temp_wert != '') {
                                    $wert_feld['array1'][$key_offer] = $temp_wert;
                                } else {
                                    $wert_feld['array1'][$value_offer] = $value_offer;
                                }
                            }
                        }
                    } elseif ($idfeld==$sql_tabs['opportunity']['manuell_finanzart']) {
                        global $cfg_basedir, $cfg_finanzierungsmodell_kategorie;
                        $kfzfinanzierungsmodell = array();
                        include_once($cfg_basedir.'inc/lib_sn.php');
                        if (empty($kfzfinanzierungsmodell)) {
                            $helper = new OpplisteHelper();
                            $kfzfinanzierungsmodell = $helper->getFinanceModels();
                        }
                        $wert_feld['array1']=$kfzfinanzierungsmodell;
                    } elseif ($idfeld==$sql_tabs['opportunity']['manuell_ovs_wahl']) {
                        global $cfg_basedir;
                        include_once($cfg_basedir.'inc/lib_sn.php');
                        $helper = new OpplisteHelper();
                        $wert_feld['array1'] = $helper->getQuija();
                    } 
                    if ($art_wert=='primary_bezug') {
                        if ($wert!=-99) {
                            if ($wert <= 0) {
                                $wert_feld['array1'][$wert] = _OHNE_.' '.$lang['_K-BEZUG1_'];
                            } else {
                                $wert_feld['array1'][$wert] = _MIT_.' '.$lang['_K-BEZUG1_'];
                            }
                        }
                    }
                    if (!empty($markencode_felder) && is_array($markencode_felder)) {
                        if (in_array($art_wert, $markencode_felder)) {
                            if (System_BrandPartitioning::instance()->useBrandPartitioning()) {
                                $wert_feld['array1'] = System_BrandPartitioning::instance()->getBrandCombinationValue();
                            }
                        }
                    }
					if ($wert==-99) {
                        
                        $a_feld=$wert_feld['array1'];
                        if ($sql_order=='key asc') {
							@ksort($a_feld);
						} elseif ($sql_order=='key desc') {
							@krsort($a_feld);
						} elseif ($sql_order=='val asc') {
							@asort($a_feld);
						} elseif ($sql_order=='val desc') {
							@arsort($a_feld);
						}
						$id_werte_global[$idfeld][$wert]=$a_feld;
					} else {
                       $id_werte_global[$idfeld][$wert]=$wert_feld['array1'][$wert];
					}
				} elseif ($art=='db') {
                    if ($wert==-99) {
                        $wert_feld[]=$sql_tab_ids[$idfeld];
						if ($art_wert==$sql_tab['mandant']) {
							if ($cfg_kunde_mandlao) {
								if ($idfeld==$sql_tabs['stammdaten']['mandant'] or $idfeld==$sql_tabs['auftrag']['vp'] or $idfeld==$sql_tabs['auftrag2']['vp'] or $idfeld==$sql_tabs['produktzuordnung']['mandant_id']) {
									$sql_where.=' and '.$sql_tabs['mandant']['parent_id'].'>0';
								} else {
									$sql_where.=' and '.$sql_tabs['mandant']['parent_id'].'=0';
								}
							} else {
                                $bed_zus1=false;
                                if (isset($sql_tabs['bmw_sa_zusatzdaten']['mandant_id'])) {
                                    if ($idfeld==$sql_tabs['bmw_sa_zusatzdaten']['mandant_id']) {
                                        $bed_zus1=true;
                                    }
                                }
                                if ($_SESSION['cfg_kunde']=='carlo_opel_dinnebier') {
                                    if ($idfeld==$sql_tabs['stammdaten']['meinvp'] or $idfeld==$sql_tabs['produktzuordnung']['zr_int']) {
                                        $bed_zus1=true;
                                    }
                                }
                                if (isset($sql_tabs['korr_benutzer']['standard_lagerort'])) {
                                    if ($idfeld==$sql_tabs['korr_benutzer']['standard_lagerort']) {
                                        $bed_zus1=true;
                                    }
                                }

                                if ($idfeld==$sql_tabs['opportunity']['mandant_id'] or $idfeld==$sql_tabs['stammdaten_mandant']['lagerort_id'] or $idfeld==$sql_tabs['stammdaten']['vpb'] or $idfeld==$sql_tabs['auftrag']['vp'] or $idfeld==$sql_tabs['auftrag2']['vp'] or $idfeld==$sql_tabs['produktzuordnung']['mandant_id'] or $idfeld==$sql_tabs['troubleticket']['lagerort_id'] or $idfeld==$sql_tabs['kampagne_lead']['lagerort_id'] or $bed_zus1) {
									$sql_where.=' and ('.$sql_tabs['mandant']['bezeichnung'].' like '.$db->str('0%').' or '.
										$sql_tabs['mandant']['parent_id'].'>0)';
								} else {
                                    if ($idfeld!=$sql_tabs['benutzer_mandant_auswertung']['mandant_id'] && $idfeld!=$sql_tabs['stammdaten_distanz']['mandant_id']) {
                                        $sql_where.=' and '.$sql_tabs['mandant']['parent_id'].'=0';
                                    }
                                }
							}
							$sql_order = $sql_tabs['mandant']['mandant_id'].','.$sql_tabs['mandant']['parent_id'];
							if ($cfg_filter_alle_laosmands) {
								$sql_where='1=1';
							}
						}
                        if (class_exists('System_BrandPartitioning')) {
                            if ($art_wert==$sql_tab['kampagne'] && System_BrandPartitioning::instance()->useBrandPartitioning()) {
                                $session_brands=System_BrandPartitioning::instance()->getSessionUserBrands(true);
                                if (!empty($session_brands)) {
                                    $sql_where=$db->dbzahlin($session_brands, $sql_tabs['kampagne']['markencode']);
                                    $sql_where.=' or '.$sql_tabs['kampagne']['markencode'].'='.$db->dbzahl(0);
                                }
                            }
                        }
						if ($ben_mit_nr and $art_wert==$sql_tab['benutzer']) {
							$wert_feld[]=$sql_tabs['benutzer']['syncml_user5'];
						}
						$res=$db->select(
							$art_wert,
							$wert_feld,
							$sql_where,
							$sql_order
						);
                        while ($row=$db->zeile($res)) {
							$id=0;
							$z=1;
							$m_row='';
							$c=count($row);
							$replace2=$replace;
							while (list($key, $val)=@each($row)) {
								if ($ben_mit_nr and $art_wert==$sql_tab['benutzer']) {
									if ($z==($c-1)) {
										$id=$val;
										$m_row=$val;
										$z++;
										continue;
									}
								} else {
									if ($z==$c) {
										$id=$val;
										$m_row=$val;
										$z++;
										continue;
									}
								}
								$replace2=p4n_mb_string('str_replace', '{'.$z.'}', $val, $replace2);
								$m_row=$val;
								$z++;
							}
                            if ($m_row!='' && (($ben_mit_nr and $art_wert==$sql_tab['benutzer']) or $art_wert==$sql_tab['verkaeufer'])) {
								$replace2.=' ('.$m_row.')';
							}
                            if ($idfeld==$sql_tabs['produktzuordnung']['verkaeufer']) { 
                                $id = trim($id);
                            }
                            if (($art_wert==$sql_tab['kampagne_lead'] && ($row['kfzkategorie'] || $row['kfzmodell'] || $row['kfznwgw']))) {
                                $replace2=$id;
                            }
							$id_werte_global[$idfeld][$wert][$id]=$replace2;
						}
					} else {
						if ($ben_mit_nr and $art_wert==$sql_tab['benutzer']) {
							$wert_feld[]=$sql_tabs['benutzer']['syncml_user5'];
						}
						
						if ($sql_tab_ids[$idfeld]==$sql_tabs['verkaeufer']['nummer']) {
							$res=$db->select(
								$art_wert,
								$wert_feld,
								$sql_where.' and '.$sql_tab_ids[$idfeld].'='.$db->str($wert)
							);
						} else {
                            $res=$db->select(
								$art_wert,
								$wert_feld,
								$sql_where.' and '.$sql_tab_ids[$idfeld].'='.$db->dbzahl($wert)
							);
						}
						if ($row=$db->zeile($res)) {
							$z=1;
							$m_row='';
							while (list($key, $val)=@each($row)) {
								$replace=p4n_mb_string('str_replace', '{'.$z.'}', $val, $replace);
								$z++;
								$m_row=$val;
							}
							if ($ben_mit_nr and $art_wert==$sql_tab['benutzer'] and $m_row!='') {
								$replace.=' ('.$m_row.')';
							}
                            $id_werte_global[$idfeld][$wert]=$replace;
						} else {
                            $id_werte_global[$idfeld][$wert]=$wert;
						}
					}
				} elseif ($art=='kategorie') {
                    if ($wert==-99) {
                        $result_kategorie = $db->select(
                             $sql_tab['kategorie'],
                             array(
                                (isset($wert_feld['db0']) ? $wert_feld['db0'] : $sql_tabs['kategorie']['bezeichnung']),
                                $wert_feld['db1']
                             ),
                             $sql_where,
                             $sql_order
                        );
                        while ($row_kategorie_fetch = $db->zeile($result_kategorie)) {
                            $row_kategorie = array_values($row_kategorie_fetch);
                            $id_werte_global[$idfeld][$wert][$row_kategorie[0]]=$row_kategorie[1];
                        } 
                    } else {
                        if (isset($wert_feld['db0']) && $wert_feld['db0']==$sql_tabs['kategorie']['kategorie_id']) {
                            $whereZusatz=$sql_tabs['kategorie']['kategorie_id'].'='.$db->dbzahl($wert);
                        } elseif ($wert_feld['db1']==$sql_tabs['kategorie']['zusatz1'] || $wert_feld['db1']==$sql_tabs['kategorie']['kategorie_id']) {
                            $whereZusatz=$sql_tabs['kategorie']['bezeichnung'].'='.$db->dbzahl($wert);
                        } else {
                            $whereZusatz=$sql_tabs['kategorie']['bezeichnung'].'='.$db->dbstr($wert);
                        }
                        $result_kategorie=$db->select(
                            $sql_tab['kategorie'],
                            $wert_feld['db1'],
                            $sql_where.' and '.$whereZusatz
                        );
                        if ($row_kategorie_fetch = $db->zeile($result_kategorie)) {
                            $row_kategorie = array_values($row_kategorie_fetch);
                            $id_werte_global[$idfeld][$wert]=$row_kategorie[0];
                        } else {
                            $id_werte_global[$idfeld][$wert]=$wert;
                        }
                    }
                } else {
                    $feld_explode = explode('.', str_replace($prefix, '', $idfeld));
                    $wert_alt = $wert;
                    if ($wert_alt!='' && isset($sql_meta[$feld_explode[0]][$feld_explode[1]])) {
                        if (in_array('D', $sql_meta[$feld_explode[0]][$feld_explode[1]]) || in_array('T', $sql_meta[$feld_explode[0]][$feld_explode[1]])) {
                            if ($sql_tab_ids[$idfeld]!=$idfeld) {
                                $wert = adodb_date($sql_tab_ids[$idfeld], $db->unixdate_ts($wert_alt));
                            } else {
                                if (in_array('D', $sql_meta[$feld_explode[0]][$feld_explode[1]])) {
                                    $wert = $db->unixdate($wert_alt);
                                } elseif (in_array('T', $sql_meta[$feld_explode[0]][$feld_explode[1]])) {
                                    $wert = $db->unixdatetime($wert_alt);
                                }
                            }
                        }
                        $id_werte_global[$idfeld][$wert_alt]=$wert;
                    }
                    
                }
                
			}
			$ADODB_FETCH_MODE = $merke;
            if ($carlo_tw) {
                $tmpWert = $id_werte_global[$idfeld][$wert];
                decode_big5_entities($tmpWert);
                $id_werte_global[$idfeld][$wert] = $tmpWert;
//                return $tmpWert;
//                $val_html_decoded=html_entity_decode('&#40175;', ENT_QUOTES | ENT_XML1, 'UTF-8');
//                $wertTemp=p4n_mb_string('str_replace', '&#40175;', $val_html_decoded, $id_werte_global[$idfeld][$wert]);
//                $val_html_decoded=html_entity_decode('&#17746;', ENT_QUOTES | ENT_XML1, 'UTF-8');
//                $wertTemp=p4n_mb_string('str_replace', '&#17746;', $val_html_decoded, $id_werte_global[$idfeld][$wert]);
//
//                $val_html_decoded=html_entity_decode('&#21129;', ENT_QUOTES | ENT_XML1, 'UTF-8');
//                $wertTemp=p4n_mb_string('str_replace', '&#21129;', $val_html_decoded, $id_werte_global[$idfeld][$wert]);
//                $val_html_decoded=html_entity_decode('&#26080;', ENT_QUOTES | ENT_XML1, 'UTF-8');
//                $wertTemp=p4n_mb_string('str_replace', '&#26080;', $val_html_decoded, $id_werte_global[$idfeld][$wert]);
//                $val_html_decoded=html_entity_decode('&#24833;', ENT_QUOTES | ENT_XML1, 'UTF-8');
//                $wertTemp=p4n_mb_string('str_replace', '&#24833;', $val_html_decoded, $id_werte_global[$idfeld][$wert]);
//                return $wertTemp;
            }
			return $id_werte_global[$idfeld][$wert];
			
		} else {
			$ADODB_FETCH_MODE = $merke;
            if ($carlo_tw) {
                decode_big5_entities($wert);
            }
            $feld_explode = explode('.', str_replace($prefix, '', $idfeld));
            $wert_alt=$wert;
            if ($wert_alt!='' && isset($sql_meta[$feld_explode[0]][$feld_explode[1]])) {
                if (in_array('D', $sql_meta[$feld_explode[0]][$feld_explode[1]])) {
                    $wert = $db->unixdate($wert_alt);
                } elseif (in_array('T', $sql_meta[$feld_explode[0]][$feld_explode[1]])) {
                    $wert = $db->unixdatetime($wert_alt);
                } elseif (@in_array('L', $sql_meta[$feld_explode[0]][$feld_explode[1]])) {
                    $wert=($wert_alt=='1'?_JA_:_NEIN_);
                } elseif (@in_array('I', $sql_meta[$feld_explode[0]][$feld_explode[1]]) or @in_array('F', $sql_meta[$feld_explode[0]][$feld_explode[1]]) or @in_array('N', $sql_meta[$feld_explode[0]][$feld_explode[1]])) {
                    $wert=p4n_mb_string('str_replace', '.', ',', $wert_alt);
                }
                $id_werte_global[$idfeld][$wert_alt]=$wert;
            }
			return $wert;
		}
	}

	function reset_filter($loesch=0) {
		global $db, $sql_tab, $sql_tabs, $prefix, $cfg_filter_keinehilfstabelle;
		
		$sel_tabelle=$sql_tab['stammdaten'];
		$sel_feld=$sql_tabs['stammdaten']['id'];
		
		if ($_SESSION['filteraktiv'] and !$cfg_filter_keinehilfstabelle) {
			$sel_tabelle=$prefix.'filter_'.$_SESSION['filteraktiv'];
			$sel_feld=$prefix.'filter_'.$_SESSION['filteraktiv'].'.stammdaten_id';
			
			if ($loesch!=0) {
				$db->delete($prefix.'filter_'.$_SESSION['filteraktiv'], $prefix.'filter_'.$_SESSION['filteraktiv'].'.stammdaten_id='.$db->dbzahl($loesch));
			}
		}
		
		if (isset($_SESSION['gruppeaktiv']) or isset($_SESSION['gruppeaktiv_n'])) {
			
			$wh=sql_gruppe($sel_feld);
			$ljoin='';
			if ($wh=='-2') {
				$wh=$sql_tabs['stammdaten_gruppe_zuordnung']['gruppe_id'].' IS NULL';
				$ljoin='_LJ_';
			}
			
			$result=$db->select(
				array(
					$sel_tabelle,
					$sql_tab['stammdaten_gruppe_zuordnung']
				),
				'distinct '.$sel_feld,
				$wh,	//where
				'',	//orderby
				'', //groupby
				array(
					$ljoin.$sel_feld => $sql_tabs['stammdaten_gruppe_zuordnung']['stammdaten_id']
				)
			);
		} else {
			$result=$db->select(
				$sel_tabelle,
				$sel_feld
			);
		}
		$_SESSION['anzahl_saetze']=$db->anzahl($result);
		if ($zeile=$db->zeile($result)) {
			$_SESSION['stammdaten_id']=$zeile[0];
		}
		
		// Kunden herausfinden:
		$sql_m2=$db->last_sql;
		if (preg_match('/select (.*) from/i', $sql_m2, $m9)) {
			$sm_sql_2=p4n_mb_string('str_replace', $m9[1], 'distinct '.$sel_feld, $sql_m2);
		}
		$result=$db->select2($sm_sql_2);
		$_SESSION['anzahl_saetze2']=$db->anzahl($result);
		
		unset($_SESSION['sl_seite']);
	}
	
	function anruf_cti() {
		global $cfg_cti_msgserver, $cfg_sipgate;
		
		$z='';
        if ($_SESSION['catch_cti_aktiv']&&!$cfg_sipgate) {
            $z='<script type="text/javascript">
	function anrufen(text) {';
        if ($_SESSION['cti']) {
            $z.='topmenu.ilink.server_manually(text);';
        }
        $z.='}
</script>';  
            } elseif ($cfg_cti_msgserver) {
            $z='<script type="text/javascript">
	function anrufen(text) {
		window.open(\'anrufen_msgserver.php?nr='.($_SESSION['cti_vw']!=''?$_SESSION['cti_vw']:'').'\'+text, \'status\');
	}
</script>
';
		} else {
			$z='<script type="text/javascript">
	function anrufen(text) {
        var cti=(typeof cfg_modern != typeof undefined && cfg_modern==true)?topmenu.cti.document:parent.frames["cti"];
        cti.UserControl1.Waehle_Nummer = '.($_SESSION['cti_vw']!=''?'"'.$_SESSION['cti_vw'].'"+':'').'text;
        '.($_SESSION['cfg_kunde']=='carlo_opel_haeusler'?'        
        var r = confirm("'._KORRESPONDENZEINTRAG_ERSTELLEN_.'?");
        if (r == true) {
            k_inhalt("stammdaten_main.php?nav=Korrespondenz&kurzk=0&ajax=1&cti_telefonat=1", true, "autosize", 550);
        }
        ':'').'
	}
</script>';
		}
		return $z;
	}
	
	function persdaten($stid, $nur_adresse=false) {
		global $db, $sql_tab, $sql_tabs, $kontakt_typ;
		
		$t='';
		
		$t.=kundenbezeichnung($stid).'<br>';
		
		// Adresse
		$res=$db->select(
			$sql_tab['stammdaten_adresse'],
			array(
				$sql_tabs['stammdaten_adresse']['adresse'],
				$sql_tabs['stammdaten_adresse']['plz'],
				$sql_tabs['stammdaten_adresse']['ort']
			),
			$sql_tabs['stammdaten_adresse']['stammdaten_id']
				.'='.$db->dbzahl($stid),
			$sql_tabs['stammdaten_adresse']['art']
		);
		if ($row=$db->zeile($res)) {
			$t.=$row[0].'<br>'.$row[1].' '.$row[2].'<br><br>';
			if ($nur_adresse) {
				return $row[0].', '.$row[1].' '.$row[2];
			}
		}
		
		
		// Kontakte
		$kukont=lese_ku_kontakt($stid);
		while (list($kkey1, $kval1)=@each($kukont)) {
			if ($kval1!='') {
				$t.=$kontakt_typ[$kkey1].': '.$kval1.'<br>';
			}
		}
		return $t;
	}
	
	function link_kfzh($id, $target='target="main"') {
		if ($_SESSION['cfg_kunde']=='ba') {
			return '';
		} else {
			return link2('', 'kfz_fahrzeughistorie.php?stid='.$_SESSION['stammdaten_id'].'&pzid='.$id, 'kfz_historie.png', '', $target);
		}
	}
	
	function log_aktionkunde($stid, $art, $inhalt_alt, $inhalt_neu, $aktion, $sql) {
		global $sql_tab, $sql_tabs, $db;
		
		$res=$db->insert(
			$sql_tab['log_kunde'],
			array(
				$sql_tabs['log_kunde']['datum'] => $db->dbtimestamp(time()),
				$sql_tabs['log_kunde']['benutzer_id'] => $db->dbzahl($_SESSION['user_id']),
				$sql_tabs['log_kunde']['stammdaten_id'] => $db->dbzahl($stid),
				$sql_tabs['log_kunde']['art'] => $db->str($art),
				$sql_tabs['log_kunde']['inhalt_alt'] => $db->str($inhalt_alt),
				$sql_tabs['log_kunde']['inhalt_neu'] => $db->str($inhalt_neu),
				$sql_tabs['log_kunde']['aktion'] => $db->str($aktion),
				$sql_tabs['log_kunde']['sql'] => $db->str($sql)
			)
		);
	}
	
	function recht_kunde($stid, $benutzer) {
		global $sql_tab, $sql_tabs, $db;
		
		$recht=false;
		
		$res=$db->select(
			$sql_tab['stammdaten_gruppe_zuordnung'],
			$sql_tabs['stammdaten_gruppe_zuordnung']['gruppe_id'],
			$sql_tabs['stammdaten_gruppe_zuordnung']['stammdaten_id'].'='.$db->dbzahl($stid)
		);
		while ($row=$db->zeile($res)) {
			$gr[$row[0]]=1;
		}
		$res=$db->select(
			$sql_tab['benutzer_rechte_gruppen'],
			$sql_tabs['benutzer_rechte_gruppen']['gruppe_id'],
			$sql_tabs['benutzer_rechte_gruppen']['benutzer_id'].'='.$db->dbzahl($benutzer)
		);
		while ($row=$db->zeile($res)) {
			if ($gr[$row[0]]==1) {
				$recht=true;
				break;
			}
		}
		
		return $recht;
	}
	
	function checkfilter_kunde($stid) {
		global $sql_tab, $sql_tabs, $db, $prefix, $cfg_merke_zeit, $cfg_filter_keinehilfstabelle;
		
		if (!is_numeric($stid) or $cfg_filter_keinehilfstabelle) {
			return false;
		}
		
		$ftabs=$db->MetaTables();
		
		$res=$db->select(
			$sql_tab['filter'],
			array(
				$sql_tabs['filter']['filter_id'],
				$sql_tabs['filter']['sql'],
				$sql_tabs['filter']['name']
			)
		);
		while ($row=$db->zeile($res)) {
			
			if (!in_array($prefix.'filter_'.$row[0], $ftabs)) {
				continue;
			}
			
			$sql=$row[1];
			$sql2=$sql;
			if (preg_match('/where /i', $sql)) {
				$sql2=preg_replace('/where /i', 'where '.$sql_tabs['stammdaten']['id'].'='.$db->dbzahl($stid).' AND ', $sql2);
			}
			
			if ($sql!=$sql2) {
				
				$sql2=preg_replace('/order by.*/i', '', $sql2);
				$sql2=p4n_mb_string('str_replace', 'distinct', '', $sql2);
				
				$res2=$db->select(
					$prefix.'filter_'.$row[0],
					$prefix.'filter_'.$row[0].'.stammdaten_id',
					$prefix.'filter_'.$row[0].'.stammdaten_id='.$db->dbzahl($stid)
				);
				$res3=$db->select2($sql2);
//			echo $row[2].': '.$sql2.'<br><br>';
				if ($db->anzahl($res3)>0) {
					// in Filterergebnis drin
					if ($db->anzahl($res2)==0) {
						// noch nicht im Filter, dann einfügen
						
						$res2=$db->select(
							$sql_tab['stammdaten'],
							array(
								$sql_tabs['stammdaten']['vorname'],
								$sql_tabs['stammdaten']['name'],
								$sql_tabs['stammdaten']['firma1'],
								$sql_tabs['stammdaten']['mandant']
							),
							$sql_tabs['stammdaten']['id'].'='.$db->dbzahl($stid)
						);
						$row2=$db->zeile($res2);
						
//echo $stid.' eingefügt.<br>';
						$db->insert(
							$prefix.'filter_'.$row[0],
							array(
								$prefix.'filter_'.$row[0].'.stammdaten_id' => $db->dbzahl($stid),
								$prefix.'filter_'.$row[0].'.vorname' => $db->str($row2[0]),
								$prefix.'filter_'.$row[0].'.name' => $db->str($row2[1]),
								$prefix.'filter_'.$row[0].'.firma1' => $db->str($row2[2]),
								$prefix.'filter_'.$row[0].'.mandant_id' => $db->dbzahl($row2[3])
							)
						);
					}
				} else {
					// nicht im Filterergebnis drin
					if ($db->anzahl($res2)>0) {
						// aber noch in Filtertabelle drin, also entfernen
//echo $stid.' gelöscht.<br>';
						$db->delete(
							$prefix.'filter_'.$row[0],
							$prefix.'filter_'.$row[0].'.stammdaten_id='.$db->dbzahl($stid)
						);
					}
				}
			}
//			echo zeitnahme();
		}
		
		return true;
	}
	
	function get_filter_ids($fsql) {
		global $db, $cfg_merke_zeit, $sql_tab, $sql_tabs, $cfg_callcenter, $prefix, $cfg_pfad_sqltemp;
		$dbug=false;
		if ($dbug) {
			echo $fsql.'<br> vor FILTER: '.zeitnahme().'<br>';
		}
		//, $sql_tab, $sql_tabs
		unset($_SESSION['crm_l_id']);
//		$filt_f=array();
		$filt_f='';
		$f_i=0;
		$anz_k=array();
		
		$ist_admin=false;
		if ($_SESSION['user_gruppe']==2) {
			$ist_admin=true;
		}
		
		$nh_feld=array();
		$nh1_feld=array();
		$nh2_feld=array();
		$n_feld=array();
		$private_s='';
		
		if (($cfg_callcenter and !$ist_admin) or $cfg_cc_nesort) {
			
			// Kontrolleur?
			$in_kontr_gruppe=false;
			$res=$db->select(
				$sql_tab['benutzer_gruppe'],
				$sql_tabs['benutzer_gruppe']['benutzer_gruppe_id'],
				$sql_tabs['benutzer_gruppe']['bezeichnung'].'='.$db->str('Kontrolleur')
			);
			if ($row=$db->zeile($res)) {
				$xg=explode(',', $_SESSION['rechte_bgruppen']);
				if (in_array($row[0], $xg)) {
					$in_kontr_gruppe=true;
				}
			}
			// Terminierer?
			$in_term_gruppe=false;
			$res=$db->select(
				$sql_tab['benutzer_gruppe'],
				$sql_tabs['benutzer_gruppe']['benutzer_gruppe_id'],
				$sql_tabs['benutzer_gruppe']['bezeichnung'].'='.$db->str('Terminierer')
			);
			if ($row=$db->zeile($res)) {
				$xg=explode(',', $_SESSION['rechte_bgruppen']);
				if (in_array($row[0], $xg)) {
					$in_term_gruppe=true;
				}
			}
			
			$krit=$fsql.'_'.intval($in_kontr_gruppe);
			
			$aus_cache='';
			
			$res=$db->select(
				$sql_tab['filter_cache'],
				array(
					$sql_tabs['filter_cache']['datum'],
					$sql_tabs['filter_cache']['idstring'],
					$sql_tabs['filter_cache']['anzahl']
				),
				$sql_tabs['filter_cache']['bezeichnung'].'='.$db->str($krit)//'xxx'.
			);
			if ($row=$db->zeile($res)) {
				// innerhalb der letzten 10 min.? - dann gecachtes nehmen
				if ($db->unixdate_ts($row[0])>=(time()-60*10)) {
					$aus_cache=$row[1];
					$filt_f=$aus_cache;
					
					$f_i=intval($row[2]);
					$_SESSION['crm_l_id']=$filt_f;
					$_SESSION['crm_l_anzahl']=$f_i;
					return $f_i;
				}
			}
			
			$ccp=false;
			if ($_SESSION['cfg_kunde']=='cc_complan') {
				$ccp=true;
			}
			
			// WVL
		/*	$res2=$db->select(
					$sql_tab['telefonleitfaden_zugriff'],
					array(
						$sql_tabs['telefonleitfaden_zugriff']['stammdaten_id'],
						$sql_tabs['telefonleitfaden_zugriff']['freigabe'],
						$sql_tabs['telefonleitfaden_zugriff']['freigabe_privat'],
						$sql_tabs['telefonleitfaden_zugriff']['benutzer_id']
					),
					$sql_tabs['telefonleitfaden_zugriff']['freigabe_privat'].'=1'
			);
			$nstid=',';
			$nstid_nachhinten=',';
			$maxpr=adodb_mktime(20,0,0,adodb_date('m',time()),adodb_date('d',time()),adodb_date('Y',time()) );
			while ($row2=$db->zeile($res2)) {
				// private auf jeden Fall extra rein:
				if ($row2[2]=='1' and $row2[3]==$_SESSION['user_id']) {
					$private_s.=$row2[0].',';
				}
			}
		*/	
			
			$into_outfile=false;
			
			if ($dbug) {
				echo '1:'.zeitnahme().'<br>';
			}
			// Antworten
			if (!$in_kontr_gruppe) {
				if ($into_outfile) {
					$dat=$cfg_pfad_sqltemp.$_SESSION['user_id'].'_'.time().'_aw.sql';
					if (is_file($dat)) {
						unlink($dat);
					}
					$res2=$db->select2('select distinct '.$sql_tabs['telefonleitfaden_antworten']['stammdaten_id']." INTO OUTFILE \"".$dat."\" FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"' LINES TERMINATED BY \"\n\" FROM ".$sql_tab['telefonleitfaden_antworten'].' where '.$sql_tabs['telefonleitfaden_antworten']['datum'].'>='.$db->dbdate('13.03.2006'));
					$finh=file($dat);
					while (list($key, $val)=@each($finh)) {
						$row2=explode(',', $val);
						$n_feld[intval($row2[0])]=1;
					}
					@unlink($dat);
				} else {
					
					$res2=$db->select(
						$sql_tab['telefonleitfaden_antworten'],
						array(
							'distinct '.$sql_tabs['telefonleitfaden_antworten']['stammdaten_id']
						)
//						,$sql_tabs['telefonleitfaden_antworten']['datum'].'>='.$db->dbdate('13.03.2006')
						,$sql_tabs['telefonleitfaden_antworten']['datum'].'>='.$db->dbdate('01.06.2007')
					);
					while ($row2=$db->zeile($res2)) {
					//	if ($ccp) {
					//		$nh_feld[intval($val)]=1;
					//	} else
						
						if ($in_term_gruppe) {
							
						} else {
							$n_feld[intval($row2[0])]=1;
						}
					}
					
				}
			}
			/*
			$res2=$db->select(
				$sql_tab['telefonleitfaden_antworten'],
				array(
					'distinct '.$sql_tabs['telefonleitfaden_antworten']['stammdaten_id']
				)
				,$sql_tabs['telefonleitfaden_antworten']['datum'].'>='.$db->dbdate('13.03.2006')
			);
			while ($row2=$db->zeile($res2)) {
				if ($in_kontr_gruppe) {
					$nh_feld[intval($row2[0])]=1;
				} else {
					$n_feld[intval($row2[0])]=1;
				//	echo 'Antwort raus: '.$row2[0].' ('.intval($aez++).')<br>';
				}
			}
			*/
			if ($dbug) {
				echo '2:'.zeitnahme().'<br>';
			}
			
			// nicht erreicht
			$spl_datum=adodb_mktime(0,0,0,adodb_date('m'), adodb_date('d'), adodb_date('Y'))-1*24*60*60;
			// 1=mo, 2=di, 3=mi
			if (adodb_date('w', time())==1/* or adodb_date('w', time())==2 or adodb_date('w', time())==3*/) {
				$spl_datum-=24*60*60;
			}
			$jetzt=time()-60*60*4;
			
			$cc_nachmittag=(intval(adodb_date('H'))>=15?1:0);
			
			if ($into_outfile and $ccp) {
				$dat=$cfg_pfad_sqltemp.$_SESSION['user_id'].'_'.time().'_ne.sql';
				if (is_file($dat)) {
					unlink($dat);
				}
				$res2=$db->select2("select ".$sql_tabs['telefonleitfaden_nichterreicht']['stammdaten_id']." INTO OUTFILE \"".$dat."\" FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"' LINES TERMINATED BY \"\" FROM ".$sql_tab['telefonleitfaden_nichterreicht'].' order by '.$sql_tabs['telefonleitfaden_nichterreicht']['anzahl'].','.$sql_tabs['telefonleitfaden_nichterreicht']['letzter_anruf']);
				if ($fp=fopen($dat, 'r')) {
					$inh2=fread($fp, filesize($dat));
					fclose($fp);
					$fcx=explode(',', $inh2);
					$nh1_feld=array_flip($fcx);
					while ($opo++<10 and list($key, $val)=@each($nh1_feld)) {
						echo $key.'-'.$val.'<br>';
					}
//					$nh1_feld[intval($row2[0])]=1;
				}
				@unlink($dat);
			} elseif ($into_outfile) {
				$dat=$cfg_pfad_sqltemp.$_SESSION['user_id'].'_'.time().'_ne.sql';
				if (is_file($dat)) {
					unlink($dat);
				}
				$res2=$db->select2("select ".$sql_tabs['telefonleitfaden_nichterreicht']['stammdaten_id'].','.$sql_tabs['telefonleitfaden_nichterreicht']['letzter_anruf']." INTO OUTFILE \"".$dat."\" FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"' LINES TERMINATED BY \"\n\" FROM ".$sql_tab['telefonleitfaden_nichterreicht'].' order by '.$sql_tabs['telefonleitfaden_nichterreicht']['anzahl'].','.$sql_tabs['telefonleitfaden_nichterreicht']['letzter_anruf']);
				$finh=file($dat);
				while (list($key, $val)=@each($finh)) {
					$row2=explode(',', $val);
					$row2[1]=p4n_mb_string('str_replace', '"', '', $row2[1]);
					
					$tst=$db->unixdate_ts($row2[1]);
					
					if ($ccp) {
						$nh1_feld[intval($row2[0])]=1;
						continue;
					}
					
					if ($tst>=$jetzt) {
						$n_feld[intval($row2[0])]=1;
					} else {
						if ($tst>=$spl_datum) {
							// innerhalb der letzten 1 Tage -> in 2. Feld:
							$nh2_feld[intval($row2[0])]=1;
						} else {
							// älter als die 3 Tage
							$nh1_feld[intval($row2[0])]=1;
						}
					}
				}
				@unlink($dat);
			} else {
				$res2=$db->select(
					$sql_tab['telefonleitfaden_nichterreicht'],
					array(
						$sql_tabs['telefonleitfaden_nichterreicht']['stammdaten_id'],
						$sql_tabs['telefonleitfaden_nichterreicht']['letzter_anruf'],
						$sql_tabs['telefonleitfaden_nichterreicht']['anzahl']
					),
					'',
					$sql_tabs['telefonleitfaden_nichterreicht']['anzahl'].','.$sql_tabs['telefonleitfaden_nichterreicht']['letzter_anruf']
				);
				while ($row2=$db->zeile($res2)) {
					$tst=$db->unixdate_ts($row2[1]);
					
					if ($ccp) {
						$nh1_feld[intval($row2[0])]=1;
						continue;
					}
					
					if ($tst>=$jetzt) {
						// innerhalb der letzten 4 Stunden??
	//					echo $row2[0].' 4h<br>';
	//					echo 'NE raus: '.$db->unixdatetime($row2[1]).' ('.intval($nez++).')'.$row2[0].'<br>';
						$n_feld[intval($row2[0])]=1;
					} else {
						if ($tst>=$spl_datum) {
							// innerhalb der letzten 1 Tage -> in 2. Feld:
							$nh2_feld[intval($row2[0])]=1;
//echo 'NE 0-1 Tag: '.$db->unixdatetime($row2[1]).' ('.intval($nez2++).')'.$row2[0].'<br>';
						} else {
							// älter als die 1 Tag
							$besweg=false;
							if ($_SESSION['zusatzflag']=='1' and $_SESSION['cfg_kunde']=='callcenter' and intval($row2[2])>=4) {
								// in abc_nw_k steht der %-Anteil an Vormittags-Telefonaten
								$res3=$db->select(
									$sql_tab['stammdaten'],
									$sql_tabs['stammdaten']['abc_nw_k'],
									$sql_tabs['stammdaten']['id'].'='.$db->dbzahl($row2[0])
								);
								if ($row3=$db->zeile($res3)) {
									$besweg=true;
									if (($cc_nachmittag and intval($row3[0])>=50) or (!$cc_nachmittag and intval($row3[0])<50)) {
										// ins aktuelle Feld
										$nh3_feld[intval($row2[0])]=intval($row3[0]);
									} else {
										// nach hinten ranhängen:
										$nh4_feld[intval($row2[0])]=intval($row3[0]);
									}
								}
							}
							if (!$besweg) {
								$nh1_feld[intval($row2[0])]=1;
							}
//echo 'NE >1 Tag: '.$db->unixdatetime($row2[1]).' ('.intval($nez3++).')'.$row2[0].'<br>';
						}
					}
				}
			}
		}
		if ($dbug) {
			echo '3:'.zeitnahme().'<br>';
		}
		$filt_f1='';
		$filt_f2='';
		$filt_f1_2='';
		$filt_f1_1='';
		$filt_f1_11='';
		$f_ne=array();
		$f_ne2=array();
		$f_ne3=array();
		$f_ne4=array();
		
		if ($cfg_callcenter) {	//$_SESSION['cfg_kunde']=='callcenter'
			if (preg_match('/select .* from (.*) where (.*) order by.*/i', $fsql, $matches)) {
				$x=explode(',', $matches[1]);
				if ((trim($x[0])==$sql_tab['stammdaten'] and trim($x[1])==$sql_tab['stammdaten_gruppe_zuordnung']) or (trim($x[0])==$sql_tab['stammdaten_gruppe_zuordnung'] and trim($x[1])==$sql_tab['stammdaten'])) {
					$w=$matches[2];
					$w=p4n_mb_string('str_replace', 'and '.$sql_tabs['stammdaten_gruppe_zuordnung']['stammdaten_id'].'='.$sql_tabs['stammdaten']['id'], '', $w);
					$w=p4n_mb_string('str_replace', 'and '.$sql_tabs['stammdaten']['id'].'='.$sql_tabs['stammdaten_gruppe_zuordnung']['stammdaten_id'], '', $w);
					$w=p4n_mb_string('str_replace', $sql_tabs['stammdaten_gruppe_zuordnung']['stammdaten_id'].'='.$sql_tabs['stammdaten']['id'], '', $w);
					$w=trim(p4n_mb_string('str_replace', $sql_tabs['stammdaten']['id'].'='.$sql_tabs['stammdaten_gruppe_zuordnung']['stammdaten_id'], '', $w));
					if (p4n_mb_string('substr', $w, 0, 3)=='and') {
						$w=p4n_mb_string('substr', $w, 3);
					}
					if (!preg_match('/'.$sql_tab['stammdaten'].'\./', $w)) {
						$fsql='select '.$sql_tabs['stammdaten_gruppe_zuordnung']['stammdaten_id'].' from '.$sql_tab['stammdaten_gruppe_zuordnung'].' where '.$w.' order by RAND()';
					}
				}
			}
		}
		$result=$db->select2($fsql);
		if ($dbug) {
			echo '4: '.zeitnahme().' /Anzahl Filter-IDs: '.$db->anzahl($result).'<br>';
			echo '<br>'.$fsql.'<br><br>';
		}
		while ($row=$db->zeile($result)) {
			if ($cfg_callcenter and !$ist_admin) {
				if (isset($n_feld[intval($row[0])])) {
					$xii++;
					continue;
				} elseif (isset($nh1_feld[intval($row[0])])) {
					// nicht erreichten: >3 Tage
			//	echo '>3: '.$row[0].':'.$nh1_feld[intval($row[0])].'<br>';
					$f_ne[intval($row[0])]=1;
					$anz_k[intval($row[0])]=1;
					$f_i++;
					$nh++;
					continue;
				} elseif (isset($nh2_feld[intval($row[0])])) {
					// nicht erreichten: 0-3 Tage
			//	echo '0-3: '.$row[0].':'.$nh2_feld[intval($row[0])].'<br>';
					$f_ne2[intval($row[0])]=1;
					$anz_k[intval($row[0])]=1;
					$f_i++;
					$nh++;
					continue;
				} elseif (isset($nh3_feld[intval($row[0])])) {
					// ab >=4 NEs und von der anderen Tageshälfte
					$f_ne3[intval($row[0])]=1;
					$anz_k[intval($row[0])]=1;
					$f_i++;
					$nh++;
					continue;
				} elseif (isset($nh4_feld[intval($row[0])])) {
					// ab >=4 NEs und gleiche Tageshälfte
					$f_ne4[intval($row[0])]=1;
					$anz_k[intval($row[0])]=1;
					$f_i++;
					$nh++;
					continue;
				} elseif (isset($nh_feld[$row[0]])) {
					// Rest (Antworten)
					$filt_f2.=$row[0].',';
					$anz_k[intval($row[0])]=1;
					$f_i++;
					$nh++;
					continue;
				} else {
					$filt_f.=$row[0].',';
					$anz_k[intval($row[0])]=1;
					$f_i++;
					continue;
				}
			} else {
				if (!isset($anz_k[intval($row[0])])) {
					$filt_f.=$row[0].',';
				}
				$f_i++;
				$anz_k[intval($row[0])]=1;
			}
			
		}
		if ($dbug) {
			echo '<br>'.$fsql.'<br><br>';
		}
		@reset($nh1_feld);
		while (list($key, $val)=@each($nh1_feld)) {
			if (isset($f_ne[$key])) {
				$filt_f1.=$key.',';
			}
		}
		@reset($nh2_feld);
		while (list($key, $val)=@each($nh2_feld)) {
			if (isset($f_ne2[$key])) {
				$filt_f1_2.=$key.',';
			}
		}
		@reset($nh3_feld);
		while (list($key, $val)=@each($nh3_feld)) {
			if (isset($f_ne3[$key])) {
				$filt_f1_1.=$key.',';
			}
		}
		@reset($nh4_feld);
		while (list($key, $val)=@each($nh4_feld)) {
			if (isset($f_ne4[$key])) {
				$filt_f1_11.=$key.',';
			}
		}
		
	//	echo 'älter als 1 Tage: '.$filt_f1.'<br><br>';
	//	echo '0-1 Tage: '.$filt_f1_2.'<br><br>';
		
		$filt_f=p4n_mb_string('substr', $filt_f.$private_s.$filt_f1.$filt_f1_1.$filt_f1_11.$filt_f1_2.$filt_f2, 0, -1);
//echo 'nach FILTER: '.zeitnahme().'<br>';
		
		$_SESSION['crm_l_id']=$filt_f;
		$_SESSION['crm_l_anzahl']=$f_i;
		
		// Cachen
		if ($cfg_callcenter and !$ist_admin and $krit!='') {
			$res=$db->delete(
				$sql_tab['filter_cache'],
				$sql_tabs['filter_cache']['bezeichnung'].'='.$db->str($krit)
			);
			$db->insert(
				$sql_tab['filter_cache'],
				array(
					$sql_tabs['filter_cache']['datum'] => $db->dbtimestamp(time()),
					$sql_tabs['filter_cache']['idstring'] => $db->str($filt_f),
					$sql_tabs['filter_cache']['anzahl'] => $db->dbzahl($f_i),
					$sql_tabs['filter_cache']['bezeichnung'] => $db->str($krit)
				)
			);
		}
		
		if ($dbug) {
			echo 'nach FILTER: '.zeitnahme().'<br>';
		}
/*
echo 'nach FILTER: '.zeitnahme().'<br>';
echo '<table style="width:auto;">';
$al=explode(',', $filt_f);
$gi=0;
while (list($key, $val)=@each($al)) {
	$gi++;
	$res=$db->select(
		$sql_tab['telefonleitfaden_nichterreicht'],
		array(
			$sql_tabs['telefonleitfaden_nichterreicht']['stammdaten_id'],
			$sql_tabs['telefonleitfaden_nichterreicht']['letzter_anruf'],
			$sql_tabs['telefonleitfaden_nichterreicht']['anzahl']
		),
		$sql_tabs['telefonleitfaden_nichterreicht']['stammdaten_id'].'='.$db->dbzahl($val)
	);
	echo '<tr><td>'.$gi.'</td><td>'.$val.'</td>';
	if ($row=$db->zeile($res)) {
		echo '<td>'.$db->unixdatetime($row[1]).'</td><td>'.$row[2].'</td>';
	} else {
		echo '<td>----</td><td>----</td>';
	}
	$res=$db->select(
		$sql_tab['telefonleitfaden_antworten'],
		$sql_tabs['telefonleitfaden_antworten']['antwort_id'],
		$sql_tabs['telefonleitfaden_antworten']['stammdaten_id'].'='.$db->dbzahl($val)
	);
	echo '<td>'.$db->anzahl($res).'</td>';
	$res=$db->select(
		$sql_tab['telefonleitfaden_zugriff'],
		$sql_tabs['telefonleitfaden_zugriff']['freigabe_privat'],
		$sql_tabs['telefonleitfaden_zugriff']['stammdaten_id'].'='.$db->dbzahl($val)
	);
	echo '<td>'.$db->anzahl($res).'</td>';
	
	$res=$db->select(
		$sql_tab['stammdaten'],
		$sql_tabs['stammdaten']['abc_nw_k'],
		$sql_tabs['stammdaten']['id'].'='.$db->dbzahl($val)
	);
	$row=$db->zeile($res);
	echo '<td>'.intval($row[0]).'</td>';
	echo '</tr>';
}
echo '</table>';

echo link2('logout.php', 'logout.php');
die();
*/
		if ($dbug) {
			echo link2('logout.php', 'logout.php');
			die();
		}
		return $f_i;
	}
	
	function get_filter_tabs() {
		global $sql_tab;
		$feld=array($sql_tab['stammdaten'] => 1, $sql_tab['stammdaten_adresse'] => 1, $sql_tab['auftrag'] => 1, $sql_tab['korrespondenz'] => 1, $sql_tab['telefonleitfaden_antworten'] => 1, $sql_tab['zusatzfelder'] => 1);
		if ($_SESSION['cfg_kunde']!='ba') {
			$feld[$sql_tab['opportunity']]=1;
			$feld[$sql_tab['troubleticket']]=1;
			$feld[$sql_tab['stammdaten_ansprechpartner']]=1;
		}
		if ($cfg_kfz) {
			$feld[$sql_tab['produktzuordnung']]=1;
		}
		if (isset($sql_tab['unterlagen'])) {
			$feld[$sql_tab['unterlagen']]=1;
		}
		return $feld;
	}
	
	// There is an extended version in Report/Dash/Filter/Data.php
	function filter_get_comp($fsql) {
		
		$felder='';
		$where='';
		$orderby='';
		$groupby='';
		$having='';
		$limit_count='';
		$limit_offset='';
		
			if (preg_match('/select (.*) from (.*) where (.*)/i', $fsql, $m)) {
				$felder=$m[1];
				// having:
				if (preg_match('/(.*) group by (.*) having (.*)/i', $m[3], $m2)) {
					$where=$m2[1];
					$groupby=$m2[2];
					// order by:
					if (preg_match('/(.*) order by (.*)/i', $m2[3], $m3)) {
						$having=$m3[1];
						$orderby=$m3[2];
					} else {
						$having=$m2[3];
					}
				} elseif (preg_match('/(.*) group by (.*)/i', $m[3], $m2)) {
					$where=$m2[1];
					// order by:
					if (preg_match('/(.*) order by (.*)/i', $m2[2], $m3)) {
						$orderby=$m3[2];
					}
				} elseif (preg_match('/(.*) order by (.*)/i', $m[3], $m2)) {
					$where=$m2[1];
					$orderby=$m2[2];
				} else
					$where=$m[3];
				if ($orderby!='') {
					if (preg_match('/(.*) limit (.*)/i', $orderby, $m4)) {
						$orderby=$m4[1];
						$m4[2]=trim($m4[2]);
						$erg=explode(',', $m4[2]);
						$limit_count=trim($erg[1]);
						$limit_offset=trim($erg[0]);
					}
				}
				
				if (preg_match('/(.*) limit (.*)/i', $where, $m4)) {
					$where=$m4[1];
					$m4[2]=trim($m4[2]);
					$erg=explode(',', $m4[2]);
					$limit_count=trim($erg[1]);
					$limit_offset=trim($erg[0]);
				}
				
			} else {
				if (preg_match('/select (.*) from/i', $fsql, $m)) {
					$felder=$m[1];
				}
			}
		
		return array($felder, $where, $orderby, $groupby, $having, $limit_count, $limit_offset);
	}
	
	function olovertext($t) {
	    if ($_SESSION['cfg_security_level'] == 9 || $_SESSION['cfg_security_level'] == 4 || $_SESSION['cfg_security_level'] == 6) {
            $t=xss::filter($t);
	    }
		$ersetz='';
		if ($_SESSION['olovermitapo']) {
			$ersetz="'";
		}
	    return addslashes(p4n_mb_string('str_replace', array("\n", '&lt;br&gt;', '&#13;'),"<br>",p4n_mb_string('str_replace', "\r",'',p4n_mb_string('str_replace', array('"','\\'),$ersetz,$t))));
	}
	
	function hinweis_grafik($text, $ueberschrift='', $breite=300) {
		global $ol;
		
		if (!isset($ol)) {
			//class_exists("Overlib")) {
			include_once("class.overlib.php");
			$ol = new Overlib();
		}
		$ol->set("width",$breite);
		$ol->set("bgcolor",'#000000');
		
		return oltext('<font size=2>'.$text.'</font>', '<img class="vmitte" src="bilder/hinweislampe.gif" border=0>', '', $ueberschrift);
	}
	
	function preg_replace2($patt, $repl, $text) {
		$re="\\\\";
		$repl=p4n_mb_string('str_replace', "\\", $re, $repl);
		$repl=addcslashes($repl,'$');
		$text=preg_replace($patt, $repl, $text);
		return $text;
	}

    
    function oltext_tab($tabicon=-1,$text, $linktext='', $link='', $ueberschrift='', $breite=300, $extras='', $keine_werte=false, $kein_bild=false) {
        global $cfg_modern;
        if ($link=='') {
            return oltext($text, $linktext, $link,$ueberschrift, $breite, $extras, $keine_werte, $kein_bild);
        }
        if (!preg_match('/<img|icon\-/', $linktext) && $kein_bild==false) {
            if ($cfg_modern) {
                $linktext='<span class="icon icon-help">&nbsp;</span>'.$linktext;
            } else {
                $linktext='<img class="overlib" src="bilder/overlib.gif">'.$linktext;
            }
		}
        return linkToTab($linktext,$link,'','',oltext2($text, $ueberschrift, $breite),$tabicon);
    }
    
/**
 * @param $text
 * @param string $linktext
 * @param string $link
 * @param string $ueberschrift
 * @param int $breite
 * @param string $extras
 * @param bool|false $keine_werte
 * @return string
 */
	function oltext($text, $linktext='', $link='', $ueberschrift='', $breite=300, $extras='', $keine_werte=false, $kein_bild=false, $tag='a') {
		global $ol, $cfg_basedir,$cfg_modern,$carlo_tw;
        if ($carlo_tw && preg_match('/'._QUELLE_.'\: leadanlage/i', $text)) {
            $text=p4n_mb_string('str_replace',_QUELLE_.': leadanlage',_QUELLE_.': '._LEADANLAGE_,$text);
        }
        $zus_c='';
		if ($linktext==='') {
			return '&nbsp;';
		}
		if ($link=='') {
			$link='#';
		} else {
            if (!$cfg_modern) {
                $zus_c=' style="color:#0000BB; font-weight:bold;"';
            }
		}
        if ($_SESSION['cfg_kunde']=='carlo_koltes') {
            global $phs;
            if (basename($phs)=='stammdaten_suche.php') {
                $zus_c=' style="color:#0000BB;font-weight:bold;font-size: 14px;"';
            }
        } 

		if (!isset($ol)) {
			include_once($cfg_basedir."class.overlib.php");
			$ol = new Overlib();
		}
		
		$ol->set("width", $breite);
		if ($keine_werte==false) {
			$ol->set("hauto", true); 
			$ol->set("vauto", true); 
		}
		
		// neue OL?
		$vordiv='';
		$nachdiv='';
		if ($ol->ol_neue) {
            if ($cfg_modern) {
                $ol->ol_textfont='Open Sans,sans-serif';
                $ol->ol_textsize="'12px'";
                $ol->ol_snapx="15";
                $ol->ol_align="right";
            }

			$gross=false;
			$olte2=olovertext($text);
			if (p4n_mb_string('substr_count', $olte2, '<br>')>20 or p4n_mb_string('substr_count', $olte2, '&lt;br&gt;')>20 or p4n_mb_string('substr_count', $olte2, '<tr')>15 or p4n_mb_string('substr_count', $olte2, '&lt;tr')>15) {
				$gross=true;
			}
			
			$ol->ol_scroll=false;
			$ol->ol_sticky=false;
			if ($gross) {
				$vordiv='<div class=ovfl>';
				$nachdiv='</div>';
				$ol->ol_scroll=true;
				$ol->ol_sticky=true;
				$ol->ol_wrap=true;
				$ol->ol_closetext=(($cfg_modern)?' ':_SCHLIESSEN_);
                if ($cfg_modern) {
                    $ol->ol_closeclick=true;
                }
				if ($ueberschrift=='') {
					$ueberschrift='&nbsp;';
				}
				//$ol->ol_autostatus=true;
				
				$text=$vordiv.$text.$nachdiv;
			}

            if ($cfg_modern) {
                $text='<div class=modernowfl>'.$text.'</div>';
            }

			$ol->ol_fgclass="olclass2 table-nostyle";
			$ol->ol_bgclass="olclass table-nostyle";
			$ol->ol_cgclass="olclass table-nostyle";
			$ol->ol_cfclass="olclasscf table-nostyle";
		}
		
		//Wenn keine Grafik in der URL oder der Text auch nicht leer ist
		if (!preg_match('/<img|icon\-/', $linktext) && $kein_bild==false) {
            if ($cfg_modern) {
                $linktext='<span class="icon icon-help">&nbsp;</span>'.$linktext;
            } else {
                $linktext='<img class="overlib" src="bilder/overlib.gif">'.$linktext;
            }
		}
		
		if ($ueberschrift!='') {
			$olt=$ol->over(olovertext($text), $ueberschrift);
		} else {
			$olt=$ol->over(olovertext($text));
		}
		
		if ($_SESSION['ajx']==1) {
			if (preg_match('/\.php/', $link)) {
				return '<a class="overlib"'.$zus_c.' href="javascript:lade_s(\''.$link.'\', \'div_main\');" onClick=\'nd();\' '.$olt.($extras!=''?' '.$extras:'').'>'.$linktext.'</a>';
			}
		}
		//
        $class='overlib';
        if ($cfg_modern && $link=='#' && !preg_match('/onclick|id|class/is',$extras) && $tag=='a') {
                $class.=' nolink';
                $link='javascript:void(0);';
        }
        
		return '<'.$tag.' class="'.$class.'"'.$zus_c.' '.($tag=='a'?'href="'.$link.'"':'').' '.$olt.($extras!=''?' '.$extras:'').'>'.$linktext.'</'.$tag.'>';
	}
	
	function oltext2($text, $ueberschrift='', $breite=300) {
		global $ol,$cfg_modern,$carlo_tw;

        if ($cfg_modern && $text=='' && $ueberschrift=='') {
            return '';
        }

        if ($carlo_tw && preg_match('/'._QUELLE_.'\: leadanlage/i', $text)) {
            $text=p4n_mb_string('str_replace',_QUELLE_.': leadanlage',_QUELLE_.': leadanlage',$text);//#Thomasderbärtige
        }

        if (!isset($ol)) {
            include_once("class.overlib.php");
            $ol = new Overlib();
        }
        $ol->set("width", $breite);

        // neue OL?
        $vordiv='';
        $nachdiv='';

        if ($ol->ol_neue) {
            if ($cfg_modern) {
                $ol->ol_textfont='Open Sans,sans-serif';
                $ol->ol_textsize="'12px'";
                $ol->ol_snapx="15";
                $ol->ol_align="right";
            }
            $gross=false;
            $olte2=olovertext($text);
            if (p4n_mb_string('substr_count', $olte2, '<br>')>20 or p4n_mb_string('substr_count', $olte2, '&lt;br&gt;')>20 or p4n_mb_string('substr_count', $olte2, '<tr')>15 or p4n_mb_string('substr_count', $olte2, '&lt;tr')>15) {
                $gross=true;
            }

            $ol->ol_scroll=false;
            $ol->ol_sticky=false;
            if ($gross) {
                $vordiv='<div class=ovfl>';
                $nachdiv='</div>';
                $ol->ol_scroll=true;
                $ol->ol_sticky=true;
                $ol->ol_wrap=true;
                $ol->ol_closetext=(($cfg_modern)?' ':_SCHLIESSEN_);
                if ($cfg_modern) {
                    $ol->ol_closeclick=true;
                }
                if ($ueberschrift=='') {
                    $ueberschrift='&nbsp;';
                }
                //$ol->ol_autostatus=true;

                $text=$vordiv.$text.$nachdiv;
            }

            if ($cfg_modern) {
                $text='<div class=modernowfl>'.$text.'</div>';
            }

            $ol->ol_fgclass="olclass2 table-nostyle";
            $ol->ol_bgclass="olclass table-nostyle";
            $ol->ol_cgclass="olclass table-nostyle";
            $ol->ol_cfclass="olclasscf table-nostyle";
        }
    	return $ol->over(olovertext($text), $ueberschrift);
	}

/**
 * @param $text
 * @param string $other
 * @return string
 */
	function css_kopf($text, $other='') {
		global $keine_leerzeile, $li_block, $cfg_neustyle,$cfg_modern;
		
        if ($cfg_modern && $li_block!='') {
            $temp = new Modern_Template_SubMenu();
            $temp->class='csskopf';
            $temp->wrapper_small=false;
            $temp->setTitle($text);
            $temp->filter_marginright=true;
            $temp->setFilterString($li_block);
            $temp->wrapper_marginbottom=true;
            $temp->setHtml();
             return $temp->getHtml();
        }

        if ($cfg_modern  && $li_block=='') {
            if (!empty($text)) {
                return Modern_Template_Header::getInstance($text, $other)->getHtml();
            } else {
                return '';
            }
        }
		$kopftext='';
		if ($keine_leerzeile==1) {
			
		} else {
			$kopftext.='<br>';
		}
		$kopftext.='<table width="100%" cellspacing=0 border=0 class="head"><tr><th class="head">'.$text.'</th></tr></table>'.$li_block;
		if ($cfg_neustyle) {
//			$text=p4n_mb_string('str_replace', '<a ', '<a style="color:#C0C0FF;" ', $text);
			return '<div class="header">'.$text.'</div>'.$li_block;
		} else {
			return '<div class="ueberschrift">'.$text.'</div>'.$li_block;
		}
		return $kopftext;
	}
	
	function tr_zeile() {
        global $cfg_modern;
        if ($cfg_modern) {
            return ' onMouseover="m=this.className; this.className=m+\' trhover\';" onMouseout="this.className=m;" ';
        } else {
		return ' onMouseover="m=this.className; this.className=\'tabover\';" onMouseout="this.className=m;" ';
	}
	}

/**
 * @param $jstext
 * @return string
 */
	function javas($jstext) {
		return '<script type="text/javascript">'.$jstext.'</script>';
	}
	
	function template($inhalt, $istschontext=false) {
		global $lang, $phs, $phs_tpl, $getsort_add, $sql_tab, $sql_tabs, $neu, $li_block, $t_nicht_sort, $t_nicht_sort_para2, $keine_hl, $cfg_navbar_anrede, $cfg_neustyle, $cfg_reiter_bank, $carlo_tw,$cfg_modern;
		
        $phs_tpl='';
		if (!$istschontext) {
			if ($fp=fopen($inhalt,"r")) {
                $phs_tpl=$inhalt;
				$inhalt=fread($fp,filesize($inhalt));
				fclose($fp);
			} else {
				return false;
			}
		}

        if ($cfg_modern) {
            $inhalt= Modern_Helper_KundenTpl::parse($inhalt);
        }

		if (class_exists('extract_form')) {
		    $inhalt = extract_form($inhalt);
		}
		//"/_[0-9a-zA-Z\-]+_/"  _.*_
		
			if (preg_match_all("/_[a-zA-Z0-9\-_]*_/",$inhalt,$feldx,PREG_SET_ORDER)) {
				while (list($key,$val)=@each($feldx))
					if (is_array($val) && isset($lang[$val[0]])) {
						$inhalt=p4n_mb_string('str_replace', $val[0],$lang[$val[0]],$inhalt);
					}
			}
		
		if (!$t_nicht_sort) {
			if (preg_match_all("/\{sort\-([^\}]+)/is",$inhalt,$feld_sort,PREG_SET_ORDER)) {
				while (list($key,$val)=@each($feld_sort)) {
					$sv='';
					$merke=$val[1];
					if (p4n_mb_string('substr', $val[1], 0, 1)=='2' and !$t_nicht_sort_para2) {
						$sv='2';
						$val[1]=p4n_mb_string('substr', $val[1], 1);
					}
					$inhalt=p4n_mb_string('str_replace', '{sort-'.$merke.'}', link2('', $phs.'?'.$getsort_add.'sort'.$sv.'='.$val[1].'&order=asc', 'pfeil_oben'.(($_GET['sort'.$sv]==$val[1] and $_GET['order']=='asc')?'_a':'').'.gif').link2('', $phs.'?'.$getsort_add.'sort'.$sv.'='.$val[1].'&order=desc', 'pfeil_unten'.(($_GET['sort'.$sv]==$val[1] and $_GET['order']=='desc')?'_a':'').'.gif'), $inhalt);
				}
			}
		}
		
		if ($cfg_neustyle and preg_match('/admin_filter2/', $phs)) {
		//	$inhalt=p4n_mb_string('str_replace', 'class="ueberschrift"', 'class="header"', $inhalt);
		}
		
		if ($cfg_neustyle and !preg_match('/admin_filter2/', $phs)) {
			$ovflw='auto';
			if (isset($_GET['ajax']) or isset($_POST['ajax'])) {
				$ovflw='hidden';
			}
			$pre='<div class="boxshadow_top">
		<div class="edge_lo"> </div>
		<div class="edge_ro"> </div>
	</div>
	<div class="boxshadow_left">
		<div class="boxshadow_right">
			<div class="box" style="width: 100%; margin: 0 0 0 0;">';	//<div class="wrapper_columns">		overflow:hidden;//auto	// overflow:'.$ovflw.';
			$sub='</div>
		</div>
	</div>
	<div class="boxshadow_bottom">
		<div class="edge_lu"> </div>
		<div class="edge_ru"> </div>
	</div>';
			$mr1=15;
                        $u = $_SERVER['HTTP_USER_AGENT'];
                        $isIE7  = (bool)preg_match('/msie 7./i', $u );
                        $isIE8  = (bool)preg_match('/msie 8./i', $u );
                        $isIE9  = (bool)preg_match('/msie 9./i', $u );
                        $compatible  = (bool)preg_match('/compatible/i', $u );
                        $isIE_edgefore= (isset($_SESSION['IEEdge_force']) && $_SESSION['IEEdge_force']==true) ? true : false;
			if (($isIE7 || $isIE8 || $isIE9) && !$compatible) {
				$mr1=0;
			} else if ($compatible && !$isIE_edgefore) {
                            $mr1=0;
                        }
			$inhalt=p4n_mb_string('str_replace', array('<!stc1>', '<!stc2>', '<!shd1>', '<!shd2>'), array('<div style="margin-right: '.$mr1.'pt;"><div id="content" style="width: 100%;">', '</div></div>', $pre, $sub), $inhalt);
			$inhalt=p4n_mb_string('str_replace', '<!sbl>', '<tr><th colspan=100 class="oben1"></th></tr>', $inhalt);
			$inhalt=p4n_mb_string('str_replace', 'bilder/overlib.gif"', 'img/link_ask.gif"', $inhalt);
			$inhalt=p4n_mb_string('str_replace', 'bilder/drucker.gif"', 'img/link_print2.gif"', $inhalt);
			$inhalt=p4n_mb_string('str_replace', 'bilder/kfz_historie.png"', 'img/link_car.gif"', $inhalt);
		}
		
        if ($cfg_modern and !preg_match('/admin_filter2/', $phs)) {
			$ovflw='auto';
			if (isset($_GET['ajax']) or isset($_POST['ajax'])) {
				$ovflw='hidden';
			}
			$pre='<div class="boxshadow_top">
                <div class="edge_lo"> </div>
                <div class="edge_ro"> </div>
                </div>
                <div class="boxshadow_left">
                    <div class="boxshadow_right">
                        <div class="box" style="width: 100%; margin: 0 0 0 0;">';	//<div class="wrapper_columns">		overflow:hidden;//auto	// overflow:'.$ovflw.';
                        $sub='</div>
                    </div>
                </div>
                <div class="boxshadow_bottom">
                    <div class="edge_lu"> </div>
                    <div class="edge_ru"> </div>
                </div>';
			$mr1=15;
                        $u = $_SERVER['HTTP_USER_AGENT'];
                        $isIE7  = (bool)preg_match('/msie 7./i', $u );
                        $isIE8  = (bool)preg_match('/msie 8./i', $u );
                        $isIE9  = (bool)preg_match('/msie 9./i', $u );
                        $compatible  = (bool)preg_match('/compatible/i', $u );
                        $isIE_edgefore= (isset($_SESSION['IEEdge_force']) && $_SESSION['IEEdge_force']==true) ? true : false;
			if (($isIE7 || $isIE8 || $isIE9) && !$compatible) {
				$mr1=0;
			} else if ($compatible && !$isIE_edgefore) {
                            $mr1=0;
                        }
			//$inhalt=p4n_mb_string('str_replace', array('<!stc1>', '<!stc2>', '<!shd1>', '<!shd2>'), array('<div id="content"><div id="'.p4n_mb_string('str_replace','.','_',basename($phs)).'">', '</div></div>', '', ''), $inhalt);
            $inhalt=p4n_mb_string('str_replace', array('<!stc1>', '<!stc2>', '<!shd1>', '<!shd2>'), array('', '', '', ''), $inhalt);
			//$inhalt=p4n_mb_string('str_replace', '<!sbl>', '<tr><th colspan=100 class="oben1"></th></tr>', $inhalt);
			$inhalt=p4n_mb_string('str_replace', 'bilder/overlib.gif"', 'img/link_ask.gif"', $inhalt);
			$inhalt=p4n_mb_string('str_replace', 'bilder/drucker.gif"', 'img/link_print2.gif"', $inhalt);
			$inhalt=p4n_mb_string('str_replace', 'bilder/kfz_historie.png"', 'img/link_car.gif"', $inhalt);
		}
		$stiln1='';
		if ($cfg_neustyle) {
			if (isset($_SESSION['stil'])) {
				if (preg_match('/style(.*)\.css/i', $_SESSION['stil'], $sma1)) {
					$stiln1=$sma1[1];
				}
				if (!is_file('img/verlauf'.$stiln1.'.jpg')) {
					$stiln1='';
				}
			}
		}
		
		$inhalt=p4n_mb_string('str_replace', '{trzeile}', tr_zeile(), $inhalt);
		if ($keine_hl) {
			
		} else {
		//	$inhalt=preg_replace('/(<!hl1>.*<!hl2>)/Ueis', 'css_kopf("\\1")', $inhalt);	// geht in php7 nicht
			$inhalt=preg_replace_callback('/(<!hl1>.*<!hl2>)/Uis', 'treffer_csskopf', $inhalt);
			$inhalt=p4n_mb_string('str_replace', array('<!hl1>', '<!hl2>'), '', $inhalt);
		}
		if (!$neu and (p4n_mb_string('strpos', $inhalt, '{kunde_navbar}')!==false or p4n_mb_string('strpos', $inhalt, '{datensatz}')!==false)) {
			$anzeigename1=dbout($sql_tab['stammdaten'], $sql_tabs['stammdaten']['anzeigename'], $sql_tabs['stammdaten']['id'].'='.intval($_SESSION['stammdaten_id']));
			if ($carlo_tw) {
                $anzeigename1 = kundenbezeichnung($_SESSION['stammdaten_id']);
            }
			if ($cfg_navbar_anrede) {
				$anrede1=dbout($sql_tab['stammdaten'], $sql_tabs['stammdaten']['anrede'], $sql_tabs['stammdaten']['id'].'='.intval($_SESSION['stammdaten_id']));
				$anzeigename1=trim($anrede1.' '.$anzeigename1);
			}
			if ($cfg_reiter_bank) {
				$bn1='';
				$db=new PDB;
				$res2=$db->select(
					$sql_tab['stammdaten_bank2'],
					$sql_tabs['stammdaten_bank2']['bank_id'],
					$sql_tabs['stammdaten_bank2']['stammdaten_id'].'='.$db->dbzahl($_SESSION['stammdaten_id']),
					$sql_tabs['stammdaten_bank2']['bank_id']
				);
				while ($row2=$db->zeile($res2)) {
					$bn1.=$row2[0].', ';
				}
				if ($bn1!='') {
					$anzeigename1.=' - '.p4n_mb_string('substr', $bn1, 0, -2);
				}
				$tib='';
				$res2=$db->select(
					$sql_tab['stammdaten_zusatznummer'],
					$sql_tabs['stammdaten_zusatznummer']['stammdaten_zusatznummer_id'],
					$sql_tabs['stammdaten_zusatznummer']['stammdaten_id'].'='.$db->dbzahl($_SESSION['stammdaten_id']),
					$sql_tabs['stammdaten_zusatznummer']['stammdaten_zusatznummer_id']
				);
				while ($row2=$db->zeile($res2)) {
					$tib.=$row2[0].', ';
				}
				if ($tib!='') {
					$anzeigename1.=' - T/IB: '.p4n_mb_string('substr', $tib, 0, -2);
				}
			}
			
			$kunde_daten=datensatz($anzeigename1);
			
			if ($cfg_neustyle) {
				$ku_karten=karten($_SESSION['karte']);	//   style="background: #fff url(img/verlauf.jpg) repeat-x top left;"
				$inhalt=p4n_mb_string('str_replace', '{kunde_navbar}', '<table class="karten" border=0 cellspacing=0 cellpadding=0>
<tr>
	<th nobreak width="30%" style="background: #fff url(img/verlauf'.$stiln1.'.jpg) repeat-x top left; vertical-align: middle; text-align: left; padding-left: 15px;" rowspan=2>'.$kunde_daten.'</th>
	'.$ku_karten.'<td style="width: 1px; background: #fff url(img/verlauf2'.$stiln1.'.jpg) repeat-x top left;">&nbsp;</td>
</tr>
</table>', $inhalt);
			}
            if (!$cfg_neustyle && !$cfg_modern) {
				$inhalt=p4n_mb_string('str_replace', '{kunde_navbar}', '<table class="karten" border=0 cellspacing=0 cellpadding=0>
<tr>
	<th nobreak width="30%">'.$kunde_daten.'</th>
	'.karten($_SESSION['karte']).'
</tr>
</table>', $inhalt);
			}
            if ($cfg_modern) {
                $kunde_daten .= '<span class="handbuch" style="display:none;">'.link2('', 'handbuch_suche.php?source='.basename($phs).'?nav='.$_SESSION['karte'], 'overlib.gif', '', 'target="_blank"').'</span>';
                $temp = new Modern_Template_SubMenu();
                $temp->class='KundeNavbar';
                $temp->title_zweizeiler=true;
                $temp->wrapper_marginbottom=true;
                $temp->setTitle($kunde_daten);
                $temp->setHtml(array('kartei'=>karten($_SESSION['karte'])));

                $inhalt=p4n_mb_string('str_replace', '{kunde_navbar}',  $temp->getHtml(), $inhalt);
            }
			$inhalt=p4n_mb_string('str_replace', '{datensatz}', $kunde_daten, $inhalt);
		} else {
			$inhalt=p4n_mb_string('str_replace', '{kunde_navbar}', '', $inhalt);
		}
		
		return $inhalt;
	}
	function treffer_csskopf($treffer) {
		return css_kopf($treffer[0]);
	}
	function zuruecklink($link, $zustext='') {
        global $cfg_modern;
        $startloading=$cfg_modern?'onclick="if (typeof P4nBoxHelper.startloading !=\'undefined\') {P4nBoxHelper.startloading();}"':'';
		return link2($zustext, $link, 'nav_1.gif','',$startloading).link2($zustext, $link,'','',$startloading);
	}
	
	function add_bemerkung($stid, $text) {
		global $db, $sql_tab, $sql_tabs, $cfg_cc_bem_abk;
		
		if ($cfg_cc_bem_abk) {
			$text=p4n_mb_string('str_replace', 'nicht erreicht', 'NE', $text);
			$text=p4n_mb_string('str_replace', 'auf private WVL gelegt', 'pWVL', $text);
		}
		$quelle='';
		if (isset($_GET['sou']) or isset($_POST['sou'])) {
			if (isset($_POST['sou'])) {
				if ($_POST['sou']!='') {
					$quelle=$_POST['sou'];
				}
			}
			
			if ($quelle=='' and isset($_GET['sou'])) {
				if ($_GET['sou']!='') {
					$quelle=$_GET['sou'];
				}
			}
		}
		if ($quelle=='') {
			if (isset($_POST['blst'])) {
				if ($_POST['blst']=='1') {
					$quelle=_KARTEIREITER_.' CC';
				}
			}
			if ($quelle=='' and isset($_GET['blst'])) {
				if ($_GET['blst']=='1') {
					$quelle=_KARTEIREITER_.' CC';
				}
			}
		}
		if ($quelle!='') {
			if ($quelle=='rrw') {
				$quelle=_RUECKRUFWARNER_;
			} elseif ($quelle=='wvl') {
				$quelle=_WVL_;
			}
			$text.=' | '.$quelle;
		}
		if (isset($sql_tabs['stammdaten']['cc_protokoll'])) {
			$res=$db->select(
				$sql_tab['stammdaten'],
				$sql_tabs['stammdaten']['cc_protokoll'],
				$sql_tabs['stammdaten']['id'].'='.$db->dbzahl($stid)
			);
			if ($row=$db->zeile($res)) {
				$bem=$row[0];
				
				$bem=$text."\n".$bem;
				
				$res=$db->update(
					$sql_tab['stammdaten'],
					array(
						$sql_tabs['stammdaten']['cc_protokoll'] => $db->str($bem),
					),
					$sql_tabs['stammdaten']['id'].'='.$db->dbzahl($stid)
				);
			}
		}
	}

    function format_tr($ftyp, $ftypg, $feldname, $wert='', $wertfeld='', $other='', $alle_beds=array(), $ftyp2='') {
        global $form, $db, $sb_k_aend, $alle_beds, $js_bed_start, $cfg_modern, $cfg_cc_survey;
        global $beenden_frid, $beenden_ant, $beenden_text, $beenden_ausblenden;
        global $sql_tab, $sql_tabs, $sql_meta,$keine_select_suche, $cfg_kfzsuche_lao_nurrecht, $cfg_kfzsuche_lao_ohneabk;

        $keine_select_suche=true;

        $other2='';
        //if (intval($bed_frid)>0) {
        $fr_id=p4n_mb_string('str_replace', array('antwort', 'frage[', ']'), '', $feldname);


        if (isset($_SESSION['design_70']))
        {
            $ant_v = [];
        }
        else {
            $ant_v = '';
        }

        $temp2='';
        if (isset($beenden_frid)) {
            if ($beenden_frid>0 and $fr_id==$beenden_frid) {
                $val=$beenden_ant;
                $temp1='';
                if ($ftyp==20 && $_SESSION['crm_version']>62) {
                    $temp1='var opstring=\'\'; for(i= 0; i < this.options.length; i++) { if (this.options[i].selected == true) { opstring+=this.options[i].value+\';\'; } }  opstring = opstring.substr(0, (opstring.length-1)); ';
                }
                $alle_bee=explode(',', $beenden_ausblenden);
                while (list($key1, $key)=@each($alle_bee)) {
                    $bed_erfuellt=false;
                    if ($key=='') {
                        continue;
                    }
                    if ($ftyp==7 or $ftyp==12) {
                        $temp1.='if ('.($val=='0'?'!':'').'this.checked) { ch_vis(\'frageblock_'.$key.'\', false);  document.getElementById(\'beendentext\').innerHTML=\''.str_replace("'", '', $beenden_text).'\'; } else { ch_vis(\'frageblock_'.$key.'\', true); document.getElementById(\'beendentext\').innerHTML=\'\'; } ';
                        if ($wert!='') {
                            if ($wert==$val) {
                                $bed_erfuellt=true;
                            }
                        }
                    } else {
                        if ($ftyp==20 && $val!=''  && $_SESSION['crm_version']>62) {
                            $ges_antbed='opstring.indexOf(\''.$val.'\')!==-1';
                        } else {
                            $ges_antbed='this.value==\''.$val.'\'';
                        }
                        $xpl1_bed=explode(';', $val);
                        if ($wert!='') {
                            if ($wert==$val) {
                                $bed_erfuellt=true;
                            }
                        }
                        if (count($xpl1_bed)>=2) {
                            while (list($key_bed1, $val_bed1)=@each($xpl1_bed)) {
                                if ($ftyp==20  && $_SESSION['crm_version']>62) {
                                    $ges_antbed.=' || opstring.indexOf(\''.$val_bed1.'\')!==-1';
                                } else {
                                    $ges_antbed.='|| this.value==\''.$val_bed1.'\'';
                                }
                                if ($wert!='') {
                                    if ($wert==$val_bed1) {
                                        $bed_erfuellt=true;
                                    }
                                }
                            }
                        }
                        $temp1.=' if ('.$ges_antbed.') { '.($_SESSION['crm_version']>62?'if (document.getElementById(\'frageblock_'.$key.'\').style.display!=\'none\') {document.getElementById(\'frageblock_'.$key.'\').setAttribute(\'class\',document.getElementById(\'frageblock_'.$key.'\').getAttribute(\'class\')+\' beendentext\'); }':'').' ch_vis(\'frageblock_'.$key.'\', false);  document.getElementById(\'beendentext\').innerHTML=\''.str_replace("'", '', $beenden_text).'\'; } else { '.($_SESSION['crm_version']>62?' if (document.getElementById(\'frageblock_'.$key.'\').getAttribute(\'class\').indexOf(\'beendentext\')!==-1) {   document.getElementById(\'frageblock_'.$key.'\').className=document.getElementById(\'frageblock_'.$key.'\').className.replace(\'beendentext\', \'\');':'').' ch_vis(\'frageblock_'.$key.'\', true); '.($_SESSION['crm_version']>62?'}':'').' document.getElementById(\'beendentext\').innerHTML=\'\'; } ';
                    }
                    if ($bed_erfuellt) {
                        $js_bed_start.='ch_vis(\'frageblock_'.$key.'\', false); document.getElementById(\'beendentext\').innerHTML=\''.str_replace("'", '', $beenden_text).'\';';
                    }
                }
                $temp2=$temp1;
            }
        }

        if (isset($alle_beds[$fr_id])) {
            $temp1='';
            @reset($alle_beds[$fr_id]);
            if ($ftyp==20 && $_SESSION['crm_version']>62) {
                $temp1='var opstring=\'\'; for(i= 0; i < this.options.length; i++) { if (this.options[i].selected == true) { opstring+=this.options[i].value+\';\'; } }  opstring = opstring.substr(0, (opstring.length-1)); ';
            }
            while (list($key, $val)=@each($alle_beds[$fr_id])) {
                $bed_erfuellt=false;
                if ($ftyp==7 or $ftyp==12) {
                    $temp1.='if ('.(intval($val)==0 ?'!':'').'this.checked) { ch_vis(\'frageblock_'.$key.'\', true); } else { ch_vis(\'frageblock_'.$key.'\', false); } ';
                    if ($wert!='') {
                        if ($wert==$val) {
                            $bed_erfuellt=true;
                        }
                    }
                } else {
                    if ($val=='*') {
                        $ges_antbed='this.value!=\'\'';
                        if ($wert!='') {
                            $bed_erfuellt=true;
                        }
                    } else {
                        $val=str_replace(array('&lt;', '&gt;'), array('<', '>'), $val);
                        if ($ftyp==20 && $val!=''  && $_SESSION['crm_version']>62) {
                            $ges_antbed='opstring.indexOf(\''.$val.'\')!==-1';
                        } else {
                            $ges_antbed='this.value==\''.$val.'\'';
                        }
                        $xpl1_bed=explode(';', $val);
                        //if ($wert!='') {
                        if ($wert==$val) {
                            $bed_erfuellt=true;
                        }
                        //}
                        if (count($xpl1_bed)>=2) {
                            while (list($key_bed1, $val_bed1)=@each($xpl1_bed)) {
                                if ($ftyp==20 && $_SESSION['crm_version']>62) {
                                    $ges_antbed.=' || opstring.indexOf(\''.$val_bed1.'\')!==-1';
                                } else {
                                    $ges_antbed.='|| this.value==\''.$val_bed1.'\'';
                                }
                                if ($wert!='') {
                                    if ($wert==$val_bed1) {
                                        $bed_erfuellt=true;
                                    }
                                }
                            }
                        }
                    }
                    $temp1.=' if ('.$ges_antbed.') { ch_vis(\'frageblock_'.$key.'\', true); } else { ch_vis(\'frageblock_'.$key.'\', false); } ';
                }
                if ($bed_erfuellt) {
                    $js_bed_start.='ch_vis(\'frageblock_'.$key.'\', true); ';
                }
            }
            if ($temp1!='') {
                if (($ftyp==20) and is_array($wertfeld) and count($wertfeld)>0 and class_exists('Modern_Helper_Html')) {
                    $other=Modern_Helper_Html::expandOnChange($other,'trigger_ch_vis(this); '.$temp1.$temp2);
                    $other=Modern_Helper_Html::expandClass($other,'vis_event');
                }elseif (($ftyp==6 || $ftyp==11 || $ftyp==20 || $ftyp==22) and is_array($wertfeld) and count($wertfeld)>0) {
                    // Select:
                    $other2=' class="vis_event" onChange="trigger_ch_vis(this); '.$temp1.$temp2.' "';
                } elseif ($ftyp==21 && $cfg_modern && $_SESSION['crm_version']>60) {
                    $other2=' class="vis_event starinput" onChange="trigger_ch_vis(this); '.$temp1.$temp2.' "';
                } elseif ($ftyp==7 or $ftyp==12) {
                    // Checkbox:
                    $other2=' class="vis_event" onClick="trigger_ch_vis(this); '.$temp1.$temp2.' "';
                } elseif ($ftyp==4 || $ftyp==5) { //datepicker
                    $other2=' class="vis_event" onkeyup="trigger_ch_vis(this); '.$temp1.$temp2.' "';
                } else {
                    $other2=' class="vis_event" onKeyup="trigger_ch_vis(this); '.$temp1.$temp2.' "';
                }
            }
        }
        if ($other2!='' && (($ftyp!=20 && class_exists('Modern_Helper_Html')) || !class_exists('Modern_Helper_Html'))) {
            $other.=$other2;
        } elseif ($temp2!='') {
            if ($ftyp==20 and is_array($wertfeld) and count($wertfeld)>0 and class_exists('Modern_Helper_Html')) {
                $other=Modern_Helper_Html::expandOnChange($other,'trigger_ch_vis(this);'.$temp2);
                $other=Modern_Helper_Html::expandClass($other,'vis_event');
            } elseif (($ftyp==6 || $ftyp==11|| $ftyp==20 || $ftyp==22) and is_array($wertfeld) and count($wertfeld)>0) {
                // Select:
                $other2=' class="vis_event" onChange="trigger_ch_vis(this); '.$temp2.' "';
            } elseif ($ftyp==21 && $cfg_modern && $_SESSION['crm_version']>60) {
                $other2=' class="vis_event starinput" onChange="trigger_ch_vis(this); '.$temp2.' "';
            } elseif ($ftyp==7 or $ftyp==12) {
                // Checkbox:
                $other2=' class="vis_event" onClick="trigger_ch_vis(this); '.$temp2.' "';
            } elseif ($ftyp==4 || $ftyp==5) { //datepicker
                $other2=' class="vis_event" onkeyup="trigger_ch_vis(this); '.$temp2.' "';
            } else {
                $other2=' class="vis_event" onKeyup="trigger_ch_vis(this); '.$temp2.' "';
            }
            if (($ftyp!=20 && class_exists('Modern_Helper_Html')) || !class_exists('Modern_Helper_Html')) {
                $other.=$other2;
            }
        }

        if ($ftyp==1) {
            // todo
            if (isset($_SESSION['design_70']))
            {
                $ant_v[] = new Template_Text('Template_ZahlInput (todo)'); // todo
            }
            else {
                $ant_v=$form->zahlinput($feldname, $wert, ($ftypg>0?$ftypg:20), $other);
            }
        } elseif ($ftyp==2) {
            // todo
            if (isset($_SESSION['design_70']))
            {
                $ant_v[] = new Template_TextInput($feldname, $feldname, $wert, ($ftypg>0?$ftypg:20), $other);
            }
            else {
                $ant_v=$form->textinput($feldname, $wert, ($ftypg>0?$ftypg:20), $other);
            }
        } elseif ($ftyp==3) {
            if (p4n_mb_string('strpos', $ftypg, 'x')!==false) {
                $ftypg2=explode('x', $ftypg);
                $ftypg1=trim($ftypg2[0]);
                $ftypg2=trim($ftypg2[1]);
            } else {
                $ftypg1='50';
                $ftypg2='2';
            }
            // todo
            if (isset($_SESSION['design_70']))
            {
                $ant_v[] = new Template_TextArea($feldname, $feldname, $wert, $ftypg1, $ftypg2, $other);
            }
            else {
                $ant_v=$form->textareainput($feldname, $wert, $ftypg1, $ftypg2, $other);
            }
        } elseif ($ftyp==4) {
            if ($wert!='') {
                $wert2=$db->unixdate_ts($wert);
                if ($wert==0) {
                    $wert2='';
                }
                $wert=adodb_date('d.m.Y', $wert2);
            }
            if (intval($ftypg)==99 and $wert=='') {
                $wert=adodb_date('d.m.Y', time());
            }
            // todo
            if (isset($_SESSION['design_70']))
            {
                $ant_v[] = new Template_DatumInput($feldname, $feldname, $other);
            }
            else {
                $ant_v=$form->datuminput($feldname, $wert, $other);
            }
        } elseif ($ftyp==5) {
            $wertz1='';
            $wertz2='';
            if ($wert!='') {
                $wert2=$db->unixdate_ts($wert);
                if ($wert2==0) {
                    $wert='';
                    $wertz1='';
                    $wertz2='';
                } else {
                    $wert=adodb_date('d.m.Y', $wert2);
                    $wertz1=adodb_date('H', $wert2);
                    $wertz2=adodb_date('i', $wert2);
                }
            }
            if (intval($ftypg)==99 and $wert=='' and $wertz1=='' and $wertz2=='') {
                $wert=adodb_date('d.m.Y', time());
                $wertz1=adodb_date('H', time());
                $wertz2=adodb_date('i', time());
            }

            if (p4n_mb_string('strpos', $feldname, '[')!==false) {
                $feldname2=p4n_mb_string('str_replace', '[', 'z[', $feldname);
            } else {
                $feldname2=$feldname.'z';
            }

            // todo
            if (isset($_SESSION['design_70']))
            {
                $ant_v[] = new Template_DatumInput($feldname, $feldname, $other);
                $ant_v[] = new Template_Text('Template_ZeitInput (todo)'); // todo
            }
            else {
                $ant_v=$form->datuminput($feldname, $wert, $other).$form->zeitinput($feldname2, $wertz1, $wertz2);
            }
        } elseif ($ftyp==6) {
            if ($ftyp2=='1' and is_array($wertfeld) and count($wertfeld)>0) {
                $tempwert=explode(';', $wert);
                $tempwert2=array();
                while (list($keyw, $valw)=@each($tempwert)) {
                    $tempwert2[$valw]=$valw;
                }
                $cbw='';
                @reset($wertfeld);
                while (list($keyw, $valw)=@each($wertfeld)) {
                    // todo
                    if (isset($_SESSION['design_70']))
                    {
                        $ant_v[] = new Template_CheckInput($feldname,$feldname.'['.$keyw.']',isset($tempwert2[$keyw])?true:false);
                    }
                    else{
                        $cbw.=$form->checkinput($feldname.'['.$keyw.']', (isset($tempwert2[$keyw])?true:false)).' '.$keyw.'<br>';	//$wert==$keyw?
                    }
                }
                if (isset($_SESSION['design_70']) === false)
                {
                    $ant_v=substr($cbw, 0, -4);
                }
            } elseif ($ftyp2=='2' and is_array($wertfeld) and count($wertfeld)>0) {
                /*  todo:
                    Kommentar von Flo K
                    $ant_v wird bei altem Design nach der while Schleife überschrieben.
                    damit ist die while Schleife überflüssig
                */
                if (isset($_SESSION['design_70']) === false)
                {
                    $cbw='';
                    @reset($wertfeld);
                    while (list($keyw, $valw)=@each($wertfeld)) {
                        $cbw.=$form->radioinput($feldname, ($wert==$keyw?true:false)).' '.$keyw.'<br>';
                    }
                    $ant_v=substr($cbw, 0, -4);
                }

                // todo
                if (isset($_SESSION['design_70']))
                {
                    $ant_v[] = new Template_RadioInput($feldname,$feldname.'['.$keyw.']',$wert);
                }
                else {
                    $ant_v=$form->radioinput($feldname, $wertfeld, $wert, '', '<br>'); // todo: hier wird die Schleife überschrieben (ist das sinnvoll?)
                }

            } elseif (is_array($wertfeld) and count($wertfeld)>0) {
                if (!$sb_k_aend and $wert!='') {
                    if (!isset($wertfeld[$wert])) {
                        $wertfeld[$wert]=$wert;
                    }
                }
                // todo
                if (isset($_SESSION['design_70']))
                {
                    $ant_v[] = new Template_SelectInput($feldname,$feldname,$wertfeld,$wert,_KEINE_AUSWAHL_,$other);
                }
                else {
                    $ant_v=$form->selectinput($feldname, $wertfeld, $wert, _KEINE_AUSWAHL_, $other);
                }

            } else {
                // todo
                if (isset($_SESSION['design_70']))
                {
                    $ant_v[] = new Template_TextInput($feldname,$feldname,$wert,($ftypg>0?$ftypg:20),$other);
                }
                else {
                    $ant_v=$form->textinput($feldname, $wert, ($ftypg>0?$ftypg:20), $other);
                }

            }
        } elseif ($ftyp==7 or $ftyp==12) {

            $name1=$feldname;
            $name2='';
            if (preg_match('/([^\[]*)(\[[^\]]*\])/', $name1, $match)) {
                $name2=$match[1].'___cb'.$match[2];
            } else {
                $name2=$feldname.'___cb';
            }

            // todo
            if (isset($_SESSION['design_70']))
            {
                $ant_v[] = new Template_CheckInput($name2,$name2,$wert,$other);
                $ant_v[] = new Template_HiddenInput($feldname,'1');
            }
            else {
                $ant_v=$form->checkinput($name2, $wert, $other).$form->hidden($feldname, '1');
            }

        } elseif ($ftyp==9) {
            // todo
            if (isset($_SESSION['design_70']) === false)
            {
                $ant_v='';
            }

        } elseif ($ftyp==10) {
            // todo
            if (isset($_SESSION['design_70']) === false)
            {
                $ant_v='';
            }

            if ($wert!='') {
                $name2='';
                if (preg_match('/([^\[]*)(\[[^\]]*\])/', $feldname, $match)) {
                    $name2=$match[1].'___ddel'.$match[2];
                } else {
                    $name2=$feldname.'___ddel';
                }
                // todo
                if (isset($_SESSION['design_70']))
                {
                    $ant_v[] = new Template_Link(_DATEI_,'dokumente_korrespondenz/'.$wert,'','','target="_blank"');
                    $ant_v[] = new Template_CheckInput($name2, $name2,false);
                }
                else {
                    $ant_v.=link2(_DATEI_, 'dokumente_korrespondenz/'.$wert, '', '', 'target="_blank"').' | '.$form->checkinput($name2, false).' '._LOESCHEN_.'<br>';
                }

            }
            if (isset($_SESSION['design_70']))
            {
                $ant_v = new Template_FileInput($feldname, '', ($ftypg>0?$ftypg:15));
            }
            else {
                $ant_v.=$form->dateiinput($feldname, '', ($ftypg>0?$ftypg:15));
            }

        } elseif ($ftyp==11) {
            if (is_array($wertfeld) and count($wertfeld)>0) {
                /*if (!$sb_k_aend and $wert!='') {
                    if (!in_array($wert, $wertfeld)) {
                        $wertfeld[$wert]=$wert;
                    }
                }*/
                $wert = explode(';', $wert);
                if (!$sb_k_aend and !empty($wert) && is_array($wertfeld)) {
                    foreach ($wert as $gesp_wert) {
                        if (!isset($wertfeld[$gesp_wert])) {
                            $wertfeld[$gesp_wert] = $gesp_wert;
                        }
                    }
                }
                // todo
                if (isset($_SESSION['design_70']))
                {
                    $ant_v[] = new Template_SelectInput($feldname, $feldname, $wertfeld, $wert,false, $other,true);
                }
                else {
                    $ant_v=$form->selectinput($feldname, $wertfeld, $wert, false, $other, true);
                }

            } else {
                // todo
                if (isset($_SESSION['design_70']))
                {
                    $ant_v[] = new Template_TextInput($feldname, $feldname, $wert,  ($ftypg>0?$ftypg:20), $other);
                }
                else {
                    $ant_v=$form->textinput($feldname, $wert, ($ftypg>0?$ftypg:20), $other);
                }

            }
        } elseif ($ftyp==13) {

            $std_lao=0;
            $res3=$db->select(
                $sql_tab['benutzer'],
                $sql_tabs['benutzer']['standard_lagerort'],
                $sql_tabs['benutzer']['benutzer_id'].'='.$db->dbzahl($_SESSION['user_id'])
            );
            if ($row3=$db->zeile($res3)) {
                $std_lao=intval($row3[0]);
            }

            $def_lao='-1';
            $res3=$db->select(
                $sql_tab['mandant'],
                array(
                    $sql_tabs['mandant']['mandant_id'],
                    $sql_tabs['mandant']['bezeichnung'],
                    $sql_tabs['mandant']['firma'],
                    $sql_tabs['mandant']['parent_id']
                ),
                $sql_tabs['mandant']['parent_id'].'>0',
                $sql_tabs['mandant']['bezeichnung']
            );
            while ($row3=$db->zeile($res3)) {
                $lao_text=$row3[1];
                $lao_text2=$row3[1];
                if (intval($row3[3])>0) {
                    $res4=$db->select(
                        $sql_tab['mandant'],
                        $sql_tabs['mandant']['bezeichnung'],
                        $sql_tabs['mandant']['mandant_id'].'='.$db->dbzahl($row3[3])
                    );
                    if ($row4=$db->zeile($res4)) {
                        if ($cfg_kfzsuche_lao_ohneabk) {
                            $lao_text=$row4[0].'/'.$lao_text;
                        } else {
                            $lao_text=abkuerzung($row4[0], 6).'/'.$lao_text;
                        }
                        $lao_text2=$row4[0].' / '.$row3[1];
                    }
                }
                if ($cfg_kfzsuche_lao_nurrecht) {
                    if (count($lao_r)>0 and !isset($lao_r[$row3[0]])) {
                        continue;
                    }
                }
                $laos[$row3[0]]=$lao_text;
                if ($std_lao==$row3[0]) {
                    $def_lao=$row3[0];
                }
            }
            if ($wert=='' and $def_lao!='-1') {
                $wert=$def_lao;
            }
            @asort($laos);
            // todo
            if (isset($_SESSION['design_70']))
            {
                $ant_v[] = new Template_SelectInput($feldname, $feldname, $laos, $wert);
            }
            else {
                $ant_v=$form->selectinput($feldname, $laos, $wert);
            }

        } elseif ($ftyp==14) {
            $bens=array();
            $def_ben='-1';
            $res3=$db->select(
                $sql_tab['benutzer'],
                array(
                    $sql_tabs['benutzer']['benutzer_id'],
                    $sql_tabs['benutzer']['vorname'],
                    $sql_tabs['benutzer']['name']
                ),
                $sql_tabs['benutzer']['gruppe'].'>=0',
                $sql_tabs['benutzer']['name']
            );
            while ($row3=$db->zeile($res3)) {
                $bens[$row3[0]]=trim($row3[1].' '.$row3[2]);
            }
            @asort($bens);
            // todo
            if (isset($_SESSION['design_70']))
            {
                $ant_v[] = new Template_SelectInput($feldname, $feldname, $bens, $wert,_KEINE_AUSWAHL_);
            }
            else {
                $ant_v=$form->selectinput($feldname, $bens, $wert, _KEINE_AUSWAHL_);
            }

        } elseif ($ftyp==20) {
            $multi1=true;
            $multianz=count($wertfeld);
            if ($multianz>10) {
                $multianz=10;
            }
            $feldanz_feld=array();
            $xpl=explode(';', $wert);
            while (list($skey, $sval)=@each($xpl)) {
                if ($sval!='') {
                    $feldanz_feld[]=$sval;
                }
            }
            $wert=$feldanz_feld;
            // todo
            if (isset($_SESSION['design_70']))
            {
                $ant_v[] = new Template_SelectInput($feldname, $feldname, $wertfeld, $wert,false, $other, $multi1, $multianz);
            }
            else {
                $ant_v=$form->selectinput($feldname, $wertfeld, $wert, false, $other, $multi1, $multianz)._SELECTBOX_MEHRERE_;
            }

        } elseif ($ftyp==21) {
            $t='';
            $bew=intval($wert);
            $bezeichnungen=array('' => _KEINE_AUSWAHL_, 1 => _SCHLECHT_, 2 => 2, 3 => 3, 4 => 4, 5 => '5 '._AUSGEZEICHNET_);
            for ($i=1; $i<=5; $i++) {
                if ($i<=$bew) {
                    $t.=($cfg_modern && $_SESSION['crm_version']>60)?'<span title="'.$bezeichnungen[$i].'" class="star_nr_'.$i.' star star_full"></span>':'<img src="bilder/bewertung_top.gif">';
                } else {
                    $t.=($cfg_modern && $_SESSION['crm_version']>60)?'<span title="'.$bezeichnungen[$i].'" class="star_nr_'.$i.' star"></span>':'<img src="bilder/bewertung_down.gif">';
                }
            }
            // todo
            if (isset($_SESSION['design_70']))
            {
                $ant_v[] = new Template_Text('stars + select (todo)'); // todo
            }
            else {
                $ant_v=($cfg_modern && $_SESSION['crm_version']>60)?'<span class="stars">'.$t.$form->hidden($feldname,'',$other).'</span>':$t.' '.$form->selectinput($feldname, $bezeichnungen, $wert, false, $other);
            }

        } elseif ($ftyp==22) {
            if (p4n_mb_string('strpos', $ftypg, 'x')!==false) {
                $ftypg2=explode('x', $ftypg);
                $ftypg1=trim($ftypg2[0]);
                $ftypg2=trim($ftypg2[1]);
            } else {
                $ftypg1='50';
                $ftypg2='2';
            }
            $xpl=explode(';', $wert);
            if (is_array($wertfeld) and count($wertfeld)>0) {
                if (!$sb_k_aend and $xpl[0]!='') {
                    if (!isset($wertfeld[$xpl[0]])) {
                        $wertfeld[$xpl[0]]=$xpl[0];
                    }
                }

                $erweiterung='if (this.value==\''._SONSTIGES_.'\') {document.getElementById(\'ffreit'.$fr_id.'\').style.display=\'block\';} else { document.getElementById(\'ffreit'.$fr_id.'\').style.display=\'none\'; }';
                if ($other!=='') {
                    preg_match_all("/onChange[\s]*=[\s]*[\"]([^\"]*)[\"]/Uis", $other, $ausgabe, PREG_PATTERN_ORDER);
                    if (!empty($ausgabe[1][0])) {
                        $returnwert = ' onChange="' . $ausgabe[1][0] . ' ' . $erweiterung . '" ';
                        $other = p4n_mb_string('str_replace', $ausgabe[0][0], $returnwert, $other);
                    } else {
                        $other.=' onChange="' . $erweiterung . '" ';
                    }
                } else {
                    $other=' onChange="' . $erweiterung . '" ';
                }
                // todo
                if (isset($_SESSION['design_70']))
                {
                    $ant_v[] = new Template_SelectInput($feldname, $feldname, $wertfeld, $xpl[0],_KEINE_AUSWAHL_, $other);
                }
                else {
                    $ant_v=$form->selectinput($feldname, $wertfeld, $xpl[0], _KEINE_AUSWAHL_, $other);
                }
            } else {
                // todo
                if (isset($_SESSION['design_70']))
                {
                    $ant_v[] = new Template_TextInput($feldname, $feldname, $xpl[0], ($ftypg1>0?$ftypg1:20), $other);
                }
                else {
                    $ant_v=$form->textinput($feldname, $xpl[0], ($ftypg1>0?$ftypg1:20), $other);
                }

            }

            // todo
            if (isset($_SESSION['design_70']))
            {
                $ant_v[] = new Template_Text('textarea in div (todo)'); // todo
            }
            else {
                $ant_v.='<div id="ffreit'.$fr_id.'" style="display: '.($xpl[0]==_SONSTIGES_?'block':'none').';">'.$form->textareainput(str_replace(array('frage','antwort'), array('fragezus','antwortzus'), $feldname), $xpl[1], ($ftypg1>0?$ftypg1:20), $ftypg2, $other).'</div>';
            }

        } elseif ($ftyp==23) {
            if (p4n_mb_string('strpos', $ftypg, 'x')!==false) {
                $ftypg2=explode('x', $ftypg);
                $ftypg1=trim($ftypg2[0]);
                $ftypg2=trim($ftypg2[1]);
            } else {
                $ftypg1='50';
                $ftypg2='2';
            }

            $exmandr=array();
            global $cfg_cc_mandant_nurrecht;
            if ($cfg_cc_mandant_nurrecht) {
                if ($_SESSION['benutzer_mandant']!='' and $_SESSION['benutzer_mandant']!='-2') {
                    $exmandr=explode(',', $_SESSION['benutzer_mandant']);
                }
            }

            $wertfeld=array();
            $m_temp=array();
            $l_temp=array();
            $res=$db->select(
                $sql_tab['mandant'],
                array(
                    $sql_tabs['mandant']['mandant_id'],
                    $sql_tabs['mandant']['parent_id'],
                    $sql_tabs['mandant']['bezeichnung'],
                    $sql_tabs['mandant']['firma']
                )
            );
            while ($row=$db->zeile($res)) {
                if ($cfg_cc_mandant_nurrecht and count($exmandr)>0) {
                    if (!in_array($row[0], $exmandr)) {
                        continue;
                    }
                }
                $bez=$row[2];
                if ($row[3]!='') {
                    $bez=$row[3];
                }
                if (intval($row[1])==0) {
                    $m_temp[$row[0]]=$bez;
                } else {
                    $l_temp[$row[1]][$row[0]]=$bez;
                }
            }
            @ksort($m_temp);
            while (list($key, $val)=@each($m_temp)) {
                $wertfeld[$key]=$val;
                if (isset($l_temp[$key])) {
                    @asort($l_temp[$key]);
                    while (list($key2, $val2)=@each($l_temp[$key])) {
                        $wertfeld[$key2]=' - '.$val2;
                    }
                }
            }

            // todo
            if (isset($_SESSION['design_70']))
            {
                $ant_v[] = new Template_SelectInput($feldname, $wertfeld,'', $wert,_KEINE_AUSWAHL_, $other);
            }
            else {
                $ant_v=$form->selectinput($feldname, $wertfeld, $wert, _KEINE_AUSWAHL_, $other);
            }

        } elseif ($ftyp==24) {
            $whereben=$sql_tabs['benutzer']['gruppe'].'>=0';
            if (intval($ftypg)>0) {
                $alle_bens='';
                $res=$db->select(
                    $sql_tab['benutzer_gruppe_zuordnung'],
                    $sql_tabs['benutzer_gruppe_zuordnung']['benutzer_id'],
                    $sql_tabs['benutzer_gruppe_zuordnung']['gruppe_id'].'='.$db->dbzahl(intval($ftypg))
                );
                while ($row=$db->zeile($res)) {
                    $alle_bens.=$row[0].',';
                }
                if ($alle_bens!='') {
                    $alle_bens=substr($alle_bens, 0, -1);
                    $whereben.=' and '.$sql_tabs['benutzer']['benutzer_id'].' in ('.$alle_bens.')';
                }
            }
            $wertfeld=array();
            $res=$db->select(
                $sql_tab['benutzer'],
                array(
                    $sql_tabs['benutzer']['benutzer_id'],
                    $sql_tabs['benutzer']['name'],
                    $sql_tabs['benutzer']['vorname']
                ),
                $whereben
            );
            while ($row=$db->zeile($res)) {
                $wertfeld[$row[0]]=$row[2].', '.$row[1];
            }
            @asort($wertfeld);
            // todo
            if (isset($_SESSION['design_70']))
            {
                $ant_v[] = new Template_SelectInput($feldname, $wertfeld,'', $wert,_KEINE_AUSWAHL_, $other);
            }
            else {
                $ant_v=$form->selectinput($feldname, $wertfeld, $wert, _KEINE_AUSWAHL_, $other);
            }

        } elseif ($ftyp==34) {
            global $stid;
            if ($stid) {
                $result_stammdaten = $db->select(
                    $sql_tab['stammdaten'],
                    $sql_tabs['stammdaten']['bemerkung'],
                    $sql_tabs['stammdaten']['id'].'='.$db->dbzahl($stid)
                );
                if ($row_stammdaten = $db->zeile($result_stammdaten)) {
                    $wert=$row_stammdaten[0];
                }
            }

            // todo
            if (isset($_SESSION['design_70']))
            {
                $ant_v[] = new Template_TextArea('bemerkung','bemerkung', $wert,50, 4, $other);
            }
            else {
                $ant_v=$form->textareainput('bemerkung', $wert, 50, 4, $other);
            }

        } else {
            // todo
            if (isset($_SESSION['design_70']))
            {
                $ant_v[] = new Template_TextInput($feldname, $feldname, $wert,($ftypg>0?$ftypg:20), $other);
            }
            else {
                $ant_v=$form->textinput($feldname, $wert, ($ftypg>0?$ftypg:20), $other);
            }

        }

        $keine_select_suche=false;
    
        return $ant_v;
    }


	function format_tr_wert($ftyp, $wert, $wert2='', $wert3='') {
		global $db;
			if ($ftyp==1) {
				$ant_v=$wert;
			} elseif ($ftyp==2) {
				$ant_v=$wert;
			} elseif ($ftyp==3) {
				$ant_v=$wert;
			} elseif ($ftyp==4) {
				$ant_v=$db->dbdate($wert);
				$ant_v=p4n_mb_string('str_replace', "'", '', $ant_v);
			} elseif ($ftyp==5) {
				$ant_v=$db->dbzeitdatum($wert, $wert2.':'.$wert3);
				$ant_v=p4n_mb_string('str_replace', "'", '', $ant_v);
			} elseif ($ftyp==6 || $ftyp==11) {
				$ant_v=$wert;
			} elseif ($ftyp==22) {
				$ant_v=$wert;
			} else {
				$ant_v=$wert;
			}
		return $ant_v;
	}
	
	function tr_ersetze_vl($vl, $stid, $fid=0, $tid=0, $aid=0, $pid=0, $apid=0) {
		global $lang, $form, $db, $sql_tab, $sql_tabs, $mit_bankp, $cfg_cti, $keinrecht_felder, $hvp, $suche_ajx, $phs, $mit_ksuche, $cfg_hobby_liste, $cfg_neuformular_anreden, $pref_zfs, $cfg_lead_todo, $lang_db_f, $ccdebug;
		
		if ($apid>0) {
			$res3=$db->select(
				$sql_tab['stammdaten_ansprechpartner'],
				array(
					$sql_tabs['stammdaten_ansprechpartner']['vorname'],
					$sql_tabs['stammdaten_ansprechpartner']['bezeichnung'],
					$sql_tabs['stammdaten_ansprechpartner']['email'],
					$sql_tabs['stammdaten_ansprechpartner']['telefon'],
					$sql_tabs['stammdaten_ansprechpartner']['mobil'],
					$sql_tabs['stammdaten_ansprechpartner']['bemerkung'],
					$sql_tabs['stammdaten_ansprechpartner']['anrede']
				),
				$sql_tabs['stammdaten_ansprechpartner']['ansprechpartner_id'].'='.$db->dbzahl($apid)
			);
			$row3=$db->zeile($res3);
			
			$vl=p4n_mb_string('str_replace', '{ap_vorname}', $form->textinput('ap_vorname', $row3[0], 25), $vl);
			$vl=p4n_mb_string('str_replace', '{ap_vorname_na}', $row3[0], $vl);
			$vl=p4n_mb_string('str_replace', '{ap_name}', $form->textinput('ap_name', $row3[1], 25), $vl);
			$vl=p4n_mb_string('str_replace', '{ap_name_na}', $row3[1], $vl);
			$vl=p4n_mb_string('str_replace', '{ap_email}', $form->textinput('ap_email', $row3[2], 25), $vl);
			$vl=p4n_mb_string('str_replace', '{ap_email_na}', $row3[2], $vl);
			$vl=p4n_mb_string('str_replace', '{ap_telefon}', $form->textinput('ap_telefon', $row3[3], 25), $vl);
			$vl=p4n_mb_string('str_replace', '{ap_telefon_na}', $row3[3], $vl);
			$vl=p4n_mb_string('str_replace', '{ap_mobil}', $form->textinput('ap_mobil', $row3[4], 25), $vl);
			$vl=p4n_mb_string('str_replace', '{ap_mobil_na}', $row3[4], $vl);
			$vl=p4n_mb_string('str_replace', '{ap_bemerkung}', $form->textareainput('ap_bemerkung', $row3[5], 25, 3), $vl);
			$vl=p4n_mb_string('str_replace', '{ap_bemerkung_na}', nl2br($row3[5]), $vl);
			$vl=p4n_mb_string('str_replace', '{ap_anrede}', $form->textinput('ap_anrede', $row3[6], 25), $vl);
			$vl=p4n_mb_string('str_replace', '{ap_anrede_na}', $row3[6], $vl);
			
		}
		if ($ccdebug) {
			echo 'ERS nach AP: '.zeitnahme().'<br>';
		}
		$felders=array('ap_name', 'ap_vorname', 'ap_email', 'ap_telefon', 'ap_mobil', 'ap_bemerkung', 'ap_anrede');
		@reset($felders);
		while (list($key, $val)=@each($felders)) {
			$vl=p4n_mb_string('str_replace', '{ap_'.$val.'}', '', $vl);
			$vl=p4n_mb_string('str_replace', '{ap_'.$val.'_na}', '', $vl);
		}
		
		$felders=array('fahrgestell', 'kennzeichen', 'markencode', 'typ_modell', 'datum_ez', 'datum_tuev', 'datum_asu', 'km_stand', 'kennbuchstabe_getriebe', 'kennbuchstabe_motor', 'verkaeufer', 'letzter_besuch', 'datum_uebernahme', 'letzte_insp', 'mandant_id', 'leistung_kw', 'leistung_ps', 'hubraum', 'farbbezeichnung', 'unfallwagen', 'anzahl_vorbesitzer', 'anzahl_tueren', 'fahrzeugmodellnr', 'motorartcode', 'getriebebezeichnung', 'polsterbezeichnung', 'typ');
		if ($_SESSION['cfg_kunde']=='carlo_koltes') {
			$felders[]='bauart';
			$felders[]='anzahl_vorbesitzer';
			$felders[]='hubraum';
			$felders[]='unfalltext';
			$felders[]='farbbezeichnung';
			$felders[]='polsterbezeichnung';
			$felders[]='farbcode_innenausstattung';
			$felders[]='troedler_nr';
			$felders[]='kraftstoff';
			$felders[]='einstandspreis';
			$felders[]='einstandspreis_mw';
			$felders[]='aktuellervkpreis_mw_mwst';
			$felders[]='mwst_aktuellervkpreis';
			$felders[]='aktuellervkpreis_mw';
			$felders[]='differenzbesteuerung';
			$felders[]='schluesselnr';
		}
		if ($pid>0) {
            $kfzsql1=array();
            @reset($felders);
            while (list($key, $val)=@each($felders)) {
                $kfzsql1[]=$sql_tabs['produktzuordnung'][$val];
            }
            $res3=$db->select(
                $sql_tab['produktzuordnung'],
                $kfzsql1,
                $sql_tabs['produktzuordnung']['produktzuordnung_id'].'='.$db->dbzahl($pid)
            );
            $row3=$db->zeile($res3);
            while (list($key, $val)=@each($row3)) {
                if (isset($lang_db_f['produktzuordnung'][$key])) {
                    global $sql_meta;
                    if ((isset($sql_meta) && is_array($sql_meta['produktzuordnung'][$key]) && in_array('D', $sql_meta['produktzuordnung'][$key])) or $key=='datum_ez' or $key=='datum_tuev' or $key=='datum_asu' or $key=='letzter_besuch' or $key=='datum_uebernahme' or $key=='letzte_insp') {
                        $val=$db->unixdate($val);
                    } elseif ((isset($sql_meta) && is_array($sql_meta['produktzuordnung'][$key]) && in_array('T', $sql_meta['produktzuordnung'][$key]))) {
                        $val=$db->dbzeitdatum_ausgabe($val, 'd.m.Y H:i');
                    }
                    $vl=p4n_mb_string('str_replace', '{'.bef_format(_FAHRZEUG_.'_'.$lang_db_f['produktzuordnung'][$key]).'}', $val, $vl);
                }
            }
		}
		if ($ccdebug) {
			echo 'ERS nach KFZ: '.zeitnahme().'<br>';
		}
		@reset($felders);
		while (list($key, $val)=@each($felders)) {
			$vl=p4n_mb_string('str_replace', '{'.bef_format(_FAHRZEUG_.'_'.$lang_db_f['produktzuordnung'][$val]).'}', '', $vl);
		}
		
		$felders=array('nummer', 'rechnung_id', 'art', 'betrag', 'bereich', 'datum', 'auftrag_text');
		if ($aid>0) {
								$kfzsql1=array();
								@reset($felders);
								while (list($key, $val)=@each($felders)) {
									$kfzsql1[]=$sql_tabs['auftrag'][$val];
								}
								$res3=$db->select(
									$sql_tab['auftrag'],
									$kfzsql1,
									$sql_tabs['auftrag']['auftrag_id'].'='.$db->dbzahl($aid)
								);
								$row3=$db->zeile($res3);
								while (list($key, $val)=@each($row3)) {
									if (isset($lang_db_f['auftrag'][$key])) {
										if ($key=='datum') {
											$val=$db->unixdate($val);
										}
										if ($key=='betrag') {
											$val=number_format(doubleval($val), 2, ',', '.');
										}
										if ($key=='auftrag_text') {
											$val=nl2br(trim($val));
										}
										$vl=p4n_mb_string('str_replace', '{'.bef_format(_RECHNUNG_.'_'.$lang_db_f['auftrag'][$key]).'}', $val, $vl);
									}
								}
		}
		if ($ccdebug) {
			echo 'ERS nach Rechnung: '.zeitnahme().'<br>';
		}
		@reset($felders);
		while (list($key, $val)=@each($felders)) {
			$vl=p4n_mb_string('str_replace', '{'.bef_format(_RECHNUNG_.'_'.$lang_db_f['auftrag'][$val]).'}', '', $vl);
		}
		
		$st=array('{vorname}' => _VORNAME_,
			'{name}' => _NAME_,
			'{anrede}' => _ANREDE_,
			'{titel}' => _TITEL_,
			'{firma1}' => _FIRMA1_,
			'{geburtstag}' => _GEBURTSDATUM_,
			'{bemerkung}' => _BEMERKUNG_,
			'{geburtsort}' => $lang['_AP-GEBURTSORT_'],
			'{vertriebspartner}' => $lang['_AUFTRAG-VP_'],
			'{vpnr}' => _VPNR_,
			'{idstatus}' => _STATUS_,
			'{werbesperre}' => _WF_BL1_,
			'{kundegesperrt}' => _WF_BL2_
		);
		$adr=array(
			'{adresse}' => _ADRESSE_,
			'{plz}' => _PLZ_,
			'{ort}' => _ORT_,
			'{land}' => _LAND_
		);
		$kont=array(
			'{telefon}' => 0,
			'{telefon2}' => 1,
			'{telefon3}' => 2,
			'{handy}' => 6,
			'{handy2}' => 7,
			'{handy3}' => 8,
			'{email}' => 9,
			'{email2}' => 10,
			'{email3}' => 11,
			'{fax}' => 3,
			'{fax2}' => 4,
			'{fax3}' => 5,
			'{www}' => 12,
			'{www2}' => 13
		);
		$kont2=array(
			'{telefon}' => 'st_telefon',
			'{telefon2}' => 'st_telefon2',
			'{telefon3}' => 'st_telefon3',
			'{handy}' => 'st_mobilfon',
			'{handy2}' => 'st_mobilfon2',
			'{handy3}' => 'st_mobilfon3',
			'{email}' => 'st_email',
			'{email2}' => 'st_email2',
			'{email3}' => 'st_email3',
			'{fax}' => 'st_fax',
			'{fax2}' => 'st_fax2',
			'{fax3}' => 'st_fax3',
			'{www}' => 'st_www',
			'{www2}' => 'st_www2'
		);
		$bank=array(
			'{bank_blz}' => _BANK_.' '.$lang['_BK-BLZ_'],
			'{bank_institut}' => _BANK_.' '.$lang['_BK-INSTITUT_'],
			'{bank_konto}' => _BANK_.' '.$lang['_BK-KONTONUMMER_'],
			'{bank_inhaber}' => _BANK_.' '.$lang['_BK-INHABER_']
		);
		$kk=array(
			'{kreditkarte_institut}' => _BANKTYP5_.' '.$lang['_BK-INSTITUT_'],
			'{kreditkarte_nummer}' => _BANKTYP5_.' '.$lang['_BK-KONTONUMMER_'],
			'{kreditkarte_gueltigkeit}' => _BANKTYP5_.' '.$lang['_BK-ENDE_'],
			'{kreditkarte_pruefnummer}' => _BANKTYP5_.' '._PRUEFNUMMER_
		);
		$st_u==0;
		while ($st_u==0 and list($key, $val)=@each($st)) {
			if (p4n_mb_string('strpos', $vl, $key)!==false or p4n_mb_string('strpos', $vl, p4n_mb_string('substr', $key, 0, -1).'_na}')!==false or p4n_mb_string('strpos', $vl, p4n_mb_string('substr', $key, 0, -1).'_pf}')!==false) {
				$st_u=1;
				$res=$db->select(
					$sql_tab['stammdaten'],
					array(
						$sql_tabs['stammdaten']['vorname'],
						$sql_tabs['stammdaten']['name'],
						$sql_tabs['stammdaten']['anrede'],
						$sql_tabs['stammdaten']['titel'],
						$sql_tabs['stammdaten']['firma1'],
						$sql_tabs['stammdaten']['geburtstag'],
						$sql_tabs['stammdaten']['bemerkung'],
						$sql_tabs['stammdaten']['hobby'],
						$sql_tabs['stammdaten']['beruf'],
						$sql_tabs['stammdaten']['geburtsort'],
						$sql_tabs['stammdaten']['meinvp'],		// 10
						$sql_tabs['stammdaten']['vpnr'],
						$sql_tabs['stammdaten']['idstatus'],
						$sql_tabs['stammdaten']['blacklist'],
						$sql_tabs['stammdaten']['blacklist_temp']
					),
					$sql_tabs['stammdaten']['id'].'='.$db->dbzahl($stid)
				);
				$row=$db->zeile($res);
				$zuspf='';
				if ($stid==-1000) {
					$row=array('Vorname', 'Name', 'Anrede', 'Titel', 'Firma', 'Geburtstag', 'Bemerkung', 'Hobby', 'Beruf', 'Geburtsort', 'VP', 'VPNR');
					$row_f=array('st_vorname', 'st_name', 'st_anrede', 'st_titel', 'st_firma1', 'st_geburtstag', 'st_bemerkung', 'st_hobby', 'st_beruf', 'st_geburtsort', 'st_meinvp', 'st_vpnr');
					$zuspf='_pf';
					for ($na_i=0; $na_i<count($row); $na_i++) {
						$row_1[$na_i]=_PFLICHT_.': '.$row[$na_i];
					}
					for ($na_i=0; $na_i<count($row); $na_i++) {
						$row_2[$na_i]='<label name="{'.$row_f[$na_i].'}">'.$row[$na_i].'</label>';
					}
					$row_2[0]=$form->textinput('st_vorname_na', $row[0], 25, 'disabled');
					$row_2[1]=$form->textinput('st_name_na', $row[1], 25, 'disabled');
					$row_2[2]=$form->textinput('st_anrede_na', $row[2], 5, 'disabled');
					$row_2[3]=$form->textinput('st_titel_na', $row[3], 7, 'disabled');
					$row_2[4]=$form->textinput('st_firma1_na', $row[4], 25, 'disabled');
					$row_2[5]=$form->datuminput('st_geburtstag', $row[5], 'disabled');
					$row_2[6]=$form->textareainput('st_bemerkung', $row[6], 50, 3, 'disabled');
					$row_2[7]=$form->textinput('st_hobby_na', $row[7], 20, 'disabled');
					$row_2[8]=$form->textinput('st_beruf_na', $row[8], 20, 'disabled');
					$row_2[9]=$form->textinput('st_geburtsort_na', $row[9], 30, 'disabled');
					$row_2[10]=$form->vpinput('st_meinvp_na', kundenbezeichnung($row[10]), $row[10], 20, 'disabled');
					$row_2[11]=$form->zahlinput('st_vpnr_na', $row[11], 10, 'disabled');
					$row_2[12]=$form->textinput('st_idstatus_na', $row[12], 20, 'disabled');
					$row_2[13]=$form->checkinput('st_werbesperre_na', $row[13], 'disabled');
					$row_2[14]=$form->checkinput('st_kundegesperrt_na', $row[14], 'disabled');
				} else {
					$row[5]=$db->unixdate($row[5]);
					$row_1=$row;
					$row_2=$row;
				}
				
				$such_d='';
				if ($mit_ksuche) {
					echo '<script type="text/javascript" src="js/lade_s.js"></script>';
					if (preg_match('/{vorname/i', $vl) and preg_match('/{name/i', $vl)) {
						$such_d=' onKeyup="clearTimeout(timerk); if (this.form.st_vorname.value.length>0 && this.form.st_name.value.length>0 && this.form.st_name.value!=\'Neueintrag\') { suchekname1(this.form.st_vorname.value, this.form.st_name.value); }"';
						
						echo javas('var timerk; function suchekname2(nap_val, nap_val2) { lade_in_message(\'stammdaten_suche_name2.php?vorname=\'+nap_val+\'&name=\'+nap_val2, 750, 400); } function suchekname1(nap_val, nap_val2) { timerk=setTimeout("suchekname2(\'"+nap_val+"\', \'"+nap_val2+"\')", 500); }');
						$mli_block=$li_block;
						$li_block='';
						echo lade_divinhalt('stammdaten_suche_nameundap2.php', 750, 400, 'Suche', true, $ohne_iframe=true);
						$li_block=$mli_block;
						$lade_s_geladen=true;
					}
				}
				
				$vl=p4n_mb_string('str_replace', '{vorname}', $form->textinput('st_vorname', $row[0], 25, $such_d), $vl);
				$vl=p4n_mb_string('str_replace', '{vorname_pf}', $form->textinput('st_vorname'.$zuspf, $row_1[0], 25, $such_d).'*', $vl);
				$vl=p4n_mb_string('str_replace', '{vorname_na}', $row_2[0], $vl);
				$vl=p4n_mb_string('str_replace', '{name}', $form->textinput('st_name', $row[1], 25, $such_d), $vl);
				$vl=p4n_mb_string('str_replace', '{name_pf}', $form->textinput('st_name'.$zuspf, $row_1[1], 25, $such_d).'*', $vl);
				$vl=p4n_mb_string('str_replace', '{name_na}', $row_2[1], $vl);
				
				if (isset($_SESSION['workflow_vorlage_id']) and preg_match('/workflow\.php/i', $phs)) {
					$vl=p4n_mb_string('str_replace', '{anrede}', $form->checkinput('st_anrede_1', ($row[2]=='Herr'?true:false)).' Herr '.$form->checkinput('st_anrede_2', ($row[2]=='Frau'?true:false)).' Frau *', $vl);
					$vl=p4n_mb_string('str_replace', '{anrede_pf}', $form->checkinput('st_anrede_1'.$zuspf, ($row[2]=='Herr'?true:false)).' Herr '.$form->checkinput('st_anrede_2'.$zuspf, ($row[2]=='Frau'?true:false)).' Frau *', $vl);
				} else {
					$anr1=$form->textinput('st_anrede', $row[2], 5);
					$anr2=$form->textinput('st_anrede'.$zuspf, $row_1[2], 5).'*';
					if (isset($cfg_neuformular_anreden)) {
						if (count($cfg_neuformular_anreden)>0) {
							$anrede_feld=$cfg_neuformular_anreden;
							if (!isset($row[2]) and $row[2]!='') {
								$anrede_feld[$row[2]]=$row[2];
							}
							$anrede_feld2=$cfg_neuformular_anreden;
							if (!isset($row_1[2]) and $row_1[2]!='') {
								$anrede_feld2[$row_1[2]]=$row_1[2];
							}
							$anr1=$form->selectinput('st_anrede', $anrede_feld, $row[2]);
							$anr2=$form->selectinput('st_anrede'.$zuspf, $anrede_feld2, $row_1[2]).'*';
						}
					}
					$vl=p4n_mb_string('str_replace', '{anrede}', $anr1, $vl);
					$vl=p4n_mb_string('str_replace', '{anrede_pf}', $anr2, $vl);
				}
				$vl=p4n_mb_string('str_replace', '{anrede_na}', $row_2[2], $vl);
				$vl=p4n_mb_string('str_replace', '{titel}', $form->textinput('st_titel', $row[3], 7), $vl);
				$vl=p4n_mb_string('str_replace', '{titel_pf}', $form->textinput('st_titel'.$zuspf, $row_1[3], 7).'*', $vl);
				$vl=p4n_mb_string('str_replace', '{titel_na}', $row_2[3], $vl);
				
				$such_d='';
				if ($mit_ksuche) {
					if (preg_match('/{firma1/i', $vl)) {
						$such_d=' onKeyup="clearTimeout(timerk); if (this.value.length>0) { suchekfname1(this.form.st_firma1.value); }"';
						
						echo javas('var timerk; function suchekfname2(nap_val) { lade_in_message(\'stammdaten_suche_name2.php?firma=\'+nap_val, 750, 400); } function suchekfname1(nap_val) { timerk=setTimeout("suchekfname2(\'"+nap_val+"\')", 500); }');
						$mli_block=$li_block;
						$li_block='';
						echo lade_divinhalt('stammdaten_suche_nameundap2.php', 750, 400, 'Suche', true, $ohne_iframe=true);
						$li_block=$mli_block;
						$lade_s_geladen=true;
					}
				}
				
				$vl=p4n_mb_string('str_replace', '{firma1}', $form->textinput('st_firma1', $row[4], 25, $such_d), $vl);
				$vl=p4n_mb_string('str_replace', '{firma1_pf}', $form->textinput('st_firma1'.$zuspf, $row_1[4], 25, $such_d).'*', $vl);
				$vl=p4n_mb_string('str_replace', '{firma1_na}', $row_2[4], $vl);
				$vl=p4n_mb_string('str_replace', '{geburtstag}', $form->datuminput('st_geburtstag', $row[5]), $vl);
				$vl=p4n_mb_string('str_replace', '{geburtstag_pf}', $form->datuminput('st_geburtstag'.$zuspf, $row_1[5]).'*', $vl);
				$vl=p4n_mb_string('str_replace', '{geburtstag_na}', $row_2[5], $vl);
				$vl=p4n_mb_string('str_replace', '{bemerkung}', $form->textareainput('st_bemerkung', $row[6], 50, 3), $vl);
				$vl=p4n_mb_string('str_replace', '{bemerkung_pf}', $form->textareainput('st_bemerkung'.$zuspf, $row_1[6], 50, 3).'*', $vl);
				$vl=p4n_mb_string('str_replace', '{bemerkung_na}', $row_2[6], $vl);
				
				$hobbyinput=$form->textinput('st_hobby', $row[7], 20);
				$hobbyinput2=$form->textinput('st_hobby'.$zuspf, $row_1[7], 20);
				if ($cfg_hobby_liste) {
					$hobbies=array('Fussball', 'Handball', 'Schwimmen', 'Leichtathletik', 'Tennis', 'Golf', 'Basketball', 'Volleyball', 'Squash', 'Badminton', 'Joggen', 'Walking', 'Krafttraining', 'Ausdauertraining', 'Radfahren', 'Skifahren', 'Snowboard', 'Langlauf', 'Surfen', 'Segeln', 'Balett', 'Tanzen', 'Turnen', 'Rudern', 'Faustball', 'Baseball', 'Hockey', 'Eishockey');
					$hobbies2=array('' => _KEINE_AUSWAHL_);
					while (list($keyh, $valh)=@each($hobbies)) {
						$hobbies2[$valh]=$valh;
					}
					if ($row[7]!='' and !isset($hobbies2[$row[7]])) {
						$hobbies2[$row[7]]=$row[7];
					}
					if ($row_1[7]!='' and !isset($hobbies2[$row_1[7]])) {
						$hobbies2[$row[7]]=$row_1[7];
					}
					$hobbyinput=$form->selectinput('st_hobby', $hobbies2, $row[7]);
					$hobbyinput2=$form->selectinput('st_hobby'.$zuspf, $hobbies2, $row_1[7]);
				}
				
				$vl=p4n_mb_string('str_replace', '{hobby}', $hobbyinput, $vl);
				$vl=p4n_mb_string('str_replace', '{hobby_pf}', $hobbyinput2.'*', $vl);
				$vl=p4n_mb_string('str_replace', '{hobby_na}', $row_2[7], $vl);
				$vl=p4n_mb_string('str_replace', '{beruf}', $form->textinput('st_beruf', $row[8], 20), $vl);
				$vl=p4n_mb_string('str_replace', '{beruf_pf}', $form->textinput('st_beruf'.$zuspf, $row_1[8], 20).'*', $vl);
				$vl=p4n_mb_string('str_replace', '{beruf_na}', $row_2[8], $vl);
				$vl=p4n_mb_string('str_replace', '{geburtsort}', $form->textinput('st_geburtsort', $row[9], 30), $vl);
				$vl=p4n_mb_string('str_replace', '{geburtsort_pf}', $form->textinput('st_geburtsort'.$zuspf, $row_1[9], 30).'*', $vl);
				$vl=p4n_mb_string('str_replace', '{geburtsort_na}', $row_2[9], $vl);
				
				$vl=p4n_mb_string('str_replace', '{vertriebspartner}', $form->vpinput('st_meinvp', kundenbezeichnung($row[10]), $row[10], 30, '', $hvp), $vl);
				$vl=p4n_mb_string('str_replace', '{vertriebspartner_pf}', $form->vpinput('st_meinvp'.$zuspf, kundenbezeichnung($row_1[10]), $row_1[10], 30, '', $hvp).'*', $vl);
				$vl=p4n_mb_string('str_replace', '{vertriebspartner_na}', $form->vpinput('st_meinvp_na', kundenbezeichnung($row[10]), $row_2[10], 20, 'disabled'), $vl);
				$vl=p4n_mb_string('str_replace', '{vpnr}', $form->zahlinput('st_vpnr', $row[11], 10), $vl);
				$vl=p4n_mb_string('str_replace', '{vpnr_pf}', $form->zahlinput('st_vpnr'.$zuspf, $row_1[11], 10).'*', $vl);
				$vl=p4n_mb_string('str_replace', '{vpnr_na}', $row_2[11], $vl);
				
				$alle_idstatus=array('' => _KEINE_AUSWAHL_);
				if ($ccdebug) {
					echo 'ERS vor idstatus: '.zeitnahme().'<br>';
				}
				if (preg_match('/{idstatus/', $vl)) {
					if (!isset($_SESSION['cc_idstatus'])) {
						$_SESSION['cc_idstatus']=array();
						$res8=$db->select(
							$sql_tab['stammdaten'],
							'distinct '.$sql_tabs['stammdaten']['idstatus']
						);
						$alle_idstatus2=array();
						while ($row8=$db->zeile($res8)) {
							if ($row8[0]!='' and $row8[0]!='-1') {
								$alle_idstatus2[$row8[0]]=$row8[0];
							}
						}
						if ($ccdebug) {
							echo 'ERS nach idstatus: '.zeitnahme().'<br>';
						}
						@ksort($alle_idstatus2);
						while (list($ikey, $ival)=@each($alle_idstatus2)) {
							$alle_idstatus[$ikey]=$ival;
						}
						$_SESSION['cc_idstatus']=$alle_idstatus;
					} else {
						$alle_idstatus=$_SESSION['cc_idstatus'];
					}
					$vl=p4n_mb_string('str_replace', '{idstatus}', $form->selectinput('st_idstatus', $alle_idstatus, $row[12]), $vl);
					$vl=p4n_mb_string('str_replace', '{idstatus_pf}', $form->selectinput('st_idstatus'.$zuspf, $alle_idstatus, $row_1[12]).'*', $vl);
					$vl=p4n_mb_string('str_replace', '{idstatus_na}', $row_2[12], $vl);
				}
				$vl=p4n_mb_string('str_replace', '{werbesperre}', $form->checkinput('st_werbesperre', $row[13]), $vl);
				$vl=p4n_mb_string('str_replace', '{werbesperre_pf}', $form->checkinput('st_werbesperre'.$zuspf, $row_1[13]).'*', $vl);
				$vl=p4n_mb_string('str_replace', '{werbesperre_na}', ($row_2[13]=='1'?_JA_:_NEIN_), $vl);
				$vl=p4n_mb_string('str_replace', '{kundegesperrt}', $form->checkinput('st_kundegesperrt', $row[14]), $vl);
				$vl=p4n_mb_string('str_replace', '{kundegesperrt_pf}', $form->checkinput('st_kundegesperrt'.$zuspf, $row_1[14]).'*', $vl);
				$vl=p4n_mb_string('str_replace', '{kundegesperrt_na}', ($row_2[14]=='1'?_JA_:_NEIN_), $vl);
			}
/*			if (p4n_mb_string('strpos', $vl, p4n_mb_string('substr', $key, 0, -1).'_na}')!==false) {
				$vl=p4n_mb_string('str_replace', p4n_mb_string('substr', $key, 0, -1).'_na}', $row[8]), $vl);
			}
*/		}
		if ($ccdebug) {
			echo 'ERS nach STID: '.zeitnahme().'<br>';
		}
		// PLZ-Prüfung?
		$plz_pruef='';
		if ($stid!=-1000 and (p4n_mb_string('strpos', $vl, '{plz}')!==false or p4n_mb_string('strpos', $vl, '{plz_pf}')!==false) and (p4n_mb_string('strpos', $vl, '{ort}')!==false or p4n_mb_string('strpos', $vl, '{ort_pf}')!==false)) {
				$vl=$vl.javas(($_SESSION['ajx']==1?'':'var timer;
					function sucheaufruf(wort2) {
						window.open(wort2,\'status\');
					}').'
					
					function checkplz(ename, evalue, target, targetland) {
						clearTimeout(timer);
						if (evalue.length>0) {
							wort="stammdaten_suche_plz.php?wort="+evalue+"&target="+escape(target)+"&target2="+escape(targetland);
							timer=setTimeout("sucheaufruf(\'"+wort+"\')", 300);
						}
					}');
			$plz_pruef='onKeyup="checkplz(this.name, this.value, \'parent.main.document.'.$form->fname.'.elements[\\\'st_ort\\\']\', \'parent.main.document.'.$form->fname.'.elements[\\\'st_land\\\']\');"';
		}
		$adr_u==0;
		while ($adr_u==0 and list($key, $val)=@each($adr)) {
			if (p4n_mb_string('strpos', $vl, $key)!==false or p4n_mb_string('strpos', $vl, p4n_mb_string('substr', $key, 0, -1).'_na}')!==false or p4n_mb_string('strpos', $vl, p4n_mb_string('substr', $key, 0, -1).'_pf}')!==false) {
				$adr_u=1;
				$res=$db->select(
					$sql_tab['stammdaten_adresse'],
					array(
						$sql_tabs['stammdaten_adresse']['adresse'],
						$sql_tabs['stammdaten_adresse']['plz'],
						$sql_tabs['stammdaten_adresse']['ort'],
						$sql_tabs['stammdaten_adresse']['land']
					),
					$sql_tabs['stammdaten_adresse']['stammdaten_id'].'='.$db->dbzahl($stid),
					$sql_tabs['stammdaten_adresse']['post'].' desc, '.$sql_tabs['stammdaten_adresse']['art']
				);
				$row=$db->zeile($res);
				$zuspf='';
				if ($stid==-1000) {
					$row=array('Adresse', 'PLZ', 'Ort', 'Land');
					$row_1=array(_PFLICHT_.': '.'Adresse', _PFLICHT_.': '.'PLZ', _PFLICHT_.': '.'Ort', _PFLICHT_.': '.'Land');
					$row_2=array(
						$form->textinput('st_adresse_na', $row[0], 25, 'disabled'),
						$form->textinput('st_plz_na', $row[1], 5, 'disabled'),
						$form->textinput('st_ort_na', $row[2], 20, 'disabled'),
						$form->textinput('st_land_na', $row[3], 25, 'disabled')
					);
					$zuspf='_pf';
				} else {
					$row_1=$row;
					$row_2=$row;
				}
				$vl=p4n_mb_string('str_replace', '{adresse}', $form->textinput('st_adresse', $row[0], 25), $vl);
				$vl=p4n_mb_string('str_replace', '{plz}', $form->textinput('st_plz', $row[1], 5, $plz_pruef), $vl);
				$vl=p4n_mb_string('str_replace', '{ort}', $form->textinput('st_ort', $row[2], 20), $vl);
				if (count($cfg_lead_todo)>0) {
					$alle_laender=array();
					$res7=$db->select(
						$sql_tab['crmcodes'],
						array(
							$sql_tabs['crmcodes']['code1'],
							$sql_tabs['crmcodes']['text1']
						),
						$sql_tabs['crmcodes']['art'].'='.$db->str('SENSUS_LAND'),
						$sql_tabs['crmcodes']['text1']
					);
					while ($row7=$db->zeile($res7)) {
						$alle_laender[$row7[1]]=$row7[1];
					}
					if ($row[3]=='') {
						$row[3]='Germany';
					}
					$vl=p4n_mb_string('str_replace', '{land}', $form->selectinput('st_land', $alle_laender, $row[3]), $vl);
				}
				$vl=p4n_mb_string('str_replace', '{land}', $form->textinput('st_land', $row[3], 25), $vl);
				
				$vl=p4n_mb_string('str_replace', '{adresse_pf}', $form->textinput('st_adresse'.$zuspf, $row_1[0], 25).'*', $vl);
				$vl=p4n_mb_string('str_replace', '{plz_pf}', $form->textinput('st_plz'.$zuspf, $row_1[1], 5, $plz_pruef).'*', $vl);
				$vl=p4n_mb_string('str_replace', '{ort_pf}', $form->textinput('st_ort'.$zuspf, $row_1[2], 20).'*', $vl);
				$vl=p4n_mb_string('str_replace', '{land_pf}', $form->textinput('st_land'.$zuspf, $row_1[3], 25).'*', $vl);
				
				$vl=p4n_mb_string('str_replace', '{adresse_na}', $row_2[0], $vl);
				$vl=p4n_mb_string('str_replace', '{plz_na}', $row_2[1], $vl);
				$vl=p4n_mb_string('str_replace', '{ort_na}', $row_2[2], $vl);
				$vl=p4n_mb_string('str_replace', '{land_na}', $row_2[3], $vl);
			}
		}
		
		$bank_u==0;
		while ($bank_u==0 and list($key, $val)=@each($bank)) {
			if (p4n_mb_string('strpos', $vl, $key)!==false or p4n_mb_string('strpos', $vl, p4n_mb_string('substr', $key, 0, -1).'_na}')!==false or p4n_mb_string('strpos', $vl, p4n_mb_string('substr', $key, 0, -1).'_pf}')!==false) {
				$bank_u=1;
				$res=$db->select(
					$sql_tab['stammdaten_bank'],
					array(
						$sql_tabs['stammdaten_bank']['blz'],
						$sql_tabs['stammdaten_bank']['institut'],
						$sql_tabs['stammdaten_bank']['kontonummer'],
						$sql_tabs['stammdaten_bank']['inhaber']
					),
					$sql_tabs['stammdaten_bank']['stammdaten_id'].'='.$db->dbzahl($stid)
						.' and '.$sql_tabs['stammdaten_bank']['art'].'=0'
				);
				$row=$db->zeile($res);
				$zuspf='';
//$suche_ajx=1;
				if ($stid==-1000) {
					$row=array('BLZ', 'Institut', 'Kontonummer', 'Kontoinhaber');
					$row_1=array(_PFLICHT_.': '.'BLZ', _PFLICHT_.': '.'Institut', _PFLICHT_.': '.'Kontonummer', _PFLICHT_.': '.'Kontoinhaber');
					$row_2=array(
						$form->textinput('st_blz_na', $row[0], 10, 'disabled'),
						$form->textinput('st_institut_na', $row[1], 25, 'disabled'),
						$form->textinput('st_konto_na', $row[2], 15, 'disabled'),
						$form->textinput('st_inhaber_na', $row[3], 25, 'disabled')
					);
					//'<label name="{bank_blz}">'.'BLZ'.'</label>', '<label name="{bank_institut}">'.'Institut'.'</label>', '<label name="{bank_konto}">'.'Kontonummer'.'</label>', '<label name="{bank_inhaber}">'.'Kontoinhaber'.'</label>');
					$zuspf='_pf';
				} else {
					$row_1=$row;
					$row_2=$row;
				}
				if ($stid!=-1000 and p4n_mb_string('strpos', $vl, '{bank_blz')!==false and p4n_mb_string('strpos', $vl, '{bank_institut')!==false) {
					$vl=p4n_mb_string('str_replace', '{bank_blz}', $form->blzinput('st_blz', $row[0], 'st_institut', 10), $vl);
					$vl=p4n_mb_string('str_replace', '{bank_blz_pf}', $form->blzinput('st_blz'.$zuspf, $row_1[0], 'st_institut', 10, '', '2').'*', $vl);
				} else {
					$vl=p4n_mb_string('str_replace', '{bank_blz}', $form->textinput('st_blz', $row[0], 10), $vl);
					$vl=p4n_mb_string('str_replace', '{bank_blz_pf}', $form->textinput('st_blz'.$zuspf, $row_1[0], 10).'*', $vl);
				}
				$vl=p4n_mb_string('str_replace', '{bank_institut}', $form->textinput('st_institut', $row[1], 25), $vl);
				$vl=p4n_mb_string('str_replace', '{bank_institut_pf}', $form->textinput('st_institut'.$zuspf, $row_1[1], 25).'*', $vl);
				
				$bank_pruef='';
				if ($stid!=-1000 and $mit_bankp) {
					$bank_pruef='<a href="javascript:void(0)" onClick="if (document.all) { sfram=parent.frames(\'status\'); } else {sfram=parent.frames[\'status\']; } sfram.location.href=\'bankdaten_pruefen.php?blz=\'+document.forms[\''.$form->fname.'\'].st_blz.value+\'&kto=\'+document.forms[\''.$form->fname.'\'].st_konto.value;"><img style="width:17px;" src="bilder/fragezeichen.gif" border=0></a>';
				}
				$vl=p4n_mb_string('str_replace', '{bank_konto}', $form->textinput('st_konto', $row[2], 15).$bank_pruef, $vl);
				$vl=p4n_mb_string('str_replace', '{bank_konto_pf}', $form->textinput('st_konto'.$zuspf, $row_1[2], 15).$bank_pruef.'*', $vl);
				
				if ($_SESSION['cfg_kunde']=='cc_complan') {
					$bankinh2='';
					$bi_expl=explode('  ', $row[3]);
					$row[3]=trim($bi_expl[0]);
					$bankinh2=trim($bi_expl[1]);
					
					$vl=p4n_mb_string('str_replace', '{bank_inhaber}', $form->textinput('st_inhaber', $row[3], 15).' '.$form->textinput('st_inhaber2', $bankinh2, 15), $vl);
					$vl=p4n_mb_string('str_replace', '{bank_inhaber_pf}', $form->textinput('st_inhaber'.$zuspf, $row[3], 15).' '.$form->textinput('st_inhaber2'.$zuspf, $bankinh2, 15).'*', $vl);
				} else {
					$vl=p4n_mb_string('str_replace', '{bank_inhaber}', $form->textinput('st_inhaber', $row[3], 25), $vl);
					$vl=p4n_mb_string('str_replace', '{bank_inhaber_pf}', $form->textinput('st_inhaber'.$zuspf, $row_1[3], 25).'*', $vl);
				}
				
				$vl=p4n_mb_string('str_replace', '{bank_blz_na}', $row_2[0], $vl);
				$vl=p4n_mb_string('str_replace', '{bank_konto_na}',$row_2[2], $vl);
				$vl=p4n_mb_string('str_replace', '{bank_inhaber_na}', $row_2[3], $vl);
				$vl=p4n_mb_string('str_replace', '{bank_institut_na}', $row_2[1], $vl);
			}
		}
		$kk_u==0;
		while ($kk_u==0 and list($key, $val)=@each($kk)) {
			if (p4n_mb_string('strpos', $vl, $key)!==false or p4n_mb_string('strpos', $vl, p4n_mb_string('substr', $key, 0, -1).'_na}')!==false or p4n_mb_string('strpos', $vl, p4n_mb_string('substr', $key, 0, -1).'_pf}')!==false) {
				$kk_u=1;
				$res=$db->select(
					$sql_tab['stammdaten_bank'],
					array(
						$sql_tabs['stammdaten_bank']['blz'],
						$sql_tabs['stammdaten_bank']['institut'],
						$sql_tabs['stammdaten_bank']['kontonummer'],
						$sql_tabs['stammdaten_bank']['inhaber'],
						$sql_tabs['stammdaten_bank']['ende']
					),
					$sql_tabs['stammdaten_bank']['stammdaten_id'].'='.$db->dbzahl($stid)
						.' and '.$sql_tabs['stammdaten_bank']['art'].'=4'
				);
				$row=$db->zeile($res);
				$zuspf='';
				if ($stid==-1000) {
					$row=array('KK-Prüfnummer', 'KK-Institut', 'KK-Nummer', 'KK-Inhaber', 'KK-Gültigkeit');
					$row_1=array(_PFLICHT_.': '.'KK-Prüfnummer', _PFLICHT_.': '.'KK-Institut', _PFLICHT_.': '.'KK-Nummer', _PFLICHT_.': '.'KK-Inhaber', _PFLICHT_.': '.'KK-Gültigkeit');
					$row_2=array(
						$form->textinput('st_kkblz_na', $row[0], 7, 'disabled'),
						$form->textinput('st_kkinstitut_na', $row[1], 15, 'disabled'),
						$form->textinput('st_kkkonto_na', $row[2], 15, 'disabled'),
						$form->textinput('st_kkinhaber_na', $row[3], 25, 'disabled'),
						$form->datuminput('st_kkende_na', $row[4], 'disabled')
					);
					//$row_2=array('<label name="{kreditkarte_pruefnummer}">'.'KK-Prüfnummer'.'</label>', '<label name="{kreditkarte_institut}">'.'KK-Institut'.'</label>', '<label name="{kreditkarte_nummer}">'.'KK-Nummer'.'</label>', '<label name="{kreditkarte_inhaber}">'.'KK-Inhaber'.'</label>','<label name="{kreditkarte_gueltigkeit_pf}">'.'KK-Gültigkeit'.'</label>');
					$zuspf='_pf';
				} else {
					$row[4]=$db->unixdate($row[4]);
					$row_1=$row;
					$row_2=$row;
				}
				$vl=p4n_mb_string('str_replace', '{kreditkarte_institut}', $form->textinput('st_kkinstitut', $row[1], 15), $vl);
				$vl=p4n_mb_string('str_replace', '{kreditkarte_nummer}', $form->textinput('st_kkkonto', $row[2], 15), $vl);
				$vl=p4n_mb_string('str_replace', '{kreditkarte_gueltigkeit}', $form->datuminput('st_kkende', $row[4]), $vl);
				$vl=p4n_mb_string('str_replace', '{kreditkarte_pruefnummer}', $form->textinput('st_kkblz', $row[0], 7), $vl);
				
				$vl=p4n_mb_string('str_replace', '{kreditkarte_institut_pf}', $form->textinput('st_kkinstitut'.$zuspf, $row_1[1], 15).'*', $vl);
				$vl=p4n_mb_string('str_replace', '{kreditkarte_nummer_pf}', $form->textinput('st_kkkonto'.$zuspf, $row_1[2], 15).'*', $vl);
				$vl=p4n_mb_string('str_replace', '{kreditkarte_gueltigkeit_pf}', $form->datuminput('st_kkende'.$zuspf, $row_1[4]).'*', $vl);
				$vl=p4n_mb_string('str_replace', '{kreditkarte_pruefnummer_pf}', $form->textinput('st_kkblz'.$zuspf, $row_1[0], 7).'*', $vl);
				
				$vl=p4n_mb_string('str_replace', '{kreditkarte_institut_na}', $row_2[1], $vl);
				$vl=p4n_mb_string('str_replace', '{kreditkarte_nummer_na}', $row_2[2], $vl);
				$vl=p4n_mb_string('str_replace', '{kreditkarte_gueltigkeit_na}',$row_2[4], $vl);
				$vl=p4n_mb_string('str_replace', '{kreditkarte_pruefnummer_na}', $row_2[0], $vl);
			}
		}
		if ($ccdebug) {
			echo 'ERS nach Bank: '.zeitnahme().'<br>';
		}
		$kukont=lese_ku_kontakt($stid);
		while (list($key, $val)=@each($kont)) {
			if (p4n_mb_string('strpos', $vl, $key)!==false or p4n_mb_string('strpos', $vl, p4n_mb_string('substr', $key, 0, -1).'_na}')!==false or p4n_mb_string('strpos', $vl, p4n_mb_string('substr', $key, 0, -1).'_pf}')!==false) {
				$kontinh1='';
				if (isset($kukont[$val])) {
					if ($kukont[$val]!='') {
						$kontinh1=$kukont[$val];
					}
				}
				$row=array(0 => $kontinh1);
				$zuspf='';
				if ($stid==-1000) {
					$zuspf='_pf';
				} else {
					$row_1=$row;
				}
				if ($stid!=-1000 and (p4n_mb_string('substr', $key, 0, 5)=='{tele' or p4n_mb_string('substr', $key, 0, 5)=='{hand') and $cfg_cti and $_SESSION['cti']=='1') {
					$vl=p4n_mb_string('str_replace', $key, $form->telefoninput($kont2[$key], $row[0], 25), $vl);
					$vl=p4n_mb_string('str_replace', p4n_mb_string('substr', $key, 0, -1).'_pf}', $form->telefoninput($kont2[$key].$zuspf, $row[0], 25).'*', $vl);
				} else {
					if ($stid==-1000) {
						$row[0]=p4n_mb_string('ucfirst', p4n_mb_string('str_replace', array('{', '}'), '', $key));
						$row_1[0]=_PFLICHT_.': '.p4n_mb_string('ucfirst', p4n_mb_string('str_replace', array('{', '}'), '', $key));
					}
					$vl=p4n_mb_string('str_replace', $key, $form->textinput($kont2[$key], $row[0], 25), $vl);
					$vl=p4n_mb_string('str_replace', p4n_mb_string('substr', $key, 0, -1).'_pf}', $form->textinput($kont2[$key].$zuspf, $row_1[0], 25).'*', $vl);
				}
				if ($stid==-1000) {
					$row[0]=$form->textinput($kont2[$key].'_na', $row[0], 25, 'disabled');
				}
				$vl=p4n_mb_string('str_replace', p4n_mb_string('substr', $key, 0, -1).'_na}', $row[0], $vl);
			}
		}
		
		if ($ccdebug) {
			echo 'ERS nach Kont.: '.zeitnahme().'<br>';
		}
		// Aktionen
		if (preg_match_all('/\{aktion(\d+)(.*)\}/', $vl, $matches)) {
			
			if (preg_match_all("/\{aktion_start\}(.*)\{aktion_end\}/Uis", $vl, $apblock, PREG_SET_ORDER)) {
				$apblock=$apblock[0][1];
			}
			$gesamtapblock='';
			
			$rbrechte=explode(',',$_SESSION['rechte_bgruppen']);
			
				$res=$db->select(
					$sql_tab['aktion'],
					array(
						$sql_tabs['aktion']['aktion_id'],
						$sql_tabs['aktion']['bezeichnung'],
						$sql_tabs['aktion']['beschreibung'],
						$sql_tabs['aktion']['benutzer_gruppe_id'],
						$sql_tabs['aktion']['download1'],
						$sql_tabs['aktion']['download2'],
						$sql_tabs['aktion']['download3'],
						$sql_tabs['aktion']['datum_von'],
						$sql_tabs['aktion']['datum_bis'],
						$sql_tabs['aktion']['formulare'],
						$sql_tabs['aktion']['leitfaden'],
						$sql_tabs['aktion']['wwwlink'],
						$sql_tabs['aktion']['zusatztext']
					),
					'('.$sql_tabs['aktion']['datum_von'].' is null or '.$sql_tabs['aktion']['datum_von'].'<='.$db->str(adodb_date('Y-m-d')).') and '.
					'('.$sql_tabs['aktion']['datum_bis'].' is null or '.$sql_tabs['aktion']['datum_bis'].'>='.$db->str(adodb_date('Y-m-d')).')'
				); //$sql_tabs['aktion']['aktion_id'].'='.$db->dbzahl($val).' and '.
				while ($row=$db->zeile($res)) {
					
					$fs=','.$row[9].',';
					$lfs=','.$row[10].',';
					
					if ($fid>0) {
						if (p4n_mb_string('strpos', $fs, ','.$fid.',')===false) {
							continue;
						}
					}
					if ($tid>0) {
						if (p4n_mb_string('strpos', $lfs, ','.$tid.',')===false) {
							continue;
						}
					}
					
					if (intval($row[3])>0) {
						if (!in_array($row[3], $rbrechte)) {
							$inh=_KEIN_.' '._BRECHTE_;
							continue;
						}
					}
					
					$block=$apblock;
					
					$bez=($row[2]!=''?oltext($row[2], $row[1]):$row[1]);
					
					$block=p4n_mb_string('str_replace', '{aktion1}', $bez, $block);
					$block=p4n_mb_string('str_replace', '{aktion2}', $row[2], $block);
					
					$dateien='';
					for ($i=0; $i<3; $i++) {
						if ($row[$i+4]!='') {
							$dateien.=link2('', 'dokumente/'.$row[$i+4], 'k_serienbrief.gif', '', 'target="_blank"');
						}
					}
					$block=p4n_mb_string('str_replace', '{aktion3}', $dateien, $block);
					
					$block=p4n_mb_string('str_replace', '{aktion4}', $db->unixdate($row[7]), $block);
					$block=p4n_mb_string('str_replace', '{aktion5}', $db->unixdate($row[8]), $block);
					
					if (p4n_mb_string('substr', $row[11], 0, 4)!='http') {
						$row[11]='http://'.$row[11];
					}
					$block=p4n_mb_string('str_replace', '{aktion7}', link2($row[11], $row[11], '', '', 'target="_blank"'), $block);
					$block=p4n_mb_string('str_replace', '{aktion6}', $row[12], $block);
					
					$gesamtapblock.=$block;
				}
				
				$vl=preg_replace('/\{aktion_start\}(.*)\{aktion_end\}/Uis', $gesamtapblock, $vl);
				
				$vl=p4n_mb_string('str_replace', $matches[0][$key], $inh, $vl);
		}
		
		// Todo:
		$todo1='';
		if (!empty($cfg_lead_todo)) {
			$todot=array();
			$uebers=array(
				'Private Customer' => 'Livekonto Private Client',
				'Business Customer' => 'Livekonto Business Client',
				'Demo Formular' => 'Lead',
				'Potential IB' => 'Potential IB',
				'Introducing Broker' => 'Introducing Broker',
				'Trader' => 'Trader'
			);
			if ($_SESSION['user_gruppe']<2) {
				$uebers=array(
					'Demo Formular' => 'Lead',
					'Potential IB' => 'Potential IB'
				);
			}
			@reset($cfg_lead_todo);
			while (list($keyt, $valt)=@each($cfg_lead_todo)) {
				if (isset($uebers[$keyt])) {
					$todot[$valt]=$uebers[$keyt];
				}
			}
			$todo1=$form->selectinput('todo_type', $todot);
		}
		$vl=p4n_mb_string('str_replace', '{todo_type}', $todo1, $vl);
		
		if ($ccdebug) {
			echo 'ERS vor zusatz: '.zeitnahme().'<br>';
		}
		// Zusatzfelder
		$suchm1='/\{zf(\d+)(.*)(_pf)*\}/';
		$ersetz_p='';
		if (isset($pref_zfs)) {
			$ersetz_p=$pref_zfs;
			$suchm1='/\{'.$pref_zfs.'zf(\d+)(.*)(_pf)*\}/';
		}
		if (preg_match_all($suchm1, $vl, $matches)) {
			if ($stid==-99) {
				$res=$db->select(
					$sql_tab['stammdaten_gruppe'],
					$sql_tabs['stammdaten_gruppe']['gruppe_id']
				);
				$gr='';
				while ($row=$db->zeile($res)) {
					$gruppen[$row[0]]=$row[0];
					$gr.=$row[0].',';
				}
				$gr=p4n_mb_string('substr', $gr, 0, -1);
			} elseif (count($matches[1])>0) {
				$res=$db->select(
					$sql_tab['stammdaten_gruppe_zuordnung'],
					$sql_tabs['stammdaten_gruppe_zuordnung']['gruppe_id'],
					$sql_tabs['stammdaten_gruppe_zuordnung']['stammdaten_id']
						.'='.$db->dbzahl($stid)
				);
				$gr='';
				while ($row=$db->zeile($res)) {
					$gruppen[$row[0]]=$row[0];
					$gr.=$row[0].',';
				}
				$gr=p4n_mb_string('substr', $gr, 0, -1);
			}
			while (list($key, $val)=@each($matches[1])) {
				
				$anzeige=false;
				if ($gr!='') {
					$res=$db->select(
						array(
							$sql_tab['stammdaten_zusatz'],
							$sql_tab['stammdaten_gruppe_zusatzfeld'],
						),
						array(
							$sql_tabs['stammdaten_zusatz']['art'],
							$sql_tabs['stammdaten_zusatz']['groesse']
						),
						$db->dbzahlin($gr,$sql_tabs['stammdaten_gruppe_zusatzfeld']['gruppe_id']).' and '.
							$sql_tabs['stammdaten_zusatz']['zusatz_id'].'='.$db->dbzahl($val),
						'',
						'',
						array(
							$sql_tabs['stammdaten_zusatz']['zusatz_id'] =>
								$sql_tabs['stammdaten_gruppe_zusatzfeld']['zusatz_id']
						)
					);
					if ($row=$db->zeile($res)) {
						$anzeige=true;
						$f_art=$row[0];
						$f_groesse=$row[1];
					}
				} elseif ($stid==0) {
					$res=$db->select(
						$sql_tab['stammdaten_zusatz'],
						array(
							$sql_tabs['stammdaten_zusatz']['art'],
							$sql_tabs['stammdaten_zusatz']['groesse']
						),
						$sql_tabs['stammdaten_zusatz']['zusatz_id'].'='.$db->dbzahl($val)
					);
					if ($row=$db->zeile($res)) {
						$anzeige=true;
						$f_art=$row[0];
						$f_groesse=$row[1];
					}
				}
				
				if ($anzeige) {
					$feldanz=lese_zf_feld($stid, $val);
                    $feld_gr=40;
					$feld_gr2=3;
					if (trim($f_groesse)!='') {
						$x=explode('x', $f_groesse);
						if (count($x)==2) {
							$feld_gr=intval($x[0]);
							$feld_gr2=intval($x[1]);
						} else {
							$feld_gr=intval($f_groesse);
						}
					}
					
					if ($matches[2][$key]=='_na') {
						$inh=$feldanz;
					} elseif ($f_art==0) {	// Text
						$inh=$form->textinput($ersetz_p.'zfeld['.$val.']', $feldanz, $feld_gr);
					} elseif ($f_art==4) {	// Textarea
						$inh=$form->textareainput($ersetz_p.'zfeld['.$val.']', $feldanz, $feld_gr, $feld_gr2);
					} elseif ($f_art==1) {	// Datum
						$inh=$form->datuminput($ersetz_p.'zfeld['.$val.']', $feldanz);
					} elseif ($f_art==2) {	// Zahl
						$inh=$form->zahlinput($ersetz_p.'zfeld['.$val.']', $feldanz, $feld_gr);
                    } elseif ($f_art==3 || $f_art==5) {	// Selektion
						$vorg_feld=array('' => _KEINE_AUSWAHL_);
						$res3=$db->select(
							$sql_tab['stammdaten_zusatz_vorgabe'],
							$sql_tabs['stammdaten_zusatz_vorgabe']['bezeichnung'],
							$sql_tabs['stammdaten_zusatz_vorgabe']['zusatz_id'].'='.$db->dbzahl($val),
							$sql_tabs['stammdaten_zusatz_vorgabe']['rang']
						);
						while ($row3=$db->zeile($res3)) {
							$vorg_feld[$row3[0]]=$row3[0];
						}
                        $multi1=false;
						$zussel='';
						$multianz=5;
						if ($f_art==5) {
							//selectinput($name, $inhaltfeld, $default=-99, $bw=false, $other='', $multiple=false, $multiple_rows=5) {
							$multi1=true;
							unset($vorg_feld['']);
							$zco=false;
                            if (!$form->ro) {
                                $zussel=_SELECTBOX_MEHRERE_;
                            }
							$zussel.=$form->hidden($ersetz_p.'zfeld_multi['.$val.']', '1').$form->hidden($ersetz_p.'zfeld_altinh['.$val.']', $feldanz);
							$feldanz_feld=array();
							$xpl=explode(';', $feldanz);
							while (list($skey, $sval)=@each($xpl)) {
								if ($sval!='') {
									$feldanz_feld[]=$sval;
								}
							}
							$feldanz=$feldanz_feld;
							$multianz=count($vorg_feld);
							if ($multianz>10) {
								$multianz=10;
							}
						}
						$inh=$form->selectinput($ersetz_p.'zfeld['.$val.']', $vorg_feld, $feldanz, $zco, '', $multi1, $multianz).$zussel;
                    } elseif ($f_art==6) {	// Datum mit Zeit
                        $feldanz_explode = explode(' ', $feldanz);
                        $feldanz_datum = $feldanz_explode[0];
                        $feldanz_zeit = $feldanz_explode[1];
                        list($feldanz_zeit1, $feldanz_zeit2) = explode(':', $feldanz_zeit);
						$inh=$form->datuminput($ersetz_p.'zfeld['.$val.']', $feldanz_datum);
                        $inh.=' '.$form->zeitinput($ersetz_p.'zfeld_zeit['.$val.']', $feldanz_zeit1, $feldanz_zeit2);
					} 
				} else {
					$inh=_KEIN_.' '._BRECHTE_;
					$keinrecht_felder[$ersetz_p.'zfeld['.$val.']']=1;
				}
				if (preg_match('/_pf}/', $matches[0][$key])) {
					$vl=p4n_mb_string('str_replace', $matches[0][$key], $inh.'*', $vl);
				}
				$vl=p4n_mb_string('str_replace', $matches[0][$key], $inh, $vl);
			}
		}
		
		$vl=p4n_mb_string('str_replace', '{mitarbeiter}', $_SESSION['mitarbeiter_name'], $vl);
		$vl=p4n_mb_string('str_replace', '{mitarbeiter2}', $_SESSION['mitarbeiter_name2'], $vl);
		
		return $vl;
	}
	function tr_schreibe_vorlage($fid, $par_id=0) {
		global $db, $sql_tab, $sql_tabs, $vl_global, $mvl, $par_blocks, $dazu, $max_keys;
		
		$vl='';
		if (!isset($vl_global)) {
			$res=$db->select(
				$sql_tab['telefonleitfaden'],
				$sql_tabs['telefonleitfaden']['vorlage'],
				$sql_tabs['telefonleitfaden']['telefonleitfaden_id'].'='.$db->dbzahl($fid)
			);
			$row=$db->zeile($res);
			$vl_global=$row[0];
			$vl=$row[0];
			$mvl=$vl;
		} else {
			$vl=$vl_global;
		}
		
		$where=$sql_tabs['telefonleitfaden_fragen']['telefonleitfaden_id'].'='.$db->dbzahl($fid);
		
		if ($par_id==0) {
			$where.=' and ('.$sql_tabs['telefonleitfaden_fragen']['parent_id'].'=0 or '.$sql_tabs['telefonleitfaden_fragen']['parent_id'].' is null)';
		} else {
			$where.=' and '.$sql_tabs['telefonleitfaden_fragen']['parent_id'].'='.$db->dbzahl($par_id);
		}
		
		$res=$db->select(
			$sql_tab['telefonleitfaden_fragen'],
			array(
					$sql_tabs['telefonleitfaden_fragen']['frage_id'],//0
					$sql_tabs['telefonleitfaden_fragen']['rang'],//1
					$sql_tabs['telefonleitfaden_fragen']['frage'],//2
					$sql_tabs['telefonleitfaden_fragen']['pflicht'],//3
					$sql_tabs['telefonleitfaden_fragen']['feldtyp'],//4
					$sql_tabs['telefonleitfaden_fragen']['feldtyp_groesse']//5
			),
			$where,
			$sql_tabs['telefonleitfaden_fragen']['rang'].($_SESSION['crm_version']>61?' ASC':'')
		);
		while ($row=$db->zeile($res)) {
			//$fragen[$row[1]]=$row[2];
			
			if (!preg_match('/{frage_'.$row[1].'}/i', $vl)) {
				if ($par_id>0) {
					$par_blocks[$par_id].='<tr ID="frageblock_'.$row[0].'"><th>{frage_'.$row[1].'}</th><td>{antwort_'.$row[1].'}</td></tr>'."\n";
				} else {
					$dazu.='<tr ID="frageblock_'.$row[0].'"><th>{frage_'.$row[1].'}</th><td>{antwort_'.$row[1].'}</td></tr>'."\n";
				}
			}
			
			tr_schreibe_vorlage($fid, $row[0]);
		}
		
		if ($par_id>0) {
			return;
		}
		
/*		$dazu='';
		@reset($fragen);
		while (list($key, $val)=@each($fragen)) {
			if (!preg_match('/{frage_'.$key.'}/i', $vl)) {
//				$dazu.='<tr ID="frageblock_'.$key.'"><th>{frage_'.$key.'}</th></tr>'."\n".'<tr><td>{antwort_'.$key.'}</td></tr>'."\n";
				$dazu.='<tr ID="frageblock_'.$key.'"><th>{frage_'.$key.'}</th><td>{antwort_'.$key.'}</td></tr>'."\n";
			}
		}
*/		
		if (!preg_match('/<table/i', $vl)) {
			$vl.="<table style=\"width:auto;\">\n";
			$vl.=$dazu.'</table>';
		} else {
			$vl=preg_replace('/<\/table>/i', $dazu.'</table>', $vl, 1);
		}
		
		if (isset($par_blocks)) {
			while (list($key, $val)=@each($par_blocks)) {
                
                $fragen=array();
                if (function_exists('getParentTeleFragen')) {
                    $fragen=getParentTeleFragen($key);
                }

                if ($_SESSION['crm_version']>61 && count($fragen)>1) {
                    array_pop($fragen); 
                    $lastr = end($fragen); 
                    if (preg_match('/<tr ID="frageblock_'.$lastr.'".*<\/tr>/Uis', $vl, $mat1)) {
                        
                    } else {
                        $lastr=$key;
                    }
                } else {
                    $lastr=$key;
                }
				if (isset($max_keys[$key]) && !($_SESSION['crm_version']>61)) {
					$key=$max_keys[$key];
				}
				
				if (preg_match('/<tr ID="frageblock_'.$lastr.'".*<\/tr>/Uis', $vl, $mat1)) {
					$vl=p4n_mb_string('str_replace', $mat1[0], $mat1[0]."\n".$val, $vl);
                }
			}
		}
		
		if ($vl!=$mvl) {
			$db->update(
				$sql_tab['telefonleitfaden'],
				array(
					$sql_tabs['telefonleitfaden']['vorlage'] => $db->str($vl),
				),
				$sql_tabs['telefonleitfaden']['telefonleitfaden_id'].'='.$db->dbzahl($fid)
			);
		}
		
		return $vl;
	}
	
	function reset_kunden() {
		global $db, $sql_tabs, $sql_tab, $cfg_filter_cache, $cfg_speed, $prefix;
		
		if ($cfg_filter_cache) {
						
						$ffeld=filter_ergebnis();
						$ku_anz=get_filter_ids($ffeld[0]);
						$lstid=explode(',', $_SESSION['crm_l_id']);
						if (count($lstid)>0 and trim($_SESSION['crm_l_id'])!='') {
							$_SESSION['stammdaten_id']=$lstid[0];
							$_SESSION['anzahl_saetze']=count($lstid);
						} else {
							$_SESSION['anzahl_saetze']=0;
						}
						$_SESSION['anzahl_saetze2']=$ku_anz;
						if ($_SESSION['anzahl_saetze2']==0) {
							$_SESSION['anzahl_saetze2']=$_SESSION['anzahl_saetze'];
						}
		} else {
						$ffeld=filter_ergebnis();
						if (!$cfg_speed) {
							if (preg_match('/select (.*) from/i', $ffeld[0], $m9)) {
								$f22_1='';
								$f22_2=explode(',', $m9[1]);
								while (list($key, $val)=@each($f22_2)) {
									$val=trim($val);
									if (stristr($val, 'as max___')!==false or stristr($val, 'as min___')!==false or stristr($val, 'as cou___')!==false or stristr($val, 'as sum___')!==false or p4n_mb_string('substr',$val,0,4)=='sum(' or p4n_mb_string('substr',$val,0,4)=='min(' or p4n_mb_string('substr',$val,0,4)=='max(' or p4n_mb_string('substr',$val,0,6)=='count(' or p4n_mb_string('substr',$val,0,4)=='avg(') {
                                    	$f22_1.=','.$val;
									}
								}
								$sm_sql_2=p4n_mb_string('str_replace', $m9[1], 'distinct '.$prefix.'stammdaten.stammdaten_id'.$f22_1, $ffeld[0]);
								$result=$db->select2($sm_sql_2);
								$_SESSION['anzahl_saetze2']=$db->anzahl($result);
							} else {
								$_SESSION['anzahl_saetze2']=0;
							}
						} else {
							$_SESSION['anzahl_saetze2']=0;
						}
						$result=$db->select2($ffeld[0]);
						$_SESSION['anzahl_saetze']=$db->anzahl($result);
						if ($_SESSION['anzahl_saetze2']==0) {
							$_SESSION['anzahl_saetze2']=$_SESSION['anzahl_saetze'];
						}
						if ($zeile=$db->zeile($result)) {
							$_SESSION['stammdaten_id']=$zeile[0];
						}
		}
	}
	
	function fr_schreibe_vorlage($fid) {
		global $db, $sql_tab, $sql_tabs;
		
		$vl='';
		
		$res=$db->select(
			$sql_tab['formular'],
			$sql_tabs['formular']['vorlage'],
			$sql_tabs['formular']['formular_id'].'='.$db->dbzahl($fid)
		);
		$row=$db->zeile($res);
		
		$vl=$row[0];
		$mvl=$vl;
		
		$ftypen=array();
		$fragen=array();
		
		$res=$db->select(
			$sql_tab['formular_fragen'],
			array(
					$sql_tabs['formular_fragen']['frage_id'],
					$sql_tabs['formular_fragen']['rang'],
					$sql_tabs['formular_fragen']['frage'],
					$sql_tabs['formular_fragen']['pflicht'],
					$sql_tabs['formular_fragen']['feldtyp'],
					$sql_tabs['formular_fragen']['feldtyp_groesse']
			),
			$sql_tabs['formular_fragen']['formular_id'].'='.$db->dbzahl($fid),
			$sql_tabs['formular_fragen']['rang']
		);
		while ($row=$db->zeile($res)) {
			$fragen[$row[1]]=$row[2];
			$ftypen[$row[1]]=$row[4];
		}
		
		$dazu='';
		@reset($fragen);
		while (list($key, $val)=@each($fragen)) {
			if (!preg_match('/{feldtext_'.$key.'}/i', $vl)) {
				if ($ftypen[$key]=='9') {
					$dazu.='<tr><th>{feldtext_'.$key.'}</th></tr>'."\n";
				} else {
					$dazu.='<tr><th>{feldtext_'.$key.'}</th></tr>'."\n".'<tr><td>{feldeingabe_'.$key.'}</td></tr>'."\n";
				}
			}
		}
		
		if (!preg_match('/<table/i', $vl)) {
			$vl.="<table>\n";
			$vl.=$dazu.'</table>';
		} else {
			$r=p4n_mb_string('strrpos', $vl, '</table>');
			if ($r!==false) {
				$vl=p4n_mb_string('substr', $vl, 0, $r).$dazu.p4n_mb_string('substr', $vl, $r);
			} else {
				$vl=preg_replace('/<\/table>/i', $dazu.'</table>', $vl, 1);
			}
		}
		
		if ($vl!=$mvl) {
			$db->update(
				$sql_tab['formular'],
				array(
					$sql_tabs['formular']['vorlage'] => $db->str($vl),
				),
				$sql_tabs['formular']['formular_id'].'='.$db->dbzahl($fid)
			);
		}
		
		return $vl;
	}
	
	function js_korrespondenz() {
            global $cfg_modern, $js_korrespondenz_geladen;
            $js_korrespondenz_geladen=true;
            ?>
            <script type="text/javascript">
               function k_inhalt2(ziel) {
                    var bv = 500;
                    var hv = "auto";
                    var titel = "";

                    if (k_inhalt.arguments) {
                        if (k_inhalt.arguments.length == 2 || k_inhalt.arguments.length == 4 || k_inhalt.arguments.length == 5) {
                            mithide = true;
                        }
                        if (k_inhalt.arguments.length == 3) {
                            bv = k_inhalt.arguments[1];
                            hv = k_inhalt.arguments[2];

                        }
                        if (k_inhalt.arguments.length == 4) {
                            bv = k_inhalt.arguments[2];
                            hv = k_inhalt.arguments[3];
                        }
                        if (k_inhalt.arguments.length == 5) {
                            bv = k_inhalt.arguments[2];
                            hv = k_inhalt.arguments[3];
                            titel = k_inhalt.arguments[4];
                        }
                    }
                    function nachladen(wert, arr) {
                        if (wert === true) {
                            var scripte_nachladen = document.createElement("script");
                            scripte_nachladen.type = "text/javascript";
                            scripte_nachladen.src = "js/scripte_nachladen.js";
                            document.getElementsByTagName('head')[0].appendChild(scripte_nachladen);
                        }
                        if (typeof(jq1111) == "function") {
                            if (arr) {
                                if (arr.length == 2) {
                                    k_inhalt(arr[0], arr[1]);
                                } else if (arr.length == 3) {
                                    k_inhalt(arr[0], arr[1], arr[2]);
                                } else if (arr.length == 4) {
                                    k_inhalt(arr[0], arr[1], arr[2], arr[3]);
                                } else if (arr.length == 5) {
                                    k_inhalt(arr[0], arr[1], arr[2], arr[3], arr[4]);
                                } else {
                                    k_inhalt(arr[0]);
                                }
                            } else {
                                k_inhalt(arr[0]);
                            }
                        } else {
                            setTimeout(function() {
                                nachladen(false, arr);
                            }, 10);
                        }
                    }
                    if (typeof(jq1111) == "function") {
                        jq1111(function() {
                            (function($) {

                                $("#message2").dialog({
                                    height: "auto",
                                    width: "auto",
                                    modal: true,
                                    autoOpen: false,
                                    title: titel,
                                    draggable: true
                                });
                                $("#message2").load(ziel, function() {
                                    $("#message2").find("#content").parent().attr("style", "");
                                    $("#message2").find("#content").attr("id", "");
                                    $("#message2").find(".header").remove();
                                    $("#message2").find(".boxshadow_top").attr("class", "");
                                    $("#message2").find(".boxshadow_right").attr("class", "");
                                    $("#message2").find(".boxshadow_bottom").attr("class", "");
                                    $("#message2").find(".boxshadow_left").attr("class", "");
                                    $("#message2").find(".edge_lo").attr("class", "");
                                    $("#message2").find(".edge_ro").attr("class", "");
                                    $("#message2").find(".edge_lu").attr("class", "");
                                    $("#message2").find(".edge_ru").attr("class", "");
                                    $("#message2").find(".box").attr("class", "");
                                    $("#message2").dialog('open');
                                });
                            })(j$j111);
                        }, "");
                    } else {
                        nachladen(true, k_inhalt.arguments);
                    }
                }
            </script>
            <?php
		$t='<div id="ko_neu" style="position:absolute; top:100px; left:-2000px; width:350px; height:220px; background-color:#FFFFFF;"></div>';
		$t='';
		$t.=javas('function k_ein() {
			//ele=YAHOO.util.Dom.get("message");
		//	YAHOO.util.Dom.setX("ko_neu", 200);
		}
		function wegfunktion() {
			document.getElementById(\'DivShim\').style.display=\'none\';
			document.getElementById(\'message\').style.left=-2000;
			if (document.getElementById("TB_overlay") === null) {} else {
				$("TB_overlay").remove();
			}
		}
		
		function k_aus() {
            if (typeof cfg_modern != "undefined" && cfg_modern==true) {
               // P4nBoxHelper.close("p4nbox_message");
                return;
            }
			//ele=YAHOO.util.Dom.get("message");//ko_neu
			document.getElementById(\'DivShim\').style.display=\'none\';
			document.getElementById(\'message\').style.left=-2000;
			document.getElementById(\'message\').onclick=wegfunktion;
			
			if (document.getElementById("TB_overlay") === null) {} else {
				$("TB_overlay").remove();
			}
			if (document.getElementById("TB_HideSelect") === null) {} else {
				$("TB_HideSelect").remove();
			}
		}
		function tb_detectMacXFF() {
			var userAgent = navigator.userAgent.toLowerCase();
			if (userAgent.indexOf("mac") != -1 && userAgent.indexOf("firefox")!=-1) {
				return true;
			}
		}
		function hide_aus() {
			if (document.getElementById("TB_overlay") === null) {} else {
				$("TB_overlay").remove();
			}
			if (document.getElementById("TB_HideSelect") === null) {} else {
				$("TB_HideSelect").remove();
			}
		}
		function hide_ein() {
				try {
					if (typeof document.body.style.maxHeight === "undefined") {//if IE 6
						if (document.getElementById("TB_HideSelect") === null) {//iframe to hide select elements in ie6
							elen=new Element("iframe", {
							  	"styles": {
							        "z-index": "1"
							    },
								"id": "TB_HideSelect"
							});
							elen.injectInside("crm_body");
							
							elen=new Element("div", {
							  	"styles": {
							        "z-index": "2"
							    },
								"id": "TB_overlay"
							});
							elen.injectInside("crm_body");
						}
					} else {//all others
						if(document.getElementById("TB_overlay") === null){
							elen=new Element("div", {
							  	"styles": {
							        "z-index": "1"
							    },
								"id": "TB_overlay"
							});
							elen.injectInside("crm_body");
						}
					}
					
					if(tb_detectMacXFF()){
						$$("#TB_overlay").addClass("TB_overlayMacFFBGHack");//use png overlay so hide flash
					}else{
						$$("#TB_overlay").addClass("TB_overlayBG");//use background and opacity
					}
				} catch(e) {
					
				}
		}
                if (typeof k_inhalt != "function") {
		function k_inhalt(ziel) {
			var mithide=false;
			
			bv=500;
			hv=500;
            var modern_autosize2=false;
			if (k_inhalt.arguments.length==2 || k_inhalt.arguments.length==4) {
				mithide=true;
			}
			if (k_inhalt.arguments.length==3) {
				bv=k_inhalt.arguments[1];
				hv=k_inhalt.arguments[2];
			}
			if (k_inhalt.arguments.length==4) {
				bv=k_inhalt.arguments[2];
				hv=k_inhalt.arguments[3];
			}
            if (k_inhalt.arguments.length==5) {
				bv=k_inhalt.arguments[2];
				hv=k_inhalt.arguments[3];
                modern_autosize2=k_inhalt.arguments[4];
			}



			if (mithide) {
                if (typeof cfg_modern !== typeof undefined && cfg_modern==true) {
                    P4nBoxHelper.startloading(true);
                }
				try {
					if (typeof document.body.style.maxHeight === "undefined") {//if IE 6
						if (document.getElementById("TB_HideSelect") === null) {//iframe to hide select elements in ie6
							elen=new Element("iframe", {
							  	"styles": {
							        "z-index": "1"
							    },
'./*								"events": {
						        "click": function(){
						            this.remove();
						            $("TB_overlay").remove();
									document.getElementById(\'DivShim\').style.display=\'none\';
									document.getElementById(\'message\').style.left=-2000;
									document.getElementById(\'message\').onclick=wegfunktion;
						        }},
*/'								"id": "TB_HideSelect"
							});
							elen.injectInside("crm_body");
							
							elen=new Element("div", {
							  	"styles": {
							        "z-index": "2"
							    },
'./*								"events": {
						        "click": function(){
						            this.remove();
									$("TB_HideSelect").remove();
									document.getElementById(\'DivShim\').style.display=\'none\';
									document.getElementById(\'message\').style.left=-2000;
									document.getElementById(\'message\').onclick=wegfunktion;
						        }},
*/'								"id": "TB_overlay"
							});
							elen.injectInside("crm_body");
						}
					} else {//all others
						if(document.getElementById("TB_overlay") === null){
							elen=new Element("div", {
							  	"styles": {
							        "z-index": "1"
							    },
'./*								"events": {
						        "click": function(){
									this.remove();
									document.getElementById(\'DivShim\').style.display=\'none\';
									document.getElementById(\'message\').style.left=-2000;
									document.getElementById(\'message\').onclick=wegfunktion;
						        }},
*/'								"id": "TB_overlay"
							});
							elen.injectInside("crm_body");
						}
					}
					
					if(tb_detectMacXFF()){
						$$("#TB_overlay").addClass("TB_overlayMacFFBGHack");//use png overlay so hide flash
					}else{
						$$("#TB_overlay").addClass("TB_overlayBG");//use background and opacity
					}
				} catch(e) {
				}
			}
			
			document.getElementById(\'message\').onclick=null;
                        if (typeof p4ntoken == "undefined") {p4ntoken="";}
			try {
				xmlhttp = new XMLHttpRequest();
			} catch (error) {
				try {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (error) {
					return false;
				}
			}
            if (p4ntoken != "") {
                        if (ziel.match(/\?/)) {
                                ziel+="&p4ntoken="+p4ntoken;
                        } else {
                                ziel+="?p4ntoken="+p4ntoken;
                        }
            }
            if (!ziel.match(/ajax/)) {
                if (ziel.match(/\?/)) {
                    ziel+="&ajax=1";                            
                } else {
                    ziel+="?ajax=1";    
                }
            }
                        ziel=ziel.replace("&&", "&"); 
            ziel=ziel.replace("?&", "?");
                            
			xmlhttp.open("GET", ziel, false);
                        xmlhttp.setRequestHeader("X-Requested-With", "XMLHttpRequest");
                        
			xmlhttp.onreadystatechange=function() { 
                            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                                if (typeof getNewToken == "function") {
                                    p4ntoken = getNewToken(xmlhttp.getResponseHeader("p4ntoken"));
                                }
                                response=xmlhttp.responseText;
                                ma=response.match(/<script[^>]*>((.|\s)*?)<\/script>/gi);
                                var jsc_g="";
                                if (ma) {
                                        for (ar=0; ar<ma.length; ar++) {
                                                jsc=ma[ar];
                                                jsc=jsc.replace(/<script[^>]*>/i, "");
                                                jsc=jsc.replace(/<\/script>/i, "");
                                                if (jsc!="" && jsc.length>10) {
                                                        jsc_g+="\n"+jsc;
                                                }
                                        }
                                        if (jsc_g!="") {
                                                var text_s = document.createTextNode(jsc_g); 
                                                var js_script = document.createElement("script");
                                                js_script.type = "text/javascript";
                                                if (null == js_script.canHaveChildren) {
                                                        js_script.appendChild(text_s);
                                                } else {
                                                        js_script.text = jsc_g;
                                                }
                                        }
                                }
                                sfenster=document.getElementById("message");
                                ele=sfenster;
                                ele.innerHTML=response;
                                if (typeof cfg_modern != "undefined" && cfg_modern==true) {
                                    var modern_autosize=false;
                                    
                                    if (typeof bv == "string" && bv.indexOf("%")!==-1) {} else {
                                    if (bv=="autosize") {
                                        modern_autosize=true;
                                    } else {
                                        bv=bv+50;
                                    }
                                    }
                                
                                    if (modern_autosize2===true) {
                                        modern_autosize=false;
                                        if (typeof bv == "string" && bv.indexOf("%")!==-1) {} else {
                                            if (bv=="autosize") {
                                          
                                            } else {
                                                bv=bv+50;
                                            }
                                        }
                                    }

                                    P4nBoxHelper.init({
                                         href:"#message",
                                         single:true,
                                         target:"body",
                                         width:bv,
                                         height:hv,
                                         autosize:modern_autosize,
                                         minHeight:hv,
                                         type:"obj",
                                         id:"p4nbox_message",
                                         beforeShow: function() {
                                             sfenster.style.display = "block"; 
                                         },
                                         beforeClose: function() {
                                             sfenster.style.display = "none"; 
                                         }
                                     });
                                } else {
                                    iheight=0;
                                    iwidth=0;
                                    mfr=window;
                                    docRoot="document.body";
                                    if (eval("mfr."+docRoot) && eval("typeof mfr."+docRoot+".clientHeight==\'number\'") && eval("mfr."+docRoot+".clientHeight")) {
                                            iheight = eval("mfr."+docRoot+".clientHeight");
                                            if (!document.all)
                                                    iheight-=10;
                                    } else if (typeof(mfr.innerHeight)==\'number\') {
                                            iheight = mfr.innerHeight;
                                    }
                                    if (eval("mfr."+docRoot) && eval("typeof mfr."+docRoot+".clientWidth==\'number\'") && eval("mfr."+docRoot+".clientWidth")) {
                                            iwidth = eval("mfr."+docRoot+".clientWidth");
                                    } else if (typeof(mfr.innerWidth)==\'number\') {
                                            iwidth = mfr.innerHeight;
                                            if (!document.all)
                                                    iwidth-=50;
                                    }
                                    h=iheight-hv;
                                    b=iwidth-bv;

                                    fdazu=0;
                                    if (typeof window.pageYOffset !== "undefined") {
                                            fdazu=window.pageYOffset;
                                    } else if (typeof document.body.scrollTop !== "undefined") {
                                            fdazu=document.body.scrollTop;
                                    }

                                    fgesa=fdazu+0.5*iheight-0.5*hv;
                                    if (fgesa<10) {
                                            fgesa=10;
                                    }
                                    sfenster.style.top=fgesa;
                                    sfenster.style.left=0.5*iwidth-0.5*bv;
                                    sfenster.style.width=bv;
                                    sfenster.style.height=hv;
                                    sfenster.style.zIndex=10;
                                    sfenster.style.overflow="auto";

                                    var IfrRef = document.getElementById(\'DivShim\');
                                    sfenster.style.display = "block"; 
                                    IfrRef.style.width = sfenster.offsetWidth;
                                    IfrRef.style.height = sfenster.offsetHeight;
                                    IfrRef.style.top = sfenster.style.top;
                                    IfrRef.style.left = sfenster.style.left;
                                    IfrRef.style.zIndex = sfenster.style.zIndex - 1;
                                    IfrRef.style.display = "block";
                                }
                                if (jsc_g!="") {
                                        r=document.getElementsByTagName("head")[0].appendChild(js_script);
                                }
                            }
                        };
			xmlhttp.send();
		}}');
		
		return $t;
	}
	
	function check_lizenz($nc=false) {
			global $db, $sql_tab, $sql_tabs, $kopf_ja, $ist_opos, $cfg_opos_stidaufruf, $cfg_lizenzcheck_stundeninaktiv;
			
			if (!$kopf_ja) {
				kopf();
			}
			
			$nl=false;
			$ht='';
			
			$stundenlimit=2;
			if (isset($cfg_lizenzcheck_stundeninaktiv)) {
				if ($cfg_lizenzcheck_stundeninaktiv>0) {//Somit auch 0.5 moeglich
					$stundenlimit=$cfg_lizenzcheck_stundeninaktiv;
				}
			}
			
			// 
			$cfg_lizenz_max_benutzer=999;
			
			$cfg_lizenz_max_benutzer=0;
			
			$liz_datei='lizenz.php';
			if ($ist_opos) {
				$liz_datei='lizenz_opos.php';
			}
			
			$ohne_opos=false;
			if (!$ist_opos and $cfg_opos_stidaufruf) {
				if (is_file('inc/'.$_SESSION['cfg_kunde'].'/lizenz_opos.php')) {
					$ohne_opos=true;
				}
			}
			
			if (!is_file('inc/'.$_SESSION['cfg_kunde'].'/'.$liz_datei)) {
				$ht.=_LIZENZ_DATEIFEHLER_;
				
				$nl=true;
			
			} else {
				require('inc/'.$_SESSION['cfg_kunde'].'/'.$liz_datei);
				if ($cfg_lizenz_kunde!=md5('p4'.$_SESSION['cfg_kunde'].'net')) {
					$ht.=_LIZENZ_NICHT_GUELTIG_.'<br>';
					
					$nl=true;
				}
				if ($ist_opos and !$cfg_lizenz_istopos) {
					$ht.=_LIZENZ_NICHT_GUELTIG_.'<br>';
					$nl=true;
				}
                $admin_zusatz_where = $sql_tabs['useronline']['benutzer_id'].'!='.$db->dbzahl(1).' and ';//wir nehmen den Admin aus der Lizenzbelegung raus.
				$where_op='';
				if ($ist_opos || $ohne_opos) {
					$res2=$db->select(
						$sql_tab['benutzer_gruppe'],
						$sql_tabs['benutzer_gruppe']['benutzer_gruppe_id'],
						$sql_tabs['benutzer_gruppe']['bezeichnung'].'='.$db->str('OPOS')
					);
					if ($row2=$db->zeile($res2)) {
						$res8=$db->select(
							$sql_tab['benutzer_gruppe_zuordnung'],
							$sql_tabs['benutzer_gruppe_zuordnung']['benutzer_id'],
							$sql_tabs['benutzer_gruppe_zuordnung']['gruppe_id'].'='.$db->dbzahl($row2[0])
						);
						while ($row8=$db->zeile($res8)) {
							$where_op.=$row8[0].',';
						}
					}
					if ($where_op!='') {
                        $where_op=$db->dbzahlin(p4n_mb_string('substr', $where_op, 0, -1),$sql_tabs['useronline']['benutzer_id'],($ohne_opos) ? 'NOT IN' : 'IN').' and ';
					}
                }
				$res=$db->select(
                    $sql_tab['useronline'],
                    $sql_tabs['useronline']['benutzer_id'],
                    $admin_zusatz_where.$where_op.$sql_tabs['useronline']['datum'].'>='.$db->dbtimestamp(time()-$stundenlimit*60*60)
                );
                if ($db->anzahl($res)>=$cfg_lizenz_max_benutzer) {
                    $ht.=_LIZENZ_MAX_.' ('.$cfg_lizenz_max_benutzer.' '._BENUTZER_.').';
					$nl=true;
				}
			}
			
			if ($nc) {
				return $cfg_lizenz_max_benutzer;
			}
			
			if ($nl) {
				$auth=new auth;
				echo $auth->loginscreen('index.php', true);
				echo '<center><b><font color=red>'._ACHTUNG_.':</font> '.$ht.'</center></b>';
				fuss();
				die();
			}
	}
	
	function menue_refresh($modus='', $mehr='', $nt=false) {
        global $cfg_modern;
		$ms='';
		$t='';
		if (isset($_GET['msuchwort']) and $_GET['msuchwort']!='') {
			$ms='&suchw='.$_GET['msuchwort'];
		}
		if ($mehr!='') {
			$mehr='&'.$mehr;
		}
		if ($_SESSION['device']!='pda') {
            if ($cfg_modern) {
                unset($_SESSION['modern']['cache_menu']);
                unset($_SESSION['modern']['cache_fav']);
                $t=javas('open("menu4.php?m='.$modus.$ms.$mehr.'&t='.time().'&refresh=1", "menu"); ');
            } else {
			$t=javas('open("menu'.($_SESSION['isdn']==1?'2':'').'.php?m='.$modus.$ms.$mehr.'&t='.time().'&refresh=1", "menu");');
            }
			if ($_SESSION['ajx']==1) {
				$t='';//
//				$t=javas('lade_s("menu2_aj.php?l_inc=1&m='.$modus.$ms.$mehr.'", "div_menue");');
			}
		}
		
		if ($nt) {
			return $t;
		} else {
			echo $t;
		}
	}
	
	function kunde_raus($k) {
		//global $cfg_cc_tlfcache;
		//$cfg_cc_tlfcache soll immer true sein, wozu dann prüfung?
		//if ($cfg_cc_tlfcache) {
			unset($_SESSION['crm_cc_tlfcache'][$k]);
			return;
		//}
		/*
		if ($_SESSION['user_gruppe']==2) {
			return;
		}
		
		if ($_SESSION['cfg_kunde']=='callcenter' or $_SESSION['cfg_kunde']=='cc_complan') {
			// raus
			$_SESSION['crm_l_id']=p4n_mb_string('str_replace', 
				','.$k.',',
				',',
				','.$_SESSION['crm_l_id'].','
			)//.','.$k;
			if (p4n_mb_string('substr', $_SESSION['crm_l_id'], 0,1)==',') {
				$_SESSION['crm_l_id']=p4n_mb_string('substr', $_SESSION['crm_l_id'], 1);
			}
			if (p4n_mb_string('substr', $_SESSION['crm_l_id'], -1)==',') {
				$_SESSION['crm_l_id']=p4n_mb_string('substr', $_SESSION['crm_l_id'], 0, -1);
			}
		} else {
			// nach hinten verschieben:
			$_SESSION['crm_l_id']=p4n_mb_string('str_replace', 
				','.$k.',',
				',',
				','.$_SESSION['crm_l_id'].','
			).','.$k;
			$_SESSION['crm_l_id']=p4n_mb_string('str_replace', ',,', ',', $_SESSION['crm_l_id']);
			
			if (p4n_mb_string('substr', $_SESSION['crm_l_id'], 0,1)==',') {
				$_SESSION['crm_l_id']=p4n_mb_string('substr', $_SESSION['crm_l_id'], 1);
			}
			if (p4n_mb_string('substr', $_SESSION['crm_l_id'], -1)==',') {
				$_SESSION['crm_l_id']=p4n_mb_string('substr', $_SESSION['crm_l_id'], 0, -1);
			}
		}*/
	}
	
	function update_trfr_kfelder($stid) {
		global $prefix, $db, $sql_tab, $sql_tabs, $postfeld, $ltext;
		
		$postfeld['stid']=$stid;
		
		$res=$db->select(
			$sql_tab['stammdaten'],
			array(
				$sql_tabs['stammdaten']['mandant'],
				$sql_tabs['stammdaten']['vorname'],
				$sql_tabs['stammdaten']['name'],
				$sql_tabs['stammdaten']['anrede'],
				$sql_tabs['stammdaten']['titel'],
				$sql_tabs['stammdaten']['firma1']
			),
			$sql_tabs['stammdaten']['id'].'='.$db->dbzahl($postfeld['stid'])
		);
		$row=$db->zeile($res);
		$mandid=$row[0];
		$stnn_daten=array($row[1], $row[2], $row[3], $row[4], $row[5]);
		
		$st_feld=array('vorname','name','anrede','titel','firma1','geburtstag','bemerkung', 'hobby', 'beruf', 'geburtsort', 'meinvp', 'vpnr', 'idstatus');
		$st_upd=array();
		
		if (isset($postfeld['wf_mandant_id'])) {
			$st_upd[$sql_tabs['stammdaten']['mandant']]=$db->dbzahl($postfeld['wf_mandant_id']);
		} elseif (isset($postfeld['wf_lagerort_id'])) {
			$expl=explode('_', $postfeld['wf_lagerort_id']);
			$st_upd[$sql_tabs['stammdaten']['mandant']]=$db->dbzahl($expl[0]);
			$st_upd[$sql_tabs['stammdaten']['vpb']]=$db->dbzahl($expl[1]);
		}
		
		if (isset($postfeld['betreuer_neu'])) {
			$st_upd[$sql_tabs['stammdaten']['betreuer']]=$db->dbzahl($postfeld['betreuer_neu']);
		}
		if (isset($postfeld['neue_index'])) {
			$st_upd[$sql_tabs['stammdaten']['matchcode']]=$db->str(intval($postfeld['neue_nummer']).'/'.$postfeld['neue_index']);
		}
		
		while (list($key, $val)=@each($st_feld)) {
			
			if (isset($_SESSION['workflow_vorlage_id']) and !isset($postfeld['st_anrede'])) {
				if (isset($postfeld['st_anrede_1'])) {
					$postfeld['st_anrede']='Herr';
				}
				if (isset($postfeld['st_anrede_2'])) {
					$postfeld['st_anrede']='Frau';
				}
			}
			
			if (isset($postfeld['st_'.$val])) {
				if ($val=='geburtstag') {
					$st_upd[$sql_tabs['stammdaten'][$val]]=$db->dbdate($postfeld['st_'.$val]);
				} else {
					if ($val=='anrede') {
						$b_an='Sehr geehrte Damen und Herren';
						if (p4n_mb_string('substr', p4n_mb_string('strtolower',$postfeld['st_'.$val]), 0, 4)=='herr') {
							$b_an='Sehr geehrter Herr';
						} elseif (p4n_mb_string('strtolower',$postfeld['st_'.$val])=='frau') {
							$b_an='Sehr geehrte Frau';
						}
						$st_upd[$sql_tabs['stammdaten']['briefanrede']]=$db->str($b_an);
					}
					$st_upd[$sql_tabs['stammdaten'][$val]]=$db->str($postfeld['st_'.$val]);
				}
			}
		}
		if (isset($postfeld['st_adresse']) or isset($postfeld['st_plz']) or isset($postfeld['st_ort']) or isset($postfeld['st_land'])) {
			$res=$db->select(
					$sql_tab['stammdaten_adresse'],
					$sql_tabs['stammdaten_adresse']['adress_id'],
					$sql_tabs['stammdaten_adresse']['stammdaten_id'].'='.$db->dbzahl($postfeld['stid']),
						$sql_tabs['stammdaten_adresse']['post'].' desc, '.$sql_tabs['stammdaten_adresse']['art']
			);
			if ($row=$db->zeile($res)) {
				$db->update(
					$sql_tab['stammdaten_adresse'],
					array(
						$sql_tabs['stammdaten_adresse']['adresse'] => $db->str($postfeld['st_adresse']),
						$sql_tabs['stammdaten_adresse']['plz'] => $db->str($postfeld['st_plz']),
						$sql_tabs['stammdaten_adresse']['ort'] => $db->str($postfeld['st_ort']),
						$sql_tabs['stammdaten_adresse']['land'] => $db->str($postfeld['st_land'])
					),
					$sql_tabs['stammdaten_adresse']['adress_id'].'='.$db->dbzahl($row[0])
				);
			} else {
				$db->insert(
					$sql_tab['stammdaten_adresse'],
					array(
						$sql_tabs['stammdaten_adresse']['stammdaten_id'] => $db->dbzahl($postfeld['stid']),
						$sql_tabs['stammdaten_adresse']['adresse'] => $db->str($postfeld['st_adresse']),
						$sql_tabs['stammdaten_adresse']['plz'] => $db->str($postfeld['st_plz']),
						$sql_tabs['stammdaten_adresse']['ort'] => $db->str($postfeld['st_ort']),
						$sql_tabs['stammdaten_adresse']['land'] => $db->str($postfeld['st_land']),
						$sql_tabs['stammdaten_adresse']['post'] => $db->dblogic(true),
						$sql_tabs['stammdaten_adresse']['art'] => $db->dbzahl(0),
						$sql_tabs['stammdaten_adresse']['mandant_id'] => $db->dbzahl($mandid)
						
					)
				);
			}
		}
		if (isset($postfeld['st_telefon']) or isset($postfeld['st_mobilfon']) or isset($postfeld['st_email']) or isset($postfeld['st_fax'])) {
			$kontakt_arten=array(
				'st_telefon' => 0,
				'st_telefon2' => 1,
				'st_telefon3' => 2,
				'st_mobilfon' => 6,
				'st_mobilfon2' => 7,
				'st_mobilfon3' => 8,
				'st_email' => 9,
				'st_email2' => 10,
				'st_email3' => 11,
				'st_fax' => 3,
				'st_fax2' => 4,
				'st_fax3' => 5,
				'st_www' => 12,
				'st_www2' => 13
			);
			$kontakt_arten2=array(
				'st_telefon' => 'Telefon_1',
				'st_telefon2' => 'Telefon_2',
				'st_telefon3' => 'Telefon_3',
				'st_mobilfon' => 'Mobilfon_1',
				'st_mobilfon2' => 'Mobilfon_2',
				'st_mobilfon3' => 'Mobilfon_3',
				'st_email' => 'EMail_1',
				'st_email2' => 'EMail_2',
				'st_email3' => 'EMail_3',
				'st_fax' => 'Fax_1',
				'st_fax2' => 'Fax_2',
				'st_fax3' => 'Fax_3',
				'st_www' => 'WWW_1',
				'st_www2' => 'WWW_2'
			);
			while (list($key, $val)=@each($kontakt_arten)) {
				if (isset($postfeld[$key])) {
					
					if (trim($postfeld[$key])=='') {
						continue;
					}
					
					$privstat=true;
					if (p4n_mb_string('substr', $key, -1)=='2') {
						$privstat=false;
					}
					
					$st_upd[$sql_tabs['stammdaten'][$kontakt_arten2[$key]]]=$db->str($postfeld[$key]);
				}
			}
		}
		if (isset($postfeld['st_institut']) or isset($postfeld['st_blz']) or isset($postfeld['st_konto']) or isset($postfeld['st_inhaber'])) {
			$res=$db->select(
					$sql_tab['stammdaten_bank'],
					$sql_tabs['stammdaten_bank']['bank_id'],
					$sql_tabs['stammdaten_bank']['stammdaten_id'].'='.$db->dbzahl($postfeld['stid']).' and '.
						$sql_tabs['stammdaten_bank']['art'].'=0'
			);
			if ($row=$db->zeile($res)) {
				$db->update(
					$sql_tab['stammdaten_bank'],
					array(
						$sql_tabs['stammdaten_bank']['institut'] => $db->str($postfeld['st_institut']),
						$sql_tabs['stammdaten_bank']['blz'] => $db->str($postfeld['st_blz']),
						$sql_tabs['stammdaten_bank']['kontonummer'] => $db->str($postfeld['st_konto']),
						$sql_tabs['stammdaten_bank']['inhaber'] => $db->str($postfeld['st_inhaber'])
					),
					$sql_tabs['stammdaten_bank']['bank_id'].'='.$db->dbzahl($row[0])
				);
			} else {
				$db->insert(
					$sql_tab['stammdaten_bank'],
					array(
						$sql_tabs['stammdaten_bank']['stammdaten_id'] => $db->dbzahl($postfeld['stid']),
						$sql_tabs['stammdaten_bank']['art'] => $db->dbzahl(0),
						$sql_tabs['stammdaten_bank']['institut'] => $db->str($postfeld['st_institut']),
						$sql_tabs['stammdaten_bank']['blz'] => $db->str($postfeld['st_blz']),
						$sql_tabs['stammdaten_bank']['kontonummer'] => $db->str($postfeld['st_konto']),
						$sql_tabs['stammdaten_bank']['inhaber'] => $db->str($postfeld['st_inhaber']),
						$sql_tabs['stammdaten_bank']['bezeichnung'] => $db->str(_BANKTYP1_)
					)
				);
			}
		}
		if (isset($postfeld['st_kkinstitut']) or isset($postfeld['st_kkblz']) or isset($postfeld['st_kkkonto']) or isset($postfeld['st_kkende'])) {
			$res=$db->select(
					$sql_tab['stammdaten_bank'],
					$sql_tabs['stammdaten_bank']['bank_id'],
					$sql_tabs['stammdaten_bank']['stammdaten_id'].'='.$db->dbzahl($postfeld['stid']).' and '.
						$sql_tabs['stammdaten_bank']['art'].'=4'
			);
			if ($row=$db->zeile($res)) {
				$db->update(
					$sql_tab['stammdaten_bank'],
					array(
						$sql_tabs['stammdaten_bank']['institut'] => $db->str($postfeld['st_kkinstitut']),
						$sql_tabs['stammdaten_bank']['blz'] => $db->str($postfeld['st_kkblz']),
						$sql_tabs['stammdaten_bank']['kontonummer'] => $db->str($postfeld['st_kkkonto']),
						$sql_tabs['stammdaten_bank']['ende'] => $db->dbdate($postfeld['st_kkende'])
					),
					$sql_tabs['stammdaten_bank']['bank_id'].'='.$db->dbzahl($row[0])
				);
			} else {
				$db->insert(
					$sql_tab['stammdaten_bank'],
					array(
						$sql_tabs['stammdaten_bank']['stammdaten_id'] => $db->dbzahl($postfeld['stid']),
						$sql_tabs['stammdaten_bank']['art'] => $db->dbzahl(4),
						$sql_tabs['stammdaten_bank']['institut'] => $db->str($postfeld['st_kkinstitut']),
						$sql_tabs['stammdaten_bank']['blz'] => $db->str($postfeld['st_kkblz']),
						$sql_tabs['stammdaten_bank']['kontonummer'] => $db->str($postfeld['st_kkkonto']),
						$sql_tabs['stammdaten_bank']['ende'] => $db->dbdate($postfeld['st_kkende']),
						$sql_tabs['stammdaten_bank']['bezeichnung'] => $db->str(_BANKTYP1_)
					)
				);
			}
		}
        if (isset($postfeld['zfeld_multi'])) {
            while (list($key, $val)=@each($postfeld['zfeld_multi'])) {
                if (!isset($postfeld['zfeld'][$key]) && isset($postfeld['zfeld_ffaltw'][$key])) {
                    $postfeld['zfeld'][$key]='';
                }
                if (!empty($postfeld['zfeld'][$key])) {
                    $postfeld['zfeld'][$key]=implode(';', $postfeld['zfeld'][$key]);
                    $postfeld['zfeld_ffaltw'][$key]=$postfeld['zfeld_altinh'][$key];
                }
            }
        }
        
		// Zusatzfelder:
		while (list($key, $val)=@each($postfeld['zfeld'])) {
			
			$res=$db->select(
				$sql_tab['stammdaten_zusatz'],
				$sql_tabs['stammdaten_zusatz']['art'],
				$sql_tabs['stammdaten_zusatz']['zusatz_id'].'='.$db->dbzahl($key)
			);
			$row=$db->zeile($res);
			$z_art=intval($row[0]);
			
            if ($z_art==1) {
				if ($val=='') {
					$zval='null';
				} else {
	                $zval=$db->dbdate($val);
				}
			} elseif ($z_art==2 or $z_art==7) {
				if ($z_art==7) {
					if ($val=='-1') {
						$val='0';
					}
				}
				$zval=$db->dbzahl($val);
			} elseif ($z_art==6) {
                $zval=$db->dbzeitdatum($val, $postfeld['zusatzfeld_zeit'][$key].':'.$postfeld['zusatzfeld_zeit2'][$key].':00');
			} else {
				$zval=$db->str($val);
			}
			if ($z_art!=1 and $zval=='null') {
				$zval=$db->str('');
			}
            $res=$db->select(
				$sql_tab['zusatzfelder'],
				$sql_tabs['zusatzfelder']['stammdaten_id'],
				$sql_tabs['zusatzfelder']['stammdaten_id'].'='.$db->dbzahl($postfeld['stid'])
			);
			if ($row=$db->zeile($res)) {
				$db->update(
					$sql_tab['zusatzfelder'],
					array(
						'zf_'.$key => $zval
					),
					$sql_tabs['zusatzfelder']['stammdaten_id'].'='.$db->dbzahl($postfeld['stid'])
				);
			} else {
				$db->insert(
					$sql_tab['zusatzfelder'],
					array(
						$sql_tabs['zusatzfelder']['stammdaten_id'] => $db->dbzahl($postfeld['stid']),
						'zf_'.$key => $zval
					)
				);
			}
		}
		if ($geandert>0) {
			$refresh=true;
		//	$mess->add($geandert.' '._ZUSATZ_GEAENDERT_);
		}
		
		$vn1='';
		if (isset($st_upd[$sql_tabs['stammdaten']['vorname']])) {
			$vn1=p4n_mb_string('str_replace', "'", '', $st_upd[$sql_tabs['stammdaten']['vorname']]);
		}
		$nn1='';
		if (isset($st_upd[$sql_tabs['stammdaten']['name']])) {
			$nn1=p4n_mb_string('str_replace', "'", '', $st_upd[$sql_tabs['stammdaten']['name']]);
		}
		$an1='';
		if (isset($st_upd[$sql_tabs['stammdaten']['anrede']])) {
			$an1=p4n_mb_string('str_replace', "'", '', $st_upd[$sql_tabs['stammdaten']['anrede']]);
		}
		$tn1='';
		if (isset($st_upd[$sql_tabs['stammdaten']['titel']])) {
			$tn1=p4n_mb_string('str_replace', "'", '', $st_upd[$sql_tabs['stammdaten']['titel']]);
		}
		$fn1='';
		if (isset($st_upd[$sql_tabs['stammdaten']['firma1']])) {
			$fn1=p4n_mb_string('str_replace', "'", '', $st_upd[$sql_tabs['stammdaten']['firma1']]);
		}
		if ($vn1!='' or $nn1!='' or $an1!='' or $tn1!='' or $fn1!='') {
			if ($vn1=='') {
				$vn1=$stnn_daten[0];
			}
			if ($nn1=='') {
				$nn1=$stnn_daten[1];
			}
			if ($an1=='') {
				$an1=$stnn_daten[2];
			}
			if ($tn1=='') {
				$tn1=$stnn_daten[3];
			}
			if ($fn1=='') {
				$fn1=$stnn_daten[4];
			}
			
			if ($nn1=='Neueintrag' and $fn1!='') {
				$nn1='';
			}
			
			$anzname=eingabe2anzeigename($vn1, $nn1, $tn1, $fn1, $an1);
			$st_upd[$sql_tabs['stammdaten']['anzeigename']]=$db->str($anzname);
		}
		
		if (count($st_upd)>0) {
			$db->update(
				$sql_tab['stammdaten'],
				$st_upd,
				$sql_tabs['stammdaten']['id'].'='.$db->dbzahl($postfeld['stid'])
			);
		}
		// Ende Update Felddaten
	}
	
	function lade_divinhalt($url, $breite=750, $hoehe=400, $head, $nurjs=false, $ohne_iframe=false) {
		global $ldi_schon, $cfg_modern;
		$text='';
		
		if (!isset($ldi_schon)) {
			$ldi_schon=true;
		$text.=javas('
		function wegfunktion() {
			document.getElementById(\'DivShim\').style.display=\'none\';
			document.getElementById(\'message\').style.left=-2000;
		}
		
		function k_aus() {
            if (typeof cfg_modern != "undefined" && cfg_modern==true) {
                //P4nBoxHelper.close("p4nbox_message");
                return;
            }
			//ele=YAHOO.util.Dom.get("message");//ko_neu
			document.getElementById(\'DivShim\').style.display=\'none\';
			document.getElementById(\'message\').style.left=-2000;
			document.getElementById(\'message\').onclick=wegfunktion;
			
			if (document.getElementById("TB_overlay") === null) {} else {
				$("TB_overlay").remove();
			}
			if (document.getElementById("TB_HideSelect") === null) {} else {
				$("TB_HideSelect").remove();
			}
		}
		
		function lade_in_message(t_url, bv, hv) {
        if (typeof cfg_modern != "undefined" && cfg_modern==true) {
        '.($ohne_iframe?
                'lade_s(t_url, "message"); return false;':
                '
                bv=(typeof bv!= "undefined" && bv!="")?bv:"";
                hv=(typeof hv!= "undefined" && bv!="")?hv:"";
                P4nBoxHelper.init({
                href:t_url+"&options_padding=0&options_menu=0",
                target:"body",
                type:"iframe",
                width:bv,
                    height:hv,
                    id:"ladesmit",
                    single:true,
                    onclickclose:true
                });
                return;').'
        }
		sfenster=document.getElementById("message");
		iheight=0;
		iwidth=0;
		mfr=this;//parent.main;
		docRoot="document.body";
		if (eval("mfr."+docRoot) && eval("typeof mfr."+docRoot+".clientHeight==\'number\'") && eval("mfr."+docRoot+".clientHeight")) {
			iheight = eval("mfr."+docRoot+".clientHeight");
			if (!document.all)
				iheight-=10;
		} else if (typeof(mfr.innerHeight)==\'number\') {
			iheight = mfr.innerHeight;
		}
		iheight+=document.body.scrollTop;
		if (eval("mfr."+docRoot) && eval("typeof mfr."+docRoot+".clientWidth==\'number\'") && eval("mfr."+docRoot+".clientWidth")) {
			iwidth = eval("mfr."+docRoot+".clientWidth");
		} else if (typeof(mfr.innerWidth)==\'number\') {
			iwidth = mfr.innerHeight;
			if (!document.all)
				iwidth-=50;
		}'.($ohne_iframe?'lade_s(t_url, "message");
		':'
		kopf="'.p4n_mb_string('str_replace', '"', "'", css_kopf(link2(_SCHLIESSEN_, '#', 'loesch.gif', '', 'onClick="k_aus();"').$head)).'";
		if (typeof kopf2=="undefined") {
			
		} else {
			if (kopf2=="x") {
				kopf="";
			}
			if (kopf2=="t_anstatt_bew") {
				kopf=kopf.replace(/'._KERGEBNIS_.'/, "'._TERMIN_TERMIN_.'");
			}
		}
		sfenster.innerHTML=kopf+"<iframe id=\'inhalt2\' name=\'inhalt2\' class=\'vorschau\' src=\'"+t_url+"\'></iframe>";
		').'
	// iframe höher setzen: style=\'height:900px\'
	//	bv=750;
	//	hv=400;
		h=iheight-hv;
		b=iwidth-bv;
		b2=iheight-hv-50;
		if (b2<0) {
			b2=5;
		}
//		sfenster.style.position="fixed";
//		sfenster.style.display="block";
//		sfenster.style.overflow="visible";
		sfenster.style.height=hv;
		sfenster.style.top=b2;
		sfenster.style.left=iwidth-bv-30;
		sfenster.style.width=bv;
		sfenster.style.zIndex=10;
		sfenster.style.overflow="auto";
		
		var IfrRef = document.getElementById(\'DivShim\'); 
		sfenster.style.display = "block"; 
		IfrRef.style.width = sfenster.offsetWidth; 
		IfrRef.style.height = sfenster.offsetHeight; 
		IfrRef.style.top = sfenster.style.top; 
		IfrRef.style.left = sfenster.style.left; 
		IfrRef.style.zIndex = sfenster.style.zIndex - 1; 
		IfrRef.style.display = "block"; 
	}');
		}
		if ($nurjs) {
			$text.='';
		} else {
			$text.=javas('lade_in_message("'.$url.'", '.$breite.', '.$hoehe.');');
		}
		
		return $text;
	}
	
	
	function jsdruck($t) {
		$t='<pre>'.p4n_mb_string('str_replace', array("\n", "\r", '"', "'"), array("<br>", "<br>", '', ''), $t).'</pre>';
		$c='<a href="javascript: fe=window.open(\'about:blank\', \'jsdruck\', \'height=550,width=700,top=200,left=200,resizable=yes,location=no,menubar=yes,status=yes,toolbar=no\'); fe.document.write(\'<html><head></head><body>'.$t.'</body></html>\'); fe.focus(); fe.print();"><img src="bilder/drucker.gif"></a>';
		return $c;
	}
	
	function apbezeichnung($apid, $abk=200) {
		global $db, $sql_tab, $sql_tabs;
		
		$res=$db->select(
				$sql_tab['stammdaten_ansprechpartner'],
				array(
					$sql_tabs['stammdaten_ansprechpartner']['bezeichnung'],
					$sql_tabs['stammdaten_ansprechpartner']['vorname']
				),
				$sql_tabs['stammdaten_ansprechpartner']['ansprechpartner_id'].'='.$db->dbzahl($apid)
		);
		if ($row=$db->zeile($res)) {
			return abkuerzung(trim($row[0].($row[1]!=''?', '.$row[1]:'')), $abk);
		} else {
			return 'AP-ID: '.$apid;
		}
	}
	
	function filter_ds_info($ds, $kein_ol=false, $css=true) {
		global $lang_db_f, $sql_meta, $db, $sql_tab_ids, $sql_tabs, $sql_tab, $cfg_kfz, $ol, $cfg_auftrag2_mittext, $lang, $cfg_benutzer_sprache;
		global $cfg_kfz_zf, $cfg_leadmanagement_2020;
		
		if ($cfg_kfz_zf) {
			prod_zf_tabsmeta();
		}
		$tababk=array(
			'produktzuordnung_reservierung' => 'pres',
			'produktzuordnung_versicherung' => 'versicherung',
			'produktzuordnung' => 'pzo',
			'stammdaten_ansprechpartner' => 'stap'
		);
		while (list($key, $val)=@each($tababk)) {
			if (isset($lang_db_f[$key])) {
				$lang_db_f[$val]=$lang_db_f[$key];
				$sql_tab[$val]=$sql_tab[$key];
				$sql_tabs[$val]=$sql_tabs[$key];
				$sql_meta[$val]=$sql_meta[$key];
			}
		}
		$lang_db_f['zusatzfelder']['']=_ZUSATZFELDER_;
		if ($cfg_leadmanagement_2020) {
            $allCategories = Plugin_System_LeadTracker::getInternalCategories();

            $spalten_name = $lang_db_f['kampagne_lead_status'][''];
            $old_lead_status_lang_dbf = $lang_db_f['kampagne_lead_status'];
            unset($lang_db_f['kampagne_lead_status']);
            if (!empty($allCategories)) {
                $lang_db_f['kampagne_lead_status'][''] = $spalten_name;
                foreach ($allCategories as $status_number => $status_label) {
                    $lang_db_f['kampagne_lead_status']['status'.$status_number] = $status_label;
                    $lang_db_f['kampagne_lead_status']['status'.$status_number.'_datum'] = $status_label.' - '.p4n_mb_string('ucwords', _DATUM_);
                }
                $lang_db_f['kampagne_lead_status']['lead_stage'] = $old_lead_status_lang_dbf['lead_stage'];
            }
            @reset($lang_db_f['kampagne_lead_status']);
        }
		$sprachenfeld=$cfg_benutzer_sprache;
	@reset($sprachenfeld);
	$spi=0;
	$m_sp=0;
	while (list($skey, $sval)=@each($sprachenfeld)) {
		if ($skey==$_SESSION['sprache']) {
			$m_sp=$spi;
		}
		$spi++;
	}
		$res=$db->select(
		$sql_tab['formular'],
		array(
			$sql_tabs['formular']['formular_id'],
			$sql_tabs['formular']['bezeichnung'],
			$sql_tabs['formular']['datum'],
			$sql_tabs['formular']['benutzer_id'],
			$sql_tabs['formular']['benutzer_gruppe_id'],
			$sql_tabs['formular']['vorlage']
		),
		$sql_tabs['formular']['bezeichung']
		);
		while ($row=$db->zeile($res)) {
		$sql_tab['formular_'.$row[0]]=$prefix.'formular_'.$row[0];
		$sql_tabs['formular_'.$row[0]]['formular_'.$row[0].'_id']=$prefix.'formular_'.$row[0].'.formular_'.$row[0].'_id';
		$sql_tabs['formular_'.$row[0]]['stammdaten_id']=$prefix.'formular_'.$row[0].'.stammdaten_id';
		$lang_db_f['formular_'.$row[0]]['']=$row[1];

		$sql_tabs['formular_'.$row[0]]['datum']=$prefix.'formular_'.$row[0].'.datum';
		$sql_meta['formular_'.$row[0]]['datum']=array('T');
		$lang_db_f['formular_'.$row[0]]['datum']=$lang['_DATUM-EINTRAG_'];
		$zugelassen['formular_'.$row[0]][]='datum';

		$sql_tabs['formular_'.$row[0]]['bemerkung']=$prefix.'formular_'.$row[0].'.bemerkung';
		$sql_meta['formular_'.$row[0]]['bemerkung']=array('X');
		$lang_db_f['formular_'.$row[0]]['bemerkung']=_BEMERKUNG_;
		$zugelassen['formular_'.$row[0]][]='bemerkung';


		$res2=$db->select(
			$sql_tab['formular_fragen'],
			array(
				$sql_tabs['formular_fragen']['frage_id'],
				$sql_tabs['formular_fragen']['frage'],
				$sql_tabs['formular_fragen']['frage2'],
				$sql_tabs['formular_fragen']['frage3'],
				$sql_tabs['formular_fragen']['frage4'],
				$sql_tabs['formular_fragen']['feldtyp']
			),
			$sql_tabs['formular_fragen']['formular_id'].'='.$db->dbzahl($row[0]),
			$sql_tabs['formular_fragen']['rang']
		);
		while ($row2=$db->zeile($res2)) {
            $feldty = $row2[5];
			if ($feldty=='9') {
				continue;
			}

			$zugelassen['formular_'.$row[0]][]='feld_'.$row2[0];

			$lang_db_f['formular_'.$row[0]]['feld_'.$row2[0]]=$row2[1+$m_sp];
			$sql_tabs['formular_'.$row[0]]['feld_'.$row2[0]]=$prefix.'formular_'.$row[0].'.'.'feld_'.$row2[0];

            if ($feldty=='1') {
				$sql_meta['formular_'.$row[0]]['feld_'.$row2[0]]=array('I');
			} elseif ($feldty=='2' or $feldty=='6') {
				$sql_meta['formular_'.$row[0]]['feld_'.$row2[0]]=array('C');
			} elseif ($feldty=='3') {
				$sql_meta['formular_'.$row[0]]['feld_'.$row2[0]]=array('X');
			} elseif ($feldty=='4') {
				$sql_meta['formular_'.$row[0]]['feld_'.$row2[0]]=array('D');
			} elseif ($feldty=='5') {
				$sql_meta['formular_'.$row[0]]['feld_'.$row2[0]]=array('T');
			} elseif ($feldty=='7' or $feldty=='12') {
				$sql_meta['formular_'.$row[0]]['feld_'.$row2[0]]=array('L');
			} elseif ($feldty=='8') {
				$sql_meta['formular_'.$row[0]]['feld_'.$row2[0]]=array('F');
			} elseif ($feldty=='13') {
				$sql_meta['formular_'.$row[0]]['feld_'.$row2[0]]=array('I');
                $sql_tab_ids[$sql_tabs['formular_'.$row[0]]['feld_'.$row2[0]]]=$sql_tabs['mandant']['mandant_id'];
			} elseif ($feldty=='14') {
				$sql_meta['formular_'.$row[0]]['feld_'.$row2[0]]=array('I');
				$sql_tab_ids[$sql_tabs['formular_'.$row[0]]['feld_'.$row2[0]]]=$sql_tabs['benutzer']['benutzer_id'];
			}
		}
		}

		include_once("class.overlib.php");
		if (!isset($ol)) {
			$ol = new Overlib();
		}
		
		$ol->set("align", 1);
		$ol->set("hauto", false);
		$ol->set("vauto", false);
		
		$oem2ansi=array('{'=>'ä', '|'=>'ö', '}'=>'ü', '['=>'Ä', chr(hexdec('5C'))=>'Ö', ']'=>'Ü', '`'=>'ß');
		
		$c_st=($css)?' style="padding:2px; font-size:8pt;"':'';
		$t='<table class="hori2" '.(($css)?'style="width:auto;"':'').'>';
        $inwhile=false;
		while (list($key, $val)=@each($ds)) {
			if (!is_numeric($key)) {
				if ($key=='produktzuordnung_id' or $key=='stammdaten___id' or $key=='auftrag_id') {
					continue;
				}
				$c=explode('___', $key);
				if (count($c)==1) {
					$c=explode('.', $key);
				}
				if ($c[0]=='zusatzfelder') {
					$zfid1='';
					$xpl2=explode('_', $c[1]);
					if ($xpl2[0]=='zf') {
						$zfid1=$xpl2[1];
					}
					$res9=$db->select(
						$sql_tab['stammdaten_zusatz'],
						array(
							$sql_tabs['stammdaten_zusatz']['art'],
							$sql_tabs['stammdaten_zusatz']['bezeichnung']
						),
						($zfid1!=''?$sql_tabs['stammdaten_zusatz']['zusatz_id'].'='.$db->dbzahl($zfid1):
						$sql_tabs['stammdaten_zusatz']['bezeichnung'].'='.$db->str($c[1]).' or '.
							$sql_tabs['stammdaten_zusatz']['bezeichnung'].'='.$db->str(p4n_mb_string('str_replace', array('ae', 'oe', 'ue'), array('ä', 'ö', 'ü'), $c[1]))
						)
					);
					if ($row9=$db->zeile($res9)) {
						$lang_db_f['zusatzfelder']['zf_'.$zfid1]=$row9[1];
						if ($row9[0]=='1') {
							$sql_meta[$c[0]][$c[1]]=array('D');
						} elseif ($row9[0]=='2') {
							$sql_meta[$c[0]][$c[1]]=array('F');
						} elseif ($row9[0]=='6') {
							$sql_meta[$c[0]][$c[1]]=array('T');
						}
					}
				}
						if (@in_array('D', $sql_meta[$c[0]][$c[1]])) {
							$m_val1=$val;
							$val=$db->unixdate($val);
							if ($c[0]=='auftrag') {
								$ts1=adodb_mktime(12, 0, 0, p4n_mb_string('substr', $m_val1, 5, 2), p4n_mb_string('substr', $m_val1, 8, 2), p4n_mb_string('substr', $m_val1, 0, 4));
								$alter1=round((time()-$ts1)/(24*60*60));
								$val.=' ('.$lang['_K-ALTER_'].': '.$alter1.' '._TAGE_.')';
							}
						} elseif (@in_array('T', $sql_meta[$c[0]][$c[1]])) {
							$val=$db->unixdatetime($val);
						} elseif (@in_array('L', $sql_meta[$c[0]][$c[1]])) {
							$val=($val=='1'?_JA_:_NEIN_);
						} elseif (@in_array('F', $sql_meta[$c[0]][$c[1]]) or @in_array('N', $sql_meta[$c[0]][$c[1]])) {
							$val=number_format(doubleval($val), 2, ",", ".");
						}
						if (isset($sql_tab_ids[$sql_tabs[$c[0]][$c[1]]])) {
							$val=anzeige_idwert($sql_tabs[$c[0]][$c[1]], $val);
						}
				
				if (trim($val)!='') {
					
					if ($cfg_kfz) {
						if (!$kein_ol and isset($ds['auftrag_id']) and intval($ds['auftrag_id'])>0 and $c[0]=='auftrag' and ($c[1]=='bereich' or $c[1]=='datum')) {
							if (!isset($rtext[$ds['auftrag_id']])) {
								if ($cfg_auftrag2_mittext) {
									$where_auf2=$sql_tabs['auftrag2']['auftrag_id'].'='.$db->dbzahl($ds['auftrag_id']);
/*									$res=$db->select(
										$sql_tab['auftrag'],
										array(
											$sql_tabs['auftrag']['nummer'],
											$sql_tabs['auftrag']['rechnung_id']
										),
										$sql_tabs['auftrag']['auftrag_id'].'='.$db->dbzahl($ds['auftrag_id'])
									);
									if ($row=$db->zeile($res)) {
										$where_auf2=$sql_tabs['auftrag2']['nummer'].'='.$db->dbzahl($row[0]).' and '.
											$sql_tabs['auftrag2']['rechnung_id'].'='.$db->dbzahl($row[1]);
									}
*/									$res=$db->select(
										$sql_tab['auftrag2'],
										$sql_tabs['auftrag2']['auftrag_text'],
										$where_auf2
									);
								} else {
									$res=$db->select(
										$sql_tab['auftrag'],
										$sql_tabs['auftrag']['auftrag_text'],
										$sql_tabs['auftrag']['auftrag_id'].'='.$db->dbzahl($ds['auftrag_id'])
									);
								}
								if ($row=$db->zeile($res)) {
									if (!$_SESSION['db_utf8']) {
										$row[0]=strtr($row[0], $oem2ansi);
									}
									$row[0]=p4n_mb_string('str_replace', "\n\r", '', $row[0]);
									$rtext[$ds['auftrag_id']]=$row[0];
								}
							}
							$val=oltext('<pre><font size=2>'.$rtext[$ds['auftrag_id']].'</font></pre>', $val, '', '', 500, 'onClick="window.open(\'stammdaten_main.php?nav=Auftraege&id='.$ds[0].'&aid='.$ds['auftrag_id'].'\', \'_rtext\');"', true);
						}
						if ($c[0]=='produktzuordnung' and $c[1]=='typ_modell') {
							$pbez1=produktbezeichnung($val);
							if ($pbez1!='') {
								$val=$pbez1;
							} else {
								$res=$db->select(
									$sql_tab['kfztypen'],
									$sql_tabs['kfztypen']['bezeichnung'],
									$sql_tabs['kfztypen']['typ'].'='.$db->str(p4n_mb_string('substr', $val, 0, 3))
								);
								if ($row=$db->zeile($res)) {
									$val=$row[0].' - '.$val;
								}
							}
						}
					}
					
					$tab1=p4n_mb_string('ucfirst', $c[0]);
					if (isset($lang_db_f[$c[0]][''])) {
						$tab1=p4n_mb_string('ucfirst', $lang_db_f[$c[0]]['']);
					}
					$fe1=p4n_mb_string('ucfirst', $c[1]);
					if (isset($lang_db_f[$c[0]][$c[1]])) {
						$fe1=p4n_mb_string('ucfirst', $lang_db_f[$c[0]][$c[1]]);
					}
					$t.='<tr><th'.$c_st.'>'.$tab1.' - '.$fe1.':</th><td'.$c_st.'>'.$val.'</td></tr>';
                    $inwhile=true;
				}
			}
		}
		$t.='</table>';
		
		$ol->set("align", 0);
		
		return ($inwhile?$t:'');
	}
	
	function wps_farbe($t, $ci=1) {
		global $wps_arbeiten_farbe, $wps_anzahl_je, $wps_anzahl_gesamt;
		
		$farbe='';
		
		if (preg_match('/.*Standardarbeiten\:(.*)$/Uis', $t, $mat)) {
			$x=explode("\n", $mat[1]);
			
			$gef=false;
			if ($ci>=0) {
				while (list($key, $val)=@each($x)) {
					if (isset($wps_arbeiten_farbe[trim($val)])) {
						$wps_anzahl_je[trim($val)]++;
						$gef=true;
					}
				}
				if (!$gef) {
					$wps_anzahl_gesamt++;
				}
			}
			
			@reset($wps_arbeiten_farbe);
			$abbruch=false;
			while (!$abbruch and list($key, $val)=@each($wps_arbeiten_farbe)) {
				if (in_array($key, $x)) {
					$abbruch=true;
					$farbe=$val;
				}
			}
		} else {
			if ($ci>=0) {
				$wps_anzahl_gesamt++;
			}
		}
		
		return $farbe;
	}
	
	function alle_emails($stid) {
		global $db, $sql_tab, $sql_tabs;
		
		$emails=array();
		
		$res3=$db->select(
			$sql_tab['stammdaten'],
			array(
				$sql_tabs['stammdaten']['EMail_1'],
				$sql_tabs['stammdaten']['EMail_2'],
				$sql_tabs['stammdaten']['EMail_3']
			),
			$sql_tabs['stammdaten']['id'].'='.$db->dbzahl($stid)
		);
		if ($row3=$db->zeile($res3)) {
			for ($i=0; $i<3; $i++) {
				if ($row3[$i]!='') {
					$emails[$row3[$i]]=$row3[$i];
				}
			}
		}
		
		$res3=$db->select(
					$sql_tab['stammdaten_ansprechpartner'],
					array(
						$sql_tabs['stammdaten_ansprechpartner']['vorname'],
						$sql_tabs['stammdaten_ansprechpartner']['geburtstag'],
						$sql_tabs['stammdaten_ansprechpartner']['bezeichnung'],
						$sql_tabs['stammdaten_ansprechpartner']['email']
					),
					$sql_tabs['stammdaten_ansprechpartner']['stammdaten_id'].'='.$db->dbzahl($stid),
					$sql_tabs['stammdaten_ansprechpartner']['vorname']
		);
		while ($row3=$db->zeile($res3)) {
			if (trim($row3[3])!='') {
				$emails[$row3[3]]=trim($row3[2].', '.$row3[0]).' ('.$row3[3].')';
			}
		}
		
		return $emails;
	}
	
	function kampagnen_select($fel, $neu=false, $def_kam=-99, $mitkats=false, $maxlen=0, $mitinfo='', $stylezus='', $php_datei='') {
		global $db, $sql_tab, $sql_tabs, $form, $cfg_kampagne_autoinsert, $lang, $cfg_kampagne_autoinsert_woche, $kats_js, $kats_js2, $kats_js3, $kats_js4, $anzahlkamp, $mitkats_ohneerg, $cfg_kfzsuche_holland, $kamp_nurergkat, $kats_js5, $mitkats_als_standart;
		global $carlo_tw, $cfg_vw;

		$kampagnen=array();
		
		$where='';
		if ($neu) {
			$where.='('.$sql_tabs['kampagne']['beginn'].' is null or '.$sql_tabs['kampagne']['beginn'].'<='.$db->dbtimestamp(time()).') and ';
			$where.='('.$sql_tabs['kampagne']['ende'].' is null or '.$sql_tabs['kampagne']['ende'].'>='.$db->dbtimestamp(time()-24*60*60).') and ';
		}
		$where=p4n_mb_string('substr', $where, 0, -5);
		if ($where=='') {
			$where='1=1';
		}
        $def_kam_org=$def_kam;
		if ($def_kam>0) {
			$where='('.$where.') or '.$sql_tabs['kampagne']['kampagne_id'].'='.$db->dbzahl($def_kam);
		}
		$ausschluss_kamp=array();
        $einschluss_kamp=array();
        if ($carlo_tw && $fel=='kkamp_neu') {
            $result_aussk = $db->select(
                $sql_tab['workflow_aktion'],
                $sql_tabs['workflow_aktion']['kampagne_id'],
                $sql_tabs['workflow_aktion']['kampagne_id'].'>'.$db->dbzahl(0)
            );
            while ($row_aussk = $db->zeile($result_aussk)) {
                $ausschluss_kamp[$row_aussk[0]] = $row_aussk[0];
            }
        }
        
        if ($php_datei!='' && isset($sql_tabs['kampagne']['zusatz_einstellung'])) {
            $res_test=$db->select(
				$sql_tab['kampagne'],
				array(
                    $sql_tabs['kampagne']['kampagne_id'],
				    $sql_tabs['kampagne']['zusatz_einstellung']
				),
                $where,
				$sql_tabs['kampagne']['beginn'].' desc'
			);
            while ($row_test=$db->zeile($res_test)) {
                if ($row_test['zusatz_einstellung']!='') {
                    $zusatz_array = unserialize($row_test['zusatz_einstellung']);
                    if (!empty($zusatz_array) && is_array($zusatz_array['verfuegbarkeit'])) {
                        if (in_array($php_datei, $zusatz_array['verfuegbarkeit'])) {
                            $einschluss_kamp[$row_test['kampagne_id']] = $row_test['kampagne_id'];
                        }
                    }
                }
            }
        }
        
        $kampagne_tabs = array(
            $sql_tabs['kampagne']['kampagne_id'],
            $sql_tabs['kampagne']['datum'],
            $sql_tabs['kampagne']['beginn'],
            $sql_tabs['kampagne']['ende'],
            $sql_tabs['kampagne']['bezeichnung'],
            $sql_tabs['kampagne']['beschreibung'],
            $sql_tabs['kampagne']['datei1'],
            $sql_tabs['kampagne']['datei2'],
            $sql_tabs['kampagne']['datei3'],
            $sql_tabs['kampagne']['benutzer_gruppen'],
            $sql_tabs['kampagne']['mandant_id'],
			$sql_tabs['kampagne']['nur_ergebnissekat']
        );
        if ($carlo_tw && $cfg_vw && isset($sql_tabs['kampagne']['markencode'])) {
            $kampagne_tabs[] = $sql_tabs['kampagne']['markencode'].' as markencode';
        }
		$xpl_bg=array();
		$xpl_bg2=explode(',' ,$_SESSION['rechte_bgruppen']);
		while (list($key1, $val1)=@each($xpl_bg2)) {
			$xpl_bg[$val1]=$val1;
		}
		if (!isset($kamp_nurergkat)) {
			$kamp_nurergkat=array();
		}
		$first_id=-99;
			$res=$db->select(
				$sql_tab['kampagne'],
				$kampagne_tabs,
				$where,
				$sql_tabs['kampagne']['beginn'].' desc'
			);
			$anzahlkamp=0;
			while ($row=$db->zeile($res)) {
				if (!empty($einschluss_kamp)) {
                    if (!isset($einschluss_kamp[$row[0]])) {
                        continue;
                    }
                }
                
                if ($row[11]=='1') {
					$kamp_nurergkat[$row[0]]=1;
				}
				
				if (intval($row[10])>0 and $_SESSION['benutzer_mandant']!='-1' and p4n_mb_string('strpos', ','.$_SESSION['benutzer_mandant'].',', ','.$row[10].',')===false) {
					continue;
				}
				
				if ($row[9]!='' and $_SESSION['rechte_bgruppen']!='-1' and $_SESSION['rechte_bgruppen']!='') {
					$xpl2=explode(',', $row[9]);
					$gef=false;
					while (list($key1, $val1)=@each($xpl2)) {
						if (isset($xpl_bg[$val1])) {
							$gef=true;
							break;
						}
					}
					if (!$gef) {
						continue;
					}
				}
				
                if ($carlo_tw && $cfg_vw && $row[12] > 0 && System_BrandPartitioning::instance()->useBrandPartitioning()) {
                    if ($nameforkey = System_BrandPartitioning::instance()->getNameForKey($row[12])) {
                        if (!in_array($nameforkey, System_BrandPartitioning::instance()->getSessionUserBrands())) {
                            continue;
                        }
                    }
                }
                if (isset($ausschluss_kamp[$row[0]])) {
                    continue;
                }
                $zusjs='';
				for ($ji=6; $ji<=8; $ji++) {
					if ($row[$ji]!='') {
						$zusjs.=' <a href=\\\'dokumente/'.$row[$ji].'\\\' target=\\\'_blank\\\'>'._DATEI_.' '.intval($ji-5).'</a>';
					}
				}
				$js_kamp.=' if (this.options[this.selectedIndex].value==\''.$row[0].'\') { t=\''.p4n_mb_string('str_replace', array('"', "\n", "'"), '', $row[5]).$zusjs.'\'; } ';
				
				$anzahlkamp++;
				$kamtext=$row[4].' ('.($row[2]!=''?$db->unixdate($row[2]):'').' - '.($row[3]!=''?$db->unixdate($row[3]):'').')';
				if ($maxlen>0) {
					$kamtext=abkuerzung($kamtext, $maxlen);
				}
				$kampagnen[$row[0]]=$kamtext;
				if ($first_id==-99) {
					$first_id=$row[0];
				}
				
				if ($mitkats) {
					$res2=$db->select(
						$sql_tab['kampagne_kategorie'],
						array(
							$sql_tabs['kampagne_kategorie']['rang'],
							$sql_tabs['kampagne_kategorie']['bezeichnung'],
							$sql_tabs['kampagne_kategorie']['art'],
							$sql_tabs['kampagne_kategorie']['kampagne_kategorie_id'],
                            $sql_tabs['kampagne_kategorie']['als_standard']
						),
						$sql_tabs['kampagne_kategorie']['kampagne_id'].'='.$db->dbzahl($row[0]),
						$sql_tabs['kampagne_kategorie']['rang']
					);
					while ($row2=$db->zeile($res2)) {
						
						$kats_js[$row[0]][$row2[2]].='<option value=\''.$row2[1].'\'>'.$row2[1];
						$kats_js4[$row[0]][$row2[2]].='<option value=\''.$row2[1].'\'>'.$row2[1];
                        if ($row2[4]==$db->dblogic(true)) {
                            $mitkats_als_standart[$row[0]]=$row2[1];
                        }
						
						if ($mitkats_ohneerg) {
							continue;
						}
						
						$res3=$db->select(
							$sql_tab['kampagne_kategorie_ergebnis'],
							array(
								$sql_tabs['kampagne_kategorie_ergebnis']['bezeichnung']
							),
							$sql_tabs['kampagne_kategorie_ergebnis']['kampagne_kategorie_id'].'='.$db->dbzahl($row2[3]),
							$sql_tabs['kampagne_kategorie_ergebnis']['rang']
						);
						if ($db->anzahl($res3)>0) {
							while ($row3=$db->zeile($res3)) {
								$opttext_js3 = $row2[1].' - '.$row3[0];
								$kats_js3[$row[0]][$row2[2]].='<option value=\''.$row2[1].'_____'.$row3[0].'\'>'.$opttext_js3;//JS Selectbox in Schnellkorrespondenz
								if (isset($opttexte[$row3[0]])) {
									continue;
								}
								$opttexte[$row3[0]]=1;
								$kats_js2[$row[0]][$row2[2]][]=$row3[0];
								//$opttext=$row2[1].' - '.$row3[0];
								$opttext=$row3[0];
								if ($maxlen>0) {
									$opttext=abkuerzung($opttext, $maxlen);
								}
                                $kats_js[$row[0]][$row2[2]].='<option value=\''.$row2[1].'_____'.$row3[0].'\'>'.$opttext;
								$kats_js5[$row[0]][$row2[1]][$row3[0]]=$row3[0];
							}
						}
					}
				}
			}
			if ($neu and count($kampagnen)==1 and $def_kam==-99) {
				$def_kam=$first_id;
			} elseif (($cfg_kampagne_autoinsert or $cfg_kampagne_autoinsert_woche) and $neu and count($kampagnen)==0 and $def_kam==-99) {
				$bgrs='';
				$res=$db->select(
					$sql_tab['benutzer_gruppe'],
					$sql_tabs['benutzer_gruppe']['benutzer_gruppe_id']
				);
				while ($row=$db->zeile($res)) {
					$bgrs.=$row[0].',';
				}
				
				if ($cfg_kampagne_autoinsert_woche) {
					// Woche
					$bez=_TERMIN_WOCHE_.' '.adodb_date('W').'-'.adodb_date('Y');
					$m_wo=adodb_date('W');
					$t_wo=$m_wo;
					$je_t=time();
					while ($t_wo==$m_wo) {
						$je_t-=24*60*60;
						$t_wo=adodb_date('W', $je_t);
					}
					$je_t+=24*60*60;
					
					$wb_1=adodb_date('d.m.Y', $je_t);
					
					$m_wo=adodb_date('W');
					$t_wo=$m_wo;
					$je_t=time();
					while ($t_wo==$m_wo) {
						$je_t+=24*60*60;
						$t_wo=adodb_date('W', $je_t);
					}
					$je_t-=24*60*60;
					
					$wb_2=adodb_date('d.m.Y', $je_t);
				} else {
					// Monat
					$bez=$lang['_MONAT'.adodb_date('n').'_'].' '.adodb_date('Y');
					$wb_1=adodb_date('01.m.Y');
					$wb_2=adodb_date('t.m.Y');
				}
				$db->insert(
					$sql_tab['kampagne'],
					array(
						$sql_tabs['kampagne']['datum'] => $db->dbtimestamp(time()),
						$sql_tabs['kampagne']['beginn'] => $db->dbtimestamp($wb_1, 0,0,0),
						$sql_tabs['kampagne']['ende'] => $db->dbtimestamp($wb_2, 23,59,59),
						$sql_tabs['kampagne']['bezeichnung'] => $db->str($bez),
						$sql_tabs['kampagne']['beschreibung'] => $db->str(''),
						$sql_tabs['kampagne']['datei1'] => $db->str(''),
						$sql_tabs['kampagne']['datei2'] => $db->str(''),
						$sql_tabs['kampagne']['datei3'] => $db->str(''),
						$sql_tabs['kampagne']['benutzer_id'] => $db->dbzahl($_SESSION['user_id']),
						$sql_tabs['kampagne']['benutzer_gruppen'] => $db->str(p4n_mb_string('substr', $bgrs, 0, -1))
					)
				);
				$def_kam=$db->insertid();
				$kampagnen[$def_kam]=$bez.' ('.$wb_1.' - '.$wb_2.')';
			}
			asort($kampagnen,SORT_NATURAL | SORT_FLAG_CASE);
		$infotext='';
		if ($mitinfo!='') {
			$infotext=' onChange="t=\'\'; '.$js_kamp.' document.getElementById(\''.$mitinfo.'\').innerHTML=t; '.($mitkats?'{mitkats}':'').'"';
		}
        if ($cfg_kfzsuche_holland && $_SESSION['user_benz']) {
            global $plugin_list;
            if (is_array($plugin_list) && in_array('Plugin_Benz_ComExtension', $plugin_list)) {
                // Select first campaign id as preselect
                $res__ = $db->select(
                    $sql_tab['kampagne_lead_codes'],
                    array(
                        $sql_tabs['kampagne_lead_codes']['kampagne_id'],
                        $sql_tabs['kampagne_lead_codes']['sichtbarkeit'],
                        $sql_tabs['kampagne_lead_codes']['kampagne_kategorie_id'],
                        $sql_tabs['kampagne_lead_codes']['int_code']
                    )
                );
                $alle_kategorien_array = array();
                $kamps_ = array();
                while ($row321 = $db->zeile($res__)) {
                    if (intval($def_kam_org) == -99) {
                        $def_kam = $row321[0];
                    }
                    $kamps_[$row321[0]] = $row321[0];
                    $alle_sichtbar_optionen = @explode(';', $row321[1]);
                    if (empty($alle_sichtbar_optionen) || (is_array($alle_sichtbar_optionen) && !in_array('kurzk', $alle_sichtbar_optionen))) {
                        $alle_kategorien_array[$row321[0]][] = $row321[2];
                    }
                }
                if (!empty($kamps_)) {
                    foreach ($kamps_ as $kam) {
                        
                        $kats_js[$kam] = array();
                        $kats_js4[$kam] = array();

                        $res2321=$db->select(
                            $sql_tab['kampagne_kategorie'],
                            array(
                                $sql_tabs['kampagne_kategorie']['rang'],
                                $sql_tabs['kampagne_kategorie']['bezeichnung'],
                                $sql_tabs['kampagne_kategorie']['art'],
                                $sql_tabs['kampagne_kategorie']['kampagne_kategorie_id']
                            ),
                            $sql_tabs['kampagne_kategorie']['kampagne_id'].'='.$db->dbzahl($kam).' and '.
                            $db->dbzahlin($alle_kategorien_array[$kam], $sql_tabs['kampagne_kategorie']['kampagne_kategorie_id']),
                            $sql_tabs['kampagne_kategorie']['rang']
                        );
                        while ($row2321=$db->zeile($res2321)) {
                            $kats_js[$kam][$row2321[2]].='<option value=\''.$row2321[1].'\'>'.$row2321[1];
                            $kats_js4[$kam][$row2321[2]].='<option value=\''.$row2321[1].'\'>'.$row2321[1];
                        }
                    }
                    
                    return $form->selectinput($fel, $kampagnen, $def_kam, _IMPORT_KEINE_ZUORDNUNG_, ($mitkats && $infotext==''?'{mitkats}':'').$infotext.$stylezus).($mitkats?'{mitkats_onload}':'');
                }
            }
        }
		if ($_SESSION['cfg_kunde']=='crm_sensus') {
			$def_kam=-99;
		}
		return $form->selectinput($fel, $kampagnen, $def_kam, _IMPORT_KEINE_ZUORDNUNG_, ($mitkats && $infotext==''?'{mitkats}':'').$infotext.$stylezus).($mitkats?'{mitkats_onload}':'');
	}
	
    if ($_SESSION['crm_version']>62) {
        function kampagnen_select_js($kamp_name='',$kat_name='',$kerg_name='', $def_kamp=-99,$def_kat='',$def_erg=-1,$mitinfo='', $php_file='', $callbacks=array()) {
            global $cfg_select_suche;
            $return=array();

            $suchfeld=false;
            if ($_SESSION['crm_version']>62 || $cfg_select_suche) {
                $suchfeld=true;
            }
            
            $def_kamp=intval($def_kamp)>0?$def_kamp:-99;
            $def_kat=$def_kat!='' && $def_kat!=-1 && $def_kat!='-1'?$def_kat:'';
            $def_erg=$def_erg!=''?$def_erg:-1;

            $leer_tpl='<span class="styled-select"><select class="modern_select" disabled="disabled"><option value="">'._WIRD_GELADEN_.'</option></select></span>';

            if ($kamp_name!='') {
                $return[]='<div id="'.__FUNCTION__.'_kampagne_init" class="dbline">'.$leer_tpl.'</div>';
            }
            if ($kat_name!='') {
                $return[]='<div id="'.__FUNCTION__.'_kkatid" class="dbline">'.$leer_tpl.'</div>';
            }
            if ($kerg_name!='') {
                $return[]='<div id="'.__FUNCTION__.'_kergid" class="dbline">'.$leer_tpl.'</div>';
            }
            $return[]=javas('
                kampagnen_select_js.init('.$def_kamp.',"'.$def_kat.'","'.$def_erg.'",{
                    "kkamp_id":"'.__FUNCTION__.'_kampagne_init",
                    "kkat_id":"'.__FUNCTION__.'_kkatid",
                    "kerg_id":"'.__FUNCTION__.'_kergid",
                    "kkamp_name":"'.$kamp_name.'",
                    "kkat_name":"'.$kat_name.'",
                    "kerg_name":"'.$kerg_name.'",
                    "wird_geladen_text":"'._WIRD_GELADEN_.'",
                    "kat_aenderung_text:":"'._KATEGORIE_.' ' ._AENDERUNG_.'",
                    "mit_info":"'.$mitinfo.'",
                    "php_file":"'.$php_file.'",
                    "mit_alert_onload":false,
                    "select_suche":'.($suchfeld?"true":"false").',
                    '.($callbacks['kamp']?'"kamp_callback":'.$callbacks['kamp'].',':'').'
                    '.($callbacks['kat']?'"kat_callback":'.$callbacks['kat'].',':'').'
                    '.($callbacks['erg']?'"kerg_callback":'.$callbacks['erg'].',':'').'
                });
            ');

            return $return;
        }
    }
    
	function feldbed_s($feld, $inhalt, $op='like') {
		global $umlaute, $umlaute2;
		$text='('.$feld.' '.$op.' '.$inhalt;
		
		if ($_SESSION['sprache']=='lang_de.php') {
			$w1=strtr($inhalt, $umlaute);
			$w2=strtr($inhalt, $umlaute2);
		} else {
			$w1=$inhalt;
			$w2=$inhalt;
		}
		
		if ($w1!=$inhalt)
			$text.=' or '.$feld.' '.$op.' '.$w1;
		if ($w2!=$inhalt) {
			$text.=' or '.$feld.' '.$op.' '.$w2;
		}
		return $text.')';
	}
	
	function bez_name_s($row) {
		
		if ($_SESSION['cfg_kunde']=='rocama') {
			return $row[1];
		}
		//Support wollte dort leerzeichen sehen. Wurde damit nun eingefuehrt
		$name='';
		$name=trim($row[4].', '.$row[3]);
		if ($name==',')
			$name='';
		if (p4n_mb_string('substr', $name, 0, 1)==',')
			$name=p4n_mb_string('substr', $name, 1);
		if (p4n_mb_string('substr', $name, -1)==',')
			$name=p4n_mb_string('substr', $name, 0, -1);
		if ($row[5]!='') {
			$name.=' ('.$row[5].')';
		}
		$name=trim($name);
		if (p4n_mb_string('substr', $name, 0, 1)=='(') {
			$name=p4n_mb_string('substr', $name, 1, -1);
		}
		return $name;
	}
	
	function js_vis() {
		return javas('
function ch_vis(idtable, visib) {
	if (document.getElementById(idtable)) {
	if (navigator.product == "Gecko" && navigator.productSub && navigator.productSub > "20041010" && (navigator.userAgent.indexOf("rv:1.8") != -1 || navigator.userAgent.indexOf("rv:1.9") != -1)) {
		if (visib) {
			document.getElementById(idtable).style.visibility = "visible";
		} else {
			document.getElementById(idtable).style.visibility = "collapse";
		}
	} else if (visib) {
		if (document.all && document.compatMode && document.compatMode == "CSS1Compat" && !window.opera) {
			document.getElementById(idtable).style.display = "";
		} else if(document.getElementById && document.getElementById(idtable)) {
			document.getElementById(idtable).style.display = "";//table-row
		};
	} else {
		document.getElementById(idtable).style.display = "none";
	};
	}
}

var trigger_max_anzahl_selection=null;
function trigger_max_anzahl(that,anzahl) {
    try {
        if (jq1112(that).val().length > anzahl) {
            jq1112(that).val(trigger_max_anzahl_selection);
        } else {
            trigger_max_anzahl_selection = jq1112(that).val();
        }
    } catch(e) {
        
    }
}

function trigger_ch_vis(t) {
    if (crm_version>62) {} else {
    return;
    }
    if (t.getAttribute("class").indexOf("trigger_vis")!==-1) {
        return;
    } else {
        var ele = document.getElementsByClassName("vis_event");
        for (var i = (ele.length-1); i >= 0; i--) {
            if (t==ele[i]) { 
                i=-1;
            } else {
                ele[i].setAttribute("class",ele[i].getAttribute("class").replace(" trigger_vis",""));
                ele[i].setAttribute("class",ele[i].getAttribute("class")+" trigger_vis");

                if (ele[i].getAttribute("class").indexOf("starinput")!==-1) {
                    var stars = ele[i].parentNode.getElementsByClassName("star");
                    for (var j = 0; j < stars.length; j++) {
                        stars[j].setAttribute("class",stars[j].getAttribute("class").replace("star_clicked","").replace("star_click","").replace("star_full",""));
                    }
                }

                if (ele[i].getAttribute("onchange")) {
                    if (ele[i].tagName=="SELECT") {
                        ele[i].value="-1";
                    } else {
                        ele[i].value="";
                    }
                    if (typeof ele[i].onchange=="function") ele[i].onchange();
                }

                if (ele[i].getAttribute("onkeyup")) {
                    var zeit = ele[i].parentNode.parentNode.getElementsByClassName("datepicker_zeit");
                    for (var j = 0; j < zeit.length; j++) {
                        zeit[j].value="";
                    }
                    ele[i].value="";
                    if (typeof ele[i].onkeyup=="function") ele[i].onkeyup();
                }

                if (ele[i].getAttribute("onclick") && ele[i].getAttribute("class").indexOf("checkbox")!==-1) {
                    ele[i].checked = false;
                   if (typeof ele[i].onclick=="function") ele[i].onclick();
                }

                ele[i].setAttribute("class",ele[i].getAttribute("class").replace(" trigger_vis",""));
            }   
        }
    }
}


');
	}
	
	function alle_ben_info($bid) {
		global $sql_tab, $sql_tabs, $db, $ben_feld_global;
		
		if (!isset($ben_feld_global[$bid])) {
			$res=$db->select(
				$sql_tab['benutzer'],
				array(
					$sql_tabs['benutzer']['benutzer_id'],
					$sql_tabs['benutzer']['vorname'],
					$sql_tabs['benutzer']['name']
				),
				$sql_tabs['benutzer']['benutzer_id'].'='.$db->dbzahl($bid)
			);
			$row=$db->zeile($res);
			$ben_feld_global[$bid]=trim($row[2].', '.$row[1]);
		}
		return $ben_feld_global[$bid];
	}
	
	function wie_lange_her($zeit) {
		$wlh='';
		$jetzt=time();
		
		if ($jetzt>$zeit) {
			$tage=intval(($jetzt-$zeit)/(24*60*60));
			if ($tage<=2) {
				$stunden=intval(($jetzt-$zeit)/(60*60));
				if ($stunden==1) {
					$wlh=$stunden.' '._STUNDE_;
				} else {
					$wlh=$stunden.' '._STUNDEN_;
				}
			} else {
				$wlh=$tage.' '._NAECHSTEN_TAGE_;	//_TAG_
			}
		}
		
		return $wlh;
	}
	
	function parent_k_schliessen($kid, $immer=false, $oppid=0) {
		global $db, $sql_tab, $sql_tabs, $bez_ang_kv;
				
				$par_id2=$kid;
				while ($par_id2>0) {
					$res3=$db->select(
						$sql_tab['korrespondenz'],
						array(
							$sql_tabs['korrespondenz']['parent_id'],
							$sql_tabs['korrespondenz']['erledigt'],
							$sql_tabs['korrespondenz']['ergebnis_kategorie'],
							$sql_tabs['korrespondenz']['ergebnis_text'],
							$sql_tabs['korrespondenz']['ergebnis_datum']
						),
						$sql_tabs['korrespondenz']['korrespondenz_id'].'='.$db->dbzahl($par_id2)
							.($oppid>0?' and '.$sql_tabs['korrespondenz']['opportunity_id'].'='.$db->dbzahl($oppid):'')
					);
					if ($row3=$db->zeile($res3)) {
						if ($immer or intval($row3[1])<1) {
							$sqlt1=array(
								$sql_tabs['korrespondenz']['erledigt'] => $db->dblogic(true)
							//	$sql_tabs['korrespondenz']['ergebnis_datum'] => $db->dbtimestamp(time())
							);
							if ($row3[4]=='') {
								$sqlt1[$sql_tabs['korrespondenz']['ergebnis_datum']]=$db->dbtimestamp(time());
							}
							if (isset($bez_ang_kv)) {
								if ($bez_ang_kv!='' and $row3[2]=='' and $row3[3]=='') {
									$sqlt1[$sql_tabs['korrespondenz']['ergebnis_kategorie']]=$db->str($bez_ang_kv);
									$sqlt1[$sql_tabs['korrespondenz']['ergebnis_text']]=$db->str($bez_ang_kv);
									$sqlt1[$sql_tabs['korrespondenz']['ergebnis_benutzer_id']]=$db->dbzahl($_SESSION['user_id']);
								}
							}
							$db->update(
								$sql_tab['korrespondenz'],
								$sqlt1,
								$sql_tabs['korrespondenz']['korrespondenz_id'].'='.$db->dbzahl($par_id2)
							);
						}
						$par_id2=0;
						if (intval($row3[0])>0) {
							$par_id2=intval($row3[0]);
						}
					} else {
						$par_id2=0;
					}
				}
	}
	
	function rmandanten($nurmitrecht=false, $mit_laomand=false) {
		global $db, $sql_tab, $sql_tabs;
		
		$alle_mands=array();
		$alle_mands2=array();
		$res=$db->select(
			$sql_tab['mandant'],
			array(
				$sql_tabs['mandant']['mandant_id'],
				$sql_tabs['mandant']['bezeichnung'],
				$sql_tabs['mandant']['parent_id']
			),
			'',
			$sql_tabs['mandant']['parent_id'].','.$sql_tabs['mandant']['bezeichnung']
		);
		while ($row=$db->zeile($res)) {
			$alle_mands2[$row[0]]=$row[1];
			if ($nurmitrecht) {
				if ($_SESSION['benutzer_mandant']!='-1' and p4n_mb_string('strpos', ','.$_SESSION['benutzer_mandant'].',', ','.$row[0].',')===false) {
					continue;
				}
			}
			$zus1='';
			if ($mit_laomand) {
				if (intval($row[2])>0) {
					$zus1=$alle_mands2[$row[2]].' / ';
				}
			}
			$alle_mands[$row[0]]=$zus1.$row[1];
		}
		
		return $alle_mands;
	}
	
	function bweiterl($uid=0) {
		global $db, $sql_tab, $sql_tabs;
		
		if ($uid==0) {
			$uid=$_SESSION['user_id'];
		}
		
//echo 'UID: '.$uid.'<br>';
		$weiterl=array();
		$alle_w='';
		$res=$db->select(
			$sql_tab['benutzer_weiterleitung'],
			array(
				$sql_tabs['benutzer_weiterleitung']['benutzer_id'],
				$sql_tabs['benutzer_weiterleitung']['benutzer_id_zu'],
				$sql_tabs['benutzer_weiterleitung']['datum_von'],
				$sql_tabs['benutzer_weiterleitung']['datum_bis']
			),
			$sql_tabs['benutzer_weiterleitung']['benutzer_id_zu'].'='.$db->dbzahl($uid)
		);
		while ($row=$db->zeile($res)) {
			$drin=true;
			if ($row[2]!='' and $row[2]!='1970-01-01' and $row[2]!='0000-00-00') {
				if (adodb_mktime(0,0,0,adodb_date('m', $db->unixdate_ts($row[2])), adodb_date('d', $db->unixdate_ts($row[2])), adodb_date('Y', $db->unixdate_ts($row[2])))>time()) {
					$drin=false;
				}
			}
			if ($row[3]!='' and $row[3]!='1970-01-01' and $row[3]!='0000-00-00') {
				if (adodb_mktime(23,59,59,adodb_date('m', $db->unixdate_ts($row[3])), adodb_date('d', $db->unixdate_ts($row[3])), adodb_date('Y', $db->unixdate_ts($row[3])))<time()) {
					$drin=false;
				}
			}
			if ($drin) {
				$weiterl[$row[0]]=$row[1];
				$alle_w.=$row[0].',';
				$res2=$db->select(
					$sql_tab['benutzer_weiterleitung'],
					array(
						$sql_tabs['benutzer_weiterleitung']['benutzer_id'],
						$sql_tabs['benutzer_weiterleitung']['benutzer_id_zu'],
						$sql_tabs['benutzer_weiterleitung']['datum_von'],
						$sql_tabs['benutzer_weiterleitung']['datum_bis']
					),
					$sql_tabs['benutzer_weiterleitung']['benutzer_id_zu'].'='.$db->dbzahl($row[0])
				);
				while ($row2=$db->zeile($res2)) {
					$drin2=true;
					if ($row2[2]!='' and $row2[2]!='1970-01-01' and $row2[2]!='0000-00-00') {
						if (adodb_mktime(0,0,0,adodb_date('m', $db->unixdate_ts($row2[2])), adodb_date('d', $db->unixdate_ts($row2[2])), adodb_date('Y', $db->unixdate_ts($row2[2])))>time()) {
							$drin2=false;
						}
					}
					if ($row2[3]!='' and $row2[3]!='1970-01-01' and $row2[3]!='0000-00-00') {
						if (adodb_mktime(23,59,59,adodb_date('m', $db->unixdate_ts($row2[3])), adodb_date('d', $db->unixdate_ts($row2[3])), adodb_date('Y', $db->unixdate_ts($row2[3])))<time()) {
							$drin2=false;
						}
					}
					if ($drin2) {
						$alle_w.=$row2[0].',';
					}
				}
			}
		}
		
		$alle_w=p4n_mb_string('substr', $alle_w, 0, -1);
		
//echo 'weiterl: '.$alle_w.'<br><br>';
		return $alle_w;
	}
	
	function trimall($input) {
		$input = trim($input);
        if (version_compare(phpversion(), '7.0.0', '>')) {
            return $input;
        }
		$output = ereg_replace('  +', ' ', $input );
		return $output;
	}

/**
 * Rerturns an array with displayable names of user ids
 * @param int $muster
 * @param bool|false $nurmitrecht
 * @param string $rben_where
 * @param int $maxlen
 * @param bool|false $zusatzinfos
 * @return array
 */
	function rbenutzer($muster=1, $nurmitrecht=false, $rben_where='', $maxlen=0, $zusatzinfos = false) {
		global $db, $sql_tab, $sql_tabs, $rbenutzer_bens1, $rbenutzer_bens_mand1, $benr3;
		
		if ($nurmitrecht and !isset($rbenutzer_bens_mand1)) {
			$res=$db->select(
				$sql_tab['benutzer_mandant'],
				array(
					$sql_tabs['benutzer_mandant']['benutzer_id'],
					$sql_tabs['benutzer_mandant']['mandant_id']
				)
			);
			while ($row=$db->zeile($res)) {
				if (intval($row[1])>0) {
					$rbenutzer_bens_mand1[$row[1]][$row[0]]=1;
				}
			}
			
			$benr2=array();
			$benr3='';
			$benr1=explode(',', $_SESSION['benutzer_mandant']);
			@reset($benr1);
			while (list($key, $val)=@each($benr1)) {
				if (isset($rbenutzer_bens_mand1[$val])) {
					@reset($rbenutzer_bens_mand1[$val]);
					while (list($key2, $val2)=@each($rbenutzer_bens_mand1[$val])) {
						$benr2[$key2]=1;
					}
				}
			}
			while (list($key, $val)=@each($benr2)) {
				$benr3.=$key.',';
			}
			$benr3=p4n_mb_string('substr', $benr3, 0, -1);
		}
		
		if ($nurmitrecht and $benr3!='') {
			if ($rben_where!='') {
				$rben_where.=' and '.$db->dbzahlin($benr3,$sql_tabs['benutzer']['benutzer_id']);
			} else {
				$rben_where=$db->dbzahlin($benr3,$sql_tabs['benutzer']['benutzer_id']);
			}
		}
		if ($_SESSION['cfg_kunde']=='carlo_opel_haeusler') {
			if ($rben_where!='') {
				$rben_where.=' and '.$sql_tabs['benutzer']['gruppe'].'>=0';
			} else {
				$rben_where=$sql_tabs['benutzer']['gruppe'].'>=0';
			}
		}
		
		$alle_bens=array();
		$res=$db->select(
			$sql_tab['benutzer'],
			array(
				$sql_tabs['benutzer']['benutzer_id'],
				$sql_tabs['benutzer']['vorname'],
				$sql_tabs['benutzer']['name'],
				$sql_tabs['benutzer']['login'],
				$sql_tabs['benutzer']['email'],
                $sql_tabs['benutzer']['standard_lagerort'],
                
			),
			$rben_where,
			$sql_tabs['benutzer']['name'].','.$sql_tabs['benutzer']['vorname']
		);
		while ($row=$db->zeile($res)) {
			$bent='';
			if ($muster==1) {
				// Name, Vorname
				$bent=$row[2].', '.$row[1];
			} elseif ($muster==2) {
				// Vorname Name
				$bent=$row[1].' '.$row[2];
			} elseif ($muster==3) {
				// Name, Vorname (Login)
				$bent=$row[2].', '.$row[1].' ('.$row[3].')';
			} elseif ($muster==4) {
				// Name, Vorname (E-Mail: email)
				$bent=$row[2].', '.$row[1].' ('._EMAIL_.': '.$row[4].')';
			}
			$bent=trim($bent);
			
			if ($maxlen>0) {
				$bent=p4n_mb_string('substr', $bent, 0, $maxlen);
			}
			if ($zusatzinfos) {
                $alle_bens[$row[0]]=array('anzeigename' => $bent, 'name' => $row[2], 'vorname' => $row[1], 'standard_lagerort' => $row[5], 'login' => $row[3], 'email' => $row[4]);
            } else {
            	$alle_bens[$row[0]]=$bent;
            }
		}
		return $alle_bens;
	}
	
	function link_dok_oeffnen($link1, $link2='', $link3='', $link4='', $link5='', $link6='', $weitere=array()) {
		$_SESSION['letztes_dok_oeffnen']=$link1;
		if ($link2!='') {
			$_SESSION['letztes_dok_oeffnen2']=$link2;
		}
		if ($link3!='') {
			$_SESSION['letztes_dok_oeffnen3']=$link3;
		}
		if ($link4!='') {
			$_SESSION['letztes_dok_oeffnen4']=$link4;
		}
		if ($link5!='') {
			$_SESSION['letztes_dok_oeffnen5']=$link5;
		}
		if ($link6!='') {
			$_SESSION['letztes_dok_oeffnen6']=$link6;
		}
		if (count($weitere)>0) {
			$_SESSION['letztes_dok_oeffnen_weitere']=$weitere;
		}
		echo javas('window.open("hilfe.php?dok_o=1", "status");');
	}
	
	
	function getDaysInWeek($weekNumber, $year) {
		$time = strtotime('4 January ' . $year . ' +' . ($weekNumber - 1) . ' weeks');
		$mondayTime = strtotime('-' . (date('w', $time) - 1) . ' days', $time);
		$dayTimes = array ();
		for ($i = 0; $i < 7; ++$i) {
			$dayTimes[] = strtotime('+' . $i . ' days', $mondayTime);
		}
		return $dayTimes;
	}
	function getFirstDayOfWeek($weeknr, $year) {
		$offset = adodb_date('w', mktime(0,0,0,1,1,$year));
echo $offset.'<br>';
		$offset = ($offset < 5) ? 1-$offset : 8-$offset;
echo $offset.'<br>';
		$monday = adodb_mktime(0,0,0,1,1+$offset,$year);
echo $monday.'<br>';
echo adodb_date('d.m.Y', $monday);
		return strtotime('+'.strval($weeknr-1).' weeks', $monday);
	}
	
	function tempdateien($tdatei, $tdateiname, $tbezeichnung) {
		for ($i=0; $i<=20; $i++) {
			if ($_SESSION['letzte_datei_filename'][$i]==$tdateiname) {
				unset($_SESSION['letzte_datei'][$i]);
				unset($_SESSION['letzte_datei_datum'][$i]);
				unset($_SESSION['letzte_datei_name'][$i]);
				unset($_SESSION['letzte_datei_filename'][$i]);
				for ($j=$i; $j<20; $j++) {
					if (isset($_SESSION['letzte_datei'][$j+1])) {
						$_SESSION['letzte_datei'][$j]=$_SESSION['letzte_datei'][$j+1];
						$_SESSION['letzte_datei_datum'][$j]=$_SESSION['letzte_datei_datum'][$j+1];
						$_SESSION['letzte_datei_name'][$j]=$_SESSION['letzte_datei_name'][$j+1];
						$_SESSION['letzte_datei_filename'][$j]=$_SESSION['letzte_datei_filename'][$j+1];
					} else {
						unset($_SESSION['letzte_datei'][$j]);
						unset($_SESSION['letzte_datei_datum'][$j]);
						unset($_SESSION['letzte_datei_name'][$j]);
						unset($_SESSION['letzte_datei_filename'][$j]);
					}
				}
			}
		}
		for ($i=20; $i>0; $i--) {
			if (isset($_SESSION['letzte_datei'][$i-1])) {
				$_SESSION['letzte_datei'][$i]=$_SESSION['letzte_datei'][$i-1];
				$_SESSION['letzte_datei_datum'][$i]=$_SESSION['letzte_datei_datum'][$i-1];
				$_SESSION['letzte_datei_name'][$i]=$_SESSION['letzte_datei_name'][$i-1];
				$_SESSION['letzte_datei_filename'][$i]=$_SESSION['letzte_datei_filename'][$i-1];
			}
		}
		$_SESSION['letzte_datei'][0]=$tdatei;
		$_SESSION['letzte_datei_datum'][0]=time();
		$_SESSION['letzte_datei_name'][0]=$tbezeichnung;
		$_SESSION['letzte_datei_filename'][0]=$tdateiname;
		@ksort($_SESSION['letzte_datei']);
		@ksort($_SESSION['letzte_datei_datum']);
		@ksort($_SESSION['letzte_datei_name']);
		@ksort($_SESSION['letzte_datei_filename']);
	}
	
	function jswert_anf($t) {
		$t=p4n_mb_string('str_replace', '"', "'", $t);
		$t=p4n_mb_string('str_replace', "\n", '\\n', $t);
		$t=p4n_mb_string('str_replace', "\r", '', $t);
		$t=p4n_mb_string('str_replace', "'", '\\\'', $t);
		return $t;
	}
	
	function dbcrmwert($wert1, $tab1, $feld1) {
		global $db, $sql_tab, $sql_tabs, $sql_meta, $id_werte_global, $sql_tab_id, $sql_tab_ids, $ADODB_FETCH_MODE, $cfg_carlo_appserver, $cfg_carlo_appserver_lagerorte, $cfg_kunde_mandlao, $lang, $cfg_filter_mandlao_sperre, $sql_feld_geldbetrag_array, $sql_feld_geldbetrag;
		
		$t=$wert1;
		if (isset($sql_tab_ids[$sql_tabs[$tab1][$feld1]])) {
			$t=anzeige_idwert($sql_tabs[$tab1][$feld1], $t);
		} elseif (@in_array('D', $sql_meta[$tab1][$feld1])) {
			$t=$db->unixdate($t);
		} elseif (@in_array('T', $sql_meta[$tab1][$feld1])) {
			$t=$db->unixdate($t);	// unixdatetime
		} elseif (@in_array('F', $sql_meta[$tab1][$feld1]) or @in_array('N', $sql_meta[$tab1][$feld1])) {
			$t=p4n_mb_string('str_replace', '.', ',', $t);
		} elseif (@in_array('L', $sql_meta[$tab1][$feld1])) {
			$t=($t=='1'?_JA_:_NEIN_);
		}
        if (p4n_mb_string('strpos', $sql_feld_geldbetrag, ','.$sql_tabs[$tab1][$feld1].',')!==false) {
            $t=number_format(doubleval(p4n_mb_string('str_replace', ',', '.', $t)), 2, ",", ".");
		}
		
		return $t;
	}
	
    function link2_post_tab($tabicon=-1,$text = '', $ziel = '', $bild='', $abfrage='', $other='', $iconl=false) {
        return link2_post($text, $ziel, $bild, $abfrage, $other, $tabicon, $iconl);
    }
     
	function link2_post($text, $ziel, $bild='', $abfrage='', $other='', $tabicon=-1, $iconl=false) {
        $tab=false;
        if ($tabicon>-1 && (file_exists('tabs.php') && $_SESSION['widget_tabs'] && $_SESSION['widget_tabs']==true)) {
            $tab=true;
        } else {
            $tabicon=-1;
        }
		if ($text=='0') {} elseif (p4n_mb_string('strlen', $ziel)<300 or $text=='') {
			//return link2($text, $ziel, $bild, $abfrage, $other);
		}
        
        $icon='icon icon-tab';
        if ($iconl) {
            $icon='icon icon-l';
        }
        
		$klink='';
		$form2=new htmlform;
		$expl=explode('?', $ziel);
		$url1=$expl[0];
		$klink.=$form2->start('tform_post', $url1, 'POST', false, 'class="link2_post" style="display:inline" '.($tab?'target="main"':''));
		$expl2=explode('&', $expl[1]);
		while (list($key, $val)=@each($expl2)) {
			$expl3=explode('=', $val);
			$klink.=$form2->hidden($expl3[0], str_replace('"', '&quot;', urldecode($expl3[1])));
			if ($expl3[0]=='sql') {
				$klink.=$form2->hidden('sqlp', '1');
			}
		}
		$klink.=$form2->submit('submit_post', $text,'style="'.($tabicon==0 || $tabicon==2?'display:none':'display:inline-block').'"');
        $klink.=$tab?$form2->submit('submit_post_tab', (($tabicon>0)?'&nbsp;':$text),'class="link2_post_tab '.(($tabicon>0)?$icon:'').'" '.(($tabicon>0)?'':'style="display:inline;"')):'';
		$klink.=$form2->ende();
        $klink=$tab?'<div style="display:inline;white-space:nowrap">'.$klink.'</div>':$klink;
		return $klink;
	}
    
    function oltext_post_tab($tabicon=-1, $text, $linktext='', $link='', $ueberschrift='', $breite=300, $extras='', $keine_werte=false) {
        return oltext_post($text, $linktext, $link, $ueberschrift, $breite, $extras, $keine_werte, $tabicon);
    }
    
	function oltext_post($text, $linktext='', $link='', $ueberschrift='', $breite=300, $extras='', $keine_werte=false, $tabicon=-1) {
        $tab=false;
        if ($tabicon>-1 && (file_exists('tabs.php') && $_SESSION['widget_tabs'] && $_SESSION['widget_tabs']==true)) {
            $tab=true;
        } else {
            $tabicon=-1;
        }
		if (p4n_mb_string('strlen', $link)<300 or $link=='') {
			return oltext($text, $linktext, $link, $ueberschrift, $breite, $extras, $keine_werte);
		}
		$klink='';
		$form=new htmlform;
		$expl=explode('?', $link);
		$url1=$expl[0];
        
        $target='';
		if ($tab) {
           $target=' target="main"';
        }
        
		$klink.=$form->start('tform_post', $url1, 'POST', false, 'class="oltext_post" style="display:inline" '.$target);
		$expl2=explode('&', $expl[1]);
		while (list($key, $val)=@each($expl2)) {
			$expl3=explode('=', $val);
			$klink.=$form->hidden($expl3[0], urldecode($expl3[1]));
			if ($expl3[0]=='sql') {
				$klink.=$form->hidden('sqlp', '1');
			}
		}
        
		$klink.=$form->submit('submit_post', _LISTEKURZ_,'style="'.($tabicon==0 || $tabicon==2?'display:none;':'display:inline-block;').'"');
        $klink.=$tab?$form->submit('submit_post_tab', (($tabicon>0)?'&nbsp;':_LISTEKURZ_),'class="oltext_post_tab '.(($tabicon>0)?'icon icon-tab':'').'" '.(($tabicon>0)?'':'style="display:inline;"')):'';
        $klink.=$form->ende();
        $klink=$tab?'<div style="display:inline;white-space:nowrap">'.$klink.'</div>':$klink;
		return (($linktext!='')?oltext($text, $linktext, '', $ueberschrift, $breite, $extras, $keine_werte):'').$klink;
	}
	
	function kunde_mand_recht($stid) {
		global $db, $sql_tab, $sql_tabs, $sql_meta, $id_werte_global, $sql_tab_id, $sql_tab_ids, $ADODB_FETCH_MODE, $cfg_carlo_appserver, $cfg_carlo_appserver_lagerorte, $cfg_kunde_mandlao, $lang, $cfg_filter_mandlao_sperre, $sql_feld_geldbetrag, $sql_feld_geldbetrag_array;
		
		if ($_SESSION['benutzer_mandant']=='-1') {
			return true;
		}
		
		$rechtda=false;
		$res=$db->select(
			$sql_tab['stammdaten'],
			array(
				$sql_tabs['stammdaten']['mandant'],
				$sql_tabs['stammdaten']['vpb']
			),
			$sql_tabs['stammdaten']['id'].'='.$db->dbzahl($stid)
		);
		if ($row=$db->zeile($res)) {
			if (p4n_mb_string('strpos', ','.$_SESSION['benutzer_mandant'].',', ','.$row[0].',')!==false) {
				$rechtda=true;
			}
		}
		
		return $rechtda;
	}
	
	function preg_quote3($t) {
		$t=p4n_mb_string('str_replace', '/', '\\/', preg_quote($t));
		$t=p4n_mb_string('str_replace', '\\*', '*', $t);
		return $t;
	}
	
	function vorlage_kdaten_ersetzen($replace_text, $firma, $vorname, $name, $titel, $anrede, $stid=0, $firma3='') {
//echo 	$firma.'/'.$vorname.'/'.$name.'/'.$titel.'/'.$anrede.'<br>';
		global $db, $sql_tab, $sql_tabs, $cfg_carlo_appserver_ws, $ist_docx, $alle_ersetzungen, $cfg_kfzsuche_holland, $apid, $keinap;
		$etiketten=false;
		
					$nexpl=explode('   ', $firma);
					$schonexpl=false;
					if (count($nexpl)>=2) {
						$schonexpl=true;
						$zk1=$nexpl[0];
						$zk2='';
						for ($zki=1; $zki<count($nexpl); $zki++) {
							$zk2.=' '.$nexpl[$zki];
						}
					 	$firma=trim($zk1."\n\\par ".trim($zk2));
					}
				
				// Name splitten 2 Zeilen:
					$nexpl=explode('   ', $name);
					$schonexpl=false;
					if (count($nexpl)>=2) {
						$schonexpl=true;
						$zk1=$nexpl[0];
						$zk2='';
						for ($zki=1; $zki<count($nexpl); $zki++) {
							$zk2.=' '.$nexpl[$zki];
						}
						$merkename_ba=trim($zk1);
						$name=trim($zk1."\n\\par ".trim($zk2));
					}
		
		if ($firma!='') {
			
			if ($name!='' and $name!=$firma and $vorname!='' and !preg_match('/'.preg_quote($vorname).'/i', $firma)) {
				if (!preg_match('/\n/', $name) and !preg_match('/\n/', $firma)) {
					$firma=trim(trim($vorname.' '.$name)."\n\\par ".$firma);
				} else {
					$firma=trim(trim($vorname.' '.$name).' '.$firma);
				}
			} else {
				if ($name!='' and $name!=$firma) {
					$firma=trim($name.' '.$firma);
				}
				if ($vorname!='' and !preg_match('/'.preg_quote($vorname).'/i', $firma)) {
					$firma=trim($vorname.' '.$firma);
				}
			}
			
			if ($stid>0) {
				$zusapw=' and '.$sql_tabs['stammdaten_ansprechpartner']['hauptkontakt'].'='.$db->dblogic(true);
				if (isset($apid)) {
					if ($apid>0) {
						$zusapw=' and '.$sql_tabs['stammdaten_ansprechpartner']['ansprechpartner_id'].'='.$db->dbzahl($apid);
					} elseif ($keinap) {
						$zusapw=' and '.$sql_tabs['stammdaten_ansprechpartner']['ansprechpartner_id'].'='.$db->dbzahl(-1234);
					}
				}
				$res=$db->select(
					$sql_tab['stammdaten_ansprechpartner'],
					array(
						$sql_tabs['stammdaten_ansprechpartner']['anrede'],
						$sql_tabs['stammdaten_ansprechpartner']['vorname'],
						$sql_tabs['stammdaten_ansprechpartner']['bezeichnung'],
						$sql_tabs['stammdaten_ansprechpartner']['titel'],
						$sql_tabs['stammdaten_ansprechpartner']['zusatz4'],
						$sql_tabs['stammdaten_ansprechpartner']['zusatz5']
					),
					$sql_tabs['stammdaten_ansprechpartner']['stammdaten_id'].'='.$db->dbzahl($stid).$zusapw,
					$sql_tabs['stammdaten_ansprechpartner']['bezeichnung']
					//$sql_tabs['stammdaten_ansprechpartner']['hauptkontakt'].' desc, '.$sql_tabs['stammdaten_ansprechpartner']['ansprechpartner_id']
				);
				if ($row=$db->zeile($res)) {
					$briefanr='';
					$replace_text=sb_ersetzen('<<anrede2>>', $row[0], $replace_text, $etiketten);
					if (p4n_mb_string('strtolower',$row[0])==p4n_mb_string('strtolower',_HERR_)) {
						$briefanr=_BRIEFANREDE_HERR_;
					} elseif (p4n_mb_string('strtolower',$row[0])==p4n_mb_string('strtolower',_FRAU_)) {
						$briefanr=_BRIEFANREDE_FRAU_;
					}
					if ($briefanr!='' and $row[2]!='') {
						$replace_text=sb_ersetzen('/<<anrede>>/', $firma, $replace_text, $etiketten);
						$replace_text=sb_ersetzen('/<<briefanrede>>/', $briefanr, $replace_text, $etiketten);
						$replace_text=sb_ersetzen('/<<titel>>[^<]*<<vorname>>/', '<<name>>', $replace_text, $etiketten);
						$replace_text=sb_ersetzen('/<<titel>>[^<]*<<name>>/', '<<name>>', $replace_text, $etiketten);
						$replace_text=sb_ersetzen('/<<vorname>>[^<]*<<name>>/', ($row[0]!=''?$row[0].' ':'').($row[3]!=''?$row[3].' ':'').trim($row[1].' '.$row[2]), $replace_text, $etiketten);
						$replace_text=sb_ersetzen('/<<name>>/', ($row[0]!=''?$row[0].' ':'').($row[3]!=''?$row[3].' ':'').$row[2], $replace_text, $etiketten);
					} else {
						$replace_text=sb_ersetzen('/<<briefanrede>>.*<<mn>>.*<<name>>/i', _BRIEFANREDE_FIRMA_, $replace_text, $etiketten);
						$replace_text=sb_ersetzen('/<<briefanrede>>[^<]*<<name>>/i', _BRIEFANREDE_FIRMA_, $replace_text, $etiketten);
						$replace_text=sb_ersetzen('/<<briefanrede>>.*<<titel>>.*<<name>>/i', _BRIEFANREDE_FIRMA_, $replace_text, $etiketten);
					}
				} else {
					$replace_text=sb_ersetzen('/<<briefanrede>>[^<]*<<name>>/i', _BRIEFANREDE_FIRMA_, $replace_text, $etiketten);
					$replace_text=sb_ersetzen('/<<briefanrede>>.*<<titel>>.*<<name>>/i', _BRIEFANREDE_FIRMA_, $replace_text, $etiketten);
				}
			}
			if ($briefanr=='') {
//				$replace_text=sb_ersetzen('/<<briefanrede>>.*<<mn>>.*<<name>>/Uis', _BRIEFANREDE_FIRMA_, $replace_text, $etiketten);
			}
			$replace_text=sb_ersetzen('/<<anrede>>/', '', $replace_text, $etiketten);
			$replace_text=sb_ersetzen('/<<titel>>[^<]*<<vorname>>/', '<<name>>', $replace_text, $etiketten);
			$replace_text=sb_ersetzen('/<<titel>>[^<]*<<name>>/', '<<name>>', $replace_text, $etiketten);
			$replace_text=sb_ersetzen('/<<vorname>>[^<]*<<name>>/', $firma, $replace_text, $etiketten);
			$replace_text=sb_ersetzen('/<<name>>/', $firma, $replace_text, $etiketten);
			$replace_text=sb_ersetzen('/<<titel>>/', '', $replace_text, $etiketten);
		} else {
			$replace_text=sb_ersetzen('<<anrede2>>', $anrede, $replace_text, $etiketten);
			if ($anrede=='Firma') {
				$anrede='';
			}
			if ($anrede=='Herr') {
				$anrede='Herrn';
			}
			$briefanr='';
			if (p4n_mb_string('strtolower',$anrede)==p4n_mb_string('strtolower',_HERR_) or p4n_mb_string('strtolower',$anrede)=='herrn') {
				$briefanr=_BRIEFANREDE_HERR_;
			} elseif (p4n_mb_string('strtolower',$anrede)==p4n_mb_string('strtolower',_FRAU_)) {
				$briefanr=_BRIEFANREDE_FRAU_;
			}
			if ($cfg_carlo_appserver_ws and $briefanr=='') {
				$res9=$db->select(
					$sql_tab['stammdaten'],
					$sql_tabs['stammdaten']['briefanrede'],
					$sql_tabs['stammdaten']['anrede'].'='.$db->str($anrede).' and '.$sql_tabs['stammdaten']['briefanrede'].'!='.$db->str('')
				);
				$alle_ba=array();
				while ($row9=$db->zeile($res9)) {
					$alle_ba[$row9[0]]++;
				}
				@arsort($alle_ba);
				if (list($key, $val)=@each($alle_ba)) {
					$briefanr=$key;
				}
			}
			if ($briefanr!='') {
				if (preg_match('/<<mn>>/i', $replace_text)) {
					$replace_text=sb_ersetzen('/<<briefanrede>>[^<]*<<name>>/i', trim($briefanr.' '.($titel!=''?$titel.' ':'').($firma3!=''?p4n_mb_string('ucfirst', $firma3).' ':'').trim($name)), $replace_text, $etiketten);
				}
				$replace_text=sb_ersetzen('/<<briefanrede>>[^<]*<<name>>/i', trim($briefanr.' '.($titel!=''?$titel.' ':'').trim($name)), $replace_text, $etiketten);
				$replace_text=sb_ersetzen('/<<briefanrede>>/i', $briefanr, $replace_text, $etiketten);
			}
			$replace_text=sb_ersetzen('/<<briefanrede>>[^<]*<<name>>/i', _BRIEFANREDE_FIRMA_, $replace_text, $etiketten);
			$replace_text=sb_ersetzen('/<<briefanrede>>/i', _BRIEFANREDE_FIRMA_, $replace_text, $etiketten);
			$replace_text=sb_ersetzen('/<<vorname>>[^<]*<<name>>/', ($titel!=''?$titel.' ':'').trim($vorname.' '.$name), $replace_text, $etiketten);
			$replace_text=sb_ersetzen('/<<name>>/', ($titel!=''?$titel.' ':'').$name, $replace_text, $etiketten);
			$replace_text=sb_ersetzen('/<<mn>>/i', p4n_mb_string('ucfirst', $firma3), $replace_text, $etiketten);
		}
		return $replace_text;
	}
	
	function f_as_html($t) {
		return p4n_mb_string('str_replace', '"', '&quot;', $t);
	}
	
	function kunde_dseinfo($stid, $mitol=false, $kurz=false, $returnnurtext=false) {
		global $sql_tab, $sql_tabs, $db, $sql_meta, $cfg_dse_email, $cfg_dse_sms, $cfg_dse_zweiteseite, $ol, $cfg_dse3_uebersicht_raus, $ist_ueber, $cfg_dse_keine_unterschrift, $cfg_carlo_dsk_neu, $cfg_dse_kein_fax, $cfg_dse_robinson_raus, $cfg_neuanlage_dsehaken, $cfg_dseneudok_uebersicht, $cfg_care_neuefelder;
		global $cross_templ, $cfg_pundf, $cfg_skoda_vap;
		global $cfg_dse_warnung_tage, $dsewarnung_text, $cfg_dse_andere_mand, $cfg_s4_dse_v2, $cfg_appserver_dse_username, $cfg_vaudis_keinemarkendse, $cfg_vaudisdse_abk;
		$infoblock='';
		
        if ($cfg_skoda_vap) {
			$skoda_dse='';
						$zusid1=0;
						$zusid2=0;
						$zusid3=0;
						$res8=$db->select(
							$sql_tab['stammdaten_zusatz'],
							$sql_tabs['stammdaten_zusatz']['zusatz_id'],
							$sql_tabs['stammdaten_zusatz']['bezeichnung'].'='.$db->str('Skoda DSE vorhanden')
						);
						if ($row8=$db->zeile($res8)) {
							$zusid1=$row8[0];
						}
						$res8=$db->select(
							$sql_tab['stammdaten_zusatz'],
							$sql_tabs['stammdaten_zusatz']['zusatz_id'],
							$sql_tabs['stammdaten_zusatz']['bezeichnung'].'='.$db->str('Skoda DSE Datum')
						);
						if ($row8=$db->zeile($res8)) {
							$zusid2=$row8[0];
						}
						$res8=$db->select(
							$sql_tab['stammdaten_zusatz'],
							$sql_tabs['stammdaten_zusatz']['zusatz_id'],
							$sql_tabs['stammdaten_zusatz']['bezeichnung'].'='.$db->str('Skoda DSE Details')
						);
						if ($row8=$db->zeile($res8)) {
							$zusid3=$row8[0];
						}
						$skds1=false;
						$skds2=false;
						$skds3=false;
						$skdsd='';
						$skdsda='';
						$res8=$db->select(
							$sql_tab['zusatzfelder'],
							array(
								$sql_tab['zusatzfelder'].'.zf_'.$zusid1,
								$sql_tab['zusatzfelder'].'.zf_'.$zusid2,
								$sql_tab['zusatzfelder'].'.zf_'.$zusid3
							),
							$sql_tabs['zusatzfelder']['stammdaten_id'].'='.$db->dbzahl($stid)
						);
						if ($row8=$db->zeile($res8)) {
							$skdsd=$db->unixdate($row8[1]);
							$sk_det='';
							if ($row8[0]=='ja') {
								$sk_det.='Post:';
								if (preg_match('/Post/i', $row8[2])) {
									$sk_det.='J';
								} else {
									$sk_det.='N';
								}
								$sk_det.=', Telefon-SMS:';
								if (preg_match('/Telefon/i', $row8[2])) {
									$sk_det.='J';
								} else {
									$sk_det.='N';
								}
								$sk_det.=', E-Mail:';
								if (preg_match('/Mail/i', $row8[2])) {
									$sk_det.='J';
								} else {
									$sk_det.='N';
								}
								$sk_det.=', '.$skdsd;
								$infoblock.='Skoda: '.$sk_det.'<br>';
							}
						}
		}
		
		$bl3d='';
					$res3=$db->select(
						$sql_tab['stammdaten'],
						array(
							$sql_tabs['stammdaten']['blacklist'],
							$sql_tabs['stammdaten']['blacklist_temp'],
							$sql_tabs['stammdaten']['blacklist_datum'],
							$sql_tabs['stammdaten']['blacklist_temp_datum'],
							$sql_tabs['stammdaten']['blacklist3'],
							$sql_tabs['stammdaten']['blacklist3_datum'],		// 5
							$sql_tabs['stammdaten']['blacklist4_detail'],
							$sql_tabs['stammdaten']['blacklist3_detail'],
							$sql_tabs['stammdaten']['blacklist5_detail'],
							$sql_tabs['stammdaten']['mandant']
						),
						$sql_tabs['stammdaten']['id'].'='.$db->dbzahl($stid)
					);
					$row3=$db->zeile($res3);
					$bl3d=$row3[7];
					$merke_mand=intval($row3[9]);
					if ($row3[0]=='1') {
						$infoblock.='<font color=red><b>'._WF_BL1_.' '._SEIT_.': '.$db->unixdate($row3[2]).'</b></font><br>';
					}
					if ($row3[1]=='1') {
						$infoblock.='<font color=red><b>'._WF_BL2_.' '._SEIT_.': '.$db->unixdate($row3[3]).'</b></font><br>';
					}
					if (!$cfg_vaudis_keinemarkendse and $row3[8]!='') {
						$bl4_det=$row3[8];//p4n_mb_string('str_replace', array(_DATENSCHUTZ1K_2_, _DATENSCHUTZ1K_3_, _DATENSCHUTZ1K_4_, _DATENSCHUTZ1K_5_, _DATENSCHUTZ1K_6_, _DATENSCHUTZ1K_7_, _DATENSCHUTZ1K_8_), array('<font color=green><b>'._DATENSCHUTZ1K_2_.'</b></font>', '<font color=green><b>'._DATENSCHUTZ1K_3_.'</b></font>', '<font color=green><b>'._DATENSCHUTZ1K_4_.'</b></font>', '<font color=green><b>'._DATENSCHUTZ1K_5_.'</b></font>', '<font color=green><b>'._DATENSCHUTZ1K_6_.'</b></font>', '<font color=green><b>'._DATENSCHUTZ1K_7_.'</b></font>', '<font color=green><b>'._DATENSCHUTZ1K_8_.'</b></font>'), $row3[8]);
						$expl1=explode(';', $bl4_det);
						$expl2=explode(' ', $bl4_det);
						if (count($expl2)>count($expl1)) {
							$expl1=$expl2;
						}
						$bl4_det='';
						$zae_vdse=0;
						while (list($keyd, $vald)=@each($expl1)) {
							$zae_vdse++;
                            $neud='';
							if (preg_match('/([\w|\-äöüß]+)=(.+)/i', $vald, $matc)) {
								$neud.='<b>'.$matc[1].'</b>: ';
								$xpl3=explode('|', $matc[2]);
								$link_weit=false;
								while (list($keyd2, $vald2)=@each($xpl3)) {
									if (substr($vald2, -1)=='J') {
										$vald2='<font color=green>'.$vald2.'</font>';
									} elseif (substr($vald2, -1)=='N') {
										$vald2='<font color=red>'.$vald2.'</font>';
									} else {
										if (preg_match('/Datum:(\d\d\d\d\-\d\d\-\d\d)/', $vald2, $matc2)) {
											$vald2='Datum: '.$db->unixdate($matc2[1]);
										}
									}
									$neud.=$vald2.', ';
								}
								$neud=substr($neud, 0, -2);
								$vald=$neud;
							}
							if (!$link_weit and $cfg_vaudisdse_abk and $zae_vdse>=3) {
								$link_weit=true;
								$bl4_det.=link2(_WEITERE_, 'javascript: document.getElementById(\'vaudisdseweitere\').style.display=\'block\'; void(0);').'<br><div id="vaudisdseweitere" style="display: none;">';
							}
							$bl4_det.=trim($vald).'<br>';
						}
						if ($link_weit) {
							$bl4_det.='</div><br>';
						}
						if ($cfg_dse_zweiteseite) {
							$bl4_det=_ZWEITESEITE_.': '.$bl4_det;
						}
						$bl4_det=p4n_mb_string('substr', $bl4_det, 0, -4);
						if ($cross_templ) {
							if ($infoblock!='') {
								$infoblock.='<hr>';
							}
							$infoblock.='Cross:<br>';
						}
						$infoblock.=$bl4_det.'<br>';
					}
					if ($row3[6]!='') {
						$bl4_det=p4n_mb_string('str_replace', array('kein Kontakt', 'Post', 'uneingeschränkt', 'Tel./E-Mail/SMS'), array('<font color=red><b>kein Kontakt</b></font>', '<font color=green><b>Post</b></font>', '<font color=green><b>uneingeschränkt</b></font>', '<font color=green><b>Tel./E-Mail/SMS</b></font>'), $row3[6]);
						$expl1=explode(';', $bl4_det);
						$bl4_det='';
						while (list($keyd, $vald)=@each($expl1)) {
							$bl4_det.=trim($vald).'<br>';
						}
						$bl4_det=p4n_mb_string('substr', $bl4_det, 0, -4);
						if ($cross_templ) {
							if ($infoblock!='') {
								$infoblock.='<hr>';
							}
							$infoblock.='EVA:<br>';
						}
						$infoblock.=$bl4_det.'<br>';
					}
					$bl3_anzeige=true;
					if ($ist_ueber and $cfg_dse3_uebersicht_raus) {
						$bl3_anzeige=false;
					}
					if ($kurz) {
						$bl3_anzeige=false;
					}
					if ($bl3_anzeige) {// and $row3[4]=='1') {
						
						$zi_g_max=2;
						
						$alle_dse_mands=array();
						$res4=$db->select(
							$sql_tab['stammdaten_blacklist_log'],
							$sql_tabs['stammdaten_blacklist_log']['mandant_id'],
							$sql_tabs['stammdaten_blacklist_log']['stammdaten_id'].'='.$db->dbzahl($stid)
						);
						while ($row4=$db->zeile($res4)) {
							if (intval($row4[0])>=1) {
								$alle_dse_mands[$row4[0]]++;
							}
						}
						if (count($alle_dse_mands)>=2) {
							$zi_g_max=99999;
						}
						$letzte_dse=0;
						$sqlt_bl=array(
								$sql_tabs['stammdaten_blacklist_log']['art'],
								$sql_tabs['stammdaten_blacklist_log']['datum'],
								$sql_tabs['stammdaten_blacklist_log']['benutzer_id'],
								$sql_tabs['stammdaten_blacklist_log']['doclink'],
								$sql_tabs['stammdaten_blacklist_log']['blacklist'],
								$sql_tabs['stammdaten_blacklist_log']['blacklist_zusatz1'],	// 5
								$sql_tabs['stammdaten_blacklist_log']['blacklist_zusatz2'],
								$sql_tabs['stammdaten_blacklist_log']['blacklist_zusatz3'],
								$sql_tabs['stammdaten_blacklist_log']['blacklist_zusatz4'],
								$sql_tabs['stammdaten_blacklist_log']['blacklist_zusatz5'],
								$sql_tabs['stammdaten_blacklist_log']['blacklist_zusatz6'],	// 10
								$sql_tabs['stammdaten_blacklist_log']['blacklist_zusatztext4'],
								$sql_tabs['stammdaten_blacklist_log']['blacklist_zusatztext1'],
								$sql_tabs['stammdaten_blacklist_log']['blacklist_zusatztext2'],
								$sql_tabs['stammdaten_blacklist_log']['blacklist_zusatztext3'],

								$sql_tabs['stammdaten_blacklist_log']['blacklist_brief'],		// 15
								$sql_tabs['stammdaten_blacklist_log']['blacklist_email'],
								$sql_tabs['stammdaten_blacklist_log']['blacklist_sms'],
								$sql_tabs['stammdaten_blacklist_log']['blacklist_fax'],
								$sql_tabs['stammdaten_blacklist_log']['blacklist_festnetz'],
								$sql_tabs['stammdaten_blacklist_log']['blacklist_mobilfon'],		// 20
								$sql_tabs['stammdaten_blacklist_log']['blacklist_ablehnung'],
								$sql_tabs['stammdaten_blacklist_log']['blacklist_bemerkung'],
								$sql_tabs['stammdaten_blacklist_log']['mandant_id'],
								$sql_tabs['stammdaten_blacklist_log']['markencode'],
								$sql_tabs['stammdaten_blacklist_log']['stammdaten_blacklist_log_id']
						);
                        if (isset($sql_tabs['stammdaten_blacklist_log']['blacklist_opel_hersteller'])) {
                            $sqlt_bl[]=$sql_tabs['stammdaten_blacklist_log']['blacklist_opel_post'];		// 26
                            $sqlt_bl[]=$sql_tabs['stammdaten_blacklist_log']['blacklist_opel_email'];
                            $sqlt_bl[]=$sql_tabs['stammdaten_blacklist_log']['blacklist_opel_telefon'];
                            $sqlt_bl[]=$sql_tabs['stammdaten_blacklist_log']['blacklist_opel_mobilfon'];
                            $sqlt_bl[]=$sql_tabs['stammdaten_blacklist_log']['blacklist_opel_fax'];			// 30
                            $sqlt_bl[]=$sql_tabs['stammdaten_blacklist_log']['blacklist_opel_smsmms'];
                            $sqlt_bl[]=$sql_tabs['stammdaten_blacklist_log']['blacklist_opel_hersteller'];
                            $sqlt_bl[]=$sql_tabs['stammdaten_blacklist_log']['blacklist_opel_sperre_ah'];
                        }
                        $sqlt_bl[]=$sql_tabs['stammdaten_blacklist_log']['blacklist_festnetz_g'];	// 26 oder 34
                        $sqlt_bl[]=$sql_tabs['stammdaten_blacklist_log']['blacklist_mobilfon_g'];
                        if ($cfg_pundf) {
                            $sqlt_bl[]=$sql_tabs['stammdaten_blacklist_log']['blacklist_opel_telefon_g'];
                        }
						if ($cfg_dse_andere_mand) {
							$sqlt_bl[]=$sql_tabs['stammdaten_blacklist_log']['blacklist_anderemand'];
						}
						if ($cfg_s4_dse_v2) {
							$sqlt_bl[]=$sql_tabs['stammdaten_blacklist_log']['blacklist_telzus_1'];
							$sqlt_bl[]=$sql_tabs['stammdaten_blacklist_log']['blacklist_telzus_2'];
							$sqlt_bl[]=$sql_tabs['stammdaten_blacklist_log']['blacklist_analyse'];
							$sqlt_bl[]=$sql_tabs['stammdaten_blacklist_log']['blacklist_ablehnung_grund'];
						}
                        $dse_doc='';
						$res4=$db->select(
							$sql_tab['stammdaten_blacklist_log'],
							$sqlt_bl,
							$sql_tabs['stammdaten_blacklist_log']['stammdaten_id'].'='.$db->dbzahl($stid).' and '.
                        	$sql_tabs['stammdaten_blacklist_log']['doclink'].'!='.$db->str(''),
							$sql_tabs['stammdaten_blacklist_log']['datum'].' desc, '.$sql_tabs['stammdaten_blacklist_log']['stammdaten_blacklist_log_id'].' desc'
						);
						while ($row4=$db->zeile($res4)) {
							if ($row4[3]!='' and $dse_doc=='') {
								$dse_doc=$row4[3];
							}
						}
                        
                        $res4=$db->select(
							$sql_tab['stammdaten_blacklist_log'],
							$sqlt_bl,
							$sql_tabs['stammdaten_blacklist_log']['stammdaten_id'].'='.$db->dbzahl($stid),
							$sql_tabs['stammdaten_blacklist_log']['datum'].' desc, '.$sql_tabs['stammdaten_blacklist_log']['stammdaten_blacklist_log_id'].' desc'
							//$sql_tabs['stammdaten_blacklist_log']['art'].' asc, '.$sql_tabs['stammdaten_blacklist_log']['datum'].' desc, '.$sql_tabs['stammdaten_blacklist_log']['stammdaten_blacklist_log_id'].' desc'
						);
						$alle_dse_mands2=array();
						$dse_info1='';
						$zi_g=0;
						$m_row4=array();
						//$dse_doc='';
						
						$allebl3_details='';
						$allebl3_details_nicht='';
						
						$alle_dse_mandart=array();
						
						while ($zi_g<$zi_g_max and $row4=$db->zeile($res4)) {
							if (count($m_row4)==0) {
								$m_row4=$row4;
							}
							$zi_g++;
							
							if ($row4[3]!='' and $dse_doc=='') {
								$dse_doc=$row4[3];
							}
							
							if ($zi_g_max==99999 and isset($alle_dse_mands2[$row4[23]])) {
								continue;
							}
							if (count($alle_dse_mands)>=2 and intval($row4[23])==0) {
								continue;
							}
							$alle_dse_mands2[$row4[23]]++;
							
							$schr_zus='';
							$tel_zus='';
							
							$mandzusinfo='';
							if (intval($row4[23])>0) {
								if (!isset($alle_mands[$row4[23]])) {
									$res9=$db->select(
										$sql_tab['mandant'],
										array(
											$sql_tabs['mandant']['bezeichnung'],
											$sql_tabs['mandant']['firma']
										),
										$sql_tabs['mandant']['mandant_id'].'='.$db->dbzahl($row4[23])
									);
									if ($row9=$db->zeile($res9)) {
										$alle_mands[$row4[23]]=$row9[0];
										if ($row9[1]!='') {
											$alle_mands[$row4[23]]=$row9[1];
										}
									}
								}
								$mandzusinfo=' / '.$alle_mands[$row4[23]];
							}
							
							if ($letzte_dse==0) {
								$letzte_dse=$db->unixdate_ts($row4[1]);
							}
							
							$m_dse_info1=$dse_info1;
							
							$dsebenutzerinfo=dbout($sql_tab['benutzer'], array($sql_tabs['benutzer']['vorname'], $sql_tabs['benutzer']['name']), $sql_tabs['benutzer']['benutzer_id'].'='.$db->dbzahl($row4[2]));
							if ($cfg_appserver_dse_username and $row4[14]!='') {
								$dsebenutzerinfo=_USERNAME.$row4[14];
							}
							
							$dse_info1.="\n".'<b>'.$db->unixdatetime($row4[1]).($row4[0]=='4'?' '._ZWEITESEITE_:'').$mandzusinfo.'</b> ('.$dsebenutzerinfo.'):'."\n";
							$dse_info1.='&nbsp;&nbsp;&nbsp;'._WF_BL3_.': '.($row4[4]=='1'?_JA_:_NEIN_)."\n";
							
							if ($row4[0]=='4' and isset($lang['_DATENSCHUTZ2K_2_'])) {
								$dse_info1.='&nbsp;&nbsp;&nbsp;'._DATENSCHUTZ2K_1_.': '.($row4[5]=='1'?_JA_:_NEIN_)."\n";
								$dse_info1.='&nbsp;&nbsp;&nbsp;'._DATENSCHUTZ2K_2_.': '.($row4[6]=='1'?_JA_:_NEIN_)."\n";
								$dse_info1.='&nbsp;&nbsp;&nbsp;'._DATENSCHUTZ2K_3_.': '.($row4[7]=='1'?_JA_:_NEIN_)."\n";
								$dse_info1.='&nbsp;&nbsp;&nbsp;'._DATENSCHUTZ2K_4_.': '.($row4[8]=='1'?_JA_:_NEIN_)."\n";
								if ($_SESSION['cfg_kunde']=='carlo_bmw_runds') {
									$dse_info1.='&nbsp;&nbsp;&nbsp;'._DATENSCHUTZ2K_7_.': '.($row4[9]=='1'?_JA_:_NEIN_)."\n";
									$dse_info1.='&nbsp;&nbsp;&nbsp;'._DATENSCHUTZ2K_8_.': '.($row4[13]=='1'?_JA_:_NEIN_);
								} elseif (!$cfg_dse_keine_unterschrift) {
									$dse_info1.='&nbsp;&nbsp;&nbsp;'._DATENSCHUTZ2K_5_.': '.($row4[9]=='1'?_JA_:_NEIN_)."\n";
								}
							} else {
								$schr_zus='';
								if ($row4[15]=='1') {
									$schr_zus.=_DATENSCHUTZ1_2A_.',';
								}
								if ($row4[16]=='1') {
									$schr_zus.=_DATENSCHUTZ1_2B_.',';
								}
								if ($row4[17]=='1') {
									$schr_zus.=_DATENSCHUTZ1_2C_.',';
								}
								if ($row4[18]=='1' and !$cfg_dse_kein_fax) {
									$schr_zus.=_DATENSCHUTZ1_2D_.',';
								}
								if ($cfg_s4_dse_v2) {
									if ($row4['blacklist_telzus_1']=='1') {
										$schr_zus.=_DATENSCHUTZ1_2E_.',';
									}
									if ($row4['blacklist_telzus_2']=='1') {
										$schr_zus.=_DATENSCHUTZ1_2F_.',';
									}
								}
								if ($schr_zus!='') {
									$schr_zus=' ('.p4n_mb_string('substr', $schr_zus, 0, -1).')';
								}
								$tel_zus='';
								if ($row4[19]=='1') {
									$tel_zus.=_DATENSCHUTZ1_3A_.',';
								}
								if ($row4[20]=='1') {
									$tel_zus.=_DATENSCHUTZ1_3B_.',';
								}
								if (isset($sql_tabs['stammdaten_blacklist_log']['blacklist_opel_hersteller'])) {
									if ($row4[34]=='1') {
										$tel_zus.=_DATENSCHUTZ1_3C_.',';
									}
									if ($row4[35]=='1') {
										$tel_zus.=_DATENSCHUTZ1_3D_.',';
									}
								} else {
									if ($row4[26]=='1') {
										$tel_zus.=_DATENSCHUTZ1_3C_.',';
									}
									if ($row4[27]=='1') {
										$tel_zus.=_DATENSCHUTZ1_3D_.',';
									}
								}
								if ($tel_zus!='') {
									$tel_zus=' ('.p4n_mb_string('substr', $tel_zus, 0, -1).')';
								}
								$dse_info1.='&nbsp;&nbsp;&nbsp;'._DATENSCHUTZ1_1_.': '.($row4[5]=='1'?_JA_:_NEIN_)."\n";
								$dse_info1.='&nbsp;&nbsp;&nbsp;'._DATENSCHUTZ1_2_.': '.($row4[6]=='1'?_JA_:_NEIN_).$schr_zus."\n";
								$dse_info1.='&nbsp;&nbsp;&nbsp;'._DATENSCHUTZ1_3_.': '.($row4[7]=='1'?_JA_:_NEIN_).$tel_zus."\n";
								if ($cfg_s4_dse_v2) {
									$dse_info1.='&nbsp;&nbsp;&nbsp;'._DATENSCHUTZ1_9_.': '.($row4['blacklist_analyse']=='1'?_JA_:_NEIN_)."\n";
								}
								$dse_info1.='&nbsp;&nbsp;&nbsp;'._DATENSCHUTZ1_4_.': '.($row4[8]=='1'?_JA_:_NEIN_)."\n";
								$dse_info1.='&nbsp;&nbsp;&nbsp;'._DATENSCHUTZ1_5_.': '.($row4[9]=='1'?_JA_:_NEIN_)."\n";
								if ($cfg_carlo_dsk_neu) {
									$dse_info1.='&nbsp;&nbsp;&nbsp;'._DATENSCHUTZ1_N_.': '.($row4[21]=='1'?_JA_:_NEIN_).(($cfg_s4_dse_v2 and $row4['blacklist_ablehnung_grund']!='')?' ('.$row4['blacklist_ablehnung_grund'].')':'')."\n";
									$dse_info1.='&nbsp;&nbsp;&nbsp;'._BEMERKUNG_.': '.$row4[22]."\n";
								}
								if ($cfg_dse_andere_mand) {
									$dse_info1.='&nbsp;&nbsp;&nbsp;'._DATENSCHUTZ_ANDMAND_.': '.($row4['blacklist_anderemand']=='1'?_JA_:_NEIN_)."\n";
								}
							}
							if ($row4[10]=='1') {
								$dse_info1.="\n".'&nbsp;&nbsp;&nbsp;'._DATENSCHUTZ1_6_.': '.($row4[10]=='1'?_JA_:_NEIN_);
							}
							
							if ($_SESSION['cfg_kunde']=='carlo_bmw_runds') {
								if ($row4[11]!='') {
									$dse_info1.="\n".$row4[11];
								}
								if ($row4[12]!='') {
									$dse_info1.="\n".$row4[12];
								}
								if ($row4[13]!='') {
									$dse_info1.="\n".$row4[13];
								}
								if ($row4[14]!='') {
									$dse_info1.="\n".$row4[14];
								}
							} elseif ($row4[11]=='1') {
								$dse_info1.="\n".'&nbsp;&nbsp;&nbsp;'._DATENSCHUTZ1_8_.': '.($row4[11]=='1'?_JA_:_NEIN_);
							}
							
							$dse_info1.=($row4[3]!=''?' ('._DATEI_.': '.$row4[3].')':'')."\n";
							
							if (isset($row4[32]) and $row4[32]!='') {
								$dse_info2="\n".'<b>'.$db->unixdatetime($row4[1]).($row4[0]=='4'?' '._ZWEITESEITE_:'').$mandzusinfo.'</b> ('.$dsebenutzerinfo.'):'."\n";
						$dse_info2.='&nbsp;&nbsp;&nbsp;'._WF_BL3_.': '.($row4[4]=='1'?_JA_:_NEIN_)."\n";
						$dse_info2.='&nbsp;&nbsp;&nbsp;'._DATENSCHUTZ1_2A_.': '.$row4[26]."\n";
						$dse_info2.='&nbsp;&nbsp;&nbsp;'._DATENSCHUTZ1_2B_.': '.$row4[27]."\n";
						$dse_info2.='&nbsp;&nbsp;&nbsp;'._FESTNETZ_.': '.$row4[28]."\n";
                        if ($cfg_pundf) {
                            $dse_info2.='&nbsp;&nbsp;&nbsp;'._TELEFON_GESCHAEFTLICH_.': '.$row4[36]."\n";
                        }
						$dse_info2.='&nbsp;&nbsp;&nbsp;'._DATENSCHUTZ1_3B_.': '.$row4[29]."\n";
						$dse_info2.='&nbsp;&nbsp;&nbsp;'._DATENSCHUTZ1_2D_.': '.$row4[30]."\n";
						$dse_info2.='&nbsp;&nbsp;&nbsp;'._DATENSCHUTZ1_2C_.': '.$row4[31]."\n";
						$dse_info2.='&nbsp;&nbsp;&nbsp;'._WERBESPERRE_.': '.$row4[33]."\n";
						$dse_info2.='&nbsp;&nbsp;&nbsp;'._BEMERKUNG_.': '.$row4[22]."\n";
								if ($cfg_dse_andere_mand) {
									$dse_info2.='&nbsp;&nbsp;&nbsp;'._DATENSCHUTZ_ANDMAND_.': '.($row4['blacklist_anderemand']=='1'?_JA_:_NEIN_)."\n";
								}

								$dse_info1=$m_dse_info1;
								
								$dse_info1.=$dse_info2;
								$dseo_ja='';
								$dseo_nicht='';
								$dseo_ja_h='';
								$dseo_nicht_h='';
								$dseo_ja_ah='';
								$dseo_nicht_ah='';
								if ($row4[26]!='Allgemein') {
									if ($row4[26]=='Keine') {
//										$dseo_nicht.=_DATENSCHUTZ1_2A_.': '.$row4[26].', ';
										$dseo_nicht_h.=_DATENSCHUTZ1_2A_.', ';
										$dseo_nicht_ah.=_DATENSCHUTZ1_2A_.', ';
									} elseif ($row4[26]=='Händler') {
										$dseo_ja_ah.=_DATENSCHUTZ1_2A_.', ';
										$dseo_nicht_h.=_DATENSCHUTZ1_2A_.', ';
									} elseif ($row4[26]=='nur Hersteller') {
										$dseo_ja_h.=_DATENSCHUTZ1_2A_.', ';
										$dseo_nicht_ah.=_DATENSCHUTZ1_2A_.', ';
									}
								} else {
									$dseo_ja.=_DATENSCHUTZ1_2A_.', ';
									$dseo_ja_h.=_DATENSCHUTZ1_2A_.', ';
									$dseo_ja_ah.=_DATENSCHUTZ1_2A_.', ';
								}
								if ($row4[27]!='Allgemein') {
									if ($row4[27]=='Keine') {
//										$dseo_nicht.=_DATENSCHUTZ1_2B_.': '.$row4[27].', ';
										$dseo_nicht_h.=_DATENSCHUTZ1_2B_.', ';
										$dseo_nicht_ah.=_DATENSCHUTZ1_2B_.', ';
									} elseif ($row4[27]=='Händler') {
										$dseo_ja_ah.=_DATENSCHUTZ1_2B_.', ';
										$dseo_nicht_h.=_DATENSCHUTZ1_2B_.', ';
									} elseif ($row4[27]=='nur Hersteller') {
										$dseo_ja_h.=_DATENSCHUTZ1_2B_.', ';
										$dseo_nicht_ah.=_DATENSCHUTZ1_2B_.', ';
									}
								} else {
									$dseo_ja.=_DATENSCHUTZ1_2B_.', ';
									$dseo_ja_h.=_DATENSCHUTZ1_2B_.', ';
									$dseo_ja_ah.=_DATENSCHUTZ1_2B_.', ';
								}
								if ($row4[28]!='Allgemein') {
									if ($row4[28]=='Keine') {
//										$dseo_nicht.=_FESTNETZ_.': '.$row4[28].', ';
										$dseo_nicht_h.=_FESTNETZ_.', ';
										$dseo_nicht_ah.=_FESTNETZ_.', ';
									} elseif ($row4[28]=='Händler') {
										$dseo_ja_ah.=_FESTNETZ_.', ';
										$dseo_nicht_h.=_FESTNETZ_.', ';
									} elseif ($row4[28]=='nur Hersteller') {
										$dseo_ja_h.=_FESTNETZ_.', ';
										$dseo_nicht_ah.=_FESTNETZ_.', ';
									}
								} else {
									$dseo_ja.=_FESTNETZ_.', ';
									$dseo_ja_h.=_FESTNETZ_.', ';
									$dseo_ja_ah.=_FESTNETZ_.', ';
								}
								if ($row4[29]!='Allgemein') {
									if ($row4[29]=='Keine') {
//										$dseo_nicht.=_DATENSCHUTZ1_3B_.': '.$row4[29].', ';
										$dseo_nicht_h.=_DATENSCHUTZ1_3B_.', ';
										$dseo_nicht_ah.=_DATENSCHUTZ1_3B_.', ';
									} elseif ($row4[29]=='Händler') {
										$dseo_ja_ah.=_DATENSCHUTZ1_3B_.', ';
										$dseo_nicht_h.=_DATENSCHUTZ1_3B_.', ';
									} elseif ($row4[29]=='nur Hersteller') {
										$dseo_ja_h.=_DATENSCHUTZ1_3B_.', ';
										$dseo_nicht_ah.=_DATENSCHUTZ1_3B_.', ';
									}
								} else {
									$dseo_ja.=_DATENSCHUTZ1_3B_.', ';
									$dseo_ja_h.=_DATENSCHUTZ1_3B_.', ';
									$dseo_ja_ah.=_DATENSCHUTZ1_3B_.', ';
								}
								if ($row4[30]!='Allgemein') {
									if ($row4[30]=='Keine') {
//										$dseo_nicht.=_DATENSCHUTZ1_2D_.': '.$row4[30].', ';
										$dseo_nicht_h.=_DATENSCHUTZ1_2D_.', ';
										$dseo_nicht_ah.=_DATENSCHUTZ1_2D_.', ';
									} elseif ($row4[30]=='Händler') {
										$dseo_ja_ah.=_DATENSCHUTZ1_2D_.', ';
										$dseo_nicht_h.=_DATENSCHUTZ1_2D_.', ';
									} elseif ($row4[30]=='nur Hersteller') {
										$dseo_ja_h.=_DATENSCHUTZ1_2D_.', ';
										$dseo_nicht_ah.=_DATENSCHUTZ1_2D_.', ';
									}
								} else {
									$dseo_ja.=_DATENSCHUTZ1_2D_.', ';
									$dseo_ja_h.=_DATENSCHUTZ1_2D_.', ';
									$dseo_ja_ah.=_DATENSCHUTZ1_2D_.', ';
								}
								if ($row4[31]!='Allgemein') {
									if ($row4[31]=='Keine') {
//										$dseo_nicht.=_DATENSCHUTZ1_2C_.': '.$row4[31].', ';
										$dseo_nicht_h.=_DATENSCHUTZ1_2C_.', ';
										$dseo_nicht_ah.=_DATENSCHUTZ1_2C_.', ';
									} elseif ($row4[31]=='Händler') {
										$dseo_ja_ah.=_DATENSCHUTZ1_2C_.', ';
										$dseo_nicht_h.=_DATENSCHUTZ1_2C_.', ';
									} elseif ($row4[31]=='nur Hersteller') {
										$dseo_ja_h.=_DATENSCHUTZ1_2C_.', ';
										$dseo_nicht_ah.=_DATENSCHUTZ1_2C_.', ';
									}
								} else {
									$dseo_ja.=_DATENSCHUTZ1_2C_.', ';
									$dseo_ja_h.=_DATENSCHUTZ1_2C_.', ';
									$dseo_ja_ah.=_DATENSCHUTZ1_2C_.', ';
								}
								if ($cfg_pundf) {
                                    if ($row4[36]!='Allgemein') {
                                        if ($row4[36]=='Keine') {
                                            $dseo_nicht_h.=_TELEFON_GESCHAEFTLICH_.', ';
                                            $dseo_nicht_ah.=_TELEFON_GESCHAEFTLICH_.', ';
                                        } elseif ($row4[36]=='Händler') {
                                            $dseo_ja_ah.=_TELEFON_GESCHAEFTLICH_.', ';
                                            $dseo_nicht_h.=_TELEFON_GESCHAEFTLICH_.', ';
                                        } elseif ($row4[36]=='nur Hersteller') {
                                            $dseo_ja_h.=_TELEFON_GESCHAEFTLICH_.', ';
                                            $dseo_nicht_ah.=_TELEFON_GESCHAEFTLICH_.', ';
                                        }
                                    } else {
                                        $dseo_ja.=_TELEFON_GESCHAEFTLICH_.', ';
                                        $dseo_ja_h.=_TELEFON_GESCHAEFTLICH_.', ';
                                        $dseo_ja_ah.=_TELEFON_GESCHAEFTLICH_.', ';
                                    }
                                }
								/*
								if ($row4[28]!='Allgemein') {
									$dseo_nicht.=_FESTNETZ_.': '.$row4[28].', ';
								} else {
									$dseo_ja.=_FESTNETZ_.', ';
								}
								if ($row4[29]!='Allgemein') {
									$dseo_nicht.=_DATENSCHUTZ1_3B_.': '.$row4[29].', ';
								} else {
									$dseo_ja.=_DATENSCHUTZ1_3B_.', ';
								}
								if ($row4[30]!='Allgemein') {
									$dseo_nicht.=_DATENSCHUTZ1_2D_.': '.$row4[30].', ';
								} else {
									$dseo_ja.=_DATENSCHUTZ1_2D_.', ';
								}
								if ($row4[31]!='Allgemein') {
									$dseo_nicht.=_DATENSCHUTZ1_2C_.': '.$row4[31].', ';
								} else {
									$dseo_ja.=_DATENSCHUTZ1_2C_.', ';
								}
								*/
								if ($row4[33]!='Keine' and $row4[33]!='') {
									$dseo_nicht.=_WERBESPERRE_.': '.$row4[33].', ';
								}
								
								if (isset($alle_dse_mandart[$row4[0].'_'.$row4[23]])) {
									continue;
								}
								$alle_dse_mandart[$row4[0].'_'.$row4[23]]++;
								
								$janeindet='';
								if ($dseo_nicht!='' or $dseo_ja_ah!='' or $dseo_ja_h!='' or $dseo_nicht_ah!='' or $dseo_nicht_h!='') {
									$janeindet.=_WF_BL3_.$mandzusinfo.': ';
								}
								if ($bl3d!='' and $dseo_ja_ah!='') {
									$janeindet.=' <font color=green><b>'._HAENDLER_.': '.substr($dseo_ja_ah, 0, -2).'</b></font>';
								}
								if ($bl3d!='' and $dseo_ja_h!='') {
									$janeindet.=' <font color=green><b>'._HERSTELLER_.': '.substr($dseo_ja_h, 0, -2).'</b></font>';
								}
								if ($bl3d!='' and $dseo_nicht_ah!='') {
									$janeindet.=' <font color=red><b>'._HAENDLER_.': '.substr($dseo_nicht_ah, 0, -2).'</b></font>';
								}
								if ($bl3d!='' and $dseo_nicht_h!='') {
									$janeindet.=' <font color=red><b>'._HERSTELLER_.': '.substr($dseo_nicht_h, 0, -2).'</b></font>';
								}
								if ($bl3d!='' and $dseo_nicht!='') {
									$janeindet.=' <font color=red><b>'.substr($dseo_nicht, 0, -2).'</b></font>';
								}
								/*
								if ($dseo_ja!='') {
									$janeindet.=_WF_BL3_.$mandzusinfo.': '.'<font color=green><b>'.substr($dseo_ja, 0, -2).'</b></font>';
								}
								if ($dseo_nicht!='') {
									$janeindet.=($janeindet==''?_WF_BL3_.$mandzusinfo.': ':' ').'<font color=red><b>'.substr($dseo_nicht, 0, -2).'</b></font>';
								}
								*/
								$allebl3_details.=$janeindet;
								$allebl3_details.='<br>';
								continue;
							}
							
							if (isset($alle_dse_mandart[$row4[0].'_'.$row4[23]])) {
								continue;
							}
							$alle_dse_mandart[$row4[0].'_'.$row4[23]]++;
							
							// grün/rot:
							$bl3_details='';
							$bl3_details_nicht='';
							
							if ($row4[6]=='1') {
								$bl3_details.=_DATENSCHUTZ1K_2_.$schr_zus.',';
							} else {
								$bl3_details_nicht.=_DATENSCHUTZ1K_2_.',';
							}
							if ($row4[7]=='1') {
								$bl3_details.=_DATENSCHUTZ1K_3_.$tel_zus.',';
							} else {
								$bl3_details_nicht.=_DATENSCHUTZ1K_3_.',';
							}
							if ($cross_templ) {
							
							} else {
							if ($row4[8]=='1') {
								$bl3_details.=_DATENSCHUTZ1K_4_.',';
							} else {
								$bl3_details_nicht.=_DATENSCHUTZ1K_4_.',';
							}
							}
							if ($_SESSION['cfg_kunde']!='carlo_bmw_runds') {
								if ($row4[9]=='1' and !$cfg_dse_keine_unterschrift) {
									$bl3_details.=_DATENSCHUTZ1K_5_.',';
								} elseif (!$cfg_dse_keine_unterschrift) {
									$bl3_details_nicht.=_DATENSCHUTZ1K_5_.',';
								}
							}
							if ($cfg_dse_email) {
								if ($row4[10]=='1') {
									$bl3_details.=_DATENSCHUTZ1K_6_.',';
								} else {
									$bl3_details_nicht.=_DATENSCHUTZ1K_6_.',';
								}
							}
							if ($cfg_dse_sms) {
								if ($row4[11]=='1') {
									$bl3_details.=_DATENSCHUTZ1K_8_.',';
								} else {
									$bl3_details_nicht.=_DATENSCHUTZ1K_8_.',';
								}
							}
							if ($cfg_care_neuefelder or ($_SESSION['cfg_kunde']=='carlo_vw_wolfsburg' and ($merke_mand==10 or $merke_mand==20 or $merke_mand==30 or $merke_mand==40))) {
								if ($row4[16]!='1') {
									$bl3_details_nicht.=_DATENSCHUTZ1_2B_.',';
								}
								if ($row4[17]!='1') {
									$bl3_details_nicht.=_DATENSCHUTZ1_2C_.',';
								}
								if ($row4[18]!='1') {
									$bl3_details_nicht.=_DATENSCHUTZ1_2D_.',';
								}
							}
							if ($cfg_s4_dse_v2) {
								if ($row4['blacklist_analyse']=='1') {
									$bl3_details.=_DATENSCHUTZ1K_9_.',';
								} else {
									$bl3_details_nicht.=_DATENSCHUTZ1K_9_.',';
								}
							}
							if ($cfg_dse_andere_mand) {
								if ($row4['blacklist_anderemand']=='1') {
									$bl3_details.=_DATENSCHUTZK_ANDMAND_.',';
								} else {
									$bl3_details_nicht.=_DATENSCHUTZK_ANDMAND_.',';
								}
							}
							if ($bl3_details!='') {
								$bl3_details=' ('.p4n_mb_string('substr', $bl3_details, 0, -1).')';
							}
							if ($bl3_details_nicht!='') {
								$bl3_details_nicht=' '.p4n_mb_string('substr', $bl3_details_nicht, 0, -1);
							}
							
							if ($bl3_details!='') {
								$allebl3_details.=_WF_BL3_.$mandzusinfo.': '.'<font color=green><b>'.$bl3_details.'</b></font>';
							}
							if ($bl3_details_nicht!='') {
								$allebl3_details.=($bl3_details==''?_WF_BL3_.$mandzusinfo.': ':'').'<font color=red><b>'.$bl3_details_nicht.'</b></font>';
							}
							$allebl3_details.='<br>';
						}
						
						if ($dse_info1!='') {
							if ($mitol) {
								$ite1=_WF_BL3_.': '.$bl3d."\n".$dse_info1.' '.$allebl3_details;
							} else {
								$ite1=oltext($bl3d."\n".$dse_info1, $allebl3_details, '', _WF_BL3_);
							}
						} elseif ($cfg_dse_email) {
							$bl3dn='';
							$expl2=explode(';', $bl3d);
							while (list($rkey, $rval)=@each($expl2)) {
								if ($rval!='') {
									$bl3dn.=$rval."\n";
								}
							}
							if (trim($bl3dn)!='') {
								if ($mitol) {
									$ite1=$ite1.': '.$bl3dn."\n".$dse_info1;
								} else {
									$ite1=oltext($bl3dn."\n".$dse_info1, $ite1, '', _WF_BL3_);
								}
							}
						}
						if (!$mitol and $dse_doc!='') {
							if (is_file('dokumente_korrespondenz/'.$dse_doc)) {
								$dse_doc=' | '.link2(_DATEI_, 'dokumente_korrespondenz/'.$dse_doc, '', '', 'target="_blank"');
							}
						}
						
						/*
						$row4=$m_row4;
						$ite1=_WF_BL3_;
						$bl3_details='';
						$bl3_details_nicht='';
						$te1='';
						$row4=$m_row4;
						if ($dse_info1!='') {
							
							if ($bl3_details!='') {
								$te1.='<font color=green><b>'._WF_BL3_.$bl3_details.'</b></font>';
							}
							if ($bl3_details_nicht!='') {
								$te1.=' <font color=red><b>'._NICHT_.': '.$bl3_details_nicht.'</b></font>';
							}
							if (isset($dseo_nicht) or isset($dseo_ja)) {
								$te1='';
								if ($dseo_ja!='') {
									$te1.='<font color=green><b>'._WF_BL3_.': '.$dseo_ja.'</b></font>';
								}
								if ($dseo_nicht!='') {
									$te1.=' <font color=red><b>'.$dseo_nicht.'</b></font>';
								}
							}
							$ite1=oltext($bl3d."\n".$dse_info1, $te1, '', _WF_BL3_);
						} elseif ($cfg_dse_email) {
							$bl3dn='';
							$expl2=explode(';', $bl3d);
							while (list($rkey, $rval)=@each($expl2)) {
								if ($rval!='') {
									$bl3dn.=$rval."\n";
								}
							}
							if (trim($bl3dn)!='') {
								$ite1=oltext($bl3dn."\n".$dse_info1, $ite1, '', _WF_BL3_);
							}
						}
						if ($dse_doc!='') {
							if (is_file('dokumente_korrespondenz/'.$dse_doc)) {
								$dse_doc=' | '.link2(_DATEI_, 'dokumente_korrespondenz/'.$dse_doc, '', '', 'target="_blank"');
							}
						}
						if ($ite1!=_WF_BL3_) {
						//	$infoblock.='<b>'.$ite1.' '._SEIT_.': '.$db->unixdate($row3[5]).$dse_doc.'</b><br>';
						}
						*/
						
						$zeit_le=$db->unixdate($row3[5]);
						$zeit_le_ts=$db->unixdate_ts($row3[5]);
						if ($letzte_dse>0) {
							$zeit_le=adodb_date('d.m.Y', $letzte_dse);
						}
						if ($ite1!='') {
							if ($cross_templ) {
								if ($infoblock!='') {
									$infoblock.='<hr>';
								}
								$infoblock.='CRM:<br>';
							}
						if (isset($cfg_dse_warnung_tage)) {
							if (intval($cfg_dse_warnung_tage)>0) {
								if ($zeit_le_ts<(time()-$cfg_dse_warnung_tage*24*60*60)) {
									$tageueber=round(((time()-$cfg_dse_warnung_tage*24*60*60)-$zeit_le_ts)/(24*60*60));
									$zeit_le='<font color=red>! '.$zeit_le.'</font> ('.$tageueber.' '._NAECHSTEN_TAGE_.')';
									$dsewarnung_text=$zeit_le;
								}
							}
						}
						if ($mitol) {
							$infoblock='<b>'.$ite1.' '._SEIT_.': '.$zeit_le.'</b><br>'.$infoblock;
						} else {
							$infoblock.='<b>'.$ite1.' '._SEIT_.': '.$zeit_le.($dse_doc!=''?' / '.$dse_doc:'').'</b>';
						}
						}
					}
					
					if (!$cfg_dse_robinson_raus) {
					$res3=$db->select(
						$sql_tab['stammdaten_zusatz'],
						$sql_tabs['stammdaten_zusatz']['zusatz_id'],
						$sql_tabs['stammdaten_zusatz']['bezeichnung'].'='.$db->str('Robinson')
					);
					if ($row3=$db->zeile($res3)) {
						$res3=$db->select(
							$sql_tab['zusatzfelder'],
							$sql_tab['zusatzfelder'].'.zf_'.$row3[0],
							$sql_tabs['zusatzfelder']['stammdaten_id'].'='.$db->dbzahl($stid)
						);
						if ($row3=$db->zeile($res3)) {
							if ($row3[0]!='') {
								$infoblock.='<font color=red><b>Robinson: '.$row3[0].'</b></font><br>';
							}
						}
					}
					}
					
		if ($infoblock=='') {
			return '';
		}
		if ($returnnurtext) {
			if (p4n_mb_string('substr', $infoblock, -4)=='<br>') {
				$infoblock=p4n_mb_string('substr', $infoblock, 0, -4);
			}
			return $infoblock;
		}
		if ($mitol) {
			return oltext($infoblock, _DSE_INFO_);
		} else {
			return $infoblock;
		}
	}
	
	function check_rtf2pdf($dl1, $sleep=3, $pdfa = false) {
		global $cfg_rtf2pdf, $cfg_rtf2pdf_udc, $db, $sql_tab, $sql_tabs, $sql_meta;
		
		$objUDC = null;
		$WordApp = null;
		
		if ($cfg_rtf2pdf_udc) {
			$path=$dl1;
		}
		
		if (!function_exists('fatalErrorHandler')) {
		    function fatalErrorHandler() {
                global $word;
                if(isset($word)){
                    $word->Quit();
                    unset($GLOBALS['word']);
                }
		    }
		}
        
		register_shutdown_function('fatalErrorHandler');
		
        if ($cfg_rtf2pdf_udc) {
			if (!is_file($path) || !$cfg_rtf2pdf) {
				return false;
			}
			$expl=explode('/', $_SERVER["SCRIPT_FILENAME"]);
			$sr=p4n_mb_string('str_replace', $expl[count($expl)-1], '', $_SERVER["SCRIPT_FILENAME"]);
			$sr=p4n_mb_string('str_replace', '/', "\\", $sr);
			$sr2=p4n_mb_string('str_replace', '/', "\\", $path);
			$sr3=p4n_mb_string('str_replace', '.rtf', '.pdf', $sr2);
			$sr3=p4n_mb_string('str_replace', '.docx', '.pdf', $sr3);
			$new=p4n_mb_string('str_replace', "\\", '/', $sr3);
			$path=$sr.$sr2;
			// Connect to Word
			if (!class_exists('COM')) {
				return false;
			}
            $error = '';
            if (!isset($_SESSION['crm_kannpdf']) || $_SESSION['crm_kannpdf']) {
                $_SESSION['crm_kannpdf']=false;
                try {
                    $word = new COM("word.application");
                    $GLOBALS['word'] = $word;

                    if (!$word) {
                        unset($GLOBALS['word']);
                        return false;
                    }
                    // Check the Word version.
                    if ($word->Version < 12) {
                        $word->Quit();
                        unset($GLOBALS['word']);
                        return false;
                    } else {
                       $_SESSION['crm_kannpdf']=true;
                    }
                    $true = true;
                    $false = false;
                    $word->Documents->Open($path, $false, $true);
                } catch (com_exception $e) {
                    $error = '\\n'.strip_tags(str_replace(array('<br>', '<br/>'), '\\n', $e->getMessage()));
                }
            } 
            if (!$_SESSION['crm_kannpdf']) {
                if ($error!='') {
                    $handle = fopen('log/com_error_log.txt', 'a+');
                    fwrite($handle, "\n".adodb_date('d.m.Y H:i:s', time()).': '.$_SERVER["PHP_SELF"].' / User: '.$_SESSION['mitarbeiter_name2'].' ('.$_SESSION['user_id'].')'.str_replace('\\n', '', $error));
                    fclose($handle);
                }
                echo javas('alert(\''._FEHLER_.'\\n'._KEIN_PDF_ERSTELLT_.$error.'\');');
                return $dl1;
            }
			// Document.Convert: http://msdn.microsoft.com/en-us/library/office/bb243727(v=office.12).aspx
//			$word->ActiveDocument->Convert();
			// WdSaveFormat: http://msdn.microsoft.com/en-us/library/office/bb238158%28v=office.12%29.aspx
			$wdSaveFormats = array(
				'docx' => 16,
				'html' => 10,
				'rtf' => 6,
				'txt' => 2,
				'doc' => 0,
				'pdf' => 17
			);
			$newSaveFormat = 16;
			if (preg_match('@\.(.{3,4})$@', $new, $arr)) {
				if (isset($wdSaveFormats[$arr[1]])) {
				   $newSaveFormat = $wdSaveFormats[$arr[1]];
				}
			}
			
			$neuedatei=$sr.$new;

			// Document.SaveAs: http://msdn.microsoft.com/en-us/library/office/bb221597%28v=office.12%29.aspx
			$neuedatei=str_replace('/', "\\", $neuedatei);
//$neuedatei = new Variant(utf8_encode($neuedatei), VT_BSTR);
			$newSaveFormat= new Variant(17, VT_I4);
			if ($pdfa) {
                $word->ActiveDocument->ExportAsFixedFormat($neuedatei, $newSaveFormat, false, 0, 0, 0, 0, 7, false, false, 0, false, true, true);
            } else {
                $word->ActiveDocument->SaveAs($neuedatei, $newSaveFormat);
            }
			// Document.Close: http://msdn.microsoft.com/en-us/library/office/bb214403(v=office.12).aspx
			$word->ActiveDocument->Close($false);
			// Application.Quit: http://msdn.microsoft.com/en-us/library/office/bb215475(v=office.12).aspx
			$word->Quit();
			unset($GLOBALS['word']);
			return $new;
		}
		if ($cfg_rtf2pdf_udc) {
			return '';
		}
		
		if ($cfg_rtf2pdf) {
			$com=new COM("DocPrintCom.docPrint");
			if ($com) {
				$expl=explode('/', $_SERVER["SCRIPT_FILENAME"]);
				$sr=p4n_mb_string('str_replace', $expl[count($expl)-1], '', $_SERVER["SCRIPT_FILENAME"]);
				$sr=p4n_mb_string('str_replace', '/', "\\", $sr);
				$sr2=p4n_mb_string('str_replace', '/', "\\", $dl1);
				$sr3=p4n_mb_string('str_replace', '.rtf', '.pdf', $sr2);
				@unlink($sr.$sr3);
				$cl="-i ".$sr.$sr2." -o ".$sr.$sr3." -* VL6IEN2GRW8EYN8P1D7F -d -O 2 -s ShowHTMLStatusBar=1 -l 10000 -f 9";
				$com->docPrintCOM_Register("VL6IEN2GRW8EYN8P1D7F","VeryPDF.com Inc.");
				$com->RunCmd($cl, 0);
				$dl1=p4n_mb_string('str_replace', "\\", '/', $sr3);
				$xi=0;
				while ($xi<20 and !is_file($sr.$sr3)) {
					sleep(1);
					$xi++;
				}
			}
			$com=null;
			/*
			$PdfCreator =new COM("PdfOut.PdfCreator");
			if ($PdfCreator) {
				$expl=explode('/', $_SERVER["SCRIPT_FILENAME"]);
				$sr=p4n_mb_string('str_replace', $expl[count($expl)-1], '', $_SERVER["SCRIPT_FILENAME"]);
				$sr=p4n_mb_string('str_replace', '/', "\\", $sr);
				$sr2=p4n_mb_string('str_replace', '/', "\\", $dl1);
				$sr3=p4n_mb_string('str_replace', '.rtf', '.pdf', $sr2);
				$cl=' "'.$sr.$sr2.'" "'.$sr.$sr3.'" "paperType=7,overwrite=yes" ';
				$PdfCreator->Doc2PDFCommandLine($cl);
				$dl1=p4n_mb_string('str_replace', "\\", '/', $sr3);
				sleep($sleep);
			}
			$PdfCreator = null;
			*/
		}
		return $dl1;
	}
	
	function datdiff_p4n($sdate, $edate, $m) {
		$diff1=0;
		if ($m=='d') {
			$diff1=round((adodb_date('U',$edate)-adodb_date('U',$sdate))/(60*60*24));
		}
		if ($m=='w') {
			$diff1=round((adodb_date('U',$edate)-adodb_date('U',$sdate))/(7*60*60*24));
		}
		if ($m=='m') {
			$diff1=(adodb_date('Y', $edate) * 12 + adodb_date('n', $edate)) - (adodb_date('Y', $sdate) * 12 + adodb_date('n', $sdate));
		}
		if ($m=='y') {
			$diff1=(adodb_date('Y', $edate) * 12 + adodb_date('n', $edate)) - (adodb_date('Y', $sdate) * 12 + adodb_date('n', $sdate));
			$diff1=round($diff1 / 12);//ceil
		}
		return $diff1;
//		return (($j == 1 && $m < 7) ? $m : $j + 6);
	}
	
	function auswahl_cache($tab1, $feld1, $where1='', $orderby1='', $leere_raus=false, $reload=false) {
		global $db, $sql_tab, $sql_tabs, $sql_meta;
		
		$werte=array();
		$neucache=false;
		
		$res=$db->select(
			$sql_tab['auswahl_cache'],
			array(
				$sql_tabs['auswahl_cache']['bezeichnung'],
				$sql_tabs['auswahl_cache']['datum']
			),
			$sql_tabs['auswahl_cache']['modul'].'='.$db->str($tab1.'.'.$feld1),
			($orderby1!=''?$sql_tabs['auswahl_cache']['rang']:'')
		);
		if ($db->anzahl($res)==0) {
			$neucache=true;
		}
		while (!$neucache and $row=$db->zeile($res)) {
			if ($db->unixdate_ts($row[1]) < (time()-30*24*60*60)) {
				$neucache=true;
				$werte=array();
				break;
			}
			$werte[$row[0]]=$row[0];
		}
		
        if ($reload) {
			$neucache=true;
		}
		
		if ($neucache) {
			$db->delete(
				$sql_tab['auswahl_cache'],
				$sql_tabs['auswahl_cache']['modul'].'='.$db->str($tab1.'.'.$feld1)
			);
			
			$res=$db->select(
				$tab1,
				'distinct '.$feld1,
				$where1,
				$orderby1
			);
			$rang=1;
			while ($row=$db->zeile($res)) {
				$row[0]=trim($row[0]);
				if (isset($row[1])) {
					$row[1]=trim($row[1]);
					$row[0].='_____'.$row[1];
				}
				if ($leere_raus) {
					if ($row[0]=='' or $row[0]=='-1') {
						continue;
					}
					if (isset($row[1])) {
						if ($row[1]=='' or $row[1]=='-1') {
							continue;
						}
					}
				}
				$werte[$row[0]]=$row[0];
				
				$db->insert(
					$sql_tab['auswahl_cache'],
					array(
						$sql_tabs['auswahl_cache']['bezeichnung'] => $db->str($row[0]),
						$sql_tabs['auswahl_cache']['datum'] => $db->dbtimestamp(time()),
						$sql_tabs['auswahl_cache']['modul'] => $db->str($tab1.'.'.$feld1),
						$sql_tabs['auswahl_cache']['rang'] => $db->dbzahl($rang)
					)
				);
				$rang++;
			}
		}
		return $werte;
	}
    
    function setzeAnzahlDatensaetze($sql = '', $mode = false, $limit = 0, $touch_session = true) {
        global $db, $sql_tab, $sql_tabs, $prefix, $anzahl_pro_seite, $ADODB_FETCH_MODE, $cfg_kfz;
        global $mit_pid_id, $carlo_tw;
        
        if (intval($anzahl_pro_seite) == 0) {
            $anzahl_pro_seite = $_SESSION['sl_aps'];
        }
        if (intval($anzahl_pro_seite) == 0) {
            $anzahl_pro_seite=10;
        }
                
        
        $alle_rows = array();
        $_SESSION['stammdaten_ids_inliste']=array();
        if ($sql!='') {
            //$sql = p4n_mb_string('str_replace', 'distinct ', '', $sql);
            $merke_sql3=$sql;
            if ($cfg_kfz and (preg_match('/'.$prefix.'produktzuordnung /', $merke_sql3) or preg_match('/'.$prefix.'produktzuordnung,/', $merke_sql3))) {
                if (preg_match('/^select (.*) from .*/Ui', $merke_sql3, $matc)) {
                    $pr_from=$matc[1];
                    if (preg_match('/'.preg_quote($sql_tab['produktzuordnung']).'/i', $pr_from)) {
                        $pr_from=str_replace(','.$sql_tabs['produktzuordnung']['produktzuordnung_id'].' as produktzuordnung_id', '', $pr_from).','.$sql_tabs['produktzuordnung']['produktzuordnung_id'].' as produktzuordnung_id';
                        $merke_sql3=p4n_mb_string('str_replace', $matc[1], $pr_from, $merke_sql3);
                        $mit_pid_id=true;
                    }
                }
            } elseif ($_SESSION['crm_version']>63 && $cfg_kfz and (preg_match('/'.$prefix.'korrespondenz /', $merke_sql3) or preg_match('/'.$prefix.'korrespondenz,/', $merke_sql3))) {
                if (preg_match('/^select (.*) from .*/Ui', $merke_sql3, $matc)) {
                    $pr_from=$matc[1];
                    if (preg_match('/'.preg_quote($sql_tab['korrespondenz']).'/i', $pr_from)) {
                        $pr_from=str_replace(','.$sql_tabs['korrespondenz']['produktzuordnung_id'].' as produktzuordnung_id', '', $pr_from).','.$sql_tabs['korrespondenz']['produktzuordnung_id'].' as produktzuordnung_id';
                        $merke_sql3=p4n_mb_string('str_replace', $matc[1], $pr_from, $merke_sql3);
                        $mit_pid_id=true;
                    }
                }
            }
            if (!$carlo_tw) {
                if (preg_match('/'.$prefix.'auftrag2 /', $merke_sql3) or preg_match('/'.$prefix.'auftrag2,/', $merke_sql3)) {
                    if (preg_match('/^select (.*) from .*/Ui', $merke_sql3, $matc)) {
                        $pr_from=$matc[1];
                        if (preg_match('/'.preg_quote($sql_tab['auftrag2']).'/i', $pr_from)) {
                            $pr_from=str_replace(','.$sql_tabs['auftrag2']['auftrag_id'].' as auftrag_id', '', $pr_from).','.$sql_tabs['auftrag2']['auftrag_id'];
                            $merke_sql3=p4n_mb_string('str_replace', $matc[1], $pr_from, $merke_sql3);
                        }
                    }
                } elseif (preg_match('/'.$prefix.'auftrag /', $merke_sql3) or preg_match('/'.$prefix.'auftrag,/', $merke_sql3)) {
                    if (preg_match('/^select (.*) from .*/Ui', $merke_sql3, $matc)) {
                        $pr_from=$matc[1];
                        if (preg_match('/'.preg_quote($sql_tab['auftrag']).'/i', $pr_from)) {
                            $pr_from=str_replace(','.$sql_tabs['auftrag']['auftrag_id'].' as auftrag_id', '', $pr_from).','.$sql_tabs['auftrag']['auftrag_id'];
                            $merke_sql3=p4n_mb_string('str_replace', $matc[1], $pr_from, $merke_sql3);
                        }
                    }
                }
            }
            
            $sql=$merke_sql3;
            $merke = $ADODB_FETCH_MODE;
            $ADODB_FETCH_MODE = 0;
            $temp_session_id = intval($_SESSION['stammdaten_id']);
            if ($limit > 0 && preg_match('/(limit.*)/i', $sql, $matches)) {
                if ($matches[1]!='') {
                    $sql=str_replace($matches[1], '', $sql);
                }
            }
            $res=$db->select2($sql, 0, $limit);
            
            $anzahl_e=0;//$db->anzahl($res);
            $anzahl_kunden = 0;
            $merker=array();
            
            if ($touch_session) {
                if ($temp_session_id > 0 && $limit > 0) {

                } else {
                    unset($_SESSION['stammdaten_id']);
                }
            }
            while ($row_zaehler=$db->zeile($res)) {
                $anzahl_e++;
                if (!isset($merker[$row_zaehler[0]])) {
                    $merker[$row_zaehler[0]] = 1;
                    $anzahl_kunden++;
                    $_SESSION['stammdaten_ids_inliste'][] = $row_zaehler[0];
                }
                if ($touch_session) {
                    if (!isset($_SESSION['stammdaten_id']) || $temp_session_id == $row_zaehler[0]) {
                        $_SESSION['stammdaten_id']=$row_zaehler[0];
                    }
                }
                if (!$mode) {
                    foreach ($row_zaehler as $key_arr => $value_arr) {
                        if (is_numeric($key_arr)) {
                            unset($row_zaehler[$key_arr]);
                        }
                    }
                }
                if ($carlo_tw) {
                    foreach ($row_zaehler as $key_arr => $value_arr) {
                        decode_big5_entities($value_arr);
                        $row_zaehler[$key_arr]=$value_arr;
                    }
                }
                
                $alle_rows[] = $row_zaehler;
            }
            $db->setfetchmode($mode);
            if ($touch_session) {
                $_SESSION['sl_seite']=1;
                $_SESSION['sl_anzahl']=$anzahl_e;
                $_SESSION['sl_gesamtseiten']=intval($anzahl_e/$anzahl_pro_seite) + (($anzahl_e / $anzahl_pro_seite - intval($anzahl_e/$anzahl_pro_seite))!=0);

                $_SESSION['anzahl_saetze2']=$anzahl_e;
                $_SESSION['anzahl_saetze']=$anzahl_kunden;
            }
            $ADODB_FETCH_MODE = $merke;
        }
        if ($touch_session && $limit>0) {
            $_SESSION['reset_anzahl_saetze']=1;
        }
        return $alle_rows;
    }
	
	function suchfeld_update($stid=0) {
		global $db, $sql_tab, $sql_tabs, $sql_meta, $cfg_suche_nochschneller;
		
		// Suchfeld updaten:
		
		global $cfg_db_utf8;
		if ($_SESSION['db_utf8'] || $cfg_db_utf8) {
            $umlaute=array();
            $umlaute2=array();
        } else {
            $umlaute=array('ä'=>'ae', 'ö'=>'oe', 'ü'=>'ue', 'ß'=>'ss', 'Ä'=>'Ae', 'Ö'=>'Oe', 'Ü'=>'Ue');
            $umlaute2=array('ae'=>'ä', 'oe'=>'ö', 'ue'=>'ü', 'ss'=>'ß', 'Ae'=>'Ä', 'Oe'=>'Öe', 'Ue'=>'Ü');
		}
		$anz1=0;
		$where='';
        $where_text_suche='';
		if ($stid>0) {
            $where=$sql_tabs['stammdaten']['id'].'='.$db->dbzahl($stid);
            $where_text_suche=$sql_tabs['stammdaten_text_suche']['stammdaten_id'].'='.$db->dbzahl($stid);
        }
        if ($cfg_suche_nochschneller) {
            $result_stammdaten_text_suche = $db->select(
                $sql_tab['stammdaten_text_suche'],
                array(
                    $sql_tabs['stammdaten_text_suche']['suche_id'],
                    $sql_tabs['stammdaten_text_suche']['stammdaten_id'],
                    $sql_tabs['stammdaten_text_suche']['suchtext']
                ),
                $where_text_suche
            );
            $alle_stammdaten_suchtext_suche = array();
            while ($row_stammdaten_text_suche = $db->zeile($result_stammdaten_text_suche)) {
                $alle_stammdaten_suchtext_suche[$row_stammdaten_text_suche[1]][$row_stammdaten_text_suche[2]]=1;
            }
        }
		$res=$db->select(
			$sql_tab['stammdaten'],
			array(
				$sql_tabs['stammdaten']['id'],
				$sql_tabs['stammdaten']['vorname'],
				$sql_tabs['stammdaten']['name'],
				$sql_tabs['stammdaten']['firma1'],
				$sql_tabs['stammdaten']['matchcode'],
                $sql_tabs['stammdaten']['suchfeld'],//55
                $sql_tabs['stammdaten']['anzeigename'],
                $sql_tabs['stammdaten']['bemerkung']
			),
			$where
		);
        $to_insert = array();
        $to_delete_stammdaten = array();
        $to_delete_orig = array();
        $to_update = array();
		while ($row=$db->zeile($res)) {
			
			$row[3]=p4n_mb_string('str_replace', '   ', ' ', $row[3]);
			$such1=trim($row[2].' '.$row[1].' '.$row[2].' '.$row[3]);
			if ($row[1]!='' and $row[3]!='' and $row[2]=='') {
				$such1=trim($row[1].' '.$row[3].' '.$row[1]);
			} elseif ($row[1]!='' and $row[3]!='' and $row[2]!='') {
				$such1=trim($row[2].' '.$row[1].' '.$row[2].' '.$row[3].' '.$row[1]);
			}
			if ($_SESSION['db_utf8']) {
				$w1=$such1;
				$w2=$such1;
			} else {
				$w1=strtr($such1, $umlaute);
				$w2=strtr($such1, $umlaute2);
			}
			
			if ($w1!=$such1)
				$such1.=' '.$w1;
			$such1=trim($such1);
			if ($w2!=$such1) {
				$such1.=' '.$w2;
			}
			$such1=trim($such1);
			$such1=p4n_mb_string('str_replace', '    ', ' ', $such1);
			$such1=p4n_mb_string('str_replace', '   ', ' ', $such1);
			$such1=p4n_mb_string('str_replace', '  ', ' ', $such1);
			
            
            if ($cfg_suche_nochschneller) {
                global $cfg_suche_matchcode, $cfg_suche_bemerkung;
                if ($cfg_suche_matchcode && $row[4]!='') {
                    $such1.=' '.$row[4];
                }
                if ($cfg_suche_bemerkung) {
                    if ($row[6]!='') {
                        $such1.=' '.$row[6];
                    }
                    if ($row[7]!='') {
                        $such1.=' '.$row[7];
                    }
                }
                
                $alle_suchwerte = array();
                foreach (explode(' ', $such1) as $string) {
                    $alle_suchwerte[$string] = $string;
                }
                $alle_suchwerte[trim($row[2].' '.$row[1])]=trim($row[2].' '.$row[1]);
                $alle_suchwerte[trim($row[1].' '.$row[2])]=trim($row[1].' '.$row[2]);
                $alle_suchwerte[trim($row[1].' '.$row[3])]=trim($row[1].' '.$row[3]);
                $alle_suchwerte[trim($row[3].' '.$row[1])]=trim($row[3].' '.$row[1]);
                if (isset($alle_stammdaten_suchtext_suche[$row[0]])) {
                    if (empty($alle_suchwerte)) {
                        $to_delete_stammdaten[$row[0]]=1;
                    } else {
                        foreach ($alle_suchwerte as $suchstring) {
                            if (trim($suchstring)!='') {
                                if (!isset($alle_stammdaten_suchtext_suche[$row[0]][trim($suchstring)])) {
                                    $to_insert[$row[0]][trim($suchstring)] = trim($suchstring);
                                }
                            }
                        }
                        if (!empty($alle_stammdaten_suchtext_suche[$row[0]])) {
                            foreach ($alle_stammdaten_suchtext_suche[$row[0]] as $suchstring => $x_temp_val) {
                                if (!isset($alle_suchwerte[$suchstring])) {
                                    $to_delete_orig[$suchstring]=$row[0];
                                }
                            }
                        }

                    }
                } else {
                    if (!empty($alle_suchwerte)) {
                        $to_insert[$row[0]] = $alle_suchwerte;
                    }
                }
            }
            
			$such1=p4n_mb_string('substr', $such1, 0, 254);
			if ($such1!=$row[5]) {
                $to_update[$row[0]]=$such1;
            }
		}
        
        if (!empty($to_update)) {
            foreach ($to_update as $stid => $such1) {
                $anz1+=$db->update(
                    $sql_tab['stammdaten'],
                    array(
                        $sql_tabs['stammdaten']['suchfeld'] => $db->str($such1)
                    ),
                    $sql_tabs['stammdaten']['id'].'='.$db->dbzahl($stid)
                );
            }
        }
        if (!empty($to_delete_stammdaten)) {
            $db->delete(
                $sql_tab['stammdaten_text_suche'],
                $db->dbzahlin(array_keys($to_delete_stammdaten), $sql_tabs['stammdaten_text_suche']['stammdaten_id'])
            );
        }
        if (!empty($to_delete_orig)) {
            $db->delete(
                $sql_tab['stammdaten_text_suche'],
                $db->dbstrin(array_keys($to_delete_orig), $sql_tabs['stammdaten_text_suche']['suchtext']).' and '.
                $db->dbzahlin($to_delete_orig, $sql_tabs['stammdaten_text_suche']['stammdaten_id'])
            );
        }
        if (!empty($to_insert)) {
            foreach ($to_insert as $stdid => $suchtexte) {
                if (!empty($suchtexte)) {
                    foreach ($suchtexte as $suchtext) {
                        if (trim($suchtext)!='') {
                            $db->insert(
                                $sql_tab['stammdaten_text_suche'],
                                array(
                                    $sql_tabs['stammdaten_text_suche']['stammdaten_id'] => $db->dbzahl($stdid),
                                    $sql_tabs['stammdaten_text_suche']['suchtext'] => $db->str($suchtext)
                                )
                            );
                        }
                    }
                }
            }
        }
		return $anz1;
	}

	function sms_senden($nummer1, $text1, $absend='') {
		global $cfg_sms, $cfg_sms_benutzer, $cfg_sms_passwort, $cfg_sms_absender, $check_smswerte, $db, $sql_tab, $sql_tabs, $cfg_autoupdate_proxy, $cfg_autoupdate_proxy_user, $cfg_autoupdate_proxy_password, $cfg_ws_avag_kroatien, $cfg_ws_avag_kroatien_url, $cfg_sms_gateway, $cfg_sms_italy, $cfg_sms_gate, $cfg_sms_absender2, $cfg_sms_absender3, $cfg_sms_antwortmail, $cfg_sms_prsms, $cfg_avagdispo_ws, $temp_sms_kundenid, $temp_sms_benutzerid, $temp_sms_massen, $ch, $temp_sms_spaeter_senden, $cfg_avag_sms, $mitsmsantwort, $smsjobid;
		global $cfg_no_sms_linkmobility, $cfg_no_sms_linkmobility_user, $cfg_no_sms_linkmobility_password, $cfg_sms_cmsms, $cfg_sms_creator;
        global $carlo_tw, $cfg_basedir, $cfg_taiwan_test_server;
        if ($carlo_tw) {

            $res = $db->select(
                $sql_tab['einstellungen'],
                $sql_tabs['einstellungen']['wert'],
                $sql_tabs['einstellungen']['modul'].'='.$db->str('smskaufen')
            );
            $row = $db->zeile($res);
            if (!$row) {
                return array('msgid' => -9001);
            }

            $config = json_decode($row['wert'], true);
            $userName = $config['user_name'];
            $password = $config['password'];
            $senderNumber = $config['sender_number'];

            $textBody = bin2hex(mb_convert_encoding($text1, 'UCS2', 'UTF-8'));
            $numChars = 67; // force message header signature at the beginning of the message - it is required with LUCS2
            $numMessages = 1; // counter for the number of messages
            $smsEncodedText = '';
            $rand_zahl = rand(0, 255);
            $hex = strtoupper(dechex($rand_zahl)); //Vendor wants a random hex value from 00 - FF
            if (strlen($hex)==1) {
                $hex = '0'.$hex;
            }
            
            for ($i = 0; $i < strlen($textBody); ++$i) {
                if ($i % 2 == 0) {
                    // Because every character in UCS2 is represented by 4 bytes, and every %XX is 2 bytes, count half up to detect the correct splitting points
                    // in case the message gets too long.
                    $numChars += 0.5;
                    if ($numChars >= 67) {
                        if ($numMessages < 10) {
                            $str_numMessages='0'.$numMessages;
                        } else {
                            $str_numMessages = $numMessages;
                        }
                        $smsEncodedText .= '%05%00%03%'.$hex.'%02%' . $str_numMessages; // that'll explode miserably if we are sending more than 9 messages
                        $numMessages++;
                        $numChars = 0;
                    }
                    $smsEncodedText .= '%' . $textBody[$i];
                }
                else {
                    $smsEncodedText .= $textBody[$i];
                }
            }
            $port = '18994';
            $encoding = 'UCS2';
            // this is the start of a byte header that signals the beginning of a new sms.
            // we skip the first one though because that signifies the first SMS and has not the meaning we're looking for
            if ($numMessages > 1) {
                $port = '18995';
                $encoding = 'LUCS2';
            }
            
            $urlEncodedBody = $smsEncodedText;
            $nummer1 = phone2($nummer1);
            if (preg_match('/^(00)\d+/', $nummer1, $matches)) {
                $nummer1 = p4n_mb_string('substr', $nummer1, 2);
            }
            

            $password = urlencode($password); // because we don't know if the passwords are always ASCII or can be weird things too.
            $userName = urlencode($userName); // again, we don't know what exactly this would be.
            
            /*if ($cfg_taiwan_test_server) {
                $url = "http://retention.catch.net.tw:18994/";
            } else {
                $url = "http://bizsms.taiwanmobile.com:18994/";
            }*/
            $url = 'http://bizsms.taiwanmobile.com:'.$port.'/';
            
            $url .= "send.cgi?username={$userName}&password={$password}&rateplan=A&srcaddr={$senderNumber}&dstaddr={$nummer1}&encoding={$encoding}&smbody=$urlEncodedBody";
            $curlRes = curl_init($url);
            curl_setopt($curlRes, CURLOPT_POST, 0);
            curl_setopt($curlRes, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curlRes, CURLOPT_FOLLOWLOCATION, true);
            // curl_setopt($curlRes, CURLOPT_SSL_VERIFYPEER, FALSE); // there's no encryption whatsoever going on here ... weird

            $response = curl_exec($curlRes);
            $err1=curl_error($curlRes);

            $stdId = $_SESSION['stammdaten_id'];
            @file_put_contents("{$cfg_basedir}log/sms_dispatch_$stdId.log", "URL: $url\nResponse: " . $response . "\ncURL Error: $err1");

            // we could request a message status but that would require an external endpoint that we do not have.
            // So - not gonna happen for now and we will work with what we get as response
            $return = array();
            if (preg_match_all('/(([A-Za-z0-9]+)=([+\-A-Za-z0-9]+))\s*/', $response, $matches)) {
                foreach ($matches[2] as $idx => $key) {
                    $return[$key] = $matches[3][$idx];
                }
            }
            return $return;

        }
		if ($cfg_no_sms_linkmobility) {
			include_once('webservice/nusoap.php');
			
			$cfg_sms_absender='';
			$trz='-#-#-#-#-';
			$res4=$db->select(
				$sql_tab['einstellungen'],
				$sql_tabs['einstellungen']['wert'],
				$sql_tabs['einstellungen']['modul'].'='.$db->str('smskaufen')
			);
			if ($row4=$db->zeile($res4)) {
				$xpl=explode($trz, $row4[0]);
				$cfg_sms=intval($xpl[0]);
				$cfg_sms_benutzer=$xpl[1];
				$cfg_sms_passwort=$xpl[2];
				$cfg_sms_absender=$xpl[3];
				$cfg_sms_gate=$xpl[4];
				$cfg_sms_absender2=$xpl[5];
				$cfg_sms_absender3=$xpl[6];
				$cfg_sms_antwortmail=$xpl[7];
                $cfg_sms_type=$xpl[8];
			}
			
			$ws_adresse = 'https://ws1.sp247.net/smscws/api';	//?wsdl
	        $method = 'send';
			
			$ws_adresse = 'https://soap-lb1.pswin.com/';
			$method = 'SendSingleMessage';
			
//        	$Destinations = phone2($nummer1, true);
        	$Destinations = p4n_mb_string('str_replace', array(' ','.','-','(',')','/','[',']'), '', $nummer1);
			if (p4n_mb_string('substr', $Destinations, 0, 2)=='00') {
				$Destinations=p4n_mb_string('substr', $Destinations, 2);
			} elseif (p4n_mb_string('substr', $Destinations, 0, 1)=='+') {
				$Destinations=p4n_mb_string('substr', $Destinations, 1);
			} elseif (p4n_mb_string('substr', $Destinations, 0, 2)!='47') {
				$Destinations='47'.$Destinations;
			}
/*			if (p4n_mb_string('substr', $Destinations, 0, 2)=='00') {
				$Destinations='+'.p4n_mb_string('substr', $Destinations, 2);
			} elseif (p4n_mb_string('substr', $Destinations, 0, 1)!='+') {
				$Destinations='+47'.p4n_mb_string('substr', $Destinations, 1);
			}
*/    	    $Message = $text1;
			
        	$client = new nusoap_client($ws_adresse, false);
    	    $client->soap_defencoding = 'UTF-8';
	       // $client->decode_utf8 = false;
        	
    	    $params = array(
				'destination' => p4n_mb_string('utf8_encode', $Destinations),
				'destinationTON' => '1',	// 1=normal, 2 = mit +49
				'password' => p4n_mb_string('utf8_encode', $cfg_no_sms_linkmobility_password),
				'serviceId' => '-1',
				'source' => '',
				'sourceTON' => '1',
				'useDeliveryReport' => 'false',
				'userData' => p4n_mb_string('utf8_encode', $Message),
				'username' => p4n_mb_string('utf8_encode', $cfg_no_sms_linkmobility_user)
			);
			$params = array(
				'smsno:username' => p4n_mb_string('utf8_encode', $cfg_no_sms_linkmobility_user),
				'smsno:password' => p4n_mb_string('utf8_encode', $cfg_no_sms_linkmobility_password),
				'smsno:m' => array(
					'smsno:ReceiverNumber' => p4n_mb_string('utf8_encode', $Destinations),
					'smsno:SenderNumber' => p4n_mb_string('utf8_encode', $cfg_sms_absender),
					'smsno:Text' => p4n_mb_string('utf8_encode', $Message)
				)
			);
			//array('message' => $params)
	        $result = $client->call($method, $params, 'http://pswin.com/SOAP/Submit/SMS', 'http://pswin.com/SOAP/Submit/SMS/'.$method);
			if ($_SESSION['user_id']==1) {
						if ($fp=fopen('log/_ws_linkmobility_sms.txt', 'a')) {
							fwrite($fp, adodb_date('d.m.Y H:i:s', time()).': '.var_export($result, true)."\r\n\r\n\r\n".$client->request."\r\n\r\n\r\n".$client->response."\r\n");
							fclose($fp);
						}
			}
			if ($result['Code']=='200') {
				$result['Code']='100';
			}
			return $result['Code'].' - '.$result['Description'];
			
		} elseif ($cfg_sms_italy) {
			include_once('webservice/nusoap.php');
			
			$res4=$db->select(
				$sql_tab['einstellungen'],
				$sql_tabs['einstellungen']['wert'],
				$sql_tabs['einstellungen']['modul'].'='.$db->str('it_sms')
			);
			$xpl=array();
			if ($row4=$db->zeile($res4)) {
				$xpl=explode(';', $row4[0]);
			}
			
    	    $ws_adresse = 'http://www.agiletelecom.com/services/agiletelecomsms.asmx?WSDL';
	        $method = 'Send_Message';
			if (base64_decode($xpl[3])=='2') {
				$ws_adresse = 'inc/sms.wsdl';
	       		$method = 'DataDeliver';
			}
        	$userName = base64_decode($xpl[0]);
    	    $password = base64_decode($xpl[1]);
	        $Originator = base64_decode($xpl[2]);
        	$Destinations = phone2($nummer1, true);
			if (p4n_mb_string('substr', $Destinations, 0, 2)=='00') {
				$Destinations='+'.p4n_mb_string('substr', $Destinations, 2);
			} elseif (p4n_mb_string('substr', $Destinations, 0, 1)!='+') {
				$Destinations='+39'.p4n_mb_string('substr', $Destinations, 1);
			}
    	    $Message = $text1;
			
        	$client = new nusoap_client($ws_adresse, true);
    	    $client->soap_defencoding = 'UTF-8';
	       // $client->decode_utf8 = false;
        	
    	    $params = array('User' => p4n_mb_string('utf8_encode', $userName), 'Password' => p4n_mb_string('utf8_encode', $password), 'Originator' => $Originator, 'Destinations' => $Destinations, 'Message' => p4n_mb_string('utf8_encode', $Message));
			if (base64_decode($xpl[3])=='2') {
				$params = array('IDClient' => p4n_mb_string('utf8_encode', $userName), 'Numeri' => $Destinations, 'body' => p4n_mb_string('utf8_encode', $Message));
			}
	        $result = $client->call($method, $params);
			
			if (base64_decode($xpl[3])=='2') {
				$m_result=p4n_mb_string('str_replace', array("\n", "\r", '"', "'"), '', $result);
				$result=array('Send_MessageResult' => $m_result);
			}
			
			return $result;
		}
		
		if ($cfg_ws_avag_kroatien) {
			include_once('webservice/nusoap.php');
			
			$wsdl=false;
			$url='http://gonzales.psc-zagreb.local/cgi-bin/ccrm/CarloCrmIntf.dll/soap/CRMToDMSInterfacePortType';
			if (isset($cfg_ws_avag_kroatien_url)) {
				if ($cfg_ws_avag_kroatien_url!='') {
					$url=$cfg_ws_avag_kroatien_url;
				}
			}
			$utf8=true;
			$pre1='kroa:';
			$headers='';
			
			if (isset($cfg_autoupdate_proxy) and $cfg_autoupdate_proxy!='') {
						$xpl=explode(':', $cfg_autoupdate_proxy);
						if (count($xpl)==2) {
							$proxyhost=$xpl[0];
							$proxyport=$xpl[1];
						} else {
							$proxyhost=$cfg_autoupdate_proxy;
							$proxyport='80';
						}
						$client = new nusoap_client($url, $wsdl, $proxyhost, $proxyport, $cfg_autoupdate_proxy_user, $cfg_autoupdate_proxy_password);
						$client->setUseCURL(true);
			} else {
				$client = new nusoap_client($url, $wsdl);
			}
			if ($utf8) {
				$client->soap_defencoding = 'UTF-8';
			}
			$err = $client->getError();
			if ($err) {
				$fehler.='Constructor error: '.$methode.''.$err.'<br>';
			}
			if ($headers!='') {
				$client->setHeaders($headers);
			}
			
			$result=$client->call('SendSMSRequest', array($pre1.'PhoneNumber' => phone2($nummer1, true), $pre1.'MessageText' => p4n_mb_string('utf8_encode', $text1)), '', '');
			
			$response=$result['SMSID'].'_'.$result['ResultStatus']['ResultStatusText'].'_'.p4n_mb_string('str_replace', "'", '', $result['ResultStatus']['ResultErrorText']);	// OK / ERROR
			
			if ($_SESSION['user_id']==1) {
						if ($fp=fopen('log/_ws_kroa_sms.txt', 'a')) {
							fwrite($fp, adodb_date('d.m.Y H:i:s', time()).': '.var_export($result, true)."\r\n\r\n\r\n".$client->request."\r\n\r\n\r\n".$client->response."\r\n");
							fclose($fp);
						}
			}
			
			return $response;
		}
		
		if (!isset($check_smswerte)) {
			$check_smswerte=1;
			$trz='-#-#-#-#-';
			$res4=$db->select(
				$sql_tab['einstellungen'],
				$sql_tabs['einstellungen']['wert'],
				$sql_tabs['einstellungen']['modul'].'='.$db->str('smskaufen')
			);
			if ($row4=$db->zeile($res4)) {
				$xpl=explode($trz, $row4[0]);
				$cfg_sms=intval($xpl[0]);
				$cfg_sms_benutzer=$xpl[1];
				$cfg_sms_passwort=$xpl[2];
				$cfg_sms_absender=$xpl[3];
				$cfg_sms_gate=$xpl[4];
				$cfg_sms_absender2=$xpl[5];
				$cfg_sms_absender3=$xpl[6];
				$cfg_sms_antwortmail=$xpl[7];
                $cfg_sms_type=$xpl[8];
			}
		}
		
		$abs1='AutohausCRM';
        if ($cfg_sms_absender!='') {
            $abs1=$cfg_sms_absender;
        }
        if ($absend!='') {
            $abs1=$absend;
        }

        if (!empty($cfg_sms_cmsms)) {
            try {
                $response = CMSMS::instance($cfg_sms_benutzer)->sendMessage(phone2($nummer1, true, true), $text1, $abs1);
                return '100'.$response;
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        $smstype1='4';
        if (isset($cfg_sms_gateway)) {
            if (intval($cfg_sms_gateway)>0) {
                $smstype1=$cfg_sms_gateway;
            }
        }
        if ($cfg_sms_gate!='') {
            $smstype1=$cfg_sms_gate;
        }
        $param=array(
            'id' => $cfg_sms_benutzer,
            'pw' => $cfg_sms_passwort,
            'type' => $smstype1,
            'empfaenger' => phone2($nummer1, true, true),
            'absender' => $abs1,
            'text' => $text1,
            'maxi' => '1'
        );
        if ($cfg_sms_antwortmail!='') {
            $param['reply']=1;
            $param['reply_email']=$cfg_sms_antwortmail;
        }
        $request='';
        foreach($param as $key=>$val) {
            $request.= $key."=".urlencode($val);
            $request.= "&";
        }
        $url="http://www.smskaufen.com/sms/gateway/sms.php";

        if (!isset($ch)) {
            $ch=curl_init();
        }
		if ($cfg_sms_creator) {
			$url="https://www.smscreator.de/gateway/Send.asmx/SendSimpleSMS";
			
			// User=string&Password=string&Caption=string&Sender=string&Recipient=string&SMSText=string&SmsTyp=string&SendDate=string
			
			$text1 = rawurlencode(utf8_encode($text1));
			// Ersetzen Euro Zeichen da PHP das falsch Codiert. 
			$text1 = str_replace("%C2%80","%E2%82%AC",$text1);
			
			// $cfg_sms_benutzer='Test'; $cfg_sms_passwort='Test';
			$smsjobid='';
			
			$request='User='.urlencode($cfg_sms_benutzer).'&'.'Password='.urlencode($cfg_sms_passwort).'&Caption=CRM&Sender='.urlencode($abs1).'&Recipient='.urlencode(phone2($nummer1, true, true)).'&SMSText='.$text1.'&SmsTyp='.$smstype1.'&SendDate=';
		} elseif ($cfg_sms_prsms) {
            $url="http://www.pr-sms.at/http/smspost.php";
            $Destinations=phone2($nummer1, true);
            if (p4n_mb_string('substr', $Destinations, 0, 2)=='00') {
                $Destinations=p4n_mb_string('substr', $Destinations, 2);
            }
            if (p4n_mb_string('substr', $Destinations, 0, 1)=='0') {
                $Destinations='43'.p4n_mb_string('substr', $Destinations, 1);
            }
            $smsjobid='';
            if ($mitsmsantwort) {
                $abs1='PRSMSANTWORT1';
                $smsjobid=uniqid();
            }
            $type='1';
            if ($cfg_sms_prsms!='') {
                $type=$cfg_sms_prsms;
            }
            if ($cfg_sms_type!='') {
                $type=$cfg_sms_type;
            }
            $daten1=$abs1.'|'.urlencode(p4n_mb_string('str_replace', '|', ' ', $text1)).'|'.$Destinations.'|||||'.$smsjobid;
            $request='uid='.urlencode($cfg_sms_benutzer).'&'.'pw='.urlencode($cfg_sms_passwort).'&type='.$type.'&'.'data='.$daten1.'&data_sep=|'.'&resp_sep=|';
        } elseif ($cfg_avag_sms) {
            $url="https://www.automobil-message.de/am/smsc/Gateway.do?";
            $request='';
            if (intval($temp_sms_benutzerid)==0) {
                $temp_sms_benutzerid=$_SESSION['user_id'];
            }

            $res=$db->select(
                $sql_tab['stammdaten'],
                array(
                    $sql_tabs['stammdaten']['anrede'],
                    $sql_tabs['stammdaten']['titel'],
                    $sql_tabs['stammdaten']['vorname'],
                    $sql_tabs['stammdaten']['name'],
                    $sql_tabs['stammdaten']['firma1']
                ),
                $sql_tabs['stammdaten']['id'].'='.$db->dbzahl($temp_sms_kundenid)
            );
            $row_kunde=$db->zeile($res);

            $debnr='';
            $res=$db->select(
                $sql_tab['stammdaten_mandant'],
                array(
                    $sql_tabs['stammdaten_mandant']['nummer1']
                ),
                $sql_tabs['stammdaten_mandant']['stammdaten_id'].'='.$db->dbzahl($temp_sms_kundenid)
            );
            while ($row=$db->zeile($res)) {
                if ($debnr=='') {
                    $debnr=$row[0];
                }
            }
            if ($debnr=='') {
                $debnr=$temp_sms_kundenid;
            }

            $mandid=0;
            $res=$db->select(
                $sql_tab['benutzer'],
                $sql_tabs['benutzer']['standard_lagerort'],
                $sql_tabs['benutzer']['benutzer_id'].'='.$db->dbzahl($temp_sms_benutzerid)
            );
            if ($row=$db->zeile($res)) {
                $mandid=$row[0];
            }
            $res=$db->select(
                $sql_tab['mandant'],
                array(
                    $sql_tabs['mandant']['zusatz2'],
                    $sql_tabs['mandant']['parent_id'],
                ),    
                $sql_tabs['mandant']['mandant_id'].'='.$db->dbzahl($mandid)
            );
            if ($row=$db->zeile($res)) {
                if ($row[0]=='######' or $row[0]=='') {
                    $res=$db->select(
                        $sql_tab['mandant'],
                        $sql_tabs['mandant']['zusatz2'],
                        $sql_tabs['mandant']['mandant_id'].'='.$db->dbzahl($row[1])
                    );
                    $row=$db->zeile($res);
                }
                $xpl=explode('###', $row[0]);
                if (count($xpl)>=2) {
                    $ttype='1';
                    if ($temp_sms_massen) {
                        $ttype='3';
                    }
                    $Destinations=phone2($nummer1, true);
                    if (p4n_mb_string('substr', $Destinations, 0, 2)=='00') {
                        $Destinations=p4n_mb_string('substr', $Destinations, 2);
                    }
                    if (p4n_mb_string('substr', $Destinations, 0, 1)=='0') {
                        $Destinations='49'.p4n_mb_string('substr', $Destinations, 1);
                    }
                    if (p4n_mb_string('substr', $Destinations, 0, 1)!='+') {
                        $Destinations='+'.$Destinations;
                    }
                    $params=array(
                        'user' => $xpl[0],
                        'sender' => $xpl[2],
                        'recipients' => $Destinations,
                        'password' => $xpl[1],
                        'message' => $text1,
                        'type' => '1',
                        'reply' => '0',
                        'templatetype' => $ttype,
                        'salutation' => $row_kunde[0],
                        'title' => $row_kunde[1],
                        'firstname' => $row_kunde[2],
                        'lastname' => $row_kunde[3],
                        'companyname' => $row_kunde[4],
                        'customerid' => $debnr
                    );
                    if ($temp_sms_spaeter_senden!='') {
                        $params['senddate']=$temp_sms_spaeter_senden;
                    }
                    //$request='';
                    foreach($params as $key=>$val) {
                        $request.= $key."=".urlencode($val);
                        $request.= "&";
                    }
                    $request=substr($request, 0, -1);
                } else {
                    if ($_SESSION['user_id']==1) {
                        if ($fp=fopen('log/sms.txt', 'a')) {
                            fwrite($fp, adodb_date('d.m.Y H:i:s').': Mandant Daten Falsch '.print_r($xpl, true)."\r\n");
                            fclose($fp);
                        }
                    }
                    return 'Mandant Einstellungen prüfen';
                }
            } else {
                return 'Standard-Lagerort ('.$mandid.') existiert nicht';
            }
        }


        $prox_info='';
        if (isset($cfg_autoupdate_proxy) and $cfg_autoupdate_proxy!='') {
            $xpl=explode(':', $cfg_autoupdate_proxy);
            if (count($xpl)==2) {
                $proxyhost=$xpl[0];
                $proxyport=$xpl[1];
            } else {
                $proxyhost=$cfg_autoupdate_proxy;
                $proxyport='80';
            }
            curl_setopt($ch, CURLOPT_PROXY, $proxyhost.':'.$proxyport);
            $prox_info=' / Proxy: '.$proxyhost.':'.$proxyport;
            if ($cfg_autoupdate_proxy_user!='') {
                curl_setopt($ch, CURLOPT_PROXYUSERPWD, $cfg_autoupdate_proxy_user.':'.$cfg_autoupdate_proxy_password);
                $prox_info=' / Proxy: '.$proxyhost.':'.$proxyport.', '.$cfg_autoupdate_proxy_user.':'.$cfg_autoupdate_proxy_password;
            }
        }

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        if ($cfg_avag_sms) {
            curl_setopt($ch, CURLOPT_URL, $url.$request);
            curl_setopt($ch, CURLOPT_POST, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        }
		if ($cfg_sms_creator) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		}
		
        $response = curl_exec($ch);
        $err1=curl_error($ch);
        $curlinfos=curl_getinfo($ch);
//				curl_close($ch);

        if ($_SESSION['user_id']==1) {
            if ($fp=fopen('log/sms.txt', 'a')) {
                fwrite($fp, adodb_date('d.m.Y H:i:s').': Request: '.$request.' / Ergebnis: '.$response.' / Fehler: '.$err1.' '.print_r($curlinfos, true)."\r\n");
                fclose($fp);
            }
        }
		
		if ($cfg_sms_creator) {
			if (preg_match('/<JobId>(.*)<\/JobId>/Uis', $response, $mat1)) {
				$smsjobid=$mat1[1];
			}
			if (preg_match('/<Status>(.*)<\/Status>/Uis', $response, $mat1)) {
				if (strtolower($mat1[1])=='ok') {
					$response='100 - '.$mat1[1];
				} else {
					$response=$mat1[1];
				}
			}
		}
		
        if ($cfg_avag_sms) {
            $expl1=explode(';', $response);
            $response=substr($response, -3).' - '.$response;
            /*
            $i1=curl_getinfo($ch);
            echo '<br><br><br>'.$ch.'/'.$response.':<br><pre>';
            print_r($i1);
            echo '</pre><br><br><br>';
            */
        }
        if ($cfg_sms_prsms) {
            if ($fp=fopen('log/prsms.txt', 'a')) {
                fwrite($fp, 'Request: '.$request.' / Ergebnis: '.$response."\r\n");
                fclose($fp);
            }
            $expl1=explode('|', $response);
            if ($expl1[0]=='0' and $expl1[2]=='0') {
                $response='100 - '.$response;
            }
        }
		return $response;
	}
	
	function dse_druck_datei($stid, $oeffnen=true, $marke='') {
		global $sql_tab, $sql_tabs, $sql_meta, $db, $mandid, $cfg_dse_zf_marken, $ist_docx, $x, $cfg_rtf2pdf, $cfg_rtf2pdf_udc, $cfg_kfzsuche_qrcodelink, $postfeld, $cfg_dsedruck_stdlao;
		
		$res5=$db->select(
					$sql_tab['stammdaten'],
					array(
						$sql_tabs['stammdaten']['mandant'],
						$sql_tabs['stammdaten']['firma1'],
						$sql_tabs['stammdaten']['vorname'],
						$sql_tabs['stammdaten']['name'],
						$sql_tabs['stammdaten']['titel'],
						$sql_tabs['stammdaten']['anrede'],		// 5
						$sql_tabs['stammdaten']['beruf'],
						$sql_tabs['stammdaten']['geburtstag'],
						$sql_tabs['stammdaten']['geburtsort'],
						$sql_tabs['stammdaten']['Telefon_1'],
						$sql_tabs['stammdaten']['Telefon_2'],	// 10
						$sql_tabs['stammdaten']['Mobilfon_1'],
						$sql_tabs['stammdaten']['Mobilfon_2'],
						$sql_tabs['stammdaten']['EMail_1'],
						$sql_tabs['stammdaten']['EMail_2'],
						$sql_tabs['stammdaten']['Fax_1'],		// 15
						$sql_tabs['stammdaten']['Fax_2'],
						$sql_tabs['stammdaten']['steuernummer'],
						$sql_tabs['stammdaten']['anzeigename'],
						$sql_tabs['stammdaten']['vpb'],
						$sql_tabs['stammdaten']['vpnr'],			// 20
						$sql_tabs['stammdaten']['Telefon_3'],
						$sql_tabs['stammdaten']['Mobilfon_3'],
						$sql_tabs['stammdaten']['Fax_3'],
						$sql_tabs['stammdaten']['meinvpb']
					),
					$sql_tabs['stammdaten']['id'].'='.$db->dbzahl($stid)
			);
			$row5=$db->zeile($res5);
			$anzeigename=$row5[18];
			
			$merke_mand=$row5[0];
			$merke_vpnr=$row5[20];
			
			if (isset($mandid) and $mandid>0) {
				
			} else {
				$mandid=$row5[0];
			}
			
			$laoid=0;
			if (isset($postfeld['vertrag_lagerort'])) {
				$laoid=intval($postfeld['vertrag_lagerort']);
			}
			if ($laoid<=0) {
				$laoid=intval($row5[19]);
			}
			if ($cfg_dsedruck_stdlao and $_SESSION['user_standard_lagerort']>0) {
				$laoid=intval($_SESSION['user_standard_lagerort']);
			}
			$v_lao='';
			if ($laoid>0) {
				$res3=$db->select(
					$sql_tab['mandant'],
					array(
						$sql_tabs['mandant']['bezeichnung'],
						$sql_tabs['mandant']['parent_id']
					),
					$sql_tabs['mandant']['mandant_id'].'='.$db->dbzahl($laoid)
				);
				if ($row3=$db->zeile($res3)) {
					$v_lao=trim($row3[0]);
					$mandid=$row3[1];
					if (intval($mandid)<=0) {
						$mandid=1;
					}
				}
			}
			
			$res6=$db->select(
					$sql_tab['stammdaten_adresse'],
					array(
						$sql_tabs['stammdaten_adresse']['adresse'],
						$sql_tabs['stammdaten_adresse']['plz'],
						$sql_tabs['stammdaten_adresse']['ort']
					),
					$sql_tabs['stammdaten_adresse']['stammdaten_id'].'='.$db->dbzahl($stid)
			);
			$row6=$db->zeile($res6);
			
			$mit_post=false;
			if (!is_array($postfeld['adresse']) and ($stid==0 or isset($postfeld['vorname']))) {
				
				$mit_post=true;
				
				$tel1=$postfeld['telefon'];
				$tel2=$postfeld['telefon'];
				$mob1=$postfeld['mobilfon'];
				$mob2=$postfeld['mobilfon'];
				$mail1=$postfeld['email'];
				$mail2=$postfeld['email'];
				$fax1=$postfeld['fax'];
				$fax2=$postfeld['fax'];
				
				if (isset($postfeld['firma'])) {
					$postfeld['firma1']=$postfeld['firma'];
					$tel1=$postfeld['telefon_p'];
					$tel2=$postfeld['telefon_g'];
					$mob1=$postfeld['mobil_p'];
					$mob2=$postfeld['mobil_g'];
					$mail1=$postfeld['email_p'];
					$mail2=$postfeld['email_g'];
					$fax1=$postfeld['fax_p'];
					$fax2=$postfeld['fax_g'];
					$mit_post=false;
				}
				if (isset($postfeld['st_adresse'])) {
					$postfeld['adresse']=$postfeld['st_adresse'];
					$postfeld['plz']=$postfeld['st_plz'];
					$postfeld['ort']=$postfeld['st_ort'];
					$postfeld['firma1']=$postfeld['st_firma1'];
					$postfeld['vorname']=$postfeld['st_vorname'];
					$postfeld['name']=$postfeld['st_name'];
					$postfeld['titel']=$postfeld['st_titel'];
					$postfeld['anrede']=$postfeld['st_anrede'];
					$postfeld['beruf']=$postfeld['st_beruf'];
					$postfeld['geburtsdatum']=$postfeld['st_geburtsdatum'];
					$postfeld['geburtsort']=$postfeld['st_geburtsort'];
					$tel1=$postfeld['st_telefon'];
					$tel2=$postfeld['st_telefon'];
					$mob1=$postfeld['st_mobilfon'];
					$mob2=$postfeld['st_mobilfon'];
					$mail1=$postfeld['st_email'];
					$mail2=$postfeld['st_email'];
					$fax1=$postfeld['st_fax'];
					$fax2=$postfeld['st_fax'];
				}
				
				$row5=array(1, $postfeld['firma1'], $postfeld['vorname'], $postfeld['name'], $postfeld['titel'], $postfeld['anrede'], $postfeld['beruf'], $postfeld['geburtsdatum'], $postfeld['geburtsort'], $tel1, $tel2, $mob1, $mob2, $mail1, $mail2, $fax1, $fax2, $postfeld['steuernummer']);
				$row6=array($postfeld['adresse'], $postfeld['plz'], $postfeld['ort']);
			}
			
			$vorl_dse='vorlagen/dse.rtf';
			if (is_file('inc/'.$_SESSION['cfg_kunde'].'/dse.rtf')) {
				$vorl_dse='inc/'.$_SESSION['cfg_kunde'].'/dse.rtf';
			}
			$gef_d=false;
			if (is_file('inc/'.$_SESSION['cfg_kunde'].'/dse_M'.$mandid.'.rtf')) {
				$vorl_dse='inc/'.$_SESSION['cfg_kunde'].'/dse_M'.$mandid.'.rtf';
				$gef_d=true;
			}
			if ($marke!='') {
				if (is_file('inc/'.$_SESSION['cfg_kunde'].'/dse_'.p4n_mb_string('strtolower',$marke).'.rtf')) {
					$vorl_dse='inc/'.$_SESSION['cfg_kunde'].'/dse_'.p4n_mb_string('strtolower',$marke).'.rtf';
					$gef_d=true;
				}
			}
			if ($v_lao!='' and !$gef_d) {
				if (is_file('inc/'.$_SESSION['cfg_kunde'].'/dse_'.$v_lao.'.rtf')) {
					$vorl_dse='inc/'.$_SESSION['cfg_kunde'].'/dse_'.$v_lao.'.rtf';
					$gef_d=true;
				}
			}
			$aov_gruppe='';
			$res7=$db->select(
				$sql_tab['benutzer_gruppe'],
				array(
					$sql_tabs['benutzer_gruppe']['benutzer_gruppe_id'],
					$sql_tabs['benutzer_gruppe']['bezeichnung']
				),
				$sql_tabs['benutzer_gruppe']['bezeichnung'].' like '.$db->str('AOV%')
			);
			$aov_gef=false;
			while (!$aov_gef and $row7=$db->zeile($res7)) {
				if ($_SESSION['rechte_bgruppen']=='-1' or preg_match('/,'.$row7[0].',/', ','.$_SESSION['rechte_bgruppen'].',')) {
					$aov_gef=true;
					$aov_gruppe=$row7[1];
				}
			}
			if ($aov_gruppe!='') {
				if (is_file('inc/'.$_SESSION['cfg_kunde'].'/dse_'.$aov_gruppe.'.rtf')) {
					$vorl_dse='inc/'.$_SESSION['cfg_kunde'].'/dse_'.$aov_gruppe.'.rtf';
				} elseif (is_file('vorlagen/dse_'.$aov_gruppe.'.rtf')) {
					$vorl_dse='vorlagen/dse_'.$aov_gruppe.'.rtf';
				}
			}
			
			if (is_file(str_replace('.rtf', '.docx', $vorl_dse))) {
				$vorl_dse=str_replace('.rtf', '.docx', $vorl_dse);
				$ist_docx=true;
				
				$datei=$vorl_dse;
				$zieldir1='dokumente/dset_'.$_SESSION['user_id'];
				if (is_dir($zieldir1)) {
					loesche_rrmdir_op($zieldir1);
				}
				clearstatcache();
				if (!is_dir($zieldir1)) {
					mkdir($zieldir1);
				}
				$zieldok='';
				if (is_dir($zieldir1)) {
					include_once('pclzip.lib.php');
					$archive = new PclZip($datei);
					if ($archive->extract(PCLZIP_OPT_PATH, $zieldir1) == 0) {
						echo "Fehler: ".$archive->errorInfo(true);
					}
					if (is_file($zieldir1.'/word/document.xml')) {
							$rinh=file_get_contents($zieldir1.'/word/document.xml');
							$rinh=str_replace('&lt;&lt;', '<<', $rinh);
							$rinh=str_replace('&gt;&gt;', '>>', $rinh);
							if (preg_match_all('/'.preg_quote('&lt;&lt;').'.*'.preg_quote('&gt;&gt;').'/Uis', $rinh, $ma)) {
								while (list($keym, $valm)=@each($ma[0])) {
									$merke_val=$valm;
									$valm=strip_tags($valm);
									$rinh=str_replace($merke_val, $valm, $rinh);
								}
							}
							if ($fp=fopen($zieldir1.'/word/document.xml', 'w')) {
									fwrite($fp, $rinh);
									fclose($fp);
							}
							$zieldok=$zieldir1.'/word/document.xml';
							$vorl_dse=$zieldok;
					}
				}
				
			}
			if ($fp=fopen($vorl_dse, 'r')) {
				$inhalt8=fread($fp, filesize($vorl_dse));
				fclose($fp);
				$inhalt8=vorlage_kdaten_ersetzen($inhalt8, $row5[1], $row5[2], $row5[3], $row5[4], $row5[5]);
				$kdnr1='';
				$lao1='';
				
				$intnr1='';
				$res3=$db->select(
					$sql_tab['stammdaten_mandant'],
					array(
						$sql_tabs['stammdaten_mandant']['nummer2'],
						$sql_tabs['stammdaten_mandant']['lagerort']
					),
					$sql_tabs['stammdaten_mandant']['stammdaten_id'].'='.$db->dbzahl($stid).' and '.
					$sql_tabs['stammdaten_mandant']['mandant_id'].'='.$db->dbzahl($mandid).' and '.
						$sql_tabs['stammdaten_mandant']['nummer2'].'!='.$db->str('')
				);
				if ($row3=$db->zeile($res3)) {
					$intnr1=$row3[0];
				}
				if ($intnr1=='') {
					$res3=$db->select(
					$sql_tab['stammdaten_mandant'],
					array(
						$sql_tabs['stammdaten_mandant']['nummer2'],
						$sql_tabs['stammdaten_mandant']['lagerort']
					),
					$sql_tabs['stammdaten_mandant']['stammdaten_id'].'='.$db->dbzahl($stid).' and '.
						$sql_tabs['stammdaten_mandant']['nummer2'].'!='.$db->str('')
					);
					if ($row3=$db->zeile($res3)) {
						$intnr1=$row3[0];
					}
				}
				
				$res3=$db->select(
					$sql_tab['stammdaten_mandant'],
					array(
						$sql_tabs['stammdaten_mandant']['nummer1'],
						$sql_tabs['stammdaten_mandant']['lagerort']
					),
					$sql_tabs['stammdaten_mandant']['stammdaten_id'].'='.$db->dbzahl($stid).' and '.
					$sql_tabs['stammdaten_mandant']['mandant_id'].'='.$db->dbzahl($mandid).' and '.
						$sql_tabs['stammdaten_mandant']['nummer1'].'!='.$db->str('')
				);
				if ($row3=$db->zeile($res3)) {
					$kdnr1=$row3[0];
					$lao1=$row3[1];
				}
				if ($kdnr1=='') {
				$res3=$db->select(
					$sql_tab['stammdaten_mandant'],
					array(
						$sql_tabs['stammdaten_mandant']['nummer1'],
						$sql_tabs['stammdaten_mandant']['lagerort']
					),
					$sql_tabs['stammdaten_mandant']['stammdaten_id'].'='.$db->dbzahl($stid).' and '.
						$sql_tabs['stammdaten_mandant']['nummer1'].'!='.$db->str('')
				);
				if ($row3=$db->zeile($res3)) {
					$kdnr1=$row3[0];
					$lao1=$row3[1];
				}
				}
				if ($kdnr1=='') {
				$res3=$db->select(
					$sql_tab['stammdaten_mandant'],
					array(
						$sql_tabs['stammdaten_mandant']['nummer2'],
						$sql_tabs['stammdaten_mandant']['lagerort']
					),
					$sql_tabs['stammdaten_mandant']['stammdaten_id'].'='.$db->dbzahl($stid).' and '.
					$sql_tabs['stammdaten_mandant']['mandant_id'].'='.$db->dbzahl($mandid).' and '.
						$sql_tabs['stammdaten_mandant']['nummer2'].'!='.$db->str('')
				);
				if ($row3=$db->zeile($res3)) {
					$kdnr1=$row3[0];
					$lao1=$row3[1];
				}
				}
				if ($kdnr1=='') {
				$res3=$db->select(
					$sql_tab['stammdaten_mandant'],
					array(
						$sql_tabs['stammdaten_mandant']['nummer2'],
						$sql_tabs['stammdaten_mandant']['lagerort']
					),
					$sql_tabs['stammdaten_mandant']['stammdaten_id'].'='.$db->dbzahl($stid).' and '.
						$sql_tabs['stammdaten_mandant']['nummer2'].'!='.$db->str('')
				);
				if ($row3=$db->zeile($res3)) {
					$kdnr1=$row3[0];
					$lao1=$row3[1];
				}
				}
				if ($stid<=0) {
					$kdnr1='';
					$intnr1='';
				}
				$inhalt8=sb_ersetzen('<<kundennr>>', $kdnr1, $inhalt8);
				$inhalt8=sb_ersetzen('<<intnr>>', $intnr1, $inhalt8);
				$inhalt8=sb_ersetzen('<<kunde>>', $anzeigename, $inhalt8);
				$inhalt8=sb_ersetzen('<<adresse>>', $row6[0], $inhalt8);
				$inhalt8=sb_ersetzen('<<plz>>', $row6[1], $inhalt8);
				$inhalt8=sb_ersetzen('<<ort>>', $row6[2], $inhalt8);
				$inhalt8=sb_ersetzen('<<datum>>', adodb_date('d.m.Y'), $inhalt8);
				$inhalt8=sb_ersetzen('<<beruf>>', $row5[6], $inhalt8);
				$anr1=$row5[5];
				if ($anr1=='HERRN' or $anr1=='HERR' or $anr1=='FRAU' or $anr1=='FIRMA') {
					$anr1=p4n_mb_string('ucfirst', p4n_mb_string('strtolower',$anr1));
				}
				$inhalt8=sb_ersetzen('<<anrede>>', $anr1, $inhalt8);
				$inhalt8=sb_ersetzen('<<firma>>', $row5[1], $inhalt8);
				$inhalt8=sb_ersetzen('<<vorname>>', $row5[2], $inhalt8);
				$inhalt8=sb_ersetzen('<<name>>', $row5[3], $inhalt8);
				
				$inhalt8=sb_ersetzen('<<id>>', $stid, $inhalt8);
				$inhalt8=sb_ersetzen('<<titel>>', $row5[4], $inhalt8);
				$inhalt8=sb_ersetzen('<<steuernummer>>', $row5[17], $inhalt8);
				
				$std_tel=$row5[9];
				$std_tel2=$row5[10];
				$inhalt8=sb_ersetzen('<<telefon1>>', $std_tel, $inhalt8);
				$inhalt8=sb_ersetzen('<<telefon2>>', $std_tel2, $inhalt8);
				$inhalt8=sb_ersetzen('<<mobilfon1>>', $row5[11], $inhalt8);
				if ($row5[11]==$row5[12]) {
					$inhalt8=sb_ersetzen('<<mobilfon2>>', '', $inhalt8);
				}
				$inhalt8=sb_ersetzen('<<mobilfon2>>', $row5[12], $inhalt8);
				
				if ($mit_post) {
					$std_tel=$postfeld['telefon'];
					if ($std_tel=='') {
						$std_tel=$postfeld['mobilfon'];
					}
					$std_tel2='';
					if ($postfeld['mobilfon']==$std_tel) {
						$inhalt8=sb_ersetzen('<<mobil1>>', '', $inhalt8);
					}
				}
				
				$inhalt8=sb_ersetzen('<<tel1>>', $std_tel, $inhalt8);
				if (preg_match('/<<tel2>>/', $inhalt8)) {
					if ($std_tel==$std_tel2) {
						$inhalt8=sb_ersetzen('<<tel2>>', '', $inhalt8);
					} else {
						$inhalt8=sb_ersetzen('<<tel2>>', $std_tel2, $inhalt8);
					}
				}
				$inhalt8=sb_ersetzen('<<tel2>>', $std_tel2, $inhalt8);
				if (preg_match('/\./', $row5[7])) {
					$inhalt8=sb_ersetzen('<<geb>>', $row5[7], $inhalt8);
				} else {
					$inhalt8=sb_ersetzen('<<geb>>', $db->unixdate($row5[7]), $inhalt8);
				}
				$inhalt8=sb_ersetzen('<<geburtsort>>', $row5[8], $inhalt8);
				$mobf=$row5[11];
				if ($mobf=='') {
					$mobf=$row5[12];
				}
				$inhalt8=sb_ersetzen('<<mobil1>>', $mobf, $inhalt8);
				if (preg_match('/<<mobil2>>/', $inhalt8)) {
					if ($mobf==$row5[12]) {
						$inhalt8=sb_ersetzen('<<mobil2>>', '', $inhalt8);
					} else {
						$inhalt8=sb_ersetzen('<<mobil2>>', $row5[12], $inhalt8);
					}
				}
				$inhalt8=sb_ersetzen('<<mob1>>', $row5[11], $inhalt8);
				if (preg_match('/<<mob2>>/', $inhalt8)) {
					if ($row5[11]==$row5[12]) {
						$inhalt8=sb_ersetzen('<<mob2>>', '', $inhalt8);
					} else {
						$inhalt8=sb_ersetzen('<<mob2>>', $row5[12], $inhalt8);
					}
				}
				$inhalt8=sb_ersetzen('<<mob2>>', $row5[12], $inhalt8);
				$emailf=$row5[13];
				if ($emailf=='') {
					$emailf=$row5[14];
				}
				$inhalt8=sb_ersetzen('<<email>>', $emailf, $inhalt8);
				$email1=$row5[13];
				$email2=$row5[14];
				$inhalt8=sb_ersetzen('<<email1>>', $email1, $inhalt8);
				if (preg_match('/<<email2>>/', $inhalt8)) {
					if ($row5[13]==$row5[14]) {
						$inhalt8=sb_ersetzen('<<email2>>', '', $inhalt8);
					} else {
						$inhalt8=sb_ersetzen('<<email2>>', $row5[14], $inhalt8);
					}
				}
				$inhalt8=sb_ersetzen('<<email2>>', $email2, $inhalt8);
				$faxf=$row5[15];
				if ($faxf=='') {
					$faxf=$row5[16];
				}
				$inhalt8=sb_ersetzen('<<fax>>', $faxf, $inhalt8);
				$fax1=$row5[15];
				$fax2=$row5[16];
				$inhalt8=sb_ersetzen('<<fax1>>', $fax1, $inhalt8);
				if (preg_match('/<<fax2>>/', $inhalt8)) {
					if ($row5[15]==$row5[16]) {
						$inhalt8=sb_ersetzen('<<fax2>>', '', $inhalt8);
					} else {
						$inhalt8=sb_ersetzen('<<fax2>>', $row5[16], $inhalt8);
					}
				}
				$inhalt8=sb_ersetzen('<<fax2>>', $fax2, $inhalt8);
				
				$inhalt8=sb_ersetzen('<<tel3>>', $row5[21], $inhalt8);
				$inhalt8=sb_ersetzen('<<telefon3>>', $row5[21], $inhalt8);
				$inhalt8=sb_ersetzen('<<mob3>>', $row5[22], $inhalt8);
				$inhalt8=sb_ersetzen('<<mobil3>>', $row5[22], $inhalt8);
				$inhalt8=sb_ersetzen('<<mobilfon3>>', $row5[22], $inhalt8);
				$inhalt8=sb_ersetzen('<<fax3>>', $row5[23], $inhalt8);
				if ($row5[24]=='0') {
					$row5[24]='';
				}
				$inhalt8=sb_ersetzen('<<evanummer>>', $row5[24], $inhalt8);
				$inhalt8=sb_ersetzen('<<eva>>', $row5[24], $inhalt8);
				
				$inhalt8=sb_ersetzen('<<mitarbeiter>>', $_SESSION['mitarbeiter_name2'], $inhalt8);
				$inhalt8=sb_ersetzen('<<mitarbeiter_email>>', $_SESSION['user_email'], $inhalt8);
				$inhalt8=sb_ersetzen('<<mitarbeiter_telefon>>', $_SESSION['benutzer_tel'], $inhalt8);
				$inhalt8=sb_ersetzen('<<mitarbeiter_fax>>', $_SESSION['benutzer_fax'], $inhalt8);
				$inhalt8=sb_ersetzen('<<mitarbeiter_mobilfon>>', $_SESSION['benutzer_mob'], $inhalt8);
				
				$sqlt_bl=array(
						$sql_tabs['stammdaten_blacklist_log']['art'],
						$sql_tabs['stammdaten_blacklist_log']['datum'],
						$sql_tabs['stammdaten_blacklist_log']['benutzer_id'],
						$sql_tabs['stammdaten_blacklist_log']['doclink'],
						$sql_tabs['stammdaten_blacklist_log']['blacklist'],
						$sql_tabs['stammdaten_blacklist_log']['blacklist_zusatz1'],	// 5
						$sql_tabs['stammdaten_blacklist_log']['blacklist_zusatz2'],
						$sql_tabs['stammdaten_blacklist_log']['blacklist_zusatz3'],
						$sql_tabs['stammdaten_blacklist_log']['blacklist_zusatz4'],
						$sql_tabs['stammdaten_blacklist_log']['blacklist_zusatz5'],
						$sql_tabs['stammdaten_blacklist_log']['blacklist_zusatz6'],	// 10
						$sql_tabs['stammdaten_blacklist_log']['blacklist_zusatztext4'],
						$sql_tabs['stammdaten_blacklist_log']['blacklist_brief'],
						$sql_tabs['stammdaten_blacklist_log']['blacklist_email'],
						$sql_tabs['stammdaten_blacklist_log']['blacklist_sms'],
						$sql_tabs['stammdaten_blacklist_log']['blacklist_fax'],		// 15
						$sql_tabs['stammdaten_blacklist_log']['blacklist_festnetz'],
						$sql_tabs['stammdaten_blacklist_log']['blacklist_mobilfon'],
						$sql_tabs['stammdaten_blacklist_log']['blacklist_ablehnung'],
						$sql_tabs['stammdaten_blacklist_log']['blacklist_bemerkung'],
						$sql_tabs['stammdaten_blacklist_log']['mandant_id'],		// 20
						$sql_tabs['stammdaten_blacklist_log']['markencode'],
						$sql_tabs['stammdaten_blacklist_log']['blacklist_festnetz_g'],
						$sql_tabs['stammdaten_blacklist_log']['blacklist_mobilfon_g'],
						$sql_tabs['stammdaten_blacklist_log']['blacklist_dritte_wer'],
						$sql_tabs['stammdaten_blacklist_log']['stammdaten_blacklist_log_id']		// 25
				);
				if (isset($sql_tabs['stammdaten_blacklist_log']['blacklist_opel_post'])) {
					$sqlt_bl[]=$sql_tabs['stammdaten_blacklist_log']['blacklist_opel_post'];		// 26
					$sqlt_bl[]=$sql_tabs['stammdaten_blacklist_log']['blacklist_opel_email'];
					$sqlt_bl[]=$sql_tabs['stammdaten_blacklist_log']['blacklist_opel_telefon'];
					$sqlt_bl[]=$sql_tabs['stammdaten_blacklist_log']['blacklist_opel_mobilfon'];
					$sqlt_bl[]=$sql_tabs['stammdaten_blacklist_log']['blacklist_opel_fax'];			// 30
					$sqlt_bl[]=$sql_tabs['stammdaten_blacklist_log']['blacklist_opel_smsmms'];
					$sqlt_bl[]=$sql_tabs['stammdaten_blacklist_log']['blacklist_opel_hersteller'];
					$sqlt_bl[]=$sql_tabs['stammdaten_blacklist_log']['blacklist_opel_sperre_ah'];
				}
				$res4=$db->select(
					$sql_tab['stammdaten_blacklist_log'],
					$sqlt_bl,
					$sql_tabs['stammdaten_blacklist_log']['stammdaten_id'].'='.$db->dbzahl($stid),
					$sql_tabs['stammdaten_blacklist_log']['datum'].' desc'
				);
				$dsdef1=false;
				$dsdef2=false;
				$dsdef2a=false;
				$dsdef2b=false;
				$dsdef2c=false;
				$dsdef2d=false;
				$dsdef3=false;
				$dsdef3a=false;
				$dsdef3b=false;
				$dsdef3c=false;
				$dsdef3d=false;
				$dsdef4=false;
				$dsdef5=false;
				$dsdef6=false;
				$dsdef7=false;
				$dsdefn=false;
				$dsdefbem=false;
				$dsdef4w='';
				
				$dsdefo1=false;
				$dsdefo2=false;
				$dsdefo3=false;
				$dsdefo4=false;
				$dsdefo5=false;
				$dsdefo6=false;
				
				$dsdefo1h=false;
				$dsdefo2h=false;
				$dsdefo3h=false;
				$dsdefo4h=false;
				$dsdefo5h=false;
				$dsdefo6h=false;
				$dsdefows='';
				$dsdefoher='';
				
				while ($stid>0 and $row4=$db->zeile($res4)) {
					if ($row4[0]=='3' and !isset($akt_dse)) {
						$akt_dse=1;
						$dsdef_dat=$db->unixdatetime($row4[1]);
						
						if (isset($row4[26])) {
							if ($row4[26]=='Allgemein') {
								$dsdefo1=true;
								$dsdefo1h=true;
							} elseif ($row4[26]=='Händler') {
								$dsdefo1=true;
							} elseif ($row4[26]=='nur Hersteller') {
								$dsdefo1h=true;
							}
						}
						if (isset($row4[27])) {
							if ($row4[27]=='Allgemein') {
								$dsdefo2=true;
								$dsdefo2h=true;
							} elseif ($row4[27]=='Händler') {
								$dsdefo2=true;
							} elseif ($row4[27]=='nur Hersteller') {
								$dsdefo2h=true;
							}
						}
						if (isset($row4[28])) {
							if ($row4[28]=='Allgemein') {
								$dsdefo3=true;
								$dsdefo3h=true;
							} elseif ($row4[28]=='Händler') {
								$dsdefo3=true;
							} elseif ($row4[28]=='nur Hersteller') {
								$dsdefo3h=true;
							}
						}
						if (isset($row4[29])) {
							if ($row4[29]=='Allgemein') {
								$dsdefo4=true;
								$dsdefo4h=true;
							} elseif ($row4[29]=='Händler') {
								$dsdefo4=true;
							} elseif ($row4[29]=='nur Hersteller') {
								$dsdefo4h=true;
							}
						}
						if (isset($row4[30])) {
							if ($row4[30]=='Allgemein') {
								$dsdefo5=true;
								$dsdefo5h=true;
							} elseif ($row4[30]=='Händler') {
								$dsdefo5=true;
							} elseif ($row4[30]=='nur Hersteller') {
								$dsdefo5h=true;
							}
						}
						if (isset($row4[31])) {
							if ($row4[31]=='Allgemein') {
								$dsdefo6=true;
								$dsdefo6h=true;
							} elseif ($row4[31]=='Händler') {
								$dsdefo6=true;
							} elseif ($row4[31]=='nur Hersteller') {
								$dsdefo6h=true;
							}
						}
						if (isset($row4[32])) {
							$dsdefows=$row4[33];
							$dsdefoher=$row4[32];
						}
						if ($row4[5]=='1') {
							$dsdef1=true;
						}
						if ($row4[6]=='1') {
							$dsdef2=true;
						}
						if ($row4[12]=='1') {
							$dsdef2a=true;
						}
						if ($row4[13]=='1') {
							$dsdef2b=true;
						}
						if ($row4[14]=='1') {
							$dsdef2c=true;
						}
						if ($row4[15]=='1') {
							$dsdef2d=true;
						}
						if ($row4[7]=='1') {
							$dsdef3=true;
						}
						if ($row4[16]=='1') {
							$dsdef3a=true;
						}
						if ($row4[17]=='1') {
							$dsdef3b=true;
						}
						if ($row4[22]=='1') {
							$dsdef3c=true;
						}
						if ($row4[23]=='1') {
							$dsdef3d=true;
						}
						if ($row4[8]=='1') {
							$dsdef4=true;
						}
						if ($row4[9]=='1') {
							$dsdef5=true;
						}
						if ($row4[10]=='1') {
							$dsdef6=true;
						}
						if ($row4[11]=='1') {
							$dsdef7=true;
						}
						if ($row4[18]=='1') {
							$dsdefn=true;
						}
						$dsdefbem=$row4[19];
						$dsdef4w=$row4[24];
					}
				}
				
				$inhalt8=sb_ersetzen('<<dseo1ah>>', dse_rtf_wert($dsdefo1), $inhalt8);
				$inhalt8=sb_ersetzen('<<dseo1h>>', dse_rtf_wert($dsdefo1h), $inhalt8);
				$inhalt8=sb_ersetzen('<<dseo2ah>>', dse_rtf_wert($dsdefo2), $inhalt8);
				$inhalt8=sb_ersetzen('<<dseo2h>>', dse_rtf_wert($dsdefo2h), $inhalt8);
				$inhalt8=sb_ersetzen('<<dseo3ah>>', dse_rtf_wert($dsdefo3), $inhalt8);
				$inhalt8=sb_ersetzen('<<dseo3h>>', dse_rtf_wert($dsdefo3h), $inhalt8);
				$inhalt8=sb_ersetzen('<<dseo4ah>>', dse_rtf_wert($dsdefo4), $inhalt8);
				$inhalt8=sb_ersetzen('<<dseo4h>>', dse_rtf_wert($dsdefo4h), $inhalt8);
				$inhalt8=sb_ersetzen('<<dseo5ah>>', dse_rtf_wert($dsdefo5), $inhalt8);
				$inhalt8=sb_ersetzen('<<dseo5h>>', dse_rtf_wert($dsdefo5h), $inhalt8);
				$inhalt8=sb_ersetzen('<<dseo6ah>>', dse_rtf_wert($dsdefo6), $inhalt8);
				$inhalt8=sb_ersetzen('<<dseo6h>>', dse_rtf_wert($dsdefo6h), $inhalt8);
				$inhalt8=sb_ersetzen('<<dseows>>', $dsdefows, $inhalt8);
				$inhalt8=sb_ersetzen('<<dseoher>>', $dsdefoher, $inhalt8);
				
				$inhalt8=sb_ersetzen('<<dse1>>', dse_rtf_wert($dsdef1), $inhalt8);
				$inhalt8=sb_ersetzen('<<dse2>>', dse_rtf_wert($dsdef2), $inhalt8);
				$inhalt8=sb_ersetzen('<<dse2a>>', dse_rtf_wert($dsdef2a), $inhalt8);
				
//			$inhalt8=str_replace('<<dse2b>>', dse_rtf_wert($dsdef2b), $inhalt8);
//			$inhalt8=str_replace('<<dse2c>>', dse_rtf_wert($dsdef2c), $inhalt8);
				$inhalt8=sb_ersetzen('<<dse2b>>', dse_rtf_wert($dsdef2b), $inhalt8);
				$inhalt8=sb_ersetzen('<<dse2c>>', dse_rtf_wert($dsdef2c), $inhalt8);
				
				$inhalt8=sb_ersetzen('<<dse2d>>', dse_rtf_wert($dsdef2d), $inhalt8);
				$inhalt8=sb_ersetzen('<<dse3>>', dse_rtf_wert($dsdef3), $inhalt8);
				$inhalt8=sb_ersetzen('<<dse3a>>', dse_rtf_wert($dsdef3a), $inhalt8);
				$inhalt8=sb_ersetzen('<<dse3b>>', dse_rtf_wert($dsdef3b), $inhalt8);
				$inhalt8=sb_ersetzen('<<dse3c>>', dse_rtf_wert($dsdef3c), $inhalt8);
				$inhalt8=sb_ersetzen('<<dse3d>>', dse_rtf_wert($dsdef3d), $inhalt8);
				$inhalt8=sb_ersetzen('<<dse4>>', dse_rtf_wert($dsdef4), $inhalt8);
				$inhalt8=sb_ersetzen('<<dse5>>', dse_rtf_wert($dsdef5), $inhalt8);
				$inhalt8=sb_ersetzen('<<dse6>>', dse_rtf_wert($dsdef6), $inhalt8);
				$inhalt8=sb_ersetzen('<<dse7>>', dse_rtf_wert($dsdef7), $inhalt8);
				$inhalt8=sb_ersetzen('<<dsen>>', dse_rtf_wert($dsdefn), $inhalt8);
				
				$ist_telbeide=false;
				if ($dsdef3a and $dsdef3c) {
					$ist_telbeide=true;
				}
				$inhalt8=sb_ersetzen('<<dse3ac>>', dse_rtf_wert($ist_telbeide), $inhalt8);
				$inhalt8=sb_ersetzen('<<ndse3ac>>', dse_rtf_wert(!$ist_telbeide), $inhalt8);
				
				$ist_mobbeide=false;
				if ($dsdef3b and $dsdef3d) {
					$ist_mobbeide=true;
				}
				$inhalt8=sb_ersetzen('<<dse3bd>>', dse_rtf_wert($ist_mobbeide), $inhalt8);
				$inhalt8=sb_ersetzen('<<ndse3bd>>', dse_rtf_wert(!$ist_mobbeide), $inhalt8);
				
				$inhalt8=sb_ersetzen('<<ndse1>>', dse_rtf_wert(!$dsdef1), $inhalt8);
				$inhalt8=sb_ersetzen('<<ndse2>>', dse_rtf_wert(!$dsdef2), $inhalt8);
				$inhalt8=sb_ersetzen('<<ndse2a>>', dse_rtf_wert(!$dsdef2a), $inhalt8);
				$inhalt8=sb_ersetzen('<<ndse2b>>', dse_rtf_wert(!$dsdef2b), $inhalt8);
				$inhalt8=sb_ersetzen('<<ndse2c>>', dse_rtf_wert(!$dsdef2c), $inhalt8);
				$inhalt8=sb_ersetzen('<<ndse2d>>', dse_rtf_wert(!$dsdef2d), $inhalt8);
				$inhalt8=sb_ersetzen('<<ndse3>>', dse_rtf_wert(!$dsdef3), $inhalt8);
				$inhalt8=sb_ersetzen('<<ndse3a>>', dse_rtf_wert(!$dsdef3a), $inhalt8);
				$inhalt8=sb_ersetzen('<<ndse3b>>', dse_rtf_wert(!$dsdef3b), $inhalt8);
				$inhalt8=sb_ersetzen('<<ndse3c>>', dse_rtf_wert(!$dsdef3c), $inhalt8);
				$inhalt8=sb_ersetzen('<<ndse3d>>', dse_rtf_wert(!$dsdef3d), $inhalt8);
				$inhalt8=sb_ersetzen('<<ndse4>>', dse_rtf_wert(!$dsdef4), $inhalt8);
				$inhalt8=sb_ersetzen('<<ndse5>>', dse_rtf_wert(!$dsdef5), $inhalt8);
				$inhalt8=sb_ersetzen('<<ndse6>>', dse_rtf_wert(!$dsdef6), $inhalt8);
				$inhalt8=sb_ersetzen('<<ndse7>>', dse_rtf_wert(!$dsdef7), $inhalt8);
				$inhalt8=sb_ersetzen('<<ndsen>>', dse_rtf_wert(!$dsdefn), $inhalt8);
				
				$inhalt8=sb_ersetzen('<<dse_bem>>', $dsdefbem, $inhalt8);
				$inhalt8=sb_ersetzen('<<dse4a>>', $dsdef4w, $inhalt8);
				$inhalt8=sb_ersetzen('<<dse_datum>>', $dsdef_dat, $inhalt8);
				
				$sqltm=array(
							$sql_tabs['mandant']['firma'],
							$sql_tabs['mandant']['adresse'],
							$sql_tabs['mandant']['plz'],
							$sql_tabs['mandant']['ort'],
							$sql_tabs['mandant']['briefkopf'],
							$sql_tabs['mandant']['parent_id']
				);
				if (isset($sql_tabs['mandant']['telefon'])) {
						$sqltm[]=$sql_tabs['mandant']['telefon'];
						$sqltm[]=$sql_tabs['mandant']['fax'];
						$sqltm[]=$sql_tabs['mandant']['email'];
						$sqltm[]=$sql_tabs['mandant']['internet'];
						$sqltm[]=$sql_tabs['mandant']['dealercode'];
                        if ($_SESSION['crm_version']>61 && isset($sql_tabs['mandant']['fusszeile'])) {
                            $sqltm[]=$sql_tabs['mandant']['fusszeile'];
                            $sqltm[]=$sql_tabs['mandant']['link1'];
                            $sqltm[]=$sql_tabs['mandant']['link2'];
                            $sqltm[]=$sql_tabs['mandant']['link3'];
                        }
				}
				$res4=$db->select(
						$sql_tab['mandant'],
						$sqltm,
						$sql_tabs['mandant']['mandant_id'].'='.$db->dbzahl($laoid)
				);
				$row4=$db->zeile($res4);
				$mandinfo[$laoid]=$row4;
				$std_lao=$laoid;
				
				$res4=$db->select(
							$sql_tab['mandant'],
							$sqltm,
							$sql_tabs['mandant']['mandant_id'].'='.$db->dbzahl($mandid)
				);
				$row4=$db->zeile($res4);
				$mandinfo[$mandid]=$row4;
				$std_mand=$mandid;
				
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n(_LAGERORT_.'_'._BEZEICHNUNG_).'>>/', $mandinfo[$std_lao][0], $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n(_LAGERORT_.'_'._ADRESSE_).'>>/', $mandinfo[$std_lao][1], $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n(_LAGERORT_.'_'._PLZ_).'>>/', $mandinfo[$std_lao][2], $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n(_LAGERORT_.'_'._ORT_).'>>/', $mandinfo[$std_lao][3], $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n(_LAGERORT_.'_'._BRIEFKOPF_).'>>/', str_replace(array("\n", '<br>'), '\\par ', $mandinfo[$std_lao][4]), $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n(_LAGERORT_.'_'._TELEFON2_).'>>/', $mandinfo[$std_lao][6], $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n(_LAGERORT_.'_'._FAX_).'>>/', $mandinfo[$std_lao][7], $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n(_LAGERORT_.'_'._EMAIL_).'>>/', $mandinfo[$std_lao][8], $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n(_LAGERORT_.'_'._WWW_).'>>/', $mandinfo[$std_lao][9], $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n(_LAGERORT_.'_'._NUMMER_).'>>/', $mandinfo[$std_lao][10], $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n(_LAGERORT_.'_'._FOOTER_).'>>/', str_replace(array("\n", '<br>'), '\\par ', $mandinfo[$std_lao][11]), $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n(_LAGERORT_.'_'._LINK_UPPERCASE_.'1').'>>/', $mandinfo[$std_lao][12], $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n(_LAGERORT_.'_'._LINK_UPPERCASE_.'2').'>>/', $mandinfo[$std_lao][13], $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n(_LAGERORT_.'_'._LINK_UPPERCASE_.'3').'>>/', $mandinfo[$std_lao][14], $inhalt8);

			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n(_MANDANT_.'_'._BEZEICHNUNG_).'>>/', $mandinfo[$std_mand][0], $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n(_MANDANT_.'_'._ADRESSE_).'>>/', $mandinfo[$std_mand][1], $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n(_MANDANT_.'_'._PLZ_).'>>/', $mandinfo[$std_mand][2], $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n(_MANDANT_.'_'._ORT_).'>>/', $mandinfo[$std_mand][3], $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n(_MANDANT_.'_'._BRIEFKOPF_).'>>/', str_replace(array("\n", '<br>'), '\\par ', $mandinfo[$std_mand][4]), $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n(_MANDANT_.'_'._TELEFON2_).'>>/', $mandinfo[$std_mand][6], $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n(_MANDANT_.'_'._FAX_).'>>/', $mandinfo[$std_mand][7], $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n(_MANDANT_.'_'._EMAIL_).'>>/', $mandinfo[$std_mand][8], $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n(_MANDANT_.'_'._WWW_).'>>/', $mandinfo[$std_mand][9], $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n(_MANDANT_.'_'._NUMMER_).'>>/', $mandinfo[$std_mand][10], $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n(_MANDANT_.'_'._FOOTER_).'>>/', str_replace(array("\n", '<br>'), '\\par ', $mandinfo[$std_mand][11]), $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n(_MANDANT_.'_'._LINK_UPPERCASE_.'1').'>>/', $mandinfo[$std_mand][12], $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n(_MANDANT_.'_'._LINK_UPPERCASE_.'2').'>>/', $mandinfo[$std_mand][13], $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n(_MANDANT_.'_'._LINK_UPPERCASE_.'3').'>>/', $mandinfo[$std_mand][14], $inhalt8);
			
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n('lagerort_bezeichnung').'>>/', $mandinfo[$std_lao][0], $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n('lagerort_adresse').'>>/', $mandinfo[$std_lao][1], $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n('lagerort_plz').'>>/', $mandinfo[$std_lao][2], $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n('lagerort_ort').'>>/', $mandinfo[$std_lao][3], $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n('lagerort_briefkopf').'>>/', str_replace(array("\n", '<br>'), '\\par ', $mandinfo[$std_lao][4]), $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n('lagerort_telefon').'>>/', $mandinfo[$std_lao][6], $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n('lagerort_fax').'>>/', $mandinfo[$std_lao][7], $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n('lagerort_email').'>>/', $mandinfo[$std_lao][8], $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n('lagerort_www').'>>/', $mandinfo[$std_lao][9], $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n('lagerort_nummer').'>>/', $mandinfo[$std_lao][10], $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n('lagerort_footer').'>>/', str_replace(array("\n", '<br>'), '\\par ', $mandinfo[$std_lao][11]), $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n('lagerort_link1').'>>/', $mandinfo[$std_lao][12], $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n('lagerort_link2').'>>/', $mandinfo[$std_lao][13], $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n('lagerort_link3').'>>/', $mandinfo[$std_lao][14], $inhalt8);
			
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n('mandant_bezeichnung').'>>/', $mandinfo[$std_mand][0], $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n('mandant_adresse').'>>/', $mandinfo[$std_mand][1], $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n('mandant_plz').'>>/', $mandinfo[$std_mand][2], $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n('mandant_ort').'>>/', $mandinfo[$std_mand][3], $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n('mandant_briefkopf').'>>/', str_replace(array("\n", '<br>'), '\\par ', $mandinfo[$std_mand][4]), $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n('mandant_telefon').'>>/', $mandinfo[$std_mand][6], $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n('mandant_fax').'>>/', $mandinfo[$std_mand][7], $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n('mandant_email').'>>/', $mandinfo[$std_mand][8], $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n('mandant_www').'>>/', $mandinfo[$std_mand][9], $inhalt8);
			$inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n('mandant_nummer').'>>/', $mandinfo[$std_mand][10], $inhalt8);
            $inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n('mandant_footer').'>>/', str_replace(array("\n", '<br>'), '\\par ', $mandinfo[$std_mand][11]), $inhalt8);
            $inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n('mandant_link1').'>>/', $mandinfo[$std_mand][12], $inhalt8);
            $inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n('mandant_link2').'>>/', $mandinfo[$std_mand][13], $inhalt8);
            $inhalt8=preg_replace('/<<'.bef_format_kfzs_p4n('mandant_link3').'>>/', $mandinfo[$std_mand][14], $inhalt8);
            
				
				
				
				
				if (preg_match('/<<haendler/', $inhalt8)) {
							
							$res5=$db->select(
								$sql_tab['mandant'],
								array(
									$sql_tabs['mandant']['bezeichnung'],
									$sql_tabs['mandant']['firma'],
									$sql_tabs['mandant']['adresse'],
									$sql_tabs['mandant']['plz'],
									$sql_tabs['mandant']['ort'],
									$sql_tabs['mandant']['dealercode'],
									$sql_tabs['mandant']['telefon'],
									$sql_tabs['mandant']['fax'],
									$sql_tabs['mandant']['email'],
									$sql_tabs['mandant']['internet']
								),
								$sql_tabs['mandant']['mandant_id'].'='.$db->dbzahl($mandid)
							);
							$row5=$db->zeile($res5);
							$mbez1=$row5[1];
							if ($mbez1=='') {
								$mbez1=$row5[0];
							}
							$inhalt8=sb_ersetzen('<<haendlername>>', $row5[1], $inhalt8);
							$inhalt8=sb_ersetzen('<<haendlerstrasse>>', $row5[2], $inhalt8);
							$inhalt8=sb_ersetzen('<<haendlerplz>>', $row5[3], $inhalt8);
							$inhalt8=sb_ersetzen('<<haendlerort>>', $row5[4], $inhalt8);
							$inhalt8=sb_ersetzen('<<haendlernr>>', $row5[5], $inhalt8);
							$inhalt8=sb_ersetzen('<<haendlertelefon>>', $row5[6], $inhalt8);
							$inhalt8=sb_ersetzen('<<haendlerfax>>', $row5[7], $inhalt8);
							$inhalt8=sb_ersetzen('<<haendleremail>>', $row5[8], $inhalt8);
							$inhalt8=sb_ersetzen('<<haendlerwww>>', $row5[9], $inhalt8);
				}
				$inhalt8=sb_ersetzen('<<datum>>', adodb_date('d.m.Y'), $inhalt8);
				
				if (isset($cfg_dse_zf_marken)) {
					$alle_mzdse=array();
					$res7=$db->select(
						$sql_tab['stammdaten_zusatz'],
						$sql_tabs['stammdaten_zusatz']['zusatz_id'],
						$sql_tabs['stammdaten_zusatz']['bezeichnung'].'='.$db->str('Drittweitergabe Hersteller')
					);
					if ($row7=$db->zeile($res7)) {
						$res8=$db->select(
							$sql_tab['zusatzfelder'],
							array(
								'zf_'.$row7[0]
							),
							$sql_tabs['zusatzfelder']['stammdaten_id'].'='.$db->dbzahl($stid)
						);
						if ($row8=$db->zeile($res8)) {
							$xpl1m=explode(';', $row8[0]);
							while (list($keym, $valm)=@each($xpl1m)) {
								$alle_mzdse[$valm]=1;
							}
						}
					}
					@reset($cfg_dse_zf_marken);
					while (list($keym, $valm)=@each($cfg_dse_zf_marken)) {
						$vorausw=false;
						if (isset($alle_mzdse[$valm])) {
							$vorausw=true;
						}
						$inhalt8=sb_ersetzen('<<dm_'.$valm.'>>', dse_rtf_wert($vorausw), $inhalt8);
					}
				}
				
				$inhalt8=sb_ersetzen('<<lagerort>>', $lao1, $inhalt8);
				
				if (preg_match('/<<qrcode>>/Ui', $inhalt8)) {
					if (is_file('inc/phpqrcode.php') and isset($cfg_kfzsuche_qrcodelink)) {
						include_once('inc/phpqrcode.php');
						$linkqr=$cfg_kfzsuche_qrcodelink;
						$linkqr=str_replace('<<firma>>', $row5[1], $linkqr);
						$linkqr=str_replace('<<vorname>>', $row5[2], $linkqr);
						$linkqr=str_replace('<<name>>', $row5[3], $linkqr);
						$linkqr=str_replace('<<adresse>>', $row6[0], $linkqr);
						$linkqr=str_replace('<<plz>>', $row6[1], $linkqr);
						$linkqr=str_replace('<<ort>>', $row6[2], $linkqr);
						
						$linkqr=str_replace('<<art>>', '66', $linkqr);
						$linkqr=str_replace('<<datum>>', adodb_date('dmY'), $linkqr);
						$linkqr=str_replace('<<fgnr>>', '', $linkqr);
						$laobez2=substr($lao1, 1);
						$linkqr=str_replace('<<lagerort2>>', $laobez2, $linkqr);
						$linkqr=str_replace('<<kundennr>>', $kdnr1, $linkqr);
						
						$linkqr=str_replace('<<datum2>>', adodb_date('d.m.Y'), $linkqr);
						$linkqr=str_replace('<<kundennr2>>', $merke_vpnr, $linkqr);
						$linkqr=str_replace('<<mandantid>>', $merke_mand, $linkqr);
						
						QRcode::jpg($linkqr, 'temp/_qr_'.$_SESSION['user_id'].'.jpg');
						$bildinh=file_get_contents('temp/_qr_'.$_SESSION['user_id'].'.jpg');
						$bildinh2=bin2hex($bildinh);
						$inhalt8=p4n_mb_string('str_replace', '<<qrcode>>', '{\\pict \\picscalex85\\picscaley85\\jpegblip '.$bildinh2.' } ', $inhalt8);
						unlink('temp/_qr_'.$_SESSION['user_id'].'.jpg');
					}
				}
				
				if ($_SESSION['cfg_kunde']=='carlo_opel_tamsen') {
					include_once('inc/lib_phpbarcode.php');
					$img_bc=barcode39('*'.$lao1.'XYZ'.$kdnr1.'*', 300, 80, 100, 'JPEG', 0, array('filepath' => 'temp/barcode_'.$_SESSION['user_id'].'.jpg'));
					$barc1=bin2hex(file_get_contents('temp/barcode_'.$_SESSION['user_id'].'.jpg'));
					@unlink('temp/barcode_'.$_SESSION['user_id'].'.jpg');
					$inhalt8=sb_ersetzen('<<barcode1>>', '{\\pict \\picscalex55\\picscaley55\\jpegblip '.$barc1.' } ', $inhalt8);
				}
				
				$doclink81='dse_'.$_SESSION['user_id'].'.rtf';
				$doclink8='temp/'.$doclink81;
				
				if ($ist_docx) {
					$inhalt8=str_replace("\r".'\\par ', '<w:br/>', $inhalt8);
					$inhalt8=str_replace("\n".'\\par ', '<w:br/>', $inhalt8);
					$inhalt8=str_replace('\\par '."\n", '<w:br/>', $inhalt8);
					$inhalt8=str_replace('\\par ', '<w:br/>', $inhalt8);
					$inhalt8=str_replace('<<<', '&lt;&lt;<', $inhalt8);
					$inhalt8=str_replace('<<', '&lt;&lt;', $inhalt8);
					$inhalt8=str_replace('>>>', '>&gt;&gt;', $inhalt8);
					$inhalt8=str_replace('>>', '&gt;&gt;', $inhalt8);
					$inhalt8=str_replace('<w:t&gt;&gt;>', '<w:t>&gt;&gt;', $inhalt8);
					
					$doclink81='dse_'.$_SESSION['user_id'].'.docx';
					$doclink8='temp/'.$doclink81;
					if ($fp=fopen($zieldir1.'/word/document.xml', 'w')) {
						fwrite($fp, $inhalt8);
						fclose($fp);
						$flist='';
						$x=array();
						dirinhalt_sbrief_outp($zieldir1);
						while (list($key, $val)=@each($x)) {
							while (list($key2, $val2)=@each($val)) {
								$flist.=$key.'/'.$val2.',';
							}
						}
						include_once('pclzip.lib.php');
						$tempd='temp/dsedocx_'.$_SESSION['user_id'];
						if (is_file($tempd)) {
							unlink($tempd);
						}
						$archive=new PclZip($tempd);
						$v_list=$archive->add(p4n_mb_string('substr',$flist, 0, -1), PCLZIP_OPT_REMOVE_PATH, $zieldir1);
						if ($v_list == 0) {
							die('ZIP-Fehler');
						}
						$returntext=file_get_contents($tempd);
						unlink($tempd);
						
						$inhalt8=$returntext;
					}
				}
				
		if (isset($sql_tabs['benutzer']['rtf2pdf'])) {
			$res6=$db->select(
				$sql_tab['benutzer'],
				$sql_tabs['benutzer']['rtf2pdf'],
				$sql_tabs['benutzer']['benutzer_id'].'='.$db->dbzahl($_SESSION['user_id'])
			);
			if ($row6=$db->zeile($res6)) {
				if ($row6[0]=='') {
					
				} elseif (intval($row6[0])==0) {
					$cfg_rtf2pdf=false;
					$cfg_rtf2pdf_udc=false;
				}
				if (intval($row6[0])=='1') {
					$cfg_rtf2pdf=true;
					$cfg_rtf2pdf_udc=true;
				}
			}
		}
				
				if ($fp=fopen($doclink8, 'w')) {
					fwrite($fp, $inhalt8);
					fclose($fp);
					
					if ($cfg_rtf2pdf) {
						$doclink8pdf=check_rtf2pdf($doclink8, $cfg_rtf2pdf_sleep);
						if ($doclink8pdf==$doclink8) {
							$doclink8pdf='';
						} else {
							$doclink8=$doclink8pdf;
							$doclink81=str_replace('.rtf', '.pdf', $doclink81);
						}
					}
					
					tempdateien($doclink8, $doclink81, p4n_mb_string('str_replace', '.', '', _DSE_DRUCK_).'_'.kundenbezeichnung($stid));
					if ($oeffnen) {
						if ($_SESSION['cfg_kunde']=='carlo_opel_hiro') {
							link_dok_oeffnen($doclink8);
							echo javas('window.open("'.$doclink8.'?t='.time().'", "_blank");');
						} else {
						//echo javas('window.open("'.$doclink8.'?t='.time().'", "_blank");');
							echo javas('
    function downloadURL(url) {
        var rv = -1;
        if (navigator.appName == "Microsoft Internet Explorer") {
          var ua = navigator.userAgent;
          var re  = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
          if (re.exec(ua) != null)
            rv = parseFloat( RegExp.$1 );
        } else if (navigator.appName == "Netscape") {
            var ua = navigator.userAgent;
            var re  = new RegExp("Trident/.*rv:([0-9]{1,}[\.0-9]{0,})");
            if (re.exec(ua) != null)
            rv = parseFloat( RegExp.$1 );
        }
        if (rv=="8" || rv=="7") {
            var hiddenIFrameID = \'hiddenDownloader\',
                iframe = document.getElementById(hiddenIFrameID);
            if (iframe === null) {
                iframe = document.createElement(\'iframe\');
                iframe.id = hiddenIFrameID;
                iframe.style.display = \'none\';
                document.body.appendChild(iframe);
            }
            iframe.src = url;
            } else {
            window.open(\''.$doclink8.'?t='.time().'\', \'_blank\');
        }
    };

    downloadURL("'.$doclink8.'?t='.time().'");
');
						}
					}
				}
			}
			return $doclink8;
	}
	
	function dse_rtf_wert($t) {
		global $ist_docx;
		
		if ($ist_docx) {
			if ($t) {
				return '<w:sym w:char="F0FD" w:font="Wingdings"/>';
			}
			return '<w:sym w:char="F0A8" w:font="Wingdings"/>';
		}
		
		if ($t) {
			return '{\rtlch\fcs1 \af0\afs20 \ltrch\fcs0 \f239\fs20\insrsid5789944 {\field{\*\fldinst SYMBOL 253 \\\\f "Wingdings" \\\\s 10}{\fldrslt\f10\fs20}}}';//p4n_mb_string('html_entity_decode', '&#9746;', ENT_NOQUOTES, 'UTF-8');
		} else {
			return '{\rtlch\fcs1 \af0\afs20 \ltrch\fcs0 \f239\fs20\insrsid5789944 {\field{\*\fldinst SYMBOL 168 \\\\f "Wingdings" \\\\s 10}{\fldrslt\f10\fs20}}}';//p4n_mb_string('html_entity_decode', '&#9633;', ENT_NOQUOTES, 'UTF-8');
		}
	}
	
	function dok_korr_sp($dat1, $kat='', $bas1='dokumente_korrespondenz/', $ts=0) {
		$z1='';
		if ($kat!='') {
			if (!is_dir($bas1.$kat)) {
				mkdir($bas1.$kat);
			}
			if (is_dir($bas1.$kat)) {
				$z1=$kat.'/';
			}
		}
		$d1=adodb_date('Y_m', time());
        if ($ts>0) {
			$d1=adodb_date('Y_m', $ts);
		}
		if (!is_dir($bas1.$z1.$d1)) {
			mkdir($bas1.$z1.$d1);
		}
		if (is_dir($bas1.$z1.$d1)) {
			while (is_file($bas1.$z1.$d1.'/'.$dat1)) {
				$dat1='1'.$dat1;
			}
			return $z1.$d1.'/'.$dat1;
		}
		while (is_file($bas1.$dat1)) {
			$dat1='1'.$dat1;
		}
		return $dat1;
	}
    
    function dok_korr_filename($dat1, $kat='', $bas1='dokumente_korrespondenz/', $ts=0) {
		$z1='';
		if ($kat!='') {
			if (!is_dir($bas1.$kat)) {
				mkdir($bas1.$kat);
			}
			if (is_dir($bas1.$kat)) {
				$z1=$kat.'/';
			}
		}
        $timestamp = time();
        if ($ts>0) {
			$timestamp=$ts;
		}
		$d1=adodb_date('Y_m', $timestamp);
		
		if (!is_dir($bas1.$z1.$d1)) {
			mkdir($bas1.$z1.$d1);
		}
		if (is_dir($bas1.$z1.$d1)) {
            $urpsrung_dat = $dat1;
            $i = '';
			while (is_file($bas1.$z1.$d1.'/'.$dat1)) {
				$dat1=adodb_date('Y_m_d_H_i_s', $timestamp).$i.'_'.$urpsrung_dat;
                if ($i=='') {
                    $i = 0;
                }
                $i++;
			}
			return $z1.$d1.'/'.$dat1;
		}
        $urpsrung_dat = $dat1;
        $i = '';
		while (is_file($bas1.$dat1)) {
			$dat1=adodb_date('Y_m_d_H_i_s').$i.'_'.$urpsrung_dat;
            if ($i=='') {
                $i = 0;
            }
            $i++;
		}
		return $dat1;
	}
	
	function textuebergabe_url($t) {
			$t=p4n_mb_string('str_replace', array("'", '"'), '', p4n_mb_string('utf8_decode', $t));
			$t=p4n_mb_string('str_replace', '&amp;', '&', $t);
			$t=urlencode($t);
			return $t;
	}
	
	function sensus_land_benutzer($stid) {
		global $sql_tab, $sql_tabs, $sql_meta, $db, $cfg_lead_todo;
		
		$landcode='';
		$res=$db->select(
			$sql_tab['stammdaten_adresse'],
			array(
				$sql_tabs['stammdaten_adresse']['land'],
				$sql_tabs['stammdaten_adresse']['laendercode']
			),
			$sql_tabs['stammdaten_adresse']['stammdaten_id'].'='.$db->dbzahl($stid)
		);
		if ($row=$db->zeile($res)) {
			$where='';
			if ($row[0]!='') {
				$where=$sql_tabs['crmcodes']['text1'].'='.$db->str($row[0]);
			}
			if ($row[1]!='') {
				if ($where!='') {
					$where.=' or ';
				}
				$where.=$sql_tabs['crmcodes']['code1'].'='.$db->str($row[1]);
			}
			if ($where!='') {
				$res2=$db->select(
					$sql_tab['crmcodes'],
					array(
						$sql_tabs['crmcodes']['code1'],
						$sql_tabs['crmcodes']['text1']
					),
					$sql_tabs['crmcodes']['art'].'='.$db->str('SENSUS_LAND').' and ('.$where.')'
				);
				if ($row2=$db->zeile($res2)) {
					$landcode=$row2[0];
				}
			}
		}
		$alle_zu=array();
		$alle_zu_v=array();
		$alle_ku=array();
		if ($landcode!='') {
			$res=$db->select(
				$sql_tab['benutzer_land'],
				array(
					$sql_tabs['benutzer_land']['land'],
					$sql_tabs['benutzer_land']['benutzer_id'],
					$sql_tabs['benutzer_land']['vertretung']
				),
				$sql_tabs['benutzer_land']['land'].'='.$db->str($landcode)
			);
			while ($row=$db->zeile($res)) {
				$res2=$db->select(
					$sql_tab['benutzer'],
					$sql_tabs['benutzer']['gruppe'],
					$sql_tabs['benutzer']['benutzer_id'].'='.$db->dbzahl($row[1])
				);
				if ($row2=$db->zeile($res2)) {
					if (intval($row2[0])<=0) {
						continue;
					}
					if ($row[2]=='1') {
						$alle_zu_v[$row[1]]=0;
					} else {
						$alle_zu[$row[1]]=0;
					}
//					$alle_ku[$row[1]]=0;
				}
			}
		}
		$alle_ku=$alle_zu;
		if (count($alle_zu)==0) {
			$alle_ku=$alle_zu_v;
		}
		if (count($alle_ku)==0) {
			$res=$db->select(
				$sql_tab['benutzer_gruppe'],
				$sql_tabs['benutzer_gruppe']['benutzer_gruppe_id'],
				$sql_tabs['benutzer_gruppe']['bezeichnung'].'='.$db->str('Salesperson')
			);
			if ($row=$db->zeile($res)) {
				$res8=$db->select(
					$sql_tab['benutzer_gruppe_zuordnung'],
					$sql_tabs['benutzer_gruppe_zuordnung']['benutzer_id'],
					$sql_tabs['benutzer_gruppe_zuordnung']['gruppe_id'].'='.$db->dbzahl($row[0])
				);
				while ($row8=$db->zeile($res8)) {
					$alle_ku[$row8[0]]=0;
				}
			}
			
		}
		// Verteilung nach letzter Benutzer
		$uid=0;
		@reset($alle_ku);
		$alle_ku_neu=array();
		while (list($key, $val)=@each($alle_ku)) {
			$alle_ku_neu[intval($key)]=$val;
		}
		@ksort($alle_ku_neu);
		$gefunden=false;
		$res=$db->select(
			$sql_tab['einstellungen'],
			$sql_tabs['einstellungen']['wert'],
			$sql_tabs['einstellungen']['modul'].'='.$db->str('letzte_sp_'.$landcode)
		);
		if ($row=$db->zeile($res)) {
			$letzte=intval($row[0]);
			while (!$gefunden and list($key, $val)=@each($alle_ku_neu)) {
				if ($key>$letzte) {
					$gefunden=true;
					$uid=$key;
				}
			}
		}
		@reset($alle_ku_neu);
		if (!$gefunden) {
			if (list($key, $val)=@each($alle_ku_neu)) {
				$uid=$key;
			}
		}
		$res=$db->select(
			$sql_tab['einstellungen'],
			$sql_tabs['einstellungen']['wert'],
			$sql_tabs['einstellungen']['modul'].'='.$db->str('letzte_sp_'.$landcode)
		);
		if ($row=$db->zeile($res)) {
			$db->update(
				$sql_tab['einstellungen'],
				array(
					$sql_tabs['einstellungen']['wert'] => $db->str($uid)
				),
				$sql_tabs['einstellungen']['modul'].'='.$db->str('letzte_sp_'.$landcode)
			);
		} else {
			$db->insert(
				$sql_tab['einstellungen'],
				array(
					$sql_tabs['einstellungen']['wert'] => $db->str($uid),
					$sql_tabs['einstellungen']['modul'] => $db->str('letzte_sp_'.$landcode)
				)
			);
		}
		
		return $uid;
	}
	
	function andere_auf_ids($stid, $aid) {
		global $sql_tab, $sql_tabs, $sql_meta, $db;
		
		$alle_aids='';
		$res=$db->select(
			$sql_tab['auftrag'],
			$sql_tabs['auftrag']['nummer'],
			$sql_tabs['auftrag']['stammdaten_id'].'='.$db->dbzahl($stid).' and '.$sql_tabs['auftrag']['auftrag_id'].'='.$db->dbzahl($aid)
		);
		if ($row=$db->zeile($res)) {
			$res=$db->select(
				$sql_tab['auftrag'],
				$sql_tabs['auftrag']['auftrag_id'],
				$sql_tabs['auftrag']['stammdaten_id'].'='.$db->dbzahl($stid).' and '.$sql_tabs['auftrag']['nummer'].'='.$db->str($row[0])
			);
			while ($row=$db->zeile($res)) {
				if (intval($row[0])!=intval($aid)) {
					$alle_aids.=$row[0].',';
				}
			}
		}
		return p4n_mb_string('substr', $alle_aids, 0, -1);
	}
	
	function bef_format($t) {
		$t=trim(p4n_mb_string('str_replace', array('(G)', '(P)', '('._KONTAKT_PRIVAT_ABK_.')', '('._KONTAKT_GESCHAEFTLICH_ABK_.')'), '', $t));
		if ($_SESSION['db_utf8']) {
			
		} else {
			$t=p4n_mb_string('str_replace', array('ä', 'ö', 'ü', 'ß', 'Ä', 'Ö', 'Ü'), array('ae', 'oe', 'ue', 'ss', 'Ae', 'Oe', 'Ue'), $t);
			$t=p4n_mb_string('strtolower',preg_replace('/[^A-Za-z0-9_]/U', '', $t));
		}
		return $t;
	}
	function bef_format2($t) {
		$t=trim(p4n_mb_string('str_replace', array('(G)', '(P)', '('._KONTAKT_PRIVAT_ABK_.')', '('._KONTAKT_GESCHAEFTLICH_ABK_.')'), '', $t));
		if ($_SESSION['db_utf8']) {
			
		} else {
			$t=p4n_mb_string('str_replace', array('ä', 'ö', 'ü', 'ß', 'Ä', 'Ö', 'Ü'), array('ae', 'oe', 'ue', 'ss', 'Ae', 'Oe', 'Ue'), $t);
			$t=p4n_mb_string('strtolower',preg_replace('/[^A-Za-z0-9]/U', '', $t));
		}
		return $t;
	}
	function bef_format_stfeld($t) {
		global $sql_tabs, $lang_db_f, $kontakt_typ_db, $kontakt_typ;
		$we1=0;
		$gef=0;
		$erf=false;
		@reset($kontakt_typ);
		while (list($key, $val)=@each($kontakt_typ)) {
			if (bef_format2($t)==bef_format2($val)) {
				$erf=true;
				$gef=$we1;
				break;
			}
			$we1++;
		}
		if ($erf) {
			if (isset($kontakt_typ_db[$gef])) {
				$t=$kontakt_typ_db[$gef];
				$t=p4n_mb_string('str_replace', array(' ','-'), array('_',''), $t);
			}
		} else {
			@reset($lang_db_f['stammdaten']);
			while (list($key, $val)=@each($lang_db_f['stammdaten'])) {
				if (bef_format2($t)==bef_format2($val)) {
					$t=$key;
					break;
				}
			}
		}
		return $t;
	}
    /*
       $reg = array(               //bis auf = und ; ist alles dabei aus der pdf
                        '/[\&][\#][6][0][\;]/', 1
                        '/[\&][\#][6][2][\;]/', 2 
                        '/[\&][\#][4][0][\;]/', 3
                        '/[\&][\#][4][1][\;]/', 4
                        '/[\&][\#][9][1][\;]/', 5
                        '/[\&][\#][9][3][\;]/', 6
                        '/[\&][\#][1][2][3][\;]/', 7
                        '/[\&][\#][1][2][5][\;]/', 8
                        '/[\&][\#][9][2][\;]/',
                        '/[\&][\#][3][9][\;]/',
                        '/[\&][\#][3][4][\;]/',
                        '/[\&][\#][3][8][\;]/',
                        '/[\&][\#][4][3][\;]/',
                        '/[\&][\#][2][3][\;]/',
                        '/[\&][\#][3][7][\;]/',
                        '/[\&][\#][3][3][\;]/',
                        '/[\&][\#][6][1][\;]/',
                       // '/[\&][\#][5][9][\;]/',
                );
                $replaces = array(
                    '<', //< 1
                    '>', //> 2
                    '(', //( 3
                    ')', //) 4
                    '[', //[ 5
                    ']', //] 6
                    '{', //{ 7 
                    '}', //} 8
                    '\\', //\
                    "'", //'
                    '"', //"
                    '&', //&
                    '+', //+
                    '#', //#
                    '%', //%
                    '!', //!
                    '=', //=
                   // ';', //;
                );
     */
	function ers_alle_felder($var1, $inh1, $t) {
		if (p4n_mb_string('substr', $var1, 0, 1)=='{') {
			$var1=p4n_mb_string('substr', $var1, 1);
		}
		if (p4n_mb_string('substr', $var1, -1)=='}') {
			$var1=p4n_mb_string('substr', $var1, 0, -1);
		}
		if (p4n_mb_string('substr', $var1, 0, 2)=='<<') {
			$var1=p4n_mb_string('substr', $var1, 2);
		}
		if (p4n_mb_string('substr', $var1, -2)=='>>') {
			$var1=p4n_mb_string('substr', $var1, 0, -2);
		}
		
        //class xss
        if (p4n_mb_string('substr', $var1, 0, 6)=='&#123;') {
			$var1=p4n_mb_string('substr', $var1, 6);
		}
		if (p4n_mb_string('substr', $var1, -6)=='&#125;') {
			$var1=p4n_mb_string('substr', $var1, 0, -6);
		}
		if (p4n_mb_string('substr', $var1, 0, 10)=='&#60;&#60;') {
			$var1=p4n_mb_string('substr', $var1, 10);
		}
		if (p4n_mb_string('substr', $var1, -10)=='&#62;&#62;') {
			$var1=p4n_mb_string('substr', $var1, 0, -10);
		}
		$t=p4n_mb_string('str_replace', array('{'.$var1.'}','&#123;'.$var1.'&#125;'), $inh1, $t);
		$t=p4n_mb_string('str_replace', array('<<'.$var1.'>>','&#60;&#60;'.$var1.'&#62;&#62;') , $inh1, $t);
//echo $var1.' = '.$inh1.'<br>';
		
		return $t;
	}
	
	function ist_in_gruppe($gruppe_bez, $uid=0) {
		global $db, $sql_tab, $sql_tabs, $sql_meta;
		
		$drin=false;
		if ($uid==0) {
			$uid=$_SESSION['user_id'];
		}
		$res=$db->select(
				$sql_tab['benutzer_gruppe'],
				$sql_tabs['benutzer_gruppe']['benutzer_gruppe_id'],
				$sql_tabs['benutzer_gruppe']['bezeichnung'].'='.$db->str($gruppe_bez)
		);
		if ($row=$db->zeile($res)) {
			$res8=$db->select(
				$sql_tab['benutzer_gruppe_zuordnung'],
				$sql_tabs['benutzer_gruppe_zuordnung']['benutzer_id'],
				$sql_tabs['benutzer_gruppe_zuordnung']['gruppe_id'].'='.$db->dbzahl($row[0]).' and '.
					$sql_tabs['benutzer_gruppe_zuordnung']['benutzer_id'].'='.$db->dbzahl($uid)
			);
			if ($db->anzahl($res8)>0) {
				$drin=true;
			}
		}
		return $drin;
	}
	
	
	function ccbem_zust() {
		global $db, $sql_tab, $sql_tabs, $sql_meta, $postfeld;
		
		$zusinfo_wvl='';
		
		if (isset($_SESSION['cc_lf_mitap'][$postfeld['fid']])) {
				$res8=$db->select(
					$sql_tab['stammdaten_ansprechpartner'],
					array(
						$sql_tabs['stammdaten_ansprechpartner']['bezeichnung'],
						$sql_tabs['stammdaten_ansprechpartner']['vorname']
					),
					$sql_tabs['stammdaten_ansprechpartner']['ansprechpartner_id'].'='.$db->dbzahl($postfeld['apid'])
				);
				if ($row8=$db->zeile($res8)) {
					$zusinfo_wvl.=' / '._AP_KURZ_.': '.$row8[0].', '.$row8[1].'';
				}
		}
		
		if (isset($_SESSION['cc_lf_mitauftrag'][$postfeld['fid']])) {
				$res8=$db->select(
					$sql_tab['auftrag'],
					array(
						$sql_tabs['auftrag']['nummer'],
						$sql_tabs['auftrag']['rechnung_id'],
						$sql_tabs['auftrag']['datum']
					),
					$sql_tabs['auftrag']['auftrag_id'].'='.$db->dbzahl($postfeld['auid']).' and '.
						$sql_tabs['auftrag']['stammdaten_id'].'='.$db->dbzahl($postfeld['stid'])
				);
				if ($row8=$db->zeile($res8)) {
					$zusinfo_wvl.=' / '._RECHNUNG_.': '.$row8[1].', '._AUFTRAG_.': '.$row8[0].', '.$db->unixdate($row8[2]).'';
				}
		}
		
		if (intval($postfeld['prodz_id'])>0) {
				$res8=$db->select(
					$sql_tab['produktzuordnung'],
					array(
						$sql_tabs['produktzuordnung']['kennzeichen'],
						$sql_tabs['produktzuordnung']['datum_ez'],
						$sql_tabs['produktzuordnung']['typ_modell'],
						$sql_tabs['produktzuordnung']['typ']
					),
					$sql_tabs['produktzuordnung']['produktzuordnung_id'].'='.$db->dbzahl($postfeld['prodz_id'])
				);
				if ($row8=$db->zeile($res8)) {
					$zusinfo_wvl.=' / '._FAHRZEUG_.': '.trim($row8[2].' '.$row8[3]).', '.$row8[0].', '.$db->unixdate($row8[1]).'';
				}
		}
		
		return $zusinfo_wvl;
	}
	
	function feiertage_jebenutzeralle($ben_id, $bis_tage=100) {
		global $prefix, $db, $alle_ben_feiertage, $sql_tab, $sql_tabs, $sql_meta, $cfg_feiertage_nation;
		$at1=array();
		if (!isset($alle_ben_feiertage[$ben_id])) {
			$alleft=array();
			$st1=time();
			if (is_file('inc/lib_feiertag.php')) {
				include_once('inc/lib_feiertag.php');
				$at1=getArbeitsTageVonBenutzer($st1, $st1+$bis_tage*24*60*60, $ben_id);
                while (list($keyat, $valat)=@each($at1)) {
					if (isset($valat['feiertag']['feiertag_gesetzlich'])) {
						if ($valat['feiertag']['feiertag_gesetzlich']==1) {
							$alleft[$valat['label']]=1;
						}
					}
				}
			}
			$alle_ben_feiertage[$ben_id]=$alleft;
		}
        return $at1;
	}
	
	function lese_zf_feld($kuid, $zfid) {
		global $db, $sql_tab, $sql_tabs, $sql_meta, $sql_tab_ids, $prefix;
		
		$t='';
		$alle_f=$db->MetaColumns($sql_tab['zusatzfelder']);
		$alle_f2=array();
		while (list($key1, $val1)=@each($alle_f)) {
			$alle_f2[p4n_mb_string('strtolower',$val1->name)]=1;
		}
		if (isset($alle_f2['zf_'.$zfid])) {
			$res=$db->select(
				$sql_tab['zusatzfelder'],
				'zf_'.$zfid,
				$sql_tabs['zusatzfelder']['stammdaten_id'].'='.$db->dbzahl($kuid)
			);
			if ($row=$db->zeile($res)) {
				$t=$row[0];
			}
            $result_stammdaten_zusatz = $db->select(
                $sql_tab['stammdaten_zusatz'],
                $sql_tabs['stammdaten_zusatz']['art'],
                $db->dbzahlin($zfid, $sql_tabs['stammdaten_zusatz']['zusatz_id'])
            );
            if ($row_stammdaten_zusatz = $db->zeile($result_stammdaten_zusatz)) {
                if ($row_stammdaten_zusatz[0]=='1') {
                    $sql_meta['zusatzfelder']['zf_'.$zfid]=array('D');
                } elseif ($row_stammdaten_zusatz[0]=='2') {
                    $sql_meta['zusatzfelder']['zf_'.$zfid]=array('F');
                } elseif ($row_stammdaten_zusatz[0]=='4') {
                    $sql_meta['zusatzfelder']['zf_'.$zfid]=array('X');
                } elseif ($row_stammdaten_zusatz[0]=='6') {
                    $sql_meta['zusatzfelder']['zf_'.$zfid]=array('T');
                } elseif ($row_stammdaten_zusatz[0]=='7') {
                    $sql_meta['zusatzfelder']['zf_'.$zfid]=array('I');
                    $sql_tab_ids[$prefix.'zusatzfelder.zf_'.$zfid]=$sql_tabs['benutzer']['benutzer_id'];
                } elseif ($row_stammdaten_zusatz[0]=='8') {
                    $sql_meta['zusatzfelder']['zf_'.$zfid]=array('L');
                } else {
                    $sql_meta['zusatzfelder']['zf_'.$zfid]=array('C');
                }
                
                $t=anzeige_idwert($prefix.'zusatzfelder.zf_'.$zfid, $t);
            }
		}
		return $t;
	}
	
	function lese_ku_kontakt($kuid, $nurfeld=-1) {
		global $db, $sql_tab, $sql_tabs, $sql_meta, $cfg_zentrales_emailfeld;
		
        $sqlt = array(
            $sql_tabs['stammdaten']['Telefon_1'],
            $sql_tabs['stammdaten']['Telefon_2'],
            $sql_tabs['stammdaten']['Telefon_3'],
            $sql_tabs['stammdaten']['Fax_1'],
            $sql_tabs['stammdaten']['Fax_2'],
            $sql_tabs['stammdaten']['Fax_3'],
            $sql_tabs['stammdaten']['Mobilfon_1'],
            $sql_tabs['stammdaten']['Mobilfon_2'],
            $sql_tabs['stammdaten']['Mobilfon_3'],
            $sql_tabs['stammdaten']['EMail_1'],
            $sql_tabs['stammdaten']['EMail_2'],
            $sql_tabs['stammdaten']['EMail_3'],
            $sql_tabs['stammdaten']['WWW_1'],
            $sql_tabs['stammdaten']['WWW_2']
        );
        if ($cfg_zentrales_emailfeld) {
			$sqlt[]=$sql_tabs['stammdaten']['EMail_4'];
		}
		$res=$db->select(
			$sql_tab['stammdaten'],
			$sqlt,
			$sql_tabs['stammdaten']['id'].'='.$db->dbzahl($kuid)
		);
		if ($row=$db->zeile($res)) {
			$anzr=0;
			if (count($row)==14 or ($cfg_zentrales_emailfeld and count($row)==15)) {
				
			} else {
				$row2=array();
				while (list($key, $val)=@each($row)) {
					if (is_numeric($key)) {
						$row2[$key]=$val;
						$anzr++;
					}
				}
				$row=$row2;
				@reset($row);
			}
			if ($anzr==0) {
				$row2=array();
				@reset($row);
				while (list($key, $val)=@each($row)) {
					$row2[]=$val;
				}
				$row=$row2;
				@reset($row);
			}
		} else {
			if ($nurfeld==-1) {
				return array();
			}
			return '';
		}
		if ($nurfeld==-1) {
			return $row;
		}
		return $row[$nurfeld];
	}
	
	function lese_ku_kontakt_pg($art1) {
		if ($art1==0 or $art1==3 or $art1==6 or $art1==9 or $art1==12) {
			return 1;
		}
		if ($art1==14) {
			return 2;
		}
		return 0;
	}
	
	function dse_info_kundenuebersicht($stid=0, $ohne_ol=false, $ohnedetail=false) {
		global $db, $sql_tab, $sql_tabs, $sql_meta, $ol;
		global $cfg_dse_robinson_raus, $cfg_dse_zweiteseite, $cfg_dse3_uebersicht_raus, $cfg_dse_keine_unterschrift, $cfg_carlo_dsk_neu, $cfg_dse_email, $cfg_dse_sms, $cfg_dse_kein_fax;
		
		if ($stid==0) {
			$stid=$_SESSION['stammdaten_id'];
		}
		
		$infoblock='';
		
		$bl3d='';
					$res3=$db->select(
						$sql_tab['stammdaten'],
						array(
							$sql_tabs['stammdaten']['blacklist'],
							$sql_tabs['stammdaten']['blacklist_temp'],
							$sql_tabs['stammdaten']['blacklist_datum'],
							$sql_tabs['stammdaten']['blacklist_temp_datum'],
							$sql_tabs['stammdaten']['blacklist3'],
							$sql_tabs['stammdaten']['blacklist3_datum'],	// 5
							$sql_tabs['stammdaten']['blacklist4_detail'],
							$sql_tabs['stammdaten']['blacklist3_detail'],
							$sql_tabs['stammdaten']['blacklist5_detail']
						),
						$sql_tabs['stammdaten']['id'].'='.$db->dbzahl($stid)
					);
					$row3=$db->zeile($res3);

					$m_gesperrt=$row3[1];

					$bl3d=$row3[7];
					if ($row3[0]=='1') {
						$infoblock.='<font color=red><b>'._WF_BL1_.' '._SEIT_.': '.$db->unixdate($row3[2]).'</b></font><br>';
					}
					if ($row3[1]=='1') {
						$infoblock.='<font color=red><b>'._WF_BL2_.' '._SEIT_.': '.$db->unixdate($row3[3]).'</b></font><br>';
					}
					if ($row3[6]!='') {
						$bl4_det=p4n_mb_string('str_replace', array('kein Kontakt', 'Post', 'uneingeschränkt', 'Tel./E-Mail/SMS'), array('<font color=red><b>kein Kontakt</b></font>', '<font color=green><b>Post</b></font>', '<font color=green><b>uneingeschränkt</b></font>', '<font color=green><b>Tel./E-Mail/SMS</b></font>'), $row3[6]);
						$expl1=explode(';', $bl4_det);
						$bl4_det='';
						while (list($keyd, $vald)=@each($expl1)) {
							$bl4_det.=trim($vald).'<br>';
						}
						$bl4_det=p4n_mb_string('substr', $bl4_det, 0, -4);
						$infoblock.=$bl4_det.'<br>';
					}
					if ($row3[8]!='') {
						$bl4_det=p4n_mb_string('str_replace', array(_DATENSCHUTZ1K_2_, _DATENSCHUTZ1K_3_, _DATENSCHUTZ1K_4_, _DATENSCHUTZ1K_5_, _DATENSCHUTZ1K_6_, _DATENSCHUTZ1K_7_, _DATENSCHUTZ1K_8_), array('<font color=green><b>'._DATENSCHUTZ1K_2_.'</b></font>', '<font color=green><b>'._DATENSCHUTZ1K_3_.'</b></font>', '<font color=green><b>'._DATENSCHUTZ1K_4_.'</b></font>', '<font color=green><b>'._DATENSCHUTZ1K_5_.'</b></font>', '<font color=green><b>'._DATENSCHUTZ1K_6_.'</b></font>', '<font color=green><b>'._DATENSCHUTZ1K_7_.'</b></font>', '<font color=green><b>'._DATENSCHUTZ1K_8_.'</b></font>'), $row3[8]);
						$expl1=explode(';', $bl4_det);
						$bl4_det='';
						while (list($keyd, $vald)=@each($expl1)) {
							$bl4_det.=trim($vald).'<br>';
						}
						if ($cfg_dse_zweiteseite) {
							$bl4_det=_ZWEITESEITE_.': '.$bl4_det;
						}
						$bl4_det=p4n_mb_string('substr', $bl4_det, 0, -4);
						$infoblock.=$bl4_det.'<br>';
					}
					if (!$ohnedetail and !$cfg_dse3_uebersicht_raus) {// and (1 or ($row3[4]=='1')
						$res4=$db->select(
							$sql_tab['stammdaten_blacklist_log'],
							array(
								$sql_tabs['stammdaten_blacklist_log']['art'],
								$sql_tabs['stammdaten_blacklist_log']['datum'],
								$sql_tabs['stammdaten_blacklist_log']['benutzer_id'],
								$sql_tabs['stammdaten_blacklist_log']['doclink'],
								$sql_tabs['stammdaten_blacklist_log']['blacklist'],
								$sql_tabs['stammdaten_blacklist_log']['blacklist_zusatz1'],	// 5
								$sql_tabs['stammdaten_blacklist_log']['blacklist_zusatz2'],
								$sql_tabs['stammdaten_blacklist_log']['blacklist_zusatz3'],
								$sql_tabs['stammdaten_blacklist_log']['blacklist_zusatz4'],
								$sql_tabs['stammdaten_blacklist_log']['blacklist_zusatz5'],
								$sql_tabs['stammdaten_blacklist_log']['blacklist_zusatz6'],	// 10
								$sql_tabs['stammdaten_blacklist_log']['blacklist_zusatztext4'],
								$sql_tabs['stammdaten_blacklist_log']['blacklist_zusatztext1'],
								$sql_tabs['stammdaten_blacklist_log']['blacklist_zusatztext2'],
								$sql_tabs['stammdaten_blacklist_log']['blacklist_zusatztext3'],

								$sql_tabs['stammdaten_blacklist_log']['blacklist_brief'],		// 15
								$sql_tabs['stammdaten_blacklist_log']['blacklist_email'],
								$sql_tabs['stammdaten_blacklist_log']['blacklist_sms'],
								$sql_tabs['stammdaten_blacklist_log']['blacklist_fax'],
								$sql_tabs['stammdaten_blacklist_log']['blacklist_festnetz'],
								$sql_tabs['stammdaten_blacklist_log']['blacklist_mobilfon'],		// 20
								$sql_tabs['stammdaten_blacklist_log']['blacklist_ablehnung'],
								$sql_tabs['stammdaten_blacklist_log']['blacklist_bemerkung'],
								$sql_tabs['stammdaten_blacklist_log']['mandant_id'],
								$sql_tabs['stammdaten_blacklist_log']['markencode']
							),
							$sql_tabs['stammdaten_blacklist_log']['stammdaten_id'].'='.$db->dbzahl($stid),
							$sql_tabs['stammdaten_blacklist_log']['art'].' asc, '.$sql_tabs['stammdaten_blacklist_log']['datum'].' desc, '.$sql_tabs['stammdaten_blacklist_log']['stammdaten_blacklist_log_id'].' desc'
						);
						$dse_info1='';
						$zi_g=0;
						$m_row4=array();
						$dse_doc='';
						$m_schr_zus='';
						$m_tel_zus='';
						while ($zi_g<2 and $row4=$db->zeile($res4)) {
							if (count($m_row4)==0) {
								$m_row4=$row4;
							}
							$zi_g++;
							$dse_info1.="\n".'<b>'.$db->unixdatetime($row4[1]).($row4[0]=='4'?' '._ZWEITESEITE_:'').'</b> ('.dbout($sql_tab['benutzer'], array($sql_tabs['benutzer']['vorname'], $sql_tabs['benutzer']['name']), $sql_tabs['benutzer']['benutzer_id'].'='.$db->dbzahl($row4[2])).'):'."\n";
							$dse_info1.='&nbsp;&nbsp;&nbsp;'._WF_BL3_.': '.($row4[4]=='1'?_JA_:_NEIN_)."\n";
							if ($row4[0]=='4' and isset($lang['_DATENSCHUTZ2K_2_'])) {
								$dse_info1.='&nbsp;&nbsp;&nbsp;'._DATENSCHUTZ2K_1_.': '.($row4[5]=='1'?_JA_:_NEIN_)."\n";
								$dse_info1.='&nbsp;&nbsp;&nbsp;'._DATENSCHUTZ2K_2_.': '.($row4[6]=='1'?_JA_:_NEIN_)."\n";
								$dse_info1.='&nbsp;&nbsp;&nbsp;'._DATENSCHUTZ2K_3_.': '.($row4[7]=='1'?_JA_:_NEIN_)."\n";
								$dse_info1.='&nbsp;&nbsp;&nbsp;'._DATENSCHUTZ2K_4_.': '.($row4[8]=='1'?_JA_:_NEIN_)."\n";
								if ($_SESSION['cfg_kunde']=='carlo_bmw_runds') {
									$dse_info1.='&nbsp;&nbsp;&nbsp;'._DATENSCHUTZ2K_7_.': '.($row4[9]=='1'?_JA_:_NEIN_)."\n";
									$dse_info1.='&nbsp;&nbsp;&nbsp;'._DATENSCHUTZ2K_8_.': '.($row4[13]=='1'?_JA_:_NEIN_);
								} elseif (!$cfg_dse_keine_unterschrift) {
									$dse_info1.='&nbsp;&nbsp;&nbsp;'._DATENSCHUTZ2K_5_.': '.($row4[9]=='1'?_JA_:_NEIN_)."\n";
								}
							} else {
								$schr_zus='';
								if ($row4[15]=='1') {
									$schr_zus.=_DATENSCHUTZ1_2A_.',';
								}
								if ($row4[16]=='1') {
									$schr_zus.=_DATENSCHUTZ1_2B_.',';
								}
								if ($row4[17]=='1') {
									$schr_zus.=_DATENSCHUTZ1_2C_.',';
								}
								if ($row4[18]=='1' and !$cfg_dse_kein_fax) {
									$schr_zus.=_DATENSCHUTZ1_2D_.',';
								}
								if ($schr_zus!='') {
									$schr_zus=' ('.p4n_mb_string('substr', $schr_zus, 0, -1).')';
								}
								$tel_zus='';
								if ($row4[19]=='1') {
									$tel_zus.=_DATENSCHUTZ1_3A_.',';
								}
								if ($row4[20]=='1') {
									$tel_zus.=_DATENSCHUTZ1_3B_.',';
								}
								if ($tel_zus!='') {
									$tel_zus=' ('.p4n_mb_string('substr', $tel_zus, 0, -1).')';
								}
								if ($zi_g==1) {
									$m_schr_zus=$schr_zus;
									$m_tel_zus=$tel_zus;
								}
								$dse_info1.='&nbsp;&nbsp;&nbsp;'._DATENSCHUTZ1_1_.': '.($row4[5]=='1'?_JA_:_NEIN_)."\n";
								$dse_info1.='&nbsp;&nbsp;&nbsp;'._DATENSCHUTZ1_2_.': '.($row4[6]=='1'?_JA_:_NEIN_).$schr_zus."\n";
								$dse_info1.='&nbsp;&nbsp;&nbsp;'._DATENSCHUTZ1_3_.': '.($row4[7]=='1'?_JA_:_NEIN_).$tel_zus."\n";
								$dse_info1.='&nbsp;&nbsp;&nbsp;'._DATENSCHUTZ1_4_.': '.($row4[8]=='1'?_JA_:_NEIN_)."\n";
								$dse_info1.='&nbsp;&nbsp;&nbsp;'._DATENSCHUTZ1_5_.': '.($row4[9]=='1'?_JA_:_NEIN_);
								if ($cfg_carlo_dsk_neu) {
									$dse_info1.='&nbsp;&nbsp;&nbsp;'._DATENSCHUTZ1_N_.': '.($row4[21]=='1'?_JA_:_NEIN_)."\n";
									$dse_info1.='&nbsp;&nbsp;&nbsp;'._BEMERKUNG_.': '.$row4[22]."\n";
								}
							}
							if ($row4[10]=='1') {
								$dse_info1.="\n".'&nbsp;&nbsp;&nbsp;'._DATENSCHUTZ1_6_.': '.($row4[10]=='1'?_JA_:_NEIN_);
							}
							if ($_SESSION['cfg_kunde']=='carlo_bmw_runds') {
								if ($row4[11]!='') {
									$dse_info1.="\n".$row4[11];
								}
								if ($row4[12]!='') {
									$dse_info1.="\n".$row4[12];
								}
								if ($row4[13]!='') {
									$dse_info1.="\n".$row4[13];
								}
								if ($row4[14]!='') {
									$dse_info1.="\n".$row4[14];
								}
							} elseif ($row4[11]=='1') {
								$dse_info1.="\n".'&nbsp;&nbsp;&nbsp;'._DATENSCHUTZ1_8_.': '.($row4[11]=='1'?_JA_:_NEIN_);
							}
							$dse_info1.=($row4[3]!=''?' ('._DATEI_.': '.$row4[3].')':'')."\n";
							if ($row4[3]!='' and $dse_doc=='') {
								$dse_doc=$row4[3];
							}
						}
						$row4=$m_row4;
						$ite1=_WF_BL3_;
						$bl3_details='';
						$bl3_details_nicht='';
						$te1='';
						if ($dse_info1!='') {
							if (1==2 and $cfg_carlo_dsk_neu) {
								if ($row4[21]=='1') {
								//	$bl3_details_nicht.=_DATENSCHUTZ1K_N_.',';
								}
								if ($row4[15]!='1') {
									$bl3_details_nicht.=_DATENSCHUTZ1_2A_.',';
								}
								if ($row4[16]!='1') {
									$bl3_details_nicht.=_DATENSCHUTZ1_2B_.',';
								}
								if ($row4[17]!='1') {
									$bl3_details_nicht.=_DATENSCHUTZ1_2C_.',';
								}
								if ($row4[18]!='1') {
									$bl3_details_nicht.=_DATENSCHUTZ1_2D_.',';
								}
								if ($row4[19]!='1') {
									$bl3_details_nicht.=_DATENSCHUTZ1_3A_.',';
								}
								if ($row4[20]!='1') {
									$bl3_details_nicht.=_DATENSCHUTZ1_3B_.',';
								}
							}
							if ($row4[6]=='1') {
								$bl3_details.=_DATENSCHUTZ1K_2_.$m_schr_zus.',';
							} else {
								$bl3_details_nicht.=_DATENSCHUTZ1K_2_.',';
							}
							if ($row4[7]=='1') {
								$bl3_details.=_DATENSCHUTZ1K_3_.$m_tel_zus.',';
							} else {
								$bl3_details_nicht.=_DATENSCHUTZ1K_3_.',';
							}
							if ($row4[8]=='1') {
								$bl3_details.=_DATENSCHUTZ1K_4_.',';
							} else {
								$bl3_details_nicht.=_DATENSCHUTZ1K_4_.',';
							}
							if ($_SESSION['cfg_kunde']!='carlo_bmw_runds') {
								if ($row4[9]=='1' and !$cfg_dse_keine_unterschrift) {
									$bl3_details.=_DATENSCHUTZ1K_5_.',';
								} elseif (!$cfg_dse_keine_unterschrift) {
									$bl3_details_nicht.=_DATENSCHUTZ1K_5_.',';
								}
							}
							if ($cfg_dse_email) {
								if ($row4[10]=='1') {
									$bl3_details.=_DATENSCHUTZ1K_6_.',';
								} else {
									$bl3_details_nicht.=_DATENSCHUTZ1K_6_.',';
								}
							}
							if ($cfg_dse_sms) {
								if ($row4[11]=='1') {
									$bl3_details.=_DATENSCHUTZ1K_8_.',';
								} else {
									$bl3_details_nicht.=_DATENSCHUTZ1K_8_.',';
								}
							}
							if ($bl3_details!='') {
								$bl3_details=' ('.p4n_mb_string('substr', $bl3_details, 0, -1).')';
							}
							if ($bl3_details_nicht!='') {
								$bl3_details_nicht=' '.p4n_mb_string('substr', $bl3_details_nicht, 0, -1);
							}
							if ($bl3_details!='') {
								$te1.='<font color=green><b>'._WF_BL3_.$bl3_details.'</b></font>';
							}
							if ($bl3_details_nicht!='') {
								$te1.=' <font color=red><b>'._NICHT_.': '.$bl3_details_nicht.'</b></font>';
							}
							if ($ohne_ol) {
								$ite1=$te1.': '.$bl3d."\n".$dse_info1;
							} else {
								$ite1=oltext($bl3d."\n".$dse_info1, $te1, '', _WF_BL3_);
							}
						} elseif ($cfg_dse_email) {
							$bl3dn='';
							$expl2=explode(';', $bl3d);
							while (list($rkey, $rval)=@each($expl2)) {
								if ($rval!='') {
									$bl3dn.=$rval."\n";
								}
							}
							if (trim($bl3dn)!='') {
								if ($ohne_ol) {
									$ite1=$ite1.': '.$bl3dn."\n".$dse_info1;
								} else {
									$ite1=oltext($bl3dn."\n".$dse_info1, $ite1, '', _WF_BL3_);
								}
							}
						}
						if (!$ohne_ol and $dse_doc!='') {
							if (is_file('dokumente_korrespondenz/'.$dse_doc)) {
								$dse_doc=' | '.link2(_DATEI_, 'dokumente_korrespondenz/'.$dse_doc, '', '', 'target="_blank"');
							}
						}
						if ($ite1!=_WF_BL3_) {
							$infoblock.='<b>'.$ite1.' '._SEIT_.': '.$db->unixdate($row3[5]).$dse_doc.'</b><br>';
						}
					}
				
				if (!$cfg_dse_robinson_raus) {
					$res3=$db->select(
						$sql_tab['stammdaten_zusatz'],
						$sql_tabs['stammdaten_zusatz']['zusatz_id'],
						$sql_tabs['stammdaten_zusatz']['bezeichnung'].'='.$db->str('Robinson')
					);
					if ($row3=$db->zeile($res3)) {
						$res3=$db->select(
							$sql_tab['zusatzfelder'],
							$sql_tab['zusatzfelder'].'.zf_'.$row3[0],
							$sql_tabs['zusatzfelder']['stammdaten_id'].'='.$db->dbzahl($stid)
						);
						if ($row3=$db->zeile($res3)) {
							if ($row3[0]!='') {
								$infoblock.='<font color=red><b>Robinson: '.$row3[0].'</b></font><br>';
							}
						}
					}
				}
		if (p4n_mb_string('substr', $infoblock, -4)=='<br>') {
			$infoblock=p4n_mb_string('substr', $infoblock, 0, -4);
		}
		return $infoblock;
	}
	
	function dirinhalt_sbrief($dirname) {
		global $x;
		if ($handle=opendir($dirname)) {
			while ($file = readdir ($handle)) {
				if (is_dir($dirname.'/'.$file) && $file != "." && $file != "..") {
					dirinhalt_sbrief($dirname.'/'.$file);
				} elseif (is_file($dirname.'/'.$file) && $file != "." && $file != ".." and $file!='document_orig.xml') {
					$x[$dirname][]=$file;
				}
		    }
			closedir($handle);
		}
	}
	
	function mail_dec_output($t, $kodierung = '') {
	    global $id, $alle_decs, $mpkey, $header_kod;
		
		if ($t=='') {
			return $t;
		}
    	if (isset($alle_decs[$id.'_'.$mpkey])) {
	       return $t;
    	}
	    $alle_decs[$id.'_'.$mpkey] = 1;
		
		if (isset($header_kod['content-transfer-encoding']) or isset($header_kod['content-type'])) {
			if (preg_match('/quoted\-printable/i', $header_kod['content-transfer-encoding'])) {
				$t=quoted_printable_decode($t);
			}
			if (preg_match('/utf\-8/i', $header_kod['content-type'])) {
				if (p4n_mb_string('strlen', p4n_mb_string('stristr', $_SESSION['cfg_kunde'], 'kroatien')) > 0) {
					$t2 = iconv('UTF-8', 'windows-1250', $t);
					if (p4n_mb_string('strlen', $t2)>=(p4n_mb_string('strlen', $t)*0.9)) {
						$t=$t2;
					}
				} else {
					$t=p4n_mb_string('utf8_decode', $t);
				}
			} elseif (preg_match('/iso\-8859\-2/i', $header_kod['content-type'])) {
                   $t2 = iconv('iso8859-2', 'utf-8', $t);
                    if (p4n_mb_string('strlen', p4n_mb_string('stristr', $_SESSION['cfg_kunde'], 'kroatien')) > 0) {
                        $t2 = iconv('UTF-8', 'windows-1250', $t2);
                    } else {
                        $t2 = p4n_mb_string('utf8_decode', $t2);
					}
            		if (p4n_mb_string('strlen', $t2)>=(p4n_mb_string('strlen', $t)*0.9)) {
                            $t=$t2;
                    }
            }
			return $t;
		}
		
        if (p4n_mb_string('strlen', p4n_mb_string('stristr', $_SESSION['cfg_kunde'], 'kroatien')) > 0) {
            if ($kodierung == 'base64') {
                $t = base64_decode($t);
            }
			$t=quoted_printable_decode($t);
			$t2 = iconv('UTF-8', 'windows-1250', $t);
			if (p4n_mb_string('strlen', $t2)>=(p4n_mb_string('strlen', $t)*0.9)) {
				$t=$t2;
			}
			return $t;
        }
	    $m_t = $t;
    	$t = p4n_mb_string('str_replace', ' ='.chr(hexdec('0A')), ' ', $t);
	    if (preg_match_all('/(=[0-9A-F]{2})/', $t, $matches)) {
    	    if (count($matches[1]) > 2) {
	            $t = p4n_mb_string('str_replace', '=20', ' ', $t);
            	//$t = preg_replace('/(=[0-9A-F]{2})/e', "chr(hexdec(p4n_mb_string('substr', '\\1',1,2)))", $t);
                $t = preg_replace_callback('/(=[0-9A-F]{2})/', 'p4n_preg_replace_chr_hexdec', $t);
            }
		}
		if (p4n_mb_string('strlen', p4n_mb_string('stristr', $_SESSION['cfg_kunde'], 'kroatien')) > 0) {
			if ($kodierung == 'base64') {
				$t = base64_decode($t);
			}
			$t = iconv('UTF-8', 'windows-1250', quoted_printable_decode($t));
		} else {
			$t = p4n_mb_string('html_entity_decode', p4n_mb_string('htmlentities', quoted_printable_decode($t), ENT_COMPAT, 'UTF-8'));
		}
		
		$t = trim(p4n_mb_string('str_replace', 'â€?', '- ', $t));
		if ($t == '') {
			$t = $m_t;
		}
		return $t;
	}
    
    function p4n_preg_replace_chr_hexdec($m) {
        return chr(hexdec(p4n_mb_string('substr', $m[1],1,2)));
    }
    
	function p4n_ucfirst($t) {
		return p4n_mb_string('ucfirst', $t);
		if ($_SESSION['db_utf8']) {
			if (function_exists('mb_strtoupper') && function_exists('mb_substr') && !empty($t)) {
				$e='UTF-8';
				$t=strtolower($t, $e);
				$upper=strtoupper($t, $e);
				preg_match('#(.)#us', $upper, $matches);
				$t=$matches[1].mb_substr($t, 1, mb_strlen($t, $e), $e);
			}
		} else {
			$t=ucfirst($t);
		}
		return $t;
	}

/**
 * A wrapper function for PHP string functions
 * @param $art
 * @param $t
 * @param string $par1
 * @param string $par2
 * @param string $par3
 * @return array|int|string
 */
	function p4n_mb_string($art, $t, $par1='', $par2='', $par3='') {
		global $cfg_ws_avag_kroatien;
		
		if (isset($_SESSION['db_utf8']) && $_SESSION['db_utf8']) {
			mb_internal_encoding("UTF-8");
			
			if ($art=='htmlspecialchars') {
				return htmlspecialchars($t, ENT_COMPAT, 'UTF-8', true);
			} elseif ($art=='htmlentities') {
				return htmlentities($t, ENT_COMPAT, 'UTF-8', true);
			} elseif ($art=='html_entity_decode') {
				return html_entity_decode($t, ENT_COMPAT, 'UTF-8');
			} elseif ($art=='str_replace') {
				return str_replace($t, $par1, $par2);
			} elseif ($art=='utf8_encode') {
				return $t;
			} elseif ($art=='utf8_encode2') {
				return $t;
			} elseif ($art=='utf8_decode') {
				return $t;
			} elseif ($art=='utf8_decode2') {
				return $t;
			} elseif ($art=='ucfirst') {
				if (function_exists('mb_strtoupper') && function_exists('mb_substr') && !empty($t)) {
					$e='UTF-8';
					$t=mb_strtolower($t, $e);
					$upper=mb_strtoupper($t, $e);
					preg_match('#(.)#us', $upper, $matches);
					$t=$matches[1].mb_substr($t, 1, mb_strlen($t, $e), $e);
				} else {
					$t=ucfirst($t);
				}
				return $t;
			} elseif ($art=='strlen') {
				return mb_strlen($t);
			} elseif ($art=='strpos') {	// int strpos ( string $haystack , mixed $needle [, int $offset = 0 ] )
				if ($par1=='') {
					return false;
				}
				return mb_strpos($t, strval($par1));
			} elseif ($art=='strrpos') {
				return mb_strrpos($t, $par1);
			} elseif ($art=='substr') {
//echo mb_internal_encoding().': '.$t.'/'.$par1.'/'.$par2.' - '.mb_substr($t, $par1, $par2).'///'.mb_substr($t, $par1).'<br>';
				if ($par2=='') {
					if (intval($par1)<0 and p4n_mb_string('strlen', $t)<($par1*-1)) {
						return $t;
					}
					return mb_substr($t, $par1);
				}
				return mb_substr($t, $par1, $par2);
			} elseif ($art=='strtolower') {
				return mb_strtolower($t);
			} elseif ($art=='strtoupper') {
				return mb_strtoupper($t);
			} elseif ($art=='stripos') {
				return mb_stripos($t, strval($par1));
			} elseif ($art=='strripos') {
				return mb_strripos($t, $par1);
			} elseif ($art=='strstr') {
				return mb_strstr($t, $par1);
			} elseif ($art=='stristr') {
				return mb_stristr($t, $par1);
			} elseif ($art=='strrchr') {
				return mb_strrchr($t, $par1);
			} elseif ($art=='substr_count') {
				return mb_substr_count($t, $par1);
			} elseif ($art=='split') {
				return mb_split($t, $par1);
			}elseif ($art=='ucwords') {
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
            if ($par1!=='') {
                $standard_wert = $par1;
            }
            if ($par2!=='') {
                $kodierung = $par2;
            }
			if ($art=='htmlspecialchars') {
                $temp = htmlspecialchars($t, $standard_wert, $kodierung);
                if ($cfg_ws_avag_kroatien) {
                    $temp = p4n_mb_string('utf8_decode', $temp);
                }
				return $temp;
			} elseif ($art=='htmlentities') {
                $temp = htmlentities($t, $standard_wert, $kodierung);
                if ($cfg_ws_avag_kroatien) {
                    $temp = p4n_mb_string('utf8_decode', $temp);
                }
				return $temp;
			} elseif ($art=='html_entity_decode') {
                $temp = html_entity_decode($t, ENT_COMPAT, $kodierung);
                if ($cfg_ws_avag_kroatien) {
                    $temp = p4n_mb_string('utf8_decode', $temp);
                }
				return $temp;
			} elseif ($art=='str_replace') {
                if ($par2==='') {
                    return $par2;
                }
                return str_replace($t, $par1, $par2);
            } elseif ($art=='utf8_encode') {
                if ($cfg_ws_avag_kroatien) {
					return iconv('windows-1250', 'UTF-8', $t);
				} else {
                    return utf8_encode($t);
				}
			} elseif ($art=='utf8_decode') {
				if ($cfg_ws_avag_kroatien) {
					return iconv('UTF-8', 'windows-1250', $t);
				} else {
                    return utf8_decode($t);
				}
			} elseif ($art=='utf8_encode2') {
                if ($cfg_ws_avag_kroatien) {
					return iconv('windows-1250', 'UTF-8', $t);
				} else {
                    return iconv('windows-1252', 'UTF-8', $t);
				}
			} elseif ($art=='utf8_decode2') {
				if ($cfg_ws_avag_kroatien) {
					return iconv('UTF-8', 'windows-1250', $t);
				} else {
                    return iconv('UTF-8', 'windows-1252', $t);
				}
			} elseif ($art=='ucfirst') {
				return ucfirst($t);
			} elseif ($art=='strlen') {
				return strlen($t);
			} elseif ($art=='strpos') {	// int strpos ( string $haystack , mixed $needle [, int $offset = 0 ] )
				if ($par1=='') {
					return false;
				}
				return strpos($t, strval($par1));
			} elseif ($art=='strrpos') {
				return strrpos($t, $par1);
			} elseif ($art=='substr') {
				if ($par2=='') {
					if (intval($par1)<0 and strlen($t)<($par1*-1)) {
						return $t;
					}
					return substr($t, $par1);
				}
				return substr($t, $par1, $par2);
			} elseif ($art=='strtolower') {
				return strtolower($t);
			} elseif ($art=='strtoupper') {
				return strtoupper($t);
			} elseif ($art=='stripos') {
				return stripos($t, strval($par1));
			} elseif ($art=='strripos') {
				return strripos($t, $par1);
			} elseif ($art=='strstr') {
				return strstr($t, $par1);
			} elseif ($art=='stristr') {
				return stristr($t, $par1);
			} elseif ($art=='strrchr') {
				return strrchr($t, $par1);
			} elseif ($art=='substr_count') {
				return substr_count($t, $par1);
			} elseif ($art=='split') {
				return split($t, $par1);
			} elseif ($art=='ucwords') {
				return ucwords($t);
			}
		}
		return $t;
	}
	function lds_korrupdate($leadids, $ergebnis, $kkat, $korr_ausschluss=0) {
		global $sql_tab, $sql_tabs, $sql_meta, $db;
		
		if (is_array($leadids)) {
			@reset($leadids);
			while (list($key, $val)=@each($leadids)) {
				if ($val<=0) {
					continue;
				}
				$db->update(
					$sql_tab['korrespondenz'],
					array(
						$sql_tabs['korrespondenz']['ergebnis_datum'] => $db->dbtimestamp(time()),
						$sql_tabs['korrespondenz']['ergebnis_text'] => $db->str($ergebnis),
						$sql_tabs['korrespondenz']['ergebnis_kategorie'] => $db->str($kkat),
						$sql_tabs['korrespondenz']['ergebnis_benutzer_id'] => $db->dbzahl($_SESSION['user_id']),
						$sql_tabs['korrespondenz']['erledigt'] => $db->dblogic(true)
					),
					$sql_tabs['korrespondenz']['stammdaten_id'].'='.$db->dbzahl($_SESSION['stammdaten_id']).' and '.
					$sql_tabs['korrespondenz']['korrespondenz_id'].'!='.$db->dbzahl($korr_ausschluss).' and '.
					$sql_tabs['korrespondenz']['erledigt'].'='.$db->dblogic(false).' and '.
						$sql_tabs['korrespondenz']['lead_id'].'='.$db->dbzahl($val)
				);
			}
		}
	}
    
    function loesche_rrmdir_op($dir) {
		if (is_dir($dir)) {
			$objects = scandir($dir);
			foreach ($objects as $object) {
					if ($object != "." && $object != "..") {
						if (filetype($dir."/".$object) == "dir") {
							loesche_rrmdir_op($dir."/".$object);
						} else {
							unlink($dir."/".$object);
						}
					}
			}
			reset($objects);
			rmdir($dir);
		}
	}
	function dirinhalt_sbrief_outp($dirname) {
		global $x;
		if ($handle=opendir($dirname)) {
			while ($file = readdir ($handle)) {
				if (is_dir($dirname.'/'.$file) && $file != "." && $file != "..") {
					dirinhalt_sbrief_outp($dirname.'/'.$file);
				} elseif (is_file($dirname.'/'.$file) && $file != "." && $file != ".." and $file!='document_orig.xml') {
					$x[$dirname][]=$file;
				}
		    }
			closedir($handle);
		}
	}
	
	function remove_wwwlink_prefix($t) {
		$t = str_replace(array('://', ':\\'), '', $t);
		return $t;
	}
        
        //zb echo termin_mail_versenden(521,1,0,0);
        function termin_mail_versenden($dateien_oder_id = 0, $timestamp = 0, $stammdaten_id=0, $betreuer_id=0,$ansprechpartner_id=0,$betreff='') {
            global $db,$sql_tabs,$sql_tab;
            //$termin_id = save($_POST['termin']);
            
            if ($timestamp <= 0) {
                $timestamp = time();
            }
            
            if ($betreuer_id>0) {
                $mailanbetreuer=1;
            }
            if ($stammdaten_id>0) {
                $mailankunden=1;
            }
            $dateiliste = array();
            $termin_id = 0;
            if (is_array($dateien_oder_id) && !empty($dateien_oder_id)) {
                $dateiliste = $dateien_oder_id;
            } elseif (is_numeric($dateien_oder_id) && $dateien_oder_id > 0) {
                $termin_id = $dateien_oder_id;
            } else {
                return '';
            }
            if (($mailankunden + $mailanbetreuer) == 0) {
                return '';
            }
            
            $link1 = '';
            $mailto = array();
            
            $bcc = array();
            $cc = array();
            $emailliste = array();
            $res = $db->select(
                $sql_tab['benutzer'],
                array(
                $sql_tabs['benutzer']['email'],
                $sql_tabs['benutzer']['name'],
                $sql_tabs['benutzer']['vorname'],
                $sql_tabs['benutzer']['benutzer_id']
                ),
                $sql_tabs['benutzer']['gruppe'].'>='.$db->dbzahl(0)

            );
            while ($row = $db->zeile($res)) {
                if (p4n_mb_string('strlen', trim($row[0])) > 0) {
                    if ($mailanbetreuer == 1 && $row[3] == $betreuer_id) { /*$_POST['termin']['betreuer']*/
                    $mailto[] = $row[0];
                    }
                    $emailliste[$row[0]] = array('email' => $row[0], 'bez' => _BENUTZER_.': '.addslashes($row[1].', '.$row[2]));
                }
            }
            if ($mailankunden == 1) {
                //$stammdaten_bezeichnung = $_POST['termin']['kunde_bezeichnung'];
                if ($stammdaten_id > 0) {
                    $res = $db->select(
                            $sql_tab['stammdaten'],
                            array(
                                $sql_tabs['stammdaten']['EMail_1'],
                                $sql_tabs['stammdaten']['EMail_2'],
                                $sql_tabs['stammdaten']['name'],
                                $sql_tabs['stammdaten']['vorname'],
                                $sql_tabs['stammdaten']['firma1']
                            ),
                            $sql_tabs['stammdaten']['id'].'='.$db->dbzahl($stammdaten_id)
                    );
                    if ($row = $db->zeile($res)) {
                        $email1 = $row[0];
                        $email2 = $row[1];
                        $bezeichnung = $ansprechpartner_id != 0 ? apbezeichnung($ansprechpartner_id).' ('.kundenbezeichnung($stammdaten_id).')' : kundenbezeichnung($stammdaten_id);

                        if (p4n_mb_string('strlen', $email1) > 0) {
                            $emailliste[$email1] = array('email' => $email1, 'bez' => addslashes($bezeichnung));
                        }
                        if (p4n_mb_string('strlen', $email2) > 0) {
                            $emailliste[$email2] = array('email' => $email2, 'bez' => addslashes($bezeichnung));
                        }
                        if (p4n_mb_string('strlen', $email1) == 0 && p4n_mb_string('strlen', $email2) > 0) {
                            $email1 = $email2;
                        }
                        if (p4n_mb_string('strlen', $email1) > 0) {
                            $bcc[] = $email1;
                        }
                    }
                }
                if ($ansprechpartner_id > 0 && $stammdaten_id > 0) {
                $res = $db->select(
                        $sql_tab['stammdaten_ansprechpartner'],
                        array(
                            $sql_tabs['stammdaten_ansprechpartner']['email'],
                            $sql_tabs['stammdaten_ansprechpartner']['bezeichnung'],
                            $sql_tabs['stammdaten_ansprechpartner']['vorname'],
                                        ),
                        $sql_tabs['stammdaten_ansprechpartner']['ansprechpartner_id'].'='.$db->dbzahl($ansprechpartner_id).' and '.
                        $sql_tabs['stammdaten_ansprechpartner']['stammdaten_id'].'='.$db->dbzahl($stammdaten_id)
                    );
                    while($row = $db->zeile($res)) {
                        if (p4n_mb_string('strlen', $row[0]) > 0) {
                            $bezeichnung = apbezeichnung($ansprechpartner_id).' ('.kundenbezeichnung($stammdaten_id).')';
                            $bcc[] = $row[0];
                            $emailliste[$row[0]] = array('email' => $row[0], 'bez' => addslashes($bezeichnung));
                        }
                    }
                }
            }
            if (count($mailto) == 0) {
                if (count($bcc) > 0) {
                    $mailto = $bcc;
                    $bcc = array();
                }
            }
            if (($mailankunden + $mailanbetreuer) == 2) {
                $mailto = array_merge($mailto, $bcc);
                $bcc = array();
            }
            $dateiliste = array();
            //echo '$mailanbetreuer '.$mailanbetreuer.'<br>';
            if (($mailankunden + $mailanbetreuer) > 0) {
                if ($termin_id > 0) {
                    $mailtext = ' ';
                    $mailbetreff = _TERMINERINNERUNG_TEXT_.' '.adodb_date('d.m.Y H:i:s', $timestamp);
                    $vcal_text = '';
                    $nurtext = 1;
                    $_GET['tid'] = $termin_id;
                    include_once('inc/iCalcreator.class.php');
                    include_once('ical_export.php');
                    if (p4n_mb_string('strlen', $vcal_text) > 0) {
                        if (preg_match('/(BEGIN:VCALENDAR[\w\W]*?:[\w\W]*?)(BEGIN:VEVENT[\w\W]*?:[\w\W]*(?:END:VEVENT)*)(END:VCALENDAR)/ims', $vcal_text, $match)) {
                            if (preg_match_all('/BEGIN:VEVENT[\w\W]*?:[\w\W]*?END:VEVENT/mis', $match[2], $preg_match_split)) {
                                if (!empty($preg_match_split) && isset($preg_match_split[0])) {
                                    foreach ($preg_match_split[0] as $key => $vevents_part) {
                                        if (trim($vevents_part)!='') {
                                            $dateiname = 'temp/'._TERMIN_TERMIN_.'_'.adodb_date('Y-m-d_H_i_s', $timestamp).'_'.$_SESSION['user_id'].($key > 0 ? '_'.$key : '').'.ics';
                                            if ($fp=fopen($dateiname, 'w')) {
                                                fwrite($fp, $match[1].$vevents_part."\n".$match[3]);
                                                fclose($fp);
                                            }
                                            $dateiliste[] = $dateiname;
                                        }
                                    }
                                }
                            }
                        }
                    }
                } elseif (!empty($dateiliste)) {
                    $mailbetreff = _KNANHANG_USER_;
                } else {
                    return '';
                }
                if ($betreff != '') {
                    $mailbetreff = $betreff;
                }
                $mail_formular_zielsession='termin_mail_versenden';
                unset($_SESSION[$mail_formular_zielsession]);
                include_once('mail_formular.php');

                $link1 = getMailLink('Mail', 'javascript', $mailto, $cc, $bcc, $mailtext, $mailbetreff, $stammdaten_id, $dateiliste, '', '', '', false, array('emailliste' => $emailliste));
                $divelement = getMailInhalt();
                return $divelement.javas('window.onload = function() {lade_in_message_mail_form(\'mail_formular.php?session=' . $link1['sessionid'] . '&typemail=' . 'javascript'. '\',400,370);}');
            }
        }
	
	function bruttoertrag_anzeige($oid=0) {
		global $db, $sql_tab, $sql_tabs, $sql_meta, $cfg_mwst, $cfg_kfzsuche_kein_wem, $cfg_kfzsuche_kein_ekpreis, $cfg_kfzsuche_kein_ekpreis_nichtadmin, $cfg_kfzsuche_kein_be, $cfg_kfzsuche_kein_be_nichtadmin, $cfg_kfzsuche_norway;
		global $cfg_kfzsuche_marginkalk2, $hat_mk2;
		
		
		if (!$cfg_kfzsuche_marginkalk2) {
			if (!isset($hat_mk2)) {
				$hat_mk2=1;
				$res7=$db->select(
					$sql_tab['benutzer_gruppe'],
					array(
						$sql_tabs['benutzer_gruppe']['benutzer_gruppe_id']
					),
					$sql_tabs['benutzer_gruppe']['bezeichnung'].'='.$db->str(_MARGE_)
				);
				if ($row7=$db->zeile($res7)) {
					if ($_SESSION['rechte_bgruppen']=='-1' or preg_match('/,'.$row7[0].',/', ','.$_SESSION['rechte_bgruppen'].',')) {
						$cfg_kfzsuche_marginkalk2=true;
					}
				}
			}
		}
		
        $waehrung_eur='€';
        $waehrung_eur2='EUR';
        $waehrung_eur3='&euro;';
        if ($cfg_kfzsuche_norway) {
            $waehrung_eur='NOK';
            $waehrung_eur2='NOK';
            $waehrung_eur3='NOK';
        }
		
		$t='';
        $t_array = array();
		
		$res=$db->select(
		$sql_tab['opportunity'],
            array(
                $sql_tabs['opportunity']['opportunity_id'],
                $sql_tabs['opportunity']['stammdaten_id'],
                $sql_tabs['opportunity']['ansprechpartner_id'],
                $sql_tabs['opportunity']['produkt_id'],
                $sql_tabs['opportunity']['bezeichnung'],
                $sql_tabs['opportunity']['art'],				// 5
                $sql_tabs['opportunity']['quelle'],
                $sql_tabs['opportunity']['betrag'],
                $sql_tabs['opportunity']['schlusstermin'],
                $sql_tabs['opportunity']['phase'],
                $sql_tabs['opportunity']['benutzer_id'],		// 10
                $sql_tabs['opportunity']['bemerkung'],
                $sql_tabs['opportunity']['datum_eintrag'],
                $sql_tabs['opportunity']['konfigurator_id'],
                $sql_tabs['opportunity']['genehmigt_benutzer_id'],
                $sql_tabs['opportunity']['genehmigt_datum'],	// 15
                $sql_tabs['opportunity']['genehmigt_text'],
                $sql_tabs['opportunity']['markencode'],
                $sql_tabs['opportunity']['typ_modell'],
                $sql_tabs['opportunity']['fahrzeugstatus'],
                $sql_tabs['opportunity']['angebot_details'],		// 20
                $sql_tabs['opportunity']['zusatz3'],
                $sql_tabs['opportunity']['fahrzeugmodellnr'],
                $sql_tabs['opportunity']['manuell_marke'],
                $sql_tabs['opportunity']['manuell_obergruppe'],
                $sql_tabs['opportunity']['manuell_fahrzeugstatus'],	// 25
                $sql_tabs['opportunity']['auswertung_zaehlen'],
                $sql_tabs['opportunity']['zusatz4']
            ),
            $db->dbzahlin($oid, $sql_tabs['opportunity']['opportunity_id'])
		);
        while ($row=$db->zeile($res)) {
			$t = bruttoertrag_anzeige_format($row);
            $t_array[$row[0]] = $t;
		}
		if (is_array($oid)) {
            return $t_array;
        }
		return $t;
	}
    
    function bruttoertrag_anzeige_format($row=array(), $kfz_rows=array()) {
        global $db, $sql_tab, $sql_tabs, $sql_meta, $cfg_mwst, $cfg_kfzsuche_kein_wem, $cfg_kfzsuche_kein_ekpreis, $cfg_kfzsuche_kein_ekpreis_nichtadmin, $cfg_kfzsuche_kein_be, $cfg_kfzsuche_kein_be_nichtadmin, $cfg_kfzsuche_norway;
		global $cfg_kfzsuche_marginkalk2, $hat_mk2;
		
        $ekp=0;
        $diffbest=false;

        $summe_pa=0;
        $summe_pa1=0;
        $summe_pa2=0;
        $summe_hzb=0;
        $summe_neben=0;
        $summe_neben1=0;
        $summe_neben2=0;
        $ist_gw=false;
        $summe_gwneben=0;
        $lp1=0;
        $lp2=0;
        $konf_ek1=0;
		$extconf1='';
		
        $alle_nachl1=array();
        $xpl2=explode('#####', $row[20]);
        while (list($keyx, $valx)=@each($xpl2)) {
				if (substr($valx, 0, 16)=='vertrag5_sonderr' and substr($valx, 0, 21)!='vertrag5_sonderrpreis' and substr($valx, 0, 22)!='vertrag5_sonderrppreis') {
                $xpl3=explode('===', $valx);
                $alle_nachl1[$xpl3[0]]=$xpl3[1];
            }
        }
		$alle_x=array();
        $xpl1=explode('#####', $row[20]);
        while (list($keyx, $valx)=@each($xpl1)) {
			if ($cfg_kfzsuche_marginkalk2) {
				$xpl2=explode('===', $valx);
				$alle_x[$xpl2[0]]=$xpl2[1];
			}
			if (substr($valx, 0, 21)=='vertrag5_sonderrpreis') {
                $xpl2=explode('===', $valx);
                $ind1=substr($xpl2[0], 21);
                $pat1=$xpl2[1];
                if (preg_match('/,/', $pat1)) {
                    $pat1=str_replace('.', '', $pat1);
                    $pat1=str_replace(',', '.', $pat1);
                }
                $ist_nachl=false;
                if (isset($alle_nachl1['vertrag5_sonderr'.$ind1])) {
                    if ($alle_nachl1['vertrag5_sonderr'.$ind1]=='Nachlass') {
                        $ist_nachl=true;
                    }
                }
                if ($ist_nachl) {
                    $summe_pa2+=doubleval($pat1);
                } else {
                    $summe_pa1+=doubleval($pat1);
                }
            }
			
			if (substr($valx, 0, 10)=='extconf===') {
				$xpl2=explode('===', $valx);
				$extconf1=$xpl2[1];
			}
			
			if (substr($valx, 0, 12)=='konf_ekpreis') {
                $xpl2=explode('===', $valx);
                $konf_ek1=doubleval($xpl2[1])/(1+$cfg_mwst);
			} elseif (substr($valx, 0, 12)=='summe_preisa') {
                $xpl2=explode('===', $valx);
                $summe_pa=$xpl2[1];
                if (preg_match('/,/', $summe_pa)) {
                    $summe_pa=str_replace('.', '', $summe_pa);
                    $summe_pa=str_replace(',', '.', $summe_pa);
                }
                $summe_pa=doubleval($summe_pa);
            }
			if (substr($valx, 0, 18)=='vertrag5_transport' or substr($valx, 0, 14)=='vertrag5_neben') {
                $xpl2=explode('===', $valx);
                $summe1=$xpl2[1];
                if (preg_match('/,/', $summe1)) {
                    $summe1=str_replace('.', '', $summe1);
                    $summe1=str_replace(',', '.', $summe1);
                }
                $summe1=doubleval($summe1);
                $summe_neben+=$summe1;
            }
			if (substr($valx, 0, 18)=='vertrag5_transport') {
                $xpl2=explode('===', $valx);
                $summe1=$xpl2[1];
                if (preg_match('/,/', $summe1)) {
                    $summe1=str_replace('.', '', $summe1);
                    $summe1=str_replace(',', '.', $summe1);
                }
                $summe1=doubleval($summe1);
                $summe_neben1+=$summe1;
            }
				if (substr($valx, 0, 14)=='vertrag5_neben') {
                $xpl2=explode('===', $valx);
                $summe1=$xpl2[1];
                if (preg_match('/,/', $summe1)) {
                    $summe1=str_replace('.', '', $summe1);
                    $summe1=str_replace(',', '.', $summe1);
                }
                $summe1=doubleval($summe1);
                $summe_neben2+=$summe1;
            }
				if (substr($valx, 0, 21)=='vertrag5_sonderzpreis') {
                $xpl2=explode('===', $valx);
                $summe1=$xpl2[1];
                if (preg_match('/,/', $summe1)) {
                    $summe1=str_replace('.', '', $summe1);
                    $summe1=str_replace(',', '.', $summe1);
                }
                $summe1=doubleval($summe1);
                $summe_hzb+=$summe1;
            }
				if (substr($valx, 0, 20)=='vertrag5_sonderpreis' and substr($valx, 0, 21)!='vertrag5_sonderpreisv' and substr($valx, 0, 22)!='vertrag5_sonderpreissv') {
                $xpl2=explode('===', $valx);
                $summe1=$xpl2[1];
                if (preg_match('/,/', $summe1)) {
                    $summe1=str_replace('.', '', $summe1);
                    $summe1=str_replace(',', '.', $summe1);
                }
                $summe1=doubleval($summe1);
                $lp2+=$summe1;
            }
				if (substr($valx, 0, 18)=='vertrag5_trimpreis') {
                $xpl2=explode('===', $valx);
                $summe1=$xpl2[1];
                if (preg_match('/,/', $summe1)) {
                    $summe1=str_replace('.', '', $summe1);
                    $summe1=str_replace(',', '.', $summe1);
                }
                $summe1=doubleval($summe1);
                $lp2+=$summe1;
            }
				if (substr($valx, 0, 19)=='vertrag5_farbepreis') {
                $xpl2=explode('===', $valx);
                $summe1=$xpl2[1];
                if (preg_match('/,/', $summe1)) {
                    $summe1=str_replace('.', '', $summe1);
                    $summe1=str_replace(',', '.', $summe1);
                }
                $summe1=doubleval($summe1);
                $lp2+=$summe1;
            }
				if (substr($valx, 0, 12)=='listenpreis5') {
                $xpl2=explode('===', $valx);
                $lp1=$xpl2[1];
                if (preg_match('/,/', $lp1)) {
                    $lp1=str_replace('.', '', $lp1);
                    $lp1=str_replace(',', '.', $lp1);
                }
                $lp1=doubleval($lp1);
                $lp2+=doubleval($lp1);
				} elseif (substr($valx, 0, 12)=='vertrag_nwgw') {
                $xpl2=explode('===', $valx);
                if ($xpl2[1]=='1') {
                    $ist_gw=true;
                }
            }
				if (substr($valx, 0, 18)=='vertrag_zulassung2') {
                $xpl2=explode('===', $valx);
                $summe1=$xpl2[1];
                if (preg_match('/,/', $summe1)) {
                    $summe1=str_replace('.', '', $summe1);
                    $summe1=str_replace(',', '.', $summe1);
                }
                $summe1=doubleval($summe1);
                $summe_gwneben+=$summe1;
            }

        }

        if ($ist_gw) {
            $summe_pa=0;
            $summe_neben+=$summe_gwneben;
        } else {
            $row[7]=doubleval($row[7])+$summe_pa-$summe_hzb-$summe_neben;
        }

        $aktvkp=doubleval($row[7])-$summe_hzb-$summe_neben;
        $wem=0;

        if (intval($row[3])>0) {
            if (!empty($kfz_rows)) {
                if (!empty($kfz_rows[$row[3]])) {
                    $row3=$kfz_rows[$row[3]];
                    if (!empty($row3)) {
                        $ekp=$row3['einstandspreis_mw'];
                        if ($row3['differenzbesteuerung']=='1') {
                            $diffbest=true;
                        }
                        $wem=doubleval($row3['planverkaufspreis_mw']);
                    }
                }
            } else {
                $res3=$db->select(
                    $sql_tab['produktzuordnung'],
                    array(
                        $sql_tabs['produktzuordnung']['einstandspreis_mw'],
                        $sql_tabs['produktzuordnung']['differenzbesteuerung'],
                        $sql_tabs['produktzuordnung']['planverkaufspreis_mw']
                    ),
                    $sql_tabs['produktzuordnung']['produktzuordnung_id'].'='.$db->dbzahl($row[3])
                );
                if ($row3=$db->zeile($res3)) {
                    $ekp=$row3[0];
                    if ($row3[1]=='1') {
                        $diffbest=true;
                    }
                    $wem=doubleval($row3[2]);
                }
            }
            
        } elseif (intval($row[13])>0) {
            global $cache_konfig_gme;
            if (!is_array($cache_konfig_gme)) {
                $cache_konfig_gme = array();
            }
            if (!isset($cache_konfig_gme[$row[13]])) {
                $res3=$db->select(
                    $sql_tab['kfz_konfigurator_gme'],
                    array(
                        $sql_tabs['kfz_konfigurator_gme']['inhalt'],
                        $sql_tabs['kfz_konfigurator_gme']['konfig_id']
                    ),
                    $sql_tabs['kfz_konfigurator_gme']['kfz_konfigurator_gme_id'].'='.$db->dbzahl($row[13])
                );
                if ($row3=$db->zeile($res3)) {
                    $obj=simplexml_load_string(p4n_mb_string('str_replace', array('&lt;', '&gt;'), array('<', '>'), $row3[0]));
                    if (isset($obj->mpv->dnp)) {
                        $ekp+=doubleval($obj->mpv->dnp);
                    }
                    if (isset($obj->color->dnp)) {
                        $ekp+=doubleval($obj->color->dnp);
                    }
                    if (isset($obj->trim->dnp)) {
                        $ekp+=doubleval($obj->trim->dnp);
                    }
                    if (isset($obj->options->option)) {
                        foreach($obj->options->option as $key => $val) {
                            $ekp+=doubleval($val->dnp);
                        }
                    }
                }
                $cache_konfig_gme[$row[13]]=$ekp;
            } else {
                $ekp+=$cache_konfig_gme[$row[13]];
            }
        }
        if ($ekp==0) {
			if ($extconf1=='EX') {
				$konf_ek1=$konf_ek1*(1+$cfg_mwst);
			}
            $ekp=$konf_ek1;
        }
        $preis='<table>';
        $preis.='<tr><td>'._AKTUELLERVKPREIS_.'</td><td style="text-align:right;">'.number_format(doubleval($row[7]), 2, ',', '.').' '.$waehrung_eur3.''.'</td></tr>';		// 15
        if ($summe_hzb>0) {
            $preis.='<tr><td>'._ZUBEHOER_.'</td><td style="text-align:right;">-'.number_format(doubleval($summe_hzb), 2, ',', '.').' '.$waehrung_eur3.''.'</td></tr>';
        }
        if ($summe_neben>0) {
            $preis.='<tr><td>'._BEREITSTELLUNGSKOSTEN_.'/'._ZULASSUNG_NEBENKOSTEN_.'</td><td style="text-align:right;">-'.number_format(doubleval($summe_neben), 2, ',', '.').' '.$waehrung_eur3.''.'</td></tr>';
        }
        if ($summe_neben>0 or $summe_hzb>0) {
            $preis.='<tr><td>'._BETRAG_.'</td><td style="text-align:right;">'.number_format(doubleval($aktvkp), 2, ',', '.').' '.$waehrung_eur3.''.'</td></tr>';		// 15
        }
        if ($cfg_kfzsuche_kein_wem) {

        } elseif ($wem>0) {
            $preis.='<tr><td>WEM</td><td style="text-align:right;">'.number_format(doubleval($wem), 2, ',', '.').' '.$waehrung_eur3.''.'</td></tr>';
        }
        if ($cfg_kfzsuche_kein_ekpreis or ($cfg_kfzsuche_kein_ekpreis_nichtadmin and $_SESSION['user_gruppe']<2)) {
        } else {
            $preis.='<tr><td>'._EKPREIS_.'</td><td style="text-align:right;">'.number_format(doubleval($ekp), 2, ',', '.').' '.$waehrung_eur3.''.'</td></tr>';	// row 14
        }
        $preis.='<tr><td>'._VERKAUFSHILFEN_.'</td><td style="text-align:right;">-'.number_format(doubleval($summe_pa), 2, ',', '.').' '.$waehrung_eur3.''.'</td></tr>';
        $bruttoertrag=doubleval($aktvkp)/(1+$cfg_mwst)-doubleval($ekp)-doubleval($summe_pa)-$wem;	//-doubleval($row[16])
        if ($diffbest) {
            $bruttoertrag=(doubleval($aktvkp)-doubleval($ekp))/(1+$cfg_mwst)-doubleval($summe_pa)-$wem;	//-doubleval($row[16])
        }
        if ($cfg_kfzsuche_kein_be or ($cfg_kfzsuche_kein_be_nichtadmin and $_SESSION['user_gruppe']<2)) {
        } else {
            $preis.='<tr><td>'._BRUTTOERTRAG_.'</td><td style="text-align:right;">'.number_format(doubleval($bruttoertrag), 2, ',', '.').' '.$waehrung_eur3.''.'</td></tr>';
        }
        $preis.='</table>';

		if ($cfg_kfzsuche_marginkalk2) {
			$preis='';
			if ($ekp==0) {
				$marge_kfz=doubleval($alle_x['marge_kfzp']);
				$marge_aus=doubleval($alle_x['marge_ausp']);
				$margin_kfz=doubleval($alle_x['listenpreis5']);
				$margin_kfz-=$margin_kfz*$marge_kfz/100;
				$margin_kfz=$margin_kfz/(1+$cfg_mwst);
				$margin_farbe=doubleval($alle_x['vertrag5_farbepreis']);
				$margin_farbe-=$margin_farbe*$marge_aus/100;
				$margin_farbe=$margin_farbe/(1+$cfg_mwst);
				$margin_trim=doubleval($alle_x['vertrag5_trimpreis']);
				$margin_trim-=$margin_trim*$marge_aus/100;
				$margin_trim=$margin_trim/(1+$cfg_mwst);
				$margin_aus=$margin_farbe+$margin_trim;
				for ($xi=1; $xi<100; $xi++) {
					if (isset($alle_x['vertrag5_sonderpreis'.$xi])) {
						$margin_aust=doubleval($alle_x['vertrag5_sonderpreis'.$xi]);
						$margin_aust-=$margin_aust*$marge_aus/100;
						$margin_aust=$margin_aust/(1+$cfg_mwst);
						$margin_aus+=$margin_aust;
					}
				}
				$row[7]=doubleval($row[7])-doubleval($alle_x['vertrag5_garantie']);
				$ekp=doubleval($row[7])-$margin_kfz-$margin_aus;
				$ekp=$margin_kfz+$margin_aus;
			}
			$istdiff=false;
			if (isset($alle_x['ist_diffbest'])) {
				if ($alle_x['ist_diffbest']=='1') {
					$istdiff=true;
				}
			}
			$preis.='<table>';
				$beneu=doubleval($row[7]);
				$beneu2=doubleval($row[7])/(1+$cfg_mwst);
				if ($istdiff) {
					$preis.='<tr><td>'._AKTUELLERVKPREIS_.'</td><td>'.number_format(doubleval($row[7]), 2, ',', '.').' '.$waehrung_eur.''.'</td></tr>';
				} else {
					$preis.='<tr><td>'._AKTUELLERVKPREIS_.'</td><td>'.number_format(doubleval($row[7]), 2, ',', '.').' '.$waehrung_eur.''.'</td><td>'.number_format($beneu2, 2, ',', '.').' '.$waehrung_eur.''.'</td></tr>';
				}
				if ($istdiff) {
					$beneu-=doubleval($ekp);
				} else {
					$beneu-=doubleval($ekp)*(1+$cfg_mwst);
				}
				$beneu2-=doubleval($ekp);
				if ($istdiff) {
					$preis.='<tr><td>'._EKPREIS_.'</td><td>-'.number_format(doubleval($ekp), 2, ',', '.').' '.$waehrung_eur.''.'</td></tr>';
				} else {
					$preis.='<tr><td>'._EKPREIS_.'</td><td>-'.number_format(doubleval($ekp)*(1+$cfg_mwst), 2, ',', '.').' '.$waehrung_eur.''.'</td><td>-'.number_format(doubleval($ekp), 2, ',', '.').' '.$waehrung_eur.''.'</td></tr>';
				}
				
				//$standkosten=doubleval($wem);
				$standkosten=0;
				$standkostenbez='';
				if (isset($alle_x['vertrag5_intkosten2'])) {
					$betragt1=$alle_x['vertrag5_intkosten2'];
              		if (preg_match('/,/', $betragt1)) {
                    	$betragt1=str_replace('.', '', $betragt1);
						$betragt1=str_replace(',', '.', $betragt1);
					}
					$betragt1=doubleval($betragt1);
					if ($betragt1!=0) {
						$standkosten=$betragt1;
						$standkostenbez=$alle_x['vertrag5_intkostenbez2'];
					}
				}
				$intkosten=0;
				$intkostenbez='';
				if (isset($alle_x['vertrag5_intkosten'])) {
					$betragt1=$alle_x['vertrag5_intkosten'];
              		if (preg_match('/,/', $betragt1)) {
                    	$betragt1=str_replace('.', '', $betragt1);
						$betragt1=str_replace(',', '.', $betragt1);
					}
					$betragt1=doubleval($betragt1);
					if ($betragt1!=0) {
						$intkosten=$betragt1;
						$intkostenbez=$alle_x['vertrag5_intkostenbez'].', ';
					}
				}
				$vkhilfen=0;
				$vkhilfenbez='';
				$beneu-=doubleval($standkosten);
				$beneu2-=doubleval($standkosten)/(1+$cfg_mwst);
				if ($istdiff) {
					$preis.='<tr><td>'.'interne Kosten ('.$standkostenbez.')'.'</td><td>-'.number_format(doubleval($standkosten), 2, ',', '.').' '.$waehrung_eur.''.'</td></tr>';
				} else {
					$preis.='<tr><td>'.'interne Kosten ('.$standkostenbez.')'.'</td><td>-'.number_format(doubleval($standkosten), 2, ',', '.').' '.$waehrung_eur.''.'</td><td>-'.number_format(doubleval($standkosten)/(1+$cfg_mwst), 2, ',', '.').' '.$waehrung_eur.''.'</td></tr>';
				}
				if ($intkosten>0) {
					$intkostenbez=substr($intkostenbez, 0, -2);
					$beneu-=doubleval($intkosten);
					$beneu2-=doubleval($intkosten)/(1+$cfg_mwst);
					if ($istdiff) {
						$preis.='<tr><td>'.'interne Kosten ('.$intkostenbez.')'.'</td></tr>';
					} else {
						$preis.='<tr><td>'.'interne Kosten ('.$intkostenbez.')'.'</td><td>-'.number_format(doubleval($intkosten), 2, ',', '.').' '.$waehrung_eur.''.'</td><td>-'.number_format(doubleval($intkosten)/(1+$cfg_mwst), 2, ',', '.').' '.$waehrung_eur.''.'</td></tr>';
					}
				}
				
				for ($xi=1; $xi<=5; $xi++) {
					if (isset($alle_x['vertrag5_vkh'.$xi])) {
						$betragt1=$alle_x['vertrag5_vkh'.$xi];
        	      		if (preg_match('/,/', $betragt1)) {
            	        	$betragt1=str_replace('.', '', $betragt1);
							$betragt1=str_replace(',', '.', $betragt1);
						}
						$betragt1=doubleval($betragt1);
						if ($betragt1!=0) {
							$vkhilfen+=$betragt1;
							$vkhilfenbez.=$alle_x['vertrag5_vkhbez'.$xi].', ';
						}
					}
				}
				if ($istdiff and $beneu>=0) {
					$mbeneu=$beneu;
					$usteuer=$beneu*$cfg_mwst;
					$beneu-=doubleval($usteuer);
					$preis.='<tr><td>'.'MwSt'.'</td><td>-'.number_format(doubleval($usteuer), 2, ',', '.').' '.$waehrung_eur.''.'</td></tr>';
				}
				
				if ($vkhilfen>0) {
					$vkhilfenbez=substr($vkhilfenbez, 0, -2);
					$beneu+=doubleval($vkhilfen);
					$beneu2+=doubleval($vkhilfen)/(1+$cfg_mwst);
					if ($istdiff) {
						$preis.='<tr><td>'.'Verkaufshilfen ('.$vkhilfenbez.')'.'</td><td>+'.number_format(doubleval($vkhilfen), 2, ',', '.').' '.$waehrung_eur.''.'</td></tr>';
					} else {
						$preis.='<tr><td>'.'Verkaufshilfen ('.$vkhilfenbez.')'.'</td><td>+'.number_format(doubleval($vkhilfen), 2, ',', '.').' '.$waehrung_eur.''.'</td><td>+'.number_format(doubleval($vkhilfen)/(1+$cfg_mwst), 2, ',', '.').' '.$waehrung_eur.''.'</td></tr>';
					}
				}
				
				$nachl=0;
				$nachlbez='';
				for ($xi=1; $xi<=20; $xi++) {
					if (isset($alle_x['vertrag5_sonderrpreis'.$xi])) {
						$betragt1=$alle_x['vertrag5_sonderrpreis'.$xi];
        	      		if (preg_match('/,/', $betragt1)) {
            	        	$betragt1=str_replace('.', '', $betragt1);
							$betragt1=str_replace(',', '.', $betragt1);
						}
						$betragt1=doubleval($betragt1);
						if ($betragt1!=0) {
							$nachl+=$betragt1;
							$nachlbez.=$alle_x['vertrag5_sonderr'.$xi].', ';
						}
					}
				}
				if ($nachl!=0) {
					$nachlbez=substr($nachlbez, 0, -2);
					$beneu-=doubleval($nachl);
					$beneu2-=doubleval($nachl)/(1+$cfg_mwst);
					if ($istdiff) {
						$preis.='<tr><td>'.$nachlbez.'</td><td>-'.number_format(doubleval($nachl), 2, ',', '.').' '.$waehrung_eur.''.'</td></tr>';
					} else {
						$preis.='<tr><td>'.$nachlbez.'</td><td>-'.number_format(doubleval($nachl), 2, ',', '.').' '.$waehrung_eur.''.'</td><td>-'.number_format(doubleval($nachl)/(1+$cfg_mwst), 2, ',', '.').' '.$waehrung_eur.''.'</td></tr>';
					}
				}
				if (isset($alle_x['vertrag5_transport']) and $alle_x['vertrag5_transport']!='') {
					$betragt1=$alle_x['vertrag5_transport'];
        	      		if (preg_match('/,/', $betragt1)) {
            	        	$betragt1=str_replace('.', '', $betragt1);
							$betragt1=str_replace(',', '.', $betragt1);
						}
					$beneu+=doubleval($betragt1);
					$beneu2+=doubleval($betragt1)/(1+$cfg_mwst);
					if ($istdiff) {
						$preis.='<tr><td>'._BEREITSTELLUNGSKOSTEN_.'</td><td>+'.number_format(doubleval($betragt1), 2, ',', '.').' '.$waehrung_eur.''.'</td></tr>';
					} else {
						$preis.='<tr><td>'._BEREITSTELLUNGSKOSTEN_.'</td><td>+'.number_format(doubleval($betragt1), 2, ',', '.').' '.$waehrung_eur.''.'</td><td>+'.number_format(doubleval($betragt1)/(1+$cfg_mwst), 2, ',', '.').' '.$waehrung_eur.''.'</td></tr>';
					}
				}
				if (isset($alle_x['vertrag5_garantie']) and $alle_x['vertrag5_garantie']!='') {
					$betragt1=$alle_x['vertrag5_garantie'];
        	      		if (preg_match('/,/', $betragt1)) {
            	        	$betragt1=str_replace('.', '', $betragt1);
							$betragt1=str_replace(',', '.', $betragt1);
						}
					$beneu+=doubleval($betragt1);
					$beneu2+=doubleval($betragt1)/(1+$cfg_mwst);
					if ($istdiff) {
						$preis.='<tr><td>'.'Schutzbrief'.'</td><td>+'.number_format(doubleval($betragt1), 2, ',', '.').' '.$waehrung_eur.''.'</td></tr>';
					} else {
						$preis.='<tr><td>'.'Schutzbrief'.'</td><td>+'.number_format(doubleval($betragt1), 2, ',', '.').' '.$waehrung_eur.''.'</td><td>+'.number_format(doubleval($betragt1)/(1+$cfg_mwst), 2, ',', '.').' '.$waehrung_eur.''.'</td></tr>';
					}
				}
				if (isset($alle_x['vertrags_ankauf']) and $alle_x['vertrags_gwpreis']!='' and $alle_x['vertrags_gwpreis_echt']!='') {
					if ($alle_x['vertrags_ankauf']=='1') {
						$betragt1=$alle_x['vertrags_gwpreis'];
        	      		if (preg_match('/,/', $betragt1)) {
            	        	$betragt1=str_replace('.', '', $betragt1);
							$betragt1=str_replace(',', '.', $betragt1);
						}
						$betragt2=$alle_x['vertrags_gwpreis_echt'];
        	      		if (preg_match('/,/', $betragt1)) {
            	        	$betragt2=str_replace('.', '', $betragt2);
							$betragt2=str_replace(',', '.', $betragt2);
						}
						$diff_gwp=$betragt1-$betragt2;
						if ($istdiff) {
							$beneu+=doubleval($diff_gwp);
						} else {
							$beneu+=doubleval($diff_gwp)*(1+$cfg_mwst);
						}
						$beneu2+=doubleval($diff_gwp);	// /(1+$cfg_mwst)
						if ($istdiff) {
							$preis.='<tr><td>'._TRADEIN_.'</td><td>+'.number_format(doubleval($diff_gwp), 2, ',', '.').' '.$waehrung_eur.''.'</td></tr>';
						} else {
							$preis.='<tr><td>'._TRADEIN_.'</td><td>+'.number_format(doubleval($diff_gwp)*(1+$cfg_mwst), 2, ',', '.').' '.$waehrung_eur.''.'</td><td>+'.number_format(doubleval($diff_gwp), 2, ',', '.').' '.$waehrung_eur.''.'</td></tr>';
						}
					}
				}
				if ($istdiff) {
					$preis.='<tr><td>'._BRUTTOERTRAG_.'</td><td>'.number_format(doubleval($beneu), 2, ',', '.').' '.$waehrung_eur.''.'</td><td>'.number_format(doubleval($beneu)*(1+$cfg_mwst), 2, ',', '.').' '.$waehrung_eur.''.'</td></tr>';
				} else {
					$preis.='<tr><td>'._BRUTTOERTRAG_.'</td><td>'.number_format(doubleval($beneu), 2, ',', '.').' '.$waehrung_eur.''.'</td><td>'.number_format(doubleval($beneu2), 2, ',', '.').' '.$waehrung_eur.''.'</td></tr>';
				}
		}
		
        if ($_SESSION['cfg_kunde']=='carlo_opel_duerkop') {
            $preis='<table>';

            $wem=$wem*(1+$cfg_mwst);

            $b2=doubleval($row[7]);
            $b2-=$summe_pa1;
            $b2-=$summe_pa2;
            $b2+=doubleval($summe_hzb);
            $b2+=$summe_neben1+$summe_neben2;
            $hauspreis=$b2;

            $preis.='<tr><td></td><td>'._LISTENPREIS_.'</td><td style="text-align:right;">'.number_format(doubleval($lp2), 2, ',', '.').' '.$waehrung_eur3.''.'</td></tr>';		// 15
            $preis.='<tr><td></td><td>'._EKPREIS_.' '._NETTO_.'</td><td style="text-align:right;">'.number_format(doubleval($ekp), 2, ',', '.').' '.$waehrung_eur3.''.'</td></tr>';		// 15
            if ($diffbest) {
                $b2=doubleval($ekp);
            } else {
                $b2=doubleval($ekp)*(1+$cfg_mwst);
            }
            $preis.='<tr><td>-</td><td>'._VERKAUFSHILFEN_.'</td><td style="text-align:right;">'.number_format($summe_pa1, 2, ',', '.').' '.$waehrung_eur3.''.'</td></tr>';
            $b2-=$summe_pa1;
//				$b2-=$summe_pa2;
            $preis.='<tr><td>+</td><td>'._ZUBEHOER_.'</td><td style="text-align:right;">'.number_format(doubleval($summe_hzb), 2, ',', '.').' '.$waehrung_eur3.''.'</td></tr>';
            $b2+=doubleval($summe_hzb);
            $preis.='<tr><td>+</td><td>'._WEM_.'</td><td style="text-align:right;">'.number_format($wem, 2, ',', '.').' '.$waehrung_eur3.''.'</td></tr>';
            $b2+=$wem;
            $preis.='<tr><td></td><td>'._GESAMT_.'</td><td style="text-align:right;">'.number_format($b2, 2, ',', '.').' '.$waehrung_eur3.''.'</td></tr>';
            $preis.='<tr><td></td><td>'._HAUSPREIS_.'</td><td style="text-align:right;">'.number_format($hauspreis, 2, ',', '.').' '.$waehrung_eur3.''.'</td></tr>';		// 15
            $preis.='<tr><td></td><td>&nbsp;</td><td style="text-align:right;">&nbsp;</td></tr>';		// 15
            $ertrag1=$hauspreis-$b2;
            if (!$ist_gw) {
//					$ertrag1+=$summe_neben1;
            }
            $preis.='<tr><td></td><td>'._ERTRAG_.'</td><td style="text-align:right;">'.number_format($ertrag1, 2, ',', '.').' '.$waehrung_eur3.''.'</td></tr>';		// 15
            $proz_ertrag=0;
            if ($hauspreis!=0) {
                $proz_ertrag=$ertrag1/$hauspreis*100;
            }
            $preis.='<tr><td></td><td>in %</td><td style="text-align:right;">'.number_format($proz_ertrag, 2, ',', '.').' %</td></tr>';		// 15
            $preis.='<tr><td></td><td>&nbsp;</td><td style="text-align:right;">&nbsp;</td></tr>';		// 15
            $preis.='<tr><td></td><td>'._BEREITSTELLUNGSKOSTEN_.'</td><td style="text-align:right;">'.number_format($summe_neben1, 2, ',', '.').' '.$waehrung_eur3.''.'</td></tr>';		// 15
            $preis.='<tr><td></td><td>'._ZULASSUNG_NEBENKOSTEN_.'</td><td style="text-align:right;">'.number_format($summe_neben2, 2, ',', '.').' '.$waehrung_eur3.''.'</td></tr>';		// 15
            $preis.='<tr><td></td><td>&nbsp;</td><td style="text-align:right;">&nbsp;</td></tr>';		// 15
            $werkpreis=$hauspreis-$summe_neben1-$summe_neben2-$summe_hzb+$summe_pa1+$summe_pa2;
            $nachlassp=0;
            $nachlass1=$summe_pa2;//$summe_pa1+
            if ($nachlass1>0 and $werkpreis>0) {
                $nachlassp=$nachlass1/$werkpreis*100;
            }
            $preis.='<tr><td></td><td>'._NACHLASS_.' (%)</td><td style="text-align:right;">'.number_format($nachlassp, 2, ',', '.').' %'.'</td></tr>';		// 15
            $preis.='</table>';
        }

        $t=$preis;
        return $t;
    }

/**
 * @param $stdid
 * @param array $zusatzfelder
 */
    function fuegeZusatzfelderZuKunden($stdid, $zusatzfelder = array()) {
        if ($stdid > 0 && is_array($zusatzfelder)) {
            foreach ($zusatzfelder as $zusatzfeld_bez => $zusatzfeld_value) {
                fuegeZusatzfeldZuKunden($stdid, $zusatzfeld_bez, $zusatzfeld_value);
            }
        }
    }

/**
 * Returns the id of a Zusatzfeld, and add it to the DB if doens't exist
 * @param $bezeichnung
 * @param int $art
 * @return int|the
 */
    function insertZusatzfunktionGetId($bezeichnung, $art=0) {
        global $sql_tab, $sql_tabs, $db;

        if (empty($bezeichnung)) {
            return 0;
        }

        $res2 = $db->select(
            $sql_tab['stammdaten_zusatz'], $sql_tabs['stammdaten_zusatz']['zusatz_id'], $sql_tabs['stammdaten_zusatz']['bezeichnung'].'='.$db->str($bezeichnung)
        );
        if ($row2 = $db->zeile($res2)) {
            $zus_id1 = $row2[0];
        } else {
            $res = $db->select(
                $sql_tab['stammdaten_zusatz'],
                'MAX('.$sql_tabs['stammdaten_zusatz']['rang'].')+1'
            );
            if ($row = $db->zeile($res)) {
                if ($row[0] == '') {
                    $zus_rang = 1;
                } else {
                    $zus_rang = $row[0];
                }
            } else {
                $zus_rang = 1;
            }
            $db->insert(
                $sql_tab['stammdaten_zusatz'], array(
                    $sql_tabs['stammdaten_zusatz']['bezeichnung'] => $db->str($bezeichnung),
                    $sql_tabs['stammdaten_zusatz']['art'] => $db->dbzahl($art),
                    $sql_tabs['stammdaten_zusatz']['rang'] => $db->dbzahl($zus_rang),
                    $sql_tabs['stammdaten_zusatz']['privat'] => $db->dblogicfull(0),
                    $sql_tabs['stammdaten_zusatz']['nur_lesend'] => $db->dblogicfull(0)
                )
            );
            $zus_id1 = $db->insertid();
        }
        
        $zusart_sql=array(
            0=>'VARCHAR(255)',
            1=>'DATE',
            2=>'DOUBLE',
            3=>'VARCHAR(255)',
            4=>'LONGTEXT',
            5=>'LONGTEXT',
            6=>'DATETIME',
            7=>'INTEGER',
            8=>'TINYINT'
        );
        $res3 = $db->select(
            $sql_tab['zusatzfelder'], '*', '', '', '', false, 1
        );
        if ($row3 = $db->zeile($res3)) {
            $zf_gef = false;
            while (list($key, $val) = @each($row3)) {
                if (!is_numeric($key) and $key == 'zf_'.$zus_id1) {
                    $zf_gef = true;
                }
            }
            if ($zf_gef == false) {
                $db->select2('alter table '.$sql_tab['zusatzfelder'].' add zf_'.$zus_id1.' '.$zusart_sql[$art].' not null');
            }
        }
        return $zus_id1;
    }

    /**
     * This function adds the given vorgabe to crm_stammdaten_zusatz_vorgabe table
     * @param $vorgaben array
     * @param $zusatzfeld_id int
     */
    function insertZusatzVorgaben($zusatzfeld_id, $vorgaben) {
        global $db, $sql_tab, $sql_tabs;
        if (empty($zusatzfeld_id) or empty($vorgaben)) {
            return;
        }
        #echo '<pre>'; print($zusatzfeld_id); print_r($vorgaben); exit;
        foreach($vorgaben as $rang => $bezeichnung) {
            if (empty($rang) or empty($bezeichnung)) {
                continue;
            }
            $res = $db->select(
                $sql_tab['stammdaten_zusatz_vorgabe'],
                array(
                    $sql_tabs['stammdaten_zusatz_vorgabe']['zusatz_id'],
                    $sql_tabs['stammdaten_zusatz_vorgabe']['bezeichnung'],
                ),
                $sql_tabs['stammdaten_zusatz_vorgabe']['bezeichnung'].'='.
                $db->str($bezeichnung).' AND '.
                $sql_tabs['stammdaten_zusatz_vorgabe']['zusatz_id'].'='.
                $db->dbzahl($zusatzfeld_id)
            );
            if ($row = $db->zeile($res)) { # update
                $db->update(
                    $sql_tab['stammdaten_zusatz_vorgabe'],
                    array($sql_tabs['stammdaten_zusatz_vorgabe']['rang'] => $db->dbzahl($rang)),
                    $sql_tabs['stammdaten_zusatz_vorgabe']['bezeichnung'].'='.
                    $db->str($bezeichnung).' AND '.
                    $sql_tabs['stammdaten_zusatz_vorgabe']['zusatz_id'].'='.
                    $db->dbzahl($zusatzfeld_id)
                );
            } else { # insert
                $db->insert(
                    $sql_tab['stammdaten_zusatz_vorgabe'],
                    array(
                        $sql_tabs['stammdaten_zusatz_vorgabe']['zusatz_id'] => $db->dbzahl($zusatzfeld_id),
                        $sql_tabs['stammdaten_zusatz_vorgabe']['rang'] => $db->dbzahl($rang),
                        $sql_tabs['stammdaten_zusatz_vorgabe']['bezeichnung'] => $db->str($bezeichnung)
                    )
                );
            }
        }
    }
    
/**
 * The function adds to $inhalt value to the table crm_zusatzfelder, in the
 * relevant zf_X (calculated from $stdid and $bezeichnung)
 * @param int|array $stdid        stammdaten_id
 * @param string $bezeichnung  name of the zusatzfeld
 * @param mixed $inhalt     value to add
 * @param int $art
 */
    function fuegeZusatzfeldZuKunden($stdid, $bezeichnung, $inhalt, $art=0) {
        global $db, $sql_tab, $sql_tabs;

        if (!is_array($stdid)){
            $stdid = array($stdid);
        }
        if ($bezeichnung != '') {
            if (is_numeric($bezeichnung)) {
                $zus_id1 = $bezeichnung;
            } else {
                $zus_id1 = insertZusatzfunktionGetId($bezeichnung, $art);
            }
            $res4 = $db->select(
                $sql_tab['zusatzfelder'],
                $sql_tabs['zusatzfelder']['stammdaten_id'],
                $db->dbzahlin($stdid, $sql_tabs['zusatzfelder']['stammdaten_id'])
            );
            $momentan_im_db = array();
            while($row4 = $db->zeile($res4)) {
                $momentan_im_db[$row4['stammdaten_id']] = $row4['stammdaten_id'];
            }
            foreach($stdid as $id) {
                if (!isset($momentan_im_db[(string)$id])){
                    $db->insert(
                        $sql_tab['zusatzfelder'],
                        array(
                            'zf_'.$zus_id1 => $db->str($inhalt),
                            $sql_tabs['zusatzfelder']['stammdaten_id'] => $db->dbzahl($id)
                        )
                    );
                    unset($stdid[$id]);
                }
            }
            if (!empty($stdid)) {
                $db->update(
                    $sql_tab['zusatzfelder'],
                    array(
                        'zf_'.$zus_id1 => $db->str($inhalt)
                    ),
                    $db->dbzahlin($stdid, $sql_tabs['zusatzfelder']['stammdaten_id'])
                );
            }
        }
    }
	
	function cti_tellink($tel) {
        global $db, $sql_tab, $sql_tabs, $sql_meta, $tellinks, $cfg_sipgate;
        if ($_SESSION['catch_cti_aktiv']&&!$cfg_sipgate) {
            return $tel;
        }
        if (!isset($tellinks)) {
			$tellinks='';
			$res4=$db->select(
					$sql_tab['einstellungen'],
					$sql_tabs['einstellungen']['wert'],
					$sql_tabs['einstellungen']['modul'].'='.$db->str('TEL_Links')
			);
			if ($row4=$db->zeile($res4)) {
				$tellinks=$row4[0];
			}
			
			$res7=$db->select(
				$sql_tab['benutzer_gruppe'],
				array(
					$sql_tabs['benutzer_gruppe']['benutzer_gruppe_id'],
					$sql_tabs['benutzer_gruppe']['bezeichnung']
				),
				$sql_tabs['benutzer_gruppe']['bezeichnung'].' like '.$db->str('Phonelink tel')
			);
			if ($row7=$db->zeile($res7)) {
				if ($_SESSION['rechte_bgruppen']=='-1' or preg_match('/,'.$row7[0].',/', ','.$_SESSION['rechte_bgruppen'].',')) {
					$tellinks='1';
				}
			}
			$res7=$db->select(
				$sql_tab['benutzer_gruppe'],
				array(
					$sql_tabs['benutzer_gruppe']['benutzer_gruppe_id'],
					$sql_tabs['benutzer_gruppe']['bezeichnung']
				),
				$sql_tabs['benutzer_gruppe']['bezeichnung'].' like '.$db->str('Phonelink callto')
			);
			if ($row7=$db->zeile($res7)) {
				if ($_SESSION['rechte_bgruppen']=='-1' or preg_match('/,'.$row7[0].',/', ','.$_SESSION['rechte_bgruppen'].',')) {
					$tellinks='2';
				}
			}
			
		}
		
		
		$teltemp1=str_replace('+49', '', $tel);
							if (substr($teltemp1, 0, 3)=='49 ') {
								$teltemp1=substr($teltemp1, 3);
							}
							if (substr($teltemp1, 0, 4)==' 49 ') {
								$teltemp1=substr($teltemp1, 4);
							}
							$teltemp1=trim(str_replace(array('+', '/', ' ', '.', '-', '(', ')'), '', $teltemp1));
							if (substr($teltemp1, 0, 1)!='0' and strlen($teltemp1)>8) {
								$teltemp1='0'.$teltemp1;
							}
		if ($tellinks=='1') {
			$tel='<a href="tel:'.$teltemp1.'">'.$tel.'</a>';
		}
		if ($tellinks=='2') {
			$tel='<a href="callto:'.$teltemp1.'">'.$tel.'</a>';
		}
		return $tel;
	}
    function getSecurityWort($wort) {
        $pruefwert = base_convert(bin2hex(base64_decode($wort)), 16, 2);
        $quersumme = 0;
        for ($index1 = 0; $index1 < strlen($pruefwert); $index1++) {
            $quersumme += $pruefwert[$index1];
        }
        return $quersumme;
    }
	
	function ausschluss_stdlao_akv() {
		global $db, $sql_tab, $sql_tabs, $sql_meta;
		$alle_ausschl='';
		$alle_laomands=array();
		$res=$db->select(
			$sql_tab['mandant'],
			array(
				$sql_tabs['mandant']['mandant_id'],
				$sql_tabs['mandant']['parent_id']
			)
		);
		while ($row=$db->zeile($res)) {
			if (intval($row[1])>0) {
				$alle_laomands[$row[0]]=$row[1];
			}
		}
		$ist_verkauf=false;
		$alle_verkauf='';
		$alle_verkauf2=array();
		$standard_lao=0;
		$standard_mand=0;
		$res=$db->select(
			$sql_tab['benutzer_gruppe'],
			$sql_tabs['benutzer_gruppe']['benutzer_gruppe_id'],
			$sql_tabs['benutzer_gruppe']['bezeichnung'].'='.$db->str('Verkauf').' or '.$sql_tabs['benutzer_gruppe']['bezeichnung'].'='.$db->str(_VERKAUF_)
		);
		while ($row=$db->zeile($res)) {
			$res2=$db->select(
				$sql_tab['benutzer_gruppe_zuordnung'],
				$sql_tabs['benutzer_gruppe_zuordnung']['benutzer_id'],
				$sql_tabs['benutzer_gruppe_zuordnung']['gruppe_id'].'='.$db->dbzahl($row[0])
			);
			while ($row2=$db->zeile($res2)) {
				if ($row2[0]==$_SESSION['user_id']) {
					$ist_verkauf=true;
				}
				$alle_verkauf.=$row2[0].',';
			}
			if ($alle_verkauf!='') {
				$res3=$db->select(
					$sql_tab['benutzer'],
					array(
						$sql_tabs['benutzer']['standard_lagerort'],
						$sql_tabs['benutzer']['benutzer_id']
					),
					$sql_tabs['benutzer']['benutzer_id'].' in ('.substr($alle_verkauf, 0, -1).')'
				);
				while ($row3=$db->zeile($res3)) {
					if ($row3[1]==$_SESSION['user_id']) {
						$standard_lao=intval($row3[0]);
						$standard_mand=$alle_laomands[$row3[0]];
					}
					if (isset($alle_laomands[$row3[0]])) {
						$alle_verkauf2[$alle_laomands[$row3[0]]].=$row3[1].',';
					}
				}
			}
		}
		if (intval($standard_mand)>0) {
			if (isset($alle_verkauf2[$standard_mand])) {
				$alle_ausschl='';
				while (list($key, $val)=@each($alle_verkauf2)) {
					if ($key!=$standard_mand) {
						$alle_ausschl.=$val;
					}
				}
				if ($alle_ausschl!='') {
					$alle_ausschl=substr($alle_ausschl, 0, -1);
				}
			}
		}
		return $alle_ausschl;
	}
    function lead_benachrichtigung_an_gruppe($gruppe = '', $alle_leads_zu_mandant = array()) {
        global $db, $sql_tab, $sql_tabs, $prefix, $stammdaten_korrespondenz_ea, $cfg_ordner_kdokumente, $l_aid2, $kamp_id, $mcs_mailer, $mcs_auth, $mcs_host, $mcs_user, $mcs_password, $bcc_limit, $mcs_pop3_host, $mcs_pop3_user, $mcs_pop3_password, $mcs_pop3_email, $ltext, $cclf_aid, $cclf_pid, $sql_tab_ids, $sql_meta, $lang, $sql_tab_ids, $brief_sofort, $sql_feld_geldbetrag, $lang_db_f, $cfg_carlo_appserver_cog_blacklist3, $cfg_carlo_appserver_cog_blacklist3neu, $ADODB_FETCH_MODE, $mail, $capps_keinek, $dsinfo_daten, $cfg_sms, $cfg_sms_benutzer, $cfg_sms_passwort, $cfg_sms_absender, $check_smswerte, $cfg_autoupdate_proxy, $cfg_autoupdate_proxy_user, $cfg_autoupdate_proxy_password, $cfg_ws_avag_kroatien, $cfg_ws_avag_kroatien_url, $em_vorl_id, $sc_crm_hostpfad, $merke_bm_ids, $mail_benid, $apid, $kontakt_typ_db, $kontakt_typ, $merke_bm_ids2, $kontakt_typ_db, $kontakt_typ, $cfg_bm_zielzeit, $alle_ben_feiertage, $cfg_feiertage_nation, $postfeld, $ansp_id, $bmid, $cfg_beschwerde_statusfeld2, $cfg_sms_auscarlofeld, $cfg_korrespondenz_bcc_unsichtbar, $qrcode, $cfg_db_utf8, $temp_sms_kundenid, $temp_sms_benutzerid, $ch, $ist_makrostart, $mitsmsantwort, $smsjobid, $cfg_serienbrief_nichtsplitten, $mandinfo, $cfg_cc_survey, $ws_url_psurv, $cfg_autoupdate_proxy, $cfg_autoupdate_proxy_user, $cfg_autoupdate_proxy_password, $user1, $pass1, $cfg_provenexpert, $cfg_zentrales_emailfeld;
		global $cfg_smtp_alternative, $cfg_kfz_zf;
		global $filterfelder_makros, $plugin_list, $cfg_bm;
		global $alle_wf_frids, $gdpr;
		global $abw_ben_id;
        
        if ($gruppe != '' && is_array($alle_leads_zu_mandant) && !empty($alle_leads_zu_mandant)) {
            global $sql_tab, $sql_tabs, $db, $mcs_pop3_email, $cfg_leadengine_benachrichtigung, $cfg_basedir;
            
            $result_benutzer_leads = $db->select(
                array(
                    $sql_tab['benutzer'],
                    $sql_tab['benutzer_gruppe'],
                    $sql_tab['benutzer_gruppe_zuordnung'],
                    $sql_tab['mandant']
                ),
                array(
                    $sql_tabs['benutzer']['email'],
                    $sql_tabs['benutzer']['standard_lagerort'],
                    $sql_tabs['mandant']['bezeichnung']
                ),
                $sql_tabs['benutzer']['benutzer_id'].'='.$sql_tabs['benutzer_gruppe_zuordnung']['benutzer_id'].' and '.
                $sql_tabs['benutzer_gruppe']['benutzer_gruppe_id'].'='.$sql_tabs['benutzer_gruppe_zuordnung']['gruppe_id'].' and '.
                $sql_tabs['benutzer_gruppe']['bezeichnung'].'='.$db->str($gruppe).' and '.
                $db->dbzahlin(array_keys($alle_leads_zu_mandant), $sql_tabs['benutzer']['standard_lagerort']).' and '.
                $sql_tabs['mandant']['mandant_id'].'='.$sql_tabs['benutzer']['standard_lagerort']
            );
            $alle_benutzer_leads=array();
            $alle_mandant_bezeichnung=array();
            while ($row_benutzer_leads = $db->zeile($result_benutzer_leads)) {
                if (trim($row_benutzer_leads[0]) != '') {
                    $alle_benutzer_leads[$row_benutzer_leads[1]][] = $row_benutzer_leads[0];
                }
                $alle_mandant_bezeichnung[$row_benutzer_leads[1]] = $row_benutzer_leads[2];
            }

            if (!empty($alle_benutzer_leads)) {
                foreach ($alle_leads_zu_mandant as $mand => $lead_value) {
                    if (!empty($alle_benutzer_leads[$mand]) && !empty($lead_value)) {
                        $emails = $alle_benutzer_leads[$mand];
                        $text = '';
                        $link_text = '';
                        foreach ($lead_value as $value) {
                            if ($value['kamp_lead_id']>0) {
                                $link_text = get_remote_addr_for_mail_p4n().'/leadzuordnung_gm.php?leadid=l'.base64_encode(rand(111,999).$value['kamp_lead_id'].rand(111,999));
                                $text .= '<br><br>'._NEUE_LEADS_.': '.$value['boerse'];//.' - '.link2($link_text, $link_text);
                            }
                        }
                        $t_abs1=$mcs_pop3_email;
                        $result_einstellungen = $db->select(
                            $sql_tab['einstellungen'],
                            $sql_tabs['einstellungen']['wert'],
                            $sql_tabs['einstellungen']['modul'].'='.$db->str('mailbeileadeingang')
                        );
                        if ($row_einstellungen = $db->zeile($result_einstellungen)) {
                            if (intval($row_einstellungen[0]) > 0) {
                                $t_abs1 = intval($row_einstellungen[0]);
                            }
                        }
                        if (!function_exists('mailSendP4n')) {
                            require_once($cfg_basedir.'inc/mailabruf.php');
                        }
                        mailSendP4n($emails, $t_abs1, 'CATCH', array(), array(), _NEUE_LEADS_.': '.$alle_mandant_bezeichnung[$mand], $text, array(), 0, true);
                    }
                }
            }
        }
    }
    
    function get_remote_addr_for_mail_p4n() {
        $url = 'http://';
        if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
            $url = 'https://';
        }
        $url .= $_SERVER['HTTP_HOST'];
        if (intval($_SERVER['SERVER_PORT']) > 0 && intval($_SERVER['SERVER_PORT']) != 80 and substr($url, -strlen($_SERVER['SERVER_PORT']))!=$_SERVER['SERVER_PORT']) {
            $url .= ':'.intval($_SERVER['SERVER_PORT']);
        }
        $url .= dirname($_SERVER['PHP_SELF']);
        if ($url=='http://.') {
            $url='http://crm/crm';
        }
        return $url;
    }
	
	function tab_letztekunden($anz=10, $uid=0, $array=false) {
		global $db, $sql_tab, $sql_tabs, $sql_meta, $prefix;
		
		if ($uid==0) {
			$uid=$_SESSION['user_id'];
		}
		
		$res=$db->select(
			$sql_tab['stammdaten_letzten'],
			array(
				$sql_tabs['stammdaten_letzten']['stammdaten_id'],
				$sql_tabs['stammdaten_letzten']['datum']
			),
			$sql_tabs['stammdaten_letzten']['benutzer_id'].'='.$db->dbzahl($uid),
			$sql_tabs['stammdaten_letzten']['datum'].' desc'
		);
		$i=0;
        if (!$array) {
            $tab='<table class="table-ignore2 moderntable table-margin-bottom">';
            if ($db->anzahl($res)==0) {
                $tab.='<tr class="even"><td class="td" colspan=2>-</td></tr>';
            } else {
                $tab.='<tr><th class="th" colspan=2>'._TERMIN_T_RHYT5_.' '.(($db->anzahl($res)<$anz)?$db->anzahl($res):$anz).' '._KUNDEN_.'</th></tr>';
            }
        } else {
            $tab=array();
        }
		while ($i<$anz and $row=$db->zeile($res)) {
            if (!$array) {
                $tab.='<tr class="'.($i%2?'even':'odd').'"><td class="td">'.$db->unixdatetime($row[1]).'</td><td class="td">'.linkToTab(kundenbezeichnung($row[0]).' ('.$row[0].')', 'stammdaten_main.php?id='.$row[0].'&nav=Uebersicht', '', '', '', 1).'</td></tr>';
            } else {
                $tab[]=array($db->unixdatetime($row[1]),linkToTab(kundenbezeichnung($row[0]).' ('.$row[0].')', 'stammdaten_main.php?id='.$row[0].'&nav=Uebersicht', '', '', '', 1), 'stammdaten_main.php?id='.$row[0].'&nav=Uebersicht');
            }
			$i++;
		}
        if (!$array) {
            $tab.='</table>';
        }
		return $tab;
	}
	function prod_zf_tabsmeta() {
		global $db, $sql_tab, $sql_tabs, $sql_meta, $prefix, $lang_db_f, $sql_tab_ids, $cfg_cross_sbolink_allebetriebe_zf, $cfg_cross_sbolink_allebetriebe_zf2;
		
		$zugelassen=array();
		$res=$db->select(
			$sql_tab['produktzuordnung_zusatzfelder'],
			array(
				$sql_tabs['produktzuordnung_zusatzfelder']['produktzuordnung_zusatzfelder_id'],
				$sql_tabs['produktzuordnung_zusatzfelder']['bezeichnung'],
				$sql_tabs['produktzuordnung_zusatzfelder']['art']
			),
			'',
			$sql_tabs['produktzuordnung_zusatzfelder']['rang']
		);
		while ($row=$db->zeile($res)) {
			$row[1]=p4n_mb_string('str_replace', '.','',$row[1]);
			
			$zugelassen['zf_'.$row[0]]='zf_'.$row[0];
			
			$lang_db_f['produktzuordnung']['zf_'.$row[0]]=$row[1];
			$sql_tabs['produktzuordnung']['zf_'.$row[0]]=$sql_tab['produktzuordnung'].'.zf_'.$row[0];
			
			if ($row[2]=='1') {
				$sql_meta['produktzuordnung']['zf_'.$row[0]]=array('D');
			} elseif ($row[2]=='2') {
				$sql_meta['produktzuordnung']['zf_'.$row[0]]=array('F');
			} elseif ($row[2]=='4') {
				$sql_meta['produktzuordnung']['zf_'.$row[0]]=array('X');
			} elseif ($row[2]=='6') {
				$sql_meta['produktzuordnung']['zf_'.$row[0]]=array('T');
			} else {
				$sql_meta['produktzuordnung']['zf_'.$row[0]]=array('C');
			}
			if ($row[2]=='7') {
				$sql_tab_ids[$sql_tabs['produktzuordnung']['zf_'.$row[0]]]=$sql_tabs['benutzer']['benutzer_id'];
			}
		}
		
		if ($cfg_cross_sbolink_allebetriebe_zf) {
			$zugte=array();
			$fe1=$db->MetaColumns($sql_tab['produktzuordnung_weitere']);
			while (list($key, $val)=@each($fe1)) {
				$name1=strval($val->name);
				if (substr($name1, 0, 3)=='sbo') {
					$zugte[]=$name1;
					$lang_db_f['produktzuordnung_weitere'][$name1]=$name1;
					$sql_tabs['produktzuordnung_weitere'][$name1]=$prefix.'produktzuordnung_weitere.'.$name1;
					$sql_meta['produktzuordnung_weitere'][$name1]=array('X');
				}
			}
			if (count($zugte)>0) {
				$lang_db_f['produktzuordnung_weitere'][''] = 'SBO';
			}
		}
		if ($cfg_cross_sbolink_allebetriebe_zf2) {
			$zugte=array();
			$fe1=$db->MetaColumns($sql_tab['produktzuordnung_weitere2']);
			while (list($key, $val)=@each($fe1)) {
				$name1=strval($val->name);
				if (substr($name1, 0, 3)=='sbo') {
					$zugte[]=$name1;
					$lang_db_f['produktzuordnung_weitere2'][$name1]=$name1;
					$sql_tabs['produktzuordnung_weitere2'][$name1]=$prefix.'produktzuordnung_weitere2.'.$name1;
					$sql_meta['produktzuordnung_weitere2'][$name1]=array('X');
				}
			}
			if (count($zugte)>0) {
				$lang_db_f['produktzuordnung_weitere2'][''] = 'SBOR';
			}
		}
		
		return $zugelassen;
	}
	
if (file_exists('inc/Rights/MenuPoint.php') && !is_null($db)) {
    $file = basename($_SERVER['PHP_SELF']);
    if ($file=='stammdaten_main.php') {
        if (isset($_GET['nav'])) {
            $file.='?nav='.$_GET['nav'];
        } elseif (isset($_SESSION['karte'])) {
            $file.='?nav='.$_SESSION['karte'];
        }
    }
    $menuRights = new Rights_MenuPoint($file);
}
function getWorkflowActions($art = 0) {
    global $plugin_list, $cfg_bm, $lang, $cfg_telegram;
    
    $wf_arten=array(
        1=>_WF_KORR_,
        2=>_WF_BRIEF_,
        3=>_WF_TERMIN_,
        4=>_WF_TT1_,
        5=>_WF_TT2_,
        6=>_WF_VER_,
        7=>_WF_OM_,
        8=>_WF_EMAIL1_,
        9=>_WF_EMAIL2_,
        10=>_WF_EMAIL3_,	// 10
        11=>_WF_EMAIL4_,
        12=>_WF_EMAIL5_,
        13=>_WF_WVL1_,
        14=>_WF_WVL2_,
        15=>_WF_WVL3_,
        16=>_WF_BL1_,
        17=>_WF_BL2_,
        18=>_WF_FELDUPDATE_,
        19=>_WF_TLFINSERT_,
        20=>_WF_TLFINSERT2_,	// 20
        21=>_FILTERINHALT_EXPORT_,
        22=>_LEAD_.' '._ERSTELLEN_,
        23=>_WF_SMS_,
        24=>_WF_FELDUPDATE_FILTER_,
        25=>_BESCHWERDE_.' '._EMAIL_.' '._BEARBEITER_.' ('._FILTER_.')',	// 25
        26=>_BESCHWERDE_.' '._WF_EMAIL3_.' ('._FILTER_.')',	// Benutzer
        27=>_BESCHWERDE_.' '._WF_EMAIL5_.' ('._FILTER_.')',	// Benutzergruppe
        28=>_BESCHWERDE_.' '._WF_EMAIL1_.' ('._FILTER_.')'	// an freie Email
    );
    if (is_array($plugin_list) && in_array('Plugin_Benz_ComExtension', $plugin_list)) {
        $wf_arten[29] = 'Throw new event';
    }
    $wf_arten[30]=_WF_EMAIL6_;
    $wf_arten[31]=_KARTEI_STAMMDATEN_.' '._GRUPPE_;
    $wf_arten[32]=_KARTEI_STAMMDATEN_.' '._GRUPPE_.' '._ENTFERNEN_;
    if ($_SESSION['crm_version']>61 || $_SESSION['cfg_kunde'] == 'crm_vw_automuelleronline') {
        $wf_arten[33]='URL Request';
    }
	if (isset($lang['_WF_EMAIL7_'])) {
		$wf_arten[34]=_WF_EMAIL7_;
	}
    if ($_SESSION['crm_version']>61 && !$cfg_bm) {
        unset($wf_arten[4]);
        unset($wf_arten[5]);
        unset($wf_arten[25]);
        unset($wf_arten[26]);
        unset($wf_arten[27]);
        unset($wf_arten[28]);
    }
    if ($_SESSION['crm_version']>63) {
        $wf_arten[35]=_EMAIL_.' CC '._VERBLEIBEND_;
        if ($cfg_telegram) {
            $wf_arten[36]=_TELEGRAM_AN_BETRUER_;
            $wf_arten[37]=_TELEGRAM_AN_BENUTZER_;
        }
    }
    if ($_SESSION['crm_version']>65) {
        $wf_arten[38]=_LOESCH_MARKIERUNG_;
    }
	$wf_arten[39]=_WF_KORR2_;
    asort($wf_arten);
    if ($art > 0) {
        return $wf_arten[$art];
    }
    return $wf_arten;
}

class SessionP4N {
    public static function unserialize($session_data) {
        $method = ini_get("session.serialize_handler");
        switch ($method) {
            case "php":
                return self::unserialize_php($session_data);
            case "php_binary":
                return self::unserialize_phpbinary($session_data);
            default:
                return array();
        }
    }

    private static function unserialize_php($session_data) {
        $return_data = array();
        $offset = 0;
        while ($offset < strlen($session_data)) {
            if (!strstr(substr($session_data, $offset), "|")) {
                throw new Exception("invalid data, remaining: " . substr($session_data, $offset));
            }
            $pos = strpos($session_data, "|", $offset);
            $num = $pos - $offset;
            $varname = substr($session_data, $offset, $num);
            $offset += $num + 1;
            $data = unserialize(substr($session_data, $offset));
            $return_data[$varname] = $data;
            $offset += strlen(serialize($data));
        }
        return $return_data;
    }

    private static function unserialize_phpbinary($session_data) {
        $return_data = array();
        $offset = 0;
        while ($offset < strlen($session_data)) {
            $num = ord($session_data[$offset]);
            $offset += 1;
            $varname = substr($session_data, $offset, $num);
            $offset += $num;
            $data = unserialize(substr($session_data, $offset));
            $return_data[$varname] = $data;
            $offset += strlen(serialize($data));
        }
        return $return_data;
    }
}
function telefon_variationen($telefonnr = '') {
    global $cfg_countrycode, $cfg_citycode, $cfg_cti_nr_vorwahl;
    
    $v = array();
    if ($telefonnr != '' && p4n_mb_string('strlen', $telefonnr)>3) {
        $v[trim($telefonnr)]=1;
        $telefonnr_ohne_etwas = p4n_mb_string('str_replace', array('+',' ','.','-','(',')','/'), '', trim($telefonnr));
        if ($cfg_countrycode!='') {
            if (substr($telefonnr, 1, 2)==str_replace(array('+', '00'), '', $cfg_countrycode)) {
                $telefonnr=trim(substr($telefonnr, 3));
            }
        }
        $country_code = str_replace(array('+', '00'), 'prefix', $cfg_countrycode);
        if (p4n_mb_string('substr',trim($telefonnr), 0, 1)=='0') {
            $telefonnr=p4n_mb_string('substr',trim($telefonnr), 1);
        }
        $suchwort_temp = p4n_mb_string('str_replace', array('+',' ','.','-','(',')','/'), '', trim($telefonnr));
        $v[$suchwort_temp]=1;
        $v['0'.$suchwort_temp]=1;
        if ($country_code!='') {
            $v[p4n_mb_string('str_replace', 'prefix', '+', trim($country_code)).$suchwort_temp]=1;
            $v[p4n_mb_string('str_replace', 'prefix', '00', trim($country_code)).$suchwort_temp]=1;
        }
        $v[$cfg_citycode.$suchwort_temp]=1;
        $v['0'.$cfg_citycode.$suchwort_temp]=1;
        if ($country_code!='') {
            $v[p4n_mb_string('str_replace', 'prefix', '+', trim($country_code)).$cfg_citycode.$suchwort_temp]=1;
            $v[p4n_mb_string('str_replace', 'prefix', '00', trim($country_code)).$cfg_citycode.$suchwort_temp]=1;
        }
        if (substr($suchwort_temp, 0, strlen($cfg_countrycode)) == $cfg_countrycode) {
            $suchwort_temp = substr($suchwort_temp, strlen($cfg_countrycode));
        }
        if (substr($suchwort_temp, 0, strlen($cfg_citycode)) == $cfg_citycode) {
            $suchwort_temp = substr($suchwort_temp, strlen($cfg_citycode));
        }
        $v[$suchwort_temp]=1;
        $v['0'.$suchwort_temp]=1;
        if ($country_code!='') {
            $v[p4n_mb_string('str_replace', 'prefix', '+', trim($country_code)).$suchwort_temp]=1;
            $v[p4n_mb_string('str_replace', 'prefix', '00', trim($country_code)).$suchwort_temp]=1;
        }
        $v[$cfg_citycode.$suchwort_temp]=1;
        $v['0'.$cfg_citycode.$suchwort_temp]=1;
        if ($country_code!='') {
            $v[p4n_mb_string('str_replace', 'prefix', '+', trim($country_code)).$cfg_citycode.$suchwort_temp]=1;
            $v[p4n_mb_string('str_replace', 'prefix', '00', trim($country_code)).$cfg_citycode.$suchwort_temp]=1;
        }
        if (isset($cfg_cti_nr_vorwahl)) {
            if (p4n_mb_string('substr',$cfg_cti_nr_vorwahl, 0, 1)=='0') {
                $cfg_cti_nr_vorwahl=p4n_mb_string('substr',$cfg_cti_nr_vorwahl, 1);
            }
            if (p4n_mb_string('substr',$telefonnr_ohne_etwas, 0, p4n_mb_string('strlen',$cfg_cti_nr_vorwahl))===$cfg_cti_nr_vorwahl) {
                $v[p4n_mb_string('substr',$telefonnr_ohne_etwas, p4n_mb_string('strlen',$cfg_cti_nr_vorwahl))]=1;
            }
            if (p4n_mb_string('substr',$telefonnr_ohne_etwas, 0, p4n_mb_string('strlen',$cfg_cti_nr_vorwahl))===strval('0'.$cfg_cti_nr_vorwahl)) {
                $v[p4n_mb_string('substr',$telefonnr_ohne_etwas, p4n_mb_string('strlen',$cfg_cti_nr_vorwahl)+1)]=1;
            }
            if ($cfg_cti_nr_vorwahl!='') {
                $v['0'.$cfg_cti_nr_vorwahl.$telefonnr_ohne_etwas]=1;
                $v[$cfg_cti_nr_vorwahl.$telefonnr_ohne_etwas]=1;
            }
        }
    }
    foreach ($v as $key => $value) {
        if (trim($key)=='') {
            unset($v[$key]);
        }
    }
    return array_keys($v);
}
function cutforsql_j($t) {
    $t=p4n_mb_string('str_replace', array('ä', 'ö', 'ü', 'Ä', 'Ö', 'Ü', 'ß'), array('ae', 'oe', 'ue', 'Ae', 'Oe', 'Ue', 'ss'), $t);
    $e='';
    for ($i=0; $i<p4n_mb_string('strlen',$t); $i++) {
        $c=ord($t[$i]);
        if (($c>=65 and $c<=90) or ($c>=97 and $c<=122) or ($c>=48 and $c<=57)) {
            $e.=$t[$i];
        }
    }
    return $e;
}
function bef_format_kfzs_p4n($t) {
    $t=trim(str_replace(array('(G)', '(P)', '('._KONTAKT_PRIVAT_ABK_.')', '('._KONTAKT_GESCHAEFTLICH_ABK_.')'), '', $t));
    $t=str_replace(array('ä', 'ö', 'ü', 'ß', 'Ä', 'Ö', 'Ü'), array('ae', 'oe', 'ue', 'ss', 'Ae', 'Oe', 'Ue'), $t);
    $t=p4n_mb_string('strtolower',preg_replace('/[^A-Za-z0-9_]/U', '', $t));
    return $t;
}
function ex_insert_filter($daten, $nurname=false, $neuanlegen=false) {
    global $sql_tab, $sql_tabs, $db, $prefix, $sql_meta, $cfg_filter_keinehilfstabelle, $fl_id;

    // HF:
    $hf_altneu=array();
    if (isset($daten[5])) {
        $xpl1=explode('///', $daten[5]);
        while (list($key1, $val1)=@each($xpl1)) {
            $xpl2=explode('######', base64_decode($val1));

    $res=$db->select(
                $sql_tab['filter_hilfe'],
                array(
                    $sql_tabs['filter_hilfe']['filter_hilfe_id'],
                    $sql_tabs['filter_hilfe']['name'],
                    $sql_tabs['filter_hilfe']['sqlwert'],
                    $sql_tabs['filter_hilfe']['beschreibung'],
                    $sql_tabs['filter_hilfe']['kategorie']
                ),
                $sql_tabs['filter_hilfe']['name'].'='.$db->str($xpl2[1])
            );
            if ($db->anzahl($res)==0) {
                $db->insert(
                    $sql_tab['filter_hilfe'],
                    array(
                        $sql_tabs['filter_hilfe']['name'] => $db->str($xpl2[1]),
                        $sql_tabs['filter_hilfe']['sqlwert'] => $db->str($xpl2[2]),
                        $sql_tabs['filter_hilfe']['beschreibung'] => $db->str($xpl2[3]),
                        $sql_tabs['filter_hilfe']['kategorie'] => $db->str($xpl2[4]),
                        $sql_tabs['filter_hilfe']['join_felder'] => $db->str($xpl2[5]),
                        $sql_tabs['filter_hilfe']['datum'] => $db->dbtimestamp(time()),
                        $sql_tabs['filter_hilfe']['user_id'] => $db->dbzahl($_SESSION['user_id'])
                    )
                );
                $hf_altneu[$xpl2[0]]=$db->insertid();
            } else {
                $row=$db->zeile($res);
                if ($row[2]==$xpl2[2]) {
                    $hf_altneu[$xpl2[0]]=$row[0];
                } else {
                    $db->insert(
                        $sql_tab['filter_hilfe'],
                        array(
                            $sql_tabs['filter_hilfe']['name'] => $db->str($xpl2[1].' (Kopie)'),
                            $sql_tabs['filter_hilfe']['sqlwert'] => $db->str($xpl2[2]),
                            $sql_tabs['filter_hilfe']['beschreibung'] => $db->str($xpl2[3]),
                            $sql_tabs['filter_hilfe']['kategorie'] => $db->str($xpl2[4]),
                            $sql_tabs['filter_hilfe']['join_felder'] => $db->str($xpl2[5]),
                            $sql_tabs['filter_hilfe']['datum'] => $db->dbtimestamp(time()),
                            $sql_tabs['filter_hilfe']['user_id'] => $db->dbzahl($_SESSION['user_id'])
                        )
                    );
                    $hf_altneu[$xpl2[0]]=$db->insertid();
                }
            }
        }
    }
    $filter_name = base64_decode($daten[1]);
    if ($neuanlegen) {
        $such_string = $filter_name;
        $weiter_suchen=true;
        $index = 1;
        while ($weiter_suchen) {
            $result_filter = $db->select(
                $sql_tab['filter'],
                $sql_tabs['filter']['filter_id'],
                $sql_tabs['filter']['name'].'='.$db->str($such_string)
            );
            if ($row_filter = $db->zeile($result_filter)) {
                $such_string=$filter_name.' '.$index;
                $index++;
            } else {
                $weiter_suchen=false;
                $filter_name=$such_string;
            }
        }
    }
    $res=$db->select(
        $sql_tab['filter'],
        array(
            $sql_tabs['filter']['name'],
            $sql_tabs['filter']['sql'],
            $sql_tabs['filter']['beschreibung'],
            $sql_tabs['filter']['kategorie']
        ),
        $sql_tabs['filter']['name'].'='.$db->str($filter_name)
    );
    if ($db->anzahl($res)==0) {

        $sql=base64_decode($daten[2]);
        if (preg_match_all('/___HF(\d+)___/', $sql, $ma)) {
            while (list($key1, $val1)=@each($ma[1])) {
                if (isset($hf_altneu[$val1])) {
                    $sql=str_replace('___HF'.$val1.'___', '___HF'.$hf_altneu[$val1].'___', $sql);
                }
            }
        }
        $kat_sql=base64_decode($daten[4]);

        $db->insert(
            $sql_tab['filter'],
                array(
                    $sql_tabs['filter']['name']=>$db->str($filter_name),
                    $sql_tabs['filter']['sql']=>$db->str($sql),
                    $sql_tabs['filter']['beschreibung']=>$db->str(base64_decode($daten[3])),
                    $sql_tabs['filter']['kategorie'] => $db->str($kat_sql),
                    $sql_tabs['filter']['datum'] => $db->dbtimestamp(time()),
                    $sql_tabs['filter']['user_id'] => $db->dbzahl($_SESSION['user_id']),
                    $sql_tabs['filter']['aktivitaeten'] => $db->str(''),
                    $sql_tabs['filter']['gruppen'] => $db->str(''),
                    $sql_tabs['filter']['ausschluss'] => $db->str('')
                )
        );
        $tabn='filter_'.$db->insertid();
        $fl_id=$db->insertid();

        $res=$db->select(
            $sql_tab['benutzer_rechte_filter'],
            $sql_tabs['benutzer_rechte_filter']['filter_kategorie'],
            $sql_tabs['benutzer_rechte_filter']['filter_kategorie'].'='.$db->str($kat_sql)
                .' and '.$sql_tabs['benutzer_rechte_filter']['benutzer_id'].'='.$db->dbzahl($_SESSION['user_id'])
        );
        if ($db->anzahl($res)==0) {
        $db->insert(
            $sql_tab['benutzer_rechte_filter'],
            array(
                $sql_tabs['benutzer_rechte_filter']['filter_kategorie'] => $db->str($kat_sql),
                $sql_tabs['benutzer_rechte_filter']['benutzer_id'] => $db->dbzahl($_SESSION['user_id'])
            )
        );
        }

        if ($cfg_filter_keinehilfstabelle) {

        } else {

        $fsql_tab[$tabn]=$prefix.$tabn;
        $fsql_tabs[$tabn]['id']=$tabn.'.stammdaten_id';
        $fsql_tabs[$tabn]['vorname']=$tabn.'.vorname';
        $fsql_tabs[$tabn]['name']=$tabn.'.name';
        $fsql_tabs[$tabn]['firma1']=$tabn.'.firma1';
        $fsql_tabs[$tabn]['mandant_id']=$tabn.'.mandant_id';
        $fsql_meta[$tabn]['id']=array('I','AUTO','KEY');
        $fsql_meta[$tabn]['vorname']=array('C');
        $fsql_meta[$tabn]['name']=array('C');
        $fsql_meta[$tabn]['firma1']=array('C');
        $fsql_meta[$tabn]['mandant_id']=array('I');

        $alletabs1=$db->MetaTables();

        $f_upd=false;
        if ($f_upd) {
            if (@in_array($prefix.$tabn, $alletabs1)) {
                $res2=$db->select2('DELETE FROM '.$prefix.$tabn);
            } else {
                $sqltext=createsql($fsql_tab, $fsql_tabs, $fsql_meta);
                $db->select2($sqltext);
                if ($db->treiber!='postgres' and $db->treiber!='mssql') {
                    $db->select2('ALTER TABLE '.$prefix.$tabn.' ADD INDEX (stammdaten_id)');
                    $db->select2('ALTER TABLE '.$prefix.$tabn.' ADD INDEX (vorname)');
                    $db->select2('ALTER TABLE '.$prefix.$tabn.' ADD INDEX (name)');
                    $db->select2('ALTER TABLE '.$prefix.$tabn.' ADD INDEX (firma1)');
                    $db->select2('ALTER TABLE '.$prefix.$tabn.' ADD INDEX (mandant_id)');
                }
            }
        } else {
            if (@in_array($prefix.$tabn, $alletabs1)) {
                $res2=$db->select2('DROP TABLE '.$prefix.$tabn);
            }
            $sqltext=createsql($fsql_tab, $fsql_tabs, $fsql_meta);
            $db->select2($sqltext);
            if ($db->treiber!='postgres' and $db->treiber!='mssql') {
                $db->select2('ALTER TABLE '.$prefix.$tabn.' ADD INDEX (stammdaten_id)');
                $db->select2('ALTER TABLE '.$prefix.$tabn.' ADD INDEX (vorname)');
                $db->select2('ALTER TABLE '.$prefix.$tabn.' ADD INDEX (name)');
                $db->select2('ALTER TABLE '.$prefix.$tabn.' ADD INDEX (firma1)');
                $db->select2('ALTER TABLE '.$prefix.$tabn.' ADD INDEX (mandant_id)');
            }
        }
        $select_sql=strstr($sql, 'from');
        $x='';
        if ($orderby_f!='') {
            $x.=','.$orderby_f.' ';
        }
        if ($db->treiber=='postgres') {
            $select_sql=preg_replace("/order by (.*)/i", '', $select_sql);
            $x=preg_replace("/order by (.*)/i", '', $x);
        }
        $res=$db->select2('SELECT distinct '.$sql_tabs['stammdaten']['id'].', '.$sql_tabs['stammdaten']['vorname'].', '.$sql_tabs['stammdaten']['name'].', '.$sql_tabs['stammdaten']['firma1'].', '.$sql_tabs['stammdaten']['mandant'].' '.$x.$select_sql);
        while ($row=$db->zeile($res)) {
                $res2=$db->select2('INSERT INTO '.$prefix.$tabn.' (stammdaten_id, vorname, name, firma1, mandant_id) values ('.$row[0].', '.$db->str($row[1]).', '.$db->str($row[2]).', '.$db->str($row[3]).', '.$db->dbzahl($row[4]).')');
                if (!$res2)
                    die('<b>'._FILTERERSTELLUNG_FEHLER_.'</b>');
        }

        }	// Ende $cfg_filter_keinehilfstabelle

        if ($nurname) {
            return $filter_name;
        }
        return $filter_name.' '._DOWNLOADED_;
    } else {
        if ($nurname) {
            return $filter_name;
        }
        return $filter_name.' '._EXISTIERT_BEREITS_;
    }
}

function newsletter_optout_encrypt_info($stammdaten_id = 0, $ansprechpartner_id = 0) {
    global $db, $sql_tab, $sql_tabs;
    
    $returnarray = array('topics' => array(), 'customer' => array('salutation' => '', 'firstname' => '', 'surname' => ''));
    $result_nl_gdpr = $db->select(
        $sql_tab['newsletter_gdpr'],
        'distinct '.$sql_tabs['newsletter_gdpr']['thema']
    );
    while ($row_nl_gdpr = $db->zeile($result_nl_gdpr)) {
        $returnarray['topics'][$row_nl_gdpr[0]]=1;
    }
    
    if ($stammdaten_id > 0) {
        $result_nl_gdpr = $db->select(
            $sql_tab['newsletter_gdpr'],
            array(
                $sql_tabs['newsletter_gdpr']['thema'],
                $sql_tabs['newsletter_gdpr']['status']
            ),
            $sql_tabs['newsletter_gdpr']['stammdaten_id'].'='.$db->dbzahl($stammdaten_id).' and '.
            $sql_tabs['newsletter_gdpr']['ansprechpartner_id'].'='.$db->dbzahl($ansprechpartner_id)
        );
        while ($row_nl_gdpr = $db->zeile($result_nl_gdpr)) {
            $returnarray['topics'][$row_nl_gdpr[0]]=$row_nl_gdpr[1];
        }
        
        if ($ansprechpartner_id > 0) {
            $result_stammdaten_ansprechpartner = $db->select(
                $sql_tab['stammdaten_ansprechpartner'],
                array(
                   $sql_tabs['stammdaten_ansprechpartner']['anrede'],
                   $sql_tabs['stammdaten_ansprechpartner']['vorname'],
                   $sql_tabs['stammdaten_ansprechpartner']['bezeichnung']
                ),
                $sql_tabs['stammdaten_ansprechpartner']['ansprechpartner_id'].'='.$db->dbzahl($ansprechpartner_id).' and '.
                $sql_tabs['stammdaten_ansprechpartner']['stammdaten_id'].'='.$db->dbzahl($stammdaten_id)
            );
            if ($row_stammdaten_ansprechpartner = $db->zeile($result_stammdaten_ansprechpartner)) {
                $returnarray['customer']['salutation'] = $row_stammdaten_ansprechpartner[0];
                $returnarray['customer']['firstname'] = $row_stammdaten_ansprechpartner[1];
                $returnarray['customer']['surname'] = $row_stammdaten_ansprechpartner[2];
            }
        } else {
            $result_stammdaten = $db->select(
                $sql_tab['stammdaten'],
                array(
                    $sql_tabs['stammdaten']['anrede'],
                    $sql_tabs['stammdaten']['vorname'],
                    $sql_tabs['stammdaten']['name']                
                ),
                $sql_tabs['stammdaten']['id'].'='.$db->dbzahl($stammdaten_id)
            );
            if ($row_stammdaten = $db->zeile($result_stammdaten)) {
                $returnarray['customer']['salutation'] = $row_stammdaten[0];
                $returnarray['customer']['firstname'] = $row_stammdaten[1];
                $returnarray['customer']['surname'] = $row_stammdaten[2];
            }
        }
    }

    $json = json_encode(json_encode_utf8($returnarray));
    $pass = 'Optout_JsOn@Prof4Net2018';
    $secret = verschluesseleWert($json, $pass);

    $url_encode_secret = urlencode($secret);
    return $url_encode_secret;
}

function json_encode_utf8($ar) {
    if (is_array($ar)) {
        $ar2 = array();
        foreach ($ar as $key => $value) {
            $key = json_encode_utf8($key);
            $value = json_encode_utf8($value);
            $ar2[$key] = $value;
        }
        $ar = $ar2;
    } else {
        $ar = p4n_mb_string('utf8_encode', $ar);
    }
    return $ar;
}
if ($_SESSION['crm_version']>63) {
    function dokfelder_p4n() {
        global $db, $sql_tab, $sql_tabs, $cfg_fdl, $cfg_kfz, $kontakt_typ_db, $kontakt_typ, $lang_db_f, $zugelassen_k, $prefix;
        global $cfg_cc_survey, $cfg_provenexpert, $cfg_cross_sbolink, $cfg_kfzsuche_holland;
        global $cfg_survey_url, $cfg_fsag_produkte;
        // FELDER
        $sfeld=array('id', 'mandant', 'titel', 'briefanrede', 'anrede', 'anrede2', 'vorname', 'name', 'firma1', 'firma2', 'firma3', 'geburtstag', 'beruf', 'hobby', 'branche', 'kundenmerkmal', 'datum_neukunde', 'datum_letzterauftrag', 'betreuer');
        // für Finanz.dl auch VP:
        if ($cfg_fdl) {
            $sfeld[]='vpnr';
            $sfeld[]='vpb';
            $sfeld[]='meinvp';
            $sfeld[]='meinvpb';
        }
        @reset($kontakt_typ_db);
        @reset($kontakt_typ);
        while (list($key, $val)=@each($kontakt_typ_db)) {
            list($key2, $val2)=@each($kontakt_typ);
            $fname=p4n_mb_string('str_replace', array(' ','-'), array('_',''), $val);
            $fname2=p4n_mb_string('str_replace', array(' ','-'), array('_',''), $val2);
            $sfeld[]=$fname;
            if (!isset($lang_db_f['stammdaten'][$fname])) {
                $lang_db_f['stammdaten'][$fname]=$fname2;
            }
        }
        if ($cfg_kfz) {
            $xc=array_search('datum_neukunde', $sfeld);
            unset($sfeld[$xc]);
        } else {
            $xc=array_search('kundenmerkmal', $sfeld);
            unset($sfeld[$xc]);
            $xc=array_search('datum_letzterauftrag', $sfeld);
            unset($sfeld[$xc]);
        }
        if ($_SESSION['kunde']=='ba') {
            $xc=array_search('mandant', $sfeld);
            unset($sfeld[$xc]);
        }

        $zugelassen=array($prefix.'stammdaten' => $sfeld);

            // Zusatzfelder
        if ($_SESSION['rechte_gruppen']=='') {
            $_SESSION['rechte_gruppen']='-1';
        }
        $res=$db->select(
            array(
                $sql_tab['stammdaten_zusatz'],
                $sql_tab['stammdaten_gruppe_zusatzfeld']
            ),
            array(
                $sql_tabs['stammdaten_zusatz']['zusatz_id'],
                $sql_tabs['stammdaten_zusatz']['bezeichnung']
            ),
            $db->dbzahlin($_SESSION['rechte_gruppen'],$sql_tabs['stammdaten_gruppe_zusatzfeld']['gruppe_id']),
            $sql_tabs['stammdaten_zusatz']['rang'],
            '',
            array($sql_tabs['stammdaten_gruppe_zusatzfeld']['zusatz_id']
                => $sql_tabs['stammdaten_zusatz']['zusatz_id'])
        );
        while ($row=$db->zeile($res)) {
            $row[1]=p4n_mb_string('str_replace', '.','',$row[1]);

            $zugelassen['zf'][$row[0]]=$row[1];

            $lang_db_f['zf']['']=_ZUSATZFELDER_;
            $lang_db_f['zf'][$row[0].':'.$row[1]]=$row[1];

            if (!isset($zugelassen_k['zf'][$row[0]])) {
                $res2=$db->select(
                    array(
                        $sql_tab['stammdaten_gruppe'],
                        $sql_tab['stammdaten_gruppe_zusatzfeld']
                    ),
                    $sql_tabs['stammdaten_gruppe']['bezeichnung'],
                    $sql_tabs['stammdaten_gruppe_zusatzfeld']['zusatz_id'].'='.$db->dbzahl($row[0]),
                    $sql_tabs['stammdaten_gruppe']['bezeichnung'],
                    '',
                    array($sql_tabs['stammdaten_gruppe_zusatzfeld']['gruppe_id']
                        => $sql_tabs['stammdaten_gruppe']['gruppe_id'])
                );
                while ($row2=$db->zeile($res2)) {
                    $zugelassen_k['zf'][$row[0]].=$row2[0].', ';
                }
                $zugelassen_k['zf'][$row[0]]=p4n_mb_string('substr',$zugelassen_k['zf'][$row[0]], 0, -2);
            }
        }
        // Ende Zusatzfelder
        // FELDER

        // Rechtecheck:
        // nav=CC, Zusatzdaten, Auftraege, Fahrzeuge, Korrespondenz, BM, OM, PM, FM, Veranstaltung
        if (!preg_match('/nav=CC/i', $_SESSION['rechte_reiter'])) {
            unset($zugelassen['telefonleitfaden_antworten']);
            unset($zugelassen['telefonleitfaden_nichterreicht_detail']);
            unset($zugelassen['telefonleitfaden_nichterreicht']);
            unset($zugelassen['telefonleitfaden_zugriff']);
        }
        if (!preg_match('/nav=Auftraege/i', $_SESSION['rechte_reiter'])) {
            unset($zugelassen['auftrag']);
        }
        if (!preg_match('/nav=Fahrzeuge/i', $_SESSION['rechte_reiter'])) {
            unset($zugelassen['produktzuordnung']);
        }
        if (!preg_match('/nav=Korrespondenz/i', $_SESSION['rechte_reiter'])) {
            unset($zugelassen['korrespondenz']);
        }
        if (!preg_match('/nav=BM/i', $_SESSION['rechte_reiter'])) {
            unset($zugelassen['troubleticket']);
        }
        if (!preg_match('/nav=OM/i', $_SESSION['rechte_reiter'])) {
            unset($zugelassen['opportunity']);
        }
        if (!preg_match('/nav=PM/i', $_SESSION['rechte_reiter'])) {
            unset($zugelassen['projekt']);
        }
        if (!preg_match('/nav=Veranstaltung/i', $_SESSION['rechte_reiter'])) {
            unset($zugelassen['stammdaten_veranstaltung']);
        }
        if ($cfg_kfzsuche_holland) {
            $zugelassen_m = array();
            $zugelassen_m["<<" . bef_format($lang_db_f['stammdaten']['briefanrede']) . ">> <<" . bef_format($lang_db_f['stammdaten']['titel']) . ">> <<mn>> <<" . bef_format($lang_db_f['stammdaten']['name']) . ">>,\n\n"] = p4n_mb_string('ucfirst', $lang_db_f['stammdaten']['briefanrede']) . '/' . p4n_mb_string('ucfirst', $lang_db_f['stammdaten']['titel']) . '/' . p4n_mb_string('ucfirst', 'middelnaam') . '/' . p4n_mb_string('ucfirst', $lang_db_f['stammdaten']['name']);
            $zugelassen_m["<<mn>>"] = p4n_mb_string('ucfirst', 'middelnaam');
        } else {
            $zugelassen_m = array();
            $zugelassen_m["<<" . bef_format($lang_db_f['stammdaten']['briefanrede']) . ">> <<" . bef_format($lang_db_f['stammdaten']['titel']) . ">> <<" . bef_format($lang_db_f['stammdaten']['name']) . ">>,\n\n"] = p4n_mb_string('ucfirst', $lang_db_f['stammdaten']['briefanrede']) . '/' . p4n_mb_string('ucfirst', $lang_db_f['stammdaten']['titel']) . '/' . p4n_mb_string('ucfirst', $lang_db_f['stammdaten']['name']);
        }

        $zf_adr=false;
        $zf_c=0;
        while (list($key, $val)=@each($zugelassen)) {
            if ($key=='zf') {
                asort($val);
                @reset($val);
            }
            while (list($key2, $val2)=@each($val)) {
                if ($key=='zf' and $zf_adr==false) {
                    $zf_adr=true;
                    $tabelle = p4n_mb_string('ucfirst',$lang_db_f['stammdaten_adresse']['']);
                    if (!isset($zugelassen_m[$tabelle])) {
                        $zugelassen_m[$tabelle] = 'OPTGROUP';
                    }
                    $zugelassen_m['<<'.bef_format($lang_db_f['stammdaten_adresse']['adresse']).'>>']=$tabelle.' - '._ADRESSE_;
                    $zugelassen_m['<<'.bef_format($lang_db_f['stammdaten_adresse']['plz']).'>>']=$tabelle.' - '._PLZ_;
                    $zugelassen_m['<<'.bef_format($lang_db_f['stammdaten_adresse']['ort']).'>>']=$tabelle.' - '._ORT_;
                    $zugelassen_m['<<'.bef_format($lang_db_f['stammdaten_adresse']['land']).'>>']=$tabelle.' - '._LAND_;
                }
                if ($key=='zf') {
                    if (!isset($zugelassen_m[$lang_db_f['zf']['']])) {
                        $zugelassen_m[$lang_db_f['zf']['']] = 'OPTGROUP';
                    }
                    $zugelassen_m['<<ZF:'.$key2.'>>']=++$zf_c.': '.$val2;
                } else {
                    $tabelle = p4n_mb_string('ucfirst',$lang_db_f[p4n_mb_string('str_replace', $prefix,'',$key)]['']);
                    if (isset($lang_db_f[p4n_mb_string('str_replace', $prefix,'',$key)][''])) {
                        if (!isset($zugelassen_m[$tabelle])) {
                            $zugelassen_m[$tabelle]='OPTGROUP';
                        }
                    }
                    $anzf1=$val2;
                    if (isset($lang_db_f[p4n_mb_string('str_replace', $prefix,'',$key)][$val2])) {
                        $anzf1=bef_format($lang_db_f[p4n_mb_string('str_replace', $prefix,'',$key)][$val2]);
                    }
                    $zugelassen_m['<<'.$anzf1.'>>']=$tabelle.' - '.p4n_mb_string('ucfirst',$lang_db_f[p4n_mb_string('str_replace', $prefix,'',$key)][$val2]);
                }
            }
        }
        if ($cfg_kfz) {
            $zugel=array(
                'produktzuordnung' => array('fahrgestell', 'kennzeichen', 'fahrzeugartencode', 'markencode', 'typ_modell', 'datum_ez', 'datum_tuev', 'datum_asu', 'km_stand', 'kennbuchstabe_getriebe', 'kennbuchstabe_motor', 'verkaeufer', 'letzter_besuch', 'datum_uebernahme', 'letzte_insp', 'mandant_id')
            );
            if (isset($sql_tabs['produktzuordnung']['unfallwagen'])) {
                $zugel['produktzuordnung'][]='leistung_kw';
                $zugel['produktzuordnung'][]='leistung_ps';
                $zugel['produktzuordnung'][]='hubraum';
                $zugel['produktzuordnung'][]='farbbezeichnung';
                $zugel['produktzuordnung'][]='unfallwagen';
                $zugel['produktzuordnung'][]='anzahl_vorbesitzer';
                $zugel['produktzuordnung'][]='anzahl_tueren';

                $zugel['produktzuordnung'][]='fahrzeugmodellnr';
                $zugel['produktzuordnung'][]='motorartcode';
                $zugel['produktzuordnung'][]='getriebebezeichnung';
                $zugel['produktzuordnung'][]='polsterbezeichnung';
            }
			if ($cfg_fsag_produkte) {
				$zugel['produktzuordnung'][]='zusatzcode_2';
			}
            while (list($zkey, $zval)=@each($zugel)) {
                while (list($zkey2, $zval2)=@each($zval)) {
                    if (isset($lang_db_f[$zkey][$zval2])) {
                        $anzf1=bef_format(_FAHRZEUG_.'_'.$lang_db_f[$zkey][$zval2]);
                        $tabelle = p4n_mb_string('ucfirst',$lang_db_f[p4n_mb_string('str_replace', $prefix,'',$zkey)]['']);
                        if (isset($lang_db_f[p4n_mb_string('str_replace', $prefix,'',$zkey)][''])) {
                            if (!isset($zugelassen_m[$tabelle])) {
                                $zugelassen_m[$tabelle]='OPTGROUP';
                            }
                        }
                        $zugelassen_m['<<'.$anzf1.'>>']=$tabelle.' - '.p4n_mb_string('ucfirst',$lang_db_f[$zkey][$zval2]);
                    }
                }
            }
        }

        $zugel=array('auftrag' => array('nummer', 'rechnung_id', 'betrag', 'datum', 'meister', 'art', 'bereich', 'auftrag_text', 'mandant_id', 'vpb', 'vp'));
        while (list($zkey, $zval)=@each($zugel)) {
            while (list($zkey2, $zval2)=@each($zval)) {
                if (isset($lang_db_f[$zkey][$zval2])) {
                    $anzf1=bef_format(_RECHNUNG_.'_'.$lang_db_f[$zkey][$zval2]);
                    $tabelle = p4n_mb_string('ucfirst',$lang_db_f[p4n_mb_string('str_replace', $prefix,'',$zkey)]['']);
                    if (isset($lang_db_f[p4n_mb_string('str_replace', $prefix,'',$zkey)][''])) {
                        if (!isset($zugelassen_m[$tabelle])) {
                            $zugelassen_m[$tabelle]='OPTGROUP';
                        }
                    }
                    $zugelassen_m['<<'.$anzf1.'>>']=$tabelle.' - '.p4n_mb_string('ucfirst',$lang_db_f[$zkey][$zval2]);
                }
            }
        }

        $zugelassen_extras = array();
        if ($cfg_cc_survey) {
            
            include_once('inc/lib_survey.php');
            $surv_fe=psurv_ers_felder();
            while (list($keys, $vals)=@each($surv_fe)) {
                $zugelassen_extras[$keys]=$vals;
            }
        }
        if ($cfg_provenexpert) {
            $zugelassen_extras['<<link_expert>>']=_UMFRAGE_.' '._LINK_.': Provenexpert';
        }
        if ($cfg_cross_sbolink) {
            $zugelassen_extras['<<link_sbo>>']='SBO Link';
        }
        if (!empty($zugelassen_extras)) {
            $zugelassen_m[_KARTEI_EXTRAS_]='OPTGROUP';
            foreach ($zugelassen_extras as $key => $value) {
                $zugelassen_m[$key] = $value;
            }
        }

        return $zugelassen_m;
    }
}
function get_cc_verbleibende($lfid, $user_id=0) {
    global $db, $sql_tab, $sql_tabs, $cfg_filter_cache, $mit_ap, $mit_auf, $cfg_cc_ne_stunden, $cfg_cc_lf_temp;
    if ($user_id > 0) {
        $rechte_bgruppen_array=array();
        $res = $db->select(
                $sql_tab['benutzer_gruppe_zuordnung'], $sql_tabs['benutzer_gruppe_zuordnung']['gruppe_id'], $sql_tabs['benutzer_gruppe_zuordnung']['benutzer_id']. '=' . $db->dbzahl($user_id)
        );
        while ($row = $db->zeile($res)) {
            $rechte_bgruppen_array[]=$row[0];
        }
        if (empty($rechte_bgruppen_array)) {
            $rechte_bgruppen_array = array('-1');
        }
        $rechte_bgruppen = implode(',' , $rechte_bgruppen_array);
    } elseif (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $rechte_bgruppen=$_SESSION['rechte_bgruppen'];
    } else {
        return '';
    }
    
    $sqlt=array(
            $sql_tabs['telefonleitfaden']['telefonleitfaden_id'],
            $sql_tabs['telefonleitfaden']['bezeichnung'],
            $sql_tabs['telefonleitfaden']['benutzer_gruppe_id'],
            $sql_tabs['telefonleitfaden']['gruppierung'],
            $sql_tabs['telefonleitfaden']['kontrolle'],
            $sql_tabs['telefonleitfaden']['filter_id'],		// 5
            $sql_tabs['telefonleitfaden']['neu_tage'],
            $sql_tabs['telefonleitfaden']['mit_ansprechpartner'],
            $sql_tabs['telefonleitfaden']['mit_auftrag'],
    );
    $stids='';
    $res=$db->select(
        $sql_tab['telefonleitfaden'],
        $sqlt,
        $sql_tabs['telefonleitfaden']['telefonleitfaden_id'].'='.$db->dbzahl($lfid)
    );
    $row=$db->zeile($res);
    $mit_ap=false;
    $mit_auf=false;
    if ($row[7]=='1') {
        $mit_ap=true;
    }
    if ($row[8]=='1') {
        $mit_auf=true;
    }

    $alle_r1=array();
    if (intval($row[5])>0) {
        $res4=$db->select(
            $sql_tab['filter'],
            $sql_tabs['filter']['name'],
            $sql_tabs['filter']['filter_id'].'='.$db->dbzahl($row[5])
        );
        if ($row4=$db->zeile($res4)) {
            $alle_r1[$row4[0]]=get_filter_verbl($row[5]);
        }
    }

    $where_bgr2='';
    if ($rechte_bgruppen!='' and $rechte_bgruppen!='-1') {
        $where_bgr2=' or '.$db->dbzahlin($rechte_bgruppen,$sql_tabs['telefonleitfaden_filter']['benutzer_gruppe_id']) ;
    }
    $res3=$db->select(
        $sql_tab['telefonleitfaden_filter'],
        $sql_tabs['telefonleitfaden_filter']['filter_id'],
        $sql_tabs['telefonleitfaden_filter']['telefonleitfaden_id'].'='.$db->dbzahl($row[0]).' and '.
            '('.$sql_tabs['telefonleitfaden_filter']['benutzer_id'].'='.$db->dbzahl($user_id).$where_bgr2.')'
    );
    unset($fschon);
    while ($row3=$db->zeile($res3)) {
        $res4=$db->select(
            $sql_tab['filter'],
            $sql_tabs['filter']['name'],
            $sql_tabs['filter']['filter_id'].'='.$db->dbzahl($row3[0])
        );
        if ($row4=$db->zeile($res4)) {
            if (!isset($alle_r1[$row4[0]])) {
                $alle_r1[$row4[0]]=get_filter_verbl($row3[0]);
            }
        }
        if (!isset($fschon) and intval($row3[0])>0) {
            $fschon=true;
            $row[5]=$row3[0];
        }
    }
    if (intval($row[5])>0) {
    //	$farr=get_filter_verbl($row[5]);
        $stidsauchda=true;
    } elseif ($stids=='') {
        if ($cfg_filter_cache) {
            $gesamt_filter=$_SESSION['crm_l_id'];//count($lstid/* $_SESSION['crm_l_id']*/);
            $stids=$_SESSION['crm_l_id'].',';
        } else {
            $fsql=filter_ergebnis();
            $xsc=array();
            $gesamt_filter=0;
            if ($fsql[0]!='') {
                $res2=$db->select2($fsql[0]);
                $gesamt_filter=$db->anzahl($res2);

                while ($row2=$db->zeile($res2)) {
                    if (!isset($xsc[$row2[0]])) {
                        $stids.=$row2[0].',';
                        $xsc[$row2[0]]=1;
                    }
                }
            }
        }
        $stids=p4n_mb_string('substr',$stids, 0, -1);
        if (p4n_mb_string('strpos',$_SESSION['gruppeaktiv'], ',')===false and is_numeric($_SESSION['gruppeaktiv'])) {
            $where_tlf_ant=$db->dbzahlin($stids,$sql_tabs['telefonleitfaden_antworten']['stammdaten_id']);
            $where_tlf_zug=$db->dbzahlin($stids,$sql_tabs['telefonleitfaden_zugriff']['stammdaten_id']);
        }
        $alle_r1[_ALLE_]=array();
    }

    $vtext='';
    @ksort($alle_r1);
    $return_array=array();
    while (list($key1, $farr)=@each($alle_r1)) {
        if (count($farr)>0) {
            $merk_stids=$stids;
            $stids=$farr[0];
            $mgesamt_filter=$gesamt_filter;
            $gesamt_filter=$farr[1];
        }
        if ($stids!='') {
                $mit_antw=0;
                $mit_antw2=0;
                $mit_wvl=0;
                $mit_ne=0;
				$mit_zs=0;
				
                $lf_neut=intval($row[6]);
				
                $where_antk5='';
                $where_antk52='';
                if ($lf_neut>0) {
                    $where_antk5=' and '.$sql_tabs['telefonleitfaden_antworten']['datum'].'>='.$db->dbtimestamp(time()-($lf_neut*24*60*60));
                    $where_antk52=' and '.$sql_tabs['telefonleitfaden_nichterreicht']['letzter_anruf'].'>='.$db->dbtimestamp(time()-($lf_neut*24*60*60));
                }
				
                $trennwert=20000;//20000;
                $kommata=p4n_mb_string('substr_count',$stids, ',');
                if ($kommata>$trennwert) {
                    $laenge=p4n_mb_string('strlen',$stids);
                    $stri=0;
                    while ($stri<$laenge) {
                        $sub=p4n_mb_string('substr',$stids, $stri, $trennwert);
						
                        if ($stri+$trennwert<$laenge) {
                            $anzweg=0;
                            $posz=p4n_mb_string('strlen',$sub)-1;
                            while ($sub[$posz]!=',' and $posz>=0) {
                                $posz--;
                                $anzweg++;
                            }
                            $sub=p4n_mb_string('substr',$sub, 0, -$anzweg);
                            $stri-=$anzweg;
                        }
                        $stri+=$trennwert;
                        if (p4n_mb_string('substr',$sub, -1)==',') {
                            $sub=p4n_mb_string('substr',$sub, 0, -1);
                        }
                        if (trim($sub)!='') {
                            if ($mit_auf) {
                                $from_stdid = $sql_tabs['telefonleitfaden_antworten']['auftrag_id'];
                                $where_stdid = $db->dbzahlin($sub, $from_stdid);
                            } else {
                                $from_stdid = $sql_tabs['telefonleitfaden_antworten']['stammdaten_id'];
                                $where_stdid = $db->dbzahlin($sub, $from_stdid);
                            }
                            $res2=$db->select(
                                $sql_tab['telefonleitfaden_antworten'],
                                'distinct '.$from_stdid,
                                $sql_tabs['telefonleitfaden_antworten']['telefonleitfaden_id']
                                    .'='.$db->dbzahl($row[0])
                                .' and '.$where_stdid.' '.$where_antk5
                            );
                        //	echo $db->last_sql.'<br>';
                            $mit_antw+=$db->anzahl($res2);
							
							if ($cfg_cc_lf_temp) {
								$res2=$db->select(
									$sql_tab['telefonleitfaden_zwischenspeicher'],
									'distinct '.$sql_tabs['telefonleitfaden_zwischenspeicher']['stammdaten_id'],
									$db->dbzahlin($sub, $sql_tabs['telefonleitfaden_zwischenspeicher']['stammdaten_id'])
								);
								$mit_zs+=$db->anzahl($res2);
							}
                        }
                    }
                } else {
                    if ($mit_auf) {
                        $from_stdid = $sql_tabs['telefonleitfaden_antworten']['auftrag_id'];
                        $where_stdid = $db->dbzahlin($stids, $from_stdid);
                    } else {
                        $from_stdid = $sql_tabs['telefonleitfaden_antworten']['stammdaten_id'];
                        $where_stdid = $db->dbzahlin($stids, $from_stdid);
                    }
                    
                    $res2=$db->select(
                    $sql_tab['telefonleitfaden_antworten'],
                        'distinct '.$from_stdid,
                        $sql_tabs['telefonleitfaden_antworten']['telefonleitfaden_id']
                            .'='.$db->dbzahl($row[0])
                        .' and '.$where_stdid.' '.$where_antk5
                    );
                    $mit_antw=$db->anzahl($res2);
                    $stids2='';
                    while ($row2=$db->zeile($res2)) {
                        $stids2.=$row2[0].',';
                    }
					
					if ($cfg_cc_lf_temp) {
						$res2=$db->select(
							$sql_tab['telefonleitfaden_zwischenspeicher'],
							'distinct '.$sql_tabs['telefonleitfaden_zwischenspeicher']['stammdaten_id'],
							''//$sql_tabs['telefonleitfaden_zwischenspeicher']['leitfaden_id'].'='.$db->dbzahl($row[0])
						);
						$mit_zs=$db->anzahl($res2);
						while ($row2=$db->zeile($res2)) {
    	                    $stids2.=$row2[0].',';
	                    }
					}
					
                    $stids2=p4n_mb_string('substr',$stids2, 0, -1);
                    if ($stids2!='') {
                        if ($mit_auf) {
                            $where_antk52.=' and '.$db->dbzahlin($stids2,$sql_tabs['telefonleitfaden_nichterreicht']['auftrag_id'],'NOT IN');
                        } else {
                            $where_antk52.=' and '.$db->dbzahlin($stids2,$sql_tabs['telefonleitfaden_nichterreicht']['stammdaten_id'],'NOT IN');
                        }
                        
                    }

                    if ($_SESSION['cfg_kunde']!='cc_complan' and $_SESSION['cfg_kunde']!='callcenter') {
                        if ($mit_auf) {
                            $from_stdid = $sql_tabs['telefonleitfaden_nichterreicht']['auftrag_id'];
                            $where_stdid = $db->dbzahlin($stids, $from_stdid);
                        } else {
                            $from_stdid = $sql_tabs['telefonleitfaden_nichterreicht']['stammdaten_id'];
                            $where_stdid = $db->dbzahlin($stids, $from_stdid);
                        }
                        
                        $res2=$db->select(
                            $sql_tab['telefonleitfaden_nichterreicht'],
                            'distinct '.$from_stdid,
                            $sql_tabs['telefonleitfaden_nichterreicht']['telefonleitfaden_id'].'='.$db->dbzahl($row[0]).' and '.
                                $sql_tabs['telefonleitfaden_nichterreicht']['grund'].' is not null and '.
                                $sql_tabs['telefonleitfaden_nichterreicht']['grund'].'!='.$db->str('').' and '.
                                $where_stdid.' '.$where_antk52
                        );
                        $mit_antw2=$db->anzahl($res2);
                    }

                    if ($_SESSION['crm_version']>60) {
                        if ($mit_auf) {
                            $from_stdid = $sql_tabs['telefonleitfaden_zugriff']['auftrag_id'];
                            $where_stdid = $db->dbzahlin($stids, $from_stdid);
                        } else {
                            $from_stdid = $sql_tabs['telefonleitfaden_zugriff']['stammdaten_id'];
                            $where_stdid = $db->dbzahlin($stids, $from_stdid);
                        }
                        $res2=$db->select(
                            $sql_tab['telefonleitfaden_zugriff'],
                            'distinct '.$from_stdid,
                            $sql_tabs['telefonleitfaden_zugriff']['telefonleitfaden_id'].'='.$db->dbzahl($row[0]).' and '.
                                $sql_tabs['telefonleitfaden_zugriff']['freigabe'].'>'.$db->dbtimestamp(time()).' and '.
                                $where_stdid
                        );
                        $mit_wvl=$db->anzahl($res2);

                        $res2=$db->select(
                            $sql_tab['telefonleitfaden_zugriff'],
                            'distinct '.$from_stdid,
                            $sql_tabs['telefonleitfaden_zugriff']['telefonleitfaden_id'].'='.$db->dbzahl($row[0]).' and '.
                                $sql_tabs['telefonleitfaden_zugriff']['benutzer_id'].'!='.$db->dbzahl($user_id).' and '.
                                $sql_tabs['telefonleitfaden_zugriff']['freigabe_privat'].'='.$db->dblogic(true).' and '.
                                $sql_tabs['telefonleitfaden_zugriff']['freigabe'].'<'.$db->dbtimestamp(time()).' and '.
                                $where_stdid
                        );
                        $mit_wvl+=$db->anzahl($res2);

                        if ($mit_auf) {
                            $from_stdid = $sql_tabs['telefonleitfaden_nichterreicht']['auftrag_id'];
                            $where_stdid = $db->dbzahlin($stids, $from_stdid);
                        } else {
                            $from_stdid = $sql_tabs['telefonleitfaden_nichterreicht']['stammdaten_id'];
                            $where_stdid = $db->dbzahlin($stids, $from_stdid);
                        }
                        $res2=$db->select(
                            $sql_tab['telefonleitfaden_nichterreicht'],
                            'distinct '.$from_stdid,
                            $sql_tabs['telefonleitfaden_nichterreicht']['telefonleitfaden_id'].'='.$db->dbzahl($row[0]).' and '.
                                $sql_tabs['telefonleitfaden_nichterreicht']['grund'].'='.$db->str('').' and '.
                                $sql_tabs['telefonleitfaden_nichterreicht']['letzter_anruf'].'>='.$db->dbtimestamp(time()-60*60*$cfg_cc_ne_stunden).' and '.
                                $where_stdid.' '.$where_antk52
                        );
                        $mit_ne=$db->anzahl($res2);
                    }
                }
            }
            $verbl3=intval($gesamt_filter-$mit_antw-$mit_antw2-$mit_wvl-$mit_ne-$mit_zs);
            if ($verbl3<=0) {
                $verbl3=0;
            }
            $kutext='';
            if ($mit_antw>0) {
                $kutext.=_ANTWORT_.': '.$mit_antw.', ';
            }
            if ($mit_antw2>0) {
                $kutext.=_OHNEANTWORT_.': '.$mit_antw2.', ';
            }
            if ($mit_wvl>0) {
                $kutext.=_WVL_.': '.$mit_wvl.', ';
            }
            if ($mit_ne>0) {
                $kutext.=_NICHTERREICHT_.': '.$mit_ne.', ';
            }
            if ($mit_zs>0) {
                $kutext.=_ZWISCHENSPEICHER_.': '.$mit_zs.', ';
            }
            if ($kutext!='') {
                $kutext=' ('.substr($kutext, 0, -2).')';
            }
            if ($_SESSION['crm_version']<=60) {
                $kutext='';
            }

            $vtext.="\n".$key1.': '.$verbl3.' / '.$gesamt_filter.$kutext;//.' '
            $return_array[]=array('key'=>$key1,'verbleibend'=>$verbl3,'gesamt'=>$gesamt_filter,'kutext'=>$kutext);
            /*.link2(_EXPORT_.' (.csv)', $phs.'?export='.$row[0])
            */
            //.'{grp'.$row[3].'}';
    }	// ende $alle_r

    if (count($farr)>0) {
        $stids=$merk_stids;
        $gesamt_filter=$mgesamt_filter;
    }
    return array('title'=>$row[1],'leitfaden'=>$return_array);//$row[1].': '.$vtext;
}
    function get_filter_verbl($fid, $ausf=false, $kein_select=false) {
		global $db, $sql_tab, $sql_tabs, $cfg_filter_cache, $cfg_db_subselects, $mit_ap, $mit_auf, $prefix, $cfg_cc_ne_stunden,$cfg_speed;
		
        $gr_fi='';
		$res=$db->select(
			$sql_tab['filter'],
            $sql_tabs['filter']['gruppen'],
			$sql_tabs['filter']['filter_id'].'='.$db->dbzahl($fid)
		);
		if ($row=$db->zeile($res)) {
			$gr_fi=trim($row[0]);
			if ($gr_fi=='-1') {
				$gr_fi='';
			}
		}

		if ($ausf) {
			unset($_SESSION['liste_zusatzbedingung']);
			unset($_SESSION['liste_sql']);
			unset($_SESSION['liste_sql_name']);
			unset($_SESSION['sqlnc']);
			unset($_SESSION['sl_seite']);
			unset($_SESSION['crm_liste_sort']);
			unset($_SESSION['crm_liste_order']);
			unset($_SESSION['gruppeaktiv_n']);
			unset($_SESSION['gruppeaktiv_i']);
			unset($_SESSION['gruppeaktiv']);
			unset($_SESSION['gf_schnitt']);
		} else {
            $mfid=$_SESSION['filteraktiv'];
            $m_lid=$_SESSION['crm_l_id'];
            $m_anz=$_SESSION['crm_l_anzahl'];
            $mas=$_SESSION['anzahl_saetze'];
            $mas2=$_SESSION['anzahl_saetze2'];
            $mg1=$_SESSION['gruppeaktiv_n'];
            $mg2=$_SESSION['gruppeaktiv_i'];
            $mg3=$_SESSION['gruppeaktiv'];
            $mg4=$_SESSION['gf_schnitt'];

            unset($_SESSION['gruppeaktiv_n']);
            unset($_SESSION['gruppeaktiv_i']);
            unset($_SESSION['gruppeaktiv']);
            unset($_SESSION['gf_schnitt']);
		}
		
		$_SESSION['filteraktiv']=$fid;
		if ($gr_fi!='') {
			$_SESSION['gruppeaktiv']=$gr_fi;
		}
		
		if ($kein_select) {
			return false;
		}
        $ffeld=filter_ergebnis();
        $kunden_ids = array();
        if (function_exists('setzeAnzahlDatensaetze')) {
            $alle_rows = setzeAnzahlDatensaetze($ffeld[0]);
            foreach ($alle_rows as $row_neu) {
                if ($mit_auf && isset($row_neu['auftrag_id'])) {
                    $kunden_ids[$row_neu['auftrag_id']] = $row_neu['auftrag_id'];
                } else {
                    $kunden_ids[$row_neu['stammdaten___id']] = $row_neu['stammdaten___id'];
                }
            }
            $_SESSION['crm_l_id'] = implode(',', $kunden_ids);
        } elseif ($cfg_filter_cache) {
            $ku_anz=get_filter_ids($ffeld[0]);
			$kunden_ids=explode(',', $_SESSION['crm_l_id']);
            if ($ausf) {
				if (count($kunden_ids)>0 and trim($_SESSION['crm_l_id'])!='') {
					$_SESSION['stammdaten_id']=$kunden_ids[0];
					$_SESSION['stammdaten_id_nr']=0;
					$_SESSION['anzahl_saetze']=count($kunden_ids);
                } else {
					$_SESSION['anzahl_saetze']=0;
				}
				$_SESSION['anzahl_saetze2']=$ku_anz;
				
				if ($_SESSION['anzahl_saetze2']==0) {
					$_SESSION['anzahl_saetze2']=$_SESSION['anzahl_saetze'];
				}
				if ($_SESSION['anzahl_saetze']==0) {
					kein_datensatz();
				}
			}
		} else {
		    if (!$cfg_speed) {
                if (preg_match('/^select (.*) from/Ui', $ffeld[0], $m9)) {
                    $f22_1='';
					$f22_2=explode(',', $m9[1]);
                    while (list($key, $val)=@each($f22_2)) {
						$val=trim($val);
						if (stristr($val, 'as max___')!==false or stristr($val, 'as min___')!==false or stristr($val, 'as cou___')!==false or stristr($val, 'as sum___')!==false or p4n_mb_string('substr',$val,0,4)=='sum(' or p4n_mb_string('substr',$val,0,4)=='min(' or p4n_mb_string('substr',$val,0,4)=='max(' or p4n_mb_string('substr',$val,0,6)=='count(' or p4n_mb_string('substr',$val,0,4)=='avg(') {
							$f22_1.=','.$val;
						}
					}
                    $sm_sql_2=p4n_mb_string('str_replace', $m9[1], 'distinct '.$prefix.'stammdaten.stammdaten_id'.$f22_1, $ffeld[0]);
					$result=$db->select2($sm_sql_2);
					$_SESSION['anzahl_saetze']=$db->anzahl($result);
				} else {
					$_SESSION['anzahl_saetze']=0;
				}
			} else {
				$_SESSION['anzahl_saetze2']=0;
			}
            if ($ffeld[0]!='') {
                $result=$db->select2($ffeld[0]);
			}
			$xsc=array();
			$allk='';
            $pro_datensatz=array();
            while ($row=$db->zeile($result)) {
                if (!isset($xsc[$row[0]])) {
                    $kunden_ids[]=$row[0];
					$allk.=$row[0].',';
					$xsc[$row[0]]=1;
				}
			}
			$allk=p4n_mb_string('substr',$allk, 0, -1);
			$_SESSION['crm_l_id']=$allk;
			
			if ($ausf) {
				$_SESSION['anzahl_saetze2']=$db->anzahl($result);
				if ($_SESSION['anzahl_saetze2']==0) {
					$_SESSION['anzahl_saetze2']=$_SESSION['anzahl_saetze'];
                }
				if ($_SESSION['anzahl_saetze']==0) {
					kein_datensatz();
				}
				if ($zeile=$db->zeile($result)) {
					$_SESSION['stammdaten_id']=$zeile[0];
				}
			}
		}
		
        
		$kunden_daten=$_SESSION['crm_l_id'];
        $anzahl_kunden = count($kunden_ids);
        
		if (!$ausf) {
            $_SESSION['anzahl_saetze']=$mas;
            $_SESSION['anzahl_saetze2']=$mas2;
            $_SESSION['filteraktiv']=$mfid;
            $_SESSION['crm_l_id']=$m_lid;
            $_SESSION['crm_l_anzahl']=$m_anz;
            $_SESSION['gruppeaktiv_n']=$mg1;
            $_SESSION['gruppeaktiv_i']=$mg2;
            $_SESSION['gruppeaktiv']=$mg3;
            $_SESSION['gf_schnitt']=$mg4;
		}
    	return array($kunden_daten, $anzahl_kunden);
	}
    
    function isSourceTheType($source, $type='Mail Lead') {
        global $db, $sql_tab, $sql_tabs, $lang;
        
        if ($source!='' && $type!='') {
            if ($type == 'Mail Lead') {
                $notOpelLeads = array(
                    'Web Jassy' => 1, 
                    'Ford LDS' => 1, 
                    'OFDB' => 1, 
                    'OFDB'.' '.$lang['_SP_AUFGABEN_'] => 1, 
                    'MBNL' => 1, 
                    $lang['_KONTAKTFORMULAR_'] => 1, 
                    $lang['_FAHRZEUGBOERSEN_'] => 1, 
                    'Toyota' => 1, 
                    'Ferrari' => 1
                );
                if (isset($notOpelLeads[$source])) {
                    return true;
                } 
            }

            if (isset($sql_tabs['kampagne_lead_source'])) {
                $result_kampagne_lead_source = $db->select(
                    $sql_tab['kampagne_lead_source'],
                    $sql_tabs['kampagne_lead_source']['source'],
                    $sql_tabs['kampagne_lead_source']['type'].'='.$db->str($type).' and '.
                    $sql_tabs['kampagne_lead_source']['source'].'='.$db->str($source)
                );
                if ($row_kampagne_lead_source=$db->zeile($result_kampagne_lead_source)) {
                    return true;
                }
            }
        }
        
        return false;
    }
    
    if (!function_exists('is_countable')) {
        function is_countable($c) {
            return is_array($c) || $c instanceof Countable;
        }
    }
    
    function count_p4n($countable = array()) {
        if (!is_countable($countable)) {
            return 0;
        }
        return count($countable);
    }

    function getUsersWithOnlineOfflineStatus($benutzer_feld = array()) {
        global $db, $sql_tab, $sql_tabs, $cfg_basedir, $cfg_feiertage_nation;
        global $ohneTermine, $cfg_arbeitstage_konfiguration;
        
        $alle_uson=array();
        $res9=$db->select(
            $sql_tab['useronline'],
            array(
                $sql_tabs['useronline']['datum'],
                $sql_tabs['useronline']['benutzer_id']
            )
        );
        while ($row9=$db->zeile($res9)) {
            if ($db->unixdate_ts($row9[0])>(time()-(2*60))) {
                $alle_uson[$row9[1]]=1;
            }
        }
        
        $benutzer_online=array();
        $benutzer_offline=array();
        $benutzer_urlaub=array();

        $benutzer_to_check = array();

        if (!empty($benutzer_feld)) {
            foreach ($benutzer_feld as $ben_id => $benutzer_name) {
                if (!isset($benutzer_to_check[$ben_id])) {
                    $benutzer_to_check[$ben_id] = $ben_id;
                }
            }
        }

        if (!empty($benutzer_to_check)) {
            if (is_file($cfg_basedir.'inc/lib_feiertag.php')) {
                include_once($cfg_basedir.'inc/lib_feiertag.php');
                $alle_ben_termine = getArbeitsTageVonBenutzer_multi(time(), time(), $benutzer_to_check);
            }
        }

        if (!empty($alle_ben_termine)) {
            $alle_urlaub = array();
            if (!empty($_SESSION['kal_kategorie'])) {
                foreach ($_SESSION['kal_kategorie'] as $kal_kat => $is_urlaub) {
                    if ($is_urlaub == 1) {
                        $alle_urlaub[] = $kal_kat;
                    }
                }
            } else {
                $alle_urlaub = array(_URLAUB_);
            }

            foreach ($alle_ben_termine as $ben_id => $val) {
                foreach ($alle_urlaub as $urlaub_name) {
                    if (isset($benutzer_feld[$ben_id]) && isset($val[0]['termin_kategorie']) && !empty($val[0]['termin_kategorie']) && isset($val[0]['termin_kategorie'][$urlaub_name])) {
                        $ben_name = $benutzer_feld[$ben_id];
                        if (!isset($benutzer_urlaub[_URLAUB_])) {
                            $benutzer_urlaub[_URLAUB_]='OPTGROUP';
                        }
                        $benutzer_urlaub[$ben_id]=$ben_name;
                    }
                }
            }
        }
        if (!empty($alle_uson)) {
            foreach ($alle_uson as $ben_id => $val) {
                if (isset($benutzer_feld[$ben_id]) && !isset($benutzer_urlaub[$ben_id])) {
                    if (!isset($benutzer_online[_ONLINE_])) {
                        $benutzer_online[_ONLINE_]='OPTGROUP';
                    }
                    $benutzer_online[$ben_id]=$benutzer_feld[$ben_id];
                }
            }
        }

        if (!empty($benutzer_feld)) {
            foreach ($benutzer_feld as $ben_id => $benutzer_name) {
                if (!isset($benutzer_online[$ben_id]) && !isset($benutzer_urlaub[$ben_id])) {
                    if (!empty($benutzer_online)) {
                        if (!isset($benutzer_offline[_NICHT_ONLINE_])) {
                            $benutzer_offline[_NICHT_ONLINE_]='OPTGROUP';
                        }
                    }
                    $benutzer_offline[$ben_id]=$benutzer_name;
                }
            }
        }    
        $bens2_online=$benutzer_online+$benutzer_offline+$benutzer_urlaub;
        if (!empty($benutzer_feld) && empty($bens2_online)) {
            return $benutzer_feld;
        }
        return $bens2_online;
    }
    
    if (!function_exists('cleanUpSelectArray')) {
        function cleanUpSelectArray($select_array, $keine_auswahl='') {
            $select_array_temp = array();
            $is_empty = false;
            if (!empty($select_array)) {
                foreach ($select_array as $key => $value) {
                    if ($value != '') {
                        $select_array_temp[$key] = $value;
                    } else {
                        $is_empty = true;
                    }
                }
                if ($is_empty && count($select_array)==1) {
                    return array();
                }
                @ksort($select_array_temp);
                if (!empty($select_array_temp)) {
                    $select_array = array();
                    if ($is_empty && $keine_auswahl!='') {
                        $select_array = array('' => $keine_auswahl);
                    }
                    $select_array += $select_array_temp;
                }
            }
            return $select_array;
        }
    }
    
    function getPrimaryFieldFromTable($table) {
        $primary_field = $table.'_id';
        if ($table=='stammdaten') {
            $primary_field='id';
        } elseif ($table=='stammdaten_adresse') {
            $primary_field='adress_id';
        } elseif ($table=='telefonleitfaden_antworten') {
            $primary_field='antwort_id';
        } elseif ($table=='telefonleitfaden_nichterreicht') {
            $primary_field='stammdaten_id';
        } elseif ($table=='stammdaten_ansprechpartner') {
            $primary_field='ansprechpartner_id';
        } elseif ($table=='zusatzfelder') {
            $primary_field='stammdaten_id';
        } elseif ($table=='stammdaten_mandant') {
            $primary_field='stammdaten_id';
        } elseif ($table=='emailing_empfaenger') {
            $primary_field='emailing_id';
        } elseif ($table=='genesisw_zusatzdaten') {
			$primary_field='stammdaten_id';
        }
        return $primary_field;
    }
    
    function kunden_loeschen_global($stammdaten_ids=array(), $grund = '') {
        global $db, $sql_tab, $sql_tabs, $prefix;
        global $cfg_geloeschte_nichtimport;
        
        if (!is_array($stammdaten_ids) && $stammdaten_ids > 0) {
            $stammdaten_ids = array($stammdaten_ids);
        }
        $anz_geloescht = 0;
        $not_delete = array(
            'produktzuordnung' => 1,
            'slowlog' => 1,
            'stammdaten_keinimport' => 1,
            'online_newsletter_daten' => 1,
            
        );
        $special_tables = array(
            'stammdaten_id1' => array('vertrag', 'vertrag_leistung', 'vertrag_staffel', 'stammdaten_zuordnung'),
            'stammdaten_id2' => array('vertrag', 'vertrag_leistung', 'vertrag_staffel', 'stammdaten_zuordnung'),
        );
        
        $loeschtabs_form=array();
        $alletabs=$db->MetaTables();

        $res=$db->select(
            $sql_tab['formular'],
            $sql_tabs['formular']['formular_id']
        );
        while ($row=$db->zeile($res)) {
            if (in_array($prefix.'formular_'.$row[0], $alletabs)) {
                $loeschtabs_form[]=$prefix.'formular_'.$row[0];
            }
        }

        if (!empty($stammdaten_ids)) {
            $res=$db->select(
                $sql_tab['stammdaten'],
                array(
                    $sql_tabs['stammdaten']['id'],
                    $sql_tabs['stammdaten']['syncml_id'],
                    $sql_tabs['stammdaten']['anzeigename']
                ),
                $db->dbzahlin($stammdaten_ids, $sql_tabs['stammdaten']['id'])
            );
            if ($row=$db->zeile($res)) {
                $stammdaten_id=$row[0];
                $syncml_id=$row[1];
                $anzn1=$row[2];
                $debnr='';
                $result_stammdaten_mandant=$db->select(
                    $sql_tab['stammdaten_mandant'],
                    array(
                        $sql_tabs['stammdaten_mandant']['nummer1'],
                        $sql_tabs['stammdaten_mandant']['nummer2']
                    ),
                    $sql_tabs['stammdaten_mandant']['stammdaten_id'].'='.$db->dbzahl($stammdaten_id)
                );
                if ($row_stammdaten_mandant=$db->zeile($result_stammdaten_mandant)) {
                    if ($row_stammdaten_mandant[0]!='') {
                        $debnr.=$row_stammdaten_mandant[0].', ';
                    }
                    if ($row_stammdaten_mandant[1]!='') {
                        $debnr.=$row_stammdaten_mandant[1].', ';
                    }
                    $debnr=p4n_mb_string('substr',$debnr, 0, -2);
                }

                $db->insert(
                    $sql_tab['syncml_geloescht'],
                    array(
                        $sql_tabs['syncml_geloescht']['art'] => $db->str('contact'),
                        $sql_tabs['syncml_geloescht']['syncml_id'] => $db->str($syncml_id),
                        $sql_tabs['syncml_geloescht']['syncml_letzte_aenderung'] => $db->dbtimestamp(time())
                    )
                );

                if ($cfg_geloeschte_nichtimport) {
                    $db->insert(
                        $sql_tab['stammdaten_keinimport'],
                        array(
                            $sql_tabs['stammdaten_keinimport']['stammdaten_id'] => $db->dbzahl($stammdaten_id),
                            $sql_tabs['stammdaten_keinimport']['datum'] => $db->dbtimestamp(time()),
                            $sql_tabs['stammdaten_keinimport']['quelle'] => $db->str('Kundenlöschung '.$anzn1)
                        )
                    );
                }
                $db->insert(
                    $sql_tab['log_aenderung'],
                    array(
                        $sql_tabs['log_aenderung']['datum'] => $db->dbtimestamp(time()),
                        $sql_tabs['log_aenderung']['benutzer_id'] => $db->dbzahl(!isset($_SESSION['user_id']) ? 1 : $_SESSION['user_id']),
                        $sql_tabs['log_aenderung']['tabelle'] => $db->str($grund),
                        $sql_tabs['log_aenderung']['feldname'] => $db->str(''),
                        $sql_tabs['log_aenderung']['feldinhalt_alt'] => $db->str($anzn1),
                        $sql_tabs['log_aenderung']['feldinhalt_neu'] => $db->str(''),
                        $sql_tabs['log_aenderung']['zusatz1'] => $db->str($stammdaten_id),
                        $sql_tabs['log_aenderung']['zusatz2'] => $db->str($debnr)
                    )
                );
            }
            $metaTables = array_flip($db->MetaTables());
            foreach ($sql_tabs as $tabelle => $felder) {
                if (!isset($metaTables[$sql_tab[$tabelle]])) {
                    continue;
                }
                
                if (isset($not_delete[$tabelle])) {
                    continue;
                }
                if (isset($felder['stammdaten_id'])) {
                    if (isset($sql_tab[$tabelle])) {
                        $db->delete(
                            $sql_tab[$tabelle],
                            $db->dbzahlin($stammdaten_ids, $felder['stammdaten_id']).' and '.
                            $felder['stammdaten_id'].'>'.$db->dbzahl(0)//TT: Backup if any id is 0...
                        );
                    }
                }
            }
            foreach ($special_tables as $feld => $tabellen) {
                if (!empty($tabellen)) {
                    foreach ($tabellen as $tabelle) {
                        if (isset($sql_tab[$tabelle]) && isset($sql_tabs[$tabelle][$feld])) {
                            $db->delete(
                                $sql_tab[$tabelle],
                                $db->dbzahlin($stammdaten_ids, $sql_tabs[$tabelle][$feld]).' and '.
                                $sql_tabs[$tabelle][$feld].'>'.$db->dbzahl(0)
                            );
                        }
                    }
                }
            }
            $anz_geloescht+=$db->delete(
                $sql_tab['stammdaten'],
                $db->dbzahlin($stammdaten_ids, $sql_tabs['stammdaten']['id'])
            );
            if (!empty($loeschtabs_form)) {
                foreach ($loeschtabs_form as $val) {
                    $db->delete(
                        $val,
                        $db->dbzahlin($stammdaten_ids, $val.'.stammdaten_id')
                    );
                }
            }
        }
        //$sql_tabs['kundenportal_benutzer']['kunden_ids']
        return $anz_geloescht;
    }
    
    function benutzer_verschieben($uid, $moveto, $standard_lagerort = 0) {
        global $cfg_vw, $carlo_tw, $db, $sql_tab, $sql_tabs;
        
        if ($uid > 0 && $moveto > 0) {
            $db->update(
				$sql_tab['opportunity'],
				array(
					$sql_tabs['opportunity']['benutzer_id'] => $db->dbzahl($moveto)
				),
				$sql_tabs['opportunity']['benutzer_id'].'='.$db->dbzahl($uid)
			);
			$db->update(
				$sql_tab['opportunity'],
				array(
					$sql_tabs['opportunity']['benutzer_eintrag'] => $db->dbzahl($moveto)
				),
				$sql_tabs['opportunity']['benutzer_eintrag'].'='.$db->dbzahl($uid)
			);
            
            $db->update(
                $sql_tab['kfzsuche_suchauftrag'],
                array(
                    $sql_tabs['kfzsuche_suchauftrag']['benutzer_id'] => $db->dbzahl($moveto)
                ),
                $sql_tabs['kfzsuche_suchauftrag']['benutzer_id'].'='.$db->dbzahl($uid)
            );

			$db->update(
				$sql_tab['troubleticket'],
				array(
					$sql_tabs['troubleticket']['benutzer_id'] => $db->dbzahl($moveto)
				),
				$sql_tabs['troubleticket']['benutzer_id'].'='.$db->dbzahl($uid)
			);
			$db->update(
				$sql_tab['troubleticket'],
				array(
					$sql_tabs['troubleticket']['ersteller_id'] => $db->dbzahl($moveto)
				),
				$sql_tabs['troubleticket']['ersteller_id'].'='.$db->dbzahl($uid)
			);
            $db->update(
				$sql_tab['troubleticket'],
				array(
					$sql_tabs['troubleticket']['verursacher_id'] => $db->dbzahl($moveto)
				),
				$sql_tabs['troubleticket']['verursacher_id'].'='.$db->dbzahl($uid)
			);
			$db->update(
				$sql_tab['korrespondenz'],
				array(
					$sql_tabs['korrespondenz']['betreuer_id'] => $db->dbzahl($moveto)
				),
				$sql_tabs['korrespondenz']['betreuer_id'].'='.$db->dbzahl($uid)
			);
			$db->update(
				$sql_tab['korrespondenz'],
				array(
					$sql_tabs['korrespondenz']['ersteller_id'] => $db->dbzahl($moveto)
				),
				$sql_tabs['korrespondenz']['ersteller_id'].'='.$db->dbzahl($uid)
			);
			$db->update(
				$sql_tab['korrespondenz'],
				array(
					$sql_tabs['korrespondenz']['ergebnis_benutzer_id'] => $db->dbzahl($moveto)
				),
				$sql_tabs['korrespondenz']['ergebnis_benutzer_id'].'='.$db->dbzahl($uid)
			);
            $db->update(
				$sql_tab['filter'],
				array(
					$sql_tabs['filter']['user_id'] => $db->dbzahl($moveto)
				),
				$sql_tabs['filter']['user_id'].'='.$db->dbzahl($uid)
			);
            if ($carlo_tw) {
                $mandid = 0;
                $lagid = 0;
                if ($standard_lagerort > 0) {
                    list($mandid, $lagid) = split_mandant($standard_lagerort);
                }
                $sqlt_neu = array();
                if ($mandid>0) {
                    $sqlt_neu[$sql_tabs['stammdaten']['mandant']]=$db->dbzahl($mandid);
                }
                if ($mandid>0 && $lagid>0) {
                    $sqlt_neu[$sql_tabs['stammdaten']['vpb']]=$db->dbzahl($lagid);
                }
                if ($cfg_vw && System_BrandPartitioning::instance()->useBrandPartitioning()) {
                    // #109 - add seller to new guys
                    $rr = $db->select(
                        $sql_tab['stammdaten'], 
                        array(
                            $sql_tabs['stammdaten']['zusatztext1'],
                            $sql_tabs['stammdaten']['abteilung'],
                            $sql_tabs['stammdaten']['id']
                        ),
                        $sql_tabs['stammdaten']['betreuer'].'='.$db->dbzahl($uid).' or '.
                        $sql_tabs['stammdaten']['zusatztext1'].' LIKE '.$db->str('%,'.$uid.',%')
                    );
                    $alle_stammdaten = array();
                    while ($rrow = $db->zeile($rr)) {
                        $sqlt = $sqlt_neu;
                        if (!empty($rrow[0])) {
                            $bIds = explode(',', trim($rrow[0], ','));
                            if (!in_array($moveto, $bIds)) {
                                $bIds[] = $moveto;
                                $sqlt[$sql_tabs['stammdaten']['zusatztext1']] = $db->str(',' . implode(',', $bIds) . ',');
                            }
                        }
                        if (!empty($sqlt)) {
                            $alle_stammdaten[$rrow[2]] = $sqlt;
                        }
                    }
                    foreach ($alle_stammdaten as $id => $sqlt_array) {
                        $db->update(
                            $sql_tab['stammdaten'],
                            $sqlt_array,
                            $sql_tabs['stammdaten']['id'].'='.$db->dbzahl($id)
                        );
                    }
                } else {
                    if (!empty($sqlt_neu)) {
                        $db->update(
                            $sql_tab['stammdaten'], $sqlt_neu, $sql_tabs['stammdaten']['betreuer'].'='.$db->dbzahl($uid)
                        );
                    }
                }
            }
			$db->update(
				$sql_tab['stammdaten'],
				array(
                    $sql_tabs['stammdaten']['betreuer'] => $db->dbzahl($moveto)
                ),
				$sql_tabs['stammdaten']['betreuer'].'='.$db->dbzahl($uid)
			);
			$db->update(
				$sql_tab['kalender'],
				array(
					$sql_tabs['kalender']['user_id'] => $db->dbzahl($moveto)
				),
				$sql_tabs['kalender']['user_id'].'='.$db->dbzahl($uid).' and '.
					$sql_tabs['kalender']['stammdaten_id'].'!=0'
			);
			$db->update(
				$sql_tab['kalender'],
				array(
					$sql_tabs['kalender']['betreuer'] => $db->dbzahl($moveto)
				),
				$sql_tabs['kalender']['betreuer'].'='.$db->dbzahl($uid).' and '.
					$sql_tabs['kalender']['stammdaten_id'].'!=0'
			);
			$db->update(
				$sql_tab['kalender_erledigt'],
				array(
					$sql_tabs['kalender_erledigt']['user_id'] => $db->dbzahl($moveto)
				),
				$sql_tabs['kalender_erledigt']['user_id'].'='.$db->dbzahl($uid)
			);
			$db->update(
				$sql_tab['protokoll'],
				array(
					$sql_tabs['protokoll']['bearbeiter_id'] => $db->dbzahl($moveto)
				),
				$sql_tabs['protokoll']['bearbeiter_id'].'='.$db->dbzahl($uid)
			);
			$db->update(
				$sql_tab['vertrag'],
				array(
					$sql_tabs['vertrag']['benutzer_id'] => $db->dbzahl($moveto)
				),
				$sql_tabs['vertrag']['benutzer_id'].'='.$db->dbzahl($uid)
			);
			$db->update(
				$sql_tab['datei'],
				array(
					$sql_tabs['datei']['benutzer_id'] => $db->dbzahl($moveto)
				),
				$sql_tabs['datei']['benutzer_id'].'='.$db->dbzahl($uid)
			);
			$db->update(
				$sql_tab['datei_revision'],
				array(
					$sql_tabs['datei_revision']['benutzer_id'] => $db->dbzahl($moveto)
				),
				$sql_tabs['datei_revision']['benutzer_id'].'='.$db->dbzahl($uid)
			);
			$db->update(
				$sql_tab['sofortnachricht'],
				array(
					$sql_tabs['sofortnachricht']['benutzer_id'] => $db->dbzahl($moveto)
				),
				$sql_tabs['sofortnachricht']['benutzer_id'].'='.$db->dbzahl($uid)
			);
			$db->update(
				$sql_tab['useronline'],
				array(
					$sql_tabs['useronline']['benutzer_id'] => $db->dbzahl($moveto)
				),
				$sql_tabs['useronline']['benutzer_id'].'='.$db->dbzahl($uid)
			);
			$db->update(
				$sql_tab['pinnwand'],
				array(
					$sql_tabs['pinnwand']['user_id'] => $db->dbzahl($moveto)
				),
				$sql_tabs['pinnwand']['user_id'].'='.$db->dbzahl($uid)
			);
			$db->update(
				$sql_tab['telefonleitfaden_antworten'],
				array(
					$sql_tabs['telefonleitfaden_antworten']['user_id'] => $db->dbzahl($moveto)
				),
				$sql_tabs['telefonleitfaden_antworten']['user_id'].'='.$db->dbzahl($uid)
			);
			$db->update(
				$sql_tab['telefonleitfaden_nichterreicht'],
				array(
					$sql_tabs['telefonleitfaden_nichterreicht']['benutzer_id'] => $db->dbzahl($moveto)
				),
				$sql_tabs['telefonleitfaden_nichterreicht']['benutzer_id'].'='.$db->dbzahl($uid)
			);
			$db->update(
				$sql_tab['telefonleitfaden_nichterreicht_detail'],
				array(
					$sql_tabs['telefonleitfaden_nichterreicht_detail']['benutzer_id'] => $db->dbzahl($moveto)
				),
				$sql_tabs['telefonleitfaden_nichterreicht_detail']['benutzer_id'].'='.$db->dbzahl($uid)
			);
			$db->update(
				$sql_tab['telefonleitfaden_zugriff'],
				array(
					$sql_tabs['telefonleitfaden_zugriff']['benutzer_id'] => $db->dbzahl($moveto)
				),
				$sql_tabs['telefonleitfaden_zugriff']['benutzer_id'].'='.$db->dbzahl($uid)
			);
			$db->update(
				$sql_tab['telefonleitfaden_zugriff_detail'],
				array(
					$sql_tabs['telefonleitfaden_zugriff_detail']['benutzer_id'] => $db->dbzahl($moveto)
				),
				$sql_tabs['telefonleitfaden_zugriff_detail']['benutzer_id'].'='.$db->dbzahl($uid)
			);
            $db->update(
                $sql_tab['kampagne_lead'],
                array(
                    $sql_tabs['kampagne_lead']['benutzer_id'] => $db->dbzahl($moveto),
					$sql_tabs['kampagne_lead']['letzte_aenderung'] => $db->dbtimestamp(time())
                ),
                $sql_tabs['kampagne_lead']['benutzer_id'].'='.$db->dbzahl($uid)
            );
            $db->update(
                $sql_tab['kampagne_lead'],
                array(
                    $sql_tabs['kampagne_lead']['ersteller_id'] => $db->dbzahl($moveto),
					$sql_tabs['kampagne_lead']['letzte_aenderung'] => $db->dbtimestamp(time())
                ),
                $sql_tabs['kampagne_lead']['ersteller_id'].'='.$db->dbzahl($uid)
            );
            $db->update(
                $sql_tab['veranstaltung'],
                array(
                    $sql_tabs['veranstaltung']['benutzer_id'] => $db->dbzahl($moveto)
                ),
                $sql_tabs['veranstaltung']['benutzer_id'].'='.$db->dbzahl($uid)
            );
            foreach (array('benutzer_id', 'eingeladen_benutzer_id', 'erinnert_benutzer_id', 'zugesagt_benutzer_id', 'bezahlt_benutzer_id', 'teilgenommen_benutzer_id', 'abgesagt_benutzer_id', 'vorabinfo_benutzer_id', 'terminblocker_benutzer_id') as $value) {
                $db->update(
                  $sql_tab['stammdaten_veranstaltung'],
                  array(
                      $sql_tabs['stammdaten_veranstaltung'][$value] => $db->dbzahl($moveto)
                  ),
                  $sql_tabs['stammdaten_veranstaltung'][$value].'='.$db->dbzahl($uid)
              );  
            }
        }
    }
    
    if ($_SESSION['crm_version']>64) {
        $cfg_kfzsuche_pfkal_woche_scrollen=true;
        $cfg_kfzsuche_pfbalken_sofeiertag_rot=true;
        $cfg_kfzsuche_pfkal_farbzeilen=true;
        $cfg_kfzsuche_kennzeichen_wie_startportal=true;
        $cfg_menu_suche_ab=999;
        $cfg_kundensuche_enter=true;
        $cfg_pim_wvl_datum_ende=true;
    }
