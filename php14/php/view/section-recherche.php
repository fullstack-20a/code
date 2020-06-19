
<section>
    <h2>RESULTATS DE LA RECHERCHE</h2>
<?php

//             <input type="text" name="recherche" required placeholder="entrez un mot">
$recherche = Controller::filtrerTexte("recherche");
// Fatal error: Uncaught Error: Class 'Controller' not found

$tabResultat = Model::rechercherLike($recherche);
$nbResultat = count($tabResultat);

?>

    <h3><?php echo "$nbResultat trouvés sur le mot $recherche" ?></h3>

    <div class="ligne x3col">
<?php        
foreach($tabResultat as $tabLigne)            // $tabLigne EST UN TABLEAU ASSOCIATIF
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