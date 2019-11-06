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

if(isset($_REQUEST['codTurma'])){
    $codTurma = filter_var($_REQUEST['codTurma'], FILTER_SANITIZE_NUMBER_INT);
}else{
    $codTurma = 0;
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
        <script src='../../../js/jquery.mask.min.js'></script>
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
                    <?php echo "url:'codCadAlunos.php?codTurma=$codTurma',";?>
                    type: 'POST',
                    data: $('.form').serialize(),
                    success: function (data) {
                        if (data != '') {
                            if(data == 'errCod'){   
                                ajaxCallBack(); 
                                $('.recebeDados').html("<p>Você não escolheu nenhuma turma, volte e selecione a turma que deseja cadastrar os alunos!</p>");
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
    </head>
    <body>
        <div class="content">

            <header class="headerPrimeiroAcesso">
            <!-- <a href="../../alterarAcc.php"><img src="../img/alteraImg.png"></a>
            <a href="../cadastroDeInst/cadastroDeInst.php"><img src="../img/instImg.png"></a> -->
            <a href="cadAlunos.php"><img src="../../../primeiroCadastroMaster/img/unidImg.png"></a>
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
                    
                    <h1>Cadastre os alunos:</h1>

                    <form class='form' method='post' autocomplete='off'>
                        

                        <label id="nome_label">Nome do Aluno: </label>
                        <input class='unid' id='IdNome0' name='nome0' type='text' />

                        <label id="cpf_label">CPF do Aluno: </label>
                        <input class='unid' id='IdCPF0' name='CPF0' type='text' />

                        <label id="data_nasc_label">Data de nascimento do Aluno: </label>
                        <input class='unid' id='IdDataNasc0' name='DataNasc0' type='text' />
                        
                        <label id="data_entrada_label">Data de entrada do Aluno: </label>
                        <input class='unid' id='IdDataEntrada0' name='DataEntrada0' type='text' />


                        <div id="rightDiv"></div> <!-- div q recebe os novos inputs -->
                        <div class='recebeDados' id='div'></div> <!-- div que recebe dados do ajax -->
                        <span id="eventBtn"><img src="../../../imagens/more.png" alt=""></span><!-- botão pra adicionar inputs  -->
                        <span class="table-remove"><img src="../../../imagens/exclude.png" alt=""></span> <!-- botão pra remover inputs  -->
                        <div class="puto"><input type="submit" value="Cadastrar Alunos" class="VAISEFUDE" /></div> <!-- botão subtmit do formulário -->
                        
                        <input type="hidden" value="1" name="AcoordA" id="hidden"/>
                    </form>

                    
                    <!-- <a href='../cadastroDeInst/cadastroDeInst.php' class="buttonNext">Voltar</a> -->
                    
            </main>  
        <script type="text/javascript">
        function ajaxCallBack(){
            $('#agaref').removeAttr('href').attr('href', 'javascript: window.history.go(-2);');
        }

        var increment=1;

        /** Função duplicar formulários - cadastro de unidades */
        $(document).ready(function() {
            $("#IdCPF0").mask("000.000.000-00");
            $("#IdDataNasc0").mask("00/00/0000");
            $("#IdDataEntrada0").mask("00/00/0000");

            $("#eventBtn").click(function(){

            $('#coordenadores').clone().appendTo("#rightDiv").removeAttr('id');

            $('#nome_label').clone().appendTo('#rightDiv').removeAttr('id');
            $('#IdNome0').clone().appendTo('#rightDiv').attr("name","nome"+ increment).attr("id", "IdNome"+increment);
            document.getElementById('IdNome'+increment).value = '';

            $('#cpf_label').clone().appendTo('#rightDiv').removeAttr('id');
            $('#IdCPF0').clone().appendTo('#rightDiv').attr("name","CPF"+ increment).attr("id", "IdCPF"+increment);
            document.getElementById('IdCPF'+increment).value = '';

            $('#data_nasc_label').clone().appendTo('#rightDiv').removeAttr('id');
            $('#IdDataNasc0').clone().appendTo('#rightDiv').attr("name","DataNasc"+ increment).attr("id", "IdDataNasc"+increment);
            document.getElementById('IdDataNasc'+increment).value = '';

            $('#data_entrada_label').clone().appendTo('#rightDiv').removeAttr('id');
            $('#IdDataEntrada0').clone().appendTo('#rightDiv').attr("name","DataEntrada"+ increment).attr("id", "IdDataEntrada"+increment);
            document.getElementById('IdDataEntrada'+increment).value = '';

            increment++;
            $('#hidden').attr("value", increment);
            
            var i;
            for(i = 1; i <= increment; i++){
                $("#IdCPF"+i).mask("000.000.000-00");
                $("#IdDataNasc"+i).mask("00/00/0000");
                $("#IdDataEntrada"+i).mask("00/00/0000");
            }
        });

        $(".table-remove").click(function(){
            
            $("#rightDiv > input:last").remove();
            $("#rightDiv > label:last").remove();
            $("#rightDiv > input:last").remove();
            $("#rightDiv > label:last").remove();
            $("#rightDiv > input:last").remove();
            $("#rightDiv > label:last").remove();
            $("#rightDiv > input:last").remove();
            $("#rightDiv > label:last").remove();
            
            increment--;
            if(increment < 0){
                increment = 0;
            }
        
    });
});
        </script>
    </body>
</html>