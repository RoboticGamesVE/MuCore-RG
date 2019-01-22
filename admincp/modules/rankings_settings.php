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
    if (empty($_POST['cron_job_1']) || empty($_POST['cron_job_2']) || empty($_POST['cron_job_3']) || empty($_POST['char_top']) || empty($_POST['guild_top'])) {
        echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
    } else {
        $save_1 = new_config_xml('../engine/config_mods/rankings_settings', 'cron_job_1', '' . safe_input($_POST['cron_job_1'], '') . '');
        $save_2 = new_config_xml('../engine/config_mods/rankings_settings', 'cron_job_2', '' . safe_input($_POST['cron_job_2'], '') . '');
        $save_3 = new_config_xml('../engine/config_mods/rankings_settings', 'cron_job_3', '' . safe_input($_POST['cron_job_3'], '') . '');
        $save_4 = new_config_xml('../engine/config_mods/rankings_settings', 'char_top', '' . safe_input($_POST['char_top'], '') . '');
        $save_5 = new_config_xml('../engine/config_mods/rankings_settings', 'guild_top', '' . safe_input($_POST['guild_top'], '') . '');
        $save_6 = new_config_xml('../engine/config_mods/rankings_settings', 'gm', '' . safe_input($_POST['gm'], '') . '');
        $save_7 = new_config_xml('../engine/config_mods/rankings_settings', 'char_status', '' . safe_input($_POST['char_status'], '') . '');
        $save_8 = new_config_xml('../engine/config_mods/rankings_settings', 'location', '' . safe_input($_POST['location'], '') . '');
        $save_9 = new_config_xml('../engine/config_mods/rankings_settings', 'hide_stats', '' . safe_input($_POST['hide_stats'], '') . '');
        echo notice_message_admin('Settings successfully saved', 1, 0, 'index.php?get=rankings_settings');
    }
    
} else {
    if (isset($_POST['module_active'])) {
        $save_status = new_config_xml('../engine/config_mods/rankings_settings', 'active', safe_input($_POST['module_active'], ''));
    }
    $get_config = simplexml_load_file('../engine/config_mods/rankings_settings.xml');
    echo '
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2 style="text-align: center;">
							Rankings Settings
						</h2>
					</div>
					<div class="body">
					<form action="" method="post" id="form1">';
					 	if ($get_config->active == '1') {
        					echo '<p class="lead" align="left" style="background: #0C0;padding: 5px 0px 5px 5px">Rankings is active.
								<button type="submit" form="form1" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 20px;margin-top: 0;">Turn Rankings Off</button></p>
								<input type="hidden" name="module_active" value="0">';
    					} elseif ($get_config->active == '0') {
        					echo '<p class="lead" align="left" style="background: #C00;padding: 5px 0px 5px 5px">Rankings is inactive.
								<button type="submit" form="form1" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 20px;margin-top: 0;">Turn Rankings On</button></p>
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
							Rankings Settings
						</h2>
					</div>
					<div class="body">
                    	
						<!-- input text -->
						<p class="lead" align="left">
                        	Cron Job ID
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Set cron job id for all characters rankings.<br>
								Set cron job id for all characters rankings. (class filter).<br>
								Set cron job id for guild rankings<br>
								<a href="index.php?get=cron_jobs">view cron jobs list</a>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="cron_job_1" value="' . $get_config->cron_job_1 . '">
										<input type="text" class="form-control" name="cron_job_2" value="' . $get_config->cron_job_2 . '">
										<input type="text" class="form-control" name="cron_job_3" value="' . $get_config->cron_job_3 . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	Characters Top
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Set top for characters rankings.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="char_top" value="' . $get_config->char_top . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	Set top for guilds rankings.
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Set top for characters rankings.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control"name="guild_top" value="' . $get_config->char_top . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
                        <!-- inpunt radio -->
						<p class="lead" align="left">
                        	Game Masters Tops
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	When \'Yes\' Game Masters will show on top.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">';
									switch ($get_config->gm) {
        								case '0':
            								echo '
										<div class="demo-radio-button">
											<input type="radio" class="with-gap" id="radio_1" name="gm" value="1"/>
           									<label for="radio_1" style="min-width: 70px;">Yes</label>	
											<input type="radio" class="with-gap" id="radio_2" name="gm" value="0" checked="checked"/>
            								<label for="radio_2" style="min-width: 70px;">No</label>
    									</div>';
            							break;
        								case '1':
            								echo '
										<div class="demo-radio-button">
											<input type="radio" class="with-gap" id="radio_1" name="gm" value="1" checked="checked"/>
           									<label for="radio_1" style="min-width: 70px;">Yes</label>	
											<input type="radio" class="with-gap" id="radio_2" name="gm" value="0"/>
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
                        	Status Check
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	When \'Yes\' users will be able to check character status.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">';
									switch ($get_config->char_status) {
        								case '0':
            								echo '
										<div class="demo-radio-button">
											<input type="radio" class="with-gap" id="radio_3" name="char_status" value="1"/>
           									<label for="radio_3" style="min-width: 70px;">Yes</label>	
											<input type="radio" class="with-gap" id="radio_4" name="char_status" value="0" checked="checked"/>
            								<label for="radio_4" style="min-width: 70px;">No</label>
    									</div>';
            							break;
        								case '1':
            								echo '
										<div class="demo-radio-button">
											<input type="radio" class="with-gap" id="radio_3" name="char_status" value="1" checked="checked"/>
           									<label for="radio_3" style="min-width: 70px;">Yes</label>	
											<input type="radio" class="with-gap" id="radio_4" name="char_status" value="0"/>
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
						
						<!-- inpunt radio -->
						<p class="lead" align="left">
                        	Location Check
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	When \'Yes\' users will be able to check character location.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">';
									switch ($get_config->location) {
        								case '0':
            								echo '
										<div class="demo-radio-button">
											<input type="radio" class="with-gap" id="radio_5" name="location" value="1"/>
           									<label for="radio_5" style="min-width: 70px;">Yes</label>	
											<input type="radio" class="with-gap" id="radio_6" name="location" value="0" checked="checked"/>
            								<label for="radio_6" style="min-width: 70px;">No</label>
    									</div>';
            							break;
        								case '1':
            								echo '
										<div class="demo-radio-button">
											<input type="radio" class="with-gap" id="radio_5" name="location" value="1" checked="checked"/>
           									<label for="radio_5" style="min-width: 70px;">Yes</label>	
											<input type="radio" class="with-gap" id="radio_6" name="location" value="0"/>
            								<label for="radio_6" style="min-width: 70px;">No</label>
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
                        	Hide Stats
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	When \'Yes\' characters stats will not be displayed.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">';
									switch ($get_config->hide_stats) {
        								case '0':
            								echo '
										<div class="demo-radio-button">
											<input type="radio" class="with-gap" id="radio_7" name="hide_stats" value="1"/>
           									<label for="radio_7" style="min-width: 70px;">Yes</label>	
											<input type="radio" class="with-gap" id="radio_8" name="hide_stats" value="0" checked="checked"/>
            								<label for="radio_8" style="min-width: 70px;">No</label>
    									</div>';
            							break;
        								case '1':
            								echo '
										<div class="demo-radio-button">
											<input type="radio" class="with-gap" id="radio_7" name="hide_stats" value="1" checked="checked"/>
           									<label for="radio_7" style="min-width: 70px;">Yes</label>	
											<input type="radio" class="with-gap" id="radio_8" name="hide_stats" value="0"/>
            								<label for="radio_8" style="min-width: 70px;">No</label>
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