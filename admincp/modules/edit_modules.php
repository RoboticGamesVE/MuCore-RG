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
if (isset($_GET['edit_module'])) {
    if ($_GET['m'] == '0') {
        $m_id        = safe_input(xss_clean($_GET['edit_module']), '_');
        $get_modules = file('../engine/cms_data/mods.cms');
        
        foreach ($get_modules as $module) {
            $module = explode("¦", $module);
            if ($module[0] == $m_id) {
                $found    = 1;
                $m_idd    = $module[0];
                $m_title  = $module[3];
                $m_active = $module[4];
                $m_type   = $module[1];
                break;
            }
        }
        
        if ($found == '1') {
            if (isset($_POST['edit_module'])) {
                if ($_POST['m_active'] == '0') {
                    $active = 'not_active';
                } elseif ($_POST['m_active'] == '1') {
                    $active = 'active';
                }
                if ($_POST['m_type'] == '0') {
                    $type = 'template_module';
                }
                if (empty($_POST['m_title']) || empty($active) || empty($_POST['m_content']) || empty($type)) {
                    echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
                } else {
                    $m_title_edit  = safe_input($_POST['m_title'], '\_\.\-\ ');
                    $m_active_edit = safe_input($_POST['m_active'], '');
                    $m_type_edit   = safe_input($_POST['m_type'], '');
                    
                    
                    $old_db = file("../engine/cms_data/mods.cms");
                    $new_db = fopen("../engine/cms_data/mods.cms", "w");
                    foreach ($old_db as $old_db_line) {
                        $old_db_arr = explode("¦", $old_db_line);
                        if (safe_input(xss_clean($_GET['edit_module']), '_') != $old_db_arr[0]) {
                            fwrite($new_db, "$old_db_line");
                        } else {
                            fwrite($new_db, $m_id . "¦" . $m_type_edit . "¦template_module¦" . $m_title_edit . "¦" . $m_active_edit . "¦\n");
                        }
                    }
                    fclose($new_db);
                    
                    $cms_content = $_POST['m_content'];
                    if (substr($cms_content, 0, 3) == '<p>') {
                        $cms_content = substr_replace($cms_content, "", 0, 3);
                    }
                    $edit_cms = fopen('../engine/cms_data/cms_co/' . $m_id . '_cms.cms', "w");
                    fwrite($edit_cms, str_replace("<?", "", str_replace("?>", "", $cms_content)));
                    fclose($edit_cms);
                    
                    echo notice_message_admin('Template Module successfully edited', 1, 0, 'index.php?get=edit_modules');
                    
                    
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
	
<form action="" method="post" id="form2">
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card" style="margin-bottom: 0px;">
					<div class="header">
						<h2 style="text-align: center;">
							Edit Template Module
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- input text -->
						<p class="lead" align="left">
                        	Module Title
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Module Title that will appear on module list.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="m_title" value="' . $m_title . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- inpunt radio -->
						<p class="lead" align="left">
                        	Module Active
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	When set \'No\' module will not be visibile.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">';
									switch ($m_active) {
                    					case '0':
                        					echo '
										<div class="demo-radio-button">
											<input type="radio" class="with-gap" id="radio_1" name="m_active" value="1"/>
           									<label for="radio_1" style="min-width: 70px;">Yes</label>	
											<input type="radio" class="with-gap" id="radio_2" name="m_active" value="0" checked="checked"/>
            								<label for="radio_2" style="min-width: 70px;">No</label>
    									</div>';
                        				break;
                    
										case '1':
                        					echo '
										<div class="demo-radio-button">
											<input type="radio" class="with-gap" id="radio_1" name="m_active" value="1" checked="checked"/>
           									<label for="radio_1" style="min-width: 70px;">Yes</label>	
											<input type="radio" class="with-gap" id="radio_2" name="m_active" value="0"/>
            								<label for="radio_2" style="min-width: 70px;">No</label>
    									</div>';
                        				break;
                					}
									echo '	
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input radio -->
                        
						<!-- input text -->
    <td  class="panel_text_area" colspan="2" width="60%"></td>
    </tr>
						<p class="lead" align="left">
                        	Module Content
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 100%;text-align: left;">
                            	<textarea id="m_content" name="m_content" rows="24" style="width: 100%;">';
                				include('../engine/cms_data/cms_co/' . $m_idd . '_cms.cms');
                				echo '
								</textarea>
                            </div>
                        </div>
						<!-- #END# input text -->
                        
						<p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100%;margin-bottom: 0px;">
                                        <button type="submit" form="form2" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 100px;margin-top: 5px;">Edit Module</button>
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
<input type="hidden" name="m_type" value="' . $m_type . '">
<input type="hidden" name="edit_module">
</form>';
                
            }
        } else {
            echo notice_message_admin('Module could not be found.', '0', '1', '0');
        }
        
        
    } elseif ($_GET['m'] == '1') {
        $m_id        = safe_input(xss_clean($_GET['edit_module']), '_');
        $get_modules = file('../engine/cms_data/mods.cms');
        foreach ($get_modules as $module) {
            $module = explode("¦", $module);
            if ($module[0] == $m_id) {
                $found    = 1;
                $m_idd    = $module[0];
                $m_title  = $module[3];
                $m_active = $module[4];
                $m_type   = $module[1];
                $m_file   = $module[2];
                break;
            }
            
        }
        
        if ($found == '1') {
            if (isset($_POST['edit_module'])) {
                if ($_POST['m_active'] == '0') {
                    $active = 'not_active';
                } elseif ($_POST['m_active'] == '1') {
                    $active = 'active';
                }
                if (empty($_POST['m_title']) || empty($active) || empty($_POST['m_file']) || empty($_POST['m_type'])) {
                    echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
                } else {
                    $m_title_edit  = safe_input($_POST['m_title'], '\_\.\-\ ');
                    $m_active_edit = safe_input($_POST['m_active'], '');
                    $m_file_edit   = safe_input($_POST['m_file'], '\_\.\-\ ');
                    $m_type_edit   = safe_input($_POST['m_type'], '');
                    
                    $old_db = file("../engine/cms_data/mods.cms");
                    $new_db = fopen("../engine/cms_data/mods.cms", "w");
                    foreach ($old_db as $old_db_line) {
                        $old_db_arr = explode("¦", $old_db_line);
                        if (safe_input(xss_clean($_GET['edit_module']), '_') != $old_db_arr[0]) {
                            fwrite($new_db, "$old_db_line");
                        } else {
                            fwrite($new_db, $m_id . "¦" . $m_type_edit . "¦" . $m_file_edit . "¦" . $m_title_edit . "¦" . $m_active_edit . "¦\n");
                        }
                    }
                    fclose($new_db);
                    
                    echo notice_message_admin('PHP File Module successfully edited', 1, 0, 'index.php?get=edit_modules#' . $m_idd . '');
                }
                
                
            } else {
                echo '
<form action="" method="post" id="form2">
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card" style="margin-bottom: 0px;">
					<div class="header">
						<h2 style="text-align: center;">
							Edit PHP File Module
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- input text -->
						<p class="lead" align="left">
                        	Module Title
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Module Title that will appear on module list.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="m_title" value="' . $m_title . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- inpunt radio -->
						<p class="lead" align="left">
                        	Module Active
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	When set \'No\' module will not be visibile.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">';
									switch ($m_active) {
                    					case '0':
                        					echo '
										<div class="demo-radio-button">
											<input type="radio" class="with-gap" id="radio_1" name="m_active" value="1"/>
           									<label for="radio_1" style="min-width: 70px;">Yes</label>	
											<input type="radio" class="with-gap" id="radio_2" name="m_active" value="0" checked="checked"/>
            								<label for="radio_2" style="min-width: 70px;">No</label>
    									</div>';
                        				break;
                    
										case '1':
                        					echo '
										<div class="demo-radio-button">
											<input type="radio" class="with-gap" id="radio_1" name="m_active" value="1" checked="checked"/>
           									<label for="radio_1" style="min-width: 70px;">Yes</label>	
											<input type="radio" class="with-gap" id="radio_2" name="m_active" value="0"/>
            								<label for="radio_2" style="min-width: 70px;">No</label>
    									</div>';
                        				break;
                					}
									echo '	
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input radio -->
                        
						<!-- input select -->
						<p class="lead" align="left">
                        	Module PHP File
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Choose PHP file you want to include.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	
									<div style="border-bottom: none;">
                                    	<select name="m_file" style="border: none;font-size: 14px;float: right;width: 100%;">
                                        <option value="0">Choose a File</option>
										<optgroup label="---------------">';
                						$directory = opendir('../pages_modules');
                						while ($modfile = readdir($directory)) {
                    						if (ereg('[^.]+', $modfile) AND $modfile != 'index.html') {
                        						if ($m_file == $modfile) {
                            						echo '<option value="' . $modfile . '" selected="selected">' . $modfile . '</option>';
                        						} else {
                            						echo '<option value="' . $modfile . '">' . $modfile . '</option>';
                        						}
                        
                    						}
                						}
										echo '
                                		</select>
                                    </div>
									
                                </div>
                            </div>
                        </div>
						<!-- #END# input select -->
                        
						<p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100%;margin-bottom: 0px;">
                                        <button type="submit" form="form2" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 100px;margin-top: 5px;">Edit Module</button>
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
<input type="hidden" name="m_type" value="' . $m_type . '">
<input type="hidden" name="edit_module">
</form>';
            }
        } else {
            echo notice_message_admin('Module could not be found.', '0', '1', '0');
        }
        
    }
} else {
    if (isset($_GET['delete_module'])) {
        if (empty($_GET['delete_module'])) {
            echo notice_message_admin('Unable to proceed your request.', '1', '1', 'index.php?get=edit_modules');
        } else {
            $p_id   = safe_input(xss_clean($_GET['delete_module']), '_');
            $p_file = file('../engine/cms_data/mods.cms');
            foreach ($p_file as $check_id) {
                $check_id = explode("¦", $check_id);
                if ($check_id[0] == $p_id) {
                    $p_id_found = '1';
                    break;
                }
            }
            if ($p_id_found != '1') {
                echo notice_message_admin('Module with ID: <b>' . $p_id . '</b> does not exist.', '0', '1', '0');
            } else {
                $new_db = fopen("../engine/cms_data/mods.cms", "w");
                foreach ($p_file as $new_db_line) {
                    $db_line = explode("¦", $new_db_line);
                    if ($db_line[0] != $p_id) {
                        fwrite($new_db, $new_db_line);
                        #echo $new_db_line;
                    }
                }
                fclose($new_db);
                echo notice_message_admin('Module successfully deleted', 1, 0, 'index.php?get=edit_modules');
            }
            
        }
        
    } else {
        echo '
<form action="index.php?get=add_module" method="post" id="form2">
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card" style="margin-bottom: 0px;">
					<div class="header">
						<h2 style="text-align: center;">
							Edit Modules
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- input table -->
                        <!-- <div class="body table-responsive"> -->
                        <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Module Type</th>
                                        <th>Status</th>
										<th>Controls</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px;">';
		$get_modules = file('../engine/cms_data/mods.cms');
        $count = 0;
        foreach ($get_modules as $module) {
            $module = explode("¦", $module);
            $count++;
            echo '
    <tr>
    <th scope="row"><a name="' . $module[0] . '"></a><strong>' . $module[3] . '</strong></th>
    ';
            switch ($module[1]) {
                case '0':
                    echo '<td>Template Module</td>';
                    $p_type    = 'Template Module';
                    $link_edit = 'index.php?get=edit_modules&m=0&edit_module=' . $module[0] . '';
                    break;
                case '1':
                    echo '<td>PHP File Module (' . $module[2] . ')</td>';
                    $p_type    = 'PHP File Module';
                    $link_edit = 'index.php?get=edit_modules&m=1&edit_module=' . $module[0] . '';
                    break;
            }
            
            echo '<td>';
            switch ($module[4]) {
                case '0':
                    echo '<em>Inactive</em>';
                    break;
                case '1':
                    echo '<b>Active</b>';
                    break;
            }
            echo '</td>
            <td><a href="' . $link_edit . '">[Edit]</a> / <a href="index.php?get=edit_modules&delete_module=' . $module[0] . '">[Delete]</a></td>
    </tr>';
        }
								echo '
                                </tbody>
                            </table>
                            <!-- #END# input table -->
                        
						<p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100%;margin-bottom: 0px;">
                                        <button type="submit" form="form2" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 100px;margin-top: 5px;">Add New Module</button>
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