<article class="rankingWrap">
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
        require ('engine/statistics_config.php');
        require ('engine/tables_config.php');
        
                if($_GET['s']==statistics) { echo'<ul class="rankCsCryworfTab">
        <li class="du"><a href="index.php?page_id=stats&s=statistics" class="on">Statistics</a></li>
        <li class="du"><a href="index.php?page_id=stats&s='.$server['statistics']['name'].'">'.$server['statistics']['name'].'</a></li>';
        if($server1['statistics']['on_off1']==1){ echo'<li class="du"><a href="index.php?page_id=stats&s='.$server1['statistics']['name1'].'">'.$server1['statistics']['name1'].'</a></li>'; }
        if($server2['statistics']['on_off2']==1){ echo'<li class="du"><a href="index.php?page_id=stats&s='.$server2['statistics']['name2'].'">'.$server2['statistics']['name2'].'</a></li></ul>'; }
        elseif($server1['statistics']['on_off1']==0) { echo '</ul>';} 
        elseif($server2['statistics']['on_off2']==0) { echo '</ul>';}
        
        $characters = mssql_query("SELECT count(*) FROM ".$ranking['character']['table']."");
        $totalchars = mssql_fetch_row($characters);
        $accounts = mssql_query("SELECT count(*) FROM MEMB_INFO");
$totalacc = mssql_fetch_row($accounts);
$guild = mssql_query("SELECT count(*) FROM ".$ranking['guild']['table']."");
$totalguilds = mssql_fetch_row($guild);
$bannedchar = mssql_query("SELECT count(*) FROM Character WHERE CtlCode='1' or CtlCode='17'");
$bannchar = mssql_fetch_row($bannedchar);
$bannedacc = mssql_query("SELECT count(*) FROM MEMB_INFO where bloc_code ='1'");
$bannacc = mssql_fetch_row($bannedacc);
$gm = mssql_query("SELECT * FROM ".$ranking['character']['table']." WHERE CtlCode = 32");
$gms = mssql_num_rows($gm);
$gmon = mssql_fetch_array($gm);
$gmonline = mssql_query("SELECT * FROM MEMB_STAT WHERE memb___id='$gmon[AccountID]' AND ConnectStat=1");
$gmsonline = mssql_num_rows($gmonline);
$load = substr(100 * $online / 200, 0, 5);  
        
        
echo'<br><br><br>
          
          <table width="500" class="rankTable" align="center">
    <thead>
            <tr>
                <th width="255">Other Information</th>
                <th width="233">Count`s</th>
            </tr>
        </thead>
        
        <tbody>

                    <tr align="left">
                        <td height="22">Account`s</td>
                        <td>'.$totalacc['0'].'</td>
                    </tr>
                    <tr>
                        <td>Characters</td>
                        <td>'.$totalchars['0'].'</td>
                    </tr>
                    <tr>
                      <td>Guilds</td>
                      <td>'.$totalguilds['0'].'</td>
                    </tr>
                    <tr>
                      <td>Banned Account`s</td>
                      <td>'.$bannacc['0'].'</td>
                    </tr>
                    <tr>
                      <td>Banned Characters</td>
                      <td>'.$bannchar['0'].'</td>
                    </tr>
                    <tr>
                      <td>Game Masters</td>
                      <td><font color="#00a650">'.$gmsonline.'</font> / '.$gms.'</td>
                    </tr>
                    <tr>
                      <td>Server Load</td>
                      <td>'.$load.' %</td>
                    </tr>
        </tbody>
        </table> 
        '; 

                } 
                
        
        
        
        if($_GET['s']==$server['statistics']['name']) { echo'<ul class="rankCsCryworfTab">
        <li class="du"><a href="index.php?page_id=stats&s=statistics">Information</a></li>
        <li class="du"><a href="index.php?page_id=stats&s='.$server['statistics']['name'].'" class="on">'.$server['statistics']['name'].'</a></li>';
        if($server1['statistics']['on_off1']==1){ echo'<li class="du"><a href="index.php?page_id=stats&s='.$server1['statistics']['name1'].'">'.$server1['statistics']['name1'].'</a></li>'; }
        if($server2['statistics']['on_off2']==1){ echo'<li class="du"><a href="index.php?page_id=stats&s='.$server2['statistics']['name2'].'">'.$server2['statistics']['name2'].'</a></li></ul>'; }
        elseif($server1['statistics']['on_off1']==0) { echo '</ul>';} 
        elseif($server2['statistics']['on_off2']==0) { echo '</ul>';} 

          print '
          <br><br><br><br>
    <table width="500" class="rankTable" align="center">
    <thead>
            <tr>
                <th width="255">Name</th>
                <th width="233">Information</th>
            </tr>
      </thead>
<tbody>
<tbody>

            <tr align="left">
            <td height="22">'.$server['statistics']['name'].'</td>
            <td>';if ($check=@fsockopen($server['statistics']['ip'] ,$server['statistics']['port'],$ERROR_NO,$ERROR_STR,(float)0.1)) { fclose($check); $serveron = '<font color="green">Online</font>'; }else { $serveron = '<font color="red">Offline</font>'; } 
            echo''.$serveron.'';
            echo'</td>
            </tr>
            <tr>
            <td>Server Type</td>
            <td>'.$server['statistics']['type'].'</td>
            </tr>
            <tr>
            <td>Experience</td>
            <td>'.$server['statistics']['exp'].' x</td>
            </tr>
            <tr>
            <td>Drop</td>
            <td>'.$server['statistics']['drop'].' %</td>
            </tr>
            <tr>
            <td>Zen Drop</td>
            <td>'.$server['statistics']['zen'].' %</td>
            </tr>
            <tr>
            <td>Chaos Machine</td>
            <td>'.$server['statistics']['cm'].' %</td>
            </tr>
            <tr>
            <td>Points / Level</td>
            <td>'.$server['statistics']['ppl'].'</td>
            </tr>
            </tbody>
            </table>
';
        }
        //SERVER2 CONFIGURATIOn
        
        elseif($_GET['s']==$server1['statistics']['name1']) { echo'<ul class="rankCsCryworfTab">
        <li class="du"><a href="index.php?page_id=stats&s=statistics">Information</a></li>
        <li class="du"><a href="index.php?page_id=stats&s='.$server['statistics']['name'].'">'.$server['statistics']['name'].'</a></li>';
        if($server1['statistics']['on_off1']==1){ echo'<li class="du"><a href="index.php?page_id=stats&s='.$server1['statistics']['name1'].'" class="on">'.$server1['statistics']['name1'].'</a></li>'; }
        if($server2['statistics']['on_off2']==1){ echo'<li class="du"><a href="index.php?page_id=stats&s='.$server2['statistics']['name2'].'">'.$server2['statistics']['name2'].'</a></li></ul>'; }
        elseif($server1['statistics']['on_off1']==0) { echo '</ul>';} 
        elseif($server2['statistics']['on_off2']==0) { echo '</ul>';} 
        print '          <br><br><br><br>
    <table width="500" class="rankTable" align="center">
    <thead>
            <tr>
                <th width="255">Name</th>
                <th width="233">Information</th>
            </tr>
      </thead>
<tbody>
<tbody>

            <tr align="left">
            <td height="22">'.$server1['statistics']['name1'].'</td>
            <td>';if ($check=@fsockopen($server1['statistics']['ip1'] ,$server1['statistics']['port1'],$ERROR_NO,$ERROR_STR,(float)0.1)) { fclose($check); $serveron1 = '<font color="green">Online</font>'; }else { $serveron1 = '<font color="red">Offline</font>'; } 
            echo''.$serveron1.'';
            echo'</td>
            </tr>
            <tr>
            <td>Server Type</td>
            <td>'.$server1['statistics']['type1'].'</td>
            </tr>
            <tr>
            <td>Experience</td>
            <td>'.$server1['statistics']['exp1'].' x</td>
            </tr>
            <tr>
            <td>Drop</td>
            <td>'.$server1['statistics']['drop1'].' %</td>
            </tr>
            <tr>
            <td>Zen Drop</td>
            <td>'.$server1['statistics']['zen1'].' %</td>
            </tr>
            <tr>
            <td>Chaos Machine</td>
            <td>'.$server1['statistics']['cm1'].' %</td>
            </tr>
            <tr>
            <td>Points / Level</td>
            <td>'.$server1['statistics']['ppl1'].'</td>
            </tr>
            </tbody>
            </table>
';
        }
        
        //SERVER2 CONFIGURATIOn
        
        elseif($_GET['s']==$server2['statistics']['name2']) { echo'<ul class="rankCsCryworfTab">
        <li class="du"><a href="index.php?page_id=stats&s=statistics">Information</a></li>
        <li class="du"><a href="index.php?page_id=stats&s='.$server['statistics']['name'].'">'.$server['statistics']['name'].'</a></li>';
        if($server1['statistics']['on_off1']==1){ echo'<li class="du"><a href="index.php?page_id=stats&s='.$server1['statistics']['name1'].'">'.$server1['statistics']['name1'].'</a></li>'; }
        if($server2['statistics']['on_off2']==1){ echo'<li class="du"><a href="index.php?page_id=stats&s='.$server2['statistics']['name2'].'" class="on">'.$server2['statistics']['name2'].'</a></li></ul>'; }
        elseif($server1['statistics']['on_off1']==0) { echo '</ul>';} 
        elseif($server2['statistics']['on_off2']==0) { echo '</ul>';} 
        print '          <br><br><br><br>
    <table width="500" class="rankTable" align="center">
    <thead>
            <tr>
                <th width="255">Name</th>
                <th width="233">Information</th>
            </tr>
      </thead>
<tbody>
<tbody>

            <tr align="left">
            <td height="22">'.$server2['statistics']['name2'].'</td>
            <td>';if ($check=@fsockopen($server2['statistics']['ip2'] ,$server2['statistics']['port2'],$ERROR_NO,$ERROR_STR,(float)0.1)) { fclose($check); $serveron2 = '<font color="green">Online</font>'; }else { $serveron2 = '<font color="red">Offline</font>'; } 
            echo''.$serveron2.'';
            echo'</td>
            </tr>
            <tr>
            <td>Server Type</td>
            <td>'.$server2['statistics']['type2'].'</td>
            </tr>
            <tr>
            <td>Experience</td>
            <td>'.$server2['statistics']['exp2'].' x</td>
            </tr>
            <tr>
            <td>Drop</td>
            <td>'.$server2['statistics']['drop2'].' %</td>
            </tr>
            <tr>
            <td>Zen Drop</td>
            <td>'.$server2['statistics']['zen2'].' %</td>
            </tr>
            <tr>
            <td>Chaos Machine</td>
            <td>'.$server2['statistics']['cm2'].' %</td>
            </tr>
            <tr>
            <td>Points / Level</td>
            <td>'.$server2['statistics']['ppl2'].'</td>
            </tr>
            </tbody>
            </table>
';
        }
        ?>
        </article>