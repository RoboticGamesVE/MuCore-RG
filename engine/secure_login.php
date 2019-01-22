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
if($_GET[LOAD_GET_PAGE] != LOGIN_CMS_PAGE){
    require("engine/securelogin.class.php");
    $user_auth = new securelogin;
    $user_auth->handler['checklogin'] = 'uss_login_check';
    $user_auth->handler['encode'] = 'md5_encrypt';
    $user_auth->post_index = array(    'user' => 'uss_id' ,'pass' => 'uss_password' );
    $user_auth->use_cookie = false;
    $user_auth->use_session = true;
    if($user_auth->haslogin(true)){
        $user_auth->savelogin();
        $_SESSION['user_auth'] = '1';
        $_SESSION['user_auth_id'] = $user_auth->username;
    }else{
        $user_auth->clearlogin();
        unset($_SESSION['user_auth']);
        unset($_SESSION['user_auth_id']);
    }
}
/*
if($_GET[LOAD_GET_PAGE] == LOGOUT_CMS_PAGE){
    $user_auth->clearlogin();
    #header('Location: '.ROOT_INDEX.'');
    exit;
}
*/
?>