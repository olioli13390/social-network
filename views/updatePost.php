<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/updatePost.css">
    <title>Document</title>
</head>

<body>
    <header>
        <nav>
            <h1>Bienvenu <?= $_SESSION['user_nom'] . " " . $_SESSION['user_prenom'] ?></h1>
            <form method="POST" action="logout">
                <button>Deconnexion</button>
            </form>
        </nav>
    </header>

    <main>
        <section class="post-container">
            <div class="edit-container">
                <h2>Modifier</h2>
                <form action="/updatePost" method="POST">
                    <input type="hidden" name="post_id" value="<?= htmlspecialchars($post['post_id']) ?>">
                    <input type="text" name="title" value="<?= htmlspecialchars($post['title']) ?>" placeholder="Titre">
                    <textarea name="content" placeholder="Contenu"><?= htmlspecialchars($post['content']) ?></textarea>
                    <button type="submit">Modifier</button>
                </form>
            </div>
        </section>
    </main>


</body>

</html>