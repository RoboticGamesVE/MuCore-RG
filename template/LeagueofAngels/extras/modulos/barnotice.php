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
if ($get_config->barnotice == 1) {
$barnotice_config = simplexml_load_file("template/".$core['config']['template']."/extras/config/barnotice.xml");
$noticia = trim($barnotice_config->f1);
$url1 = trim($barnotice_config->f2);
$url2 = trim($barnotice_config->f3);
$color = trim($barnotice_config->f4);
?>
<!--GDPR Bar Start-->
<style>
#agreement-box {
display:none;
}
</style>
<div id="agreement-box" class="gdpr-agreement-box" style="background-color:<?=$color;?>">
    <div class="agreement">
        <div class="agreement-details">
            <span class="details" title="<?=$noticia?>">
                <?=$noticia?>
            </span>
            <a href="<?=$url1?>">User Terms of Service</a>
            <a href="<?=$url2?>">Privacy Policy</a>
        </div>
            <a class="agree-btn" onclick="removeCookieNotice()"></a>
    </div>
</div>

<script type="text/javascript">
        function removeCookieNotice() {
            document.cookie="removeCookieNotice=1";
            $("#agreement-box").css("display","none");
        }

        function getCookie(name) {
            var re = new RegExp(name + "=([^;]+)");
            var value = re.exec(document.cookie);
            return (value != null) ? unescape(value[1]) : null;
        }

        if (getCookie('removeCookieNotice') != 1) {
            $("#agreement-box").css("display","block");
        }
        </script>
<!--GDPR Bar End-->
<?php
}
?>