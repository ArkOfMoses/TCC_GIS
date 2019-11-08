<?php session_start();
require_once '../../../bd/conexao.php';

if(isset($_SESSION['logado'])){
    $dados =  $_SESSION['dadosUsu'];
    $img = $dados['fotoUsu'];
}else{
    unset($_SESSION['dadosUsu']);
    unset($_SESSION['logado']);
    session_destroy();
    header("Location: ../../../homeLandingPage.php");
}

if(isset($_REQUEST['codTurma']) && isset($_REQUEST['codCurso'])){
    $codTurma = filter_var($_REQUEST['codTurma'], FILTER_SANITIZE_NUMBER_INT);
    $codCurso = filter_var($_REQUEST['codCurso'], FILTER_SANITIZE_NUMBER_INT);
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
        <link rel=stylesheet media="screen and (max-width:480px)" href="../../../css/cssCadastroMaster/style480.css">
        <link rel=stylesheet media="screen and (min-width:481px) and (max-width:768px)"
              href="../../../css/cssCadastroMaster/style768.css">
        <link rel=stylesheet media="screen and (min-width:769px) and (max-width:1024px)"
              href="../../../css/cssCadastroMaster/style1024.css">
        <link rel=stylesheet media="screen and (min-width:1025px)" href="../../../css/cssCadastroMaster/style1366.css">
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

        <script>
        $(function () {
            $('.form').submit(function () {
                $.ajax({
                    <?= "url: 'codEditarTurma.php?codTurma=$codTurma'," ?>
                    type: 'POST',
                    data: $('.form').serialize(),
                    success: function (data) {
                        if (data != '') {
                            $('.recebeDados').html(data);
                        }
                    }
                });
                return false;
            });
        });
        </script>
    </head>
    <body>
        <div class="content">

            <header class="headerPrimeiroAcesso">
            <!-- <a href="../../alterarAcc.php"><img src="../img/alteraImg.png"></a>
            <a href="../cadastroDeInst/cadastroDeInst.php"><img src="../img/instImg.png"></a> -->
            <a href="#"><img src="../../../primeiroCadastroMaster/img/unidImg.png"></a>
            <!-- <a href="../cadastroDeDir/cadastroDir.php"><img src="../img/dirImg.png"></a>
            <a href="../enviarEmail.php"><img src="../img/emailImg.png"></a>                
            <a href="../confirmarDados.php"><img src="../img/confirmaImg.png"></a> -->


            </header>

            <main>
                <div class="acessoUm">
                    <div class="setinha">
                        <?php echo "<a href='../turmas.php?codCurso=$codCurso'>";?>
                            <img id="seta" src="../../../imagens/voltar_corAzul.png">
                        </a>
                    </div>

                    
                    <?php
                        if(isset($_REQUEST['codTurma']) && isset($_REQUEST['codCurso'])){
                    ?>
                    <h1>Atualizar a Turma:</h1>
                    
                    <?php
                        $selectCurs = $pdo->prepare("select sigla_tur from turma where cod_tur = $codTurma");
                        $selectCurs->execute();
                        $select = $selectCurs->fetch(PDO::FETCH_ASSOC);

                        $nomeTurma = $select['sigla_tur'];
                            
                    ?>


                    <form class='form' method='post'>
                        <label id="coordenadores">Turma:</label>

                        <label id="sigla_label">Nome da Turma: </label>
                        <input class='unid' id='IdSigla0' name='nome_curso' type='text' <?="value='$nomeTurma'"?>/>

                        <div id="rightDiv"></div> <!-- div q recebe os novos inputs -->
                        <div class='recebeDados' id='div'></div> <!-- div que recebe dados do ajax -->
                        <div class="puto"><input type="submit" value="Atualizar Turma" class="VAISEFUDE" /></div> 
                    </form>
                    <?php
                        }else{
                            echo "<p>Você não escolheu nenhuma turma, volte e escolha qual turma você quer atualizar</p>";
                        }
                    ?>
                    
                    <!-- <a href='../cadastroDeInst/cadastroDeInst.php' class="buttonNext">Voltar</a> -->
                    
            </main>  
    </body>
</html>