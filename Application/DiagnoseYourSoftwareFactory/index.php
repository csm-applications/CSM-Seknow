
<?php
require_once 'components/header.php';
require_once 'components/head.php';
require_once './api/CallAPI.php';
session_start();
?>

<?php
if (isset($_POST['email']) && isset($_POST['password'])) {
    session_destroy();
    session_start();
    $toCompare = json_decode(CallAPI("GET", "http://localhost:8080/users/findbyemail/" . $_POST['email']), true);
    if ($_POST['email'] == null || $_POST['password'] == null) {
        header("location: index.php?message=Informe o usuário e senha");
    } else {

        if (isset($toCompare['email']) && $toCompare['password'] == $_POST['password']) {
            $_SESSION['logged_user'] = $toCompare['email'];
            $_SESSION['id_logged_user'] = $toCompare['idUserAccount'];
            $_SESSION['user_type'] = $toCompare['userType']['name'];
            if ($toCompare['usertype']['name'] == 'Manager') {
                header("location: view/dashboards/manager.php");
            }else{
                header("location: view/dashboards/user.php");
            }
        } else {
            header("location: index.php?message=Usuário ou senha incorreta!");
        }
    }
}
?>

<body class="application-background">

    <div class="app-body">
        <main class="main d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <div class="card-group">
                            <div class="card text-white bg-primary py-5 register">
                                <div class="card-body text-center">
                                    <div>
                                        <h2>Cadastrar</h2>
                                        <p>Faça o diagnóstico de conhecimento de sua empresa!</p>
                                        <a href="view/registration/user.php" class="btn btn-primary active mt-5" >
                                            Cadastre agora!
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card p-4">
                                <div class="card-body">
                                    <?php
                                    if (isset($_GET['message'])) {
                                        echo("<div class='alert alert-danger'>" . $_GET['message'] . "</div>");
                                    }
                                    ?>
                                    <form action="index.php" method="POST">
                                        <h1>Login</h1>
                                        <p class="text-muted">Entrar em sua conta</p>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <img src="resources/images/svg/si-glyph-mail.svg" style="width: 16px; height: 16px;" /> 
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Email" name="email" >
                                        </div>
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <img src="resources/images/svg/si-glyph-lock-unlock.svg" style="width: 16px; height: 16px;" /> 
                                                </span>
                                            </div>
                                            <input type="password" class="form-control" placeholder="Senha" name="password" >
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="submit" class="btn btn-primary px-4"  value="Entrar">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>


</body>



<?php
require_once 'components/footer.php';
?>