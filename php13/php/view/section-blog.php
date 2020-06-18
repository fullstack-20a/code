
<section>
    <h2>LISTE DES ARTICLES</h2>
    <div class="ligne x3col">
<?php
// CHARGER LE CODE PHP
require_once "php/model/Config.php";
require_once "php/model/Model.php";

// RECUPERER LA LISTE DES ARTICLES
// ET CONSTRUIRE LE HTML POUR CHAQUE ARTICLE
$tabArticle = Model::read("article");        // TABLEAU ORDONNE DE TABLEAU ASSOCIATIF
foreach($tabArticle as $tabLigne)            // $tabLigne EST UN TABLEAU ASSOCIATIF
{
    // https://www.php.net/manual/fr/function.extract.php
    extract($tabLigne);
    // CREE AUTOMATIQUEMENT LES VARIABLES AVEC LES NOMS DES COLONNES
    echo 
<<<CODEHTML

    <article>
        <h3><a href="article.php?id=$id">$titre</a></h3>
        <img src="$photo" alt="$titre"> 
        <pre>$contenu</pre>
    </article>

CODEHTML;
}
?>
    </div>
</section>