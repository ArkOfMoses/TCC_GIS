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
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Primeiro cadastro</title>    
        <link rel="stylesheet" href="../../css/default.css">    
        <script src='../js/jquery-3.3.1.min.js'></script>
        <!-- CSS PADRÃO -->
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

        <!-- Telas Responsivas -->
        <link rel=stylesheet media="screen and (max-width:480px)" href="../../css/cssCadastroMaster/style480.css">
        <link rel=stylesheet media="screen and (min-width:481px) and (max-width:768px)"
              href="../../css/cssCadastroMaster/style768.css">
        <link rel=stylesheet media="screen and (min-width:769px) and (max-width:1024px)"
              href="../../css/cssCadastroMaster/style1024.css">
        <link rel=stylesheet media="screen and (min-width:1025px)" href="../../css/cssCadastroMaster/style1366.css">
        <style type="text/css">
                
                img.perfil-foto{

                    width: 176px;
                    height:176px;
                    border-radius: 100%;
                    border: 3px solid;
                    border-color: #666;
                    z-index: 1;
                }
        </style>

        <!-- <style>
            
            .headerPrimeiroAcesso a:nth-child(4){
                display:none;
            }
            .headerPrimeiroAcesso a:nth-child(5){
                display:none;
            }
            .headerPrimeiroAcesso a:nth-child(6){
                display:none;
            }
        </style> -->
        <script src='../../js/jquery-3.3.1.min.js'></script>
        <script>
                $(function () {
                    $('.form').submit(function () {
                        $.ajax({
                            url: 'envia.php',
                            type: 'POST',
                            data: $('.form').serialize(),
                            success: function (data) {
                                if (data != '') {
                                    $('.recebeDados').html(data);
                                    document.getElementById('visor').value = '';
                                    document.getElementById('visor1').value = '';
                                    document.getElementById('visor2').value = '';
                                    document.getElementById('complUnid').value = '';
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
            <a href="../cadastroDeUnid/cadastroDeUnid.php"><img src="../img/unidImg.png"></a>
            <!-- <a href="../cadastroDeDir/cadastroDir.php"><img src="../img/dirImg.png"></a>
            <a href="../enviarEmail.php"><img src="../img/emailImg.png"></a>                
            <a href="../confirmarDados.php"><img src="../img/confirmaImg.png"></a> -->


            </header>

            <main>
                <div class="acessoUm">



                    <?php                      
                        echo '<img src=../../'.$img.' class="perfil-foto">';
                    // echo $img;
                    ?>
                    <p>Cadastre as unidades de sua instituição:</p>
                    <form class='form' method='post' action=''>
                        
                        <label>Unidades de ensino:</label>
                        <label>Nome da Unidade: </label><input class='unid' id='visor' name='unid' type='text' />
                        <label>CEP da Unidade: </label><input class='unid' id='visor1' name='cepUnid' type='text' />
                        <label>Número da Unidade: </label><input class='unid' id='visor2' name='numUnid' type='number' />
                        <label>Complemento da Unidade: </label><input class='unid' name='complUnid' id='complUnid' type='text'/>
                        <input name='enviar' id="plus" value="+" type='submit'>
                    </form>
                    <div class='recebeDados' id='div'>
                        <?php
                        require_once '../funcoes/funcoes.php';
                        require_once '../../bd/conexao.php';

                        $dadosUnid = get_unid($pdo);
                        for($i = 0; $i < count($dadosUnid); $i++){
                            $xis = $dadosUnid[$i];
                            echo $xis['nomeUnid'] . " - " . $xis['cepUnid'] . " - " . $xis['numUnid'] . " - " . $xis['complUnid'] ."<br>";   
                        }
                        ?>
                    </div>

                    <a href='../cadastroDeInst/cadastroDeInst.php' class="buttonNext">Voltar</a>
                    <a href='../cadastroDeDir/cadastroDeDir.php' class="buttonNext">Proximo passo</a>
            </main>    
    </body>
</html>