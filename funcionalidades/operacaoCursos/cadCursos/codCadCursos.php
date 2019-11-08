<?php session_start();
require_once '../../../primeiroCadastroMaster/funcoes/funcoes.php';
require_once '../../../bd/conexao.php';

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

    for($n = 0; $n < $numDeCoord; $n++){
        $codDaUnid = $_SESSION['dadosUsu']['codUnidadeUsu'];

        $nome = $infoPost["sigla$n"];

        if($n == ($numDeCoord - 1)){
            if(!empty($vazio)){
                echo "<p>Existem campos vazios</p>";
            }else if(!empty($cadastrado)){
                echo "<p>curso já foi cadastrado</p>";
            }else{

                $selectCurso = $pdo->prepare("select cursos.cod_curso, nome_curso, cod_status_cursos, cursos_unidade.cod_unid, cod_status_cursos_unid
                From cursos inner join cursos_unidade on (cursos.cod_curso = cursos_unidade.cod_curso) where nome_curso = '$nome' and cod_unid = $codDaUnid and cod_status_cursos = 'A' and cod_status_cursos_unid = 'A';");
                $selectCurso->execute();
                $numLinhas = $selectCurso->rowCount();

                if($nome == ''){
                    echo "<p>Existem campos vazios</p>";
                }else if($numLinhas == 0){

                    for($k = 0; $k < count($posts); $k++){
                        $singlePost = $posts[$k];
                        
                        $nomeFor = $singlePost['nomeCurso'];

                        $inserir_cursos = $pdo->prepare("insert into cursos (nome_curso, cod_status_cursos) values ('$nomeFor', 'A');");
                        
                        if($inserir_cursos->execute()){
                            $curnin = get_id($pdo, 'cod_curso', 'cursos', 'nome_curso', $nomeFor);
                            $inserirNaUnid = $pdo->prepare("insert into cursos_unidade (cod_curso, cod_unid, cod_status_cursos_unid) values ($curnin, $codDaUnid, 'A')");
                            $inserirNaUnid->execute();

                        }else{
                            echo "<p>Não foi possivel cadastrar o curso $nomeFor</p>";
                        }
                    }

                    $inserir_last = $pdo->prepare("insert into cursos (nome_curso, cod_status_cursos) values ('$nome', 'A');");
                    
                    if($inserir_last->execute()){
                        $curnão = get_id($pdo, 'cod_curso', 'cursos','nome_curso', $nome);
                        $inserirLastNaUnid = $pdo->prepare("insert into cursos_unidade (cod_curso, cod_unid, cod_status_cursos_unid) values ($curnão, $codDaUnid, 'A')");
                        $inserirLastNaUnid->execute();

                       echo "<script type='text/javascript'> window.location.href='../cursos.php';</script>";
                    }else{
                        echo "<p>Não foi possivel cadastrar o curso $nome</p>";                        
                    }
                }else{
                    echo "<p>curso já foi cadastrado</p>";
                }
            }
        
        }else{
            $selectCurso = $pdo->prepare("select cursos.cod_curso, nome_curso, cod_status_cursos, cursos_unidade.cod_unid, cod_status_cursos_unid
            From cursos inner join cursos_unidade on (cursos.cod_curso = cursos_unidade.cod_curso) where nome_curso = '$nome' and cod_unid = $codDaUnid and cod_status_cursos = 'A' and cod_status_cursos_unid = 'A';");
            $selectCurso->execute();
            $numDeLinhas = $selectCurso->rowCount();

        
            if($nome == ''){
                $vazio[] = $codDaUnid;
            }else if($numDeLinhas == 0){
                $posts[] = [
                    "nomeCurso" => $nome
                ];   
            }else{
                $cadastrado[] = $nome;
            }
        }
    }
}


?>