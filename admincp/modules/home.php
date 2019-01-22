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
 * @Credits   Isumeru & MaryJo & Dao Van Trong - Trong.CF
 * Obfuscation provided by RoboticGames
*/

//Estadisticas total accounts
$statistics_accounts=mssql_query("SELECT count(*) memb___id FROM MuOnline.dbo.MEMB_INFO");
while($row=mssql_fetch_assoc($statistics_accounts)){
    $core['accounts_reults']=$row['memb___id'];
}

//Estadisticas total character
$statistics_characters=mssql_query("SELECT count(*) AccountID FROM MuOnline.dbo.Character");
while($row=mssql_fetch_assoc($statistics_characters)){
    $core['character_reults']=$row['AccountID'];
}

//Estadisticas user online
$statistics_players=mssql_query("SELECT count(*) ConnectStat FROM MuOnline.dbo.MEMB_STAT WHERE ConnectStat='1'");
while($row=mssql_fetch_assoc($statistics_players)){
    $core['config']['statistics_results']=$row['ConnectStat'];
}

//Estadisticas  new tickets
$tickets_file = file('../engine/variables_mods/tickets.tDB');
$tickets_n = 0;
foreach ($tickets_file as $tickets_row){
    $tickets_row = explode("|",$tickets_row);
    if($tickets_row[1] == "1"){
        $tickets_n++;
    }
}

//Log de visitas
$visits_log = array_reverse(file('../engine/logs/visits.log'));

//Estadisticas de navegador
$n = 0;

$mozilla  = 0;
$chrome   = 0;
$explorer = 0;
$opera    = 0;
$otros    = 0;

foreach ($visits_log as $visits_log_full) {
    $visits_log_full = explode("|", $visits_log_full);
    
    if($visits_log_full[3] == 'Internet explorer'){
        $explorer++;
    }elseif($visits_log_full[3] == 'Opera'){
        $opera++;
    }elseif($visits_log_full[3] == 'Mozilla Firefox'){
        $mozilla++;
    }elseif($visits_log_full[3] == 'Google Chrome'){
        $chrome++;
    }elseif($visits_log_full[3] == 'otro'){
        $otros++;
    }
    
    if($n == 99){
        break;
    }
    $n++;
}
    
