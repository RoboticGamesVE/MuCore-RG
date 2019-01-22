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
if ($get_config->socialbar == 1){
	$socialbar = simplexml_load_file('template/'.$core['config']['template'].'/extras/config/socialbar.xml');
?>
<!--Social Bar End-->
<div class="piaofu">
    <ul>
        <li>
            <a class="wd" href="<?=$socialbar->link1?>" target="_blank" title="mini-client"></a>
            <p class="wdzt">mini-client</p>
        </li>
        <li>
            <a class="fk" href="<?=$socialbar->link2?>" rel="nofollow" target="_blank" title="facebook"></a>
            <p>facebook</p>
        </li>
        <li>
            <a class="tw" href="<?=$socialbar->link3?>" rel="nofollow" target="_blank" title="Twitter"></a>
            <p>Twitter</p>
        </li>
        <li>
            <a class="yt" href="<?=$socialbar->link4?>" rel="nofollow" target="_blank" title="youtube"></a>
            <p>youtube</p>
        </li>
        <li>
            <a class="fu" href="<?=$socialbar->link5?>" target="_blank" title="forums"></a>
            <p>forums</p>
        </li>
        <li>
            <a class="sr" href="<?=$socialbar->link6?>" target="_blank" title="services"></a>
            <p>services</p>
        </li>
    </ul>
</div>
<!--Social Bar End-->
<?php
}
?>