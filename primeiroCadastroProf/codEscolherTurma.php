<?php session_start();
if(isset($_SESSION['logado'])){
    $dados =  $_SESSION['dadosUsu'];
    $codUsu = $dados['codUsu'];
}else{
    unset($_SESSION['dadosUsu']);
    unset($_SESSION['logado']);
    session_destroy();
    header("Location: ../homeLandingPage.php");
}

require_once '../bd/conexao.php';


if(isset($_POST["opcao"])){
	$arrayCheck = $_POST["opcao"];
	for($i = 0; $i < count($arrayCheck); $i++){
		$insert = $pdo->prepare("insert into prof_turma (cod_tur, cod_usu, cod_status_prof_tur) values ($arrayCheck[$i], $codUsu, 'A')");
		$insert->execute();
	}
	echo "<script type='text/javascript'> window.location.href='escolherDisc.php';</script>";
}else{
	echo "Escolha uma Turma!";
}

?>