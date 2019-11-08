<?php session_start();
require_once '../../../primeiroCadastroMaster/funcoes/funcoes.php';
require_once '../../../bd/conexao.php';

$numDeCoord = filter_var($_POST['AcoordA'], FILTER_SANITIZE_NUMBER_INT);

$arrayPost = array();

for($i = 0; $i < $numDeCoord; $i++){
    $arrayPost["sigla$i"] = FILTER_SANITIZE_SPECIAL_CHARS;
    $arrayPost["hora$i"] = FILTER_SANITIZE_SPECIAL_CHARS;
}


$infoPost = filter_input_array(INPUT_POST, $arrayPost);

if($infoPost){    
    $vazio = array();
    $posts = array();
    $cadastrado = array();

    $codTurma = filter_var($_REQUEST['codTurma'], FILTER_SANITIZE_NUMBER_INT);

    if($codTurma == 0){
        echo "errCod";
    }else{
        for($n = 0; $n < $numDeCoord; $n++){

            $nomeDisc = $infoPost["sigla$n"];
            $horaDisc = $infoPost["hora$n"];
    
            if($n == ($numDeCoord - 1)){
                if(!empty($vazio)){
                    echo "<p>Existem campos vazios</p>";
                }else if(!empty($cadastrado)){
                    echo "<p>Disciplina já foi cadastrada</p>";
                }else{
    
                    $selectCurso = $pdo->prepare("select nome_disc, disciplina.cod_disc from turma_disciplina inner join disciplina on(turma_disciplina.cod_disc = disciplina.cod_disc) where cod_status_disc = 'A' and cod_status_tur_disc = 'A' and cod_tur = $codTurma and where nome_disc = $nomeDisc;");
                    $selectCurso->execute();
                    $numLinhas = $selectCurso->rowCount();
    
                    if($nomeDisc == ''){
                        echo "<p>Existem campos vazios</p>";
                    }else if($numLinhas == 0){
    
                        for($k = 0; $k < count($posts); $k++){
                            $singlePost = $posts[$k];
                            
                            $nomeFor = $singlePost['nomeDisc'];
                            $horaFor = $singlePost['horaDisc'];
    
                            $inserir_disc = $pdo->prepare("insert into disciplina (nome_disc, carga_horaria_disc, cod_status_disc) values ('$nomeFor', $horaFor, 'A');");
                            
                            if($inserir_disc->execute()){
                                $discin = get_id($pdo, 'cod_disc', 'disciplina', 'nome_disc', $nomeFor);
                                $inserirNaTurmaDisc = $pdo->prepare("insert into turma_disciplina (cod_tur, cod_disc, cod_status_tur_disc) values ($codTurma, $discin, 'A');");
                                $inserirNaTurmaDisc->execute();
    
    
    
                            }else{
                                echo "<p>Não foi possivel cadastrar o curso $nomeFor</p>";
                            }
                        }
    
                        $inserir_last = $pdo->prepare("insert into disciplina (nome_disc, carga_horaria_disc, cod_status_disc) values ('$nomeDisc', $horaDisc, 'A');");
                        
                        if($inserir_last->execute()){
                            $discao = get_id($pdo, 'cod_disc', 'disciplina', 'nome_disc', $nomeDisc);
                            $inserirLastNaTurDisc = $pdo->prepare("insert into turma_disciplina (cod_tur, cod_disc, cod_status_tur_disc) values ($codTurma, $discao, 'A');");
                            $inserirLastNaTurDisc->execute();
    
                           echo "<script type='text/javascript'> window.location.href='../verDisc.php?codTurma=$codTurma';</script>";
                        }else{
                            echo "<p>Não foi possivel cadastrar o curso $nomeDisc</p>";                        
                        }
                    }else{
                        echo "<p>Disciplina já foi cadastrada</p>";
                    }
                }
            
            }else{
                $selectCurso = $pdo->prepare("select nome_disc, disciplina.cod_disc from turma_disciplina inner join disciplina on(turma_disciplina.cod_disc = disciplina.cod_disc) where cod_status_disc = 'A' and cod_status_tur_disc = 'A' and cod_tur = $codTurma and where nome_disc = $nomeDisc;");
                $selectCurso->execute();
                $numDeLinhas = $selectCurso->rowCount();
    
            
                if($nomeDisc == ''){
                    $vazio[] = $codDaUnid;
                }else if($numDeLinhas == 0){
                    $posts[] = [
                        "nomeDisc" => $nomeDisc,
                        "horaDisc" => $horaDisc
                    ];   
                }else{
                    $cadastrado[] = $nomeDisc;
                    $cadastrado[] = $horaDisc;
                }
            }
        }
    }
}

?>