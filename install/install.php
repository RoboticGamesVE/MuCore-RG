<?php
/**
 * 2017-2018 RoboticGames
 * NOTICE OF LICENSE
 * This source file is subject to the Open Software License (OSL 3.0)
 * https://opensource.org/licenses/OSL-3.0
 *
 * DISCLAIMER
 * Do not edit or add to this file if you wish to upgrade RoboticGames to newer
 * versions in the future. If you wish to customize RoboticGames for your
 * needs please refer to http://roboticgames.web.ve for more information.
 *
 * @author    RoboticGames FP <roboticgames.ve@gmail.com>
 * @copyright 2017-2018 RoboticGames FP
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * @Credits   Isumeru & MaryJo & Dao Van Trong - Trong.CF                      ¦
*/
require ('../config.php');
require ('../engine/global_config.php');
require ('../engine/global_functions.php');
require ('../engine/adodb/adodb.inc.php');

if ($core['debug'] == '1') {
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
} else {
    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_WARNING);
}

if (!isset($_GET['step'])) {
    $step_proccess = 'Preparing to Install';
} else {
    $step_count = safe_input($_GET['step'], '\_');
    $step_count = substr_replace($step_count, "", 0, -1);
    $step_proccess = 'Step (' . $step_count . '/8)';
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Install Mucore 1.0.8 by RoboticGames</title>
    
    <!-- Favicon-->
    <link rel="icon" href="../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../admincp/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Custom Css -->
    <link href="../admincp/css/style.css" rel="stylesheet">
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../admincp/css/themes/all-themes.css" rel="stylesheet" />
    
<style type="text/css">
body{background:#FFF;color:#000;font:11px tahoma,verdana,geneva,lucida,'lucida grande',arial,helvetica,sans-serif;margin:0;padding:0}
a:hover{text-decoration:none;color:#333}
.border_big a{text-decoration:none;color:#CCC}
.border_big a:hover{text-decoration:underline;color:#CCC}
.nav_table a:link,.nav_table a:visited,nav_table a:active{text-decoration:none}
.nav_table a:hover{text-decoration:none}
.cat{background:#465786;color:#FFF;font:bold 10pt verdana,geneva,lucida,'lucida grande',arial,helvetica,sans-serif;padding:2px}
.border{background:#F2F2F2;color:#000;border:outset 1px #DEE0E2}
.border_big{background:#F2F2F2;color:#000;border-right:outset 1px #DEE0E2}
.cat_big{background:#333;color:#FFF;font:bold 12px verdana,geneva,lucida,'lucida grande',arial,helvetica,sans-serif;padding:3px;box-shadow:0 1px 5px #000}
.left_table{color:#000;padding:5px}
.nav_table{background:#DEE0E2;color:#CCC;box-shadow:0 1px 5px #000}
.nav_title{text-align:center;background:#333;color:#CCC;font:bold 12px verdana,geneva,lucida,'lucida grande',arial,helvetica,sans-serif;padding:5px}
.nav_title_sub{background:#fff;color:#FFF;padding:4px;padding-left:5px;box-shadow:0 1px 5px #000}
.nav_title_sub:hover{background:#F8F8F8;color:#FFF;padding:4px;padding-left:3px}
input,option,select,textarea{font:bold 11px tahoma,verdana,geneva,lucida,'lucida grande',arial,helvetica,sans-serif}
.smallfont{font:10px verdana,geneva,lucida,'lucida grande',arial,helvetica,sans-serif}
.curent_version{font:11px tahoma,verdana,geneva,lucida,'lucida grande',arial,helvetica,sans-serif}
.last_version a{font:11px tahoma,verdana,geneva,lucida,'lucida grande',arial,helvetica,sans-serif;text-decoration:underline}
.module_title{background:#EFEFEF;font:bold 14px tahoma,verdana,geneva,lucida,'lucida grande',arial,helvetica,sans-serif;color:#7C7C7C;padding:2px;border:inset 1px #DEE0E2;box-shadow:0 1px 5px #000}
.table_panel{background:#fff;color:#000;border:outset 1px #DEE0E2;box-shadow:0 1px 5px #000;width: 688px;}
.panel_title{background:#333;color:#FFF;font:bold 10pt verdana,geneva,lucida,'lucida grande',arial,helvetica,sans-serif;padding:5px;box-shadow:0 1px 5px #000}
.panel_title_sub{background:#CCC;font:bold 11px tahoma,verdana,geneva,lucida,'lucida grande',arial,helvetica,sans-serif;padding:3px;padding-left:4px;color:#595959;box-shadow:0 1px 1px #000}
.panel_title_sub2{background:#B0BDD3;font:bold 11px tahoma,verdana,geneva,lucida,'lucida grande',arial,helvetica,sans-serif;padding:2px;padding-left:4px;color:#595959;border:outset 1px #666}
.panel_text_alt1{height:20px;padding:8px 8px 8px 4px}
.panel_text_area{padding:10px}
.panel_text_alt2{height:20px;padding:8px 8px 8px 4px}
.panel_text_alt_list{height:20px;color:#666;padding:8px 8px 8px 4px}
.panel_buttons{background:#EEE;padding:8px;border-top:outset 1px #666}
input[type="radio"]{border:0}
.even{background:#EAEAEA}
a.info_l{text-decoration:none;cursor:default}
a.info_l:hover{text-decoration:none}
.info_show{background-color:#fff;padding:5px 10px;border:1px solid #999;width:130px;position:absolute;filter:progid:DXImageTransform.Microsoft.Shadow(color="#777777",Direction=135,Strength=3);z-index:10000}
.rss_feed{background:url(arrow.gif) no-repeat left;padding-left:18px;line-height:23px;font-size:12px}
</style>
</head>

<body class="theme-red">
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="">Preinstall Assistant. MuCore Version <?php echo $core['version']; ?> by <?php echo $core['by']; ?></a>
            </div>
            
            <div class="navbar-header" style="float:right">
                <a class="navbar-brand" href=""> <?php echo $step_proccess; ?> </a>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
<br />
<br />
<br />
<br />
<div align="center">

<div align="center" style="margin-top: 40px; margin-bottom: 40px;"><?php

if (!isset($_GET['step'])) {
    include ('step.php');
} else {
    $step = safe_input($_GET['step'], '\_');
    if (is_file($step . '.php')) {
        include ($step . '.php');
    } else {
        echo '' . $step . ' not found';
    }
}
?>
</div>
</div>
</body>
</html>