<?php
require_once '../../../../bd/conexao.php';
$numDeCoord = filter_var($_POST['AcoordA'], FILTER_SANITIZE_NUMBER_INT);

$arrayPost = array();

for($i = 0; $i < $numDeCoord; $i++){
    $arrayPost["sigla$i"] = FILTER_SANITIZE_SPECIAL_CHARS;
}


$infoPost = filter_input_array(INPUT_POST, $arrayPost);

if($infoPost){
	$vazio = array();
    $posts = array();
    $cadastrado = array();
    $codCurso = $_REQUEST['codCurso'];
    for($n = 0; $n < $numDeCoord; $n++){
    	$siglaTur = $infoPost["sigla$n"];
    	if(isset($_POST["opcao$n"])){
			$arrayCheck = $_POST["opcao$n"];
		}
		
	    
		 if($n == ($numDeCoord - 1)){
            if(!empty($vazio)){
                echo "<p>Existem campos vazios</p>";
            }else if(!empty($cadastrado)){
                echo "<p>Turma já foi cadastrada</p>";
            }else{

            	
                $selectTurma = $pdo->prepare("select turma.cod_tur, sigla_tur, cod_status_tur, cursos.cod_curso, cod_status_cursos from turma inner join cursos on (turma.cod_curso = cursos.cod_curso) where sigla_tur = '$siglaTur' and turma.cod_curso = $codCurso and cod_status_cursos = 'A' and cod_status_tur = 'A';");
                $selectTurma->execute();
                $numLinhas = $selectTurma->rowCount();
                if($siglaTur == ''){
                    echo "<p>Existem campos vazios</p>";
                }else if($numLinhas == 0){

                    for($k = 0; $k < count($posts); $k++){
                        $singlePost = $posts[$k];
                        
                        $nomeFor = $singlePost['nomeTurma'];
                        $turnoFor = $singlePost['turnoTurma'];

                        $inserir_turma = $pdo->prepare("insert into turma (sigla_tur, turno_tur, cod_curso, cod_status_tur) values ('$nomeFor', '$turnoFor[0]', $codCurso, 'A');");
                        
                        $inserir_turma->execute();
                           
                    }

                    $inserir_last = $pdo->prepare("insert into turma (sigla_tur, turno_tur, cod_curso, cod_status_tur) values ('$siglaTur', '$arrayCheck[0]', $codCurso, 'A');");
                    
                    if($inserir_last->execute()){
                        

                       echo "<script type='text/javascript'> window.location.href='../turmas.php?codCurso=$codCurso';</script>";
                    }else{
                        echo "<p>Não foi possivel cadastrar a turma $siglaTur</p>";                        
                    }
                }else{
                    echo "<p>Turma já foi cadastrada</p>";
                }
            }
        
        }else{
            $selectCurso = $pdo->prepare("select turma.cod_tur, sigla_tur, cod_status_tur, cursos.cod_curso, cod_status_cursos from turma inner join cursos on (turma.cod_curso = cursos.cod_curso) where sigla_tur = '$siglaTur' and turma.cod_curso = $codCurso and cod_status_cursos = 'A' and cod_status_tur = 'A';");
            $selectCurso->execute();
            $numDeLinhas = $selectCurso->rowCount();

        
            if($siglaTur == ''){
                $vazio[] = $codDaUnid;
            }else if($numDeLinhas == 0){
                $posts[] = [
                    "nomeTurma" => $siglaTur,
                    "turnoTurma" => $arrayCheck
                ];   
            }else{
                $cadastrado[] = $siglaTur;
                $cadastrado[] = $arrayCheck;
            }
        }
      
    }
	


}



?>