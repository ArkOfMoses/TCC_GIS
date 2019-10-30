<?php
session_start();
require_once 'bd/conexao.php';
require_once 'classes/Bcrypt.php'; 
require_once 'primeiroCadastroMaster/funcoes/funcoes.php';


$filterForm = [
    "nome_usu" => FILTER_SANITIZE_SPECIAL_CHARS,
    "email" => FILTER_VALIDATE_EMAIL,
    "confirmaEmail" => FILTER_VALIDATE_EMAIL,
    "senha" => FILTER_SANITIZE_SPECIAL_CHARS,
    "confirmaSenha" => FILTER_SANITIZE_SPECIAL_CHARS,
    "cpf_usu" => FILTER_DEFAULT 
];  

$infoPost = filter_input_array(INPUT_POST, $filterForm);


if($infoPost) {

        $extensao = strtolower(substr($_FILES['img']['name'], -4));
        $novo_nome = sha1(time()) . $extensao;        
        $ext =  strtolower(substr($_FILES['img']['name'], -3));
        $tipos = array("png","jpg","gif");
        $diretorio = "imgsBanco/";
        $imagem = $diretorio.$novo_nome;

        $cpfValidado = validaCPF($infoPost['cpf_usu']);

        

        if($_FILES['img']['name'] === ''){
            $_FILES['img']['name'] = NULL;
        }
        
        if(in_array("", $infoPost)){
            echo "<p>É necessário preencher todos os campos!</p>";
        }else{
            if($infoPost['email'] === false || $infoPost['confirmaEmail'] === false){
                echo "<p>Email inválido!</p>";
            }else if($infoPost['email'] != $infoPost['confirmaEmail']){
                echo "<p>Emails não batem!</p>";
            }else if($infoPost['senha'] != $infoPost['confirmaSenha']){
                echo "<p>Senhas não batem!</p>";
            }else if($cpfValidado === false){
                echo "<p>CPF inválido!</p>";
            }else{
                if($_FILES['img']['name'] === NULL){
                    $codAcesso = $_SESSION['dadosUsu']['codAcesso'];
                    $codUsu = $_SESSION['dadosUsu']['codUsu'];
                    $senhaEncript = Bcrypt::hash($infoPost['senha']);
    
                    
    
    
                    //date_default_timezone_set('Etc/UTC');
                    //se a gente não for usar o type=date, a gente precisa fazer o rolê de inverter pra ficar no padrão do banco
                    $comando1 = $pdo->prepare("update acesso set senha = '$senhaEncript', email = '{$infoPost['email']}' where cod_acesso = $codAcesso");
                    $comando2 = $pdo->prepare("update usuario set nome_usu = '{$infoPost['nome_usu']}', cpf_usu = '$cpfValidado', url_foto_usu = null, data_entrada = (cast(NOW() as Date)) where cod_acesso = $codUsu");
                    
                    if($comando1->execute() && $comando2->execute()){                
                        $nomeTipoUsu = $_SESSION['dadosUsu']['nomeTipoUsu'];
                        //$_SESSION['dadosUsu']['fotoUsu'] = $imagem;
                                switch ($nomeTipoUsu) {
                                    case 'Master':
                                    //header("Location: cadastroDeInst.php");
                                    echo "<script type='text/javascript'> window.location.href='primeiroCadastroMaster/cadastroDeInst/cadastroDeInst.php';</script>";
                                    break;
    
                                    case 'Professor':
                                        echo "<script type='text/javascript'> window.location.href='primeiroCadastroProf/escolherTurma.php';</script>";
                                    break;
    
                                    case 'Saude':
                                        echo "<script type='text/javascript'> window.location.href='perfilSaude.php';</script>";
                                    break;

                                    case 'Diretor':
                                        echo "<script type='text/javascript'> window.location.href='primeiroCadastroDir/cadastroDeCoord/cadastroDeCoord.php';</script>";
                                    break;
                                }
    
                            }else{
                                echo "<p>Não foi possível atualizar suas informações!</p>";
                            }
                }else{
                    if (in_array($ext, $tipos)) {

                        
                        if (move_uploaded_file($_FILES['img']['tmp_name'], $imagem)) { 
        
                        $codAcesso = $_SESSION['dadosUsu']['codAcesso'];
                        $codUsu = $_SESSION['dadosUsu']['codUsu'];
                        $senhaEncript = Bcrypt::hash($infoPost['senha']);
        
                        
        
        
                        //date_default_timezone_set('Etc/UTC');
                        //se a gente não for usar o type=date, a gente precisa fazer o rolê de inverter pra ficar no padrão do banco
                        $comando1 = $pdo->prepare("update acesso set senha = '$senhaEncript', email = '{$infoPost['email']}' where cod_acesso = $codAcesso");
                        $comando2 = $pdo->prepare("update usuario set nome_usu = '{$infoPost['nome_usu']}', cpf_usu = '$cpfValidado', url_foto_usu = '$imagem', data_entrada = (cast(NOW() as Date)) where cod_acesso = $codUsu");
                        
                        if($comando1->execute() && $comando2->execute()){                
                            $nomeTipoUsu = $_SESSION['dadosUsu']['nomeTipoUsu'];
                            $_SESSION['dadosUsu']['fotoUsu'] = $imagem;
                                    switch ($nomeTipoUsu) {
                                        case 'Master':
                                        //header("Location: cadastroDeInst.php");
                                        echo "<script type='text/javascript'> window.location.href='primeiroCadastroMaster/cadastroDeInst/cadastroDeInst.php';</script>";
                                        break;
        
                                        case 'Professor':
                                            echo "<script type='text/javascript'> window.location.href='primeiroCadastroProf/escolherTurma.php';</script>";
                                        break;
        
                                        case 'Saude':
                                            echo "<script type='text/javascript'> window.location.href='perfilSaude.php';</script>";
                                        break;

                                        case 'Diretor':
                                            echo "<script type='text/javascript'> window.location.href='primeiroCadastroDir/cadastroDeCoord/cadastroDeCoord.php';</script>";
                                        break;
                                    }
        
                                }else{
                                    echo "<p>Não foi possível atualizar suas informações!</p>";
                                }
                            }
                        }else{
                            echo "<p>O formato da imagem é inválido</p>";
                        }
                }
            }
        }
    }
