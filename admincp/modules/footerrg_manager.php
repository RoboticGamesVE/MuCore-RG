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
    $save_1 = new_config_xml('../template/'.$core['config']['template'].'/extras/config/footerrg', 'f1', $_POST['f1']);
	$save_1 = new_config_xml('../template/'.$core['config']['template'].'/extras/config/footerrg', 'f2', $_POST['f2']);
	$save_1 = new_config_xml('../template/'.$core['config']['template'].'/extras/config/footerrg', 'f3', $_POST['f3']);
	$save_1 = new_config_xml('../template/'.$core['config']['template'].'/extras/config/footerrg', 'f4', $_POST['f4']);
	$save_1 = new_config_xml('../template/'.$core['config']['template'].'/extras/config/footerrg', 'f5', $_POST['f5']);
	$save_1 = new_config_xml('../template/'.$core['config']['template'].'/extras/config/footerrg', 'f6', $_POST['f6']);
    echo notice_message_admin('Settings successfully saved', 1, 0, 'index.php?get=footerrg_manager');
}
else{

$get_config = simplexml_load_file('../template/'.$core['config']['template'].'/extras/config/footerrg.xml');
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
							Link FooterRG
						</h2>
					</div>
					<div class="body">
						<p class="lead" align="left">
                        	Home
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enlace del boton Home
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" name="f1" class="form-control" value="' . $get_config->f1 . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						
						<p class="lead" align="left">
                        	Company
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enlace del boton Company
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" name="f2" class="form-control" value="' . $get_config->f2 . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						
						<p class="lead" align="left">
                        	 Contact Us
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enlace del boton  Contact Us
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" name="f3" class="form-control" value="' . $get_config->f3 . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						
						<p class="lead" align="left">
                        	Terms Of Service
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enlace del boton Terms Of Service
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" name="f4" class="form-control" value="' . $get_config->f4 . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						
						<p class="lead" align="left">
                        	MuOnline Server
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enlace del boton MuOnline Server
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" name="f5" class="form-control" value="' . $get_config->f5 . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						
						<p class="lead" align="left">
                        	Copyright (c)
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Texto en el Copyright (c)
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" name="f6" class="form-control" value="' . $get_config->f6 . '">
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