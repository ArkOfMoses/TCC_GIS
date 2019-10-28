<?php

require_once 'bd/conexao.php';

$codTur = $_REQUEST['codTurma'];
$codAluno = $_REQUEST['codAluno'];

$select = $pdo->prepare("select nome_usu from usuario where cod_usu = $codAluno;");
$select->execute();
 while ($dados = $select->fetch(PDO::FETCH_ASSOC)) {
                $nomeAluno = $dados['nome_usu'];
 }



$filterForm = [
  "materias" => FILTER_SANITIZE_SPECIAL_CHARS,
    "ocorrencia" => FILTER_SANITIZE_SPECIAL_CHARS,
  ];

  $infoPost = filter_input_array(INPUT_POST, $filterForm);

  if ($infoPost['materias'] !== 'Escolha a Matéria') {
    $materia = $infoPost['materias'];
    

    $comand = $pdo->prepare("select cod_turma_disc from turma_disciplina where cod_tur = $codTur and cod_disc = $materia");
        $comand->execute();

        $numDeLinhas = $comand->rowCount();
        if ($numDeLinhas >= 1) {
            while ($dados = $comand->fetch(PDO::FETCH_ASSOC)) {
                $codTurmaDisc = $dados['cod_turma_disc'];
            }
      if($infoPost['ocorrencia'] !== ''){
        $ocorrencia = $infoPost['ocorrencia'];

        
        $inserirOcorrencia = $pdo->prepare("insert into turma_aluno_disc_ocorr (cod_usu, cod_tur, cod_turma_disc, data_hora_ocorr, desc_ocorr) values ($codAluno, $codTur, $codTurmaDisc, now(), '$ocorrencia');");
        if($inserirOcorrencia->execute()){
          echo "Ocorrência Enviada<br>";
          echo "<a href='chamada-ocorrencia.php?codTurma=$codTur'>Voltar</a>";
        }else{
          echo "Ocorrência Não Enviada";
        }


      }else{
        echo "Faça a Ocorrência";
      }

  }

}else{
  echo 'Escolha uma matéria para realizar a ocorrência!';
}
  

?>

