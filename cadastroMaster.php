<?php
require_once 'bd/conexao.php';
require_once 'classes/Bcrypt.php';

$filterForm = [
    "firstname" => FILTER_SANITIZE_SPECIAL_CHARS,
    "email" => FILTER_VALIDATE_EMAIL,
    "confEmail" => FILTER_VALIDATE_EMAIL,
    "senha" => FILTER_SANITIZE_SPECIAL_CHARS,
    "confSenha" => FILTER_SANITIZE_SPECIAL_CHARS,
    "dataNasc" => FILTER_DEFAULT
];  

$infoPost = filter_input_array(INPUT_POST, $filterForm);

if($infoPost){
    if(in_array("", $infoPost)){
        echo "É necessário preencher todos os campos!";
    }else{
        if($infoPost['email'] === false || $infoPost['confEmail'] === false){
            echo "Email inválido!";
        }else if($infoPost['email'] != $infoPost['confEmail']){
            echo "Emails não batem!";
        }else if($infoPost['senha'] != $infoPost['confSenha']){
            echo "Senhas não batem!";
        }else{ 
            
            $selectAcesso = $pdo->prepare("select * from acesso where email = '{$infoPost['email']}'");
            $selectAcesso->execute();
            $numLinhas = $selectAcesso->rowCount();

            if($numLinhas == 0){

                $date = new DateTime($infoPost['dataNasc']);
                $now = new DateTime();
                $age = $now->diff($date);

                if($age->y < 18){
                    echo "É necessário ter mais de 18 anos para se cadastrar!";
                }else{
                    // insert into acesso (cod_tipo_usu, senha, email) values (2, '$2y$12$rHeX2KwxK2dM66f4AYLW9u.n4Auf7Yd1UWUNjqKY5fUFqbJMccsxW', 'master@gmail.com');
                    $senhaEncript = Bcrypt::hash($infoPost['senha']);
                    $insertAcesso = $pdo->prepare("insert into acesso (cod_tipo_usu, senha, email) values (2, '$senhaEncript', '{$infoPost['email']}')");
                    
                    if($insertAcesso->execute()){
                        $selectAcesso = $pdo->prepare("select cod_acesso from acesso where email = '{$infoPost['email']}';");
                        $selectAcesso->execute();
                        while($acesso = $selectAcesso->fetch(PDO::FETCH_ASSOC)){
                            $codAcesso = $acesso['cod_acesso'];
                        }
                        $comando2 = $pdo->prepare("insert into usuario (nome_usu, data_nasc_usu, cod_status_usu, cod_acesso) values ('{$infoPost['firstname']}', '{$infoPost['dataNasc']}', 'A', $codAcesso)");
                        if($comando2->execute()){
                            echo "Seu cadastro foi concluido com sucesso, <a href='loginLandingPage.php'>Entre</a> já no seu perfil!";
                        }else{
                            echo "Houve um erro durante o seu cadastro e não foi possível cadastrar todas as informações, entre no seu perfil e confirme seus dados!";
                        }
                    }else{
                        echo "Não foi possível cadastrar, por favor tente novamente.";
                    }
                }
            }else{
                echo "Email já cadastrado!";
            }
        }
    }
}