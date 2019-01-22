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
if (isset($_POST['edit_settings'])) {
    $save_style  = new_config_xml('../engine/config_mods/news_settings', 'news_style', '' . safe_input($_POST['style'], '') . '');
    $short_long  = new_config_xml('../engine/config_mods/news_settings', 'news_short_long', '' . safe_input($_POST['short'], '') . '');
    $bookmarking = new_config_xml('../engine/config_mods/news_settings', 'news_bookmarking', '' . safe_input($_POST['bookmarking'], '') . '');
    echo notice_message_admin('Settings successfully saved', 1, 0, 'index.php?get=news_settings');
} else {
    $get_news_config = simplexml_load_file('../engine/config_mods/news_settings.xml');
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
							News Settings
						</h2>
					</div>
					<div class="body">
					
						<!-- inpunt radio -->
						<p class="lead" align="left">
                        	Display Style
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Choose news display style.<br>
								<b>Style 1</b>: Will show full news.<br>
								<b>Style 2</b>: Will show short news, user click required to view full news.<br>
								<b>Style 3</b>: Will show only news title, user click required to view full news.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">';
									switch ($get_news_config->news_style) {
        								case '0':
            								echo '
										<div class="demo-radio-button">
											<input type="radio" class="with-gap" id="radio_1" name="style" value="0" checked="checked"/>
           									<label for="radio_1" style="min-width: 70px;">Style 1</label>	
											<input type="radio" class="with-gap" id="radio_2" name="style" value="1"/>
            								<label for="radio_2" style="min-width: 70px;">Style 2</label>
											<input type="radio" class="with-gap" id="radio_3" name="style" value="2"/>
            								<label for="radio_3" style="min-width: 70px;">Style 3</label>
    									</div>';
            							break;
        								
										case '1':
            								echo '
										<div class="demo-radio-button">
											<input type="radio" class="with-gap" id="radio_1" name="style" value="0"/>
           									<label for="radio_1" style="min-width: 70px;">Style 1</label>	
											<input type="radio" class="with-gap" id="radio_2" name="style" value="1" checked="checked"/>
            								<label for="radio_2" style="min-width: 70px;">Style 2</label>
											<input type="radio" class="with-gap" id="radio_3" name="style" value="2"/>
            								<label for="radio_3" style="min-width: 70px;">Style 3</label>
    									</div>';
            							break;
        								
										case '2':
            								echo '
										<div class="demo-radio-button">
											<input type="radio" class="with-gap" id="radio_1" name="style" value="0"/>
           									<label for="radio_1" style="min-width: 70px;">Style 1</label>	
											<input type="radio" class="with-gap" id="radio_2" name="style" value="1"/>
            								<label for="radio_2" style="min-width: 70px;">Style 2</label>
											<input type="radio" class="with-gap" id="radio_3" name="style" value="2" checked="checked"/>
            								<label for="radio_3" style="min-width: 70px;">Style 3</label>
    									</div>';
            							break;
    								}
									echo '	
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input radio -->
						
						<!-- input text -->
						<p class="lead" align="left">
                        	Style 2 Display Options
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Set how many characters of news should be displayed on short news (Style 2).
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="short" value="' . $get_news_config->news_short_long . '">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
                        <!-- input select -->
						<p class="lead" align="left">
                        	Social Bookmarking
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	<b>Display Social Bookmarking Icons.</b><br>
Social Bookmarking has evolved as a very effective way of sharing content with others and consequently bringing more traffic to your website. Enable/Disable Social Bookmarking Icons to be displayed in your news pages.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	
									<div style="border-bottom: none;">
                                    	<select name="bookmarking" style="border: none;font-size: 14px;float: right;width: 100%;">';
                                        	switch ($get_news_config->news_bookmarking) {
        										case '0':
            										echo '<option value="1">Enabled</option><option value="0" selected="selected">Disabled</option>';
            									break;
        										case '1':
            										echo '<option value="1" selected="selected">Enabled</option><option value="0">Disabled</option>';
            									break;
    										}
											echo '
                                		</select>
                                    </div>
									
                                </div>
                            </div>
                        </div>
						<!-- #END# input select -->
                        
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
<input type="hidden" name="edit_settings">
</form>';
}
?> 