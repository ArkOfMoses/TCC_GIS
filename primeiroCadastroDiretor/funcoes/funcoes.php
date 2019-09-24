<?php

function get_inst($pdo){
    $inst = array();
    
        $selecionar = ('select codInst, nomeInst from instituicao');
        $comando = $pdo->prepare($selecionar);
        $comando->execute();
        
        while($dados = $comando->fetch(PDO::FETCH_ASSOC)){
            $codInst = $dados['codInst'];
            $nome = $dados['nomeInst'];
            $inst[] = array(
                'codInst' => $codInst,
                'nomeInst' => $nome
            );
        }
        return $inst;
}

function adicionar_inst($nomeInst, $pdo){
    $inserir_inst = $pdo->prepare("insert into instituicao (nomeInst) values ('$nomeInst')");
    if($inserir_inst->execute()){
        return true;
    }else{
        return false;
    }
}

function adicionar_usu($nomeUsu, $emailUsu, $senhaUsu, $codInst, $pdo){
    $inserir_usu = $pdo->prepare("insert into usuarios (nomeUsu, emailUsu, senhaUsu, codInst) values ('$nomeUsu', '$emailUsu', '$senhaUsu', '$codInst')");
    if($inserir_usu->execute()){
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


?>