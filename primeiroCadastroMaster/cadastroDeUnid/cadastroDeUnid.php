<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Primeiro cadastro</title>    
        <link rel="stylesheet" href="../css/default.css">    
        <script src='../js/jquery-3.3.1.min.js'></script>
        <!-- CSS PADRÃO -->
        <link href="css/default.css" rel=stylesheet>
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

        <!-- Telas Responsivas -->
        <link rel=stylesheet media="screen and (max-width:480px)" href="../css/style480.css">
        <link rel=stylesheet media="screen and (min-width:481px) and (max-width:768px)"
              href="../css/style768.css">
        <link rel=stylesheet media="screen and (min-width:769px) and (max-width:1024px)"
              href="../css/style1024.css">
        <link rel=stylesheet media="screen and (min-width:1025px)" href="../css/style1366.css">


        <style>
            
            .headerPrimeiroAcesso a:nth-child(4){
                display:none;
            }
            .headerPrimeiroAcesso a:nth-child(5){
                display:none;
            }
            .headerPrimeiroAcesso a:nth-child(6){
                display:none;
            }
        </style>

    </head>
    <body>
        <div class="content">

            <header class="headerPrimeiroAcesso">
            <a href="../alterarAcc/alterarAcc.php"><img src="../img/alteraImg.png"></a>
            <a href="../cadastroDeInst/index.php"><img src="../img/instImg.png"></a>
            <a href="../cadastroDeInst/index.php"><img src="../img/unidImg.png"></a>
            <a href="../cadastroDeDir/cadastroDir.php"><img src="../img/dirImg.png"></a>
            <a href="../enviarEmail.php"><img src="../img/emailImg.png"></a>                
            <a href="../confirmarDados.php"><img src="../img/confirmaImg.png"></a>


            </header>

            <main>
                <div class="acessoUm">



                    <img src="../img/avatar_test.jpg">
                    <p>Cadastre as unidades de sua instituição:</p>
                    <form class='form' method='post' action=''>
                        
                        <label>Unidades de ensino:</label>
                        <input class='unid' id='visor' name='unid' type='text' />
                        <input name='enviar' id="plus" value="+" type='submit'>>
                    </form>

                    <a href='../cadastroDeInst/cadastroDeInst.php' class="buttonNext">Voltar</a>
                    <a href='../cadastroDeDir/cadastroDeDir.php' class="buttonNext">Proximo passo</a>
            </main>    
    </body>
</html>