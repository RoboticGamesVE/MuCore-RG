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
if (!isset($_GET['m'])) {
    echo '
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card" style="margin-bottom: 0px;">
					<div class="header">
						<h2 style="text-align: center;">
							Module Type (User CP Page)
						</h2>
					</div>
					<div class="body">
                        
						<!-- input text -->
						<p class="lead" align="left">
                        	Please select Module type would like to add.
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 15%;text-align: left;">
                            	<a href="index.php?get=add_module_user&m=0">[Template Module]</a>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 80%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	Template Modules allow you to use the text editor to format your module using html codes. Template Modules are recommended for simpler modules containing text, images, or anything else that can be done using htmlcodes.
                                    </div>
                                </div>
                            </div>
							
							<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 15%;text-align: left;margin-top: 10px;">
                            	<a href="index.php?get=add_module_user&m=1">[PHP File Module]</a>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 80%;margin-bottom: 1px;margin-top: 10px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line" style="border-bottom: 0px;">
                                    	PHP File Modules will allow you to specify a file from the mucore_dir/pages_modules/user_cp/ directory on your server that will be displayed as the content for the module.
                                    </div>
                                </div>
                            </div>
							
                        </div>
						<!-- #END# input text -->
                        
					</div>
				</div>
			</div>
		</div>
	<!-- #END# Body Copy -->
	</div>
</section>';
} else {
    if ($_GET['m'] == '0') {
        if (isset($_POST['add_module'])) {
            if ($_POST['m_order'] == '0') {
                $order = 'order_0';
            } else {
                $order = $_POST['m_order'];
            }
            
            if ($_POST['m_active'] == '0') {
                $active = 'not_active';
            } elseif ($_POST['m_active'] == '1') {
                $active = 'active';
            }
            
            if (empty($_POST['m_title']) || empty($_POST['m_content']) || empty($_POST['m_id']) || empty($order) || empty($active)) {
                echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
            } else {
                $modules_file = file('../engine/cms_data/mods_uss.cms');
                foreach ($modules_file as $pag_data) {
                    $pag_data = explode("¦", $pag_data);
                    if ($pag_data[3] == $_POST['m_id']) {
                        $id_found = 1;
                        break;
                    }
                }
                if ($id_found == '1') {
                    echo notice_message_admin('There is already one module with same module id: <b>' . htmlentities($_POST['m_id']) . '</b>.', '0', '1', '0');
                } else {
                    $m_title  = safe_input($_POST['m_title'], '\_\.\-\ ');
                    $m_idd    = safe_input($_POST['m_id'], '_');
                    $m_active = safe_input($_POST['m_active'], '');
                    #$m_file = safe_input($_POST['m_file'],'\_\.\-\ ');
                    $m_type   = safe_input($_POST['m_type'], '');
                    $m_order  = safe_input($_POST['m_order'], '');
                    $m_hide   = safe_input($_POST['m_hide'], '');
                    $m_id     = uniqid();
                    
                    $mod_db = fopen("../engine/cms_data/mods_uss.cms", "a+");
                    fwrite($mod_db, $m_order . "¦mod_" . $m_id . "¦" . $m_title . "¦" . $m_idd . "¦template_module¦" . $m_type . "¦" . $m_active . "¦" . $m_hide . "¦\n");
                    fclose($mod_db);
                    
                    
                    
                    
                    
                    $cms_content = $_POST['m_content'];
                    if (substr($cms_content, 0, 3) == '<p>') {
                        $cms_content = substr_replace($cms_content, "", 0, 3);
                    }
                    $new_cms = fopen('../engine/cms_data/cms_co/mod_' . $m_id . '_cms.cms', "w");
                    fwrite($new_cms, str_replace("<?", "", str_replace("?>", "", $cms_content)));
                    fclose($new_cms);
                    
                    echo notice_message_admin('Template Module successfully added', 1, 0, 'index.php?get=edit_modules_user');
                }
                
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
							Add Template Module (User CP Page)
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
                                    	<input type="text" class="form-control" name="m_title">
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
                                    	<input type="text" class="form-control" name="m_id">
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
                                    	<input type="text" class="form-control" name="m_order">
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
                                	<div class="form-line">
									
									<div class="demo-radio-button">
										<input type="radio" class="with-gap" id="radio_1" name="m_active" value="1" checked="checked"/>
           								<label for="radio_1" style="min-width: 70px;">Yes</label>	
										<input type="radio" class="with-gap" id="radio_2" name="m_active" value="0"/>
            							<label for="radio_2" style="min-width: 70px;">No</label>
    								</div>
										
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
                                	<div class="form-line">
									
									<div class="demo-radio-button">
										<input type="radio" class="with-gap" id="radio_3" name="m_hide" value="1"/>
           								<label for="radio_3" style="min-width: 70px;">Yes</label>	
										<input type="radio" class="with-gap" id="radio_4" name="m_hide" value="0" checked="checked"/>
            							<label for="radio_4" style="min-width: 70px;">No</label>
    								</div>
										
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
                            	<textarea id="m_content" name="m_content" rows="24" style="width: 100%;"></textarea>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100%;margin-bottom: 0px;">
                                        <button type="submit" form="form2" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 100px;margin-top: 5px;">Add Module</button>
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
<input type="hidden" name="m_type" value="0">
<input type="hidden" name="add_module">
</form>';
            
        }
        
    } elseif ($_GET['m'] == '1') {
        if (isset($_POST['add_module'])) {
            if ($_POST['m_order'] == '0') {
                $order = 'order_0';
            } else {
                $order = $_POST['m_order'];
            }
            
            if ($_POST['m_active'] == '0') {
                $active = 'not_active';
            } elseif ($_POST['m_active'] == '1') {
                $active = 'active';
            }
            
            if (empty($_POST['m_title']) || empty($_POST['m_id']) || empty($order) || empty($active) || empty($_POST['m_file'])) {
                echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
            } else {
                $modules_file = file('../engine/cms_data/mods_uss.cms');
                foreach ($modules_file as $pag_data) {
                    $pag_data = explode("¦", $pag_data);
                    if ($pag_data[3] == $_POST['m_id']) {
                        $id_found = 1;
                        break;
                    }
                }
                if ($id_found == '1') {
                    echo notice_message_admin('There is already one module with same module id: <b>' . htmlentities($_POST['m_id']) . '</b>.', '0', '1', '0');
                } else {
                    $m_title  = safe_input($_POST['m_title'], '\_\.\-\ ');
                    $m_idd    = safe_input($_POST['m_id'], '_');
                    $m_active = safe_input($_POST['m_active'], '');
                    $m_file   = safe_input($_POST['m_file'], '\_\.\-\ ');
                    $m_type   = safe_input($_POST['m_type'], '');
                    $m_order  = safe_input($_POST['m_order'], '');
                    $m_hide   = safe_input($_POST['m_hide'], '');
                    $m_id     = uniqid();
                    
                    $mod_db = fopen("../engine/cms_data/mods_uss.cms", "a+");
                    fwrite($mod_db, $m_order . "¦mod_" . $m_id . "¦" . $m_title . "¦" . $m_idd . "¦" . $m_file . "¦" . $m_type . "¦" . $m_active . "¦" . $m_hide . "¦\n");
                    fclose($mod_db);
                    echo notice_message_admin('PHP File Module successfully added', 1, 0, 'index.php?get=edit_modules_user');
                }
                
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
							Add PHP File Module (User CP Page)
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
                                    	<input type="text" class="form-control" name="m_title">
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
                                    	<input type="text" class="form-control" name="m_id">
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
                                    	<input type="text" class="form-control" name="m_order">
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
                                	<div class="form-line">

									<div class="demo-radio-button">
										<input type="radio" class="with-gap" id="radio_1" name="m_active" value="1" checked="checked"/>
           								<label for="radio_1" style="min-width: 70px;">Yes</label>	
										<input type="radio" class="with-gap" id="radio_2" name="m_active" value="0"/>
            							<label for="radio_2" style="min-width: 70px;">No</label>
    								</div>
										
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
                                	<div class="form-line">

									<div class="demo-radio-button">
										<input type="radio" class="with-gap" id="radio_3" name="m_hide" value="1"/>
           								<label for="radio_3" style="min-width: 70px;">Yes</label>	
										<input type="radio" class="with-gap" id="radio_4" name="m_hide" value="0" checked="checked"/>
            							<label for="radio_4" style="min-width: 70px;">No</label>
    								</div>
										
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
                                        <option value="0" selected="selected">Choose a File</option>
        								<optgroup label="---------------">';
            							$directory = opendir('../pages_modules/user_cp');
            							while ($modfile = readdir($directory)) {
                							if (ereg('[^.]+', $modfile) AND $modfile != 'index.html') {
                    							echo '<option value="' . $modfile . '">' . $modfile . '</option>';
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
                                        <button type="submit" form="form2" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 100px;margin-top: 5px;">Add Module</button>
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
<input type="hidden" name="add_module">
</form>';
        }
    }  
}
?> 