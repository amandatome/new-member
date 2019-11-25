<?php get_header(); ?>
<!-- Get term -->
<?php
$cats = get_the_terms($post, 'cats');
foreach ($cats as $cat) {
  $cat->name;
}; ?>
<section class="single-page-adoptables pt-5">
  <div class='container'>
    <h1 id='single'><?php echo $cat->name; ?> cats</h1>
    <?php if (have_posts()) while (have_posts()) : the_post(); ?>
      <!-- Variables -->
      <?php $cat_age = get_field('cat_age');
        $cat_weight = get_field('cat_weight');
        $cat_color = get_field("cat_color");
        $cat_adopt = get_field('cat_adopt_buttons'); ?>
      <div class='row pb-4'>
        <div class='col-lg-10 offset-lg-1 col-md-8'>
          <div class='card text-center'>
            <div class='row no-gutters'>
              <div class='col-md-6'>
                <a href="<?php the_permalink(); ?>">
                  <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'rectangle-medium'); ?></a>
              </div>
              <div class='col-md-6'>
                <div class='card-body'>
                  <a href="<?php the_permalink(); ?>">
                    <h3 class='card-title'><?php the_title() ?></h3>
                  </a>
                  <p><span class="pet-color">Age:</span><?php the_field('cat_age'); ?></p>
                  <p><span class="pet-color">Color:</span><?php the_field('cat_color'); ?></p>
                  <p><?php the_field('cat_weight'); ?></p>
                  <a class='btn btn-primary btn-md' href="<?php echo $cat_adopt['url'] ?>" target="<?php echo $cat_adopt['target'] ?>"><?php echo $cat_adopt['title'] ?></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class='row pb-5 mt-5'>
        <div class='col-md-12'>
          <div class='card p-5'>
            <h3 class='card-title'>About <?php the_title() ?></h3>
            <?php the_content(); ?>
            <a class='btn btn-primary btn-md' href="<?php echo $cat_adopt['url'] ?>" target="<?php echo $cat_adopt['target'] ?>"><?php echo $cat_adopt['title'] ?></a>
          </div>
        </div>
      </div>
</section>
<?php endwhile; ?>


<!-- Related Cats -->
<!-- //get the taxonomy terms of custom post type -->
<?php $customTaxonomyTerms = wp_get_object_terms($post->ID, 'cats', array('fields' => 'ids'));

//query arguments
$args = array(
  'post_type' => 'adoptable_cats',
  'post_status' => 'publish',
  'orderby' => 'rand',
  'tax_query' => array(
    array(
      'taxonomy' => 'cats',
      'field' => 'id',
      'terms' => $customTaxonomyTerms
    )
  ),
  'post__not_in' => array($post->ID),
);
?>


<section class='related'>
  <div class='container'>
    <h2 class='text-center'>Other <?php echo $cat->name; ?> cats</h2>
    <div class='row pb-5 d-flex justify-content-center'>
      <?php
      //the query
      $relatedPosts = new WP_Query($args);
      //loop through query
      if ($relatedPosts->have_posts()) {
        while ($relatedPosts->have_posts()) {
          $relatedPosts->the_post();
          ?>
          <div class='col-md-4'>
            <div class="card text-center">
              <a href="<?php the_permalink(); ?>">
                <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'rectangle', false, array('class' => 'cat-image')); ?></a>
              <div class="card-body">
                <a href="<?php the_permalink(); ?>">
                  <h3 class='card-title'><?php the_title() ?></h3>
                </a>
                <?php if ($cat_age) : ?>
                  <p class='card-text'><?php echo $cat_age; ?></p>
                <?php endif; ?>
                <?php if ($cat_weight) : ?>
                  <p class='card-text'><?php echo $cat_weight; ?></p>
                <?php endif; ?>
                <?php if ($cat_color) : ?>
                  <p class='card-text'><?php echo $cat_color; ?></p>
                <?php endif; ?>
              </div>
              <div class="card-footer text-muted">
                <a class='btn btn-primary btn-md' href="<?php the_permalink(); ?>">Read More About <?php the_title(); ?></a>
              </div>
            </div>
          </div>

      <?php
        }
      } else {
        //no posts found
      }
      //restore original post data
      wp_reset_postdata();
      ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>