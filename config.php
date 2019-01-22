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

/*------------------------------------------*\
| Server Databases:                          |
|                                            |
|  0 : MuOnline [database]                   |
|  1 : MuOnline and Me_Muonline [databases]  |
\*------------------------------------------*/

$core['server_use_2_db'] = "0"; 

##############################################

/*-------------------------------------*\
| MUCore SQL Connection Type:           |
|                                       |
|  MSSQL : Connect using mssql_conect() |
|  ODBC : Connect using odbc            |
\*-------------------------------------*/

//$core['connection_type'] = "ODBC";
$core['connection_type'] = "MSSQL";

#########################################

/*--------------------------------------------------*\
| MuOnline Database Connection Settings              |
|                                                    |
| $core['db_host'] : Database host address           |
| $core['db_name'] : Database name                   |
| $core['db_use'] : SQL Authentication user          |
| $core['db_password'] : SQL Authentication password |
\*--------------------------------------------------*/

$core['db_host'] = "127.0.0.1";
      
$core['db_name'] = "MuOnline";
     
$core['db_user'] = "sa";

$core['db_password'] = "YourSqlPassword";

######################################################

/*------------------------------------------------------------------*\
| NOTE:                                                              |
| Edit this only if $core['server_use_2_db'] value is set to 1,      |
| this mean your server use MuOnline and Me_MuOnline databases.      |
|                                                                    |
| Me_MuOnline Database Connection Settings                           |
|                                                                    |
| $core['db_host2'] : Database host address                          |
| $core['db_name2'] : Database name                                  |
| $core['db_use2'] : SQL Authentication user                         |
| $core['db_password2'] : SQL Authentication password                |
\*------------------------------------------------------------------*/

$core['db_host2'] = "127.0.0.1";
       
$core['db_name2'] = "MuOnline";    
     
$core['db_user2']= "sa";

$core['db_password2'] = "YourSqlPassword";

######################################################################

/*-------------------------------------------------*\
| MUCore Admin Control Panel:                       |
|                                                   |
|  $core['admin_username'] : Administrator user     |
|  $core['admin_password'] : Administrator password |
\*-------------------------------------------------*/

$core['admin_username'] = 'admin';

$core['admin_password'] = 'admin';

#####################################################

/*-----------------------------------------------------*\
| MUCore's MUCoins SQL Table Settings:                  |
|                                                       |
|  MU_COINS_TABLE : MUCoins table name                  |
|  MU_COINS_COLUMN : MUCoins (Credits) column name      |
|  MU_COINS_USERID_COLUMN : MUCoins User ID column name |
\*-----------------------------------------------------*/

define('MU_COINS_TABLE','memb_credits');

define('MU_COINS_COLUMN','credits');

define('MU_COINS_USERID_COLUMN','memb___id');

define('MU_SCOINS_TABLE','memb_scredits');

define('MU_SCOINS_COLUMN','scredits');

define('MU_SCOINS_USERID_COLUMN','memb___sid');

#########################################################

/*--------------------------------------*\
| MUCore Debug Settings:                 |
|                                        |
|  1 : Debug enabled                     |
|  0 : Debug disabled                    |
|                                        |
| Note: Enable debug only if necessary.  |
\*--------------------------------------*/

$core['debug'] = 0;

##########################################

if (!defined('E_STRICT'))            define( 'E_STRICT', 2048 );
if (!defined('E_RECOVERABLE_ERROR')) define( 'E_RECOVERABLE_ERROR', 4096 );
if (!defined('E_DEPRECATED'))        define( 'E_DEPRECATED', 8192 );
if (!defined('E_USER_DEPRECATED'))   define( 'E_USER_DEPRECATED', 16384 );

function GetRealUserIP() {
    switch (true) {
    case (!empty($_SERVER['HTTP_X_REAL_IP'])):
        return $_SERVER['HTTP_X_REAL_IP'];
    case (!empty($_SERVER['HTTP_CLIENT_IP'])):
        return $_SERVER['HTTP_CLIENT_IP'];
    case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])):
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    default:
        return $_SERVER['REMOTE_ADDR'];
    }
}

function GetRealIP() {
    if (isset($_SERVER)) {
        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
            if (strpos($ip, ",")) {
                $exp_ip = explode(",", $ip);
                $ip = $exp_ip[0];
            }
        } else
        if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            $ip = $_SERVER["HTTP_CLIENT_IP"];
        } else {
            $ip = $_SERVER["REMOTE_ADDR"];
        }
    } else {
        if (getenv('HTTP_X_FORWARDED_FOR')) {
            $ip = getenv('HTTP_X_FORWARDED_FOR');
            if (strpos($ip, ",")) {
                $exp_ip = explode(",", $ip);
                $ip = $exp_ip[0];
            }
        } else
        if (getenv('HTTP_CLIENT_IP')) {
            $ip = getenv('HTTP_CLIENT_IP');
        } else {
            $ip = getenv('REMOTE_ADDR');
        }
    }
    return $ip;
}
?>