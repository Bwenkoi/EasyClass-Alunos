<!DOCTYPE html>
<html>
<!-- the head section -->

<head>
    <title>Gerenciamento de Turmas</title>
    <!--<div align="center"><img src="imagens/lv.png"/></div>-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<!-- the body section -->

<body>
    <header>
        <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {

            header("Location: ../login.php");
        }
        ?>

        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <a href="../index.php" class="navbar-brand">
                EasyClass - Alunos
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ml-auto">
                    <!-- Turmas -->
                    <div class="nav-item">
                        <a class="nav-link" href="../turmas/index.php?action=lista_turma">
                            Turmas
                        </a>
                    </div>
                    <!-- Login -->
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownLogin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION['login'] . '&nbsp' ?> <i style="color: rgba(255,255,255,.5);" class="fas fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownLogin">
                            <a class="dropdown-item" href="../logout.php">Sair</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>