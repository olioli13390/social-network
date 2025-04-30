<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/wall.css">
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
            <div class="form-container">
                <form action="post" method="POST" enctype="multipart/form-data">
                    <h2>Postez quelque chose</h2>
                    <input type="text" name="title" placeholder="Titre">
                    <?php if (isset($error)): ?>
                        <p style="color: red;" <?php echo $error ?></p>
                        <?php endif; ?>
                        <textarea name="message" placeholder="Message" required></textarea>
                        <button type="submit">Poster</button>
                </form>
            </div>
        </section>
        <section class="fil">

            <?php foreach ($posts as $post): ?>
                <div class="article-container">
                    <div class="post">
                        <h3><?= htmlspecialchars($post["title"]) ?></h3>
                        <p><?= htmlspecialchars($post["content"]) ?></p>
                        <h4>Posté par <?= htmlspecialchars($post["nom"]) . " " . htmlspecialchars($post["prenom"]) . " " . htmlspecialchars($post["created_at"]) ?></h4>
                        <?php if ($_SESSION['user_id'] == $post['user_id']): ?>
                            <div class="button-container">
                                <div class="delete-container">
                                    <form action="/deletePost" method="POST">
                                        <input type="hidden" name="post_id" value="<?= $post['post_id'] ?>">
                                        <button>Supprimer</button>
                                    </form>
                                </div>
                                <div class="edit-container">
                                    <form action="/formUpdatePost" method="POST">
                                        <input type="hidden" name="post_id" value="<?= $post['post_id'] ?>">
                                        <button>Modifier</button>
                                    </form>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>


        </section>
    </main>
</body>

</html>