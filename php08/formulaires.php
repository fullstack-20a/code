<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORMULAIRES</title>
</head>
<body>
    <header>
        <h1>FORMULAIRES</h1>
    </header>
    <main>
        <section>
            <h2>FORMULAIRE D'INSCRIPTION A LA NEWSLETTER</h2>
            <form action="api.php" method="POST">
                <!-- NORMALEMENT ON A UNE TABLE SQL newsletter AVEC COMME COLONNES id ET nom ET email -->
                <!-- DANS LE CRUD = CREATE SUR LA TABLE newsletter -->
                <input type="text" name="nom" required placeholder="votre nom">
                <input type="email" name="email" required placeholder="votre email">
                <button type="submit">inscription</button>
                <!-- ASTUCE: UN CHAMP TECHNIQUE POUR RAJOUTER DES INFOS UTILES POUR PHP -->
                <input type="hidden" name="codebarre" value="newsletter">
                <input type="hidden" name="classeCible" value="ApiNewsletter">
                <input type="hidden" name="methodeCible" value="create">
            </form>
        </section>

        <section>
            <h2>FORMULAIRE DE CONTACT</h2>
            <form action="api.php" method="POST">
                <!-- NORMALEMENT ON A UNE TABLE SQL contact AVEC COMME COLONNES id ET nom ET email ET message -->
                <!-- DANS LE CRUD = CREATE SUR LA TABLE contact -->
                <input type="text" name="nom" required placeholder="votre nom">
                <input type="email" name="email" required placeholder="votre email">
                <textarea name="message" required placeholder="votre message"></textarea>
                <button type="submit">inscription</button>
                <!-- ASTUCE: UN CHAMP TECHNIQUE POUR RAJOUTER DES INFOS UTILES POUR PHP -->
                <input type="hidden" name="codebarre" value="contact">
                <input type="hidden" name="classeCible" value="ApiContact">
                <input type="hidden" name="methodeCible" value="create">
            </form>
        </section>

    </main>
    <footer>
        <p>tous droits réservés</p>
    </footer>
</body>
</html>