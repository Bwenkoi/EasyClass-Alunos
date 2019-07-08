<!DOCTYPE html>
<html>
<!-- the head section -->

<head>
    <title>Gerenciamento de Turmas</title>
    <!--<div align="center"><img src="imagens/lv.png"/></div>-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<!-- the body section -->

<body>
    <header>
        <?php 
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        ?>

        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <a href="index.php" class="navbar-brand">
                EasyClass - Alunos
            </a>
        </nav>
    </header>