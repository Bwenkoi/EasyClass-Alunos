<?php
require('database.php');

function cadastra_turma($id_professor, $id_disciplina, $ano_periodo){
    global $db;
    $query = 'INSERT INTO turma
                 (id_professor, id_disciplina, ano_periodo)
              VALUES
                 (:id_professor, :id_disciplina, :ano_periodo)';
    $statement = $db->prepare($query);
    $statement->bindValue(':id_professor', $id_professor);
    $statement->bindValue(':id_disciplina', $id_disciplina);
    $statement->bindValue(':ano_periodo', $ano_periodo);
    $statement->execute();
    $statement->closeCursor();
}

function lista_turmas(){
    global $db;
    $query = 'SELECT * FROM turma'
        . ' ORDER BY id_disciplina';
    $statement = $db->prepare($query);
    $statement->execute();
    $turmas = $statement->fetchAll();
    $statement->closeCursor();
    return $turmas;
}

function lista_alunos_turma($id_turma){
    global $db;
    $query = 'SELECT * FROM aluno_turma'
        . ' WHERE id_turma = :id_turma';
    $statement = $db->prepare($query);
    $statement->bindValue(':id_turma', $id_turma);
    $statement->execute();
    $turmas = $statement->fetchAll();
    $statement->closeCursor();
    return $turmas;
}

function get_turma_by_id($id){
    global $db;
    $query = 'SELECT * FROM turma'
        . ' WHERE id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $turmas = $statement->fetchAll();
    $statement->closeCursor();
    return $turmas;
}

function lista_matriculas_aluno($id_aluno){
    global $db;
    $query = 'SELECT * FROM aluno_turma'
        . ' WHERE id_aluno = :id_aluno';
    $statement = $db->prepare($query);
    $statement->bindValue(':id_aluno', $id_aluno);
    $statement->execute();
    $matriculas = $statement->fetchAll();
    $statement->closeCursor();
    return $matriculas;
}


function lista_turmas_prof($id_professor){
    global $db;
    $query = 'SELECT * FROM turma'
        . ' WHERE id_professor = :id_professor';
    $statement = $db->prepare($query);
    $statement->bindValue(':id_professor', $id_professor);
    $statement->execute();
    $turmas = $statement->fetchAll();
    $statement->closeCursor();
    return $turmas;
}

function altera($num, $equip, $desc, $disp){
    global $db;
    $query = 'UPDATE salas
                 SET equipamentos = :equip, descri = :desc, disponivel = :disp
              WHERE
                 numero = :num';

    $statement = $db->prepare($query);
    $statement->bindValue(':num', $num);
    $statement->bindValue(':equip', $equip);
    $statement->bindValue(':desc', $desc);
    $statement->bindValue(':disp', $disp);
    $statement->execute();
    $statement->closeCursor();
}

function remover_turma($id){
    global $db;
    $query = 'DELETE FROM turma
              WHERE id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $statement->closeCursor();
}

function matricula($id_turma, $id_aluno){
    global $db;
    $query = 'INSERT INTO aluno_turma
                 (id_aluno, id_turma)
              VALUES
                 (:id_aluno, :id_turma)';
    $statement = $db->prepare($query);
    $statement->bindValue(':id_turma', $id_turma);
    $statement->bindValue(':id_aluno', $id_aluno);
    $statement->execute();
    $statement->closeCursor();
}

function get_id_aluno_turma($id_aluno, $id_turma){

    global $db;
    $query = 'SELECT * FROM aluno_turma'
        . ' WHERE id_aluno = :id_aluno AND id_turma = :id_turma';
    $statement = $db->prepare($query);
    $statement->bindValue(':id_aluno', $id_aluno);
    $statement->bindValue(':id_turma', $id_turma);
    $statement->execute();
    $id = $statement->fetch();
    $statement->closeCursor();
    return $id[0];

}

function buscar_avaliacoes_turma($id_turma){

    global $db;
    $query = 'SELECT * FROM turma_avaliacao'
        . ' WHERE id_turma = :id_turma';
    $statement = $db->prepare($query);
    $statement->bindValue(':id_turma', $id_turma);
    $statement->execute();
    $avaliacoes = $statement->fetchAll();
    $statement->closeCursor();
    return $avaliacoes;

}

function historico_aluno_turma($id_aluno_turma){

    global $db;
    $query = 'SELECT * FROM aluno_avaliacao'
        . ' WHERE id_aluno_turma = :id_aluno_turma';
    $statement = $db->prepare($query);
    $statement->bindValue(':id_aluno_turma', $id_aluno_turma);
    $statement->execute();
    $avaliacoes = $statement->fetchAll();
    $statement->closeCursor();
    return $avaliacoes;

}

function get_turma_avaliacao_by_aluno_avaliacao($id_aluno_avaliacao){

    global $db;
    $query = 'SELECT id_turma_avaliacao FROM aluno_avaliacao'
        . ' WHERE id = :id_aluno_avaliacao';
    $statement = $db->prepare($query);
    $statement->bindValue(':id_aluno_avaliacao', $id_aluno_avaliacao);
    $statement->execute();
    $id_turma_avaliacao = $statement->fetch();
    $statement->closeCursor();
    return $id_turma_avaliacao[0];

}

function get_avaliacao_by_turma_avaliacao($id_turma_avaliacao){

    global $db;
    $query = 'SELECT id_avaliacao FROM turma_avaliacao'
        . ' WHERE id = :id_turma_avaliacao';
    $statement = $db->prepare($query);
    $statement->bindValue(':id_turma_avaliacao', $id_turma_avaliacao);
    $statement->execute();
    $id_avaliacao = $statement->fetch();
    $statement->closeCursor();
    return $id_avaliacao[0];

}
