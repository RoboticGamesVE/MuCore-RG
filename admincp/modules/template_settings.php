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
    $save_1 = new_config_xml('../template/'.$core['config']['template'].'/extras/config/template_settings', 'topbar', $_POST['act1']);
	$save_1 = new_config_xml('../template/'.$core['config']['template'].'/extras/config/template_settings', 'barnotice', $_POST['act2']);
	$save_1 = new_config_xml('../template/'.$core['config']['template'].'/extras/config/template_settings', 'socialbar', $_POST['act3']);
	$save_1 = new_config_xml('../template/'.$core['config']['template'].'/extras/config/template_settings', 'footerchat', $_POST['act4']);
	$save_1 = new_config_xml('../template/'.$core['config']['template'].'/extras/config/template_settings', 'footerserver', $_POST['act5']);
	$save_1 = new_config_xml('../template/'.$core['config']['template'].'/extras/config/template_settings', 'footerrg', $_POST['act6']);
	$save_1 = new_config_xml('../template/'.$core['config']['template'].'/extras/config/template_settings', 'url1', $_POST['url1']);
	$save_1 = new_config_xml('../template/'.$core['config']['template'].'/extras/config/template_settings', 'url2', $_POST['url2']);
	$save_1 = new_config_xml('../template/'.$core['config']['template'].'/extras/config/template_settings', 'url3', $_POST['url3']);
	$save_1 = new_config_xml('../template/'.$core['config']['template'].'/extras/config/template_settings', 'url4', $_POST['url4']);
	$save_1 = new_config_xml('../template/'.$core['config']['template'].'/extras/config/template_settings', 'url5', $_POST['url5']);
	$save_1 = new_config_xml('../template/'.$core['config']['template'].'/extras/config/template_settings', 'url6', $_POST['url6']);
	$save_1 = new_config_xml('../template/'.$core['config']['template'].'/extras/config/template_settings', 'video', $_POST['video']);
    echo notice_message_admin('Settings successfully saved', 1, 0, 'index.php?get=template_settings');
}
else{

$get_config = simplexml_load_file('../template/'.$core['config']['template'].'/extras/config/template_settings.xml');
    echo '
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2 style="text-align: center;">
							Template Settings
						</h2>
					</div>
					<div class="body">';

					 	if ($core['config']['template'] == 'LeagueofAngels') {
        					echo '<p class="lead" align="left" style="background: #0C0;padding: 5px 0px 5px 5px">Template is active.
								<a href="http://roboticgames.web.ve/license/index.php?server='.$core['config']['website_url'].'" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 20px;margin-top: 0;" target="_blank">License</a>
								  </p>';
        
    					} else {
        					echo '<p class="lead" align="left" style="background: #C00;padding: 5px 0px 5px 5px">Template is inactive.
								<a href="index.php?get=website_settings" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 20px;margin-top: 0;">Turn Template On</a>
								  </p>';
    					}
						echo '
                            
					</div>
				</div>
			</div>
		</div>
	<!-- #END# Body Copy -->
	</div>
</section>

<form action="" name="form_edit" method="post" id="form2">

<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2 style="text-align: center;">
							Modulos Activar/Desactivar
						</h2>
					</div>
					<div class="body">
						<p class="lead" align="left">
                        	TopBar
                    	</p>
                        
                        <div class="row clearfix">
						
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Activar/Desactivar
                            </div>
							
							<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">';
										if($get_config->topbar == 1){
            									echo '
												<div class="demo-radio-button">
	   												<input type="radio" class="with-gap" id="radio_1" name="act1" value="1" checked="checked"/>
													<label for="radio_1" style="min-width: 70px;">Yes</label>
       												<input type="radio" class="with-gap" id="radio_2" name="act1" value="0"/>
                                					<label for="radio_2" style="min-width: 70px;">No</label>
                           						</div>
													';
										} else {
            									echo '
												<div class="demo-radio-button">
														<input type="radio" class="with-gap" id="radio_1" name="act1" value="1"/>
           												<label for="radio_1" style="min-width: 70px;">Yes</label>	
														<input type="radio" class="with-gap" id="radio_2" name="act1" checked="checked" value="0"/>
            											<label for="radio_2" style="min-width: 70px;">No</label>
    											</div>
													';
										}
									echo '	
                                    </div>
                                </div>
                            </div>
							
                        </div>
						
						<p class="lead" align="left">
                        	BarNotice
                    	</p>
                        
                        <div class="row clearfix">
						
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Activar/Desactivar
                            </div>
							
							<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">';
										if($get_config->barnotice == 1){
            									echo '
												<div class="demo-radio-button">
	   												<input type="radio" class="with-gap" id="radio_3" name="act2" value="1" checked="checked"/>
													<label for="radio_3" style="min-width: 70px;">Yes</label>
       												<input type="radio" class="with-gap" id="radio_4" name="act2" value="0"/>
                                					<label for="radio_4" style="min-width: 70px;">No</label>
                           						</div>
													';
										} else {
            									echo '
												<div class="demo-radio-button">
														<input type="radio" class="with-gap" id="radio_3" name="act2" value="1"/>
           												<label for="radio_3" style="min-width: 70px;">Yes</label>	
														<input type="radio" class="with-gap" id="radio_4" name="act2" checked="checked" value="0"/>
            											<label for="radio_4" style="min-width: 70px;">No</label>
    											</div>
													';
										}
									echo '	
                                    </div>
                                </div>
                            </div>
							
                        </div>
						
						<p class="lead" align="left">
                        	SocialBar
                    	</p>
                        
                        <div class="row clearfix">
						
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Activar/Desactivar
                            </div>
							
							<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">';
										if($get_config->socialbar == 1){
            									echo '
												<div class="demo-radio-button">
	   												<input type="radio" class="with-gap" id="radio_5" name="act3" value="1" checked="checked"/>
													<label for="radio_5" style="min-width: 70px;">Yes</label>
       												<input type="radio" class="with-gap" id="radio_6" name="act3" value="0"/>
                                					<label for="radio_6" style="min-width: 70px;">No</label>
                           						</div>
													';
										} else {
            									echo '
												<div class="demo-radio-button">
														<input type="radio" class="with-gap" id="radio_5" name="act3" value="1"/>
           												<label for="radio_5" style="min-width: 70px;">Yes</label>	
														<input type="radio" class="with-gap" id="radio_6" name="act3" checked="checked" value="0"/>
            											<label for="radio_6" style="min-width: 70px;">No</label>
    											</div>
													';
										}
									echo '	
                                    </div>
                                </div>
                            </div>
							
                        </div>

						<p class="lead" align="left">
                        	FooterChat
                    	</p>
                        
                        <div class="row clearfix">
						
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Activar/Desactivar
                            </div>
							
							<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">';
										if($get_config->footerchat == 1){
            									echo '
												<div class="demo-radio-button">
	   												<input type="radio" class="with-gap" id="radio_7" name="act4" value="1" checked="checked"/>
													<label for="radio_7" style="min-width: 70px;">Yes</label>
       												<input type="radio" class="with-gap" id="radio_8" name="act4" value="0"/>
                                					<label for="radio_8" style="min-width: 70px;">No</label>
                           						</div>
													';
										} else {
            									echo '
												<div class="demo-radio-button">
														<input type="radio" class="with-gap" id="radio_7" name="act4" value="1"/>
           												<label for="radio_7" style="min-width: 70px;">Yes</label>	
														<input type="radio" class="with-gap" id="radio_8" name="act4" checked="checked" value="0"/>
            											<label for="radio_8" style="min-width: 70px;">No</label>
    											</div>
													';
										}
									echo '	
                                    </div>
                                </div>
                            </div>
							
                        </div>

						<p class="lead" align="left">
                        	FooterServer
                    	</p>
                        
                        <div class="row clearfix">
						
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Activar/Desactivar
                            </div>
							
							<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">';
										if($get_config->footerserver == 1){
            									echo '
												<div class="demo-radio-button">
	   												<input type="radio" class="with-gap" id="radio_9" name="act5" value="1" checked="checked"/>
													<label for="radio_9" style="min-width: 70px;">Yes</label>
       												<input type="radio" class="with-gap" id="radio_10" name="act5" value="0"/>
                                					<label for="radio_10" style="min-width: 70px;">No</label>
                           						</div>
													';
										} else {
            									echo '
												<div class="demo-radio-button">
														<input type="radio" class="with-gap" id="radio_9" name="act5" value="1"/>
           												<label for="radio_9" style="min-width: 70px;">Yes</label>	
														<input type="radio" class="with-gap" id="radio_10" name="act5" checked="checked" value="0"/>
            											<label for="radio_10" style="min-width: 70px;">No</label>
    											</div>
													';
										}
									echo '	
                                    </div>
                                </div>
                            </div>
							
                        </div>
						
						<p class="lead" align="left">
                        	FooterRG
                    	</p>
                        
                        <div class="row clearfix">
						
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Activar/Desactivar
                            </div>
							
							<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">';
										if($get_config->footerrg == 1){
            									echo '
												<div class="demo-radio-button">
	   												<input type="radio" class="with-gap" id="radio_11" name="act6" value="1" checked="checked"/>
													<label for="radio_11" style="min-width: 70px;">Yes</label>
       												<input type="radio" class="with-gap" id="radio_12" name="act6" value="0"/>
                                					<label for="radio_12" style="min-width: 70px;">No</label>
                           						</div>
													';
										} else {
            									echo '
												<div class="demo-radio-button">
														<input type="radio" class="with-gap" id="radio_11" name="act6" value="1"/>
           												<label for="radio_11" style="min-width: 70px;">Yes</label>	
														<input type="radio" class="with-gap" id="radio_12" name="act6" checked="checked" value="0"/>
            											<label for="radio_12" style="min-width: 70px;">No</label>
    											</div>
													';
										}
									echo '	
                                    </div>
                                </div>
                            </div>
							
                        </div>
						
						
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
				<div class="card" style="margin-bottom:0px">
					<div class="header">
						<h2 style="text-align: center;">
							Link Adicionales
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
                                    	<input type="text" name="url1" class="form-control" value="' . $get_config->url1 . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						
						<p class="lead" align="left">
                        	New Player Code
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enlace del boton New Player Code
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" name="url2" class="form-control" value="' . $get_config->url2 . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						
						<p class="lead" align="left">
                        	Vip Member
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enlace del boton New Player Code
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" name="url3" class="form-control" value="' . $get_config->url3 . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						
						<p class="lead" align="left">
                        	Support
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enlace del boton Support
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" name="url4" class="form-control" value="' . $get_config->url4 . '">
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
                                    	<input type="text" name="url5" class="form-control" value="' . $get_config->url5 . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						
						<p class="lead" align="left">
                        	Follow
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enlace del boton Follow
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" name="url6" class="form-control" value="' . $get_config->url6 . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						
						<p class="lead" align="left">
                        	PopUP Video
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enlace del PopUP Video, puede ser tu canal de youtube
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" name="video" class="form-control" value="' . $get_config->video . '">
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