<?php
session_start();
require_once '../../bd/conexao.php';
require_once '../../primeiroCadastroMaster/funcoes/funcoes.php';
if(isset($_SESSION['logado'])){
    $dados =  $_SESSION['dadosUsu'];
    $img = $dados['fotoUsu'];
}else{
    unset($_SESSION['dadosUsu']);
    unset($_SESSION['logado']);
    session_destroy();
    header("Location: ../../homeLandingPage.php");
}
?>
<!DOCTYPE html>
<html>
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
            <link rel="shortcut icon" href="../../imagens/favicon.ico" type="image/x-icon">
      
            <!-- CSS PADRÃO -->
            <link href="../../css/default.css" rel=stylesheet>
      
            <!-- Telas Responsivas -->
            
            <link rel=stylesheet media="screen and (min-width:1025px)" href="../../css/telaNotas/style1366.css">
      
            <!-- Script -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="../../js/script.js"></script>
      
            <!-- Icon Font -->
            <script src="https://kit.fontawesome.com/2a85561c69.js"></script>         

            <style>
                .Selecionado {
                    color: red;
                }

                .NotSelecionado {
                    color: black;
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
                        <a class="profile-photo-menu" style="background-image: url()!important;"></a>

                        <ul>
                            <li><a href="#" class="title">Nome da Professora</a></li>
                            <li><a href="#" class="subtitle">Nome da Instituição</a></li>
                        </ul>
                        <hr>

                        <ul class="menu-buttons">
                            <li><a href="#"><i class="fas fa-list"></i> Lisa de Salas</a></li>
                            <li><a href="#"><i class="far fa-clock"></i> Horário</a></li>
                            <li><a href="#"><i class="far fa-calendar-alt"></i> Eventos</a></li>
                            <li><a href="#"><i class="fas fa-cogs"></i> Configurações</a></li>
                            <li><a href="#"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
                        </ul>

                    </nav>
                </div>
            </header>
            <main>
                <div class="headerNotas">
                <!--Desculpa Front, de verdade memo-->

                <?php
                $codUnid = $dados['codUnidadeUsu'];
                $codProf = $dados['codUsu'];

                /*esse pedaço é 100% só pra nn dar erro*/
                if(isset($_REQUEST['codTurma'])){
                    $codTur = filter_var($_REQUEST['codTurma'], FILTER_VALIDATE_INT);
                    if(isset($_REQUEST['codDis'])){
                        $codDisciplin = filter_var($_REQUEST['codDis'], FILTER_VALIDATE_INT);
                    }else{
                        $codDisciplin = 0;
                    }
                }else{
                    $codTur = 0;
                }

                $command = $pdo->prepare("select turma.cod_tur, sigla_tur, cod_status_tur, prof_turma_disc.cod_disc, disciplina.nome_disc
                from cursos inner join turma on (cursos.cod_curso = turma.cod_curso)
                            inner join cursos_unidade on (cursos_unidade.cod_curso = cursos.cod_curso) 
                            inner join prof_turma_disc on (prof_turma_disc.cod_tur = turma.cod_tur)
                            inner join disciplina on (prof_turma_disc.cod_disc = disciplina.cod_disc) where cod_unid = $codUnid and prof_turma_disc.cod_usu = $codProf 
                            and cod_status_tur = 'A' and cod_status_cursos = 'A' and cod_status_cursos_unid = 'A' and prof_turma_disc.cod_status_prof_tur_disc = 'A' and disciplina.cod_status_disc = 'A';");
                
                $command->execute();
                $numLinhas = $command->rowCount();
                if($numLinhas == 0){
                    $outputExtra = '<h2>As turmas dessa unidade ainda não foram cadastradas ou você não dá aula a nenhuma turma dessa unidade</h2>';
                }else{         

                    if(isset($_REQUEST['codTurma']) && isset($_REQUEST['codDis'])){
                        //SO CO RO
                        $selecSeguran = $pdo->prepare("select turma.cod_tur, sigla_tur, cod_status_tur, prof_turma_disc.cod_disc, disciplina.nome_disc
                        from cursos inner join turma on (cursos.cod_curso = turma.cod_curso)
                                    inner join cursos_unidade on (cursos_unidade.cod_curso = cursos.cod_curso) 
                                    inner join prof_turma_disc on (prof_turma_disc.cod_tur = turma.cod_tur)
                                    inner join disciplina on (prof_turma_disc.cod_disc = disciplina.cod_disc) where cod_unid = $codUnid and prof_turma_disc.cod_usu = $codProf and prof_turma_disc.cod_tur = $codTur and prof_turma_disc.cod_disc = $codDisciplin
                                    and cod_status_tur = 'A' and cod_status_cursos = 'A' and cod_status_cursos_unid = 'A' and prof_turma_disc.cod_status_prof_tur_disc = 'A' and disciplina.cod_status_disc = 'A';");
                        $selecSeguran->execute();
                        $numNaoPodeSerZero = $selecSeguran->rowCount();
    
                        if($numNaoPodeSerZero == 0){
                            $outputExtra = "<h2>Você não dá aula dessa disciplina nessa turma</h2>";
                        }
                    }


                        $codTurAnt = 0;

                        $infoTurmasDisc = array();
    
                        while($data = $command->fetch(PDO::FETCH_ASSOC)){
                            $sigla = $data['sigla_tur'];
                            $codTur = $data['cod_tur'];
                            $codDisc = $data['cod_disc'];
                            $nomeDisc = $data['nome_disc'];
    
                            if($codTur == $codTurAnt){
                                $keyUlt = array_key_last($infoTurmasDisc);
                                $infoDisc = $infoTurmasDisc[$keyUlt]['infoDisc'];
                                $infoDisc[$codDisc] = $nomeDisc;
                                $infoTurmasDisc[$keyUlt]['infoDisc'] = $infoDisc;
                            }else{
                                $infoTurmasDisc[] = [
                                    "siglaTurm" => $sigla,
                                    "codTur" => $codTur,
                                    "infoDisc" => [
                                        $codDisc => $nomeDisc
                                    ]
                                ];
    
                                $codTurAnt = $codTur;
                            }
                        }
    
                        
                        for($s = 0; $s < count($infoTurmasDisc); $s++){
                            $turma = $infoTurmasDisc[$s];
                
                            $codTurma = $turma['codTur'];
                            $siglaTurm = $turma['siglaTurm'];
                
                            echo "<div class='circulo-box'>";
                            echo "<button class='disc_$codTurma' value='$s' onclick='changeDisc($s, $codUnid, $codProf)'>$siglaTurm</button>";
                            echo "</div>";
                        }                
                }

                ?>

                </div>
                <div class="recebeDisc"></div>

                <?php
        
        $output = "
            <table class='table'>
                <tr>
                    <!--<th>Nº</th>-->
                    <th>Nome</th>
                    <th>A.D.</th>
                    <th>A.O.</th>
                    <th>A.A.</th>
            ";

if(!isset($outputExtra)){
    if(isset($_REQUEST['codTurma'])){
        if(isset($_REQUEST['codDis'])){

        $codTur = filter_var($_REQUEST['codTurma'], FILTER_VALIDATE_INT);
        $codDisciplin = filter_var($_REQUEST['codDis'], FILTER_VALIDATE_INT);

        $selectCodTurmaDisc = $pdo->prepare("select cod_turma_disc from turma_disciplina where cod_tur = $codTur and cod_disc = $codDisciplin;");
        $selectCodTurmaDisc->execute();

        if($selectCodTurmaDisc->rowCount() > 0){
            while($help = $selectCodTurmaDisc->fetch(PDO::FETCH_ASSOC)){
                $codTurmDisc = $help['cod_turma_disc'];
            }

            $selectAval = $pdo->prepare("select distinct tipo_avaliacao.cod_tipo_aval, nome_tipo_aval, avaliacao.cod_aval, nome_aval 
from tipo_avaliacao inner join avaliacao on (avaliacao.cod_tipo_aval = tipo_avaliacao.cod_tipo_aval)
                    inner join turma_aluno_nota_disc on (turma_aluno_nota_disc.cod_aval =avaliacao.cod_aval) where turma_aluno_nota_disc.cod_tur = $codTur and cod_turma_disc = $codTurmDisc and cod_status_aval = 'A';");
            $selectAval->execute();
            $numDeAval = $selectAval->rowCount();

            if($numDeAval <= 3){
                $output .= "
                    <th>M.F.</th>
                    <th>%F</th>
                <tr>";

            }else{
                $qtdAMais = $numDeAval-3;
                $infoAval = $selectAval->fetchAll(PDO::FETCH_ASSOC);
                for($r = 3; $r < count($infoAval); $r++){
                    $nomeAval = $infoAval[$r]['nome_aval'];

                    $output .= "
                            <th>$nomeAval</th>
                    ";
                }

                $output .= "
                    <th>M.F.</th>
                    <th>%F</th>
                <tr>";

            }
        }else{
            $outputExtra = "<h2>Essa turma não possui essa disciplina!</h2>";
        }


        $selectDisc = $pdo->prepare("select prof_turma_disc.cod_disc, nome_disc from prof_turma_disc 
        inner join disciplina on (disciplina.cod_disc = prof_turma_disc.cod_disc) where cod_tur = $codTur and cod_usu = $codProf and cod_status_disc = 'A' and cod_status_prof_tur_disc = 'A'");
        $selectDisc->execute();

        if($selectDisc->rowCount() == 0){
        $output = "<h2>Você não dá aula nessa turma ou a turma foi excluída!</h2>";
        }else{

            if(isset($qtdAMais)){
                $selectMudarCount = $pdo->prepare("select usuario.cod_usu, nome_usu from usuario inner join turma_aluno on (turma_aluno.cod_usu = usuario.cod_usu) where turma_aluno.cod_tur = $codTur;");
                $selectMudarCount->execute();
                $numAlunos = $selectMudarCount->rowCount();
                $mudarCountUsu = "mudarCountUsu($numAlunos);";

                $selectAlun = $pdo->prepare("select usuario.cod_usu, nome_usu, turma_aluno_nota_disc.cod_aval, vl_nota 
                from usuario inner join turma_aluno on (turma_aluno.cod_usu = usuario.cod_usu) 
                                inner join turma_aluno_nota_disc on (turma_aluno_nota_disc.cod_tur = turma_aluno.cod_tur and turma_aluno_nota_disc.cod_usu = turma_aluno.cod_usu) where turma_aluno_nota_disc.cod_tur = $codTur and turma_aluno_nota_disc.cod_turma_disc = $codTurmDisc order by nome_usu");
                $selectAlun->execute();

                $homicide = $selectAlun->fetchAll(PDO::FETCH_ASSOC);

                $arrayAlunoNota = array();
                $codAlunAnt = 0;

                $count = 2;
                ################################
                for($i = 0; $i < count($homicide); $i++) {
                    $codAlun = $homicide[$i]['cod_usu'];
                    $nomeAlun = $homicide[$i]['nome_usu'];
                    $codAval = $homicide[$i]['cod_aval'];
                    $vlNota = $homicide[$i]['vl_nota'];

                    
                    //é muito dificil explicar e entender oq tá acontecendo aqui, mas confia q dá bom
                    if($codAlun == $codAlunAnt){
                        $keyLast = array_key_last($arrayAlunoNota);

                        $beforPush = $arrayAlunoNota[$keyLast]["Notas"];
                        $beforPush[$count] = [
                            $codAval => $vlNota
                        ];
                        
                        $arrayAlunoNota[$keyLast]["Notas"] = $beforPush;
                        $count++;
                    }else{
                        $count = 2;
                        $arrayAlunoNota[] = [
                            "codAlun" => $codAlun,
                            "nomeAlun" => $nomeAlun,
                            "Notas" => [
                                1 => [$codAval => $vlNota]
                            ]
                        ];
                        $codAlunAnt = $codAlun;
                    }
                }

                for($l = 0; $l < count($arrayAlunoNota); $l++){
                    $infoAlun = $arrayAlunoNota[$l];
                    $codAlun = $infoAlun['codAlun'];
                    $nomeAlun = $infoAlun['nomeAlun'];

                    $output .= "
                    <input type='hidden' value='$codAlun' name='codUsu_$l'/>
                    <tr>
                        <td>
                            <input type='text' disabled value='$nomeAlun'/>
                        </td>";

                    $diversificativa = array();
                    $obrigatoria = array();
                    $atitudinal = array();

                    for($z = 1; $z <= count($infoAlun['Notas']); $z++){
                        $arrayAval = $infoAlun['Notas'][$z];
                        foreach ($arrayAval as $cod => $nota) {
                        $output .= "<td>
                                        <input type='number' value='$nota' name='avaliacao_{$l}_$z'/>
                                    </td>";

                        $selecTipo = $pdo->prepare("select cod_tipo_aval from avaliacao where cod_aval = $cod;");
                        $selecTipo->execute();
                        $dadsTip = $selecTipo->fetch(PDO::FETCH_ASSOC);
                        $tip = $dadsTip['cod_tipo_aval'];
                        switch ($tip) {
                            case 1:
                                $diversificativa[] = $nota;
                                break;

                            case 2:
                                $obrigatoria[] = $nota;
                                break;

                            case 3:
                                $atitudinal[] = $nota;
                                break;
                        }

                    }
                        if($z > 3){
                            $output .= "<input type='hidden' value='$cod' name='codAval_$z'/>";
                        }
                    }

                    $mediaDivers = array_sum($diversificativa)/count($diversificativa);
                    $mediaObrig = array_sum($obrigatoria)/count($obrigatoria);
                    $mediaAtit = array_sum($atitudinal)/count($atitudinal);

                    $media = substr((($mediaDivers * 0.7 + $mediaObrig * 0.9) / 2) + $mediaAtit, 0, 4);

                    //aqui a gente seleciona as faltas de cada um e coloca de value

                $output .= "<td>
                                <input type='number' disabled id='media_$l' value='$media'/>
                            </td>
                            <td>
                                <input type='number' disabled id='Faltas_$l' value='0'/>
                            </td>
                        </tr>";
                }

            $output .= "
                <input type='hidden' value='$codTur' name='codTurma'/>
                <input type='hidden' value='$codTurmDisc' name='codTurmDisc'/>
            </table>";


            }else{
                $checkTurAlunNotaDis = $pdo->prepare("select * from turma_aluno_nota_disc where cod_tur = $codTur and cod_turma_disc = $codTurmDisc;");
                $checkTurAlunNotaDis->execute();

                if($checkTurAlunNotaDis->rowCount() > 0){

                    $selectAlun = $pdo->prepare("select usuario.cod_usu, nome_usu, turma_aluno_nota_disc.cod_aval, vl_nota 
                    from usuario inner join turma_aluno on (turma_aluno.cod_usu = usuario.cod_usu) 
                                    inner join turma_aluno_nota_disc on (turma_aluno_nota_disc.cod_tur = turma_aluno.cod_tur and turma_aluno_nota_disc.cod_usu = turma_aluno.cod_usu) where turma_aluno_nota_disc.cod_tur = $codTur and turma_aluno_nota_disc.cod_turma_disc = $codTurmDisc order by nome_usu;");
                    $selectAlun->execute();


                    $massMurder = $selectAlun->fetchAll(PDO::FETCH_ASSOC); //EU JÁ NÃO SEI MAIS OQ EU TO FAZENDO


                    //muda o input type hidden countAlunos
                    $selectMudarCount = $pdo->prepare("select usuario.cod_usu, nome_usu from usuario inner join turma_aluno on (turma_aluno.cod_usu = usuario.cod_usu) where turma_aluno.cod_tur = $codTur;");
                    $selectMudarCount->execute();
                    $numAlunos = $selectMudarCount->rowCount();
                    $mudarCountUsu = "mudarCountUsu($numAlunos);";
                    ////////////

                    $arrayAlunoNota = array();
                    $codAlunAnt = 0;

                    for($i = 0; $i < count($massMurder); $i++) {
                        $codAlun = $massMurder[$i]['cod_usu'];
                        $nomeAlun = $massMurder[$i]['nome_usu'];
                        $codAval = $massMurder[$i]['cod_aval'];
                        $vlNota = $massMurder[$i]['vl_nota'];

                        if($codAlun == $codAlunAnt){
                            $keyLast = array_key_last($arrayAlunoNota);
                            $beforPush = $arrayAlunoNota[$keyLast]["Notas"];
                            $beforPush[$codAval] = $vlNota;
                            /*eu não sei oq eu to fazendo hsuahsuahsuah*/
                            
                            $arrayAlunoNota[$keyLast]["Notas"] = $beforPush;
                        }else{
                            $arrayAlunoNota[] = [
                                "codAlun" => $codAlun,
                                "nomeAlun" => $nomeAlun,
                                "Notas" => [
                                    $codAval => $vlNota
                                ]
                            ];
                            $codAlunAnt = $codAlun;
                        }
                    }


                    for($p = 0; $p < count($arrayAlunoNota); $p++){
                        $infoAlun = $arrayAlunoNota[$p];
                        $codAlun = $infoAlun['codAlun'];
                        $nomeAlun = $infoAlun['nomeAlun'];

                        $output .= "
                        <input type='hidden' value='$codAlun' name='codUsu_$p'/>
                        <tr>
                            <td>
                                <input type='text' disabled value='$nomeAlun'/>
                            </td>";

                        $count = 1;

                        foreach($infoAlun['Notas'] as $codAv => $nota){

                            if($codAv == $count){
                                $output .= "<td>
                                                <input type='number' value='$nota' name='avaliacao_{$p}_$codAv'/>
                                            </td>";
                            }else{
                                $output .= "<td>
                                                <input type='number' name='avaliacao_{$p}_$count'/>
                                            </td>";
                            }
                            $count++;
                        }

                        $media = (($infoAlun['Notas'][1] * 0.7 + $infoAlun['Notas'][2] * 0.9) / 2) + $infoAlun['Notas'][3];

                        //aqui a gente seleciona as faltas de cada um e coloca de value

                        $output .= "<td>
                                        <input type='number' disabled id='media_$p' value='$media'/>
                                    </td>
                                    <td>
                                        <input type='number' disabled id='Faltas_$p' value='0'/>
                                    </td>
                                </tr>";
                    }

                    $output .= "
                    <input type='hidden' value='$codTur' name='codTurma'/>
                    <input type='hidden' value='$codDisciplin' name='codDisciplina'/>
                </table>";

                }else{

                    $selectAlun = $pdo->prepare("select usuario.cod_usu, nome_usu from usuario inner join turma_aluno on (turma_aluno.cod_usu = usuario.cod_usu) where turma_aluno.cod_tur = $codTur order by nome_usu;");
                    $selectAlun->execute();
                    $numAlunos = $selectAlun->rowCount();
                    $massMurder = $selectAlun->fetchAll(PDO::FETCH_ASSOC); // EU JÁ NÃO SEI MAIS OQ EU TO FAZENDO

                    $mudarCountUsu = "mudarCountUsu($numAlunos);";


                    for($i = 0; $i < count($massMurder); $i++) {
                        $codAlun = $massMurder[$i]['cod_usu'];
                        $nomeAlun = $massMurder[$i]['nome_usu'];

                        //aqui a gente seleciona as faltas de cada um e coloca de value

                        $output .= "
                        <input type='hidden' value='$codAlun' name='codUsu_$i'/>
                        <tr>
                            <td>
                                <input type='text' disabled value='$nomeAlun'/>
                            </td>
                            <td>
                                <input type='number' name='avaliacao_{$i}_1'/>
                            </td>
                            <td>
                                <input type='number' name='avaliacao_{$i}_2'/>
                            </td>
                            <td>
                                <input type='number' name='avaliacao_{$i}_3'/>
                            </td>
                            <td>
                                <input type='number' disabled id='media_$i'/>
                            </td>
                            <td>
                                <input type='number' disabled id='Faltas_$i' value='0'/>
                            </td>
                        </tr>
                        ";
                    }

                    $output .= "
                        <input type='hidden' value='$codTur' name='codTurma'/>
                        <input type='hidden' value='$codDisciplin' name='codDisciplina'/>
                    </table>";
                }                                    
            }

        }

        }else{
            $output = "<h2>Selecione uma disciplina!</h2>";
        }

    }else{
    $output = "<h2>Selecione uma turma!</h2>";
    }

}else{
    $output = $outputExtra;
}

if(strlen($output) < 150){
    echo $output;
}else{
    echo "
    <form id='formNotas' method='post' action='codNotas.php'>
        $output
        <input type='submit' value='Enviar notas' />
        <input type='hidden' value='0' name='countUsu' id='hiddenUsu'/>
        <input type='hidden' value='4' name='countAval' id='hiddenAval'/>
        <div id='tabelasNotas'></div>
        <div class='recebeDados' id='div'></div>
    </form>
    ";
}
     
if(isset($mudarCountUsu)){
    echo '<span id="addTable"><img src="../../imagens/more.png"></span>
    <span class="table-remove"><img src="../../imagens/exclude.png"></span>';
}
?>

                <br>

                <div id="allTables">
                    <table id="addNotas_hidden">
                        <tr>
                            <th>
                                <select>
                                    <option value="0">Tipo:</option>
                                    <option value="1">A.D.</option>
                                    <option value="2">A.O.</option>
                                    <option value="3">A.A.</option>
                                </select>
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <input type='number' name='nota' id="nota" class="nota" value='0'/>
                            </td>
                        </tr>
                    </table>
                </div>    

                <script type="text/javascript">
                    function mudarCountUsu(count){
                            $('#hiddenUsu').attr("value", count);
                    }

                    function mudarCountAval(countAMais){
                        count = countAMais + 4;
                        $('#hiddenAval').attr("value", count);
                    }

                    function changeDisc(index, codUnid, codProf){

                        $.ajax({
                            type      : 'post',
                            url       : 'codButton.php',
                            data      :  {index: index, codUnid: codUnid, codProf: codProf},

                            success: function (response) {

                                if(response != ''){
                                    var arrayResponse = JSON.parse(response);
                                    var codTurm = arrayResponse['codTur'];
                                    var arrayDisc = arrayResponse['Disc'];

                                    var halfLink = "<a href='telaNotas.php?codTurma="+codTurm+"&codDis=";
                                    
                                    $('.recebeDisc').html('');

                                    $.each(arrayDisc, function( index, value ) {
                                        var fullLink = halfLink.concat(index+"' id='disc_"+index+"'>"+value+"</a><br>");
                                        var html = $.parseHTML(fullLink);
                                        $(html).css('color','black')
                                        $('.recebeDisc').append(html);  
                                    });                                   
                                    
                                    //$('.recebeDisc').html(response); 
                                }
                                                                            
                            },
                            error: function(){
                                alert('Falha!');
                            }
                        });
                    }

                    var incrementTabela= $("#hiddenAval").attr("value");


                    <?php
                    if(isset($_REQUEST['codTurma']) && isset($_REQUEST['codDis'])){
                        $codTurco = filter_var($_REQUEST['codTurma'], FILTER_VALIDATE_INT);
                        $codDisco = filter_var($_REQUEST['codDis'], FILTER_VALIDATE_INT);
                        echo "var valButton = $('.disc_$codTurco').attr('value');";
                        echo "changeDisc(valButton, $codUnid, $codProf);";
                        // echo "$('#disc_$codDisco').attr('style', '');";
                        // echo "$('#disc_$codDisco').css('color', 'red');";
                    }


                    if(isset($qtdAMais)){
                        echo "mudarCountAval($qtdAMais);";
                        echo "incrementTabela = $('#hiddenAval').attr('value');";
                    }


                    if(isset($mudarCountUsu)){
                        echo $mudarCountUsu;
                        echo "var countUsu = $('#hiddenUsu').attr('value');";
                    }   
                    ?>

                    $(document).ready(function () {
                        // $('#disc_4').attr('style', '');
                        // $('#disc_4').css('color', 'red');

                        $("#addTable").click(function () {
                            
                            var clone= $('#addNotas_hidden').clone().appendTo('#tabelasNotas').removeAttr('id');//clone simples da tabela
                            clone.find('.nota').remove();
                            nota= $('#nota');

                            for(var i = 0; i < countUsu; i++){                                   
                                var attr = 'avaliacao_' + i; //variavel nome+numero de usuarios                                                  
                                nota.clone().attr('name', attr + '_' + incrementTabela).appendTo(clone);
                            }
                            
                            
                            incrementTabela++;
                            $('#hiddenAval').attr("value", incrementTabela);

                        });

                        $(".table-remove").click(function () {
                            $("#tabelasNotas > table:last").remove();
                            incrementTabela--;
                            if(incrementTabela < 0){
                                incrementTabela = 0;
                            }
                            $('#hiddenAval').attr("value", incrementTabela);
                        });

                        $('#formNotas').submit(function () {
                            $.ajax({
                                url: 'codNotas.php',
                                type: 'POST',
                                data: $('#formNotas').serialize(),
                                success: function (data) {
                                    if (data != '') {
                                        //dá pra chamar uma função javascript aqui
                                        $('.recebeDados').html(data);
                                    }
                                }
                            });
                            return false;
                        });
                    });
                </script>      
        </main>
    </body>
</html>