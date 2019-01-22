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
<li class="du">Account Information</li></ul>
<table width="100%" class="rankTable" align="center">
        <thead>
            <tr>
            <th width="20%"><b>Credits</b></th>
            <th width="20%"><b>WCoinP</b></th>
            <th width="20%"><b>WCoinC</b></th>
            <th width="20%"><b>WCoinG</b></th>
            </tr>
        </thead>       
        <tbody>
        <?php
$idw = mssql_query("Select memb_guid , memb___id from MEMB_INFO where memb___id ='".$user_auth_id."'");
$idw_c = mssql_fetch_row($idw);        
$select_cred_check= mssql_query("Select credits from MEMB_CREDITS where memb___id='".$user_auth_id."'"); 
$s_c_checks= mssql_fetch_row($select_cred_check);
$select_wcoinp_check= mssql_query("Select WCoinP from GameShop_Data where MemberGuid='".$idw_c[0]."'");
$s_wp_checks= mssql_fetch_row($select_wcoinp_check); 
$select_wcoinc_check= mssql_query("Select WCoinC from GameShop_Data where MemberGuid='".$idw_c[0]."'");
$s_wc_checks= mssql_fetch_row($select_wcoinc_check); 
$select_wcoing_check= mssql_query("Select WCoinG from GameShop_Data where MemberGuid='".$idw_c[0]."'");
$s_wg_checks= mssql_fetch_row($select_wcoing_check); 

        echo'
<tr align="center">
<td>'.$s_c_checks[0].'</td>
<td>'.$s_wp_checks[0].'</td>
<td>'.$s_wc_checks[0].'</td>
<td>'.$s_wg_checks[0].'</td>
</tr>'; ?>
</tbody></table></article>         

