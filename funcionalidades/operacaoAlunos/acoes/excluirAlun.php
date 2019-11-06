<?php
require_once '../../../bd/conexao.php';
$codAlun = filter_var($_REQUEST['codAlun'], FILTER_SANITIZE_NUMBER_INT);
$codTur = filter_var($_REQUEST['codTur'], FILTER_SANITIZE_NUMBER_INT);
$update = $pdo->prepare("update usuario set cod_status_usu = 'I' where cod_usu = $codAlun;");
$update->execute();
header("Location: ../alunos.php?codTurma=$codTur");