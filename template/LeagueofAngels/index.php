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
 * @Credits   Isumeru & MaryJo & Dao Van Trong - Trong.CF
 * Obfuscation provided by RoboticGames
*/
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Google Tag Manager -->
    <!-- End Google Tag Manager -->
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <meta http-equiv="Content-Language" content="en">
    <?=build_header_seo(); ?>
    
    <title><?=build_header_title(); ?></title>
    
    <link rel="stylesheet" type="text/css" href="template/<?=$core['config']['template'] ?>/css/topbar.css">
    <link rel="stylesheet" type="text/css" href="template/<?=$core['config']['template'] ?>/css/pop_singUp.css">
    <link rel="stylesheet" type="text/css" href="template/<?=$core['config']['template'] ?>/css/gdpr.css">
    <link rel="stylesheet" type="text/css" href="template/<?=$core['config']['template'] ?>/css/style.css">

    <link rel="shortcut icon" href="template/<?=$core['config']['template'] ?>/images/favicon.ico" type="image/x-icon">

    <script type="text/javascript" src="template/<?=$core['config']['template'] ?>/js/jquery-1.js"></script>
    <script type="text/javascript" src="template/<?=$core['config']['template'] ?>/js/jquery.js"></script>
    <script type="text/javascript" src="template/<?=$core['config']['template'] ?>/js/lang.js"></script>
    <script type="text/javascript" src="template/<?=$core['config']['template'] ?>/js/xg.js"></script>
    <script type="text/javascript" src="template/<?=$core['config']['template'] ?>/js/userReg.js"></script>
    <script type="text/javascript" src="template/<?=$core['config']['template'] ?>/js/common.js"></script>
    <script type="text/javascript" src="template/<?=$core['config']['template'] ?>/js/user.js"></script>
    <script src="template/<?=$core['config']['template'] ?>/js/tab.js"></script>

    <script type="text/javascript">
/*<![CDATA[*/
 var urls = {"domain":"gtarcade.com","trd_login":"https:\/\/user.gtarcade.com","passport_url":"https:\/\/user.gtarcade.com","resource_url":"\/\/static.gtarcade.com"};
/*]]>*/

$(document).ready(function() {
    //NAV
    var pathname = window.location.pathname;
    var host = window.location.host;
    //NAV
    function dropdown(btn){
        $(btn).mouseenter(function(e) {
            $(this).find(".gameBox_nav").show().addClass("css3_bounceIn");
            $(this).find("a:first").addClass("cur");
        });
        $(btn).mouseleave(function(e) {
            $(this).find(".gameBox_nav").hide().removeClass("css3_bounceIn");
            $(this).find("a:first").removeClass("cur");
        });
    }
    dropdown(".nav_juegos,.TB_massage,.btn_logT,.Select_Language");
    inputFocus();
    function inputFocus(){
        $(".Tsign_box .input_Tlogin").focus(function(e) {
            $(".btn_logT").unbind();
        });
        $(".Tsign_box .input_Tlogin").blur(function(e) {
            dropdown(".btn_logT");
            $(".Tsign_box").click(function(event) {
                event.stopPropagation();
            });
            $(".Tsign_box").parents().click(function(e) {
                $(".btn_logT").mouseleave();
            });
        });
    }
    function dpiChange(){
        if($(window).width()<=1530){
            $(".topBar_main").css({"margin":"0 10px"});
            if($(window).width()<=1480){
                $('#game_login_header').unbind('click');
                $(".Tsign_box_B").hide();
                $(".QLoginT").hide();
                $(".Tsign_box").addClass("gameBox_nav").hide();
            }else{
                $(".Tsign_box_B").show();
                $(".QLoginT").show();
                $(".Tsign_box").removeClass("gameBox_nav").hide();
                $('#game_login_header').unbind('click');
                $("#game_login_header").click(function(){
                    show_header_verify_code();
                    game_login_header();
                });
            }
        }else{
            $(".topBar_main").css({"margin":"0 40px"});
            $(".Tsign_box_B").show();
            $(".QLoginT").show();
            $(".Tsign_box").removeClass("gameBox_nav");
            $('#game_login_header').unbind('click');
            $("#game_login_header").click(function(){
                show_header_verify_code();
                game_login_header();
            });
        }
    }
    dpiChange();
    window.onresize=function(){ dpiChange(); };
});
    </script>
