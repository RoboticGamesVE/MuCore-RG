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
?>
<article class="rankingWrap">
<ul class="shadowz" style="width:200px;">
<li class="du">Exchange System</li></ul>
<table width="100%" class="rankTable" align="center">
        <thead>
            <tr>
            <th width="40%"><b>Online Hours</b></th>
            <th width="40%"><b>Credits</b></th>
            <th width="20%">&nbsp;</th>
            </tr>
        </thead>       
        <tbody> 
<?

if(!isset($_SESSION['user_auth_id'])) { die("You need to be logged in."); }$name = $_SESSION['user_auth_id'];
$query = mssql_query("Select OnlineMinutes from MEMB_STAT where memb___id='$name'");
$hour = mssql_fetch_row($query);
$hours = $hour[0];
if(!isset($_POST['agree']))
{

?><form action="" method="post" name="module">

<tr align="center">
<td><? if($hours == "") { $hours = "0"; } echo($hours); ?></td>
<td><? $k = $hours*10; echo($k); ?> </td>
<td align="right">
<input type="submit" class="btnStylec" value="Exchange" name="agree" id="agree"></td>
</tr> 
</form>
<?
}
else
{
$name = $_SESSION['user_auth_id'];
$queryy = mssql_query("Select OnlineMinutes from MEMB_STAT where memb___id='$name'");
$hr = mssql_fetch_row($queryy);
$hh = $hr[0];

$mm = mssql_query("Select connectstat from MEMB_STAT where Memb___id='$name'");
$fmm = mssql_fetch_row($mm);
if($fmm[0] == "1")
{
die("<strong>You need to be <font color=red>OFFLINE</font> before you trade your hours.</strong>");
}
$credit = mssql_query("Select Credits from MEMB_CREDITS where memb___id='$name'");
$cr = mssql_fetch_row($credit);
$k = $hh * 10 + $cr[0];
mssql_query("Update MEMB_CREDITS set Credits='$k' where memb___id='$name'");
mssql_query("Delete from MEMB_STAT where memb___id='$name'");
$queryyy = mssql_query("Select OnlineMinutes from MEMB_STAT where memb___id='$name'");
$hrr = mssql_fetch_row($queryyy);
$hhh = $hrr[0];
echo('<td colspan="4" align="center">Succefuly added '.$k.' Credits</td>');
}
?>
</tbody></table></article>