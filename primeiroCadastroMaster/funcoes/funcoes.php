<?php

function get_inst($pdo){
    $inst = array();
    
        $selecionar = ('select * from instituicao');
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
    
        $selecionar = ('select * from unidade');
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
                return false;
            }
        }
    }
    
}


function adicionar_inst($nomeInst, $pdo){
    $inserir_inst = $pdo->prepare("insert into instituicao (nomeInst) values ('$nomeInst')");
    if($inserir_inst->execute()){
        return true;
    }else{
        return false;
    }
}



function get_usu($pdo){
    $Usu = array();
    
        $selecionar = ('select codUsu, nomeUsu, emailUsu, senhaUsu, nomeInst, instituicao.codInst from usuarios inner join instituicao on(usuarios.codInst = instituicao.codInst);');
        $comando = $pdo->prepare($selecionar);
        $comando->execute();       
        
        while($dados = $comando->fetch(PDO::FETCH_ASSOC)){
            $codUsu = $dados['codUsu'];
            $nomeUsu = $dados['nomeUsu'];
            $emailUsu = $dados['emailUsu'];
            $senhaUsu = $dados['senhaUsu'];
            $codInst = $dados['codInst'];
            $nomeInst = $dados['nomeInst'];
            $Usu[] = array(
                'codUsu' => $codUsu,
                'nomeUsu' => $nomeUsu,
                'emailUsu' => $emailUsu,
                'senhaUsu' => $senhaUsu,
                'codInst' => $codInst,
                'nomeInst' => $nomeInst
            );
        }
        return $Usu;
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


?>