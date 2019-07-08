<?php include 'headerL.php'; ?>

<main>
    <div class="container-fluid">
        <div class="tituloPaginaEntidade col-md-4 offset-md-4">
            <h1 class="h3">Login</h1>
        </div>
        <form class="col-md-4 offset-md-4" action="login/index.php" method="post">
            <input type="hidden" name="action" value="verificar_login">

            <div class="form-group">
                <input type="text" class="form-control" placeholder="Login *" name="login" autocomplete="off"/>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Senha *" name="senha"/>
            </div>
            <div class="form-group">
                <input type="submit" class="btn col-md-12" 
                style="background-color: #218380; color: white" value="Login" />
            </div>
        </form>
    </div>
</main>

<?php include 'footer.php'; ?>
