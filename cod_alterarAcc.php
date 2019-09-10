<?php
require_once 'bd/conexao.php';
require_once 'classes/Bcrypt.php'; // n sei se vai usar
session_start();

/*
informações que a gente precisa pegar através da sessão dadosUsu:
cod_tipo_usu
*/

$filterForm = [
    "nome_usu" => FILTER_SANITIZE_SPECIAL_CHARS,
    "email" => FILTER_VALIDATE_EMAIL,
    "confirmaEmail" => FILTER_VALIDATE_EMAIL,
    "senha" => FILTER_SANITIZE_SPECIAL_CHARS,
    "confirmaSenha" => FILTER_SANITIZE_SPECIAL_CHARS,
    "cpf_usu" => FILTER_SANITIZE_SPECIAL_CHARS, //talvez a validação seja por JS
    "data_nasc" => FILTER_DEFAULT //talvez a validação seja por JS
];  

$infoPost = filter_input_array(INPUT_POST, $filterForm);

if($infoPost){

    //aqui a gente precisa fazer o rolê da imagem

    if(in_array("", $infoPost)){
        echo "<p>É necessário preencher todos os campos!</p>";
    }else{
        if($infoPost['email'] === false || $infoPost['confirmaEmail'] === false){
            echo "<p>Email inválido!</p>";
        }else if($infoPost['email'] != $infoPost['confirmaEmail']){
            echo "<p>Emails não batem!</p>";
        }else if($infoPost['senha'] != $infoPost['confirmaSenha']){
            echo "<p>Senhas não batem!</p>";
        }else{ //talvez fosse bom o sistema só aceitar maiores de 18 anos, já que a gente sabe a data de nascimento dele, 
                // mas se esse for o caso a data de nascimento tem q entrar no cadastro da landing.
            
            $codAcesso = $_SESSION['dadosUsu']['codAcesso'];
            $codUsu = $_SESSION['dadosUsu']['codUsu'];
            $senhaEncript = Bcrypt::hash($infoPost['senha']);
            //date_default_timezone_set('Etc/UTC');
            //se a gente não for usar o type=date, a gente precisa fazer o rolê de inverter pra ficar no padrão do banco
            $comando1 = $pdo->prepare("update acesso set senha = '$senhaEncript', email = '{$infoPost['email']}' where cod_acesso = $codAcesso");
            $comando2 = $pdo->prepare("update usuario set nome_usu = '{$infoPost['nome_usu']}', cpf_usu = '{$infoPost['cpf_usu']}', data_nasc_usu = '{$infoPost['data_nasc']}', /*url_foto_usu = 'rolê da foto',*/ data_entrada = (cast(NOW() as Date)) where cod_acesso = $codUsu");
            
            if($comando1->execute() && $comando2->execute()){                
                $nomeTipoUsu = $_SESSION['dadosUsu']['nomeTipoUsu'];
            
                switch ($nomeTipoUsu) {
                    case 'Master':
                       //header("Location: cadastroDeInst.php");
                       echo "<script type='text/javascript'> window.location.href='perfilAluno.php';</script>";
                    break;

                    case 'Professor':
                        echo "<script type='text/javascript'> window.location.href='perfilProfessor.php';</script>";
                    break;

                    case 'Saude':
                        echo "<script type='text/javascript'> window.location.href='perfilSaude.php';</script>";
                    break;
                }

            }else{
                echo "<p>Não foi possível atualizar suas informações!</p>";
            }
        } 
    }
}