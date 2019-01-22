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
<!--slider-->
        	<div class="dyjGroup clearfix">
            	<div id="eye_number" class="dyj_numqu">
                <?php
				$s = 1;
				$slider = file("template/".$core['config']['template']."/extras/config/slider.tDB");
                foreach ($slider as $slider_data){
					$slider_data = explode("|",$slider_data);
			
					if ($s == 1){
						$class = 'on';
					} else {
						$class = 'off';
					}
					echo '
					<a class="'.$class.'" href="javascript:;">'.$s.'</a>
					';
					$s++;
				}
				?>
                </div>
                
                <div id="eye_box" class="dyj_pics">
        <?php
		$s2 = 1;
		foreach ($slider as $slider_data){
			$slider_data = explode("|",$slider_data);
			
			if ($s2 == 1){
				$slider_display = 'inline';
			} else {
				$slider_display = 'none';
			}
			echo '
			<a href="'.$slider_data[2].'" style="display: '.$slider_display.';">
            	<img alt="'.$slider_data[1].'" src="template/'.$core['config']['template'].'/images/slider/'.$slider_data[3].'" width="720" height="303"></a>';
			$s2++;
	
		}
		?>
                </div>
			</div>
<!--slider end-->