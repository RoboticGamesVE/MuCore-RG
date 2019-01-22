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
?>
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2 style="text-align: center;">
							Acerca de MuCore 2.0.0 - Español
						</h2>
					</div>
					<div class="body">
						<p class="lead" align="left">
                        	Informacion Importante
                    	</p>
                        <div class="row clearfix" style="font-size: 12px;">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 100%;text-align: left;">
                            	Este es un proyecto que originalmente se lanzó solo para la comunidad hispana, sin embargo, decidimos publicarlo también en su versión original.<br />

Este CMS se basa en el codigo publicado por <b>MaryJo y Dao Van Trong - Trong.CF</b>.<br />
Completado por <font color=\"#4a7a14\">RoboticGames</font> - thejonyx.
                            </div>
                        </div>
                        
                        <p class="lead" align="left" style="border-top: 1px solid rgba(204, 204, 204, 0.35);padding-top: 10px;">
                        	Sugerencias y soporte
                    	</p>
                        <div class="row clearfix" style="font-size: 12px;">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 100%;text-align: left;margin-bottom: 1px;">
                            	Foro de soporte oficial para este lanzamiento. <a href="http://roboticgames.web.ve" target="_blank">Click Aqui</a>
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
				<div class="card" style="margin-bottom: 5px;">
					<div class="header">
						<h2 style="text-align: center;">
							Ultimas Noticias
						</h2>
					</div>
					<div class="body">
                        <div class="row clearfix" style="font-size: 12px;">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 550px;text-align: left; margin-bottom:1px">
                            	<?php
								
require ("script/lastrss.php");
$rss = new lastRSS();
$rss->cache_dir = "script/temp";
$rss->cache_time = 1200;
$rss->cp = "UTF-8";
$rss->date_format = "l";
$rssurl = "http://tuservermu.com.ve/index.php?action=.xml;type=rss";
if ($rs = $rss->get($rssurl)) {
    foreach ($rs["items"] as $item) {
            echo "<div align=\"left\" class=\"rss_feed\"><b><a href=\"" . $item["link"] . "\" target=\"_blank\">" . $item["title"] . "</a></b></div>";
    }
} else {
    echo "Error: It's not possible to get rss url.";
}
?>
                            </div>
                            <div class="panel_text_logo">
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	<!-- #END# Body Copy -->
	</div>
</section>