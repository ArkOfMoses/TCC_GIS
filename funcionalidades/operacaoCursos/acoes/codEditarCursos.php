<?php
require_once '../../../bd/conexao.php';
$codCurso = filter_var($_REQUEST['codCurso'], FILTER_SANITIZE_NUMBER_INT);
$nomeCurso = filter_var($_POST['nome_curso'], FILTER_SANITIZE_SPECIAL_CHARS);

if($nomeCurso != ''){
    $update = $pdo->prepare("update cursos set nome_curso = '$nomeCurso' where cod_curso = $codCurso;");
    $update->execute();
    echo "<p>Curso atualizado corretamente</p>";
}else{
    echo "<p>É necessário preencher o campo</p>";
}
