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
if ($core['connection_type'] == "ODBC") {
    $core_db = ADONewConnection('odbc');
    if ($core['debug'] == 1) {
        $core_db->debug = true;
    }

    $core_db_connect_sql = $core_db->Connect($core['db_name'], $core['db_user'], $core['db_password'], $core['db_host']);
    if (!$core_db_connect_sql) {
        $msj = 'Failed - <blink>Fix this</blink>';
        $error = '1';
    } else {
        $msj = '<b>Success</b>';
    }
} elseif ($core['connection_type'] == "MSSQL") {
    $core_db = ADONewConnection('mssql');
    if ($core['debug'] == 1) {
        $core_db->debug = true;
    }

    $core_db_connect_sql = $core_db->Connect($core['db_host'], $core['db_user'], $core['db_password'], $core['db_name']);
    if (!$core_db_connect_sql) {
        $msj = 'Failed - <blink>Fix this</b>';
        $error = '1';
    } else {
        $msj = '<b>Success</b>';
    }
}

if ($error == 1) {
    $button = '<button type="button" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-top: 0;">NEXT STEP</button>';
    $error_msg = '<span style="color:red">Please fix errors and refresh page.</span>';
} else {
    $button = '<button type="button" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-top: 0;" 
onclick="location.href=\'install.php?step=step_4\';">NEXT STEP</button>';
    $error_msg = '<span style="color:green">Success.</span>';
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
							Connection Info
						</h2>
					</div>
					<div class="body">
						<p class="lead" align="left">
                        	Connection Type
                    	</p>
                        <div class="row clearfix" style="font-size: 12px;">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 550px;text-align: left;">
                            	MUCore will connect to database using the next connection type.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100px;float: right;margin-right: 50px;">
                            	<div class="form-group">
                                	<b><?php echo $core['connection_type']; ?></b>
                                </div>
                            </div>
                        </div>
                        
                        <p class="lead" align="left" style="border-top: 1px solid rgba(204, 204, 204, 0.35);padding-top: 10px;">
                        	Server Databases
                    	</p>
                        <div class="row clearfix" style="font-size: 12px;">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 550px;text-align: left;">
                            	MUCOre will connect to the following databases.<br />
<br />If you use <b>only</b> 'MuOnline' database change $core['server_use_2_db'] to '0'. <br />
<br />If you use <b>2 databases like</b> 'MuOnline' and 'Me_MuOnline' change $core['server_use_2_db'] to '1'.<br />
<br />All this configs can be made from <b>config.php</b>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100px;float: right;margin-right: 50px;">
                            	<div class="form-group">
                                	<b><?php 
										if ($core['server_use_2_db'] == '0') {
    										echo $core['db_name'];
										} elseif ($core['server_use_2_db'] == '1') {
    										echo $core['db_name'] . ' and ' . $core['db_name2'];
										}
									?></b>
                                </div>
                            </div>
                        </div>
                        
                        
                        <p class="lead" align="left" style="border-top: 1px solid rgba(204, 204, 204, 0.35);padding-top: 10px;">
                        	MuOnline
                    	</p>
                        <div class="row clearfix" style="font-size: 12px;">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 500px;text-align: left;">
                            	Connection with MuOnline Database
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 150px;float: right;margin-right: 50px;">
                            	<div class="form-group">
                                	<?php echo $msj; ?>
                                </div>
                            </div>
                        </div>
                        
                    
                        
                      
                            <p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 350px;text-align: left;">
                                	Step 3 Status : <?php echo $error_msg; ?>
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