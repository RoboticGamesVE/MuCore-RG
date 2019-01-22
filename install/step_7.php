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
    if (empty($_POST['w_url'])) {
        $error = '1';
        $w_url = '<blink> - Fix this</blink>';
    }

    if (empty($_POST['w_title'])) {
        $error = '1';
        $w_title = '<blink> - Fix this</blink>';
    }

    if (empty($_POST['c_key'])) {
        $error = '1';
        $c_key = '<blink> - Fix this</blink>';
    } else {
        if (strlen($_POST['c_key']) != '8') {
            $error = '1';
            $c_key = '<blink> - Fix this</blink>';
        }
    }

    if (empty($_POST['w_nick'])) {
        $error = '1';
        $w_nick = '<blink> - Fix this</blink>';
    }

    if (empty($_POST['template'])) {
        $error = '1';
        $template = '<blink> - Fix this</blink>';
    }

    if (empty($_POST['master_mail'])) {
        $error = '1';
        $master_mail = '<blink> - Fix this</blink>';
    }
	
    if ($error != '1') {
        require ('../engine/global_config.php');

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
        $data.= "\$core['config']['SN'] = \"" . $core['config']['SN'] . "\";"."\n";
		$data.= "\$core['version'] = \"" . $core['version'] . "\";"."\n";
		$data.= "\$core['by'] = \"" . $core['by'] . "\";"."\n";
        $data.= "?>";
        fwrite($new_db, $data);
        fclose($new_db);
    }
} else {
    $error = 1;
}
?>
<section class="content" style="width: 750px;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2 style="text-align: center;">
							Website Settings
						</h2>
					</div>
					<div class="body">
                    <form action="" name="form_edit" method="post" id="form1">
						<p class="lead" align="left">
                        	Website URL
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 350px;text-align: left;">
                            	<label for="serial" style="font-size: 12px;">URL of your website, where MUCore is running.<br />*Don't add trailing slash ("/") at the end of URL.</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 300px;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" name="w_url" class="form-control" value="<?php
                                        if (isset($_POST['w_title'])) {
											echo $_POST['w_url'];
										} else {
											echo $siteURL;
										}
										?>"><?php echo $w_url; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <p class="lead" align="left">
                        	Website Title
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 350px;text-align: left;">
                            	<label for="serial" style="font-size: 12px;">Title of your website.</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 300px;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" name="w_title" class="form-control" value="<?php
										if (isset($_POST['w_title'])) {
											echo $_POST['w_title'];
										} else {
											echo 'MUCore ' . $core['version'];
										} ?>"><?php echo $w_title; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <p class="lead" align="left">
                        	MU Online database use MD5 Encryption:
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 350px;text-align: left;">
                            	<label for="serial" style="font-size: 12px;"><b style="color: red;">file Dll Lib on Install/WZ_MD5_MOD<br/>
