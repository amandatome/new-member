<?php /* Template Name: Adopt */ ?>

<?php get_header();  ?>
<?php get_template_part('global-templates/jumbotron'); ?>


<section class='adopt-application'>
  <div class='container'>
    <div class='row'>
      <div class='col-md-8 offset-md-2'>
        <!--Contact Form-->
        <?php if (have_posts()) while (have_posts()) : the_post(); ?>
          <?php the_content(); ?>
        <?php endwhile; // end the loop
        ?>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>