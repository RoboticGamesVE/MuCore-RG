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
if (isset($_GET['m'])) {
    if ($_GET['m'] == 'add') {
        if (isset($_POST['add'])) {
            if (empty($_POST['title']) || empty($_POST['cupon_code']) || empty($_POST['credits'])) {
                echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
            } else {
                $title    = safe_input($_POST['title'], '\ ');
                $cupon_code = $_POST['cupon_code'];
                $credits  = $_POST['credits'];
                
                $db = fopen("../engine/variables_mods/cupon_credits.tDB", "a+");
                fwrite($db, uniqid() . "¦" . $title . "¦" . $cupon_code . "¦" . $credits . "¦\n");
                fclose($db);
                echo notice_message_admin('cupon Link successfully added', 1, 0, 'index.php?get=cupon_credits_manager');
            }
            
        } else {
            echo '<form action="" method="POST" name="name">
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
<tr>
 <td align="center" class="panel_title" colspan="2">Add Cupon</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Titulo</td>
</tr>

<tr>
<td align="left" class="panel_text_alt1" width="50%">Cupon title, letters, numbers and spaces only.</td>
<td align="left" class="panel_text_alt2" width="50%"><input type="text"  name="title"></td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Credits</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="50%">Cantidad de creditos que entregara cupon.</td>
<td align="left" class="panel_text_alt2" width="50%"><input type="text" name="credits"></td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Cupon Code</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="50%">Codigo unico de cupon que debes dar a tus users.</td>
<td align="left" class="panel_text_alt2" width="50%"><input type="text" name="cupon_code" value="'.rand(1000,9999).'-'.rand(1000,9999).'-'.rand(1000,9999).'-'.rand(1000,9999).'" readonly></td>
</tr>



<tr>
<td align="center" class="panel_buttons" colspan="2">
<input type="hidden" name="add">
<input type="submit" value="Add Cupon"></td>
</tr>

</table>
</form>';
        }
        
    } elseif ($_GET['m'] == 'edit') {
        $p_id   = safe_input(xss_clean($_GET['id']), '_');
        $p_file = file('../engine/variables_mods/cupon_credits.tDB');
        foreach ($p_file as $check_id) {
            $check_id = explode("¦", $check_id);
            if ($check_id[0] == $p_id) {
                $cupon_id  = $check_id[0];
                $title    = $check_id[1];
                $cupon_code = $check_id[2];
                $credits  = $check_id[3];
                
                break;
            }
        }
        if (isset($_POST['edit'])) {
            if (empty($_POST['title']) || empty($_POST['cupon_code']) || empty($_POST['credits'])) {
                echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
            } else {
                $title    = safe_input($_POST['title'], '\ ');
                $cupon_code = $_POST['cupon_code'];
                $credits  = $_POST['credits'];
                
                
                $old_db = file("../engine/variables_mods/cupon_credits.tDB");
                $new_db = fopen("../engine/variables_mods/cupon_credits.tDB", "w");
                foreach ($old_db as $old_db_line) {
                    $old_db_arr = explode("¦", $old_db_line);
                    if ($p_id != $old_db_arr[0]) {
                        fwrite($new_db, "$old_db_line");
                    } else {
                        fwrite($new_db, $cupon_id . "¦" . $title . "¦" . $cupon_code . "¦" . $credits . "¦\n");
                    }
                }
                fclose($new_db);
                echo notice_message_admin('Cupon Link successfully edited', 1, 0, 'index.php?get=cupon_credits_manager');
            }
            
        } else {
            echo '<form action="" method="POST" name="name">
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
<tr>
 <td align="center" class="panel_title" colspan="2">Edit Cupon</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Titulo</td>
</tr>

<tr>
<td align="left" class="panel_text_alt1" width="50%">cupon title, letters, numbers and spaces only.</td>
<td align="left" class="panel_text_alt2" width="50%"><input type="text"  name="title" value="' . $title . '"></td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Credits</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="50%">Cantidad de creditos que entregara el cupon.</td>
<td align="left" class="panel_text_alt2" width="50%"><input type="text" name="credits" value="' . $credits . '"></td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Cupon Code</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="50%">Codigo de unico de cupon que debes dar a tus users.</td>
<td align="left" class="panel_text_alt2" width="50%"><input type="text" name="cupon_code" value="' . $cupon_code . '" readonly></td>
</tr>

<tr>
<td align="center" class="panel_buttons" colspan="2">
<input type="hidden" name="edit">
<input type="submit" value="Edit Cupon"></td>
</tr>

</table>
</form>';
        }
        
    }
    
} else {
    $get_config = simplexml_load_file('../engine/config_mods/cupon_credits_settings.xml');
    if (isset($_POST['settings'])) {
		$s1 = new_config_xml('../engine/config_mods/cupon_credits_settings', 's1', $_POST['s1']);	
        $s2 = new_config_xml('../engine/config_mods/cupon_credits_settings', 's2', $_POST['s2']);	
        $s3 = new_config_xml('../engine/config_mods/cupon_credits_settings', 's3', $_POST['s3']);	
            echo notice_message_admin('Settings successfully saved', 1, 0, 'index.php?get=cupon_credits_manager');
        
    } else {
        if (isset($_GET['delete'])) {
            if (empty($_GET['delete'])) {
                echo notice_message_admin('Unable to proceed your request.', '1', '1', 'index.php?get=cupon_credits_manager');
            } else {
                $p_id = safe_input(xss_clean($_GET['delete']), '_');
                delete_variable('../engine/variables_mods/cupon_credits.tDB', '0', $p_id, '¦');
                echo notice_message_admin('cupon Link successfully deleted', 1, 0, 'index.php?get=cupon_credits_manager');
            }
        } else {
            if (isset($_POST['module_active'])) {
                $save_status = new_config_xml('../engine/config_mods/cupon_credits_settings', 'active', safe_input($_POST['module_active'], ''));
            }
            $get_config = simplexml_load_file('../engine/config_mods/cupon_credits_settings.xml');
            echo '<form action="" name="settings" method="POST">
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel" style="margin-bottom: 20px;">
<tr>
 <td align="center" class="panel_title" colspan="2">Cupon Credits Settings</td>
</tr>
<tr>';
            if ($get_config->active == '1') {
                echo '<td align="left" class="panel_buttons" style="background: #0C0;"><b>Cupon Credits is active.</b></td>
<td align="right" class="panel_buttons" style="background: #0C0;">
<input type="hidden" name="edit_settings"><input type="submit" value="Turn Cupon Credits Off"><input type="hidden" name="module_active" value="0">';
                
                
            } elseif ($get_config->active == '0') {
                echo '<td align="left" class="panel_buttons" style="background: #C00;"><b>Cupon Credits is inactive.</b></td>
<td align="right" class="panel_buttons" style="background: #C00;">
<input type="hidden" name="edit_settings"><input type="submit" value="Turn Cupon Credits On"><input type="hidden" name="module_active" value="1">';
            }
            echo '</td>
</tr>
</table>
</form>';
            
            echo '<form action="" name="form_edit" method="POST">
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
<tr>
 <td align="center" class="panel_title" colspan="2">Cupon Credits Settings</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">SQL Table</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Reward SQL table name.</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<input type="text" size="30" maxlength="50" value="' . $get_config->s1 . '" name="s1"><br>
</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">SQL Column</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Reward SQL column name.</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<input type="text" size="30" maxlength="50" value="' . $get_config->s2 . '" name="s2"><br>
</td>
</tr>


<tr>
<td align="left" class="panel_title_sub" colspan="2">SQL User Column</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Reward SQL user column name.</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<input type="text" size="30" maxlength="50" value="' . $get_config->s3 . '" name="s3"><br>
</td>
</tr>

<tr>
<td align="right" class="panel_buttons" colspan="2">
<input type="hidden" name="settings">
<input type="submit" value="Save"></td>
</tr>
</table>
</form>';
            
            
            
            echo '
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel" style="margin-top: 20px;">
<tr>
 <td align="center" class="panel_title" colspan="5">cupon Links</td>
</tr>
<tr>
<td align="left" class="panel_title_sub2">Titulo</td>
<td align="left" class="panel_title_sub2">Cupon Code</td>
<td align="left" class="panel_title_sub2">Credits</td>
<td align="left" class="panel_title_sub2" width="80">Controls</td>
</tr>';
            
            
            $cuponf = file('../engine/variables_mods/cupon_credits.tDB');
            $count = 0;
            foreach ($cuponf as $cupon) {
                $cupon_data = explode("¦", $cupon);
                $count++;
                $tr_color = ($count % 2) ? '' : 'even';
                echo '
    <tr class="' . $tr_color . '">
    <td align="left" class="panel_text_alt_list"><strong>' . set_limit($cupon_data[1], 30, '..') . '</strong></td>
    <td align="left" class="panel_text_alt_list">' . set_limit($cupon_data[2], 30, '..') . '</td>
    <td align="left" class="panel_text_alt_list">' . number_format($cupon_data[3]) . '</td>
    <td align="left" class="panel_text_alt_list"><a href="index.php?get=cupon_credits_manager&m=edit&id=' . $cupon_data[0] . '">[Edit]</a> / <a href="#" onclick="ask_url(\'Are you sure you want to delete this cupon link?\',\'index.php?get=cupon_credits_manager&delete=' . $cupon_data[0] . '\')";>[Delete]</a></td>
    </tr>';
            }
            if ($count == '0') {
                echo '<tr>
    <td align="center" class="panel_text_alt_list" colspan="4"><em>No cupon Links Found</em></td>
    </tr>';
            }
			
			if ($count >= '5') {
                echo '<tr>
    <td align="center" class="panel_text_alt_list" colspan="4"><em>Limite de Cupones alcanzado Solicita el <a href="https://www.facebook.com/RoboticGames" target="_blank">>Modulo Premium</a></em></td>
    </tr>';
            }
			else {
			
            echo '<tr>
<td align="center" class="panel_buttons" colspan="4">
<input type="button" value="Add Cupon" onclick="location.href=\'index.php?get=cupon_credits_manager&m=add\'"></td>';
			}
echo '</tr>
</table>';
        }
    }
    
}
?> 