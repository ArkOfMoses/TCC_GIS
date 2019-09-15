<?php

function get_inst($pdo){
    $inst = array();

    $key = get_id($pdo, 'cod_inst', 'instituicao');
        $selecionar = ("select * from instituicao where cod_inst = $key");
        $comando = $pdo->prepare($selecionar);
        $comando->execute();
        
        while($dados = $comando->fetch(PDO::FETCH_ASSOC)){
            $codInst = $dados['cod_inst'];
            $nomeFant = $dados['nome_fantasia_inst'];
            $razaoSocial = $dados['razao_social_inst'];
            $cnpj = $dados['CNPJ_inst'];
            $inst[] = array(
                'codInst' => $codInst,
                'nomeFant' => $nomeFant,
                'razaoSocial' => $razaoSocial,
                'CNPJ' => $cnpj
            );
        }
        return $inst;
}

function get_unid($pdo){
    $unid = array();
    $key = get_id($pdo, 'cod_inst', 'instituicao');
        $selecionar = ("select * from unidade where cod_inst = $key");
        $comando = $pdo->prepare($selecionar);
        $comando->execute();
        
        while($dados = $comando->fetch(PDO::FETCH_ASSOC)){
            $codUnid = $dados['cod_unid'];
            $nomeUnid = $dados['nome_unid'];
            $cepUnid = $dados['cep_unid'];
            $complUnid = $dados['compl_unid'];
            $numUnid = $dados['num_unid'];
            $codInst = $dados['cod_inst'];
            $codStatusUnid = $dados['cod_status_unid'];
            $unid[] = array(
                'codUnid' => $codUnid,
                'nomeUnid' => $nomeUnid,
                'cepUnid' => $cepUnid,
                'complUnid' => $complUnid,
                'numUnid' => $numUnid,
                'codInst' => $codInst,
                'codStatusUnid' => $codStatusUnid

            );
        }
        return $unid;
}

function adicionar_unid($nomeUnid, $cepUnid, $complUnid, $numUnid, $codInst, $codStatusUnid, $pdo){
    $inserir_unid = $pdo->prepare("insert into unidade (nome_unid, cep_unid, compl_unid, num_unid, cod_inst, cod_status_unid) values ('$nomeUnid', '$cepUnid', '$complUnid', '$numUnid', '$codInst', '$codStatusUnid')");
    if($inserir_unid->execute()){
        return true;
    }else{
        return false;
    }
}


function adicionar_usu($nomeUsu, $emailUsu, $senhaUsu, $codTipoUsu, $codUnid, $pdo){

    $inserir_acesso = $pdo->prepare("insert into acesso (cod_tipo_usu, senha, email) values ('$codTipoUsu', '$senhaUsu', '$emailUsu');");
    if($inserir_acesso->execute()){
        $codAcesso = get_id($pdo, 'cod_acesso', 'acesso');
        $inserir_usuario = $pdo->prepare("insert into usuario (nome_usu, cod_acesso) values ('$nomeUsu', '$codAcesso');");
        if($inserir_usuario->execute()){
            $codUsu = get_id($pdo, 'cod_usu', 'usuario');
            $inserir_UsuNaUnidade = $pdo->prepare("insert into usuario_unidade (cod_unid, cod_usu) values ('$codUnid', '$codUsu');");
            if($inserir_UsuNaUnidade->execute()){
                return true;

            }else{
                return "erro inserir_UsuNaUnidade";
            }
        }else{
            return "erro inserir_usuario";
        }
    }else{
        return "erro inserir_acesso";
    }
    
}


function adicionar_inst($nomeFantInst, $razaoSocial, $CNPJ, $pdo){
    $inserir_inst = $pdo->prepare("insert into instituicao (nome_fantasia_inst, razao_social_inst, CNPJ_inst) values ('$nomeFantInst', '$razaoSocial', '$CNPJ')");
    if($inserir_inst->execute()){
        return true;
    }else{
        return false;
    }
}