<style type="text/css">
<!--
/*
MUCore Css Start
*/
.tmp_right_content { width: 100%; background-color:#FFFFFF; }
.tmp_m_content { margin:4px; padding:2px; margin-bottom: 10px;}
.tmp_m_content .tmp_right_title {background:url('template/<?=$core['config']['template'] ?>/images/menu.png')  repeat-y; height:37px; width:538px; font:normal 20px/30px Verdana; color:#655645; padding-left:30px; }
.tmp_m_content .tmp_page_content { font:normal 12px/24px Arial, Helvetica, sans-serif; color:#375264; margin:5px; }


.where_nav a{
color: #ffffff;
text-decoration: underline;
}

.where_nav a:hover{
color: #ffffff;
text-decoration: none;
} 

.iN_title{
font-size:17px;
font-weight:bold;
}

.iN_title_mirror{
font-size:17px;
font-weight:bold;
color:#990000;
}

.iN_description{
font:11px/14px Arial, Verdana, sans-serif;
color:#777;
}

.iN_download_title{
font:bold 14px/18px arial; color:#898989;
}

.iN_download_cat{
font-size:17px;
font-weight:bold;
color:#990000;
}

.iN_title a{
font-size:17px;
font-weight:bold;
text-decoration: none;
} 

.iN_title a:hover{
font-size:17px;
font-weight:bold;
text-decoration: none;
color:#990000;
}

.iN_date{
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:10px;
color:#666666;
}

.iN_news_table tr:hover{
background: #ffffff;
}

.iN_news_content{
font-family:Georgia, "Times New Roman", Times, serif;
font-size:13px;
color:#8698a4;
margin:0px;
padding-top: 6px;
}

.iN_news_content a{
font-family:Georgia, "Times New Roman", Times, serif;
font-size:13px;
margin:0px;
text-decoration: underline;
} 

.iN_news_content a:hover{
font-family:Georgia, "Times New Roman", Times, serif;
font-size:13px;
margin:0px;
text-decoration: none;
} 

.iN_new_read_more{
color:#ffffff; 
font: 10px Arial, Helvetica, sans-serif; 
background: #8b0e0e;
padding: 1px;
} 

.iN_new_read_more a{
color: #ffffff;
font-size: 10px;
}

.iRg_text{
font: bold 13px Arial, sans-serif; color: #555555;
}

.iRg_inf{
font: 11px fantasy; #555555;
} 

.iRg_line{
background:url(template/<?=$core['config']['template']; ?>/images/inner_line.jpg); background-position:bottom; background-repeat:repeat-x;
font: 13px fantasy; color: #555555;
padding-bottom: 4px;
padding-top:10px;
}

.iRg_line_top{
background:url(template/<?=$core['config']['template']; ?>/images/inner_line.jpg); background-position:top; background-repeat:repeat-x;
font: 11px fantasy; color: #555555;
}

.iR_func_status{
border: 1px solid #cccccc; 
background: #4d4d4d; 
padding-left: 4px;
font-size: 11px;
color:#fff;
}

.iR_func_status_lacking{
background: #CC3300;
padding: 1px; 
padding-left: 3px; 
padding-right: 3px; 
color: #ffffff;
}

.iR_func_status_free{
background: #00FF00; 
padding: 1px; 
padding-left: 3px; 
padding-right: 3px; 
color: #000000;
}

.iR_func_status_free a{
font-size: 11px;
color: #000000;
} 

.iRg_inf a{
font: 11px fantasy;
color:#666
}

.iRg_inf a:hover{
font: 11px fantasy;
text-decoration: none;
}

.iRg_input{
font-size: 10pt;
font-family: verdana, geneva, lucida, 'lucida grande', arial, helvetica, sans-serif;
background-color: #ffffff;
border: 1px solid #cccccc;
}

select {
    font-family:MuseoSans, Arial, Helvetica, Sans-serif;
    font-size:12px;
    width:85%;
    padding:8px;
    color:#2C2C2C;
    background-color: rgba(0, 0, 0, 0.3);
    border:1px solid #2C2C2C;
    border-radius:2px;
    -moz-border-radius:2px;
    -webkit-border-radius:2px;
    margin:5px;
    -webkit-transition: all 300ms;
    -moz-transition: all 300ms;
    -o-transition: all 300ms;
    -ms-transition: all 300ms;
    transition: all 300ms;
}


input[type="text"],
input[type="password"],
input[type="email"]
{
    font-family:MuseoSans, Arial, Helvetica, Sans-serif;
    font-size:12px;
    width:60%;
    padding:3px;
    color:#8f7a60;
    background-color: rgba(0, 0, 0, 0.3);
    border:1px solid #161616;
    border-radius:2px;
    -moz-border-radius:2px;
    -webkit-border-radius:2px;
    margin:5px 5px 2px auto;
    -webkit-transition: all 300ms;
    -moz-transition: all 300ms;

    -o-transition: all 300ms;
    -ms-transition: all 300ms;
    transition: all 300ms;
    background-color:white;
}

.iRg_terms_agree{
font: 12px Arial, Verdana, sans-serif; 
}

.iRg_terms_agree a{
font: 12px Arial, Verdana, sans-serif;
color:#666;
} 

.iR_rank{
background-color: #181C18;
font: bold 11px Georgia, "Times New Roman", Times, serif; color: #ffffff;
}

.iR_stats{
font: 11px Georgia, "Times New Roman", Times, serif; 
color: #fff;
background-color: #393939;
padding: 1px;
border:1px solid #3f2b24;
}

.iR_stats_2{
font: 11px Georgia, "Times New Roman", Times, serif; 
color: #884206;
background-color: #000;
padding: 3px;
}

.iR_stats_bg{
background-color: #996600;
}

.iR_stats_level{
border: 1px solid #cccccc;
font: 11px Georgia, "Times New Roman", Times, serif; color: #555555;
background: #ECECFF;
padding: 1px;
}

.iR_stats_reset{
border: 1px solid #cccccc;
font: 11px Georgia, "Times New Roman", Times, serif; color: #555555;
background: #CECEFF;
padding: 1px;
}

.iR_name{
font: bold 13px Arial, sans-serif; color: #FF3300;
}

.iR_class{
font: 12px Impact, fantasy; color: #666666;
}

.iR_status{
font-size: 11px;
}

.iR_task{
font: 11px Georgia, "Times New Roman", Times, serif; 
}

.iR_rank_type{
font: bold 16px Arial, sans-serif; 
}

.iR_rank_type a{
font: bold 16px Arial, sans-serif; 
text-decoration: none;
}

.iR_rank_type a:hover{
font: bold 16px Arial, sans-serif;
text-decoration: none;
color: #990000;
}

.iR_rank_type_sub{
font: 10px fantasy; 
}

.iR_rank_type_sub a{
font: 10px fantasy; 
text-decoration: none;
}

.iR_rank_type_sub a:hover{
font: 10px fantasy; color:#990000;
text-decoration: none;
}

.msg_success{
background: #c2ffaf;
border: 1px solid #cccccc; 
padding: 4px;
padding-left: 33px;
margin-bottom: 6px;
margin-top: 6px;
background-image:url(template/<?=$core['config']['template']; ?>/images/success.gif);
background-repeat:no-repeat;
background-position: 10px;
font-size: 11px;
font-weight: bold;
color: #444444;
}

.msg_error{
background: #F9F2B9;
border: 1px solid #cccccc; 
padding: 4px;
padding-left: 33px;
margin-bottom: 6px;
margin-top: 6px;
background-image:url(template/<?=$core['config']['template']; ?>/images/warning.gif);
background-repeat:no-repeat;
background-position: 10px;
font-size: 11px;
font-weight: bold;
color: #444444;
}

.chat_bg{
border: 1px solid #cccccc; 
background: #ffffff; 
padding: 4px;
font-size: 11px;
}

.chat_even{
background: #808080;
padding: 2px; 
}

.chat_odd{
background: #d7d7d7;
padding: 2px; 
}

.warehouse_block{ 
border: 0px;
text-align: center;
background: url(template/<?=$core['config']['template']; ?>/images/warehouse_block.gif);
}

.warehouse_item_block {
border: 0px;
padding: 0px;
text-align: center;
background: url(template/<?=$core['config']['template']; ?>/images/warehouse_item_block.gif);
}

.warehouse_bg {
border: 0px;
padding: 0px;
text-align: center;
background: url(template/<?=$core['config']['template']; ?>/images/warehouse_bg.gif);
}

.item_name{
font: 12px Arial, sans-serif; 
color: #ffffff;
font-weight: bold;
}

.item_dur{
font: 11px Arial, sans-serif; 
color: #ffffff;
}

.item_requirement{
font: 11px Arial, sans-serif; 
color: #ffffff;
}

.item_skill{
font: 11px Arial, sans-serif; 
color: #ffffff;
}

.item_options{
font: 11px Arial, sans-serif; 
color: #ffffff;
}

.iD_dashed{
border-top: #ffffff dashed 1px;
}

.downloads tr:hover{
background: #ffffff;
}

.curent_step{
background: #FFEF73; border: 1px solid #cccccc; 
padding: 2px;
font:bold 11px Arial;
color:#555555;
}

.step{
background: #ECECEC; 
border: 1px solid #cccccc; 
padding: 2px;
font:bold 11px Arial;
color: #D4D4D4;
}

.hidden_password{
border: 1px solid #cccccc; 
background: #ECECEC; 
padding: 2px;
width: 200px;
color: #ECECEC;
}

.footer_font{
font: normal 11px Tahoma, Calibri, Verdana, Geneva, sans-serif;
color: #ffffff;
}

.footer_font a{
padding-bottom:5px;
font: normal 11px Tahoma, Calibri, Verdana, Geneva, sans-serif;
color: #ff0000;
text-decoration: none;
} 

.footer_font a:hover{
font: normal 11px Tahoma, Calibri, Verdana, Geneva, sans-serif;
color: #ff0000;
text-decoration: underline;
} 

.table_list{
background: #ffffff;
color: #000000;
border: outset 1px #DEE0E2;
} 

.table_list .title{
background: #DFDFFF;
font: bold 11px tahoma, verdana, geneva, lucida, 'lucida grande', arial, helvetica, sans-serif;
padding: 2px;
padding-left: 4px;
color: #595959;
border: outset 1px #555555;
} 

.table_list .even{
background: #ECECFF;
}


.table_list .content{
font: 11px tahoma, verdana, geneva, lucida, 'lucida grande', arial, helvetica, sans-serif;
padding: 2px;
padding-left: 4px;
} 

#rss_feed{
margin-left: 0;
padding-left: 0;
list-style: none;
}

#rss_feed li
{
padding-left: 17px;
background-image: url(template/<?=$core['config']['template']; ?>/images/rss_icon.gif);
background-repeat: no-repeat;
background-position: 0;
} 

#rss_feed li a{
text-decoration: none;
}

#rss_feed li a:hover{
text-decoration: underline;
}
/*
MUCore CSS End
*/ -->
</style>
</head>
<body>
<?php
$link_identifier = mssql_connect($core['db_host'], $core['db_user'], $core['db_password']);
mssql_select_db($core['db_name'], $link_identifier);

