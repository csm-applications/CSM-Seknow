<?php
require_once '../../components/header.php';
require_once '../../components/FilterUnauthorizedAcess.php';
require_once '../../components/head.php';
require_once '../../components/navbar.php';
require_once '../../API/CallAPI.php';
?>

<?php
$myCompanies = json_decode(CallAPI("GET", "http://localhost:8080/users/companies/" . $_SESSION['id_logged_user']), true);
?>

<body class="application-background" >
    <div class="container-color container" style="padding: 1%;">
        <h3 class="header-titles alert alert-info ">Employees Answers</h3>
        <div style="text-align: center; padding: 30px">Here you, the manager, can review the answers given by employees and seek to improve their view on knowledge management according to the perception of their employees.</div>

        <?php if (!empty($myCompanies)) { ?>
            <div class="questionWrapper">
                <?php foreach ($myCompanies as $company) { ?>

                    <h4 class="header-subtitles alert alert-dark"> <?= $company['name'] ?></h4>
                    <?php
                    $employees = json_decode(CallAPI("GET", "http://localhost:8080/companies/employees/" . $company['idCompany']), true);
                    if (empty($employees)) {
                        echo("<div class='alert alert-danger'>No employees assigned to this company</div>");
                    }
                    foreach ($employees as $employee) {
                        ?>
                        <div class="employee-frame">
                            <h5 class="alert alert-info" >
                                <img src="../../resources/images/svg/si-glyph-person.svg" width="24" height="24"/>
                                <?= $employee['nome'] ?>
                            </h5>
                            <?php $answerData = json_decode(CallAPI("GET", "http://localhost:8080/data/fromuser/" . $employee['idUserAccount']), true);
                            ?>
                            <table class="table table-hover table-bordered" style="background-color: #fff;">
                                <tr class="header-tables">
                                    <th>Questions</th>
                                    <th>Answer</th>
                                    <th>Section</th>
                                </tr>
                                <?php foreach ($answerData as $ans) { ?>
                                    <tr>
                                        <td><?= $ans['question']['question'] ?></td>
                                        <td class="center"><?= $ans['answer']['answer'] ?></td>
                                        <td> <?= $ans['section']['name'] ?> </td>

                                    </tr>
                                <?php } ?>

                            </table>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        <?php }else{
            echo('<div class="alert alert-danger"> You don\'t have any registered companies </div>');
        } ?>
    </div>
</body>

<?php
require_once '../../components/footer.php';
?>