<?php
require('../model/database.php');
require('../model/disciplina_db.php');

function cadastra_avaliacao($disciplina, $titulo, $questoes)
{
    global $db;

    $query = 'INSERT INTO avaliacao
                 (disciplina, titulo)
              VALUES
                 (:disciplina, :titulo)';
    $statement = $db->prepare($query);
    $statement->bindValue(':disciplina', $disciplina);
    $statement->bindValue(':titulo', $titulo);
    $statement->execute();
    $statement->closeCursor();

    $id_avaliacao = $db->lastInsertId();

    foreach ($questoes as $questao) {

        $query = 'INSERT INTO avaliacao_questao 
                    (id_avaliacao, id_questao)
                VALUES
                    (:id_avaliacao, :id_questao)';

        $statement2 = $db->prepare($query);
        $statement2->bindValue(':id_avaliacao', $id_avaliacao);
        $statement2->bindValue(':id_questao', $questao);
        $statement2->execute();
        $statement2->closeCursor();
    }
}

function alterar_avaliacao($id_avaliacao, $disciplina, $titulo, $novas_questoes)
{
    global $db;

    $query = 'UPDATE avaliacao
                SET disciplina = :disciplina, titulo = :titulo
              WHERE
                 id = :id_avaliacao';
    $statement = $db->prepare($query);
    $statement->bindValue(':disciplina', $disciplina);
    $statement->bindValue(':titulo', $titulo);
    $statement->bindValue(':id_avaliacao', $id_avaliacao);
    $statement->execute();
    $statement->closeCursor();

    $aux = listar_questao();
    $questoes = array();
    foreach ($aux as $a) {
        array_push($questoes, $a['id']);
    }

    foreach ($questoes as $questao) {

        if (!in_array($questao, $novas_questoes)) {

            $query = 'DELETE FROM avaliacao_questao
                      WHERE id_questao = :id_questao AND id_avaliacao = :id_avaliacao';
            $statement2 = $db->prepare($query);
            $statement2->bindValue(':id_questao', $questao);
            $statement2->bindValue(':id_avaliacao', $id_avaliacao);
            $statement2->execute();
            $statement2->closeCursor();
        }
    }

    foreach ($novas_questoes as $nova_questao) {

        $query = 'INSERT INTO avaliacao_questao 
                    (id_avaliacao, id_questao)
                VALUES
                    (:id_avaliacao, :id_questao)';

        $statement2 = $db->prepare($query);
        $statement2->bindValue(':id_avaliacao', $id_avaliacao);
        $statement2->bindValue(':id_questao', $nova_questao);
        $statement2->execute();
        $statement2->closeCursor();
    }
}

function listar_avaliacao()
{
    global $db;
    $query = 'SELECT * FROM avaliacao ORDER BY disciplina';
    $statement = $db->prepare($query);
    $statement->execute();
    $avaliacoes = $statement->fetchAll();
    $statement->closeCursor();

    return $avaliacoes;
}

function buscar_questoes_avaliacao($id_avaliacao)
{

    global $db;
    $query = 'SELECT * FROM avaliacao_questao WHERE id_avaliacao = :id_avaliacao ORDER BY id_questao';
    $statement = $db->prepare($query);
    $statement->bindValue(':id_avaliacao', $id_avaliacao);
    $statement->execute();
    $questoes = $statement->fetchAll();
    $statement->closeCursor();

    return $questoes;
}

function get_avaliacao_by_id($id_avaliacao)
{
    global $db;
    $query = 'SELECT * FROM avaliacao WHERE id = :id_avaliacao';
    $statement = $db->prepare($query);
    $statement->bindValue(':id_avaliacao', $id_avaliacao);
    $statement->execute();
    $avaliacao = $statement->fetch();
    $statement->closeCursor();

    return $avaliacao;
}


function remover_avaliacao($id_avaliacao)
{
    global $db;
    $query = 'DELETE FROM avaliacao
              WHERE id = :id_avaliacao';
    $statement = $db->prepare($query);
    $statement->bindValue(':id_avaliacao', $id_avaliacao);
    $statement->execute();
    $statement->closeCursor();
}

function realizar_avaliacao($id_aluno_turma, $id_turma_avaliacao, $nota){

    global $db;

    $query = 'INSERT INTO aluno_avaliacao
                 (id_aluno_turma, id_turma_avaliacao, nota)
              VALUES
                 (:id_aluno_turma, :id_turma_avaliacao, :nota)';
    $statement = $db->prepare($query);
    $statement->bindValue(':id_aluno_turma', $id_aluno_turma);
    $statement->bindValue(':id_turma_avaliacao', $id_turma_avaliacao);
    $statement->bindValue(':nota', $nota);
    $statement->execute();
    $statement->closeCursor();

}