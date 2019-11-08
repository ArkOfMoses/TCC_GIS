<?php session_start();
    require_once '../../primeiroCadastroMaster/funcoes/funcoes.php';
    require_once '../../bd/conexao.php';

    $numDeUnidades = filter_var($_POST['unidades'], FILTER_SANITIZE_NUMBER_INT);
    $arrayPost = array();

    $arrayPost["unid0"] = FILTER_SANITIZE_SPECIAL_CHARS;
    $arrayPost["cepUnid0"] = FILTER_SANITIZE_NUMBER_INT;
    $arrayPost["ruaUnid0"] = FILTER_SANITIZE_SPECIAL_CHARS;
    $arrayPost["bairroUnid0"] = FILTER_SANITIZE_SPECIAL_CHARS;
    $arrayPost["cidadeUnid0"] = FILTER_SANITIZE_SPECIAL_CHARS;
    $arrayPost["numUnid0"] = FILTER_SANITIZE_NUMBER_INT;
    $arrayPost["complUnid0"] = FILTER_SANITIZE_SPECIAL_CHARS;

    for($i = 1; $i < $numDeUnidades; $i++){
        $arrayPost["unid$i"] = FILTER_SANITIZE_SPECIAL_CHARS;
        $arrayPost["cepUnid$i"] = FILTER_SANITIZE_NUMBER_INT;
        $arrayPost["ruaUnid$i"] = FILTER_SANITIZE_SPECIAL_CHARS;
        $arrayPost["bairroUnid$i"] = FILTER_SANITIZE_SPECIAL_CHARS;
        $arrayPost["cidadeUnid$i"] = FILTER_SANITIZE_SPECIAL_CHARS;
        $arrayPost["numUnid$i"] = FILTER_SANITIZE_NUMBER_INT;
        $arrayPost["complUnid$i"] = FILTER_SANITIZE_SPECIAL_CHARS;
    }

    $infoPost = filter_input_array(INPUT_POST, $arrayPost);
    
    if($infoPost){
        $inst = $_SESSION['dadosUsu']['codInstituicao'];
        $codMaster = $_SESSION['dadosUsu']['codUsu'];

        $getQtdUnid = $pdo->prepare("select cod_unid from unidade where cod_inst = $inst;");
        $getQtdUnid->execute();
        $qtdUnidAnts = $getQtdUnid->rowCount();

        $vazio = array();
        $posts = array();
        $cep = array();

        for($n = 0; $n < $numDeUnidades; $n++){
            $nomeUnid = $infoPost["unid$n"];
            $cepUnid = $infoPost["cepUnid$n"];
            $ruaUnid = $infoPost["ruaUnid$n"];
            $bairroUnid = $infoPost["bairroUnid$n"];
            $cidadeUnid = $infoPost["cidadeUnid$n"];
            $numUnid = $infoPost["numUnid$n"];
            $complUnid = $infoPost["complUnid$n"];
        
            if($n == ($numDeUnidades-1)){
                if($nomeUnid == '' || $cepUnid == '' || $ruaUnid == '' || $bairroUnid == '' || $cidadeUnid == '' || $numUnid == ''){
                    echo "<p>existem campos obrigatórios em branco</p>";
                }else {
                    if($complUnid == ''){
                        $complUnid = NULL;
                    }                  

                    if(!empty($vazio)){
                        echo "<p>existem campos  obrigatórios em branco</p>";
                    }else{

                    for($k = 0; $k < ($numDeUnidades-1); $k++){
                        $unid = $posts[$k];
        
                        $nomeUnide = $unid['unid'];
                        $cepUnide = $unid['cepUnid'];
                        $ruaUnide = $unid['ruaUnid'];
                        $bairroUnide = $unid['bairroUnid'];
                        $cidadeUnide = $unid['cidadeUnid'];
                        $complUnide = $unid['complUnid'];
                        $numUnide = $unid['numUnid'];

                        if(adicionar_unid($nomeUnide, $cepUnide, $ruaUnide, $bairroUnide, $cidadeUnide, $complUnide, $numUnide, $inst, 'A', $pdo)){
                            $idUnid = get_id($pdo, "cod_unid", "unidade", "cod_inst", $inst);
                            $insertMaster = $pdo->prepare("insert into usuario_unidade (cod_unid, cod_usu) values ($idUnid, $codMaster);");
                            $insertMaster->execute();
    
                        }else{
                            echo "<p>Não foi possível efetuar o cadastro da unidade $nomeUnide!!</p>";
                        }  
                    }

                    if(adicionar_unid($nomeUnid, $cepUnid, $ruaUnid, $bairroUnid, $cidadeUnid, $complUnid, $numUnid, $inst, 'A', $pdo)){
                        $idUnid = get_id($pdo, "cod_unid", "unidade", "cod_inst", $inst);
                        $insertMaster = $pdo->prepare("insert into usuario_unidade (cod_unid, cod_usu) values ($idUnid, $codMaster);");
                        $insertMaster->execute();

                        $getQtdUnid = $pdo->prepare("select cod_unid from unidade where cod_inst = $inst;");
                        $getQtdUnid->execute();
                        $qtdUnid = $getQtdUnid->rowCount();

                        $qtd = $qtdUnid - $qtdUnidAnts;

                        echo "<script type='text/javascript'> window.location.href='cadastroDeDir/cadastroDeDir.php?qtd=$qtd';</script>";
                    }else{
                        echo "<p>Não foi possível efetuar o cadastro da unidade $nomeUnid!!</p>";
                    }  
                  }
                }
            }else{
                if($nomeUnid == '' || $cepUnid == '' || $ruaUnid == '' || $bairroUnid == '' || $cidadeUnid == '' || $numUnid == ''){
                    $vazio[] = $nomeUnid;
                }else{
                    
                    if($complUnid == ''){
                        $complUnid = NULL;
                    }

                    $posts[] = [
                        "unid" => $nomeUnid,
                        "cepUnid" => $cepUnid,
                        "ruaUnid" => $ruaUnid,
                        "bairroUnid" => $bairroUnid,
                        "cidadeUnid" => $cidadeUnid,
                        "numUnid" => $numUnid,
                        "complUnid" => $complUnid
                    ];
                } 
            }
        }  
    }

?>