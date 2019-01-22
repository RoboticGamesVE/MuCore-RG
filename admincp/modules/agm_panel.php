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
if(isset($_GET['mod'])){
    if($_GET['mod'] == 'new'){
        if(isset($_POST['new'])){
            if(empty($_POST['agm_id']) || empty($_POST['agm_pwd']) || empty($_POST['agm_nick'])){
                echo notice_message_admin('Error some fields where left blank.','0','1','0');
            }else{
                if($_POST['ban_manager'] == '1'){
                    $ban_manager = '1';
                }else{
                    $ban_manager = '0';
                }
                
                if($_POST['credits_manager'] == '1'){
                    $credits_manager = '1';
                }else{
                    $credits_manager = '0';
                }
                
                $db = fopen("../engine/agm.users/agmcp.users", "a+");
                fwrite($db,uniqid()."¦".str_replace("¦","",stripslashes($_POST['agm_id']))."¦".str_replace("¦","",stripslashes(md5($_POST['agm_pwd'])))."¦".str_replace("¦","",stripslashes($_POST['agm_nick']))."¦".$ban_manager."¦".$credits_manager."¦".$_POST['coins']."¦".$_POST['coins_day']."¦".(time()+($_POST['coins_day']*86400))."¦".$_POST['coins']."¦".$_POST['agm_ip']."¦\r\n");
                fclose($db);
                echo notice_message_admin('AGM Access successfully added',1,0,'index.php?get=agm_panel');    
                
            }
            
        }else{
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
							Add AGM Access
						</h2>
					</div>
					<div class="body">
                        
						<!-- input text -->
						<p class="lead" align="left">
                        	Access ID
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enter AGM ID, with this GM will be able to log in. Use only letters and numbers.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="agm_id">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
                        <!-- input text -->
						<p class="lead" align="left">
                        	Access Password
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enter AGM  Access Password, with this GM will be able to log in. Use only letters and numbers.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="agm_pwd">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
                        
                        <!-- input text -->
						<p class="lead" align="left">
                        	Restrict IP Address
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	If ip address present, GM can login only from that ip address. Leave it blank if you dont want ip restriction.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="agm_ip">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	Nickname
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enter AGM Nickname.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="agm_nick">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input checkbox -->
                        <p class="lead" align="left">
                        	AGame Masters Options
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Select modules permissions for GM.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="demo-checkbox">
                                <input type="checkbox" id="basic_checkbox_1" class="filled-in" name="ban_manager" value="1" checked="checked">
                                <label for="basic_checkbox_1">Ban Manager</label>
								
								<input type="checkbox" id="basic_checkbox_2" class="filled-in" name="credits_manager" value="1" checked="checked">
                                <label for="basic_checkbox_2">MU Coins Manager</label>
                            	</div>
                            </div>
                        </div>
                        <!-- #END# input checkbox -->
                        
					</div>
				</div>
			</div>
		</div>
	<!-- #END# Body Copy -->
	</div>
</section>

<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card" style="margin-bottom: 0px;">
					<div class="header">
						<h2 style="text-align: center;">
							MU Coins Manager Options
						</h2>
					</div>
					<div class="body">

						<!-- input text -->
						<p class="lead" align="left">
                        	MU Coins Amount and Spent Time
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enter the amount of mucoins/credits a gm can issue in days.<br><br>E.g. 600 coins in one day : means he is only allowed to issue a total of 600 coins/credits in 1 day.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
									MU Coins : <input type="text" class="form-control" name="coins" value="0">
									Days : <input type="text" class="form-control" name="coins_day" value="1">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
                        
						<p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100%;margin-bottom: 0px;">
                                        <button type="submit" form="form1" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 100px;margin-top: 5px;">Add AGM Access</button>
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
<input type="hidden" name="new">
</form>';
        }
    }elseif ($_GET['mod'] == 'edit'){
        $p_id = safe_input(xss_clean($_GET['id']),'_');
        $p_file = file('../engine/agm.users/agmcp.users');
            foreach ($p_file as $check_id){
                $check_id = explode("¦",$check_id);
                if($check_id[0] == $p_id){
                    $p_id_found = '1';
                    $agm_id = $check_id[0];
                    $agm_id_access = $check_id[1];
                    $agm_pwd = $check_id[2];
                    $agm_nick = $check_id[3];
                    $agm_ban_manager = $check_id[4];
                    $agm_credits_manager = $check_id[5];
                    $agm_coins = $check_id[6];
                    $agm_coins_day = $check_id[7];
                    $agm_coins_days_left = $check_id[8];
                    $agm_coins_preset = $check_id[9];
                    $agm_ip = $check_id[10];
                    break;
                }
            }
        if(isset($_POST['edit'])){
            if(empty($_POST['agm_id']) || empty($_POST['agm_nick'])){
                echo notice_message_admin('Error some fields where left blank.','0','1','0');
            }else {
                if(empty($_POST['agm_pwd'])){
                    $agm_pass = $agm_pwd;
                }else{
                    $agm_pass = md5($_POST['agm_pwd']);
                }

                if($_POST['ban_manager'] == '1'){
                    $ban_manager = '1';
                }else{
                    $ban_manager = '0';
                }
                
                if($_POST['credits_manager'] == '1'){
                    $credits_manager = '1';
                }else{
                    $credits_manager = '0';
                }
                
                $old_db = file("../engine/agm.users/agmcp.users");
                $new_db = fopen("../engine/agm.users/agmcp.users", "w");
                foreach($old_db as $old_db_line){
                    $old_db_arr = explode("¦", $old_db_line);
                    if($p_id != $old_db_arr[0]){
                        fwrite($new_db,"$old_db_line");
                    }else{
                        fwrite($new_db,$agm_id."¦".str_replace("¦","",stripslashes($_POST['agm_id']))."¦".str_replace("¦","",stripslashes($agm_pass))."¦".str_replace("¦","",stripslashes($_POST['agm_nick']))."¦".$ban_manager."¦".$credits_manager."¦".$agm_coins_preset."¦".$_POST['coins_day']."¦".$agm_coins_days_left."¦".$_POST['coins']."¦".$_POST['agm_ip']."¦\r\n");
                    }
                }
                fclose($new_db);
                echo notice_message_admin('AGM Acces successfully edited',1,0,'index.php?get=agm_panel');
                
            }
            
        }else{
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
							Edit AGM Access
						</h2>
					</div>
					<div class="body">
                        
						<!-- input text -->
						<p class="lead" align="left">
                        	Access ID
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enter GM ID, with this GM will be able to log in. Use only letters and numbers.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="agm_id" value="' . $agm_id_access . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
                        <!-- input text -->
						<p class="lead" align="left">
                        	Access Password
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enter GM  Access Password, with this GM will be able to log in. Use only letters and numbers.<br>
								<b>Note: Leave it blank if you don\'t want to change it.</b>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="agm_pwd">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
                        
                        <!-- input text -->
						<p class="lead" align="left">
                        	Restrict IP Address
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	If ip address present, GM can login only from that ip address. Leave it blank if you dont want ip restriction.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="agm_ip" value="' . $agm_ip . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	Nickname
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enter AGM Nickname.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="agm_nick" value="' . $agm_nick . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input checkbox -->
                        <p class="lead" align="left">
                        	AGame Masters Options
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Select modules permissions for AGM.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="demo-checkbox">
                                <input type="checkbox" id="basic_checkbox_1" class="filled-in" name="ban_manager" value="1" checked="checked">
                                <label for="basic_checkbox_1">Ban Manager</label>
								
								<input type="checkbox" id="basic_checkbox_2" class="filled-in" name="credits_manager" value="1" checked="checked">
                                <label for="basic_checkbox_2">MU Coins Manager</label>
                            	</div>
                            </div>
                        </div>
                        <!-- #END# input checkbox -->
                        
					</div>
				</div>
			</div>
		</div>
	<!-- #END# Body Copy -->
	</div>
</section>

<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card" style="margin-bottom: 0px;">
					<div class="header">
						<h2 style="text-align: center;">
							MU Coins Manager Options
						</h2>
					</div>
					<div class="body">

						<!-- input text -->
						<p class="lead" align="left">
                        	MU Coins Amount and Spent Time
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enter the amount of mucoins/credits a gm can issue in days.<br><br>E.g. 600 coins in one day : means he is only allowed to issue a total of 600 coins/credits in 1 day.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
									MU Coins : <input type="text" class="form-control" name="coins" value="' . $agm_coins_preset . '">
									Days : <input type="text" class="form-control" name="coins_day" value="' . $agm_coins_day . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
                        
						<p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100%;margin-bottom: 0px;">
                                        <button type="submit" form="form1" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 100px;margin-top: 5px;">Edit AGM Access</button>
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
            
        }
    }
    
}else{
    if(isset($_GET['delete'])){
        $p_id = safe_input(xss_clean($_GET['delete']),'_');
        delete_variable('../engine/agm.users/agmcp.users','0',$p_id,'¦');
        echo notice_message_admin('AGM Access successfully deleted',1,0,'index.php?get=agm_panel');
        
    }else{
        echo '
<form action="index.php?get=agm_panel&mod=new" method="post" id="form1">
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card" style="margin-bottom: 0px;">
					<div class="header">
						<h2 style="text-align: center;">
							AGM Control Panel Access List
						</h2>
					</div>
                        
                        <!-- input table -->
                        <div class="body table-responsive">
                        <table class="table table-striped">
                                <thead>
									<tr>
                                        <th>GM ID</th>
                                        <th>Nickname</th>
                                        <th>Ban Manager Access</th>
										<th>MU Coins Manager Access</th>
										<th>Controls</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px;">';
								$agm_file = array_reverse(file('../engine/agm.users/agmcp.users'));
        						$count=0;
        						foreach ($agm_file as $agm){
            						$agm = explode("¦",$agm);
            						$count++;
            
            						switch ($agm[4]){
                						case '1': $ban_manager = '<b>Yes</b>'; break;
                						case '0': $ban_manager = '<em>No</em>'; break;
            						}
        
            						switch ($agm[5]){
                						case '1': $credits_manager = '<b>Yes</b>'; break;
                						case '0': $credits_manager = '<em>No</em>'; break;
            						}
            
            						echo '
									<tr>
            						<th scope="row"><b>'.$agm[1].'</b></th>
            						<td><b>'.$agm[3].'</b></td>
            						<td>'.$ban_manager.'</td>
            						<td>'.$credits_manager.'</td>
            						<td><a href="index.php?get=agm_panel&mod=edit&id='.$agm[0].'">[Edit]</a> / <a href="index.php?get=agm_panel&delete='.$agm[0].'\";>[Delete]</a></td>
            						</tr>';
								}
								echo'
                                </tbody>
                            </table>';
							if ($count == '0') {
            						echo '<div style="text-align:center;background-color:#f9f9f9;padding: 5px;">
									<em>No agm access</em>
									</div>';
        					}
							echo '	
                            <!-- #END# input table -->
                        
						<p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100%;margin-bottom: 0px">
                                        <button type="submit" form="form1" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-top: 5px;">Add New AGM Access</button>
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
</form>';        
    }
}
?>