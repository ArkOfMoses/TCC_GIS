<?php session_start();
if(isset($_SESSION['logado'])){
    $dados =  $_SESSION['dadosUsu'];
    $codUsu = $dados['codUsu'];
}else{
    unset($_SESSION['dadosUsu']);
    unset($_SESSION['logado']);
    session_destroy();
    header("Location: ../../homeLandingPage.php");
}

require_once '../../bd/conexao.php';


if(isset($_POST["opcao"])){
	$arrayCheck = $_POST["opcao"];
	for($i = 0; $i < count($arrayCheck); $i++){
		$selecionar = ("select turma_disciplina.cod_tur from turma_disciplina inner join disciplina on (turma_disciplina.cod_disc = disciplina.cod_disc) where cod_status_disc = 'A' and cod_status_tur_disc = 'A' and turma_disciplina.cod_disc = $arrayCheck[$i];");
                $dadosTurma = $pdo->prepare($selecionar);
                $dadosTurma->execute();
                	while($dedinhos = $dadosTurma->fetch(PDO::FETCH_ASSOC)){
                		$codTurma = $dedinhos['cod_tur'];

                	}
		$insert = $pdo->prepare("insert into prof_turma_disc (cod_tur, cod_usu, cod_disc, cod_status_prof_tur_disc) values ($codTurma, $codUsu, $arrayCheck[$i], 'A');");
		$insert->execute();
	}
	echo "<script type='text/javascript'> window.location.href='../configuracoes.php';</script>";
}else{
	echo "Escolha uma Disciplina!";
}

?>