<?php
session_start();
if(isset($_SESSION['logado'])){
    $dados =  $_SESSION['dadosUsu'];
    $img = $dados['fotoUsu'];
}else{
    unset($_SESSION['dadosUsu']);
    unset($_SESSION['logado']);
    session_destroy();
    header("Location: ../../../homeLandingPage.php");
}


if(isset($_REQUEST['codCurso'])){
    $codCurso = filter_var($_REQUEST['codCurso'], FILTER_SANITIZE_NUMBER_INT);
}else{
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

    </head>
    <body>
        <div class="content">

            <header class="headerPrimeiroAcesso">
            <!-- <a href="../../alterarAcc.php"><img src="../img/alteraImg.png"></a>
            <a href="../cadastroDeInst/cadastroDeInst.php"><img src="../img/instImg.png"></a> -->
            <a href="cadTurmas.php"><img src="../../../primeiroCadastroMaster/img/unidImg.png"></a>
            <!-- <a href="../cadastroDeDir/cadastroDir.php"><img src="../img/dirImg.png"></a>
            <a href="../enviarEmail.php"><img src="../img/emailImg.png"></a>                
            <a href="../confirmarDados.php"><img src="../img/confirmaImg.png"></a> -->


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

        var increment=1;

        function ajaxCallBack(){
            $('#agaref').removeAttr('href').attr('href', 'javascript: window.history.go(-2);');
        }

        $(document).ready(function() {


            $("#eventBtn").click(function(){
            

            $('#coordenadores').clone().appendTo("#rightDiv").removeAttr('id');


            $('#sigla_label').clone().appendTo('#rightDiv').removeAttr('id');
            $('#IdSigla0').clone().appendTo('#rightDiv').attr("name","sigla"+ increment).attr("id", "IdSigla"+increment);
            document.getElementById('IdSigla'+increment).value = '';


            $('#turno_label').clone().appendTo('#rightDiv').removeAttr('id');
            $('#puxar1').clone().appendTo('#rightDiv').removeAttr('id');
            $('#IdCheck0').clone().attr("name",'opcao'+ increment+'[]').attr("id", "IdCheck"+increment).prop('checked', false).appendTo('#rightDiv');

            $('#puxar2').clone().appendTo('#rightDiv').removeAttr('id');
            $('#IdChecke0').clone().attr("name",'opcao'+ increment+'[]').attr("id", "IdChecke"+increment).prop('checked', false).appendTo('#rightDiv');

            $('#puxar3').clone().appendTo('#rightDiv').removeAttr('id');
            $('#IdCheckee0').clone().attr("name",'opcao'+ increment+'[]').attr("id", "IdCheckee"+increment).prop('checked', false).appendTo('#rightDiv');
            // $('#email_label').clone().appendTo('#rightDiv');
            // 
            // document.getElementById('IdemailCoord'+increment).value = '';

            increment++;
            
            $('#hidden').attr("value", increment);
     
        });


        $(".table-remove").click(function(){
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
            if(increment < 0){
                increment = 0;
            }
            
            $('#hidden').attr("value", increment);
            
            
        });

        $('.form').submit(function () {
                $.ajax({
                    <?php echo "url: 'codCadTurmas.php?codCurso=$codCurso',";?>
                    type: 'POST',
                    data: $('.form').serialize(),
                    success: function (data) {
                        if (data != '') {
                            if(data == 'errCod'){   
                                ajaxCallBack(); 
                                $('.recebeDados').html("<p>Você não escolheu nenhum curso, volte e selecione o curso que deseja ver as turmas!</p>");
                            }else{
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