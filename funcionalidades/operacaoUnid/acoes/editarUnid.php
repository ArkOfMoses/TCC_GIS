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
require_once '../../../bd/conexao.php';
$codUnid = $_REQUEST['codUnid'];


$selectBro = ("select * from unidade where cod_unid = $codUnid");
$comandoBro = $pdo->prepare($selectBro);
$comandoBro->execute();
while($dadas = $comandoBro->fetch(PDO::FETCH_ASSOC)){
    $nomeUnid = $dadas['nome_unid'];
    $cepUnid = $dadas['cep_unid'];
    $ruaUnid = $dadas['rua_unid'];
    $bairroUnid = $dadas['bairro_unid'];
    $cidadeUnid = $dadas['cidade_unid'];
    $numUnid = $dadas['num_unid'];
    $complUnid = $dadas['compl_unid'];
}

echo $nomeUnid;
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
        </style>

    </head>
    <body>
        <div class="content">

            <header class="headerPrimeiroAcesso">
            <!-- <a href="../../alterarAcc.php"><img src="../img/alteraImg.png"></a>
            <a href="../cadastroDeInst/cadastroDeInst.php"><img src="../img/instImg.png"></a> -->
            <a href="editarUnid.php"><img src="../../../primeiroCadastroMaster/img/unidImg.png"></a>
            <!-- <a href="../cadastroDeDir/cadastroDir.php"><img src="../img/dirImg.png"></a>
            <a href="../enviarEmail.php"><img src="../img/emailImg.png"></a>                
            <a href="../confirmarDados.php"><img src="../img/confirmaImg.png"></a> -->


            </header>

            <main>
                <div class="acessoUm">
                    <h1>Atualizar Unidades</h1>
                    <p class="vsf">Os campos que estiverem com * são de preenchimento obrigatório:</p>
                    <form class='form' method='post' action='envia.php'>

                        <label id="nome_label">*Nome da Unidade: </label>
                        <input class='unid' id='IdnomeUnid0' name='unid0' type='text' />

                        <!-- MENSAGEM DE ERRO DO CEP -->
                        <p id="getCEP0" style="color:red;"></p>


                        <label id="cep_label">*CEP da Unidade: </label>
                        <input class='unid' value='<?=$nomeUnid?>' id='IdcepUnid0' name='cepUnid0' type='text' />

                        <label id="rua_label">*Rua da Unidade: </label>
                        <input class='unid' id='ruaUnid0' name='ruaUnid0' type='text' />

                        <label id="bairro_label">*Bairro da Unidade: </label>
                        <input class='unid' id='bairroUnid0' name='bairroUnid0' type='text' />

                        <label id="cidade_label">*Cidade da Unidade: </label>
                        <input class='unid' id='cidadeUnid0' name='cidadeUnid0' type='text' />

                        <label id="num_label">*Número da Unidade: </label>
                        <input class='unid' id='IdNumUnid0' name='numUnid0' type='number' />

                        <label id="compl_label">Complemento da Unidade: </label>
                        <input class='unid' name='complUnid0' id='IdcomplUnid0' type='text'/>
                        <div class="blank"></div>

                         
                        <div class='recebeDados' id='div'></div> <!-- div que recebe dados do ajax -->
                        
                        <div class="puto"><input type="submit" value="Atualizar" class="buttonNext" id="submitUnid"/></div> <!-- botão subtmit do formulário -->
                        
                        <input type="hidden" value="1" name="unidades" id="hidden"/>
                    </form>
                    <!-- <a href='../cadastroDeInst/cadastroDeInst.php' class="buttonNext">Voltar</a> -->
                    
            </main>  
        <script type="text/javascript">
        function addmsg(){
            $('.recebeDados').text("por favor corrija os CEPs que não foram encontrados");
        }
        
        var increment=1;
        /** Função duplicar formulários - cadastro de unidades */
        $(document).ready(function() {

            $("#IdcepUnid0").mask("00000-000");

                //Quando o campo cep perde o foco.
                $('#IdcepUnid0').blur(function() {

                    //Nova variável "cep" somente com dígitos.
                    var cep = $(this).val().replace(/\D/g, '');

                    //Verifica se campo cep possui valor informado.
                    if (cep != "") {

                        //Expressão regular para validar o CEP.
                        var validacep = /^[0-9]{8}$/;

                        //Valida o formato do CEP.
                        if(validacep.test(cep)) {

                            $("#ruaUnid0").val("...");
                            $("#bairroUnid0").val("...");
                            $("#cidadeUnid0").val("...");


                            //Consulta o webservice viacep.com.br/
                            $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                                if (!("erro" in dados)) {
                                    //Atualiza os campos com os valores da consulta. 
                                    $("#getCEP0").text('');

                                    $("#ruaUnid0").val(dados.logradouro);
                                    $("#bairroUnid0").val(dados.bairro);
                                    $("#cidadeUnid0").val(dados.localidade);

                                    $("#submitUnid").attr("type", "submit").removeAttr("onclick");
                                    $('.recebeDados').text("");
                                } //end if.
                                else {
                                    //CEP pesquisado não foi encontrado.
                                    $("#ruaUnid0").val("");
                                    $("#bairroUnid0").val("");
                                    $("#cidadeUnid0").val("");
                                    $("#submitUnid").attr("type", "button").attr("onclick", "addmsg()")
                                    $("#getCEP0").text("CEP não encontrado.");
                                }
                            });
                        } //end if.
                        else {
                            //cep é inválido.
                            $("#submitUnid").attr("type", "button").attr("onclick", "addmsg()")
                            $("#getCEP0").text('CEP inválido');
                        }
                } 
        });

        
            
            
         
    

        $('.form').submit(function () {
                $.ajax({
                    url: 'envia.php',
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
    </body>
</html>