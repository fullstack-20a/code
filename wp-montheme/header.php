<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/style.css">

    <!-- wp_head DEBUT -->
    <?php wp_head() ?>
    <!-- wp_head FIN -->
</head>

<body <?php body_class() ?>>

    <header>
        <h1>MON SITE WORDPRESS</h1>
        <nav>
            <?php wp_nav_menu([ 'theme_location' => 'primary']) ?>
        </nav>
    </header>
    <main>

    