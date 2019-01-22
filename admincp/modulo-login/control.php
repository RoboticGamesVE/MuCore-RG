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

session_start( ); // allows us to retrieve our key form the session
/* 
First encrypt the key passed by the form, then compare it to the already encrypted key we have stored inside our session variable
*/
require ("../../config.php");
if( md5( $_POST[ 'code' ] ) != $_SESSION[ 'key' ] ) {
	header("Location: ../login.php?errorcaptcha=si");
} else {
	$username = null;
	$password = null;
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if(!empty($_POST["username"]) && !empty($_POST["password"])) {
			$username = md5(htmlspecialchars($_POST["username"]));
			$password = md5(htmlspecialchars($_POST["password"]));
			if($username == md5($core["admin_username"]) && $password == md5($core["admin_password"])) {
				session_start();
				$_SESSION["authenticated"] = 'true';
				header('Location: ../index.php');
			} else {
				header("Location: ../login.php?errorusuario=si");
			}	
		} else {
			header("Location: ../login.php?errorusuario=si");
		}
	} else {
		header("Location: ../login.php?errorusuario=si");
	}
}
?>