if($core['config']['on_off'] == '0' || $core['debug'] == '1'){
    if(isset($_SESSION['admin_login_auth'])){
        echo '<div align="center" style="color: red; background-color: white; padding:2px"><b>Warning: The website is currently turned off!</b></div>';
    }
}
$get_config = simplexml_load_file('template/'.$core['config']['template'].'/extras/config/template_settings.xml');

//cantidad de items en USER MENU
$um_row_ = get_sort('engine/cms_data/mods_uss.cms','�');
$i_um = 0;
foreach ($um_row_ as $li){
    if($li[6] == '1'){
        if($li[3] != ACCOUNTSETTINGS_CMS_USER){
            $i_um++;
        }
    }
}
$heigth_um = (148 + ($i_um * 30)).'px';
//cantidad de items en USER MENU

//cantidad de items en GAME MENU
$m_row_ = get_sort('engine/cms_data/pag_d.cms','�');
$i_gm = 0;
foreach ($m_row_ as $li){
    if($li[8] == '1'){
        if($li[6] != '0'){
            $i_gm++;
        }
    }
}
$heigth_gm = (67 + ($i_gm * 30)).'px';
//cantidad de items en GAME MENU
?>
<!--[if lte IE 8]>
    <script src="//static.gtarcade.com/gta_common/js/html5.js?20180621003"></script>
