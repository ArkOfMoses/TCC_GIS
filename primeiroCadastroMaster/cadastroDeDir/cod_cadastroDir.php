<?php

require_once '../funcoes/funcoes.php';
require_once '../../bd/conexao.php';

$unid1 = get_unid($pdo);
if(isset($_POST)){     
    
    $vazio = array();
    $posts = array();
    $erros = array();

    for($n = 0; $n < count($unid1); $n++){
        $numUnid = $unid1[$n];
        $codDaUnid = $numUnid['codUnid'];

        $nome = $_POST['nome_'.$n];
        $email = $_POST['email_'.$n];      
        $senha = $_POST['senha_'.$n];

        if($n == (count($unid1)-1)){

            $num = count($vazio);
            if(!empty($num)){
                echo "Existem campos vazios";
            }else{

                if($nome == '' || $email == '' || $senha == ''){
                    echo "Existem campos vazios";
                }else{
                    for($k = 0; $k < count($posts); $k++){
                        $unid = $posts[$k];
    
                        $nomeDir = $unid['nome'];
                        $emailDir = $unid['email'];
                        $senhaDir = $unid['senha'];
                        $codDaUnidDir = $unid['codUnid'];
    
                        if(adicionar_usu($nomeDir, $emailDir, $senhaDir, 3, $codDaUnidDir, $pdo)){
                            //echo "<script type='text/javascript'>alert('Diretores cadastrados com sucesso'); window.location.href='cadastroDir.php';</script>";
                        }else{
                            //echo  'erro<br>';
                        }
                    }

                    if(adicionar_usu($nome, $email, $senha, 3, $codDaUnid, $pdo)){
                        echo "<script type='text/javascript'>alert('Diretores cadastrados com sucesso'); window.location.href='../enviarEmail.php';</script>";
                    }else{
                        //echo  'erro<br>';
                    }

                }
            }
        }else{
            if($nome == '' || $email == '' || $senha == ''){
                $vazio[] = $codDaUnid;
            }else{
                $posts[] = [
                    "nome" => $nome,
                    "email" => $email,
                    "senha" => $senha,
                    "codUnid" => $codDaUnid
                ];   
            }
        }
    }        
}
                




?>