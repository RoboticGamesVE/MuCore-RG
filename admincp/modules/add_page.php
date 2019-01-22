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
?>
<script type="text/javascript" src="script/yahoo-dom-event.js"></script>

    <script type="text/javascript">
    function fetch_object(A){
    if(document.getElementById){
        return document.getElementById(A)
    }else{
        if(document.all){
            return document.all[A]}else{
                if(document.layers){
                    return document.layers[A]
                }else{
                    return null
                }
            }
    }
}
    </script>
<script type="text/javascript" src="script/animation-min.js"></script>
<script type="text/javascript" src="script/dragdrop-min.js"></script>
<script type="text/javascript" src="script/core_cms_admin_dd.js"></script>

<style type="text/css">
<!--
ul.draglist { 
    position: relative;
    border: 1px dashed gray;
    list-style: none;
    margin: 0;
    padding: 13px 5px 13px 5px;
    
}

ul.draglist li {
    margin: 2px;
    cursor: move;
    width: 97%;
}

ul.draglist_inact { 
    position: relative;
    border: 1px dashed gray;
    list-style: none;
    margin: 0;
    padding: 13px 5px 13px 5px;
}

ul.draglist_inact li {
    margin: 2px;
    cursor: move;
    width: 97%;
}

li.dlistitem {
    text-align: left;
    margin: 0;
    padding: 3px;
    border: 1px outset #7EA6B2;
}
-->
</style>    

