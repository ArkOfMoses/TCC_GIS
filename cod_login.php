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


	$comando = $pdo->prepare("select * from acesso where email = '$email'");
	$comando->execute();
	$numeroDeLinhas = $comando->rowCount();
	if ($numeroDeLinhas === 0) {
	    $msg['errUsuario'] = "<p>Usuário Inexistente! Email Incorreto!</p>";
        $error = true;
	}else if($numeroDeLinhas === 1){
	    while ($dados = $comando->fetch(PDO::FETCH_ASSOC)) {
	        $senhaUsu = $dados['senha'];
            // pegar o cod_acesso
	    }
	}


	if ($email === '' || $senha === '') {
	    $msg['camposVazios'] = "<p>Todos os campos devem ser preenchidos</p>";
    	$error = true;
	} else {

    $obj = new Bcrypt();

    if($obj->check($senha, $senhaUsu)){
        $_SESSION['logado'] = true;
        // colocar uma array numa session com todos os dados do usuario
        // tentar fazer com inner join, se nao, vai ter que ter 2 ou mais select
        // sobre a primeira vez do usu, é só ver se o campo "data_entrada" não esta NULL. Se estiver manda pra pagina de verificação de dados. Se não estiver...
        // faz saporra pra diferenciar o perfil ---> header("Location: perfil".$variavelComOTipoDeUsuarioDoBanco.".php");
        header("Location: perfil.php");
    } else {  
        session_destroy();
        $msg['errPassword'] = "<p>Senha incorreta!!</p>";
        $error = true;
    }
}
    
    // AQUI JÁ TA RESOLVIDO, EU ACHO

    //dps disso a gente precisa ver se o email e a senha tão certos, aqui eu tbm vou deixar em aberto pq a gente precisa decidir um dos de ^cima^
    // e decidir se a gente vai encriptografar as senhas e tals

    //if(numeroDeLinhas == 1){
        //aqui a gente precisa ver o tipo de usuário que é e oq a gente vai fazer com cada tipo,
        //aqui o sistema tbm vai precisar checar se é a primeira vez que o usuário tá entrando na tela ou não
    //}
	}
}