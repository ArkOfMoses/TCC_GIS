<?php
session_start();
if(isset($_SESSION['logado'])){
    $dados =  $_SESSION['dadosUsu'];
    $img = $dados['fotoUsu'];
}else{
    unset($_SESSION['dadosUsu']);
    unset($_SESSION['logado']);
    session_destroy();
    header("Location: ../../homeLandingPage.php");
}

if(isset($_REQUEST['codTurma'])){
    if($_REQUEST['codTurma'] != ''){
        $codTurma = filter_var($_REQUEST['codTurma'], FILTER_SANITIZE_NUMBER_INT);
    }
}

require_once '../../bd/conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Primeiro cadastro</title>    
        <link rel="stylesheet" href="../../css/default.css">    
        <!-- CSS PADRÃO -->
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

        <!-- Telas Responsivas -->
        <link rel=stylesheet media="screen and (max-width:480px)" href="../../css/cssCadastroMaster/style480.css">
        <link rel=stylesheet media="screen and (min-width:481px) and (max-width:768px)"
              href="../../css/cssCadastroMaster/style768.css">
        <link rel=stylesheet media="screen and (min-width:769px) and (max-width:1024px)"
              href="../../css/cssCadastroMaster/style1024.css">
        <link rel=stylesheet media="screen and (min-width:1025px)" href="../../css/cssCadastroMaster/style1366.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="../../js/script.js"> </script>
    </head>
    <body>
        <div class="content">

            <header class="headerPrimeiroAcesso">
            <!-- <a href="../../alterarAcc.php"><img src="../img/alteraImg.png"></a>
            <a href="../cadastroDeInst/cadastroDeInst.php"><img src="../img/instImg.png"></a> -->
            <!-- <a href="cadastroDeCoord.php"><img src="../../primeiroCadastroMaster/img/unidImg.png"></a> -->
            <!-- <a href="../cadastroDeDir/cadastroDir.php"><img src="../img/dirImg.png"></a>
            <a href="../enviarEmail.php"><img src="../img/emailImg.png"></a>                
            <a href="../confirmarDados.php"><img src="../img/confirmaImg.png"></a> -->

            <style type="text/css">
                .alunos{
                            display: flex;
                            flex-direction: column;
                            align-items: center;
                }
                .botaozin{
                  color: darkblue;
                  
                }
                a.botaozera{
                    text-align: center;
                    width: 135px;
                    height: 60px;
                    font-size: 18px;
                    background: #00CCCC;
                    font-weight: bold;
                    color: white;
                    border: 0 none;
                    cursor: pointer;
                    padding: 10px 5px;
                    margin: 10px 5px;
                    text-decoration: none;
                    border-radius: 15px;
                }
            </style>
            </header>

            <main>
            <div class="setinha">
                <?php
                if(isset($_REQUEST['codTurma'])){
                    if($_REQUEST['codTurma'] != ''){

                        $selectCurso = $pdo->prepare("select cursos.cod_curso from cursos 
                        inner join turma on (cursos.cod_curso = turma.cod_curso) where cod_tur = $codTurma and cod_status_cursos = 'A' and cod_status_tur = 'A'");
                        $selectCurso->execute();
                        $numLinhas = $selectCurso->rowCount();

                        if($numLinhas > 0){
                            $dads = $selectCurso->fetch(PDO::FETCH_ASSOC);
                            $codCurso = $dads['cod_curso'];
        
                            echo "
                            <a id='agaref' href='verTurmas.php?codCurso=$codCurso'>
                                <img id='seta' src='../../imagens/voltar_corAzul.png'>
                            </a>
                            ";
                        }else{
                            $selectExists = $pdo->prepare("select cod_status_tur from turma where cod_tur = $codTurma;");
                            $selectExists->execute();

                            if($selectExists->rowCount() > 0){
                                $queromorrer = $selectExists->fetch(PDO::FETCH_ASSOC);
                                $codStats = $queromorrer['cod_status_tur'];
          
                                if($codStats == 'A'){
                                    $msg = '<h2>ainda não cadastrou alunos nesta turma, cadastre-os no botão abaixo</h2>';

                                    $getCurso = $pdo->prepare("select cod_curso from turma where cod_tur = $codTurma;");
                                    $getCurso->execute();
                                    $aa = $getCurso->fetch(PDO::FETCH_ASSOC);
                                    $codCurs = $aa['cod_curso'];
                                    echo "
                                    <a id='agaref' href='verTurmas.php?codCurso=$codCurs'>
                                        <img id='seta' src='../../imagens/voltar_corAzul.png'>
                                    </a>";
                                }else{
                                    $msg = "<h2>Essa turma foi deletada, volte e escolha um curso disponível</h2>";
                                    echo "
                                    <a id='agaref' href='verTurmas.php'>
                                        <img id='seta' src='../../imagens/voltar_corAzul.png'>
                                    </a>";
                                }
                            }else{
                                $msg = "<h2>Essa turma não existe, volte e escolha um curso disponível</h2>";
                                echo "
                                <a id='agaref' href='verTurmas.php'>
                                    <img id='seta' src='../../imagens/voltar_corAzul.png'>
                                </a>";
                            }
                        }
                    }else{
                        $msg = "<h2>Você não selecionou a turma, volte e selecione a turma que quiser ver as disciplinas</h2>";
                        echo "
                        <a id='agaref' href='verTurmas.php'>
                            <img id='seta' src='../../imagens/voltar_corAzul.png'>
                        </a>";
                    }
                }else{
                    $msg = "<h2>Você não selecionou a turma, volte e selecione a turma que quiser ver as disciplinas</h2>";
                    echo "
                    <a id='agaref' href='verTurmas.php'>
                        <img id='seta' src='../../imagens/voltar_corAzul.png'>
                    </a>";
                }


                ?>

            </div>
            <div class='alunos'>
                <h1>Lista Disciplinas</h1>
                <?php

            if(isset($_REQUEST['codTurma'])){
                if($_REQUEST['codTurma'] != ''){
                    if(!isset($msg)){

                    $selecionar = ("select carga_horaria_disc, nome_disc, disciplina.cod_disc from turma_disciplina inner join disciplina on(turma_disciplina.cod_disc = disciplina.cod_disc) where cod_status_disc = 'A' and cod_status_tur_disc = 'A' and cod_tur = $codTurma;");
                    $comando = $pdo->prepare($selecionar);
                    $comando->execute();
    
                    $numDeLinhas = $comando->rowCount();
    
                    if($numDeLinhas == 0){
                        echo '<h2>As disciplinas ainda não foram cadastradas nesta turma, cadastre elas clicando no botão abaixo!!</h2>';
                    }else{
                        echo "<table>
                        <caption>Lista de Disciplinas</caption>
                        <tr>
                            <th>Nome da Disciplina</th>
                            <th>Carga Horária</th>
                            <th colspan='2'>Ações</th>
                        </tr>";
                        while($dedos = $comando->fetch(PDO::FETCH_ASSOC)){
                            $codDisc = $dedos['cod_disc'];
                            $nomeDisc = $dedos['nome_disc'];
                            $cargHora = $dedos['carga_horaria_disc'];
                            

                            echo '<tr>';
                            echo "<td>$nomeDisc</td>";
                            echo "<td>$cargHora</td>";
                            echo "<td><a class='botaozin' href='acoes/editarDisc.php?codDisc=$codDisc&codTurma=$codTurma'>Editar</a></td>";
                            echo "<td><a class='botaozin' id='confirma' href='acoes/excluirDisc.php?codDisc=$codDisc&codTurma=$codTurma'>Excluir</a></td>";
                            echo '</tr>';
                        }
                        echo "</table>";
                         
                        
                    }
                    
                    echo "<a class='botaozera' href='cadDisc/cadDisc.php?codTurma=$codTurma' >Adicionar Disciplinas</a>";
                    }else{
                        echo $msg;
                    }
                }else{
                    echo "<h2>Você não selecionou a turma, volte e selecione a turma que quiser ver as disciplinas</h2>";
                }
            }else{
                echo "<h2>Você não selecionou a turma, volte e selecione a turma que quiser ver as disciplinas</h2>";
            }

                ?>
               
            </div>
            </main>  
            <script type="text/javascript">
            $(document).ready(function(){
                $('#confirma').on('click', function () {
                    return confirm('você tem certeza disso? a exclusão de uma disciplina é permanente e não pode ser recuperada depois, todas as informações adjacentes também não poderão mais ser acessadas.');
                });         
            }) 
            </script>  
    </body>
</html>