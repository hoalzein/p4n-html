<?php

class Template_Config_Js {

    public static function getContentFiles() {
        global $phs;
        
        $temp_arr=array();
        $temp_arr[]='ohne_frameset';
        $temp_arr[]='perfect-scrollbar';
        $temp_arr[]='picker';
        $temp_arr[]='picker.date';
        $temp_arr[]='picker.time';
        $temp_arr[]='ripple-effect';
        $temp_arr[]='template_breadcrumps';
        $temp_arr[]='template_button';
        $temp_arr[]='template_card';
        $temp_arr[]='template_checkinput';
        $temp_arr[]='template_datepicker';
        $temp_arr[]='template_fileinput';
        $temp_arr[]='template_form';
        $temp_arr[]='template_gridtable';
        $temp_arr[]='template_inlineoverlay';
        $temp_arr[]='template_link';
        $temp_arr[]='template_progressbar';
        $temp_arr[]='template_selectinput';
        $temp_arr[]='template_sorts';
        $temp_arr[]='template_table';
        $temp_arr[]='template_textinput';
        $temp_arr[]='template_timepicker';
        $temp_arr[] = 'template_textarea';
        $temp_arr[] = 'template_tooltip';
        $temp_arr[] = 'template_text';
        $temp_arr[] = 'template_request';
        $temp_arr[] = 'md5';

        $arr=array(
            array(
               'datei'=>'',
               'cache'=>true,
               'pfad'=>'inc/Template/js/',
               'files'=>
                $temp_arr
            ),
        );
        
        return $arr;
    }
     
    public static function getContentJs() {
        global $cfg_basedir;
        $return='';
        $arr=Template_Config_js::getContentFiles();
        
        foreach($arr as $seperate_cache) {
            $cache=$seperate_cache['cache'];
            $pfad=$seperate_cache['pfad'];
            $files=$seperate_cache['files'];
            $datei=$seperate_cache['datei'];
            if ($cache==true) {
                $return.=Template_Config_js::createCacheFile($files,$cfg_basedir.$pfad,'content',$datei);
            } else {
                $return.=Template_Config_js::createScriptFile($files,$pfad);
            }
        }
        return $return;
    }
    
    public static function createScriptFile($arr,$pfad) {
        global $cfg_basedir;
        $return='';
        foreach ($arr as $j) {
            if (file_exists($pfad . $j . '.js')) {
                $return.='<script type="text/javascript" src="' . $cfg_basedir . $pfad . $j . '.js" ></script>' . "\n";
            }
        }
        return $return;
    }
    
    public static function createCacheFile($arr,$pfad,$bez,$datei) {
        global $phs, $cfg_basedir;
        $stil='';
        
        if (!is_dir($cfg_basedir.'inc/Template/js/archive/')) {
            mkdir($cfg_basedir.'inc/Template/js/archive/',0700);
        }
        
        $getfiles='';
        $aFiles=array();
        foreach ($arr as $j) {
            if (is_file($pfad . $j . '.js')) {
                $aFiles[] = $pfad .$j . '.js';
                $getfiles.=urlencode($pfad .$j . '.js').';';
            } else {
                //echo 'Achtung: '.$pfad.$j.' existiert nicht!';
            }
        }
        
        $version=Template_Config_js::getCacheVersion($aFiles);
        
        if (!is_dir($pfad.'archive')) {
            mkdir($pfad.'archive', 0777, true);
        }
        $neu=false;
        if (!is_file($pfad.'archive/'.($_SESSION['design_70']?'design-70-':'').$version.(!empty($stil)?'_'.$stil:'').'-'.$bez.(!empty($datei)?'-'.$datei:'').'.cache')) {
            $version=time();
            $neu=true;
        }
        if (!isset($_GET['no_cache_js'])) {
            $return='<script type="text/javascript" src="'.Template_Config_js::writeNewJsFile($pfad,$version,$neu,$stil,$bez,$getfiles,$datei).'"></script>' . "\n";
            //$return='<script type="text/javascript" src="'.$pfad.'cache.php?version='.$version.($neu?'&neu=1':'').'&stil='.$stil.'&bez='.$bez.'&files='.$getfiles.(!empty($datei)?'&datei='.$datei:'').'"></script>' . "\n";
        }
        return $return;
    }
    
