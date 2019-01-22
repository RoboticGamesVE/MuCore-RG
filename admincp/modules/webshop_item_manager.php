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
require('../engine/webshop.php');
require('../engine/webshop_custom_variables.php');
if ($_GET['m'] == 'new') {
    $insert_item = $core_db->Execute("INSERT INTO MUCore_Shop_Items (i_type,i_id,name,credits,i_skill_option,i_option,size_x,size_y,i_default_durability,category,i_exc_option,i_max_level,i_luck_option,i_stick_level,serial,class_requirement,exc_anc) VALUES ('14','13','New Item','0','0','0','1','1','','14','0',0,0,0,1,'999','0')");
    if ($insert_item) {
        $take_last_item = $core_db->Execute("Select top 1 id from MUCore_Shop_Items order by id desc");
        
        
        echo notice_message_admin('Item successfully created, you wil be redirected to edit panel.', 1, 0, 'index.php?get=webshop_item_manager&m=edit&id=' . $take_last_item->fields[0] . '');
        
    }
    
} elseif ($_GET['m'] == 'edit') {
    $id = safe_input($_GET['id'], '');
    if (isset($_POST['edit'])) {
        if (empty($_POST['i_name'])) {
            echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
        } else {
            $i_serial = '1';
            
            if (@$_POST['credits'] == '') {
                $_POST['credits'] = '0';
            }
            if (@!$_POST['i_luck']) {
                @!$_POST['i_luck'] = '0';
            }
            if (@!$_POST['i_skill']) {
                $_POST['i_skill'] = '0';
            }
            if (@$_POST['i_stick_level'] == '0') {
                $_POST['i_stick_level'] = '';
            }
            if (@$_POST['i_max_excelent_option'] == '0') {
                $_POST['i_max_excelent_option'] = '';
            }
            if (@$_POST['i_max_option'] == '0') {
                $_POST['i_max_option'] = '';
            }
            if (@$_POST['i_max_level'] == '0') {
                $_POST['i_max_level'] = '';
            }
            if (@!$_POST['i_refined']) {
                $_POST['i_refined'] = '0';
            }
            if (@!$_POST['i_harmony']) {
                $_POST['i_harmony'] = '0';
            }
            
            if (@!$_POST['i_sell']) {
                $_POST['i_sell'] = '0';
            }
            
            
            $count_class_id = 0;
            foreach ($_POST['class_requirement'] as $class_post_id => $class_post_var) {
                $class_requirement[] = $class_post_var;
                $count_class_id++;
            }
            
            if ($count_class_id <= 0) {
                $i_class = '999';
            } else {
                $i_class = implode(',', $class_requirement);
                
            }
            
            
            $update_item = $core_db->Execute("Update MUCore_Shop_Items set 
        name=?,
        i_id=?,
        i_type=?,
        i_stick_level=?,
        category=?,
        size_x=?,
        size_y=?,
        i_option=?,
        i_exc_option=?,
        i_max_level=?,
        i_max_option=?,
        i_max_excelent_option=?,
        i_default_durability=?,
        i_maximum_durability=?,
        i_harmony_option=?,
        i_refined_option=?,
        i_socket_option=?,
        i_luck_option=?,
        i_skill_option=?,
        class_requirement=?,
        ancient_id=?,
        credits=?,
        i_stock=?,
        serial=?,
        i_sell=?,
        i_image=?, 
        exc_anc=? where id=?", array(
                $_POST['i_name'],
                $_POST['i_id'],
                $_POST['i_type'],
                $_POST['i_stick_level'],
                $_POST['i_category'],
                $_POST['i_x'],
                $_POST['i_y'],
                $_POST['i_option'],
                $_POST['i_excelent_option'],
                $_POST['i_max_level'],
                $_POST['i_max_option'],
                $_POST['i_max_excelent_option'],
                $_POST['i_default_durability'],
                $_POST['i_max_durability'],
                $_POST['i_harmony'],
                $_POST['i_refined'],
                $_POST['i_socket'],
                $_POST['i_luck'],
                $_POST['i_skill'],
                $i_class,
                $_POST['i_ancient'],
                $_POST['credits'],
                $_POST['i_stock'],
                $i_serial,
                $_POST['i_sell'],
                $_POST['i_image'],
                $_POST['exc_anc'],
                $id
            ));
            if ($update_item) {
                echo notice_message_admin('Item successfully edited', 1, 0, 'index.php?get=webshop_item_manager&m=edit&id=' . $id . '');
            }
            
        }
    } else {
        $item = $core_db->Execute("Select 
        id,
        name,
        i_id,
        i_type,
        i_stick_level,
        category,
        size_x,
        size_y,
        i_option,
        i_exc_option,
        i_max_level,
        i_max_option,
        i_max_excelent_option,
        i_default_durability,
        i_maximum_durability,
        i_harmony_option,
        i_refined_option,
        i_socket_option,
        i_luck_option,
        i_skill_option,
        class_requirement,
        ancient_id,
        credits,
        i_stock,
        i_sell,
        i_image,exc_anc from MUCore_Shop_Items where id=?", array(
            $id
        ));
        echo '

