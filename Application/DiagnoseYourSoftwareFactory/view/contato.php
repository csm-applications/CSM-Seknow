<?php
require_once '../components/header.php';
require_once '../components/FilterUnauthorizedAcess.php';
require_once '../components/head.php';
require_once '../components/navbar.php';
?>


<body class="application-background">
    <div class="container-color container" style="padding:20px;">
        <h1  class="header-titles alert alert-success" >Obrigado!</h1>
        <div style="padding: 30px;">
            <p style="text-align: justify">
                A gestão de conhecimento é muito importante para consolidar os conhecimentos adquiridos pelas empresas e criar uma política onde os funcionários evoluem
                com a experiências de todos. Gerir conhecimento é antes de tudo uma forma de ganhar vantagem competitiva diante de fábricas de software onde a cada troca de time o conhecimento adquirido
                pelos membros se perde.
            </p>
            <p style="text-align: justify">
                Este software foi desenvolvido pelo grupo de pesquisa de Gestão de conhecimento e Engenharia de Software da UTFPR-CP. O grupo de pesquisa
                é composto pelos pesquisadores:
            </p>
        </div>


        <div class="row">
            <div class="col-md-5" style="margin: 30px">
                <div class="row">
                    <div class="col-md-4">
                        <img src="../resources/images/vinicius.jpg" height="150" width="150">
                    </div>
                    <div class="col-md-8" >
                        <h3>Vinicius dos Santos</h3>
                        <div>Pesquisador da área de Processamento de Linguagem Natural doutorando do ICMC</div>
                        <div>E-mail: vinistos@gmail.com</div>
                        <div>website: <a href="http://www.computersciencemaster.com.br">Computer Science Master</a></div>
                    </div>
                </div>
            </div>
            <div class="col-md-5" style="margin:30px">
                <div class="row">
                    <div class="col-md-4">
                        <img src="../resources/images/erica.jpeg" height="150" width="150">
                    </div>
                    <div class="col-md-8">
                        <h3>Érica Ferreira de Souza</h3>
                        <div>Pesquisadora da área de Teste de Software e Gestão de conhecimento Doutora pelo INPE</div>
                        <div>E-mail: ericaferrso@gmail.com</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


<?php
require_once '../components/footer.php';
?>