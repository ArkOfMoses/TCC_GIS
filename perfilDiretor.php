<?php

// código que pega as operações

// puxar o link e colocar o "FOR" lá embaixo

// Puxar algumas informações de usuário (Ex: nome)

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
      <link href="css/default.css" rel=stylesheet>

      <!-- Telas Responsivas -->
      <link rel=stylesheet media="screen and (max-width:480px)" href="css/perfilProfessor/style480.css">
      <link rel=stylesheet media="screen and (min-width:481px) and (max-width:768px)" href="css/perfilProfessor/style768.css">
      <link rel=stylesheet media="screen and (min-width:769px) and (max-width:1024px)" href="css/perfilProfessor/style1024.css">
      <link rel=stylesheet media="screen and (min-width:1025px)" href="css/perfilProfessor/style1366.css">

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
            <a class="profile-photo-menu" style="/*background-image: url()!important;*/"></a>

            <ul>
              <li><a href="#" class="title">Nome da Professora</a></li>
              <li><a href="#" class="subtitle">Nome da Instituição</a></li>
            </ul>
            <hr>

            <ul class="menu-buttons">
              <!-- <li><a href="funcionalidades/operacaoCursos/cursos.php"><i class="fas fa-list"></i> Cursos</a></li> -->
              <li><a href="funcionalidades/operacaoCursos/cursos.php"><i class="far fa-clock"></i> Cursos</a></li>
              <li><a href="funcionalidades/operacaoDisciplinas/verCursos.php"><i class="far fa-clock"></i> Disciplinas</a></li>
              <li><a href="#"><i class="far fa-calendar-alt"></i> Eventos</a></li>
              <li><a href="#"><i class="fas fa-cogs"></i> Configurações</a></li>
              <li><a href="#"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
            </ul>

          </nav>
        </div>

        </header>

        <main>

          <div class="greetings">
            <h1>Bem vinda, Fulana!</h1>
            <div onclick="activateNotif()" class="profile-photo" style="/*background-image: url()!important;*/">
              <a>2</a>
            </div>
          </div>

          <section class="block um">
            <h2>Quinta-feira, 11 de Jul</h2>

            <div class="schedule scroll-box">
                <div class="item">
                  <span class="hour">7:00</span>
                  <div>
                    <span>INI3B</span>
                    <span>Sala 01</span>
                    <span>Matemática</span>
                  </div>
                </div>

                <div class="item select-item">
                  <span class="hour">7:50</span>
                  <div>
                    <span>INI3B</span>
                    <span>Sala 01</span>
                    <span>Matemática</span>
                    <a href="#" class="edit"><i class="fas fa-pencil-alt"></i></a>
                  </div>
                </div>

                <div class="item">
                  <span class="hour">8:40</span>
                  <div>
                    <span>INI3B</span>
                    <span>Sala 01</span>
                    <span>Matemática</span>
                  </div>
                </div>

                <div class="item">
                  <span class="hour">9:50</span>
                  <div>
                    <span>INI3B</span>
                    <span>Sala 01</span>
                    <span>Matemática</span>
                  </div>
                </div>

                <div class="item">
                  <span class="hour">10:40</span>
                  <div>
                    <span>INI3B</span>
                    <span>Sala 01</span>
                    <span>Matemática</span>
                  </div>
                </div>
              </div>

            <a href="#" class="standard-btn">Ver Semana</a>

          </section>

          <section class="block dois">
            <div class="calendario">
              <h2>Atividades do mês</h2>

              <!--<a href="#" id="volta">«</a>
              <a href="#" id="vai">»</a>-->

              <table id="anoAtual">
                <tbody>
                  <tr class="ano">
                    <td colspan="7">2019</td>
                  </tr>
                  <tr class="mes_title">
                    <td colspan="7">Janeiro</td>
                  </tr>
                </tbody>
                <tbody id="mes_1" class="mes">
                  <tr class="dias_title">
                    <td>Dom</td>
                    <td>Seg</td>
                    <td>Ter</td>
                    <td>Qua</td>
                    <td>Qui</td>
                    <td>Sex</td>
                    <td>Sab</td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                  </tr>
                  <tr>
                    <td>6</td>
                    <td>7</td>
                    <td>8</td>
                    <td class="select-date">9</td>
                    <td>10</td>
                    <td>11</td>
                    <td>12</td>
                  </tr>
                  <tr>
                    <td>13</td>
                    <td>14</td>
                    <td>15</td>
                    <td>16</td>
                    <td>17</td>
                    <td>18</td>
                    <td>19</td>
                  </tr>
                  <tr>
                    <td>20</td>
                    <td>21</td>
                    <td>22</td>
                    <td>23</td>
                    <td>24</td>
                    <td>25</td>
                    <td>26</td>
                  </tr>
                  <tr>
                    <td>27</td>
                    <td>28</td>
                    <td>29</td>
                    <td>30</td>
                    <td>31</td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>

              <a href="#" class="standard-btn">Ver calendário completo</a>

            </div>
          </section>

          <section id="on_off-notif" class="locked-background">

            <div class="block notif">
              <h2>Notificações Recentes</h2>

              <a onclick="activateNotif()" class="close"><i class="fas fa-times"></i></a>

              <div class="scroll-box">
                <div class="notif-item">

                </div>
                <div class="notif-item">

                </div>
                <div class="notif-item">

                </div>
                <div class="notif-item">

                </div>
                <div class="notif-item">

                </div>
                <div class="notif-item">

                </div>
                <div class="notif-item">

                </div>
                <div class="notif-item">

                </div>
              </div>

              <a href="#" class="edit"><i class=""></i></a>

            </div>

          </section>

        </main>

        <footer>

        </footer>

    </div>

  </body>

</html>
