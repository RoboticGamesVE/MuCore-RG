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
    if ($_GET['m'] == 'edit') {
        $p_id   = safe_input(xss_clean($_GET['id']), '_');
        $p_file = file("../template/".$core['config']['template']."/extras/config/footerserver.tDB");
        foreach ($p_file as $check_id) {
            $check_id = explode("|", $check_id);
            if ($check_id[0] == $p_id) {
                $id     = $check_id[0];
				$cat    = $check_id[1];
                $title1 = $check_id[2];
                $url1   = $check_id[3];
                $title2 = $check_id[4];
				$url2   = $check_id[5];
                
                break;
            }
        }
        if (isset($_POST['edit'])) {
            if (empty($_POST['cat']) ||empty($_POST['title1']) || empty($_POST['url1']) ||empty($_POST['title2']) || empty($_POST['url2'])) {
                echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
            } else {
				$cat    = $_POST['cat'];
                $title1 = safe_input($_POST['title1'], '\ ');
                $url1   = $_POST['url1'];
				$title2 = safe_input($_POST['title2'], '\ ');
                $url2   = $_POST['url2'];
                
                
                $old_db = file("../template/".$core['config']['template']."/extras/config/footerserver.tDB");
                $new_db = fopen("../template/".$core['config']['template']."/extras/config/footerserver.tDB", "w");
                foreach ($old_db as $old_db_line) {
                    $old_db_arr = explode("|", $old_db_line);
                    if ($p_id != $old_db_arr[0]) {
                        fwrite($new_db, "$old_db_line");
                    } else {
                        fwrite($new_db, $id . "|" . $cat . "|" . $title1 . "|" . $url1 . "|". $title2 . "|" . $url2 . "|\n");
                    }
                }
                fclose($new_db);
                echo notice_message_admin('Link successfully edited', 1, 0, 'index.php?get=footerserver_manager');
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
							Edit Link
						</h2>
					</div>
					<div class="body">
					
						<!-- input text -->
						<p class="lead" align="left">
                        	Categoria
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Title categoria
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="cat" value="' . $cat . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
                    	
                        <!-- input text -->
						<p class="lead" align="left">
                        	Title 1
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Title link 1
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="title1" value="' . $title1 . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	URL 1
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enter the URL of link 1
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="url1" value="' . $url1 . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	Title 2
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Title link 2
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="title2" value="' . $title2 . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	URL 2
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enter the URL of link 2
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="url2" value="' . $url2 . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
                        
						<p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100%;margin-bottom: 0px;text-align: center;">
                                        <button type="submit" form="form2" class="btn btn-primary m-t-15 waves-effect">Edit Link</button>
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
                echo notice_message_admin('Unable to proceed your request.', '1', '1', 'index.php?get=footerserver_manager');
            } else {
                $p_id = safe_input(xss_clean($_GET['delete']), '_');
                delete_variable("../template/".$core['config']['template']."/extras/config/footerserver.tDB", '0', $p_id, '|');
                echo notice_message_admin('Link successfully deleted', 1, 0, 'index.php?get=footerserver_manager');
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
							Footer Links
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- input table -->
                        <!-- <div class="body table-responsive"> -->
                        <table class="table table-striped">
                                <thead>
                                    <tr>
										<th>Category</th>
                                        <th>Title 1</th>
                                        <th>Title 2</th>
										<th>Controls</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px;">';
								$footerf = file("../template/".$core['config']['template']."/extras/config/footerserver.tDB");
            					foreach ($footerf as $footer) {
                					$footer_data = explode("|", $footer);
                					echo '
    								<tr>
    									<th scope="row"><strong>' . set_limit($footer_data[1], 30, '..') . '</strong></th>
    									<td>' . set_limit($footer_data[2], 30, '..') . '</td>
    									<td>' . $footer_data[4] . '</td>
    									<td>
											<a href="index.php?get=footerserver_manager&m=edit&id=' . $footer_data[0] . '">[Edit]</a></td>
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