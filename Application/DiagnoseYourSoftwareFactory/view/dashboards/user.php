<?php
require_once '../../components/header.php';
require_once '../../components/head.php';
require_once '../../components/FilterUnauthorizedAcess.php';
require_once '../../components/navbar.php';
require_once '../../api/CallAPI.php';
?>

<?php
$diagnosticos = json_decode(CallAPI("GET", "http://localhost:8080/diagnostics"), true);
?>
<body class="application-background" >
    <div class="container container-color" style="padding:20px;">
        <?php if(isset($_GET['message'])){ echo('<div class="alert alert-danger">' . $_GET['message'] . '</div>');}?>
         <div class="row" style="padding:10px">
            <?php foreach ($diagnosticos as $diag) { ?>
            <a class="col-md-12" style="text-decoration: none" href="../diagnostics/qa.php?diagnostic=<?=$diag['idquestionnaire']?>">
                <div class="list-view">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="../../resources/images/survey.png" width="200" height="200"/>
                            </div>
                            <div class="col-md-8">
                                <h3 class="header-subtitles alert"><?php echo($diag['name']) ?></h3>
                                <p><?php echo($diag['description']) ?></p>
                            </div>
                        </div>
                </div>
            </a>
            <?php } ?>
        </div>
</body>


<?php
require_once '../../components/footer.php';
?>