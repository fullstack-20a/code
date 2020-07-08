<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Into The Wild</title>

    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/style.css">
    
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/css/site.css">

    <!-- wp_head DEBUT -->
    <?php wp_head() ?>
    <!-- wp_head FIN -->
</head>

<body <?php body_class("maclasse1 maclasse2") ?>>

    <header>
        <h1>Into The Wild</h1>
        <nav>
            <?php wp_nav_menu([ 'theme_location' => 'primary']) ?>
        </nav>
    </header>
    <main>

    