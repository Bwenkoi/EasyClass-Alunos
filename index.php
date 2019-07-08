<?php
require('model/database.php');
require('model/turma_db.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(!(isset($_SESSION['login']) && $_SESSION['login'] != '')){

    header("Location: login.php");

} else {
    include('home.php');
}