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
$nickname = $core['config']['admin_nick'];

if (isset($_GET['m'])) {
    if ($_GET['m'] == '1') {
        if (isset($_GET['unban'])) {
            $banid     = safe_input($_GET['unban'], '');
            $check_ban = $core_db->Execute("Select type,ban_id from MUCore_ban where type='1' and id=?", array(
                $banid
            ));
            if ($check_ban->EOF) {
                echo notice_message_admin('No character found in ban list.', '0', '1', '0');
            } else {
                $set_unban = $core_db->Execute("Update character set ctlcode='0' where mu_id=?", array(
                    $check_ban->fields[1]
                ));
                if ($set_unban) {
                    $delete_from_list = $core_db->Execute("Delete from MUCore_ban where id=? and type='1'", array(
                        $banid
                    ));
                    if ($delete_from_list) {
                        echo notice_message_admin('Character successfully unbanned', 1, 0, 'index.php?get=ban_manager&m=1');
                    }
                }
            }
            
            
            
        } else {
            if (isset($_POST['add'])) {
                if (empty($_POST['ban_id']) || $_POST['ban_period'] == 'x') {
                    echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
                } else {
                    $banid        = addslashes($_POST['ban_id']);
                    $reason       = addslashes($_POST['ban_reason']);
                    $period       = addslashes($_POST['ban_period']);
                    $check_ban_id = $core_db->Execute("Select mu_id,name,AccountID from character where name=?", array(
                        $banid
                    ));
                    if ($check_ban_id->EOF) {
                        echo notice_message_admin('No character found.', '0', '1', '0');
                    } else {
                        $check_if_ban_exist = $core_db->Execute("Select ban_id from MUCore_ban where ban_id=? and type='1'", array(
                            $check_ban_id->fields[0]
                        ));
                        if (!$check_if_ban_exist->EOF) {
                            echo notice_message_admin('This character is already banned.', '0', '1', '0');
                        } else {
                            if (account_online($check_ban_id->fields[2]) === true) {
                                echo notice_message_admin('Character is connected in game.', '0', '1', '0');
                            } else {
                                if ($period == 'perm') {
                                    $ban_permanent = '1';
                                    $ban_expire    = '0';
                                } else {
                                    $ban_permanent = '0';
                                    $ban_expire    = time() + (86400 * $period);
                                }
                                
                                $set_ban = $core_db->Execute("Update character set ctlcode='1' where mu_id=?", array(
                                    $check_ban_id->fields[0]
                                ));
                                if ($set_ban) {
                                    $insert_ban = $core_db->Execute("INSERT INTO MUCore_Ban (ban_id,type,ban_date,ban_expire,reason,ban_name,ban_permanent,author) VALUES (?,?,?,?,?,?,?,?)", array(
                                        $check_ban_id->fields[0],
                                        '1',
                                        time(),
                                        $ban_expire,
                                        $reason,
                                        $check_ban_id->fields[1],
                                        $ban_permanent,
                                        $nickname
                                    ));
                                    if ($insert_ban) {
                                        echo notice_message_admin('Character successfully banned', 1, 0, 'index.php?get=ban_manager&m=1');
                                    } else {
                                        echo notice_message_admin('Unable to insert ban in banlist., system error.', '0', '1', '0');
                                    }
                                    
                                } else {
                                    echo notice_message_admin('Unable to set ban mode, system error.', '0', '1', '0');
                                }
                                
                            }
                        }
                    }
                    
                }
                
            } else {
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
							Ban Character
						</h2>
					</div>
					<div class="body">
                        
						<!-- input text -->
						<p class="lead" align="left">
                        	Character
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enter the character name you want to ban.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="ban_id">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
                        <!-- input select -->
						<p class="lead" align="left">
                        	Period
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Select ban period.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	
									<div style="border-bottom: none;">
                                    	<select name="ban_period" style="border: none;font-size: 14px;float: right;width: 100%;">
    									<option value="x" selected="selected">Select period</option>
    									<optgroup label="---------------------------">
    									<option value="perm">Permanent Ban</option>
        								<optgroup label="---------------------------">
        								<option value="1">1 day</option>';
                						$i = 1;
                						while ($i <= 364) {
                    						$i++;
                    						echo '<option value="' . $i . '">' . $i . ' days</option>';
                						}
        								echo '
                                		</select>
                                    </div>
									
                                </div>
                            </div>
                        </div>
						<!-- #END# input select -->
                        
                        <!-- input text -->
						<p class="lead" align="left">
                        	Reason
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Reason for ban.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="ban_reason">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
                        
						<p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100%;margin-bottom: 0px;">
                                        <button type="submit" form="form2" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 100px;margin-top: 5px;">Ban Character</button>
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
<input type="hidden" name="add">
</form>';
                
                if (isset($_GET['permanent'])) {
                    echo '<div align="right" style="width: 90%; margin-bottom: 2px; margin-top: 20px;"><a href="index.php?get=ban_manager&m=1">[Return Back]</a></div>';
                } else {
                    echo '<div align="right" style="width: 90%; margin-bottom: 2px; margin-top: 20px;"><a href="index.php?get=ban_manager&m=1&permanent=1">[View Permanent Bans]</a></div>';
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
							Banned Characters
						</h2>
					</div>
					<div class="body">
						
                        <!-- input table -->
                        <!-- <div class="body table-responsive"> -->
                        <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Character</th>
                                        <th>Ban Date</th>
                                        <th>Expire Date</th>
										<th>Reason</th>
										<th>Banned by</th>
										<th>Controls</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px;">';
				if (isset($_GET['permanent'])) {
                    $user = $core_db->Execute("Select id,ban_name,reason,ban_date,ban_expire,ban_permanent,ban_id,type,author from MUCore_Ban where ban_permanent='1' and type='1' order by ban_date desc");
                } else {
                    $user = $core_db->Execute("Select id,ban_name,reason,ban_date,ban_expire,ban_permanent,ban_id,type,author from MUCore_Ban where ban_permanent='0' and type='1' order by ban_expire asc");
                }
                
                $count = 0;
                while (!$user->EOF) {
                    if ($user->fields[5] == '0') {
                        $time_left = $user->fields[4] - time();
                        if ($time_left <= 0) {
                            $set_unban = $core_db->Execute("Update character set ctlcode='0' where mu_id=?", array(
                                $user->fields[6]
                            ));
                            if ($set_unban) {
                                $delete_from_list = $core_db->Execute("Delete from MUCore_ban where id=? and type=?", array(
                                    $user->fields[0],
                                    $user->fields[7]
                                ));
                            }
                        }
                    }
                    
                    $count++;
                    echo '<tr>
            <th scope="row"><strong>' . htmlspecialchars(stripslashes($user->fields[1])) . '</strong></th>
            <td>' . date('F j, Y / H:i', $user->fields[3]) . '</td>
            <td>';
                    
                    if ($user->fields[4] == '0') {
                        echo '<em>never</em>';
                    } else {
                        echo '<b>' . date('F j, Y / H:i', $user->fields[4]) . '</b> <br>(' . decode_time(time(), $user->fields[4], 'long', 'Expired') . ')</td>';
                    }
                    
                    echo '
            <td>';
                    if (empty($user->fields[2])) {
                        echo '<em>no reason</em>';
                    } else {
                        echo '<a class="info_l" onmouseover="showHelpTip(event, \'' . htmlspecialchars($user->fields[2]) . '\'); return false" onmouseout="helpTipHandler.hideHelpTip(this);">Reason <img src="styles/default/info_icon.gif" border="0"></a>';
                    }
                    echo '</td>
            <td>' . htmlspecialchars($user->fields[8]) . '</td>
            <td><a href="#" onclick="ask_url(\'Are you sure you want to unban character ' . htmlspecialchars(stripslashes($user->fields[1])) . '?\',\'index.php?get=ban_manager&m=1&unban=' . $user->fields[0] . '\');">[Unban]</a></td>
            </tr>';
                    
                    $user->MoveNext();
                }
                if ($count == '0') {
                    echo '<tr><td align="center" class="panel_text_alt_list" colspan="6">No Characters Found</td></tr>';
                }
								echo'
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
    } elseif ($_GET['m'] == '0') {
        if (isset($_GET['unban'])) {
            $banid     = safe_input($_GET['unban'], '');
            $check_ban = $core_db->Execute("Select type,ban_id from MUCore_ban where type='0' and id=?", array(
                $banid
            ));
            if ($check_ban->EOF) {
                echo notice_message_admin('No account found in ban list.', '0', '1', '0');
            } else {
                $set_unban = $core_db2->Execute("Update memb_info set bloc_code='0' where memb_guid=?", array(
                    $check_ban->fields[1]
                ));
                if ($set_unban) {
                    $delete_from_list = $core_db->Execute("Delete from MUCore_ban where id=? and type='0'", array(
                        $banid
                    ));
                    if ($delete_from_list) {
                        echo notice_message_admin('Account successfully unbanned', 1, 0, 'index.php?get=ban_manager&m=0');
                    }
                }
            }
            
            
            
            
        } else {
            if (isset($_POST['add'])) {
                if (empty($_POST['ban_id']) || $_POST['ban_period'] == 'x') {
                    echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
                } else {
                    $banid        = addslashes($_POST['ban_id']);
                    $reason       = addslashes($_POST['ban_reason']);
                    $period       = addslashes($_POST['ban_period']);
                    $check_ban_id = $core_db2->Execute("Select memb_guid,memb___id from memb_info where memb___id=?", array(
                        $banid
                    ));
                    if ($check_ban_id->EOF) {
                        echo notice_message_admin('No account found.', '0', '1', '0');
                    } else {
                        $check_if_ban_exist = $core_db->Execute("Select ban_id from MUCore_ban where ban_id=? and type='0'", array(
                            $check_ban_id->fields[0]
                        ));
                        if (!$check_if_ban_exist->EOF) {
                            echo notice_message_admin('This account is already banned.', '0', '1', '0');
                        } else {
                            if (account_online($check_ban_id->fields[1]) === true) {
                                echo notice_message_admin('Account is connected in game.', '0', '1', '0');
                            } else {
                                if ($period == 'perm') {
                                    $ban_permanent = '1';
                                    $ban_expire    = '0';
                                } else {
                                    $ban_permanent = '0';
                                    $ban_expire    = time() + (86400 * $period);
                                }
                                
                                $set_ban = $core_db2->Execute("Update memb_info set bloc_code='1' where memb_guid=?", array(
                                    $check_ban_id->fields[0]
                                ));
                                if ($set_ban) {
                                    $insert_ban = $core_db->Execute("INSERT INTO MUCore_Ban (ban_id,type,ban_date,ban_expire,reason,ban_name,ban_permanent,author) VALUES (?,?,?,?,?,?,?,?)", array(
                                        $check_ban_id->fields[0],
                                        '0',
                                        time(),
                                        $ban_expire,
                                        $reason,
                                        $check_ban_id->fields[1],
                                        $ban_permanent,
                                        $nickname
                                    ));
                                    if ($insert_ban) {
                                        echo notice_message_admin('Account successfully banned', 1, 0, 'index.php?get=ban_manager&m=0');
                                    } else {
                                        echo notice_message_admin('Unable to insert ban in banlist., system error.', '0', '1', '0');
                                    }
                                    
                                } else {
                                    echo notice_message_admin('Unable to set ban mode, system error.', '0', '1', '0');
                                }
                                
                            }
                        }
                    }
                    
                }
                
            } else {
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
							Ban Account
						</h2>
					</div>
					<div class="body">
                        
						<!-- input text -->
						<p class="lead" align="left">
                        	User ID
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enter the User ID for account you want to ban.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="ban_id">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
                        <!-- input select -->
						<p class="lead" align="left">
                        	Period
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Select ban period.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	
									<div style="border-bottom: none;">
                                    	<select name="ban_period" style="border: none;font-size: 14px;float: right;width: 100%;">
                                        <option value="x" selected="selected">Select period</option>
    									<optgroup label="---------------------------">
    									<option value="perm">Permanent Ban</option>
        								<optgroup label="---------------------------">
        								<option value="1">1 day</option>';
                						$i = 1;
                						while ($i <= 364) {
                    						$i++;
                    						echo '<option value="' . $i . '">' . $i . ' days</option>';
                						}
										echo '
                                		</select>
                                    </div>
									
                                </div>
                            </div>
                        </div>
						<!-- #END# input select -->
                        
						<!-- input text -->
						<p class="lead" align="left">
                        	Reason
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Reason for ban.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="ban_reason">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
                        
						<p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100%;margin-bottom: 0px;">
                                        <button type="submit" form="form2" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 100px;margin-top: 5px;">Ban Account</button>
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
<input type="hidden" name="add">
</form>';
                
                if (isset($_GET['permanent'])) {
                    echo '<div align="right" style="width: 90%; margin-bottom: 2px; margin-top: 20px;"><a href="index.php?get=ban_manager&m=0">[Return Back]</a></div>';
                } else {
                    echo '<div align="right" style="width: 90%; margin-bottom: 2px; margin-top: 20px;"><a href="index.php?get=ban_manager&m=0&permanent=1">[View Permanent Bans]</a></div>';
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
							Banned Accounts
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- input table -->
                        <!-- <div class="body table-responsive"> -->
                        <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>Ban Date</th>
                                        <th>Expire Date</th>
										<th>Reason</th>
										<th>Banned by</th>
										<th>Controls</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px;">';
                if (isset($_GET['permanent'])) {
                    $user = $core_db->Execute("Select id,ban_name,reason,ban_date,ban_expire,ban_permanent,ban_id,type,author from MUCore_Ban where ban_permanent='1' and type='0' order by ban_date desc");
                } else {
                    $user = $core_db->Execute("Select id,ban_name,reason,ban_date,ban_expire,ban_permanent,ban_id,type,author from MUCore_Ban where ban_permanent='0' and type='0' order by ban_expire asc");
                }
                
                $count = 0;
                while (!$user->EOF) {
                    if ($user->fields[5] == '0') {
                        $time_left = $user->fields[4] - time();
                        if ($time_left <= 0) {
                            $set_unban = $core_db2->Execute("Update memb_info set bloc_code='0' where memb_guid=?", array(
                                $user->fields[6]
                            ));
                            if ($set_unban) {
                                $delete_from_list = $core_db->Execute("Delete from MUCore_ban where id=? and type=?", array(
                                    $user->fields[0],
                                    $user->fields[7]
                                ));
                            }
                        }
                    }
                    
                    $count++;
                    echo '<tr>
            <th scope="row"><strong>' . htmlspecialchars(stripslashes($user->fields[1])) . '</strong></th>
            <td>' . date('F j, Y / H:i', $user->fields[3]) . '</td>
            <td>';
                    
                    if ($user->fields[4] == '0') {
                        echo '<em>never</em>';
                    } else {
                        echo '<b>' . date('F j, Y / H:i', $user->fields[4]) . '</b> <br>(' . decode_time(time(), $user->fields[4], 'long', 'Expired') . ')</td>';
                    }
                    
                    echo '
            <td>';
                    if (empty($user->fields[2])) {
                        echo '<em>no reason</em>';
                    } else {
                        echo '<a class="info_l" onmouseover="showHelpTip(event, \'' . htmlspecialchars($user->fields[2]) . '\'); return false" onmouseout="helpTipHandler.hideHelpTip(this);">Reason <img src="styles/default/info_icon.gif" border="0"></a>';
                    }
                    echo '</td>
            <td>' . htmlspecialchars($user->fields[8]) . '</td>
            <td><a href="#" onclick="ask_url(\'Are you sure you want to unban account ' . htmlspecialchars(stripslashes($user->fields[1])) . '?\',\'index.php?get=ban_manager&m=0&unban=' . $user->fields[0] . '\');">[Unban]</a></td>
            </tr>';
                    
                    $user->MoveNext();
                }
                if ($count == '0') {
                    echo '<tr><td align="center" class="panel_text_alt_list" colspan="6">No Accounts Found</td></tr>';
                }
								echo'
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
    }
    
} else {
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
							Ban Manager
						</h2>
					</div>
					<div class="body">
                        
                        <!-- input table -->
                        <!-- <div class="body table-responsive"> -->
						<p class="lead" align="left">
                        	Please select
                    	</p>
                        <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px;">
									<tr>
										<th scope="row"><a href="index.php?get=ban_manager&m=1">[Character]</a></th>
										<td>Ban Manager for characters.</td>
									</tr>
									
									<tr>
										<th scope="row"><a href="index.php?get=ban_manager&m=0">[Account]</a></th>
										<td>Ban Manager for accounts.</td>
									</tr>
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