<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro de Diretor</title>

        <script>
            $(function () {
                $('.form').submit(function () {
                    $.ajax({
                        url: 'envia.php',
                        type: 'POST',
                        data: $('.form').serialize(),
                        success: function (data) {
                            if (data != '') {
                                $('.recebeDados').html(data);
                                document.getElementById('visor').value = '';
                            } else {
                                alert('Existem campos em branco!');
                            }
                        }
                    });
                    return false;
                });
            });
        </script>
        <style>
            .headerPrimeiroAcesso a:nth-child(4){
                display:none;
            }
            .headerPrimeiroAcesso a:nth-child(5){
                display:none;
            }
            .headerPrimeiroAcesso a:nth-child(6){
                display:none;
            }
        </style>
        <link rel="stylesheet" href="../css/style1366.css">
    </head>
    <body><div class="acessoUm">
            <header class="headerPrimeiroAcesso">
            <a href="../alterarAcc/alterarAcc.php"><img src="../img/alteraImg.png"></a>
            <a href="../cadastroDeInst/cadastroDeInst.php"><img src="../img/instImg.png"></a>
            <a href="../cadastroDeUnid/cadastroDeUnid.php"><img src="../img/unidImg.png"></a>
            <a href="../cadastroDeDir/cadastroDir.php"><img src="../img/dirImg.png"></a>
            <a href="../enviarEmail.php"><img src="../img/emailImg.png"></a>                
            <a href="../confirmarDados.php"><img src="../img/confirmaImg.png"></a>


            </header>
            <P>Adicione agora os responsáveis (diretoria) por cada  unidade

            </p>

            <img src="../img/avatar_test.jpg">
            <form method='post' action='cod_cadastroDir.php' class='form'>
                <?php
                require_once '../funcoes/funcoes.php';
                require_once '../funcoes/conexao.php';


                if (get_inst($pdo)) {
                    $inst = get_inst($pdo);
                    //     $usu = get_usu($pdo);
                    //     if(empty($usu)){
                    //         var_dump($usu);
                    //         echo 'Você já cadastrou todos os diretores de todas as unidades!';
                    // }else{
                    for ($i = 0; $i < count($inst); $i++) {
                        $xis = $inst[$i];

                        echo "
            <h4>" . $xis['nomeInst'] . "</h4>
            <label>Nome do Diretor: </label><input type='text' name='nome_" . $i . "' />
            <label>Email do Diretor: </label><input type='text' name='email_" . $i . "' />
            <label>Senha do Diretor: </label><input type='text' name='senha_" . $i . "' /><br><br>";
                    }
                    // }
                } else {
                    echo 'Não existem instituições<br><a href="../cadastroDeInst/index.php">Cadastrar Instituições</a><br>';
                }
                ?>
            </form>
            <a href="../cadastroDir/cadastroDir.php" class="buttonNext">Voltar</a>
            <a href="../enviarEmail.php" class="buttonNext">Próximo passo</a>


        </form>

        <div>
            </body>
            </html>