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

//funcion para mostrar mensaje y redireccionar
function notice_message($notice, $redirect = 0, $error = 0, $url)
{
if ($url == null) {
$url_red = '';
} else {
$url_red = $url;
}
if ($error == 1) {
$title   = "Error";
$go_back = '<p><a href="javascript:history.go(-1);">Go Back</a></p>';
} else {
$title = "Success";
}
$return_msg = '<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="border">
<tr>
<td align="center" style="padding-top: 20px; padding-bottom: 20px;"><p>' . $notice . '</p>' . $go_back . '
</td> 
</tr>
</table>';
if ($redirect == 1) {
$return_msg .= '<meta http-equiv="Refresh" content="1; URL=' . $url_red . '">';
}
return $return_msg;
}

//comprobar si existe el archivo sino se crea
$nombre_fichero = 'ruleta/user/'.$user_auth_id.'.php';
if (!file_exists($nombre_fichero)) {
    $new_db = fopen('ruleta/user/'.$user_auth_id.'.php', "w+");
    $data   = "<?php\r\n";
    $data .= "\$timeruleta = \"\";\r\n";
    $data .= "?>";
    fwrite($new_db, $data);
    fclose($new_db);
    echo notice_message('<div class="msg_success" align="center">Agregado a la Ruleta de Premios</div>', 1, 0, 'index.php');
} 

