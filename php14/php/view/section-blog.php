
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