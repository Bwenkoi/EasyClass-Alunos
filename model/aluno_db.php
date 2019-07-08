<?php
require_once('../model/database.php');

function cadastra_aluno($nome, $login, $senha){
    global $db;
    $query = 'INSERT INTO aluno
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

function lista_aluno(){
    global $db;
    $query = 'SELECT * FROM aluno'
        . ' ORDER BY nome';
    $statement = $db->prepare($query);
    $statement->execute();
    $alunos = $statement->fetchAll();
    $statement->closeCursor();
    return $alunos;
}

function lista_nome_aluno($nome){
    global $db;
    $query = 'SELECT * FROM aluno'
        . ' WHERE nome = :nome';
    $statement = $db->prepare($query);
    $statement->bindValue(':nome', $nome);
    $statement->execute();
    $alunos = $statement->fetchAll();
    $statement->closeCursor();
    return $alunos;
}

function get_aluno_by_id($id){
    global $db;
    $query = 'SELECT * FROM aluno'
        . ' WHERE id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $aluno = $statement->fetch();
    $statement->closeCursor();
    return $aluno;
}

function altera_aluno($nome, $login, $id){
    global $db;
    $query = 'UPDATE aluno
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

function remover_aluno($id){
    global $db;
    $query = 'DELETE FROM aluno
              WHERE id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $statement->closeCursor();
}

function verificar_login_aluno($login, $senha){

    global $db;
    $query = 'SELECT COUNT(*) FROM aluno WHERE login = :login AND senha = :senha';
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

function getIDbyLoginAluno($login){

    global $db;
    $query = 'SELECT id FROM aluno WHERE login = :login';
    $statement = $db->prepare($query);
    $statement->bindValue(':login', $login);
    $statement->execute();
    $resultado = $statement->fetch();
    $statement->closeCursor();

    return $resultado[0];
}