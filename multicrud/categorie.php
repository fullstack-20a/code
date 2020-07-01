<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <nav>
            <a href="inscription.php">inscription</a>
            <a href="contenu.php">contenu</a>
            <a href="categorie.php">categorie</a>
            <a href="contenu-categorie.php">contenu-categorie</a>
        </nav>
    </header>
    <main>
        <section>
            <h2>FORMULAIRE DE CREATE SUR categorie</h2>
            <!-- NE PAS OUBLIER ATTRIBUT enctype SI UPLOAD SANS AJAX -->
            <form action="api-categorie.php" method="POST">
                <input type="text" name="nom" required placeholder="nom">
                <textarea name="resume" cols="80" rows="8" required placeholder="resume"></textarea>
                <button type="submit">PUBLIER UNE CATEGORIE</button>
            </form>
        </section>

    </main>
    <footer>
        <p>tous droits réservés</p>
    </footer>
</body>
</html>