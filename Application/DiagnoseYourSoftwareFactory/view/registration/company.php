
<?php
require_once '../../components/header.php';
require_once '../../components/head.php';
require_once '../../api/CallAPI.php';
require_once '../../model/UserAccount.php';
require_once '../../model/UserType.php';
require_once '../../model/Permission.php';
require_once '../../model/Company.php';

session_start();
?>

<?php
$myCompanies = json_decode(CallAPI("GET", "http://localhost:8080/users/companies/" . $_SESSION['id_logged_user']), true);
$showListOfCompanies = true;
$edit = false;
if (isset($_POST['action']) && $_POST['action'] == "deletecompany") {
    json_decode(CallAPI("DELETE", "http://localhost:8080/companies/" . $_POST['companytodelete']), true);
    header("location: company.php");
}

if (isset($_GET['editcompany'])) {
    $companyToEdit = json_decode(CallAPI("GET", "http://localhost:8080/companies/" . $_GET['editcompany']), true);
    $edit = true;
}

if (isset($_POST['action']) && $_POST['action'] == "editCompany") {
    $company = new Company();
    $company->setIdCompany($_POST['idCompany']);
    $company->setName($_POST['name']);
    $company->setPhone($_POST['phone']);
    $company->setFoundationDate($_POST['foundationDate']);
    $company->setDescription($_POST['description']);

    $owner = new UserAccount();
    $owner = json_decode(CallAPI("GET", "http://localhost:8080/users/" . $_SESSION['id_logged_user']), true);

    $company->setOwner($owner);

    $companyEdited = json_decode(CallAPI("PUT", "http://localhost:8080/companies/", json_encode($company), true));
    header("location: company.php");
}

if (isset($_POST['action']) && $_POST['action'] == "addCompany") {
    $company = new Company();

    $company->setName($_POST['name']);
    $company->setPhone($_POST['phone']);
    $company->setFoundationDate($_POST['foundationDate']);
    $company->setDescription($_POST['description']);

    $owner = new UserAccount();
    $owner = json_decode(CallAPI("GET", "http://localhost:8080/users/" . $_SESSION['id_logged_user']), true);

    $company->setOwner($owner);

    $companySaved = json_decode(CallAPI("POST", "http://localhost:8080/companies/", json_encode($company)), true);
    header("location: company.php");
}

require_once '../../components/navbar.php';
?>



<body class="application-background" >

    <div class="app-body">
        <main class="main d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <?php
                    if (is_array($myCompanies) && isset($myCompanies['status']) && $myCompanies['status'] == '404') {
                        echo("<div class='alert alert-info'>Você não possui nenhuma empresa registrada</div>");
                        $showListOfCompanies = false;
                    }
                    ?>

                    <div class="col-md-6">
                        <div class="card mx-4">
                            <div class="card-body p-4">
                                <h3 class="header-titles alert alert-info"  >Cadastro de Empresa</h3>
                                <p class="text-muted">Cadastre aqui sua empresa</p>
                                <form action="company.php" method="POST">
                                    <?php
                                    if (!$edit) {
                                        echo ('<input type="hidden" value="addCompany" name="action"/>');
                                    } else {
                                        echo ('<input type="hidden" value="editCompany" name="action"/>');
                                        echo ('<input type="hidden" value="' . $companyToEdit['idCompany'] . '" name="idCompany"/>');
                                    }
                                    ?>
                                    <fieldset>
                                        <legend>Dados da empresa</legend>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <img src="../../resources/images/svg/si-glyph-suitcase-person.svg" style="width: 16px; height: 16px;" /> 
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Nome da empresa ou razão social"
                                                   required name="name" <?php
                                                   if ($edit) {
                                                       echo('value="' . $companyToEdit['name']) . '"';
                                                   }
                                                   ?> autocomplete="full_name">
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <img src="../../resources/images/svg/si-glyph-phone-number.svg" style="width: 16px; height: 16px;" /> 
                                                </span>
                                            </div>
                                            <input type="tel" class="form-control" placeholder="Telefone" name="phone"
                                                   mask="(00) 00000-0000" <?php
                                                   if ($edit) {
                                                       echo('value="' . $companyToEdit['phone']) . '"';
                                                   }
                                                   ?> autocomplete="phone">
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text">
                                                    <img src="../../resources/images/svg/si-glyph-history.svg" style="width: 16px; height: 16px;" /> 
                                                </label>
                                            </div>

                                            <input type="text" name="foundationDate" <?php
                                            if ($edit) {
                                                echo('value="' . $companyToEdit['foundationDate']) . '"';
                                            }
                                            ?> placeholder="Data de fundação da empresa"
                                                   class="form-control" onfocus="(this.type = 'date')"  id="date" >

                                        </div>



                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <img src="../../resources/images/svg/si-glyph-document-copy.svg" style="width: 16px; height: 16px;" /> 
                                                </span>
                                            </div>
                                            <input type="text"  name="description"  placeholder="Atividades da empresa"  value="<?php
                                            if ($edit) {
                                                echo($companyToEdit['description']);
                                            }
                                            ?>" class="form-control"></input>
                                        </div>

                                    </fieldset>


                                    <input type="submit" style="background-color:#021f9a" value="<?php
                                    if (!$edit) {
                                        echo('Criar Empresa');
                                    } else {
                                        echo('Atualizar Informações');
                                    }
                                    ?>" class="btn btn-block btn-success" />
                                    <a href="company.php" class="btn btn-primary form-control" style="margin-top: 5px; background-color: #39b4e8"> Nova empresa</a>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 container-color" style="padding:1%" >
                        <?php if ($showListOfCompanies) { ?>
                            <fieldset>
                                <h3  class="header-titles alert alert-info">Suas Empresas</h3>


                                <table class="table table-hover table-bordered " style="text-align: center">
                                    <tr>
                                        <th>Nome / razão social</th>
                                        <th>Descrição</th>
                                        <th>Ações</th>
                                    </tr>

                                    <?php
                                    foreach ($myCompanies as $mc) {
                                        ?>

                                        <tr>
                                            <td><?= $mc['name'] ?></td>
                                            <td><?= $mc['description'] ?></td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <form action="company.php" method="POST">           
                                                            <input type="hidden" name="action" value="deletecompany"/>
                                                            <input type="hidden" name="companytodelete" value="<?php echo($mc['idCompany']); ?>"/>
                                                            <input type="image" title="Excluir Empresa" src="../../resources/images/svg/si-glyph-delete.svg" width="20" height="20"/>
                                                        </form>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <a <?php echo('href="company.php?editcompany=' . $mc['idCompany'] . '"') ?>> 
                                                            <img width="20" height="20" title="Editar Empresa" src="../../resources/images/svg/si-glyph-edit.svg">
                                                        </a>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <a <?php echo('href="employees.php?toHire=' . $mc['idCompany'] . '"') ?>> 
                                                            <img width="20" height="20" title="Funcionários" src="../../resources/images/svg/si-glyph-person-people.svg">
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </table>
                            </fieldset>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </main>
    </div>

</body>



<?php
require_once '../../components/footer.php';
?>