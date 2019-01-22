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
if (isset($_POST['settings'])) {
    $ip_list       = ereg_replace("\n\r", '', $_POST['filter_ip_list']);
    $ip_list       = ereg_replace("\n", ',', $ip_list);
    $ip_list       = create_list($ip_list);
    $ip_list_final = explode(",", $ip_list);
    foreach ($ip_list_final as $ip) {
        $ip_final .= '\'' . $ip . '\',';
    }
    require('../engine/filter_ip.php');
    $new_db = fopen("../engine/filter_ip.php", "w");
    $data   = "<?\r\n";
    $data .= "\$core['config']['filter_ip'] = \"" . $core['config']['filter_ip'] . "\";\r\n";
    $data .= "\$core['config']['filter_ip_list'] = array(" . create_list($ip_final) . ");\r\n";
    $data .= "?>";
    fwrite($new_db, $data);
    fclose($new_db);
    echo notice_message_admin('Settings successfully saved', 1, 0, 'index.php?get=filter_ip');
} else {
    if (isset($_POST['module_active'])) {
        require('../engine/filter_ip.php');
        foreach ($core['config']['filter_ip_list'] as $ip_list) {
            $ip_final .= '\'' . $ip_list . '\',';
            
        }
        $new_db = fopen("../engine/filter_ip.php", "w");
        $data   = "<?\r\n";
        $data .= "\$core['config']['filter_ip'] = \"" . $_POST['module_active'] . "\";\r\n";
        $data .= "\$core['config']['filter_ip_list'] = array(" . create_list($ip_final) . ");\r\n";
        $data .= "?>";
        fwrite($new_db, $data);
        fclose($new_db);
    }
    require('../engine/filter_ip.php');
    echo '
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2 style="text-align: center;">
							Turn website firewall On and Off
						</h2>
					</div>
					<div class="body">
					<form action="" method="post" id="form1">';
					 	if ($core['config']['filter_ip'] == '1') {
        					echo '<p class="lead" align="left" style="background: #0C0;padding: 5px 0px 5px 5px">Firewall is active.
								<button type="submit" form="form1" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 20px;margin-top: 0;">Turn Firewall Off</button></p>
								<input type="hidden" name="module_active" value="0">';
    					} elseif ($core['config']['filter_ip'] == '0') {
        					echo '<p class="lead" align="left" style="background: #C00;padding: 5px 0px 5px 5px">Firewall is inactive.
								<button type="submit" form="form1" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 20px;margin-top: 0;">Turn Firewall On</button></p>
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

<form action="" method="post" id="form2">
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card" style="margin-bottom: 0px;">
					<div class="header">
						<h2 style="text-align: center;">
							Register Settings
						</h2>
					</div>
					<div class="body">
                    	
						<!-- input text -->
						<tr>
<td align="left" class="panel_text_alt2" width="45%" valign="top"></td>
</tr>
						<p class="lead" align="left">
                        	Banned IP Addresses
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Use this option to prevent certain IP addresses from accessing your website.<br<br>Place a <b>line break</b> between each IP address.<br>e.g: <br>127.0.0.1<br>127.0.0.2<br>127.0.0.3
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<textarea rows="6" name="filter_ip_list" style="width: 100%;">';
    										foreach ($core['config']['filter_ip_list'] as $filter_ip_list) {
        										echo $filter_ip_list . "\n";
    										}
    	 									echo '
										</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
                        
						<p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100%;margin-bottom: 0px;">
                                        <button type="submit" form="form2" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 100px;margin-top: 5px;">SAVE</button>
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
<input type="hidden" name="settings">
</form>';
    
}
?> 