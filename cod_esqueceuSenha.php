<?php
require_once 'bd/conexao.php';
require_once 'classes/Bcrypt.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';
require_once 'functions/PHPMailer.php';
use PHPMailer\PHPMailer\PHPMailer;

$filterForm = array("email" => FILTER_VALIDATE_EMAIL);
$infoPost = filter_input_array(INPUT_POST, $filterForm);


if($infoPost){
    if($infoPost['email'] != false){
        $email = $infoPost['email'];
        $comando = $pdo->prepare("select * from acesso where email = '$email'");
        $comando->execute();
        $numdelinhas = $comando->rowCount();

        if($numdelinhas === 1){
            //código
            $novaSenhaDescript = substr(md5(time()), 0, 8);
            $novaSenhaEncript = Bcrypt::hash($novaSenhaDescript);

            $str = "update acesso set senha = '$novaSenhaEncript' where email = '$email'";
            $comando = $pdo->prepare($str);

            if(!$comando->execute()){
                echo "<p>Não foi possível atualizar suas informações, por favor tente novamente</p>";
            }else{
                //código PHPMailer
                $assunto = "Sua nova senha do sistema GIS";
                $mensagem = "<p>recebemos a solicitação de uma nova senha para a sua conta no sistema GIS, sua nova senha provisória é ".$novaSenhaDescript.", por favor entre na sua conta para modifica-la!</p>";
                
                $mailer = new PHPMailer();
                $PHPMailer = PHPMailer($mailer, $assunto, $mensagem, $email);

                if($PHPMailer === true){
                    echo "Foi enviado um email com sua senha provisória, por favor entre no seu email para conferir";
                }else{
                    echo $PHPMailer;
                }
            }            
        }else{
            echo "<p>Email inexistente!</p>";
        }
    }else{
        echo "<p>Email inválido ou vazio!!</p>";
    }
}
?>