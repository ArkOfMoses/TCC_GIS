<?php session_start();
if(isset($_SESSION['logado'])){
    $dados =  $_SESSION['dadosUsu'];
    $img = $dados['fotoUsu'];
    $codInst = $dados['codInstituicao']; 
}else{
    unset($_SESSION['dadosUsu']);
    unset($_SESSION['logado']);
    session_destroy();
    header("Location: ../homeLandingPage.php");
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
            <a href="confirmarDados.php"><img src="img/confirmaImg.png"></a>


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
                    ?>
                    

                        <?php

                            require_once 'funcoes/funcoes.php';
                            require_once '../bd/conexao.php';

                            $inst = get_inst($pdo, $codInst);

                        echo "<div class='endUnid'>";
                        echo '<h2>Instituição:</h2>';
                        echo "<p class='confirma'>Nome Fantasia: </p><p>".$inst[0]['nomeFant']."</p>";
                        echo "<p class='confirma'>Razão Social: </p><p>".$inst[0]['razaoSocial']."</p>";
                        echo "<p class='confirma'>CNPJ: </p><p id='cnpj'>".$inst[0]['CNPJ']."</p>";
                        echo "</div>";
                            $unid = get_unid($pdo, $codInst);

                            $selecionar = ("select usuario.cod_usu, nome_usu, cpf_usu, data_nasc_usu, url_foto_usu, data_entrada, data_saida, cod_status_usu, acesso.cod_acesso, tipo_usuario.cod_tipo_usu, nome_tipo_usu, senha, email
                            From usuario inner join usuario_unidade on (usuario_unidade.cod_usu = usuario.cod_usu)
                                         inner join unidade on (unidade.cod_unid = usuario_unidade.cod_unid)
                                         inner join acesso on (usuario.cod_acesso = acesso.cod_acesso)
                                         inner join tipo_usuario on (acesso.cod_tipo_usu = tipo_usuario.cod_tipo_usu) where nome_tipo_usu = 'Diretor' and cod_inst = $codInst;");
                            $comando = $pdo->prepare($selecionar);
                            $comando->execute();
                              

                            $numeroDeLinhas = $comando->rowCount();
                              if ($numeroDeLinhas === 0) {

                                  echo "<p>Usuário Inexistente!</p>";

                              }else if($numeroDeLinhas >= 1){
                              $dedos = $comando->fetchAll(PDO::FETCH_ASSOC);

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
                                        <div class="endUnid">
                                        <h3>Unidade:</h3>
                                        <p class="confirma">Nome da Unidade: </p><p>'.$unid[$i]['nomeUnid'].'</p>
                                        <label class="confirma">CEP da Unidade:</label><p class="cep">'.$unid[$i]['cepUnid'].'</p>
                                        <p class="confirma">Rua da Unidade:</p> <p>'.$unid[$i]['ruaUnid'].'</p>
                                        <p class="confirma">Bairro da Unidade: </p><p>'.$unid[$i]['bairroUnid'].'</p>
                                        <p class="confirma">Cidade da Unidade: </p><p>'.$unid[$i]['cidadeUnid'].'</p>
                                        <p class="confirma">Número da Unidade: </p><p>'.$unid[$i]['numUnid'].'</p>
                                        ';
                                        
                                if($unid[$i]['complUnid'] != NULL){
                                         echo '<p class="confirma">Complemento da Unidade:</p><p> '.$unid[$i]['complUnid'].'</p>';
                                }

                                echo '
                                    </div>
                                    <div class="endUnid">
                                        <h4>Diretor:</h4>

                                        <p class="confirma">Nome do diretor:</p>
                                        <p>'.$nomeDir[$i].'</p>
                                        
                                        <p class="confirma">Email do diretor:</p>
                                        <p>'.$emailDir[$i].'</p>
                                        
                                    </div>';
                                        
                                        // <label>Confirme a senha:</label>
                                        // <input type="password" value="'.$senhaDir.'">';


                            }

                        }
                        
                       ?>
                    <!-- <a href='enviarEmail.php' class="buttonNext">Voltar</a> -->
                    <a href='enviarEmail.php' class="buttonNext">Proximo Passo</a>
                </div>                  
            </main>    
            <script type="text/javascript">
            $(document).ready(function(){
                $("#cnpj").mask("00000000/0000-00");
                $(".cep").mask("00000-000");
            });        
            </script>  
    </body>
</html>