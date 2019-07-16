<?php
require_once '../../components/header.php';
require_once '../../components/head.php';
require_once '../../components/FilterUnauthorizedAcess.php';
require_once '../../components/navbar.php';
require_once '../../api/CallAPI.php';
?>

<body class="application-background" >
    <div class="container container-color" style="padding:20px" >

        <h3 class="header-titles alert">  Área do pesquisador</h3>
        <div style="margin: 30px"> Aqui você pesquisador encontra informações para sua pesquisa sobre gestão de conhecimento em empresas de software.
            Você poderá fazer download dos dados dos diagnósticos e poderá acessar um relatório geral das empresas cadastradas.</div>


        <div class="jumbotron" style="background-color: #fafafa;" >
            <h3>Faça download dos dados</h3>

            <div class="row">
                <div class="col-md-6">
                    <div class="card ">
                        <div class="card-img" style="text-align: center; margin: 10px;">
                            <img src="../../resources/images/excel.png" width="300" height="300"/>
                        </div>
                        <h4 class="card-header bg-primary" style="color:#fff; text-align: center;">
                            Download em CSV
                        </h4>
                        <div class="card-body">
                            Faça download dos nossos dados direto no formato CSV
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card ">
                        <div class="card-img" style="text-align: center; margin: 10px">
                            <img src="../../resources/images/csv.svg" width="300" height="300"/>
                        </div>
                        <h4 class="card-header bg-primary" style="color:#fff; text-align: center;">
                            Download no Excel
                        </h4>
                        <div class="card-body">
                            Faça download dos nossos dados direto no excel
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="jumbotron" style="background-color: #fafafa" >
            <div>
                <h3> <img width="40" height="40" src="../../resources/images/svg/si-glyph-test-tube.svg"> Entenda o diagnóstico de Buckowits e Williams</h3>
                <p>
                    As empresas constroem conhecimento diariamente por meio dos seus funcionários. O grande problema é que algumas delas não se deram
                    conta que o conhecimento é o maior bem que ela pode ter. 
                </p>
                <p>
                    Um novo funcionário que ingressa na empresa está contando apenas com sua experiência para dar a empresa novas soluções. No entanto, 
                    existe um grande número de conhecimento já construído pelos funcionários e que o novo funcionário terá que aprender. Se esse novo
                    funcionário não tiver acesso a esse conhecimento de forma organizada e rapidamente o tempo demandado para que o funcionário comece a produzir
                    será elevado consideravelmente.
                </p>
                <p>
                    Para avaliar se uma empresa possui em seu time e políticas um nível bom de gestão do conhecimento os diagnósticos foram criados. Buckowits e williams
                    dividiram em 7 seções principais a gestão de conhecimento. No gráfico abaixo estão sumarizados os dados de 85 empresas e como elas foram
                    avaliadas pelos próprios funcionários.
                </p>
            </div>


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
                <div class="header-subtitles alert col-md-12">Diagnóstico de Buckowits e Williams considerando as respostas de 85 empresas diferentes</div>
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