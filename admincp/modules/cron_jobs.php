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
    if ($_GET['mod'] == 'new') {
        if (isset($_POST['new'])) {
            if ($_POST['time'] == 'x' || empty($_POST['title']) || empty($_POST['cron_id'])) {
                echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
            } else {
                $title        = safe_input($_POST['title'], '\ ');
                $cron_id      = safe_input($_POST['cron_id'], '');
                $time         = safe_input($_POST['time'], '');
                $check_for_id = $core_db->Execute("Select id from MUCore_Cron_Jobs where cron_id=?", array(
                    $cron_id
                ));
                if (!$check_for_id->EOF) {
                    echo notice_message_admin('There is already ony cron job with this cron job id: <b>' . $cron_id . '</b>.', '0', '1', '0');
                } else {
                    $total_time  = $time * 3600;
                    $insert_cron = $core_db->Execute("Insert into MUCore_Cron_Jobs (name,cron_id,next_cron,cron_time_set) VALUES (?,?,?,?)", array(
                        $title,
                        $cron_id,
                        time() + $total_time,
                        $total_time
                    ));
                    if ($insert_cron) {
                        echo notice_message_admin('Cron Job successfully added', 1, 0, 'index.php?get=cron_jobs');
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
				<div class="card" style="margin-bottom: 0px;">
					<div class="header">
						<h2 style="text-align: center;">
							Add Cron Job
						</h2>
					</div>
					<div class="body">
                    	
						<!-- input text -->
						<p class="lead" align="left">
                        	Title
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enter cron job title.
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
						
                        <!-- input select -->
						<p class="lead" align="left">
                        	Run Time
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Select run time of cron job.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	
									<div style="border-bottom: none;">
                                    	<select name="time" style="border: none;font-size: 14px;float: right;width: 100%;">
                                        	<option value="x" selected="selected">Select run time</option>
        										<optgroup label="---------------------------">
        										<option value="1">1 Hour</option>';
            									$i = 1;
            									while ($i <= 167) {
                									$i++;
                									echo '<option value="' . $i . '">' . $i . ' Hours</option>';
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
                        	ID
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enter cron job ID. Use only letters and numbers.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="cron_id">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
                        
						<p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100%;margin-bottom: 0px;">
                                        <button type="submit" form="form1" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 100px;margin-top: 5px;">Add Cron Job</button>
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
    } elseif ($_GET['mod'] == 'edit') {
        $id        = safe_input($_GET['id'], '');
        $take_info = $core_db->Execute("Select name,next_cron,cron_id,cron_time_set from MUCore_Cron_Jobs where id=?", array(
            $id
        ));
        if (isset($_POST['edit'])) {
            if ($_POST['time'] == 'x' || empty($_POST['title']) || empty($_POST['cron_id'])) {
                echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
            } else {
                $title   = safe_input($_POST['title'], '\ ');
                $cron_id = safe_input($_POST['cron_id'], '');
                $time    = safe_input($_POST['time'], '');
                
                $total_time  = $time * 3600;
                $update_cron = $core_db->Execute("Update MUCore_Cron_Jobs set name=?,cron_time_set=?,cron_id=? where id=?", array(
                    $title,
                    $total_time,
                    $cron_id,
                    $id
                ));
                if ($update_cron) {
                    echo notice_message_admin('Cron Job successfully edited', 1, 0, 'index.php?get=cron_jobs');
                }
                
                
            }
            
        } else {
            if (!$take_info->EOF) {
                echo '
<form action="" method="post" id="form1">
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card" style="margin-bottom: 0px;">
					<div class="header">
						<h2 style="text-align: center;">
							Edit Cron Job
						</h2>
					</div>
					<div class="body">
                    	
						<!-- input text -->
						<p class="lead" align="left">
                        	Title
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enter cron job title.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="title" value="' . $take_info->fields[0] . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
                        <!-- input select -->
						<p class="lead" align="left">
                        	Run Time
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Select run time of cron job.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	
									<div style="border-bottom: none;">
                                    	<select name="time" style="border: none;font-size: 14px;float: right;width: 100%;">
                                        	<option value="x" selected="selected">Select run time</option>
        									<optgroup label="---------------------------">';
                							$i = 0;
                							$time_select = $take_info->fields[3] / 3600;
                							while ($i <= 168) {
                    							$i++;
                    							if ($i == $time_select) {
                        							echo '<option value="' . $i . '" selected="selected">' . $i . ' Hours</option>';
                    							} else {
                        						echo '<option value="' . $i . '">' . $i . ' Hours</option>';
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
                        	ID
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enter cron job ID. Use only letters and numbers.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="cron_id" value="' . $take_info->fields[2] . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
                        
						<p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100%;margin-bottom: 0px;">
                                        <button type="submit" form="form1" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 100px;margin-top: 5px;">Edit Cron Job</button>
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
    }
    
} else {
    if (isset($_GET['delete'])) {
        $id          = safe_input($_GET['delete'], '');
        $delete_cron = $core_db->Execute("Delete from MUCore_Cron_Jobs where id=?", array(
            $id
        ));
        if ($delete_cron) {
            echo notice_message_admin('Cron Job successfully deleted', 1, 0, 'index.php?get=cron_jobs');
        }
        
    } else {
        $cron = $core_db->Execute("Select id,name,cron_id,next_cron,cron_time_set from MUCore_Cron_Jobs order by next_cron asc");
        echo '
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
            <!-- Striped Rows -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 style="text-align: center;">
                                Cron Jobs
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Cron ID</th>
                                        <th>Time Set</th>
                                        <th>Next Run</th>
										<th>Controls</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px;">';
        							while (!$cron->EOF) {
            							echo '
											<tr>
												<th scope="row"><strong>' . htmlspecialchars($cron->fields[1]) . '</strong></th>
												<td><strong>' . htmlspecialchars($cron->fields[2]) . '</strong></td>
												<td><strong>' . ($cron->fields[4] / 3600) . ' Hours</strong></td>
												<td>' . decode_time(time(), $cron->fields[3], 'long', 'Running...') . '</td>
												<td><a href="index.php?get=cron_jobs&mod=edit&id=' . $cron->fields[0] . '">[Edit]</a> / <a href=\'index.php?get=cron_jobs&delete=' . $cron->fields[0] . '\';">[Delete]</a></td>
											</tr>';
            						$cron->MoveNext();
        							}
        							if ($count == '0') {
            							echo '<tr><td align="center" colspan="5">No Cron Jobs Found</td></tr>';
        							}
								echo '
								</tbody>
                            </table>
                            <p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="margin-bottom: 0px;width: 100%;">
                                    	<button type="button" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-top: 0;" 
onclick="location.href=\'index.php?get=cron_jobs&mod=new\';">Add New Cron Job</button>
                                	</div>
                             	</div>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Striped Rows -->
	</div>
</section>';
    }
}
?>