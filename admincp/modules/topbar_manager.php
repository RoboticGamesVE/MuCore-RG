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
if (isset($_GET['m'])) {
    if ($_GET['m'] == 'add') {
        if (isset($_POST['add'])) {
            if (empty($_POST['title']) || empty($_POST['url']) || empty($_POST['type'])) {
                echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
            } else {
                $title    = safe_input($_POST['title'], '\ ');
                $url = $_POST['url'];
                $type  = $_POST['type'];
                
                $db = fopen("../template/".$core['config']['template']."/extras/config/games.tDB", "a+");
                fwrite($db, uniqid() . "|" . $title . "|" . $url . "|" . $type . "|\n");
                fclose($db);
                echo notice_message_admin('Game Link successfully added', 1, 0, 'index.php?get=topbar_manager');
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
							Add Game Link
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- input text -->
						<p class="lead" align="left">
                        	Title
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Title link
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="title">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	URL
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enter the URL of link
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="url">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input select -->
						<p class="lead" align="left">
                        	Type
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Select type link
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	
									<div style="border-bottom: none;">
                                    	<select name="type" style="border: none;font-size: 14px;float: right;width: 100%;">
												<option value="server" selected="selected">Server</option>
												<option value="mobile">Mobile</option>
												<option value="casual">Casual</option>
                                		</select>
                                    </div>
									
                                </div>
                            </div>
                        </div>
						<!-- #END# input select -->
                        
						<p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100%;margin-bottom: 0px;text-align: center;">
                                        <button type="submit" form="form2" class="btn btn-primary m-t-15 waves-effect">Add Game Link</button>
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
        }
        
    } elseif ($_GET['m'] == 'edit') {
        $p_id   = safe_input(xss_clean($_GET['id']), '_');
        $p_file = file("../template/".$core['config']['template']."/extras/config/games.tDB");
        foreach ($p_file as $check_id) {
            $check_id = explode("|", $check_id);
            if ($check_id[0] == $p_id) {
                $id  = $check_id[0];
                $title    = $check_id[1];
                $url = $check_id[2];
                $type  = $check_id[3];
                
                break;
            }
        }
        if (isset($_POST['edit'])) {
            if (empty($_POST['title']) || empty($_POST['url']) || empty($_POST['type'])) {
                echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
            } else {
                $title    = safe_input($_POST['title'], '\ ');
                $url = $_POST['url'];
                $type  = $_POST['type'];
                
                
                $old_db = file("../template/".$core['config']['template']."/extras/config/games.tDB");
                $new_db = fopen("../template/".$core['config']['template']."/extras/config/games.tDB", "w");
                foreach ($old_db as $old_db_line) {
                    $old_db_arr = explode("|", $old_db_line);
                    if ($p_id != $old_db_arr[0]) {
                        fwrite($new_db, "$old_db_line");
                    } else {
                        fwrite($new_db, $id . "|" . $title . "|" . $url . "|" . $type . "|\n");
                    }
                }
                fclose($new_db);
                echo notice_message_admin('Game Link successfully edited', 1, 0, 'index.php?get=topbar_manager');
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
							Edit Game Link
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- input text -->
						<p class="lead" align="left">
                        	Title
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Title link
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="title" value="' . $title . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	URL
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enter the URL of link
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="url" value="' . $url . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	Type
                    	</p>
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Select type link
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	
									<div style="border-bottom: none;">
                                    	<select name="type" style="border: none;font-size: 14px;float: right;width: 100%;">';
										switch (0) {
        									case '0':
           										echo '
												<option value="server" selected="selected">Server</option>
												<option value="mobile">Mobile</option>
												<option value="casual">Casual</option>';
            								break;
       		 								case '1':
            									echo '
												<option value="server">Server</option>
												<option value="mobile" selected="selected">Mobile</option>
												<option value="casual">Casual</option>';
            								break;
											case '2':
            									echo '
												<option value="server">Server</option>
												<option value="mobile">Mobile</option>
												<option value="casual" selected="selected">Casual</option>';
            								break;
										}
                                        echo '
                                		</select>
                                    </div>
									
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
                        
						<p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100%;margin-bottom: 0px;text-align: center;">
                                        <button type="submit" form="form2" class="btn btn-primary m-t-15 waves-effect">Edit Game Link</button>
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
    
} else {

        if (isset($_GET['delete'])) {
            if (empty($_GET['delete'])) {
                echo notice_message_admin('Unable to proceed your request.', '1', '1', 'index.php?get=topbar_manager');
            } else {
                $p_id = safe_input(xss_clean($_GET['delete']), '_');
                delete_variable("../template/".$core['config']['template']."/extras/config/games.tDB", '0', $p_id, '|');
                echo notice_message_admin('Game Link successfully deleted', 1, 0, 'index.php?get=topbar_manager');
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
							Game Links
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- input table -->
                        <!-- <div class="body table-responsive"> -->
                        <table class="table table-striped">
                                <thead>
                                    <tr>
										<th>Type</th>
                                        <th>Title</th>
                                        <th>URl</th>
										<th>Controls</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px;">';
								$gamef = file("../template/".$core['config']['template']."/extras/config/games.tDB");
            					foreach ($gamef as $game) {
                					$game_data = explode("|", $game);
                					echo '
    								<tr>
    									<th scope="row"><strong>' . set_limit($game_data[3], 30, '..') . '</strong></th>
    									<td>' . set_limit($game_data[1], 30, '..') . '</td>
    									<td>' . $game_data[2] . '</td>
    									<td>
											<a href="index.php?get=topbar_manager&m=edit&id=' . $game_data[0] . '">[Edit]</a> / <a href="index.php?get=topbar_manager&delete=' . $game_data[0] . '">[Delete]</a></td>
    								</tr>';
            					}
            					if ($count == '0') {
                					echo '
									<tr>
    									<td align="center" class="panel_text_alt_list" colspan="4"><em>No game Links Found</em></td>
    								</tr>';
            					}
								echo '
                                </tbody>
                            </table>
                            <!-- #END# input table -->
                            
						<p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100%;margin-bottom: 0px;">
									<form action="index.php?get=topbar_manager&m=add" method="post" id="form3" style="text-align: center;">
                                        <button type="submit" form="form3" class="btn btn-primary m-t-15 waves-effect">Add Game</button>
									</form>
                                	</div>
                             	</div>
                            </p>
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