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
if ( isset( $_POST['active'] ) )
{
    if ( empty( $_POST['activate_code_delete'] ) )
    {
        echo notice_message_admin( "No User IDs selected.", 0, 1, 0 );
    }
    else if ( empty( $_POST['option'] ) )
    {
        echo notice_message_admin( "No option selected.", 0, 1, 0 );
    }
    else
    {
        $count = 0;
        $option = safe_input( $_POST['option'], "" );
        if ( $option == 1 )
        {
            $delete = 0;
            $text = "activated";
        }
        else if ( $option == 2 )
        {
            $delete = 1;
            $text = "deleted";
        }
        foreach ( $_POST['activate_code_delete'] as $post_name => $post_code )
        {
            if ( $delete == 1 )
            {
                $activate_user = $core_db2->Execute( "Delete from memb_info where memb_guid=?", array(
                    $post_code
                ) );
            }
            else
            {
                $activate_user = $core_db2->Execute( "Update memb_info set bloc_code='0',confirmed='1' where memb_guid=?", array(
                    $post_code
                ) );
            }
            if ( $activate_user )
            {
                ++$count;
            }
        }
        echo notice_message_admin( "<b>".$count."</b> users ids successfully ".$text.".", 1, 0, "index.php?get=users_activate" );
    }
}
else if ( isset( $_GET['activate'] ) )
{
    if ( empty( $_GET['activate'] ) )
    {
        echo notice_message_admin( "Unable to proceed your request.", "1", "1", "index.php?get=users_activate" );
    }
    else
    {
        $id = safe_input( $_GET['activate'], "" );
        $activate_user = $core_db2->Execute( "Update memb_info set bloc_code='0',confirmed='1' where memb_guid=?", array(
            $id
        ) );
        if ( $activate_user )
        {
            echo notice_message_admin( "Uers successfully activated.", 1, 0, "index.php?get=users_activate" );
        }
        else
        {
            echo notice_message_admin( "Unable to proceed your request.", "1", "1", "index.php?get=users_activate" );
        }
    }
}
else if ( isset( $_GET['delete'] ) )
{
    if ( empty( $_GET['delete'] ) )
    {
        echo notice_message_admin( "Unable to proceed your request.", "1", "1", "index.php?get=users_activate" );
    }
    else
    {
        $id = safe_input( $_GET['delete'], "" );
        $delete_user = $core_db2->Execute( "Delete from memb_info where memb_guid=?", array(
            $id
        ) );
        if ( $delete_user )
        {
            echo notice_message_admin( "Uers successfully deleted.", 1, 0, "index.php?get=users_activate" );
        }
        else
        {
            echo notice_message_admin( "Unable to proceed your request.", "1", "1", "index.php?get=users_activate" );
        }
    }
}
else
{
    echo '

<form action="" method="post" id="form2" name="delete_archive" onclick="cCheck(document.delete_archive,\'activate_code_delete[]\',\'archive_selected\',\'Go\');">
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
	<div class="container-fluid">
		<!-- Body Copy -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card" style="margin-bottom: 0px;">
					<div class="header">
						<h2 style="text-align: center;">
							Users Awaiting Activation
						</h2>
					</div>
					<div class="body">
                    	
                        <!-- input table -->
                        <!-- <div class="body table-responsive"> -->
                        <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>Email Address</th>
                                        <th>Controls</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px;">';
	$take_accounts = $core_db2->Execute( "Select memb_guid,memb___id,mail_addr from memb_info where confirmed='0'" );
    $count = 0;
    while ( !$take_accounts->EOF )
    {
        ++$count;
        echo '
<tr>
<th scope="row"><strong>".$take_accounts->fields[1]."</strong></th>
<td>'.$take_accounts->fields[2].'</td>
<td>
<a href="index.php?get=users_activate&activate='.$take_accounts->fields[0].'">[Activate]</a> / 
<a href="index.php?get=users_activate&delete='.$take_accounts->fields[0].'">[Delete]</a>&nbsp;
<input name="activate_code_delete[]" type="checkbox"  value="'.$take_accounts->fields[0].'">
</td>
</tr>';
        $take_accounts->MoveNext( );
    }
    if ( $count == "0" )
    {
        echo '
		<tr>
		<td align="center" colspan="3" class="panel_text_alt_list"><em>No users</em></td>
		</tr>';
    }
								echo '
                                </tbody>
                            </table>
                            <!-- #END# input table -->
							
							<!-- input text -->
                        <div class="row clearfix">
                        	<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 60%;text-align: left;">
                            
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 30%;margin-bottom: 1px;">
                            	<div class="form-group" style="margin-bottom: 1px;">
                                	<div class="form-line">
                                    	<div align="right">
<input type="hidden" name="active">
<a href="javascript:void(0)" onclick="CheckAll(document.delete_archive,\'activate_code_delete[]\');">[Check All]</a> 
<a href="javascript:void(0)" onclick="UnCheckAll(document.delete_archive,\'activate_code_delete[]\');">[Uncheck All]</a><br>
<select name="option" style="border: none;font-size: 14px;float: right;width: 50%;margin: 15px 0 10px 0;">
<option value="">Select</option>
<option value="1">Activate</option>
<option value="2">Delete</option>
</select>
</div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- #END# input text -->
                                                    
						<p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 100%;margin-bottom: 0px;">
                                        <button type="submit" form="form2" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-right: 100px;margin-top: 5px;">Go</button>
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
<input type="hidden" name="settings">
</form>	';
}
?>