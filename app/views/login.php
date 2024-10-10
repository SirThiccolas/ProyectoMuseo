<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Museu Apel·les Fenosa</title>
    <link type="image/x-icon" href="public/img/logo.png" rel="icon" />
    <link rel="stylesheet" href="public/css/login.css">
</head>
<body>
    <div class="login-container">
        <img src="public/img/logo.png" alt="Museu Apel·les Fenosa">
        
        <?php if (!empty($error)) : ?>
            <p class='error'><?= $error ?></p>
        <?php endif; ?>

        <form action="index.php?controller=login&action=login" method="post">
            <input type="text" name="usuari" placeholder="Usuari" required>
            <input type="password" name="contrasenya" placeholder="Contrasenya" required>
            <button type="submit" class="btn">Entrar</button>
        </form>

    </div>
</body>
</html>
