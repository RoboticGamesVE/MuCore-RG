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
	if ($get_config->footerchat == 1){
?>
<!-- Footerchat -->
    <div class="content_video clearfix" <?php echo $display; ?> >
        <ul class="tab-hd clearfix">
            <li class="active"><a href="index.php?page_id=chat" title="wallpapers">CHAT USERS</a></li>
        </ul>
        
        <p class="more"><a href="index.php?page_id=chat">View All</a></p>
        
        <div>
        

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
    load_chat('chat','#chat','get.php?bChat', null, 'data=chat');
    setTimeout("load_data()",30000) 
}
</script>
<?
$chat_config = simplexml_load_file('engine/config_mods/chat_settings.xml');
if($chat_config->active == '0'){
    echo msg('0',text_sorry_feature_disabled);
}else{
    echo '
<form style="width: 97%;text-align: center;margin-left: 10px;">
<table border="0" cellspacing="4" cellpadding="0" width="100%" style="margin-top: 10px; margin-bottom: 10px;" class="chat_table">
<tr>
<td align="left" colspan="3" class="chat_bg"><div id="chat"></div></td>
</tr>
</table>
</form>
<script type="text/javascript">
setTimeout("load_data()",30000)
load_chat(\'chat\',\'#chat\',\'get.php?bChat\', null, \'data=chat\');</script>
'; 
}
?>
        	
        </div>
        
    </div>
<!-- /Footerchat -->
<?php
	}
?>