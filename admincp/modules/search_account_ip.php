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
echo'

<form action="" method="post" id="form1">
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2 style="text-align: center;">
							Search Account Using IP
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- input text -->
						<p class="lead" align="left">
                        	IP Address
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enter User IP Address.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">';
									if (isset($_POST['ip'])) {
        								echo '
							<input type="text" class="form-control" name="ip" value="' . $_POST['ip'] . '">';
    								} else {
										echo '
							<input type="text" class="form-control" name="ip" value="' . $_SESSION['search_ip'] . '">';
									}
									echo'
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
                        
						<p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100%;margin-bottom: 0px;">
                                        <button type="submit" form="form1" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 100px;margin-top: 5px;">Search</button>
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
    
if (isset($_POST['search'])) {
	if (!empty($_POST['ip'])) {
    	$_SESSION['search_ip'] = $_POST['ip'];
     	$userid                = safe_input($_POST['ip'], '\.');
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
                                        <th>IP Address</th>
                                        <th>Controls</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px;">';
								$user  = $core_db2->Execute("Select top 100 memb___id,ip from memb_stat where ip like ?", array('%' . $userid . '%'));
        						$count = 0;
        						while (!$user->EOF) {
        							$count++;
                					echo '
									<tr>
            <th scope="row"><strong>' . htmlspecialchars($user->fields[0]) . '</strong></th>
            <td>' . htmlspecialchars($user->fields[1]) . '</td>
            <td><a href="index.php?get=edit_account&get_edit=' . $user->fields[0] . '">[Edit]</a></td>
            						</tr>';
                					$user->MoveNext();
            					}
            
            					if ($count == '0') {
                					echo '
									<tr>
									<td align="center" class="panel_text_alt_list" colspan="5">No Accounts Found</td>
									</tr>';
            					}
            
            					if ($not_found == '1') {
                					echo '
									<tr>
									<td align="center" class="panel_text_alt_list" colspan="5">No Accounts Found</td>
									</tr>';
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
}
?> 