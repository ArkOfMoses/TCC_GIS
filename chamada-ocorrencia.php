<?php
session_start();
if(isset($_SESSION['logado'])){
    $dados =  $_SESSION['dadosUsu'];
    $img = $dados['fotoUsu'];
}else{
    unset($_SESSION['dadosUsu']);
    unset($_SESSION['logado']);
    session_destroy();
    header("Location: homeLandingPage.php");
}
require_once 'bd/conexao.php';
$codTur = $_REQUEST['codTurma'];

$selecionar = ("select sigla_tur from turma where cod_tur = $codTur");
//$selecionar = ("select turma.cod_tur, sigla_tur, prof_turma.cod_usu, cod_status_prof_tur,  cursos.cod_curso, nome_curso, cod_status_cursos from cursos inner join turma on (cursos.cod_curso = turma.cod_curso) inner join prof_turma on (turma.cod_tur = prof_turma.cod_tur) where turma.cod_tur = $codTur;");
$comando = $pdo->prepare($selecionar);
$comando->execute();

while($dedos = $comando->fetch(PDO::FETCH_ASSOC)){
  $nomeTurma = $dedos['sigla_tur'];

}


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title> GIS Chamada - Ocorrências</title>

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
  <link href="css/default.css" rel=stylesheet>
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

  <!-- Telas Responsivas -->
  <link rel=stylesheet media="screen and (max-width:480px)" href="css/chamada-ocorrencia/chamada_ocorrencia480.css">
  <link rel=stylesheet media="screen and (min-width:481px) and (max-width:768px)"
    href="css/chamada-ocorrencia/chamada_ocorrencia768.css">
  <link rel=stylesheet media="screen and (min-width:769px) and (max-width:1024px)"
    href="css/chamada-ocorrencia/chamada_ocorrencia1024.css">
  <link rel=stylesheet media="screen and (min-width:1025px)" href="css/chamada-ocorrencia/chamada_ocorrencia1366.css">

  <!-- Script -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="js/script.js"></script>

  <!-- Icon Font -->
  <script src="https://kit.fontawesome.com/2a85561c69.js"></script>
      <script>
          $(function(){
              $('.form').submit(function(){
                  $.ajax({
                      <?php echo "url: 'codChamada.php?codTurma=$codTur',"?>
                      type: 'POST',
                      data: $('.form').serialize(),
                      success: function(data){
                          if(data != ''){
                              $('.erros').html(data);
                          }
                      }
                  });
                  return false;
              });
          });
      </script>
      <script type="text/javascript">
        window.history.forward();
        function noBack()
        {
            window.history.forward();
        }
</script>
</head>

