<?php /* Template Name: Home */ ?>

<?php get_header(); ?>

<div class="jumbotron jumbotron-fluid text-center">
  <div class="container">
    <h1 class='mb-5'><?php the_title(); ?></h1>
    <?php if (have_rows('hero_buttons')) :
      while (have_rows('hero_buttons')) : the_row();
        $button_cta = get_sub_field('hero_cta'); ?>
        <a class='btn btn-primary btn-lg' role='button' href="<?php echo $button_cta['url'] ?>" target="<?php echo $button_cta['target'] ?>"><?php echo $button_cta['title'] ?></a>
        <p><?php the_content(); ?></p>
    <?php
      endwhile;
    endif; ?>
    <div>
      <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'rectangle'); ?>
    </div>
  </div>
</div>
<!--.Jumbotron-->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <section class='dog'>
      <div class='container pt-3 pb-5'>
        <h2 class='text-center mb-5'>Featured Dog<i class="fas fa-paw"></i></h2>
        <div class='row'>
          <?php
              $posts = get_field('featured_dog'); ?>
          <?php
              if ($posts) : ?>
            <?php foreach ($posts as $post) : ?>
              <?php setup_postdata($post); ?>
              <div class='col-lg-8 offset-lg-2 col-md-8 offset-md-2'>
                <div class='card text-center'>
                  <div class='row no-gutters'>
                    <div class='col-md-5'>
                      <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'large'); ?>
                    </div>
                    <div class='col-md-7'>
                      <div class='card-body'>
                        <a href="<?php the_permalink(); ?>">
                          <h3 class='card-title'><?php the_title() ?></h3>
                        </a>
                        <p><span class="pet-color">Age: </span> <?php the_field('dog_age'); ?></p>
                        <p><span class="pet-color">Breed: </span><?php the_field('dog_breed'); ?></p>
                        <p><?php the_field('dog_weight'); ?></p>
                        <a class='btn btn-primary btn-md' href="<?php the_permalink(); ?>">Read More About <?php the_title(); ?></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
        </div>
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>
      </div>
    </section>
    <!--.Dog-->

    <section class='cat'>
      <div class='container pt-3 pb-5'>
        <h2 class='text-center mb-5'>Featured Cat<i class="fas fa-paw"></i></h2>
        <div class='row'>
          <?php
              $posts = get_field('featured_cat'); ?>
          <?php
              if ($posts) : ?>
            <?php foreach ($posts as $post) : ?>
              <?php setup_postdata($post); ?>
              <?php $cat_age = get_field('cat_age');  ?>
              <?php $cat_color = get_field('cat_color'); ?>
              <div class='col-lg-8 offset-lg-2 col-md-8 offset-md-2'>
                <div class='card text-center'>
                  <div class='row no-gutters'>
                    <div class='col-md-5'>
                      <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'large'); ?>
                    </div>
                    <div class='col-md-7'>
                      <div class='card-body'>
                        <a href="<?php the_permalink(); ?>">
                          <h3 class='card-title'><?php the_title() ?></h3>
                        </a>
                        <?php if ($cat_age) { ?>
                          <p><span class="pet-color">Age: </span> <?php echo $cat_age; ?></p>
                        <?php } ?>
                        <?php if ($cat_age) { ?>
                          <p><span class="pet-color">Color: </span> <?php echo $cat_color; ?></p>
                        <?php } ?>
                        <p><?php the_field('cat_weight'); ?></p>
                        <a class='btn btn-primary btn-md' href="<?php the_permalink(); ?>">Read More About <?php the_title(); ?></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
        </div>
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>
      </div>
    </section>
    <!--.Cat-->

    <!-- FEATURED STORIES -->
    <section class="featured-stories">
      <div class='container pt-5 pb-5'>
        <div class='row '>
          <?php $args = array(
                'posts_per_page'   => 1,
                'offset'           => 0,
                'category'         => 'Stories',
                'category_name'    => '',
                'orderby'          => 'date',
                'order'            => 'DESC',
                'post_type'        => 'post',
                'post_status'      => 'publish',
                'suppress_filters' => true
              );

              $myposts = get_posts($args);

              foreach ($myposts as $post) : setup_postdata($post); ?>
            <div class="col-lg-6 col-md-12">
              <h4>This Week's Adoption Story</h4>
              <h3><a id="story-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <?php the_excerpt(); ?>
            </div>
            <div class="col-lg-6 col-md-12" id="story-image">
              <?php the_post_thumbnail("rectangle"); ?>
            </div>

          <?php
              endforeach;
              wp_reset_postdata();
              ?>
        </div>
      </div>
    </section>
    <!--.Featured Story-->

  <?php endwhile; ?> <?php endif; ?>

<?php get_footer(); ?>