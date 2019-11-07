
<?php
session_start();
if(isset($_SESSION['logado'])){
    $dados =  $_SESSION['dadosUsu'];
    $img = $dados['fotoUsu'];
    $codUsu = $dados['codUsu'];
    $nomeTipoUsu = $dados['nomeTipoUsu'];
}else{
    unset($_SESSION['dadosUsu']);
    unset($_SESSION['logado']);
    session_destroy();
    header("Location: ../homeLandingPage.php");
}

require_once '../bd/conexao.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>

      <title>pag</title>

      <meta charset=UTF-8>
      <!-- ISO-8859-1 -->
      <meta name=viewport content="width=device-width, initial-scale=1.0">
      <meta name=description content="">
      <meta name=keywords content="">
      <!-- Opcional -->
      <meta name=author content='G4 INI3B GIS '>

      <!-- favicon, arquivo de imagem podendo ser 8x8 - 16x16 - 32x32px com extensão .ico -->
      <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon">

      <!-- CSS PADRÃO -->
      <link href="../css/default.css" rel=stylesheet>

      <!-- Telas Responsivas -->
      <link rel=stylesheet media="screen and (max-width:480px)" href="../css/configuracoes/style480.css">
      <link rel=stylesheet media="screen and (min-width:481px) and (max-width:768px)" href="../css/configuracoes/style768.css">
      <link rel=stylesheet media="screen and (min-width:769px) and (max-width:1024px)" href="../css/configuracoes/style1024.css">
      <link rel=stylesheet media="screen and (min-width:1025px)" href="../css/configuracoes/style1366.css">

      <!-- Script -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="../js/script.js"></script>

      <!-- Icon Font -->

      <script src="../js/jquery.mask.min.js" type="text/javascript"></script>
      <script src="https://kit.fontawesome.com/2a85561c69.js"></script>
      <script>

            $(function (){
                $('.form').submit(function(e){
                    e.preventDefault();    // Preventing the default action of the form
                    var myForm = document.getElementById('form');
                    var formData = new FormData(myForm); // So you don't need call serialize()

                $.ajax({
                    url: 'cadConfigs.php',
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

        <header id="on_off">
          <div class="header">

            <a class="logo">
              <?xml version="1.0" encoding="utf-8"?>
              <!-- Generator: Adobe Illustrator 21.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
              <svg version="1.1" id="Logo" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
              	 viewBox="0 0 595.2 595.3" style="enable-background:new 0 0 595.2 595.3;" xml:space="preserve">
              <style type="text/css">
              	.st0{fill:url(#LetraG_2_);}
              	.st1{fill:#006699;}
              	.st2{fill:url(#Bola_2_);}
              </style>
              <linearGradient id="LetraG_2_" gradientUnits="userSpaceOnUse" x1="-130.1162" y1="-1.6877" x2="-127.636" y2="-1.6877" gradientTransform="matrix(120.0332 -207.9035 -207.9035 -120.0332 15416.1299 -26698.6406)">
              	<stop  offset="0" style="stop-color:#00CCCC"/>
              	<stop  offset="1" style="stop-color:#0066CC"/>
              </linearGradient>
              <path id="LetraG_1_" class="st0" d="M297.2,0c-1.8,0-3.5,0-5.3,0C214.5,1.5,141.6,32.5,86.8,87.8C32,143.2,1,216.1,0,293.4
              	c-1,80.4,29.5,156.2,85.8,213.3c56.3,57,131.4,88.5,211.8,88.5c164.2,0,297.6-133.4,297.6-297.6c0-31.8-25.8-58-58.1-58
              	c-0.2,0-0.3,0-0.5,0l-103.4,1c-32.2,0-58.3,26-58.3,58.3c0,30.5,23.2,55.4,53,58c1.8,0.2,3.5,0.2,5.3,0.2l35.2-0.2l0,0h49.1
              	c-28.1,80.7-104.9,138.6-195.1,138.6c-74.3,0-139.4-39.2-175.8-98l0,0c-20.1-30.1-30.7-65.6-30.1-102.7
              	c1.5-96.5,81.1-176.6,177.6-178.3c1.1,0,2.1,0,3.2,0c41.8,0,82.2,14.3,114.1,40.5c3,2.5,6.2,4.7,9.7,6.4c8.4,4.4,17.7,6.6,26.9,6.6
              	c13,0,25.9-4.3,36.3-12.5c3.2-2.7,6.4-5.7,9.2-9.2c20.1-25,16.4-61.8-8.7-82.1C431.9,23.5,365.5,0,297.2,0"/>
              <path id="Sombra_1_" class="st1" d="M517.6,357h-49.1l0,0c-7.2,21-18.3,40.4-32.5,57.2c0,0,0,0-0.2,0.2c0,0.2,0,0.2-0.2,0.5
              	c-3,3.2-6,6.7-9.2,9.9c-30.8,31-72.4,51.1-118.6,53.6c-2.2,0.2-4.2,0.2-6.4,0.2h-3.7c-6.5,0-12.9-0.3-19.2-1
              	c-5.7-0.6-11.3-1.5-16.9-2.6c-5.8-1.2-11.6-2.6-17.2-4.3c-4.9-1.5-9.8-3.2-14.6-5.2c-22.6-9.2-43.5-22.9-61.1-40.9
              	c-2.7-2.7-5.2-5.5-7.7-8.3c-5.2-6-10-12.3-14.3-18.7c36.4,58.8,101.5,98,175.8,98C412.7,495.6,489.5,437.7,517.6,357"/>
              <linearGradient id="Bola_2_" gradientUnits="userSpaceOnUse" x1="-127.1179" y1="-8.5597" x2="-124.6378" y2="-8.5597" gradientTransform="matrix(23.7034 -41.0554 -41.0554 -23.7034 2931.1543 -5073.1851)">
              	<stop  offset="0" style="stop-color:#00CCCC"/>
              	<stop  offset="1" style="stop-color:#0066CC"/>
              </linearGradient>
              <path id="Bola_1_" class="st2" d="M358.1,297.7c0,18.9-8.9,35.6-22.8,46.3c-9.8,7.5-22.1,12-35.5,12h-2c-32.2,0-58.3-26-58.3-58.3
              	s26-58.3,58.3-58.3h2c13.4,0,25.7,4.5,35.5,12.1C349.2,262.1,358.1,278.9,358.1,297.7z"/>
              </svg>

            </a>

            <label onclick="activateMenu()" class="hamburger">
              <?xml version="1.0" encoding="utf-8"?>
              <!-- Generator: Adobe Illustrator 21.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
              <svg version="1.1" id="Hamburger" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
              	 viewBox="0 0 220 150" style="enable-background:new 0 0 220 150;" xml:space="preserve">
              <style type="text/css">
                .butaozin{
                  text-align: center;
                  height: 35px;
                  width: 200px;
                  border-radius: 5px;
                  border: none;
                  background: #012;
                  color: #fff;
                  font-weight: bolder;
                }
                #dup{
                  width: 150px;
                  height: 150px;
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
                  width: 35px;
                  height: 35px;
                  font-size: 35px;
                  top: -30px;
                  left: 96px;
                  background-color: #003366;
                  border-radius: 50%;
                  color: white;
                  z-index: 1;
                }

                .botao-img{
                  display: none;
                }

              	.st4{fill:#003366;}
              </style>
              <g>
              	<path class="st4" d="M220,10c0-5.5-4.5-10-10-10H10C4.5,0,0,4.5,0,10s4.5,10,10,10h200C215.6,20,220,15.6,220,10z"/>
              	<path class="st4" d="M210,65H98.9c-5.5,0-10,4.5-10,10s4.5,10,10,10H210c5.5,0,10-4.5,10-10S215.6,65,210,65z"/>
              	<path class="st4" d="M210,130H33.2c-5.5,0-10,4.5-10,10s4.5,10,10,10h176.9c5.5,0,10-4.5,10-10S215.6,130,210,130z"/>
              </g>
              </svg>
            </label>

          </div>

          <div class="fullnav">
          <nav class="menu">


            <ul class="menu-buttons">
              <li><a href="../perfilProfessor.php"><i class="fas fa-home"></i></a></li>
              <li><a href="../lista_salas.php"><i class="fas fa-list"></i></a></li>
              <li><a href="../funcionalidades/operacaoPesquisarAlunos/pesquisa.php"><i class="far fa-clock"></i></a></li>
              <li><a href="#"><i class="far fa-calendar-alt"></i></a></li>
              <li><a href="#"><i class="fas fa-cogs"></i></a></li>
              <li><a href="#"><i class="fas fa-sign-out-alt"></i></a></li>
            </ul>

          </nav>
        </div>

        </header>

        <main>

          <h1>Configurações da Conta</h1>
          <?php

          $select = ("select nome_usu, data_nasc_usu, cpf_usu, email, senha, url_foto_usu from acesso inner join usuario on (acesso.cod_acesso = usuario.cod_acesso) where cod_usu = $codUsu and cod_status_usu = 'A';
");
          $comando = $pdo->prepare($select);
          $comando->execute();
          $numLinhas = $comando->rowCount();
          if($numLinhas != 0){
            while($dedoes = $comando->fetch(PDO::FETCH_ASSOC)){
                  $nomeUsu = $dedoes['nome_usu'];
                  $data = $dedoes['data_nasc_usu'];
                  if($data != ''){
                  $date = date_create_from_format('Y-m-d', "$data");
                  $dataNascUsu = date_format($date, 'd/m/Y');
                  }else{
                    $data = NULL;
                  }
                  $CPFUsu = $dedoes['cpf_usu'];
                  $emailUsu = $dedoes['email'];
                  $senhaUsu = $dedoes['senha'];
                  $fotoUsu = $dedoes['url_foto_usu'];

                  echo "<form  enctype='multipart/form-data' class='form' id='form' method='post'>
                        <div class='conta-edit'>
                          <dl class='grupo-form'>
                            <dt>
                              <label for=''>Alterar Nome</label>
                            </dt>
                            <dd>
                              <input type='text' name='nomeUsu' value='$nomeUsu'> 

                              <div class='nota-input'>
                                Esse é nome que aparecerá públicamente e que iremos usar para nos referirmos a você.
                              </div>
                            </dd>
                          </dl>

                          <dl class='grupo-form'>
                            <dt>
                                <label for=''>Alterar Email</label>
                            </dt>
                            <dd>
                              <input type='text' name='email' value='$emailUsu'> <!--value='email do usuário'-->

                              <div class='nota-input'>
                                Esse email é usado para acessar sua conta, para recuperar sua senha e para que te enviemos informações importantes.
                              </div>
                            </dd>
                          </dl>

                          <dl class='grupo-form'>
                            <dt>
                              <label for=''>Alterar Data de Nascimento</label>
                            </dt>
                            <dd>";
                            if($data === NULL){
                             echo "<input type='text' id='dataMano' name='dataNasc' placeholder='00/00/0000'>";
                            }else{
                             echo "<input type='text' id='dataMano' name='dataNasc' value='$dataNascUsu' placeholder='00/00/0000'>";
                            }

                            echo "</dd>
                          </dl>

                          <dl class='grupo-form'>
                            <dt>
                              <label for=''>Alterar CPF</label>
                            </dt>
                            <dd>
                              <input type='text' id='cpfMano' value='$CPFUsu' name='CPF' placeholder='000.000.000-00'>

                            </dd>
                          </dl>

                          <dl class='grupo-form'>
                            <dt>
                              <label for=''>Alterar Senha</label>
                            </dt>
                            <dd>
                              <input type='password' name='novaSenha' placeholder='*******'> <!--placeholder='senha do usuário'-->

                              <div class='nota-input'>
                                Essa é a sua senha de acesso.
                              </div>
                            </dd>
                          </dl>
                        </div>

                        <div class='foto-edit'>

                          <label for=''>Alterar foto de perfil</label>";
                          if($fotoUsu != NULL){
                              echo "<div class='foto-perfil'>
                              <img src='../$fotoUsu'  id='dup'/>";
                          }else{
                            echo "<div class='foto-perfil' >
                            <img src='../imagens/ilustracao1.png'  id='dup'/>";
                          }

                        //  
                        // <button type='button' name='uploadFoto'><i class=''></i></button>


                        echo "  
                        <label for='selecao-arquivo' class='selecionar-img'>+</label>
                        <input id='selecao-arquivo' type='file' name='img' class='botao-img' onchange='previewImagem()' />
                            
                          </div>
                        </div>

                        <div class='confirmar'>
                          <button type='button' href='#' class='btn-conf' onclick='activateConf()'>Confirmar alterações</button>

                          <div id='block' onclick='activateConf()'>

                          </div>

                          <div id='conf-senha'>
                            <dl class='grupo-form'>
                              <dt>
                                <label for=''>Digite sua senha atual para confirmar</label>
                              </dt>
                              <dd>
                                <input type='password' name='senhaAtual' placeholder='*******'>
                                <input type='submit' name='butonies' value='Pronto' class='btn-pronto'>
                                <div class='recebeDados'></div>
                              </dd>
                            </dl>
                          </div>

                        </div>

                      </form>";

            }
          }else{
            echo "Não tem como cair aqui... mas se cair ferrou legal kkkk";
          }



          ?>
          



        </main>

        <footer>

        </footer>

    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#cpfMano").mask("000.000.000-00");
            $("#dataMano").mask("00/00/0000");
            
        })
    
    </script>

  </body>

</html>
