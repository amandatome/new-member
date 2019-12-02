<?php /* Template Name: FAQ */ ?>

<?php get_header(); ?>
<?php get_template_part( 'global-templates/jumbotron' ); ?>
<main class="site-main">
<section class='content-faq'>
    <div class="container ">
        <div class='row'>
            <div class='col-md-12'>
            <?php
            // check if the repeater field has rows
            if (have_rows('faq')) :
                // loop through the rows of data
                while (have_rows('faq')) : the_row();
                    // display a sub field value
                    $faq_title = get_sub_field('faq_title');
                    $faq_content = get_sub_field('faq_content'); ?>
                    <button class='accordion'>
                        <h3><?php echo $faq_title; ?></h3>
                    </button>
                    <div class='panel pb-5'>
                        <?php echo $faq_content; ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
            </div>
        </div>
    </div>

</section>
</main>
<?php get_footer(); ?>