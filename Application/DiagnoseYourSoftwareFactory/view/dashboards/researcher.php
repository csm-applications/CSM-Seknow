<?php
require_once '../../components/header.php';
require_once '../../components/head.php';
require_once '../../components/FilterUnauthorizedAcess.php';
require_once '../../components/navbar.php';
require_once '../../api/CallAPI.php';
?>

<body class="application-background" >
    <div class="container container-color" style="padding:20px" >

        <h3 class="header-titles alert">  Researcher Area</h3>
        <div style="margin: 30px"> Here you researcher finds information for your knowledge management research in software companies. You will be able to download the diagnostic data and access a general report of the registered companies.</div>


        <div class="jumbotron" style="background-color: #fafafa;" >
            <h3>Download data</h3>

            <div class="row">
                <div class="col-md-6">
                    <div class="card ">
                        <div class="card-img" style="text-align: center; margin: 10px;">
                            <img src="../../resources/images/excel.png" width="150" height="150"/>
                        </div>
                        <h4 class="card-header bg-primary" style="color:#fff; text-align: center;">
                            Download in XLSX
                        </h4>
                        <div class="card-body">
                            Download our data directly in Excel format
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card ">
                        <div class="card-img" style="text-align: center; margin: 10px">
                            <img src="../../resources/images/csv.svg" width="150" height="150"/>
                        </div>
                        <h4 class="card-header bg-primary" style="color:#fff; text-align: center;">
                            Download in CSV
                        </h4>
                        <div class="card-body">
                            Download our data directly from CSV
                        </div>
                    </div>
                </div>
            </div>

        </div>

</body>

<?php
require_once '../../components/footer.php';
?>