<div align="right" style="width: 90%; margin-bottom: 2px;"><a href="index.php?get=webshop_item_manager">[Return Search Item]</a></div>
	
<form action="" method="post" id="form2">
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2 style="text-align: center;">
							Edit Item (' . htmlspecialchars($item->fields[1]) . ')
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- input checkbox -->
                            <p class="lead" align="left">
                        	On Sell
                    		</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	If checked item will be available for sell on webshop.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="demo-checkbox">
                                
                                <input id="basic_checkbox_1" class="filled-in" type="checkbox" name="i_sell" value="1"';
								if ($item->fields[24] == '1') {
            						echo 'checked="checked"';
        						}
								echo '>
                                <label for="basic_checkbox_1">Yes</label>
                                
                            	</div>
                            </div>
                        </div>
                        <!-- #END# input checkbox -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	Credits Cost
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	How much dose this item cost in webshop.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="credits" value="' . $item->fields[22] . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	Item Stock
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Set how many items like this can be sell on webshop.<br>
								<b>Note:</b> Leave empty for unlimited sell item.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="i_stock" value="' . $item->fields[23] . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
                        
						<p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100%;margin-bottom: 0px;">
                                        <button type="submit" form="form2" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 100px;margin-top: 5px;">Edit Item</button>
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


<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card" style="margin-bottom: 0px;">
					<div class="body">
						
						<!-- input text -->
						<p class="lead" align="left">
                        	Name
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Item\'s name.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="i_name" value="' . htmlspecialchars($item->fields[1]) . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	Image Path
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Item\'s image path.<br>
								<b>Note:</b> Leave empty if you want to use default.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
										Default: ' . item_image($item->fields[2], $item->fields[3], '0', $item->fields[4]) . '
										Custom: <input type="text" class="form-control" name="i_image" value="' . $item->fields[25] . '" style="width: 80%;float: right;height: 20px;">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input select -->
						<p class="lead" align="left">
                        	Category
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Item\'s category.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	
									<div style="border-bottom: none;">
                                    	<select name="i_category" style="border: none;font-size: 14px;float: right;width: 100%;">
                                        	<option>Choose Cateogry</option>
    										<optgroup label="---------------">';
        foreach ($items_categories as $category_id => $category_value) {
            if ($category_id == $item->fields[5]) {
                echo '<option value="' . $category_id . '" selected>' . $category_value . '</option>';
                
            } else {
                echo '<option value="' . $category_id . '">' . $category_value . '</option>';
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
                        	Size
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Item\'s X and Y size.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	X: <input type="text" class="form-control" name="i_x" value="' . $item->fields[6] . '" style="width: 25%;display: initial;margin-left: 20px;">
										Y: <input type="text" class="form-control" name="i_y" value="' . $item->fields[7] . '" style="width: 25%;display: initial;margin-left: 20px;">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	Type / Index
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Item\'s type and index.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	Type: <input type="text" class="form-control" name="i_type" value="' . $item->fields[3] . '" style="width: 25%;display: initial;margin-left: 20px;">
										Index: <input type="text" class="form-control" name="i_id" value="' . $item->fields[2] . '" style="width: 25%;display: initial;margin-left: 20px;">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input select -->
						<p class="lead" align="left">
                        	Ancient Group / Excelent Ancient Options
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Item\'s ancient group.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	
									<div style="border-bottom: none;">
                                    	<select name="i_ancient" style="border: none;font-size: 14px;float: right;width: 100%;">
                                        	<option>Choose Ancient Group</option>
    										<optgroup label="---------------">';
        foreach ($items_ancient_groups as $ancient_id => $ancient_var) {
            if ($ancient_id == $item->fields[21]) {
                echo '<option value="' . $ancient_id . '" selected>' . $ancient_var . '</option>';
            } else {
                echo '<option value="' . $ancient_id . '">' . $ancient_var . '</option>';
            }
        }
        								echo '
                                		</select>
										Enable Excelent Options:   <input id="basic_checkbox_2" class="filled-in" type="checkbox" name="exc_anc" value="1"';
        						if ($item->fields[26] == '1') {
            						echo 'checked="checked"';
        						}
								echo '>
                                <label for="basic_checkbox_2">Yes</label>
										
                                    </div>
									
                                </div>
                            </div>
                        </div>
						<!-- #END# input select -->
						
						<!-- input select -->
						<p class="lead" align="left">
                        	Option / Excelent Option, Types
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Item\'s option and excelent option types.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	
									<div style="border-bottom: none;">
									Option Type:
                                    	<select name="i_option" style="border: none;font-size: 14px;float: right;width: 100%;">
                                        	<option>Choose Option</option>
    										<optgroup label="---------------">';
        foreach ($items_options_type as $i_opt_id => $i_opt_var) {
            if ($i_opt_id == $item->fields[8]) {
                echo '<option value="' . $i_opt_id . '" selected>' . $i_opt_var . '</option>';
                
            } else {
                echo '<option value="' . $i_opt_id . '">' . $i_opt_var . '</option>';
            }
        }
        								echo '
                                		</select>
									
									
									Excelent Option Type:  
                                    	<select name="i_excelent_option" style="border: none;font-size: 14px;float: right;width: 100%;">
                                        	<option>Choose Option</option>
											<optgroup label="---------------">';
        foreach ($items_excelent_options_type as $i_exc_opt_id => $i_exc_opt_var) {
            if ($i_exc_opt_id == $item->fields[9]) {
                echo '<option value="' . $i_exc_opt_id . '" selected>' . $i_exc_opt_var . '</option>';
                
            } else {
                echo '<option value="' . $i_exc_opt_id . '">' . $i_exc_opt_var . '</option>';
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
                        	Maximum: Level / Options / Excelent Options
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Item\'s maximum level, options and excelent options.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	Level: <input type="text" class="form-control" name="i_max_level" value="' . $item->fields[10] . '" style="width: 10%;display: initial;">
										Options: <input type="text" class="form-control" name="i_max_option" value="' . $item->fields[11] . '" style="width: 10%;display: initial;">
										Excelent Opt: <input type="text" class="form-control" name="i_max_excelent_option" value="' . $item->fields[12] . '" style="width: 10%;display: initial;">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	Durability
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Item\'s durability.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="i_default_durability" value="' . $item->fields[13] . '">
										<input type="hidden" name="i_max_durability" value="' . $item->fields[14] . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input checkbox -->
                            <p class="lead" align="left">
                        		Game Options
                    		</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Item\'s in game options.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="demo-checkbox">
                                
                                <input id="basic_checkbox_3" class="filled-in" type="checkbox" name="i_harmony" value="1"';
        						if ($item->fields[15] == '1') {
            						echo 'checked="checked"';
        						}
        						echo '>
								<label for="basic_checkbox_3">Add Harmony:</label><br>
								
								
                                <input id="basic_checkbox_4" class="filled-in" type="checkbox" name="i_refined" value="1"';
        						if ($item->fields[16] == '1') {
            						echo 'checked="checked"';
        						}
        						echo '> 
								<label for="basic_checkbox_4">Add Refined:</label><br>
								
								
                                <input id="basic_checkbox_5" class="filled-in" type="checkbox" name="i_socket" value="1"';
        						if ($item->fields[17] == '1') {
            						echo 'checked="checked"';
        						}
        						echo '> 
								<label for="basic_checkbox_5">Can Be Socked:</label><br>
								
								
                                <input id="basic_checkbox_6" class="filled-in" type="checkbox" name="i_luck" value="1"';
        						if ($item->fields[18] == '1') {
            						echo 'checked="checked"';
        						}
        						echo '> 
								<label for="basic_checkbox_6">Luck:</label><br>
								
								
                                <input id="basic_checkbox_7" class="filled-in" type="checkbox" name="i_skill" value="1"';
        						if ($item->fields[19] == '1') {
            						echo 'checked="checked"';
        						}
       							 echo '> 
								<label for="basic_checkbox_7">Skill:</label><br>
                                
                            	</div>
                            </div>
                        </div>
                        <!-- #END# input checkbox -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	Stick Level
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Item\'s stick level.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="i_stick_level" value="' . $item->fields[4] . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
						<!-- input checkbox -->
                            <p class="lead" align="left">
                        		Infos
                    		</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Item\'s infos.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="demo-checkbox">
                                
								<b>Can be equiped by:</b><br>';
        $i_class_requirement = explode(',', $item->fields[20]);
        
        foreach ($characters_class as $class_id => $class_var) {
            if (in_array($class_id, $i_class_requirement)) {
                echo '
				<input id="basic_checkbox_2" class="filled-in" type="checkbox" name="class_requirement[]" value="' . $class_id . '" checked="checked"> 
				<label for="basic_checkbox_2">' . $class_var[0] . '</label><br>';
            } else {
                echo '
				<input id="basic_checkbox_2" class="filled-in" type="checkbox" name="class_requirement[]" value="' . $class_id . '"> 
				<label for="basic_checkbox_2">' . $class_var[0] . '</label><br>';
            }
        }
        echo '
                            	</div>
                            </div>
                        </div>
                        <!-- #END# input checkbox -->
						
						<p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100%;margin-bottom: 0px;">
                                        <button type="submit" form="form2" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 100px;margin-top: 5px;">Edit Item</button>
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
<input type="hidden" name="i_serial" value="1">
</form>';
        
        
    }
    
} elseif ($_GET['m'] == 'delete') {
    $id     = safe_input($_GET['id'], '');
    $delete = $core_db->Execute("Delete from MUCore_Shop_Items where id=?", array(
        $id
    ));
    if ($delete) {
        echo notice_message_admin('Item successfully deleted', 1, 0, 'index.php?get=webshop_item_manager');
    }
    
} else {
    echo '
<form action="index.php?get=webshop_item_manager" name="form_edit" method="post" id="form2">
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card" style="margin-bottom: 0px;">
					<div class="header">
						<h2 style="text-align: center;">
							Search Item
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- input text -->
						<p class="lead" align="left">
                        	Item Name
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enter the name of item which you want to find.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="item_name" placeholder="Item">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
                        
						<p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100%;margin-bottom: 0px;">
										<a href="index.php?get=webshop_item_manager&m=new">[Create New Item]</a>
										
                                        <button type="submit" form="form2" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 100px;margin-top: 5px;">Search</button>
                                	</div>
                             	</div>
                            </p>
					</div>
				</div>
			</div>
		</div>
	<!-- #END# Body Copy -->';
	
	if (isset($_GET['item_cat'])) {
        $item_category_gid = safe_input($_GET['item_cat'], '');
        $category_pressent = 1;
    }
    echo '<div style="margin: 20px;text-align: center;">';
    foreach ($items_categories as $item_category_id => $item_category_var) {
        if ($category_pressent == '1') {
            if ($item_category_id == $item_category_gid) {
                echo '[' . $item_category_var . ']&nbsp;&nbsp;';
            } else {
                echo '<a href="index.php?get=webshop_item_manager&item_cat=' . $item_category_id . '">' . $item_category_var . '</a>&nbsp;&nbsp;';
            }
        } else {
            echo '<a href="index.php?get=webshop_item_manager&item_cat=' . $item_category_id . '">' . $item_category_var . '</a>&nbsp;&nbsp;';
        }
    }
    echo '</div>
	
	</div>
</section>
<input type="hidden" name="search">
</form>';
    
    
    
    
    if (isset($_POST['search']) && !empty($_POST['item_name'])) {
        $item_name   = str_replace("'", "", $_POST['item_name']);
        $search_item = 1;
    }
    if ($category_pressent == 1 || $search_item == 1) {
        if ($search_item == 1) {
            $select_items = $core_db->Execute("Select name,credits,id from MUCore_Shop_Items where name like ?", array(
                '%' . $item_name . '%'
            ));
        } elseif ($category_pressent == 1) {
            $select_items = $core_db->Execute("Select name,credits,id from MUCore_Shop_Items where category=? order by credits asc", array(
                $item_category_gid
            ));
        }
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
                                        <th>Item Name</th>
                                        <th>Credits Cost</th>
                                        <th>Controls</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px;">';
        while (!$select_items->EOF) {
            echo '
        <tr>
        <th scope="row"><strong>' . htmlspecialchars($select_items->fields[0]) . '</strong></th>
        <td>' . number_format($select_items->fields[1]) . '</td>
        <td><a href="index.php?get=webshop_item_manager&m=edit&id=' . $select_items->fields[2] . '">[Edit]</a> / <a href="index.php?get=webshop_item_manager&m=delete&id=' . $select_items->fields[2] . '">[Delete]</a></td>
        
        </tr>';
            
            
            $select_items->MoveNext();
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
?> 