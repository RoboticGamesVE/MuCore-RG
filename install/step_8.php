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
@copy('Restrict.bmn', '.htaccess');
if (file_exists('.htaccess')) {
	$msg = '<font color="#006600"><b>Restriction to Installation folder added successfully<br/>You may leave your installation folder intact, but it is not recommended</b><br/></font><br/><font color="#990000"><b>If need reinstall, delete .htaccess file!</b></font>';
} else {
	$msg = '<font color="#990000"><blink><b>WARNING!</b> The installation folder can still be accessed, please delete your entire installation folder</blink></font>';
}

require('../engine/global_config.php');
$id = substr( md5(time() ), 0, 5);
rename("../admincp", "../admincp-".$id."");

$new_db = fopen("../engine/global_config.php", "w");
        $data = "<?php"."\n";
        $data.= "\$core['config']['on_off'] = \"" . $core['config']['on_off'] . "\";"."\n";
        $data.= "\$core['config']['website_url'] = \"" . $core['config']['website_url'] . "\";"."\n";
        $data.= "\$core['config']['websitetitle'] = \"" . $core['config']['websitetitle'] . "\";"."\n";
        $data.= "\$core['config']['md5'] = \"" . $core['config']['md5'] . "\";"."\n";
        $data.= "\$core['config']['crypt_key'] = \"" . $core['config']['crypt_key'] . "\";"."\n";
        $data.= "\$core['config']['admin_nick'] = \"" . $core['config']['admin_nick'] . "\";"."\n";
        $data.= "\$core['config']['master_mail'] = \"" . $core['config']['master_mail'] . "\";"."\n";
        $data.= "\$core['config']['template'] = \"" . $core['config']['template'] . "\";"."\n";
        $data.= "\$core['config']['copyright'] = \"" . $core['config']['copyright'] . "\";"."\n";
        $data.= "\$core['config']['SN'] = \"" . $core['config']['SN'] . "\";"."\n";
		$data.= "\$core['version'] = \"" . $core['version'] . "\";"."\n";
		$data.= "\$core['by'] = \"" . $core['by'] . "\";"."\n";
		$data.= "\$core['admincp'] = \"-" . $id . "\";"."\n";
        $data.= "?>";
        fwrite($new_db, $data);
        fclose($new_db);
		
require('../engine/global_config.php');
?>
<section class="content" style="width: 750px;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2 style="text-align: center;">
							MuCore Installation Status
						</h2>
					</div>
					<div class="body">
						<p class="lead">
                        	The Installation of MuCore Version <?php echo $core['version']; ?> by <?php echo $core['by']; ?> has finished
                    	</p>
                        <div class="row clearfix" style="font-size: 12px;">
                            	<b>Note:</b> For security reasons, a Restriction has been attempted in the installation folder.<br />At the bottom of the page you will see if it was applied successfully
                        </div>

                        <p style="border-top: 1px solid rgba(204, 204, 204, 0.35);margin-top: 20px;">
                            	<div class="row clearfix">
                            		<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5" style="width: 350px">
                                     <img src="../template/<?php echo $core['config']['template']; ?>/images/image.jpg" alt="Front-end"> 
                                		<button type="button" class="btn btn-primary m-t-15 waves-effect" style="margin-top: 0;" 
onclick="location.href = '<?php echo $core['config']['website_url']; ?>';">Front-end <?php echo $core['config']['websitetitle']; ?></button>
                                	</div>
                                    
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5" style="width: 350px">
                                    <img src="../admincp<?php echo $core['admincp']; ?>/images/image.jpg" alt="Back-end">
                                		<button type="button" class="btn btn-primary m-t-15 waves-effect" style="margin-top: 0;" 
onclick="location.href = '<?php echo $core['config']['website_url'].'/admincp'.$core['admincp']; ?>';">Back-end <?php echo $core['config']['websitetitle']; ?></button>
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
<br />
<b>Restriction Status:</b>
<br />
<br />
<?php
echo $msg;
?>