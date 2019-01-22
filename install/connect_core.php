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
require("../engine/adodb/adodb.inc.php");

if($core['connection_type'] == "ODBC"){
    $core_db = ADONewConnection('odbc');
    if($core['debug'] == 1){ $core_db->debug = true; }
    $core_db_connect_sql = $core_db->PConnect($core['db_name'],$core['db_user'],$core['db_password'],$core['db_host']);
    if(!$core_db_connect_sql){
        $sql_part = '1';
        include('../error_templates/sql_error.php');
        exit;
    }
    $core_db2 = $core_db;
    if($core['server_use_2_db'] == "1"){
        $core_db2 = ADONewConnection('odbc');
        if($core['debug'] == 1){ $core_db2->debug = true; }
        $core_db_connect_sql2 = $core_db2->NConnect($core['db_name2'],$core['db_user2'],$core['db_password2'],$core['db_host2']);
        if(!$core_db_connect_sql2){
            $sql_part = '2';
            include('../error_templates/sql_error.php');
            exit;
        }
        $core_db2 = $core_db2;
    }
}elseif ($core['connection_type'] == "MSSQL"){
    $core_db = ADONewConnection('mssql');
    if($core['debug'] == 1){ $core_db->debug = true; }
    $core_db_connect_sql = $core_db->PConnect($core['db_host'],$core['db_user'],$core['db_password'],$core['db_name']);
    if(!$core_db_connect_sql){
        $sql_part = '1';
        include('../error_templates/sql_error.php');
        exit;
    }
    $core_db2 = $core_db;
    if($core['server_use_2_db'] == "1"){
        $core_db2 = ADONewConnection('mssql');
        if($core['debug'] == 1){ $core_db2->debug = true; }
        $core_db_connect_sql2 = $core_db2->NConnect($core['db_host2'],$core['db_user2'],$core['db_password2'],$core['db_name2']);
        if(!$core_db_connect_sql2){
            $sql_part = '2';
            include('../error_templates/sql_error.php');
            exit;
        }
        $core_db2 = $core_db2;
    }
}
?>