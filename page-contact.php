<?php /* Template Name: Contact */ ?>

<?php get_header();  ?>
<?php get_template_part('global-templates/jumbotron'); ?>
<section class='contact'>
  <div class="container">
    <div class='row'>
      <?php if (have_posts()) while (have_posts()) : the_post(); ?>
      <div class='col-md-8 offset-md-2 col-xs-12'>
        <?php the_content(); ?>
      </div>
    </div>
    <div class='row'>
      <div class='col-md-8 offset-md-2'>
        <h3 class='text-center'><?php the_field('address'); ?></h3>
        <!--Map-->
        <?php the_field('map'); ?>
      </div>
    </div>

  <?php endwhile; // end the loop
  ?>
  </div>
</section>

<?php get_footer(); ?>