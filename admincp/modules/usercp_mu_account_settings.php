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
    if (empty($_POST['cron_job'])) {
        echo notice_message_admin('Some fields where left blank.', '0', '1', '0');
    } else {
        $save_1 = new_config_xml('../engine/config_mods/account_settings_settings', 'cron_job', $_POST['cron_job']);
        $save_2 = new_config_xml('../engine/config_mods/account_settings_settings', 'method', $_POST['method']);
        echo notice_message_admin('Settings successfully saved', 1, 0, 'index.php?get=usercp_mu_account_settings');
    }
    
} else {
    if (isset($_POST['module_active'])) {
        $save_status = new_config_xml('../engine/config_mods/account_settings_settings', 'active', safe_input($_POST['module_active'], ''));
    }
    $get_config = simplexml_load_file('../engine/config_mods/account_settings_settings.xml');
    echo '

<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2 style="text-align: center;">
							Account Settings
						</h2>
					</div>
					<div class="body">
					<form action="" method="post" id="form1">';
					 	if ($get_config->active == '1') {
        					echo '<p class="lead" align="left" style="background: #0C0;padding: 5px 0px 5px 5px">Account Settings is active.
								<button type="submit" form="form1" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 20px;margin-top: 0;">Turn Account Settings Off</button></p>
								<input type="hidden" name="module_active" value="0">';
    					} elseif ($get_config->active == '0') {
        					echo '<p class="lead" align="left" style="background: #C00;padding: 5px 0px 5px 5px">Account Settings is inactive.
								<button type="submit" form="form1" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 20px;margin-top: 0;">Turn Account Settings On</button></p>
								<input type="hidden" name="module_active" value="1">';
    					}
						echo '      
					</form>
					</div>
				</div>
			</div>
		</div>
	<!-- #END# Body Copy -->
	</div>
</section>

<form action="" method="post" id="form2">
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card" style="margin-bottom: 0px;">
					<div class="header">
						<h2 style="text-align: center;">
							Change Password Settings
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- input text -->
						<p class="lead" align="left">
                        	Cron Job ID
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Set cron job id for cleaning temporary change passwords requests.<br>
								<a href="index.php?get=cron_jobs">view cron jobs list</a>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="cron_job" value="' . $get_config->cron_job . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- inpunt radio -->
						<p class="lead" align="left">
                        	Verify Email address in Change Password
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	If you set to \'Yes\' user\'s password will not be chnaged until they visit a link that is sent to them in an email when they chnage password.<br>
								If a user is not visiting the link, password will remain the same.<br>
								Note: <b>Verify Email address in Chnage Password</b> require SMTP Server, <a href="index.php?get=smtp_settings">SMTP Settings</a>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">';
	switch ($get_config->method) {
        case '1':
            echo '
			<div class="demo-radio-button">
				<input type="radio" class="with-gap" id="radio_1" name="method" value="2"/>
           		<label for="radio_1" style="min-width: 70px;">Yes</label>	
				<input type="radio" class="with-gap" id="radio_2" name="method" value="1" checked="checked"/>
            	<label for="radio_2" style="min-width: 70px;">No</label>
    		</div>';
            break;
        case '2':
            echo '
			<div class="demo-radio-button">
				<input type="radio" class="with-gap" id="radio_1" name="method" value="2" checked="checked"/>
           		<label for="radio_1" style="min-width: 70px;">Yes</label>	
				<input type="radio" class="with-gap" id="radio_2" name="method" value="1"/>
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
</form>';
}
?> 