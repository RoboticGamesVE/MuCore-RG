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
$log_dir = '../engine/logs/paypal';

if (isset($_GET['delete_logs_date'])) {
    if (empty($_GET['delete_logs_date'])) {
        echo notice_message_admin('Unable to proceed your request.', '0', '1', '0');
    } else {
        $log_id = safe_input($_GET['delete_logs_date'], '\_');
        if (unlink($log_dir . '/' . $log_id . '.log')) {
            echo notice_message_admin('Logs from  ' . str_replace("_", " ", $log_id) . ' successfully edited', 1, 0, 'index.php?get=logs_paypal_donate');
        }
    }
    
} elseif (isset($_POST['clean_logs'])) {
    if (is_dir($log_dir)) {
        if ($dh = opendir($log_dir)) {
            $count = 0;
            while (($file = readdir($dh)) !== false) {
                if ($file != '.' && $file != '..') {
                    if (unlink($log_dir . '/' . $file)) {
                        $count++;
                    }
                    
                }
            }
        }
    }
    echo notice_message_admin('<b>' . $count . '</b> logs have been successfully deleted', 1, 0, 'index.php?get=logs_paypal_donate');
} else {
    if (isset($_GET['date'])) {
        $date = safe_input($_GET['date'], '\_');
    }
    
    
    echo '
<form action="" method="post" id="form2">
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2 style="text-align: center;">
							Logs Settings
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- input text -->
						<p class="lead" align="left">
                        	Delete Logs
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	This is used to delete all logs.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line" style="border-bottom: 0px;">
                                    	<button type="submit" form="form2" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 100px;margin-top: 5px;">Delete All Logs</button>
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
<input type="hidden" name="clean_logs">
</form>



<form action="" method="post" id="form2">
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
<div align="right" style="width: 100%; margin-bottom: 2px;"><a href="index.php?get=logs_paypal_donate">[View Today Logs]</a></div>
<div align="left" style="width: 100%; margin-bottom: 2px;"><form name="form1">
  <select name="date" onChange="MM_jumpMenu(\'parent\',this,0)">
  <optgroup label="---------------------------------------">
  <option value="index.php?get=logs_paypal_donate" selected="selected">Today (' . date('F j Y') . ')</option>
        <optgroup label="---------------------------------------">';    
    if (is_dir($log_dir)) {
        if ($dh = opendir($log_dir)) {
            while (($file = readdir($dh)) !== false) {
                if ($file != '.' && $file != '..') {
                    $file = substr_replace($file, "", -4);
                    if ($date == $file) {
                        echo '<option value="index.php?get=logs_paypal_donate&date=' . $file . '" selected="selected">' . str_replace("_", " ", $file) . '</option>';
                    } else {
                        echo '<option value="index.php?get=logs_paypal_donate&date=' . $file . '">' . str_replace("_", " ", $file) . '</option>';
                    }
                }
                
            }
            closedir($dh);
        }
    }
    echo '
  </select>
</form></div>';
    
    if (!isset($_GET['date'])) {
        $date = date('F_j_Y');
    } else {
        $date = safe_input($_GET['date'], '\_');
    }
	echo '
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card" style="margin-bottom: 0px;">
					<div class="header">
						<h2 style="text-align: center;">
							PayPal Donate System Logs
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- input table -->
                        <!-- <div class="body table-responsive"> -->
                        <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>Date</th>
                                    </tr>

                                </thead>
                                <tbody style="font-size: 12px;">';
	$count = 0;
    
    if (is_file($log_dir . '/' . $date . '.log')) {
        $open_log = array_reverse(file($log_dir . '/' . $date . '.log'));
        foreach ($open_log as $log) {
            $count++;
            echo '
    <tr>
    <th scope="row">' . $log . '</th>
    <td>' . str_replace("_", " ", $date) . '</td>
    </tr>';
            
        }
    }
    
    if ($count == '0') {
    } else {
        if ($date != date('F_j_Y')) {
            echo '<tr>
<td>
<input type="button" value="Delete ' . str_replace("_", " ", $date) . ' Logs" onclick="ask_url(\'Are you sure?\',\'index.php?get=logs_paypal_donate&delete_logs_date=' . $date . '\')"></td>
</tr>';
        }
        
    }
								echo '
                                </tbody>
                            </table>';
							if ($count == '0') {
    							echo '
								<div style="text-align:center;background-color:#f9f9f9;padding: 5px;">
									<em>No logs found on ' . str_replace("_", " ", $date) . '</em>
								</div>';
        					}
							echo '	
                            <!-- #END# input table -->
                        
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