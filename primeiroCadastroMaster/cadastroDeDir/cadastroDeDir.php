<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro de Diretor</title>

        
        <!-- <style>
            .headerPrimeiroAcesso a:nth-child(4){
                display:none;
            }
            .headerPrimeiroAcesso a:nth-child(5){
                display:none;
            }
            .headerPrimeiroAcesso a:nth-child(6){
                display:none;
            }
        </style> -->
        <link rel="stylesheet" href="../../css/cssCadastroMaster/style1366.css">
    </head>
    <body><div class="acessoUm">
            <!-- <header class="headerPrimeiroAcesso">
            <a href="../../alterarAcc.php"><img src="../img/alteraImg.png"></a>
            <a href="../cadastroDeInst/cadastroDeInst.php"><img src="../img/instImg.png"></a>
            <a href="../cadastroDeUnid/cadastroDeUnid.php"><img src="../img/unidImg.png"></a> -->
            <a href="../cadastroDeDir/cadastroDir.php"><img src="../img/dirImg.png"></a>
            <!-- <a href="../enviarEmail.php"><img src="../img/emailImg.png"></a>                
            <a href="../confirmarDados.php"><img src="../img/confirmaImg.png"></a>
 -->

            </header>
            <P>Adicione agora os responsáveis (diretoria) por cada  unidade

            </p>

            <img src="../img/avatar_test.jpg">
            <form method='post' action='cod_cadastroDir.php' class='form'>
                <?php
                require_once '../funcoes/funcoes.php';
                require_once '../../bd/conexao.php';

                


                if (get_usu_unid($pdo)) {
                    $unid = get_unid($pdo);
                   
                    for ($i = 0; $i < count($unid); $i++) {
                        $xis = $unid[$i];

                        echo "
            <h4>" . $xis['nomeUnid'] . "</h4>
            <label>Nome do Diretor: </label><input type='text' name='nome_" . $i . "' />
            <label>Email do Diretor: </label><input type='text' name='email_" . $i . "' />
            <label>Senha do Diretor: </label><input type='text' name='senha_" . $i . "' /><br><br>";
                    }
                    // }
                } else {
                    echo 'Diretores Já Cadastrados';
                }
                ?>
                <input type='submit' value='Cadastrar'>
            </form>
            <a href="../cadastroDeUnid/cadastroDeUnid.php" class="buttonNext">Voltar</a>
            <!-- <a href="../enviarEmail.php" class="buttonNext">Próximo passo</a> -->


        </form>

        <div>
            </body>
            </html>