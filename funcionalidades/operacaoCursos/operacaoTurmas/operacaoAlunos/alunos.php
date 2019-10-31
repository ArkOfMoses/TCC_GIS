<?php
session_start();
if(isset($_SESSION['logado'])){
    $dados =  $_SESSION['dadosUsu'];
    $img = $dados['fotoUsu'];
}else{
    unset($_SESSION['dadosUsu']);
    unset($_SESSION['logado']);
    session_destroy();
    header("Location: ../../../../homeLandingPage.php");
}

$codTurma = $_REQUEST['codTurma'];
require_once '../../../../bd/conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Primeiro cadastro</title>    
        <link rel="stylesheet" href="../../../../css/default.css">    
        <!-- CSS PADRÃO -->
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

        <!-- Telas Responsivas -->
        <link rel=stylesheet media="screen and (max-width:480px)" href="../../../../css/cssCadastroMaster/style480.css">
        <link rel=stylesheet media="screen and (min-width:481px) and (max-width:768px)"
              href="../../../../css/cssCadastroMaster/style768.css">
        <link rel=stylesheet media="screen and (min-width:769px) and (max-width:1024px)"
              href="../../../../css/cssCadastroMaster/style1024.css">
        <link rel=stylesheet media="screen and (min-width:1025px)" href="../../../../css/cssCadastroMaster/style1366.css">
        
    </head>
    <body>
        <div class="content">

            <header class="headerPrimeiroAcesso">

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
                <h1>Lista de Alunos</h1>
                <?php

                $selecionar = ("select nome_usu, usuario.cod_usu from turma_aluno inner join usuario on(turma_aluno.cod_usu = usuario.cod_usu) where cod_status = 'A' and cod_status_usu = 'A' and cod_tur = $codTurma ORDER BY nome_usu ASC;");
                $comando = $pdo->prepare($selecionar);
                $comando->execute();

                $numDeLinhas = $comando->rowCount();

                if($numDeLinhas == 0){
                    echo 'Você ainda não cadastrou alunos nesta turma, cadastre-os no botão abaixo';
                }else{
                    $i = 1;
                    while($dedos = $comando->fetch(PDO::FETCH_ASSOC)){
                        $nomeUsu = $dedos['nome_usu'];
                        $codUsuAluno = $dedos['cod_usu'];
                        
                       echo  "<a href='#'>$i$nomeUsu</a><br>";
                       $i++;
                    }
                    
                    
                    
                }


                echo "<a href='cadAlunos/cadAlunos.php?codTurma=$codTurma'>Adicionar Alunos</a>";

                ?>
                
            </div>
            </main>  
        
    </body>
</html>