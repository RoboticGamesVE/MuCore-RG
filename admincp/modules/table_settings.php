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
if (isset($_POST['table_settings'])) {
    if (empty($_POST['ctop']) || empty($_POST['ctable'])) {
        echo notice_message_admin('Some fields where left blank.', '0', '1', '0');
    } else {
        if (strlen($_POST['t_c']) != '0') {
            echo notice_message_admin('Encryption key must be 8 digits length, letters and numbers only.', '0', '1', '0');
        } elseif (strlen($_POST['t_s']) != '0') {
            echo notice_message_admin('MUCore Serial Number must be 20 digits length.', '0', '1', '0');
        } else {

        require('../engine/tables_config.php');
            $new_db = fopen("../engine/tables_config.php", "w");
            $data   = "<?\r\n";
            $data .= "\$core['config']['on_off'] = \"" . $core['config']['on_off'] . "\";\r\n";
            $data .= "\$ranking['character']['table'] = \"" . $_POST['ctable'] . "\";\r\n";
            $data .= "\$ranking['character']['greset'] = \"" . $_POST['cgreset'] . "\";\r\n";
            $data .= "\$ranking['character']['top'] = \"" . $_POST['ctop']  . "\";\r\n";
            $data .= "\$ranking['guild']['table'] = \"" . $_POST['gtable']  . "\";\r\n";
            $data .= "\$ranking['guild']['top'] = \"" . $_POST['gtop']  . "\";\r\n";
            $data .= "\$ranking['gens']['table'] = \"" . $_POST['getable']  . "\";\r\n";
            $data .= "\$ranking['gens']['top'] = \"" . $_POST['getop']  . "\";\r\n";
            $data .= "\$ranking['gens']['influence'] = \"" . $_POST['geinf']  . "\";\r\n";
            $data .= "\$ranking['gens']['memb'] = \"" . $_POST['gememb']  . "\";\r\n";
            $data .= "\$ranking['gens']['points'] = \"" . $_POST['gepoints']  . "\";\r\n";
            $data .= "\$ranking['vote']['table'] = \"" . $_POST['vtable']  . "\";\r\n";
            $data .= "\$ranking['vote']['top'] = \"" . $_POST['vtop']  . "\";\r\n";
            $data .= "?>";
            fwrite($new_db, $data);
            fclose($new_db);
            echo notice_message_admin('Settings successfully saved', 1, 0, 'index.php?get=table_settings');
        }
        
    }
    
} else {
    if (isset($_POST['module_active'])) {
        require('../engine/tables_config.php');
        $new_db = fopen("../engine/tables_config.php", "w");
        $data   = "<?\r\n";
        $data .= "\$core['config']['on_off'] = \"" . $_POST['module_active'] . "\";\r\n";
        $data .= "\$ranking['character']['table'] = \"" . $ranking['character']['table'] . "\";\r\n";
        $data .= "\$ranking['character']['greset'] = \"" . $ranking['character']['greset'] . "\";\r\n";
        $data .= "\$ranking['character']['top'] = \"" . $ranking['character']['top'] . "\";\r\n";
        $data .= "\$ranking['guild']['table'] = \"" . $ranking['guild']['table']  . "\";\r\n";
        $data .= "\$ranking['guild']['top'] = \"" . $ranking['guild']['top']  . "\";\r\n";
        $data .= "\$ranking['gens']['table'] = \"" . $ranking['gens']['table']  . "\";\r\n";
        $data .= "\$ranking['gens']['top'] = \"" . $ranking['gens']['top']  . "\";\r\n";
        $data .= "\$ranking['gens']['influence'] = \"" . $ranking['gens']['influence']  . "\";\r\n";
        $data .= "\$ranking['gens']['memb'] = \"" . $ranking['gens']['memb']  . "\";\r\n";
        $data .= "\$ranking['gens']['points'] = \"" . $ranking['gens']['points']  . "\";\r\n";
        $data .= "\$ranking['vote']['table'] = \"" . $ranking['vote']['table']   . "\";\r\n";
        $data .= "\$ranking['vote']['top'] = \"" . $ranking['vote']['top']   . "\";\r\n";        
        $data .= "?>";
        fwrite($new_db, $data);
        fclose($new_db);
        
        $new_db2 = fopen("../engine/cms_data/maintenance/maintenance.cms", "w");
        fwrite($new_db2, stripslashes($_POST['reason']));
        fclose($new_db2);
    }
    
    require('../engine/tables_config.php');
    
    
    echo '
<form action="" name="form_edit" method="POST">
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
<tr>
 <td align="center" class="panel_title" colspan="2">Ranking Tables / Settings</td>
</tr>
<tr>
<td align="left" class="panel_title_sub" colspan="2">Table Characters / Top</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Default : Characters</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" name="ctable" value="' . $ranking['character']['table'] . '" maxlength="20"></td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Default : GrandResets / Grand_Resets/td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" name="cgreset" value="' . $ranking['character']['greset'] . '" maxlength="20"></td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Default : 50</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" name="ctop" value="' . $ranking['character']['top'] . '" maxlength="20"></td>
</tr>
<tr>
<td align="left" class="panel_title_sub" colspan="2">Table Guilds / Top</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Default : Guild</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" name="gtable" value="' . $ranking['guild']['table'] . '" maxlength="20"></td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Default : 50</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" name="gtop" value="' . $ranking['guild']['top'] . '" maxlength="20"></td>
</tr>
<tr>
<td align="left" class="panel_title_sub" colspan="2">Table Gens / Top</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Default : Gens</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" name="getable" value="' . $ranking['gens']['table'] . '" maxlength="20"></td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Default : memb_clan / Influence</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" name="geinf" value="' . $ranking['gens']['influence'] . '" maxlength="20"></td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Default : memb_char</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" name="gememb" value="' . $ranking['gens']['memb'] . '" maxlength="20"></td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Default : memb_contribution</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" name="gepoints" value="' . $ranking['gens']['points'] . '" maxlength="20"></td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Default : 50</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" name="getop" value="' . $ranking['gens']['top'] . '" maxlength="20"></td>
</tr>

<!-- END -->
<tr>
<td align="right" class="panel_buttons" colspan="2">
<input type="hidden" name="table_settings">
<input type="submit" value="Save"></td>
</tr>
</table>
</form>
';
}
?> 