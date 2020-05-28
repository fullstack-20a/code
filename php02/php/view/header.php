<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Site Vitrine</title>

    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="<?php echo $classBody ?? "" ?>">
    <header>
        <h1><?php echo $h1 ?? "TITRE PAR DEFAUT" ?></h1>
        <nav>
            <a href="index.php">accueil</a>
            <a href="galerie.php">galerie</a>
            <a href="contact.php">contactez-moi</a>
        </nav>
    </header>
    <main>
