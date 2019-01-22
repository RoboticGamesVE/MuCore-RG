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
    $save_1 = new_config_xml('../template/'.$core['config']['template'].'/extras/config/socialbar', 'link1', $_POST['link1']);
	$save_1 = new_config_xml('../template/'.$core['config']['template'].'/extras/config/socialbar', 'link2', $_POST['link2']);
	$save_1 = new_config_xml('../template/'.$core['config']['template'].'/extras/config/socialbar', 'link3', $_POST['link3']);
	$save_1 = new_config_xml('../template/'.$core['config']['template'].'/extras/config/socialbar', 'link4', $_POST['link4']);
	$save_1 = new_config_xml('../template/'.$core['config']['template'].'/extras/config/socialbar', 'link5', $_POST['link5']);
	$save_1 = new_config_xml('../template/'.$core['config']['template'].'/extras/config/socialbar', 'link6', $_POST['link6']);
    echo notice_message_admin('Settings successfully saved', 1, 0, 'index.php?get=socialbar_manager');
}
else{

$get_config = simplexml_load_file('../template/'.$core['config']['template'].'/extras/config/socialbar.xml');
    echo '
<form action="" name="form_edit" method="post" id="form2">
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card" style="margin-bottom:0px">
					<div class="header">
						<h2 style="text-align: center;">
							SocialBar Link
						</h2>
					</div>
					<div class="body">
						<p class="lead" align="left">
                        	MiniClient
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enlace del boton MiniClient
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" name="link1" class="form-control" value="' . $get_config->link1 . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						
						<p class="lead" align="left">
                        	Facebook
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enlace del boton Facebook
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" name="link2" class="form-control" value="' . $get_config->link2 . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						
						<p class="lead" align="left">
                        	Twitter
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enlace del boton Twitter
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" name="link3" class="form-control" value="' . $get_config->link3 . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						
						<p class="lead" align="left">
                        	Youtube
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enlace del boton Youtube
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" name="link4" class="form-control" value="' . $get_config->link4 . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						
						<p class="lead" align="left">
                        	Forums
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enlace del boton Forums
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" name="link5" class="form-control" value="' . $get_config->link5 . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						
						<p class="lead" align="left">
                        	Service
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enlace del boton Service
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" name="link6" class="form-control" value="' . $get_config->link6 . '">
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