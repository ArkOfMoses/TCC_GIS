<?php

require_once 'bd/conexao.php';

$codTur = $_REQUEST['codTurma'];
$codAluno = $_REQUEST['codAluno'];

$select = $pdo->prepare("select nome_usu from usuario where cod_usu = $codAluno;");
$select->execute();
 while ($dados = $select->fetch(PDO::FETCH_ASSOC)) {
                $nomeAluno = $dados['nome_usu'];
 }





?>
<!DOCTYPE html>
<html>
<head>
	<title>AS</title>
	<script src='js/jquery-3.3.1.min.js'></script>
      <script>
          $(function(){
              $('.form').submit(function(){
                  $.ajax({
                      <?php echo "url: 'codCadOcorrencia.php?codTurma=$codTur&codAluno=$codAluno',"?>
                      type: 'POST',
                      data: $('.form').serialize(),
                      success: function(data){
                          if(data != ''){
                              $('.erros').html(data);
                          }
                      }
                  });
                  return false;
              });
          });
      </script>
</head>
<body>
	<h1>Ocorrências</h1>
	<p>Aluno: <?=$nomeAluno?></p>
	<?="<form class='form' id='form' method='post' action='' >"?>

		<select name="materias">
              <option>Escolha a Matéria</option>
              <?php
              $codUsu = 3;
              $comand = $pdo->prepare("select disciplina.cod_disc, nome_disc from disciplina inner join prof_turma_disc on (disciplina.cod_disc = prof_turma_disc.cod_disc) where cod_usu = $codUsu and cod_status_prof_tur_disc = 'A' and cod_tur = $codTur;");
              $comand->execute();

              $numDeLinhas = $comand->rowCount();
              if ($numDeLinhas >= 1) {
                  while ($dados = $comand->fetch(PDO::FETCH_ASSOC)) {
                      $nomeDisc = $dados['nome_disc'];
                      $codDisc = $dados['cod_disc'];
                      echo "<option value='$codDisc'>$nomeDisc</option>";
                  }
              }
          
              ?>
          </select>

		<textarea name="ocorrencia" rows="5" cols="33" placeholder="Faça a Ocorrência"></textarea>
		<input type="submit" name="Enviar">

		<div class="erros">
			
		</div>

	</form>
</body>
</html>