function get_id($pdo, $chave, $table){

    $selecionar = ("select $chave from $table");
    $comando = $pdo->prepare($selecionar);
    $comando->execute();      

    while($dados = $comando->fetch(PDO::FETCH_ASSOC)){
        $id = $dados[$chave];

    }
    return $id;
}

function get_usu_unid($pdo){

    $selecionar = ("select * from usuario_unidade");
    $comando = $pdo->prepare($selecionar);
    $comando->execute();
    $numeroDeLinhas = $comando->rowCount();
    if ($numeroDeLinhas >= 1) {

        return false;
    }else{
        return true;
    }

    
}


function validaCPF($campo){
    $semPontos = filter_var($campo, FILTER_SANITIZE_NUMBER_INT);
    $numeroCPF = str_replace("-", "", $semPontos);
    $tamanho = strlen($numeroCPF);       
    
    $arrayCpfInteiro = str_split($numeroCPF, 1); 

    if($tamanho == 11){
        $semDV = substr($numeroCPF, 0, 9);
        $arrayCPF = str_split($semDV, 1);
        $soma = 0;
        $count = 10;

         for($i = 0; $i <= 10; $i++){
            $num = (int)$arrayCpfInteiro[$i];
             if($i == 0){
                $anterior = $arrayCpfInteiro[0];
             }else{
                 if($anterior != $num){
                    $anterior = true;
                    break;
                }
            }
        }

        if($anterior === true){

            for($i = 0; $i <= 8; $i++){
                $soma += $arrayCPF[$i] * $count;
                $count--;
            }

            $primeiroDV = substr($numeroCPF, -2, 1);
            $segundoDV = substr($numeroCPF, -1);

            $check = ($soma * 10) % 11;

            if($check == 10){
                $check = 0;
            }

            if($check == $primeiroDV){

                $semDV = substr($numeroCPF, 0, 10);
                $arrayCPF = str_split($semDV, 1);
                $soma = 0;
                $count = 11;
    
                for($i = 0; $i <= 9; $i++){
                    $soma += $arrayCPF[$i] * $count;
                    $count--;
                }

                $check = ($soma * 10) % 11;
                
                if($check == 10){
                    $check = 0;
                }

                if($check == $segundoDV){
                    return $numeroCPF;
                }else{
                    return false;
                }

            }else{
                return false;
            }

        }else{
            return false;
        }
    }else{
        return false;
    }
}

function validaCNPJ($campo){
    $semBarras = filter_var($campo, FILTER_SANITIZE_NUMBER_INT);
    $numCNPJ = str_replace("-", "", $semBarras);
    $tamanho = strlen($numCNPJ);   

    if($tamanho == 14){
        $semDV = substr($numCNPJ, 0, 12);            
        $primeiroDV = substr($numCNPJ, -2, 1);
        $segundoDV = substr($numCNPJ, -1);
        $arrayCNPJ = str_split($semDV, 1);
        $soma = 0;
        $count = 5;

        for($i = 0; $i <= 11; $i++){
            if($count < 2){
                $count = 9;
            }
            $soma += $arrayCNPJ[$i] * $count;
            $count--;
        }
        $resto = $soma % 11;            

        if($resto < 2 && $primeiroDV == 0 || $primeiroDV == (11 - $resto)){

            $semDV = substr($numCNPJ, 0, 13);
            $arrayCNPJ = str_split($semDV, 1);
            $soma = 0;
            $contador = 6;

            for($i = 0; $i <= 12; $i++){
                if($contador < 2){
                    $contador = 9;
                }
                $soma += $arrayCNPJ[$i] * $contador;
                $contador--;   
            }

            $resto = $soma % 11;

            if($resto < 2 && $segundoDV == 0 || $segundoDV == (11 - $resto)){
                return $numCNPJ;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }else{
        return false;
    }
}


?>