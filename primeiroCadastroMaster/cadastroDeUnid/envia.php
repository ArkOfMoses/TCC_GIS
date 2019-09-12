<?php
    require_once '../funcoes/funcoes.php';
    require_once '../../bd/conexao.php';

    $arrayPost = [
        "unid" => FILTER_DEFAULT,
        "cepUnid" => FILTER_DEFAULT,
        "numUnid" => FILTER_DEFAULT,
        "complUnid" => FILTER_DEFAULT
    ];

    $infoPost = filter_input_array(INPUT_POST, $arrayPost);
    
    if($infoPost){
            $nomeUnid = $infoPost['unid'];
            $cepUnid = $infoPost['cepUnid'];
            $numUnid = $infoPost['numUnid'];
            $complUnid = $infoPost['complUnid'];
            $inst = get_inst($pdo);
            if(adicionar_unid($nomeUnid, $cepUnid, $complUnid, $numUnid, $inst[0]['codInst'], 'A', $pdo)){
                $dadosUnid = get_unid($pdo);
                for($i = 0; $i < count($dadosUnid); $i++){
                    $xis = $dadosUnid[$i];
                    echo $xis['nomeUnid'] . " - " . $xis['cepUnid'] . " - " . $xis['numUnid'] . " - " . $xis['complUnid'] ."<br>";   
                }
            }   
         
    } 
?>