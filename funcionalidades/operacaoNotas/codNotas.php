<?php
require_once '../../bd/conexao.php';

$numAval = (filter_var($_POST['countAval'], FILTER_SANITIZE_NUMBER_INT) - 1);
$numUsu = filter_var($_POST['countUsu'], FILTER_SANITIZE_NUMBER_INT);

$arrayPost = array();
$holdTipo = array();

for($i = 0; $i < $numUsu; $i++){
    $arrayPost["codUsu_$i"] = FILTER_SANITIZE_NUMBER_INT;
    for($j = 1; $j <= $numAval; $j++){
        if($j > 3){
            $holdTipo["tipoAval_$j"] = FILTER_SANITIZE_NUMBER_INT;
            $holdTipo["codAval_$j"] = FILTER_SANITIZE_NUMBER_INT;
        }
        $arrayPost["avaliacao_".$i."_".$j] = FILTER_DEFAULT;
    }    
}

foreach($holdTipo as $key => $value){
    $arrayPost[$key] = $value;
}

$arrayPost['codTurma'] = FILTER_SANITIZE_NUMBER_INT;
$arrayPost['codTurmDisc'] = FILTER_SANITIZE_NUMBER_INT;

$infoPost = filter_input_array(INPUT_POST, $arrayPost);

if($infoPost){

    $qtdAMais = $numUsu-3;

    $check = null;
    for($i = 4; $i <= $numAval; $i++){
        if($infoPost["tipoAval_$i"] != null){
            $check = $infoPost["tipoAval_$i"];
            break;
        }
    }

    $codTurm = $infoPost['codTurma'];
    $codTurmDisc = $infoPost['codTurmDisc'];

    if($check === null){

        $mediaJSON = array();

        for($a = 0; $a < $numUsu; $a++){
            $codUsu = $infoPost["codUsu_$a"];

            $diversificativa = array();
            $obrigatoria = array();
            $atitudinal = array();

            for($e = 1; $e <= $numAval; $e++){
                $vlNota = $infoPost['avaliacao_'.$a.'_'.$e];

                if($vlNota == ''){
                    $vlNota = 'null';
                }else{
                    $vlNota = filter_var($vlNota, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                    if($vlNota > 10){
                        $vlNota = 10;
                    }else if($vlNota < 0){
                        $vlNota = 0;
                    }
                }
                

                if($e <= 3){
                    $codAval = $e;
                }else{
                    $codAval = $infoPost["codAval_$e"];
                }

                $selecTipo = $pdo->prepare("select cod_tipo_aval from avaliacao where cod_aval = $codAval;");
                $selecTipo->execute();
                $dadsTip = $selecTipo->fetch(PDO::FETCH_ASSOC);
                $tip = $dadsTip['cod_tipo_aval'];
                switch ($tip) {
                    case 1:
                        $diversificativa[] = $vlNota;
                        break;

                    case 2:
                        $obrigatoria[] = $vlNota;
                        break;

                    case 3:
                        $atitudinal[] = $vlNota;
                        break;
                }

                
                $update = $pdo->prepare("update turma_aluno_nota_disc set vl_nota = $vlNota where cod_usu = $codUsu and cod_tur = $codTurm and cod_turma_disc = $codTurmDisc and cod_aval = $codAval;");
                $update->execute();
                
            }

            $mediaDivers = array_sum($diversificativa)/count($diversificativa);
            $mediaObrig = array_sum($obrigatoria)/count($obrigatoria);
            $mediaAtit = array_sum($atitudinal)/count($atitudinal);

            $media = substr((($mediaDivers * 0.7 + $mediaObrig * 0.9) / 2) + $mediaAtit, 0, 4);
            $mediaJSON["media_$a"] = $media;
        }
        //aqui retorna o JSON
        // var_dump([$mediaJSON, $diversificativa, $obrigatoria, $atitudinal]);
    }else{
        echo "insert<br>";
    }

    // var_dump([
    //     $_POST,
    //     $infoPost
    //     ]);
}

