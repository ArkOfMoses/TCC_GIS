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


    $selectAval = $pdo->prepare("select distinct tipo_avaliacao.cod_tipo_aval, nome_tipo_aval, avaliacao.cod_aval, nome_aval 
    from tipo_avaliacao inner join avaliacao on (avaliacao.cod_tipo_aval = tipo_avaliacao.cod_tipo_aval)
                        inner join turma_aluno_nota_disc on (turma_aluno_nota_disc.cod_aval =avaliacao.cod_aval) where turma_aluno_nota_disc.cod_tur = $codTurm and cod_turma_disc = $codTurmDisc and cod_status_aval = 'A';");
    $selectAval->execute();
    $numDeAval = $selectAval->rowCount();
    $msg = '';
    
    if($numDeAval > 3){
       if($infoPost["tipoAval_$numAval"] !== null && $infoPost["codAval_$numAval"] === null){
        //echo "update de mais de 3 avaliações com campos novos";
        $arr = array();

        $selectAval = $pdo->prepare("select distinct tipo_avaliacao.cod_tipo_aval, nome_tipo_aval, avaliacao.cod_aval, nome_aval 
        from tipo_avaliacao inner join avaliacao on (avaliacao.cod_tipo_aval = tipo_avaliacao.cod_tipo_aval)
                            inner join turma_aluno_nota_disc on (turma_aluno_nota_disc.cod_aval =avaliacao.cod_aval) where turma_aluno_nota_disc.cod_tur = $codTurm and cod_turma_disc = $codTurmDisc and cod_status_aval = 'A';");
        $selectAval->execute();
        $qtdAval = $selectAval->rowCount();

        for($a = 0; $a < $numUsu; $a++){
            $codUsu = $infoPost["codUsu_$a"];

            $yaa = 0;

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

                //echo $qtdAval;
                if($e <= $qtdAval){
                    $selecTipo = $pdo->prepare("select cod_tipo_aval from avaliacao where cod_aval = $codAval;");
                    $selecTipo->execute();
                    $dadsTip = $selecTipo->fetch(PDO::FETCH_ASSOC);
                    $tip = $dadsTip['cod_tipo_aval'];
    
                    if($tip == 3 && $vlNota > 2){
                        $vlNota = 2;
                    }
    
                    $update = $pdo->prepare("update turma_aluno_nota_disc set vl_nota = $vlNota where cod_usu = $codUsu and cod_tur = $codTurm and cod_turma_disc = $codTurmDisc and cod_aval = $codAval;");
                    $update->execute();
                }else{
                    $tipoAval = $infoPost["tipoAval_$e"];
 
                    if($tipoAval == 3 && $vlNota > 2){
                        $vlNota = 2;
                   }


                    if($tipoAval != 0){
                        if($a == 0){
                            $selectQtdTipo = $pdo->prepare("select distinct nome_aval from avaliacao inner join turma_aluno_nota_disc on (avaliacao.cod_aval = turma_aluno_nota_disc.cod_aval) where cod_tipo_aval = $tipoAval and cod_tur = $codTurm and cod_turma_disc = $codTurmDisc;");
                            $selectQtdTipo->execute();
                            $getNomeTip = $selectQtdTipo->fetchAll(PDO::FETCH_ASSOC);
                            $numDeTipo = ($selectQtdTipo->rowCount()) + 1;
                            $nomeAval = $getNomeTip[0]['nome_aval'] . " " . $numDeTipo;
                            $insertNewAval = $pdo->prepare("insert into avaliacao (nome_aval, cod_tipo_aval, cod_status_aval) values ('$nomeAval', $tipoAval, 'A');");
                            $insertNewAval->execute();

                            
                            $getCodAval = $pdo->prepare("select cod_aval from avaliacao order by cod_aval;");
                            $getCodAval->execute();
                            $yeahBoi = $getCodAval->fetchAll(PDO::FETCH_ASSOC);
                            $arrayNewAval = end($yeahBoi); 
                            $codNewAval = $arrayNewAval['cod_aval'];
                            
                            //echo $codNewAval."<br>";
                            $arr[] = $codNewAval;
                            $insertNota = $pdo->prepare("insert into turma_aluno_nota_disc (cod_usu, cod_tur, cod_turma_disc, cod_aval, vl_nota) values ($codUsu, $codTurm, $codTurmDisc, $codNewAval, $vlNota);");
                            $insertNota->execute();

                        }else{
                            $codNewAval = $arr[$yaa];
                            //echo $codUsu." ".$codTurm." ".$codTurmDisc." ".$codNewAval." ".$vlNota."<br>";
                            $insertNota = $pdo->prepare("insert into turma_aluno_nota_disc (cod_usu, cod_tur, cod_turma_disc, cod_aval, vl_nota) values ($codUsu, $codTurm, $codTurmDisc, $codNewAval, $vlNota);");
                            $insertNota->execute();      
                            $yaa++;
                        }
                    }else{
                        $msg = "reloadTipo";
                    }
                }                
            }
        }

        }else{
        //echo "update de mais de 3 avaliações sem campos novos";

            for($a = 0; $a < $numUsu; $a++){
                $codUsu = $infoPost["codUsu_$a"];
    
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

                    if($tip == 3 && $vlNota > 2){
                        $vlNota = 2;
                   }                    
                    $update = $pdo->prepare("update turma_aluno_nota_disc set vl_nota = $vlNota where cod_usu = $codUsu and cod_tur = $codTurm and cod_turma_disc = $codTurmDisc and cod_aval = $codAval;");
                    $update->execute();
                }
            }
        }
    }else{
        if($numDeAval == 0){
            if(isset($infoPost["tipoAval_$numAval"])){
                //echo "insert de 3 avaliações (padrão) com campos novos";
                $arr = array();

                for($a = 0; $a < $numUsu; $a++){
                 $codUsu = $infoPost["codUsu_$a"];
                 $yaa = 0;
 
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
                         if($codAval == 3 && $vlNota > 2){
                             $vlNota = 2;
                         }
 
                         $update = $pdo->prepare("insert into turma_aluno_nota_disc (cod_usu, cod_tur, cod_turma_disc, cod_aval, vl_nota) values ($codUsu, $codTurm, $codTurmDisc, $codAval, $vlNota);");
                         $update->execute();
                     }else{
                         $tipoAval = $infoPost["tipoAval_$e"];
 
                         if($tipoAval == 3 && $vlNota > 2){
                             $vlNota = 2;
                        }
 
                         if($tipoAval != 0){
                             if($a == 0){
                                 $selectQtdTipo = $pdo->prepare("select distinct nome_aval from avaliacao inner join turma_aluno_nota_disc on (avaliacao.cod_aval = turma_aluno_nota_disc.cod_aval) where cod_tipo_aval = $tipoAval and cod_tur = $codTurm and cod_turma_disc = $codTurmDisc;");
                                 $selectQtdTipo->execute();
                                 $getNomeTip = $selectQtdTipo->fetchAll(PDO::FETCH_ASSOC);
                                 $numDeTipo = ($selectQtdTipo->rowCount()) + 1;
                                 $nomeAval = $getNomeTip[0]['nome_aval'] . " " . $numDeTipo;
                                 $insertNewAval = $pdo->prepare("insert into avaliacao (nome_aval, cod_tipo_aval, cod_status_aval) values ('$nomeAval', $tipoAval, 'A');");
                                 $insertNewAval->execute();
 
                                 
                                 $getCodAval = $pdo->prepare("select cod_aval from avaliacao order by cod_aval;");
                                 $getCodAval->execute();
                                 $yeahBoi = $getCodAval->fetchAll(PDO::FETCH_ASSOC);
                                 $arrayNewAval = end($yeahBoi); 
                                 $codNewAval = $arrayNewAval['cod_aval'];
                                 
                                 $arr[] = $codNewAval;
                                 $insertNota = $pdo->prepare("insert into turma_aluno_nota_disc (cod_usu, cod_tur, cod_turma_disc, cod_aval, vl_nota) values ($codUsu, $codTurm, $codTurmDisc, $codNewAval, $vlNota);");
                                 $insertNota->execute();
 
                             }else{
                                 $codNewAval = $arr[$yaa];
                                 $insertNota = $pdo->prepare("insert into turma_aluno_nota_disc (cod_usu, cod_tur, cod_turma_disc, cod_aval, vl_nota) values ($codUsu, $codTurm, $codTurmDisc, $codNewAval, $vlNota);");
                                 $insertNota->execute();      
                                 $yaa++;
                             }
                         }else{
                             $msg = "reloadTipo";
                         }
                         
                     }
                 }
             }

            }else{
                //echo "insert de 3 avaliações (padrão) sem campos novos";      

                for($a = 0; $a < $numUsu; $a++){
                    $codUsu = $infoPost["codUsu_$a"];
        
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
                        $codAval = $e;
        
                        if($codAval == 3 && $vlNota > 2){
                            $vlNota = 2;
                       }
        
                        $update = $pdo->prepare("insert into turma_aluno_nota_disc (cod_usu, cod_tur, cod_turma_disc, cod_aval, vl_nota) values ($codUsu, $codTurm, $codTurmDisc, $codAval, $vlNota);");
                        $update->execute();
                        
                    }
                }
            }
        }else{            
            if(isset($infoPost["tipoAval_$numAval"])){
                //echo "update de 3 avaliações (padrão) com campos novos";
               $arr = array();

               for($a = 0; $a < $numUsu; $a++){

                $codUsu = $infoPost["codUsu_$a"];

                $yaa = 0;

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
                        if($codAval == 3 && $vlNota > 2){
                            $vlNota = 2;
                        }

                        $update = $pdo->prepare("update turma_aluno_nota_disc set vl_nota = $vlNota where cod_usu = $codUsu and cod_tur = $codTurm and cod_turma_disc = $codTurmDisc and cod_aval = $codAval;");
                        $update->execute();
                    }else{
                        $tipoAval = $infoPost["tipoAval_$e"];

                        if($tipoAval == 3 && $vlNota > 2){
                            $vlNota = 2;
                       }


                        if($tipoAval != 0){
                            if($a == 0){
                                $selectQtdTipo = $pdo->prepare("select distinct nome_aval from avaliacao inner join turma_aluno_nota_disc on (avaliacao.cod_aval = turma_aluno_nota_disc.cod_aval) where cod_tipo_aval = $tipoAval and cod_tur = $codTurm and cod_turma_disc = $codTurmDisc;");
                                $selectQtdTipo->execute();
                                $getNomeTip = $selectQtdTipo->fetchAll(PDO::FETCH_ASSOC);
                                $numDeTipo = ($selectQtdTipo->rowCount()) + 1;
                                $nomeAval = $getNomeTip[0]['nome_aval'] . " " . $numDeTipo;
                                $insertNewAval = $pdo->prepare("insert into avaliacao (nome_aval, cod_tipo_aval, cod_status_aval) values ('$nomeAval', $tipoAval, 'A');");
                                $insertNewAval->execute();

                                
                                $getCodAval = $pdo->prepare("select cod_aval from avaliacao order by cod_aval;");
                                $getCodAval->execute();
                                $yeahBoi = $getCodAval->fetchAll(PDO::FETCH_ASSOC);
                                $arrayNewAval = end($yeahBoi); 
                                $codNewAval = $arrayNewAval['cod_aval'];
                                
                                $arr[] = $codNewAval;
                                $insertNota = $pdo->prepare("insert into turma_aluno_nota_disc (cod_usu, cod_tur, cod_turma_disc, cod_aval, vl_nota) values ($codUsu, $codTurm, $codTurmDisc, $codNewAval, $vlNota);");
                                $insertNota->execute();

                            }else{
                                $codNewAval = $arr[$yaa];
                                $insertNota = $pdo->prepare("insert into turma_aluno_nota_disc (cod_usu, cod_tur, cod_turma_disc, cod_aval, vl_nota) values ($codUsu, $codTurm, $codTurmDisc, $codNewAval, $vlNota);");
                                $insertNota->execute();      
                                $yaa++;
                            }
                        }else{
                            $msg = "reloadTipo";
                        }
                        
                    }
                }
            }

            }else{
                //echo "update de 3 avaliações (padrão) sem campos novos";
               for($a = 0; $a < $numUsu; $a++){
                   $codUsu = $infoPost["codUsu_$a"];
       
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

                       $codAval = $e;
       
                       if($codAval == 3 && $vlNota > 2){
                            $vlNota = 2;
                       }
       
                       $update = $pdo->prepare("update turma_aluno_nota_disc set vl_nota = $vlNota where cod_usu = $codUsu and cod_tur = $codTurm and cod_turma_disc = $codTurmDisc and cod_aval = $codAval;");
                       $update->execute();
                   }
               }
            }
        }
    }

    if($msg == ''){
        echo 'sucesso';
    }else{
        echo $msg;
    }
}

