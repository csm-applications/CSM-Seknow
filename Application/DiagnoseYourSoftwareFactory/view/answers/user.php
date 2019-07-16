<?php
require_once '../../components/header.php';
require_once '../../components/FilterUnauthorizedAcess.php';
require_once '../../components/head.php';
require_once '../../components/navbar.php';
require_once '../../API/CallAPI.php';
?>

<?php
$answerData = json_decode(CallAPI("GET", "http://localhost:8080/data/fromuser/" . $_SESSION['id_logged_user']), true);



if (isset($_POST['action']) && $_POST['action'] == "deleteAnswer") {
    json_decode(CallAPI("DELETE", "http://localhost:8080/data/" . $_POST['answerToDelete']), true);
    header("location: user.php");
}
?>

<body class="application-background" >
    <div class="container-color container" style="padding: 1%;">
        <h3 class="header-titles alert alert-info" >Respostas</h3>
        <div style="margin: 50px">Revise aqui as respostas dadas no questionário de diagnóstico. Essas respostas estão armazenadas na base de dados e compõem também o 
            diagnóstico da sua empresa.</div>

        <?php if (!empty($answerData)) { ?>
            <div class="employee-frame" >
                <table class="table table-hover table-bordered">
                    <tr class="header-tables">
                        <th>Questão</th>
                        <th>Resposta</th>
                        <th>Seção</th>
                        <th>Ações</th>
                    </tr>
                    <?php foreach ($answerData as $ans) {
                        ?>
                        <tr>
                            <td><?= $ans['question']['question'] ?></td>
                            <td><?= $ans['answer']['answer'] ?></td>
                            <td> <?= $ans['section']['name'] ?> </td>
                            <td>
                                <div class="row" style="text-align: center">
                                    <div class="col-md-12">
                                        <form action="user.php" method="POST">
                                            <input type="hidden" name="action" value="deleteAnswer"/>
                                            <input type="hidden" name="answerToDelete" value="<?= $ans['idAnswerData'] ?>"/> 
                                            <input type="image" src="../../resources/images/svg/si-glyph-trash.svg" width="20" height="20"/>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>

                </table>
            </div>
        <?php
        } else {
            echo('<div class="alert alert-danger">Não existem respostas cadastradas ainda</div>');
        }
        ?>
    </div>
</body>

<?php
require_once '../../components/footer.php';
?>