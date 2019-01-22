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
$get_config = simplexml_load_file('../engine/config_mods/ruleta_settings.xml');
if (isset($_POST['settings'])) {
		$f0 = new_config_xml('../engine/config_mods/ruleta_settings', 'f0', $_POST['f0']);
		$f1 = new_config_xml('../engine/config_mods/ruleta_settings', 'f1', $_POST['f1']);
        $f2 = new_config_xml('../engine/config_mods/ruleta_settings', 'f2', $_POST['f2']);
        $f3 = new_config_xml('../engine/config_mods/ruleta_settings', 'f3', $_POST['f3']);
		$f4 = new_config_xml('../engine/config_mods/ruleta_settings', 'f4', $_POST['f4']);
		$f5 = new_config_xml('../engine/config_mods/ruleta_settings', 'f5', $_POST['f5']);
		$f6 = new_config_xml('../engine/config_mods/ruleta_settings', 'f6', $_POST['f6']);
		$f7 = new_config_xml('../engine/config_mods/ruleta_settings', 'f7', $_POST['f7']);
		$f8 = new_config_xml('../engine/config_mods/ruleta_settings', 'f8', $_POST['f8']);
        echo notice_message_admin('Settings successfully saved', 1, 0, 'index.php?get=usercp_ruleta_manager'); 
} else {
echo '<form action="" name="form_edit" method="POST">
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
<tr>
 <td align="center" class="panel_title" colspan="2">Tiempo entre Premios</td>
</tr>

<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Cada Cuanto Tiempo se puede usar la Ruleta.<br>Si esta en 0 estara siempre disponible.</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<input type="number" size="30" maxlength="50" value="' . $get_config->f0 . '" name="f0"><br>
</td>
</tr>

<tr>
 <td align="center" class="panel_title" colspan="2">Configurar cantidad de Premios</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">WCoinC</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Cantidad de WCoinC, en 1er posicion.</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<input type="number" size="30" maxlength="50" value="' . $get_config->f1 . '" name="f1"><br>
</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">WCoinP</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Cantidad de WCoinP, en 2da posicion.</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<input type="number" size="30" maxlength="50" value="' . $get_config->f2 . '" name="f2"><br>
</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">GoblinPoint</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Cantidad de Goblin, en 3er posicion.</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<input type="number" size="30" maxlength="50" value="' . $get_config->f3 . '" name="f3"><br>
</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Credits</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Cantidad de Credit, en 4ta posicion.</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<input type="number" size="30" maxlength="50" value="' . $get_config->f4 . '" name="f4"><br>
</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">WCoinC</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Cantidad de WCoinC, en 5ta posicion.</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<input type="number" size="30" maxlength="50" value="' . $get_config->f5 . '" name="f5"><br>
</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">WCoinP</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Cantidad de WCoinP, en 6ta posicion.</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<input type="number" size="30" maxlength="50" value="' . $get_config->f6 . '" name="f6"><br>
</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">GoblinPoint</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Cantidad de Goblin, en 7ma posicion.</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<input type="number" size="30" maxlength="50" value="' . $get_config->f7 . '" name="f7"><br>
</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Credits</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Cantidad de Credit, en 8va posicion.</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<input type="number" size="30" maxlength="50" value="' . $get_config->f8 . '" name="f8"><br>
</td>
</tr>

<tr>
<td align="right" class="panel_buttons" colspan="2">
<input type="hidden" name="settings">
<input type="submit" value="Save"></td>
</tr>
</table>
</form>';
    }
?> 