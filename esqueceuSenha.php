<?php
require_once 'bd/conexao.php';
require_once 'classes/Bcrypt.php';
require_once 'functions/PHPMailer.php';

$filterForm = array("email" => FILTER_VALIDATE_EMAIL);
$infoPost = filter_input_array(INPUT_POST, $filterForm);
$msg = array();

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
                $msg['msgEnviar'] = "<p>Não foi possível atualizar suas informações, por favor tente novamente</p>";
            }else{
                //código PHPMailer
                $assunto = "Sua nova senha do sistema GIS";
                $mensagem = "<p>recebemos a solicitação de uma nova senha para a sua conta no sistema GIS, sua nova senha provisória é $novaSenhaDescript, por favor entre na sua conta para modifica-la!</p>";
                $PHPMailer = PHPMailer($assunto, $mensagem, $email);

                if($PHPMailer === true){
                    $msg['msgEnviar'] = "Foi lhe enviado um email com sua senha provisória, por favor entre no seu email para conferir";
                }else{
                    $msg['msgEnviar'] = $PHPMailer;
                }
            }            
        }else{
            $msg['inexistente'] = "<p>Email inexistente!</p>";
        }
    }else{
        $msg['errEmail'] = "<p>Email inválido ou vazio!!</p>";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>FIEB Eventos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div id="container">
            <section>
                <h1>Recuperar senha</h1>
                <form method="post">
                    <input type="text" name="email" />
                    <input type="submit" value="Recuperar" />
                    <?php
                        if(array_key_exists('errEmail', $msg)){
                            echo $msg['errEmail'];
                        }else if(array_key_exists('inexistente', $msg)){
                            echo $msg['inexistente'];
                        }
                        
                        if(array_key_exists('msgEnviar', $msg)){
                            echo $msg['msgEnviar'];
                        }
                    ?>
                </form>        
            </section>
        </div>
    </body>
</html>