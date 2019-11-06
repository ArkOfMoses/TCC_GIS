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

if(isset($_REQUEST['codAlun'])){
  if($_REQUEST['codAlun'] != ''){
    $codAlun = filter_var($_REQUEST['codAlun'], FILTER_SANITIZE_NUMBER_INT);
    $selectTur = $pdo->prepare("select cod_tur from turma_aluno where cod_usu = $codAlun;");
    $selectTur->execute();
    $infotur = $selectTur->fetch(PDO::FETCH_ASSOC);
    $tur = $infotur['cod_tur'];
  }
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
        $(document).ready(function(){
            $("#IdCPF0").mask("000.000.000-00");
            $("#IdDataNasc0").mask("00/00/0000");
            $("#IdDataEntrada0").mask("00/00/0000");

                $('.form').submit(function(e){
                    e.preventDefault();    // Preventing the default action of the form
                    var myForm = document.getElementById('form');
                    var formData = new FormData(myForm); // So you don't need call serialize()

                $.ajax({
                    <?= "url: 'codEditarAlun.php?codAlun=$codAlun',"?>
                    type: 'POST',
                    data: formData,
                    success: function (data) {
                        if(data != ''){
                            $('.recebeDados').html(data);
                        }
                    },

                    cache: false,
                    contentType: false,
                    processData: false
                });
                return false;
            });

        });

        function previewImagem(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.profile-photo').css('background-image', 'url('+e.target.result +')');
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
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
                    <a id="agaref" href="<?="../perfilAluno.php?codAlun=$codAlun"?>">
                        <img id="seta" src="../../../imagens/voltar_corAzul.png">
                    </a>
                    </div>

                    <?php
                    $selectInfo = $pdo->prepare("select usuario.cod_usu, nome_usu, cpf_usu, data_nasc_usu, data_entrada, url_foto_usu, turma.cod_tur, sigla_tur, turno_tur, nome_curso from usuario 
                    inner join turma_aluno on (usuario.cod_usu = turma_aluno.cod_usu)
                    inner join turma on (turma_aluno.cod_tur = turma.cod_tur)
                    inner join cursos on (turma.cod_curso = cursos.cod_curso) where usuario.cod_usu = $codAlun and cod_status_usu = 'A' and cod_status = 'A' and cod_status_tur = 'A' and cod_status_cursos = 'A';");
                    $selectInfo->execute();
                    $info = $selectInfo->fetch(PDO::FETCH_ASSOC);
                    
                    $codAluno = $info['cod_usu'];
                    $nomeAlun = $info['nome_usu'];
                    $cpfAlun = $info['cpf_usu'];
                    $foto = $info['url_foto_usu'];

                    $dataNascProv = $info['data_nasc_usu'];
                    $dataNascFormat = date_create_from_format('Y-m-d', "$dataNascProv");
                    $dataNasc = date_format($dataNascFormat, 'd/m/Y');

                    $dataEntradaProv = $info['data_entrada'];
                    $dataEntradaFormat = date_create_from_format('Y-m-d', "$dataEntradaProv");
                    $dataEntrada = date_format($dataEntradaFormat, 'd/m/Y');

                    if($foto === null){
                        $url = "../../../imagens/pessoa.png";
                    }else{
                        $url = "../../../$foto";
                    }
                        
                    ?>
                    
                    <h1>Atualize o aluno:</h1>
                    <form class='form' id="form" action="codEditarAlun.php" method='post' enctype="multipart/form-data" autocomplete='off'>
                        <div id="img-perfil">
                            <!-- era uma outra classe aqui, nn sei qual, mas essa num é, tanto é q nem tá pegando -->
                            <div class='profile-photo' style='background-image: url(<?=$url?>)!important; background-size: cover; background-position: center;'></div>
                            <label for="selecao-arquivo" class="selecionar-img">+</label>
                            <input id="selecao-arquivo" type="file" name="img" class="botao-img" onchange="previewImagem(this)" />
                        </div>

                        <label id="nome_label">Nome do Aluno: </label>
                        <input class='unid' id='IdNome0' name='nome' type='text' value="<?=$nomeAlun?>" />

                        <label id="cpf_label">CPF do Aluno: </label>
                        <input class='unid' id='IdCPF0' name='CPF' type='text' value="<?=$cpfAlun?>" />

                        <label id="data_nasc_label">Data de nascimento do Aluno: </label>
                        <input class='unid' id='IdDataNasc0' name='DataNasc' type='text' value="<?=$dataNasc?>"/>
                        
                        <label id="data_entrada_label">Data de entrada do Aluno: </label>
                        <input class='unid' id='IdDataEntrada0' name='DataEntrada' type='text' value="<?=$dataEntrada?>" />

                        <div class='recebeDados' id='div'></div> <!-- div que recebe dados do ajax -->
                        <div class="puto"><input type="submit" value="Atualizar Aluno" class="VAISEFUDE" /></div> <!-- botão subtmit do formulário -->
                    </form>                    
            </main>  
    </body>
</html>