<![endif]-->
<?php
    //topbar
    include_once "template/".$core['config']['template']."/extras/modulos/topbar.php";
    
    //bar notice
    include_once "template/".$core['config']['template']."/extras/modulos/barnotice.php";
    
    //social bar
    include_once "template/".$core['config']['template']."/extras/modulos/socialbar.php";
    
?>
<!-- header start -->

<!-- nav start -->
<div class="nav">
    <div class="nav_box wrapper">
        <h1>
            <a href="<?php echo $core['config']['website_url']; ?>" title="<?php echo $core['config']['websitetitle']?>">
                <img src="template/<?=$core['config']['template'] ?>/images/logo.png">
            </a>
        </h1>
        <p>
            <a class="active" href="<?php echo $core['config']['website_url']; ?>" title="HOME">HOME</a>
            <a href="<?php echo ROOT_INDEX.'?'.LOAD_GET_PAGE.'=news'; ?>" title="NEWS">NEWS</a>
            <a href="<?php echo ROOT_INDEX.'?'.LOAD_GET_PAGE.'=register'; ?>" title="REGISTER">REGISTER</a>
            <a href="<?php echo ROOT_INDEX.'?'.LOAD_GET_PAGE.'=downloads'; ?>" target="_blank" title="DOWNLOAD">DOWNLOAD</a>
            <a href="<?php echo ROOT_INDEX.'?'.LOAD_GET_PAGE.'=login'; ?>" target="_blank" title="LOGIN">LOGIN</a>
            <a href="<?php echo ROOT_INDEX.'?'.LOAD_GET_PAGE.'=terms'; ?>" target="_blank" title="SUPPORT">SUPPORT</a>
        </p>
    </div>
</div>
<!-- nav over -->
<!-- header start -->

<div class="header">
    <div class="header_box wrapper">
        <div class="Entrance">
            <a class="entBtn1" href="<?php echo ROOT_INDEX.'?'.LOAD_GET_PAGE.'=terms'; ?>" target="_blank" title="teaser site"></a>
            <a class="entBtn2" href="<?php echo ROOT_INDEX.'?'.LOAD_GET_PAGE.'=contact'; ?>" title="info site"></a>
        </div>
        <div class="slogan">
            <img src="template/<?=$core['config']['template'] ?>/images/slogan.png">
        </div>
        <div class="sp">
            <a href="javascript:openVideo('<?=$get_config->video?>','Official%20Tailer');" title="(Official Tailer)"></a>
            <video autoplay loop width="246" height="137">
                <source src="template/<?=$core['config']['template'] ?>/images/sp.mp4" type="video/mp4">
            </video>
        </div>
    </div>
</div>
<!-- header over -->
<!-- header over -->

<!-- content start -->
<div class="content">
    <div class="content_box wrapper">
        <div class="content_box_mod">
            <div class="content_box_lt">
                <!-- ???? -->
<div class="content_box_lt_modOne">
    <a href="<?php echo ROOT_INDEX.'?'.LOAD_GET_PAGE.'=downloads'; ?>">Play Game</a>
</div>
<!-- /???? -->
<!-- -->

