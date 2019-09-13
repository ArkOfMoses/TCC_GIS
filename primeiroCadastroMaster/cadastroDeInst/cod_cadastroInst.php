<?php

 require_once '../funcoes/funcoes.php';
 require_once '../../bd/conexao.php';

    $arrayPost = [
        "nomeFant" => FILTER_DEFAULT,
        "razaoSoci" => FILTER_DEFAULT,
        "cnpj" => FILTER_DEFAULT
    ];

    $infoPost = filter_input_array(INPUT_POST, $arrayPost);
    
    if($infoPost){
            $nomeFant = $infoPost['nomeFant'];
            $razaoSoci = $infoPost['razaoSoci'];
            $cnpj = $infoPost['cnpj'];
            if(adicionar_inst($nomeFant, $razaoSoci, $cnpj, $pdo)){
               echo "<script type='text/javascript'> window.location.href='../cadastroDeUnid/cadastroDeUnid.php';</script>";
            }   
         
    } 


?>