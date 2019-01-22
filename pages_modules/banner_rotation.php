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
$banner_config = simplexml_load_file('engine/config_mods/banner_settings.xml');

echo '
<script type="text/javascript" src="js/jquery.innerfade.js"></script>
<script type="text/javascript">
       $(document).ready(
                function(){

                    
                    $(\'ul#banners\').innerfade({
                        speed: ' . $banner_config->fade . ',
                        timeout: ' . $banner_config->delay . ',
                        type: \'sequence\',
                        containerheight: \'' . $banner_config->height . 'px\'
                    });
                    

                    


            });
      </script>
      

<style type="text/css">
ul#banners {list-style:none; margin:0;padding:0;}
li#banners { margin:0;padding:0;}
</style>

<ul id="banners">';
$list_banners = file('engine/variables_mods/banners.tDB');
foreach ($list_banners as $banner) {
    $banner = explode("¦", $banner);
    echo '
    <li>
    <a href="' . $banner[3] . '" title="' . $banner[1] . '">
    <img src="' . $banner[2] . '" alt="' . $banner[1] . '" border="0"></a>
    </li>';
}

echo '
</ul>
';
?>