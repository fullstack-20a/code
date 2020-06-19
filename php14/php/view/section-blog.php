
<section>
    <h2>LISTE DES ARTICLES</h2>
    <div class="ligne x3col">
<?php

// RECUPERER LA LISTE DES ARTICLES
// ET CONSTRUIRE LE HTML POUR CHAQUE ARTICLE
$tabArticle = Model::read("article");        // TABLEAU ORDONNE DE TABLEAU ASSOCIATIF
foreach($tabArticle as $tabLigne)            // $tabLigne EST UN TABLEAU ASSOCIATIF
{
    // https://www.php.net/manual/fr/function.extract.php
    extract($tabLigne);
    // CREE AUTOMATIQUEMENT LES VARIABLES AVEC LES NOMS DES COLONNES

    // ON CHOISIT LA PHOTO A AFFICHER
    $photo400 = str_replace("/upload/", "/mini400/", $photo);

    echo 
<<<CODEHTML

    <article>
        <h3><a href="article.php?id=$id">$titre</a></h3>
        <img src="$photo400" alt="$titre"> 
        <pre>$contenu</pre>
    </article>

CODEHTML;
}
?>
    </div>
</section>

<section>
    <h2>CARTE</h2>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2903.9454222566496!2d5.3623260163391295!3d43.294464629135234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12c9c0c6a1843729%3A0x7d3f3acf189dc3b1!2sVieux-Port%20de%20Marseille!5e0!3m2!1sfr!2sfr!4v1592567204377!5m2!1sfr!2sfr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</section>