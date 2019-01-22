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
$get_config = simplexml_load_file('engine/config_mods/cupon_credits_settings.xml');
$active = trim($get_config->active);
$f1 = trim($get_config->s1);
$f2 = trim($get_config->s2);
$f3 = trim($get_config->s3);

//thejonyx-comprobar si existe el archivo sino se crea
$nombre_cupon = 'cupon/user/'.$user_auth_id.'.tDB';
if (!file_exists($nombre_cupon)) {
$new_db = fopen('cupon/user/'.$user_auth_id.'.tDB', "w+");
fwrite($new_db);
fclose($new_db);
}
				
if (empty($_POST['cupon_code'])) {
            } else {
				
			$p_id   = $_POST['cupon_code'];
        	$p_file = file('engine/variables_mods/cupon_credits.tDB');
        		foreach ($p_file as $check_id) {
            	$check_id = explode("¦", $check_id);
            		if ($check_id[2] == $p_id) {
                		$cupon_id  = $check_id[0];
                		$title    = $check_id[1];
                		$cupon_code = $check_id[2];
                		$credits  = $check_id[3];
                		break;
            		}
        		}
			
            if (empty($cupon_code)) {
				echo '<div class="msg_error" align="left">Este Cupon No existe o ya ha sido Cobrado.</div>';
			} else {
				$p_id   = $_POST['cupon_code'];
        		$p_file = file('cupon/user/'.$user_auth_id.'.tDB');
        			foreach ($p_file as $check_id) {
            		$check_id = explode("¦", $check_id);
            			if ($check_id[0] == $p_id) {
                			$cupon2_code  = $check_id[0];
                			$title    = $check_id[1];
                			$credits  = $check_id[2];
                			break;
            			}
        			}
					
				if (empty($cupon2_code)) {
					
					$db = fopen("cupon/user/".$user_auth_id.".tDB", "a+");
                	fwrite($db, $cupon_code . "¦" . $title . "¦" . $credits . "¦" . "Cobrado" . "¦\n");
                	fclose($db);
					
					//monedas escogidas en el admin (por defecto WCoinC)
    				$update = $core_db2->Execute( "Update ".$f1." set ".$f2." = ".$f2." +?  where ".$f3." =?", array(
        			$credits,
        			$user_auth_id
    				) );
                	echo '<div class="msg_success" align="left">Cupon successfully added</div>';
				} else {
				 	echo '<div class="msg_error" align="left">Este Cupon ya lo has sido Cobrado.</div>';
				}
			}
}
?>
<style>
.btn {
  font-family: Arial;
  color: #ffffff;
  font-size: 14px;
  background: #4CAF50;
  padding: 5px 5px 5px 5px;
  text-decoration: none;
}

.btn:hover {
  background: #387d3b;
  text-decoration: none;
}
.msg_success{background:#c2ffaf;border:1px solid #cccccc;padding:4px;padding-left:33px;margin-bottom:6px;margin-top:6px;background-image:url(images/success.gif);background-repeat:no-repeat;background-position:10px;font-size:11px;font-weight:bold;color:#444444;}
.msg_error{background:#F9F2B9;border:1px solid #cccccc;padding:4px;padding-left:33px;margin-bottom:6px;margin-top:6px;background-image:url(images/warning.gif);background-repeat:no-repeat;background-position:10px;font-size:11px;font-weight:bold;color:#444444;}
</style>
<h2 style="margin-top:20px;">Valida Tu Cupon</h2>

<form method="post" style="margin-top: 10px;">
<input type="text" name="cupon_code" value="" style="height: 29px;" placeholder="Cupon">
<input class="btn" type="submit" value="Validar Cupon">
</form>


<table style="	background-color: white; border-collapse: collapse; width: 100%;margin-top: 35px;">
  <tr>
    <th style="background-color: #4CAF50; color: white; text-align: left; padding: 8px;">Cupon</th>
    <th style="background-color: #4CAF50; color: white; text-align: left; padding: 8px;">Motivo</th>
    <th style="background-color: #4CAF50; color: white; text-align: left; padding: 8px;">Recompensa</th>
    <th style="background-color: #4CAF50; color: white; text-align: left; padding: 8px;">Estado</th>
  </tr>
<?
$vf = file('cupon/user/'.$user_auth_id.'.tDB');
$ss = 0;
foreach ($vf as $vote_data){
$vote_data = explode('¦',$vote_data);
$ss++;
echo '  
		<tr>
			<td style="text-align: left; padding: 8px; color: black;">'.$vote_data[0].'</td>
			<td style="text-align: left; padding: 8px; color: black;">'.$vote_data[1].'</td>
			<td style="text-align: left; padding: 8px; color: black;">'.$vote_data[2].'</td>
			<td style="text-align: left; padding: 8px; color: black;">Cobrado</td>';

			
		echo '</td></tr>';
}

?>
</table>