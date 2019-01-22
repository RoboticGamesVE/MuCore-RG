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
if (isset($_POST['statistics_settings'])) {
    if (empty($_POST['name'])) {
        echo notice_message_admin('Some fields where left blank.', '0', '1', '0');
    } else {
          if (strlen($_POST['c_key']) != '0') {
            echo notice_message_admin('Encryption key must be 8 digits length, letters and numbers only.', '0', '1', '0');
        } elseif (strlen($_POST['s_s']) != '0') {
            echo notice_message_admin('MUCore Serial Number must be 20 digits length.', '0', '1', '0');    
        } else {
            require('../engine/statistics_config.php');
            $new_db = fopen("../engine/statistics_config.php", "w");
            $data   = "<?\r\n";
            $data .= "\$core['statistics']['on_off'] = \"" . $core['config']['on_off'] . "\";\r\n";
            $data .= "\$server['statistics']['name'] = \"" . $_POST['name']  . "\";\r\n";
            $data .= "\$server['statistics']['type'] = \"" . $_POST['type']  . "\";\r\n";
            $data .= "\$server['statistics']['ip'] = \"" . $_POST['ip']  . "\";\r\n";
            $data .= "\$server['statistics']['port'] = \"" . $_POST['port']  . "\";\r\n";
            $data .= "\$server['statistics']['exp'] = \"" . $_POST['exp']  . "\";\r\n";
            $data .= "\$server['statistics']['drop'] = \"" . $_POST['drop']  . "\";\r\n";
            $data .= "\$server['statistics']['zen'] = \"" . $_POST['zen']  . "\";\r\n";
            $data .= "\$server['statistics']['cm'] = \"" . $_POST['cm']  . "\";\r\n";
            $data .= "\$server['statistics']['ppl'] = \"" . $_POST['ppl']  . "\";\r\n";
            $data .= "\$server1['statistics']['on_off1'] = \"" . $_POST['on_off1']  . "\";\r\n";
            $data .= "\$server1['statistics']['name1'] = \"" . $_POST['name1']  . "\";\r\n";
            $data .= "\$server1['statistics']['type1'] = \"" . $_POST['type1']  . "\";\r\n";
            $data .= "\$server1['statistics']['ip1'] = \"" . $_POST['ip1']  . "\";\r\n";
            $data .= "\$server1['statistics']['port1'] = \"" . $_POST['port1']  . "\";\r\n";
            $data .= "\$server1['statistics']['exp1'] = \"" . $_POST['exp1']  . "\";\r\n";
            $data .= "\$server1['statistics']['drop1'] = \"" . $_POST['drop1']  . "\";\r\n";
            $data .= "\$server1['statistics']['zen1'] = \"" . $_POST['zen1']  . "\";\r\n";
            $data .= "\$server1['statistics']['cm1'] = \"" . $_POST['cm1']  . "\";\r\n";
            $data .= "\$server1['statistics']['ppl1'] = \"" . $_POST['ppl1']  . "\";\r\n";
            $data .= "\$server2['statistics']['on_off2'] = \"" . $_POST['on_off2']  . "\";\r\n";
            $data .= "\$server2['statistics']['name2'] = \"" . $_POST['name2']  . "\";\r\n";
            $data .= "\$server2['statistics']['type2'] = \"" . $_POST['type2']  . "\";\r\n";
            $data .= "\$server2['statistics']['ip2'] = \"" . $_POST['ip2']  . "\";\r\n";
            $data .= "\$server2['statistics']['port2'] = \"" . $_POST['port2']  . "\";\r\n";
            $data .= "\$server2['statistics']['exp2'] = \"" . $_POST['exp2']  . "\";\r\n";
            $data .= "\$server2['statistics']['drop2'] = \"" . $_POST['drop2']  . "\";\r\n";
            $data .= "\$server2['statistics']['zen2'] = \"" . $_POST['zen2']  . "\";\r\n";
            $data .= "\$server2['statistics']['cm2'] = \"" . $_POST['cm2']  . "\";\r\n";
            $data .= "\$server2['statistics']['ppl2'] = \"" . $_POST['ppl2']  . "\";\r\n";
            $data .= "?>";
            fwrite($new_db, $data);
            fclose($new_db);
            echo notice_message_admin('Settings successfully saved', 1, 0, 'index.php?get=statistics_settings');
        }      
    }
    
} else {
    if (isset($_POST['module_active'])) {
        require('../engine/statistics_config.php');
        $new_db = fopen("../engine/statistics_config.php", "w");
        $data   = "<?\r\n";
        $data .= "\$core['statistics']['on_off'] = \"" . $_POST['module_active'] . "\";\r\n";
            $data .= "\$server['statistics']['name'] = \"" . $server['statistics']['name']  . "\";\r\n";
            $data .= "\$server['statistics']['ip'] = \"" . $server['statistics']['ip'] . "\";\r\n";
            $data .= "\$server['statistics']['port'] = \"" . $server['statistics']['port']  . "\";\r\n";
            $data .= "\$server['statistics']['exp'] = \"" . $server['statistics']['exp']  . "\";\r\n";
            $data .= "\$server['statistics']['drop'] = \"" . $server['statistics']['drop']. "\";\r\n";
            $data .= "\$server['statistics']['zen'] = \"" . $server['statistics']['zen'] . "\";\r\n";
            $data .= "\$server['statistics']['cm'] = \"" . $server['statistics']['cm']. "\";\r\n";
            $data .= "\$server['statistics']['ppl'] = \"" . $server['statistics']['ppl'] . "\";\r\n";
            $data .= "\$server1['statistics']['on_off1'] = \"" . $server1['statistics']['on_off1'] . "\";\r\n";
            $data .= "\$server1['statistics']['name1'] = \"" . $server1['statistics']['name1']  . "\";\r\n";
            $data .= "\$server1['statistics']['ip1'] = \"" . $server['statistics']['ip1'] . "\";\r\n";
            $data .= "\$server1['statistics']['port1'] = \"" . $server['statistics']['port1']  . "\";\r\n";
            $data .= "\$server1['statistics']['exp1'] = \"" . $server['statistics']['exp1']  . "\";\r\n";
            $data .= "\$server1['statistics']['drop1'] = \"" . $server['statistics']['drop1']. "\";\r\n";
            $data .= "\$server1['statistics']['zen1'] = \"" . $server['statistics']['zen1'] . "\";\r\n";
            $data .= "\$server1['statistics']['cm1'] = \"" . $server['statistics']['cm1']. "\";\r\n";
            $data .= "\$server1['statistics']['ppl1'] = \"" . $server['statistics']['ppl1'] . "\";\r\n";
            $data .= "\$server2['statistics']['on_off2'] = \"" . $server2['statistics']['on_off2'] . "\";\r\n";
            $data .= "\$server2['statistics']['ip'] = \"" . $server['statistics']['ip2'] . "\";\r\n";
            $data .= "\$server2['statistics']['port'] = \"" . $server['statistics']['port2']  . "\";\r\n";
            $data .= "\$server2['statistics']['exp'] = \"" . $server['statistics']['exp2']  . "\";\r\n";
            $data .= "\$server2['statistics']['drop'] = \"" . $server['statistics']['drop2']. "\";\r\n";
            $data .= "\$server2['statistics']['zen'] = \"" . $server['statistics']['zen2'] . "\";\r\n";
            $data .= "\$server2['statistics']['cm'] = \"" . $server['statistics']['cm2']. "\";\r\n";
            $data .= "\$server2['statistics']['ppl'] = \"" . $server['statistics']['ppl2'] . "\";\r\n";
            $data .= "?>";
        $data .= "?>";
        fwrite($new_db, $data);
        fclose($new_db);
        
        $new_db2 = fopen("../engine/cms_data/maintenance/maintenance.cms", "w");
        fwrite($new_db2, stripslashes($_POST['reason']));
        fclose($new_db2);
    }
    
    require('../engine/statistics_config.php');
    echo '<form action="" name="statistics_settings" method="POST">
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel" style="margin-bottom: 20px;">
<tr>
 <td align="center" class="panel_title" colspan="2">Turn your Configuration Statistics On and Off</td>
</tr>
<tr>';
    if ($core['config']['on_off'] == '1') {
        echo '<td align="left" class="panel_buttons" style="background: #0C0;"><b>Configuration Statistics is active.</b></td>
<td align="right" class="panel_buttons" style="background: #0C0;">
<input type="hidden" name="edit_settings"><input type="submit" value="Turn Configuration Statistics Off"><input type="hidden" name="module_active" value="0">';
        
        
    } elseif ($core['config']['on_off'] == '0') {
        echo '<td align="left" class="panel_buttons" style="background: #C00;"><b>Configuration Statistics is inactive.</b></td>
<td align="right" class="panel_buttons" style="background: #C00;">
<input type="hidden" name="edit_settings"><input type="submit" value="Turn Configuration Statistics On"><input type="hidden" name="module_active" value="1">';
    }
    echo '</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Reason for turning website Off</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Let users know why website is Off.</b>
</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><textarea cols="60" rows="3" name="reason">';
    include('../engine/cms_data/maintenance/maintenance.cms');
    echo '</textarea></td>
</tr>


</table>
</form>'; 
    
    
    echo '
<form action="" name="form_edit" method="POST">
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
<tr>
 <td align="center" class="panel_title" colspan="2">Configuration ' . $server['statistics']['name'] . ' Information</td>
</tr>
<tr>
<td align="left" class="panel_title_sub" colspan="2">&nbsp;</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Server Name
</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" name="name" value="' . $server['statistics']['name'] . '" maxlength="100"></td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Server Type
</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" name="type" value="' . $server['statistics']['type'] . '" maxlength="100"></td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">IP Adress Server
</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" name="ip" value="' . $server['statistics']['ip'] . '" maxlength="100"></td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Port GameServer
</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" name="port" value="' . $server['statistics']['port'] . '" maxlength="100"></td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Experience
</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="number" name="exp" value="' . $server['statistics']['exp'] . '" min="1" max="99999"></td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Drop
</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="number" name="drop" value="' . $server['statistics']['drop'] . '" min="1" max="100"></td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Zen
</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="number" name="zen" value="' . $server['statistics']['zen'] . '" min="1"   max="100"></td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Chaos Machine
</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input ttype="number" name="cm" value="' . $server['statistics']['cm'] . '" min="1"   max="100"></td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Points / Level
</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" name="ppl" value="' . $server['statistics']['ppl'] . '" maxlength="20"></td>
</tr>

<!-- SERVER2 -->

<tr>
 <td align="center" class="panel_title" colspan="2">Configuration ' . $server1['statistics']['name1'] . ' Information</td>
</tr>
<tr>
<td align="left" class="panel_title_sub" colspan="2">&nbsp;</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Server Open
</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" name="on_off1" value="' . $server1['statistics']['on_off1'] . '" maxlength="1"></td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Server Type
</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" name="type1" value="' . $server1['statistics']['type1'] . '" maxlength="100"></td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Server Name
</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" name="name1" value="' . $server1['statistics']['name1'] . '" maxlength="100"></td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">IP Adress Server
</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" name="ip1" value="' . $server1['statistics']['ip1'] . '" maxlength="100"></td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Port GameServer
</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" name="port1" value="' . $server1['statistics']['port1'] . '" maxlength="100"></td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Experience
</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="number" name="exp1" value="' . $server1['statistics']['exp1'] . '" min="1" max="99999"></td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Drop
</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="number" name="drop1" value="' . $server1['statistics']['drop1'] . '" min="1" max="100"></td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Zen
</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="number" name="zen1" value="' . $server1['statistics']['zen1'] . '" min="1"   max="100"></td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Chaos Machine
</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input ttype="number" name="cm1" value="' . $server1['statistics']['cm1'] . '" min="1"   max="100"></td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Points / Level
</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" name="ppl1" value="' . $server1['statistics']['ppl1'] . '" maxlength="20"></td>
</tr>

<!-- SERVER3 -->

<tr>
 <td align="center" class="panel_title" colspan="2">Configuration ' . $server2['statistics']['name2'] . ' Information</td>
</tr>
<tr>
<td align="left" class="panel_title_sub" colspan="2">&nbsp;</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Server Open
</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" name="on_off2" value="' . $server2['statistics']['on_off2'] . '" maxlength="1"></td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Server Type
</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" name="type2" value="' . $server2['statistics']['type2'] . '" maxlength="100"></td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Server Name
</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" name="name2" value="' . $server2['statistics']['name2'] . '" maxlength="100"></td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">IP Adress Server
</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" name="ip2" value="' . $server2['statistics']['ip2'] . '" maxlength="100"></td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Port GameServer
</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" name="port2" value="' . $server2['statistics']['port2'] . '" maxlength="100"></td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Experience
</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="number" name="exp2" value="' . $server2['statistics']['exp2'] . '" min="1" max="99999"></td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Drop
</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="number" name="drop2" value="' . $server2['statistics']['drop2'] . '" min="1" max="100"></td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Zen
</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="number" name="zen2" value="' . $server2['statistics']['zen2'] . '" min="1"   max="100"></td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Chaos Machine
</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input ttype="number" name="cm2" value="' . $server2['statistics']['cm2'] . '" min="1"   max="100"></td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Points / Level
</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" name="ppl2" value="' . $server2['statistics']['ppl2'] . '" maxlength="20"></td>
</tr>


<tr>
<td align="right" class="panel_buttons" colspan="2">
<input type="hidden" name="statistics_settings">
<input type="submit" value="Save"></td>
</tr>
</table>
</form>
';
}
?> 