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
        </nav>
    </header>
    <main>
        <section>
            <h2>FORMULAIRE DE CREATE SUR user</h2>
            <form action="api.php" method="POST">
                <input type="text" name="login" required placeholder="login">
                <input type="password" name="password" required placeholder="password">
                <button type="submit">INSCRIPTION</button>
            </form>
        </section>
    </main>
    <footer>
        <p>tous droits réservés</p>
    </footer>
</body>
</html>