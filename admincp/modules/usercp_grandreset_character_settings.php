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
    if (empty($_POST['resets_need']) || empty($_POST['level']) || empty($_POST['zen'])) {
        echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
    } else {
        if (empty($_POST['bpoints'])) {
            $_POST['bpoints'] = '0';
        }
        
        if (empty($_POST['bcredits'])) {
            $_POST['bcredits'] = '0';
        }
        
        $save_1 = new_config_xml('../engine/config_mods/grandreset_character_settings', 'resets_need', safe_input($_POST['resets_need'], ''));
        $save_1 = new_config_xml('../engine/config_mods/grandreset_character_settings', 'bcredits', safe_input($_POST['bcredits'], ''));
        
        $save_1 = new_config_xml('../engine/config_mods/grandreset_character_settings', 'level', safe_input($_POST['level'], ''));
        $save_2 = new_config_xml('../engine/config_mods/grandreset_character_settings', 'zen', safe_input($_POST['zen'], ''));
        $save_3 = new_config_xml('../engine/config_mods/grandreset_character_settings', 'bpoints', safe_input($_POST['bpoints'], ''));
        $save_4 = new_config_xml('../engine/config_mods/grandreset_character_settings', 'bpoints_formula', safe_input($_POST['bpoints_formula'], ''));
        $save_4 = new_config_xml('../engine/config_mods/grandreset_character_settings', 'bcredits_formula', safe_input($_POST['bcredits_formula'], ''));
        $save_5 = new_config_xml('../engine/config_mods/grandreset_character_settings', 'clear_skills', safe_input($_POST['clear_skills'], ''));
        $save_1 = new_config_xml('../engine/config_mods/grandreset_character_settings', 'clear_inv', safe_input($_POST['clear_inv'], ''));
        $save_1 = new_config_xml('../engine/config_mods/grandreset_character_settings', 'reset_stats', safe_input($_POST['reset_stats'], ''));
        $save_1 = new_config_xml('../engine/config_mods/grandreset_character_settings', 'reset_limit', safe_input($_POST['reset_limit'], ''));
        echo notice_message_admin('Settings successfully saved', 1, 0, 'index.php?get=usercp_grandreset_character_settings');
    }
} else {
    if (isset($_POST['module_active'])) {
        $save_status = new_config_xml('../engine/config_mods/grandreset_character_settings', 'active', safe_input($_POST['module_active'], ''));
    }
    $get_config = simplexml_load_file('../engine/config_mods/grandreset_character_settings.xml');
    echo '
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2 style="text-align: center;">
							Grand Reset Character Settings
						</h2>
					</div>
					<div class="body">
					<form action="" method="post" id="form1">';
					 	if ($get_config->active == '1') {
        					echo '<p class="lead" align="left" style="background: #0C0;padding: 5px 0px 5px 5px">Grand Reset Character is active.
								<button type="submit" form="form1" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 20px;margin-top: 0;">Turn Grand Reset Character Off</button></p>
								<input type="hidden" name="module_active" value="0">';
    					} elseif ($get_config->active == '0') {
        					echo '<p class="lead" align="left" style="background: #C00;padding: 5px 0px 5px 5px">Grand Reset Character is inactive.
								<button type="submit" form="form1" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 20px;margin-top: 0;">Turn Grand Reset Character On</button></p>
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
							Grand Reset Character Settings
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- input text -->
						<p class="lead" align="left">
                        	Resets
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Set how many resets character should have, to use grand reset.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="resets_need" value="' . $get_config->resets_need . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	Level
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Set what level character should have, to use grand reset.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="level" value="' . $get_config->level . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	Zen
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Set the amount of zen required to use grand reset.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="zen" value="' . $get_config->zen . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	Credits Bonus
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Set the amount of credits, that character\'s account will recive after grand reset.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="bcredits" value="' . $get_config->bcredits . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input select -->
						<p class="lead" align="left">
                        	Credits Bonus Formula
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Set formula.<br>
								<b>Credits Bonus</b> - Character\'s account will recive the set amount of credits.<br>
								<b>Credits Bonus * Grand Resets Number</b> - Character\'s account will recive the set amount of credits bonus multiplicated with character\'s grand resets number.<br>
								e.g: (4000*2) = 8000 points, 4000 is credits bonus amount and 2 is grand resets number.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	
									<div style="border-bottom: none;">
                                    	<select name="bcredits_formula" style="border: none;font-size: 14px;float: right;width: 100%;">';
    									if ($get_config->bcredits_formula == '0') {
        									echo '
											<option value="0" selected="selected">Credits Bonus</option>
											<option value="1">Credits Bonus * Grand Resets Number</option>';
    									} elseif ($get_config->bcredits_formula == '1') {
        									echo '
											<option value="0">Credits Bonus</option>
											<option value="1" selected="selected">Credits Bonus * Grand Resets Number</option>';
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
                        	Levelup Bonus Points
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Set the amount of levelup bonus points, that character will recive after grand reset.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="bpoints" value="' . $get_config->bpoints . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input select -->
						<p class="lead" align="left">
                        	Levelup Bonus Points Formula
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Set formula.<br>
								<b>Levelup Bonus Points</b> - Character will recive the set amount of levelup bonus points.<br>
								<b>Levelup Bonus Points * Grand Resets Number</b> - Character will recive the set amount of levelup bonus points multiplicated with character\'s grand resets number.<br>
								e.g: (4000*2) = 8000 points, 4000 is levelup bonus points amount and 2 is grand resets number.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	
									<div style="border-bottom: none;">
                                    	<select name="bpoints_formula" style="border: none;font-size: 14px;float: right;width: 100%;">';
    									if ($get_config->bpoints_formula == '0') {
        									echo '
											<option value="0" selected="selected">Levelup Bonus Points</option>
											<option value="1">Levelup Bonus Points * Grand Resets Number</option>';
    									} elseif ($get_config->bpoints_formula == '1') {
        									echo '
											<option value="0">Levelup Bonus Points</option>
											<option value="1" selected="selected">Levelup Bonus Points * Grand Resets Number</option>';
        
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
                        	Clear Skills
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	When \'Yes\' all character\'s skills will be cleared after grand reset.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">';
									switch ($get_config->clear_skills) {
        								case '0':
            								echo '
										<div class="demo-radio-button">
											<input type="radio" class="with-gap" id="radio_1" name="clear_skills" value="1"/>
           									<label for="radio_1" style="min-width: 70px;">Yes</label>	
											<input type="radio" class="with-gap" id="radio_2" name="clear_skills" value="0" checked="checked"/>
            								<label for="radio_2" style="min-width: 70px;">No</label>
    									</div>';
            							break;
        								case '1':
            								echo '
										<div class="demo-radio-button">
											<input type="radio" class="with-gap" id="radio_1" name="clear_skills" value="1" checked="checked"/>
           									<label for="radio_1" style="min-width: 70px;">Yes</label>	
											<input type="radio" class="with-gap" id="radio_2" name="clear_skills" value="0"/>
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
                        	Clear Inventory
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	When \'Yes\' all character\'s items from inventory will be cleared after grand reset.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">';
									switch ($get_config->clear_inv) {
        								case '0':
            								echo '
										<div class="demo-radio-button">
											<input type="radio" class="with-gap" id="radio_3" name="clear_inv" value="1"/>
           									<label for="radio_3" style="min-width: 70px;">Yes</label>	
											<input type="radio" class="with-gap" id="radio_4" name="clear_inv" value="0" checked="checked"/>
            								<label for="radio_4" style="min-width: 70px;">No</label>
    									</div>';
            							break;
        								case '1':
            								echo '
										<div class="demo-radio-button">
											<input type="radio" class="with-gap" id="radio_3" name="clear_inv" value="1" checked="checked"/>
           									<label for="radio_3" style="min-width: 70px;">Yes</label>	
											<input type="radio" class="with-gap" id="radio_4" name="clear_inv" value="0"/>
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
                        	Reset Stats
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	When \'Yes\' all character\'s stats (Strength, Agility, Vitality, Energy, Command). will be set to 25.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">';
									switch ($get_config->reset_stats) {
        								case '0':
            								echo '
										<div class="demo-radio-button">
											<input type="radio" class="with-gap" id="radio_5" name="reset_stats" value="1"/>
           									<label for="radio_5" style="min-width: 70px;">Yes</label>	
											<input type="radio" class="with-gap" id="radio_6" name="reset_stats" value="0" checked="checked"/>
            								<label for="radio_6" style="min-width: 70px;">No</label>
    									</div>';
            							break;
        								case '1':
            								echo '
										<div class="demo-radio-button">
											<input type="radio" class="with-gap" id="radio_5" name="reset_stats" value="1" checked="checked"/>
           									<label for="radio_5" style="min-width: 70px;">Yes</label>	
											<input type="radio" class="with-gap" id="radio_6" name="reset_stats" value="0"/>
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