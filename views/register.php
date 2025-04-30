<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/register.css">
    <title>Document</title>
</head>

<body>
    <header>
        <nav>
            <h1>Bienvenue sur Social Network</h1>
            <form action="/main" method="POST">
                <input type="hidden">
                <button type="submit">Login</button>
            </form>
        </nav>
    </header>

    <main>
        <section class="form-signin">
            <h2>Inscription</h2>
            <?php if (!empty($error)): ?>
                    <div class="error-messages" style="color: green;">
                        <?php foreach ($error as $err): ?>
                            <p><?= $err ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            <form action="" method="POST" enctype="multipart/form-data">
                
                <input type="text" placeholder="Nom" name="LastName" required>
                <input type="text" placeholder="Prenom" name="FirstName" required>
                <input type=email" placeholder="Email" name="email" required>
                <input type="password" placeholder="Mot de passe" name="password" required>

                <button type="submit">S'inscrire</button>
            </form>
        </section>
    </main>
</body>

</html>