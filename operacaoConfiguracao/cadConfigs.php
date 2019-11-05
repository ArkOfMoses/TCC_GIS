<?php
require_once '../primeiroCadastroMaster/funcoes/funcoes.php';
require_once '../classes/Bcrypt.php';
require_once '../bd/conexao.php';

session_start();
$arrayPost = [
    "nomeUsu" => FILTER_SANITIZE_SPECIAL_CHARS,
    "email" => FILTER_VALIDATE_EMAIL,
    "dataNasc" => FILTER_DEFAULT,
    "CPF" => FILTER_SANITIZE_NUMBER_INT,
    "novaSenha" => FILTER_SANITIZE_SPECIAL_CHARS,
    "senhaAtual" => FILTER_SANITIZE_SPECIAL_CHARS
];

$infoPost = filter_input_array(INPUT_POST, $arrayPost);

if($infoPost){

	$filesBro = $_FILES['img']['name'];
	

	$nomeUsu = $infoPost['nomeUsu'];
	$emailUsu = $infoPost['email'];
	$lero = $infoPost['dataNasc'];
	$cpf = validaCPF($infoPost['CPF']);
	$senhaNueva = $infoPost['novaSenha'];
	$senhaAtual = $infoPost['senhaAtual'];
	$codUsu = $_SESSION['dadosUsu']['codUsu'];
	$codAcesso = $_SESSION['dadosUsu']['codAcesso'];


	if($senhaAtual != ''){
		$selectSenhaAtual = ("select senha from acesso where cod_acesso = $codAcesso");
		$comand = $pdo->prepare($selectSenhaAtual);
		$comand->execute();
		while($dados = $comand->fetch(PDO::FETCH_ASSOC)){
			$senhaBanco = $dados['senha'];
		}
		$obj = new Bcrypt();
		if($obj->check($senhaAtual, $senhaBanco)){
			$senhaAtual = 1;
		}else{
			echo "Senha Incorreta!";
		}

	}else{
		echo "Preencha o campo com sua senha atual!";
	}

switch ($senhaAtual) {
	

	case 1:  
	switch ($nomeUsu) {
		case '':
			$update = $pdo->prepare("update usuario set nome_usu = '' where cod_usu = $codUsu;");
			$update->execute();
			break;

		case isset($nomeUsu):
			$update = $pdo->prepare("update usuario set nome_usu = '$nomeUsu' where cod_usu = $codUsu;");
			$update->execute();
			break;
		
	}

	switch ($emailUsu) {
		case '':
			echo "É necessário preencher o campo Email!";
			break;

		case isset($emailUsu):
			$update = $pdo->prepare("update acesso set email = '$emailUsu' where cod_acesso = $codAcesso;");
			$update->execute();
			break;
		
	}

	switch ($lero) {
		case '':
			$update = $pdo->prepare("update usuario set data_nasc_usu = '' where cod_usu = $codUsu;");
			$update->execute();
			break;

		case isset($lero):
			$data = date_create_from_format('d/m/Y', "$lero");
            $NascAluno = date_format($data, 'Y-m-d');
			$update = $pdo->prepare("update usuario set data_nasc_usu = '$NascAluno' where cod_usu = $codUsu;");
			$update->execute();
			break;
		
	}

	switch ($cpf) {
		case '':
			echo "É necessário preencher o campo CPF!";
			break;

		case false:
			echo "CPF inválido!";
			break;

		case isset($cpf):
			$update = $pdo->prepare("update usuario set cpf_usu = '$cpf' where cod_usu = $codUsu;");
			$update->execute();
			break;
		
	}

	switch ($senhaNueva) {
		case '':
			break;

		case isset($senhaNueva):
			$senhaEncript = Bcrypt::hash($senhaNueva);
			$update = $pdo->prepare("update acesso set senha = '$senhaEncript' where cod_acesso = $codAcesso;");
			$update->execute();
			break;
		
	}

	switch ($filesBro) {
		case NULL:
			echo "<script type='text/javascript'> window.location.href='configuracoes.php';</script>";
			break;

		case isset($filesBro):
		$extensao = strtolower(substr($filesBro, -4));
		$novo_nome = sha1(time()) . $extensao;        
		$ext =  strtolower(substr($filesBro, -3));
		$tipos = array("png","jpg","gif");
		$diretorio = "imgsBanco/";
		$imagem = $diretorio.$novo_nome;
		if (in_array($ext, $tipos)) {

			if (move_uploaded_file($_FILES['img']['tmp_name'], "../".$imagem)) {

				$update = $pdo->prepare("update usuario set url_foto_usu = '$imagem' where cod_usu = $codUsu;");
				$update->execute();
				echo "<script type='text/javascript'> window.location.href='configuracoes.php';</script>";
			}
		}
			break;
		
	}
	break;

}

	// if($emailUsu != ''){







		// if($nomeUsu !== '' || $lero !== '' || $cpf !== '' ){
  //               echo "CPF inválido!";
 	// 	}else if($cpf === false){

 	// 	}

	// }else{
	// 	echo "O campo Email é obrigatório!";
	// }
}






 		//else if($lero != ''){
