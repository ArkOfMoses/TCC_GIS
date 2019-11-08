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
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Primeiro cadastro</title>    
        <link rel="stylesheet" href="../../css/default.css">    
        <script src='../../js/jquery-3.3.1.min.js'></script>
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
        $(function () {
            $('.form').submit(function () {
                $.ajax({
                    url: 'codCadProf.php',
                    type: 'POST',
                    data: $('.form').serialize(),
                    success: function (data) {
                        if (data != '') {
                            $('.recebeDados').html(data);
                            // document.getElementById('visor').value = '';
                            // document.getElementById('visor1').value = '';
                            // document.getElementById('visor2').value = '';
                            // document.getElementById('complUnid').value = '';
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
            <a href="cadastroDeCoord.php"><img src="../../primeiroCadastroMaster/img/unidImg.png"></a>
            <!-- <a href="../cadastroDeDir/cadastroDir.php"><img src="../img/dirImg.png"></a>
            <a href="../enviarEmail.php"><img src="../img/emailImg.png"></a>                
            <a href="../confirmarDados.php"><img src="../img/confirmaImg.png"></a> -->


            </header>

            <main>
                <div class="acessoUm">



                    <?php                      
                     if($img === NULL){
                        echo "<img src='../../imagens/perfil.png' class='perfil-foto'/>";
                    }else{
                        echo "<img src='../../$img' class='perfil-foto'>";
                    }
                    ?>
                    <p>Cadastre os professores de sua unidade:</p>
                    
                    <form class='form' method='post' action='codCadProf.php'>
                        
                        

                        <label id="nome_label">Nome do Professor: </label>
                        <input class='unid' id='IdnomeCoord0' name='coord0' type='text' />

                        <label id="email_label">Email do Professor: </label>
                        <input class='unid' id='IdemailCoord0' name='email0' type='text' />

                        <div id="line"></div>

                        <div id="rightDiv"></div> <!-- div q recebe os novos inputs -->
                        <div class='recebeDados' id='div'></div> <!-- div que recebe dados do ajax -->
                         <span id="eventBtn"><img src="../../imagens/more.png" alt=""></span> <!-- botão pra adicionar inputs  -->
                        <span class="table-remove"><img src="../../imagens/exclude.png" alt=""></span> <!-- botão pra remover inputs  -->
                        <div class="puto"><input type="submit" value="Proximo passo" class="buttonNext" /></div> <!-- botão subtmit do formulário -->
                        
                        <input type="hidden" value="1" name="AcoordA" id="hidden"/>
                    </form>

                    
                    <!-- <a href='../cadastroDeInst/cadastroDeInst.php' class="buttonNext">Voltar</a> -->
                    
            </main>  
        <script type="text/javascript">

        var increment=1;

        /** Função duplicar formulários - cadastro de unidades */
        $(document).ready(function() {

            


            $("#eventBtn").click(function(){
            

            $('#coordenadores').clone().appendTo("#rightDiv").removeAttr('id');

            
            $('#nome_label').clone().appendTo('#rightDiv').removeAttr('id');
            $('#IdnomeCoord0').clone().appendTo('#rightDiv').attr("name","coord"+ increment).attr("id", "IdnomeCoord"+increment);
            document.getElementById('IdnomeCoord'+increment).value = '';


            $('#email_label').clone().appendTo('#rightDiv');
            $('#IdemailCoord0').clone().appendTo('#rightDiv').attr("name",'email'+ increment).attr("id", "IdemailCoord"+increment);
            document.getElementById('IdemailCoord'+increment).value = '';



            increment++;
            
            $('#hidden').attr("value", increment);
            

            
        });
        $(".table-remove").click(function () {
                        
                        
                        $("#rightDiv > label:last").remove();
                        $("#rightDiv > input:last").remove();
                        $("#rightDiv > label:last").remove();
                        $("#rightDiv > input:last").remove();
                        
                        $("#rightDiv > div:last").remove();

                        increment--;
                        if (increment < 0) {
                            increment = 0;
                        }

                        $('#hidden').attr("value", increment);


                    });
        
    });
        </script>
    </body>
</html>