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
            if (empty($_POST['cname']) || empty($_POST['position'])) {
                echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
            } else {
                $cname    = safe_input($_POST['cname'], '\ ');
                $position = $_POST['position'];
                
                $db = fopen("../engine/variables_mods/staff_members.tDB", "a+");
                fwrite($db, uniqid() . ":" . $cname . ":" . $position . ":\n");
                fclose($db);
                echo notice_message_admin('Staff members successfully added', 1, 0, 'index.php?get=staff_manager');
            }
            
        } else {
            echo '<form action="" method="POST" name="name">
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
<tr>
 <td align="center" class="panel_title" colspan="2">Add Member in Staff</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Character Name</td>
</tr>

<tr>
<td align="left" class="panel_text_alt2" width="50%"><input type="text"  name="cname"></td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Position</td>
</tr>
<tr>
<td align="left" class="panel_text_alt2" width="50%"><input type="text" name="position"></td>
</tr>
<tr>
<td align="center" class="panel_buttons" colspan="2">
<input type="hidden" name="add">
<input type="submit" value="Add Member"></td>
</tr>

</table>
</form>';
        }
        
    } elseif ($_GET['m'] == 'edit') {
        $p_id   = safe_input(xss_clean($_GET['id']), '_');
        $p_file = file('../engine/variables_mods/staff_members.tDB');
        foreach ($p_file as $check_id) {
            $check_id = explode(":", $check_id);
            if ($check_id[0] == $p_id) {
                $staff_id  = $check_id[0];
                $cname    = $check_id[1];
                $position = $check_id[2];
                
                break;
            }
        }
        if (isset($_POST['edit'])) {
            if (empty($_POST['cname']) || empty($_POST['position'])) {
                echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
            } else {
                $cname    = safe_input($_POST['cname'], '\ ');
                $position = $_POST['position'];
                             
                $old_db = file("../engine/variables_mods/staff_members.tDB");
                $new_db = fopen("../engine/variables_mods/staff_members.tDB", "w");
                foreach ($old_db as $old_db_line) {
                    $old_db_arr = explode(":", $old_db_line);
                    if ($p_id != $old_db_arr[0]) {
                        fwrite($new_db, "$old_db_line");
                    } else {
                        fwrite($new_db, $staff_id . ":" . $cname . ":" . $position . ":\n");
                    }
                }
                fclose($new_db);
                echo notice_message_admin('Staff member successfully edited', 1, 0, 'index.php?get=staff_manager');
            }
            
        } else {
            echo '<form action="" method="POST" name="name">
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
<tr>
 <td align="center" class="panel_title" colspan="2">Edit Member</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Character Name</td>
<td align="left" class="panel_text_alt2" width="50%"><input type="text"  name="cname" value="' . $cname . '"></td>
</tr>
<tr>
<td align="left" class="panel_title_sub" colspan="2">Position</td>
<td align="left" class="panel_text_alt2" width="50%"><input type="text" name="position" value="' . $position . '"></td>
</tr>
<tr>
  <td align="center" class="panel_buttons" colspan="2">
  <input type="hidden" name="edit">
  <input type="submit" value="Edit Member"></td>
</tr>

</table>
</form>';
        }
        
    }
    
} else {
    $get_config = simplexml_load_file('../engine/config_mods/staff_manager_settings.xml');
    if (isset($_POST['settings'])) {
        if (empty($_POST['delay_hours'])) {
            echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
        } else {
            $save_1 = new_config_xml('../engine/config_mods/vote_credits_settings', 'delay_hours', safe_input($_POST['delay_hours'], ''));
            echo notice_message_admin('Settings successfully saved', 1, 0, 'index.php?get=staff_manager');
        }
        
    } else {
        if (isset($_GET['delete'])) {
            if (empty($_GET['delete'])) {
                echo notice_message_admin('Unable to proceed your request.', '1', '1', 'index.php?get=staff_manager');
            } else {
                $p_id = safe_input(xss_clean($_GET['delete']), '_');
                delete_variable('../engine/variables_mods/staff_members.tDB', '0', $p_id, ':');
                echo notice_message_admin('Staff Member successfully deleted', 1, 0, 'index.php?get=staff_manager');
            }
        } else {
            if (isset($_POST['module_active'])) {
                $save_status = new_config_xml('../engine/config_mods/staff_manager_settings', 'active', safe_input($_POST['module_active'], ''));
            }
            $get_config = simplexml_load_file('../engine/config_mods/staff_manager_settings.xml');
            echo '<form action="" name="settings" method="POST">
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel" style="margin-bottom: 20px;">
<tr>
 <td align="center" class="panel_title" colspan="2">Saff Members Settings</td>
</tr>
<tr>';
            if ($get_config->active == '1') {
                echo '<td align="left" class="panel_buttons" style="background: #0C0;"><b>Staff Members is active.</b></td>
<td align="right" class="panel_buttons" style="background: #0C0;">
<input type="hidden" name="edit_settings"><input type="submit" value="Turn Staff Members Off"><input type="hidden" name="module_active" value="0">';
                
                
            } elseif ($get_config->active == '0') {
                echo '<td align="left" class="panel_buttons" style="background: #C00;"><b>Staff Members is inactive.</b></td>
<td align="right" class="panel_buttons" style="background: #C00;">
<input type="hidden" name="edit_settings"><input type="submit" value="Turn Staff Members On"><input type="hidden" name="module_active" value="1">';
            }
            echo '</td>
</tr>
</table>
</form>';
 
            
            echo '
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel" style="margin-top: 20px;">
<tr>
 <td align="center" class="panel_title" colspan="5">Staff members</td>
</tr>
<tr>
<td align="left" class="panel_title_sub2">Character Name</td>
<td align="left" class="panel_title_sub2">Position</td>
<td align="left" class="panel_title_sub2" width="80">Controls</td>
</tr>';
            
            
            $smf = file('../engine/variables_mods/staff_members.tDB');
            $count = 0;
            foreach ($smf as $staff) {
                $staff_data = explode(":", $staff);
                $count++;
                $tr_color = ($count % 2) ? '' : 'even';
                echo '
    <tr class="' . $tr_color . '">
    <td align="left" class="panel_text_alt_list"><strong>' . set_limit($staff_data[1], 30, '..') . '</strong></td>
    <td align="left" class="panel_text_alt_list">' . set_limit($staff_data[2], 30, '..') . '</td>
    <td align="left" class="panel_text_alt_list"><a href="index.php?get=staff_manager&m=edit&id=' . $staff_data[0] . '">[Edit]</a> / <a href="#" onclick="ask_url(\'Are you sure you want to delete this vote link?\',\'index.php?get=staff_manager&delete=' . $staff_data[0] . '\')";>[Delete]</a></td>
    </tr>';
            }
            if ($count == '0') {
                echo '<tr>
    <td align="center" class="panel_text_alt_list" colspan="4"><em>No Vote Links Found</em></td>
    </tr>';
            }
            
            echo '<tr>
<td align="center" class="panel_buttons" colspan="4">
<input type="button" value="Add Member" onclick="location.href=\'index.php?get=staff_manager&m=add\'"></td>
</tr>
</table>';
        }
    }
    
}
?> 