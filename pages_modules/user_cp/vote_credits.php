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
$load_vote_settings = simplexml_load_file('engine/config_mods/vote_credits_settings.xml');
$active = trim($load_vote_settings->active);
if($active == '0'){
    echo msg('0',text_sorry_feature_disabled);
}else{
$delay_hours = trim($load_vote_settings->delay_hours);
$votef = file('engine/variables_mods/vote_credits.tDB');
if(isset($_GET['vid'])){
    if(!empty($_GET['vid'])){
    $delete_time_script = $core_db->Execute("select deletetime from MUCore_VoteCreditsIp order by  deletetime asc");
    while (!$delete_time_script->EOF){
        $time_check2 = $delete_time_script->fields[0]-time();
        if($time_check2 <= 0){
            $delete_time = $core_db->Execute("Delete from MUCore_VoteCreditsIp where deletetime=?",array($delete_time_script->fields[0]));
        }
        
        $delete_time_script->MoveNext();
    }
    
    $make_time_hours2 = $delay_hours*3600;
    $time_vote2 = time()+$make_time_hours2;
    
    $check_ip = $core_db->Execute("Select username,ip,deletetime from MUCore_VoteCreditsIp where username=?",array($user_auth_id));
    if($check_ip->EOF){
        $check_ip_2 = $core_db->Execute("Select ip from MUCore_VoteCreditsIp where ip=?",array($_SERVER['REMOTE_ADDR']));
        if(!$check_ip_2->EOF){
            echo msg('0',str_replace("{delay_hours}",$delay_hours,text_module_vote_credits_t1));
        }else{
            $create_ip_acc = $core_db->Execute("Insert into MUCore_VoteCreditsIp (username,deletetime,ip)VALUES(?,?,?)",array($user_auth_id,$time_vote2,$_SERVER['REMOTE_ADDR']));
        }
    }else{
        $voteid = safe_input($_GET['vid'],'');
        foreach ($votef as $vote_dat_re){
            $vote_dat_re = explode("¦",$vote_dat_re);
            if($vote_dat_re[0] == $voteid){
                $vote_credits = $vote_dat_re[3];
                $vote_link = $vote_dat_re[2];
                $vote_id_found = '1';
                $vote_id = $vote_dat_re[0];
                break;
            }
        }
        if($vote_id_found == '1'){
            $select_vote = $core_db->Execute("Select username,vote_time from MUCore_VoteCredits where username=? and vote_id=?",array($user_auth_id,$vote_id));
            $make_time_hours = $delay_hours*3600;
            $time_vote = time()+$make_time_hours;
            if($select_vote->EOF){
                $insert_username = $core_db->Execute("insert into MUCore_VoteCredits(vote_id,username,vote_time)VALUES(?,?,?)",array($vote_id,$user_auth_id,$time_vote));
                if($insert_username){
                    $check_memb_acc = $core_db2->Execute("Select memb___id from memb_Credits where memb___id=?",array($user_auth_id));
                    if($check_memb_acc->EOF){
                                        $x = $core_db2->Execute("Select TVote from MEMB_INFO where memb___id=?",array($user_auth_id));
                    $xx = $x->fetchrow();
                    $k = $xx[0]+1;
                    $core_db2->Execute("Update MEMB_INFO set TVote = '$k' where memb___id=?",array($user_auth_id));
                        $insert_memb_acc = $core_db2->Execute("INSERT INTO MEMB_CREDITS(memb___id,credits)VALUES(?,?)",array($user_auth_id,$vote_credits));
                        if($insert_memb_acc){
                            header('Location: '.$vote_link.'');
                        }else{
                            echo msg('0',text_module_vote_credits_t2);
                        }
                        
                    }else{
                    $x = $core_db2->Execute("Select TVote from MEMB_INFO where memb___id=?",array($user_auth_id));
                    $xx = $x->fetchrow();
                    $k = $xx[0]+1;
                    $core_db2->Execute("Update MEMB_INFO set TVote = '$k' where memb___id=?",array($user_auth_id));
                        $insert_credits = $core_db2->Execute("Update memb_credits set credits=credits+".$vote_credits." where memb___id=?",array($user_auth_id));
                        if($insert_credits){
                            header('Location: '.$vote_link.'');
                        }else{
                            echo msg('0',text_module_vote_credits_t2);
                        }
                    }
                }
            }else {
                $time_check = $select_vote->fields[1]-time();
                if($time_check > 0){
                    echo msg('0',str_replace("{delay_hours}",$delay_hours,text_module_vote_credits_t3));
                }else{
                    $update_vote_info = $core_db->Execute("Update MUCore_VoteCredits set [vote_time]=$time_vote where username=? and vote_id=?",array($user_auth_id,$vote_id));
                    if($update_vote_info){
                                        $x = $core_db2->Execute("Select TVote from MEMB_INFO where memb___id=?",array($user_auth_id));
                    $xx = $x->fetchrow();
                    $k = $xx[0]+1;
                    $core_db2->Execute("Update MEMB_INFO set TVote = '$k' where memb___id=?",array($user_auth_id));
                        $insert_credits = $core_db->Execute("Update memb_credits set credits=credits+".$vote_credits." where memb___id=?",array($user_auth_id));
                        if($insert_credits){
                            header('Location: '.$vote_link.'');
                        }else{
                            echo msg('0',text_module_vote_credits_t2);
                        }
                    }
                }
            }
        }
        }
    }
}

echo '<article class="rankingWrap">
  <ul class="shadowz" style="width:200px;">
<li class="du">Vote for FREE CREDIT`S</li></ul>
<table width="100%" class="rankTable" align="center">
        <thead>
            <tr>
            <th width="4%"><b>#</b></th>
            <th width="30%"><b>Name</b></th>
            <th width="40%"><b>Credit`s</b></th>
            <th width="20%">&nbsp;</th>
            </tr>
        </thead>       
        <tbody> ';
        $count=0;
foreach ($votef as $vote_data){
    $vote_data = explode("¦",$vote_data);
    $count++;
    
echo '
<tr align="center">
<td>' .$count.'</td>
<td>'.htmlspecialchars($vote_data[1]).'</td>
<td>'.number_format($vote_data[3]).'</td>
<td align="right"><form action="'.$core_run_script.'&vid='.$vote_data[0].'" method="post">
<input type="submit" class="btnStylec" value="Vote Now !"></form></td>
</tr> ';
}
if($count=='0'){
    echo '
    <td colspan="4" align="center">'.msg('0',text_module_vote_credits_t6).'</td>
</tbody> ';

}
echo '</table></article>';
}
}
?>