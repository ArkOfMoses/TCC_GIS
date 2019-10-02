<?php

function PHPMailer($PHPMailer, $assunto, $mensagem, $desinatário = "exodiadeini@gmail.com"){

    $PHPMailer->IsSMTP();
    $PHPMailer->CharSet = 'UTF-8';

    //configuração do gmail
    $PHPMailer->Port = '465'; //porta usada pelo gmail.
    $PHPMailer->Host = 'smtp.gmail.com'; 
    $PHPMailer->IsHTML(true);  
    $PHPMailer->SMTPSecure = 'ssl';

    //configuração do usuário do gmail
    $PHPMailer->SMTPAuth = true; 
    $PHPMailer->Username = 'exodiadeini@gmail.com'; // usuario gmail.   
    $PHPMailer->Password = 'gostosinhos123'; // senha do email.
    $PHPMailer->SingleTo = true; 


    // configuração do email a ver enviado.
    $PHPMailer->setFrom("exodiadeini@gmail.com", "Gestão Institucional Simplificada");
    $PHPMailer->addReplyTo("exodiadeini@gmail.com", "Gestão Institucional Simplificada");
    $PHPMailer->addAddress($desinatário); // email do destinatario.

    $PHPMailer->Subject = $assunto; 
    $PHPMailer->Body = $mensagem;

    if($PHPMailer->Send()){
        return true;
      }else{
        $erro = "Erro ao enviar Email:" . $PHPMailer->ErrorInfo;
        return $erro;
      }
}

function PHPMailerList($PHPMailer, $arraySessao = array(), $tipoList){



  $PHPMailer->IsSMTP();
  $PHPMailer->CharSet = 'UTF-8';

  //configuração do gmail
  $PHPMailer->Port = '465'; //porta usada pelo gmail.
  $PHPMailer->Host = 'smtp.gmail.com'; 
  $PHPMailer->IsHTML(true);  
  $PHPMailer->SMTPSecure = 'ssl';

  //configuração do usuário do gmail
  $PHPMailer->SMTPAuth = true; 
  $PHPMailer->SMTPKeepAlive = true; 
  $PHPMailer->Username = 'exodiadeini@gmail.com'; // usuario gmail.   
  $PHPMailer->Password = 'gostosinhos123'; // senha do email.
  $PHPMailer->SingleTo = true; 


  // configuração do email a ver enviado.
  $PHPMailer->setFrom("exodiadeini@gmail.com", "Gestão Institucional Simplificada");
  $PHPMailer->addReplyTo("exodiadeini@gmail.com", "Gestão Institucional Simplificada");
  

  $acertos = array();
  $erros = array();

  for($i = 0; $i < count($arraySessao); $i++){

    $nome = $arraySessao[$i]['nome'];
    $email = $arraySessao[$i]['emailDir'];
    $senha = $arraySessao[$i]['senha'];
    $unidade = $arraySessao[$i]['unidade'];

    switch($tipoList){
          case 'Master':
                $body = "Olá diretor(a), Você foi cadastrado(a) no nosso sistema de Gestão Institucional Simplificada(GIS) para administrar a unidade $unidade, aqui estão as suas informações para o seu primeiro login: <br>
                email: $email <br> senha provisória: $senha <br>";
          break;

          case 'Diretor':
                  $tipo = $arraySessao[$i]['tipo'];
                  $body = "Olá $tipo(a), Você foi cadastrado(a) no nosso sistema de Gestão Institucional Simplificada(GIS) e está atrelado(a) a unidade $unidade, aqui estão as suas informações para o seu primeiro login: <br>
                  email: $email <br> senha provisória: $senha <br>";            
          break;
    }

      try {
          $PHPMailer->addAddress($email);
          $PHPMailer->Subject = "Olá $nome!!"; 



          $PHPMailer->Body = $body;
      } catch (Exception $e) {
          $erros[] = "basicamente, se cair aqui fudeu";
          continue;
      }

      try {
          $PHPMailer->send();
          $acertos[] = "mensagem enviada para o email $email";


      } catch (Exception $e) {
          $erros[] = "O email $email não foi enviado, $PHPMailer->ErrorInfo";
          //Reset the connection to abort sending this message
          //The loop will continue trying to send to the rest of the list
          $PHPMailer->smtp->reset();
      }
      //Clear all addresses and attachments for the next iteration
      $PHPMailer->clearAddresses();
      $PHPMailer->clearAttachments();
  }

  if(count($acertos) == count($arraySessao)){
    return true;
  }else{
    return $erros;
  }
}

?>