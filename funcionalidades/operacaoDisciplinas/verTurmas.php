<?php session_start();
if(isset($_SESSION['logado'])){
    $dados =  $_SESSION['dadosUsu'];
    $img = $dados['fotoUsu'];
}else{
    unset($_SESSION['dadosUsu']);
    unset($_SESSION['logado']);
    session_destroy();
    header("Location: ../../homeLandingPage.php");
}

if(isset($_REQUEST['codCurso'])){
    $codCurso = filter_var($_REQUEST['codCurso'], FILTER_SANITIZE_NUMBER_INT);
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
                    <a id='agaref' href='verCursos.php'>
                        <img id="seta" src="../../imagens/voltar_corAzul.png">
                    </a>
                </div>
            <div class="alunos">
                <h1>Você quer ver as disciplinas de qual turma?</h1>
                <?php

                if(isset($_REQUEST['codCurso'])){
                    $selecionar = ("select sigla_tur, cod_tur from turma where cod_curso = $codCurso and cod_status_tur = 'A';");
                    $comando = $pdo->prepare($selecionar);
                    $comando->execute();
    
                    $numDeLinhas = $comando->rowCount();
    
                    if($numDeLinhas == 0){
                        echo '<p>As turmas ainda não foram cadastradas, fale com o diretor para cadastrá-las!!</p>';
                    }else{
                        while($dedos = $comando->fetch(PDO::FETCH_ASSOC)){
                            $codTurma = $dedos['cod_tur'];
                            $nomeTurma = $dedos['sigla_tur'];
    
                           echo  "<a class='botaozera' href='verDisc.php?codTurma=$codTurma'>$nomeTurma</a><br>";
                        }
                    }
                }else{
                    echo "<p>Você não escolheu nenhum curso, volte e selecione o curso que deseja ver as turmas!</p>";
                }


                ?>
            </div>
            </main>  
        
    </body>
</html>