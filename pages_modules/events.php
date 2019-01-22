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
$settings = simplexml_load_file('engine/config_mods/events_settings.xml');
$active   = trim($settings->active);
if ($active == '0') {
    echo msg('0', text_sorry_feature_disabled);
} else {
    $core['events']['id'] = safe_input($_GET['iN'], '');
    $iN_file            = array_reverse(file('engine/variables_mods/events.tDB'));
    if (!isset($_GET['iN'])) {
        switch ($settings->events_style) {
            case '0':
                foreach ($iN_file as $iN_Data_full) {
                    $iN_Data_full = explode("¦", $iN_Data_full);
                    if ($iN_Data_full[8] == '1') {
                        if (($iN_Data_full[6] - time()) > 0) {
                            $iN_events_new  = '';
                            $iN_events_new2 = '';
                        } else {
                            $iN_events_new  = '';
                            $iN_events_new2 = '';
                        }
                        
                        
                        $url = $core['config']['website_url'] . '/' . $core_run_script . '&iN=' . $iN_Data_full[0];
                        
                        
                        $title = str_replace(" ", "+", $iN_Data_full[2]);
                        echo '
<article class="eventslistStyle">
        <h1><a href="#">' . $iN_Data_full[2] . '</a></h1>  
        <div class="dateInfo"><span class="SprIco noti">Events</span>
        <time> ' . date('F j, Y', $iN_Data_full[4]) . '</time></div>
        <div class="newlistConts">' . $iN_Data_full[3] . '</div>
         </article>';
                        }
                    }
                
                break;
            case '1':
                foreach ($iN_file as $iN_Data_full) {
                    $iN_Data_full = explode("¦", $iN_Data_full);
                    if ($iN_Data_full[8] == '1') {
                        $iN_Data_full[3] = strlen($iN_Data_full[3]) > trim($settings->events_short_long) ? substr($iN_Data_full[3], 0, trim($settings->events_short_long)) . "..." : $iN_Data_full[3];
                        
                        echo '
        <article class="eventslistStyle">
        <h1><a href="' . $core_run_script . '&iN=' . $iN_Data_full[0] . '#events-' . $iN_Data_full[0] . '">[ EVENT ] ' . htmlentities($iN_Data_full[2]) . '</a></h1>  
        <div class="dateInfo"><span class="SprIco noti">events</span>
        <time> ' . date('F j, Y', $iN_Data_full[4]) . '</time></div>
            
        <div class="newlistConts">' . $iN_Data_full[3] . '</div>
        <div class="goMore"><a href="'. $core_run_script . '&iN=' . $iN_Data_full[0] . '#events-' . $iN_Data_full[0] . '">Read More</a></div> 
         ';
                    }
                    echo'</article>';
                }
                break;
            case '2':
                foreach ($iN_file as $iN_Data_full) {
                    $iN_Data_full = explode("¦", $iN_Data_full);
                    if ($iN_Data_full[8] == '1') {
                        if (($iN_Data_full[6] - time()) > 0) {
                            $iN_events_new  = '<img src="template/' . $core['config']['template'] . '/images/events_icon.png" border="0">';
                            $iN_events_new2 = '<img src="template/' . $core['config']['template'] . '/images/new.gif" border="0">';
                        } else {
                            $iN_events_new  = '<img src="template/' . $core['config']['template'] . '/images/events_icon_old.png" border="0">';
                            $iN_events_new2 = '';
                        }
                        
                        echo '
        
        <table border="0" cellspacing="0" cellpadding="0" width="100%" class="iN_events_table">
        <tr>
         <td align="left" width="22" height="32">' . $iN_events_new . ' </td> 
         <td align="left" class="iN_title"> <a href="' . $core_run_script . '&iN=' . $iN_Data_full[0] . '#events-' . $iN_Data_full[0] . '">' . htmlentities($iN_Data_full[2]) . '</a> ' . $iN_events_new2 . '</td>
          <td align="right" class="iN_date"><b>' . date('F j, Y', $iN_Data_full[4]) . ' | ' . date('H:i', $iN_Data_full[4]) . '</b></td>
        </tr>
        <tr>
         <td colspan="3" algin="left" style="background-image:url(template/' . $core['config']['template'] . '/images/inner_line.jpg); height: 2px;"></td>
        </tr>
        </table>
        ';
                       
                    }
                    
                }
                break;
        }
    } elseif (isset($_GET['iN'])) {
        foreach ($iN_file as $iN_Data_full) {
            $iN_Data_full = explode("¦", $iN_Data_full);
            if ($iN_Data_full[0] == $core['events']['id']) {
                if ($iN_Data_full[8] == '1') {
                    if (($iN_Data_full[6] - time()) > 0) {
                        $iN_events_new  = '<img src="template/' . $core['config']['template'] . '/images/events_icon.png" border="0">';
                        $iN_events_new2 = '<img src="template/' . $core['config']['template'] . '/images/new.gif" border="0">';
                    } else {
                        $iN_events_new  = '<img src="template/' . $core['config']['template'] . '/images/events_icon_old.png" border="0">';
                        $iN_events_new2 = '';
                    }
                    $url   = $core['config']['website_url'] . '/' . $core_run_script . '&iN=' . $iN_Data_full[0];
                    $title = str_replace(" ", "+", $iN_Data_full[2]);
                    
                    echo '
        <div class="eventsWrap">
        <article class="eventslistStyle">
            <h1>' . htmlentities($iN_Data_full[2]) . '</h1>
            <div class="dateInfo">
<span class="SprIco noti">events</span>
<time>' . date('F j, Y', $iN_Data_full[4]) . '</time>
            </div>
            <div class="shareSNS"></div>
            <div class="newlistContsView">
                <p>' . $iN_Data_full[3] . '</p>
            </div>
        </article>
</div>';
                    
                    break;
                }
            }
        }
    }
}
?> 