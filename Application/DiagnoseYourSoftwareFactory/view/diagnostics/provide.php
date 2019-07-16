<?php
require_once '../../components/header.php';
require_once '../../components/head.php';
require_once '../../components/FilterUnauthorizedAcess.php';
require_once '../../components/navbar.php';
?>

<?php
    if(isset($_POST['action']) && $_POST['action'] == 'provideDiagnostic'){
        header("Location: ../dashboards/manager.php");
    }
?>

<body class="application-background" >
    <div class="container-color container" style="padding-top: 1%;">

        <?php
        if (isset($_GET['message'])) {
            echo("<div class='alert alert-danger'>" . $_GET['message'] . "</div>");
        }
        ?>

        <h3 class="header-titles alert">Diagnosticos disponibilizados</h3>

        <div style="text-align: justify; padding: 20px;">
            Aqui você poderá realizar a disponibilização de diagnósticos para seus funcionários. 
            Assim que um diagnóstico for disponibilizado, seus funcionários poderão responder as 
            questões e ao encerrar o acesso você poderá acessar o relatório de respostas.
        </div>

        <div class="row">
            <div style="margin: 50px; margin-left: 25%;  padding: 20px; background-color: #fff" class="col-md-6">
                <h4 class="center" style="margin-bottom:25px;">Disponibilize o diagnostico</h4>
                <form class="form-group" method="POST">
                    <input type="hidden" name="action" value="provideDiagnostic">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <img src="../../resources/images/svg/si-glyph-badge-name.svg" style="width: 16px; height: 16px;" /> 
                            </span>
                        </div>
                        <select class="form-control">
                            <option>Selecione uma Empresa</option>
                            <option>Facebook</option>
                            <option>Instagram</option>
                            <option>X-brain</option>
                        </select>

                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <img src="../../resources/images/svg/si-glyph-calendar-3.svg" style="width: 16px; height: 16px;" /> 
                            </span>
                        </div>
                        <input type="text" placeholder="Data de Início do diagnóstico" onfocus="(this.type = 'date')"  class="form-control"/>

                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <img src="../../resources/images/svg/si-glyph-calendar-3.svg" style="width: 16px; height: 16px;" /> 
                            </span>
                        </div>
                        <input type="text" placeholder="Data da finalização do diagnóstico" onfocus="(this.type = 'date')"  class="form-control"/>

                    </div>
                    
                    <div class="input-group mb-3">
                        
                        <input type="submit" class="btn btn-primary col-md-12" value="Disponibilizar"/>
                    </div>

                </form>
            </div>
        </div>


    </div>
</body>
<?php
require_once '../../components/footer.php';
?>