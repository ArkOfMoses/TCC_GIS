<?php
// session_start();
require_once '../../bd/conexao.php';
require_once '../../primeiroCadastroMaster/funcoes/funcoes.php';
// if(isset($_SESSION['logado'])){
//     $dados =  $_SESSION['dadosUsu'];
//     $img = $dados['fotoUsu'];
// }else{
//     unset($_SESSION['dadosUsu']);
//     unset($_SESSION['logado']);
//     session_destroy();
//     header("Location: ../../homeLandingPage.php");
//}

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Primeiro cadastro</title>    
        <link rel="stylesheet" href="../../css/default.css">    
        <!-- CSS PADRÃO -->
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

        <!-- Telas Responsivas -->
        <link rel=stylesheet media="screen and (max-width:480px)" href="../../css/cssCadastroMaster/style480.css">
        <link rel=stylesheet media="screen and (min-width:481px) and (max-width:768px)"
              href="../../css/cssCadastroMaster/style768.css">
        <link rel=stylesheet media="screen and (min-width:769px) and (max-width:1024px)"
              href="../../css/cssCadastroMaster/style1024.css">
        <link rel=stylesheet media="screen and (min-width:1025px)" href="../../css/cssCadastroMaster/style1366.css">
        
    </head>
    <body>
        <div class="content">

            <header class="headerPrimeiroAcesso">
            <!-- <a href="../../alterarAcc.php"><img src="../img/alteraImg.png"></a>
            <a href="../cadastroDeInst/cadastroDeInst.php"><img src="../img/instImg.png"></a> -->
            <!-- <a href="cadastroDeCoord.php"><img src="../../primeiroCadastroMaster/img/unidImg.png"></a> -->
            <!-- <a href="../cadastroDeDir/cadastroDir.php"><img src="../img/dirImg.png"></a>
            <a href="../enviarEmail.php"><img src="../img/emailImg.png"></a>                
            <a href="../confirmarDados.php"><img src="../img/confirmaImg.png"></a> -->

            <style type="text/css">
                .alunos{
                            display: flex;
                            flex-direction: column;
                            align-items: center;
                }

                a{
                    text-align: center;
                    width: 135px;
                    height: 60px;
                    font-size: 18px;
                    background: #00CCCC;
                    font-weight: bold;
                    color: white;
                    border: 0 none;
                    cursor: pointer;
                    padding: 10px 5px;
                    margin: 10px 5px;
                    text-decoration: none;
                    border-radius: 15px;
                }
            </style>
            </header>

            <main>
            <div class="alunos">
                <h1>Olá professor, qual nota você irá lançar?</h1>
                <?php
                $codUnid = 1; //isso vem da sessão
                $codProf = 3; //isso tbm vem da sessão


                $command = $pdo->prepare("select turma.cod_tur, sigla_tur, cod_status_tur, prof_turma_disc.cod_disc, disciplina.nome_disc
                from cursos inner join turma on (cursos.cod_curso = turma.cod_curso)
                            inner join cursos_unidade on (cursos_unidade.cod_curso = cursos.cod_curso) 
                            inner join prof_turma_disc on (prof_turma_disc.cod_tur = turma.cod_tur)
                            inner join disciplina on (prof_turma_disc.cod_disc = disciplina.cod_disc) where cod_unid = $codUnid and prof_turma_disc.cod_usu = $codProf 
                            and cod_status_tur = 'A' and cod_status_cursos = 'A' and cod_status_cursos_unid = 'A' and prof_turma_disc.cod_status_prof_tur_disc = 'A' and disciplina.cod_status_disc = 'A';");
                
                $command->execute();
                $numLinhas = $command->rowCount();
                if($numLinhas == 0){
                    echo '<p>As turmas dessa unidade ainda não foram cadastradas ou você não dá aula a nenhuma turma dessa unidade</p>';
                }else{
                    $codTurAnt = 0;
                    while($data = $command->fetch(PDO::FETCH_ASSOC)){
                        $sigla = $data['sigla_tur'];
                        $codTur = $data['cod_tur'];
                        $codDisc = $data['cod_disc'];
                        $nomeDisc = $data['nome_disc'];

                        if($codTur == $codTurAnt){
                            echo "<a href='telaNotas.php?codTurma=$codTur&codDis=$codDisc'>$nomeDisc</a>";
                        }else{
                            echo "<h3>$sigla</h3>";
                            echo "<a href='telaNotas.php?codTurma=$codTur&codDis=$codDisc'>$nomeDisc</a>";
                            $codTurAnt = $codTur;
                        }
                    }
                }
                ?>
            </div>
            </main>  
        
    </body>
</html>