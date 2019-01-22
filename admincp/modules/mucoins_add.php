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
if ( isset( $_POST['add'] ) )
{
    $mucoins = safe_input( $_POST['mucoins'], "" );
    $id = safe_input( $_POST['userid'], "" );
    $update = $core_db2->Execute( "Update ".MU_COINS_TABLE." set ".MU_COINS_COLUMN."=".MU_COINS_COLUMN."+?  where ".MU_COINS_USERID_COLUMN."=?", array(
        $mucoins,
        $id
    ) );
    if ( $update )
    {
        echo notice_message_admin( "MU Coins successfully added", 1, 0, "index.php?get=mucoins_add" );
    }
    else
    {
        echo notice_message_admin( "Unable to add MU Coins, system error.", "0", "1", "0" );
    }
}
else if ( isset( $_POST['edit'] ) )
{
    if ( empty( $_POST['userid'] ) )
    {
        echo notice_message_admin( "Some fields where left blank.", "0", "1", "0" );
    }
    else
    {
        $id = safe_input( $_POST['userid'], "" );
        if ( empty( $_POST['mucoins'] ) )
        {
            $mucoins = "0";
        }
        else
        {
            $mucoins = safe_input( $_POST['mucoins'], "" );
        }
        $check_acc = $core_db2->Execute( "Select memb___id from MEMB_INFO where memb___id=?", array(
            $id
        ) );
        if ( $check_acc->EOF )
        {
            echo notice_message_admin( "Account not found.", "0", "1", "0" );
        }
        else
        {
            $info = $core_db2->Execute( "Select ".MU_COINS_USERID_COLUMN.",".MU_COINS_COLUMN." from ".MU_COINS_TABLE." where ".MU_COINS_USERID_COLUMN."=?", array(
                $id
            ) );
            if ( $info->EOF )
            {
                $insert_cred = $core_db2->Execute( "INSERT INTO ".MU_COINS_TABLE."(".MU_COINS_USERID_COLUMN.",".MU_COINS_COLUMN.")VALUES(?,?)", array(
                    $id,
                    "0"
                ) );
                if ( $insert_cred )
                {
                    $found_acc = "1";
                }
            }
            else
            {
                $found_acc = "1";
            }
            if ( $found_acc )
            {
                echo '
<div align="right" style="width: 90%; margin-bottom: 2px;">
<a href="index.php?get=mucoins_add">[Return Add MU Coins]</a>
</div>


<form action="" method="post" id="form2">
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card" style="margin-bottom: 0px;">
					<div class="header">
						<h2 style="text-align: center;">
							Add MU Coins (User ID: '.htmlspecialchars( $check_acc->fields[0] ).')
						</h2>
					</div>
					<div class="body">
                    	
						<!-- input text -->
						
		<td align="left" class="panel_text_alt2" width="50%"></td>
	</tr>
						<p class="lead" align="left">
                        	MU Coins
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	The amount between accounts MU Coins and amount you set.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
       '.number_format( $info->fields[1] ).' + <b>'.number_format( $mucoins ).'</b> = <b>'.number_format( $info->fields[1] + $mucoins ).'</b>
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
                        
						<p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100%;margin-bottom: 0px;">
                                        <button type="submit" form="form2" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 100px;margin-top: 5px;">Add MU Coins</button>
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
<input type="hidden" name="add">
<input type="hidden" name="userid" value="'.$check_acc->fields[0].'">
<input type="hidden" name="mucoins" value="'.$mucoins.'">
</form>';
            }
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
				<div class="card" style="margin-bottom: 0px;">
					<div class="header">
						<h2 style="text-align: center;">
							Add MU Coins
						</h2>
					</div>
					<div class="body">
                        
						<!-- input text -->
						<p class="lead" align="left">
                        	User ID
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enter accounts User ID.
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
						
                        <!-- input text -->
						<p class="lead" align="left">
                        	MU Coins
                    	</p>
                        
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            	Enter amount of MU Coins you want to add.
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<input type="text" class="form-control" name="mucoins">
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
                        
						<p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100%;margin-bottom: 0px;">
                                        <button type="submit" form="form2" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 100px;margin-top: 5px;">Add MU Coins</button>
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
<input type="hidden" name="edit">
</form>';
}
?>