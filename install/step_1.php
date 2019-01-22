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
if (extension_loaded('mssql')){
    $mssql = '<span style="color:green"><b>Success</b></span>';
}else{
    $mssql = 'Disabled - <blink>Fix This</blink>'; $error = 1;
}

if (extension_loaded('gd')){
    $gd2 = '<span style="color:green"><b>Success</b></span>';
}else{
    $gd2 = 'Disabled - <blink>Fix This</blink>'; $error = 1;
}

if (extension_loaded('openssl')){
    $ssl = '<span style="color:green"><b>Success</b></span>';
}else{
    $ssl = 'Disabled - <blink>Fix This (optional)</blink>'; 
}

if(get_magic_quotes_gpc()){
    $magic_quotes = 'Enabled - <blink>Fix This</blink>';
    $error = 1;
}else{
    $magic_quotes = '<span style="color:green"><b>Success</b></span>';   
}

if(version_compare(phpversion(), '5', '>=')){
    $php_version = '<span style="color:green"><b>Success</b></span>';
}else{
    $php_version = 'PHP '.phpversion().' - <blink>Fix This</blink>'; $error = 1;
}

if($error == 1){
    $button =  '<button type="button" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-top: 0;">NEXT STEP</button>';
    $error_msg = 'Step 1 Status : Please fix errors and refresh page.';
}else{
    $button = '<button type="button" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-top: 0;" 
onclick="location.href=\'install.php?step=step_2\';">NEXT STEP</button>';
    $error_msg = 'Step 1 Status : <span style="color:green">Success</span>.';
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
							PHP Config
						</h2>
					</div>
					<div class="body">
						<p class="lead" align="left">
                        	php_mssql.dll
                    	</p>
                        <div class="row clearfix" style="font-size: 12px;">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 550px;text-align: left;">
                            	Extension php_mssql.dll must be <b>enabled</b>. To enable it go to your php.ini and search for 'extension=php_mssql.dll' and remove the ';' from front.<br><br>
                                E.g:<br>
                                <b>;extension=php_mssql.dll</b> - Disabled<br>
                                <b>extension=php_mssql.dll</b> - Enabled<br><br>
                                MSSQL extension is not available anymore on Windows with PHP 5.3 or later,<br> replace by Microsoft Drivers for PHP for SQL Server
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100px;float: right;margin-right: 50px;">
                            	<div class="form-group">
                                	<?php echo $mssql; ?>
                                </div>
                            </div>
                        </div>
                        
                        <p class="lead" align="left" style="border-top: 1px solid rgba(204, 204, 204, 0.35);padding-top: 10px;">
                        	php_gd2.dll
                    	</p>
                        <div class="row clearfix" style="font-size: 12px;">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 550px;text-align: left;">
                            	Extension php_gd2.dll must be <b>enabled</b>. To enable it go to your php.ini and search for 'extension=php_gd2.dll' and remove the ';' from front.<br><br>E.g:<br><b>;extension=php_gd2.dll</b> - Disabled<br><b>extension=php_gd2.dll</b> - Enabled
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100px;float: right;margin-right: 50px;">
                            	<div class="form-group">
                                	<?php echo $gd2; ?>
                                </div>
                            </div>
                        </div>
                        
                        
                        <p class="lead" align="left" style="border-top: 1px solid rgba(204, 204, 204, 0.35);padding-top: 10px;">
                        	php_openssl.dll (optional)
                    	</p>
                        <div class="row clearfix" style="font-size: 12px;">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 550px;text-align: left;">
                            	Extension php_openssl.dll must be <b>enabled</b>. To enable it go to your php.ini and search for 'extension=php_openssl.dll' and remove the ';' from front.<br><br>E.g:<br><b>;extension=php_openssl.dll</b> - Disabled<br><b>extension=php_openssl.dll</b> - Enabled<br><br><b>Why optional?</b><br>Extension php_openssl.dll is used only in case you have an SMTP Secure Connection (SSL or TSL)
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100px;float: right;margin-right: 50px;">
                            	<div class="form-group">
                                	<?php echo $ssl; ?>
                                </div>
                            </div>
                        </div>
                        
                        
                        <p class="lead" align="left" style="border-top: 1px solid rgba(204, 204, 204, 0.35);padding-top: 10px;">
                        	magic_quotes_gpc
                    	</p>
                        <div class="row clearfix" style="font-size: 12px;">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 550px;text-align: left;">
                            	magic_quotes_gpc must be <b>disabled</b>. <br/>To disable them go to your php.ini search for 'magic_quotes_gpc' and change value from 'On' to 'Off'
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100px;float: right;margin-right: 50px;">
                            	<div class="form-group">
                                	<?php echo $magic_quotes; ?>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        <p class="lead" align="left" style="border-top: 1px solid rgba(204, 204, 204, 0.35);padding-top: 10px;">
                        	PHP 5
                    	</p>
                        <div class="row clearfix" style="font-size: 12px;">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 550px;text-align: left;">
                            	MUCore <?php echo $core['version']; ?> require PHP 5 series to run
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100px;float: right;margin-right: 50px;">
                            	<div class="form-group">
                                	<?php echo $php_version; ?>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        <p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 350px;text-align: left;">
                                		<?php echo $error_msg; ?>
                                	</div>
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 300px;">
                                    	<?php echo $button; ?>
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