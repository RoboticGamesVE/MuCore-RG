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
if (!isset($_POST['process_login'])) {
    if ($user_login != '1') {
        echo '
    <form action="' . ROOT_INDEX . '?' . LOAD_GET_PAGE . '=' . LOGIN_CMS_PAGE . '" method="POST" name="login_process">
    <div style="width: 100%" align="center">
    <table width="320" border="0" align="center" cellpadding="0" cellspacing="6" style="margin-top: 20px; margin-bottom: 20px;">
  <tr>
    <td colspan="2" class="iRg_text" align="left"><input type="text" name="uss_id" class="iRg_input" maxlength="10" style="width: 260px;height: 32px;border: none;background: #FFF;padding: 0 8px;color: #b5b5b5;font: 14px/32px "Helvetica Neue", Arial, Helvetica, sans-serif; margin-bottom:10px; " placeholder="UserID"></td>
  </tr>
  <tr>
    <td width="157" align="left">
		<input type="password" name="uss_password" class="iRg_input" maxlength="10" style="margin-bottom:10px; width: 260px;height: 32px;border: none;background: #FFF;padding: 0 8px;color: #b5b5b5;font: 14px/32px "Helvetica Neue", Arial, Helvetica, sans-serif;" placeholder="Password">
	</td>
  </tr>
  
  <tr>
  <td>
  <div class="Tdd">
                            <label class="label_checkboxT">
                                <input name="" id="headerRememberMe" checked="checked" value="" type="checkbox">
                                Remember me                            </label>
                            <a href="' . ROOT_INDEX . '?' . LOAD_GET_PAGE . '=' . LOSTPASSWORD_CMS_PAGE . '" class="btn_forgotPaswT fr" style="margin-right:45px; color:#fe6c00;">Forgot Password?</a>
                        </div>
  </td>
  </tr>
  
  <tr> 
	<td width="203" align="left">
  		<input type="submit" name="Submit" value="' . button_log_in . '" style="display:block; width: 276px; height: 42px; text-align:center; line-height: 42px; font-size: 22px; color:#FFF; background:#fe9500; border:none"> 
		<input type="hidden" name="process_login">
	</td>
  </tr>
  
  <tr>
</table>
</div>
</form>
';
    } else {
        echo '<div style="margin: 10px;" align="center">It appears as though you are already logged in.</div>';
        
    }
} elseif (isset($_POST['process_login'])) {
    $check_restrict = file("engine/cache/login/login_restrict.txt");
    //DELETE EXPIRED ATTEMPTS
    foreach ($check_restrict as $delete_restrict) {
        $delete_restrict = explode("|", $delete_restrict);
        $rest_time       = $delete_restrict[1] - time();
        if ($rest_time <= 0) {
            $old_restrict_login = file("engine/cache/login/login_restrict.txt");
            $new_restrict_login = fopen("engine/cache/login/login_restrict.txt", "w");
            foreach ($old_restrict_login as $old_restrict_line) {
                $restrict_line = explode("|", $old_restrict_line);
                if ($restrict_line[1] != $delete_restrict[1]) {
                    fwrite($new_restrict_login, $old_restrict_line);
                }
            }
            fclose($new_restrict_login);
            $old_restrict_login2 = file("engine/cache/login/login_attempts.txt");
            $new_restrict_login2 = fopen("engine/cache/login/login_attempts.txt", "w");
            foreach ($old_restrict_login2 as $old_restrict_line2) {
                $restrict_line2 = explode("|", $old_restrict_line2);
                if ($restrict_line2[0] != $delete_restrict[0]) {
                    fwrite($new_restrict_login2, $old_restrict_line2);
                }
            }
            fclose($new_restrict_login2);
        }
    }
    
    if (empty($_POST['uss_id']) || empty($_POST['uss_password'])) {
        header('location: ' . $core_run_script . '');
    } else {
        foreach ($check_restrict as $restrict_mode) {
            $restrict_mode = explode("|", $restrict_mode);
            if ($restrict_mode[0] == $_SERVER['REMOTE_ADDR']) {
                $login_access_restricted = 1;
                break;
            }
        }
        if ($login_access_restricted == '1') {
            echo '<div style="margin: 10px;">' . text_wrong_login_ban . '</div>';
        } else {
            require("engine/securelogin.class.php");
            $user_auth                        = new securelogin;
            $user_auth->handler['checklogin'] = 'uss_login_check';
            $user_auth->handler['encode']     = 'md5_encrypt';
            $user_auth->post_index            = array(
                'user' => 'uss_id',
                'pass' => 'uss_password'
            );
            $user_auth->use_cookie            = false;
            $user_auth->use_session           = true;
            if ($user_auth->haslogin(true)) {
                $user_auth->savelogin();
                $user_login = '1';
            }
            if ($user_login == '1') {
                //LOGIN SUCCESS, DELETE PREVIOUD ATTEMPTS
                $old_restrict_login2 = file("engine/cache/login/login_attempts.txt");
                $new_restrict_login2 = fopen("engine/cache/login/login_attempts.txt", "w");
                foreach ($old_restrict_login2 as $old_restrict_line2) {
                    $restrict_line2 = explode("|", $old_restrict_line2);
                    if ($restrict_line2[0] != $_SERVER['REMOTE_ADDR']) {
                        fwrite($new_restrict_login2, $old_restrict_line2);
                    }
                }
                fclose($new_restrict_login2);
                
                
                //DELETE LAST URL SESSION
                $last_url = $_SESSION['last_url'];
                unset($_SESSION['last_url']);
                
                //REDIRECT
                if (isset($last_url)) {
                    header('Location: ' . $last_url . '');
                } else {
                    header('Location: ' . ROOT_INDEX . '?' . LOAD_GET_PAGE . '=' . USER_CMS_PAGE . '&' . USER_GET_PAGE . '=' . HOME_CMS_USER . '');
                }
                
            } else {
                //LOGIN FAIL, INSERT ATTEMPT
                $ip                 = $_SERVER['REMOTE_ADDR'];
                $attempts_file      = "engine/cache/login/login_attempts.txt";
                $open_attempts_file = fopen($attempts_file, 'a');
                fwrite($open_attempts_file, "$ip|\r\n");
                fclose($open_attempts_file);
                
                //COUNT ATTEMPTS
                $check_attempts = file($attempts_file);
                $attempts_count = 0;
                foreach ($check_attempts as $attempts) {
                    $attempts = explode("|", $attempts);
                    if ($_SERVER['REMOTE_ADDR'] == $attempts[0]) {
                        $attempts_count++;
                    }
                }
                
                //BLOCK IP IF MAX ATTEMPTS REACH
                if ($attempts_count >= 5) {
                    $ban_time           = time() + 900;
                    $restrict_file      = "engine/cache/login/login_restrict.txt";
                    $open_restrict_file = fopen($restrict_file, 'a');
                    fwrite($open_restrict_file, "$ip|$ban_time|\r\n");
                    fclose($open_restrict_file);
                }
                echo '<div style="margin: 10px;">' . str_replace("{attempts_count}", $attempts_count, text_wrong_login) . '</div>';
            }
        }
    }
}
?> 