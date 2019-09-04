<?php
/*
session_start();
include 'bd/conexao.php';


//função que valida os emails (talvez fosse melhor separar em outro arquivo e talvez a gente nem use mas deixei aqui):
function validaemail($txtEmail) {
    $valida = preg_match('/^([a-zA-Z0-9.-_])*([@])([a-z0-9]).([a-z]{2,3})/', $txtEmail);

    if ($valida === 0) {
        return false;
    } else if ($valida === 1) {
        return true;
    }
}

//a gente precisa filtrar as informações do post

//o jeito que a gente fez no TCA:
$email = htmlentities($_POST['email'], ENT_QUOTES, "UTF-8");
$senha = htmlentities($_POST['senha'], ENT_QUOTES, "UTF-8");

//tbm tem o jeito q o professor Rogério ensinou do filter input:
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL); <- se tiver certo retorna o email, se tiver errado retorna falso
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING); <- se tiver errado faz as mudanças necessárias pra estar correto e retorna a string

//tbm tem o jeito do Giovani de usar o :param no prepare->() e assim ele faz as mudanças sozinho(não recomendo pq embora fosse o ideal, eu num sei usar direito shahsua)


//dps disso a gente precisa validar mas a gente precisa escolher um dos de ^cima^ então vou deixar em branco

if(){

    //dps disso a gente precisa ver se o email e a senha tão certos, aqui eu tbm vou deixar em aberto pq a gente precisa decidir um dos de ^cima^
    // e decidir se a gente vai encriptografar as senhas e tals

    if(numeroDeLinhas == 1){
        //aqui a gente precisa ver o tipo de usuário que é e oq a gente vai fazer com cada tipo,
        //aqui o sistema tbm vai precisar checar se é a primeira vez que o usuário tá entrando na tela ou não
    }
}
*/