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
if (isset($_POST['sitemap'])) {
    $start_sitemap = $core['config']['website_url'] . "/\r\n";
    $pages_files   = get_sort('../engine/cms_data/pag_d.cms', '¦');
    $count         = 0;
    foreach ($pages_files as $page) {
        if ($page[7] == '0' && $page[8] == '1' && $page[9] == '0' && $page[6] == '1') {
            $start_sitemap .= $core['config']['website_url'] . '/' . ROOT_INDEX . '?' . LOAD_GET_PAGE . '=' . $page[3] . "\r\n";
        }
    }
    $open_site_maps  = fopen('../sitemap.txt', 'w');
    $add_site_maps   = fwrite($open_site_maps, $start_sitemap);
    $close_site_maps = fclose($open_site_maps);
    echo notice_message_admin('Sitemap successfully generated', 1, 0, 'index.php?get=seo_stimemaps');
} else {
    echo '
<form action="" name="form_edit" method="post" id="form1">
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card" style="margin-bottom: 0px;">
					<div class="header">
						<h2 style="text-align: center;">
							Sitemap Settings
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- input text -->
						<p class="lead" align="left">
                        	Generate Sitemap
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	<b>Note</b>: Pages that require <b>Authentication</b>, are marked as <b>Hide</b> or are <b>Inactive</b> are not included on sitemap.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
										<button type="submit" form="form1" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-top: 5px;">Run Sitemap Generator</button>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
                        
						<!-- input text -->
						<p class="lead" align="left">
                        	Google Sitemap Index URL
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	<b>Your Google Sitemap Index URL:</b> <a href="' . $core['config']['website_url'] . '/sitemap.txt" target="_blank">' . $core['config']['website_url'] . '/sitemap.txt</a>
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
<input type="hidden" name="sitemap"></form>
</form>';
    
    
    if (is_file('../sitemap.txt')) {
        echo '
<section class="content" style="margin: 30px auto 0 auto;width: 95%;">
	<div class="container-fluid">
            <!-- Striped Rows -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" style="margin-bottom: 0px;">
                        <div class="header">
                            <h2 style="text-align: center;">
                                Sitemap URLs
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>URLs</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px;">';
								$sitemaps = file('../sitemap.txt');
								$count == '0';
        						foreach ($sitemaps as $link) {
									$count++;
            						echo '
									<tr>
									<th scope="row">' . $count . '</th>
									<td>' . $link . '</td>
									</tr>';
        						}
        						if ($count == '0') {
            						echo '
									<tr>
        							<td align="center" class="panel_text_alt_list" colspan="2">No URLs found in sitemap</td>
        							</tr>';
            
        						}
        
    } else {
        echo 'Sitemap file not found.';
    }
	echo '
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Striped Rows -->
	</div>
</section>';
}
?> 