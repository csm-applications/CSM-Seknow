<?php
require_once '../../components/header.php';
require_once '../../components/FilterUnauthorizedAcess.php';
require_once '../../components/head.php';
require_once '../../components/navbar.php';
require_once '../../API/CallAPI.php';
?>

<?php
$showListOfYourEmployees = false;

if (isset($_GET['toHire'])) {
    $yourEmployees = json_decode(CallAPI("GET", "http://localhost:8080/companies/employees/" . $_GET['toHire']), true);
    $showListOfYourEmployees = true;
}
if (isset($_GET['filter']) && ($_GET['filter'] != null || $_GET['filter'] != "")) {
    $allUsers = json_decode(CallAPI("GET", "http://localhost:8080/users/filterbyname/" . urlencode($_GET['filter'])), true);
} else {
    $allUsers = json_decode(CallAPI("GET", "http://localhost:8080/users/"), true);
}

if (isset($_POST['action']) && $_POST['action'] == 'fireUser') {
    $userToFire = json_decode(CallAPI("GET", "http://localhost:8080/users/" . $_POST['userToFire']), true);
    $userToFire['companyId'] = null;
    json_decode(CallAPI("PUT", "http://localhost:8080/users/", json_encode($userToFire)), true);
    header("location: employees.php?toHire=" . $_GET['toHire']);
}

if (isset($_POST['action']) && $_POST['action'] == 'admitUser') {
    $userToFire = json_decode(CallAPI("GET", "http://localhost:8080/users/" . $_POST['userToAdmit']), true);
    $userToFire['companyId'] = intval($_GET['toHire']);
    json_decode(CallAPI("PUT", "http://localhost:8080/users/", json_encode($userToFire)), true);
    header("location: employees.php?toHire=" . $_GET['toHire']);
}
?>

