<?php
require('../model/database.php');
require('../model/turma_db.php');
require('../model/professor_db.php');
require('../model/aluno_db.php');
require('../model/avaliacao_db.php');
require('../model/questoes_db.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'lista_turma';
    }
}

if($action == 'lista_turma'){
    $turmas_aluno = lista_matriculas_aluno($_SESSION['id_aluno']);
    include('lista_turma.php');
}

if($action == 'visualizar_avaliacoes'){

    $id_turma = filter_input(INPUT_POST, 'id_turma');
    $id_aluno_turma = get_id_aluno_turma($_SESSION['id_aluno'], $id_turma);
    $avaliacoes_aluno = historico_aluno_turma($id_aluno_turma);
    $avaliacoes_pendentes = buscar_avaliacoes_turma($id_turma);

    include('visualizar_turma.php');
}

if($action == 'realizar_avaliacao'){

    $id_aluno_turma = filter_input(INPUT_POST, 'id_aluno_turma');
    $id_turma_avaliacao = filter_input(INPUT_POST, 'id_turma_avaliacao');
    $id_avaliacao = filter_input(INPUT_POST, 'id_avaliacao');
    $avaliacao = get_avaliacao_by_id($id_avaliacao);
    $questoes = buscar_questoes_avaliacao($id_avaliacao);

    include('realizar_avaliacao.php');
}

if($action == 'confirmar_realizacao_prova'){

    $id_aluno_turma = filter_input(INPUT_POST, 'id_aluno_turma');
    $id_turma_avaliacao = filter_input(INPUT_POST, 'id_turma_avaliacao');
    $id_avaliacao = filter_input(INPUT_POST, 'id_avaliacao');
    $nota = 0;
    $acertos = 0;
    $nro_questoes = contar_questoes_avaliacao($id_avaliacao);

    for($i = 0; $i < contar_questoes_avaliacao($id_avaliacao); $i++){

        $alternativa = filter_input(INPUT_POST, 'questao'.$i);
        if(estaCorreta($alternativa)){
            $acertos++;
        }
    }

    $nota = floatval(floatval($acertos/$nro_questoes)*10);
    realizar_avaliacao($id_aluno_turma, $id_turma_avaliacao, $nota);

    $turmas_aluno = lista_matriculas_aluno($_SESSION['id_aluno']);
    include('lista_turma.php');
}

