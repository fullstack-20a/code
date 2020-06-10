
<!--
<section>
    <h2>LISTE DES ARTICLES (HTML)</h2>
    <div class="listeblog">
        <article>
            <h2>TITRE ARTICLE 1</h2>
            <img src="assets/img/photo0.jpg" alt="photo">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla est modi quaerat nihil itaque culpa. Cumque, nemo non. Quam et aperiam similique eius rerum aliquid, laboriosam veniam animi odio molestias!</p>
        </article>
        <article>
            <h2>TITRE ARTICLE 2</h2>
            <img src="assets/img/photo1.jpg" alt="photo">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla est modi quaerat nihil itaque culpa. Cumque, nemo non. Quam et aperiam similique eius rerum aliquid, laboriosam veniam animi odio molestias!</p>
        </article>
        <article>
            <h2>TITRE ARTICLE 3</h2>
            <img src="assets/img/photo2.jpg" alt="photo">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla est modi quaerat nihil itaque culpa. Cumque, nemo non. Quam et aperiam similique eius rerum aliquid, laboriosam veniam animi odio molestias!</p>
        </article>
    </div>
</section>
-->

<section>
    <h2>FORMULAIRE INTERMEDIAIRE EN GET</h2>
    <pre>
        UN FORMULAIRE PERMET DE TRANSMETTRE DES INFOS 
        D'UNE PAGE SOURCE VERS UNE PAGE CIBLE        
    </pre>
    <form action="article.php" method="GET">
        <input type="text" name="id" required placeholder="id">
        <button type="submit">aller sur la page de l'article</button>
    </form>
</section>

<section>
    <h2>NOMBRE D'ARTICLES</h2>
<?php

// ON OBTIENDRA LE RESULTAT DANS UN TABLE SQL
// AVEC UNE SEULE LIGNE ET UNE SEULE COLONNE
$requeteSQL     = "SELECT count(*) FROM article";
$tabAssoToken   = [];
$pdoStatement   = envoyerRequeteSQL($requeteSQL, $tabAssoToken);
// ASTUCE: ON RECUPERE DIRECTEMENT LA VALEUR DANS LA PREMIERE CASE
// https://www.php.net/manual/fr/pdostatement.fetchcolumn.php
$nbArticle      = $pdoStatement->fetchColumn();

echo "<h3>IL Y A $nbArticle ARTICLES</h3>";

?>
</section>

<script>
// ICI ON CODE DU JS... MELANGE AVEC DU PHP...
var nbArticle = <?php echo $nbArticle ?>;    
</script>

<section>
    <h2>LISTE DES ARTICLES (PHP)</h2>
    <div class="ligne listeblog x3col">
<?php

$tableauArticle = recupererArticles();

echo creerBlog($tableauArticle);

?>
    </div>
</section>
