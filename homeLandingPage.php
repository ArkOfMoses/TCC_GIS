<?php
/* 
session_start();

no TCA quando o usuário voltava pra landing a gente deslogava ele, a gente vai fazer isso dnv?

if(isset($_SESSION['logado'])){
    unset($_SESSION['logado']);
    session_destroy();
}

if(isset($_SESSION['logado'])){
  $_SESSION = array();
}

*/ 

require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;


$err = false;
$msg = array();

$filterForm = [
  "firstname" => FILTER_SANITIZE_SPECIAL_CHARS,
  "email" => FILTER_VALIDATE_EMAIL,
  "mais-info" => FILTER_SANITIZE_SPECIAL_CHARS
];

$infoPost = filter_input_array(INPUT_POST, $filterForm);


if($infoPost){
  // não sei oq tá acontecendo aqui, mas dá certo
  $nome = '=?UTF-8?B?'.base64_encode($infoPost['firstname']).'?=';
  $emailEnviando = $infoPost['email'];
  $informacoes = substr($infoPost['mais-info'], 0, 16384);


  if ($nome === '' || $emailEnviando === '' || $informacoes === '' ) {
    $msg['camposVazios'] = "<p>É necessário preencher todos os campos!</p>";
    $err = true;
  }

  if($emailEnviando === false){
    $msg['errEmail'] = "<p>O Email é inválido!</p>";
    $err = true;
  }


  if($err == false){
    // código pra mandar o email!!
    $PHPMailer = new PHPMailer();

    $PHPMailer->IsSMTP();
    $PHPMailer->CharSet = 'UTF-8';

    //configuração do gmail
    $PHPMailer->Port = '465'; //porta usada pelo gmail.
    $PHPMailer->Host = 'smtp.gmail.com'; 
    $PHPMailer->IsHTML(true);  
    $PHPMailer->SMTPSecure = 'ssl';

    //configuração do usuário do gmail
    $PHPMailer->SMTPAuth = true; 
    $PHPMailer->Username = 'exodiadeini@gmail.com'; // usuario gmail.   
    $PHPMailer->Password = 'gostosinhos123'; // senha do email.
    $PHPMailer->SingleTo = true; 

    // configuração do email a ver enviado.
    $PHPMailer->setFrom("exodiadeini@gmail.com", "Gestão Institucional Simplificada");
    $PHPMailer->addAddress("exodiadeini@gmail.com"); // email do destinatario.
    //$PHPMailer->addReplyTo('siqueiramoises14@gmail.com', "$nome");

    $PHPMailer->Subject = "Contato de $nome sobre o projeto GIS"; 
    $PHPMailer->Body = "<p>".$informacoes."</p>Email para cadastrar: <p>".$emailEnviando."</p>";

    if($PHPMailer->Send()){
      unset($PHPMailer);
      $msg['msgEnviar'] = "Seu email foi enviado com sucesso!!";
    }else{
      $msg['msgEnviar'] = "Erro ao enviar Email:" . $PHPMailer->ErrorInfo;
    }
  }
}
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
      <meta name=author content='G4 INI3B GIS'>

      <!-- favicon, arquivo de imagem podendo ser 8x8 - 16x16 - 32x32px com extensão .ico -->
      <link rel="shortcut icon" href="" type="image/x-icon">

      <!-- CSS PADRÃO -->
      <link href="css/landingPage/default.css" rel=stylesheet>

      <!-- Telas Responsivas -->
      <link rel=stylesheet media="screen and (max-width:480px)" href="css/landingPage/style480.css">
      <link rel=stylesheet media="screen and (min-width:481px) and (max-width:768px)" href="css/landingPage/style768.css">
      <link rel=stylesheet media="screen and (min-width:769px) and (max-width:1024px)" href="css/landingPage/style1024.css">
      <link rel=stylesheet media="screen and (min-width:1025px)" href="css/landingPage/style1366.css">

      <!-- Script -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="js/script.js"></script>

      <!-- Icon Font -->
      <script src="https://kit.fontawesome.com/2a85561c69.js"></script>
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
              <li><a href="loginLandingPage.php">Entrar</a></li>
              <li><a href="#">Contato</a></li>
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
                <p>Gerencie sua instituição com o GIS, criamos sistemas completos para sua escola, creche ou universidade. </p>
                <div class="botao-banner"><a href="#enviar-email">Comece agora</a></div>
              </div>
              <img src="imagens/ilustracao1.svg" alt="Ilustração sistema GIS" class="bannerIlus">

              <a href="#animHome"><div class="saibaMais">Saiba mais <i class="fas fa-angle-double-down"></i></div></a>
            </div>

            <div class="qual" id="animHome">
              <div class="animHome">
                <h1>Faça tudo com o GIS</h1>
                <div class="horario-icon">
                  <h2>Tenha o controle da sua rotina escolar</h2>

                  <svg version="1" id="horario_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 842 595"><style>.st9{opacity:.5;fill:#00cdcd;enable-background:new}.st10{fill:#9999ad}.st11{opacity:.8;fill:#f2f2f2;enable-background:new}.st12{font-family:&apos;Roboto&apos;;font-weight:500}.st13{font-size:65.0828px}.st14{opacity:.8}.st15{fill:#f2f2f2}.st16{font-size:27.6948px}</style><circle id="Elipse1" class="st9" cx="231" cy="142" r="142"/><circle id="Elipse2" class="st9" cx="671" cy="230" r="111"/><circle id="Elipse3" class="st9" cx="301" cy="471" r="124"/><g id="sete"><path id="retangulo1" class="st10" d="M614 177H264c-24 0-43-19-43-43v-29c0-24 19-43 43-43h350c23 0 43 19 43 43v29c0 24-20 43-43 43z"/><text transform="translate(259 142)" class="st11 st12 st13">07:00</text><g class="st14"><text transform="translate(448 125)" class="st15 st12 st16">Primeira aula</text></g></g><g id="seteciquenta"><path id="retangulo2" d="M678 310H328c-24 0-43-19-43-43v-29c0-24 19-43 43-43h350c23 0 43 19 43 43v29c0 24-20 43-43 43z" fill="#00cdcd"/><text transform="translate(323 273)" class="st11 st12 st13">07:50</text><g class="st14"><text transform="translate(513 257)" class="st15 st12 st16">Segunda aula</text></g></g><g id="oitoequarenta"><path id="retangulo3" class="st10" d="M643 444H293c-24 0-43-20-43-43v-30c0-23 20-43 43-43h350c24 0 43 20 43 43v30c0 23-19 43-43 43z"/><text transform="translate(289 410)" class="st11 st12 st13">08:40</text><g class="st14"><text transform="translate(478 393)" class="st15 st12 st16">Terceira aula</text></g></g></svg>

                </div>

                <div class="check-icon">
                <h2>Registre ausências e faça ocorrências de seus alunos</h2>

                  <svg version="1" id="Camada_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 842 595"><style>.st18{opacity:.5;fill:#00cdcd}.st19{opacity:.8;fill:#fff}.st20{fill:#3c3}.st21{opacity:.8;fill:#e6e6e6}</style><circle id="Elipse3" class="st18" cx="195" cy="441" r="83"/><circle id="Elipse2" class="st18" cx="384" cy="116" r="81"/><circle id="Elipse1_2_" class="st18" cx="640" cy="346" r="122"/><g id="check1"><path class="st19" d="M651 155l-67 5c-21 1-39-15-40-35s14-38 35-40l67-4c21-1 38 14 40 35 1 20-14 38-35 39z"/><ellipse transform="matrix(.9978 -.0665 .0665 .9978 -7 39)" class="st20" cx="583" cy="122" rx="32" ry="32"/></g><path id="retangulo1" class="st21" d="M352 170l-188 13c-7 0-12-4-12-10-1-7 4-12 10-12l189-13c6 0 11 4 12 10 0 7-5 12-11 12z"/><path id="retangulo1_1_" class="st21" d="M300 138l-69 4c-6 1-11-4-12-10 0-6 5-11 11-12l69-5c6 0 11 5 12 11 0 6-4 11-11 12z"/><g id="check2"><path class="st19" d="M659 275l-67 4c-21 2-39-14-40-34-1-21 14-38 35-40l67-4c21-2 38 14 40 34 1 21-14 39-35 40z"/><ellipse transform="matrix(.9978 -.0665 .0665 .9978 -14 44)" cx="655" cy="238" rx="32" ry="32" fill="#c33"/></g><path id="retangulo1_3_" class="st21" d="M338 289l-189 12c-6 1-11-4-12-10 0-6 5-12 11-12l189-13c6 0 11 5 11 11 1 6-4 11-10 12z"/><path id="retangulo1_2_" class="st21" d="M276 256l-69 5c-7 0-12-4-12-11-1-6 4-11 10-11l69-5c7 0 12 4 12 10 1 6-4 12-10 12z"/><g id="chekc3"><path class="st19" d="M667 393l-67 5c-21 1-39-14-40-35-2-20 14-38 34-39l68-5c20-1 38 14 40 35 1 20-15 38-35 39z"/><ellipse transform="matrix(.9978 -.0665 .0665 .9978 -23 41)" class="st20" cx="599" cy="360" rx="32" ry="32"/></g><path id="retangulo1_5_" class="st21" d="M378 407l-188 13c-7 0-12-5-12-11-1-6 4-11 10-12l189-12c6-1 11 4 12 10 0 6-4 12-11 12z"/><path id="retangulo1_4_" class="st21" d="M288 375l-69 4c-6 1-11-4-12-10 0-6 5-12 11-12l69-5c6 0 11 5 12 11 0 6-4 11-11 12z"/></svg>

                </div>

                <div class="notas-icon">
                <h2>Calcule notas e gere boletins</h2>

                  <svg version="1" id="Camada_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 842 595"><style>.st23{opacity:.5;fill:#00cdcd}.st24{opacity:.9;fill:#39f}.st22{font-family:&apos;Roboto&apos;;font-weight:500}.st25{font-size:156.7808px}</style><circle id="Elipse1" class="st23" cx="665" cy="327" r="131"/><circle id="Elipse1_1_" class="st23" cx="148" cy="102" r="89"/><circle id="Elipse1_2_" class="st23" cx="338" cy="458" r="112"/><text transform="rotate(2 -10291 5526) scale(.99995)" class="st24 st22" font-size="85">6,5</text><text transform="rotate(7 -2059 1404)" class="st24 st22 st25">9</text><text transform="rotate(7 -1887 4412)" class="st24 st22 st25">7,7</text><text transform="rotate(-9 1965 -1716)" class="st22" font-size="92" fill="#f36">4,2</text><path id="retangulo1" d="M569 424H440c-21 0-38-17-38-38v-21c0-21 17-38 38-38h129c21 1 38 18 38 38v21c0 21-17 38-38 38z" fill="#9999ad"/><text transform="translate(444 397)" class="st22" font-size="60" fill="#f2f2f2">6,85</text></svg>

                </div>
              </div>

              <a href="#enviar-email" id="enviar-email"><div class="btm-email"><i class="fas fa-paper-plane"></i> Envie-nos um e-mail</div></a>
              <a href="#"><div class="btm-email"><i class="fas fa-user"></i> Já sou um cliente</div></a>
            </div>
              
            <form class="registro" id="contato" method="post">
            <h3 id="h3">Registre-se</h3>
            <input type="text" name="firstname" placeholder="Seu nome">
            <br>
            <input type="text" name="email" placeholder="Seu e-mail" id="email" onblur="return validaEmail()">
            <?php
              if(array_key_exists('errEmail', $msg)){
                echo $msg['errEmail'];
              }
            ?>
            <br>
            <input type="text" name="confEmail" placeholder="Confirme seu email" id="confEmail" onblur="return confirmarEmail()">
            <?php
            ?>
            <br>
            <input type="password" name="senha" placeholder="Crie uma senha" id="senha">
            <br>
            <input type="password" name="confSenha" placeholder="Confirme sua senha" id="confSenha" onblur="return confirmarSenha()">
            <br>
            <?php
              if(array_key_exists('camposVazios', $msg)){
                echo $msg['camposVazios'];
              }

              if(array_key_exists('msgEnviar', $msg)){
                echo $msg['msgEnviar'];
              }
            ?>
            <h4></h4>
            <br>
            <input type="submit" value="Enviar" id="enviar">
            <br>
                <p>Ao se cadastrar, você concorda com nossos <a>Termos de uso</a></p>
          </form>
                
        </main>

        <footer>
          <a href="#banner"><i class="fas fa-chevron-up"></i></a>

          <a class="selecionado">Home</a>
          <a href="loginLandingPage.php">Entrar na Conta</a>
          <a href="contatoLandingPage.php">Contato</a>
          <a href="#">Sobre Nós</a>

        </footer>

    </div>
    

  </body>

</html>
