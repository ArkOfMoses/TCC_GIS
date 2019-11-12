<?php session_start();
require_once '../../primeiroCadastroMaster/funcoes/funcoes.php';
require_once '../../bd/conexao.php';
require_once '../../classes/Bcrypt.php';

$numDeCoord = filter_var($_POST['AcoordA'], FILTER_SANITIZE_NUMBER_INT);

$arrayPost = array();

for($i = 0; $i < $numDeCoord; $i++){
    $arrayPost["coord$i"] = FILTER_SANITIZE_SPECIAL_CHARS;
    $arrayPost["email$i"] = FILTER_VALIDATE_EMAIL;
}

$infoPost = filter_input_array(INPUT_POST, $arrayPost);

if($infoPost){    
    $vazio = array();
    $invalido = array();
    $posts = array();
    $erros = array();
    $emailCad = array();

    for($n = 0; $n < $numDeCoord; $n++){
        $codDaUnid = $_SESSION['dadosUsu']['codUnidadeUsu'];

        $nome = $infoPost["coord$n"];
        $email = $infoPost["email$n"];
        $nomeDaUnid = get_id($pdo, "nome_unid", "unidade", "cod_unid", $codDaUnid);

        if($n == ($numDeCoord - 1)){

            if(empty($invalido)){           
             
                if(!empty($vazio)){
                    echo "<p>Existem campos vazios</p>";
                }else if(!empty($emailCad)){
                    for($j = 0; $j < count($emailCad); $j++){
                        echo "<p>o email do Coordenador $emailCad[$j] já foi cadastrado</p>";
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
                            $singlePost = $posts[$k];
        
                            $nomeFor = $singlePost['nome'];
                            $emailFor = $singlePost['email'];
                            $codDaUnidFor = $singlePost['codUnid'];
                            $nomeDaUnidFor = $singlePost['nomeUnid'];

                            $senhaFor =  substr(md5(rand()), 0, 7);
                            $senhaEncript1 = Bcrypt::hash($senhaFor);

                            
                            $addi = adicionar_usu($nomeFor, $emailFor, $senhaEncript1, 4, $codDaUnidFor, $pdo);

                            if($addi === true){
                                $sessao[] = [
                                    "nome" => $nomeFor,
                                    "emailDir" => $emailFor,
                                    "senha" => $senhaFor,
                                    "unidade" => $nomeDaUnidFor,
                                    "tipo" => "Coordenador"
                                ]; 
                            }else{
                                echo"<p>Não foi possivel cadastrar o coordenador da unidade $nomeDaUnidFor, $addi<p>";
                            }
                        }

                        
                        $senha =  substr(md5(rand()), 0, 7);
                        $senhaEncript2 = Bcrypt::hash($senha);


                       

                        $add = adicionar_usu($nome, $email, $senhaEncript2, 4, $codDaUnid, $pdo);
                        if($add === true){
                            $sessao[] = [
                                "nome" => $nome,
                                "emailDir" => $email,
                                "senha" => $senha,
                                "unidade" => $nomeDaUnid,
                                "tipo" => "Coordenador"
                            ]; 
    
                            echo "<script type='text/javascript'> window.location.href='../cadastroDeProf/cadastroDeProf.php';</script>";
                        }else{
                            echo"<p>Não foi possivel cadastrar o coordenador da unidade $nomeDaUnid, $add<p>";
                        }

                        $_SESSION['EmailListProv'] = [
                                    "Coordenadores" => $sessao
                        ];

                      }else{
                          echo "<p>o email do Coordenador $nome já foi cadastrado</p>";
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
