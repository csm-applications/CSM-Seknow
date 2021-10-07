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

if (isset($_POST['revokeAction']) && $_POST['revokeAction'] != null && $_POST['revokeAction'] == 'revoke') {
    $companyToRevoke = $_POST['companyid'];
    $diagnosticToRevoke = $_POST['diagnosticid'];

    $toRevoke = Array();
    array_push($toRevoke, $diagnosticToRevoke);
    array_push($toRevoke, $companyToRevoke);

    CallAPI("PUT", "http://localhost:8080/companies/revoke/", json_encode($toRevoke));

    header("Location: ../dashboards/manager.php");
}
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
            echo("<div style='margin:20px' class='alert alert-info'>You don't have any companies registered</div>");
            $showListOfCompanies = false;
        }
        ?>

        <div class="row" style="margin: 20px;">
            <div class="header-titles col-md-12" style="text-align: center; padding: 20px; margin-bottom: 20px">
                <h4 class="col-md-12 header-titles" style="text-align: center">Diagnostics made available to your companies</h4>
                <div> Here you will find the dignostics available to your companies. You can terminate access at any time.</div>
            </div>
            <table class="table table-bordered table-hover table-striped" style="text-align: center; background-color: #fff; color: #3b5b85">
                <tr>
                    <th>Diagnostic</th>
                    <th>Company</th>
                    <th>Actions</th>
                </tr>
                <?php
                foreach ($myCompanies as $company) {
                    $diagnostics = $company['diagnosticList'];
                    foreach ($diagnostics as $diagnostic) {
                        ?>
                        <form action="manager.php" method="POST">

                            <tr>
                                <td><?= $company['name'] ?></td>
                                <td><?= $diagnostic['name'] ?></td>
                            <input type="hidden" name="revokeAction" value="revoke"/>
                            <input type="hidden" name='diagnosticid' value="<?= $diagnostic['idquestionnaire'] ?>"/>
                            <input type="hidden" name='companyid' value="<?= $company['idCompany'] ?>"/>
                            <td><input type="submit" class="btn btn-danger" value="Revoke"/> </td>
                            </tr>
                        </form>
                        <?php
                    }
                }
                ?>
            </table>
        </div>
        <div class="header-titles col-md-12" style="text-align: center;padding: 20px">
            <h4 class="">Registered Diagnostics</h4>
            <div>Select here the diagnostics you wish to make available to your company. You will be redirected to the availability page.</div>
        </div>
        <div class="row" style="padding:10px">
            <table class="table table-bordered table-hover table-striped" style="text-align: center; background-color: #fff; color: #3b5b85">
                <tr>
                    <th>Diagnostic</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
                <?php foreach ($diagnosticos as $diag) { ?>

                        <tr>
                            <td style="width: 30%"><?= $diag['name'] ?></td>
                            <td style="width: 50%"><?= $diag['description'] ?></td>
                        <input type="hidden" name="revokeAction" value="revoke"/>
                        <input type="hidden" name='diagnosticid' value="<?= $diag['idquestionnaire'] ?>"/>
                        <input type="hidden" name='companyid' value="<?= $company['idCompany'] ?>"/>
                        <td><a href="../../view/diagnostics/provide.php?toProvide=<?= $diag['idquestionnaire'] ?>" class="btn btn-success"> Provide </a> </td>
                        </tr>

                <?php } ?>

            </table>
        </div>
</body>


<?php
require_once '../../components/footer.php';
?>