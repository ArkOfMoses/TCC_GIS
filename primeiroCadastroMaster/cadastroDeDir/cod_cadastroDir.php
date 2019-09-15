<?php
session_start();
require_once '../funcoes/funcoes.php';
require_once '../../bd/conexao.php';
require_once '../../classes/Bcrypt.php';

$unid1 = get_unid($pdo);

$arrayPost = array();
for($i = 0; $i < count($unid1); $i++){
        $arrayPost["nome_$i"] = FILTER_SANITIZE_SPECIAL_CHARS;
        $arrayPost["email_$i"] = FILTER_VALIDATE_EMAIL;
}



$infoPost = filter_input_array(INPUT_POST, $arrayPost);

if($infoPost){     

    $vazio = array();
    $invalido = array();
    $posts = array();
    $erros = array();
    $emailCad = array();

    for($n = 0; $n < count($unid1); $n++){
        $numUnid = $unid1[$n];
        $codDaUnid = $numUnid['codUnid'];
        $nomeDaUnid =  $numUnid['nomeUnid'];

        $nome = $infoPost['nome_'.$n];
        $email = $infoPost['email_'.$n];     

        if($n == (count($unid1)-1)){

            if(empty($invalido)){           
            
                if(!empty($vazio)){
                    echo "<p>Existem campos vazios</p>";
                }else if(!empty($emailCad)){
                    for($j = 0; $j < count($emailCad); $j++){
                        echo "<p>o email do Diretor $emailCad[$j] já foi cadastrado</p>";
                    }                    
                }else{

                    if($email === false){
                        echo "<p>Existem emails invalidos ou vazios</p>";
                    }else if($nome == '' || $email == ''){
                        echo "<p>Existem campos vazios</p>";
                    }else{

                        $selectAcesso = $pdo->prepare("select * from acesso where email = '$email'");
                        $selectAcesso->execute();
                        $numLinhas = $selectAcesso->rowCount();
            
                        if($numLinhas == 0){
                            
                            $sessao = array();

                        for($k = 0; $k < count($posts); $k++){
                            $unid = $posts[$k];
        
                            $nomeDir = $unid['nome'];
                            $emailDir = $unid['email'];
                            $codDaUnidDir = $unid['codUnid'];
                            $nomeDaunidDir = $unid['nomeUnid'];

                            $senhaDir =  substr(md5(rand()), 0, 7);
                            $senhaEncript1 = Bcrypt::hash($senhaDir);

                            $sessao[] = [
                                "nome" => $nomeDir,
                                "emailDir" => $emailDir,
                                "senha" => $senhaDir,
                                "unidade" => $nomeDaunidDir
                            ]; 


                            
                            $addi = adicionar_usu($nomeDir, $emailDir, $senhaEncript1, 3, $codDaUnidDir, $pdo);

                            if($addi === true){
                                //echo "Bytes: $senhaDir Encript: $senhaEncript1 <br>";
                                //echo "<script type='text/javascript'>alert('Diretores cadastrados com sucesso'); window.location.href='cadastroDir.php';</script>";
                            }else{
                                array_pop($sessao);
                                echo"<p>Não foi possivel cadastrar o diretor da unidade $nomeDaunidDir, $addi<p>";
                            }
                        }

                        
                        $senha =  substr(md5(rand()), 0, 7);
                        $senhaEncript2 = Bcrypt::hash($senha);

                        $sessao[] = [
                            "nome" => $nome,
                            "emailDir" => $email,
                            "senha" => $senha,
                            "unidade" => $nomeDaUnid
                        ]; 

                       

                        $add = adicionar_usu($nome, $email, $senhaEncript2, 3, $codDaUnid, $pdo);
                        if($add === true){
                            echo "<script type='text/javascript'> window.location.href='../confirmarDados.php';</script>";
                        }else{
                            array_pop($sessao);
                            echo"<p>Não foi possivel cadastrar o diretor da unidade $nomeDaUnid, $addi<p>";
                        }

                        $_SESSION['EmailDirs'] = $sessao;

                      }else{
                          echo "<p>o email do Diretor $nome já foi cadastrado</p>";
                      }

                    }
                }
            }else{
                echo "<p>Existem emails invalidos ou vazios</p>";
            }
        }else{
            if($email === false){
                $invalido[] = $codDaUnid;
            }else if($nome == '' || $email == ''){
                $vazio[] = $codDaUnid;
            }else{

                $selectAcesso = $pdo->prepare("select * from acesso where email = '$email'");
                $selectAcesso->execute();
                $numLinhas = $selectAcesso->rowCount();
    
                if($numLinhas == 0){

                    $posts[] = [
                        "nome" => $nome,
                        "email" => $email,
                        "codUnid" => $codDaUnid,
                        "nomeUnid" => $nomeDaUnid
                    ];   

                }else{
                    $emailCad[] = $nome;
                }
            }
        }
    }        
}
                




?>