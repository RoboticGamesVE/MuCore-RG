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
    if ($get_config->footerrg == 1){
        $footerrg_config = simplexml_load_file("template/".$core['config']['template']."/extras/config/footerrg.xml");
?>
<div class="intFooter">
    <div class="intFooter_nr wrapper">
        <h2>
            <a href="<?php echo $footerrg_config->f1; ?>" title="" target="_blank">
                <img src="template/<?=$core['config']['template'] ?>/images/logo_small_w.png">
            </a>
        </h2>
        <p class="ft_nav">
        <?php
            echo '
            <a href="'.$footerrg_config->f1.'" title="Home" target="_blank">Home</a> |
            <a href="'.$footerrg_config->f2.'" title="Company" target="_blank">Company</a> |
            <a href="'.$footerrg_config->f3.'" title="Contact Us" target="_blank">Contact Us</a> |
            <a href="'.$footerrg_config->f4.'" title="Terms Of Service" target="_blank">Terms Of Service</a> |
            <a href="'.$footerrg_config->f4.'" title=" Privacy Policy" target="_blank">Privacy Policy</a> |
            <a href="'.$footerrg_config->f5.'" title="MuOnline Server">MuOnline Server</a>';
        ?>
        </p>
        <p class="ft_sm">©<?php echo $footerrg_config->f6; ?>.</p>
    </div>
</div>
<?php
    }
?>