<body onLoad="noBack();" onpageshow="if (event.persisted) noBack();" onUnload="">
  <!-- Barra de navegação -->
  <div class="content">

    <header id="on_off">
      <div class="header">

        <a class="logo">
          <?xml version="1.0" encoding="utf-8"?>
          <!-- Generator: Adobe Illustrator 21.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
          <svg version="1.1" id="Logo" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            x="0px" y="0px" viewBox="0 0 595.2 595.3" style="enable-background:new 0 0 595.2 595.3;"
            xml:space="preserve">
            <style type="text/css">
              .wow{
                list-style: none;
                text-decoration: none;
                color: black;
              }
              .st0 {
                fill: url(#LetraG_2_);
              }

              .st1 {
                fill: #006699;
              }

              .st2 {
                fill: url(#Bola_2_);
              }
            </style>
            <linearGradient id="LetraG_2_" gradientUnits="userSpaceOnUse" x1="-130.1162" y1="-1.6877" x2="-127.636"
              y2="-1.6877" gradientTransform="matrix(120.0332 -207.9035 -207.9035 -120.0332 15416.1299 -26698.6406)">
              <stop offset="0" style="stop-color:#00CCCC" />
              <stop offset="1" style="stop-color:#0066CC" />
            </linearGradient>
            <path id="LetraG_1_" class="st0"
              d="M297.2,0c-1.8,0-3.5,0-5.3,0C214.5,1.5,141.6,32.5,86.8,87.8C32,143.2,1,216.1,0,293.4
              	c-1,80.4,29.5,156.2,85.8,213.3c56.3,57,131.4,88.5,211.8,88.5c164.2,0,297.6-133.4,297.6-297.6c0-31.8-25.8-58-58.1-58
              	c-0.2,0-0.3,0-0.5,0l-103.4,1c-32.2,0-58.3,26-58.3,58.3c0,30.5,23.2,55.4,53,58c1.8,0.2,3.5,0.2,5.3,0.2l35.2-0.2l0,0h49.1
              	c-28.1,80.7-104.9,138.6-195.1,138.6c-74.3,0-139.4-39.2-175.8-98l0,0c-20.1-30.1-30.7-65.6-30.1-102.7
              	c1.5-96.5,81.1-176.6,177.6-178.3c1.1,0,2.1,0,3.2,0c41.8,0,82.2,14.3,114.1,40.5c3,2.5,6.2,4.7,9.7,6.4c8.4,4.4,17.7,6.6,26.9,6.6
              	c13,0,25.9-4.3,36.3-12.5c3.2-2.7,6.4-5.7,9.2-9.2c20.1-25,16.4-61.8-8.7-82.1C431.9,23.5,365.5,0,297.2,0" />
            <path id="Sombra_1_" class="st1"
              d="M517.6,357h-49.1l0,0c-7.2,21-18.3,40.4-32.5,57.2c0,0,0,0-0.2,0.2c0,0.2,0,0.2-0.2,0.5
              	c-3,3.2-6,6.7-9.2,9.9c-30.8,31-72.4,51.1-118.6,53.6c-2.2,0.2-4.2,0.2-6.4,0.2h-3.7c-6.5,0-12.9-0.3-19.2-1
              	c-5.7-0.6-11.3-1.5-16.9-2.6c-5.8-1.2-11.6-2.6-17.2-4.3c-4.9-1.5-9.8-3.2-14.6-5.2c-22.6-9.2-43.5-22.9-61.1-40.9
              	c-2.7-2.7-5.2-5.5-7.7-8.3c-5.2-6-10-12.3-14.3-18.7c36.4,58.8,101.5,98,175.8,98C412.7,495.6,489.5,437.7,517.6,357" />
            <linearGradient id="Bola_2_" gradientUnits="userSpaceOnUse" x1="-127.1179" y1="-8.5597" x2="-124.6378"
              y2="-8.5597" gradientTransform="matrix(23.7034 -41.0554 -41.0554 -23.7034 2931.1543 -5073.1851)">
              <stop offset="0" style="stop-color:#00CCCC" />
              <stop offset="1" style="stop-color:#0066CC" />
            </linearGradient>
            <path id="Bola_1_" class="st2" d="M358.1,297.7c0,18.9-8.9,35.6-22.8,46.3c-9.8,7.5-22.1,12-35.5,12h-2c-32.2,0-58.3-26-58.3-58.3
              	s26-58.3,58.3-58.3h2c13.4,0,25.7,4.5,35.5,12.1C349.2,262.1,358.1,278.9,358.1,297.7z" />
          </svg>

        </a>

        <label onclick="activateMenu()" class="hamburger">
          <?xml version="1.0" encoding="utf-8"?>
          <!-- Generator: Adobe Illustrator 21.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
          <svg version="1.1" id="Hamburger" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 220 150"
            style="enable-background:new 0 0 220 150;" xml:space="preserve">
            <style type="text/css">
              .st4 {
                fill: #003366;
              }
            </style>
            <g>
              <path class="st4"
                d="M220,10c0-5.5-4.5-10-10-10H10C4.5,0,0,4.5,0,10s4.5,10,10,10h200C215.6,20,220,15.6,220,10z" />
              <path class="st4"
                d="M210,65H98.9c-5.5,0-10,4.5-10,10s4.5,10,10,10H210c5.5,0,10-4.5,10-10S215.6,65,210,65z" />
              <path class="st4"
                d="M210,130H33.2c-5.5,0-10,4.5-10,10s4.5,10,10,10h176.9c5.5,0,10-4.5,10-10S215.6,130,210,130z" />
            </g>
          </svg>
        </label>

      </div>

      <div class="fullnav">
        <nav class="menu">
          <a class="profile-photo-menu" style="background-image: url()!important;"></a>

          <ul>
            <li><a href="#" class="title">Nome da Professora</a></li>
            <li><a href="#" class="subtitle">Nome da Instituição</a></li>
          </ul>
          <hr>

          <ul class="menu-buttons">
            <li><a href="lista_salas.php"><i class="fas fa-list"></i> Lista de Salas</a></li>
            <li><a href="#"><i class="far fa-clock"></i> Horário</a></li>
            <li><a href="#"><i class="far fa-calendar-alt"></i> Eventos</a></li>
            <li><a href="#"><i class="fas fa-cogs"></i> Configurações</a></li>
            <li><a href="#"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
          </ul>

        </nav>
      </div>

      <!-- Início conteúdo principal -->
      <?php echo "<form class='form' method='post' action=''>" ?>
      <div id="pagina">
        <div id="cabecalho">
          <a href="lista_salas.php">
            <img id="seta" src="imagens/voltar.png">
          </a>
          <div id="sala">
            
           <?php echo "<h2 id='turma'>$nomeTurma</h2>" ?>
          </div>
          <div id="horaSala">
            <select class="select-style" name="materias">
              <option>Escolha a Matéria</option>
              <?php
              $codUsu = $dados['codUsu'];
              $comand = $pdo->prepare("select disciplina.cod_disc, nome_disc from disciplina inner join prof_turma_disc on (disciplina.cod_disc = prof_turma_disc.cod_disc) where cod_usu = $codUsu and cod_status_prof_tur_disc = 'A' and cod_tur = $codTur;");
              $comand->execute();

              $numDeLinhas = $comand->rowCount();
              if ($numDeLinhas >= 1) {
                  while ($dados = $comand->fetch(PDO::FETCH_ASSOC)) {
                      $nomeDisc = $dados['nome_disc'];
                      $codDisc = $dados['cod_disc'];
                      echo "<option value='$codDisc'>$nomeDisc</option>";
                  }
              }
          
              ?>
          </select>
            <!-- <div id="hora">
              <h2>08:40</h2>
            </div>
            <div id="sala-atual"><span>Sala 7</span></div> -->
          </div>
        </div>

        <!-- Navegação entre ocorrência - sala -->
        <div class="tabs">
          <div class="tab-2">
            <label for="tab2-1"><a id="nometab">Lista de chamada</a></label>
            <input id="tab2-1" name="tabs-two" type="radio" checked="checked">

            <!--Seção - Lista de chamada -->
            <div id="conteudotab1">
              <div id="legenda">
                <div id="ausente">
                  <div id="vermelho"> <span id="ausPres">Ausente</span> </div>
                </div>
                <div id="presente">
                  <div id="verde"> <span id="ausPres">Presente</span> </div>
                </div>
              </div>
              
              

              <?php
               $selecionar = ("select usuario.cod_usu, nome_usu, turma_aluno.cod_tur from usuario inner join turma_aluno on (usuario.cod_usu = turma_aluno.cod_usu) where cod_tur = $codTur ORDER BY nome_usu ASC;");
               $comando = $pdo->prepare($selecionar);
               $comando->execute();
               $i = 1;
               while($dodois = $comando->fetch(PDO::FETCH_ASSOC)){
                $nomeAluno = $dodois['nome_usu'];
                $codAluno = $dodois['cod_usu'];
                echo "<div id='lista'>
                <div id='infoaluno'>
                  <span id='numAluno'> $i - <span id='nomeAluno'><b>$nomeAluno</b></span> </span>
                </div>
                <input class='apple-switch' name='opcao[]' value='$codAluno' type='checkbox'>
              </div>";
              $i++;
              }
              
              ?>


              

             
              <input type="submit" value="Confirmar">
              <div class="erros"></div>
              </form>

            </div>
          </div>


          <!--Seção - Ocorrências -->
          <div class="tab-2">
            <label for="tab2-2"><a id="nometab">Ocorrências</a></label>
            <input id="tab2-2" name="tabs-two" type="radio">

            <div id="conteudotab2">
              <?php
               $select = ("select url_foto_usu, usuario.cod_usu, nome_usu, turma_aluno.cod_tur from usuario inner join turma_aluno on (usuario.cod_usu = turma_aluno.cod_usu) where cod_tur = $codTur ORDER BY nome_usu ASC;");
               $comandoo = $pdo->prepare($select);
               $comandoo->execute();
               $i = 1;
              while($dedeis = $comandoo->fetch(PDO::FETCH_ASSOC)){
                $nomeAAluno = $dedeis['nome_usu'];
                $codUsuAluno = $dedeis['cod_usu'];
                $fotoAluno = $dedeis['url_foto_usu'];

                echo "<a href='codOcorrencia.php?codTurma=$codTur&codAluno=$codUsuAluno' class='wow'>
              <div id='dadosAluno'>";
              if($fotoAluno == NULL){
               echo  "<img src='imagens/pessoa.png' alt='Imagem do aluno' id='imgAluno'>";
              }else{
                echo "<img src='$fotoAluno' alt='Imagem do aluno' id='imgAluno'>";
              }
                echo "<span id='ocorrencia_nomeAluno'><b>$nomeAAluno</b>
                  <p id='ocorrencia_numAluno'>Número $i</p>
                </span>
              </div>
              </a>";
              $i++;
              }
              ?>
            </div>
          </div>
        </div>
      </div>
</body>

</html>
