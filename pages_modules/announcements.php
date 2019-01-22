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
require('engine/announcement_config.php');

if ($core['ANNOUNCEMENT']['ACTIVE'] == '0') {
    echo msg('0', text_sorry_feature_disabled);
} else {
    $ann = array_reverse(file('engine/variables_mods/announcements.tDB'));
    foreach ($ann as $info) {
        $info = explode("¦", $info);
        echo '<table border="0" cellspacing="0" cellpadding="0" width="100%" style="margin-bottom: 20px;">
    <tr>
         <td align="left" colspan="2" class="iN_title" width="97%"><a name="announcement-' . $info[0] . '"></a>' . htmlentities($info[1]) . '</td>
        </tr>
        <tr>
         <td colspan="2" algin="left" style="background-image:url(template/' . $core['config']['template'] . '/images/inner_line.jpg);  height: 2px;"></td>
        </tr>
        <tr>
         <td  align="left" class="iN_date">' . date('F j, Y', $info[2]) . ' ' . text_untill . ' ' . date('F j, Y', $info[3]) . '</td>
          <td align="right">';
        if ($core['ANNOUNCEMENT']['AUTHOR'] == '1') {
            echo '<b>' . $core['config']['admin_nick'] . '</b> (Administrator)</td>';
        }
        echo '</tr>
          </tr>
         <td colspan="2" algin="left" style="background-image:url(template/' . $core['config']['template'] . '/images/inner_line.jpg); height: 2px;"></td>
        </tr>
         <tr>
         <td colspan="2" align="left" class="iN_news_content">&nbsp;&nbsp;&nbsp;' . $info[4] . '</td>
        </tr>

        </table>
    
    ';
        
    }
    
    
}
?> 