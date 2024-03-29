<?php

require_once 'bd/conexao.php';

$filterForm = [
    "materias" => FILTER_SANITIZE_SPECIAL_CHARS,
  ];
  
  $infoPost = filter_input_array(INPUT_POST, $filterForm);

  if($infoPost['materias'] !== 'Escolha a Matéria'){

        $materia = $infoPost['materias'];
        $codTurma = $_REQUEST['codTurma'];

        $comand = $pdo->prepare("select cod_turma_disc from turma_disciplina where cod_tur = $codTurma and cod_disc = $materia");
        $comand->execute();

        $numDeLinhas = $comand->rowCount();
        if ($numDeLinhas >= 1) {
            while ($dados = $comand->fetch(PDO::FETCH_ASSOC)) {
                $codTurmaDisc = $dados['cod_turma_disc'];

            }

            if(isset($_POST['opcao'])){
                  $arrayCheck = $_POST['opcao'];
              
                  $msg = array();
                  for($i = 0; $i < count($arrayCheck); $i++){
                    
                    $inserirFalta = $pdo->prepare("insert into turma_aluno_disc_falta (cod_usu, cod_tur, cod_turma_disc, data_falta) values ({$arrayCheck[$i]}, $codTurma, $codTurmaDisc, now());"); 
                    if($inserirFalta->execute()){
                      $msg[] = "<h3>Faltas Cadastradas!!!!</h3>";
                      //echo "Faltas Cadastradas";
                    }else{
                      $msg[] = "<h3>Faltas Não Cadastradas</h3>";
                    }
                  }

                  echo $msg[0];
          }else{
            echo "<h3>Todos estão presentes!</h3>";
          }
        }

        
  }else{
    echo '<h3>Escolha uma matéria para a chamada!</h3>';
  }

?>