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
    /*/ Requests allowed only from localhosz
    extract($_POST);
    extract($_SERVER);
    $host = "127.0.0.1";
    $timeout = "1";

    if ($REMOTE_ADDR) {
        if ($REMOTE_ADDR != $host) {
            echo "<p><h2> FORBIDDEN FOR CLIENT $REMOTE_ADDR <h2></p>";
            exit;
        }
    } */
?>


<?php 
   ob_start(); 
   phpinfo(); 
   $DaoVanTrong = ob_get_contents(); 
   ob_end_clean(); 
   preg_match_all("=<body[^>]*>(.*)</body>=siU", $DaoVanTrong, $a); 
   $phpinfo = $a[1][0]; 
   $phpinfo = str_replace( 'width="600"', 'width="750"', $phpinfo ); 
   $phpinfo = str_replace( 'border="0" cellpadding', 'class="x" border="0" cellpadding', $phpinfo ); 
   $phpinfo = str_replace( '<td>', '<td><div class="tt">', $phpinfo ); 
   $phpinfo = str_replace( '<td class="e">', '<td class="e"><div class="te">', $phpinfo ); 
   $phpinfo = str_replace( '<td class="v">', '<td class="v"><div class="tv">', $phpinfo ); 
   $phpinfo = str_replace( '</td>', '</div></td>', $phpinfo ); 

?> 
<!DOCTYPE html> 
<html lang="en"> 
   <head> 
   <title>phpinfo()</title> 
<style type="text/css"> 
<!-- 
body { 
   margin: 10px 10px 10px; 
   background-color: #fff; 
   color: #000000; 
} 
body,p,h1,h2,h3,h4,h5,h6,td,ul,ol,li,div,address,blockquote,nobr { 
   font-size: 11px; 
    font-family: "Segoe UI", Verdana, Tahoma, Arial Helvetica, Geneva, Sans-Serif; 
   font-weight: normal; 
} 
pre { 
   margin: 0px; 
    font-family: "Segoe UI", monospace; 
} 
a:link { 
   color: #000099; 
   text-decoration: none; 
} 
a:hover { 
   text-decoration: underline; 
} 
table { 
   border-collapse: collapse; 
} 
.center { 
   text-align: center; 
} 
.center table { 
   margin-left: auto; 
   margin-right: auto; 
   text-align: left; 
} 
.center th { 
   text-align: center !important; 
} 
td, th { 
   border: 1px solid #a2aab8; 
   vertical-align: baseline; 
} 
h1 { 
   font-size: 16px; 
   font-weight: bold; 
} 
h2 { 
   font-size: 14px; 
   font-weight: bold; 
} 
.p { 
   text-align: left; 
} 
.e { 
   background-color: #e3e3ea; 
   font-weight: bold; 
   color: #000000; 
} 
.h { 
   background-color: #a2aab8; 
   font-weight: bold; 
   color: #000000; 
   font-size: 11px; 
} 
.v { 
   background-color: #efeff4; 
   color: #000000; 
} 
i { 
   color: #666666; 
   background-color: #cccccc; 
} 
img { 
   float: right; 
   border: solid 1px #1a1a1a; 
   background-color:#9999cc; 
} 
hr { 
   width: 750px; 
   background-color: #cccccc; 
   border: 0px; 
   height: 1px; 
   color: #1a1a1a; 
} 
.x { 
   width: 750px; 
} 
.tt { 
} 
.te { 
   font-weight:bold; 
} 
.tv { 
   position:relative; 
   overflow:auto; 
} 
//--> 
</style> 
   </head> 

<body> 
<?php 
 echo $phpinfo; 
?> 
</body> 
</html> 