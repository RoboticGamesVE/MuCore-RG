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
    if ($get_config->topbar == 1){
?>
<header class="topBar">
<section class="topBar_main clearfix" style="margin: 0px 10px;">
    <span class="topBar_logo">
        <a href="<?php echo ROOT_INDEX ?>" target="_blank" title="Play the best online games on GTArcade.com"></a>
    </span>
    <!-- bar start-->
    <div class="topBar_nav">
        <ul>
            <li class="nav1 nav_juegos">
                <a href="javascript:;" class="">Game</a>
                    <!--drop list start-->
                    <div class="gameBox_nav clearfix" style="width: 782px; display: none;">
                    <?php
                    $games = file("template/".$core['config']['template']."/extras/config/games.tDB");
                    ?>
                        <ul class="list_gameBoxNav tooLong " style=" border-right: 1px solid #535353; ">
                            <li class="titel_pc_gameBox">More Servers</li>
                            
                            <?php
                                foreach ($games as $games_data){
                                    $games_data = explode("|",$games_data);
                                    if ($games_data[3] == 'server'){
                                        echo '<li class="new">
                                                <a href="'.$games_data[2].'" target="_blank">'.$games_data[1].'</a>
                                              </li>';
                                    }
                                }
                            
                            ?>
                        </ul>
                        
                        <ul class="list_gameBoxNav tooLong " style=" border-right: 1px solid #535353; ">
                            <li class="titel_mobile_gameBox">Mobile Servers</li>
                            
                            <?php
                                foreach ($games as $games_data){
                                    $games_data = explode("|",$games_data);
                                    if ($games_data[3] == 'mobile'){
                                        echo '<li class="new">
                                            <a href="'.$games_data[2].'" target="_blank">'.$games_data[1].'</a>
                                          </li>';
                                    }
                                }
                            ?>                                              
                        </ul>
                        <ul class="list_gameBoxNav tooLong" style="">
                            <li class="titel_mobile_gameBox">Casual Games</li>
                            
                            <?php
                                foreach ($games as $games_data){
                                    $games_data = explode("|",$games_data);
                                    if ($games_data[3] == 'casual'){
                                        echo '<li class="hot">
                                                <a href="'.$games_data[2].'" target="_blank">'.$games_data[1].'</a>
                                          </li>';
                                    }
                                }
                            ?>      
                        </ul>
                            
                        </div>
                    <!--drop list end-->
                </li>
            
            <li class="nav2">
                <?php
                if ($user_login != 1){
                    echo '<a href="#popuploginG">My Account</a>';
                } else {
                    echo '<a href="index.php?page_id=user_cp&panel=account_settings">My Account</a>';
                }
                ?>
            </li>
                    </ul>
    </div>
    <!-- bar end-->

    <!-- language start-->
    <div class="Select_Language fr">
        <p class="now_Lang">English</p>
        <ul class="Lang_box gameBox_nav" id="lang_change" style="display: none;">
            <div class="box_v"></div>
            <li><a href="javascript:void(0);" lang="es-es">Espa&ntilde;ol</a></li>
            <li><a href="javascript:void(0);" lang="pt-pt">Portugu&ecirc;s</a></li>
            <li><a href="javascript:void(0);" lang="it-it">Italiano</a></li>
        </ul>
    </div>
    <!-- language end-->

    <!--???-->
    <?php
    if($user_login != '1') {
    ?>
    <div class="topBar_login" id="header-login">
        <ul class="QLoginT fr" style="display: none;">
            <li><a href="javascript:;" onclick="pop.connect('facebook')" class="FacebookT" title="Facebook"></a></li>
            <li><a href="javascript:;" onclick="pop.connect('google')" class="GoogleT" title="Google"></a></li>
            <li><a href="javascript:;" onclick="pop.connect('twitter')" class="TwitterT" title="Twitter"></a></li>
            <li><a href="javascript:;" onclick="pop.connect('yahoo')" class="YahooT" title="Yahoo"></a></li>
            <li><a href="javascript:;" onclick="pop.connect('livespace')" class="WindowsT" title="Windows"></a></li>
        </ul>
        
        <div class="btn_signT fr"><a href="#popupSignUpG" class="btn">Sign up</a></div>
        
        <div class="btn_logT fr">
            <a href="javascript:;" class="btn" id="game_login_header">Log in</a>

            <div class="Tsign_box gameBox_nav" style="display: none;">
                <div class="Tsign_head"></div>
                <div class="Tsign_main">
                    <form method="post" action="<?php echo ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.LOGIN_CMS_PAGE ?>" name="uss_login_form" class="form_Tsign">
                    
                    <div class="Tdd">
                        <input name="uss_id" id="header_login_email" placeholder="UserID" class="input_Tlogin" type="text" maxlength="10" required>
                        </div>
                        <div class="Tdd">
                            <input name="uss_password" id="header_login_password" placeholder="Password" class="input_Tlogin" type="password" maxlength="12" required>
                        </div>
                        
                        <div class="Tdd">
                            <label class="label_checkboxT">
                                <input name="" id="headerRememberMe" checked="checked" value="" type="checkbox">
                                Remember me                            </label>
                            <a href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.LOSTPASSWORD_CMS_PAGE?>" class="btn_forgotPaswT fr">Forgot Password?</a>
                        </div>
                        <div class="btn_sign">
                            <input id="headerLogBtn" name="login" value="Log In" type="submit" onclick="uss_login_form.submit();" style="display:block; width: 276px; height: 42px; text-align:center; line-height: 42px; font-size: 22px; color:#FFF; background:#fe9500; border:none">
                        </div>
                    <input type="hidden" name="process_login">
                    </form>
                    <div class="other_accountT">
                        <p class="titleT">Quick Login</p>
                        <ul class="listT clearfix">
                            <li><a href="javascript:;" onclick="pop.connect('facebook')" title="Facebook"><h3 class="Facebook"></h3></a></li>
                            <li><a href="javascript:;" onclick="pop.connect('google')" title="Google"><h3 class="Google"></h3></a></li>
                            <li><a href="javascript:;" onclick="pop.connect('twitter')" title="Twitter"><h3 class="Twitter"></h3></a></li>
                            <li><a href="javascript:;" onclick="pop.connect('yahoo')" title="Yahoo!"><h3 class="Yahoo"></h3></a></li>
                            <li><a href="javascript:;" onclick="pop.connect('livespace')" title="Windows"><h3 class="Windows"></h3></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    } else {
    ?>
    <div class="topBar_login">
        <p class="userName_log fl"><em><a href="" class="header-username"></a></em></p>
        <div class="TB_massage">
            <a href="javascript:;" class="btn_massage read"></a>
            <!--????-->
            <div class="gameBox_nav clearfix">
                <ul class="list_gameBoxNav">
                    <li>
                        <a href="">System Message&nbsp;&nbsp;&nbsp;0</a></li>
                    <li>
                        <a href="">Private Message&nbsp;&nbsp;&nbsp;0</a></li>

                                        </ul>
            </div>
        </div>
        <a class="btn_logoutT fr" id="logoutBtn" href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'=logout'?>">Log out</a>
    </div>
    <?php
    }
    ?>
    <!--???-->
    

</section>
</header>
<?php
    }
?>