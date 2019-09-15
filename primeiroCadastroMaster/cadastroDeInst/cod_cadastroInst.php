<?php

 require_once '../funcoes/funcoes.php';
 require_once '../../bd/conexao.php';

    $arrayPost = [
        "nomeFant" => FILTER_SANITIZE_SPECIAL_CHARS,
        "razaoSoci" => FILTER_SANITIZE_SPECIAL_CHARS,
        "cnpj" => FILTER_DEFAULT
    ];

    $infoPost = filter_input_array(INPUT_POST, $arrayPost);
    
    if($infoPost){
        $nomeFant = $infoPost['nomeFant'];
        $razaoSoci = $infoPost['razaoSoci'];
        $cnpj = validaCNPJ($infoPost['cnpj']);

        if(in_array("", $infoPost)){
            echo "<p>É necessário preencher todos os campos!</p>";
        }else if($cnpj === false) {
            echo "<p>CNPJ inválido!</p>";
        }else{
            if(adicionar_inst($nomeFant, $razaoSoci, $cnpj, $pdo)){
                echo "<script type='text/javascript'> window.location.href='../cadastroDeUnid/cadastroDeUnid.php';</script>";
            }else{
                var_dump($infoPost);
                //echo "<p>Não foi possível cadastrar a instituição</p>";
            }   
        }
    } 


?>