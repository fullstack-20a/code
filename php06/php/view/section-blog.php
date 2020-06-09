
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
    <h2>LISTE DES ARTICLES (PHP)</h2>
    <div class="ligne listeblog x3col">
<?php

$tableauArticle = recupererArticles();

echo creerBlog($tableauArticle);

?>
    </div>
</section>