<div class="loginBox grid_box" style="height:auto; background:url(template/<?=$core['config']['template'] ?>/images/logoBg.jpg);;background-size:260px <?php echo $heigth_um;?>">
<?php
if($user_login != '1'){
?>
    <div class="loging" id="loging">
        <form method="post" action="<?php echo ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.LOGIN_CMS_PAGE; ?>" name="uss_login_form" class="form_login">
            <div class="form_int fl clearfix">
                <input type="text" name="uss_id" maxlength="10" placeholder="Account ID" id="login_area_email_angel" class="form_input">
                <input type="password" name="uss_password" maxlength="12" placeholder="password" id="addPwdTextArea" class="form_input">
                <input type="hidden" name="process_login">
            </div>
            <div class="form_btn fl">
                <input value="login" id="logingBtn" class="ir btn_login" type="submit">
            </div>
            <div class="form_line">
                <input id="memory" name="memory" value="0" type="checkbox"><label for="check_login">Remember me</label>
                <a href="index.php?page_id=lost_password" target="_blank" class="forgot_pw">Forgot password?</a>
            </div>
            <div class="form_signup">
                <a href="#popupSignUpG" class="btn_signup ir" type="button"></a>
            </div>
            <div class="quick_login">
                Quick Login:<a href="javascript:;" rel="nofollow" onclick="pop.connect('facebook')" class="icon_google">facebook</a><a href="javascript:;" rel="nofollow" onclick="pop.connect('google')" class="icon_twitter">google</a><a href="javascript:;" rel="nofollow" onclick="pop.connect('twitter')" class="icon_facebook">twitter</a><a href="javascript:;" rel="nofollow" onclick="pop.connect('yahoo')" class="icon_yahoo">yahoo</a><a href="javascript:;" rel="nofollow" onclick="pop.connect('livespace')" class="icon_windows">live</a>
            </div>
        </form>
    </div>
<?php
} else {
?>
    <div class="logined login_later" id="logined">
            <p class="userInfo">Hello! <span class="userName"><?=$user_auth_id?></span> <a href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'=logout'?>" class="logout">Log Out</a></p>
            <div class="visitedInfo myServer" id="last_login">
            </div>
            
            
            <div class="servers_box grid_box" style="background:none; height:auto; margin-top:0px">
    <div class="grid_title">USER MENU</div>
    
    <div class="grid_con" style="height: auto;">
        <ul class="server_list" id="sidebar_list" style="padding:0px 0 0 4px">
            <?php
                $m_uss_row_ = get_sort('engine/cms_data/mods_uss.cms','�');
                $count_m_uss = 0;
                foreach ($m_uss_row_ as $tr){
                  explode("�",implode($tr));
                  $count_m_uss++;
                  if($tr[6] == '1'){
                    if($tr[3] != ACCOUNTSETTINGS_CMS_USER){                    
                      echo '
                      <li class="odd">
                      <a class="s3" href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.USER_CMS_PAGE.'&'.USER_GET_PAGE.'='.$tr[3].'" " style="text-decoration: none">'.str_replace($menu_links_title,$menu_links_translated,$tr[2]).'</a>
                      </li>';
                    }
                  }
                }                
              ?> 
              
        </ul>
    </div>
    
</div>
            
            
            <p class="operation" style="position:inherit">
                <a href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.USER_CMS_PAGE.'&'.USER_GET_PAGE.'='.ACCOUNTSETTINGS_CMS_USER?>" class="link_account ir" style="margin-bottom: 10px;">Account</a>
                <a href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'=donate'?>" class="link_recharge ir">Recharge</a>
            </p>
    </div>
<?php
}
?>
</div>



<!-- GAME MENU -->
<div class="servers_box grid_box" style="height:<?php echo $heigth_gm;?>;background-size:260px <?php echo $heigth_gm;?>">
    <div class="grid_title">GAME MENU</div>
    
    <div class="grid_con">
        <ul class="server_list" id="sidebar_list">
        <?php
                    $m_row_ = get_sort('engine/cms_data/pag_d.cms','�');
                    #  echo $test[1][2][3];
                    foreach ($m_row_ as $li){
                      #  explode("�",$li);
                      switch ($li[7]){
                        case '0':
                          if($li[8] == '1'){
                            if($li[6] != '0'){
                                
                              echo '<li class="odd">';
                              
                              echo '<a class="s3" target="_self" title="new" href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.$li[3].'" style="text-decoration: none">'.str_replace($menu_links_title,$menu_links_translated,$li[2]).'</a></li>';
                            }
                          }
                          break;
                        case '1':
                          switch ($li[11]){
                            case '1': $target = "_blank"; break;
                            case '0': $target = "_self"; break;
                          }
                          
                          echo '<li class="odd">';
                          
                          echo '<a class="s3" href="'.$li[10].'" target="_self" title="new" style="text-decoration: none">'.str_replace($menu_links_title,$menu_links_translated,$li[2]).'</a></li>  ';
                        
                        break;
                      }
                    }
                  ?>
        </ul>
    </div>
        
</div>
<!-- /GAME MENU -->

<!-- tablink -->

<div class="interactive">
    <div class="intDiv intOne">
        <img src="template/<?=$core['config']['template'] ?>/images/intImg1.png">
        <a href="<?=$get_config->url1?>" title="MINI CLIENT">MINI CLIENT</a>
    </div>
    <div class="intDiv intTwo">
        <img src="template/<?=$core['config']['template'] ?>/images/intImg2.png">
        <a href="<?=$get_config->url2?>" title="NEW PLAYER CODE">NEW PLAYER<br><strong>CODE</strong></a>
    </div>
    <div class="intDiv intThree">
        <img src="template/<?=$core['config']['template'] ?>/images/intImg3.png">
        <a href="<?=$get_config->url3?>" title="VIP MEMBER">VIP MEMBER</a>
    </div>
</div>
<!-- /tablink -->

<!-- tabtouch -->
<div class="mail">
    <h3>GET IN TOUCH</h3>
        <ul>
            <li>Support:<a href="<?=$get_config->url4?>" title="Support" target="_blank">Click Here!</a></li>
            <li>Forums:<a href="<?=$get_config->url5?>" title="forums" target="_blank">Click Here!</a></li>
            <li>Follow<a href="<?=$get_config->url6?>" title="twitter" target="_blank">@ League of Angels II</a></li>
        </ul>
</div>
<!-- /tabtouch -->
</div>
                

<div class="content_box_rt">
    <div class="content_box_rt_modOne clearfix">
        <?php
        //slider
        include_once "template/".$core['config']['template']."/extras/modulos/slider.php";
        ?>
    </div>

