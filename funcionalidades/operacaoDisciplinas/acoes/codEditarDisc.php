<?php
require_once '../../../bd/conexao.php';
$codDisc = filter_var($_REQUEST['codDisc'], FILTER_SANITIZE_NUMBER_INT);
$nomeDisc = filter_var($_POST['nome_curso'], FILTER_SANITIZE_SPECIAL_CHARS);
$cargaHoraria = filter_var($_POST['carga_horaria'], FILTER_SANITIZE_NUMBER_INT);

if($nomeDisc != ''){
    $update = $pdo->prepare("update disciplina set nome_disc = '$nomeDisc', carga_horaria_disc = $cargaHoraria where cod_disc = $codDisc;");
    $update->execute();
    echo "<p>Disciplina atualizada corretamente</p>";
}else{
    echo "<p>É necessário preencher o campo</p>";
}
