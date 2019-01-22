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
if (isset($_POST['module_active'])) {
    $save_status = new_config_xml('../engine/config_mods/clear_skills_settings', 'active', safe_input($_POST['module_active'], ''));
}
$get_config = simplexml_load_file('../engine/config_mods/clear_skills_settings.xml');
echo '
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2 style="text-align: center;">
							Clear Skills Settings
						</h2>
					</div>
					<div class="body">
					<form action="" method="post" id="form1">';
					 	if ($get_config->active == '1') {
        					echo '<p class="lead" align="left" style="background: #0C0;padding: 5px 0px 5px 5px">Clear Skills is active.
								<button type="submit" form="form1" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 20px;margin-top: 0;">Turn Clear Skills Off</button></p>
								<input type="hidden" name="module_active" value="0">';
    					} elseif ($get_config->active == '0') {
        					echo '<p class="lead" align="left" style="background: #C00;padding: 5px 0px 5px 5px">Clear Skills is inactive.
								<button type="submit" form="form1" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 20px;margin-top: 0;">Turn Clear Skills On</button></p>
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
?> 