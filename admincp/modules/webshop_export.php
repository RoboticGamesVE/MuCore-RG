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
							Export Items
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- input text -->
						<p class="lead" align="left">
                        	Export Items as SQL query file
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	All your webshop items will be exported into an text file.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line" style="border-bottom:0px">
                                    	<button type="submit" form="form2" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-top: 0px;">Export Items</button>
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
                        
					</div>
				</div>
			</div>
		</div>
	<!-- #END# Body Copy -->
	</div>
</section>
<input type="hidden" name="export_items">
</form>';

if (isset($_POST['export_items'])) {
    $ex = $core_db->Execute("Select name,i_type,i_id,credits,serial,i_luck_option,i_skill_option,size_x,size_y,i_default_durability,i_maximum_durability,category,i_max_excelent_option,i_max_option,i_max_level,i_refined_option,i_harmony_option,i_socket_option,i_option,i_exc_option,class_requirement,ancient_id,i_stock,i_image,i_sell,i_stick_level,exc_anc from MUCore_Shop_Items");
    while (!$ex->EOF) {
        $ex_data .= "INSERT INTO MUCore_Shop_Items(name,i_type,i_id,credits,serial,i_luck_option,i_skill_option,size_x,size_y,i_default_durability,i_maximum_durability,category,i_max_excelent_option,i_max_option,i_max_level,i_refined_option,i_harmony_option,i_socket_option,i_option,i_exc_option,class_requirement,ancient_id,i_stock,i_image,i_sell,i_stick_level,exc_anc)VALUES('" . str_replace("'", "", $ex->fields[0]) . "','" . $ex->fields[1] . "','" . $ex->fields[2] . "','" . $ex->fields[3] . "','" . $ex->fields[4] . "','" . $ex->fields[5] . "','" . $ex->fields[6] . "','" . $ex->fields[7] . "','" . $ex->fields[8] . "','" . $ex->fields[9] . "','" . $ex->fields[10] . "','" . $ex->fields[11] . "','" . $ex->fields[12] . "','" . $ex->fields[13] . "','" . $ex->fields[14] . "','" . $ex->fields[15] . "','" . $ex->fields[16] . "','" . $ex->fields[17] . "','" . $ex->fields[18] . "','" . $ex->fields[19] . "','" . $ex->fields[20] . "','" . $ex->fields[21] . "','" . $ex->fields[22] . "','" . $ex->fields[23] . "','" . $ex->fields[24] . "','" . $ex->fields[25] . "','" . $ex->fields[26] . "')\r\n";
        
        $ex->MoveNext();
    }
    
    ob_end_clean();
    header("Content-type: txt/plain");
    header("Content-Disposition:attachment;filename=MUCore_Shop_Items.sql");
    echo $ex_data;
    break;
    
    
    
}
?> 