<?php

include_once "../funcoes/conexao.php";
$daora = $_REQUEST['cod'];

if (isset($_POST['enviar'])) {
    

    $nomeUsu = $_POST['nomeUsu'];
    $emailUsu = $_POST['emailUsu'];
    $senhaUsu = $_POST['senhaUsu'];
    $nomeInst = $_POST['instituicao'];


    $selecionar = ("select codInst from instituicao where nomeInst = '$nomeInst'");
    $comando = $pdo->prepare($selecionar);
    $comando->execute();
    
    while($dados = $comando->fetch(PDO::FETCH_ASSOC)){
        $codInst = $dados['codInst'];
    }

    if($nomeUsu == '' || $emailUsu == '' || $senhaUsu == '' || $nomeInst == ''){
        echo "<script type='text/javascript'>alert('Todos os campos devem ser preenchidos!'); window.location.href='editarDir.php?cod=".$daora."';</script>";
    } else {
    $strAtualizar = "update usuarios set nomeUsu = '$nomeUsu', emailUsu = '$emailUsu', senhaUsu = '$senhaUsu', codInst = '$codInst' where codUsu = '$daora'";

        if ($pdo->exec($strAtualizar)) {
            echo "<script type='text/javascript'>alert('Editado com sucesso'); window.location.href='cadastroDir.php';</script>";
        } else {
            echo "<script type='text/javascript'>alert('Não Editado'); window.location.href='cadastroDir.php';</script>";
        }
    }
}

?>