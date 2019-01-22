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
    if (empty($_POST['w_title']) || empty($_POST['w_url']) || empty($_POST['c_key']) || empty($_POST['w_nick']) || empty($_POST['master_mail']) || empty($_POST['template'])) {
        echo notice_message_admin('Some fields where left blank.', '0', '1', '0');
    } else {
        if (strlen($_POST['c_key']) != '8') {
            echo notice_message_admin('Encryption key must be 8 digits length, letters and numbers only.', '0', '1', '0');
        } elseif (strlen($_POST['w_sn']) != '20') {
            echo notice_message_admin('MUCore Serial Number must be 20 digits length.', '0', '1', '0');
        } else {
            require('../engine/global_config.php');
			$new_db = fopen("../engine/global_config.php", "w");
        	$data = "<?php"."\n";
        	$data.= "\$core['config']['on_off'] = \"" . $core['config']['on_off'] . "\";"."\n";
        	$data.= "\$core['config']['website_url'] = \"" . $_POST['w_url'] . "\";"."\n";
        	$data.= "\$core['config']['websitetitle'] = \"" . htmlspecialchars(addslashes($_POST['w_title'])) . "\";"."\n";
        	$data.= "\$core['config']['md5'] = \"" . $_POST['md5'] . "\";"."\n";
        	$data.= "\$core['config']['crypt_key'] = \"" . safe_input($_POST['c_key'], '') . "\";"."\n";
        	$data.= "\$core['config']['admin_nick'] = \"" . safe_input($_POST['w_nick'], '\ ') . "\";"."\n";
        	$data.= "\$core['config']['master_mail'] = \"" . safe_input($_POST['master_mail'], '\_\-\.\@') . "\";"."\n";
        	$data.= "\$core['config']['template'] = \"" . safe_input($_POST['template'], '\_\.\-') . "\";"."\n";
        	$data.= "\$core['config']['copyright'] = \"" . htmlspecialchars(addslashes($_POST['copyright'])) . "\";"."\n";
        	$data.= "\$core['config']['SN'] = \"" . safe_input($_POST['w_sn'], '') . "\";"."\n";
			$data.= "\$core['version'] = \"" . $core['version'] . "\";"."\n";
			$data.= "\$core['by'] = \"" . $core['by'] . "\";"."\n";
        	$data.= "?>";
        	fwrite($new_db, $data);
        	fclose($new_db);
            echo notice_message_admin('Settings successfully saved', 1, 0, 'index.php?get=website_settings');
        }
        
    }
    
} else {
    if (isset($_POST['module_active'])) {
        require('../engine/global_config.php');		
		$new_db = fopen("../engine/global_config.php", "w");
        $data = "<?php"."\n";
        $data.= "\$core['config']['on_off'] = \"" . $_POST['module_active'] . "\";"."\n";
        $data.= "\$core['config']['website_url'] = \"" . $core['config']['website_url'] . "\";"."\n";
        $data.= "\$core['config']['websitetitle'] = \"" . $core['config']['websitetitle'] . "\";"."\n";
        $data.= "\$core['config']['md5'] = \"" . $core['config']['md5'] . "\";"."\n";
        $data.= "\$core['config']['crypt_key'] = \"" . $core['config']['crypt_key'] . "\";"."\n";
        $data.= "\$core['config']['admin_nick'] = \"" . $core['config']['admin_nick'] . "\";"."\n";
        $data.= "\$core['config']['master_mail'] = \"" . $core['config']['master_mail'] . "\";"."\n";
        $data.= "\$core['config']['template'] = \"" . $core['config']['template'] . "\";"."\n";
        $data.= "\$core['config']['copyright'] = \"" . $core['config']['copyright'] . "\";"."\n";
        $data.= "\$core['config']['SN'] = \"" . $core['config']['SN'] . "\";"."\n";
		$data.= "\$core['version'] = \"" . $core['version'] . "\";"."\n";
		$data.= "\$core['by'] = \"" . $core['by'] . "\";"."\n";
        $data.= "?>";
        fwrite($new_db, $data);
        fclose($new_db);
        
        $new_db2 = fopen("../engine/cms_data/maintenance/maintenance.cms", "w");
        fwrite($new_db2, stripslashes($_POST['reason']));
        fclose($new_db2);
    }
    
    require('../engine/global_config.php');
    echo '
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2 style="text-align: center;">
							Turn your website On and Off
						</h2>
					</div>
					<div class="body">
				    	<form action="" method="post" id="form1">';

					 	if ($core['config']['on_off'] == '1') {
        					echo '<p class="lead" align="left" style="background: #0C0;padding: 5px 0px 5px 5px">Website is active.
								<button type="submit" form="form1" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 20px;margin-top: 0;">Turn Website Off</button></p>
								<input type="hidden" name="edit_settings">
								<input type="hidden" name="module_active" value="0">
								';
        
    					} elseif ($core['config']['on_off'] == '0') {
        					echo '<p class="lead" align="left" style="background: #C00;padding: 5px 0px 5px 5px">Website is inactive.
								<button type="submit" form="form1" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 20px;margin-top: 0;">Turn Website On</button></p>
								<input type="hidden" name="edit_settings">
								<input type="hidden" name="module_active" value="1">
								';
    					}
						echo '
						
                        <div class="row clearfix" style="font-size: 12px;">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 50%;text-align: left;">
                            	Reason for turning website Off;<br/>
Let users know why website is Off.
                            </div>
							<textarea cols="60" rows="3" name="reason" style="float: right;margin-right: 15px;">';
    							include('../engine/cms_data/maintenance/maintenance.cms');
    				  echo '</textarea>
                        </div>
                        </form>
                            
					</div>
				</div>
			</div>
		</div>
	<!-- #END# Body Copy -->
	</div>
</section>

<form action="" name="form_edit" method="post" id="form2">
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2 style="text-align: center;">
							MUCore Serial Number
						</h2>
					</div>
					<div class="body">
						<p class="lead" align="left">
                        	Serial Number
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enter MUCore Serial Number. 20 digits length.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" name="w_sn" class="form-control" value="' . $core['config']['SN'] . '" maxlength="20">
                                    </div>
                                </div>
                            </div>
                        </div>
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
				<div class="card" style="margin-bottom: 0px;">
					<div class="header">
						<h2 style="text-align: center;">
							Website Settings
						</h2>
					</div>
					<div class="body">
						<p class="lead" align="left">
                        	Website URL
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	URL of your website, where MUCore is running.<br>*Don\'t add trailing slash ("/") at the end of URL.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" name="w_url" class="form-control" value="' . $core['config']['website_url'] . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						
						<p class="lead" align="left">
                        	Website Title
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Title of your website.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="w_title" value="' . stripslashes($core['config']['websitetitle']) . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						
						<p class="lead" align="left">
                        	MU Online database use MD5 Encryption
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	When \'Yes\' website will perform functions,checks,features under MD5 encryption method.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">';
										switch ($core['config']['md5']) {
        									case '0':
            									echo '
													<div class="demo-radio-button">
														<input type="radio" class="with-gap" id="radio_1" name="md5" value="1"/>
           												<label for="radio_1" style="min-width: 70px;">Yes</label>	
														<input type="radio" class="with-gap" id="radio_2" name="md5" checked="checked" value="0"/>
            											<label for="radio_2" style="min-width: 70px;">No</label>
    												</div>';
											break;
        									case '1':
            									echo '
													<div class="demo-radio-button">
	   												<input type="radio" class="with-gap" id="radio_1" name="md5" value="1" checked="checked"/>
													<label for="radio_1" style="min-width: 70px;">Yes</label>
       												<input type="radio" class="with-gap" id="radio_2" name="md5" value="0"/>
                                					<label for="radio_2" style="min-width: 70px;">No</label>
                           							</div>';
											break;
										}
									echo '	
                                    </div>
                                </div>
                            </div>
                        </div>
						
						<p class="lead" align="left">
                        	Encrypt Key
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Provide an encryption key, <b>8 digits length, letters and nubmers only</b>.<br>Encryption key will be used in website features and functions in order to protect your users data.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="c_key" value="' . $core['config']['crypt_key'] . '" maxlength="8">
                                    </div>
                                </div>
                            </div>
                        </div>

						<p class="lead" align="left">
                        	Administrator Nickname
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enter an nickname for your Administrator account. <b>(letters,numbers and spaces only)</b>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="w_nick" value="' . $core['config']['admin_nick'] . '">
                                    </div>
                                </div>
                            </div>
                        </div>

						<p class="lead" align="left">
                        	Webmaster\'s Email
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	This is the email address of the webmaster. It will be used as the From address for certain emails sent by the system.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="master_mail" value="' . $core['config']['master_mail'] . '">
                                    </div>
                                </div>
                            </div>
                        </div>

						<p class="lead" align="left">
                        	Template
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Select website template.<br><b>Note: each template</b>
has his own folder that is stored on <b>template</b> folder.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	
									<div style="border-bottom: none;">
                                    	<select name="template" style="border: none;font-size: 14px;float: right;width: 100%;">
                                        	<option value="0" >Choose a template</option>
                                            <optgroup label="---------------">';
											$directory = opendir('../template');
											while ($modfile = readdir($directory)) {
												if ($modfile != "." && $modfile != ".." && $modfile != 'index.html') {
													if ($core['config']['template'] == $modfile) {
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
						
						<p class="lead" align="left">
                        	Copyright Text
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Copyright text will appear in the footer of page.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="copyright" value="' . stripslashes($core['config']['copyright']) . '">
                                    </div>
                                </div>
                            </div>
                        </div>		
						
						<p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100%;margin-bottom: 0px;">
                                        <button type="submit" form="form2" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 100px;margin-top: 5px;">SAVE</button>
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