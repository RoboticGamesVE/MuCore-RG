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
$author = $core['config']['admin_nick'];
if (isset($_GET['mod'])) {
    if ($_GET['mod'] == 'add_events') {
        if (isset($_POST['add_events'])) {
            if (empty($_POST['e_title']) || empty($_POST['e_new']) || empty($_POST['e_content'])) {
                echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
            } else {
                $events_content = str_replace("\r", "", $_POST['e_content']);
                $events_content = str_replace("\n", "", $events_content);
                $events_content = str_replace("\r\n", "", $events_content);
                $events_content = str_replace("¦", "", $events_content);
                if (substr($events_content, 0, 3) == '<p>') {
                    $events_content = substr_replace($events_content, "", 0, 3);
                }
                
                
                $db = fopen("../engine/variables_mods/events.tDB", "a+");
                fwrite($db, uniqid() . "¦Event¦" . str_replace("¦", "", stripslashes($_POST['e_title'])) . "¦" . stripslashes($events_content) . "¦" . time() . "¦" . $author . "¦" . (time() + ($_POST['e_new'] * 86400)) . "¦" . $_POST['e_active'] . "¦" . $_POST['e_archive'] . "¦\n");
                fclose($db);
                echo notice_message_admin('Event successfully added', 1, 0, 'index.php?get=events_manager');
                
            }
            
        } else {
            echo '<!-- tinyMCE -->
    <script language="javascript" type="text/javascript" src="script/tiny_mce/tiny_mce.js"></script>
    <script language="javascript" type="text/javascript">
        // Notice: The simple theme does not use all options some of them are limited to the advanced theme
        tinyMCE.init({
            mode : "textareas",
            theme : "advanced",
            theme_advanced_buttons2_add : "forecolor",
               theme_advanced_buttons1_add : "fontselect,fontsizeselect"
        });
    </script>
    
    <form action="" method="POST" name="events">
    <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
    <tr>
     <td align="center" class="panel_title" colspan="2">Add Events</td>
    </tr>
    
    <tr>
    <td align="left" class="panel_title_sub" colspan="2">Title</td>
    </tr>
    <tr>
    <td align="left" class="panel_text_alt1" width="50%">Events Title that will appear on events.</td>
    <td align="left" class="panel_text_alt2" width="50%"><input type="text"  name="e_title" size="40"></td>
    </tr>
    
    

    <tr>
    <td align="left" class="panel_title_sub" colspan="2">New Notice</td>
    </tr>
    <tr>
    <td align="left" class="panel_text_alt1" width="50%">Set the number of days this events will show New Icon.</td>
    <td align="left" class="panel_text_alt2" width="50%">
    <select name="e_new">
    <option value="0" selected="selected">Choose days</option>
        <optgroup label="---------------">
        <option value="1">1 day</option>
        ';
            $i = 1;
            while ($i <= 30) {
                $i++;
                echo '<option value="' . $i . '">' . $i . ' days</option>';
            }
            echo '
        

        
    </select></td
    </tr>
    
    

    <tr>
    <td align="left" class="panel_title_sub" colspan="2">Events Archive</td>
    </tr>
    <tr>
    <td align="left" class="panel_text_alt1" width="50%">When set \'Yes\' this events will moved to events archive.<br<br>Note: archived events are not displayed on events.</td>
    <td align="left" class="panel_text_alt2" width="50%"><label><input type="radio" name="e_archive" value="0">Yes</label> <label><input type="radio" name="e_archive" value="1" checked="checked">No</label></td
    </tr>
    

    <tr>
    <td align="left" class="panel_title_sub" colspan="2">Active</td>
    </tr>
    <tr>
    <td align="left" class="panel_text_alt1" width="50%">When set \'No\' this events will not be visibile.</td>
    <td align="left" class="panel_text_alt2" width="50%"><label><input type="radio" name="e_active" checked="checked" value="1">Yes</label> <label><input type="radio" name="e_active" value="0">No</label></td
    </tr>
    
    
    <tr>
    <td align="left" class="panel_title_sub" colspan="2">events Content</td>
    </tr>
    <tr>
    <td  class="panel_text_area" colspan="2" width="60%"><textarea id="e_content" name="e_content" rows="24" style="width: 100%;"></textarea></td>
    </tr>
    
    
    <tr>
    <td align="center" class="panel_buttons" colspan="2">
    <input type="hidden" name="m_type" value="0">
    <input type="hidden" name="add_events">
    <input type="submit" value="Add Events"></td>
    </tr>
    
    </table>
    </form>';
        }
        
    } elseif ($_GET['mod'] == 'edit_events') {
        $p_id   = safe_input(xss_clean($_GET['id']), '_');
        $p_file = file('../engine/variables_mods/events.tDB');
        foreach ($p_file as $check_id) {
            $check_id = explode("¦", $check_id);
            if ($check_id[0] == $p_id) {
                $p_id_found = '1';
                $e_id       = $check_id[0];
                $e_title    = $check_id[2];
                $e_content  = $check_id[3];
                $e_date     = $check_id[4];
                $e_author   = $check_id[5];
                $e_new      = $check_id[6];
                $e_active   = $check_id[7];
                $e_archive  = $check_id[8];
                break;
            }
        }
        if (isset($_POST['edit_events'])) {
            if (empty($_POST['e_title']) || empty($_POST['e_content'])) {
                echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
            } else {
                $events_content = str_replace("\r", "", $_POST['e_content']);
                $events_content = str_replace("\n", "", $events_content);
                $events_content = str_replace("\r\n", "", $events_content);
                $events_content = str_replace("¦", "", $events_content);
                if (substr($events_content, 0, 3) == '<p>') {
                    $events_content = substr_replace($events_content, "", 0, 3);
                }
                
                
                $old_db = file("../engine/variables_mods/events.tDB");
                $new_db = fopen("../engine/variables_mods/events.tDB", "w");
                foreach ($old_db as $old_db_line) {
                    $old_db_arr = explode("¦", $old_db_line);
                    if ($p_id != $old_db_arr[0]) {
                        fwrite($new_db, "$old_db_line");
                    } else {
                        fwrite($new_db, $e_id . "¦Events¦" . str_replace("¦", "", stripslashes($_POST['e_title'])) . "¦" . $events_content . "¦" . $e_date . "¦" . $e_author . "¦" . $e_new . "¦" . $_POST['e_active'] . "¦" . $_POST['e_archive'] . "¦\n");
                    }
                }
                fclose($new_db);
                
                
                
                
                #delete_variable('../engine/variables_mods/events.tDB','0',$p_id,'¦');
                echo notice_message_admin('Events successfully edited', 1, 0, 'index.php?get=events_manager');
                
                
                
            }
        } else {
            echo '<!-- tinyMCE -->
    <script language="javascript" type="text/javascript" src="script/tiny_mce/tiny_mce.js"></script>
    <script language="javascript" type="text/javascript">
        // Notice: The simple theme does not use all options some of them are limited to the advanced theme
        tinyMCE.init({
            mode : "textareas",
            theme : "advanced",
            theme_advanced_buttons2_add : "forecolor",
               theme_advanced_buttons1_add : "fontselect,fontsizeselect"
        });
    </script>
    
    <form action="" method="POST" name="events">
    <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
    <tr>
     <td align="center" class="panel_title" colspan="2">Add Events</td>
    </tr>
    
    <tr>
    <td align="left" class="panel_title_sub" colspan="2">Title</td>
    </tr>
    <tr>
    <td align="left" class="panel_text_alt1" width="50%">Events Title that will appear on events.</td>
    <td align="left" class="panel_text_alt2" width="50%"><input type="text"  name="e_title" size="40" value="' . htmlspecialchars($e_title) . '"></td>
    </tr>
    
    
    

    <tr>
    <td align="left" class="panel_title_sub" colspan="2">Events Archive</td>
    </tr>
    <tr>
    <td align="left" class="panel_text_alt1" width="50%">When set \'Yes\' this events will moved to events archive.<br<br>Note: archived events are not displayed on events.</td>
    <td align="left" class="panel_text_alt2" width="50%">';
            switch ($e_archive) {
                case '0':
                    echo '<label><input type="radio" name="e_archive" value="0"  checked="checked">Yes</label> <label><input type="radio" name="e_archive" value="1">No</label>';
                    break;
                case '1':
                    echo '<label><input type="radio" name="e_archive" value="0"  >Yes</label> <label><input type="radio" name="e_archive" value="1" checked="checked">No</label>';
                    break;
            }
            echo '</td
    </tr>
    

    <tr>
    <td align="left" class="panel_title_sub" colspan="2">Active</td>
    </tr>
    <tr>
    <td align="left" class="panel_text_alt1" width="50%">When set \'No\' this events will not be visibile.</td>
    <td align="left" class="panel_text_alt2" width="50%">';
            switch ($e_active) {
                case '0':
                    echo '<label><input type="radio" name="e_active" value="1">Yes</label> <label><input type="radio" name="e_active" value="0"  checked="checked">No</label>';
                    break;
                case '1':
                    echo '<label><input type="radio" name="e_active" checked="checked" value="1">Yes</label> <label><input type="radio" name="e_active" value="0">No</label>';
                    break;
            }
            echo '</td
    </tr>
    
    
    <tr>
    <td align="left" class="panel_title_sub" colspan="2">Events Content</td>
    </tr>
    <tr>
    <td  class="panel_text_area" colspan="2" width="60%"><textarea id="e_content" name="e_content" rows="24" style="width: 100%;">' . $e_content . '</textarea></td>
    </tr>
    
    
    <tr>
    <td align="center" class="panel_buttons" colspan="2">
    
    <input type="hidden" name="edit_events">
    <input type="submit" value="Edit Events"></td>
    </tr>
    
    </table>
    </form>';
        }
        
    }
    
} else {
    if (isset($_POST['masive_delete'])) {
        if (empty($_POST['events_code_delete'])) {
            echo notice_message_admin('No events selected.', 0, 1, 0);
        } else {
            $count = 0;
            foreach ($_POST['events_code_delete'] as $post_name => $post_code) {
                $count++;
                delete_variable('../engine/variables_mods/events.tDB', '0', $post_code, '¦');
                
            }
            echo notice_message_admin('<b>' . $count . '</b> events successfully deleted.', 1, 0, 'index.php?get=events_manager');
        }
    } elseif (isset($_GET['delete_events'])) {
        if (empty($_GET['delete_events'])) {
            echo notice_message_admin('Unable to proceed your request.', '1', '1', 'index.php?get=events_manager');
        } else {
            $p_id   = safe_input(xss_clean($_GET['delete_events']), '_');
            $p_file = file('../engine/variables_mods/events.tDB');
            foreach ($p_file as $check_id) {
                $check_id = explode("¦", $check_id);
                if ($check_id[0] == $p_id) {
                    $p_id_found = '1';
                    break;
                }
            }
            if ($p_id_found != '1') {
                echo notice_message_admin('Events with ID: <b>' . $p_id . '</b> does not exist.', '0', '1', '0');
            } else {
                delete_variable('../engine/variables_mods/events.tDB', '0', $p_id, '¦');
                echo notice_message_admin('Events successfully deleted', 1, 0, 'index.php?get=events_manager');
            }
        }
        
    } elseif (isset($_GET['move_listed'])) {
        if (empty($_GET['move_listed'])) {
            echo notice_message_admin('Unable to proceed your request.', '1', '1', 'index.php?get=events_manager');
        } else {
            $p_id   = safe_input(xss_clean($_GET['move_listed']), '_');
            $p_file = file('../engine/variables_mods/events.tDB');
            foreach ($p_file as $check_id) {
                $check_id = explode("¦", $check_id);
                if ($check_id[0] == $p_id) {
                    $p_id_found = '1';
                    $e_id       = $check_id[0];
                    $e_title    = $check_id[2];
                    $e_content  = $check_id[3];
                    $e_date     = $check_id[4];
                    $e_author   = $check_id[5];
                    $e_new      = $check_id[6];
                    $e_active   = $check_id[7];
                    break;
                }
            }
            if ($p_id_found != '1') {
                echo notice_message_admin('Events with ID: <b>' . $p_id . '</b> does not exist.', '0', '1', '0');
            } else {
                $old_db = file("../engine/variables_mods/events.tDB");
                $new_db = fopen("../engine/variables_mods/events.tDB", "w");
                foreach ($old_db as $old_db_line) {
                    $old_db_arr = explode("¦", $old_db_line);
                    if ($p_id != $old_db_arr[0]) {
                        fwrite($new_db, "$old_db_line");
                    } else {
                        fwrite($new_db, $e_id . "¦Events¦" . $e_title . "¦" . $e_content . "¦" . $e_date . "¦" . $e_author . "¦" . $e_new . "¦" . $e_active . "¦1¦\n");
                    }
                }
                fclose($new_db);
                #delete_variable('../engine/variables_mods/events.tDB','0',$p_id,'¦');
                echo notice_message_admin('Events successfully moved to Listed Events', 1, 0, 'index.php?get=events_manager');
            }
        }
        
    } elseif (isset($_GET['move_archive'])) {
        if (empty($_GET['move_archive'])) {
            echo notice_message_admin('Unable to proceed your request.', '1', '1', 'index.php?get=events_manager');
        } else {
            $p_id   = safe_input(xss_clean($_GET['move_archive']), '_');
            $p_file = file('../engine/variables_mods/events.tDB');
            foreach ($p_file as $check_id) {
                $check_id = explode("¦", $check_id);
                if ($check_id[0] == $p_id) {
                    $p_id_found = '1';
                    $e_id       = $check_id[0];
                    $e_title    = $check_id[2];
                    $e_content  = $check_id[3];
                    $e_date     = $check_id[4];
                    $e_author   = $check_id[5];
                    $e_new      = $check_id[6];
                    $e_active   = $check_id[7];
                    break;
                }
            }
            if ($p_id_found != '1') {
                echo notice_message_admin('Events with ID: <b>' . $p_id . '</b> does not exist.', '0', '1', '0');
            } else {
                $old_db = file("../engine/variables_mods/events.tDB");
                $new_db = fopen("../engine/variables_mods/events.tDB", "w");
                foreach ($old_db as $old_db_line) {
                    $old_db_arr = explode("¦", $old_db_line);
                    if ($p_id != $old_db_arr[0]) {
                        fwrite($new_db, "$old_db_line");
                    } else {
                        fwrite($new_db, $e_id . "¦Events¦" . $e_title . "¦" . $e_content . "¦" . $e_date . "¦" . $e_author . "¦" . $e_new . "¦" . $e_active . "¦0¦\n");
                    }
                }
                fclose($new_db);
                #delete_variable('../engine/variables_mods/events.tDB','0',$p_id,'¦');
                echo notice_message_admin('Events successfully moved to Archived Events', 1, 0, 'index.php?get=events_manager');
            }
        }
    } else {
        if (isset($_POST['module_active'])) {
            $save_status = new_config_xml('../engine/config_mods/events_settings', 'active', safe_input($_POST['module_active'], ''));
        }
        $get_config = simplexml_load_file('../engine/config_mods/events_settings.xml');
        echo '<form action="" name="settings" method="POST">
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel" style="margin-bottom: 20px;">
<tr>
 <td align="center" class="panel_title" colspan="2">Events Settings</td>
</tr>
<tr>';
        if ($get_config->active == '1') {
            echo '<td align="left" class="panel_buttons" style="background: #0C0;"><b>Events are active.</b></td>
<td align="right" class="panel_buttons" style="background: #0C0;">
<input type="hidden" name="edit_settings"><input type="submit" value="Turn Events Off"><input type="hidden" name="module_active" value="0">';
            
            
        } elseif ($get_config->active == '0') {
            echo '<td align="left" class="panel_buttons" style="background: #C00;"><b>Events are inactive.</b></td>
<td align="right" class="panel_buttons" style="background: #C00;">
<input type="hidden" name="edit_settings"><input type="submit" value="Turn Events On"><input type="hidden" name="module_active" value="1">';
        }
        echo '</td>
</tr>
</table>
</form>';
        
        
        echo '
        <form action="" method="POST" name="delete_events" onclick="cCheck(document.delete_events,\'events_code_delete[]\',\'events_selected\');"><input type="hidden" name="masive_delete">
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
<tr>
 <td align="center" class="panel_title" colspan="5">Listed Events</td>
</tr>
<tr>
<td align="left" class="panel_title_sub2">Title</td>
<td align="left" class="panel_title_sub2">Date</td>
<td align="left" class="panel_title_sub2">Status</td>
<td align="left" class="panel_title_sub2">Controls</td>
</tr>';
        $events_file = file('../engine/variables_mods/events.tDB');
        $count     = 0;
        foreach ($events_file as $events) {
            $events = explode("¦", $events);
            if ($events[8] == '1') {
                $count++;
                $tr_color = ($count % 2) ? '' : 'even';
                $events[2]  = strlen($events[2]) > 78 ? substr($events[2], 0, 78) . "..." : $events[2];
                echo '
            
            <tr class="' . $tr_color . '">
            <td align="left" class="panel_text_alt_list"><strong>' . $events[2] . '</strong></td>
            <td align="left" class="panel_text_alt_list" width="150">' . date('F j, Y / H:i', $events[4]) . '</td>
            <td align="left" class="panel_text_alt_list" width="50"><strong>';
                switch ($events[7]) {
                    case '1':
                        echo 'Active';
                        break;
                    case '0':
                        echo 'Inactive';
                        break;
                }
                
                echo '</strong></td>
            <td align="left" class="panel_text_alt_list" width="200"><a href="index.php?get=events_manager&mod=edit_events&id=' . $events[0] . '">[Edit]</a> / <a href="javascript:;" onclick="ask_url(\'Move to Archived events?\',\'index.php?get=events_manager&move_archive=' . $events[0] . '\')";>[Move to Archive]</a> / <a href="javascript:;" onclick="ask_url(\'Are you sure you want to delete this events?\',\'index.php?get=events_manager&delete_events=' . $events[0] . '\')";>[Delete]</a>&nbsp;<input name="events_code_delete[]" type="checkbox"  value="' . $events[0] . '"></td></tr>
            
            ';
            }
            
        }
        echo '<tr>
<td align="center" class="panel_buttons" colspan="5">

<div id=""><div align="right"><input type="hidden" name="masive_delete"><a href="javascript:void(0)" onclick="CheckAll(document.delete_events,\'events_code_delete[]\'); ">[Check All]</a> <a href="javascript:void(0)" onclick="UnCheckAll(document.delete_events,\'events_code_delete[]\'); ">[Uncheck All]</a><br><br>
<input type="submit" name="events_selected" id="events_selected" value="Delete Selected (0)" onclick="return ask_form(\'Are you sure you want to delete selected events?\')"> </div>

<input type="button" value="Add events" onclick="location.href=\'index.php?get=events_manager&mod=add_events\'"></td>
</tr>
</table></form>';
        
        echo '
<form action="" method="POST" name="delete_archive" onclick="cCheck(document.delete_archive,\'events_code_delete[]\',\'archive_selected\');"><input type="hidden" name="masive_delete">
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel" style="margin-top: 20px">
<tr>
 <td align="center" class="panel_title" colspan="5">Archived events</td>
</tr>
<tr>
<td align="left" class="panel_title_sub2">Title</td>
<td align="left" class="panel_title_sub2">Date</td>
<td align="left" class="panel_title_sub2">Status</td>
<td align="left" class="panel_title_sub2">Controls</td>
</tr>';
        
        $count = 0;
        foreach ($events_file as $events) {
            $events = explode("¦", $events);
            if ($events[8] == '0') {
                $count++;
                $tr_color = ($count % 2) ? '' : 'even';
                $events[2]  = strlen($events[2]) > 78 ? substr($events[2], 0, 78) . "..." : $events[2];
                echo '<tr class="' . $tr_color . '">
            <td align="left" class="panel_text_alt_list"><strong>' . $events[2] . '</strong></td>
            <td align="left" class="panel_text_alt_list" width="150">' . date('F j, Y / H:i', $events[4]) . '</td>
            <td align="left" class="panel_text_alt_list" width="50"><strong>';
                switch ($events[7]) {
                    case '1':
                        echo 'Active';
                        break;
                    case '0':
                        echo 'Inactive';
                        break;
                }
                echo '</strong></td>
            <td align="left" class="panel_text_alt_list" width="200"><a href="index.php?get=events_manager&mod=edit_events&id=' . $events[0] . '">[Edit]</a> / <a href="javascript:;" onclick="ask_url(\'Move to Listed events?\',\'index.php?get=events_manager&move_listed=' . $events[0] . '\')";>[Move to Listed]</a> / <a href="javascript:;" onclick="ask_url(\'Are you sure you want to delete this events?\',\'index.php?get=events_manager&delete_events=' . $events[0] . '\')";>[Delete]</a>&nbsp;<input name="events_code_delete[]" type="checkbox"  value="' . $events[0] . '"></td></tr>
            ';
            }
            
        }
        echo '
<tr>
<td align="center" class="panel_buttons" colspan="5">

<div id=""><div align="right"><input type="hidden" name="masive_delete"><a href="javascript:void(0)" onclick="CheckAll(document.delete_archive,\'events_code_delete[]\'); ">[Check All]</a> <a href="javascript:void(0)" onclick="UnCheckAll(document.delete_archive,\'events_code_delete[]\'); ">[Uncheck All]</a><br><br>
<input type="submit" name="archive_selected" id="archive_selected" value="Delete Selected (0)" onclick="return ask_form(\'Are you sure you want to delete selected events?\')"> </div>


</tr>
</table></form>';
        
    }
    
}
?> 