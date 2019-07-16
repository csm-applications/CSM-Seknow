
<?php
require_once '../../components/header.php';
require_once '../../components/head.php';
require_once '../../api/CallAPI.php';
require_once '../../model/UserAccount.php';
require_once '../../model/UserType.php';
require_once '../../model/Permission.php';

session_start();
?>

<?php
if (isset($_POST['action']) && $_POST['action'] == "addUser") {
    if (isset($_POST['password']) && isset($_POST['passwordConfirmation']) &&
            $_POST['password'] == $_POST['passwordConfirmation']) {

        $uac = new UserAccount();
        $uac->setNome($_POST['name']);
        $uac->setStartWork($_POST['startWork']);
        $uac->setBirthDate($_POST['birthDate']);
        $uac->setPhone($_POST['phone']);
        $uac->setGender($_POST['gender']);
        $uac->setEmail($_POST['mail']);
        $uac->setPassword($_POST['password']);
        if (isset($_POST['toHire'])) {
            $uac->setCompanyId(intval($_POST['toHire']));
        }


        $usrType = new UserType();
        $apiUserType = json_decode(CallAPI("GET", "http://localhost:8080/usertypes/" . $_POST['type']), true);
        $usrType->setIdUserType($apiUserType['idUserType']);
        $usrType->setName($apiUserType['name']);

        $uac->setUserType($usrType);
        $userSaved = json_decode(CallAPI("POST", "http://localhost:8080/users/", json_encode($uac)), true);
        $_SESSION['logged_user'] = $userSaved['email'];
        $_SESSION['id_logged_user'] = $userSaved['idUserAccount'];
        $_SESSION['user_type'] = $userSaved['userType']['name'];
        print_r($uac);
        header("location: ../dashboards/user.php");
    } else {
        header("location: user.php?message=As senhas não estão iguais");
    }
}
?>


<body class="application-background">

    <div class="app-body">
        <main class="main d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="card mx-4">
                            <div class="card-body p-4">
                                <h1>Cadastro de usuário</h1>
                                <p class="text-muted">Crie sua conta</p>
                                <form action="user.php" method="POST">
                                    <input type="hidden" value="addUser" name="action"/>
                                    <?php
                                    if (isset($_GET['toHire'])) {
                                        echo('<input type="hidden" value="' . $_GET['toHire'] . '" name="toHire"/>');
                                    }
                                    ?>
                                    <fieldset>
                                        <legend>Seus dados</legend>
                                        <?php
                                        if (isset($_GET['message'])) {
                                            echo("<div class='alert alert-warning'>" . $_GET['message'] . "</div>");
                                        }
                                        ?>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <img src="../../resources/images/svg/si-glyph-person.svg" style="width: 16px; height: 16px;" /> 
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Nome e sobrenome"
                                                   required name="name"  autocomplete="full_name">
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <img src="../../resources/images/svg/si-glyph-suitcase.svg" style="width: 16px; height: 16px;" />
                                                </span>
                                            </div>
                                            <?php
                                            $usertypes = json_decode(CallAPI("GET", "http://localhost:8080/usertypes"), true);
                                            ?>
                                            <select name="type" class="form-control" required >
                                                <option  selected disabled>Selecione seu papel</option>
                                                <?php foreach ($usertypes as $ut) { ?>
                                                    <?php echo($ut); ?>
                                                    <option value="<?= $ut['idUserType'] ?>" > <?= $ut['name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text">
                                                    <img src="../../resources/images/svg/si-glyph-history.svg" style="width: 16px; height: 16px;" /> 
                                                </label>
                                            </div>

                                            <input type="text" name="startWork" placeholder="Quando iniciou seu trabalho na área"
                                                   class="form-control" onfocus="(this.type = 'date')"  id="startWork" >

                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <img src="../../resources/images/svg/si-glyph-calendar-1.svg" style="width: 16px; height: 16px;" /> 
                                                </span>
                                            </div>
                                            <input type="text"  name="birthDate" placeholder="Data de nascimento"
                                                   class="form-control" onfocus="(this.type = 'date')"  id="birthDate" >
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <img src="../../resources/images/svg/si-glyph-phone-number.svg" style="width: 16px; height: 16px;" /> 
                                                </span>
                                            </div>
                                            <input type="tel" class="form-control" placeholder="Telefone" name="phone"
                                                   mask="(00) 00000-0000" autocomplete="phone">
                                        </div>

                                        <div class="form-group row text-center">
                                            <div class="col-md-12 col-form-label">
                                                <div class="form-check form-check-inline mr-3" id="inline-radios">
                                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="MALE"
                                                           >

                                                    <label class="form-check-label" for="inlineRadio1">Masculino</label>
                                                </div>
                                                <div class="form-check form-check-inline mr-1">
                                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="FEMALE">
                                                    <label class="form-check-label" for="inlineRadio2">Feminino</label>
                                                </div>
                                            </div>
                                        </div>

                                    </fieldset>

                                    <fieldset>
                                        <legend>Dados de acesso</legend>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <img src="../../resources/images/svg/si-glyph-mail.svg" style="width: 16px; height: 16px;" /> 
                                                </span>
                                            </div>
                                            <input type="email" class="form-control" placeholder="Email" required name="mail" autocomplete="off">
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <img src="../../resources/images/svg/si-glyph-lock-unlock.svg" style="width: 16px; height: 16px;" /> 
                                                </span>
                                            </div>
                                            <input type="password"  name="password" class="form-control" placeholder="Senha" minlength="6" required >
                                        </div>

                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <img src="../../resources/images/svg/si-glyph-lock-unlock.svg" style="width: 16px; height: 16px;" /> 
                                                </span>
                                            </div>
                                            <input type="password" class="form-control" placeholder="Confirme sua senha" minlength="6" required
                                                   name="passwordConfirmation">
                                        </div>

                                    </fieldset>

                                    <input type="submit" value="Criar conta" class="btn btn-block btn-success"/>
                                    <a class="btn btn-block btn-primary" href="index.php" >Ir para o login</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

</body>



<?php
require_once '../../components/footer.php';
?>