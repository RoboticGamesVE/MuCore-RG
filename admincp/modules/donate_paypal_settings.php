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
if ( isset( $_POST['settings'] ) )
{
    $save_1 = new_config_xml( "../engine/config_mods/donate_paypal_settings", "pp_email", safe_input( $_POST['pp_email'], "\\#\\.\\_\\@\\-" ) );
    $save_2 = new_config_xml( "../engine/config_mods/donate_paypal_settings", "punish", safe_input( $_POST['punish'], "\\#\\.\\_\\@\\-" ) );
    $save_3 = new_config_xml( "../engine/config_mods/donate_paypal_settings", "code", safe_input( $_POST['code'], "\\#\\.\\_\\@\\-" ) );
    echo notice_message_admin( "Settings successfully saved", 1, 0, "index.php?get=donate_paypal_settings" );
}
else
{
    if ( isset( $_POST['module_active'] ) )
    {
        $save_status = new_config_xml( "../engine/config_mods/donate_paypal_settings", "active", safe_input( $_POST['module_active'], "" ) );
    }
    $get_config = simplexml_load_file( "../engine/config_mods/donate_paypal_settings.xml" );
    echo '
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2 style="text-align: center;">
							PayPal Settings
						</h2>
					</div>
					<div class="body">
					<form action="" method="post" id="form1">';
					 	if ($get_config->active == '1') {
        					echo '<p class="lead" align="left" style="background: #0C0;padding: 5px 0px 5px 5px">Donate with PayPal is active.
								<button type="submit" form="form1" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 20px;margin-top: 0;">Turn Donate with PayPal Off</button></p>
								<input type="hidden" name="module_active" value="0">';
    					} elseif ($get_config->active == '0') {
        					echo '<p class="lead" align="left" style="background: #C00;padding: 5px 0px 5px 5px">Donate with PayPal is inactive.
								<button type="submit" form="form1" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 20px;margin-top: 0;">Turn Donate with PayPal On</button></p>
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
</section>';
   
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
							PayPal Settings
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- input text -->
						<p class="lead" align="left">
                        	PayPal Email Address
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enter paypal email address.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="pp_email" value="'.$get_config->pp_email.'">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- inpunt radio -->
						<p class="lead" align="left">
                        	Chargeback Punish
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	If set to \'Yes\' user\'s account will be blocked if him make an paypal chargeback or payment is refunded.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">';
									switch ( $get_config->punish ) {
    									case "0" :
        									echo '
											<div class="demo-radio-button">
												<input type="radio" class="with-gap" id="radio_1" name="punish" value="1"/>
           										<label for="radio_1" style="min-width: 70px;">Yes</label>	
												<input type="radio" class="with-gap" id="radio_2" name="punish" value="0" checked="checked"/>
            									<label for="radio_2" style="min-width: 70px;">No</label>
    										</div>';
        								break;
    									
										case "1" :
        									echo '
											<div class="demo-radio-button">
												<input type="radio" class="with-gap" id="radio_1" name="punish" value="1" checked="checked"/>
           										<label for="radio_1" style="min-width: 70px;">Yes</label>	
												<input type="radio" class="with-gap" id="radio_2" name="punish" value="0"/>
            									<label for="radio_2" style="min-width: 70px;">No</label>
    										</div>';
    								}
									
									echo '	
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input radio -->
                        
                        <!-- inpunt radio -->
						<p class="lead" align="left">
                        	PayPal Verification
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	If set to \'Yes\' buyer\'s paypal email will receive mail with confirmation code in order to claim his credits for his paypal transcation.<br>
								If set to \'No\' buyer will receive credits after paypal transaction is finihsed.<br>
								<b>This function will need buyers to verify their donation/transaction to avoid chargeback. They will need the verification code sent to their paypal email in order to finish the donation process.</b><br>
								Note: <b>PayPal Verification</b> require SMTP Server, <a href="index.php?get=smtp_settings">SMTP Settings</a>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">';
									switch ( $get_config->code ) {
    									case "0" :
        									echo '
											<div class="demo-radio-button">
												<input type="radio" class="with-gap" id="radio_3" name="code" value="1"/>
           										<label for="radio_3" style="min-width: 70px;">Yes</label>	
												<input type="radio" class="with-gap" id="radio_4" name="code" value="0" checked="checked"/>
            									<label for="radio_4" style="min-width: 70px;">No</label>
    										</div>';
        								break;
    
										case "1" :
        									echo '
											<div class="demo-radio-button">
												<input type="radio" class="with-gap" id="radio_3" name="code" value="1" checked="checked"/>
           										<label for="radio_3" style="min-width: 70px;">Yes</label>	
												<input type="radio" class="with-gap" id="radio_4" name="code" value="0"/>
            									<label for="radio_4" style="min-width: 70px;">No</label>
    										</div>';
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