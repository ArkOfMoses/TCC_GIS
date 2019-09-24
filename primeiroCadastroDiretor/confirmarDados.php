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
        <link rel=stylesheet media="screen and (max-width:480px)" href="css/style480.css">
        <link rel=stylesheet media="screen and (min-width:481px) and (max-width:768px)"
              href="css/style768.css">
        <link rel=stylesheet media="screen and (min-width:769px) and (max-width:1024px)"
              href="css/style1024.css">
        <link rel=stylesheet media="screen and (min-width:1025px)" href="css/style1366.css">


    </head>
    <body>
        <div class="content">

            <header class="headerPrimeiroAcesso">
                    <a href="../alterarAcc/alterarAcc.php"><img src="../img/alteraImg.png"></a>
                    <a href="cadastroDeFuncionarios/cadastroDir.php"><img src="../img/dirImg.png"></a>
                    <a href="../confirmarDados.php"><img src="../img/confirmaImg.png"></a>
                    <a href="../enviarEmail.php"><img src="../img/emailImg.png"></a>


                </header>

            <main>
                <div class="acessoUm">
                    <!---PERGUNTAR SE O UPLOAD DE FOTOS É NECESSÁRIO-->
                    <h1>Cadastro concluído!</h1>
                    <p>Por favor, confirme suas informações abaixo.</p>
                    <img src="img/avatar_test.jpg">
                    

                    <form class='form' method='post' action=''>
                        <h2>Instituição</h2>
                        
                        <h3>Unidade:</h3>

                        <label>Confirme o diretor:</label>
                        <input type="text" value="Nome do diretor">
                        
                        <label>Confirme o email do diretor:</label>
                        <input type="email" value="email@gmail.com">
                        
                        <label>Confirme a senha:</label>
                        <input type="password" value="12345">
                       
                    </form>
                    
                    <a href='cadastroDeFuncionarios/cadastroDeFuncionarios.php' class="buttonNext">Voltar</a>
                    <a href='enviarEmail.php' class="buttonNext">Próximo</a>
                </div>
                    
                    
                    
                
            </main>    
    </body>
</html>

