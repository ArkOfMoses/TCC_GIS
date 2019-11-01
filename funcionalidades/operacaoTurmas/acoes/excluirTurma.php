<?php
require_once '../../../bd/conexao.php';
$codTurma = filter_var($_REQUEST['codTurma'], FILTER_SANITIZE_NUMBER_INT);
$codCurso = filter_var($_REQUEST['codCurso'], FILTER_SANITIZE_NUMBER_INT);
$update = $pdo->prepare("update turma set cod_status_tur = 'I' where cod_tur = $codTurma;");
$update->execute();
header("Location: ../turmas.php?codCurso=$codCurso");
