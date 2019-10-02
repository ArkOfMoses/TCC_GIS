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
        <link rel="stylesheet" href="css/default.css">
        <!-- CSS PADRÃO -->
        <link href="css/default.css" rel=stylesheet>
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <!-- favicon, arquivo de imagem podendo ser 8x8 - 16x16 - 32x32px com extensão .ico -->
        <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon">

        <!-- Telas Responsivas -->
        <link rel=stylesheet media="screen and (max-width:480px)" href="css/cssPrimeiroAcesso/style480.css">
        <link rel=stylesheet media="screen and (min-width:481px) and (max-width:768px)"
              href="css/cssPrimeiroAcesso/style768.css">
        <link rel=stylesheet media="screen and (min-width:769px) and (max-width:1024px)"
              href="css/cssPrimeiroAcesso/style1024.css">
        <link rel=stylesheet media="screen and (min-width:1025px)" href="css/cssPrimeiroAcesso/style1366.css">

        <!-- SCRIPT COM O AJAX -->
        <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="js/jquery.mask.min.js" type="text/javascript"></script>
        <script>

            $(function (){
                $('.form').submit(function(e){
                    e.preventDefault();    // Preventing the default action of the form
                    var myForm = document.getElementById('form');
                    var formData = new FormData(myForm); // So you don't need call serialize()

                $.ajax({
                    url: 'cod_alterarAcc.php',
                    type: 'POST',
                    data: formData,
                    success: function (data) {
                        if(data != ''){
                            $('.recebeDados').html(data);
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
                return false;
            });
        });

      </script>

      <style type="text/css">

        #dup{
          width: 250px;
          height: 250px;
          border: 4px solid;
          border-color: #666;
          border-radius: 50%;
        }
        #img-perfil{
            flex-direction: column;
            display: flex;
            align-items: center;
        }
        label.selecionar-img{
          display: flex;
          justify-content: center;
          align-items: center;
          position: relative;
          width: 45px;
          height: 45px;
          font-size: 50px;
          top: -40px;
          left: 70px;
          background-color: #003366;
          border-radius: 50%;
          color: white;
          z-index: 1;
        }

        .botao-img{
          display: none;
        }
      </style>
       <script>
            function previewImagem() {
                var imagem = document.querySelector('input[name=img]').files[0];
                var preview = document.querySelector('img[id=dup]');

                var reader = new FileReader();

                reader.onloadend = function () {
                    preview.src = reader.result;
                }

                if (imagem) {
                    reader.readAsDataURL(imagem);
                } else {
                    preview.src = "";
                }
            }
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


                    <form enctype="multipart/form-data" class='form' id='form' method='post' action='cod_alterarAcc.php'>
                      <div id="img-perfil">
                      <img src="imagens/perfil.png"  id="dup"/>
                        <label for="selecao-arquivo" class="selecionar-img">+</label>
                        <input id="selecao-arquivo" type="file" name="img" class="botao-img" onchange="previewImagem()" />
                      </div>
                        <!---FAZER COM TODOS OS CAMPOS QUANDO TIVER-->
                        <!---tomar cuidado com esses "altere", pode soar errado ao usuário-->
                        <!---também nn entendi o sentido de colocar value na senha se o usuário nn vai poder ver a senha e conferir-->
                        
                        <label>Confirme seu nome:</label>
                        <input type="text" id="visor1" name="nome_usu" value="<?= $dados['nomeUsu']; ?>" />

                        <label>Altere seu email:</label>
                        <input type="email" id="visor2" name="email" value="<?= $dados['emailUsu']; ?>" />

                        <label>Confirme seu email:</label>
                        <input type="email" id="visor3" name="confirmaEmail" value="<?= $dados['emailUsu']; ?>" />

                        <label>Sua senha:</label>
                        <input type="password" id="visor4" name="senha" />

                        <label>Confirme sua senha:</label>
                        <input type="password" id="visor5" name="confirmaSenha" />

                        <label>Insira seu cpf:</label>
                        <input type="text" id="visor6" name="cpf_usu" />


                        <div class='recebeDados'>
                            <!-- Aqui virá o conteúdo por ajax -->
                        </div>

                        <input type="submit" value="Confirmar" class="buttonNext"/>
                        <!--o formulário precisa de um submit, ou um antes do botão de próximo/ir pro perfil ou um só input q dps a gente manda por header no código dps-->
                    </form>
                </div>

                <div class="acessDenied">
                    <img src="imagens/error.png">
                    <p>Ops! </p>
                    <span>Parece que o dispositivo usado não é compatível com o site!</span>
                </div>
            </main>
            <script type="text/javascript">
            $(document).ready(function(){
                $("#visor6").mask("000.000.000-00");
                
            })
        
        </script>
    </body>
</html>
