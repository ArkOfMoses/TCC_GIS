<?php

require_once 'functions/PHPMailer.php';


$filterForm = [
  "firstname" => FILTER_SANITIZE_SPECIAL_CHARS,
  "email" => FILTER_VALIDATE_EMAIL,
  "mais-info" => FILTER_SANITIZE_SPECIAL_CHARS
];

$infoPost = filter_input_array(INPUT_POST, $filterForm);


if($infoPost){
  // não sei oq tá acontecendo aqui, mas dá certo
  $nome = '=?UTF-8?B?'.base64_encode($infoPost['firstname']).'?=';
  $emailEnviando = $infoPost['email'];
  $informacoes = substr($infoPost['mais-info'], 0, 16384);


  if ($nome === '' || $emailEnviando === '' || $informacoes === '' ) {
    echo "<p>É necessário preencher todos os campos!</p>";
  }else if($emailEnviando === false){
    echo "<p>O Email é inválido!</p>";
  }else{
    $assunto = "Contato de $nome";
    $mensagem = "<p>".$informacoes."</p>Email para resposta: <p>".$emailEnviando."</p>";
    $PHPMailer = PHPMailer($assunto, $mensagem);

    if($PHPMailer === true){
      echo "<p>Seu email foi enviado com sucesso!</p>";
    }else{
      echo $PHPMailer;
    }
  }
}
?>