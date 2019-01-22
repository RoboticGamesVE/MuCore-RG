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
ob_start();
if("1" == "1"){
$load_staff_settings = simplexml_load_file('engine/config_mods/staff_manager_settings.xml');
$active = trim($load_staff_settings->active);
if($active == '0'){
    echo msg('0',text_sorry_feature_disabled);
}else{
$smf = file('engine/variables_mods/staff_members.tDB');
echo '<article class="rankingWrap">
  <ul class="shadowz" style="width:200px;">
<li class="du">Staff Members</li></ul>
<table width="100%" class="rankTable" align="center">
        <thead>
            <tr>
            <th width="4%"><b>#</b></th>
            <th width="30%"><b>Name</b></th>
            <th width="40%"><b>Posistion</b></th>
            </tr>
        </thead>       
';
        $count=0;
foreach ($smf as $staff_data){
    $staff_data = explode(":",$staff_data);
    $count++;
echo '
<tr align="center">
<td>' .$count.'</td>
<td>'.$staff_data[1].'</td>
<td>'.$staff_data[2].'</td>
</tr> ';
}
if($count=='0'){
    echo '
    <td colspan="4" align="center">'.msg('0',text_module_vote_credits_t6).'</td>';

}
echo '</table></article>';
}
}
?>