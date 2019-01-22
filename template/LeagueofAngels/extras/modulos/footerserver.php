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
if ($get_config->footerserver == 1){
$footer_server = file('template/'.$core['config']['template'].'/extras/config/footerserver.tDB');
?>

    <!-- info -->
    <div class="content_info clearfix" <?php echo $display; ?> >
        <dl>
            <dt>
                <h3>INFO</h3>
                <a href="<?php echo $core['config']['website_url']."/sitemap.txt"; ?>" title="more" target="_blank">+ View All</a>
            </dt>
            
            <dd>
            	
                <?php
				foreach ($footer_server as $footer_data){
    				$footer_data = explode("|",$footer_data);
					echo '
					<span>
                    <strong>'.$footer_data[1].'</strong>
                        <p><a href="'.$footer_data[3].'" title="'.$footer_data[2].'">'.$footer_data[2].'</a></p>
                        <p><a href="'.$footer_data[5].'" title="'.$footer_data[4].'">'.$footer_data[4].'</a></p>
                	</span>';
				}
				?>
                
            </dd>
        </dl>
    </div>
    <!-- /info -->
<?php
}
?>