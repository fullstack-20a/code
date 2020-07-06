
    </main>
    <footer>
        <nav>
            <?php wp_nav_menu([ 'theme_location' => 'secondary']) ?>
        </nav>
        <p>tous droits réservés</p>
    </footer>

    <!-- wp_footer DEBUT -->
    <?php wp_footer() ?>
    <!-- wp_footer FIN -->

    <script src="<?php echo get_template_directory_uri() ?>/assets/js/main.js"></script>

    </body>
</html>
