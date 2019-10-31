<?php
session_start();
require_once 'bd/conexao.php';
require_once 'classes/Bcrypt.php';
require_once 'primeiroCadastroMaster/funcoes/funcoes.php';



$filterFormLogin = [
  "email" => FILTER_VALIDATE_EMAIL,
  "senha" => FILTER_SANITIZE_SPECIAL_CHARS
];

$infoPost = filter_input_array(INPUT_POST, $filterFormLogin);

if($infoPost){

  $email = $infoPost['email'];
  $senha = $infoPost['senha'];

    if ($email === '' or $senha === '') {
               echo "<p>Todos os campos devem ser preenchidos</p>";

    }else if($email != false){


  $comando = $pdo->prepare("select acesso.cod_acesso, senha, email, tipo_usuario.cod_tipo_usu, nome_tipo_usu, cod_status_tipo_usu_operacao, operacao.cod_operacao, nome_operacao, cod_status_operacao, link_operacao, usuario.cod_usu, nome_usu, cpf_usu, data_nasc_usu, url_foto_usu, data_entrada, data_saida, cod_status_usu
  From acesso inner join tipo_usuario on (acesso.cod_tipo_usu = tipo_usuario.cod_tipo_usu)
              inner join tipo_usu_operacao on (tipo_usuario.cod_tipo_usu = tipo_usu_operacao.cod_tipo_usu)
              inner join operacao on (tipo_usu_operacao.cod_operacao = operacao.cod_operacao)
              inner join usuario on (acesso.cod_acesso = usuario.cod_acesso) where email = '$email';");

  $comando->execute();
  $numeroDeLinhas = $comando->rowCount();
  if ($numeroDeLinhas === 0) {
      //var_dump($comando);
      echo "<p>Usuário Inexistente!</p>";

  }else if($numeroDeLinhas >= 1){
      while ($dados = $comando->fetchAll(PDO::FETCH_ASSOC)) {
        $dedos = $dados;

        $codAcesso = $dados[0]['cod_acesso'];
        $senhaUsu = $dados[0]['senha'];
        $emailUsu = $dados[0]['email'];
        $codTipoUsu = $dados[0]['cod_tipo_usu'];
        $nomeTipoUsu = $dados[0]['nome_tipo_usu'];

        $codUsu = $dados[0]['cod_usu'];
        $nomeUsu = $dados[0]['nome_usu'];
        $cpfUsu = $dados[0]['cpf_usu'];
        $dataNascUsu = $dados[0]['data_nasc_usu'];
        $fotoUsu = $dados[0]['url_foto_usu'];
        $entradaUsu = $dados[0]['data_entrada'];
        $saidaUsu = $dados[0]['data_saida'];
        $codStatusUsu = $dados[0]['cod_status_usu'];
      }
  }

      $obj = new Bcrypt();
      if(isset($senhaUsu)){
        if($obj->check($senha, $senhaUsu)){
          
          $codStatusTipoUsuOperacao = array();
          $codOperacao = array();
          $nomeOperacao = array();
          $codStatusOperacao = array();
          //$classeOperacao = array();
          
          for($i = 0; $i <= ($numeroDeLinhas-1); $i++){
            $codStatusTipoUsuOperacao[] = $dedos[$i]['cod_status_tipo_usu_operacao'];
            $codOperacao[] = $dedos[$i]['cod_operacao'];
            $nomeOperacao[] = $dedos[$i]['nome_operacao'];
            $codStatusOperacao[] = $dedos[$i]['cod_status_operacao'];
            $linkOperacao[] = $dedos[$i]['link_operacao'];
            //$classeOperacao[] = $dedos[$i]['classeOperacao'];
          }

            $_SESSION['logado'] = true;
            $_SESSION['dadosUsu'] = [
                  "codAcesso" => $codAcesso,
                  "senhaUsu" => $senhaUsu,
                  "emailUsu" => $emailUsu,
                  "codTipoUsu" => $codTipoUsu,
                  "nomeTipoUsu" => $nomeTipoUsu,
                  "codStatusTipoUsuOperacao" => $codStatusTipoUsuOperacao,
                  "codOperacao" => $codOperacao,
                  "nomeOperacao" => $nomeOperacao,
                  "codStatusOperacao" => $codStatusOperacao,
                  "linkOperacao" => $linkOperacao,
                  //"classeOperacao" => $classeOperacao,
                  "codUsu" => $codUsu,
                  "nomeUsu" => $nomeUsu,
                  "cpfUsu" => $cpfUsu,
                  "dataNascUsu" => $dataNascUsu,
                  "fotoUsu" => $fotoUsu,
                  "entradaUsu" => $entradaUsu,
                  "saidaUsu" => $saidaUsu,
                  "codStatusUsu" => $codStatusUsu
              ];

              switch ($nomeTipoUsu) {
                case 'Master':
                break;

                case 'Professor':
                          $codUnid = get_id($pdo, "cod_unid", "usuario_unidade", "cod_usu", $codUsu);
                          $_SESSION['dadosUsu']['codUnidadeUsu'] = $codUnid;
                break;
                case 'Diretor':
                          $codUnid = get_id($pdo, "cod_unid", "usuario_unidade", "cod_usu", $codUsu);
                          $nomeUnid = get_id($pdo, "nome_unid", "unidade", "cod_unid", $codUnid);
                          $_SESSION['dadosUsu']['codUnidadeUsu'] = $codUnid;
                          $_SESSION['dadosUsu']['nomeUnidadeUsu'] = $nomeUnid;
                break;
            }


            if($entradaUsu === NULL){
                // manda pra tela de confirmação de dados
                // por enquanto vou deixar o header aqui tmb
                echo "<script type='text/javascript'> window.location.href='alterarAcc.php';</script>";
            }else{
                echo "<script type='text/javascript'> window.location.href='perfil".$nomeTipoUsu.".php';</script>";
            }
          } else {  
            session_destroy();
            echo "<p>Senha incorreta!!</p>";
          }
      } 
    }else{
      session_destroy();
      echo "<p>Email Inválido ou em branco!</p>";
    }
}
/**/

?>
