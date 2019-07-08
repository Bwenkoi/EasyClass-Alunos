<?php
require('../model/database.php');
require('../model/aluno_db.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'refresh';
    }
} 

$login = filter_input(INPUT_POST, 'login');
$senha = filter_input(INPUT_POST, 'senha');

if ($action == 'refresh') {
    include('../login.php');
}

if($login == null || $senha == null){
    include('login.php');
} else {

    if(verificar_login_aluno($login, $senha)){
        $_SESSION['login'] = $login;
        $_SESSION['id_aluno'] = getIDbyLoginAluno($login);
        header("Location: ../home.php");
    } else {
        unset ($_SESSION['login']);
        unset ($_SESSION['senha']);
        header("Location: ../login.php");

    }

}
