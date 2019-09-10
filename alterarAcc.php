<?php
session_start();

if(isset($_SESSION['logado'])){
  $dados[] =  $_SESSION['dadosUsu'];

}else{
    unset($_SESSION['dadosUsu']);
    session_destroy();
}


?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Primeiro cadastro</title>    
        <link rel="stylesheet" href="css/default.css">
        <!-- CSS PADRÃO -->
        <link href="css/default.css" rel=stylesheet>
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

        <!-- Telas Responsivas -->
        <link rel=stylesheet media="screen and (max-width:480px)" href="css/cssPrimeiroAcesso/style480.css">
        <link rel=stylesheet media="screen and (min-width:481px) and (max-width:768px)"
              href="css/cssPrimeiroAcesso/style768.css">
        <link rel=stylesheet media="screen and (min-width:769px) and (max-width:1024px)"
              href="css/cssPrimeiroAcesso/style1024.css">
        <link rel=stylesheet media="screen and (min-width:1025px)" href="css/cssPrimeiroAcesso/style1366.css">

    </head>
    <body>
        <div class="content">

            <header class="headerPrimeiroAcesso">
                <a href="alterarAcc.php"><img src="imagens/alteraImg.png"></a>
            </header>

            <main>
                <div class="acessoUm">
                    <!---PERGUNTAR SE O UPLOAD DE FOTOS É NECESSÁRIO-->
                    <h1>Bem vindo(a)!</h1>
                    <p>Por favor, confirme suas informações abaixo.</p>
                    <img src="imagens/avatar_test1.jpg">
                    <a href="#">
                        <img id="alteraFoto" src="imagens/alteraFoto.png">
                    </a>

                    <form class='form' method='post' action=''>
                        <label>Confirme seu nome:</label>
                        <input type="text" value="Fulano de tal">

                        <label>Altere seu email:</label>
                        <input type="email" value="email@gmail.com">
                        
                        <label>Confirme seu email:</label>
                        <input type="email" value="email@gmail.com">
                        
                        <label>Altere sua senha:</label>
                        <input type="password" value="12345">
                        
                        <label>Confirme sua senha:</label>
                        <input type="password" value="12345">

                    </form>

                    <?php
                    $nomeTipoUsu = $dados[0]['nomeTipoUsu'];
                    switch ($nomeTipoUsu) {
                        case 'Master':
                           echo "<a href='../cadastroDeInst/cadastroDeInst.php' class='buttonNext'>Proximo passo</a>";
                        break;

                        case 'Professor':
                           echo "<a href='perfilProfessor.php' class='buttonNext'>Ir para perfil</a>";
                        break;

                        case 'Saude':
                           echo "<a href='perfilSaude.php' class='buttonNext'>Ir para perfil</a>";
                        break;
                    
                    }

                    ?>
                    
                </div>
                
                
                
                <div class="acessDenied">
                    <img src="imagens/error.png">
                    <p>Ops! </p>
                    <span>Parece que o dispositivo usado não é compatível com o site!</span>
                </div>
            </main>    
    </body>
</html>