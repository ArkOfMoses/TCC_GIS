<?php
session_start();

if(isset($_SESSION['logado'])){
  $dados =  $_SESSION['dadosUsu'];
}else{
    unset($_SESSION['dadosUsu']);
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

        <!-- SCRIPT COM O AJAX -->
        <script src='js/jquery-3.3.1.min.js'></script>
        <script>
          $(function(){
              $('.form').submit(function(){
                  $.ajax({
                      url: 'cod_alterarAcc.php',
                      type: 'POST',
                      data: $('.form').serialize(),
                      success: function(data){
                          if(data != ''){
                              $('.recebeDados').html(data);
                              document.getElementById('visor1').value = '<?= $dados['nomeUsu']; ?>';
                              document.getElementById('visor2').value = '<?= $dados['emailUsu']; ?>';
                              document.getElementById('visor3').value = '<?= $dados['emailUsu']; ?>';
                              document.getElementById('visor4').value = '';
                              document.getElementById('visor5').value = '';
                              document.getElementById('visor6').value = '';
                              document.getElementById('visor7').value = '';
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

                    <form class='form' method='post' action='cod_alterarAcc.php'>
                        <!---FAZER COM TODOS OS CAMPOS QUANDO TIVER-->
                        <!---tomar cuidado com esses "altere", pode soar errado ao usuário-->
                        <!---também nn entendi o sentido de colocar value na senha se o usuário nn vai poder ver a senha e conferir-->
                        <label>Confirme seu nome:</label>
                        <input type="text" id="visor1" name="nome_usu" value="<?= $dados['nomeUsu']; ?>">
  
                        <label>Altere seu email:</label>
                        <input type="email" id="visor2" name="email" value="<?= $dados['emailUsu']; ?>">
                        
                        <label>Confirme seu email:</label>
                        <input type="email" id="visor3" name="confirmaEmail" value="<?= $dados['emailUsu']; ?>">
                        
                        <label>Sua senha:</label>
                        <input type="password" id="visor4" name="senha" >
                        
                        <label>Confirme sua senha:</label>
                        <input type="password" id="visor5" name="confirmaSenha" >

                        <label>Insira seu cpf:</label>
                        <input type="text" id="visor6" name="cpf_usu">

                        <label>Insira sua data de nascimento:</label>
                        <input type="date" id="visor7" name="data_nasc">

                        <div class='recebeDados'>
                            <!-- Aqui virá o conteúdo por ajax -->
                        </div>

                        <input type="submit" value="confirmar">
                        <!--o formulário precisa de um submit, ou um antes do botão de próximo/ir pro perfil ou um só input q dps a gente manda por header no código dps-->
                    </form>                    
                </div>
                          
                <div class="acessDenied">
                    <img src="imagens/error.png">
                    <p>Ops! </p>
                    <span>Parece que o dispositivo usado não é compatível com o site!</span>
                </div>
            </main>    
    </body>
</html>