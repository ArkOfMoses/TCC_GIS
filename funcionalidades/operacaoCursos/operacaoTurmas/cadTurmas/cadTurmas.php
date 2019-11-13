<?php
session_start();
if(isset($_SESSION['logado'])){
    $dados =  $_SESSION['dadosUsu'];
    $img = $dados['fotoUsu'];
}else{
    unset($_SESSION['dadosUsu']);
    unset($_SESSION['logado']);
    session_destroy();
    header("Location: ../../../../../homeLandingPage.php");
}

$codCurso = $_REQUEST['codCurso'];

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Primeiro cadastro</title>    
        <link rel="stylesheet" href="../../../../css/default.css">    
        <script src='../../../../js/jquery-3.3.1.min.js'></script>
        <!-- CSS PADRÃO -->
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        
        <!-- Icon Font -->
        <script src="https://kit.fontawesome.com/2a85561c69.js"></script>

        <!-- Telas Responsivas -->
        <link rel=stylesheet media="screen and (max-width:480px)" href="../../../../css/cssCadastroMaster/style480.css">
        <link rel=stylesheet media="screen and (min-width:481px) and (max-width:768px)"
              href="../../../../css/cssCadastroMaster/style768.css">
        <link rel=stylesheet media="screen and (min-width:769px) and (max-width:1024px)"
              href="../../../../css/cssCadastroMaster/style1024.css">
        <link rel=stylesheet media="screen and (min-width:1025px)" href="../../../../css/cssCadastroMaster/style1366.css">
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
                    <?php echo "url: 'codCadTurmas.php?codCurso=$codCurso',";?>
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
            <a href="cadastroDeCoord.php"><img src="../../../../primeiroCadastroMaster/img/unidImg.png"></a>
            <!-- <a href="../cadastroDeDir/cadastroDir.php"><img src="../img/dirImg.png"></a>
            <a href="../enviarEmail.php"><img src="../img/emailImg.png"></a>                
            <a href="../confirmarDados.php"><img src="../img/confirmaImg.png"></a> -->


            </header>

            <main>
                <div class="acessoUm">



                    <?php                      
                    // if($img === NULL){
                        echo "<img src='../../../../imagens/perfil.png' class='perfil-foto'/>";
                    // }else{
                    //     echo "<img src='../$img' class='perfil-foto'>";
                    // }
                    ?>
                    <p>Cadastre os alunos:</p>
                    
                  <?php echo "<form class='form' method='post' action='' autocomplete='off'>";?>
                        
                        <label id="coordenadores">Turma:</label>


                        <label id="sigla_label">Sigla da Turma: </label>
                        <input class='unid' id='IdSigla0' name='sigla0' type='text' />

                        <label id="turno_label">Escolha o turno: </label>
                        <p id="puxar1">Manhã</p><input type="radio" id="IdCheck0" value="M" name="opcao0[]">

                        <p id="puxar2">Tarde</p><input type="radio" id="IdChecke0" value="T" name="opcao0[]">

                        <p id="puxar3">Noite</p><input type="radio" id="IdCheckee0" value="N" name="opcao0[]">
                        


                        <div id="rightDiv"></div> <!-- div q recebe os novos inputs -->
                        <div class='recebeDados' id='div'></div> <!-- div que recebe dados do ajax -->
                        <span id="eventBtn"><img src="../../../../primeiroCadastroMaster/img/more.png" alt=""></span> <!-- botão pra adicionar inputs  -->
                        <div class="puto"><input type="submit" value="Cadastrar Turmas" class="VAISEFUDE" /></div> <!-- botão subtmit do formulário -->
                        
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
        
    });
        </script>
    </body>
</html>