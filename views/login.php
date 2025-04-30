<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Document</title>
</head>

<body>
    <header>
        <nav>
            <h1>The Social Network</h1>
        </nav>
    </header>
    <main>
        <section class="login">
            <h2>Déjà un compte ?</h2>
            <div class="form-container">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="email" placeholder="Email" name="email-log" required>
                    <input type="password" placeholder="Mot de passe" name="password-log" required>
                    <button type="submit">Se connecter</button>
                    <?php if (isset($error)): ?>
                        <?php foreach ($error as $err): ?>
                            <p style="color: red;"><?php echo $err; ?></p>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </form>
            </div>
        </section>

        <section class="sign-in">
            <h2>Sinon crée le</h2>
            <div>
                <form action="register" method="POST">
                    <button>Inscription</button>
                </form>
            </div>
        </section>
    </main>




</body>

</html>