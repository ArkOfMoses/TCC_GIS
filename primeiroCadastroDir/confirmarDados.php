<?php
session_start();
require_once '../primeiroCadastroMaster/funcoes/funcoes.php';
require_once '../bd/conexao.php';

if(isset($_SESSION['logado'])){
    $dados =  $_SESSION['dadosUsu'];
    $img = $dados['fotoUsu'];
}else{
    // unset($_SESSION['dadosUsu']);
    // unset($_SESSION['logado']);
    //session_destroy();
    //header("Location: ../homeLandingPage.php");
}


?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Primeiro cadastro</title>    
        <link rel="stylesheet" href="../css/default.css">    
        <script src='../js/jquery-3.3.1.min.js'></script>        
        <script src="../js/jquery.mask.min.js" type="text/javascript"></script>
        <!-- CSS PADRÃO -->
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

        <!-- Telas Responsivas -->
        <link rel=stylesheet media="screen and (max-width:480px)" href="../css/cssCadastroMaster/style480.css">
        <link rel=stylesheet media="screen and (min-width:481px) and (max-width:768px)"
              href="../css/cssCadastroMaster/style768.css">
        <link rel=stylesheet media="screen and (min-width:769px) and (max-width:1024px)"
              href="../css/cssCadastroMaster/style1024.css">
        <link rel=stylesheet media="screen and (min-width:1025px)" href="../css/cssCadastroMaster/style1366.css">
        <style type="text/css">
                
                img.perfil-foto{

                    width: 176px;
                    height:176px;
                    border-radius: 100%;
                    border: 3px solid;
                    border-color: #666;
                    z-index: 1;
                }
        </style>

    </head>
    <body>
        <div class="content">

            <header class="headerPrimeiroAcesso">
            <!-- <a href="alterarAcc/alterarAcc.php"><img src="img/alteraImg.png"></a>
            <a href="cadastroDeInst/cadastroDeInst.php"><img src="img/instImg.png"></a>
            <a href="cadastroDeUnid/cadastroDeUnid.php"><img src="img/unidImg.png"></a>
            <a href="cadastroDeDir/cadastroDir.php"><img src="img/dirImg.png"></a>
            <a href="enviarEmail.php"><img src="img/emailImg.png"></a>  -->               
            <a href="confirmarDados.php"><img src="../primeiroCadastroMaster/img/confirmaImg.png"></a>


            </header>

            <main>
                <div class="acessoUm">
                    <!---PERGUNTAR SE O UPLOAD DE FOTOS É NECESSÁRIO-->
                    <h1>Cadastro concluído!</h1>
                    <p>Por favor, confirme suas informações abaixo.</p>
                    <?php                      
                        if($img === NULL){
                            echo "<img src='../imagens/perfil.png' class='perfil-foto'/>";
                        }else{
                            echo "<img src='../$img' class='perfil-foto'>";
                        }    


                            $codUnid = $_SESSION['dadosUsu']['codUnidadeUsu'];
                            $codUsu = $_SESSION['dadosUsu']['codUsu'];

                            $selectUnid = $pdo->prepare("select * from unidade where cod_unid = $codUnid");
                            $selectUnid->execute();

                            while($daten = $selectUnid->fetch(PDO::FETCH_ASSOC)){
                                $nome = $daten['nome_unid'];
                                $cep = $daten['cep_unid'];
                                $numUnid = $daten['num_unid'];

                                if($daten['compl_unid'] !== null){
                                    $complemento = $daten['compl_unid'];
                                }

                            }

                            echo '<h2>Sua unidade:</h2>';
                            echo "<label>Nome: </label><p>$nome</p>";
                            echo "<label>CEP: </label><p class='cep'>$cep</p>";
                            echo "<label>Numero: </label><p>$numUnid</p>";
                            if(isset($complemento)){
                            echo "<label>Complemento: </label><p>$complemento</p>";
                            }

                            $selectCodUsus = $pdo->prepare("select * from usuario_unidade where cod_unid = $codUnid and cod_usu != $codUsu");
                            $selectCodUsus->execute();

                            $numDeLinhas = $selectCodUsus->rowCount();

                            if($numUnid === 0){
                                echo "<p>Usuário Inexistente!</p>";
                            }else{

                                $codsUsu = array();
                                //$info usu = array();

                                while($dane = $selectCodUsus->fetchAll(PDO::FETCH_ASSOC)){
                                    for($i = 0; $i <= ($numDeLinhas-1); $i++){
                                        $codsUsu[] = (int)$dane[$i]['cod_usu'];
                                    }
                                }

                                //var_dump($codsUsu);
                                echo "<br><h4>Coordenadores e Professores</h4>";
                                for($k = 0; $k < count($codsUsu); $k++){
                                    //var_dump($codsUsu[$k]);
                                    $selectUsu = $pdo->prepare("select * from usuario where cod_usu = {$codsUsu[$k]}");
                                    $selectUsu->execute();
                                    

                                    while($adat = $selectUsu->fetch(PDO::FETCH_ASSOC)){
                                            $nome = $adat['nome_usu'];
                                    }

                                    // var_dump($nome);

                                     

                                    $codAcesso = get_id($pdo, "cod_acesso", "usuario", "cod_usu", $codsUsu[$k]);
                                    // var_dump($codAcesso);

                                    $selectAcess = $pdo->prepare("select * from acesso where cod_acesso = $codAcesso");
                                    $selectAcess->execute();

                                    while($datuak = $selectAcess->fetch(PDO::FETCH_ASSOC)){
                                            $email = $datuak['email'];
                                            $codTipo = (int)$datuak['cod_tipo_usu'];
                                    }

                                    if($codTipo == 4){
                                    echo "
                                        <p>Nome do coordenador:</p>
                                        <p>$nome</p>
                                        
                                        <p>Email do coordenador:</p>
                                        <p>$email</p>
                                        <br>
                                        <br>
                                        ";
                                    }


                                    
                                    if($codTipo == 5){
                                        echo "
                                        <p>Nome do professor:</p>
                                        <p>$nome</p>
                                        
                                        <p>Email do professor:</p>
                                        <p>$email</p>
                                        <br>
                                        <br>
                                        ";
                                    }
                                }
                            }
                
                       ?>
                    <!-- <a href='enviarEmail.php' class="buttonNext">Voltar</a> -->
                    <a href='../primeiroCadastroMaster/enviarEmail.php' class="buttonNext">Proximo Passo</a>
                </div>                  
            </main>    
            <script type="text/javascript">
            $(document).ready(function(){
                $(".cep").mask("00000-000");
            })        
            </script>  
    </body>
</html>