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
if (isset($_GET['mod'])) {
    if ($_GET['mod'] == 'new') {
        if (isset($_POST['new'])) {
            if (empty($_POST['ann_title']) || empty($_POST['ann_expire']) || empty($_POST['ann_content'])) {
                echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
            } else {
                $ann_content = str_replace("\r", "", $_POST['ann_content']);
                $ann_content = str_replace("\n", "", $ann_content);
                $ann_content = str_replace("\r\n", "", $ann_content);
                $ann_content = str_replace("¦", "", $ann_content);
                
                if (substr($ann_content, 0, 3) == '<p>') {
                    $ann_content = substr_replace($ann_content, "", 0, 3);
                }
                
                $db = fopen("../engine/variables_mods/announcements.tDB", "a+");
                fwrite($db, uniqid() . "¦" . str_replace("¦", "", stripslashes($_POST['ann_title'])) . "¦" . time() . "¦" . (time() + ($_POST['ann_expire'] * 86400)) . "¦" . stripslashes($ann_content) . "¦\n");
                fclose($db);
                echo notice_message_admin('Announcement successfully added', 1, 0, 'index.php?get=announcements_manager');
            }
            
        } else {
            echo '
    <!-- tinyMCE -->
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


<form action="" method="post" id="form2">
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card" style="margin-bottom: 0px;">
					<div class="header">
						<h2 style="text-align: center;">
							Add Announcement
						</h2>
					</div>
					<div class="body">
                    	
						<!-- input text -->
						<p class="lead" align="left">
                        	Title
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Announcement Title that will appear on announcement.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="ann_title">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input select -->
						<p class="lead" align="left">
                        	Expire
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Set in how many days announcement will expire.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	
									<div style="border-bottom: none;">
                                    	<select name="ann_expire" style="border: none;font-size: 14px;float: right;width: 100%;">
                                        	<option value="0" selected="selected">Choose days</option>
        									<optgroup label="---------------">
        									<option value="1">1 day</option>';
            								$i = 1;
            								while ($i <= 89) {
                								$i++;
                								echo '<option value="' . $i . '">' . $i . ' days</option>';
            								}
											echo '
                                		</select>
                                    </div>
									
                                </div>
                            </div>
                        </div>
						<!-- #END# input select -->
						
						<!-- input text -->
    <td  class="panel_text_area" colspan="2" width="60%"></td>
    </tr>
						<p class="lead" align="left">
                        	Announcement Content
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 100%;text-align: left;">
                            	<textarea name="ann_content" rows="24" style="width: 100%;"></textarea>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100%;margin-bottom: 0px;">
                                        <button type="submit" form="form2" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 100px;margin-top: 5px;">Post Announcement</button>
                                	</div>
                             	</div>
                            </p>
					</div>
				</div>
			</div>
		</div>
	<!-- #END# Body Copy -->
	</div>
</section>
<input type="hidden" name="new">
</form>';
        }
        
    } elseif ($_GET['mod'] == 'edit') {
        $p_id   = safe_input(xss_clean($_GET['id']), '_');
        $p_file = file('../engine/variables_mods/announcements.tDB');
        foreach ($p_file as $check_id) {
            $check_id = explode("¦", $check_id);
            if ($check_id[0] == $p_id) {
                $p_id_found  = '1';
                $ann_id      = $check_id[0];
                $ann_title   = $check_id[1];
                $ann_date    = $check_id[2];
                $ann_expire  = $check_id[3];
                $ann_content = $check_id[4];
                break;
            }
        }
        if (isset($_POST['edit'])) {
            if (empty($_POST['ann_title']) || empty($_POST['ann_content'])) {
                echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
            } else {
                $ann_content = str_replace("\r", "", $_POST['ann_content']);
                $ann_content = str_replace("\n", "", $ann_content);
                $ann_content = str_replace("\r\n", "", $ann_content);
                $ann_content = str_replace("¦", "", $ann_content);
                
                if (substr($ann_content, 0, 3) == '<p>') {
                    $ann_content = substr_replace($ann_content, "", 0, 3);
                }
                
                $old_db = file("../engine/variables_mods/announcements.tDB");
                $new_db = fopen("../engine/variables_mods/announcements.tDB", "w");
                foreach ($old_db as $old_db_line) {
                    $old_db_arr = explode("¦", $old_db_line);
                    if ($p_id != $old_db_arr[0]) {
                        fwrite($new_db, "$old_db_line");
                    } else {
                        fwrite($new_db, $ann_id . "¦" . str_replace("¦", "", stripslashes($_POST['ann_title'])) . "¦" . $ann_date . "¦" . $ann_expire . "¦" . stripslashes($ann_content) . "¦\n");
                    }
                }
                fclose($new_db);

                #delete_variable('../engine/variables_mods/news.tDB','0',$p_id,'¦');
                echo notice_message_admin('Announcement successfully edited', 1, 0, 'index.php?get=announcements_manager');
                
            }
            
        } else {
            echo '
    <!-- tinyMCE -->
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

	
<form action="" method="post" id="form2">
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card" style="margin-bottom: 0px;">
					<div class="header">
						<h2 style="text-align: center;">
							Edit Announcement
						</h2>
					</div>
					<div class="body">
                    	
						<!-- input text -->
						<p class="lead" align="left">
                        	Title
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Announcement Title that will appear on announcement.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="ann_title" value="' . $ann_title . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	Announcement Content
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 100%;text-align: left;">
                            	<textarea name="ann_content" rows="24" style="width: 100%;">' . $ann_content . '</textarea>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100%;margin-bottom: 0px;">
                                        <button type="submit" form="form2" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 100px;margin-top: 5px;">Edit Announcement</button>
                                	</div>
                             	</div>
                            </p>
					</div>
				</div>
			</div>
		</div>
	<!-- #END# Body Copy -->
	</div>
</section>
<input type="hidden" name="edit">
</form>';
        }
        
    }
    
} else {
    if (isset($_GET['delete'])) {
        $p_id = safe_input(xss_clean($_GET['delete']), '_');
        delete_variable('../engine/variables_mods/announcements.tDB', '0', $p_id, '¦');
        echo notice_message_admin('Announcement successfully deleted', 1, 0, 'index.php?get=announcements_manager');
        
    } else {
        echo '
<form action="index.php?get=announcements_manager&mod=new" method="post" id="form2">
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card" style="margin-bottom: 0px;">
					<div class="header">
						<h2 style="text-align: center;">
							Announcements
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- input table -->
                        <!-- <div class="body table-responsive"> -->
                        <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Expire</th>
										<th>Controls</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px;">';
		$ann_file = array_reverse(file('../engine/variables_mods/announcements.tDB'));
        $count = 0;
        foreach ($ann_file as $ann) {
            $ann = explode("¦", $ann);
            $count++;
            if ($ann[3] < time()) {
                $expire = '<b>Expired</b>';
            } else {
                $expire = date('F j, Y / H:i', $ann[3]);
            }
            $ann[1] = strlen($ann[1]) > 78 ? substr($ann[1], 0, 78) . "..." : $ann[1];
            echo '
			<tr>
            <th scope="row"><strong>' . $ann[1] . '</strong></h>
            <td>' . date('F j, Y / H:i', $ann[2]) . '</td>
            <td>' . $expire . '</td>
            <td>
			<a href="index.php?get=announcements_manager&mod=edit&id=' . $ann[0] . '">[Edit]</a> / 
			<a href="index.php?get=announcements_manager&delete=' . $ann[0] . '">[Delete]</a></td>
            </tr>';
        }
								echo '
                                </tbody>
                            </table>
                            <!-- #END# input table -->
                            
                        
						<p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100%;margin-bottom: 0px;">
                                        <button type="submit" form="form2" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 100px;margin-top: 5px;">Post New Announcement</button>
                                	</div>
                             	</div>
                            </p>
					</div>
				</div>
			</div>
		</div>
	<!-- #END# Body Copy -->
	</div>
</section>
</form>';        
    }
}
?> 