<?php
require_once '../../../bd/conexao.php';
$codTurma = filter_var($_REQUEST['codTurma'], FILTER_SANITIZE_NUMBER_INT);
$codDisc = filter_var($_REQUEST['codDisc'], FILTER_SANITIZE_NUMBER_INT);
$update = $pdo->prepare("update disciplina set cod_status_disc = 'I' where cod_disc = $codDisc;");
$update->execute();
header("Location: ../verDisc.php?codTurma=$codTurma");
