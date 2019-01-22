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
    require('../engine/announcement_config.php');
    $new_db = fopen("../engine/announcement_config.php", "w");
    $data   = "<?\r\n";
    $data .= "\$core['ANNOUNCEMENT']['ACTIVE'] = \"" . $core['ANNOUNCEMENT']['ACTIVE'] . "\";\r\n";
    $data .= "\$core['ANNOUNCEMENT']['EXIST'] = \"" . $core['ANNOUNCEMENT']['EXIST'] . "\";\r\n";
    $data .= "\$core['ANNOUNCEMENT']['AUTHOR'] = \"" . safe_input($_POST['author'], '') . "\";\r\n";
    $data .= "?>";
    fwrite($new_db, $data);
    fclose($new_db);
    echo notice_message_admin('Settings successfully saved', 1, 0, 'index.php?get=announcements_settings');
    
    
} else {
    if (isset($_POST['module_active'])) {
        require('../engine/announcement_config.php');
        $new_db = fopen("../engine/announcement_config.php", "w");
        $data   = "<?\r\n";
        $data .= "\$core['ANNOUNCEMENT']['ACTIVE'] = \"" . safe_input($_POST['module_active'], '') . "\";\r\n";
        $data .= "\$core['ANNOUNCEMENT']['EXIST'] = \"" . $core['ANNOUNCEMENT']['EXIST'] . "\";\r\n";
        $data .= "\$core['ANNOUNCEMENT']['AUTHOR'] = \"" . $core['ANNOUNCEMENT']['AUTHOR'] . "\";\r\n";
        $data .= "?>";
        fwrite($new_db, $data);
        fclose($new_db);
        
    }
    
    require('../engine/announcement_config.php');
    echo '
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2 style="text-align: center;">
							Turn Announcements On and Off
						</h2>
					</div>
					<div class="body">
					<form action="" method="post" id="form1">';
					 	if ($core['ANNOUNCEMENT']['ACTIVE'] == '1') {
        					echo '<p class="lead" align="left" style="background: #0C0;padding: 5px 0px 5px 5px">Announcements is active.
								<button type="submit" form="form1" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 20px;margin-top: 0;">Turn Announcements Off</button></p>
								<input type="hidden" name="module_active" value="0">';
    					} elseif ($core['ANNOUNCEMENT']['ACTIVE'] == '0') {
        					echo '<p class="lead" align="left" style="background: #C00;padding: 5px 0px 5px 5px">Announcements is inactive.
								<button type="submit" form="form1" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 20px;margin-top: 0;">Turn Announcements On</button></p>
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
</section>

<form action="" method="post" id="form2">
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card" style="margin-bottom: 0px;">
					<div class="header">
						<h2 style="text-align: center;">
							Announcements Settings
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- inpunt radio -->
						<p class="lead" align="left">
                        	Show Administrator Nickname
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	When \'Yes\' Administrator Nickname will appear on announcement.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">';
									switch ($core['ANNOUNCEMENT']['AUTHOR']) {
        								case '0':
            								echo '
										<div class="demo-radio-button">
											<input type="radio" class="with-gap" id="radio_1" name="author" value="1"/>
           									<label for="radio_1" style="min-width: 70px;">Yes</label>	
											<input type="radio" class="with-gap" id="radio_2" name="author" value="0" checked="checked"/>
            								<label for="radio_2" style="min-width: 70px;">No</label>
    									</div>';
            							break;
        								
										case '1':
            								echo '
										<div class="demo-radio-button">
											<input type="radio" class="with-gap" id="radio_1" name="author" value="1" checked="checked"/>
           									<label for="radio_1" style="min-width: 70px;">Yes</label>	
											<input type="radio" class="with-gap" id="radio_2" name="author" value="0"/>
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