else 
{

if ( isset( $_POST['add'] ) )
{
	//se crea el registro de la ultima vez q se uso la ruleta
	$new_db = fopen('ruleta/user/'.$_POST['userid'].'.php', "w+");
    $data   = "<?php\r\n";
    $data .= "\$timeruleta = \"" . str_replace('"', "", time()) . "\";\r\n";
    $data .= "?>";
    fwrite($new_db, $data);
    fclose($new_db);
	
	//WCoinc
	if ( substr( $_POST['mucoins'], 0, 6) == "WCoinC" )
	{
    $mucoins = substr( $_POST['mucoins'], 6);
    $id = safe_input( $_POST['userid'], "" );
    $update = $core_db2->Execute( "Update CashShopData set WCoinC = WCoinC +?  where AccountID =?", array(
        $mucoins,
        $id
    ) );
    if ( $update )
    {
        echo notice_message('<div class="msg_success" align="center">Premio Agregado con Exito</div>', 1, 0, 'index.php');
    }
    else
    {
        echo "A ocurrido un, system error";
    }
	}
	
	//WCoinP
	if ( substr( $_POST['mucoins'], 0, 6) == "WCoinP" )
	{
    $mucoins = substr( $_POST['mucoins'], 6);
    $id = safe_input( $_POST['userid'], "" );
    $update = $core_db2->Execute( "Update CashShopData set WCoinP = WCoinP +?  where AccountID =?", array(
        $mucoins,
        $id
    ) );
    if ( $update )
    {
        echo notice_message('<div class="msg_success" align="center">Premio Agregado con Exito</div>', 1, 0, 'index.php');
    }
    else
    {
        echo "A ocurrido un, system error";
    }
	}
	
	//Goblin
	if ( substr( $_POST['mucoins'], 0, 6) == "Goblin" )
	{
    $mucoins = substr( $_POST['mucoins'], 6);
    $id = safe_input( $_POST['userid'], "" );
    $update = $core_db2->Execute( "Update CashShopData set GoblinPoint = GoblinPoint +?  where AccountID =?", array(
        $mucoins,
        $id
    ) );
    if ( $update )
    {
        echo notice_message('<div class="msg_success" align="center">Premio Agregado con Exito</div>', 1, 0, 'index.php');
    }
    else
    {
        echo "A ocurrido un, system error";
    }
	}
	
	//Credit
	if ( substr( $_POST['mucoins'], 0, 6) == "Credit" )
	{
    $mucoins = substr( $_POST['mucoins'], 6);
    $id = safe_input( $_POST['userid'], "" );
    $update = $core_db2->Execute( "Update memb_credits set credits = credits +?  where memb___id =?", array(
        $mucoins,
        $id
    ) );
    if ( $update )
    {
        echo notice_message('<div class="msg_success" align="center">Premio Agregado con Exito</div>', 1, 0, 'index.php');
    }
    else
    {
        echo "A ocurrido un, system error";
    }
	}
	
}
else
{

require( 'ruleta/user/'.$user_auth_id.'.php' );

$get_config = simplexml_load_file('engine/config_mods/ruleta_settings.xml');
$f0 = $get_config->f0;
$f1 = $get_config->f1;
$f2 = $get_config->f2;
$f3 = $get_config->f3;
$f4 = $get_config->f4;
$f5 = $get_config->f5;
$f6 = $get_config->f6;
$f7 = $get_config->f7;
$f8 = $get_config->f8;

echo '<style type="text/css">
body
{font-family: arial;}

h1, p
{ margin: 0; }

div.power_controls
{ margin-right:70px; }

div.html5_logo
{ margin-left:70px; }

/* Styles for the power selection controls */
table.power
{ background-color: #cccccc; cursor: pointer; border:1px solid #333333; }

table.power th
{ background-color: white; cursor: default; }

td.pw1
{ background-color: #6fe8f0; }

td.pw2
{ background-color: #86ef6f; }

td.pw3
{ background-color: #ef6f6f; }

/* Style applied to the spin button once a power has been selected */
.clickable
{ cursor: pointer; }

/* Other misc styles */
.margin_bottom
{ margin-bottom: 5px; }

.point { font-size: 24pt; }

.button { background:#7f8c8d; color:#fff; display:inline-block; font-size:1.25em; margin:20px; padding:10px 0; text-align:center; width:200px; text-decoration:none; box-shadow:0px 3px 0px #373c3c; }
</style>';

echo "<div style=\"margin-top: 10px;\">\r\n<fieldset><legend>Ruleta de Premios</legend>\r\n<table border=\"0\" cellspacing=\"4\" cellpadding=\"0\" width=\"100%\" style=\"padding-left: 10px;\">\r\n<tr>\r\n<td align=\"left\">Solo Puedes reclamar un premio cada ".$f0." horas\r\n</td>\r\n</tr>\r\n</table>\r\n</fieldset>\r\n</div>";
?>

<div align="center">
           
            <table cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td>
                    <div class="power_controls">
                        <br />
                        <br />
                        <table class="power" cellpadding="10" cellspacing="0">
                            <tr>
                                <th align="center">Power</th>
                            </tr>
                            <tr>
                                <td width="78" align="center" id="pw3" onClick="powerSelected(3);">High</td>
                            </tr>
                            <tr>
                                <td align="center" id="pw2" onClick="powerSelected(2);">Med</td>
                            </tr>
                            <tr>
                                <td align="center" id="pw1" onClick="powerSelected(1);">Low</td>
                            </tr>
                        </table>
                        <br />
                        <img id="spin_button" src="ruleta/spin_off.png" alt="Spin" onClick="startSpin();" />
                        <br /><br />
                    </div>
                </td>
                <td width="438" height="582" class="the_wheel" align="center" valign="center" style="background-image: url(ruleta/wheel_back.png); background-position: center; background-repeat: none;" >
                    <canvas id="canvas" width="434" height="434">
                        <p style="{color: white}" align="center">Sorry, your browser doesn't support canvas. Please try another.</p>
                    </canvas>
                </td>
            </tr>
        </table>
        <script type="text/javascript" src="ruleta/Winwheel.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
        <script>
            // Create new wheel object specifying the parameters at creation time.
            var theWheel = new Winwheel({
                'numSegments'  : 8,     // Specify number of segments.
                'outerRadius'  : 212,   // Set outer radius so wheel fits inside the background.
                'textFontSize' : 28,    // Set font size as desired.
                'segments'     :        // Define segments including colour and text.
                [
                   {'fillStyle' : '#eae56f', 'text' : 'WCoinC <?=$f1?>'},
                   {'fillStyle' : '#89f26e', 'text' : 'WCoinP <?=$f2?>'},
                   {'fillStyle' : '#7de6ef', 'text' : 'Goblin <?=$f3?>'},
                   {'fillStyle' : '#e7706f', 'text' : 'Credit <?=$f4?>'},
                   {'fillStyle' : '#eae56f', 'text' : 'WCoinC <?=$f5?>'},
                   {'fillStyle' : '#89f26e', 'text' : 'WCoinP <?=$f6?>'},
                   {'fillStyle' : '#7de6ef', 'text' : 'Goblin <?=$f7?>'},
                   {'fillStyle' : '#e7706f', 'text' : 'Credit <?=$f8?>'}
                ],
                'animation' :           // Specify the animation to use.
                {
                    'type'     : 'spinToStop',
                    'duration' : 5,     // Duration in seconds.
                    'spins'    : 8,     // Number of complete spins.
                    'callbackFinished' : 'alertPrize()'
                }
            });
            
            // Vars used by the code in this page to do power controls.
            var wheelPower    = 0;
            var wheelSpinning = false;
            
            // -------------------------------------------------------
            // Function to handle the onClick on the power buttons.
            // -------------------------------------------------------
            function powerSelected(powerLevel)
            {
                // Ensure that power can't be changed while wheel is spinning.
                if (wheelSpinning == false)
                {
                    // Reset all to grey incase this is not the first time the user has selected the power.
                    document.getElementById('pw1').className = "";
                    document.getElementById('pw2').className = "";
                    document.getElementById('pw3').className = "";
                    
                    // Now light up all cells below-and-including the one selected by changing the class.
                    if (powerLevel >= 1)
                    {
                        document.getElementById('pw1').className = "pw1";
                    }
                        
                    if (powerLevel >= 2)
                    {
                        document.getElementById('pw2').className = "pw2";
                    }
                        
                    if (powerLevel >= 3)
                    {
                        document.getElementById('pw3').className = "pw3";
                    }
                    
                    // Set wheelPower var used when spin button is clicked.
                    wheelPower = powerLevel;
                    
                    // Light up the spin button by changing it's source image and adding a clickable class to it.
                    document.getElementById('spin_button').src = "ruleta/spin_on.png";
                    document.getElementById('spin_button').className = "clickable";
                }
            }
            
            // -------------------------------------------------------
            // Click handler for spin button.
            // -------------------------------------------------------
            function startSpin()
            {
                // Ensure that spinning can't be clicked again while already running.
                if (wheelSpinning == false)
                {
                    // Based on the power level selected adjust the number of spins for the wheel, the more times is has
                    // to rotate with the duration of the animation the quicker the wheel spins.
                    if (wheelPower == 1)
                    {
                        theWheel.animation.spins = 3;
                    }
                    else if (wheelPower == 2)
                    {
                        theWheel.animation.spins = 8;
                    }
                    else if (wheelPower == 3)
                    {
                        theWheel.animation.spins = 15;
                    }
                    
                    // Disable the spin button so can't click again while wheel is spinning.
                    document.getElementById('spin_button').src       = "ruleta/spin_off.png";
                    document.getElementById('spin_button').className = "";
                    
                    // Begin the spin animation by calling startAnimation on the wheel object.
                    theWheel.startAnimation();
                    
                    // Set to true so that power can't be changed and spin button re-enabled during
                    // the current animation. The user will have to reset before spinning again.
                    wheelSpinning = true;
                }
            }
            
            // -------------------------------------------------------
            // Function for reset button.
            // -------------------------------------------------------
            function resetWheel()
            {
                theWheel.stopAnimation(false);  // Stop the animation, false as param so does not call callback function.
                theWheel.rotationAngle = 0;     // Re-set the wheel angle to 0 degrees.
                theWheel.draw();                // Call draw to render changes to the wheel.
                
                document.getElementById('pw1').className = "";  // Remove all colours from the power level indicators.
                document.getElementById('pw2').className = "";
                document.getElementById('pw3').className = "";
                
                wheelSpinning = false;          // Reset to false to power buttons and spin can be clicked again.
            }
            
            // -------------------------------------------------------
            // Called when the spin animation has finished by the callback feature of the wheel because I specified callback in the parameters.
            // -------------------------------------------------------
            function alertPrize()
            {
                // Get the segment indicated by the pointer on the wheel background which is at 0 degrees.
                var winningSegment = theWheel.getIndicatedSegment();
                
                // Do basic alert of the segment text. You would probably want to do something more interesting with this information.
				
				document.getElementById("demo").innerHTML ='<p class="point">You have: ' + winningSegment.text + '</p><form method="post" action="" name="forum"><input type="hidden" name="userid" value="<?=$user_auth_id?>"><input type="hidden" name="mucoins" value="' + winningSegment.text + '"> <input type="hidden" name="add"> <input type="submit" class="button" value="Enviar Premio" /></form>';

            }
        </script>

<?php
$make_time_hours = $f0*3600;
$time = ($timeruleta + $make_time_hours);
$left1 = ($time - time());
$left2 = (($time - time()) / 60);
if ($left2 >=1) { 
$tlc = $left2;
$tlv = 'minute(s)';
} else {
$tlc = $left1;
$tlv = 'second(s)';
}
if($time >= time()) {
echo msg('0', 'Please wait '. $f0 .' hour(s) have not passed.<br>'.(int) $tlc.' '.$tlv.' left before next attempt.<br>Please come back later !');
} else {?>
<div id="demo">
</div>
<?php 
}
}
}
?>