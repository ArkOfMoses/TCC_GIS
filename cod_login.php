<?php

session_start();
require_once 'bd/conexao.php';


//a gente precisa filtrar as informações do post
//tbm tem o jeito q o professor Rogério ensinou do filter input:
// $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL); 
// $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING); 

$error = false;
$msg = array();

$filterFormLogin = [
  "email" => FILTER_VALIDATE_EMAIL,
  "senha" => FILTER_SANITIZE_SPECIAL_CHARS
];

$infoPost = filter_input_array(INPUT_POST, $filterFormLogin);

if($infoPost){

	$email = $infoPost['email'];
	$senha = $infoPost['senha'];

if($email != false){


	$comando = $pdo->prepare("select * from  where email_primUsu = '$string' or nome_primUsu = '$string'");
	$comando->execute();
	$numeroDeLinhas = $comando->rowCount();
	if ($numeroDeLinhas === 0) {
	    echo "<p>Usuário Inexistente!!</p>";
	}else if($numeroDeLinhas === 1){
	    while ($dados = $comando->fetch(PDO::FETCH_ASSOC)) {
	        $senhaDoBanco = $dados['senha_primUsu'];
	        $nome = $dados['nome_primUsu'];
	    }
	}


	if ($string === '' || $senha === '') {
	    $msg['camposVazios'] = "<p>Todos os campos devem ser preenchidos</p>";
    	$error = true;
	} else {

    $obj = new Bcrypt();

    if($obj->check($senha, $senhaDoBanco)){
        $_SESSION['logado'] = true;
        $_SESSION['nomeUsu'] = $nome;
        header("Location: perfil.php");
    } else {  
        session_destroy();
        echo "<script type='text/javascript'>alert('Senha incorreta!!'); window.location.href='login.php';</script>";
    }
}
    //dps disso a gente precisa ver se o email e a senha tão certos, aqui eu tbm vou deixar em aberto pq a gente precisa decidir um dos de ^cima^
    // e decidir se a gente vai encriptografar as senhas e tals

    //if(numeroDeLinhas == 1){
        //aqui a gente precisa ver o tipo de usuário que é e oq a gente vai fazer com cada tipo,
        //aqui o sistema tbm vai precisar checar se é a primeira vez que o usuário tá entrando na tela ou não
    //}
	}
}