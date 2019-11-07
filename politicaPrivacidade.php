<?php
session_start();
if(isset($_SESSION['logado'])){
  unset($_SESSION['dadosUsu']);
  unset($_SESSION['logado']);
  session_destroy();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>

      <title>Política de Privacidade | GIS</title>

      <meta charset=UTF-8>
      <!-- ISO-8859-1 -->
      <meta name=viewport content="width=device-width, initial-scale=1.0">
      <meta name=description content="">
      <meta name=keywords content="">
      <!-- Opcional -->
      <meta name=author content='G4 INI3B GIS'>

      <!-- favicon, arquivo de imagem podendo ser 8x8 - 16x16 - 32x32px com extensão .ico -->
      <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon">

      <!-- CSS PADRÃO -->
      <link href="css/TermosDeUso/default.css" rel=stylesheet>

      <!-- Telas Responsivas -->
      <link rel=stylesheet media="screen and (max-width:480px)" href="css/TermosDeUso/style480.css">
      <link rel=stylesheet media="screen and (min-width:481px) and (max-width:768px)" href="css/TermosDeUso/style768.css">
      <link rel=stylesheet media="screen and (min-width:769px) and (max-width:1024px)" href="css/TermosDeUso/style1024.css">
      <link rel=stylesheet media="screen and (min-width:1025px)" href="css/TermosDeUso/style1366.css">

      <!-- Script -->
      <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
      <script src="js/jquery.mask.min.js" type="text/javascript"></script>
      <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
      <script src="js/script.js"></script>
      <script>
          $(function(){
              $('.form-registro').submit(function(){
                  $.ajax({
                      url: 'cadastroMaster.php',
                      type: 'POST',
                      data: $('.form-registro').serialize(),
                      success: function(data){
                          if(data != ''){
                              $("h4").html(data);
                          }
                      }
                  });
                  return false;
              });
          });
      </script>

      <!-- Icon Font -->
      <script src="https://kit.fontawesome.com/2a85561c69.js"></script>
  </head>

  <body>
      <div class="content">

        <header id="on_off">
          <div class="header">

            <a class="logo" href="homeLandingPage.php">
              <?xml version="1.0" encoding="utf-8"?>
              <!-- Generator: Adobe Illustrator 21.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
              <svg version="1.1" id="Logo" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
              	 viewBox="0 0 595.2 595.3" style="enable-background:new 0 0 595.2 595.3;" xml:space="preserve" alt="Logo GIS">
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
              	 viewBox="0 0 220 150" style="enable-background:new 0 0 220 150;" xml:space="preserve" alt="menu">
                <style type="text/css">
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
              <li><a href="homeLandingPage.php">Home</a></li>
              <li class="login-btn"><a href="loginLandingPage.php">Entrar</a></li>
              <li><a href="contatoLandingPage.php">Contato</a></li>
              <li><a href="#">Sobre Nós</a></li>
            </ul>

          </nav>
        </div>

        </header>

        <main>
           <section>
              <!--<div class="Ancoragem">
                <ul>
                <li><a href="#visaoGeral">VISÃO GERAL</a></li>
                <li><a href="#secao1">SEÇÃO 1</a></li>
                <li><a href="#secao2">SEÇÃO 2</a></li>
                <li><a href="#secao3">SEÇÃO 3</a></li>
                <li><a href="#secao4">SEÇÃO 4</a></li>
                <li><a href="#secao5">SEÇÃO 5</a></li>
                <li><a href="#secao6">SEÇÃO 6</a></li>
                <li><a href="#secao7">SEÇÃO 7</a></li>
                <li><a href="#secao8">SEÇÃO 8</a></li>
                <li><a href="#secao9">SEÇÃO 9</a></li>
                <li><a href="#secao10">SEÇÃO 10</a></li>
                <li><a href="#secao11">SEÇÃO 11</a></li>
                <li><a href="#secao12">SEÇÃO 12</a></li>
                <li><a href="#secao13">SEÇÃO 13</a></li>
                <li><a href="#secao14">SEÇÃO 14</a></li>
                <li><a href="#secao15">SEÇÃO 15</a></li>
                <li><a href="#secao16">SEÇÃO 16</a></li>
                <li><a href="#secao17">SEÇÃO 17</a></li>
                <li><a href="#secao18">SEÇÃO 18</a></li>
                <li><a href="#secao19">SEÇÃO 19</a></li>
                <li><a href="#secao20">SEÇÃO 20</a></li>
                </ul>
              </div>-->

              <section class="termos">
                <h1>Política de privacidade para <a href='http://sistemagis.com'>GIS</a></h1>

                <section id="visaoGeral">
                  <p>
                  Todas as suas informações pessoais recolhidas, serão usadas para o ajudar a tornar a sua visita no nosso site o mais produtiva e agradável possível.</p>
                  <p>A garantia da confidencialidade dos dados pessoais dos utilizadores do nosso site é importante para o GIS.</p>
                  <p>Todas as informações pessoais relativas a membros, assinantes, clientes ou visitantes que usem o GIS serão tratadas em concordância com a Lei da Proteção de Dados Pessoais de 26 de outubro de 1998 (Lei n.º 67/98).</p>
                  <p>A informação pessoal recolhida pode incluir o seu nome, e-mail, número de telefone e/ou telemóvel, morada, data de nascimento e/ou outros.</p>
                  <p>O uso do GIS pressupõe a aceitação deste acordo de privacidade. A equipa do GIS reserva-se ao direito de alterar este acordo sem aviso prévio. Deste modo, recomendamos que consulte a nossa política de privacidade com regularidade de forma a estar sempre atualizado.
                  <br><br>
                  </p>
                </section>

                <section id="secao1">
                <h2>Os anúncios</h2>

                <p>
                Tal como outros websites, coletamos e utilizamos informação contida nos anúncios. A informação contida nos anúncios, inclui o seu endereço IP (Internet Protocol), o seu ISP (Internet Service Provider, como o Sapo, Clix, ou outro), o browser que utilizou ao visitar o nosso website (como o Internet Explorer ou o Firefox), o tempo da sua visita e que páginas visitou dentro do nosso website.
                <br><br>
                </p>
                </section>

                <section id="secao2">
                <h2>Os Cookies e Web Beacons</h2>
                
                <p>
                Utilizamos cookies para armazenar informação, tais como as suas preferências pessoas quando visita o nosso website. Isto poderá incluir um simples popup, ou uma ligação em vários serviços que providenciamos, tais como fóruns.</p>
                <p>Em adição também utilizamos publicidade de terceiros no nosso website para suportar os custos de manutenção. Alguns destes publicitários, poderão utilizar tecnologias como os cookies e/ou web beacons quando publicitam no nosso website, o que fará com que esses publicitários (como o Google através do Google AdSense) também recebam a sua informação pessoal, como o endereço IP, o seu ISP, o seu browser, etc. Esta função é geralmente utilizada para geotargeting (mostrar publicidade de Lisboa apenas aos leitores oriundos de Lisboa por ex.) ou apresentar publicidade direcionada a um tipo de utilizador (como mostrar publicidade de restaurante a um utilizador que visita sites de culinária regularmente, por ex.).</p>
                <p>Você detém o poder de desligar os seus cookies, nas opções do seu browser, ou efetuando alterações nas ferramentas de programas Anti-Virus, como o Norton Internet Security. No entanto, isso poderá alterar a forma como interage com o nosso website, ou outros websites. Isso poderá afetar ou não permitir que faça logins em programas, sites ou fóruns da nossa e de outras redes.
                <br><br>
                </p>
                </section>

                <section id="secao3">
                <h2>Ligações a Sites de terceiros</h2><p>O GIS possui ligações para outros sites, os quais, a nosso ver, podem conter informações / ferramentas úteis para os nossos visitantes. A nossa política de privacidade não é aplicada a sites de terceiros, pelo que, caso visite outro site a partir do nosso deverá ler a politica de privacidade do mesmo.</p>
                <p>Não nos responsabilizamos pela política de privacidade ou conteúdo presente nesses mesmos sites.
                <br><br>
                </p>
                </section>
              </section>
           </section>


        </main>

        <footer>
          <a href="#"><i class="fas fa-chevron-up"></i></a>

          <a class="selecionado">Home</a>
          <a href="loginLandingPage.php">Entrar na Conta</a>
          <a href="contatoLandingPage.php">Contato</a>
          <a href="#">Sobre Nós</a>

        </footer>

    </div>
    <script type="text/javascript">
            $(document).ready(function(){
                $("#dataNasc").mask("00/00/0000");
            })

    </script>

  </body>

</html>
