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
header('Content-Type: text/html; charset=utf-8');
echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"\n"; 
echo "\"http://www.w3.org/TR/html4/loose.dtd\">\n"; 
echo "<html>\n"; 
echo "<head>\n"; 
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\n"; 
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"styles/default/panel.css\" />\n"; 
echo "<script type=\"text/javascript\">\n"; 
echo "var engine_current_version = '1.0.8';\n"; 
echo "</script>\n"; 
echo "<title> \n"; 

echo $core["config"]["websitetitle"];
echo "- Admin control panel</title></head>\n"; 
echo "\n"; 
echo "<body><table width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"border_big\" style=\"height: 60px;\">\n"; 
echo "<tr>\n"; 
echo " <td class=\"cat_big\" valign=\"top\">\n"; 
echo " <table width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\n"; 
echo " <tr>\n"; 
echo " <td align=\"left\" class=\"curent_version\"><b>MUCore Admin Control Panel version 1.0.8</b></td>\n"; 
echo " <td align=\"right\"><a href=\"";
echo $core["config"]["website_url"];
echo "\" target=\"_blank\">";
echo $core["config"]["websitetitle"];
echo " -  Home Page</a> | <a href=\"index.php?get=home\" target=\"body\">Admin Home</a> | <a href=\"logout.php\" target=\"_top\">Log Out</a></td>\n"; 
echo " </tr>\n"; 
echo "  <tr>\n"; 
echo " <td align=\"left\"><span class=\"last_version\">by Dao Van Trong - Trong.CF</span></td>\n"; 
echo " <td align=\"right\">&nbsp;</td>\n"; 
echo " </tr>\n"; 
echo " </table>\n"; 
echo " </td>\n"; 
echo "</tr>\n"; 
echo "</table></body></html>\n";
?>