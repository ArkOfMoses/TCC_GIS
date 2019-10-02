<?php
    session_start();
    require_once '../funcoes/funcoes.php';
    require_once '../../bd/conexao.php';

    $numDeUnidades = filter_var($_POST['unidades'], FILTER_SANITIZE_NUMBER_INT);

    $arrayPost = array();

    $arrayPost["unid0"] = FILTER_SANITIZE_SPECIAL_CHARS;
    $arrayPost["cepUnid0"] = FILTER_SANITIZE_NUMBER_INT;
    $arrayPost["numUnid0"] = FILTER_SANITIZE_NUMBER_INT;
    $arrayPost["complUnid0"] = FILTER_SANITIZE_SPECIAL_CHARS;

    for($i = 1; $i < $numDeUnidades; $i++){
        $arrayPost["unid".$i] = FILTER_SANITIZE_SPECIAL_CHARS;
        $arrayPost["cepUnid".$i] = FILTER_SANITIZE_NUMBER_INT;
        $arrayPost["numUnid".$i] = FILTER_SANITIZE_NUMBER_INT;
        $arrayPost["complUnid".$i] = FILTER_SANITIZE_SPECIAL_CHARS;
    }


    $infoPost = filter_input_array(INPUT_POST, $arrayPost);
    
    if($infoPost){
        $inst = $_SESSION['dadosUsu']['codInstituicao'];

        $vazio = array();
        $posts = array();
        $cep = array();

        for($n = 0; $n < $numDeUnidades; $n++){
            $nomeUnid = $infoPost['unid'.$n];
            $cepUnid = $infoPost['cepUnid'.$n];
            $numUnid = $infoPost['numUnid'.$n];
            $complUnid = $infoPost['complUnid'.$n];
        
            if($n == ($numDeUnidades-1)){
                if($nomeUnid == '' || $cepUnid == '' || $numUnid == ''){
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
                        $complUnide = $unid['complUnid'];
                        $numUnide = $unid['numUnid'];

                        if(adicionar_unid($nomeUnide, $cepUnide, $complUnide, $numUnide, $inst, 'A', $pdo)){

                        }else{
                            echo "<p>Não foi possível efetuar o cadastro da unidade $nomeUnide!!</p>";
                        }  
                    }

                    if(adicionar_unid($nomeUnid, $cepUnid, $complUnid, $numUnid, $inst, 'A', $pdo)){
                        //Não sei se a gente vai usar o $_SESSION['dadosUsu']['codInstituicao'] dnv
                        //se for usar deixa ai, se nn dá um unset aqui pq nn vai usar mais (eu acho q nn)
                        echo "<script type='text/javascript'> window.location.href='../cadastroDeDir/cadastroDeDir.php';</script>";
                    }else{
                        echo "<p>Não foi possível efetuar o cadastro da unidade $nomeUnid!!</p>";
                    }  
                  }
                }
            }else{
                if($nomeUnid == '' || $cepUnid == '' || $numUnid == ''){
                    $vazio[] = $nomeUnid;
                }else{
                    //validação do CEP vem aqui no else if 
                    if($complUnid == ''){
                        $complUnid = NULL;
                    }

                    $posts[] = [
                        "unid" => $nomeUnid,
                        "cepUnid" => $cepUnid,
                        "numUnid" => $numUnid,
                        "complUnid" => $complUnid
                    ];
                } 
            }
        }  
    }

?>