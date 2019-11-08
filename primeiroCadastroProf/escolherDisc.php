<?php session_start();
if(isset($_SESSION['logado'])){
    $dados =  $_SESSION['dadosUsu'];
    $img = $dados['fotoUsu'];
    $codUsu = $dados['codUsu'];
}else{
    unset($_SESSION['dadosUsu']);
    unset($_SESSION['logado']);
    session_destroy();
    header("Location: ../homeLandingPage.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro de Professor</title>

        
        <link rel="stylesheet" href="../css/default.css"> 
        <link rel=stylesheet media="screen and (max-width:480px)" href="../css/cssCadastroMaster/style480.css">
        <link rel=stylesheet media="screen and (min-width:481px) and (max-width:768px)"
              href="../css/cssCadastroMaster/style768.css">
        <link rel=stylesheet media="screen and (min-width:769px) and (max-width:1024px)"
              href="../css/cssCadastroMaster/style1024.css">
        <link rel=stylesheet media="screen and (min-width:1025px)" href="../css/cssCadastroMaster/style1366.css">
    
        <script src='../js/jquery-3.3.1.min.js'></script>
         <script>
          $(function(){
              $('.form').submit(function(){
                  $.ajax({
                      url: 'codEscolherDisc.php',
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
            <a href="escolherTurma.php"><img src="../primeiroCadastroMaster/img/dirImg.png"></a>
            </header>

            <P class="vsf">Escolha as disciplinas que você leciona
            </p>

            <?php                      
                if($img === NULL){
                    echo "<img src='../imagens/perfil.png' class='perfil-foto'/>";
                }else{
                    echo "<img src='../$img' class='perfil-foto'>";
                }    
            ?>
            	<div class='recebeDados'>
                </div>
                <form class="form" method="post">
                <?php
        
                require_once '../bd/conexao.php';
               	// cursos na unidade
                
				$selecionar = ("select sigla_tur, turma.cod_tur from turma inner join prof_turma on (turma.cod_tur = prof_turma.cod_tur) where cod_status_prof_tur = 'A' and cod_status_tur = 'A' and cod_usu = $codUsu;");
                $dadosTurma = $pdo->prepare($selecionar);
                $dadosTurma->execute();

                	while($dedinhos = $dadosTurma->fetch(PDO::FETCH_ASSOC)){
                		$nomeTurma = $dedinhos['sigla_tur'];
                		$codTurma = $dedinhos['cod_tur'];

                		echo $nomeTurma;

                		$selecionara = ("select nome_disc, disciplina.cod_disc from disciplina inner join turma_disciplina on (disciplina.cod_disc = turma_disciplina.cod_disc) where cod_status_disc = 'A' and cod_status_tur_disc = 'A' and cod_tur = $codTurma;");
                		$dadosDisc = $pdo->prepare($selecionara);
                		$dadosDisc->execute();
                		while ($dedoes = $dadosDisc->fetch(PDO::FETCH_ASSOC)) {
                			$nomeDisc = $dedoes['nome_disc'];
                			$codDisc = $dedoes['cod_disc'];

                			echo "<label>$nomeDisc<input type='checkbox' name='opcao[]' value='$codDisc'/></label>";

                		}
                	}
                ?>

                
                <input type='submit' value='Enviar'/>
            </form>
        <div>
    </body>
</html>