<section id="gContsBodyWrap">
          <ul style="display:none">
            <li>
              <?php echo $core['config']['websitetitle']?>&nbsp;<span>&gt;</span></b> 
              <?php      
                $load_pages = file('engine/cms_data/pag_d.cms');
                foreach ($load_pages as $pages_loaded)
                {
                  $pages_loaded = explode("�",$pages_loaded);
                  if($pages_loaded[3] == $page_check_id)
                  {
                    $p_loaded_array = preg_split( "/\ /", $pages_loaded[5]); 
                    $p_l = '1';
                    break;
                  }
                }
                if($p_l == '1')
                {
                  $load_mods = file('engine/cms_data/mods.cms');
                  foreach ($load_mods as $mods_loaded)
                  {
                    $mods_loaded = explode("�",$mods_loaded);
                    if(in_array($mods_loaded[0],$p_loaded_array))
                    {
                      $_c_id_m[] = $mods_loaded[0];
                    }
                    else 
                    {
                      $_c_id_m[] = 'NULL';
                    }
                  }
                  $co=0;
                  foreach ($p_loaded_array as $give)
                  {
                    #echo $give;
                    if(in_array($give,$_c_id_m))
                    {
                      foreach ($load_mods as $give_me_out)
                      {
                        $give_me_out = explode("�",$give_me_out);
                        if($give_me_out[0] == $give)
                        {
                          if($give_me_out[4] == '1')
                          {
                            if($_GET[LOAD_GET_PAGE] == USER_CMS_PAGE && isset($_GET[USER_GET_PAGE]))
                            {
                              $construct_title = $secondary_l;
                            }
                            else
                            {
                              $construct_title = $give_me_out[3];
                            }
                            echo ''.htmlspecialchars(str_replace($modules_text_tile,$modules_text_translate,$give_me_out[3])).'';
                          }
                        }
                      }
                    }
                  }
                }
              ?>
            </li>
          </ul>
          <section class="gContsViewWrap">
            <?php 
          if(CMS_NAVBAR == '1'){
            if(isset($_GET[LOAD_GET_PAGE])){
                    $l_load = file("engine/cms_data/pag_d.cms");
                    foreach ($l_load as $l_name){
                        $l_name = explode("�",$l_name);
                        if($l_name[3] == $page_check_id){
                            $primary_l = $l_name[2];
                            break;
                        }

                    }
                  }
                  
                  if(isset($_GET[USER_GET_PAGE])){
                    $ti2_td = xss_clean(safe_input($_GET[USER_GET_PAGE],"_"));
                    $l2_load = file("engine/cms_data/mods_uss.cms");
                    foreach ($l2_load as $l2_name){
                        $l2_name = explode("�",$l2_name);
                        if($l2_name[3] == $ti2_td){
                            $secondary_l = $l2_name[2];
                            break;
                        }
                    }
                  }
                  
                  if(!isset($_GET[LOAD_GET_PAGE])){
                                        #&gt;
                                        $title_p =  '<a  href="'.$core['config']['website_url'].'">'.$core['config']['websitetitle'].'</a>';
                                    }elseif  (isset($_GET[LOAD_GET_PAGE])){
                                        if(isset($_GET[USER_GET_PAGE])){
                                            $usercp_module_title =  str_replace($menu_links_title,$menu_links_translated,$secondary_l);
$title_p =  '<a  href="'.$core['config']['website_url'].'">'.$core['config']['websitetitle'].'</a>  &gt; <a  href="'.$core['config']['website_url'].'/'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.$l_name[3].'">'.str_replace($menu_links_title,$menu_links_translated,$primary_l).'</a>  &gt; <a  href="'.$core['config']['website_url'].'/'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.$l_name[3].'&panel='.$l2_name[3].'">'.$usercp_module_title.'</a>';
                                        }else{ $title_p =  '<a  href="'.$core['config']['website_url'].'">'.$core['config']['websitetitle'].'</a>  &gt; <a  href="'.$core['config']['website_url'].'/'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.$l_name[3].'">'.str_replace($menu_links_title,$menu_links_translated,$primary_l).'</a>';}
                                    }
                  if($_GET['page_id'] == '' || ($_GET['page_id'] == 'news' && $_GET['iN'] == 0)){
                      $d = 'style="display:none;"';
                      $dd = 'style="margin: 0px 0px 0px 2px;"';
                  } else {
                      $d = '';
                      $dd = '';
                  }
                  
                  echo '
                  <div class="where_nav" '.$d.'>
                  <table cellpadding="0" cellspacing="0" border="0" >
                  <td width="100%" align="left">'.$title_p.'</td>
                  </table>
                  </div>';
            
          }

