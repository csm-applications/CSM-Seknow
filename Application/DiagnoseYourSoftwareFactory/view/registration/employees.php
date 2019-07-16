<?php
require_once '../../components/header.php';
require_once '../../components/FilterUnauthorizedAcess.php';
require_once '../../components/head.php';
require_once '../../components/navbar.php';
require_once '../../API/CallAPI.php';
?>

<?php
$showListOfYourEmployees = false;

if (isset($_GET['toHire'])) {
    $yourEmployees = json_decode(CallAPI("GET", "http://localhost:8080/companies/employees/" . $_GET['toHire']), true);
    $showListOfYourEmployees = true;
}
if (isset($_GET['filter']) && ($_GET['filter'] != null || $_GET['filter'] != "")) {
    $allUsers = json_decode(CallAPI("GET", "http://localhost:8080/users/filterbyname/" . urlencode($_GET['filter'])), true);
} else {
    $allUsers = json_decode(CallAPI("GET", "http://localhost:8080/users/"), true);
}

if (isset($_POST['action']) && $_POST['action'] == 'fireUser') {
    $userToFire = json_decode(CallAPI("GET", "http://localhost:8080/users/" . $_POST['userToFire']), true);
    $userToFire['companyId'] = null;
    json_decode(CallAPI("PUT", "http://localhost:8080/users/", json_encode($userToFire)), true);
    header("location: employees.php?toHire=" . $_GET['toHire']);
}

if (isset($_POST['action']) && $_POST['action'] == 'admitUser') {
    $userToFire = json_decode(CallAPI("GET", "http://localhost:8080/users/" . $_POST['userToAdmit']), true);
    $userToFire['companyId'] = intval($_GET['toHire']);
    json_decode(CallAPI("PUT", "http://localhost:8080/users/", json_encode($userToFire)), true);
    header("location: employees.php?toHire=" . $_GET['toHire']);
}
?>

<body class="application-background" >
    <div class="container-color container" style="padding: 1%;">
        <h3 class="header-titles alert">Convidar funcionários</h3>
        <div style="padding:3%;">Aqui você, gestor, poderá realizar convidar seus colaboradores a se cadastrar no nossa ferramenta 
            e realizar os diagnósticos disponíveis.</div>

        <?php if ($showListOfYourEmployees) { ?>

            <div class="jumbotron">
                <h3 class="alert alert-dark">Seus funcionários</h3>
                <div style="padding:20px;">
                    <table class="table table-hover table-bordered">
                        <tr>
                            <th>Nome do Funcionário</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Empresa</th>
                            <th>Ações</th>
                        </tr>
                        <?php foreach ($yourEmployees as $emp) { ?>
                            <tr>
                                <td> <?= $emp['nome'] ?> </td>
                                <td ><?= $emp['email'] ?> </td>
                                <td ><?= $emp['phone'] ?> </td>
                                <td ><?= $emp['companyId']['name'] ?> </td>
                                <td > 
                                    <form action="employees.php?toHire=<?= $_GET['toHire'] ?>" method="POST">
                                        <input type="hidden" name="action" value="fireUser"/>
                                        <input type="hidden" name="userToFire" value="<?= $emp['idUserAccount'] ?>"/>
                                        <input type="image" src="../../resources/images/svg/si-glyph-trash.svg" width="20" height="20"/>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>

        <?php } ?>
        <div class="jumbotron">
            <h3 class="alert alert-dark">Todos usuários</h3>
            <form action="employees.php" method="GET">
                <input type="hidden" name="toHire" value="<?= $_GET['toHire'] ?>"/>
                <div class="row">
                    <div class="col-md-10">
                        <input class="form-control" placeholder="Digite um nome para filtrar" name="filter"/>
                    </div>
                    <div class="col-md-2">
                        <input class="btn btn-primary" type="submit" value="search"/>
                    </div>
                </div>
            </form>
            <div style="padding:20px;">
                <table class="table table-hover table-bordered">
                    <tr>
                        <th>Nome do Funcionário</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Empresa</th>
                        <th>Ações</th>
                    </tr>
                    <?php foreach ($allUsers as $emp) { ?>
                        <tr>
                            <td> <?= $emp['nome'] ?> </td>
                            <td ><?= $emp['email'] ?> </td>
                            <td ><?= $emp['phone'] ?> </td>
                            <td ><?= $emp['companyId']['name'] ?> </td>
                            <td style="text-align: center"> 
                                <form action="employees.php?toHire=<?= $_GET['toHire'] ?>" method="POST">
                                    <input type="hidden" name="action" value="admitUser"/>
                                    <input type="hidden" name="userToAdmit" value="<?= $emp['idUserAccount'] ?>"/>
                                    <input type="image" src="../../resources/images/svg/si-glyph-person-plus.svg" width="20" height="20"/>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>


        <div class="jumbotron alert-warning" style="margin: 20px">
            <div>Para cadastrar um novo funcionário na sua empresa envie o seguinte link para seu funcionário:</div>
            <a href="http://localhost/DiagnoseYourSoftwareFactory/view/registration/user.php?toHire=<?= $_GET['toHire'] ?>"> 
                http://localhost/DiagnoseYourSoftwareFactory/view/registration/user.php?toHire=<?= $_GET['toHire'] ?>
            </a>
        </div>
    </div>
</body>

<?php
require_once '../../components/footer.php';
?>