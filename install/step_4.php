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
require ('connect_core.php');
?>
<section class="content" style="width: 750px;margin: 0 auto 0 auto;">
	<div class="container-fluid">
            <!-- Striped Rows -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Creating MUCore Tables
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>TABLE</th>
                                        <th>STATUS</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px;">
<?php
$count = 0;
if ($tables = opendir('mucore_tables_sql/db1')) {
    while (($file_sql = readdir($tables)) !== false) {
        $sql_only = substr_replace($file_sql, "", 0, -4);
        if ($sql_only == '.sql' || $file_sql != '.' && $file_sql != '..') {
            $count++;
            $tr_color = ($count % 2) ? '' : 'even';
            $table_sql = substr_replace($file_sql, "", -4);
            ob_start();
            include 'mucore_tables_sql/db1/' . $file_sql . '';

            $query = ob_get_contents();
            ob_end_clean();
            echo '
			<tr>
				<th scope="row">' . $count . '</th>
				<td>' . $table_sql . '</td>
				<td>';
            $check_table = $core_db->Execute("select * from dbo.sysobjects where id = object_id(N'" . $table_sql . "') and OBJECTPROPERTY(id, N'IsUserTable') = 1");
            if ($check_table->EOF) {
                echo 'Executing....';
                $create_table = $core_db->Execute($query);
                if ($create_table) {
                    echo '<b>Success</b>';
                }
                else {
                    echo 'Failed - <blink>Fix this</blink>';
                    $error = 1;
                }
            }
            else {
                echo 'Already exists...<b>Success</b>';
            }

            echo '</td></tr>';
        }
    }

    if ($tables = opendir('mucore_tables_sql/db2')) {
        while (($file_sql = readdir($tables)) !== false) {
            $sql_only = substr_replace($file_sql, "", 0, -4);
            if ($sql_only == '.sql' || $file_sql != '.' && $file_sql != '..') {
                $count++;
                $table_sql = substr_replace($file_sql, "", -4);
                ob_start();
                include 'mucore_tables_sql/db2/' . $file_sql . '';

                $query = ob_get_contents();
                ob_end_clean();
                echo '
				<tr>
					<th scope="row">' . $count . '</th>
					<td>' . $table_sql . '</td>
					<td>';
                $check_table = $core_db2->Execute("select * from dbo.sysobjects where id = object_id(N'" . $table_sql . "') and OBJECTPROPERTY(id, N'IsUserTable') = 1");
                if ($check_table->EOF) {
                    echo 'Executing....';
                    $create_table = $core_db2->Execute($query);
                    if ($create_table) {
                        echo '<b>Success</b>';
                    }
                    else {
                        echo 'Failed - <blink>Fix this</blink>';
                        $error = 1;
                    }
                }
                else {
                    echo 'Already exists...<b>Success</b>';
                }

                echo '</td></tr>';
            }
        }

        if ($error == 1) {
            $button = '<button type="button" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-top: 0;">NEXT STEP</button>';
            $error_msg = '<span style="color:red">Please fix errors and refresh page.</span>';
        }
        else {
            $button = '<button type="button" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-top: 0;" 
onclick="location.href=\'install.php?step=step_5\';">NEXT STEP</button>';
            $error_msg = '<span style="color:green">Success.</span>';
        }
    }
} ?>
                                    
                                </tbody>
                            </table>
                            <p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 350px;text-align: left;">
                                	Step 4 Status : <?php echo $error_msg; ?>
                                	</div>
                                	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="width: 300px;">
                                    	<?php echo $button; ?>
                                	</div>
                             	</div>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Striped Rows -->
	</div>
</section>