<?php
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;

function PHPMailer($assunto, $mensagem, $desinatário = "exodiadeini@gmail.com"){
    $PHPMailer = new PHPMailer();

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

?>