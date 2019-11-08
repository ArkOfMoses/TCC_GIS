<?php session_start();

require_once '../../../bd/conexao.php';

$codUnid = $_REQUEST['codUnid'];

$arrayPost = array();

$arrayPost["unid0"] = FILTER_SANITIZE_SPECIAL_CHARS;
$arrayPost["cepUnid0"] = FILTER_SANITIZE_NUMBER_INT;
$arrayPost["ruaUnid0"] = FILTER_SANITIZE_SPECIAL_CHARS;
$arrayPost["bairroUnid0"] = FILTER_SANITIZE_SPECIAL_CHARS;
$arrayPost["cidadeUnid0"] = FILTER_SANITIZE_SPECIAL_CHARS;
$arrayPost["numUnid0"] = FILTER_SANITIZE_NUMBER_INT;
$arrayPost["complUnid0"] = FILTER_SANITIZE_SPECIAL_CHARS;

$infoPost = filter_input_array(INPUT_POST, $arrayPost);

if($infoPost){
    $inst = $_SESSION['dadosUsu']['codInstituicao'];
    $codMaster = $_SESSION['dadosUsu']['codUsu'];

        $nomeUnid = $infoPost["unid0"];
        $cepUnid = $infoPost["cepUnid0"];
        $ruaUnid = $infoPost["ruaUnid0"];
        $bairroUnid = $infoPost["bairroUnid0"];
        $cidadeUnid = $infoPost["cidadeUnid0"];
        $numUnid = $infoPost["numUnid0"];
        $complUnid = $infoPost["complUnid0"];
    
            if($nomeUnid == '' || $cepUnid == '' || $ruaUnid == '' || $bairroUnid == '' || $cidadeUnid == '' || $numUnid == ''){
                echo "<p>existem campos obrigatórios em branco</p>";
            }else {
                if($complUnid == ''){
                    $complUnid = NULL;
                }                  

                $updateUnid = $pdo->prepare("update unidade set nome_unid = '$nomeUnid', cep_unid = '$cepUnid', rua_unid = '$ruaUnid', bairro_unid = '$bairroUnid', cidade_unid = '$cidadeUnid', num_unid = $numUnid, compl_unid = '$complUnid' where cod_unid = $codUnid;");
                    if($updateUnid->execute()){
                        echo "<script type='text/javascript'> window.location.href='../unidades.php';</script>";

                    }else{
                        echo "<p>Não foi possível efetuar a atualização da unidade $nomeUnid!!</p>";
                    }  
                }
            }
?>