<?php

class Template_Config_Css
{

    public static function getContentFiles()
    {
        global $phs;

        $temp_arr = array();
        $temp_arr[] = 'global';
        $temp_arr[] = 'grid';
        $temp_arr[] = 'ohne_frameset';
        $temp_arr[] = 'perfect-scrollbar';
        $temp_arr[] = 'responsive';
        $temp_arr[] = 'template_breadcrumps';
        $temp_arr[] = 'template_button';
        $temp_arr[] = 'template_card';
        $temp_arr[] = 'template_checkinput';
        $temp_arr[] = 'template_datepicker';
        $temp_arr[] = 'template_datuminput';
        $temp_arr[] = 'template_fileinput';
        $temp_arr[] = 'template_form';
        $temp_arr[] = 'template_gridtable';
        $temp_arr[] = 'template_iconbutton';
        $temp_arr[] = 'template_inlineoverlay';
        $temp_arr[] = 'template_link';
        $temp_arr[] = 'template_linklist';
        $temp_arr[] = 'template_selectinput';
        $temp_arr[] = 'template_sorts';
        $temp_arr[] = 'template_table';
        $temp_arr[] = 'template_textinput';
        $temp_arr[] = 'template_timepicker';
        $temp_arr[] = 'template_progressbar';
        $temp_arr[] = 'template_textarea';
        $temp_arr[] = 'template_zeitinput';
        $temp_arr[] = 'template_elementlist';
        $temp_arr[] = 'template_tooltip';
        $temp_arr[] = 'template_text';
        $temp_arr[] = 'template_html';

        $arr = array(
            array(
                'datei' => '',
                'cache' => true,
                'pfad' => 'inc/Template/css/',
                'files' =>
                    $temp_arr
            )
        );

        return $arr;
    }


    public static function getContentCss()
    {
        global $cfg_basedir;
        $return = '';

        $arr = Template_Config_Css::getContentFiles();

        foreach ($arr as $seperate_cache) {
            $cache = $seperate_cache['cache'];
            $pfad = $seperate_cache['pfad'];
            $files = $seperate_cache['files'];
            $datei = $seperate_cache['datei'];
            if ($cache == true) {
                $return .= Template_Config_Css::createCacheFile($files, $cfg_basedir . $pfad, 'content', $datei);
            } else {
                $return .= Template_Config_Css::createScriptFile($files, $pfad);
            }
        }

        return $return;
    }


    public static function createScriptFile($arr, $pfad)
    {
        global $cfg_basedir;
        $return = '';
        foreach ($arr as $css) {
            if (file_exists($pfad . $css . '.css')) {
                $return .= '<link rel="stylesheet" type="text/css" media="all" href="' . $cfg_basedir . $pfad . $css . '.css" >' . "\n";
            }
        }
        return $return;
    }

    public static function createCacheFile($arr, $pfad, $bez, $datei)
    {
        global $phs, $cfg_basedir;
        $stil = '';

        if (!is_dir($cfg_basedir . 'inc/Template/css/archive/')) {
            mkdir($cfg_basedir . 'inc/Template/css/archive/', 0700);
        }

        $getfiles = '';
        $aFiles = array();
        foreach ($arr as $css) {
            if (is_file($pfad . $css . '.css')) {
                $aFiles[] = $pfad . $css . '.css';
                $getfiles .= urlencode($pfad . $css . '.css') . ';';
            }
        }

        $version = Template_Config_Css::getCacheVersion($aFiles);

        if (!is_dir($pfad . 'archive')) {
            mkdir($pfad . 'archive', 0777, true);
        }
        $neu = false;
        if (!is_file($cfg_basedir . $pfad . 'archive/' . ($_SESSION['design_70'] ? 'design-70-' : '') . $version . (!empty($stil) ? '_' . $stil : '') . '-' . $bez . (!empty($datei) ? '-' . $datei : '') . '.cache')) {
            $version = time();
            $neu = true;
        }
        if (!isset($_GET['no_cache_css'])) {
            $return = '<link rel="stylesheet" type="text/css" media="all" href="' . Template_Config_Css::writeNewCssFile($pfad, $version, $neu, $stil, $bez, $getfiles, $datei) . '">' . "\n";
            // $return='<link rel="stylesheet" type="text/css" media="all" href="'.$pfad.'cache.php?version='.$version.$neu.'&stil='.$stil.'&bez='.$bez.'&files='.$getfiles.(!empty($datei)?'&datei='.$datei:'').'">' . "\n";
        }
        if (isset($_GET['temp_file'])) {
            $return = '<link rel="stylesheet" type="text/css" media="all" href="' . Template_Config_Css::writeNewCssFile($pfad, 0, false, '', '', '', $datei) . '">' . "\n";
            // $return='<link rel="stylesheet" type="text/css" media="all" href="inc/Modern/css/cache.php?temp_file='.$_GET['temp_file'].'&v='.time().'">' . "\n";
        }
        return $return;
    }

