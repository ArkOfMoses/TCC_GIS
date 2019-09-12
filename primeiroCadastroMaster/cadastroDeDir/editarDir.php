<?php

include_once "../funcoes/conexao.php";
$daora = $_REQUEST['cod'];

$comand = $pdo->prepare("select codUsu, nomeUsu, emailUsu, senhaUsu, nomeInst, instituicao.codInst from usuarios inner join instituicao on(usuarios.codInst = instituicao.codInst) where codUsu = '$daora'");
$comand->execute();
$numDeLinhas = $comand->rowcount();

if($numDeLinhas == 1){
	while($dados = $comand->fetch(PDO::FETCH_ASSOC)){
		$codUsu = $dados['codUsu'];
        $nomeUsu = $dados['nomeUsu'];
        $emailUsu = $dados['emailUsu'];
        $senhaUsu = $dados['senhaUsu'];
        $codInst = $dados['codInst'];
        $nomeInst = $dados['nomeInst'];
	}
}else{
	header("Location: cadastroDir.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Editar Cadastro do Diretor</title>
</head>
<body>
	<?php echo "<form method='post' action='cod_editarDir.php?cod=".$codUsu."' autocomplete='off'>" ?>
        <?php
        echo "
        <input type='text' value='".$nomeUsu."' name='nomeUsu' />
        <input type='text' value='".$emailUsu."' name='emailUsu' />
        <input type='text' value='".$senhaUsu."' name='senhaUsu' />
        ";
        ?>
        <select name='instituicao'>
        <?php
        
        $comand = $pdo->prepare("select * from instituicao");
        $comand->execute();

        $numDeLinhas = $comand->rowCount();
        if ($numDeLinhas >= 1) {
            while ($dados = $comand->fetch(PDO::FETCH_ASSOC)) {
                $instituicao = $dados['nomeInst'];
                $codInst = $dados['codInst'];
                echo'<option>' . $instituicao . '</option>';
            }
        }
    
        ?>
    </select>
		<input type='submit' name='enviar' value='Editar' />
	</form>
	<a href='cadastroDir.php'>Voltar</a>
</body>
</html>



