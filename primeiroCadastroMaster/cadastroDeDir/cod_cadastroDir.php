<?php

require_once '../funcoes/funcoes.php';
require_once '../funcoes/conexao.php';

$inst = get_inst($pdo);
if(isset($_POST)){     
    
    $vazio = array();
    $posts = array();
    $erros = array();

    for($n = 0; $n < count($inst); $n++){
        $numInst = $inst[$n];
        $codDaInst = $numInst['codInst'];

        $nome = $_POST['nome_'.$n];
        $email = $_POST['email_'.$n];      
        $senha = $_POST['senha_'.$n];

        if($n == (count($inst)-1)){

            $num = count($vazio);
            if(!empty($num)){
                echo "<script type='text/javascript'>alert('Existem campos vazios'); window.location.href='cadastroDir.php';</script>";
            }else{

                if($nome == '' || $email == '' || $senha == ''){
                    echo "<script type='text/javascript'>alert('Existem campos vazios'); window.location.href='cadastroDir.php';</script>";
                }else{
                    for($k = 0; $k < count($posts); $k++){
                        $inst = $posts[$k];
    
                        $nomeDir = $inst['nome'];
                        $emailDir = $inst['email'];
                        $senhaDir = $inst['senha'];
                        $codDaInstDir = $inst['codDaInst'];
    
                        if(adicionar_usu($nomeDir, $emailDir, $senhaDir, $codDaInstDir, $pdo)){
                            //echo "<script type='text/javascript'>alert('Diretores cadastrados com sucesso'); window.location.href='cadastroDir.php';</script>";
                        }else{
                            //echo  'erro<br>';
                        }
                    }

                    if(adicionar_usu($nome, $email, $senha, $codDaInst, $pdo)){
                        echo "<script type='text/javascript'>alert('Diretores cadastrados com sucesso'); window.location.href='cadastroDir.php';</script>";
                    }else{
                        //echo  'erro<br>';
                    }

                }
            }
        }else{
            if($nome == '' || $email == '' || $senha == ''){
                $vazio[] = $codDaInst;
            }else{
                $posts[] = [
                    "nome" => $nome,
                    "email" => $email,
                    "senha" => $senha,
                    "codDaInst" => $codDaInst
                ];   
            }
        }
    }        
}
                




?>