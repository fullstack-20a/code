
<!-- BOUCLE PRIMAIRE -->
<section>
    <h2>SECTION ACCUEIL</h2>
    <div class="row">
<?php while ( have_posts() ) : the_post(); ?>
        <article>
            <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
            <div><?php the_content() ?></div>
            <div><?php the_post_thumbnail() ?></div>
        </article>
<?php endwhile; ?>
    </div>

</section>


<!-- BOUCLES MULTIPLES -->
<section>
    <h2>AFFICHAGE DES SAFARIS</h2>
<?php
// BOUCLE MULTIPLE
// POUR RECUPERER SEULEMENT LES ARTICLES DANS LA CATEGORIE ferme
// https://codex.wordpress.org/The_Loop#Multiple_Loops

// POUR CHOISIR LE CUSTOM POST TYPE
//  IL FAUT UTILISER LE SLUG DU CUSTOM POST TYPE

?>

<?php $my_query = new WP_Query( 'post_type=safari&posts_per_page=9' ); ?>

    <div class="row x3col">
<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
    <article>
<?php

// si il y a une video, on affiche la video
// sinon on affiche l'image mise en avant
$video = get_field('video');

?>
        <?php if ($video) :?>
            <video autoplay="true" controls muted loop>
                <source src="<?php the_field('video') ?>" type="video/mp4">
                Sorry, your browser doesn't support embedded videos.
            </video>
        <?php else :?>
            <div class="photo"><?php the_post_thumbnail() ?></div>
        <?php endif; ?>

        <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
        <h2><a href="<?php the_field('url_cible') ?>"><?php the_title() ?></a></h2>

        <div><?php the_content() ?></div>
    </article>
<?php endwhile; ?>
    </div>
</section>