
        <section>

<?php while ( have_posts() ) : the_post(); ?>
    <article>
        <h2><?php the_title() ?></h2>
        <div><?php the_content() ?></div>
    </article>
<?php endwhile; ?>

<?php
/*
// LA BOUCLE / THE LOOP
while ( have_posts() ) : the_post();

    echo "<article>";
    echo "<h2>";
    the_title();
    echo "</h2>";

    echo "<div>";
    the_content();
    echo "</div>";
    echo "</article>";

endwhile;


while ( have_posts() ) 
{
    the_post();

    echo "<h2>";
    the_title();
    echo "</h2>";

    echo "<div>";
    the_content();
    echo "</div>";
}
*/

?>
        </section>

        <section>
            <h2>LEOPARD</h2>
            <img src="<?php echo get_template_directory_uri() ?>/assets/img/leopard.jpg" alt="photo">
        </section>
