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
    if ($_POST['map_number'] == 'x' || empty($_POST['map_pos_y']) || empty($_POST['map_pos_x'])) {
        echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
    } else {
        $save_1 = new_config_xml('../engine/config_mods/unstuck_character_settings', 'map_number', safe_input($_POST['map_number'], ''));
        $save_2 = new_config_xml('../engine/config_mods/unstuck_character_settings', 'map_pos_x', safe_input($_POST['map_pos_x'], ''));
        $save_3 = new_config_xml('../engine/config_mods/unstuck_character_settings', 'map_pos_y', safe_input($_POST['map_pos_y'], ''));
        echo notice_message_admin('Settings successfully saved', 1, 0, 'index.php?get=usercp_unstuck_character_settings');
    }
    
} else {
    if (isset($_POST['module_active'])) {
        $save_status = new_config_xml('../engine/config_mods/unstuck_character_settings', 'active', safe_input($_POST['module_active'], ''));
    }
    $get_config = simplexml_load_file('../engine/config_mods/unstuck_character_settings.xml');
    echo '
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2 style="text-align: center;">
							Unstuck Character Settings
						</h2>
					</div>
					<div class="body">
					<form action="" method="post" id="form1">';
					 	if ($get_config->active == '1') {
        					echo '<p class="lead" align="left" style="background: #0C0;padding: 5px 0px 5px 5px">Unstuck Character is active.
								<button type="submit" form="form1" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 20px;margin-top: 0;">Turn Unstuck Character Off</button></p>
								<input type="hidden" name="module_active" value="0">';
    					} elseif ($get_config->active == '0') {
        					echo '<p class="lead" align="left" style="background: #C00;padding: 5px 0px 5px 5px">Unstuck Character is inactive.
								<button type="submit" form="form1" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 20px;margin-top: 0;">Turn Unstuck Character On</button></p>
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
							Unstuck Character Settings
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- input select -->
						<p class="lead" align="left">
                        	Map
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Choose a map where you want character to be teleported after using unstuck character feature.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	
									<div style="border-bottom: none;">
                                    	<select name="map_number" style="border: none;font-size: 14px;float: right;width: 100%;">
                                        <option value="x">Choose a map</option>
        								<optgroup label="---------------">';
    									foreach ($maps_codes as $map_id => $map_name) {
        									if ($get_config->map_number == $map_id) {
            									echo '<option value="' . $map_id . '" selected="selected">' . $map_name . '</option>';
        									} else {
            									echo '<option value="' . $map_id . '" >' . $map_name . '</option>';
        									}
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
                        	Map Pos X
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Set the X coordonate of chosen map.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="map_pos_x" value="' . $get_config->map_pos_x . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	Map Pos Y
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Set the Y coordonate of chosen map.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="map_pos_y" value="' . $get_config->map_pos_y . '">
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