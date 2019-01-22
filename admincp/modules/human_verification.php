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
    $save_1 = new_config_xml('../engine/config_mods/human_verification', 'human_verification_type', $_POST['human_verification_type']);
    
    echo notice_message_admin('Settings successfully saved', 1, 0, 'index.php?get=human_verification');
} elseif (isset($_POST['recaptcha_settings'])) {
    $save_1 = new_config_xml('../engine/config_mods/human_verification', 'reCAPTCHA_public_key', $_POST['reCAPTCHA_public_key']);
    $save_2 = new_config_xml('../engine/config_mods/human_verification', 'reCAPTCHA_private_key', $_POST['reCAPTCHA_private_key']);
    
    echo notice_message_admin('Settings successfully saved', 1, 0, 'index.php?get=human_verification');
} else {
    $human_verifications = array(
        'none' => 'Image Verification',
        'reCAPTCHA' => 'reCAPTCHA&#8482;'
    );
    
    $get_config       = simplexml_load_file('../engine/config_mods/human_verification.xml');
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
							Human Verification Settings
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- inpunt radio -->
						<p class="lead" align="left">
                        	Human Verification Library
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Choose the verification type that you wish to present to the user.<br><br><b>Image Verification</b><br>An image consisting of letters will be shown to the user.<br><br>
<b>reCAPTCHA&#8482;</b><br>
A CAPTCHA is a program that protects websites against bots by generating and grading tests that humans can pass but current computer programs cannot. For example, humans can read distorted text, but current computer programs can\'t.</em><br><a href="http://www.captcha.net/" target="blank">Visit reCAPTCHA&trade; site for more infos.</a>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
									<div class="demo-radio-button">';
									foreach ($human_verifications as $verification_id => $verification_html) {
        									if ($get_config->human_verification_type == $verification_id) {
            									echo '
													<input type="radio" class="with-gap" id="radio_1" name="human_verification_type" value="' . $verification_id . '" checked="checked"/>
           											<label for="radio_1" style="min-width: 70px;">' . $verification_html . '</label>';
        									} else {
            									echo '
													<input type="radio" class="with-gap" id="radio_2" name="human_verification_type" value="' . $verification_id . '"/>
            										<label for="radio_2" style="min-width: 70px;">' . $verification_html . '</label>';
        									}
        
    								}
									echo '
									</div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input radio -->
						           
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
    
    if ($get_config->human_verification_type == 'reCAPTCHA') {
        echo '
<form action="" method="post" id="form2">
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card" style="margin: 30px 0 0 0;">
					<div class="header">
						<h2 style="text-align: center;">
							reCAPTCHA&#8482; Verification Settings
						</h2>
					</div>
					<div class="body">
                    	
						<!-- input text -->
						<p class="lead" align="left">
                        	reCAPTCHA&#8482; Public Key
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Public key provided to you by <a href="http://www.captcha.net/" target="blank">reCAPTCHA&trade;.</a>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="reCAPTCHA_public_key" value="' . $get_config->reCAPTCHA_public_key . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	reCAPTCHA&#8482; Private Key
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Private key provided to you by <a href="http://www.captcha.net/" target="blank">reCAPTCHA&trade;.</a>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="reCAPTCHA_private_key" value="' . $get_config->reCAPTCHA_private_key . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->

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
<input type="hidden" name="recaptcha_settings">
</form>';  
    }
}
?> 