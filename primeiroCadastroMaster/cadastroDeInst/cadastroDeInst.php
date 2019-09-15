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
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Primeiro cadastro</title>    
        <link rel="stylesheet" href="../../css/default.css">    
        <script src='../js/jquery-3.3.1.min.js'></script>
        <!-- CSS PADRÃO -->
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

        <!-- Telas Responsivas -->
        <link rel=stylesheet media="screen and (max-width:480px)" href="../../css/cssCadastroMaster/style480.css">
        <link rel=stylesheet media="screen and (min-width:481px) and (max-width:768px)"
              href="../../css/cssCadastroMaster/style768.css">
        <link rel=stylesheet media="screen and (min-width:769px) and (max-width:1024px)"
              href="../../css/cssCadastroMaster/style1024.css">
        <link rel=stylesheet media="screen and (min-width:1025px)" href="../../css/cssCadastroMaster/style1366.css">

        
        <!-- <style>
            .headerPrimeiroAcesso a:nth-child(3){
                display:none;
            }
            .headerPrimeiroAcesso a:nth-child(4){
                display:none;
            }
            .headerPrimeiroAcesso a:nth-child(5){
                display:none;
            }
            .headerPrimeiroAcesso a:nth-child(6){
                display:none;
            }
        </style> -->

        <script src='../../js/jquery-3.3.1.min.js'></script>
        <script>
          $(function(){
              $('.form').submit(function(){
                  $.ajax({
                      url: 'cod_cadastroInst.php',
                      type: 'POST',
                      data: $('.form').serialize(),
                      success: function(data){
                          if(data != ''){
                              $('.recebeDados').html(data);
    
                          }
                      }
                  });
                  return false;
              });
          });
      </script>
    </head>
    <body>
        <div class="content">

            <header class="headerPrimeiroAcesso">
            <!-- <a href="../../alterarAcc.php"><img src="../img/alteraImg.png"></a> -->
            <a href="cadastroDeInst.php"><img src="../img/instImg.png"></a>
            <!-- <a href="../cadastroDeUnid/cadastroDeUnid.php"><img src="../img/unidImg.png"></a>
            <a href="../cadastroDeDir/cadastroDir.php"><img src="../img/dirImg.png"></a>
            <a href="../enviarEmail.php"><img src="../img/emailImg.png"></a>                
            <a href="../confirmarDados.php"><img src="../img/confirmaImg.png"></a>-->

            </header>

            <main>
                <div class="acessoUm">
                    
                    <h1>Bem vindo(a)!</h1>
                    <p>Este é seu primeiro acesso, agora precisamos 
                        que cadastre as informações de sua instituição de ensino.</p>
                    <img src="../img/avatar_test.jpg">

                    <form class='form' method='post' action='cod_cadastroInst.php'>
                        <label>Adicione o nome da sua instituição:</label>
                        <input type="text" name="nomeFant">

                        <label>Adicione a razão social da sua intituição:</label>
                        <input type="text" name="razaoSoci">
                        
                        <label>Adicione o CNPJ da instituição:</label>
                        <input type="number" name="cnpj">

                        <div class='recebeDados'></div>
                        <input type="submit" name="Cadastrar">
                        
                        <!--ADICIONAR MASCARA NO CNPJ-->
                    </form>
                    <!-- <a href='../../alterarAcc.php' class="buttonNext">Voltar</a> -->
                    <!-- <a href='../cadastroDeUnid/cadastroDeUnid.php' class="buttonNext">Proximo passo</a> -->
            </main>    
    </body>
</html>