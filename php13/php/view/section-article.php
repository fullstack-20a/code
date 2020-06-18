
<section>
    <h2>LISTE DES ARTICLES</h2>
    <div class="ligne x3col">
<?php
// CHARGER LE CODE PHP
require_once "php/model/Config.php";
require_once "php/model/Model.php";
require_once "php/controller/Controller.php";


// RECUPERER UN SEUL ARTICLE AVEC id FOURNIE EN PARAMETRE GET
$id = Controller::filtrer("id");

// ET CONSTRUIRE LE HTML POUR CHAQUE ARTICLE
$tabArticle = Model::chercher("article", "id", $id);        // TABLEAU ORDONNE DE TABLEAU ASSOCIATIF
foreach($tabArticle as $tabLigne)            // $tabLigne EST UN TABLEAU ASSOCIATIF
{
    // https://www.php.net/manual/fr/function.extract.php
    extract($tabLigne);
    // CREE AUTOMATIQUEMENT LES VARIABLES AVEC LES NOMS DES COLONNES
    echo 
<<<CODEHTML

    <article>
        <h3>$titre</h3>
        <img src="$photo" alt="$titre"> 
        <pre>$contenu</pre>
    </article>

CODEHTML;
}
?>
    </div>
</section>