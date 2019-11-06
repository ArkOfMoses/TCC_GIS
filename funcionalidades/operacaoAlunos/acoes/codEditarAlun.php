<?php
require_once '../../../bd/conexao.php';
require_once '../../../primeiroCadastroMaster/funcoes/funcoes.php';

// var_dump($_POST);
$codAlun = filter_var($_REQUEST['codAlun'], FILTER_SANITIZE_NUMBER_INT);
$nome = filter_var($_POST['nome'], FILTER_SANITIZE_SPECIAL_CHARS);
$socorro = filter_var($_POST['CPF'], FILTER_SANITIZE_SPECIAL_CHARS);
$cpf = validaCPF(filter_var($_POST['CPF'], FILTER_SANITIZE_SPECIAL_CHARS));

// $DataNasc = filter_var($_POST['DataNasc'], FILTER_DEFAULT);
// $DataEntrada = filter_var($_POST['DataEntrada'], FILTER_DEFAULT);
$Nasc = filter_var($_POST['DataNasc'], FILTER_DEFAULT);
$Entrada = filter_var($_POST['DataEntrada'], FILTER_DEFAULT);


if($nome != '' && $socorro != '' && $Nasc != '' && $Entrada != ''){
    $extensao = strtolower(substr($_FILES['img']['name'], -4));
    $novo_nome = sha1(time()) . $extensao;        
    $ext =  strtolower(substr($_FILES['img']['name'], -3));
    $tipos = array("png","jpg","gif");
    $diretorio = "../../../imgsBanco/";
    $imagem = $diretorio.$novo_nome;

    $data = date_create_from_format('d/m/Y', "$Nasc");
    $NascAluno = date_format($data, 'Y-m-d');

    $datee = date_create_from_format('d/m/Y', "$Entrada");
    $EntradaAluno = date_format($datee, 'Y-m-d');

    if($_FILES['img']['name'] === ''){
        $_FILES['img']['name'] = NULL;
    }

    if($cpf === false){
        echo "<h2>cpf inválido</h2>";
    }else{
        if($_FILES['img']['name'] === NULL){
            $command = $pdo->prepare("update usuario set nome_usu = '$nome', cpf_usu = $cpf, data_nasc_usu = '$NascAluno', data_entrada = '$EntradaAluno' where cod_usu = $codAlun");
            $command->execute();
            echo "<h2>Aluno atualizado com sucesso!</h2>";
        }else{
            if (in_array($ext, $tipos)) {     
                if (move_uploaded_file($_FILES['img']['tmp_name'], $imagem)) { 
                    $newImg = "imgsBanco/".$novo_nome;
                    $command = $pdo->prepare("update usuario set nome_usu = '$nome', cpf_usu = $cpf, url_foto_usu = '$newImg', data_nasc_usu = '$NascAluno', data_entrada = '$EntradaAluno' where cod_usu = $codAlun");
                    $command->execute();
                    echo "<h2>Aluno atualizado com sucesso!</h2>";
                }
            }else{
                echo "<h2>O formato da imagem é inválido</h2>";
            }
        }
    }
}else{
    echo "<h2>existem campos vazios</h2>";
}