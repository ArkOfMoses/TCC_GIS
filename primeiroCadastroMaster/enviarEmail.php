<?php
session_start();
if(isset($_SESSION['logado'])){
    $dados =  $_SESSION['dadosUsu'];
}else{
    unset($_SESSION['dadosUsu']);
    unset($_SESSION['logado']);
    session_destroy();
    header("Location: homeLandingPage.php");
}

require_once '../PHPMailer/src/PHPMailer.php';
require_once '../PHPMailer/src/SMTP.php';
require_once '../functions/PHPMailer.php';
use PHPMailer\PHPMailer\PHPMailer;
$msg = array();

if(isset($_SESSION['EmailDirs'])){
    if(isset($_POST['enviado'])){

        $arraySession = $_SESSION['EmailDirs'];
        $PHPMailer = new PHPMailer();
        $testEnviar = PHPMailerList($PHPMailer, $arraySession);

        if($testEnviar === true){
            unset($_SESSION['EmailDirs']);
            $msg[] = "todas os emails foram enviados corretamente";
        }else{
            for($n = 0; $n < count($testEnviar) ; $n++){
                $msg[] = $testEnviar[$n];
            }
        }
    }
}else{
    //algo deu errado no passo anterior
}

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Primeiro cadastro</title>    
        <link rel="stylesheet" href="../css/default.css">    
        <script src='../js/jquery-3.3.1.min.js'></script>
        <!-- CSS PADRÃO -->
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

        <!-- Telas Responsivas -->
        <link rel=stylesheet media="screen and (max-width:480px)" href="../css/cssCadastroMaster/style480.css">
        <link rel=stylesheet media="screen and (min-width:481px) and (max-width:768px)"
              href="../css/cssCadastroMaster/style768.css">
        <link rel=stylesheet media="screen and (min-width:769px) and (max-width:1024px)"
              href="../css/cssCadastroMaster/style1024.css">
        <link rel=stylesheet media="screen and (min-width:1025px)" href="../css/cssCadastroMaster/style1366.css">

<!-- <style>
            
            .headerPrimeiroAcesso a:nth-child(5){
                display:none;}
            .headerPrimeiroAcesso a:nth-child(6){
                display:none;
            }
        </style> -->
    </head>
    <body>
        <div class="content">

            <header class="headerPrimeiroAcesso">
            <!-- <a href="alterarAcc/alterarAcc.php"><img src="img/alteraImg.png"></a>
            <a href="cadastroDeInst/cadastroDeInst.php"><img src="img/instImg.png"></a>
            <a href="cadastroDeUnid/cadastroDeUnid.php"><img src="img/unidImg.png"></a>
            <a href="cadastroDeDir/cadastroDir.php"><img src="img/dirImg.png"></a> -->
            <a href="enviarEmail.php"><img src="img/emailImg.png"></a>                
            <!-- <a href="confirmarDados.php"><img src="img/confirmaImg.png"></a> -->


            </header>

            <main>
                <div class="acessoUm">
                    <h1>Tudo pronto por agora!</h1>
                    <p>Envie um email com o login para os diretores poderem 
                        entrar e realizar seu trabalho alterando as 
                        configurações necessárias, cadastrando funcionários, alunos e etc.</p>
                        <a href='cadastroDeDir/cadastroDeDir' class="buttonNext">Voltar</a>

                    <form method="post" >
                        <input type="submit" name="enviado" value="Enviar email" />
                        <?php
                        if(!empty($msg)){
                            foreach ($msg as $key => $value) {
                                echo "<p>$value</p>";
                            }
                        }
                        ?>
                    </form>
                        <!-- <a href='cadastroDeDir/cadastroDeDir' class="buttonNext">Voltar</a> -->
                    <a href='' class="buttonNext">Enviar email</a>
                    <a href='confirmarDados.php' class="buttonNext">Proximo passo</a>
                </div>
            </main>    
    </body>
</html>