?>
<section class="content" style="width: 95%;margin: 0 auto 0 auto;">
<!-- Menu -->
        <div class="menu" style="display:none">
            <ul class="list">
                <li class="active">
                </li>
            </ul>
        </div>
    <!-- #Menu -->
    <div class="container-fluid">
        <!-- Body Copy -->
        <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">help</i>
                        </div>
                        <div class="content">
                            <div class="text">NEW TICKETS</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">
                                <?php
                                echo $tickets_n;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">videogame_asset</i>
                        </div>
                        <div class="content">
                            <div class="text">USER ONLINE</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">
                                <?php
                                echo $core['config']['statistics_results'];
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">people</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL CHARACTER</div>
                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20">
                                <?php
                                echo $core['character_reults'];
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL ACCOUNTS</div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20">
                                <?php
                                echo $core['accounts_reults'];
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
            
            <!-- Line Chart -->
            <div class="row clearfix">
            
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>TOTAL VISITS</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <canvas id="line_chart" height="100"></canvas>
                        </div>
                    </div>
                </div>

            </div>
            <!-- #END# Line Chart --> 

            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="header">
                            <h2>LAST VISITS</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Hour</th>
                                            <th>Page</th>
                                            <th>User</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        

                                        $i = 1;
                                        foreach ($visits_log as $visits_log_full) {
                                            $visits_log_full = explode("|", $visits_log_full);
                                            
                                            echo "
                                        <tr>
                                            <td>".$i."</td>
                                            <td>".substr($visits_log_full[0],0,5)."</td>
                                            <td>".$visits_log_full[2]."</td>
                                            <td>".$visits_log_full[1]."</td>
                                        </tr>";
                                            
                                            if($i == 5){
                                                break;
                                            }
                                            
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
                
                <!-- Latest Social Trends -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body bg-cyan">
                            <div class="m-b--35 font-bold" style="margin-bottom:-12px">BROWSER USAGE</div>
                            <ul class="dashboard-stat-list">
                                <li style="height:50px">
                                    #Mozilla Firefox
                                    <span class="pull-right">
                                        <?php
                                        echo $mozilla. ' %';
                                        ?>
                                    </span>
                                </li>
                                <li style="height:50px">
                                    #Google Chrome
                                    <span class="pull-right">
                                        <?php
                                        echo $chrome. ' %';
                                        ?>
                                    </span>
                                </li>
                                <li style="height:50px">
                                    #Opera
                                    <span class="pull-right">
                                        <?php
                                        echo $opera. ' %';
                                        ?>
                                    </span>
                                </li>
                                <li style="height:50px">
                                    #Internet explorer
                                    <span class="pull-right">
                                        <?php
                                        echo $explorer. ' %';
                                        ?>
                                    </span>
                                </li>
                                <li style="height:50px">
                                    #Otros
                                    <span class="pull-right">
                                        <?php
                                        echo $otros. ' %';
                                        ?>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Latest Social Trends -->
                
            </div>
    <!-- #END# Body Copy -->
    </div>
</section>
<!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

   

    <!-- Chart Plugins Js -->
    <script src="plugins/chartjs/Chart.bundle.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/charts/chartjs.js"></script>

<?php
$time_actual = date("H", time());

$i = 0;
foreach ($visits_log as $visits_log_full) {
    $visits_log_full = explode("|", $visits_log_full);
    if($time_actual == substr($visits_log_full[0],0,2)){
        //obtener hora y cantidad de visita
        $hit[$i]++;
        $xtime[$i]= $time_actual;
        $hituser[$i] = isset($hituser[$i]) ? $hituser[$i] : '0';
        //obtener user de la visita
        if($visits_log_full[1] != 'visitor'){
            $hituser[$i]++;
        }
    } else{
        if ($hit[$i] == null){
            $hit[$i] = 0;
            $xtime[$i] = $time_actual;  
            $hituser[$i] = 0;   
        }
        
        if($time_actual == 0){
            $time_actual = 24;
        }
        
        $time_actual--;
        
        $i++;
        if($i == 6){
            break;
        }
    }
}
?>
    
<script type="text/javascript">
$(function () {
    new Chart(document.getElementById("line_chart").getContext("2d"), getChartJs('line'));
});

function getChartJs(type) {
    var config = null;

    if (type === 'line') {
        config = {
            type: 'line',
            data: {
                labels: [
                    <?php
                    $w = 5;
                    for($q=0;$q<=5;$q++){
                        echo '"'.str_pad($xtime[$w], 2, "0", STR_PAD_LEFT).':00",';
                        $w--;
                    }
                    ?>
                         ],
                datasets: [{
                    label: "Total Visits",
                    data: [
                        <?php
                        $w = 5;
                        for($q=0;$q<=5;$q++){
                            echo $hit[$w].',';
                            $w--;
                        }
                        ?>
                        ],
                    borderColor: 'rgba(0, 188, 212, 0.75)',
                    backgroundColor: 'rgba(0, 188, 212, 0.3)',
                    pointBorderColor: 'rgba(0, 188, 212, 0)',
                    pointBackgroundColor: 'rgba(0, 188, 212, 0.9)',
                    pointBorderWidth: 1
                }, {
                        label: "Users Visits",
                        data: [
                        <?php
                        /*$w = 5;
                        for($q=0;$q<=5;$q++){
                            echo $hituser[$w].',';
                            $w--;
                        }*/
                        ?>
                        ],
                        borderColor: 'rgba(233, 30, 99, 0.75)',
                        backgroundColor: 'rgba(233, 30, 99, 0.3)',
                        pointBorderColor: 'rgba(233, 30, 99, 0)',
                        pointBackgroundColor: 'rgba(233, 30, 99, 0.9)',
                        pointBorderWidth: 1
                    }]
            },
            options: {
                responsive: true,
                legend: false
            }
        }
    }
    return config;
}
</script>