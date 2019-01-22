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
$settings = simplexml_load_file('engine/config_mods/downloads_settings.xml');
$active   = trim($settings->active);
if ($active == '0') {
    echo msg('0', 'Sorry, this feature is temporarily unavailable at the moment.');
} else {
    $iD_file = file('engine/variables_mods/downloads.tDB');
    echo '<table border="0" cellspacing="0" cellpadding="0" width="100%">';
    $count_fc = 0;
    $count_p  = 0;
    $count_u  = 0;
    
    
    foreach ($downloads_cat as $cat_id => $download_cat) {
        echo '
    <tr>
    <td align="left" class="iN_download_cat" colspan="2" style="padding-bottom: 4px;">' . $download_cat . ' </td>
    </tr>';
        
        foreach ($iD_file as $iD_data) {
            $iD_data = explode("¦", $iD_data);
            if ($iD_data[1] == '1') {
                if ($iD_data[2] == $cat_id) {
                    echo '

    <tr>
    <td align="left" style="padding-top: 10px; padding-bottom: 10px; padding-left: 20px;" valign="top"><span class="iN_download_title"><b>' . $iD_data[3] . '</b></span>
    <br>
    <span class="iN_description">' . htmlspecialchars($iD_data[4]) . '</span>
    </td>
    <td width="150px" align="center"><a href="' . $iD_data[5] . '" target="_blank"><img src="template/' . $core['config']['template'] . '/images/download_btn.gif" border="0" title="Download"></a></td>
  </tr>

        <tr>
            <td colspan="2" style="background-image:url(template/' . $core['config']['template'] . '/images/inner_line.jpg);  height: 2px;"></td>
            </td>';
                }
                
                
            }
        }
        echo '<tr>
    <td colspan="2">&nbsp;</td>
    </tr>';
        
        
        
    }
    
    echo '</table>';
}
?> 
<style> <!--
.pageFullWrap {clear:both;width:550px;padding:15px 0 0 31px;}
.pageFullWrap h2 {clear:both;padding-top:10px;font:bold 24px/1.2 Arial, Verdana, sans-serif;color:#f0dfbc;}
.pageFullWrap h2.top {padding-top:5px;}
.pageFullWrap h2 span {font:normal 12px/1.2 Arial, Verdana, sans-serif;color:#d25705;}
.pageFullWrap h2 a, .pageFullWrap h1 a:hover {font:bold 12px/1.2 Arial, Verdana, sans-serif;color:#d25705;text-decoration:none;}
.pageFullWrap p.downTxt {clear:both;padding:10px 0 15px 0;font:normal 14px/1.2 Arial, Verdana, sans-serif;color:#aaa;}
.pageFullWrap .downBtnWrap {clear:both;position:top;width:550px;background:url('images/download_btnWrap_bg_bottom.gif') no-repeat left bottom;}
.pageFullWrap .downBtnBox {padding:29px 0 15px 10px;background:url('images/download_btnWrap_bg_top.gif') no-repeat left top;}

.pageFullWrap .downBtnWrap .direct {float:left;padding:0 30px 20px 150px;}
*+html .pageFullWrap .downBtnWrap .direct {padding-bottom:0;}
.pageFullWrap .downBtnWrap .direct a {display:block;width:290px;height:35px;padding:16px 0 0 0;font:bold 14px/1.2 Georgia, Arial, Verdana;color:#f6e5e2;text-align:center;background:url('images/download_btn_bg.jpg') no-repeat;}
.pageFullWrap .downBtnWrap .direct a:hover {text-decoration:none;color:#f6e5e2;}
.pageFullWrap .downBtnWrap .torrnet {float:left;}
.pageFullWrap .downBtnWrap .torrnet a {display:block;width:290px;height:35px;padding:16px 0 0 0;font:bold 14px/1.2 Georgia, Arial, Verdana;color:#f3e4cc;text-align:center;background:url('images/download_btn_bg.jpg') no-repeat;}
.pageFullWrap .downBtnWrap .torrnet a:hover {text-decoration:none;color:#f3e4cc;}

.pageFullWrap .downBtnWrap .patch {clear:both;width:500px;padding-top:15px;font:normal 14px/2.0 Arial, Verdana, sans-serif;color:#aaa;border-top:1px solid #2c2c2c;}
.pageFullWrap .downBtnWrap .patch a {font-size:12px;color:#d25705;}
.pageFullWrap .update {float:right;padding:10px 20px 0 0;font:bold 11px/1.2 Arial, Verdana, sans-serif;color:#efdfa7;}
.pageFullWrap .update span {padding-left:10px;color:#efdfa7;}
.pageFullWrap .downTip {clear:both;}
.pageFullWrap .downTip dt {padding:10px 0;font:bold 14px/1.2 Arial, Verdana, sans-serif;color:#ffb400;}
.pageFullWrap .downTip dd {font:normal 12px/1.5 Arial, Verdana, sans-serif;color:#aaa;}
.pageFullWrap .downTip dd a {font:bold 12px/1.5 Arial, Verdana, sans-serif;color:#d25705;}
.pageFullWrap .systemSpce {}
.pageFullWrap .systemSpce th {padding:7px 0 8px 0;font:normal 11px/1.2 Arial, Verdana, sans-serif;color:#fff;border-top:1px solid #3d3d3d;border-bottom:1px solid #0f0f0f;background:#333;}
.pageFullWrap .systemSpce td {padding:7px 0 8px 0;font:normal 12px/1.2 Arial, Verdana, sans-serif;color:#aaa;text-align:center;border-bottom:1px solid #333;}
.pageFullWrap .systemSpce th.last {color:#fff;background:#bd7723;border-top:1px solid #ca8f2a;border-bottom:1px solid #38230a;} 
.pageFullWrap .systemSpce td.last {color:#f0dfbc;background:#2c2c2c;} 
.pageFullWrap .downMirror {clear:both;}
.pageFullWrap .downMirror li {float:left;width:163px;height:63px;padding:7px 0 0 7px;margin:6px 0 0 7px;background:url('images/down_mirror_bg.gif') no-repeat;}
.pageFullWrap .downMirror li.first {margin-left:0;}
.pageFullWrap .downMirror li img {width:156px;height:56px;}
.pageFullWrap .downLinkEtc li {float:left;padding-bottom:30px;}
-->
</style>
<article class="pageFullWrap">                        
<!--
<h2 class="top">Client Downloads</h2>
<p class="downTxt">Download and install the full client to play MU Online for free.</p>
<article class="downBtnWrap">
    <div class="downBtnBox">
<div class="direct"><a href="#">DOWNLOAD NOW</a></div>
<div class="direct"><a href="#">TORRENT DOWNLOAD</a></div>
<p class="patch">Game Patch :
<strong>Manual Patch is currently unavailable</strong></p>
    </div>
</article>-->
<h2>System Requirements</h2>
  <p class="downTxt">Please check your system specifications to ensure your system is suitable for the fluidity of game play.</p>
    <table width="550" class="systemSpce" cellspacing="0" cellpadding="0" >
        <colgroup>
            <col width="250">
            <col width="350">
            <col width="*" class="pointColor">
        </colgroup>
        <thead>
            <tr>
                <th>Component</th>
                <th>Requirements</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Operating System</td>
                <td>Windows XP</td>
            </tr>
            <tr>
                <td>Processor</td>
                <td>Pentium 4 - 2.0 Ghz or Higher</td>
            </tr>
            <tr>
                <td>System Memory</td>
                <td>1 GB or higher</td>
            </tr>
            <tr>
                <td>Video Card</td>
                <td>3D graphics processor</td>
            </tr>
            <tr>
                <td>DirectX Version</td>
                <td>DirectX 9.0c or higher</td>
            </tr>
            <tr>
                <td>Hard Disk Space</td>
                <td>2GB or Higher</td>
            </tr>
        </tbody>
    </table>
</article>