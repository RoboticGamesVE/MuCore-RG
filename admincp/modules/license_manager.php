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
$license = file_get_contents('../license.tRG');
$license = crypt_it($license,'roboticgames');
$license = explode('|', $license);
?>
<section class="content" style="width: 70%;margin: 0 auto 0 auto;">
        <div class="container-fluid">
            <!-- Tabs With Icon Title -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#home_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">dashboard</i> HOME
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#profile_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">credit_card</i> PRICING PLANS
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#settings_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">description</i> INVOICE
                                    </a>
                                </li>
                            </ul>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Tabs With Icon Title -->
            
        </div>
    </section>
    
    <section class="content" style="width: 70%;margin: 0 auto 0 auto;">
        <div class="container-fluid">
            <!-- Tabs With Icon Title -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" style="margin-bottom: 0px;">
                            
                            <!-- Tab panes -->
                            <div class="tab-content">
                            
                                <div role="tabpanel" class="tab-pane fade in active" id="home_with_icon_title">
                        
                        <div class="header">
                            <h2 style="font-weight: 600;color: #F44336;">
                            <img src="images/logor.png" alt="logo" />
                                ROBOTICGAMES
                            </h2>
                        </div>
                        <div class="body" style="text-align: center;">
                            <div style="color: #32d373;margin-bottom: 10px;">
                            	<i class="material-icons" style="font-size: 72px;">check_circle</i>
                            </div>
                            <div>
                            	<p style="font-weight:700; font-size:34px; color:#3e484d; margin-bottom:5px">Welcome Your License is 
								<?php
								if($license[0] == $_SERVER["HTTP_HOST"] && time() < $license[1]){
									echo 'PREMIUM';
								} else {
									echo 'FREE';
								}?></p>
                            </div>
                            <div>
                            	<p style="font-size:19px; color:#a7b1b6;">You've successfully create your new license.</p>
                            </div>
                            <div style="margin-top: 40px;">
                            	<p style="font-weight:700; font-size:16px; color:#a7b1b6">Web Site</p>
                            </div>
                            <div>
                            	<div style="width: 45%;margin: 0px auto;">
                            		<p style="padding:16px; text-align:center; border-radius:4px; background-color:#f1f6f9; color:#616161;"><?php echo $_SERVER["HTTP_HOST"]; ?></p>
                            	</div>
                            </div>
                        </div>
  
                                </div>
                               
                                <div role="tabpanel" class="tab-pane fade" id="profile_with_icon_title">
                                    
                        <div class="header" style="background-color:#475359;">
                            <h2 style="font-weight: 600;color: #FFF;">
                            <img src="images/logor.png" alt="logo" />
                                ROBOTICGAMES
                            </h2>
                        </div>
                        <div class="body" style="text-align: center;">
                            <div>
                            	<p style="font-weight:700; font-size:34px; color:#3e484d; margin-bottom:5px">New Pricing Plans</p>
                            </div>
                            <div>
                            	<p style="font-size:19px; color:#a7b1b6;width: 90%;margin: 0px auto;">RoboticGames cuenta con los mejores desarrolladores web capaz de lograr cualquier funcionalidad para tu servidor</p>
                            </div>
                            <div class="row clearfix" style="margin-top: 40px; background-color:#32d373">
                            	<div class="col-md-6">
                            		<p style="font-weight:700; font-size:14px; color:#fff; text-align:left;margin: 25px 10px 0px 10px;">Premium Account (12 months)</p>
                                    <p style="font-size:12px; color:#fff; text-align:left;margin-left: 10px;">Expired Friday, Mar 31 2017</p>
                                </div>
                                <div class="col-md-6">
                                	<p style="font-weight:700; font-size:16px; color:#fff; background-color:#475359; border-radius:4px;padding: 10px;width: 65%;margin: 23px 10px 0px auto;">Download Invoice</p>
                                </div>
                            </div>
                            <div>
                            	<div style="margin-top: 20px;">
                            		<p style="color: #7d8284;text-align: left;font-size: 16px;">
                                    Tenemos los mejores precios para que puedas adquirir tu licencia premium.</p>
                                    
                            	</div>
                            </div>
                            <div class="row clearfix" style=" width: 92%;margin: 30px auto 0 auto;">
                            	<div class="col-md-4">
                                	<div>
                                    	<div style="background-color:#f1f6f9; padding:16px;border-radius: 6px;">
                                    		<p style="font-weight:700; font-size:16px; color:#3e484d; margin-bottom:0px;">Free</p>
                                        	<p style="font-weight:700; font-size:32px; color:#37c2ef; margin-bottom:0px;">$0</p>
                                        	<p style="font-weight:700; font-size:14px; color:#a7b1b6; margin-bottom:0px;">/month</p>
                                        </div>
                            		</div>
                                    <div style="margin:20px;">
                                    	<p style="font-size:12px; color:#a7b1b6;"><span><i class="material-icons" style="font-size:11px; color:#69B469;">check_circle</i></span> 24/7 Support</p>
                                        <p style="font-size:12px; color:#a7b1b6;"><span><i class="material-icons" style="font-size:11px; color:#FE5454;">cancel</i></span> All Modules</p>
                                        <p style="font-size:12px; color:#a7b1b6;"><span><i class="material-icons" style="font-size:11px; color:#FE5454;">cancel</i></span> All updates</p>
                                    </div>
                                    <div>
                                    	<a href="index.php?get=template_settings">
                                    		<p style="font-weight:700; font-size:16px; color:#fff; background-color:#475359; border-radius:4px;padding: 5px;width: 50%;margin: 0 auto;">Setting</p>
                                    	</a>
                                    </div>
                                    
                                </div>
                                
                                <div class="col-md-4">
                                	<div>
                                    	<div style="background-color:#f1f6f9; padding:16px;border-radius: 6px;">
                                    		<p style="font-weight:700; font-size:16px; color:#3e484d; margin-bottom:0px;">Premium</p>
                                        	<p style="font-weight:700; font-size:32px; color:#37c2ef; margin-bottom:0px;">$3</p>
                                        	<p style="font-weight:700; font-size:14px; color:#a7b1b6; margin-bottom:0px;">/1 month</p>
                                        </div>
                            		</div>
                                    <div style="margin:20px;">
                                    	<p style="font-size:12px; color:#a7b1b6;"><span><i class="material-icons" style="font-size:11px; color:#69B469;">check_circle</i></span> 24/7 Support</p>
                                        <p style="font-size:12px; color:#a7b1b6;"><span><i class="material-icons" style="font-size:11px; color:#69B469;">check_circle</i></span> All Modules</p>
                                        <p style="font-size:12px; color:#a7b1b6;"><span><i class="material-icons" style="font-size:11px; color:#69B469;">check_circle</i></span> All updates</p>
                                    </div>
                                    <div>
                                    	<a href="http://roboticgames.web.ve/licencia/index.php?id=<?php echo $_SERVER["HTTP_HOST"]; ?>" target="_blank">
                                    		<p style="font-weight:700; font-size:16px; color:#fff; background-color:#32d373; border-radius:4px;padding: 5px;width: 50%;margin: 0 auto;">Upgrade</p>
                                    	</a>
                                    </div>
                                    
                                </div>
                                
                                <div class="col-md-4">
                                	<div>
                                    	<div style="background-color:#f1f6f9; padding:16px;border-radius: 6px;">
                                    		<p style="font-weight:700; font-size:16px; color:#3e484d; margin-bottom:0px;">Premium</p>
                                        	<p style="font-weight:700; font-size:32px; color:#37c2ef; margin-bottom:0px;">$7</p>
                                        	<p style="font-weight:700; font-size:14px; color:#a7b1b6; margin-bottom:0px;">/3 month</p>
                                        </div>
                            		</div>
                                    <div style="margin:20px;">
                                    	<p style="font-size:12px; color:#a7b1b6;"><span><i class="material-icons" style="font-size:11px; color:#69B469;">check_circle</i></span> 24/7 Support</p>
                                        <p style="font-size:12px; color:#a7b1b6;"><span><i class="material-icons" style="font-size:11px; color:#69B469;">check_circle</i></span> All Modules</p>
                                        <p style="font-size:12px; color:#a7b1b6;"><span><i class="material-icons" style="font-size:11px; color:#69B469;">check_circle</i></span> All updates</p>
                                    </div>
                                    <div>
                                    	<a href="http://roboticgames.web.ve/licencia/index.php?id=<?php echo $_SERVER["HTTP_HOST"]; ?>" target="_blank">
                                    		<p style="font-weight:700; font-size:16px; color:#fff; background-color:#32d373; border-radius:4px;padding: 5px;width: 50%;margin: 0 auto;">Upgrade</p>
                                    	</a>
                                    </div>
                                    
                                </div>
                                
                            </div>
                        </div>
                        <div class="header" style="background-color:#475359;">
                            <div class="row clearfix">
                            	<div class="col-md-6">
                            		<p style="font-weight:600; font-size:14px; color:#fff; text-align:left;margin: 10px 10px 0px 10px;">&copy;2017 RoboticGames</p>
                                    <p style="font-weight:600; font-size:14px; color:#fff; text-align:left;margin: 0px 10px 0px 10px;">roboticgames.ve@gmail.com, Venezuela</p>
                                </div>
                                <div class="col-md-6">
                            		<p style="padding: 10px;float: right;">
                                    	<a href="https://facebook.com/roboticgames"><img src="images/social-facebook.png" alt="facebook" width="24" /></a> 
                                        <a href="https://twitter.com/roboticgamesve"><img src="images/social-twitter.png" alt="twitter" width="24" /></a>
                                        <a href=""><img src="images/social-instagram.png" alt="instagran" width="24" /></a>
                                	</p>
                                </div>
                            </div>
                        </div>
                                    
                                </div>
                                
                                <div role="tabpanel" class="tab-pane fade" id="settings_with_icon_title">
                                    
                                    
                                    <div class="header" style="background-color:#475359;">
                            <h2 style="font-weight: 600;color: #FFF;">
                            <img src="images/logor.png" alt="logo" />
                                ROBOTICGAMES
                            </h2>
                            <p style="color: #fff;font-size: 22px;text-align: center;">
                            	Thank you for your Purchase!
                            </p>
                        </div>
                        <div class="body">
                            <div>
                            	<p style="font-weight:700; font-size:28px; color:#3e484d;margin: 20px 0px 0px 0px;">Invoice</p>
                            </div>
                            <div>
                            	<p style="font-size:14px; color:#a7b1b6;">Order #1234, 00/00/0000</p>
                                <p style="font-weight:600; font-size:16px; color:#a7b1b6; margin-bottom:0px;">RoboticGames.</p>
                                <p style="font-size:16px; color:#a7b1b6;">Venezuela</p>
                                <p style="font-size:16px; color:#a7b1b6; margin-bottom:0px;">+58 04248907990</p>
                                <p style="font-size:16px; color:#37c2ef;"><a href="http://roboticgames.web.ve" style="color: #37c2ef;font-size: 15px;">roboticgames.web.ve</a></p>
                            </div>
                            
                            <div>
                            	<div style="margin-top: 40px;">
                                	<table style="width: 100%;color: #a7b1b6;">
                                    	<thead style="border-bottom: 1px solid #a7b1b6;">
                                        	<tr>
                                            	<th style="width: 60%; padding-bottom:20px;">Items</th>
                                            	<th style="text-align: center; padding-bottom:20px;">Month</th>
                                            	<th style="text-align: center; padding-bottom:20px;">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody style="border-bottom: 1px solid #a7b1b6;">
                                        	<tr>
                                            	<td style="width: 60%; padding:20px; font-weight:700; color:#3e484d;font-size: 16px;">License Premium</td>
                                                <td style="text-align: center; padding:20px;">1</td>
                                                <td style="text-align: center; padding:20px;">$3.00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                            		
                                    <div class="row clearfix" style="margin-top:40px;">
                                		<div class="col-md-6" style="float: right;">
                                        	<p style="color: #7d8284;text-align: left;font-size: 16px;">Subtotal $3.00 USD</p>
                                            <p style="color: #7d8284;text-align: left;font-size: 16px;padding-bottom: 20px;border-bottom: 1px solid #a7b1b6;">Subtotal $3.00 USD</p>
                                            <p style="color: #7d8284;text-align: left;font-size: 16px;"><span style=" font-weight:700; color:#3e484d;font-size: 16px;">Total due</span> <span style=" font-weight:700; color:#37c2ef;font-size: 16px;">$3.00 USD</span></p>
                                		</div>
                            		</div>
                                    
                                    <div class="row clearfix" style="margin-top:40px;">
                                		<div class="col-md-6">
                                        	<div style="width:90%; background-color:#f1f6f9; border-radius:4px">
                                            	<div style="padding:20px;"
                                        			<p style="color: #7d8284;text-align: left;font-size: 14px;">Billing Information</p>
                                            		<p style="color: #7d8284;text-align: left;font-size: 12px; margin-bottom:0px;">Nombre del Server</p>
                                            		<p style="color: #7d8284;text-align: left;font-size: 12px;">www.servermuonline.com</p>
                                				</div>
                                        	</div>
                                        </div>
                                        <div class="col-md-6">
                                        	<div style="width:90%; background-color:#f1f6f9; border-radius:4px">
                                            	<div style="padding:20px;"
                                        			<p style="color: #7d8284;text-align: left;font-size: 14px;">Shipping Information</p>
                                            		<p style="color: #7d8284;text-align: left;font-size: 12px; margin-bottom:0px;">Nombre del Server</p>
                                            		<p style="color: #7d8284;text-align: left;font-size: 12px;">www.servermuonline.com</p>
                                				</div>
                                        	</div>
                                        </div>
                            		</div>
                                    
                            	</div>
                            </div>
                            
                        </div>
                        <div class="header" style="background-color:#475359;">
                            <div class="row clearfix">
                            	<div class="col-md-6">
                            		<p style="font-weight:600; font-size:14px; color:#fff; text-align:left;margin: 10px 10px 0px 10px;">&copy;2017 RoboticGames</p>
                                    <p style="font-weight:600; font-size:14px; color:#fff; text-align:left;margin: 0px 10px 0px 10px;">roboticgames.ve@gmail.com, Venezuela</p>
                                </div>
                                <div class="col-md-6">
                            		<p style="padding: 10px;float: right;">
                                    	<a href="https://facebook.com/roboticgames"><img src="images/social-facebook.png" alt="facebook" width="24" /></a> 
                                        <a href="https://twitter.com/roboticgamesve"><img src="images/social-twitter.png" alt="twitter" width="24" /></a>
                                        <a href=""><img src="images/social-instagram.png" alt="instagran" width="24" /></a>
                                	</p>
                                </div>
                            </div>
                        </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <!-- #END# Tabs With Icon Title -->
            
        </div>
    </section>