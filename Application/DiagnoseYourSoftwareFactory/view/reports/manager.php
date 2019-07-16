<?php
require_once '../../components/header.php';
require_once '../../components/head.php';
require_once '../../components/FilterUnauthorizedAcess.php';
require_once '../../components/navbar.php';
require_once '../../api/CallAPI.php';
?>

<body class="application-background" >
    <div class="container container-color" style="padding:20px" >

        <h3 class="header-titles alert"> Relatório </h3>
        <div style="margin: 30px"> Aqui você pode consultar os resultados dos seus diagnósticos realizados. Cada diagnóstico utiliza uma métrica diferente de cálculo
            e este software obedece a métrica prevista pelos autores. Você pode acessar o relatório de todas as suas empresas selecionando-as no filtro.</div>


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

        <div class="jumbotron" style="background-color: #fafafa" >


            <?php
            $dataToChart = json_decode(CallAPI("GET", "http://localhost:8080/chart/fromuser/" . $_SESSION['id_logged_user']), true);
            $dataTable = Array();
            array_unshift($dataToChart['xLabel'], "Seções");
            array_unshift($dataToChart['yAxis'], "Pontuação");

            for ($i = 0; $i <= count($dataToChart); $i++) {
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
                            title: 'Pontuação geral dos funcionários',
                            curveType: 'function',
                            legend: {position: 'bottom'}
                        };

                        var chart = new google.visualization.BarChart(document.getElementById('myevaluation'));

                        chart.draw(data, options);
                    }
                </script>
                <div class="header-subtitles alert col-md-12">Seu diagnóstico</div>
                <div id="myevaluation" style="width: 900px; height: 400px"></div>
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
                <div class="col-md-12">
                    <div class="row">

                        <div class="col-md-8"></div>
                        <div class="col-md-3" style="margin: 20px">
                            <form action = "manager.php" method = "GET" onchange="this.submit()">
                                <select name="company" class = "form-control">
                                    <option>Selecione uma opção</option>
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
                <div class="col-md-12" > 
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                                google.charts.load('current', {'packages': ['corechart']});
                                google.charts.setOnLoadCallback(drawChart);

                                function drawChart() {
                                    var data = google.visualization.arrayToDataTable(<?= json_encode($dataTable2) ?>);

                                    var options = {
                                        title: 'Resultado do seu diagnóstico por seção',
                                        curveType: 'function',
                                        legend: {position: 'bottom'}
                                    };

                                    var chart = new google.visualization.BarChart(document.getElementById('pontuationByEmployee'));

                                    chart.draw(data, options);
                                }
                    </script>

                    <div class="col-md-12 header-subtitles alert ">Avaliação dos funcionários da empresa <?= $nameOfCompany ?></div>
                    <?php
                    if (!$dataOfChartIsEmpty) {
                        echo('<div id="pontuationByEmployee" style="width: 900px; height: 400px"></div>');
                    } else if (isset($_GET['company'])) {
                        echo('<div class="alert alert-info"> Essa empresa não possui funcionários ainda</div>');
                    } else {
                        echo('<div class="alert alert-info"> Selecione uma empresa</div>');
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>

</body>

<?php
require_once '../../components/footer.php';
?>