if($page_check_id != ANNOUNCEMENTS_CMS_PAGE){
    require('engine/announcement_config.php');
if($core['ANNOUNCEMENT']['ACTIVE'] == '1'){
    $ann_file = array_reverse(file('engine/variables_mods/announcements.tDB'));
    $count_ann = '0';
    foreach ($ann_file as $ann){
        $ann = explode("�",$ann);
        if($ann[3] > time()){
            $ann_found = '1';
            $ann_title = $ann[1];
            $ann_date = $ann[2];
            $ann_id = $ann[0];
;           break;
        }
    }
}
    if($ann_found == '1'){
        echo '
        <div class="tmp_m_content"> 
                    <div  class="tmp_right_title">'.text_announcement.'</div>
                    <div class="tmp_page_content" '.$dd.'>
                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                      <tr>
                      <td rowspan="3" align="left" width="60"><img src="template/'.$core['config']['template'].'/images/announcement.png" width="16" height="16"></td>
                      <td align="left" style="padding-top: 2px; padding-bottom: 2px;"><a href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.ANNOUNCEMENTS_CMS_PAGE.'#announcement-'.$ann_id.'">'.$ann_title.'</a></td>
                      <td align="right" class="ann_date">'.date('F j, Y | H:i',$ann_date).'</td>
                      </tr>
                      <tr>
                      <td colspan="0"  align="left" style="background-image:url(template/'.$core['config']['template'].'/ssimages/inner_line.jpg); height: 0px;"></td>
                      </tr>
                      
                      ';
        if($core['ANNOUNCEMENT']['AUTHOR'] == '1'){
            echo '<tr>
            <td colspan="2" align="right"><b>'.$core['config']['admin_nick'].'</b> (Administrator)</td>
            </tr>';
            
        }
        echo '</table></div>
                            </div>
                        ';
    }
}
          
          
    
$load_pages = file('engine/cms_data/pag_d.cms');
foreach ($load_pages as $pages_loaded){
    $pages_loaded = explode("�",$pages_loaded);
    
    if($pages_loaded[3] == $page_check_id){
        $p_loaded_array = preg_split( "/\ /", $pages_loaded[5]); 
        $p_l = '1';
        break;
    }
}
if($p_l == '1'){
$load_mods = file('engine/cms_data/mods.cms');
foreach ($load_mods as $mods_loaded){
    $mods_loaded = explode("�",$mods_loaded);
    if(in_array($mods_loaded[0],$p_loaded_array)){
        $_c_id_m[] = $mods_loaded[0];
    }else {
        $_c_id_m[] = 'NULL';
    }
}
$co=0;
foreach ($p_loaded_array as $give){
    #echo $give;
    if(in_array($give,$_c_id_m)){
        foreach ($load_mods as $give_me_out){
            $give_me_out = explode("�",$give_me_out);
            if($give_me_out[0] == $give){
                if($give_me_out[4] == '1'){
                    if($_GET[LOAD_GET_PAGE] == USER_CMS_PAGE && isset($_GET[USER_GET_PAGE])){
                        $construct_title = $secondary_l;
                    }else{
                        $construct_title = $give_me_out[3];
                    }
                
                    echo '<div class="tmp_m_content"> 
                     
                    <div class="tmp_page_content" '.$dd.'>';
                    if($give_me_out[1] == '1'){
                        if(is_file("pages_modules/".$give_me_out[2]."")){
                            include('pages_modules/'.$give_me_out[2].'');
                        }else{
                            echo 'Unable to load module file, reason: not found.';
                        }
                    }elseif ($give_me_out[1] == '0'){
                        if(is_file('engine/cms_data/cms_co/'.$give_me_out[0].'_cms.cms')){
                            include('engine/cms_data/cms_co/'.$give_me_out[0].'_cms.cms');
                        }else{
                            echo 'Unable to load module content, reason: not found.';
                        }
                    }
                    echo '</div> </div>';
                }
            }
        }
    }
}
}
?>                      
          </section>



<?php
if ($l_name[3] == 'register' || $l_name[3] == 'downloads' || $user_login == '1' || $l_name[3] == 'rankings'){
    $display = "style='display:none'";
} else {
    $display = '';
}
?>

<?php
//facebook
include_once "template/".$core['config']['template']."/extras/modulos/footerchat.php";

//footer server
include_once "template/".$core['config']['template']."/extras/modulos/footerserver.php";
?>

        </div>
    </div>
</div>

<!-- content over -->
</div>

<!-- footer start -->
<div class="footer_top">
<div class="footer">
    <div class="footer_box wrapper">
        <div class="PlayNow">
            <a href="<?php echo ROOT_INDEX.'?'.LOAD_GET_PAGE.'=downloads'; ?>" title="">play now</a>
        </div>
    </div>
</div>
<!-- footer over -->

<?php
//footer roboticgames
include_once "template/".$core['config']['template']."/extras/modulos/footerrg.php";
?>

</div>

<?php
//Estadisticas de visitas
//saber navegador
function getBrowser($user_agent){
    if(strpos($user_agent, 'MSIE') !== FALSE)
        return 'Internet explorer';
    elseif(strpos($user_agent, 'Edge') !== FALSE) //Microsoft Edge
        return 'Internet explorer';
    elseif(strpos($user_agent, 'Trident') !== FALSE) //IE 11
        return 'Internet explorer';
    elseif(strpos($user_agent, 'Opera Mini') !== FALSE)
        return "Opera";
    elseif(strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR') !== FALSE)
        return "Opera";
    elseif(strpos($user_agent, 'Firefox') !== FALSE)
        return 'Mozilla Firefox';
    elseif(strpos($user_agent, 'Chrome') !== FALSE)
        return 'Google Chrome';
    else
        return 'otro';
}
//end saber navegador
if($user_login != '1') {
    $user_auth_id = "visitor";
}
$visits = fopen("engine/logs/visits.log", "a+");
fwrite($visits, date("H:i Y-m-d", time()). "|"  . $user_auth_id . "|" . $_SERVER["REQUEST_URI"] . "|" . getBrowser($_SERVER["HTTP_USER_AGENT"]) . "|\n");
fclose($visits);
?>

<style>
#popuploginG{
    display:none;
}
#popuploginG:target {
    display:block;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background-color: rgba(0,0,0,0.8);
    position: fixed;
    z-index: 99999;
}

