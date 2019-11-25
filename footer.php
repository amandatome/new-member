</main>
<footer class='d-flex px-5'>
    <div class='col-lg-2 colmd-12'>
        <h2 class='footer-text'><?php the_field('footer_logo', 'option'); ?></h2>
    </div>
    <div class="col-xl-2 offset-xl-8 col-lg-3 offset-lg-8 col-md-12">
        <div class='social-icons mt-2'>
            <?php wp_nav_menu(array(
                'theme_location' => 'social',
                'container_class' => 'menu'
            )); ?>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>