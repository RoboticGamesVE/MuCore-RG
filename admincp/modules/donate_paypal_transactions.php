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
if ( isset( $_GET['delete'] ) )
{
    if ( empty( $_GET['delete'] ) )
    {
        echo notice_message_admin( "Unable to proceed your request.", "1", "1", "index.php?get=donate_paypal_transactions" );
    }
    else
    {
        $id = safe_input( $_GET['delete'], "" );
        $delete_txn = $core_db->Execute( "Delete from MUCore_PayPal_Donate_Transactions where id=?", array(
            $id
        ) );
        if ( $delete_txn )
        {
            echo notice_message_admin( "PayPal Transaction successfully deleted.", 1, 0, "index.php?get=donate_paypal_transactions" );
        }
        else
        {
            echo notice_message_admin( "Unable to proceed your request.", "1", "1", "index.php?get=donate_paypal_transactions" );
        }
    }
}
else
{
    echo '
<form action="" method="post" id="form2">
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2 style="text-align: center;">
							Search PayPal Donate Transactions
						</h2>
					</div>
					<div class="body">
                    	
						<!-- input text -->
						<p class="lead" align="left">
                        	Transaction ID
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enter PayPal Transaction ID.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="txn_id">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
						
                        <!-- input text -->
						<p class="lead" align="left">
                        	User ID
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enter User ID of account.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="userid">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
                        
						<p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100%;margin-bottom: 0px;">
                                        <button type="submit" form="form2" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 100px;margin-top: 5px;">Search</button>
                                	</div>
                             	</div>
                            </p>
					</div>
				</div>
			</div>
		</div>
	<!-- #END# Body Copy -->
	</div>
</section>
<input type="hidden" name="search">
</form>';
    if ( !isset( $_POST['txn_id'] ) || !isset( $_POST['userid'] ) )
    {
        $txn_select = $core_db->Execute( "Select top 50 id,memb___id,transaction_id,amount,currency,order_date,payer_email,credits,status,code from MUCore_PayPal_Donate_Transactions order by order_date desc" );
        $txn_text = "Last 50 PayPal Donate Transactions";
    }
    else if ( !empty( $_POST['txn_id'] ) )
    {
        $txn_text = "Search Results";
        $search = safe_input( $_POST['txn_id'] );
        $txn_select = $core_db->Execute( "Select id,memb___id,transaction_id,amount,currency,order_date,payer_email,credits,status,code from MUCore_PayPal_Donate_Transactions where transaction_id=? order by order_date desc", array(
            $search
        ) );
    }
    else if ( !empty( $_POST['userid'] ) )
    {
        $txn_text = "Search Results";
        $search = safe_input( $_POST['userid'] );
        $txn_select = $core_db->Execute( "Select id,memb___id,transaction_id,amount,currency,order_date,payer_email,credits,status,code from MUCore_PayPal_Donate_Transactions where memb___id=? order by order_date desc", array(
            $search
        ) );
    }
    else
    {
        $txn_text = "Last 50 PayPal Donate Transactions";
        $txn_select = $core_db->Execute( "Select top 50 id,memb___id,transaction_id,amount,currency,order_date,payer_email,credits,status,code from MUCore_PayPal_Donate_Transactions order by order_date desc" );
    }
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
							'.$txn_text.'
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- input table -->
                        <!-- <div class="body table-responsive"> -->
                        <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>Transaction ID</th>
                                        <th>Verification Code</th>
										<th>PayPal Email</th>
										<th>Amount</th>
										<th>Issued Credits</th>
										<th>Processed Date</th>
										<th>Payment Status</th>
										<th>Controls</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px;">';
	$count = 0;
    while ( !$txn_select->EOF ) {
        ++$count;
        echo '
<tr>
<th scope="row"><strong>'.htmlspecialchars( $txn_select->fields[1] ).'</strong></th>
<td>'.$txn_select->fields[2].'</td>
<td>'.$txn_select->fields[9].'</td>
<td>'.$txn_select->fields[6].'</td>
<td>'.$txn_select->fields[3].' '.$txn_select->fields[4].'</td>
<td>'.number_format( $txn_select->fields[7] ).'</td>
<td>'.date( "F j, Y / H:i", $txn_select->fields[5] ).'</td>
<td>'.$txn_select->fields[8].'</td>
<td><a href="index.php?get=donate_paypal_transactions&delete='.$txn_select->fields[0].'">[Delete]</a></td>
</tr>';
        $txn_select->MoveNext( );
    }
    if ( $count == "0" )
    {
        echo '<tr><td align="center" class="panel_text_alt_list" colspan="9"><em>No transactions</em></td></tr>';
    }
								echo '
                                </tbody>
                            </table>
                            <!-- #END# input table -->
                            
					</div>
				</div>
			</div>
		</div>
	<!-- #END# Body Copy -->
	</div>
</section>
<input type="hidden" name="settings">
</form>';
}
?>