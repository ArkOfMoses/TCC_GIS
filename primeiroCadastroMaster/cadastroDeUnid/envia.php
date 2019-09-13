<?php
    require_once '../funcoes/funcoes.php';
    require_once '../../bd/conexao.php';

    $arrayPost = [
        "unid" => FILTER_SANITIZE_SPECIAL_CHARS,
        "cepUnid" => FILTER_SANITIZE_SPECIAL_CHARS,
        "numUnid" => FILTER_SANITIZE_NUMBER_INT,
        "complUnid" => FILTER_SANITIZE_SPECIAL_CHARS
    ];

    $infoPost = filter_input_array(INPUT_POST, $arrayPost);
    
    if($infoPost){
        $nomeUnid = $infoPost['unid'];
        $cepUnid = $infoPost['cepUnid'];
        $numUnid = $infoPost['numUnid'];
        $complUnid = $infoPost['complUnid'];

        $inst = get_inst($pdo);

        if(in_array("", $infoPost)){
            echo "<p>É necessário preencher todos os campos</p>";
        }else{
            if(adicionar_unid($nomeUnid, $cepUnid, $complUnid, $numUnid, $inst[0]['codInst'], 'A', $pdo)){
                $dadosUnid = get_unid($pdo);
                for($i = 0; $i < count($dadosUnid); $i++){
                    $xis = $dadosUnid[$i];
                    echo $xis['nomeUnid'] . " - " . $xis['cepUnid'] . " - " . $xis['numUnid'] . " - " . $xis['complUnid'] ."<br>";   
                }
            }else{
                echo "<p>Não foi possível efetuar o cadastro!!</p>";
            }  
        } 
         
    } 
?>