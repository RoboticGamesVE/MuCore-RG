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
$settings = simplexml_load_file('engine/config_mods/news_settings.xml');
$active   = trim($settings->active);
if ($active == '0') {
    echo msg('0', text_sorry_feature_disabled);
} else {
    $core['news']['id'] = safe_input($_GET['iN'], '');
    $iN_file            = array_reverse(file('engine/variables_mods/news.tDB'));
    if (!isset($_GET['iN'])) {
        switch ($settings->news_style) {
            case '0':
                foreach ($iN_file as $iN_Data_full) {
                    $iN_Data_full = explode("¦", $iN_Data_full);
                    if ($iN_Data_full[8] == '1') {
                        if (($iN_Data_full[6] - time()) > 0) {
                            $iN_news_new  = '<img src="template/' . $core['config']['template'] . '/images/news_icon.png" border="0">';
                            $iN_news_new2 = '<img src="template/' . $core['config']['template'] . '/images/new.gif" border="0">';
                        } else {
                            $iN_news_new  = '<img src="template/' . $core['config']['template'] . '/images/news_icon_old.png" border="0">';
                            $iN_news_new2 = '';
                        }
                        
                        
                        $url = $core['config']['website_url'] . '/' . $core_run_script . '&iN=' . $iN_Data_full[0];
                        
                        
                        $title = str_replace(" ", "+", $iN_Data_full[2]);
                        echo '
        <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
         <td align="left" width="22" height="32">' . $iN_news_new . ' </td> 
         <td align="left" class="iN_title" width="97%"> <a href="' . $core_run_script . '&iN=' . $iN_Data_full[0] . '#news-' . $iN_Data_full[0] . '">' . htmlentities($iN_Data_full[2]) . '</a> ' . $iN_news_new2 . '</td>
        </tr>
        <tr>
         <td colspan="2" algin="left" style="background-image:url(template/' . $core['config']['template'] . '/images/inner_line.jpg); height: 2px;"></td>
        </tr>
        <tr>
         <td colspan="2" align="left" class="iN_date">' . text_posted_on . ' ' . date('F j, Y', $iN_Data_full[4]) . ' | ' . date('H:i', $iN_Data_full[4]) . '</td>
        </tr>
         <td colspan="2" algin="left" style="background-image:url(template/' . $core['config']['template'] . '/images/inner_line.jpg); height: 2px;"></td>
        </tr>
        <tr>
         <td colspan="2" align="left" class="iN_news_content">' . $iN_Data_full[3] . '</td>
        </tr>
                <tr>
         <td colspan="2" align="right">By <b>' . $iN_Data_full[5] . '</b> (Administrator)</td>
        </tr>
         <td colspan="2" algin="left" style="background-image:url(template/' . $core['config']['template'] . '/images/inner_line.jpg); height: 2px;"></td>
        </tr>
        
        ';
                        if ($settings->news_bookmarking == '1') {
                            echo '<tr>
         <td colspan="2" align="right" height="32"><a href="http://digg.com/submit?phrase=2&amp;url=' . $url . '&amp;title=' . $title . '"><img src="template/' . $core['config']['template'] . '/images/bookmarksite_digg.gif" border="0"></a> 
        <a href="http://del.icio.us/post?url=' . $url . '&amp;title=' . $title . '"><img src="template/' . $core['config']['template'] . '/images/bookmarksite_delicious.gif" border="0"></a>  
        <a href="http://www.stumbleupon.com/submit?url=' . $url . '&amp;title=' . $title . '"><img src="template/' . $core['config']['template'] . '/images/bookmarksite_stumbleupon.gif" border="0"></a> 
        <a href="http://www.google.com/bookmarks/mark?op=edit&amp;output=popup&amp;bkmk=' . $url . '&amp;title=' . $title . '"><img src="template/' . $core['config']['template'] . '/images/bookmarksite_google.gif" border="0"></a></td>
        </tr>';
                        }
                        echo '

        </table>
        
        
        ';
                    }
                }
                break;
            case '1':
			?>
<!--hotNews-->
<div class="HotNewsBox">
	<ul class="tabNav f-cb">
    <?php
	$i = 0;
	foreach ($iN_file as $iN_Data_full) {
		if($i == 0){
			$ii = 'hover';
		} else {
			$ii = '';
		}
		$i++;
		
		if($i == 6){
			break;
		}
		
                    $iN_Data_full = explode("¦", $iN_Data_full);
                    if ($iN_Data_full[8] == '1') {
                        $iN_Data_full[3] = strlen($iN_Data_full[3]) > trim($settings->news_short_long) ? substr($iN_Data_full[3], 0, trim($settings->news_short_long)) . "..." : $iN_Data_full[3];
                        
                        echo '
		<li class="ti '.$ii.'"><a href="' . $core_run_script . '&iN=' . $iN_Data_full[0] . '#news-' . $iN_Data_full[0] . '" title="'.htmlentities($iN_Data_full[9]).'">'.htmlentities($iN_Data_full[9]).'</a></li>';
					}
	}
	?>
	</ul>
	<p class="more"><a href="index.php?page_id=news">+ All News</a></p>
	<div class="newsCon f-cb">
		<ul class="news_nr">
        
        
			<?php
			$s = 0;
			foreach ($iN_file as $iN_Data_full) {
                    $iN_Data_full = explode("¦", $iN_Data_full);
                    if ($iN_Data_full[8] == '1') {
                        $iN_Data_full[3] = strlen($iN_Data_full[3]) > trim($settings->news_short_long) ? substr($iN_Data_full[3], 0, trim($settings->news_short_long)) . "..." : $iN_Data_full[3];
                        
                        
                        echo '
			<li class="news_nr_li">
		<table border="0" cellspacing="0" cellpadding="0" width="100%">
        	<tr>
         		<td colspan="2" align="left" class="iN_date">' . text_posted_on . ' ' . date('F j, Y', $iN_Data_full[4]) . ' | ' . date('H:i', $iN_Data_full[4]) . '</td>
        	</tr>
        	
			<tr>
         		<td colspan="2" align="left" class="iN_news_content">' . $iN_Data_full[3] . '</td>
        	</tr>
        
			<tr>
         		<td colspan="2" align="right"><span class="iN_new_read_more"><a href="' . $core_run_script . '&iN=' . $iN_Data_full[0] . '#news-' . $iN_Data_full[0] . '">[' . link_read_more . ']</a></span</td>
        	</tr>
		</table>
			</li>';
					}
			}
			?>  
		</ul>
	</div>
</div>
    <!--/hotNews-->
    <?php
                break;
            case '2':
                foreach ($iN_file as $iN_Data_full) {
                    $iN_Data_full = explode("¦", $iN_Data_full);
                    if ($iN_Data_full[8] == '1') {
                        if (($iN_Data_full[6] - time()) > 0) {
                            $iN_news_new  = '<img src="template/' . $core['config']['template'] . '/images/news_icon.png" border="0">';
                            $iN_news_new2 = '<img src="template/' . $core['config']['template'] . '/images/new.gif" border="0">';
                        } else {
                            $iN_news_new  = '<img src="template/' . $core['config']['template'] . '/images/news_icon_old.png" border="0">';
                            $iN_news_new2 = '';
                        }
                        
                        echo '
        
        <table border="0" cellspacing="0" cellpadding="0" width="100%" class="iN_news_table">
        <tr>
         <td align="left" width="22" height="32">' . $iN_news_new . ' </td> 
         <td align="left" class="iN_title"> <a href="' . $core_run_script . '&iN=' . $iN_Data_full[0] . '#news-' . $iN_Data_full[0] . '">' . htmlentities($iN_Data_full[2]) . '</a> ' . $iN_news_new2 . '</td>
          <td align="right" class="iN_date"><b>' . date('F j, Y', $iN_Data_full[4]) . ' | ' . date('H:i', $iN_Data_full[4]) . '</b></td>
        </tr>
        <tr>
         <td colspan="3" algin="left" style="background-image:url(template/' . $core['config']['template'] . '/images/inner_line.jpg); height: 2px;"></td>
        </tr>
        </table>
        ';
                        
                        #<td align="right" class="iN_date">'.date('M j, Y',$iN_Data_full[4]).'</td>
                    }
                    
                }
                break;
        }
    } elseif (isset($_GET['iN'])) {
        foreach ($iN_file as $iN_Data_full) {
            $iN_Data_full = explode("¦", $iN_Data_full);
            if ($iN_Data_full[0] == $core['news']['id']) {
                if ($iN_Data_full[8] == '1') {
                    if (($iN_Data_full[6] - time()) > 0) {
                        $iN_news_new  = '<img src="template/' . $core['config']['template'] . '/images/news_icon.png" border="0">';
                        $iN_news_new2 = '<img src="template/' . $core['config']['template'] . '/images/new.gif" border="0">';
                    } else {
                        $iN_news_new  = '<img src="template/' . $core['config']['template'] . '/images/news_icon_old.png" border="0">';
                        $iN_news_new2 = '';
                    }
                    $url   = $core['config']['website_url'] . '/' . $core_run_script . '&iN=' . $iN_Data_full[0];
                    $title = str_replace(" ", "+", $iN_Data_full[2]);
                    
                    echo '
        <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
         <td align="left" width="22" height="32">' . $iN_news_new . ' </td> 
         <td align="left" class="iN_title" width="97%"> <a href="' . $core_run_script . '&iN=' . $iN_Data_full[0] . '#news-' . $iN_Data_full[0] . '"  name="news-' . $iN_Data_full[0] . '">' . htmlentities($iN_Data_full[2]) . '</a> ' . $iN_news_new2 . '</td>
        </tr>
        <tr>
         <td colspan="2" algin="left" style="background-image:url(template/' . $core['config']['template'] . '/images/inner_line.jpg); height: 2px;"></td>
        </tr>
        <tr>
         <td colspan="2" align="left" class="iN_date">' . text_posted_on . ' on ' . date('F j, Y', $iN_Data_full[4]) . ' | ' . date('H:i', $iN_Data_full[4]) . '</td>
        </tr>
         <td colspan="2" algin="left" style="background-image:url(template/' . $core['config']['template'] . '/images/inner_line.jpg); height: 2px;"></td>
        </tr>
        <tr>
         <td colspan="2" align="left" class="iN_news_content">' . $iN_Data_full[3] . '</td>
        </tr>
        <tr>
         <td colspan="2" align="right">By <b>' . $iN_Data_full[5] . '</b> (Administrator)</td>
        </tr>
         <td colspan="2" algin="left" style="background-image:url(template/' . $core['config']['template'] . '/images/inner_line.jpg); height: 2px;"></td>
        </tr>
        
        ';
                    if ($settings->news_bookmarking == '1') {
                        echo '<tr>
         <td colspan="2" align="right" height="32"><a href="http://digg.com/submit?phrase=2&amp;url=' . $url . '&amp;title=' . $title . '"><img src="template/' . $core['config']['template'] . '/images/bookmarksite_digg.gif" border="0"></a> 
        <a href="http://del.icio.us/post?url=' . $url . '&amp;title=' . $title . '"><img src="template/' . $core['config']['template'] . '/images/bookmarksite_delicious.gif" border="0"></a>  
        <a href="http://www.stumbleupon.com/submit?url=' . $url . '&amp;title=' . $title . '"><img src="template/' . $core['config']['template'] . '/images/bookmarksite_stumbleupon.gif" border="0"></a> 
        <a href="http://www.google.com/bookmarks/mark?op=edit&amp;output=popup&amp;bkmk=' . $url . '&amp;title=' . $title . '"><img src="template/' . $core['config']['template'] . '/images/bookmarksite_google.gif" border="0"></a></td>
        </tr>';
                    }
                    echo '
        </table>
        ';
                    break;
                }
            }
        }
    }
}
?> 