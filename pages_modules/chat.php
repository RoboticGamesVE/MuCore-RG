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
?>
<script type="text/javascript">    
load_image= new Image(16,16); 
load_image.src="template/<?=$core['config']['template']; ?>/images/load.gif"; 
function load_chat(div_page,id, page, form, append, data){
    document.getElementById(div_page).innerHTML = '<img src="template/<?=$core['config']['template']; ?>/images/load.gif" width="16" height="16"> Por favor espera...';
    var veri = '';
    if( typeof(data) == "string")
        veri = data;
    else 
        veri = $(form).serialize();
    $.ajax({
   type: "POST",
   url: page,
   data: veri,
   error: function(html)
   {
           alert("falied");
   },
   success: function(html)
   {
        if( typeof(append) == "boolean")
            $(id).append(html);
        else
            $(id).html(html);
   }
  });
  return false;
}

function load_data(){
    load_chat('chat','#chat','get.php?aChat', null, 'data=chat');
    setTimeout("load_data()",10000) 
}
</script>
<?php
$get_config = simplexml_load_file('engine/config_mods/chat_settings.xml');
if($get_config->active == '0'){
    echo msg('0',text_sorry_feature_disabled);
}else{
    if(isset($_POST['chat_post'])){
        echo '<a name="chat_area"></a><div style="margin-top: 10px">';
        $name = safe_input(set_limit(trim($_POST['name']),'10',''),'\ ');    
        $message = htmlspecialchars(stripslashes(set_limit(trim(str_replace("\r"," ",str_replace("\n"," ",str_replace("¦","",$_POST['message'])))),'300','')));
        if(empty($name) || empty($message)){
            echo msg('0',text_chat_error1);
        }else{
            if(strlen($name) < 4){
                echo msg('0',text_chat_error2);
            }else{
                if(!isset($_SESSION['admin_login_auth'])){
                    if(strtolower($name) == strtolower($get_config->admin_name)){
                        echo msg('0',text_chat_error3);
                    }else{
                        $_SESSION['chat_name'] = $name;
                        $chat_db = fopen("engine/variables_mods/chat.tDB", "a+");
                        fwrite($chat_db,$name."¦".$message."¦".time()."¦".$_SERVER['REMOTE_ADDR']."¦0¦\n");
                        fclose($chat_db);    
                }
                }else{
                    $_SESSION['chat_name'] = $name;
                    if(strtolower($name) == strtolower($get_config->admin_name)){
                        $chat_db = fopen("engine/variables_mods/chat.tDB", "a+");
                        fwrite($chat_db,$name."¦".$message."¦".time()."¦".$_SERVER['REMOTE_ADDR']."¦1¦\n");
                        fclose($chat_db);    
                    }else{
                        $chat_db = fopen("engine/variables_mods/chat.tDB", "a+");
                        fwrite($chat_db,$name."¦".$message."¦".time()."¦".$_SERVER['REMOTE_ADDR']."¦0¦\n");
                        fclose($chat_db);    
                    }
                    
                }
            }
        }
        echo '</div>';
    }
    echo '
    <form action="'.$core_run_script.'#chat_area" method="POST" name="chat_form">
    
<table border="0" cellspacing="4" cellpadding="0" width="100%" style="margin-top: 10px; margin-bottom: 10px;" class="chat_table">
<tr>
 <td aiign="left" >';
    if(isset($_SESSION['chat_name'])){
        echo '<input type="text" maxlength="10" class="iRg_input" name="name" value="'.htmlspecialchars($_SESSION['chat_name']).'" style="width: 260px; height: 32px; border: none; background: #FFF; padding: 0 8px; color: #b5b5b5; font: 14px/32px Helvetica Neue, Arial, Helvetica, sans-serif; margin-bottom:10px; " placeholder="UserID">';
    }else{
        echo '<input type="text" maxlength="10" class="iRg_input" name="name" style="width: 260px;height: 32px;border: none;background: #FFF;padding: 0 8px;color: #b5b5b5;font: 14px/32px Helvetica Neue, Arial, Helvetica, sans-serif; margin-bottom:10px; " placeholder="UserID">';
    }
    echo '</td>
</tr>
<tr>
 <td aiign="left"><input type="text" maxlength="300" class="iRg_input" size="50" name="message" style="width: 260px;height: 32px;border: none;background: #FFF;padding: 0 8px;color: #b5b5b5;font: 14px/32px Helvetica Neue, Arial, Helvetica, sans-serif; margin-bottom:10px; " placeholder="Message"></td>
</tr>

<tr>
 <td align="left" width="100%"><input type="submit" value="'.button_post_message.'" style="display:block; width: 276px; height: 42px; text-align:center; line-height: 42px; font-size: 22px; color:#FFF; background:#fe9500; border:none"><input type="hidden" name="chat_post"> <span class="iRg_inf">'.text_chat_req2.'</span></td>
</tr>
<tr>
<td align="left" colspan="3" class="chat_bg"><div id="chat"></div></td>
</tr>
</table>
</form>
<script type="text/javascript">
setTimeout("load_data()",10000)
load_chat(\'chat\',\'#chat\',\'get.php?aChat\', null, \'data=chat\');</script>
';
    
}
?>