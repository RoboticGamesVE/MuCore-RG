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
if (isset($_POST['backup'])) {
    if (is_dir('../mucore_backup')) {
        if (substr(decoct(fileperms('../mucore_backup')), 2) == '777') {
            $folder_name = 'backup_' . date('d.m.Y_H.i.s');
            $create_dir  = mkdir("../mucore_backup/$folder_name", 0777);
            
            //Create dir mucore_backup/backup_file/engine
            $create_dir = mkdir("../mucore_backup/$folder_name/engine", 0777);
            
            //Copy engine/config_mods
            full_copy('../engine/config_mods', "../mucore_backup/$folder_name/engine/config_mods");
            
            //Copy engine/variables_mods
            full_copy('../engine/variables_mods', "../mucore_backup/$folder_name/engine/variables_mods");
            
            //Copy engine/cms_data
            full_copy('../engine/cms_data', "../mucore_backup/$folder_name/engine/cms_data");
            
            //Copy engine/gm.users
            full_copy('../engine/gm.users', "../mucore_backup/$folder_name/engine/gm.users");
            
            //Copy engine/cache
            full_copy('../engine/cache', "../mucore_backup/$folder_name/engine/cache");
            
            
            //Copy engine/logs
            full_copy('../engine/logs', "../mucore_backup/$folder_name/engine/logs");
            
            //Copy engine/needed files
            $engine_files = array(
                'announcement_config.php',
                'custom_variables.php',
                'filter_ip.php',
                'global_cms.php',
                'global_config.php',
                'style_cms.php'
            );
            
            foreach ($engine_files as $engine_file) {
                full_copy("../engine/$engine_file", "../mucore_backup/$folder_name/engine/$engine_file");
            }
            
            echo notice_message_admin('Backup successfully saved', 1, 0, 'index.php?get=mucore_backup');
            
            
        } else {
            echo notice_message_admin('Unable to create backup, reason: <b>mucore_backup</b> folder don\'t have full permission to be writed.', '0', '1', '0');
        }
        
    } else {
        echo notice_message_admin('Unable to create backup, reason: <b>mucore_backup</b> folder not found.', '0', '1', '0');
    }
    
} else {
    echo '
<form action="" name="form_edit" method="post" id="form2">
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card" style="margin-bottom: 0px;">
					<div class="header">
						<h2 style="text-align: center;">
							MUCore DB Backup
						</h2>
					</div>
					<div class="body">

						<!-- input text -->
						<p class="lead" align="left">
                        	Backup
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	All backups are saved on mucore root/<b>mucore_backup</b> folder.<br>
								backup folder name format: <b>backup_date_time</b>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	
                                    	<button type="submit" form="form2" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-top: 5px;">Create Backup</button>
                                    
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
<input type="hidden" name="backup">
</form>';
}
?> 