<?php

session_start();
//include 'bd/conexao.php';


//a gente precisa filtrar as informações do post
//tbm tem o jeito q o professor Rogério ensinou do filter input:
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL); 
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING); 


if($email != false){

    //dps disso a gente precisa ver se o email e a senha tão certos, aqui eu tbm vou deixar em aberto pq a gente precisa decidir um dos de ^cima^
    // e decidir se a gente vai encriptografar as senhas e tals

    //if(numeroDeLinhas == 1){
        //aqui a gente precisa ver o tipo de usuário que é e oq a gente vai fazer com cada tipo,
        //aqui o sistema tbm vai precisar checar se é a primeira vez que o usuário tá entrando na tela ou não
    //}
}