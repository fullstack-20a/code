<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD article</title>
    <style>
html, body {
    width:100%;
    padding:0;
    margin:0;
    font-size:14px;
}     
* {
    box-sizing: border-box;
    width:100%;
}
form {
    max-width:640px;
    padding:1rem;
}
input, textarea, button {
    padding:0.5rem;
    margin:0.5rem;
}
    </style>
</head>
<body>
    <header>
        <h1>CRUD article</h1>
    </header>
    <main>
        <section>
            <h2>CREATE</h2>
            <form action="api.php" method="POST">
                <!-- PARTIE A REMPLIR PAR L'UTILISATEUR -->
                <input type="text" name="titre" required placeholder="titre">
                <textarea name="contenu" required placeholder="contenu"></textarea>
                <input type="text" name="photo" required placeholder="photo">
                <input type="text" name="categorie" required placeholder="categorie">
                <button type="submit">PUBLIER MON ARTICLE</button>
                <!-- PARTIE TECHNIQUE -->
                <input type="hidden" name="classeCible" value="Article">
                <input type="hidden" name="methodeCible" value="create">
                <!-- POUR AFFICHER UN MESSAGE DE CONFIRMATION -->
                <div class="confirmation"></div>
            </form>
        </section>
        <section>
            <h2>DELETE</h2>
        </section>
        <section>
            <h2>UPDATE</h2>
        </section>
        <section>
            <h2>READ</h2>
        </section>
    </main>
    <footer>
        <p>tous droits réservés</p>
    </footer>
</body>
</html>