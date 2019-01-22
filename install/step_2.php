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
$dbh = isset($_POST['host']) ? $_POST['host'] : $core['db_host'];
$dbn = isset($_POST['name']) ? $_POST['name'] : $core['db_name'];
$dbu = isset($_POST['user']) ? $_POST['user'] : $core['db_user'];
$dbp = isset($_POST['pass']) ? $_POST['pass'] : $core['db_password'];

if ($core['connection_type'] == "ODBC") {
    $core_db = ADONewConnection('odbc');
    if ($core['debug'] == 1) {
        $core_db->debug = true;
    }

    $core_db_connect_sql = $core_db->Connect($dbn, $dbu, $dbp, $dbh);
    if (!$core_db_connect_sql) {
        $error = '1';
    }
}
elseif ($core['connection_type'] == "MSSQL") {
    $core_db = ADONewConnection('mssql');
    if ($core['debug'] == 1) {
        $core_db->debug = true;
    }

    $core_db_connect_sql = $core_db->Connect($dbh, $dbu, $dbp, $dbn);
    if (!$core_db_connect_sql) {
        $error = '1';
    }
}

if ($error == 1) {
    $button = '<button type="button" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-top: 0;">NEXT STEP</button>';
    $error_msg = '<span style="color:red">Please fix errors.</span>';
}
else {	
	$archivo = '../config.php';
	$abrir = fopen($archivo,'r');
	$i = 0;
	while ($linea = fgets($abrir)) {
		if( substr($linea, 0, 16) == '$core[\'db_host\']'){
			$aux[$i] = '$core[\'db_host\'] = "'.$dbh.'";';
			$aux[$i] .= "\n";
		}elseif( substr($linea, 0, 16) == '$core[\'db_name\']'){
			$aux[$i] = '$core[\'db_name\'] = "'.$dbn.'";';
			$aux[$i] .= "\n";
		}elseif( substr($linea, 0, 16) == '$core[\'db_user\']'){
			$aux[$i] = '$core[\'db_user\'] = "'.$dbu.'";';
			$aux[$i] .= "\n";
		}elseif( substr($linea, 0, 20) == '$core[\'db_password\']'){
			$aux[$i] = '$core[\'db_password\'] = "'.$dbp.'";';
			$aux[$i] .= "\n";
		} else {
			$aux[$i] = $linea; 
		}
		$i++;

	}
	fclose($abrir);
	$contenido = implode("",$aux);

	$abrir2 = fopen($archivo,'w');
	fwrite($abrir2,$contenido);
	fclose($abrir2);
	
    $button = '<button type="button" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-top: 0;" 
onclick="location.href=\'install.php?step=step_3\';">NEXT STEP</button>';
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
							Connection Info SQL
						</h2>
					</div>
					<div class="body">
						<p class="lead" align="left">
                        	Connection Server Databases
                    	</p>
                        
                        <form action="" method="post" id="form1">
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 350px;text-align: left;">
                            	<label for="serial" style="font-size: 12px;">Database host address</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 300px;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" name="host" class="form-control" value="<?php echo $dbh; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 350px;text-align: left;">
                            	<label for="serial" style="font-size: 12px;">Database name</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 300px;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" name="name" class="form-control" value="<?php echo $dbn; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 350px;text-align: left;">
                            	<label for="serial" style="font-size: 12px;">SQL Authentication user</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 300px;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" name="user" class="form-control" value="<?php echo $dbu; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 350px;text-align: left;">
                            	<label for="serial" style="font-size: 12px;">SQL Authentication password</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 300px;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" name="pass" class="form-control" value="<?php echo $dbp; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                            <p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 350px;text-align: left;">
                                	Check Connection MSSQL : <?php echo $error_msg; ?>
                                	</div>
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 300px;">
                                    	<?php echo $button; ?>
                                        <button type="submit" form="form1" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 20px;margin-top: 0;">CHECK MSSQL</button>
                                	</div>
                             	</div>
                            </p>
                    	</form>
					</div>
				</div>
			</div>
		</div>
	<!-- #END# Body Copy -->
	</div>
</section>