<nav class="navbar navbar-expand-md navbar-dark" style="background-color: #0f4c89">
    <img src="/DiagnoseYourSoftwareFactory/resources/images/seknow.png" style="width:60px; height: 60px;"/>

    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">

            <?php
            if ($_SESSION['user_type'] == "Manager") {
                echo('<li class="nav-item active">
                    <a class="nav-link" href="/DiagnoseYourSoftwareFactory/view/dashboards/manager.php"> Início </a>
                </li>');
            } else {
                echo('<li class="nav-item active">
                    <a class="nav-link" href="/DiagnoseYourSoftwareFactory/view/dashboards/user.php"> Início </a>
                </li>');
            }
            ?>
            <?php
            if ($_SESSION['user_type'] == "Manager") {
                echo('<li class="nav-item active">
                    <a class="nav-link" href="/DiagnoseYourSoftwareFactory/view/reports/manager.php"> Relatórios </a>
                </li>');
            }
            ?>
            <li class="nav-item active">
                <a class="nav-link" href="/DiagnoseYourSoftwareFactory/view/answers/user.php"> Respostas </a>
            </li>
            <?php
            if ($_SESSION['user_type'] == "Manager") {
                echo('<li class="nav-item active">
                    <a class="nav-link" href="/DiagnoseYourSoftwareFactory/view/answers/employees.php"> Funcionários</a>
                </li>');

                echo('<li class="nav-item active">
                    <a class="nav-link" href="/DiagnoseYourSoftwareFactory/view/registration/company.php"> Empresas </a>
                </li>');
            }
            ?>
            <li class="nav-item active">
                <a class="nav-link" href="/DiagnoseYourSoftwareFactory/view/contato.php"> Contato </a>
            </li>
        </ul>
        <?php
        echo('<span style="color:#fff; margin-right:10px;">Olá, ' . $_SESSION['logged_user'] . '</span>');
        if (isset($_POST['action']) && $_POST['action'] == "logout") {
            session_destroy();
            header("location: /DiagnoseYourSoftwareFactory/index.php");
        }
        ?>
        <form action="" method="POST" class="form-inline my-2 my-lg-0">
            <input type="hidden" name="action" value="logout" class="form-control mr-sm-2">
            <button  type="submit" class="btn btn-danger" title="Sair">
                <img width="25px" height="25px"  src="/DiagnoseYourSoftwareFactory/resources/images/svg/si-glyph-turn-off.svg" />

            </button>
        </form>
    </div>
</nav>