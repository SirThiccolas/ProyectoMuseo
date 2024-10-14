<html>
    <head>
        <link rel="stylesheet" href="public/css/login.css">
    </head>
    <body>
    <div class="login-container">
        <img src="public/img/logo.png" alt="Museu Apel·les Fenosa">
        
        <?php if (!empty($error)) : ?>
            <p class='error'><?= $error ?></p>
        <?php endif; ?>

        <form action="index.php?controller=Login&action=login" method="post">
            <input type="text" name="usuari" placeholder="Usuari" required>
            <input type="password" name="contrasenya" placeholder="Contrasenya" required>
            <button type="submit" class="btn">Entrar</button>
        </form>

    </div>
    </body>
</html>