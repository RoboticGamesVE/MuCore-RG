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
 * @Credits   Isumeru & MaryJo & Dao Van Trong - Trong.CF                      �
*/
if (isset($_POST['settings'])) {
	$save_1 = new_config_xml('../template/'.$core['config']['template'].'/extras/config/barnotice', 'f1', $_POST['f1']);
	$save_1 = new_config_xml('../template/'.$core['config']['template'].'/extras/config/barnotice', 'f2', $_POST['f2']);
	$save_1 = new_config_xml('../template/'.$core['config']['template'].'/extras/config/barnotice', 'f3', $_POST['f3']);
	$save_1 = new_config_xml('../template/'.$core['config']['template'].'/extras/config/barnotice', 'f4', $_POST['f4']);
	echo notice_message_admin('Settings successfully saved', 1, 0, 'index.php?get=barnotice_manager');
} else {
	$get_config = simplexml_load_file('../template/'.$core['config']['template'].'/extras/config/barnotice.xml');
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
							BarNotice Settings
						</h2>
					</div>
					<div class="body">
						<p class="lead" align="left">
                        	BarNotice text
                    	</p>
                        
                        <div class="row clearfix">
							<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Text BarNotice
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="f1" value="' . $get_config->f1 . '" >
                                    </div>
                                </div>
                            </div>
                        </div>
						
						<p class="lead" align="left">
                        	Link 1
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Link User Terms of Service
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="f2" value="' . $get_config->f2 . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						
						<p class="lead" align="left">
                        	Link 2
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Link Privacy Policy
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="f3" value="' . $get_config->f3 . '" >
                                    </div>
                                </div>
                            </div>
                        </div>

						<p class="lead" align="left">
                        	Background Color
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Background Color
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="color" class="form-control" name="f4" value="' . $get_config->f4 . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						
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
</form>
';
}
?> 