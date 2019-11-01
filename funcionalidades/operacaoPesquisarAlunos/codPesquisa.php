<?php
session_start();
if(isset($_SESSION['logado'])){
    $dados =  $_SESSION['dadosUsu'];
    $codUnid = $dados['codUnidadeUsu'];
}else{
    unset($_SESSION['dadosUsu']);
    unset($_SESSION['logado']);
    session_destroy();
    header("Location: ../../homeLandingPage.php");
}

require_once '../../bd/conexao.php';

$arrayPost = [
        "pesquisa" => FILTER_SANITIZE_SPECIAL_CHARS,
    ];

    $infoPost = filter_input_array(INPUT_POST, $arrayPost);
    
    if($infoPost){
    	$pesquisa = $infoPost['pesquisa'];
    	
		 if ($pesquisa != '') {
		 	$strCmd = ("select nome_usu, usuario.cod_usu from turma_aluno inner join usuario on (turma_aluno.cod_usu = usuario.cod_usu) inner join usuario_unidade on (usuario.cod_usu = usuario_unidade.cod_usu) where cod_unid = $codUnid and nome_usu like  '%$pesquisa%' ORDER BY nome_usu ASC");
			$resultado = $pdo->prepare($strCmd);
			$resultado->execute();
			$numeroDeLinhas = $resultado->rowCount();
                if ($numeroDeLinhas > 0) {
                    while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {
                        $codUsu = $linha['cod_usu'];
                        $nomeAluno = $linha['nome_usu'];


                        echo "<a class='buttonNexte' href='../operacaoAlunos/perfilAluno.php?codAlun=$codUsu'>$nomeAluno</a>";
                    }
                } else {
                    echo '<h1>O aluno não foi encontrado!</h1>';
                }
            } else {
                echo '<h1>O aluno não foi encontrado!</h1>';
            }
    }










?>