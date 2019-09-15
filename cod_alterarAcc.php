<?php
session_start();
require_once 'bd/conexao.php';
require_once 'classes/Bcrypt.php'; // n sei se vai usar
require_once 'primeiroCadastroMaster/funcoes/funcoes.php';


$filterForm = [
    "nome_usu" => FILTER_SANITIZE_SPECIAL_CHARS,
    "email" => FILTER_VALIDATE_EMAIL,
    "confirmaEmail" => FILTER_VALIDATE_EMAIL,
    "senha" => FILTER_SANITIZE_SPECIAL_CHARS,
    "confirmaSenha" => FILTER_SANITIZE_SPECIAL_CHARS,
    "cpf_usu" => FILTER_SANITIZE_SPECIAL_CHARS 
];  

$infoPost = filter_input_array(INPUT_POST, $filterForm);

            

if($infoPost) {

        $extensao = strtolower(substr($_FILES['img']['name'], -4));
        $novo_nome = sha1(time()) . $extensao;
        $diretorio = "imgsBanco/";
        $ext =  strtolower(substr($_FILES['img']['name'], -3));
        $tipos = array("png","jpg","gif");
        $imagem = $diretorio.$novo_nome;

        

        if(in_array("", $infoPost)){
            echo "<p>É necessário preencher todos os campos!</p>";
        }else if($_FILES['img']['name'] === ''){
            echo "<p>Insira uma imagem</p>";
        }else {
            if($infoPost['email'] === false || $infoPost['confirmaEmail'] === false){
                echo "<p>Email inválido!</p>";
            }else if($infoPost['email'] != $infoPost['confirmaEmail']){
                echo "<p>Emails não batem!</p>";
            }else if($infoPost['senha'] != $infoPost['confirmaSenha']){
                echo "<p>Senhas não batem!</p>";
            }else  /*  if(!validaCPF($infoPost['cpf_usu'])){
                echo "<p>CPF inválido!</p>";
            }else */ {

            if (in_array($ext, $tipos)) {
                if (move_uploaded_file($_FILES['img']['tmp_name'], $imagem)) { 

                $codAcesso = $_SESSION['dadosUsu']['codAcesso'];
                $codUsu = $_SESSION['dadosUsu']['codUsu'];
                $senhaEncript = Bcrypt::hash($infoPost['senha']);

                


                //date_default_timezone_set('Etc/UTC');
                //se a gente não for usar o type=date, a gente precisa fazer o rolê de inverter pra ficar no padrão do banco
                $comando1 = $pdo->prepare("update acesso set senha = '$senhaEncript', email = '{$infoPost['email']}' where cod_acesso = $codAcesso");
                $comando2 = $pdo->prepare("update usuario set nome_usu = '{$infoPost['nome_usu']}', cpf_usu = '{$infoPost['cpf_usu']}', url_foto_usu = '$imagem', data_entrada = (cast(NOW() as Date)) where cod_acesso = $codUsu");
                
                if($comando1->execute() && $comando2->execute()){                
                    $nomeTipoUsu = $_SESSION['dadosUsu']['nomeTipoUsu'];
                
                            switch ($nomeTipoUsu) {
                                case 'Master':
                                //header("Location: cadastroDeInst.php");
                                echo "<script type='text/javascript'> window.location.href='primeiroCadastroMaster/cadastroDeInst/cadastroDeInst.php';</script>";
                                break;

                                case 'Professor':
                                    echo "<script type='text/javascript'> window.location.href='perfilProfessor.php';</script>";
                                break;

                                case 'Saude':
                                    echo "<script type='text/javascript'> window.location.href='perfilSaude.php';</script>";
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
