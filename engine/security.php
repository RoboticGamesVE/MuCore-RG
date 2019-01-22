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
function check_inject($type) { 
    $badchars = array("DROP", "drop", "UPDATE", "update", "SELECT", "select", "DELETE", "delete", "WHERE", "where", "CREATE", "create", "TABLE", "table", "*", "'", '"', "$", "(", ")", "`", ";", "/", " \ ", "-1", "-2", "-3", "-4", "-5", "-6", "-7", "-8", "-9");
 // $badchars = array(";","'","*","/"," \ ","DROP", "SELECT", "UPDATE", "DELETE", "drop", "select", "update", "delete", "WHERE", "where", "-1", "-2", "-3","-4", "-5", "-6", "-7", "-8", "-9");
    foreach($type as $value) { 
    $value = clean_variable($value);
    if(in_array($value, $badchars)) { 
        die("SQL Injection Detected - Make sure only to use letters and numbers!\n<br />\nIP: ".$_SERVER['REMOTE_ADDR']);
    }   else { 
            $check = preg_split("//", $value, -1, PREG_SPLIT_OFFSET_CAPTURE); 
            foreach($check as $char) { 
                if(in_array($char, $badchars)) { 
                    die("SQL Injection Detected - Make sure only to use letters and numbers!\n<br />\nIP: ".$_SERVER['REMOTE_ADDR']); 
                }
            }
        }
    }
}
  
function clean_variable($var) { 
    $newvar = preg_replace('/[^a-zA-Z0-9\_\-\@\\/ \!\    \=\>\<\
\#\$\%\^\.\+\-\&\*\?\;\(\)\`\:\.\}\{\]\[]/', '', $var);
    return $newvar;
    /*return str_replace("/", "",$newvar);*/
};
$_REQUEST = clean_variable($_REQUEST);
$_POST = clean_variable($_POST);
$_GET = clean_variable($_GET);
$_COOKIE = clean_variable($_COOKIE);
$_SESSION = clean_variable($_SESSION); 
?>