<?php
require_once '../../components/header.php';
require_once '../../components/head.php';
require_once '../../components/FilterUnauthorizedAcess.php';
require_once '../../components/navbar.php';
require_once '../../api/CallAPI.php';
?>

<body class="application-background" >
    <div class="container container-color" style="padding:20px" >

        <h3 class="header-titles alert"> Manager Report </h3>

        <?php
        $companiesFromUser = json_decode(CallAPI("GET", "http://localhost:8080/companies/fromuser/" . $_SESSION['id_logged_user']), true);
        if ($companiesFromUser == null) {
            echo '<div class="alert alert-info">Unfortunately you do not have any registered companies or employees. Register a company and apply the questionnaires to access the diagnostics.</div>';
        } else {
            ?>

            <!--
                    <div class="col-md-12" style="background-color: #fff; margin-bottom: 10px; padding:20px">
                        <div class="row">
                            <div class="col-md-3">
            
                                <div class="card">
                                    <h4 class="card-header bg-primary" style="color:fff; text-align: center">Obter</h4>
                                    <div class="card-body" style="font-size: 50px; font-weight: bold; text-align: center; color: #34ce57">80%</div>
                                    <div></div>
                                </div>
                            </div>
                            <div class="col-md-3">
            
                                <div class="card">
                                    <h4 class="card-header bg-primary" style="color:fff; text-align: center">Utilizar</h4>
                                    <div class="card-body" style="font-size: 50px; font-weight: bold; text-align: center; color: #34ce57">60%</div>
                                </div>
                            </div>
                            <div class="col-md-3">
            
                                <div class="card">
                                    <h4 class="card-header bg-primary" style="color:fff; text-align: center">Aprender</h4>
                                    <div class="card-body" style="font-size: 50px; font-weight: bold; text-align: center; color: #34ce57">60%</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <h4 class="card-header bg-primary" style="color:fff; text-align: center">Contribuir</h4>
                                    <div class="card-body" style="font-size: 50px; font-weight: bold; text-align: center; color: #dc3545">45%</div>
                                </div>
                            </div>
                        </div>
                    </div>
            
            -->
            <div class="jumbotron" style="background-color: #fafafa" >

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-8"></div>
                        <div class="col-md-4" >
                            <form action = "manager.php" method = "GET" onchange="this.submit()">

                                <div class=""> Select a company</div>
                                <select name="company" class = "form-control">
                                    <option>Select a company</option>
                                    <?php
                                    $nameOfCompany = "";
                                    $companies = json_decode(CallAPI("GET", "http://localhost:8080/companies/fromuser/" . $_SESSION['id_logged_user']), true);
                                    foreach ($companies as $key => $c) {
                                        if (isset($_GET['company']) && $_GET['company'] == $c['idCompany']) {
                                            $nameOfCompany = $c['name'];
                                            echo ("<option selected='true' value='" . $c['idCompany'] . "'>" . $c['name'] . "</option>" );
                                        } else {
                                            echo ("<option value='" . $c['idCompany'] . "'>" . $c['name'] . "</option>" );
                                        }
                                    }
                                    ?>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>


                <?php
                if (isset($_GET['company'])) {
                    $url = "http://localhost:8080/chart/fromcompany/" . $_GET['company'] . "/gender";


                    $dataToPieChart = json_decode(CallAPI("GET", $url), true);
                    $dataTable = Array();

                    $line = Array();
                    array_push($line, 'Gender');
                    array_push($line, 'Number of Employees');
                    array_push($dataTable, $line);

                    for ($i = 0; $i < count($dataToPieChart); $i++) {
                        $line = Array();
                        array_push($line, $dataToPieChart['labels'][$i]);
                        array_push($line, $dataToPieChart['values'][$i]);
                        array_push($dataTable, $line);
                    }
                    ?>
                    <!--Grafico 1 -->
                    <div class="row" style="background-color: #fff; padding:10px"> 
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                                    google.charts.load('current', {'packages': ['corechart']});
                                    google.charts.setOnLoadCallback(drawChart);

                                    function drawChart() {
                                        var data = google.visualization.arrayToDataTable(<?= json_encode($dataTable) ?>);

                                        var options = {
                                            is3D: true,
                                            slices: {
                                                0: {color: 'blue'},
                                                1: {color: 'pink'}
                                            }
                                        };

                                        var chart = new google.visualization.PieChart(document.getElementById('genderchart'));

                                        chart.draw(data, options);
                                    }
                        </script>
                        <div class="header-subtitles alert col-md-12">Gender in company</div>
                        <div class="col-md-6" style="text-align: center">
                            <img src="../../resources/images/gender.png" height="250"/>
                            <div style="font-family: impact; font-size: 35px;color: #007bff; text-align: center">Male and females in your company</div>
                        </div>
                        <div class="col-md-6" id="genderchart" style="width: 900px; height: 400px">

                        </div>
                    </div>



                    <?php
                } else {
                    echo '<div class="alert alert-info">No company selected</div>';
                }


                $dataToChart = json_decode(CallAPI("GET", "http://localhost:8080/chart/fromcompany/" . $_SESSION['id_logged_user']), true);
                $dataTable = Array();

                array_unshift($dataToChart['xLabel'], "Seções");
                array_unshift($dataToChart['yAxis'], "Pontuação");

                for ($i = 0; $i < count($dataToChart); $i++) {
                    $line = Array();
                    array_push($line, $dataToChart['xLabel'][$i]);
                    array_push($line, $dataToChart['yAxis'][$i]);
                    array_push($dataTable, $line);
                }
                ?>
                <!--Grafico 1 -->
                <div class="row" style="background-color: #fff; padding:10px"> 
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                                google.charts.load('current', {'packages': ['corechart']});
                                google.charts.setOnLoadCallback(drawChart);

                                function drawChart() {
                                    var data = google.visualization.arrayToDataTable(<?= json_encode($dataTable) ?>);

                                    var options = {
                                        curveType: 'function',
                                        legend: {position: 'bottom'}
                                    };

                                    var chart = new google.visualization.BarChart(document.getElementById('overviewbysection'));

                                    chart.draw(data, options);
                                }
                    </script>
                    <div class="header-subtitles alert col-md-12">Diagnostic overview by section</div>

                    <div id="overviewbysection" style="width: 900px; height: 400px"></div>
                </div>

                <?php
                if (isset($_GET['company'])) {
                    $dataToChart2 = json_decode(CallAPI("GET", "http://localhost:8080/chart/fromcompany/" . $_GET['company']), true);
                }
                $dataTable2 = Array();
                $dataOfChartIsEmpty = empty($dataToChart2['xLabel']);
                if (!$dataOfChartIsEmpty) {
                    array_unshift($dataToChart2['xLabel'], "Empregados");
                    array_unshift($dataToChart2['yAxis'], "Pontuação");

                    for ($i = 0; $i < count($dataToChart2['xLabel']); $i++) {
                        $line = Array();
                        array_push($line, $dataToChart2['xLabel'][$i]);
                        array_push($line, $dataToChart2['yAxis'][$i]);
                        array_push($dataTable2, $line);
                    }
                }
                ?>



                <div class="row" style="background-color: #fff; margin-top: 20px;padding:10px"> 
                    <!--Grafico 2 -->

                    <div class="col-md-12" > 
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                                google.charts.load('current', {'packages': ['corechart']});
                                google.charts.setOnLoadCallback(drawChart);

                                function drawChart() {
                                    var data = google.visualization.arrayToDataTable(<?= json_encode($dataTable2) ?>);

                                    var options = {
                                        curveType: 'function',
                                        legend: {position: 'bottom'}
                                    };

                                    var chart = new google.visualization.ColumnChart(document.getElementById('pontuationByEmployee'));

                                    chart.draw(data, options);
                                }
                        </script>

                        <div class="col-md-12 header-subtitles alert "><?= $nameOfCompany ?> evaluation by employee</div>



                        <?php
                        if (!$dataOfChartIsEmpty) {
                            echo('<div id="pontuationByEmployee" style="width: 900px; height: 400px"></div>');
                        } else if (isset($_GET['company'])) {
                            echo('<div class="alert alert-info"> This company has no employees</div>');
                        } else {
                            echo('<div class="alert alert-info"> Select a company</div>');
                        }
                        ?>

                    </div>
                </div>
            </div>

        <?php } ?>
    </div>

</body>

<?php
require_once '../../components/footer.php';
?>