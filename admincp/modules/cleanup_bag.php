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
require("../VoteLottery_Config.php");

$num = mssql_num_rows(mssql_query("Select * from VoteBag"));
if($num <= 0) { 
	echo notice_message_admin("The Lottery Bag its already clean."); 
} else {
	$query = mssql_query("Delete from VoteBag");
	if(!$query) {
		echo notice_message_admin("The Lottery Bag cant be cleaned.");
	} else {
		echo notice_message_admin("The Lottery Bag is now clean!");
	}
}
?>