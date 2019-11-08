<?php session_start();
if(isset($_SESSION['logado'])){
    $dados =  $_SESSION['dadosUsu'];
    $img = $dados['fotoUsu'];
    $codUnid = $dados['codUnidadeUsu'];
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
                      url: 'codEscolherTurma.php',
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

            <P class="vsf">Escolha as turmas dos cursos que você leciona
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
                <?php
        
                require_once '../bd/conexao.php';
                // cursos na unidade
                
				$selecionar = ("select nome_curso, cursos.cod_curso from cursos inner join cursos_unidade on (cursos.cod_curso = cursos_unidade.cod_curso) where cod_status_cursos_unid = 'A' and cod_status_cursos = 'A' and cod_unid = $codUnid;");
                $dadosCurso = $pdo->prepare($selecionar);
                $dadosCurso->execute();
                $numLinhas = $dadosCurso->rowCount();
                if($numLinhas == 0){
                	echo "<p>Fale com seu diretor para adicionar as turmas</p>";
                	echo "<a href='../perfilProfessor.php'>Ir para seu perfil</a>";

                }else{
                	echo "<form class='form' method='post'>";
                	while($dedinhos = $dadosCurso->fetch(PDO::FETCH_ASSOC)){
                		$nomeCurso = $dedinhos['nome_curso'];
                		$codCurso = $dedinhos['cod_curso'];

                		echo $nomeCurso;

                		$selecionara = ("select sigla_tur, cod_tur from turma where cod_curso = $codCurso and cod_status_tur = 'A';");
                		$dadosTurma = $pdo->prepare($selecionara);
                		$dadosTurma->execute();
                		while ($dedoes = $dadosTurma->fetch(PDO::FETCH_ASSOC)) {
                			$nomeTurma = $dedoes['sigla_tur'];
                			$codTurma = $dedoes['cod_tur'];

                			echo "<label>$nomeTurma<input type='checkbox' name='opcao[]' value='$codTurma'/></label>";



                		}


                	}
                	echo "<input type='submit' value='Enviar'/>
                		  </form>";
                }

                ?>

                
                
        <div>
    </body>
</html>
