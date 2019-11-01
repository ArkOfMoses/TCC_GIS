<?php
require_once '../../../bd/conexao.php';
$codTurma = filter_var($_REQUEST['codTurma'], FILTER_SANITIZE_NUMBER_INT);
$nomeTurma = filter_var($_POST['nome_curso'], FILTER_SANITIZE_SPECIAL_CHARS);

if($nomeTurma != ''){
    $update = $pdo->prepare("update turma set sigla_tur = '$nomeTurma' where cod_tur = $codTurma;");
    $update->execute();
    echo "<p>Turma atualizada corretamente</p>";
}else{
    echo "<p>É necessário preencher o campo</p>";
}