    public static function getCacheVersion($aFiles)
    {
        $aLastModifieds = array();
        foreach ($aFiles as $sFile) {
            $aLastModifieds[] = filemtime($sFile);
        }
        rsort($aLastModifieds);
        return $aLastModifieds[0];
    }


    public static function deleteFilesFromDirectory($ordnername, $stil = '', $bez = '', $datei = '')
    {
        if (is_dir($ordnername)) {
            if ($dh = opendir($ordnername)) {
                while (($file = readdir($dh)) !== false) {
                    if ($file != "." and $file != "..") {
                        if ($stil != '' && preg_match('/' . $stil . $bez . $datei . '\.css/is', $file)) {
                            @unlink("" . $ordnername . "" . $file . "");
                        } else if ($stil == '' && !preg_match('/\_/is', $file)) {
                            @unlink("" . $ordnername . "" . $file . "");
                        }

                        if (preg_match('/\.cache/is', $file)) {
                            @unlink("" . $ordnername . "" . $file . "");
                        }

                    }
                }
                closedir($dh);
            }
        }
    }

    public static function writeNewCssFile($gpfad = '', $gversion = 0, $gneu = false, $gstil = '', $gbez = '', $gfiles = '', $gdatei = '')
    {

        $sDocRoot = './';

        if (isset($_GET['temp_file'])) {
            $datei = '';
            if ($gdatei != '') {
                $datei = '-' . $gdatei;
            }
            $sCode = $_SESSION['modern']['farbschema_css'];
            $oFile = fopen('./' . $gpfad . 'archive' . '/temp_' . $_SESSION['user_id'] . $datei . '.css', 'w+');
            fwrite($oFile, $sCode);
            fclose($oFile);
            return './' . $gpfad . 'archive' . '/temp_' . $_SESSION['user_id'] . $datei . '.css?' . date('dmYHis');
        }
        $aFiles = array();
        if (isset($gfiles) && $gfiles != '') {
            $files = urldecode($gfiles);
            $files_arr = explode(';', $files);
            if (is_array($files_arr) && count($files_arr) > 0) {
                foreach ($files_arr as $css) {
                    if (is_file($sDocRoot . $css)) {
                        $aFiles[] = $css;
                    }
                }
            }
        }

        if ($gbez != '') {
            $bez = '-' . $gbez;
        }

        if ($gstil != '') {
            $stil = '_' . $gstil;
        }

        if ($gdatei != '') {
            $datei = '-' . $gdatei;
        }

        if (isset($gversion)) {
            $iETag = (int)$gversion;

            if (isset($gneu) && $gneu == true) {
                $aLastModifieds = array();
                foreach ($aFiles as $sFile) {
                    $pfad = $sDocRoot . $sFile;
                    $aLastModifieds[] = filemtime($pfad);
                }
                rsort($aLastModifieds);
                $iETag = $aLastModifieds[0];
            }

            if (!is_dir('./' . $gpfad . 'archive')) {
                mkdir('./' . $gpfad . 'archive');
            }

            if (file_exists('./' . $gpfad . 'archive' . '/' . ($_SESSION['design_70'] ? 'design-70-' : '') . $iETag . $stil . $bez . $datei . '.css')) {
            } else {
                $sCode = '';
                $aLastModifieds = array();
                foreach ($aFiles as $sFile) {
                    $pfad = $sDocRoot . $sFile;
                    $aLastModifieds[] = filemtime($pfad);
                    $sCode .= file_get_contents($pfad);
                }
                rsort($aLastModifieds);
                if ($iETag == $aLastModifieds[0]) {
                    Template_Config_Css::deleteFilesFromDirectory('./' . $gpfad . 'archive' . '/', $stil, str_replace('-', '\-', $bez), str_replace('-', '\-', $datei));
                    $oFile = fopen('./' . $gpfad . 'archive' . '/' . ($_SESSION['design_70'] ? 'design-70-' : '') . $iETag . $stil . $bez . $datei . '.css', 'w+');

                    //$sCode = Template_Config_Css::replaceAllColor($sCode, '', $gstil);
                    //$sCode = Template_Config_Css::replaceIcons($sDocRoot, $sCode, '', $gstil);
                    $suche = '../fonts/';
                    $erg = '../../fonts/';
                    $sCode = str_replace($suche, $erg, $sCode);
                    $suche = '../images/';
                    $erg = '../../images/';
                    $sCode = str_replace($suche, $erg, $sCode);

                    fwrite($oFile, $sCode);
                    fclose($oFile);
                }
            }

            return './' . $gpfad . 'archive' . '/' . ($_SESSION['design_70'] ? 'design-70-' : '') . $iETag . $stil . $bez . $datei . '.css';
        }
    }
}