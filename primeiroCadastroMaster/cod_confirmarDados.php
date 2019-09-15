<?php

    require_once 'funcoes/funcoes.php';
    require_once '../bd/conexao.php';

$unid1 = get_unid($pdo);

$arrayPost = array();


$arrayPost = [
        "nomeFant" => FILTER_SANITIZE_SPECIAL_CHARS,
        "razaoSoci" => FILTER_SANITIZE_SPECIAL_CHARS,
        "cnpj" => FILTER_SANITIZE_NUMBER_INT
    ];

for($i = 0; $i < count($unid1); $i++){
        $arrayPost["nomeUnid$i"] = FILTER_SANITIZE_SPECIAL_CHARS;
        $arrayPost["cepUnid$i"] = FILTER_SANITIZE_NUMBER_INT;
        $arrayPost["numUnid$i"] = FILTER_SANITIZE_NUMBER_INT;
        $arrayPost["complUnid$i"] = FILTER_SANITIZE_SPECIAL_CHARS;
        $arrayPost["nomeDir$i"] = FILTER_SANITIZE_SPECIAL_CHARS;
        $arrayPost["emailDir$i"] = FILTER_VALIDATE_EMAIL;
}



$infoPost = filter_input_array(INPUT_POST, $arrayPost);


if($infoPost){
	$nomeFant = $arrayPost['nomeFant'];
	$razaoSoci = $arrayPost['razaoSoci'];
	$cnpj = $arrayPost['cnpj'];

	 for($n = 0; $n < count($unid1); $n++){
        $nomeUnid = $infoPost['nomeUnid'.$n];
        $cepUnid = $infoPost['cepUnid'.$n];      
        $numUnid = $infoPost['numUnid'.$n];
        $complUnid = $infoPost['complUnid'.$n];
        $nomeDir = $infoPost['nomeDir'.$n];
        $emailDir = $infoPost['emailDir'.$n];
    	
    	


    }

}




?>