<?
if (!isset($_GET['m'])) {
    echo '
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card" style="margin-bottom: 0px;">
					<div class="header">
						<h2 style="text-align: center;">
							Page Type
						</h2>
					</div>
					<div class="body">
                        
						<!-- input text -->
						<p class="lead" align="left">
                        	Please select Page type would like to add.
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 15%;text-align: left;">
                            	<a href="index.php?get=add_page&m=0">[Built-in Page]</a>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 80%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	A Built-in Page will allow you to select any of your modules which you would like to display on this page, ans also page options like:<br>
<b>SQL Connection</b> - Set if new page need to connect sql.<br>
<b>Page Authentication</b> - User will need to log in before to see page.<br>
<b>Page Hide</b> - Hide page link on Website Menu but still can be accessed if page URL knows.
                                    </div>
                                </div>
                            </div>
							
							<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 15%;text-align: left;margin-top: 10px;">
                            	<a href="index.php?get=add_page&m=1">[Additional URL]</a>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 80%;margin-bottom: 1px;margin-top: 10px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line" style="border-bottom: 0px;">
                                    	Add simple simple link to Website Menu.
                                    </div>
                                </div>
                            </div>
							
                        </div>
						<!-- #END# input text -->
                        
					</div>
				</div>
			</div>
		</div>
	<!-- #END# Body Copy -->
	</div>
</section>';
    
} else {
    if ($_GET['m'] == '0') {
        if (isset($_POST['add_page'])) {
            if ($_POST['p_order'] == '0') {
                $order = 'not_blank';
            } else {
                $order = $_POST['p_order'];
            }
            if (empty($_POST['p_title']) || empty($_POST['p_id']) || empty($order)) {
                echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
            } else {
                if ($_POST['p_auth'] == '1' && $_POST['p_sql'] != '1') {
                    echo notice_message_admin('Page Authentication requires sql connection, set SQL Connection to \'Yes\'.', '0', '1', '0');
                } else {
                    $page_id   = uniqid();
                    $page_file = file('../engine/cms_data/pag_d.cms');
                    foreach ($page_file as $pag_data) {
                        $pag_data = explode("¦", $pag_data);
                        if ($pag_data[3] == $_POST['p_id']) {
                            $id_found = 1;
                        }
                    }
                    if ($id_found == '1') {
                        echo notice_message_admin('There is already one page with same page id: <b>' . htmlentities($_POST['p_id']) . '</b>.', '0', '1', '0');
                    } else {
                        foreach ($_POST['mods'] AS $modcol => $rawmods) {
                            if ($modcol == "1") {
                                $new_mods_left = safe_input(substr($rawmods, 0, -1), '\_\ ');
                            }
                            
                            if ($modcol == "2") {
                                $new_mods_right = safe_input(substr($rawmods, 0, -1), '\_\ ');
                            }
                            
                        }
                        $new_cfg = safe_input($_POST['p_order'], '') . '¦' . $page_id . '¦' . safe_input($_POST['p_title'], '\_\.\-\ ') . '¦' . safe_input($_POST['p_id'], '\_') . '¦' . $new_mods_left . '¦' . $new_mods_right . '¦' . safe_input($_POST['p_hide'], '') . '¦' . safe_input($_POST['p_type'], '') . '¦' . safe_input($_POST['p_active'], '') . '¦' . safe_input($_POST['p_auth'], '') . "¦¦¦" . safe_input($_POST['p_sql'], '') . "¦" . str_replace('"', "", str_replace("¦", "", $_POST['meta_keywords'])) . "¦" . str_replace('"', "", str_replace("¦", "", $_POST['meta_description'])) . "¦\r\n";
                        $open_f  = fopen('../engine/cms_data/pag_d.cms', 'a');
                        $write_f = fwrite($open_f, $new_cfg);
                        $close_f = fclose($open_f);
                        echo notice_message_admin('Built-in Page successfully added', 1, 0, 'index.php?get=edit_pages');
                    }
                }
                
            }
            
            
            
            
            
            
        } else {
            echo '
<form action="" method="post" id="form2" name="add_page" onsubmit="return YAHOO.DDApp.showOrder()">
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2 style="text-align: center;">
							Add Built-in Page
						</h2>
					</div>
					<div class="body">
                    	
						<!-- input text -->
						<p class="lead" align="left">
                        	Page Title
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Page Title that will appear on website menu.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="p_title">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	Page ID
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	This is the variable that will be used in the URL to link to this page.<br>
								For example, if this option is set to \'some_page\', then the link to this page would look like this:<br>
								http://yoursite.com/index.php?page_id=<b>some_page</b>.<br>
								Note: Use only numbers and letters, symbols allowed: <b>_</b> (underscore)
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="p_id">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	Display Order
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	This controls the order that the page will be displayed in for the Website Menu and in the Admin Control Panel.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="p_order" value="0">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	Meta Keywords
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Here you may enter a list of meta keywords for this page. Leave this setting blank to use your default MUCore Meta Keywords setting.<br>
								Separe each word with comma<br>
								e.g: game,muonline,mmorpg,free play,season 5,bugless
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="meta_keywords">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	Meta Description
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Here you may enter a meta description for this page. Leave this setting blank to use your default MUCore Meta Keywords description.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="meta_description">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- inpunt radio -->
						<p class="lead" align="left">
                        	Page Active
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	When set to \'No\', page will not be visible.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
								
								<div class="demo-radio-button">
									<input type="radio" class="with-gap" id="radio_1" name="p_active" value="1" checked="checked"/>
           							<label for="radio_1" style="min-width: 70px;">Yes</label>	
									<input type="radio" class="with-gap" id="radio_2" name="p_active" value="0"/>
            						<label for="radio_2" style="min-width: 70px;">No</label>
    							</div>
										
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input radio -->
						
						<!-- inpunt radio -->
						<p class="lead" align="left">
                        	SQL Connection
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	When set to \'Yes\', page will establish connection with SQL Server (MU Online database).<br>
								Note: Set \'Yes\' only if one or more of modules that you will add on this page will require SQL Connection.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
									
								<div class="demo-radio-button">
									<input type="radio" class="with-gap" id="radio_3" name="p_sql" value="1"/>
           							<label for="radio_3" style="min-width: 70px;">Yes</label>	
									<input type="radio" class="with-gap" id="radio_4" name="p_sql" value="0" checked="checked"/>
            						<label for="radio_4" style="min-width: 70px;">No</label>
    							</div>
										
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input radio -->
						
						<!-- inpunt radio -->
						<p class="lead" align="left">
                        	Page Authentication
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	When set \'Yes\', user will need to log in before to see page.<br>
								<b>Note: Page Authentication require SQL Connection<b>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
									
								<div class="demo-radio-button">
									<input type="radio" class="with-gap" id="radio_5" name="p_auth" value="1"/>
           							<label for="radio_5" style="min-width: 70px;">Yes</label>	
									<input type="radio" class="with-gap" id="radio_6" name="p_auth" value="0" checked="checked"/>
            						<label for="radio_6" style="min-width: 70px;">No</label>
    							</div>
										
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input radio -->
						
						<!-- inpunt radio -->
						<p class="lead" align="left">
                        	Page Hide
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	When set \'Yes\', page will not appear on Website Menu, but will still be accessible if page URL knows.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
									
								<div class="demo-radio-button">
									<input type="radio" class="with-gap" id="radio_7" name="p_hide" value="0"/>
           							<label for="radio_7" style="min-width: 70px;">Yes</label>	
									<input type="radio" class="with-gap" id="radio_8" name="p_hide" value="1" checked="checked"/>
            						<label for="radio_8" style="min-width: 70px;">No</label>
    							</div>
										
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input radio -->
						
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
							Active Modules
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- input table -->
                        <!-- <div class="body table-responsive"> -->
                        <table class="table table-striped">
                                <thead>
									<tr>
                                        <th>Left Column</th>
                                        <th>Center Column</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px;">
									<tr>
										<th scope="row" style="width: 50%;">
            								<input type="hidden" name="mods[1]" id="col1" value="" />
											<ul id="ul1" class="draglist"></ul>
										</th>

										<td>
											<input type="hidden" name="mods[2]" id="col2" value="" />
											<ul id="ul2" class="draglist"></ul>
										</td>
									</tr>
									
                                </tbody>
                            </table>
							
							<table class="table table-striped">
                                <thead>
									<tr>
                                        <th>Inactive Modules</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px;">
									<tr>
										<th scope="row" style="width: 50%;">
											<ul id="ulinact" class="draglist_inact">';
            $modules_list = file('../engine/cms_data/mods.cms');
            foreach ($modules_list as $inactive_modules) {
                $inactive_modules = explode("¦", $inactive_modules);
                if ($inactive_modules[4] == '0') {
                    echo '<li class="dlistitem alt1" id="' . $inactive_modules[0] . '" title="' . $inactive_modules[3] . '">' . $inactive_modules[3] . ' (Inactive Module)</li>';
                } else {
                    echo '<li class="dlistitem alt1" id="' . $inactive_modules[0] . '" title="' . $inactive_modules[3] . '">' . $inactive_modules[3] . '</li>';
                }
                
            }
            
            echo '
            								</ul>
										</th>
										
										<td>To arrange the modules on this page, click on the module title and drag it to the location you would like it to appear. To remove a module from this page, drag it to the Inactive Modules box to the left.
										</td>
									</tr>
									
                                </tbody>
                            </table>
                            <!-- #END# input table -->
                            
							<p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100%;margin-bottom: 0px;text-align: center;">
                                        <button type="submit" form="form2" class="btn btn-primary m-t-15 waves-effect" style="margin-top: 5px;">Add Page</button>
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
<input type="hidden" name="p_type" value="0">
<input type="hidden" name="add_page">
</form>';
        }
        
    } elseif ($_GET['m'] == '1') {
        if (isset($_POST['add_page'])) {
            if ($_POST['p_order'] == '0') {
                $order = 'not_blank';
            } else {
                $order = $_POST['p_order'];
            }
            
            if ($_POST['p_target'] == '0') {
                $p_target = 'not_blank';
            } else {
                $p_target = $_POST['p_target'];
            }
            
            
            if (empty($_POST['p_title']) || empty($_POST['p_url']) || empty($order) || empty($p_target)) {
                echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
            } else {
                $p_id    = uniqid();
                $new_cfg = safe_input($_POST['p_order'], '') . '¦' . safe_input($p_id, '') . '¦' . safe_input($_POST['p_title'], '\_\.\-\ ') . '¦NULL¦¦¦¦' . safe_input($_POST['p_type'], '') . '¦¦¦' . safe_input($_POST['p_url'], '\:\/\_\.\?\=\#\-') . '¦' . safe_input($_POST['p_target'], '') . "¦0¦¦¦\r\n";
                $open_f  = fopen('../engine/cms_data/pag_d.cms', 'a');
                $write_f = fwrite($open_f, $new_cfg);
                $close_f = fclose($open_f);
                echo notice_message_admin('Additional URL successfully added', 1, 0, 'index.php?get=edit_pages');
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
							Add Additional URL Page
						</h2>
					</div>
					<div class="body">
                    	
						<!-- input text -->
						<p class="lead" align="left">
                        	Page Title
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Page Title that will appear on website menu.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="p_title">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	Page URL
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enter the URL you would like to link.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="p_url">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
                        <!-- input select -->
						<p class="lead" align="left">
                        	URL Target
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Open URL in:<br>
								<b>_blank</b> - will open url in new window.<br>
								<b>_self</b> - will open url in same window.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	
									<div style="border-bottom: none;">
                                    	<select name="p_target" style="border: none;font-size: 14px;float: right;width: 100%;">
                                        	<option value="" selected="selected">--Select</option>
											<option value="0">_self</option>
											<option value="1">_blank</option>
                                		</select>
                                    </div>
									
                                </div>
                            </div>
                        </div>
						<!-- #END# input select -->
                        
                        <!-- input text -->
						<p class="lead" align="left">
                        	Display Order
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	This controls the order that the page will be displayed in for the Website Menu and in the Admin Control Panel.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="p_order" value="0">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
                        
						<p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100%;margin-bottom: 0px;">
                                        <button type="submit" form="form2" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 100px;margin-top: 5px;">Add Page</button>
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
<input type="hidden" name="p_type" value="1">
<input type="hidden" name="add_page">
</form>';
        }
        
    }
}
?>