If use MD5, Copy WZ_MD5_MOD.dll to C:\Program Files\Microsoft SQL Server\MSSQL\Binn<br/>
AND Run SQL QUERY: WZ_MD5_MOD.sql on SQL Server Management Studio/SQL Query Analyzer</b><br/>When 'Yes' website will perform functions,checks,features under MD5 encryption method.</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 300px;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
									<?php
										if (isset($_POST['md5'])) {
											switch ($_POST['md5']) {
												case '0' : echo '
										<div class="demo-radio-button">
										<input type="radio" class="with-gap" id="radio_1" name="md5" value="1"/>
                                		<label for="radio_1" style="padding-left: 0px;min-width: 70px;">Yes</label>	
										<input type="radio" class="with-gap" id="radio_2" name="md5" checked="checked" value="0"/>
                                		<label for="radio_2" style="padding-left: 0px;min-width: 70px;">No</label>
                           				</div>';
												 break;
												 case '1': echo '
										<div class="demo-radio-button">
										<input type="radio" class="with-gap" id="radio_1" name="md5" value="1"/>
                                		<label for="radio_1" style="padding-left: 0px;min-width: 70px;">Yes</label>	
										<input type="radio" class="with-gap" id="radio_2" name="md5" checked="checked" value="0"/>
                                		<label for="radio_2" style="padding-left: 0px;min-width: 70px;">No</label>
                           				</div>';
    											 break;
											}
										} else {
    										echo '
										<div class="demo-radio-button">
										<input type="radio" class="with-gap" id="radio_1" name="md5" value="1"/>
                                		<label for="radio_1" style="padding-left: 0px;min-width: 70px;">Yes</label>	
										<input type="radio" class="with-gap" id="radio_2" name="md5" checked="checked" value="0"/>
                                		<label for="radio_2" style="padding-left: 0px;min-width: 70px;">No</label>
                           				</div>';
										}
										?>
                                       <?php echo $w_title; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <p class="lead" align="left">
                        	Encrypt Key
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 350px;text-align: left;">
                            	<label for="serial" style="font-size: 12px;">Provide an encryption key, <b>8 digits length, letters and nubmers only</b>.<br />Encryption key will be used in website features and functions in order to protect your users data.</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 300px;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" name="c_key" class="form-control" maxlength="8" value="<?php
										echo $_POST['c_key'];
										?>"><?php echo $c_key; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <p class="lead" align="left">
                        	Administrator Nickname
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 350px;text-align: left;">
                            	<label for="serial" style="font-size: 12px;">Enter an nickname for your Administrator account. (letters,numbers and spaces only)</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 300px;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" name="w_nick" class="form-control" value="<?php
										echo $_POST['w_nick'];
										?>"><?php echo $w_nick; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <p class="lead" align="left">
                        	Webmaster's Email
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 350px;text-align: left;">
                            	<label for="serial" style="font-size: 12px;">This is the email address of the webmaster. It will be used as the From address for certain emails sent by the system.</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 300px;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" name="master_mail" class="form-control" value="<?php
										echo $_POST['master_mail'];
										?>"><?php echo $master_mail; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <p class="lead" align="left">
                        	Template
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 350px;text-align: left;">
                            	<label for="serial" style="font-size: 12px;">Select website template.<br />Note: each template</b>has his own folder that is stored on <b>template</b> folder.</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 300px;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line" style="border-bottom: none;">
                                    	<div class="col-sm-6" style="float: right;">
                                    	<select  class="form-control show-tick" name="template">
                                        	<option value="0" >Choose a template</option>
                                            <optgroup label="---------------">
											<?php
                                            if (isset($_POST['template'])) {
												$core['config_temp']['template'] = $_POST['template'];
											} else {
												$core['config_temp']['template'] = 'default';
											}
							$directory = opendir('../template');
								while ($modfile = readdir($directory)) {
									if ($modfile != "." && $modfile != ".." && $modfile != 'index.html') {
										if ($core['config_temp']['template'] == $modfile) {
											echo '<option value="' . $modfile . '" selected="selected">' . $modfile . '</option>';
										} else {
											echo '<option value="' . $modfile . '">' . $modfile . '</option>';
										}
									}
								}
								?>
                                		</select>
										</div><?php echo $template; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <p class="lead" align="left">
                        	Copyright Text
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 350px;text-align: left;">
                            <label for="serial" style="font-size: 12px;">Copyright text will appear in the footer of page.<br/>
                            <em>*optional</em></label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 300px;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" name="copyright" class="form-control" value="<?php
										echo $_POST['copyright'];
										?>">
                                    </div>
                                </div>
                            </div>
                        </div>

<?php
if ($error == 1) {
	if (isset($_POST['settings'])) {
		$error_msg = 'Step 7 Status: <span style="color:red">Please fix errors and click save.</span>';
	} else {
		$error_msg = 'Step 7 Status: <span style="color:red">Please complete fields and click save.</span>';
	}
	
	$button = '<button type="button" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-top: 0;">NEXT STEP</button>';
} else {
	$button = '<button type="button" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-top: 0;" 
onclick="location.href=\'install.php?step=step_8\';">NEXT STEP</button>';
	$error_msg = 'Step 7 Status: <span style="color:green">Success.</span>';
}
?>
                            <p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 350px;text-align: left;">
                                	<?php echo $error_msg; ?>
                                	</div>
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 300px;">
                                    	<?php echo $button; ?>
                                        <button type="submit" form="form1" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 20px;margin-top: 0;">SAVE</button>
                                	</div>
                             	</div>
                            </p>
                    	<input type="hidden" name="settings">
                        </form>
					</div>
				</div>
			</div>
		</div>
	<!-- #END# Body Copy -->
	</div>
</section>