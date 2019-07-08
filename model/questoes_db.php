<?php
require_once('../model/database.php');

function cadastra_questao($enunciado, $alternativas, $correta){
    global $db;
   
    $query = 'INSERT INTO questao
                 (enunciado)
              VALUES
                 (:enunciado)';
    $statement = $db->prepare($query);
    $statement->bindValue(':enunciado', $enunciado);
    $statement->execute();
    $statement->closeCursor();

    $id_questao = $db->lastInsertId();

    foreach($alternativas as $indice=>$alternativa){

        $query = 'INSERT INTO alternativa_questao 
                    (id_questao, correta, texto)
                VALUES
                    (:id_questao, :correta, :texto)';
        
        $statement2 = $db->prepare($query);
        $statement2->bindValue(':id_questao', $id_questao);
        $statement2->bindValue(':texto', $alternativa);
        if($indice == $correta){
            $statement2->bindValue(':correta', 1);
        } else {
            $statement2->bindValue(':correta', 0);
        }
        $statement2->execute();
        $statement2->closeCursor();
    }

}

function listar_questao(){
    global $db;
    $query = 'SELECT * FROM questao';
    $statement = $db->prepare($query);
    $statement->execute();
    $questoes = $statement->fetchAll();
    $statement->closeCursor();
    return $questoes; 
}

function remover_questao($id_questao){
    global $db;
    $query = 'DELETE FROM questao
              WHERE id = :id_questao';
    $statement = $db->prepare($query);
    $statement->bindValue(':id_questao', $id_questao);
    $statement->execute();
    $statement->closeCursor();
}
 
function alterar_questao($id_questao, $enunciado, $novas_alternativas, $correta){
    global $db;
    $query = 'UPDATE questao
                 SET enunciado = :enunciado
              WHERE
                 id = :id_questao';
            
    $statement = $db->prepare($query);
    $statement->bindValue(':enunciado', $enunciado);
    $statement->bindValue(':id_questao', $id_questao);
    $statement->execute();
    $statement->closeCursor();

    $alternativas = buscar_alternativas_questao($id_questao);

    foreach($alternativas as $indice=>$alternativa){

        $query = 'UPDATE alternativa_questao 
                    SET texto = :texto, correta = :correta
                WHERE
                    id = :id';
        
        $statement2 = $db->prepare($query);
        $statement2->bindValue(':texto', $novas_alternativas[$indice]);
        $statement2->bindValue(':id', $alternativa['id']);
        if($indice == $correta){
            $statement2->bindValue(':correta', 1);
        } else {
            $statement2->bindValue(':correta', 0);
        }
        $statement2->execute();
        $statement2->closeCursor();
    }
    

}

function buscar_alternativas_questao($id_questao){
    global $db;
    $query = 'SELECT * FROM alternativa_questao WHERE id_questao = :id_questao ORDER BY id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id_questao', $id_questao);
    $statement->execute();
    $alternativas = $statement->fetchAll();
    $statement->closeCursor();

    return $alternativas;
}

function buscar_enunciado_questao($id_questao){
    global $db;
    $query = 'SELECT enunciado FROM questao WHERE id = :id_questao';
    $statement = $db->prepare($query);
    $statement->bindValue(':id_questao', $id_questao);
    $statement->execute();
    $enunciado = $statement->fetch();
    $statement->closeCursor();
    return $enunciado[0]; 
}

function contar_questoes(){
    global $db;
    $query = 'SELECT COUNT(*) FROM questao';
    $statement = $db->prepare($query);
    $statement->execute();
    $numero = $statement->fetch();
    $statement->closeCursor();
    return $numero[0]; 
}

function contar_questoes_avaliacao($id_avaliacao){
    global $db;
    $query = 'SELECT COUNT(*) FROM avaliacao_questao WHERE id_avaliacao = :id_avaliacao';
    $statement = $db->prepare($query);
    $statement->bindValue(':id_avaliacao', $id_avaliacao);
    $statement->execute();
    $numero = $statement->fetch();
    $statement->closeCursor();
    return $numero[0]; 
}

function estaCorreta($id_alternativa){
    global $db;
    $query = 'SELECT correta FROM alternativa_questao WHERE id = :id_alternativa';
    $statement = $db->prepare($query);
    $statement->bindValue(':id_alternativa', $id_alternativa);
    $statement->execute();
    $correta = $statement->fetch();
    $statement->closeCursor();

    if($correta[0] == 0){
        return false;
    }
    
    return true; 
}