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
if ( $_GET['sys'] == "gameserver" ){
    $accounts = $core_db2->Execute( "Select memb___id from MEMB_INFO" );
    $characters = $core_db->Execute( "Select name from Character" );
    $guilds = $core_db->Execute( "Select G_Name from Guild" );
    $online = $core_db2->Execute( "Select memb___id from MEMB_STAT where ConnectStat='1'" );
    $banned_accounts = $core_db2->Execute( "Select memb___id from MEMB_INFO where bloc_code='1'" );
    $banned_characters = $core_db->Execute( "Select name from Character where CtlCode='1'" );
    
	echo '
<form action="" method="post" id="form2">
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card" style="margin-bottom: 0px;">
					<div class="header">
						<h2 style="text-align: center;">
							Game Server Statistics
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- input table -->
                        <!-- <div class="body table-responsive"> -->
                        <table class="table table-striped">
                                <tbody style="font-size: 12px;">
									<tr>
										<th scope="row">Accounts</th>
										<td>'.number_format( $accounts->RecordCount( ) ).'</td>
									</tr>
									<tr>
										<th scope="row">Characters</th>
										<td>'.number_format( $characters->RecordCount( ) ).'</td>
									</tr>
									<tr>
										<th scope="row">Guilds</th>
										<td>'.number_format( $guilds->RecordCount( ) ).'</td>
									</tr>
									<tr>
										<th scope="row">Online Accounts</th>
										<td>'.number_format( $online->RecordCount( ) ).'</td>
									</tr>
									<tr>
										<th scope="row">Banned Characters</th>
										<td>'.number_format( $banned_characters->RecordCount( ) ).'</td>
									</tr>
                                </tbody>
                            </table>
                            <!-- #END# input table -->
                            
					</div>
				</div>
			</div>
		</div>
	<!-- #END# Body Copy -->
	</div>
</section>';
}
else if ( $_GET['sys'] == "webserver" )
{
    $server_info = explode( ", ", shell_exec( "uptime" ) );
    $load_avg = explode( ": ", $server_info[2] );
    echo '
<form action="" method="post" id="form2">
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card" style="margin-bottom: 0px;">
					<div class="header">
						<h2 style="text-align: center;">
							Webserver Statistics
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- input table -->
                        <!-- <div class="body table-responsive"> -->
                        <table class="table table-striped">
                                <tbody style="font-size: 12px;">
									<tr>
										<th scope="row">Server Type</th>
										<td>'.PHP_OS.'</td>
									</tr>
									<tr>
										<th scope="row">Webserver</th>
										<td>'.$_SERVER['SERVER_SOFTWARE'].'</td>
									</tr>
									<tr>
										<th scope="row">PHP</th>
										<td>'.PHP_VERSION.'</td>
									</tr>
									<tr>
										<th scope="row">PHP Memory Limit</th>
										<td>'.ini_get( "memory_limit" ).'</td>
									</tr>
									<tr>
										<th scope="row">PHP Max Post Size</th>
										<td>'.ini_get( "post_max_size" ).'</td>
									</tr>
									<tr>
										<th scope="row">Time / Up Time</th>
										<td>'.$server_info[0].'</td>
									</tr>
									<tr>
										<th scope="row">Page Users</th>
										<td>'.$server_info[1].'</td>
									</tr>
									<tr>
										<th scope="row">Server Load Averages</th>
										<td>'.$load_avg[1].'</td>
									</tr>
                                </tbody>
                            </table>
                            <!-- #END# input table -->
                            
					</div>
				</div>
			</div>
		</div>
	<!-- #END# Body Copy -->
	</div>
</section>';
}
else if ( $_GET['sys'] == "empty" )
{
    if ( $_GET['go'] == 1 )
    {
        if ( isset( $_POST['number'] ) )
        {
            $number_proccess = safe_input( $_POST['number'], "" );
        }
        else
        {
            $number_proccess = safe_input( $_GET['number'], "" );
        }
        if ( !isset( $_GET['row'] ) )
        {
            $row = 0;
            $total_acc = $core_db2->Execute( "Select memb_guid from MEMB_INFO" );
            $total_accounts = $total_acc->RecordCount( );
        }
        else
        {
            $row = safe_input( $_GET['row'], "" );
            $total_accounts = safe_input( $_GET['accounts'], "" );
        }
        $last_row = $row + $number_proccess;
        $i = $core_db2->Execute( "Select top ".$number_proccess." memb___id,memb_guid from MEMB_INFO where memb_guid > ".$row." order by memb_guid asc" );
        $count = 0;
        if ( isset( $_GET['affected'] ) )
        {
            $affect = safe_input( $_GET['affected'], "" );
        }
        else
        {
            $affect = 0;
        }
        if ( isset( $_GET['processed'] ) )
        {
            $processed = safe_input( $_GET['processed'], "" );
        }
        else
        {
            $processed = 0;
        }
        echo "<div align=\"left\" style=\"width:90%\">\t\t\t\t";
        while ( !$i->EOF )
        {
            ++$count;
            ++$processed;
            echo "Processing: ID ".$i->fields[1].", ".$i->fields[0]."<br>";
            $last_guid = $i->fields[1];
            $check_char = $core_db->Execute( "Select mu_id from Character where AccountID=?", array(
                $i->fields[0]
            ) );
            if ( $check_char->EOF )
            {
                $delete_account = $core_db2->Execute( "Delete from MEMB_INFO where memb___id=?", array(
                    $i->fields[0]
                ) );
                $delete_stat = $core_db2->Execute( "Delete from MEMB_STAT where memb___id=?", array(
                    $i->fields[0]
                ) );
                $delete_warehouse = $core_db->Execute( "Delete from warehouse where AccountID=?", array(
                    $i->fields[0]
                ) );
                $delete_accountchar = $core_db->Execute( "Delete from AccountCharacter where Id=?", array(
                    $i->fields[0]
                ) );
                $delete_credits = $core_db->Execute( "Delete from MEMB_CREDITS where memb___id=?", array(
                    $i->fields[0]
                ) );
                ++$affect;
            }
            $i->MoveNext( );
        }
        if ( 0 < $count )
        {
            echo "\t\t\t<br>\t\t\t<b>\t\t\tProcessed Accounts: ".number_format( $processed )."/".number_format( $total_accounts )."\t\t<br>Deleted Accounts: ".number_format( $affect )."\t\t</b>\t\t\t\t\t\t\t<script type=\"text/javascript\">\t\t\twindow.location=\"index.php?get=".__FILE__."tenance&sys=empty&go=1&number=".$number_proccess."&row=".$last_guid."&affected=".$affect."&accounts=".$total_accounts."&processed=".$processed."\";\t\t\t</script>\t\t\t</div>\t\t\t";
        }
        else
        {
            echo notice_message_admin( "".$affect." accounts have been deleted", 1, 0, "index.php?get=".__FILE__."tenance&sys=empty" );
        }
    }
    else
    {
        echo '
<form action="index.php?get='.__FILE__.'tenance&sys=empty&go=1" method="post" id="form2" name="form_c">
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card" style="margin-bottom: 0px;">
					<div class="header">
						<h2 style="text-align: center;">
							Maintenance
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- input text -->
						<p class="lead" align="left">
                        	Delete Empty Accounts
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Number of accounts to process per cycle <input type="text" value="10" size="6" name="number">
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line" style="border-bottom: 0px;">
                                    	<button type="submit" form="form2" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 100px;margin-top: 5px;">Delete Empty Accounts</button>
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
                        
					</div>
				</div>
			</div>
		</div>
	<!-- #END# Body Copy -->
	</div>
</section>
</form>';
    }
}
else if ( $_GET['sys'] == "inactive" )
{
    if ( $_GET['go'] == 1 )
    {
        if ( isset( $_POST['number'] ) )
        {
            $number_proccess = safe_input( $_POST['number'], "" );
        }
        else
        {
            $number_proccess = safe_input( $_GET['number'], "" );
        }
        if ( isset( $_POST['days'] ) )
        {
            $days_proccess = safe_input( $_POST['days'], "" );
        }
        else
        {
            $days_proccess = safe_input( $_GET['days'], "" );
        }
        if ( !isset( $_GET['row'] ) )
        {
            $row = 0;
            $total_acc = $core_db2->Execute( "Select memb___id from MEMB_STAT" );
            $total_accounts = $total_acc->RecordCount( );
        }
        else
        {
            $row = safe_input( $_GET['row'], "" );
            $total_accounts = safe_input( $_GET['accounts'], "" );
        }
        $last_row = $row + $number_proccess;
        $i = $core_db2->Execute( "Select top ".$number_proccess." memb___id,memb_guid,DisConnectTM from MEMB_STAT where memb_guid > ".$row." and DisConnectTM is not null order by memb_guid asc" );
        $count = 0;
        if ( isset( $_GET['affected'] ) )
        {
            $affect = safe_input( $_GET['affected'], "" );
        }
        else
        {
            $affect = 0;
        }
        if ( isset( $_GET['processed'] ) )
        {
            $processed = safe_input( $_GET['processed'], "" );
        }
        else
        {
            $processed = 0;
        }
        $time_delete = 86400 * $days_proccess;
        echo "<div align=\"left\" style=\"width:90%\">";
        while ( !$i->EOF )
        {
            ++$count;
            ++$processed;
            $db_time = time( ) - strtotime( $i->fields[2] );
            $time_db = strtotime( $i->fields[2] );
            $last_guid = $i->fields[1];
            if ( !empty( $time_db ) )
            {
                echo "Processing: ID ".$i->fields[1].", ".$i->fields[0]."<br>";
                $timestamp = 1;
            }
            else
            {
                echo "Processing: ID ".$i->fields[1].", ".$i->fields[0]." <b>[FAILED: INVALID TIMESTAMP]</b><br>";
                $timestamp = 0;
                break;
            }
            if ( $time_delete < $db_time && $timestamp == 1 )
            {
                ++$affect;
                $c = $core_db->Execute( "Select name from Character where AccountID=?", array(
                    $i->fields[0]
                ) );
                while ( !$c->EOF )
                {
                    $delete_Character = $core_db->Execute( "Delete from Character where name=?", array(
                        $c->fields[0]
                    ) );
                    $delete_GuildMember = $core_db->Execute( "Delete from GuildMember where name=?", array(
                        $c->fields[0]
                    ) );
                    $delete_Guild = $core_db->Execute( "Delete from Guild where G_Master=?", array(
                        $c->fields[0]
                    ) );
                    $c->MoveNext( );
                }
                $delete_account = $core_db2->Execute( "Delete from MEMB_INFO where memb___id=?", array(
                    $i->fields[0]
                ) );
                $delete_stat = $core_db2->Execute( "Delete from MEMB_STAT where memb___id=?", array(
                    $i->fields[0]
                ) );
                $delete_warehouse = $core_db->Execute( "Delete from warehouse where AccountID=?", array(
                    $i->fields[0]
                ) );
                $delete_accountchar = $core_db->Execute( "Delete from AccountCharacter where Id=?", array(
                    $i->fields[0]
                ) );
                $delete_credits = $core_db->Execute( "Delete from MEMB_CREDITS where memb___id=?", array(
                    $i->fields[0]
                ) );
            }
            $i->MoveNext( );
        }
        if ( 0 < $count )
        {
            echo "\t\t\t<br>\t\t\t<b>\t\t\tProcessed Accounts: ".number_format( $processed )."/".number_format( $total_accounts )."\t\t<br>Deleted Accounts: ".number_format( $affect )."\t\t</b>";
            if ( $timestamp == 1 )
            {
                echo "\t\t\t\t\t\t\t\t<script type=\"text/javascript\">\t\t\twindow.location=\"index.php?get=".__FILE__."tenance&sys=inactive&go=1&number=".$number_proccess."&row=".$last_guid."&affected=".$affect."&accounts=".$total_accounts."&processed=".$processed."&days=".$days_proccess."\";\t\t\t</script>";
            }
            echo "\t\t\t\t\t\t\t\t\t\t</div>\t\t\t";
        }
        else
        {
            echo notice_message_admin( "".$affect." accounts have been deleted", 1, 0, "index.php?get=".__FILE__."tenance&sys=inactive" );
        }
    }
    else
    {
        echo '
<form action="index.php?get='.__FILE__.'tenance&sys=inactive&go=1" method="post" id="form2" name="form_c">
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card" style="margin-bottom: 0px;">
					<div class="header">
						<h2 style="text-align: center;">
							Maintenance
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- input text -->
						<p class="lead" align="left">
                        	Delete Inactive Accounts
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Number of accounts to process per cycle <input type="text" value="10" size="6" name="number"><br>
								Inactive Days <input type="text" value="60" size="6" name="days"><br>
								<b>Note:</b> This function is to delete accounts that are no longer active for more than * days
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line" style="border-bottom: 0px;">
                                    	<button type="submit" form="form2" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 100px;margin-top: 5px;">Delete Inactive Accounts</button>
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
                        
					</div>
				</div>
			</div>
		</div>
	<!-- #END# Body Copy -->
	</div>
</section>
</form>';
    }
}
?>
