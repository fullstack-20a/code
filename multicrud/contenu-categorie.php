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
            <h2>FORMULAIRE DE CREATE SUR contenu_categorie</h2>
            <!-- NE PAS OUBLIER ATTRIBUT enctype SI UPLOAD SANS AJAX -->
            <form action="api-contenu-categorie.php" method="POST">
                <input type="number" name="id_contenu" required placeholder="id_contenu">
                <input type="number" name="id_categorie" required placeholder="id_categorie">
                <button type="submit">AJOUTER UN LIEN CONTENU-CATEGORIE</button>
            </form>
        </section>

    </main>
    <footer>
        <p>tous droits réservés</p>
    </footer>
</body>
</html>