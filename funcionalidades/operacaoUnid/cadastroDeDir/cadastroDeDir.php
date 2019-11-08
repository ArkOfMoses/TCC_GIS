<?php
session_start();
if(isset($_SESSION['logado'])){
    $dados =  $_SESSION['dadosUsu'];
    $img = $dados['fotoUsu'];
    $codInst = $dados['codInstituicao']; 
}else{
    unset($_SESSION['dadosUsu']);
    unset($_SESSION['logado']);
    session_destroy();
    header("Location: ../../../homeLandingPage.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro de Diretor</title>

        
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
        <link rel="stylesheet" href="../../../css/default.css"> 
        <link rel=stylesheet media="screen and (max-width:480px)" href="../../../css/cssCadastroMaster/style480.css">
        <link rel=stylesheet media="screen and (min-width:481px) and (max-width:768px)"
              href="../../../css/cssCadastroMaster/style768.css">
        <link rel=stylesheet media="screen and (min-width:769px) and (max-width:1024px)"
              href="../../../css/cssCadastroMaster/style1024.css">
        <link rel=stylesheet media="screen and (min-width:1025px)" href="../../../css/cssCadastroMaster/style1366.css">
    
        <script src='../../../js/jquery-3.3.1.min.js'></script>
        <script>
          $(function(){
              $('.form').submit(function(){
                  $.ajax({
                      url: 'cod_cadastroDir.php',
                      type: 'POST',
                      data: $('.form').serialize(),
                      success: function(data){
                          if(data != ''){
                              $('.recebeDados').html(data);
                          }
                      }
                  });
                  return false;
              });
          });
      </script>
    

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
    <body><div class="acessoUm">
             <header class="headerPrimeiroAcesso">
            <!--<a href="../../alterarAcc.php"><img src="../img/alteraImg.png"></a>
            <a href="../cadastroDeInst/cadastroDeInst.php"><img src="../img/instImg.png"></a>
            <a href="../cadastroDeUnid/cadastroDeUnid.php"><img src="../img/unidImg.png"></a> -->
            <a href="cadastroDeDir.php"><img src="../../../primeiroCadastroMaster/img/dirImg.png"></a>
            <!-- <a href="../enviarEmail.php"><img src="../img/emailImg.png"></a>                
            <a href="../confirmarDados.php"><img src="../img/confirmaImg.png"></a>
 -->

            </header>
            <P class="vsf">Adicione agora os responsáveis (diretoria) por cada  unidade

            </p>

            <form method='post' action='cod_cadastroDir.php' class='form'>
                <?php
        
                require_once '../../../primeiroCadastroMaster/funcoes/funcoes.php';
                require_once '../../../bd/conexao.php';

                $unid = get_unid($pdo, $codInst);
                if($unid){
                    $selecionar = ("select unidade.cod_unid from usuario_unidade inner join unidade on (usuario_unidade.cod_unid = unidade.cod_unid) where unidade.cod_inst = $codInst");
                    $comando = $pdo->prepare($selecionar);
                    
                     if ($comando->execute()) {
                   
                    for ($i = 0; $i < count($unid); $i++) {
                        $xis = $unid[$i];

                        echo "
            <h4>" . $xis['nomeUnid'] . "</h4>
            <label>Nome do Diretor: </label><input type='text' id='visor' name='nome_" . $i . "' />
            <label>Email do Diretor: </label><input type='text' id='visor' name='email_" . $i . "' /><br><br>";
                        
                    }
                    echo "<div class='puto'><input type='submit' value='Cadastrar' class='buttonNext'></div>";
                    // }
                } else {
                    echo 'Diretores Já Cadastrados<br><br><br><br>';
                    echo '<a href="../../primeiroCadastroMaster/confirmarDados.php" class="buttonNext">Próximo passo</a>';
                }
                } else {
                    echo 'Não existem instituições<br><a href="../../operacaoInst/instituicao.php">Cadastrar Instituições</a><br>';
                }
                ?>

                <div class='recebeDados'>
                </div>
                
            </form>
            <!-- <a href="../cadastroDeUnid/cadastroDeUnid.php" class="buttonNext">Voltar</a> -->
        <div>
    </body>
</html>