#popupSignUpG{
    display:none;
}
#popupSignUpG:target {
    display:block;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background-color: rgba(0,0,0,0.8);
    position: fixed;
    z-index: 99999;
}
</style>

                


<div id="popuploginG">
<div class="popUp_sign pop_sign" id="loginG" style="position: absolute; left: 264.5px; top: 41px; display: block; z-index: 1000000;">                   
    <div class="allBoxG">
        <div class="popUp_head">
            <a href="" class="btn_close" id="loginCloseBtn" title="Close">x</a>
            <div class="title title_loginG">
                <p>Log In</p>
            </div>
        </div>
        <div class="popUp_main clearfix">
            <div class="box_loginG" id="loginArea">
                <form class="form_login" method="post" action="<?php echo ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.LOGIN_CMS_PAGE; ?>" name="uss_login_form">
                    <p class="Glogo"></p>
                    <div class="dd">
                        <input type="text" name="uss_id" maxlength="10" placeholder="Account ID" id="email" class="input_login login_email">
                    </div>
                    
                    <div class="dd">
                        <input type="password" name="uss_password" maxlength="12" placeholder="password" id="password" class="input_login">
                    </div>
                    
                    <div class="dd">
                        <label class="label_checkbox"><input name="" id="rememberMe" checked="false" value="" type="checkbox">Remember me</label>
                        <div class="btn_forgotPasw">
                            <a href="index.php?page_id=lost_password">Forgot Password?</a>
                        </div>
                    </div>
                    <div class="btn_sign">
                        <button style="border: none;" href="javascript:;" id="loginBtn">Log In</button>
                    </div>
                    <div class="noAccount">
                        Don't have account? <a href="#popupSignUpG" id="btnGoSign">Sign up now! </a>
                    </div>
                <input type="hidden" name="process_login">
                </form>
            </div>
            
            <div class="other_account">
                <a href="javascript:;" class="btn_fbLogin" onclick="pop.connect('facebook')">Log in with Facebook</a>                                   
                <a href="javascript:;" class="btn_gLogin" onclick="pop.connect('google')">Log in with Google</a>                                    
                <ul class="list clearfix">
                    <li><a href="javascript:;" onclick="pop.connect('twitter')"><h3 class="Twitter"></h3>Twitter</a></li>                                       
                    <li><a href="javascript:;" onclick="pop.connect('yahoo')"><h3 class="Yahoo"></h3>Yahoo!</a></li>                                        
                    <li><a href="javascript:;" onclick="pop.connect('livespace')"><h3 class="Windows"></h3>Windows</a></li>                                 
                </ul>
            </div>
            <div class="line">
                <p>Or</p>
            </div>
        </div>
    </div>
</div>
</div>

<div id="popupSignUpG">
<div class="popUp_sign pop_sign" id="loginG" style="position: absolute; left: 264.5px; top: 41px; display: block; z-index: 1000000;">                   
    <div class="allBoxG">
        <div class="popUp_head">
            <a href="" class="btn_close" id="loginCloseBtn" title="Close">x</a>
            <div class="title title_SignUpG" style="display: block;">
                <p>Sign up</p>
            </div>
        </div>
        <div class="popUp_main clearfix">
            <div class="box_SignUpG" id="signUpArea">
                <form class="form_login" action="index.php?page_id=register" method="post">
                    <p class="Glogo"></p>
                    <div class="dd">
                        <input name="userid" id="reg_email" placeholder="Account ID" class="input_login" type="text">
                    </div>
                    <div class="dd">
                        <input name="reg_password" id="reg_password" placeholder="Password" class="input_login" type="password">
                    </div>
                    <div class="dd">
                        <input name="email_address" id="reg_password_re" placeholder="Email" class="input_login" type="email">
                    </div>
                    <div class="dd">
                        <label class="label_checkbox"><input name="policy0" checked="false" value="" type="checkbox">I have read and agree to the<a href="index.php?page_id=terms" target="_blank">Terms of Service and Privacy Policy.</a></label>                                         
                        <label class="label_checkbox"><input name="policy1" checked="false" value="" type="checkbox">I would like to keep me informed of their newest games and promotions.</label>
                    </div>
                    <div class="btn_sign">
                        <button style="border: none;" href="javascript:;" id="loginBtn">Sign up</button>
                    </div>
                    <div class="noAccount">
                        Allready have an account? <a href="#popuploginG" id="btnGoLogin">Log in here! </a>
                    </div>
                </form>
            </div>
            
            <div class="other_account">
                <a href="javascript:;" class="btn_fbLogin" onclick="pop.connect('facebook')">Log in with Facebook</a>                                   
                <a href="javascript:;" class="btn_gLogin" onclick="pop.connect('google')">Log in with Google</a>                                    
                <ul class="list clearfix">
                    <li><a href="javascript:;" onclick="pop.connect('twitter')"><h3 class="Twitter"></h3>Twitter</a></li>                                       
                    <li><a href="javascript:;" onclick="pop.connect('yahoo')"><h3 class="Yahoo"></h3>Yahoo!</a></li>                                        
                    <li><a href="javascript:;" onclick="pop.connect('livespace')"><h3 class="Windows"></h3>Windows</a></li>                                 
                </ul>
            </div>
            <div class="line">
                <p>Or</p>
            </div>
        </div>
    </div>
</div>
</div>