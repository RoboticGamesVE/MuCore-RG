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
require('../engine/webshop.php');
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
							Logs
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- input text -->
						<p class="lead" align="left">
                        	User ID
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enter the User ID.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="userid">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
                        
						<p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		
									
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100%;margin-bottom: 0px;">
										<a href="index.php?get=webshop_logs&m=today">[Show today logs]</a>
										
                                        <button type="submit" form="form2" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 100px;margin-top: 5px;">Search</button>
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
<input type="hidden" name="search">
</form>';

if ($_GET['m'] == 'today') {
    $normal_logs = '0';
} elseif (isset($_POST['search']) && !empty($_POST['userid'])) {
    $normal_logs = '1';
}

if (isset($normal_logs)) {
    if ($normal_logs == '0') {
        $query = $core_db->Execute("Select memb___id,content,item_serial,date_time from MUCore_Shop_Logs where date_time > " . strtotime(date('m/d/Y')) . "");
    } elseif ($normal_logs == '1') {
        $userid = str_replace("'", "", $_POST['userid']);
        $query  = $core_db->Execute("Select memb___id,content,item_serial,date_time from MUCore_Shop_Logs where memb___id like ?", array(
            '%' . $userid . '%'
        ));
    }
    
    
    echo '
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card" style="margin-bottom: 0px;">
					<div class="header">
						<h2 style="text-align: center;">
							Search Results
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- input table -->
                        <!-- <div class="body table-responsive"> -->
                        <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>Action</th>
                                        <th>Item Serial</th>
										<th>Date</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px;">';
   	 							while (!$query->EOF) {
        							echo '
        							<tr>
        								<th scope="row"><strong>' . htmlspecialchars($query->fields[0]) . '</strong></th>
        								<td>' . htmlspecialchars($query->fields[1]) . '</td>
        								<td>' . $query->fields[2] . '</td>
        								<td>' . date("F j, Y H:i", $query->fields[3]) . '</td>
        							</tr>';
        
        							$query->MoveNext();
    							}
								echo '
                                </tbody>
                            </table>
                            <!-- #END# input table -->
					</div>
				</div>
			</div>
		</div>
	<!-- #END# Body Copy -->
	</div>
</section>';
}
?> 