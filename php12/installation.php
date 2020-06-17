<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSTALLATION</title>
</head>
<body>
    <header>
        <h1>BLOG</h1>
    </header>
    <main>
        <section>
            <h2>FORMULAIRE D'INSTALLATION</h2>
            <form action="api.php" method="POST">
                <!-- PARTIE A REMPLIR PAR LE VISITEUR -->
                <input type="email" name="email" required placeholder="email">
                <input type="text" name="login" required placeholder="login">
                <input type="password" name="password" required placeholder="password">
                <button>CREER LE COMPTE ADMIN</button>
                <!-- PARTIE TECHNIQUE -->
                <input type="hidden" name="classeCible" value="User">
                <input type="hidden" name="methodeCible" value="installer">
            </form>
        </section>
    </main>
</body>
</html>