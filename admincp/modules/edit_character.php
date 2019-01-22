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
    if (empty($_GET['id'])) {
        echo notice_message_admin('Unable to proceed your request.', '0', '1', '0');
    } else {
        $id   = safe_input($_GET['id'], '');
        $info = $core_db->Execute("Select mu_id,Name,AccountID,CtlCode,Class,cLevel,Resets,Grand_Resets,MapNumber,MapPosX,MapPosY,PkLevel,PkCount,Strength,Dexterity,Vitality,Energy,Leadership,LevelUpPoint,Money,SCFMasterPoints,SCFPCPoints,SCFMasterLevel from Character where mu_id=?", array(
            $id
        ));
        if ($info->EOF) {
            echo notice_message_admin('Unable to find character.', '0', '1', '0');
        } else {
            if (isset($_POST['edit'])) {
                if ($_POST['class'] == 'x' || $_POST['mode'] == 'x' || $_POST['map'] == 'x' || $_POST['pklevel'] == 'x') {
                    echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
                } else {
                    if (account_online($info->fields[2]) === true) {
                        echo notice_message_admin('Character is connected in game.', '0', '1', '0');
                    } else {
                        if (empty($_POST['level'])) {
                            $level = '1';
                        } else {
                            $level = safe_input($_POST['level'], '');
                        }
                        if (empty($_POST['resets'])) {
                            $resets = '0';
                        } else {
                            $resets = safe_input($_POST['resets'], '');
                        }
                        if (empty($_POST['grand_resets'])) {
                            $grand_resets = '0';
                        } else {
                            $grand_resets = safe_input($_POST['grand_resets'], '');
                        }
                        if (empty($_POST['mapx'])) {
                            $mapx = '60';
                        } else {
                            $mapx = safe_input($_POST['mapx'], '');
                        }
                        if (empty($_POST['mapy'])) {
                            $mapy = '60';
                        } else {
                            $mapy = safe_input($_POST['mapy'], '');
                        }
                        if (empty($_POST['pkcount'])) {
                            $pkcount = '0';
                        } else {
                            $pkcount = safe_input($_POST['pkcount'], '');
                        }
                        if (empty($_POST['str'])) {
                            $str = '25';
                        } else {
                            $str = safe_input($_POST['str'], '');
                        }
                        if (empty($_POST['agi'])) {
                            $agi = '25';
                        } else {
                            $agi = safe_input($_POST['agi'], '');
                        }
                        if (empty($_POST['vit'])) {
                            $vit = '25';
                        } else {
                            $vit = safe_input($_POST['vit'], '');
                        }
                        if (empty($_POST['eng'])) {
                            $eng = '25';
                        } else {
                            $eng = safe_input($_POST['eng'], '');
                        }
                        if (empty($_POST['cmd'])) {
                            $cmd = '25';
                        } else {
                            $cmd = safe_input($_POST['cmd'], '');
                        }
                        if (empty($_POST['levelup'])) {
                            $levelup = '0';
                        } else {
                            $levelup = safe_input($_POST['levelup'], '');
                        }
                        if (empty($_POST['zen'])) {
                            $zen = '1';
                        } else {
                            $zen = safe_input($_POST['zen'], '');
                        }
                        if (empty($_POST['master_level'])) {
                            $master_level = '1';
                        } else {
                            $master_level = safe_input($_POST['master_level'], '');
                        }
                        if (empty($_POST['master_points'])) {
                            $master_points = '0';
                        } else {
                            $master_points = safe_input($_POST['master_points'], '');
                        }
                        if (empty($_POST['pc_points'])) {
                            $pc_points = '0';
                        } else {
                            $pc_points = safe_input($_POST['pc_points'], '');
                        }
                        $update = $core_db->Execute("update Character set CtlCode=?,Class=?,cLevel=?,Resets=?,Grand_Resets=?,MapNumber=?,MapPosX=?,MapPosY=?,PkLevel=?,PkCount=?,Strength=?,Dexterity=?,Vitality=?,Energy=?,Leadership=?,LevelUpPoint=?,Money=?,SCFMasterPoints=?,SCFPCPoints=?,SCFMasterLevel=? where mu_id=?", array(
                            safe_input($_POST['mode'], ''),
                            safe_input($_POST['class'], ''),
                            $level,
                            $resets,
                            $grand_resets,
                            safe_input($_POST['map'], ''),
                            $mapx,
                            $mapy,
                            safe_input($_POST['pklevel'], ''),
                            $pkcount,
                            $str,
                            $agi,
                            $vit,
                            $eng,
                            $cmd,
                            $levelup,
                            $zen,
                            $master_points,
                            $pc_points,
                            $master_level,
                            $id
                        ));
                        if ($update) {
                            echo notice_message_admin('Character successfully edited', 1, 0, 'index.php?get=edit_character&mod=edit&id=' . $id . '');
                        } else {
                            echo notice_message_admin('Unable to edit character, system error.', '0', '1', '0');
                        }
                    }
                }
            } else {
                echo '
<div align="right" style="width: 90%; margin-bottom: 2px;"><a href="index.php?get=edit_character">[Return Search Character]</a></div>

<form action="" name="form_edit" method="post" id="form2">
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card" style="margin-bottom: 0px;">
					<div class="header">
						<h2 style="text-align: center;">
							Edit Character (' . htmlspecialchars($info->fields[1]) . ')
						</h2>
					</div>
					<div class="body">
                    	
						<!-- input text -->
						<p class="lead" align="left">
                        	User ID
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Character\'s User ID.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<a href="index.php?get=edit_account&get_edit=' . $info->fields[2] . '">' . htmlspecialchars($info->fields[2]) . '</a>
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input select -->
						<p class="lead" align="left">
                        	Mode
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Character\'s mode.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	
									<div style="border-bottom: none;">
                                    	<select name="mode" style="border: none;font-size: 14px;float: right;width: 100%;">
										<option value="x">Choose mode</option>
    									<optgroup label="---------------">';
                						foreach ($characters_ctlcode as $mode_id => $mode_name) {
                    						if ($info->fields[3] == $mode_id) {
                        						echo '<option value="' . $mode_id . '" selected="selected">' . $mode_name . '</option>';
                        
                    						} else {
                        						echo '<option value="' . $mode_id . '">' . $mode_name . '</option>';
                    						}
                    
                						}
											echo '
                                		</select>
                                    </div>
									
                                </div>
                            </div>
                        </div>
						<!-- #END# input select -->
						
						<!-- input select -->
						<p class="lead" align="left">
                        	Class
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Character\'s class.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	
									<div style="border-bottom: none;">
                                    	<select name="class" style="border: none;font-size: 14px;float: right;width: 100%;">
										<option value="x">Choose a class</option>
										<optgroup label="---------------">';
                						foreach ($characters_class as $class_id => $class_name) {
                    						if ($info->fields[4] == $class_id) {
                        						echo '<option value="' . $class_id . '" selected="selected">' . $class_name[0] . '</option>';
                        
                    						} else {
                        						echo '<option value="' . $class_id . '">' . $class_name[0] . '</option>';
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
                        	Level / Resets / Grand Resets
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Character\'s level,resets and grand resets.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
	Level: <input type="text" class="form-control" name="level" value="' . htmlspecialchars($info->fields[5]) . '">
	Resets: <input type="text" class="form-control" name="resets" value="' . htmlspecialchars($info->fields[6]) . '">
	Grand Resets: <input type="text" class="form-control" name="grand_resets" value="' . htmlspecialchars($info->fields[7]) . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input select -->
    
						<p class="lead" align="left">
                        	Map / Pos X / Pos Y
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Character\'s curent location.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	
									<div style="border-bottom: none;">
                                    	<select name="map" style="border: none;font-size: 14px;float: right;width: 100%;">
											<option value="x">Choose a map</option>
											<optgroup label="---------------">';
                								foreach ($maps_codes as $map_id => $map_name) {
                    								if ($info->fields[8] == $map_id) {
                        								echo '<option value="' . $map_id . '" selected="selected">' . $map_name . '</option>';
                        
                    								} else {
                        								echo '<option value="' . $map_id . '">' . $map_name . '</option>';
                    								}
                    
                								}
											echo '
                                		</select>
							Pos X: <input type="text" class="form-control" name="mapx" value="' . htmlspecialchars($info->fields[9]) . '">
							Pos Y: <input type="text" class="form-control" name="mapy" value="' . htmlspecialchars($info->fields[10]) . '">
                                    </div>
									
                                </div>
                            </div>
                        </div>
						<!-- #END# input select -->
						
						<!-- input select -->
						<p class="lead" align="left">
                        	PK Status / PK Count
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Character\'s pk status and pk count.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	
									<div style="border-bottom: none;">
                                    	<select name="pklevel" style="border: none;font-size: 14px;float: right;width: 100%;">
                                        <option value="x">Choose a status</option>
										<optgroup label="---------------">';
										foreach ($pk_status_variables as $pk_id => $pk_name) {
                    						if ($info->fields[11] == $pk_id) {
                        						echo '<option value="' . $pk_id . '" selected="selected">' . $pk_name . '</option>';
                        
                    						} else {
                        						echo '<option value="' . $pk_id . '">' . $pk_name . '</option>';
                    						}
										}
											echo '
                                		</select>
					PK Count: <input type="text" class="form-control" name="pkcount" value="' . htmlspecialchars($info->fields[12]) . '">
                                    </div>
									
                                </div>
                            </div>
                        </div>
						<!-- #END# input select -->
						
						<!-- input text -->
   
						<p class="lead" align="left">
                        	Strength / Agility / Vitality / Energy / Command
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Character\'s strength, agility, vitality, energy and command.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
	Str: <input type="text" class="form-control" name="str" value="' . htmlspecialchars($info->fields[13]) . '">
    Agi: <input type="text" class="form-control" name="agi" value="' . htmlspecialchars($info->fields[14]) . '">
    Vit: <input type="text" class="form-control" name="vit" value="' . htmlspecialchars($info->fields[15]) . '">
    Eng: <input type="text" class="form-control" name="eng" value="' . htmlspecialchars($info->fields[16]) . '">
    Cmd: <input type="text" class="form-control" name="cmd" value="' . htmlspecialchars($info->fields[17]) . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	Levelup Points
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Character\'s levelup points.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="levelup" value="' . htmlspecialchars($info->fields[18]) . '">
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
                            	Character\'s zen.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="zen" value="' . htmlspecialchars($info->fields[19]) . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	MasterLevel / MasterPoints / PCPoints
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Character\'s MasterLevel, MasterPoints and PCPoints.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
	MasterLevel: <input type="text" class="form-control" name="master_level" value="' . htmlspecialchars($info->fields[22]) . '">
	MasterPoints: <input type="text" class="form-control" name="master_points" value="' . htmlspecialchars($info->fields[20]) . '"> 
	PCPoints: <input type="text" class="form-control" name="pc_points" value="' . htmlspecialchars($info->fields[21]) . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
                        
                        
						<p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100%;margin-bottom: 0px;">
                                        <button type="submit" form="form2" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 100px;margin-top: 5px;">Edit Character</button>
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
    }
} else {
    echo '
	
<form action="" name="form_edit" method="post" id="form1">
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card" style="margin-bottom: 0px;">
					<div class="header">
						<h2 style="text-align: center;">
							Search Character
						</h2>
					</div>
					<div class="body">
                    	
						<!-- input text -->
						<p class="lead" align="left">
                        	Character Name
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enter character name which you want to find.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">';
									if (isset($_SESSION['search_character'])) {
        								if (isset($_POST['character'])) {
            								echo '<input type="text" class="form-control" name="character" value="' . $_POST['character'] . '">';
        								} else {
            								echo '<input type="text" class="form-control" name="character" value="' . $_SESSION['search_character'] . '">';
        								}
        
    								} else {
        								echo '<input type="text" class="form-control" name="character">';
    								}
                                    echo'	
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
                        <!-- inpunt radio -->
						<p class="lead" align="left">
                        	Search Criteria
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Select search type.<br>
								<b>Exact Match</b> - Will search for exact match of character name you enter.<br>
								<b>Partial Match</b> - Will search for a partial match of character name you enter.<br>
								Note: If you choose \'Partial Match\' only first 100 matches will be displayed.
							</div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">';
if (isset($_SESSION['search_t'])) {
	if (isset($_POST['search_t'])) {
		switch ($_POST['search_t']) {
			case '0':
				echo '
				<div class="demo-radio-button">
					<input type="radio" class="with-gap" id="radio_1" name="search_t" value="1"/>
           			<label for="radio_1" style="min-width: 70px;">Exact Match</label>	
					<input type="radio" class="with-gap" id="radio_2" name="search_t" value="0" checked="checked"/>
            		<label for="radio_2" style="min-width: 70px;">Partial Match</label>
    			</div>';
			break;
            case '1':
            	echo '
				<div class="demo-radio-button">
					<input type="radio" class="with-gap" id="radio_1" name="search_t" value="1" checked="checked"/>
           			<label for="radio_1" style="min-width: 70px;">Exact Match</label>	
					<input type="radio" class="with-gap" id="radio_2" name="search_t" value="0"/>
            		<label for="radio_2" style="min-width: 70px;">Partial Match</label>
    			</div>';
            break;
		}
	} else {
		switch ($_SESSION['search_t']) {
			case '0':
				echo '
				<div class="demo-radio-button">
					<input type="radio" class="with-gap" id="radio_1" name="search_t" value="1"/>
           			<label for="radio_1" style="min-width: 70px;">Exact Match</label>	
					<input type="radio" class="with-gap" id="radio_2" name="search_t" value="0" checked="checked"/>
            		<label for="radio_2" style="min-width: 70px;">Partial Match</label>
    			</div>';
			break;
			case '1':
				echo '
				<div class="demo-radio-button">
					<input type="radio" class="with-gap" id="radio_1" name="search_t" value="1" checked="checked"/>
           			<label for="radio_1" style="min-width: 70px;">Exact Match</label>	
					<input type="radio" class="with-gap" id="radio_2" name="search_t" value="0"/>
            		<label for="radio_2" style="min-width: 70px;">Partial Match</label>
    			</div>';
			break;
		}
	}
} else {
	echo '
	<div class="demo-radio-button">
					<input type="radio" class="with-gap" id="radio_1" name="search_t" value="1" checked="checked"/>
           			<label for="radio_1" style="min-width: 70px;">Exact Match</label>	
					<input type="radio" class="with-gap" id="radio_2" name="search_t" value="0"/>
            		<label for="radio_2" style="min-width: 70px;">Partial Match</label>
    			</div>';
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
                                        <button type="submit" form="form1" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 100px;margin-top: 5px;">Search</button>
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
<input type="hidden" name="search">
</form>';
    
    if (isset($_POST['search'])) {
        if (!empty($_POST['character'])) {
            $_SESSION['search_character'] = $_POST['character'];
            $_SESSION['search_t']         = $_POST['search_t'];
            $character                    = safe_input($_POST['character'], '');
            
            echo '
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card" style="margin-bottom: 0px;">
					<div class="header">
						<h2 style="text-align: center;">
							Search Results
						</h2>
					</div>
					<div class="body">
                        
                        <!-- input table -->
                        <!-- <div class="body table-responsive"> -->
                        <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Character</th>
                                        <th>User ID</th>
                                        <th>Controls</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px;">';
								if ($_POST['search_t'] == '1') {
                					$char = $core_db->Execute("Select mu_id,Name,AccountID from Character where Name=?", array($character));
                					if (!$char->EOF) {
                    					header('Location: index.php?get=edit_character&mod=edit&id=' . $char->fields[0] . '');
                    
                					} else {
                    					$not_found = '1';
                					}
                
            					} elseif ($_POST['search_t'] == '0') {
                					$char  = $core_db->Execute("Select top 100 mu_id,Name,AccountID from Character where Name like ?", array('%' . $character . '%'));
                					$count = 0;
                					while (!$char->EOF) {
                    					$count++;
                    					echo '
										<tr>
            								<th scope="row"><strong>' . htmlspecialchars($char->fields[1]) . '</strong></th>
            								<td><a href="index.php?get=edit_account&get_edit=' . $char->fields[2] . '">' . htmlspecialchars($char->fields[2]) . '</a></td>
            								<td><a href="index.php?get=edit_character&mod=edit&id=' . $char->fields[0] . '">[Edit]</a></td>
            							</tr>';
                    					$char->MoveNext();
                					}
                					if ($count == '0') {
                    					echo '
										<tr>
											<td align="center" class="panel_text_alt_list" colspan="5">No Accounts Found</td>
										</tr>';
                					}
                
            					}
            
            					if ($not_found == '1') {
                					echo '
									<tr>
										<td align="center" class="panel_text_alt_list" colspan="3">No Characters Found</td>
									</tr>';
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
}
?> 