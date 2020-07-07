
<section>
    <h2>CODE SPECIAL POUR LA SECTION GALERIE...</h2>
</section>

<section>
    <h2>ARTICLES DANS LA CATEGORIE vie sauvage</h2>
<?php
// BOUCLE MULTIPLE
// POUR RECUPERER SEULEMENT LES ARTICLES DANS LA CATEGORIE vie sauvage
// https://codex.wordpress.org/The_Loop#Multiple_Loops
?>

<?php $my_query = new WP_Query( 'category_name=vie-sauvage&posts_per_page=9' ); ?>

    <div class="row x3col">
<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
    <article>
        <div class="photo"><?php the_post_thumbnail() ?></div>
        <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
        <h3>pays d'origine: <?php echo post_custom('pays')?></h3>
        <h3>pays d'origine (ACF): <?php the_field('pays')?></h3>
        <div><?php the_content() ?></div>
    </article>
<?php endwhile; ?>
    </div>
</section>


<section>
    <h2>ARTICLES DANS LA CATEGORIE ferme</h2>
<?php
// BOUCLE MULTIPLE
// POUR RECUPERER SEULEMENT LES ARTICLES DANS LA CATEGORIE ferme
// https://codex.wordpress.org/The_Loop#Multiple_Loops
?>

<?php $my_query = new WP_Query( 'category_name=ferme&posts_per_page=9' ); ?>

    <div class="row x3col">
<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
    <article>
        <div class="photo"><?php the_post_thumbnail() ?></div>
        <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
        <h3>prix unitaire: <?php echo post_custom('prix') ?> euros</h3>
        <div><?php the_content() ?></div>
    </article>
<?php endwhile; ?>
    </div>
</section>


<section>
    <h2>ARTICLES DANS LA CATEGORIE domestique</h2>
<?php
// BOUCLE MULTIPLE
// POUR RECUPERER SEULEMENT LES ARTICLES DANS LA CATEGORIE ferme
// https://codex.wordpress.org/The_Loop#Multiple_Loops
?>

<?php $my_query = new WP_Query( 'category_name=domestique&posts_per_page=9' ); ?>

    <div class="row x3col">
<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
    <article>
        <div class="photo"><?php the_post_thumbnail() ?></div>
        <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
        <h3>taille: <?php echo post_custom('taille') ?> cm</h3>
        <h3>taille (ACF): <?php the_field('taille') ?> cm</h3>
        <div><?php the_content() ?></div>
    </article>
<?php endwhile; ?>
    </div>
</section>