<body class="application-background" >
    <div class="container-color container" style="padding: 1%;">
        <h3 class="header-titles alert">Invite employees</h3>
       
        <?php if ($showListOfYourEmployees) { ?>

            <div class="jumbotron">
                <h3 class="alert alert-dark">Your employees</h3>
                <div style="padding:20px;">
                    <table class="table table-hover table-bordered">
                        <tr>
                            <th>Employee Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Company</th>
                            <th>Actions</th>
                        </tr>
                        <?php foreach ($yourEmployees as $emp) { ?>
                            <tr>
                                <td> <?= $emp['nome'] ?> </td>
                                <td ><?= $emp['email'] ?> </td>
                                <td ><?= $emp['phone'] ?> </td>
                                <td ><?= $emp['companyId']['name'] ?> </td>
                                <td > 
                                    <form action="employees.php?toHire=<?= $_GET['toHire'] ?>" method="POST">
                                        <input type="hidden" name="action" value="fireUser"/>
                                        <input type="hidden" name="userToFire" value="<?= $emp['idUserAccount'] ?>"/>
                                        <input type="image" src="../../resources/images/svg/si-glyph-trash.svg" width="20" height="20"/>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>

        <?php } ?>
        <div class="jumbotron">
            <h3 class="alert alert-dark">All users</h3>
            <form action="employees.php" method="GET">
                <input type="hidden" name="toHire" value="<?= $_GET['toHire'] ?>"/>
                <div class="row">
                    <div class="col-md-10">
                        <input class="form-control" placeholder="Type a name to filter" name="filter"/>
                    </div>
                    <div class="col-md-2">
                        <input class="btn btn-primary" type="submit" value="search"/>
                    </div>
                </div>
            </form>
            <div style="padding:20px;">
                <table class="table table-hover table-bordered">
                    <tr>
                        <th>Employee name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Company</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach ($allUsers as $emp) { ?>
                        <tr>
                            <td> <?= $emp['nome'] ?> </td>
                            <td ><?= $emp['email'] ?> </td>
                            <td ><?= $emp['phone'] ?> </td>
                            <td ><?= $emp['companyId']['name'] ?> </td>
                            <td style="text-align: center"> 
                                <form action="employees.php?toHire=<?= $_GET['toHire'] ?>" method="POST">
                                    <input type="hidden" name="action" value="admitUser"/>
                                    <input type="hidden" name="userToAdmit" value="<?= $emp['idUserAccount'] ?>"/>
                                    <input type="image" src="../../resources/images/svg/si-glyph-person-plus.svg" width="20" height="20"/>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>

        <?php
        if (isset($_POST['sendMail']) && $_POST['sendMail'] == 'true') {

            $name = $_POST['name'];
            $to = $_POST['email'];
            $message = $_POST['message'];
            if (isset($_GET['toHire']))
                $toHire = $_GET['toHire'];

            require '../../PHPmailer/PHPMailer.php';
            require '../../PHPmailer/SMTP.php';
            require '../../PHPmailer/Exception.php';


            $mail = new PHPMailer\PHPMailer\PHPMailer;
            $subject = "[SEKNOW] " . $name . " Invitation for you!";
            $content = "<b>Hello " . $name . "!.</b>"
                    . "<p>Boss message: $message</p>"
                    . "<p> You were invitated to join SEKNOW and diagnose the knowledge management actions adopted in your company.</p>"
                    . "<p> click on <a href='http://localhost/DiagnoseYourSoftwareFactory/view/registration/user.php?toHire=$toHire'> this link </a> to sign up</p>";
            $mail->IsSMTP();
            $mail->charSet = "UTF-8";
            $mail->Encoding = 'base64';
            $mail->SMTPDebug = 0;
            $mail->SMTPAuth = TRUE;
            $mail->SMTPSecure = "tls";
            $mail->Port = 587;
            $mail->Username = "contato.csmaster@gmail.com";
            $mail->Password = "vinnystos90";
            $mail->Host = "smtp.gmail.com";
            $mail->Mailer = "smtp";
            $mail->SetFrom("contato.csmaster@gmail.com", "Seknow");
            $mail->AddReplyTo("contato.csmaster@gmail.com", "Seknow");
            $mail->AddAddress($to);
            $mail->Subject = $subject;
            $mail->WordWrap = 80;
            $mail->MsgHTML($content);
            $mail->IsHTML(true);

            if (!$mail->Send()) {
                $msge = "<div class='alert alert-danger'>Failed sending mail!</div>";
            } else {
                $msge = "<div class='alett alert-sucess'>Mail sent</div>";
                echo $msge;
            }
        }
        ?>
        <div class = "jumbotron " style = "margin: 20px">
            <h2 class="header-subtitles">E-mail invitation</h2>
            <div >
                <form action="employees.php?toHire=<?=$_GET['toHire']?>" method="POST">

                    <h5>Please fill in your employee information.</h5>
                    <div style="margin:15px"> You can invite your employees to participate in the diagnostic management system via email. By completing the form below an email will be sent to your employee containing a link. When the employee makes his registration will be already part of your company.</div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="name" placeholder="Name"/>
                        <input class="form-control" type="text" name="email" placeholder="E-mail"/>
                        <textarea class="form-control" name="message" placeholder="Type a frendly message to your employee"></textarea>
                        <input type="hidden" name="sendMail" value="true"/>
                    </div>
                    <input class="btn btn-primary form-control" type="submit" value="Send invitation"/>

                </form>
            </div>
        </div>






        <div class = "jumbotron " style = "margin: 20px">
            <h2 class="header-subtitles">Link sharing</h2>
            <div style="margin:15px">To invite an employee send the following link:</div>
            <div class="row">
                <input id="urlInput" class="form-control col-md-10" type="text" value="http://localhost/DiagnoseYourSoftwareFactory/view/registration/user.php?toHire=<?= $_GET['toHire'] ?>"/>
                <button class="btn btn-primary col-md-2" onclick="myFunction()">Copy text</button>
            </div>
        </div>

        <script>
            function myFunction() {
                /* Get the text field */
                var copyText = document.getElementById("urlInput");

                /* Select the text field */
                copyText.select();

                /* Copy the text inside the text field */
                document.execCommand("copy");

                /* Alert the copied text */
                alert("Copied the text: " + copyText.value);
            }
        </script>




    </div>
</body>

<?php
require_once '../../components/footer.php';
?>