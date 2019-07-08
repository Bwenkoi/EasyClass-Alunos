<?php
require('../model/database.php');

function cadastra_disciplina($id, $nome, $cargaHoraria){
    global $db;
   
    $query = 'INSERT INTO disciplina
                 (id, nome, cargaHoraria)
              VALUES
                 (:id, :nome, :cargaHoraria)';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->bindValue(':nome', $nome);
    $statement->bindValue(':cargaHoraria', $cargaHoraria);
    $statement->execute();
    $statement->closeCursor();
}

function lista_disciplina(){
    global $db;
    $query = 'SELECT * FROM disciplina'
           . ' ORDER BY id';
    $statement = $db->prepare($query);
    $statement->execute();
    $disciplinas = $statement->fetchAll();
    $statement->closeCursor();
    return $disciplinas;
}

function lista_id_disciplina($id){
    global $db;
    $query = 'SELECT * FROM disciplina'
        . ' WHERE id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $disciplinas = $statement->fetchAll();
    $statement->closeCursor();
    return $disciplinas;
}

function get_disciplina_by_id($id){
    global $db;
    $query = 'SELECT * FROM disciplina'
        . ' WHERE id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $disciplinas = $statement->fetchAll();
    $statement->closeCursor();
    return $disciplinas;
}

function lista_nome_disciplina($nome){
    global $db;
    $query = 'SELECT * FROM disciplina'
        . ' WHERE nome = :nome';
    $statement = $db->prepare($query);
    $statement->bindValue(':nome', $nome);
    $statement->execute();
    $disciplinas = $statement->fetchAll();
    $statement->closeCursor();
    return $disciplinas;
}

function altera_disciplina($id, $nome, $cargaHoraria){
    global $db;
    $query = 'UPDATE disciplina
                 SET nome = :nome, cargaHoraria = :cargaHoraria
              WHERE
                 id = :id';
            
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->bindValue(':nome', $nome);
    $statement->bindValue(':cargaHoraria', $cargaHoraria);
    $statement->execute();
    $statement->closeCursor();
}

function remover_disciplina($id){
    global $db;
    $query = 'DELETE FROM disciplina
              WHERE id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $statement->closeCursor();
}