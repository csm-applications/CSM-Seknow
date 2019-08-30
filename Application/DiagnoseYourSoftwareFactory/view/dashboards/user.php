<?php
require_once '../../components/header.php';
require_once '../../components/head.php';
require_once '../../components/FilterUnauthorizedAcess.php';
require_once '../../components/navbar.php';
require_once '../../api/CallAPI.php';
?>

<body class="application-background" >
    <?php
    if(isset($_SESSION['idCompany']) && $_SESSION['idCompany'] != null){
        $diagnosticos = json_decode(CallAPI("GET", "http://localhost:8080/companies/diagnostics/" . $_SESSION['idCompany']), true);
    }
    
    if (empty($diagnosticos)) {
        echo '<div class="alert alert-warning">No diagnostics avaliable</div>';
    } else {
        ?>
        <div class="container container-color" style="padding:20px;">
            <?php if (isset($_GET['message'])) {
                echo('<div class="alert alert-danger">' . $_GET['message'] . '</div>');
            } ?>
            <div class="row" style="padding:10px">
    <?php foreach ($diagnosticos as $diag) { ?>
                    <a class="col-md-12" style="text-decoration: none" href="../diagnostics/qa.php?section=0&diagnostic=<?= $diag['idquestionnaire'] ?>">
                        <div class="list-view">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="../../resources/images/survey.png" width="200" height="200"/>
                                </div>
                                <div class="col-md-9">
                                    <h3 class="header-subtitles alert"><?php echo($diag['name']) ?></h3>
                                    <p style="margin-top: 45px; font-size: 20px"><?php echo($diag['description']) ?></p>
                                </div>
                            </div>
                        </div>
                    </a>
    <?php } ?>
            </div>


    <?php }
?>

</body>

<?php
require_once '../../components/footer.php';
?>