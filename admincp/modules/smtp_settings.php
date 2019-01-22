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
    $save_1 = new_config_xml('../engine/config_mods/smtp_settings', 'smtp_server', $_POST['smtp_server']);
    $save_2 = new_config_xml('../engine/config_mods/smtp_settings', 'smtp_username', $_POST['smtp_username']);
    $save_3 = new_config_xml('../engine/config_mods/smtp_settings', 'smtp_password', $_POST['smtp_password']);
    $save_4 = new_config_xml('../engine/config_mods/smtp_settings', 'smtp_port', $_POST['smtp_port']);
    $save_5 = new_config_xml('../engine/config_mods/smtp_settings', 'smtp_connection', $_POST['smtp_connection']);
    echo notice_message_admin('Settings successfully saved', 1, 0, 'index.php?get=smtp_settings');
} else {
    $smtp_connection = array(
        'none' => 'None',
        'ssl' => 'SSL',
        'tls' => 'TLS'
    );
    $get_config      = simplexml_load_file('../engine/config_mods/smtp_settings.xml');
    echo '
<form action="" name="form_edit" method="post" id="form1">
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card" style="margin-bottom: 0px;">
					<div class="header">
						<h2 style="text-align: center;">
							SMTP Settings
						</h2>
					</div>
					<div class="body">
                    	
						<!-- input text -->
						<p class="lead" align="left">
                        	Server Address
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	SMTP server address.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="smtp_server" value="' . $get_config->smtp_server . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	Server Username
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	SMTP server username.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="smtp_username" value="' . $get_config->smtp_username . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	Server Password
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	SMTP server password.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="smtp_password" value="' . $get_config->smtp_password . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	Port
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	SMTP server port.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="smtp_port" value="' . $get_config->smtp_port . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
                        <!-- input select -->
						<p class="lead" align="left">
                        	Secure Connection
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	If SMTP server requires a secure connection, please set the appropriate setting.<br>
								<b>Note:</b> Connection SSL or TLS require php_openssl.dll to be enabled in php.ini
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
									<div style="border-bottom: none;">
                                    	<select name="smtp_connection" style="border: none;font-size: 14px;float: right;width: 100%;">';
                                        foreach ($smtp_connection as $smtp_type => $smtp_var) {
        									if ($get_config->smtp_connection == $smtp_type) {
            									echo '<option value="' . $smtp_type . '" selected="selected">' . $smtp_var . '</smtp>';
        									} else {
            									echo '<option value="' . $smtp_type . '">' . $smtp_var . '</smtp>';
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
</form>';
}
?> 