<?php
session_start();
if (isset($_SESSION['logado'])) {
    $dados = $_SESSION['dadosUsu'];
    $img = $dados['fotoUsu'];
} else {
    unset($_SESSION['dadosUsu']);
    unset($_SESSION['logado']);
    session_destroy();
    header("Location: ../../../homeLandingPage.php");
}


if (isset($_REQUEST['codCurso'])) {
    $codCurso = filter_var($_REQUEST['codCurso'], FILTER_SANITIZE_NUMBER_INT);
} else {
    $codCurso = 0;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Primeiro cadastro</title>    
        <link rel="stylesheet" href="../../../css/default.css">    
        <script src='../../../js/jquery-3.3.1.min.js'></script>
        <!-- CSS PADRÃO -->
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

        <!-- Telas Responsivas -->
        <link rel=stylesheet media="screen and (max-width:480px)" href="../../../css/cssCadastrosOutros/style480.css">
        <link rel=stylesheet media="screen and (min-width:481px) and (max-width:768px)"
              href="../../../css/cssCadastrosOutros/style768.css">
        <link rel=stylesheet media="screen and (min-width:769px) and (max-width:1024px)"
              href="../../../css/cssCadastrosOutros/style1024.css">
        <link rel=stylesheet media="screen and (min-width:1025px)" href="../../../css/cssCadastrosOutros/style1366.css">
        <style type="text/css">

            img.perfil-foto{

                width: 176px;
                height:176px;
                border-radius: 100%;
                border: 3px solid;
                border-color: #666;
                z-index: 1;
            }

            input.VAISEFUDE {
                text-align: center;
                width: 240px;
                height: 50px;
                font-size: 26px;
                background: #00CCCC;
                font-weight: bold;
                color: white;
                border: 0 none;
                border-radius: 1px;
                cursor: pointer;
                padding: 10px 5px;
                margin: 10px 5px;
                text-decoration: none;
                border-radius: 15px;
            }

        </style>

    </head>
    <body>
        <div class="content">

            <header id="on_off">
            <div class="header">

                <a class="logo">
                    <?xml version="1.0" encoding="utf-8"?>
                    <!-- Generator: Adobe Illustrator 21.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                    <svg version="1.1" id="Logo" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 595.2 595.3"
                        style="enable-background:new 0 0 595.2 595.3;" xml:space="preserve">
                        <style type="text/css">
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
                        <linearGradient id="LetraG_2_" gradientUnits="userSpaceOnUse" x1="-130.1162" y1="-1.6877"
                            x2="-127.636" y2="-1.6877"
                            gradientTransform="matrix(120.0332 -207.9035 -207.9035 -120.0332 15416.1299 -26698.6406)">
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
                        <linearGradient id="Bola_2_" gradientUnits="userSpaceOnUse" x1="-127.1179" y1="-8.5597"
                            x2="-124.6378" y2="-8.5597"
                            gradientTransform="matrix(23.7034 -41.0554 -41.0554 -23.7034 2931.1543 -5073.1851)">
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
                      <li><a href="perfilProfessor.php"><i class="fas fa-home"></i>Home</a></li>
                      <li><a href="lista_salas.php"><i class="fas fa-list"></i> Lista de Turmas</a></li>
                      <li><a href="funcionalidades/operacaoPesquisarAlunos/pesquisa.php"><i class="far fa-clock"></i> Pesquisar Alunos</a></li>
                      <li><a href="#"><i class="far fa-calendar-alt"></i> Eventos</a></li>
                      <li><a href="#"><i class="fas fa-cogs"></i> Configurações</a></li>
                      <li><a href="#"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
                    </ul>
                            

                </nav>
            </div>
            </header>

            <main>
                <div class="acessoUm">
                    <div class="setinha">
                        <a id="agaref" href="javascript: window.history.go(-1);">
                            <img id="seta" src="../../../imagens/voltar_corAzul.png">
                        </a>
                    </div>

                    <h1>Cadastre as Turmas:</h1>

                    <form class='form' method='post' autocomplete='off'>

                        <label id="coordenadores">Turma:</label>

                        <label id="sigla_label">Sigla da Turma: </label>
                        <input class='unid' id='IdSigla0' name='sigla0' type='text' />

                        <label id="turno_label">Escolha o turno: </label>
                        <p id="puxar1">Manhã</p><input type="radio" id="IdCheck0" value="M" name="opcao0[]">

                        <p id="puxar2">Tarde</p><input type="radio" id="IdChecke0" value="T" name="opcao0[]">

                        <p id="puxar3">Noite</p><input type="radio" id="IdCheckee0" value="N" name="opcao0[]">
                        <div id="line"></div>


                        <div id="rightDiv"></div> <!-- div q recebe os novos inputs -->
                        <div class='recebeDados' id='div'></div> <!-- div que recebe dados do ajax -->
                        <span id="eventBtn"><img src="../../../imagens/more.png" alt=""></span><!-- botão pra adicionar inputs  -->
                        <span class="table-remove"><img src="../../../imagens/exclude.png" alt=""></span> <!-- botão pra remover inputs  -->
                        <div class="puto"><input type="submit" value="Cadastrar Turmas" class="VAISEFUDE" /></div> <!-- botão subtmit do formulário -->

                        <input type="hidden" value="1" name="AcoordA" id="hidden"/>
                    </form>


                    <!-- <a href='../cadastroDeInst/cadastroDeInst.php' class="buttonNext">Voltar</a> -->

            </main>  
            <script type="text/javascript">

                var increment = 1;

                function ajaxCallBack() {
                    $('#agaref').removeAttr('href').attr('href', 'javascript: window.history.go(-2);');
                }

                $(document).ready(function () {


                    $("#eventBtn").click(function () {


                        $('#coordenadores').clone().appendTo("#rightDiv").removeAttr('id');


                        $('#sigla_label').clone().appendTo('#rightDiv').removeAttr('id');
                        $('#IdSigla0').clone().appendTo('#rightDiv').attr("name", "sigla" + increment).attr("id", "IdSigla" + increment);
                        document.getElementById('IdSigla' + increment).value = '';


                        $('#turno_label').clone().appendTo('#rightDiv').removeAttr('id');
                        $('#puxar1').clone().appendTo('#rightDiv').removeAttr('id');
                        $('#IdCheck0').clone().attr("name", 'opcao' + increment + '[]').attr("id", "IdCheck" + increment).prop('checked', false).appendTo('#rightDiv');

                        $('#puxar2').clone().appendTo('#rightDiv').removeAttr('id');
                        $('#IdChecke0').clone().attr("name", 'opcao' + increment + '[]').attr("id", "IdChecke" + increment).prop('checked', false).appendTo('#rightDiv');

                        $('#puxar3').clone().appendTo('#rightDiv').removeAttr('id');
                        $('#IdCheckee0').clone().attr("name", 'opcao' + increment + '[]').attr("id", "IdCheckee" + increment).prop('checked', false).appendTo('#rightDiv');
                        // $('#email_label').clone().appendTo('#rightDiv');
                        // 
                        // document.getElementById('IdemailCoord'+increment).value = '';
                        $('#line').clone().appendTo('#rightDiv');
                        increment++;

                        $('#hidden').attr("value", increment);

                    });


                    $(".table-remove").click(function () {
                        $("#rightDiv > label:last").remove();
                        $("#rightDiv > label:last").remove();
                        $("#rightDiv > input:last").remove();
                        $("#rightDiv > label:last").remove();
                        $("#rightDiv > p:last").remove();
                        $("#rightDiv > input:last").remove();
                        $("#rightDiv > p:last").remove();
                        $("#rightDiv > input:last").remove();
                        $("#rightDiv > p:last").remove();
                        $("#rightDiv > input:last").remove();
                        increment--;
                        if (increment < 0) {
                            increment = 0;
                        }

                        $('#hidden').attr("value", increment);


                    });

                    $('.form').submit(function () {
                        $.ajax({
<?php echo "url: 'codCadTurmas.php?codCurso=$codCurso',"; ?>
                            type: 'POST',
                            data: $('.form').serialize(),
                            success: function (data) {
                                if (data != '') {
                                    if (data == 'errCod') {
                                        ajaxCallBack();
                                        $('.recebeDados').html("<p>Você não escolheu nenhum curso, volte e selecione o curso que deseja ver as turmas!</p>");
                                    } else {
                                        $('.recebeDados').html(data);
                                    }
                                }
                            }
                        });
                        return false;
                    });
                });
            </script>
    </body>
</html>