//                 $data = date_create_from_format('d/m/Y', "$lero");
//                 $NascAluno = date_format($data, 'Y-m-d');
//                 if($filesBro != ''){
// 					$extensao = strtolower(substr($filesBro, -4));
// 					$novo_nome = sha1(time()) . $extensao;        
// 					$ext =  strtolower(substr($filesBro, -3));
// 					$tipos = array("png","jpg","gif");
// 					$diretorio = "imgsBanco/";
// 					$imagem = $diretorio.$novo_nome;

// 					if($senhaNueva != ''){

// 						if($senhaAtual != ''){
// 							$selectSenhaAtual = ("select senha from acesso where cod_acesso = $codAcesso");
// 							$comand = $pdo->prepare($selectSenhaAtual);
// 							$comand->execute();
// 							while($dados = $comand->fetch(PDO::FETCH_ASSOC)){
// 								$senhaBanco = $dados['senha'];
// 							}
// 							$obj = new Bcrypt();
//         					if($obj->check($senhaAtual, $senhaBanco)){
//         						//fala que deu tudo certo e faz o update completo
//         					}else{
//         						echo "Senha Incorreta!";
//         					}

// 						}else{
// 							echo "Preencha o campo com sua senha atual!";
// 						}


// 					}else{
// 						if($senhaAtual != ''){
// 							$selectSenhaAtual = ("select senha from acesso where cod_acesso = $codAcesso");
// 							$comand = $pdo->prepare($selectSenhaAtual);
// 							$comand->execute();
// 							while($dados = $comand->fetch(PDO::FETCH_ASSOC)){
// 								$senhaBanco = $dados['senha'];
// 							}
// 							$obj = new Bcrypt();
//         					if($obj->check($senhaAtual, $senhaBanco)){
//         						//fala que deu tudo certo e faz o update sem a nova senha
//         					}else{
//         						echo "Senha Incorreta!";
//         					}

// 						}else{
// 							echo "Preencha o campo com sua senha atual!";
// 						}
// 					}
			            
// 			    }else{
// 			    	if($senhaAtual != ''){
// 							$selectSenhaAtual = ("select senha from acesso where cod_acesso = $codAcesso");
// 							$comand = $pdo->prepare($selectSenhaAtual);
// 							$comand->execute();
// 							while($dados = $comand->fetch(PDO::FETCH_ASSOC)){
// 								$senhaBanco = $dados['senha'];
// 							}
// 							$obj = new Bcrypt();
//         					if($obj->check($senhaAtual, $senhaBanco)){
//         						//fala que deu tudo certo e faz o update sem a nova senha e sem foto
//         					}else{
//         						echo "Senha Incorreta!";
//         					}

// 						}else{
// 							echo "Preencha o campo com sua senha atual!";
// 						}
// 			    }
			
//     	}else{
//     		if($filesBro != ''){
// 					$extensao = strtolower(substr($filesBro, -4));
// 					$novo_nome = sha1(time()) . $extensao;        
// 					$ext =  strtolower(substr($filesBro, -3));
// 					$tipos = array("png","jpg","gif");
// 					$diretorio = "imgsBanco/";
// 					$imagem = $diretorio.$novo_nome;

// 					if($senhaNueva != ''){

// 						if($senhaAtual != ''){
// 							$selectSenhaAtual = ("select senha from acesso where cod_acesso = $codAcesso");
// 							$comand = $pdo->prepare($selectSenhaAtual);
// 							$comand->execute();
// 							while($dados = $comand->fetch(PDO::FETCH_ASSOC)){
// 								$senhaBanco = $dados['senha'];
// 							}
// 							$obj = new Bcrypt();
//         					if($obj->check($senhaAtual, $senhaBanco)){
//         						//fala que deu tudo certo e faz o update completo
//         					}else{
//         						echo "Senha Incorreta!";
//         					}

// 						}else{
// 							echo "Preencha o campo com sua senha atual!";
// 						}


// 					}else{
// 						if($senhaAtual != ''){
// 							$selectSenhaAtual = ("select senha from acesso where cod_acesso = $codAcesso");
// 							$comand = $pdo->prepare($selectSenhaAtual);
// 							$comand->execute();
// 							while($dados = $comand->fetch(PDO::FETCH_ASSOC)){
// 								$senhaBanco = $dados['senha'];
// 							}
// 							$obj = new Bcrypt();
//         					if($obj->check($senhaAtual, $senhaBanco)){
//         						//fala que deu tudo certo e faz o update sem a nova senha
//         					}else{
//         						echo "Senha Incorreta!";
//         					}

// 						}else{
// 							echo "Preencha o campo com sua senha atual!";
// 						}
// 					}
			            
// 			    }else{
// 			    	if($senhaAtual != ''){
// 							$selectSenhaAtual = ("select senha from acesso where cod_acesso = $codAcesso");
// 							$comand = $pdo->prepare($selectSenhaAtual);
// 							$comand->execute();
// 							while($dados = $comand->fetch(PDO::FETCH_ASSOC)){
// 								$senhaBanco = $dados['senha'];
// 							}
// 							$obj = new Bcrypt();
//         					if($obj->check($senhaAtual, $senhaBanco)){
//         						//fala que deu tudo certo e faz o update sem a nova senha e sem foto
//         					}else{
//         						echo "Senha Incorreta!";
//         					}

// 						}else{
// 							echo "Preencha o campo com sua senha atual!";
// 						}
// 			    }
    		
//     	}

// 	}else{
// 		echo "O campo Email é obrigatório!";
// 	}
// }

?>