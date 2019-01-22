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
if (isset($_GET['mod'])) {
    if (empty($_GET['id'])) {
        echo notice_message_admin('Unable to proceed your request.', '0', '1', '0');
    } else {
        $id   = safe_input($_GET['id'], '');
        $info = $core_db2->Execute("Select " . MU_COINS_USERID_COLUMN . "," . MU_COINS_COLUMN . " from " . MU_COINS_TABLE . " where " . MU_COINS_USERID_COLUMN . "=?", array(
            $id
        ));
        if ($info->EOF) {
            echo notice_message_admin('Unable to find account.', '0', '1', '0');
        } else {
            if (isset($_POST['edit'])) {
                if (empty($_POST['mucoins'])) {
                    $mucoins = '0';
                } else {
                    $mucoins = safe_input($_POST['mucoins'], '');
                }
                $update = $core_db2->Execute("Update " . MU_COINS_TABLE . " set " . MU_COINS_COLUMN . "=?  where " . MU_COINS_USERID_COLUMN . "=?", array(
                    $mucoins,
                    $id
                ));
                if ($update) {
                    echo notice_message_admin('Account\'s MU Coins successfully edited', 1, 0, 'index.php?get=mucoins_manager&mod=edit&id=' . $id . '');
                } else {
                    echo notice_message_admin('Unable to edit account\'s MU Coins, system error.', '0', '1', '0');
                }
                
            } else {
                echo '

<div align="right" style="width: 90%; margin-bottom: 2px;"><a href="index.php?get=mucoins_manager">[Return MU Coins Manager]</a></div>

     
<form action="" method="post" id="form2">
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card" style="margin-bottom: 0px;">
					<div class="header">
						<h2 style="text-align: center;">
							Edit MU Coins (User ID: ' . htmlspecialchars($info->fields[0]) . ')
						</h2>
					</div>
					<div class="body">
                    	
						<!-- input text -->
						<p class="lead" align="left">
                        	MU Coins
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Account\'s MU Coins
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="mucoins" value="' . $info->fields[1] . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100%;margin-bottom: 0px;">
                                        <button type="submit" form="form2" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 100px;margin-top: 5px;">Edit MU Coins</button>
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
</form>>';
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
				<div class="card">
					<div class="header">
						<h2 style="text-align: center;">
							Search Account\'s MU Coins
						</h2>
					</div>
					<div class="body">
                        
						<!-- input text -->
						<p class="lead" align="left">
                        	User ID
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enter User ID of account which you want to find.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">';
									if (isset($_SESSION['search_user'])) {
        								if (isset($_POST['user'])) {
            								echo '<input type="text" class="form-control" value="' . $_POST['user'] . '" name="user">';
        								} else {
            								echo '<input type="text" class="form-control" value="' . $_SESSION['search_user'] . '" name="user">';
        								}
        
    								} else {
       									 echo '<input type="text" class="form-control" name="user">';
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
                                        <th>MU COins</th>
                                        <th>Controls</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px;">';
			if ($_POST['search_t'] == '1') {
                $user = $core_db2->Execute("Select " . MU_COINS_USERID_COLUMN . " from " . MU_COINS_TABLE . " where " . MU_COINS_USERID_COLUMN . "=?", array(
                    $userid
                ));
                
                if (!$user->EOF) {
                    header('Location: index.php?get=mucoins_manager&mod=edit&id=' . $user->fields[0] . '');
                } else {
                    $not_found = '1';
                }
                
            } elseif ($_POST['search_t'] == '0') {
                $user  = $core_db2->Execute("Select top 100 " . MU_COINS_USERID_COLUMN . "," . MU_COINS_COLUMN . " from " . MU_COINS_TABLE . " where " . MU_COINS_USERID_COLUMN . " like ? order by " . MU_COINS_COLUMN . " desc", array(
                    '%' . $userid . '%'
                ));
                $count = 0;
                while (!$user->EOF) {
                    $count++;
                    echo '
			<tr>
            <th scope="row"><strong>' . htmlspecialchars($user->fields[0]) . '</strong></th>
            <td>' . number_format($user->fields[1]) . '</td>
            <td><a href="index.php?get=mucoins_manager&mod=edit&id=' . $user->fields[0] . '">[Edit]</a></td>
            </tr>';
                    $user->MoveNext();
                }
                if ($count == '0') {
                    echo '<tr><td align="center" class="panel_text_alt_list" colspan="5">No Accounts Found</td></tr>';
                }
                
                
            }
            
            if ($not_found == '1') {
                echo '<tr><td align="center" class="panel_text_alt_list" colspan="5">No Accounts Found</td></tr>';
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
    } else {
        echo '

<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card" style="margin-bottom: 0px;">
					<div class="header">
						<h2 style="text-align: center;">
							Top 50 MU Coins
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- input table -->
                        <!-- <div class="body table-responsive"> -->
                        <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>MU Coins</th>
                                        <th>Controls</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px;">';
								$user  = $core_db2->Execute("Select top 50 " . MU_COINS_USERID_COLUMN . "," . MU_COINS_COLUMN . " from " . MU_COINS_TABLE . " order by " . MU_COINS_COLUMN . " desc");
        $count = 0;
        while (!$user->EOF) {
            $count++;
            echo '<tr>
            <th scope="row"><strong>' . htmlspecialchars($user->fields[0]) . '</strong></th>
            <td>' . number_format($user->fields[1]) . '</td>
            <td><a href="index.php?get=mucoins_manager&mod=edit&id=' . $user->fields[0] . '">[Edit]</a></td>
            </tr>';
            $user->MoveNext();
        }
        if ($count == '0') {
            echo '<tr><td align="center" class="panel_text_alt_list" colspan="5">No Accounts Found</td></tr>';
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