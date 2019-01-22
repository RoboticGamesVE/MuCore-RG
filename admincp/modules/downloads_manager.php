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
    if ($_GET['mod'] == 'add_download') {
        if (isset($_POST['add_download'])) {
            if (empty($_POST['d_cat']) || empty($_POST['d_title']) || empty($_POST['d_url'])) {
                echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
            } else {
                $d_desc = str_replace("\r", "", $_POST['d_desc']);
                $d_desc = str_replace("\n", "", $d_desc);
                $d_desc = str_replace("\r\n", "", $d_desc);
                $d_desc = str_replace("¦", "", $d_desc);
                
                $db = fopen("../engine/variables_mods/downloads.tDB", "a+");
                fwrite($db, uniqid() . "¦" . $_POST['d_active'] . "¦" . $_POST['d_cat'] . "¦" . str_replace("¦", "", stripslashes($_POST['d_title'])) . "¦" . stripslashes($d_desc) . "¦" . $_POST['d_url'] . "¦\n");
                fclose($db);
                echo notice_message_admin('Download successfully added', 1, 0, 'index.php?get=downloads_manager');
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
							Add Download
						</h2>
					</div>
					<div class="body">
						
                        <!-- input select -->
						<p class="lead" align="left">
                        	Category
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Select cataegory.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	
									<div style="border-bottom: none;">
                                    	<select name="d_cat" style="border: none;font-size: 14px;float: right;width: 100%;">
                                        	<option value="0" selected="selected">Choose category</option>
        									<optgroup label="---------------">';
            								foreach ($downloads_cat as $cat_id => $cat) {
                								if ($_GET['cat'] == $cat_id) {
                    								echo '<option value="' . $cat_id . '" selected="selected">' . $cat . '</option>';
                								} else {
                    								echo '<option value="' . $cat_id . '">' . $cat . '</option>';
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
                        	Title
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Download Title that will appear on downloads.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="d_title">
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
                            	Download url.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="d_url">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- inpunt radio -->
						<p class="lead" align="left">
                        	Active
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	When set \'No\' this download will not be visibile.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
									
										<div class="demo-radio-button">
											<input type="radio" class="with-gap" id="radio_1" name="d_active" value="1" checked="checked"/>
           									<label for="radio_1" style="min-width: 70px;">Yes</label>	
											<input type="radio" class="with-gap" id="radio_2" name="d_active" value="0"/>
            								<label for="radio_2" style="min-width: 70px;">No</label>
    									</div>
									
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input radio -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	Description
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Download description that will appear on download.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<textarea rows="3" name="d_desc" style="width: 100%;"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
                        
						<p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100%;margin-bottom: 0px;">
                                        <button type="submit" form="form2" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 100px;margin-top: 5px;">Add Download</button>
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
<input type="hidden" name="add_download">
</form>';
        }
        
    } elseif ($_GET['mod'] == 'edit_download') {
        $p_id   = safe_input(xss_clean($_GET['id']), '_');
        $p_file = file('../engine/variables_mods/downloads.tDB');
        foreach ($p_file as $check_id) {
            $check_id = explode("¦", $check_id);
            if ($check_id[0] == $p_id) {
                $d_title  = $check_id[3];
                $d_desc   = $check_id[4];
                $d_url    = $check_id[5];
                $d_active = $check_id[1];
                $d_cat    = $check_id[2];
                $d_id     = $check_id[0];
                break;
            }
        }
        if (isset($_POST['edit_download'])) {
            if (empty($_POST['d_cat']) || empty($_POST['d_title']) || empty($_POST['d_url'])) {
                echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
            } else {
                $d_desc = str_replace("\r", "", $_POST['d_desc']);
                $d_desc = str_replace("\n", "", $d_desc);
                $d_desc = str_replace("\r\n", "", $d_desc);
                $d_desc = str_replace("¦", "", $d_desc);
                
                $old_db = file("../engine/variables_mods/downloads.tDB");
                $new_db = fopen("../engine/variables_mods/downloads.tDB", "w");
                foreach ($old_db as $old_db_line) {
                    $old_db_arr = explode("¦", $old_db_line);
                    if ($p_id != $old_db_arr[0]) {
                        fwrite($new_db, "$old_db_line");
                    } else {
                        fwrite($new_db, $d_id . "¦" . $_POST['d_active'] . "¦" . $_POST['d_cat'] . "¦" . str_replace("¦", "", stripslashes($_POST['d_title'])) . "¦" . stripslashes($d_desc) . "¦" . $_POST['d_url'] . "¦\n");
                    }
                }
                fclose($new_db);
                echo notice_message_admin('Download successfully edited', 1, 0, 'index.php?get=downloads_manager');
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
							Edit Download
						</h2>
					</div>
					<div class="body">
						
                        <!-- input select -->
						<p class="lead" align="left">
                        	Category
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Select cataegory.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	
									<div style="border-bottom: none;">
                                    	<select name="d_cat" style="border: none;font-size: 14px;float: right;width: 100%;">
                                        	<option value="0" selected="selected">Choose category</option>
        									<optgroup label="---------------">';
            								foreach ($downloads_cat as $cat_id => $cat) {
                								if ($d_cat == $cat_id) {
                    								echo '<option value="' . $cat_id . '" selected="selected">' . $cat . '</option>';
                								} else {
                    								echo '<option value="' . $cat_id . '">' . $cat . '</option>';
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
                        	Title
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Download Title that will appear on downloads.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="d_title" value="' . $d_title . '">
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
                            	Download url.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="d_url" value="' . $d_url . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- inpunt radio -->
						<p class="lead" align="left">
                        	Active
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	When set \'No\' this download will not be visibile.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">';
									switch ($d_active) {
                						case '0':
                    						echo '
										<div class="demo-radio-button">
											<input type="radio" class="with-gap" id="radio_1" name="d_active" value="1"/>
           									<label for="radio_1" style="min-width: 70px;">Yes</label>	
											<input type="radio" class="with-gap" id="radio_2" name="d_active" value="0" checked="checked"/>
            								<label for="radio_2" style="min-width: 70px;">No</label>
    									</div>';
                    					break;
                						
										case '1':
                    						echo '
										<div class="demo-radio-button">
											<input type="radio" class="with-gap" id="radio_1" name="d_active" value="1" checked="checked"/>
           									<label for="radio_1" style="min-width: 70px;">Yes</label>	
											<input type="radio" class="with-gap" id="radio_2" name="d_active" value="0"/>
            								<label for="radio_2" style="min-width: 70px;">No</label>
    									</div>';
                    					break;
            						}
									echo '
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input radio -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	Description
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Download description that will appear on download.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<textarea rows="3" name="d_desc" style="width: 100%;">' . $d_desc . '</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
                        
						<p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100%;margin-bottom: 0px;">
                                        <button type="submit" form="form2" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 100px;margin-top: 5px;">Edit Download</button>
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
<input type="hidden" name="edit_download">
</form>';
        }
        
    }
    
} else {
    if (isset($_GET['delete_download'])) {
        if (empty($_GET['delete_download'])) {
            echo notice_message_admin('Unable to proceed your request.', '1', '1', 'index.php?get=downloads_manager');
        } else {
            $p_id   = safe_input(xss_clean($_GET['delete_download']), '_');
            $p_file = file('../engine/variables_mods/downloads.tDB');
            foreach ($p_file as $check_id) {
                $check_id = explode("¦", $check_id);
                if ($check_id[0] == $p_id) {
                    $p_id_found = '1';
                    break;
                }
            }
            if ($p_id_found != '1') {
                echo notice_message_admin('Download with ID: <b>' . $p_id . '</b> does not exist.', '0', '1', '0');
            } else {
                delete_variable('../engine/variables_mods/downloads.tDB', '0', $p_id, '¦');
                echo notice_message_admin('Download successfully deleted', 1, 0, 'index.php?get=downloads_manager');
            }
        }
        
        
    } else {
        if (isset($_POST['module_active'])) {
            $save_status = new_config_xml('../engine/config_mods/downloads_settings', 'active', safe_input($_POST['module_active'], ''));
        }
        $get_config = simplexml_load_file('../engine/config_mods/downloads_settings.xml');
        echo '


<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2 style="text-align: center;">
							Downloads Settings
						</h2>
					</div>
					<div class="body">
					<form action="" method="post" id="form1">';
					 	if ($get_config->active == '1') {
        					echo '<p class="lead" align="left" style="background: #0C0;padding: 5px 0px 5px 5px">Downloads is active.
								<button type="submit" form="form1" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 20px;margin-top: 0;">Turn Downloads Off</button></p>
								<input type="hidden" name="module_active" value="0">';
    					} elseif ($get_config->active == '0') {
        					echo '<p class="lead" align="left" style="background: #C00;padding: 5px 0px 5px 5px">Downloads is inactive.
								<button type="submit" form="form1" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 20px;margin-top: 0;">Turn Downloads On</button></p>
								<input type="hidden" name="module_active" value="1">';
    					}
						echo '      
					</form>
					</div>
				</div>
			</div>
		</div>
	<!-- #END# Body Copy -->
	</div>
</section>';
        
        $downloads_file = file('../engine/variables_mods/downloads.tDB');
        $count          = 0;
		$i = 1;
        foreach ($downloads_cat as $download_id => $download_cat) {
			$i++;
            echo '

<form action="index.php?get=downloads_manager&mod=add_download&cat=' . $download_id . '" method="post" id="form'.$i.'">
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2 style="text-align: center;">
							Downloads (' . $download_cat . ')
						</h2>
					</div>
					<div class="body">
                        
                        <!-- input table -->
                        <!-- <div class="body table-responsive"> -->
                        <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Download URL</th>
                                        <th>Status</th>
										<th>Controls</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px;">';
			foreach ($downloads_file as $download) {
                $download = explode("¦", $download);
                if ($download[2] == $download_id) {
                    $count++;
                    $download[3] = strlen($download[3]) > 28 ? substr($download[3], 0, 28) . "..." : $download[3];
                    $download[5] = strlen($download[5]) > 78 ? substr($download[5], 0, 78) . "..." : $download[5];
                    echo '
                    <tr>
                    <th scope="row"><strong>' . $download[3] . '</strong></th>
                    <td>' . $download[5] . '</td>
            
                    <td><strong>';
                    switch ($download[1]) {
                        case '1':
                            echo 'Active';
                            break;
                        case '0':
                            echo 'Inactive';
                            break;
                    }
                    echo '</strong></td>
            <td><a href="index.php?get=downloads_manager&mod=edit_download&id=' . $download[0] . '">[Edit]</a> / <a href="javascript:;" onclick="ask_url(\'Are you sure you want to delete this download?\',\'index.php?get=downloads_manager&delete_download=' . $download[0] . '\')";>[Delete]</a></td></tr>
            ';
                    
                }
            }
								echo '
                                </tbody>
                            </table>
                            <!-- #END# input table -->
                            
                            <p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100%;margin-bottom: 0px;">
                                        <button type="submit" form="form'.$i.'" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 100px;margin-top: 5px;">Add Download</button>
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
}
?>