    public static function getCacheVersion($aFiles) {
        $aLastModifieds = array();
        foreach ($aFiles as $sFile) {
                $aLastModifieds[] = filemtime($sFile);
        }
        rsort($aLastModifieds);
        return $aLastModifieds[0];
    }
    
    public static function deleteFilesFromDirectory($ordnername, $stil = '', $bez = '', $datei = '') {
        if (is_dir($ordnername)) {
            if ($dh = opendir($ordnername)) {
                while (($file = readdir($dh)) !== false) {
                    if ($file != "." AND $file != "..") {

                        if ($stil != '' && preg_match('/' . $stil . $bez . $datei . '\.js/is', $file)) {
                            unlink("" . $ordnername . "" . $file . "");
                        } else if ($stil == '' && !preg_match('/\_/is', $file)) {
                            unlink("" . $ordnername . "" . $file . "");
                        }
                        
                        if (preg_match('/\.cache/is', $file)) {
                            unlink("" . $ordnername . "" . $file . "");
                        }
                    }
                }
                closedir($dh);
            }
        }
    }
    
    public static function writeNewJsFile($gpfad='',$gversion=0,$gneu=false,$gstil='',$gbez='',$gfiles='',$gdatei='') {
 
        $sDocRoot = './';

        $aFiles = array();
        if (isset($gfiles) && $gfiles != '') {
            $files = urldecode($gfiles);
            $files_arr = explode(';', $files);
            if (is_array($files_arr) && count($files_arr) > 0) {
                foreach ($files_arr as $j) {
                    if (is_file($sDocRoot . $j)) {
                        $aFiles[] = $j;
                    }
                }
            }
        }

        if (isset($gbez) && $gbez != '') {
            $bez = '-' . $gbez;
        }

        if (isset($gstil) && $gstil != '') {
            $stil = '_' . $gstil;
        }

        if (isset($gdatei) && $gdatei != '') {
            $datei = '-' . $gdatei;
        }

        if (isset($gversion)) {
            $iETag = (int) $gversion;

            if (isset($gneu) && $gneu == true) {
                $aLastModifieds = array();
                foreach ($aFiles as $sFile) {
                    $pfad = $sDocRoot . $sFile;
                    $aLastModifieds[] = filemtime($pfad);
                }
                rsort($aLastModifieds);
                $iETag = $aLastModifieds[0];
            }

            if (!is_dir('./'.$gpfad . 'archive')) {
                mkdir('./' .$gpfad. 'archive');
            }

            if (file_exists('./'.$gpfad . 'archive' . '/' . ($_SESSION['design_70']?'design-70-':'').$iETag . $stil . $bez . $datei . '.js')) {
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
                    Template_Config_js::deleteFilesFromDirectory('./' . $gpfad.'archive' . '/', $stil, str_replace('-', '\-', $bez), str_replace('-', '\-', $datei));
                    $oFile = fopen('./' .$gpfad. 'archive' . '/' . ($_SESSION['design_70']?'design-70-':'').$iETag . $stil . $bez . $datei . '.js', 'w+');

                    //$sCode = Modern_Config_Css::replaceAllColor($sCode, '', $gstil);
                    //$sCode = Modern_Config_Css::replaceIcons($sDocRoot, $sCode, '', $gstil);

                    fwrite($oFile, $sCode);
                    fclose($oFile);
                }
            }

            return './' .$gpfad. 'archive' . '/' . ($_SESSION['design_70']?'design-70-':'').$iETag . $stil . $bez . $datei . '.js';
        }
    }
}
