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

                a{
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
            <div class="alunos">
                <h1>Você quer ver as disciplinas de qual curso?</h1>
                <?php
                $codUnid = $dados['codUnidadeUsu'];
                $selecionar = ("select cursos.cod_curso, nome_curso, cod_status_cursos, cursos_unidade.cod_unid, cod_status_cursos_unid
From cursos inner join cursos_unidade on (cursos.cod_curso = cursos_unidade.cod_curso) where cod_unid = $codUnid and cod_status_cursos = 'A' and cod_status_cursos_unid = 'A';");
                $comando = $pdo->prepare($selecionar);
                $comando->execute();

                $numDeLinhas = $comando->rowCount();

                if($numDeLinhas == 0){
                    echo 'Os cursos ainda não foram cadastrados, fale com o diretor para cadastrá-los!!';
                }else{
                    while($dedos = $comando->fetch(PDO::FETCH_ASSOC)){
                        $codCurso = $dedos['cod_curso'];
                        $nomeCurso = $dedos['nome_curso'];

                       echo  "<a href='verTurmas.php?codCurso=$codCurso'>$nomeCurso</a><br>";
                    }
                    
                    
                    
                }

                ?>
            </div>
            </main>  
        
    </body>
</html>