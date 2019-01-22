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
            if (empty($_POST['title']) || empty($_POST['amount']) || $_POST['currency'] == 'x' || empty($_POST['credits'])) {
                echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
            } else {
                $title    = str_replace("¦", "", $_POST['title']);
                $order    = safe_input($_POST['order'], '');
                $active   = safe_input($_POST['active'], '');
                $amount   = safe_input($_POST['amount'], '\.');
                $currency = safe_input($_POST['currency'], '');
                $credits  = safe_input($_POST['credits'], '');
                
                $db = fopen("../engine/variables_mods/paypal_donate.tDB", "a+");
                fwrite($db, $order . "¦" . uniqid() . "¦" . $title . "¦" . $active . "¦" . $amount . "¦" . $currency . "¦" . $credits . "¦\n");
                fclose($db);
                
                echo notice_message_admin('Donate Package successfully added', 1, 0, 'index.php?get=donate_paypal_manager');
                
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
							Add Donate Package
						</h2>
					</div>
					<div class="body">
                    	
						<!-- input text -->
						<p class="lead" align="left">
                        	Title
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Donate Package Title that will appear on donate packages list.
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
                        	Display Order
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	This controls the order that the donate package will be displayed in for the donate package list and in the Admin Control Panel.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="order" value="0">
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
                            	When set \'No\' donate pacakge will not be visibile.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
									
									<div class="demo-radio-button">
										<input type="radio" class="with-gap" id="radio_1" name="active" value="1" checked="checked"/>
           								<label for="radio_1" style="min-width: 70px;">Yes</label>	
										<input type="radio" class="with-gap" id="radio_2" name="active" value="0"/>
            							<label for="radio_2" style="min-width: 70px;">No</label>
    								</div>
										
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input radio -->
						
						<!-- input select -->
						<p class="lead" align="left">
                        	Cost Amount and Currency
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Set the cost amount and currency for this donate package.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	
									<div style="border-bottom: none;">
									Amount <input type="text"  name="amount" size="4">&nbsp;&nbsp;
									Currency <select name="currency" style="border: none;font-size: 14px;float: right;">
                                        	<option value="x">Currency</option>
    										<optgroup label="--------">
    										<option value="USD">USD</option>
    										<option value="EUR">EUR</option>
                                		</select>
                                    </div>
									
                                </div>
                            </div>
                        </div>
						<!-- #END# input select -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	Credits (MU Coins)
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Set the amount of credits that user will recive after donate payment proccess finish.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="credits">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
                        
						<p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100%;margin-bottom: 0px;">
                                        <button type="submit" form="form2" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 100px;margin-top: 5px;">Add Donate Package</button>
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
        $id  = safe_input(xss_clean($_GET['id']), '');
        $get = file('../engine/variables_mods/paypal_donate.tDB');
        foreach ($get as $data) {
            $data = explode("¦", $data);
            if ($data[1] == $id) {
                $title    = $data[2];
                $order    = $data[0];
                $active   = $data[3];
                $amount   = $data[4];
                $currency = $data[5];
                $credits  = $data[6];
                
                break;
            }
        }
        if (isset($_POST['edit'])) {
            if (empty($_POST['title']) || empty($_POST['amount']) || $_POST['currency'] == 'x' || empty($_POST['credits'])) {
                echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
            } else {
                $title    = str_replace("¦", "", $_POST['title']);
                $order    = safe_input($_POST['order'], '');
                $active   = safe_input($_POST['active'], '');
                $amount   = safe_input($_POST['amount'], '\.');
                $currency = safe_input($_POST['currency'], '');
                $credits  = safe_input($_POST['credits'], '');
                
                $old_db = file("../engine/variables_mods/paypal_donate.tDB");
                $new_db = fopen("../engine/variables_mods/paypal_donate.tDB", "w");
                foreach ($old_db as $old_db_line) {
                    $old_db_arr = explode("¦", $old_db_line);
                    if ($id != $old_db_arr[1]) {
                        fwrite($new_db, "$old_db_line");
                    } else {
                        fwrite($new_db, $order . "¦" . $id . "¦" . $title . "¦" . $active . "¦" . $amount . "¦" . $currency . "¦" . $credits . "¦\n");
                    }
                }
                fclose($new_db);
                echo notice_message_admin('Donate Package successfully edited', 1, 0, 'index.php?get=donate_paypal_manager');
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
							Edit Donate Package
						</h2>
					</div>
					<div class="body">
                    	
						<!-- input text -->
						<p class="lead" align="left">
                        	Title
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Donate Package Title that will appear on donate packages list.
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
                        	Display Order
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	This controls the order that the donate package will be displayed in for the donate package list and in the Admin Control Panel.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="order" value="' . $order . '">
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
                            	When set \'No\' donate pacakge will not be visibile.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">';
									switch ($active) {
                						case '0':
                    						echo '
									<div class="demo-radio-button">
										<input type="radio" class="with-gap" id="radio_1" name="active" value="1"/>
           								<label for="radio_1" style="min-width: 70px;">Yes</label>	
										<input type="radio" class="with-gap" id="radio_2" name="active" value="0" checked="checked"/>
            							<label for="radio_2" style="min-width: 70px;">No</label>
    								</div>';
                    					break;
                						
										case '1':
                    						echo '
									<div class="demo-radio-button">
										<input type="radio" class="with-gap" id="radio_1" name="active" value="1" checked="checked"/>
           								<label for="radio_1" style="min-width: 70px;">Yes</label>	
										<input type="radio" class="with-gap" id="radio_2" name="active" value="0"/>
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
						
						<!-- input select -->
						<p class="lead" align="left">
                        	Cost Amount and Currency
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Set the cost amount and currency for this donate package.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	
									<div style="border-bottom: none;">
									Amount <input type="text" name="amount" value="' . $amount . '" size="4">&nbsp;&nbsp;
									Currency <select name="currency" style="border: none;font-size: 14px;float: right;">
                                        	<option value="x">Currency</option>
    										<optgroup label="--------">';
            								switch ($currency) {
                								case 'USD':
                    								echo '<option value="USD" selected="selected">USD</option><option value="EUR">EUR</option>';
                    							break;
                								case 'EUR':
                    								echo '<option value="USD">USD</option><option value="EUR"  selected="selected">EUR</option>';
                    							break;
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
                        	Credits (MU Coins)
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Set the amount of credits that user will recive after donate payment proccess finish.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="credits" value="' . $credits . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
                        
						<p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100%;margin-bottom: 0px;">
                                        <button type="submit" form="form2" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 100px;margin-top: 5px;">Edit Donate Package</button>
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
    if (isset($_POST['save_order'])) {
        foreach ($_POST['display_order'] as $post_name => $post_order) {
            $get_true_config = file('../engine/variables_mods/paypal_donate.tDB');
            foreach ($get_true_config as $old_config) {
                $old_config = explode("¦", $old_config);
                if ($old_config[1] == $post_name) {
                    $title    = $old_config[2];
                    $active   = $old_config[3];
                    $amount   = $old_config[4];
                    $currency = $old_config[5];
                    $credits  = $old_config[6];
                    break;
                }
            }
            $new_cfg = safe_input($post_order, '') . "¦" . $post_name . "¦" . $title . "¦" . $active . "¦" . $amount . "¦" . $currency . "¦" . $credits . "¦\n";
            
            
            #echo $new_cfg.'<br>';
            
            $old_db = file("../engine/variables_mods/paypal_donate.tDB");
            $new_db = fopen("../engine/variables_mods/paypal_donate.tDB", "w");
            foreach ($old_db as $old_db_line) {
                $old_db_arr = explode("¦", $old_db_line);
                if ($post_name != $old_db_arr[1]) {
                    fwrite($new_db, "$old_db_line");
                } else {
                    fwrite($new_db, $new_cfg);
                }
            }
            fclose($new_db);
            
            
        }
        echo notice_message_admin('Display Order successfully saved', 1, 0, 'index.php?get=donate_paypal_manager');
    } elseif (isset($_GET['delete'])) {
        if (empty($_GET['delete'])) {
            echo notice_message_admin('Unable to proceed your request.', '1', '1', 'index.php?get=donate_paypal_manager');
        } else {
            $id = safe_input(xss_clean($_GET['delete']), '_');
            delete_variable('../engine/variables_mods/paypal_donate.tDB', '1', $id, '¦');
            echo notice_message_admin('Donate Package successfully deleted', 1, 0, 'index.php?get=donate_paypal_manager');
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
							PayPal Donate Packages
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- input table -->
                        <!-- <div class="body table-responsive"> -->
                        <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Display Order</th>
                                        <th>Status</th>
										<th>Amount</th>
										<th>Currency</th>
										<th>Credits (MU Coins)</th>
										<th>Controls</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px;">';
		$donate_file = get_sort('../engine/variables_mods/paypal_donate.tDB', '¦');
        $count = 0;
        foreach ($donate_file as $donate) {
            $count++;
            switch ($donate[3]) {
                case '0':
                    $status = '<em>Inactive</em>';
                    break;
                case '1':
                    $status = '<b>Active</b';
                    break;
            }
            echo '
        <tr>
        <th scope="row"><b>' . $donate[2] . '</b></th>
        <td><input type="text" name="display_order[' . $donate[1] . ']" value="' . $donate[0] . '" size="3"></td>
        <td>' . $status . '</td>
        <td>' . $donate[4] . '</td>
        <td>' . $donate[5] . '</td>
        <td>' . number_format($donate[6]) . '</td>
        <td><a href="index.php?get=donate_paypal_manager&mod=edit&id=' . $donate[1] . '">[Edit]</a> / <a href="index.php?get=donate_paypal_manager&delete=' . $donate[1] . '">[Delete]</a></td>
        </tr>';
            
        }
        if ($count == '0') {
            echo '<td align="center" class="panel_text_alt_list" colspan="7"><em>No donate packages</em></td>';
        }
								echo '
                                </tbody>
                            </table>
                            <!-- #END# input table -->
                                                    
						<p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100%;margin-bottom: 0px;" align="center">
																			
                                        <button type="submit" form="form1" class="btn btn-primary m-t-15 waves-effect" style="margin-top: 5px;float: right;">Save Display Order</button>
										<input type="hidden" name="save_order">
							</form>
										
										<form action="index.php?get=donate_paypal_manager&mod=new" method="post" id="form2" style="float: right;margin-right: 10px;">
                                        <button type="submit" form="form2" class="btn btn-primary m-t-15 waves-effect" style="margin-top: 5px;">Add New Donate Package</button>
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