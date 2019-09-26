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
        <script src="../js/script.js" type="text/javascript"></script>
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
        <script>
        var increment=1;
        $(document).ready(function() {
  
  $("#eventBtn").click(function(){
    

  $('#unidade').clone().appendTo("#rightDiv").removeAttr('id');

  $('#select_funcionario').clone().appendTo('#rightDiv').removeAttr('id');
  
  $('#nome_label').clone().appendTo('#rightDiv').removeAttr('id');
  $('#visor').clone().appendTo('#rightDiv').attr("name","unid"+increment).attr("value","").removeAttr('id');

  $('#cep_label').clone().appendTo('#rightDiv');
  $('#visor1').clone().appendTo('#rightDiv').removeAttr('id').attr("name",'email'+increment).attr("value","");

  $('#num_label').clone().appendTo('#rightDiv');
  $('#visor2').clone().appendTo('#rightDiv').removeAttr('id').attr("name",'email'+increment).attr("value","");

  $('#compl_label').clone().appendTo('#rightDiv');
  $('#complUnid').clone().appendTo('#rightDiv').removeAttr('id').attr("name",'email'+increment).attr("value","");

  
  increment++;
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
                        
                        <label id="unidade">Unidades de ensino:</label>

                        <label id="nome_label">Nome da Unidade: </label>
                        <input class='unid' id='visor' name='unid0' type='text' />

                        <label id="cep_label">CEP da Unidade: </label>
                        <input class='unid' id='visor1' name='cepUnid0' type='text' />

                        <label id="num_label">Número da Unidade: </label>
                        <input class='unid' id='visor2' name='numUnid0' type='number' />

                        <label id="compl_label">Complemento da Unidade: </label>
                        <input class='unid' name='complUnid0' id='complUnid' type='text'/>
                        
                        

                        <div id="rightDiv"></div>

                    </form>
                    
                    <span id="eventBtn"><img src="../img/more.png" alt=""></span>
                    <!-- <a href='../cadastroDeInst/cadastroDeInst.php' class="buttonNext">Voltar</a> -->
                    <a href='../cadastroDeDir/cadastroDeDir.php' class="buttonNext">Proximo passo</a>
            </main>    
    </body>
</html>