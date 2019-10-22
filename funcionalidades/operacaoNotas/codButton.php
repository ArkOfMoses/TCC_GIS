<?php
require_once '../../bd/conexao.php';
require_once '../../primeiroCadastroMaster/funcoes/funcoes.php';

$index = filter_var($_POST['index'], FILTER_VALIDATE_INT);
$codUnid = filter_var($_POST['codUnid'], FILTER_VALIDATE_INT);
$codProf = filter_var($_POST['codProf'], FILTER_VALIDATE_INT);

$command = $pdo->prepare("select turma.cod_tur, sigla_tur, cod_status_tur, prof_turma_disc.cod_disc, disciplina.nome_disc
from cursos inner join turma on (cursos.cod_curso = turma.cod_curso)
            inner join cursos_unidade on (cursos_unidade.cod_curso = cursos.cod_curso) 
            inner join prof_turma_disc on (prof_turma_disc.cod_tur = turma.cod_tur)
            inner join disciplina on (prof_turma_disc.cod_disc = disciplina.cod_disc) where cod_unid = $codUnid and prof_turma_disc.cod_usu = $codProf 
            and cod_status_tur = 'A' and cod_status_cursos = 'A' and cod_status_cursos_unid = 'A' and prof_turma_disc.cod_status_prof_tur_disc = 'A' and disciplina.cod_status_disc = 'A';");

$command->execute();


$codTurAnt = 0;
$infoTurmasDisc = array();

while($data = $command->fetch(PDO::FETCH_ASSOC)){
    $sigla = $data['sigla_tur'];
    $codTur = $data['cod_tur'];
    $codDisc = $data['cod_disc'];
    $nomeDisc = $data['nome_disc'];

    if($codTur == $codTurAnt){
        $keyUlt = array_key_last($infoTurmasDisc);
        $infoDisc = $infoTurmasDisc[$keyUlt]['infoDisc'];
        $infoDisc[$codDisc] = $nomeDisc;
        $infoTurmasDisc[$keyUlt]['infoDisc'] = $infoDisc;
    }else{
        $infoTurmasDisc[] = [
            "siglaTurm" => $sigla,
            "codTur" => $codTur,
            "infoDisc" => [
                $codDisc => $nomeDisc
            ]
        ];
        $codTurAnt = $codTur;
    }
}


$infTur = $infoTurmasDisc[$index]['infoDisc'];
$codTur = $infoTurmasDisc[$index]['codTur'];

$arrayJSON = [
	"codTur" => $codTur,
	"Disc" => $infTur
];

$jsonEncode = json_encode($arrayJSON);
echo $jsonEncode;