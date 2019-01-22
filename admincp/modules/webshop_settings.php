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
if (isset($_POST['save_settings'])) {
    $save = new_config_xml('../engine/config_mods/webshop_settings', 'columns', safe_input($_POST['columns'], ''));
    $save = new_config_xml('../engine/config_mods/webshop_settings', 'display_class', safe_input($_POST['display_class'], ''));
    $save = new_config_xml('../engine/config_mods/webshop_settings', 'limit_level', safe_input($_POST['limit_level'], ''));
    $save = new_config_xml('../engine/config_mods/webshop_settings', 'limit_option', safe_input($_POST['limit_option'], ''));
    $save = new_config_xml('../engine/config_mods/webshop_settings', 'limit_exc_option', safe_input($_POST['limit_exc_option'], ''));
    $save = new_config_xml('../engine/config_mods/webshop_settings', 'credits_level', safe_input($_POST['credits_level'], ''));
    $save = new_config_xml('../engine/config_mods/webshop_settings', 'credits_luck', safe_input($_POST['credits_luck'], ''));
    $save = new_config_xml('../engine/config_mods/webshop_settings', 'credits_skill', safe_input($_POST['credits_skill'], ''));
    $save = new_config_xml('../engine/config_mods/webshop_settings', 'credits_option', safe_input($_POST['credits_option'], ''));
    $save = new_config_xml('../engine/config_mods/webshop_settings', 'credits_ancient1', safe_input($_POST['credits_ancient1'], ''));
    $save = new_config_xml('../engine/config_mods/webshop_settings', 'credits_ancient2', safe_input($_POST['credits_ancient2'], ''));
    $save = new_config_xml('../engine/config_mods/webshop_settings', 'credits_refined', safe_input($_POST['credits_refined'], ''));
    $save = new_config_xml('../engine/config_mods/webshop_settings', 'credits_harmony', safe_input($_POST['credits_harmony'], ''));
    $save = new_config_xml('../engine/config_mods/webshop_settings', 'credits_weapon1', safe_input($_POST['credits_weapon1'], ''));
    $save = new_config_xml('../engine/config_mods/webshop_settings', 'credits_weapon2', safe_input($_POST['credits_weapon2'], ''));
    $save = new_config_xml('../engine/config_mods/webshop_settings', 'credits_weapon3', safe_input($_POST['credits_weapon3'], ''));
    $save = new_config_xml('../engine/config_mods/webshop_settings', 'credits_weapon4', safe_input($_POST['credits_weapon4'], ''));
    $save = new_config_xml('../engine/config_mods/webshop_settings', 'credits_weapon5', safe_input($_POST['credits_weapon5'], ''));
    $save = new_config_xml('../engine/config_mods/webshop_settings', 'credits_weapon6', safe_input($_POST['credits_weapon6'], ''));
    $save = new_config_xml('../engine/config_mods/webshop_settings', 'credits_armor1', safe_input($_POST['credits_armor1'], ''));
    $save = new_config_xml('../engine/config_mods/webshop_settings', 'credits_armor2', safe_input($_POST['credits_armor2'], ''));
    $save = new_config_xml('../engine/config_mods/webshop_settings', 'credits_armor3', safe_input($_POST['credits_armor3'], ''));
    $save = new_config_xml('../engine/config_mods/webshop_settings', 'credits_armor4', safe_input($_POST['credits_armor4'], ''));
    $save = new_config_xml('../engine/config_mods/webshop_settings', 'credits_armor5', safe_input($_POST['credits_armor5'], ''));
    $save = new_config_xml('../engine/config_mods/webshop_settings', 'credits_armor6', safe_input($_POST['credits_armor6'], ''));
    $save = new_config_xml('../engine/config_mods/webshop_settings', 'credits_wing1', safe_input($_POST['credits_wing1'], ''));
    $save = new_config_xml('../engine/config_mods/webshop_settings', 'credits_wing2', safe_input($_POST['credits_wing2'], ''));
    $save = new_config_xml('../engine/config_mods/webshop_settings', 'credits_wing3', safe_input($_POST['credits_wing3'], ''));
    $save = new_config_xml('../engine/config_mods/webshop_settings', 'credits_wing4', safe_input($_POST['credits_wing4'], ''));
    $save = new_config_xml('../engine/config_mods/webshop_settings', 'credits_wing5', safe_input($_POST['credits_wing5'], ''));
    
    echo notice_message_admin('Settings successfully saved', 1, 0, 'index.php?get=webshop_settings');
    
} else {
    if (isset($_POST['module_active'])) {
        $save_status = new_config_xml('../engine/config_mods/webshop_settings', 'active', safe_input($_POST['module_active'], ''));
    }
    $get_config = simplexml_load_file('../engine/config_mods/webshop_settings.xml');
	
	echo '
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2 style="text-align: center;">
							Webshop Settings
						</h2>
					</div>
					<div class="body">
					<form action="" method="post" id="form1">';
					 	if ($get_config->active == '1') {
        					echo '<p class="lead" align="left" style="background: #0C0;padding: 5px 0px 5px 5px">Webshop is active.
								<button type="submit" form="form1" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 20px;margin-top: 0;">Turn Webshop Off</button></p>
								<input type="hidden" name="module_active" value="0">';
    					} elseif ($get_config->active == '0') {
        					echo '<p class="lead" align="left" style="background: #C00;padding: 5px 0px 5px 5px">Webshop is inactive.
								<button type="submit" form="form1" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 20px;margin-top: 0;">Turn Webshop On</button></p>
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
							Display Settings
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- input text -->
						<p class="lead" align="left">
                        	Display Columns
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Set how many columns with items you want to be displayed on webshop.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="columns" value="' . $get_config->columns . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						<!-- inpunt radio -->
						<p class="lead" align="left">
                        	Display Class Requirement
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	If \'Yes\' class requirement will be displayed on item infos.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">';
								switch ($get_config->display_class) {
        							case '0':
            							echo '
								<div class="demo-radio-button">
									<input type="radio" class="with-gap" id="radio_1" name="display_class" value="1"/>
           							<label for="radio_1" style="min-width: 70px;">Yes</label>	
									<input type="radio" class="with-gap" id="radio_2" name="display_class" value="0" checked="checked"/>
            						<label for="radio_2" style="min-width: 70px;">No</label>
    							</div>';
            						break;
        							case '1':
            							echo '
								<div class="demo-radio-button">
									<input type="radio" class="with-gap" id="radio_1" name="display_class" value="1" checked="checked"/>
           							<label for="radio_1" style="min-width: 70px;">Yes</label>	
									<input type="radio" class="with-gap" id="radio_2" name="display_class" value="0"/>
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
					</div>
					
					
					<div class="header">
						<h2 style="text-align: center;">
							Item Limits Settings
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- input text -->
						<p class="lead" align="left">
                        	Level
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Item\'s level limit.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="limit_level" value="' . $get_config->limit_level . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						<!-- input text -->
						<p class="lead" align="left">
                        	Options
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Item\'s options limit.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="limit_option" value="' . $get_config->limit_option . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						<!-- input text -->
						<p class="lead" align="left">
                        	Excelent Options
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Item\'s excelent options limit.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="limit_exc_option" value="' . $get_config->limit_exc_option . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
					</div>
					
					
					<div class="header">
						<h2 style="text-align: center;">
							Credits Cost Settings
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- input text -->
						<p class="lead" align="left">
                        	Level
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Credits per item level.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="credits_level" value="' . $get_config->credits_level . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						<!-- input text -->
						<p class="lead" align="left">
                        	Luck
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Credits for item\'s luck option.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="credits_luck" value="' . $get_config->credits_luck . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						<!-- input text -->
						<p class="lead" align="left">
                        	Skill
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Credits for item\'s skill option.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="credits_skill" value="' . $get_config->credits_skill . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						<!-- input text -->
						<p class="lead" align="left">
                        	Option
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Credits for item option.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="credits_option" value="' . $get_config->credits_option . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						<!-- input text -->
						<p class="lead" align="left">
                        	Ancient I, Ancient II
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Credit cost for both ancient options.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
       Ancient I: <input type="text" class="form-control" name="credits_ancient1" value="' . $get_config->credits_ancient1 . '" size="3" style="width: 50%;float: right;height: 20px;"><br>
       Ancient II: <input type="text" class="form-control" name="credits_ancient2" value="' . $get_config->credits_ancient2 . '" size="3" style="width: 50%;float: right;height: 20px;"><br>
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						<!-- input text -->
						<p class="lead" align="left">
                        	Refined
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Credits for item\'s refined option.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="credits_refined" value="' . $get_config->credits_refined . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						<!-- input text -->
						<p class="lead" align="left">
                        	Harmony
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Credits for item\'s harmony option.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="credits_harmony" value="' . $get_config->credits_harmony . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						<!-- input text -->
						<p class="lead" align="left">
                        	Weapon Options
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Credits for weapon options.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
       Option 1: <input type="text" class="form-control" name="credits_weapon1" value="' . $get_config->credits_weapon1 . '" size="3" style="width: 50%;float: right;height: 20px;"><br>
	   Option 2: <input type="text" class="form-control" name="credits_weapon2" value="' . $get_config->credits_weapon2 . '" size="3" style="width: 50%;float: right;height: 20px;"><br>
	   Option 3: <input type="text" class="form-control" name="credits_weapon3" value="' . $get_config->credits_weapon3 . '" size="3" style="width: 50%;float: right;height: 20px;"><br>
	   Option 4: <input type="text" class="form-control" name="credits_weapon4" value="' . $get_config->credits_weapon4 . '" size="3" style="width: 50%;float: right;height: 20px;"><br>
	   Option 5: <input type="text" class="form-control" name="credits_weapon5" value="' . $get_config->credits_weapon5 . '" size="3" style="width: 50%;float: right;height: 20px;"><br>
	   Option 6: <input type="text" class="form-control" name="credits_weapon6" value="' . $get_config->credits_weapon6 . '" size="3" style="width: 50%;float: right;height: 20px;"><br>
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						<!-- input text -->
						<p class="lead" align="left">
                        	Armor Options
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Credits for armor options.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
       Option 1: <input type="text" class="form-control" name="credits_armor1" value="' . $get_config->credits_armor1 . '" size="3" style="width: 50%;float: right;height: 20px;"><br>
	   Option 2: <input type="text" class="form-control" name="credits_armor2" value="' . $get_config->credits_armor2 . '" size="3" style="width: 50%;float: right;height: 20px;"><br>
	   Option 3: <input type="text" class="form-control" name="credits_armor3" value="' . $get_config->credits_armor3 . '" size="3" style="width: 50%;float: right;height: 20px;"><br>
	   Option 4: <input type="text" class="form-control" name="credits_armor4" value="' . $get_config->credits_armor4 . '" size="3" style="width: 50%;float: right;height: 20px;"><br>
	   Option 5: <input type="text" class="form-control" name="credits_armor5" value="' . $get_config->credits_armor5 . '" size="3" style="width: 50%;float: right;height: 20px;"><br>
	   Option 6: <input type="text" class="form-control" name="credits_armor6" value="' . $get_config->credits_armor6 . '" size="3" style="width: 50%;float: right;height: 20px;"><br>
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						<!-- input text -->
						<p class="lead" align="left">
                        	Wings Options
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Credits for wing options.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
       Option 1: <input type="text" class="form-control" name="credits_wing1" value="' . $get_config->credits_wing1 . '" size="3" style="width: 50%;float: right;height: 20px;"><br>
	   Option 2: <input type="text" class="form-control" name="credits_wing2" value="' . $get_config->credits_wing2 . '" size="3" style="width: 50%;float: right;height: 20px;"><br>
	   Option 3: <input type="text" class="form-control" name="credits_wing3" value="' . $get_config->credits_wing3 . '" size="3" style="width: 50%;float: right;height: 20px;"><br>
	   Option 4: <input type="text" class="form-control" name="credits_wing4" value="' . $get_config->credits_wing4 . '" size="3" style="width: 50%;float: right;height: 20px;"><br>
	   Option 5: <input type="text" class="form-control" name="credits_wing5" value="' . $get_config->credits_wing5 . '" size="3" style="width: 50%;float: right;height: 20px;"><br>
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
<input type="hidden" name="save_settings">
</form>';
}
?> 