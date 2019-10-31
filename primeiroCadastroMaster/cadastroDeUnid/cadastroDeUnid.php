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
        <script src='../../js/jquery.mask.min.js'></script>
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
                    if($img === NULL){
                       echo "<img src='../../imagens/perfil.png' class='perfil-foto'/>";
                   }else{
                        echo "<img src='../../$img' class='perfil-foto'>";
                    }
                    ?>
                    <p>Cadastre as unidades de sua instituição:</p>
                    <p class="vsf">Os campos que estiverem com * são de preenchimento obrigatório:</p>
                    <form class='form' method='post' action='envia.php'>

                        <label id="nome_label">*Nome da Unidade: </label>
                        <input class='unid' id='IdnomeUnid0' name='unid0' type='text' />

                        <!-- MENSAGEM DE ERRO DO CEP -->
                        <p id="getCEP0" style="color:red;"></p>


                        <label id="cep_label">*CEP da Unidade: </label>
                        <input class='unid' id='IdcepUnid0' name='cepUnid0' type='text' />

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

                        <div id="rightDiv"></div> <!-- div q recebe os novos inputs -->
                        <div class='recebeDados' id='div'></div> <!-- div que recebe dados do ajax -->
                        <span id="eventBtn"><img src="../../imagens/more.png" alt=""></span> <!-- botão pra adicionar inputs  -->
                        <span class="table-remove"><img src="../../imagens/exclude.png" alt=""></span> <!-- botão pra remover inputs  -->
                        <div class="puto"><input type="submit" value="Proximo passo" class="buttonNext" id="submitUnid"/></div> <!-- botão subtmit do formulário -->
                        
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

        $("#eventBtn").click(function(){
            
            $('#nome_label').clone().appendTo('#rightDiv').removeAttr('id');
            $('#IdnomeUnid0').clone().appendTo('#rightDiv').attr("name","unid"+ increment).attr("id", "IdnomeUnid"+increment);
            document.getElementById('IdnomeUnid'+increment).value = '';

            $('#getCEP0').clone().appendTo('#rightDiv').attr("id", "getCEP"+increment).text("");

            $('#cep_label').clone().appendTo('#rightDiv');
            $('#IdcepUnid0').clone().appendTo('#rightDiv').attr("name",'cepUnid'+ increment).attr("id", "IdcepUnid"+increment);
            document.getElementById('IdcepUnid'+increment).value = '';

            $('#rua_label').clone().appendTo('#rightDiv');
            $('#ruaUnid0').clone().appendTo('#rightDiv').attr("name",'ruaUnid'+ increment).attr("id", "ruaUnid"+increment);
            document.getElementById('ruaUnid'+increment).value = '';

            $('#bairro_label').clone().appendTo('#rightDiv');
            $('#bairroUnid0').clone().appendTo('#rightDiv').attr("name",'bairroUnid'+ increment).attr("id", "bairroUnid"+increment);
            document.getElementById('bairroUnid'+increment).value = '';

            $('#cidade_label').clone().appendTo('#rightDiv');
            $('#cidadeUnid0').clone().appendTo('#rightDiv').attr("name",'cidadeUnid'+ increment).attr("id", "cidadeUnid"+increment);
            document.getElementById('cidadeUnid'+increment).value = '';            

            $('#num_label').clone().appendTo('#rightDiv');
            $('#IdNumUnid0').clone().appendTo('#rightDiv').removeAttr('id').attr("name",'numUnid'+ increment).attr("id", "IdNumUnid"+increment);
            document.getElementById('IdNumUnid'+increment).value = '';

            $('#compl_label').clone().appendTo('#rightDiv');
            $('#IdcomplUnid0').clone().appendTo('#rightDiv').removeAttr('id').attr("name",'complUnid'+ increment).attr("id", "IdcomplUnid"+increment);
            document.getElementById('IdcomplUnid'+increment).value = '';

            $('.blank').clone().appendTo('#rightDiv');

            increment++;
            $('#hidden').attr("value", increment);

            var i;
            for(i = 1; i <= increment; i++){
                $("#IdcepUnid"+i).mask("00000-000");
                addCEPBlur(increment, i);
            }
        });

        $(".table-remove").click(function(){
            $("#rightDiv > input:last").remove();
            $("#rightDiv > input:last").remove();
            $("#rightDiv > input:last").remove();
            $("#rightDiv > input:last").remove();
            $("#rightDiv > input:last").remove();
            $("#rightDiv > input:last").remove();
            $("#rightDiv > input:last").remove();

            $("#rightDiv > label:last").remove();
            $("#rightDiv > label:last").remove();
            $("#rightDiv > label:last").remove();
            $("#rightDiv > label:last").remove();
            $("#rightDiv > label:last").remove();
            $("#rightDiv > label:last").remove();
            $("#rightDiv > label:last").remove();
            
            $("#rightDiv > div:last").remove();
            increment--;
            if(increment < 0){
                increment = 0;
            }
            
            $('#hidden').attr("value", increment);
            
            $("#getCEP"+increment).remove();
            
        });
    function addCEPBlur(increment, n){

        //Quando o campo cep perde o foco.
        $('#IdcepUnid'+n).blur(function() {

            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if(validacep.test(cep)) {

                    $("#ruaUnid"+n).val("...");
                    $("#bairroUnid"+n).val("...");
                    $("#cidadeUnid"+n).val("...");

                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                        if(!("erro" in dados)){
                            //Atualiza os campos com os valores da consulta.
                            $("#getCEP"+n).text("");

                            $("#ruaUnid"+n).val(dados.logradouro);
                            $("#bairroUnid"+n).val(dados.bairro);
                            $("#cidadeUnid"+n).val(dados.localidade);

                            $("#submitUnid").attr("type", "submit").removeAttr("onclick");
                            $('.recebeDados').text("");

                        }else{
                            //CEP pesquisado não foi encontrado.
                            $("#ruaUnid"+n).val("");
                            $("#bairroUnid"+n).val("");
                            $("#cidadeUnid"+n).val("");
                            $("#submitUnid").attr("type", "button").attr("onclick", "addmsg()");
                            $("#getCEP"+n).text("CEP não encontrado.");
                        }
                    });
                }else{
                    //cep é inválido.
                    $("#submitUnid").attr("type", "button").attr("onclick", "addmsg()").
                    $("#getCEP"+n).text('CEP inválido');
                }
            } 
        });
    }

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