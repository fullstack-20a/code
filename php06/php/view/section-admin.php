
        <section>
            <h2>FORMULAIRE DE CREATION D'ARTICLE</h2>
            <div class="ligne x2col">
                <div>
                    <form action="" method="POST">
                    <!-- ASTUCE: name REPREND LE NOM DE LA COLONNE SQL -->
                        <input type="text" name="titre" required placeholder="titre">
                        <input type="text" name="photo" required placeholder="photo">
                        <textarea name="description" cols="80" rows="5" required placeholder="description"></textarea>
                        <button type="submit">publier un article</button>
                        <pre>
                            <?php envoyerArticle() ?>
                        </pre>
                    </form>
                </div>
                <div class="media">
<?php
// AJOUTER GALERIE 
$tableauBillet = glob("assets/img/*.jpg");
echo creerGalerie($tableauBillet);
?>
                </div>
            </div>
        </section>

        <section>
            <h2>AFFICHAGE DE LA LISTE DES ARTICLES</h2>
            <div class="listeblog ligne x3col">
<?php

$tableauArticle = recupererArticles();

echo creerBlog($tableauArticle);

?>
        </div>
        </section>

