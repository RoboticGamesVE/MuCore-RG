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
if (isset($_GET['get_edit'])) {
    $get_edit = safe_input($_GET['get_edit'], '');
    $get_id   = $core_db2->Execute("Select memb_guid from memb_info where memb___id=?", array(
        $get_edit
    ));
    if (!$get_id->EOF) {
        header('Location: index.php?get=edit_account&mod=edit&id=' . $get_id->fields[0] . '');
        
    }
}
if (isset($_GET['mod'])) {
    if (empty($_GET['id'])) {
        echo notice_message_admin('Unable to proceed your request.', '0', '1', '0');
    } else {
        $id   = safe_input($_GET['id'], '');
        $info = $core_db2->Execute("Select  memb_guid,memb___id,bloc_code,mail_addr,sno__numb,SecretQuestion,SecretAnswer,Country,Gender from memb_info where memb_guid=?", array(
            $id
        ));
        if ($info->EOF) {
            echo notice_message_admin('Unable to find account.', '0', '1', '0');
        } else {
            if (isset($_POST['edit'])) {
                if ($_POST['mode'] == 'x' || $_POST['question'] == 'x' || $_POST['country'] == 'x') {
                    echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
                } else {
                    if (!empty($_POST['password'])) {
                        $password = safe_input($_POST['password'], '');
                    }
                    $mode = safe_input($_POST['mode'], '');
                    $mail = safe_input($_POST['email'], '\_\@\.\-');
                    if (empty($_POST['pid'])) {
                        $pid = '111111111111';
                    } else {
                        $pid = safe_input($_POST['pid'], '');
                    }
                    $question = safe_input($_POST['question'], '');
                    $answer   = safe_input($_POST['answer'], '');
                    $country  = safe_input($_POST['country'], '');
                    $gender   = safe_input($_POST['gender'], '');
                    
                    
                    
                    if (isset($password)) {
                        if ($core['config']['md5'] == '1') {
                            $update = $core_db2->Execute("Update memb_info set memb__pwd=[dbo].[fn_md5](?,?),bloc_code=?,mail_addr=?,sno__numb=?,SecretQuestion=?,SecretAnswer=?,Country=?,Gender=? from memb_info where memb_guid=?", array(
                                $password,
                                $info->fields[1],
                                $mode,
                                $mail,
                                $pid,
                                $question,
                                $answer,
                                $country,
                                $gender,
                                $id
                            ));
                        } elseif ($core['config']['md5'] == '1') {
                            $update = $core_db2->Execute("Update memb_info set memb__pwd,bloc_code=?,mail_addr=?,sno__numb=?,SecretQuestion=?,SecretAnswer=?,Country=?,Gender=? from memb_info where memb_guid=?", array(
                                $password,
                                $mode,
                                $mail,
                                $pid,
                                $question,
                                $answer,
                                $country,
                                $gender,
                                $id
                            ));
                        }
                    } else {
                        $update = $core_db2->Execute("Update memb_info set bloc_code=?,mail_addr=?,sno__numb=?,SecretQuestion=?,SecretAnswer=?,Country=?,Gender=? from memb_info where memb_guid=?", array(
                            $mode,
                            $mail,
                            $pid,
                            $question,
                            $answer,
                            $country,
                            $gender,
                            $id
                        ));
                    }
                    if ($update) {
                        echo notice_message_admin('Account successfully edited', 1, 0, 'index.php?get=edit_account&mod=edit&id=' . $id . '');
                    } else {
                        echo notice_message_admin('Unable to edit account, system error.', '0', '1', '0');
                    }
                }
            } else {
                echo '

<div align="right" style="width: 90%; margin-bottom: 2px;"><a href="index.php?get=edit_account">[Return Search Account]</a></div>
<form action="" name="form_edit" method="post" id="form2">
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card" style="margin-bottom: 0px;">
					<div class="header">
						<h2 style="text-align: center;">
							Edit Account (User ID: ' . htmlspecialchars($info->fields[1]) . ')
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- input select -->
						<p class="lead" align="left">
                        	Mode
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Account mode.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	
									<div style="border-bottom: none;">
                                    	<select name="mode" style="border: none;font-size: 14px;float: right;width: 100%;">
                                        <option value="x">Choose mode</option>
    									<optgroup label="---------------">';
                						foreach ($account_mode as $mode_id => $mode_name) {
                    						if ($info->fields[2] == $mode_id) {
                        						echo '<option value="' . $mode_id . '" selected="selected">' . $mode_name . '</option>';
                    						} else {
                        						echo '<option value="' . $mode_id . '">' . $mode_name . '</option>';
                    						}
                    
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
                        	New Password
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Set new password for this Account. Leve it blank if you don\'t want to change password.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="password">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	Email Address
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Account email address.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="email" value="' . htmlspecialchars($info->fields[3]) . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	Personal ID
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Account\'s personal id.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="pid" value="' . htmlspecialchars($info->fields[4]) . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input select -->
						<p class="lead" align="left">
                        	Secret Question
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Account\'s secret question.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	
									<div style="border-bottom: none;">
                                    	<select name="question" style="border: none;font-size: 14px;float: right;width: 100%;">
                                        	<option value="x">Choose a Secret Question</option>
											<optgroup label="---------------">';
                							foreach ($secret_questions as $sq_id => $sq_name) {
                    							if ($info->fields[5] == $sq_id) {
                        							echo '<option value="' . $sq_id . '" selected="selected">' . $sq_name . '</option>';
                        
                    							} else {
                        							echo '<option value="' . $sq_id . '">' . $sq_name . '</option>';
                    							}
                    
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
                        	Secret Answer
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Secret answer of account\'s secret question.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="answer" value="' . htmlspecialchars($info->fields[6]) . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input select -->  
						<p class="lead" align="left">
                        	Country
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	User\'s country.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	
									<div style="border-bottom: none;">
                                    	<select name="country" style="border: none;font-size: 14px;float: right;width: 100%;">
                                        	<option value="x">Choose a Country</option>
    										<optgroup label="---------------">';
                							$c = getcountry('list');
                							foreach ($c as $cc => $v) {
                    							if ($cc == $info->fields[7]) {
                        							echo '<option value="' . $cc . '" selected="selected">' . $v . '</option>';
                    							} else {
                        							echo '<option value="' . $cc . '">' . $v . '</option>';
                    							}
                							}
											echo '
                                		</select>
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input select -->
						
						<!-- inpunt radio -->
						<p class="lead" align="left">
                        	Gender
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	User\'s gender.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">';
									switch ($info->fields[8]) {
                    					case '1':
                        				echo '
										<div class="demo-radio-button">
											<input type="radio" class="with-gap" id="radio_1" name="gender" value="1" checked="checked"/>
           									<label for="radio_1" style="min-width: 70px;">Male</label>	
											<input type="radio" class="with-gap" id="radio_2" name="gender" value="2"/>
            								<label for="radio_2" style="min-width: 70px;">Female</label>
    									</div>';
                        				break;
                    					case '2':
                        				echo '
										<div class="demo-radio-button">
											<input type="radio" class="with-gap" id="radio_1" name="gender" value="1"/>
           									<label for="radio_1" style="min-width: 70px;">Male</label>	
											<input type="radio" class="with-gap" id="radio_2" name="gender" value="2" checked="checked"/>
            								<label for="radio_2" style="min-width: 70px;">Female</label>
    									</div>';
                       				 	break;
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
                                        <button type="submit" form="form2" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 100px;margin-top: 5px;">Edit Account</button>
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
<input type="hidden" name="edit">
</form>';
                
                $char = $core_db2->Execute("Select mu_id,name from character where accountid=?", array(
                    $info->fields[1]
                ));
                echo '
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card" style="margin-bottom: 0px;">
					<div class="header">
						<h2 style="text-align: center;">
							' . htmlspecialchars($info->fields[1]) . '\'s Characters
						</h2>
					</div>
					<div class="body">
                        
                        <!-- input table -->
                        <!-- <div class="body table-responsive"> -->
                        <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Character</th>
                                        <th>Controls</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px;">';
								$count = 0;
                				while (!$char->EOF) {
                    				$count++;
                    				echo '
									<tr>
            						<th scope="row"><strong>' . htmlspecialchars($char->fields[1]) . '</strong></th>
            						<td><a href="index.php?get=edit_character&mod=edit&id=' . $char->fields[0] . '">[Edit]</a></td>
            						</tr>';
                    				$char->MoveNext();
                				}
                				if ($count == '0') {
                    				echo '
									<tr>
									<td align="center" class="panel_text_alt_list" colspan="3">No Characters Found</td>
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
    }
} else {
    echo '

<form action="" method="post" id="form1">
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2 style="text-align: center;">
							Search IP Using Account
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- input text -->
						<p class="lead" align="left">
                        	User ID
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enter User ID of account which you want to find ip.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">';
									if (isset($_SESSION['search_user'])) {
        								if (isset($_POST['user'])) {
            								echo '
											<input type="text" class="form-control" name="user" value="' . $_POST['user'] . '">';
        								} else {
            								echo '
											<input type="text" class="form-control" name="user" value="' . $_SESSION['search_user'] . '">';
        								}
        
    								} else {
        								echo '
										<input type="text" class="form-control" name="user">';
									}
                                    echo '
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						
						
						<!-- inpunt radio -->
						<p class="lead" align="left">
                        	Search Criteria
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Select search type.<br>
								<b>Exact Match</b> - Will search for exact match of use id you enter.<br>
								<b>Partial Match</b> - Will search for a partial match of user id you enter.<br>
								Note: If you choose \'Partial Match\' only first 100 matches will be displayed.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">';
									if (isset($_SESSION['search_t'])) {
        								if (isset($_POST['search_t'])) {
            								switch ($_POST['search_t']) {
                								case '0':
                    								echo '
										<div class="demo-radio-button">
											<input type="radio" class="with-gap" id="radio_1" name="search_t" value="1"/>
           									<label for="radio_1" style="min-width: 70px;">Exact Match</label>	
											<input type="radio" class="with-gap" id="radio_2" name="search_t" value="0" checked="checked"/>
            								<label for="radio_2" style="min-width: 70px;">Partial Match</label>
    									</div>';
                    							break;
                								case '1':
                    								echo '
										<div class="demo-radio-button">
											<input type="radio" class="with-gap" id="radio_1" name="search_t" value="1" checked="checked"/>
           									<label for="radio_1" style="min-width: 70px;">Exact Match</label>	
											<input type="radio" class="with-gap" id="radio_2" name="search_t" value="0"/>
            								<label for="radio_2" style="min-width: 70px;">Partial Match</label>
    									</div>';
                    							break;
            								}
        								} else {
            								switch ($_SESSION['search_t']) {
                								case '0':
                    								echo '
										<div class="demo-radio-button">
											<input type="radio" class="with-gap" id="radio_1" name="search_t" value="1"/>
           									<label for="radio_1" style="min-width: 70px;">Exact Match</label>	
											<input type="radio" class="with-gap" id="radio_2" name="search_t" value="0" checked="checked"/>
            								<label for="radio_2" style="min-width: 70px;">Partial Match</label>
    									</div>';
                    							break;
                								case '1':
                    								echo '
										<div class="demo-radio-button">
											<input type="radio" class="with-gap" id="radio_1" name="search_t" value="1" checked="checked"/>
           									<label for="radio_1" style="min-width: 70px;">Exact Match</label>	
											<input type="radio" class="with-gap" id="radio_2" name="search_t" value="0"/>
            								<label for="radio_2" style="min-width: 70px;">Partial Match</label>
    									</div>';
                    							break;
            								}
        								}
        
    								} else {
        								echo '
										<div class="demo-radio-button">
											<input type="radio" class="with-gap" id="radio_1" name="search_t" value="1" checked="checked"/>
           									<label for="radio_1" style="min-width: 70px;">Exact Match</label>	
											<input type="radio" class="with-gap" id="radio_2" name="search_t" value="0"/>
            								<label for="radio_2" style="min-width: 70px;">Partial Match</label>
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
        if (!empty($_POST['user'])) {
            $_SESSION['search_user'] = $_POST['user'];
            $_SESSION['search_t']    = $_POST['search_t'];
            $userid                  = safe_input($_POST['user'], '');
            
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
								if ($_POST['search_t'] == '1') {
                					$user = $core_db2->Execute("Select memb___id,ip,memb_guid from memb_stat where memb___id=?", array($userid));
                					if ($user->EOF) {
                    					$not_found = '1';
                					}
            					} elseif ($_POST['search_t'] == '0') {
                					$user = $core_db2->Execute("Select top 100 memb___id,ip,memb_guid from memb_stat where memb___id like ?", array('%' . $userid . '%'));
            					}
            					$count = 0;
            					while (!$user->EOF) {
                					$count++;
                					echo '
									<tr>
            <th scope="row"><strong>' . htmlspecialchars($user->fields[0]) . '</strong></th>
            <td>' . htmlspecialchars($user->fields[1]) . '</td>
            <td><a href="index.php?get=edit_account&mod=edit&id=' . $user->fields[2] . '">[Edit]</a></td>
            						</tr>';
                					$user->MoveNext();
            					}
            
            					if ($count == '0') {
                					echo '
									<tr><td align="center" class="panel_text_alt_list" colspan="5">No IP Found</td></tr>';
            					}
            
            					if ($not_found == '1') {
                					echo '
									<tr><td align="center" class="panel_text_alt_list" colspan="5">No IP Found</td></tr>';
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
}
?> 