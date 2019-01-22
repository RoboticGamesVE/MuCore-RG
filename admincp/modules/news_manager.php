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
$author = $core['config']['admin_nick'];
if (isset($_GET['mod'])) {
    if ($_GET['mod'] == 'add_news') {
        if (isset($_POST['add_news'])) {
            if (empty($_POST['n_title']) || empty($_POST['n_new']) || empty($_POST['n_content'])) {
                echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
            } else {
                $news_content = str_replace("\r", "", $_POST['n_content']);
                $news_content = str_replace("\n", "", $news_content);
                $news_content = str_replace("\r\n", "", $news_content);
                $news_content = str_replace("¦", "", $news_content);
                if (substr($news_content, 0, 3) == '<p>') {
                    $news_content = substr_replace($news_content, "", 0, 3);
                }
                
                
                $db = fopen("../engine/variables_mods/news.tDB", "a+");
                fwrite($db, uniqid() . "¦News¦" . str_replace("¦", "", stripslashes($_POST['n_title'])) . "¦" . stripslashes($news_content) . "¦" . time() . "¦" . $author . "¦" . (time() + ($_POST['n_new'] * 86400)) . "¦" . $_POST['n_active'] . "¦" . $_POST['n_archive'] . "¦" . $_POST['short_title'] . "¦\n");
                fclose($db);
                echo notice_message_admin('News successfully added', 1, 0, 'index.php?get=news_manager');
                
            }
            
        } else {
            echo '<!-- tinyMCE -->
    <script language="javascript" type="text/javascript" src="script/tiny_mce/tiny_mce.js"></script>
    <script language="javascript" type="text/javascript">
        // Notice: The simple theme does not use all options some of them are limited to the advanced theme
        tinyMCE.init({
            mode : "textareas",
            theme : "advanced",
            theme_advanced_buttons2_add : "forecolor",
               theme_advanced_buttons1_add : "fontselect,fontsizeselect"
        });
    </script>
    
	
<form action="" method="post" id="form2" name="news">
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card" style="margin-bottom: 0px;">
					<div class="header">
						<h2 style="text-align: center;">
							Add News
						</h2>
					</div>
					<div class="body">
                    	
						<!-- input text -->
						<p class="lead" align="left">
                        	Title
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	News Title that will appear on news.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="n_title">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	Short Title
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	News Title that will appear on news, a single word.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="short_title">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input select -->
						<p class="lead" align="left">
                        	New Notice
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Set the number of days this news will show New Icon.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	
									<div style="border-bottom: none;">
                                    	<select name="n_new" style="border: none;font-size: 14px;float: right;width: 100%;">
                                        	<option value="0" selected="selected">Choose days</option>
        									<optgroup label="---------------">
        									<option value="1">1 day</option>';
            								$i = 1;
            								while ($i <= 30) {
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
						
						<!-- inpunt radio -->
						<p class="lead" align="left">
                        	News Archive
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	When set \'Yes\' this news will moved to news archive.<br>
								Note: archived news are not displayed on news.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
									
									<div class="demo-radio-button">
										<input type="radio" class="with-gap" id="radio_1" name="n_archive" value="0"/>
           								<label for="radio_1" style="min-width: 70px;">Yes</label>	
										<input type="radio" class="with-gap" id="radio_2" name="n_archive" value="1" checked="checked"/>
            							<label for="radio_2" style="min-width: 70px;">No</label>
    								</div>
										
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input radio -->
						
						<!-- inpunt radio -->
						<p class="lead" align="left">
                        	Active
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	When set \'No\' this news will not be visibile.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
									
									<div class="demo-radio-button">
										<input type="radio" class="with-gap" id="radio_3" name="n_active" value="1" checked="checked"/>
           								<label for="radio_3" style="min-width: 70px;">Yes</label>	
										<input type="radio" class="with-gap" id="radio_4" name="n_active" value="0"/>
            							<label for="radio_4" style="min-width: 70px;">No</label>
    								</div>
										
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input radio -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	News Content
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 100%;text-align: left;">
                            	<textarea id="n_content" name="n_content" rows="24" style="width: 100%;"></textarea>
                            </div>
                        </div>
						<!-- #END# input text -->
						                        
						<p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100%;margin-bottom: 0px;">
                                        <button type="submit" form="form2" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 100px;margin-top: 5px;">Add News</button>
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
<input type="hidden" name="m_type" value="0">
<input type="hidden" name="add_news">
</form>';
        }
        
    } elseif ($_GET['mod'] == 'edit_news') {
        $p_id   = safe_input(xss_clean($_GET['id']), '_');
        $p_file = file('../engine/variables_mods/news.tDB');
        foreach ($p_file as $check_id) {
            $check_id = explode("¦", $check_id);
            if ($check_id[0] == $p_id) {
                $p_id_found = '1';
                $n_id       = $check_id[0];
                $n_title    = $check_id[2];
                $n_content  = $check_id[3];
                $n_date     = $check_id[4];
                $n_author   = $check_id[5];
                $n_new      = $check_id[6];
                $n_active   = $check_id[7];
                $n_archive  = $check_id[8];
				$short_title = $check_id[9];
                break;
            }
        }
        if (isset($_POST['edit_news'])) {
            if (empty($_POST['n_title']) || empty($_POST['n_content'])) {
                echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
            } else {
                $news_content = str_replace("\r", "", $_POST['n_content']);
                $news_content = str_replace("\n", "", $news_content);
                $news_content = str_replace("\r\n", "", $news_content);
                $news_content = str_replace("¦", "", $news_content);
                if (substr($news_content, 0, 3) == '<p>') {
                    $news_content = substr_replace($news_content, "", 0, 3);
                }
                
                
                $old_db = file("../engine/variables_mods/news.tDB");
                $new_db = fopen("../engine/variables_mods/news.tDB", "w");
                foreach ($old_db as $old_db_line) {
                    $old_db_arr = explode("¦", $old_db_line);
                    if ($p_id != $old_db_arr[0]) {
                        fwrite($new_db, "$old_db_line");
                    } else {
                        fwrite($new_db, $n_id . "¦News¦" . str_replace("¦", "", stripslashes($_POST['n_title'])) . "¦" . $news_content . "¦" . $n_date . "¦" . $n_author . "¦" . $n_new . "¦" . $_POST['n_active'] . "¦" . $_POST['n_archive'] . "¦" . $_POST['short_title'] . "¦\n");
                    }
                }
                fclose($new_db);
                
                #delete_variable('../engine/variables_mods/news.tDB','0',$p_id,'¦');
                echo notice_message_admin('News successfully edited', 1, 0, 'index.php?get=news_manager');
                
            }
        } else {
            echo '<!-- tinyMCE -->
    <script language="javascript" type="text/javascript" src="script/tiny_mce/tiny_mce.js"></script>
    <script language="javascript" type="text/javascript">
        // Notice: The simple theme does not use all options some of them are limited to the advanced theme
        tinyMCE.init({
            mode : "textareas",
            theme : "advanced",
            theme_advanced_buttons2_add : "forecolor",
               theme_advanced_buttons1_add : "fontselect,fontsizeselect"
        });
    </script>

    

<form action="" method="post" id="form2" name="news">
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card" style="margin-bottom: 0px;">
					<div class="header">
						<h2 style="text-align: center;">
							Edit News
						</h2>
					</div>
					<div class="body">
                    	
						<!-- input text -->
						<p class="lead" align="left">
                        	Title
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Edit Title that will appear on news.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="n_title" value="' . htmlspecialchars($n_title) . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	Short Title
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Edit News Title that will appear on news, a single word.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="short_title" value="' . htmlspecialchars($short_title) . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- inpunt radio -->
						<p class="lead" align="left">
                        	News Archive
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	When set \'Yes\' this news will moved to news archive.<br>
								Note: archived news are not displayed on news.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">';
									switch ($n_archive) {
                						case '0':
                    						echo '
									<div class="demo-radio-button">
										<input type="radio" class="with-gap" id="radio_1" name="n_archive" value="0" checked="checked"/>
           								<label for="radio_1" style="min-width: 70px;">Yes</label>	
										<input type="radio" class="with-gap" id="radio_2" name="n_archive" value="1"/>
            							<label for="radio_2" style="min-width: 70px;">No</label>
    								</div>';
                    					break;
                						
										case '1':
                    						echo '
									<div class="demo-radio-button">
										<input type="radio" class="with-gap" id="radio_1" name="n_archive" value="0"/>
           								<label for="radio_1" style="min-width: 70px;">Yes</label>	
										<input type="radio" class="with-gap" id="radio_2" name="n_archive" value="1" checked="checked"/>
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
						
						<!-- inpunt radio -->
						<p class="lead" align="left">
                        	Active
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	When set \'No\' this news will not be visibile.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">';
									switch ($n_active) {
                						case '0':
                    						echo '
									<div class="demo-radio-button">
										<input type="radio" class="with-gap" id="radio_3" name="n_active" value="1"/>
           								<label for="radio_3" style="min-width: 70px;">Yes</label>	
										<input type="radio" class="with-gap" id="radio_4" name="n_active" value="0" checked="checked"/>
            							<label for="radio_4" style="min-width: 70px;">No</label>
    								</div>';
                    					break;
                						
										case '1':
                    						echo '
									<div class="demo-radio-button">
										<input type="radio" class="with-gap" id="radio_3" name="n_active" value="1" checked="checked"/>
           								<label for="radio_3" style="min-width: 70px;">Yes</label>	
										<input type="radio" class="with-gap" id="radio_4" name="n_active" value="0"/>
            							<label for="radio_4" style="min-width: 70px;">No</label>
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
                        	News Content
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 100%;text-align: left;">
                            	<textarea id="n_content" name="n_content" rows="24" style="width: 100%;">' . $n_content . '</textarea>
                            </div>
                        </div>
						<!-- #END# input text -->
						                        
						<p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100%;margin-bottom: 0px;">
                                        <button type="submit" form="form2" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 100px;margin-top: 5px;">Edit News</button>
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
<input type="hidden" name="edit_news">
</form>';
        }
        
    }
    
} else {
    if (isset($_POST['masive_delete'])) {
        if (empty($_POST['news_code_delete'])) {
            echo notice_message_admin('No news selected.', 0, 1, 0);
        } else {
            $count = 0;
            foreach ($_POST['news_code_delete'] as $post_name => $post_code) {
                $count++;
                delete_variable('../engine/variables_mods/news.tDB', '0', $post_code, '¦');
                
            }
            echo notice_message_admin('<b>' . $count . '</b> news successfully deleted.', 1, 0, 'index.php?get=news_manager');
        }
    } elseif (isset($_GET['delete_news'])) {
        if (empty($_GET['delete_news'])) {
            echo notice_message_admin('Unable to proceed your request.', '1', '1', 'index.php?get=news_manager');
        } else {
            $p_id   = safe_input(xss_clean($_GET['delete_news']), '_');
            $p_file = file('../engine/variables_mods/news.tDB');
            foreach ($p_file as $check_id) {
                $check_id = explode("¦", $check_id);
                if ($check_id[0] == $p_id) {
                    $p_id_found = '1';
                    break;
                }
            }
            if ($p_id_found != '1') {
                echo notice_message_admin('News with ID: <b>' . $p_id . '</b> does not exist.', '0', '1', '0');
            } else {
                delete_variable('../engine/variables_mods/news.tDB', '0', $p_id, '¦');
                echo notice_message_admin('News successfully deleted', 1, 0, 'index.php?get=news_manager');
            }
        }
        
    } elseif (isset($_GET['move_listed'])) {
        if (empty($_GET['move_listed'])) {
            echo notice_message_admin('Unable to proceed your request.', '1', '1', 'index.php?get=news_manager');
        } else {
            $p_id   = safe_input(xss_clean($_GET['move_listed']), '_');
            $p_file = file('../engine/variables_mods/news.tDB');
            foreach ($p_file as $check_id) {
                $check_id = explode("¦", $check_id);
                if ($check_id[0] == $p_id) {
                    $p_id_found = '1';
                    $n_id       = $check_id[0];
                    $n_title    = $check_id[2];
                    $n_content  = $check_id[3];
                    $n_date     = $check_id[4];
                    $n_author   = $check_id[5];
                    $n_new      = $check_id[6];
                    $n_active   = $check_id[7];
					$short_title = $check_id[9];
                    break;
                }
            }
            if ($p_id_found != '1') {
                echo notice_message_admin('News with ID: <b>' . $p_id . '</b> does not exist.', '0', '1', '0');
            } else {
                $old_db = file("../engine/variables_mods/news.tDB");
                $new_db = fopen("../engine/variables_mods/news.tDB", "w");
                foreach ($old_db as $old_db_line) {
                    $old_db_arr = explode("¦", $old_db_line);
                    if ($p_id != $old_db_arr[0]) {
                        fwrite($new_db, "$old_db_line");
                    } else {
                        fwrite($new_db, $n_id . "¦News¦" . $n_title . "¦" . $n_content . "¦" . $n_date . "¦" . $n_author . "¦" . $n_new . "¦" . $n_active . "¦1¦" . $short_title . "¦\n");
                    }
                }
                fclose($new_db);
                #delete_variable('../engine/variables_mods/news.tDB','0',$p_id,'¦');
                echo notice_message_admin('News successfully moved to Listed News', 1, 0, 'index.php?get=news_manager');
            }
        }
        
    } elseif (isset($_GET['move_archive'])) {
        if (empty($_GET['move_archive'])) {
            echo notice_message_admin('Unable to proceed your request.', '1', '1', 'index.php?get=news_manager');
        } else {
            $p_id   = safe_input(xss_clean($_GET['move_archive']), '_');
            $p_file = file('../engine/variables_mods/news.tDB');
            foreach ($p_file as $check_id) {
                $check_id = explode("¦", $check_id);
                if ($check_id[0] == $p_id) {
                    $p_id_found = '1';
                    $n_id       = $check_id[0];
                    $n_title    = $check_id[2];
                    $n_content  = $check_id[3];
                    $n_date     = $check_id[4];
                    $n_author   = $check_id[5];
                    $n_new      = $check_id[6];
                    $n_active   = $check_id[7];
					$short_title = $check_id[9];
                    break;
                }
            }
            if ($p_id_found != '1') {
                echo notice_message_admin('News with ID: <b>' . $p_id . '</b> does not exist.', '0', '1', '0');
            } else {
                $old_db = file("../engine/variables_mods/news.tDB");
                $new_db = fopen("../engine/variables_mods/news.tDB", "w");
                foreach ($old_db as $old_db_line) {
                    $old_db_arr = explode("¦", $old_db_line);
                    if ($p_id != $old_db_arr[0]) {
                        fwrite($new_db, "$old_db_line");
                    } else {
                        fwrite($new_db, $n_id . "¦News¦" . $n_title . "¦" . $n_content . "¦" . $n_date . "¦" . $n_author . "¦" . $n_new . "¦" . $n_active . "¦0¦" . $short_title . "¦\n");
                    }
                }
                fclose($new_db);
                #delete_variable('../engine/variables_mods/news.tDB','0',$p_id,'¦');
                echo notice_message_admin('News successfully moved to Archived News', 1, 0, 'index.php?get=news_manager');
            }
        }
    } else {
        if (isset($_POST['module_active'])) {
            $save_status = new_config_xml('../engine/config_mods/news_settings', 'active', safe_input($_POST['module_active'], ''));
        }
        $get_config = simplexml_load_file('../engine/config_mods/news_settings.xml');
        echo '


<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2 style="text-align: center;">
							News Settings
						</h2>
					</div>
					<div class="body">
					<form action="" method="post" id="form1" name="settings">';
		
					 	if ($get_config->active == '1') {
        					echo '<p class="lead" align="left" style="background: #0C0;padding: 5px 0px 5px 5px">News is active.
								<button type="submit" form="form1" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 20px;margin-top: 0;">Turn News Off</button></p>
								<input type="hidden" name="module_active" value="0">';
    					} elseif ($get_config->active == '0') {
        					echo '<p class="lead" align="left" style="background: #C00;padding: 5px 0px 5px 5px">News is inactive.
								<button type="submit" form="form1" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 20px;margin-top: 0;">Turn News On</button></p>
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
        
        echo '


<form action="index.php?get=news_manager&mod=add_news" method="post" id="form2">
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2 style="text-align: center;">
							Listed News
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- input table -->
                        <!-- <div class="body table-responsive"> -->
                        <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Title</th>
										<th>Short Title</th>
                                        <th>Date</th>
                                        <th>Status</th>
										<th>Controls</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px;">';
		$news_file = file('../engine/variables_mods/news.tDB');
        $count = 0;
        foreach ($news_file as $news) {
            $news = explode("¦", $news);
            if ($news[8] == '1') {
                $count++;
                $news[2]  = strlen($news[2]) > 78 ? substr($news[2], 0, 78) . "..." : $news[2];
                echo '
            <tr>
            <th scope="row"><strong>' . $news[2] . '</strong></th>
			<td>' . $news[9] . '</td>
            <td>' . date('F j, Y / H:i', $news[4]) . '</td>
            <td><strong>';
                switch ($news[7]) {
                    case '1':
                        echo 'Active';
                        break;
                    case '0':
                        echo 'Inactive';
                        break;
                }
                
                echo '</strong></td>
            <td>
			<a href="index.php?get=news_manager&mod=edit_news&id=' . $news[0] . '">[Edit]</a> / 
			<a href="index.php?get=news_manager&move_archive=' . $news[0] . '">[Move to Archive]</a> / 
			<a href="index.php?get=news_manager&delete_news=' . $news[0] . '">[Delete]</a>
			</td>
			</tr>';
            }
            
        }
								echo '
                                </tbody>
                            </table>
                            <!-- #END# input table -->
                        
						<p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100%;margin-bottom: 0px;">
                                        <button type="submit" form="form2" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 100px;margin-top: 5px;">Add News</button>
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
        
        echo '

<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card" style="margin-bottom: 0px;">
					<div class="header">
						<h2 style="text-align: center;">
							Archived News
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- input table -->
                        <!-- <div class="body table-responsive"> -->
                        <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Status</th>
										<th>Controls</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px;">';
		$count = 0;
        foreach ($news_file as $news) {
            $news = explode("¦", $news);
            if ($news[8] == '0') {
                $count++;
                $news[2]  = strlen($news[2]) > 78 ? substr($news[2], 0, 78) . "..." : $news[2];
                echo '
			<tr>
            <th scope="row"><strong>' . $news[2] . '</strong></th>
            <td>' . date('F j, Y / H:i', $news[4]) . '</td>
            <td><strong>';
                switch ($news[7]) {
                    case '1':
                        echo 'Active';
                        break;
                    case '0':
                        echo 'Inactive';
                        break;
                }
                echo '</strong></td>
            <td>
			<a href="index.php?get=news_manager&mod=edit_news&id=' . $news[0] . '">[Edit]</a> / 
			<a href="index.php?get=news_manager&move_listed=' . $news[0] . '">[Move to Listed]</a> / 
			<a href="index.php?get=news_manager&delete_news=' . $news[0] . '">[Delete]</a></td>
			</tr>';
            }
            
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