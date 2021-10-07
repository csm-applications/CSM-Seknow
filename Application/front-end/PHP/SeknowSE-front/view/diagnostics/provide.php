<?php
require_once '../../components/header.php';
require_once '../../components/head.php';
require_once '../../components/FilterUnauthorizedAcess.php';
require_once '../../api/CallAPI.php';
require_once '../../components/navbar.php';
?>

<?php
if (isset($_POST['action']) && $_POST['action'] == 'provideDiagnostic') {

    var_dump($_POST);
    // pega todos os funcionarios de uma empresa
    $provide = Array();
    array_push($provide, $_POST['companyid']);
    array_push($provide, $_GET['toProvide']);
    
    CallAPI("PUT", "http://localhost:8080/companies/provide/", json_encode($provide));
    
    header("Location: ../dashboards/manager.php");
}
?>

<body class="application-background" >
    <div class="container-color container" style="padding-top: 1%;">

        <?php
        if (isset($_GET['message'])) {
            echo("<div class='alert alert-danger'>" . $_GET['message'] . "</div>");
        }

        $listOfCompanies = json_decode(CallAPI("GET", "http://localhost:8080/users/companies/" . $_SESSION['id_logged_user']), true);
        ?>

        <h3 class="header-titles alert">Provide Diagnostic</h3>

        <div style="text-align: justify; padding: 20px;">you can make diagnostics available to your employees. Once a 
            diagnosis is made available, your employees will be able to answer the questions and when you 
            log out you will be able to access the answer report.
        </div>

        <div class="row">
            <div style="margin: 50px; margin-left: 25%;  padding: 20px; background-color: #fff" class="col-md-6">
                <h4 class="center" style="margin-bottom:25px;">Provide Diagnostic</h4>
                <form class="form-group" method="POST" action="provide.php?toProvide=<?= $_GET['toProvide']?>">
                    <input type="hidden" name="action" value="provideDiagnostic">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <img src="../../resources/images/svg/si-glyph-badge-name.svg" style="width: 16px; height: 16px;" /> 
                            </span>
                        </div>
                        <select name="companyid" class="form-control">
                            <option>Select a company</option>
                            <?php
                            foreach ($listOfCompanies as $company) {
                                echo '<option value="' . $company['idCompany'] . '"> ' . $company['name'] . '</option>';
                            }
                            ?>
                        </select>

                    </div>

                    <div class="input-group mb-3">

                        <input type="submit" class="btn btn-primary col-md-12" value="Provide"/>
                    </div>

                </form>
            </div>
        </div>


    </div>
</body>
<?php
require_once '../../components/footer.php';
?>