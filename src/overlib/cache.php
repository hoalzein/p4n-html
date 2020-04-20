<?php @session_start();

define('FILE_TYPE', 'application/javascript');
define('CACHE_LENGTH', 31356000);
define('CREATE_ARCHIVE', true);
define('ARCHIVE_FOLDER', 'archive');

if (file_exists('../inc/Modern/Config/Css.php')) {
    include('../inc/Modern/Config/Css.php');
}
if (file_exists('../inc/Modern/Helper/Stile.php')) {
    include('../inc/Modern/Helper/Stile.php');
}

$sDocRoot = '../';

if (isset($_GET['temp_file'])) {
   // $sCode=file_get_contents($sDocRoot .'inc/Modern/js/' . ARCHIVE_FOLDER . '/'.$_GET['temp_file'].'.cache');
    $sCode=$_SESSION['modern']['farbschema_js'];
    header('Expires: ' . gmdate('D, d M Y H:i:s', time() + CACHE_LENGTH) . ' GMT'); // 1 year from now
    header('Content-Type: ' . FILE_TYPE);
    header('Content-Length: ' . strlen($sCode));
    header('Cache-Control: max-age=' . CACHE_LENGTH);
    echo $sCode;
    exit;
}

if (isset($_GET['files']) && $_GET['files']!='') {
    $aFiles=array();
    $files=urldecode($_GET['files']);
    $files_arr=explode(';',$files);
    if (is_array($files_arr) && count($files_arr) > 0) {
        foreach ($files_arr as $j) {
            if (is_file($sDocRoot . $j)) {
                $aFiles[] = $j;
            }
        }
    }
} else {
    exit;
}

if (isset($_GET['bez']) && $_GET['bez']!='') {
    $bez= '-' . $_GET['bez'];
}

if (isset($_GET['stil']) && $_GET['stil'] != '') {
    $stil = '_' . $_GET['stil'];
}

if (isset($_GET['datei']) && $_GET['datei']!='') {
    $datei= '-' . $_GET['datei'];
}

function deleteFilesFromDirectory($ordnername, $stil='',$bez='',$datei='') {
    if (is_dir($ordnername)) {
        if ($dh = opendir($ordnername)) {
            while (($file = readdir($dh)) !== false) {
                if ($file != "." AND $file != "..") {
                        if ($stil != '' && preg_match('/' . $stil.$bez.$datei . '/is', $file)) {
                            unlink("" . $ordnername . "" . $file . "");
                        } else if ($stil == '' && !preg_match('/\_/is', $file)) {
                            unlink("" . $ordnername . "" . $file . "");
                        }
                }
            }
            closedir($dh);
        }
    }
}

if (isset($_GET['version'])) {
    $iETag = (int) $_GET['version'];

    if (isset($_GET['neu']) && $_GET['neu'] == 1) {
        $aLastModifieds = array();
        foreach ($aFiles as $sFile) {
            $pfad = $sDocRoot . $sFile;
            $aLastModifieds[] = filemtime($pfad);
            $sCode .= file_get_contents($pfad);
        }
        rsort($aLastModifieds);
        $iETag = $aLastModifieds[0];
    }

    $sLastModified = gmdate('D, d M Y H:i:s', $iETag) . ' GMT';

    if (
            (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && $_SERVER['HTTP_IF_MODIFIED_SINCE'] == $sLastModified) ||
            (isset($_SERVER['HTTP_IF_NONE_MATCH']) && $_SERVER['HTTP_IF_NONE_MATCH'] == $iETag)
    ) {
        header("{$_SERVER['SERVER_PROTOCOL']} 304 Not Modified");
        exit;
    }

    if (CREATE_ARCHIVE && !is_dir('./' . ARCHIVE_FOLDER)) {
        mkdir('./' . ARCHIVE_FOLDER);
    }

    if (CREATE_ARCHIVE && file_exists('./' . ARCHIVE_FOLDER . '/' . $iETag . $stil . $bez . $datei . '.cache')) {
        $sCode = file_get_contents('./' . ARCHIVE_FOLDER . '/' . $iETag . $stil . $bez . $datei . '.cache');
    } else {
        $sCode = '';
        $aLastModifieds = array();
        foreach ($aFiles as $sFile) {
            $pfad = $sDocRoot . $sFile;
            $aLastModifieds[] = filemtime($pfad);
            $sCode .= file_get_contents($pfad);
        }
        rsort($aLastModifieds);
        if (CREATE_ARCHIVE) {
            if ($iETag == $aLastModifieds[0]) {
                deleteFilesFromDirectory('./' . ARCHIVE_FOLDER . '/', $stil, str_replace('-','\-',$bez), str_replace('-','\-',$datei));
                $oFile = fopen('./' . ARCHIVE_FOLDER . '/' . $iETag . $stil . $bez . $datei . '.cache', 'w+');
                
                $sCode = Modern_Config_Css::replaceAllColor($sCode,'',$_GET['stil']);
                $sCode = Modern_Config_Css::replaceIcons($sDocRoot,$sCode,'',$_GET['stil']);

                
                fwrite($oFile, $sCode);
                fclose($oFile);
            } else {
                header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
                exit;
            }
        }
    }

    header('Expires: ' . gmdate('D, d M Y H:i:s', time() + CACHE_LENGTH) . ' GMT'); // 1 year from now
    header('Content-Type: ' . FILE_TYPE);
    header('Content-Length: ' . strlen($sCode));
    header("Last-Modified: $sLastModified");
    header("ETag: $iETag");
    header('Cache-Control: max-age=' . CACHE_LENGTH);
    echo $sCode;
}
?>