<?php
require_once '../../../bd/conexao.php';
$codCurso = filter_var($_REQUEST['codCurso'], FILTER_SANITIZE_NUMBER_INT);
$update = $pdo->prepare("update cursos set cod_status_cursos = 'I' where cod_curso = $codCurso;");
$update->execute();
header("Location: ../cursos.php");
