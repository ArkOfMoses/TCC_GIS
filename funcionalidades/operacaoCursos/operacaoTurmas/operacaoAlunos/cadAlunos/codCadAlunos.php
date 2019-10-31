<?php
session_start();

//num tendi pq colocar isso aqui se é só beck
if(isset($_SESSION['logado'])){
    $dados =  $_SESSION['dadosUsu'];
    $codUnid = $dados['codUnidadeUsu'];
}else{
    unset($_SESSION['dadosUsu']);
    unset($_SESSION['logado']);
    session_destroy();
    header("Location: ../../homeLandingPage.php");
}

require_once '../../../../../primeiroCadastroMaster/funcoes/funcoes.php';
require_once '../../../../../bd/conexao.php';

$numDeCoord = filter_var($_POST['AcoordA'], FILTER_SANITIZE_NUMBER_INT);

$arrayPost = array();

for($i = 0; $i < $numDeCoord; $i++){
    $arrayPost["nome$i"] = FILTER_SANITIZE_SPECIAL_CHARS;
    $arrayPost["CPF$i"] = FILTER_SANITIZE_NUMBER_INT;
    $arrayPost["DataNasc$i"] = FILTER_DEFAULT;
    $arrayPost["DataEntrada$i"] = FILTER_DEFAULT;

}

$infoPost = filter_input_array(INPUT_POST, $arrayPost);

if($infoPost){

    $posts = array();
    $cadastrado = array();
    $cpfInvalido = array();

    $codTurma = filter_var($_REQUEST['codTurma'], FILTER_SANITIZE_NUMBER_INT);

    for($n = 0; $n < $numDeCoord; $n++){
    	$nomeAluno = $infoPost["nome$n"];
        $CPFAluno = validaCPF($infoPost["CPF$n"]);

        $lero = $infoPost["DataNasc$n"];
        if($lero != ''){
            $data = date_create_from_format('d/m/Y', "$lero");
            $NascAluno = date_format($data, 'Y-m-d');
        }else{
            $NascAluno = '';
        }
        
        $lerogamer = $infoPost["DataEntrada$n"];
        if($lerogamer != ''){
            $datee = date_create_from_format('d/m/Y', "$lerogamer");
            $EntradaAluno = date_format($datee, 'Y-m-d');
        }else{
            $EntradaAluno = '';
        }
   
		 if($n == ($numDeCoord - 1)){
            if(!empty($cadastrado)){
                echo "<p>Existem alunos já cadastrados</p>";
            }else if(!empty($cpfInvalido)){
                echo "<p>Existem CPFs inválidos!</p>";
            }else{

                $selectAluno = $pdo->prepare("select * from usuario where cpf_usu = $CPFAluno;");
                $selectAluno->execute();
                $numLinhas = $selectAluno->rowCount();

                if(in_array("", $infoPost)){
                    echo "<p>Existem campos vazios</p>";
                }else if($numLinhas == 0){
                    if($CPFAluno === false){
                        echo "<p>Existem CPFs inválidos</p>";
                    }else{

                        for($k = 0; $k < count($posts); $k++){
                            $singlePost = $posts[$k];
                            
                            $nomeFor = $singlePost['nomeAluno'];
                            $CPFFor = $singlePost['CPFAluno'];
                            $nascFor = $singlePost["DataNasc"];
                            $entradaFor = $singlePost["DataEntrada"];
                            $inserirAluno = $pdo->prepare("insert into usuario (nome_usu, cpf_usu, data_nasc_usu, data_entrada, cod_status_usu) values ('$nomeFor', '$CPFFor', '$nascFor', '$entradaFor', 'A');");
                            
                            if($inserirAluno->execute()){
                                $codAluno = get_id($pdo, 'cod_usu', 'usuario', 'cpf_usu', $CPFFor);
                                $inserirNaUnid = $pdo->prepare("insert into usuario_unidade (cod_unid, cod_usu) values ($codUnid, $codAluno);");
                                if($inserirNaUnid->execute()){
                                    $inserirNaTurma = $pdo->prepare("insert into turma_aluno (cod_tur, cod_usu, cod_status) values ($codTurma, $codAluno, 'A');");
                                    $inserirNaTurma->execute();
                                }
                            }
                        }

                        $inserirAluno_last = $pdo->prepare("insert into usuario (nome_usu, cpf_usu, data_nasc_usu, data_entrada, cod_status_usu) values ('$nomeAluno', '$CPFAluno', '$NascAluno', '$EntradaAluno', 'A');");
                        
                        if($inserirAluno_last->execute()){
                            $codAlunoo = get_id($pdo, 'cod_usu', 'usuario', 'cpf_usu', $CPFAluno);
                            $inserirNaUnid_last = $pdo->prepare("insert into usuario_unidade (cod_unid, cod_usu) values ($codUnid, $codAlunoo);");
                            if($inserirNaUnid_last->execute()){
                                $inserirNaTurma_last = $pdo->prepare("insert into turma_aluno (cod_tur, cod_usu, cod_status) values ($codTurma, $codAlunoo, 'A');");
                                    if($inserirNaTurma_last->execute()){
                                        echo "<script type='text/javascript'> window.location.href='../alunos.php?codTurma=$codTurma';</script>";
                                    }
                            }

                        }else{
                            echo "<p>Não foi possivel cadastrar a turma $nomeAluno</p>";                        
                        }
                    }
                }else{
                    echo "<p>Existem alunos já cadastrados</p>";
                }
            }
        
        }else{
            $selectAlunoo = $pdo->prepare("select * from usuario where cpf_usu = $CPFAluno;");
            $selectAlunoo->execute();
            $numDeLinhas = $selectAlunoo->rowCount();

            
            //eu to assumindo que todos os campos são obrigatórios, se tu acha q algum nn é, só deletar desse if
            if($CPFAluno === false){
                $cpfInvalido[] = $CPFAluno;
            }else if($numDeLinhas == 0){
                $posts[] = [
                    "nomeAluno" => $nomeAluno,
                    "CPFAluno" => $CPFAluno,
                    "DataNasc" => $NascAluno,
                    "DataEntrada" => $EntradaAluno
                ];   
            }else{
                $cadastrado[] = $nomeAluno;
            }
        }
    }
}

?>