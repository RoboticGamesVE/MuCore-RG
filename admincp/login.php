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
require('../engine/global_config.php');

if ($_GET["errorcaptcha"]=="si"){
	$error = '<span style="background-color: red"><b>Captcha incorrecto</b></span>';
} elseif ($_GET["errorusuario"]=="si"){
	$error = '<span style="background-color: red"><b>Datos incorrectos</b></span>';
} else {
	$error = 'Login';
}
?>

<!DOCTYPE html>
<html>
<head>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<meta charset="UTF-8">
<title>Login - Admin control panel</title>
<style>
body {background: url('modulo-login/images/background.jpg') no-repeat fixed top center; background-size: cover; font-family: Montserrat}
.logo {margin: 50px auto 30px auto; color:#fff; font-size:35px}
.login-block {width: 320px; padding: 20px; background: #fff; border-radius: 5px; border-top: 5px solid #ff656c; margin: 0 auto}
.login-block h1 {text-align: center; color: #000; font-size: 18px; text-transform: uppercase; margin-top: 0; margin-bottom: 20px}
.login-block input { width: 100%; height: 42px; box-sizing: border-box; border-radius: 5px; border: 1px solid #ccc; margin-bottom: 20px; font-size: 14px; font-family: Montserrat; padding: 0 20px 0 50px; outline: none}
.login-block input#username { background: #fff url('modulo-login/images/username.png') 20px top no-repeat; background-size: 16px 80px}
.login-block input#username:focus { background: #fff url('modulo-login/images/username.png') 20px bottom no-repeat; background-size: 16px 80px}
.login-block input#password { background: #fff url('modulo-login/images/password.png') 20px top no-repeat; background-size: 16px 80px}
.login-block input#password:focus {background: #fff url('modulo-login/images/password.png') 20px bottom no-repeat; background-size: 16px 80px}
.login-block input:active, .login-block input:focus { border: 1px solid #ff656c}
.login-block button {width: 100%; height: 40px; background: #ff656c; box-sizing: border-box; border-radius: 5px; border: 1px solid #e15960; color: #fff; font-weight: bold; text-transform: uppercase; font-size: 14px; font-family: Montserrat; outline: none; cursor: pointer}
.login-block button:hover {background: #ff7b81}
</style>
</head>
<body>
<div class="logo" align="center"><strong><? echo $core["config"]["websitetitle"] ?></strong></div>
<div class="login-block">
<h1>
<?php echo $error; ?>
</h1>
<form id="login" action="modulo-login/control.php" name="captcha-form" method="POST">
<input type="text" value="" placeholder="Username" id="username" name="username" maxlength="15" required />
<input type="password" value="" placeholder="Password" id="password" name="password" maxlength="20" required />
<br />
<img src="modulo-login/captcha.php" border="0" />
<br />
<input type="text" id="password" name="code" width="25" />
<br />
<button>Submit</button>
</form>
</div>
</body>
</html>