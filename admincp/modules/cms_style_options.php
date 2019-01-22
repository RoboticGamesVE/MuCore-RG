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
    if (empty($_POST['CMS_STYLE_LEFT_WIDTH'])) {
        echo notice_message_admin('Some fields where left blank.', '0', '1', '0');
    } else {
        require('../engine/style_cms.php');
        $new_db = fopen("../engine/style_cms.php", "w");
        $data   = "<?\r\n";
        $data .= "define('CMS_STYLE_LEFT_WIDTH','" . safe_input($_POST['CMS_STYLE_LEFT_WIDTH'], '') . "');\r\n";
        $data .= "define('CMS_NAVBAR','" . safe_input($_POST['CMS_NAVBAR'], '') . "');\r\n";
        $data .= "?>";
        fwrite($new_db, $data);
        fclose($new_db);
        echo notice_message_admin('Settings successfully saved', 1, 0, 'index.php?get=cms_style_options');
        
    }
    
    
} else {
    require('../engine/style_cms.php');
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
							Style Options
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- input text -->
						<p class="lead" align="left">
                        	Left Column Width
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	The width in pixels of left column.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="CMS_STYLE_LEFT_WIDTH" value="' . CMS_STYLE_LEFT_WIDTH . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- inpunt radio -->
						<p class="lead" align="left">
                        	Enable Navbar
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Turn this option on to enable the MUCore navbar.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">';
									switch (CMS_NAVBAR) {
        								case '0':
            								echo '
									<div class="demo-radio-button">
										<input type="radio" class="with-gap" id="radio_1" name="CMS_NAVBAR" value="1"/>
           								<label for="radio_1" style="min-width: 70px;">Yes</label>	
										<input type="radio" class="with-gap" id="radio_2" name="CMS_NAVBAR" value="0" checked="checked"/>
            							<label for="radio_2" style="min-width: 70px;">No</label>
    								</div>';
            							break;
        								case '1':
            								echo '
									<div class="demo-radio-button">
										<input type="radio" class="with-gap" id="radio_1" name="CMS_NAVBAR" value="1" checked="checked"/>
           								<label for="radio_1" style="min-width: 70px;">Yes</label>	
										<input type="radio" class="with-gap" id="radio_2" name="CMS_NAVBAR" value="0"/>
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