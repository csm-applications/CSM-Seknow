<?php
require_once '../../components/header.php';
require_once '../../components/head.php';
require_once '../../components/FilterUnauthorizedAcess.php';
require_once '../../components/navbar.php';
require_once '../../api/CallAPI.php';
require_once '../../model/AnswerData.php';
require_once '../../model/Answer.php';
require_once '../../model/Question.php';
require_once '../../model/UserAccount.php';
?>

<?php
$diagnostic = "";
$sections = "";
if (isset($_GET['diagnostic'])) {
    $diagnostic = json_decode(CallAPI("GET", "http://localhost:8080/diagnostics/" . $_GET['diagnostic']), true);
    $sections = json_decode(CallAPI("GET", "http://localhost:8080/questions/fromdiagnostic/" . $_GET['diagnostic']), true);
}


$sectionNumber = 0;

$answerDataToSend = Array();
if (isset($_GET['section'])) {
    $sectionNumber = intval($_GET['section']);
}


if (isset($_POST['action']) && $_POST['action'] == "saveAnswers") {
    unset($_POST['action']);

    foreach ($_POST as $key => $val) {
        $answer = new Answer();
        $answer->setIdAnswer($val);
        $question = new Question();
        $question->setIdQuestion($key);
        $userAccount = new UserAccount();
        $userAccount->setIdUserAccount($_SESSION['id_logged_user']);
        $data = new AnswerData(0, null, $answer, $question, null, $userAccount);
        array_push($answerDataToSend, $data);
    }
    CallAPI("POST", "http://localhost:8080/data", json_encode($answerDataToSend));

    if (isset($_GET['section']) && $_GET['section'] == -1) {
        echo($_SESSION['user_type']);
        if ($_SESSION['user_type'] == 'Manager') {
            echo("caso");
            header('location: ../dashboards/manager.php?message=Respostas cadastradas com sucesso!');
        } else {
            header('location: ../dashboards/user.php?message=Respostas cadastradas com sucesso!');
        }
    }else{
         header("location: qa.php?diagnostic=" . $diagnostic['idquestionnaire'] . "&section=" . isset($_GET['section']) ? $_GET['section'] : 0 );
    }
   
}
?>

<body class="application-background" >
    <div class="container-color container" style="padding-top: 1%;">

        <?php
        if (isset($_GET['message'])) {
            echo("<div class='alert alert-danger'>" . $_GET['message'] . "</div>");
        }
        ?>

        <h3 class="header-titles alert"><?= $diagnostic['name'] ?></h3>
        <p style="padding:3%;"><?= $diagnostic['description'] ?></p>

        <div style="text-align: center;">
            <?php for ($n = 0; $n < sizeof($sections); $n++) { ?>
                <a class="col-md-2" style="margin:1px; width: 100%;" href="qa.php?diagnostic=<?= $diagnostic['idquestionnaire'] ?>&section=<?= $n ?>" ><?= $sections[$n]['name'] ?></a>
            <?php } ?>
        </div>
        <div class="sectionsBox" >
            <form method="POST" action="qa.php?diagnostic=<?= $diagnostic['idquestionnaire'] ?>&section=<?php
            if ($sectionNumber == sizeof($sections) - 1) {
                echo(-1);
            } else {
                echo ($sectionNumber + 1);
            }
            ?>">
                <input type="hidden" name="action" value="saveAnswers"/>

                <div id="accordion"  style="margin-bottom: 3%;">
                    <?php
                    $section = $sections[$sectionNumber];
                    ?>

                    <div class="card">
                        <a class="btn btn-link" data-toggle="collapse" data-target="#collapse<?= $section['idSection'] ?>" aria-expanded="true" aria-controls="collapse<?= $section['idSection'] ?>">
                            <div class="card-header" id="heading<?= $section['idSection'] ?>">
                                <h5 class="mb-0">
                                    <?= $section['name'] ?>
                                </h5>
                            </div>
                        </a>

                        <div id="collapse<?= $section['idSection'] ?>" class="collapse show" aria-labelledby="heading<?= $section['idSection'] ?>" data-parent="#accordion">
                            <div class="card-body">
                                <?php
                                $questions = $section['questionList'];
                                foreach ($questions as $question) {
                                    ?>
                                    <div class="questionWrapper">
                                        <p><?= $question['question'] ?></p>
                                        <?php
                                        $groupofanswer = $question['groupofanswerList'];
                                        foreach ($groupofanswer[0]['answerList'] as $answer) {
                                            ?>
                                            <input  type="radio" required="true" name="<?php echo($question['idQuestion']); ?>" value="<?php echo($answer['idAnswer']); ?>"> <?php echo($answer['answer']); ?> 
                                        <?php } ?>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>


                </div>
                <input style="margin-bottom: 20px; background-color: #021f9a" type="submit" value="Salvar diagnóstico" class="btn btn-success form-control"/>
            </form>

        </div>
    </div>
</body>
<?php
require_once '../../components/footer.php';
?>