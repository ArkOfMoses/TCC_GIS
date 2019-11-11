<?php session_start();
if(isset($_SESSION['logado'])){
  unset($_SESSION['dadosUsu']);
  unset($_SESSION['logado']);
  session_destroy();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>

      <title> GIS | Gestão Institucional Simplificada</title>

      <meta charset=UTF-8>
      <!-- ISO-8859-1 -->
      <meta name=viewport content="width=device-width, initial-scale=1.0">
      <meta name=keywords content="">
      <!-- Opcional -->
      <meta name=author content='G4 INI3B GIS'>

      <!-- favicon, arquivo de imagem podendo ser 8x8 - 16x16 - 32x32px com extensão .ico -->
      <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon">

      <!-- CSS PADRÃO -->
      <link href="css/landingPage/default.css" rel=stylesheet>

      <!-- Telas Responsivas -->
      <link rel=stylesheet media="screen and (max-width:480px)" href="css/landingPage/style480.css">
      <link rel=stylesheet media="screen and (min-width:481px) and (max-width:768px)" href="css/landingPage/style768.css">
      <link rel=stylesheet media="screen and (min-width:769px) and (max-width:1024px)" href="css/landingPage/style1024.css">
      <link rel=stylesheet media="screen and (min-width:1025px)" href="css/landingPage/style1366.css">

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

            <div class="banner">
              <div class="bannerText">
                <h1>GIS</h1>
                <h2>Gestão Institucional Simplificada</h2>
                <p>Gerencie sua instituição com o GIS, criamos sistemas completos para sua escola, creche ou universidade</p>
                <div class="botao-banner"><a href="#enviar-email">Comece agora</a></div>
              </div>
              <img src="imagens/ilustracao1.svg" alt="Ilustração sistema GIS" class="bannerIlus">

              <a href="#animHome"><div class="saibaMais">Saiba mais <i class="fas fa-angle-double-down"></i></div></a>
            </div>

            <div class="qual" id="animHome">
              <div class="animHome">
                <h1>Faça tudo com o GIS</h1>
                <div class="horario-icon">
                  <p>Adicione, edite e exclua alunos e funcionários</p>

                  <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                  viewBox="0 0 704.138 595.28" enable-background="new 0 0 704.138 595.28"
                  xml:space="preserve">
               <g>
                 <defs>
                   <rect id="SVGID_1_" x="13.984" y="75.286" width="253.469" height="253.468"/>
                 </defs>
                 <clipPath id="SVGID_2_">
                   <use xlink:href="#SVGID_1_"  overflow="visible"/>
                 </clipPath>
                 <path opacity="0.5" clip-path="url(#SVGID_2_)" fill="#45BBC1" d="M267.453,202.021c0,69.992-56.741,126.733-126.735,126.733
                   c-69.995,0-126.735-56.741-126.735-126.733c0-69.995,56.74-126.735,126.735-126.735
                   C210.712,75.286,267.453,132.026,267.453,202.021"/>
               </g>
               <g>
                 <defs>
                   <rect id="SVGID_3_" x="477.419" y="119.418" width="221.844" height="221.845"/>
                 </defs>
                 <clipPath id="SVGID_4_">
                   <use xlink:href="#SVGID_3_"  overflow="visible"/>
                 </clipPath>
                 <path opacity="0.5" clip-path="url(#SVGID_4_)" fill="#45BBC1" d="M699.263,230.34c0,61.261-49.662,110.923-110.921,110.923
                   c-61.261,0-110.922-49.662-110.922-110.923s49.661-110.921,110.922-110.921C649.601,119.418,699.263,169.079,699.263,230.34"/>
               </g>
               <g>
                 <defs>
                   <rect id="SVGID_5_" x="135.281" y="347.016" width="208.105" height="208.104"/>
                 </defs>
                 <clipPath id="SVGID_6_">
                   <use xlink:href="#SVGID_5_"  overflow="visible"/>
                 </clipPath>
                 <path opacity="0.5" clip-path="url(#SVGID_6_)" fill="#45BBC1" d="M343.387,451.067c0,57.467-46.586,104.053-104.053,104.053
                   s-104.052-46.586-104.052-104.053c0-57.466,46.585-104.052,104.052-104.052S343.387,393.602,343.387,451.067"/>
               </g>
               <g opacity="0.9">
                 <path opacity="0.8" fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M145.665,317.113
                   c5.896-14.971,9.236-26.51,16.841-37.744c13.059-19.288,33.028-29.447,56.186-30.807c20.784-1.22,41.695-0.257,63.395-0.257
                   c2.238,19.677,8.554,37.532,23.889,52.361c-23.468,8.438-41.406,21.969-53.757,42.459c-12.25,20.326-14.402,42.678-12.726,66.492
                   c-32.918-1.141-63.542-8.488-93.828-17.709C138.406,358.75,139.769,332.086,145.665,317.113z"/>
                 <path opacity="0.8" fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M566.387,391.908
                   c-24.949,9.846-50.642,16.469-77.54,17.857c-2.771,0.143-5.544,0.324-9.933,0.584c3.841-51.635-15.318-89.742-66.027-109.602
                   c13.481-14.706,21.69-31.701,22.875-53.589c23.414,1.04,47.153-0.758,69.616,3.765c32.659,6.578,52.763,34.602,59.402,62.011
                   C571.418,340.346,566.387,366.977,566.387,391.908z"/>
                 <path fill-rule="evenodd" clip-rule="evenodd" fill="#E21A43" d="M463.979,416.412c0,10.281-0.309,20.572,0.116,30.832
                   c0.244,5.867-1.832,8.748-7.336,10.945c-36.645,14.656-74.944,19.07-113.64,15.02c-27.665-2.893-54.891-10.109-82.234-15.777
                   c-2.56-0.531-6.499-3.795-6.508-5.807c-0.11-24.256-2.058-48.863,1.304-72.697c5.579-39.561,34.744-64.795,74.621-66.84
                   c22.314-1.143,44.943-1.021,67.129,1.34c36.623,3.9,65.046,36.35,66.323,73.088c0.347,9.955,0.056,19.93,0.056,29.896
                   C463.865,416.412,463.923,416.412,463.979,416.412z"/>
                 <path fill-rule="evenodd" clip-rule="evenodd" fill="#E21A43" d="M420.636,246.34c-0.288,34.085-28.292,61.582-62.21,61.088
                   c-33.705-0.492-60.948-28.045-60.898-61.592c0.052-34.416,28.201-62.003,62.778-61.527
                   C393.785,184.771,420.924,212.673,420.636,246.34z"/>
                 <path opacity="0.8" fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M250.806,120.67
                   c32.261-0.024,60.361,25.941,61.131,57.089c0.1,4.011-1.854,9.178-4.68,11.954c-10.97,10.775-18.132,23.416-22.638,38.013
                   c-1.185,3.839-4.414,8.262-7.904,9.977c-22.71,11.162-49.859,6.495-68.296-11.019c-18.038-17.136-23.906-43.645-14.82-66.934
                   C202.835,136.077,225.363,120.688,250.806,120.67z"/>
                 <path opacity="0.8" fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M522.712,181.911
                   c0.189,41.623-40.359,71.413-79.913,58.914c-4.97-1.571-7.762-3.689-8.747-9.16c-3.531-19.521-13.915-34.843-29.317-47.246
                   c-2.656-2.138-4.683-7.291-4.248-10.699c4.139-32.343,32.605-54.996,65.787-52.953C497.42,122.688,522.567,149.929,522.712,181.911
                   z"/>
               </g>
               </svg>
               
                </div>

                <div class="check-icon">
                <p>Registre ausências e faça ocorrências de seus alunos</p>

                  <svg version="1" alt="Ilustração de lista de chamada" id="Camada_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 842 595"><style>.st18{opacity:.5;fill:#00cdcd}.st19{opacity:.8;fill:#fff}.st20{fill:#3c3}.st21{opacity:.8;fill:#e6e6e6}</style><circle id="Elipse3" class="st18" cx="195" cy="441" r="83"/><circle id="Elipse2" class="st18" cx="384" cy="116" r="81"/><circle id="Elipse1_2_" class="st18" cx="640" cy="346" r="122"/><g id="check1"><path class="st19" d="M651 155l-67 5c-21 1-39-15-40-35s14-38 35-40l67-4c21-1 38 14 40 35 1 20-14 38-35 39z"/><ellipse transform="matrix(.9978 -.0665 .0665 .9978 -7 39)" class="st20" cx="583" cy="122" rx="32" ry="32"/></g><path id="retangulo1" class="st21" d="M352 170l-188 13c-7 0-12-4-12-10-1-7 4-12 10-12l189-13c6 0 11 4 12 10 0 7-5 12-11 12z"/><path id="retangulo1_1_" class="st21" d="M300 138l-69 4c-6 1-11-4-12-10 0-6 5-11 11-12l69-5c6 0 11 5 12 11 0 6-4 11-11 12z"/><g id="check2"><path class="st19" d="M659 275l-67 4c-21 2-39-14-40-34-1-21 14-38 35-40l67-4c21-2 38 14 40 34 1 21-14 39-35 40z"/><ellipse transform="matrix(.9978 -.0665 .0665 .9978 -14 44)" cx="655" cy="238" rx="32" ry="32" fill="#c33"/></g><path id="retangulo1_3_" class="st21" d="M338 289l-189 12c-6 1-11-4-12-10 0-6 5-12 11-12l189-13c6 0 11 5 11 11 1 6-4 11-10 12z"/><path id="retangulo1_2_" class="st21" d="M276 256l-69 5c-7 0-12-4-12-11-1-6 4-11 10-11l69-5c7 0 12 4 12 10 1 6-4 12-10 12z"/><g id="chekc3"><path class="st19" d="M667 393l-67 5c-21 1-39-14-40-35-2-20 14-38 34-39l68-5c20-1 38 14 40 35 1 20-15 38-35 39z"/><ellipse transform="matrix(.9978 -.0665 .0665 .9978 -23 41)" class="st20" cx="599" cy="360" rx="32" ry="32"/></g><path id="retangulo1_5_" class="st21" d="M378 407l-188 13c-7 0-12-5-12-11-1-6 4-11 10-12l189-12c6-1 11 4 12 10 0 6-4 12-11 12z"/><path id="retangulo1_4_" class="st21" d="M288 375l-69 4c-6 1-11-4-12-10 0-6 5-12 11-12l69-5c6 0 11 5 12 11 0 6-4 11-11 12z"/></svg>

                </div>

                <div class="notas-icon">
                <p>Calcule notas e gere boletins</p>

                  <svg alt="Ilustração de notas" version="1" id="Camada_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 842 595"><style>.st23{opacity:.5;fill:#00cdcd}.st24{opacity:.9;fill:#39f}.st22{font-family:&apos;Roboto&apos;;font-weight:500}.st25{font-size:156.7808px}</style><circle id="Elipse1" class="st23" cx="665" cy="327" r="131"/><circle id="Elipse1_1_" class="st23" cx="148" cy="102" r="89"/><circle id="Elipse1_2_" class="st23" cx="338" cy="458" r="112"/><text transform="rotate(2 -10291 5526) scale(.99995)" class="st24 st22" font-size="85">6,5</text><text transform="rotate(7 -2059 1404)" class="st24 st22 st25">9</text><text transform="rotate(7 -1887 4412)" class="st24 st22 st25">7,7</text><text transform="rotate(-9 1965 -1716)" class="st22" font-size="92" fill="#f36">4,2</text><path id="retangulo1" d="M569 424H440c-21 0-38-17-38-38v-21c0-21 17-38 38-38h129c21 1 38 18 38 38v21c0 21-17 38-38 38z" fill="#9999ad"/><text transform="translate(444 397)" class="st22" font-size="60" fill="#f2f2f2">6,85</text></svg>

                </div>
              </div>

              <a href="contatoLandingPage.php" id="enviar-email"><div class="btm-email"><i class="fas fa-paper-plane" alt="icone de carta"></i> Entre em contato conosco!</div></a>
              <a href="loginLandingPage.php"><div class="btm-email"><i class="fas fa-user" alt="icone de usuário"></i> Já sou um cliente</div></a>
            </div>

            <div class="registro">

              <form class="form-registro" id="contato" method="post" action="cadastroMaster.php">
                <h2 id="h2">Registre-se</h2>
                <input type="text" name="firstname" placeholder="Seu nome">
                <br>
                <input type="text" name="email" placeholder="Seu e-mail" id="email" onblur="return validaEmail()">
                <br>
                <input type="text" name="confEmail" placeholder="Confirme seu email" id="confEmail" onblur="return confirmarEmail()">
                <br>
                <input type="password" name="senha" placeholder="Crie uma senha" id="senha">
                <br>
                <input type="password" name="confSenha" placeholder="Confirme sua senha" id="confSenha" onblur="return confirmarSenha()">
                <br>
                <input type="text" id="dataNasc" name="dataNasc" placeholder="Data de Nascimento">
                <br>
                <h4></h4>
                <br>
                <input type="submit" value="Enviar" id="enviar">
                <br>
                    <p>Ao se cadastrar, você concorda com nossos <a href="termosDeUso.php">Termos de uso</a></p>
              </form>

            </div>

        </main>

        <footer>
          <a href="#on_off"><i class="fas fa-chevron-up"></i></a>

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
