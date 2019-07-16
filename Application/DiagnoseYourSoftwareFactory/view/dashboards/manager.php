<?php
require_once '../../components/header.php';
require_once '../../components/head.php';
require_once '../../components/FilterUnauthorizedAcess.php';
require_once '../../components/navbar.php';
require_once '../../api/CallAPI.php';
?>

<?php
$diagnosticos = json_decode(CallAPI("GET", "http://localhost:8080/diagnostics"), true);
$myCompanies = json_decode(CallAPI("GET", "http://localhost:8080/users/companies/" . $_SESSION['id_logged_user']), true);
$showListOfCompanies = true;
?>
<body class="application-background">
    <div class="container container-color" style='padding:20px'>
        <?php
        if (isset($_GET['message'])) {
            echo("<div class='alert alert-danger'> " . $_GET['message'] . "</div>");
        }
        ?>
        <?php
        if (is_array($myCompanies) && isset($myCompanies['status']) && $myCompanies['status'] == '404') {
            echo("<div style='margin:20px' class='alert alert-info'>Você não possui nenhuma empresa registrada</div>");
            $showListOfCompanies = false;
        }
        ?>

        <div class="row" style="margin: 20px;">
            <div class="col-md-12" style="text-align: center; padding: 20px">
                <h4 class="col-md-12" style="text-align: center">Diagnósticos disponibilizados para suas empresas</h4>
                <small> Você encontra aqui os dignósticos disponiveis a suas empresas. Você pode encerrar o acesso a qualquer momento.</small>
            </div>
            <table class="table table-bordered table-hover table-striped" style="text-align: center">
                <tr>
                    <th>Diagnóstico</th>
                    <th>Data de início</th>
                    <th>Data de término</th>
                    <th>Empresa</th>
                    <th>Ações</th>
                </tr>
                <tr>
                    <td>Buckowits & Williams</td>
                    <td> 10/02/2019 </td>
                    <td> 10/04/2019 </td>
                    <td>X-brain</td>
                    <td><a href="" class="btn btn-danger"> <span><img width="18" height="18" src="../../resources/images/svg/si-glyph-deny.svg"</span> Encerrar </a></td>
                </tr>
                <tr>
                    <td>Diagnostic of Software Industries</td>
                    <td> 16/04/2019 </td>
                    <td> 10/07/2019 </td>
                    <td>X-code</td>
                    <td><a href="../reports/manager.php?company=34" class="btn btn-danger"> <span><img width="18" height="18" src="../../resources/images/svg/si-glyph-deny.svg"</span> Encerrar </a></td>
                </tr>
            </table>
        </div>
        <div class="col-md-12" style="text-align: center;padding: 20px">
            <h4 >Diagnósticos cadastrados</h4>
            <small>Selecione aqui os diagnósticos que você deseja disponibilizar a sua empresa. Você será redirecionado para a página de disponibilização.</small>
        </div>
        <div class="row" style="padding:10px">
            <?php foreach ($diagnosticos as $diag) { ?>
                <a style="text-decoration: none;" href="../diagnostics/qa.php?diagnostic=<?= $diag['idquestionnaire'] ?>">
                    <div class="list-view">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="../../resources/images/survey.png" width="200" height="200"/>
                            </div>
                            <div class="col-md-8">
                                <h3 class="header-subtitles alert"><?php echo($diag['name']) ?></h3>
                                <p><?php echo($diag['description']) ?></p>
                                <a href="../../view/diagnostics/provide.php" class="btn btn-success"> Disponibilizar </a>
                            </div>
                        </div>
                    </div>
                </a>
            <?php } ?>
        </div>
</body>


<?php
require_once '../../components/footer.php';
?>