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
if (isset($_POST['settings'])) {
    if (empty($_POST['ROOT_INDEX']) || empty($_POST['LOAD_GET_PAGE']) || empty($_POST['USER_GET_PAGE'])) {
        echo notice_message_admin('Some fields where left blank.', '0', '1', '0');
    } else {
        require('../engine/global_cms.php');
        $new_db = fopen("../engine/global_cms.php", "w");
        $data   = "<?\r\n";
        $data .= "define('ROOT_INDEX','" . safe_input($_POST['ROOT_INDEX'], '\_\.') . "');\r\n";
        $data .= "define('LOAD_GET_PAGE','" . safe_input($_POST['LOAD_GET_PAGE'], '_') . "');\r\n";
        $data .= "define('USER_GET_PAGE','" . safe_input($_POST['USER_GET_PAGE'], '_') . "');\r\n";
        $data .= "define('HOME_CMS_PAGE','" . safe_input($_POST['HOME_CMS_PAGE'], '_') . "');\r\n";
        $data .= "define('HOME_CMS_USER','" . safe_input($_POST['HOME_CMS_USER'], '_') . "');\r\n";
        $data .= "define('ACCOUNTSETTINGS_CMS_USER','" . safe_input($_POST['ACCOUNTSETTINGS_CMS_USER'], '_') . "');\r\n";
        $data .= "define('LOGIN_CMS_PAGE','" . safe_input($_POST['LOGIN_CMS_PAGE'], '_') . "');\r\n";
        $data .= "define('USER_CMS_PAGE','" . safe_input($_POST['USER_CMS_PAGE'], '_') . "');\r\n";
        $data .= "define('LOGOUT_CMS_PAGE','" . safe_input($_POST['LOGOUT_CMS_PAGE'], '_') . "');\r\n";
        $data .= "define('REGISTER_CMS_PAGE','" . safe_input($_POST['REGISTER_CMS_PAGE'], '_') . "');\r\n";
        $data .= "define('LOSTPASSWORD_CMS_PAGE','" . safe_input($_POST['LOSTPASSWORD_CMS_PAGE'], '_') . "');\r\n";
        $data .= "define('ANNOUNCEMENTS_CMS_PAGE','" . safe_input($_POST['ANNOUNCEMENTS_CMS_PAGE'], '_') . "');\r\n";
        $data .= "define('TERMSOFSERVICE_CMS_PAGE','" . safe_input($_POST['TERMSOFSERVICE_CMS_PAGE'], '_') . "');\r\n";
        $data .= "?>";
        fwrite($new_db, $data);
        fclose($new_db);
        echo notice_message_admin('Settings successfully saved', 1, 0, 'index.php?get=cms_global_options');
        
    }
    
    
} else {
    require('../engine/global_cms.php');
    echo '
<form action="" method="post" id="form1">
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2 style="text-align: center;">
							Global Options - Define GET Variables
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- input text -->
						<p class="lead" align="left">
                        	CMS Filename (index filename)
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	The filename of your CMS file (originally named index.php).
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="ROOT_INDEX" value="' . ROOT_INDEX . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	Page Variable
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	This is the variable that will be used in the URL to link to your new pages. For example, if this option is set to \'page_id\', then a link to a new page would look like this:<br>
								http://yoursite.com/' . ROOT_INDEX . '?<b>page_id</b>=pagename.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="LOAD_GET_PAGE" value="' . LOAD_GET_PAGE . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	User Module Page Variable
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	This is the variable that will be used in the URL to link to your new user cp modules. For example, if this option is set to \'panel\', then a link to a new user cp module would look like this:<br>
								http://yoursite.com/' . ROOT_INDEX . '?' . LOAD_GET_PAGE . '=' . USER_CMS_PAGE . '&<b>panel</b>=modulename.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="USER_GET_PAGE" value="' . USER_GET_PAGE . '">
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
</section>


<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2 style="text-align: center;">
							Global Options - Define Page and Module for Home and User CP
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- input select -->
						<p class="lead" align="left">
                        	Home
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Please select what page to be loaded when user access website.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	
									<div style="border-bottom: none;">
                                    	<select name="HOME_CMS_PAGE" style="border: none;font-size: 14px;float: right;width: 100%;">
                                        <option value="">Choose a page</option>
        								<optgroup label="---------------">';
    									$get_pages = get_sort('../engine/cms_data/pag_d.cms', '¦');
    									$count = 0;
    									foreach ($get_pages as $page) {
        									explode("¦", $page);
        									if (HOME_CMS_PAGE == $page[3]) {
            									echo '<option value="' . $page[3] . '" selected="selected">' . $page[2] . '</option>';
        									} else {
            									echo '<option value="' . $page[3] . '">' . $page[2] . '</option>';
        									}
										}
											echo '
                                		</select>
                                    </div>
									
                                </div>
                            </div>
                        </div>
						<!-- #END# input select -->
						
						<!-- input select -->
						<p class="lead" align="left">
                        	User CP
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Please select what module to be loaded when user login.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	
									<div style="border-bottom: none;">
                                    	<select name="HOME_CMS_USER" style="border: none;font-size: 14px;float: right;width: 100%;">
                                        <option value="">Choose a page</option>
        								<optgroup label="---------------">';
    									$get_module = get_sort('../engine/cms_data/mods_uss.cms', '¦');
    									$count = 0;
    									foreach ($get_module as $module) {
        									explode("¦", $module);
        									if (HOME_CMS_USER == $module[3]) {
            									echo '<option value="' . $module[3] . '" selected="selected">' . $module[2] . '</option>';
        									} else {
            									echo '<option value="' . $module[3] . '">' . $module[2] . '</option>';
        									}   
										}
											echo '
                                		</select>
                                    </div>
									
                                </div>
                            </div>
                        </div>
						<!-- #END# input select -->
						
						<!-- input select -->
						<p class="lead" align="left">
                        	User CP - Account Settings
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Please select account settings module for User CP.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	
									<div style="border-bottom: none;">
                                    	<select name="ACCOUNTSETTINGS_CMS_USER" style="border: none;font-size: 14px;float: right;width: 100%;">
                                        <option value="">Choose a page</option>
        								<optgroup label="---------------">';
    									$get_module = get_sort('../engine/cms_data/mods_uss.cms', '¦');
    									$count = 0;
    									foreach ($get_module as $module) {
        									explode("¦", $module);
        									if (ACCOUNTSETTINGS_CMS_USER == $module[3]) {
            									echo '<option value="' . $module[3] . '" selected="selected">' . $module[2] . '</option>';
        									} else {
            									echo '<option value="' . $module[3] . '">' . $module[2] . '</option>';
        									}
    									}
											echo '
                                		</select>
                                    </div>
									
                                </div>
                            </div>
                        </div>
						<!-- #END# input select -->
                        
					</div>
				</div>
			</div>
		</div>
	<!-- #END# Body Copy -->
	</div>
</section>


<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2 style="text-align: center;">
							Global Options - Define Needed Pages
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- input select -->
						<p class="lead" align="left">
                        	Announcements
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Please select announcements page.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	
									<div style="border-bottom: none;">
                                    	<select name="ANNOUNCEMENTS_CMS_PAGE" style="border: none;font-size: 14px;float: right;width: 100%;">
                                        <option value="">Choose a page</option>
        								<optgroup label="---------------">';
    									$get_pages = get_sort('../engine/cms_data/pag_d.cms', '¦');
    									$count = 0;
    									foreach ($get_pages as $page) {
        									explode("¦", $page);
        									if (ANNOUNCEMENTS_CMS_PAGE == $page[3]) {
            									echo '<option value="' . $page[3] . '" selected="selected">' . $page[2] . '</option>';
        									} else {
            									echo '<option value="' . $page[3] . '">' . $page[2] . '</option>';
        									}    
    									}
											echo '
                                		</select>
                                    </div>
									
                                </div>
                            </div>
                        </div>
						<!-- #END# input select -->
						
						<!-- input select -->
						<p class="lead" align="left">
                        	Log In
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Please select log in page.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	
									<div style="border-bottom: none;">
                                    	<select name="LOGIN_CMS_PAGE" style="border: none;font-size: 14px;float: right;width: 100%;">
                                        <option value="">Choose a page</option>
        								<optgroup label="---------------">';
    									$get_pages = get_sort('../engine/cms_data/pag_d.cms', '¦');
    									$count = 0;
    									foreach ($get_pages as $page) {
        									explode("¦", $page);
        									if (LOGIN_CMS_PAGE == $page[3]) {
            									echo '<option value="' . $page[3] . '" selected="selected">' . $page[2] . '</option>';
        									} else {
            									echo '<option value="' . $page[3] . '">' . $page[2] . '</option>';
        									}
    									}
											echo '
                                		</select>
                                    </div>
									
                                </div>
                            </div>
                        </div>
						<!-- #END# input select -->
						
						<!-- input select -->
						<p class="lead" align="left">
                        	User CP
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Please select user cp page.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	
									<div style="border-bottom: none;">
                                    	<select name="USER_CMS_PAGE" style="border: none;font-size: 14px;float: right;width: 100%;">
                                        <option value="">Choose a page</option>
        								<optgroup label="---------------">';
    									$get_pages = get_sort('../engine/cms_data/pag_d.cms', '¦');
    									$count = 0;
    									foreach ($get_pages as $page) {
        									explode("¦", $page);
        									if (USER_CMS_PAGE == $page[3]) {
            									echo '<option value="' . $page[3] . '" selected="selected">' . $page[2] . '</option>';
        									} else {
            									echo '<option value="' . $page[3] . '">' . $page[2] . '</option>';
        									}
    									}
											echo '
                                		</select>
                                    </div>
									
                                </div>
                            </div>
                        </div>
						<!-- #END# input select -->
						
						<!-- input select -->
						<p class="lead" align="left">
                        	Log Out
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Please select log out page.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	
									<div style="border-bottom: none;">
                                    	<select name="LOGOUT_CMS_PAGE" style="border: none;font-size: 14px;float: right;width: 100%;">
                                        <option value="">Choose a page</option>
        								<optgroup label="---------------">';
    									$get_pages = get_sort('../engine/cms_data/pag_d.cms', '¦');
    									$count = 0;
    									foreach ($get_pages as $page) {
        									explode("¦", $page);
        									if (LOGOUT_CMS_PAGE == $page[3]) {
            									echo '<option value="' . $page[3] . '" selected="selected">' . $page[2] . '</option>';
        									} else {
            									echo '<option value="' . $page[3] . '">' . $page[2] . '</option>';
        									}
										}
											echo '
                                		</select>
                                    </div>
									
                                </div>
                            </div>
                        </div>
						<!-- #END# input select -->
						
						<!-- input select -->
						<p class="lead" align="left">
                        	Register
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Please select register page.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	
									<div style="border-bottom: none;">
                                    	<select name="REGISTER_CMS_PAGE" style="border: none;font-size: 14px;float: right;width: 100%;">
                                        <option value="">Choose a page</option>
        								<optgroup label="---------------">';
    									$get_pages = get_sort('../engine/cms_data/pag_d.cms', '¦');
    									$count = 0;
    									foreach ($get_pages as $page) {
        									explode("¦", $page);
        									if (REGISTER_CMS_PAGE == $page[3]) {
            									echo '<option value="' . $page[3] . '" selected="selected">' . $page[2] . '</option>';
        									} else {
            									echo '<option value="' . $page[3] . '">' . $page[2] . '</option>';
        									}
    									}
											echo '
                                		</select>
                                    </div>
									
                                </div>
                            </div>
                        </div>
						<!-- #END# input select -->
						
						<!-- input select -->
						<p class="lead" align="left">
                        	Lost Password
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Please select lost password page.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	
									<div style="border-bottom: none;">
                                    	<select name="LOSTPASSWORD_CMS_PAGE" style="border: none;font-size: 14px;float: right;width: 100%;">
                                        <option value="">Choose a page</option>
        								<optgroup label="---------------">';
    									$get_pages = get_sort('../engine/cms_data/pag_d.cms', '¦');
    									$count = 0;
    									foreach ($get_pages as $page) {
        									explode("¦", $page);
        									if (LOSTPASSWORD_CMS_PAGE == $page[3]) {
            									echo '<option value="' . $page[3] . '" selected="selected">' . $page[2] . '</option>';
        									} else {
            									echo '<option value="' . $page[3] . '">' . $page[2] . '</option>';
        									}
										}
											echo '
                                		</select>
                                    </div>
									
                                </div>
                            </div>
                        </div>
						<!-- #END# input select -->
						
						<!-- input select -->
						<p class="lead" align="left">
                        	Terms of Service
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Please select terms of service page.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	
									<div style="border-bottom: none;">
                                    	<select name="TERMSOFSERVICE_CMS_PAGE" style="border: none;font-size: 14px;float: right;width: 100%;">
                                        <option value="">Choose a page</option>
        								<optgroup label="---------------">';
    									$get_pages = get_sort('../engine/cms_data/pag_d.cms', '¦');
    									$count = 0;
    									foreach ($get_pages as $page) {
        									explode("¦", $page);
        									if (TERMSOFSERVICE_CMS_PAGE == $page[3]) {
            									echo '<option value="' . $page[3] . '" selected="selected">' . $page[2] . '</option>';
        									} else {
            									echo '<option value="' . $page[3] . '">' . $page[2] . '</option>';
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
                                        <button type="submit" form="form1" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 100px;margin-top: 5px;">SAVE</button>
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
<input type="hidden" name="settings">
</form>
';
}
?> 