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
        <h3 class="header-titles alert alert-info" >Answers</h3>
        <div style="margin: 20px; text-align: center">Review here the answers given in the diagnostic questionnaire. These answers are stored in the database and also make up that of your company.</div>

        <?php if (!empty($answerData)) { ?>
            <div class="employee-frame" >
                <table class="table center table-hover table-bordered" style="background-color: #fff;">
                    <tr class="header-tables">
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Section</th>
                        <th>Actions</th>
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
            echo('<div class="center alert alert-primary">There are no replies registered yet</div>');
        }
        ?>
    </div>
</body>

<?php
require_once '../../components/footer.php';
?>