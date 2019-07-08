<?php
require('../model/database.php');

function cadastra_professor($nome, $login, $senha){
    global $db;
   
    $query = 'INSERT INTO professor
                 (nome, login, senha)
              VALUES
                 (:nome, :login, :senha)';
    $statement = $db->prepare($query);
    $statement->bindValue(':nome', $nome);
    $statement->bindValue(':login', $login);
    $statement->bindValue(':senha', $senha);
    $statement->execute();
    $statement->closeCursor();
}

function lista_professor(){
    global $db;
    $query = 'SELECT * FROM professor'
            . ' ORDER BY nome';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement; 
}

function lista_nome_professor($nome){
    global $db;
    $query = 'SELECT * FROM professor'
        . ' WHERE nome = :nome';
    $statement = $db->prepare($query);
    $statement->bindValue(':nome', $nome);
    $statement->execute();
    $professor = $statement->fetchAll();
    $statement->closeCursor();
    return $professor;
}

function get_professor_by_id($id){
    global $db;
    $query = 'SELECT * FROM professor'
        . ' WHERE id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $professor = $statement->fetch();
    $statement->closeCursor();
    return $professor;
}

function altera_professor($id, $nome, $login){
    global $db;
    $query = 'UPDATE professor
                 SET nome = :nome, login = :login
              WHERE
                 id = :id';

    $statement = $db->prepare($query);
    $statement->bindValue(':nome', $nome);
    $statement->bindValue(':login', $login);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $statement->closeCursor();
}

function remover_professor($id){
    global $db;
    $query = 'DELETE FROM professor
              WHERE id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $statement->closeCursor();
}

function verificar_login_professor($login, $senha){

    global $db;
    $query = 'SELECT COUNT(*) FROM professor WHERE login = :login AND senha = :senha';
    $statement = $db->prepare($query);
    $statement->bindValue(':login', $login);
    $statement->bindValue(':senha', $senha);
    $statement->execute();
    $resultado = $statement->fetch();
    $statement->closeCursor();

    if($resultado[0] > 0){
        return true;
    }

    return false;
}