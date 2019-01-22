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
if (isset($_POST['save_order'])) {
    foreach ($_POST['display_order'] as $post_name => $post_order) {
        $get_true_config = file('../engine/cms_data/mods_uss.cms');
        foreach ($get_true_config as $old_config) {
            $old_config = explode("¦", $old_config);
            if ($old_config[1] == $post_name) {
                $title          = $old_config[2];
                $module_id      = $old_config[3];
                $module_conetnt = $old_config[4];
                $module_type    = $old_config[5];
                $module_active  = $old_config[6];
                $module_hide    = $old_config[7];
                break;
            }
        }
        $new_cfg = safe_input($post_order, '') . '¦' . safe_input($post_name, '_') . '¦' . $title . '¦' . $module_id . '¦' . $module_conetnt . '¦' . $module_type . '¦' . $module_active . "¦" . $module_hide . "¦\n";
        
        
        #echo $new_cfg.'<br>';
        
        $old_db = file("../engine/cms_data/mods_uss.cms");
        $new_db = fopen("../engine/cms_data/mods_uss.cms", "w");
        foreach ($old_db as $old_db_line) {
            $old_db_arr = explode("¦", $old_db_line);
            if ($post_name != $old_db_arr[1]) {
                fwrite($new_db, "$old_db_line");
            } else {
                fwrite($new_db, $new_cfg);
            }
        }
        fclose($new_db);
        
        
    }
    echo notice_message_admin('Display Order successfully saved', 1, 0, 'index.php?get=edit_modules_user');
    
    
    
} else {
    if (isset($_GET['edit_module'])) {
        if ($_GET['m'] == '0') {
            $m_id        = safe_input(xss_clean($_GET['edit_module']), '_');
            $get_modules = file('../engine/cms_data/mods_uss.cms');
            
            foreach ($get_modules as $module) {
                $module = explode("¦", $module);
                if ($module[1] == $m_id) {
                    $found    = 1;
                    $m_order  = $module[0];
                    $m_idd    = $module[3];
                    $m_title  = $module[2];
                    $m_active = $module[6];
                    $m_type   = $module[5];
                    $m_hide   = $module[7];
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
                    if (empty($_POST['m_title']) || empty($_POST['m_content']) || empty($_POST['m_id'])) {
                        echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
                    } else {
                        $m_title_edit  = safe_input($_POST['m_title'], '\_\.\-\ ');
                        $m_active_edit = safe_input($_POST['m_active'], '');
                        $m_type_edit   = safe_input($_POST['m_type'], '');
                        $m_order_edit  = safe_input($_POST['m_order'], '');
                        $m_idd_edit    = safe_input($_POST['m_id'], '_');
                        $m_hide_edit   = safe_input($_POST['m_hide'], '_');
                        
                        
                        $old_db = file("../engine/cms_data/mods_uss.cms");
                        $new_db = fopen("../engine/cms_data/mods_uss.cms", "w");
                        foreach ($old_db as $old_db_line) {
                            $old_db_arr = explode("¦", $old_db_line);
                            if (safe_input(xss_clean($_GET['edit_module']), '_') != $old_db_arr[1]) {
                                fwrite($new_db, "$old_db_line");
                            } else {
                                fwrite($new_db, $m_order_edit . "¦" . $m_id . "¦" . $m_title_edit . "¦" . $m_idd_edit . "¦template_module¦0¦" . $m_active_edit . "¦" . $m_hide_edit . "¦\n");
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
                        
                        echo notice_message_admin('Template Module successfully edited', 1, 0, 'index.php?get=edit_modules_user');
                        
                        
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
							Edit Template Module (User CP Page)
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
						
						<!-- input text -->
						<p class="lead" align="left">
                        	Module ID
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	This is the variable that will be used in the URL to link to this module.<br>
								For example, if this option is set to \'some_page\', then the link to this module would look like this:<br>
								http://yoursite.com/' . ROOT_INDEX . '?' . LOAD_GET_PAGE . '=' . USER_CMS_PAGE . '&' . USER_GET_PAGE . '=<b>some_page</b>.<br>
								Note: Use only numbers and letters, symbols allowed: <b>_</b> (underscore)
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="m_id" value="' . $m_idd . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	Display Order
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	This controls the order that the page will be displayed in for the User CP Menu and in the Admin Control Panel.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="m_order" value="' . $m_order . '">
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
						
						<!-- inpunt radio -->
						<p class="lead" align="left">
                        	Module Hide
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	When set \'Yes\', module will not appear on User CP Menu, but will still be accessible if page URL knows.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">';
									switch ($m_hide) {
                        				case '1':
                            				echo '
									<div class="demo-radio-button">
										<input type="radio" class="with-gap" id="radio_3" name="m_hide" value="1" checked="checked"/>
           								<label for="radio_3" style="min-width: 70px;">Yes</label>	
										<input type="radio" class="with-gap" id="radio_4" name="m_hide" value="0"/>
            							<label for="radio_4" style="min-width: 70px;">No</label>
    								</div>';
                            			break;
                        				case '0':
                            				echo '
									<div class="demo-radio-button">
										<input type="radio" class="with-gap" id="radio_3" name="m_hide" value="1"/>
           								<label for="radio_3" style="min-width: 70px;">Yes</label>	
										<input type="radio" class="with-gap" id="radio_4" name="m_hide" value="0" checked="checked"/>
            							<label for="radio_4" style="min-width: 70px;">No</label>
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
						<p class="lead" align="left">
                        	Module Content
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 100%;text-align: left;">
                            	<textarea id="m_content" name="m_content" rows="24" style="width: 100%;">';
								include('../engine/cms_data/cms_co/' . $m_id . '_cms.cms');
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
            $get_modules = file('../engine/cms_data/mods_uss.cms');
            foreach ($get_modules as $module) {
                $module = explode("¦", $module);
                if ($module[1] == $m_id) {
                    $found    = 1;
                    $m_order  = $module[0];
                    $m_idd    = $module[3];
                    $m_title  = $module[2];
                    $m_active = $module[6];
                    $m_type   = $module[5];
                    $m_file   = $module[4];
                    $m_hide   = $module[7];
                    break;
                }
            }
            
            if ($found == '1') {
                if (isset($_POST['edit_module'])) {
                    if (empty($_POST['m_title']) || empty($_POST['m_file']) || empty($_POST['m_id'])) {
                        echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
                    } else {
                        $m_title_edit  = safe_input($_POST['m_title'], '\_\.\-\ ');
                        $m_active_edit = safe_input($_POST['m_active'], '');
                        $m_type_edit   = safe_input($_POST['m_type'], '');
                        $m_order_edit  = safe_input($_POST['m_order'], '');
                        $m_idd_edit    = safe_input($_POST['m_id'], '_');
                        $m_file_edit   = safe_input($_POST['m_file'], '\_\.\-\ ');
                        $m_hide_edit   = safe_input($_POST['m_hide'], '_');
                        
                        
                        $old_db = file("../engine/cms_data/mods_uss.cms");
                        $new_db = fopen("../engine/cms_data/mods_uss.cms", "w");
                        foreach ($old_db as $old_db_line) {
                            $old_db_arr = explode("¦", $old_db_line);
                            if (safe_input(xss_clean($_GET['edit_module']), '_') != $old_db_arr[1]) {
                                fwrite($new_db, "$old_db_line");
                            } else {
                                fwrite($new_db, $m_order_edit . "¦" . $m_id . "¦" . $m_title_edit . "¦" . $m_idd_edit . "¦" . $m_file_edit . "¦1¦" . $m_active_edit . "¦" . $m_hide_edit . "¦\n");
                            }
                        }
                        fclose($new_db);
                        echo notice_message_admin('PHP File Module successfully edited', 1, 0, 'index.php?get=edit_modules_user#' . $m_id . '');
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
							Edit PHP File Module (User CP Page)
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
						
						<!-- input text -->
						<p class="lead" align="left">
                        	Module ID
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	This is the variable that will be used in the URL to link to this module.<br>
								For example, if this option is set to \'some_page\', then the link to this module would look like this:<br>
								http://yoursite.com/' . ROOT_INDEX . '?' . LOAD_GET_PAGE . '=' . USER_CMS_PAGE . '&' . USER_GET_PAGE . '=<b>some_page</b>.<br>
								Note: Use only numbers and letters, symbols allowed: <b>_</b> (underscore)
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="m_id" value="' . $m_idd . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	Display Order
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	This controls the order that the page will be displayed in for the User CP Menu and in the Admin Control Panel.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="m_order" value="' . $m_order . '">
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
						
						<!-- inpunt radio -->
						<p class="lead" align="left">
                        	Module Hide
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	When set \'Yes\', module will not appear on User CP Menu, but will still be accessible if page URL knows.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">';
									switch ($m_hide) {
                        				case '1':
                            				echo '
									<div class="demo-radio-button">
										<input type="radio" class="with-gap" id="radio_3" name="m_hide" value="1" checked="checked"/>
           								<label for="radio_3" style="min-width: 70px;">Yes</label>	
										<input type="radio" class="with-gap" id="radio_4" name="m_hide" value="0"/>
            							<label for="radio_4" style="min-width: 70px;">No</label>
    								</div>';
                            			break;
                        				case '0':
                            				echo '
									<div class="demo-radio-button">
										<input type="radio" class="with-gap" id="radio_3" name="m_hide" value="1"/>
           								<label for="radio_3" style="min-width: 70px;">Yes</label>	
										<input type="radio" class="with-gap" id="radio_4" name="m_hide" value="0" checked="checked"/>
            							<label for="radio_4" style="min-width: 70px;">No</label>
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
                    					$directory = opendir('../pages_modules/user_cp');
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
<input type="hidden" name="m_type" value="1">
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
                echo notice_message_admin('Unable to proceed your request.', '1', '1', 'index.php?get=edit_modules_user');
            } else {
                $p_id   = safe_input(xss_clean($_GET['delete_module']), '_');
                $p_file = file('../engine/cms_data/mods_uss.cms');
                foreach ($p_file as $check_id) {
                    $check_id = explode("¦", $check_id);
                    if ($check_id[1] == $p_id) {
                        $p_id_found = '1';
                        break;
                    }
                }
                if ($p_id_found != '1') {
                    echo notice_message_admin('Module with ID: <b>' . $p_id . '</b> does not exist.', '0', '1', '0');
                } else {
                    $new_db = fopen("../engine/cms_data/mods_uss.cms", "w");
                    foreach ($p_file as $new_db_line) {
                        $db_line = explode("¦", $new_db_line);
                        if ($db_line[1] != $p_id) {
                            fwrite($new_db, $new_db_line);
                            #echo $new_db_line;
                        }
                    }
                    fclose($new_db);
                    echo notice_message_admin('Module successfully deleted', 1, 0, 'index.php?get=edit_modules_user');
                }
                
            }
            
            
        } else {
            echo '

<form action="" method="post" id="form1">
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card" style="margin-bottom: 0px;">
					<div class="header">
						<h2 style="text-align: center;">
							Edit Modules (User CP Page)
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
                                        <th>Display Order</th>
										<th>Status</th>
										<th>Hidden</th>
										<th>Controls</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px;">';
								
			$get_modules = get_sort('../engine/cms_data/mods_uss.cms', '¦');
            $count = 0;
            foreach ($get_modules as $module) {
                explode("¦", $module);
                $count++;
                echo '
    <tr>
    <th scope="row"><a name="' . $module[1] . '"></a><strong>' . $module[2] . '</strong></th>
    
    ';
                switch ($module[5]) {
                    case '0':
                        echo '<td>Template Module</td>';
                        $p_type    = 'Template Module';
                        $link_edit = 'index.php?get=edit_modules_user&m=0&edit_module=' . $module[1] . '';
                        break;
                    case '1':
                        echo '<td>PHP File Module (' . $module[4] . ')</td>';
                        $p_type    = 'PHP File Module';
                        $link_edit = 'index.php?get=edit_modules_user&m=1&edit_module=' . $module[1] . '';
                        break;
                }
                
                echo '
    <td><input type="text" name="display_order[' . $module[1] . ']" value="' . $module[0] . '" size="3"></td>
    <td>';
                switch ($module[6]) {
                    case '0':
                        echo '<em>Inactive</em>';
                        break;
                    case '1':
                        echo '<b>Active</b>';
                        break;
                }
                echo '</td>
    <td>';
                switch ($module[7]) {
                    case '0':
                        echo 'No';
                        break;
                    case '1':
                        echo '<b>Yes</b>';
                        break;
                }
                echo '</td>
    ';
                
                
                
                echo '<td><a href="' . $link_edit . '">[Edit]</a> / <a href="index.php?get=edit_modules_user&delete_module=' . $module[1] . '">[Delete]</a></td>
    </tr>';
			}
			echo '
                                </tbody>
                            </table>
                            <!-- #END# input table -->
                            
                            
                        
						<p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100%;margin-bottom: 0px;">
                                        <button type="submit" form="form1" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 30%;margin-top: 5px;">Save Display Order</button>
										<input type="hidden" name="save_order">
</form>
										<form action="index.php?get=add_module_user" method="post" id="form2">
                                        <button type="submit" form="form2" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 5%;margin-top: 5px;">Add New Module</button>
										</form>
                                	</div>
                             	</div>
                            </p>
							
							
					</div>
				</div>
			</div>
		</div>
	<!-- #END# Body Copy -->
	</div>
</section>';
            
        }
    } 
}
?> 