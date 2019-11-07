<?php

require_once '../../primeiroCadastroMaster/funcoes/funcoes.php';
require_once '../../bd/conexao.php';
$codInst = $_REQUEST['codInst'];
$arrayPost = [
    "nome" => FILTER_SANITIZE_SPECIAL_CHARS,
    "razao" => FILTER_SANITIZE_SPECIAL_CHARS,
    "cnpj" => FILTER_DEFAULT
];

$infoPost = filter_input_array(INPUT_POST, $arrayPost);

if($infoPost){

	$nomeFant = $infoPost['nome'];
    $razaoSoci = $infoPost['razao'];
    $cnpj = validaCNPJ($infoPost['cnpj']);

    $select = $pdo->prepare("select * from instituicao where CNPJ_inst = $cnpj");
    $select->execute();
    $numLinhas = $select->rowCount();

     if(in_array("", $infoPost)){
            echo "<p>É necessário preencher todos os campos!</p>";
        }else if($cnpj === false) {
            echo "<p>CNPJ inválido!</p>";
        }else if($numLinhas > 0){
            echo "<p>CNPJ já cadastrado!</p>";
        }else{
        	$atualizarInst = $pdo->prepare("update instituicao set nome_fantasia_inst = '$nomeFant', razao_social_inst = '$razaoSoci', CNPJ_inst = $cnpj where cod_inst = $codInst;");
        	if($atualizarInst->execute()){
        		echo "<script type='text/javascript'> window.location.href='instituicao.php';</script>";
        	}else{

                echo "<p>Não foi possível atualizar a instituição</p>";
            }   


        }

}


?>