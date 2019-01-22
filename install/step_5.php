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
                                Adding New Rows To Tables
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>TABLE</th>
                                        <th>ROW</th>
                                        <th>STATUS</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px;">
<?php
$count = 0;
if ($tables = opendir('mucore_rows_sql/db1')) {
    while (($file_sql = readdir($tables)) !== false) {
        $sql_only = substr_replace($file_sql, "", 0, -4);
        if ($sql_only == '.sql' || $file_sql != '.' && $file_sql != '..') {
            $count++;
            $row_sql = substr_replace($file_sql, "", -4);
            $row_sql_fields = explode("^", $row_sql);
            $table_sql = $row_sql_fields[0];
            $row_table_sql = $row_sql_fields[1];
            ob_start();
            include 'mucore_rows_sql/db1/' . $file_sql . '';

            $query = ob_get_contents();
            ob_end_clean();
            echo '
			<tr>
				<th scope="row">' . $count . '</th>
				<td>' . $table_sql . '</td>
				<td>' . $row_table_sql . '</td>
				<td>';
            $check_row = $core_db->Execute("Select top 1 " . $row_table_sql . " from " . $table_sql . "");
            if (!$check_row) {
                echo 'Executing....';
                $create_row = $core_db->Execute($query);
                if ($create_row) {
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

    if ($tables = opendir('mucore_rows_sql/db2')) {
        while (($file_sql = readdir($tables)) !== false) {
            $sql_only = substr_replace($file_sql, "", 0, -4);
            if ($sql_only == '.sql' || $file_sql != '.' && $file_sql != '..') {
                $count++;
                $row_sql = substr_replace($file_sql, "", -4);
                $row_sql_fields = explode("^", $row_sql);
                $table_sql = $row_sql_fields[0];
                $row_table_sql = $row_sql_fields[1];
                ob_start();
                include 'mucore_rows_sql/db2/' . $file_sql . '';

                $query = ob_get_contents();
                ob_end_clean();
                echo '
				<tr>
					<th scope="row">' . $count . '</th>
					<td>' . $table_sql . '</td>
					<td>' . $row_table_sql . '</td>
					<td>';
                $check_row = $core_db2->Execute("Select top 1 " . $row_table_sql . " from " . $table_sql . "");
                if (!$check_row) {
                    echo 'Executing....';
                    $create_row = $core_db2->Execute($query);
                    if ($create_row) {
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
    }

    if ($error == 1) {
        $button = '<button type="button" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-top: 0;">NEXT STEP</button>';
        $error_msg = '<span style="color:red">Please fix errors and refresh page.</span>';
    }
    else {
        $button = '<button type="button" class="btn btn-primary m-t-15 waves-effect" style="float: right;margin-top: 0;" 
onclick="location.href=\'install.php?step=step_6\';">NEXT STEP</button>';
        $error_msg = '<span style="color:green">Success.</span>';
    }
}
?>
                                    
                                </tbody>
                            </table>
                            <p style="border-top: 1px solid rgba(204, 204, 204, 0.35);">
                            	<div class="row clearfix">
                            		<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" style="width: 350px;text-align: left;">
                                	Step 5 Status : <?php echo $error_msg; ?>
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