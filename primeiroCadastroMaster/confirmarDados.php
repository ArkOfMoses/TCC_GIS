<?php
session_start();
if(isset($_SESSION['logado'])){
    $dados =  $_SESSION['dadosUsu'];
}else{
    unset($_SESSION['dadosUsu']);
    unset($_SESSION['logado']);
    session_destroy();
    header("Location: homeLandingPage.php");
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
        <!-- CSS PADRÃO -->
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

        <!-- Telas Responsivas -->
        <link rel=stylesheet media="screen and (max-width:480px)" href="../css/cssCadastroMaster/style480.css">
        <link rel=stylesheet media="screen and (min-width:481px) and (max-width:768px)"
              href="../css/cssCadastroMaster/style768.css">
        <link rel=stylesheet media="screen and (min-width:769px) and (max-width:1024px)"
              href="../css/cssCadastroMaster/style1024.css">
        <link rel=stylesheet media="screen and (min-width:1025px)" href="../css/cssCadastroMaster/style1366.css">


    </head>
    <body>
        <div class="content">

            <header class="headerPrimeiroAcesso">
            <!-- <a href="alterarAcc/alterarAcc.php"><img src="img/alteraImg.png"></a>
            <a href="cadastroDeInst/cadastroDeInst.php"><img src="img/instImg.png"></a>
            <a href="cadastroDeUnid/cadastroDeUnid.php"><img src="img/unidImg.png"></a>
            <a href="cadastroDeDir/cadastroDir.php"><img src="img/dirImg.png"></a>
            <a href="enviarEmail.php"><img src="img/emailImg.png"></a>  -->               
            <a href="confirmarDados.php"><img src="img/confirmaImg.png"></a>


            </header>

            <main>
                <div class="acessoUm">
                    <!---PERGUNTAR SE O UPLOAD DE FOTOS É NECESSÁRIO-->
                    <h1>Cadastro concluído!</h1>
                    <p>Por favor, confirme suas informações abaixo.</p>
                    <img src="img/avatar_test.jpg">
                    

                    <form class='form' method='post' action='cod_confirmarDados.php'>
                        <?php

                            require_once 'funcoes/funcoes.php';
                            require_once '../bd/conexao.php';


                            $inst = get_inst($pdo);


                        echo '<h2>Instituição</h2>';
                        echo "<label>Nome Fantasia: </label><input type='text' name='nomeFant' value='".$inst[0]['nomeFant']."'>";
                        echo "<label>Razão Social: </label><input type='text' name='razaoSoci' value='".$inst[0]['razaoSocial']."'>";
                        echo "<label>CNPJ: </label><input type='text' name='cnpj' value='".$inst[0]['CNPJ']."'>";

                            $unid = get_unid($pdo);

                            $selecionar = ("select usuario.cod_usu, nome_usu, cpf_usu, data_nasc_usu, url_foto_usu, data_entrada, data_saida, cod_status_usu, acesso.cod_acesso, tipo_usuario.cod_tipo_usu, nome_tipo_usu, senha, email
From usuario inner join acesso on (usuario.cod_acesso = acesso.cod_acesso)
             inner join tipo_usuario on (acesso.cod_tipo_usu = tipo_usuario.cod_tipo_usu) where nome_tipo_usu = 'Diretor';");
                            $comando = $pdo->prepare($selecionar);
                            $comando->execute();
                              

                            $numeroDeLinhas = $comando->rowCount();
                              if ($numeroDeLinhas === 0) {

                                  echo "<p>Usuário Inexistente!</p>";

                              }else if($numeroDeLinhas >= 1){
                                while($dados = $comando->fetchAll(PDO::FETCH_ASSOC)){
                                     $dedos = $dados;
                                    // $nomeDir = $dados['nome_usu'];
                                    // $emailDir = $dados['email'];
                                    // $senhaDir = $dados['senha'];
                                } 
                              $nomeDir = array();
                              $emailDir = array();
                              $senhaDir = array();
                              
                              for($i = 0; $i <= ($numeroDeLinhas-1); $i++){
                                $nomeDir[] = $dedos[$i]['nome_usu'];
                                $emailDir[] = $dedos[$i]['email'];
                                //$senhaDir[] = $dedos[$i]['senha'];
                              }

                            
                            for ($i = 0; $i < count($unid); $i++) { 
                                echo '
                                        <h3>Unidade:</h3>
                                        <label>Nome da Unidade: </label><input type="text" value="'.$unid[$i]['nomeUnid'].'" name="nomeUnid'.$i.'">
                                        <label>CEP da Unidade: </label><input type="text" value="'.$unid[$i]['cepUnid'].'" name="cepUnid'.$i.'">
                                        <label>Número da Unidade: </label><input type="text" value="'.$unid[$i]['numUnid'].'" name="numUnid'.$i.'">
                                        <label>Complemento da Unidade: </label><input type="text" value="'.$unid[$i]['complUnid'].'" name="complUnid'.$i.'">


                                        <h4>Diretores:</h4>

                                        <label>Confirme o diretor:</label>
                                        <input type="text" name="nomeDir'.$i.'" value="'.$nomeDir[$i].'">
                                        
                                        <label>Confirme o email do diretor:</label>
                                        <input type="email" name="emailDir'.$i.'" value="'.$emailDir[$i].'">';
                                        
                                        // <label>Confirme a senha:</label>
                                        // <input type="password" value="'.$senhaDir.'">';


                            }

                        }
                        
                       ?>
                       <input type="submit" value="Atualizar">
                    </form>
                    <!-- <a href='enviarEmail.php' class="buttonNext">Voltar</a> -->
                    <a href='enviarEmail.php' class="buttonNext">Proximo Passo</a>
                </div>
                    
                    
                    
                
            </main>    
    </body>
</html>