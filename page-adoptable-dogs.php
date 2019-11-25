<?php /* Template Name: Adoptable Dogs */ ?>

<?php get_header(); ?>
<?php
function small_dog()
{
	$smalldog_query = new WP_Query(
		array(
			'post_type' => 'adoptable_dogs',
			'posts_per_page' => -1,
			'order' => 'ASC',
			'tax_query' => array(
				array(
					'taxonomy' => 'dogs', // what taxonomy are we querying by?
					'field' => 'slug', // what field is the query? (other options are the term_id or name)
					'terms'    => 'small', // what specific term are we querying by?
				)
			)
		)
	);
	
	if ($smalldog_query->have_posts()) { ?>
		<?php while ($smalldog_query->have_posts()) {
					$smalldog_query->the_post(); ?>
			<?php $dog_age = get_field('dog_age');
						$dog_weight = get_field('dog_weight');
						$dog_breed = get_field("dog_breed"); ?>
			<div class='col-lg-4 col-md-4 d-flex align-stretch'>
				<div class='card text-center'>
					<a href="<?php the_permalink(); ?>">
						<?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'rectangle', false, array('class' => 'dog-image')); ?>
					</a>
					<div class="card-body">
						<a href="<?php the_permalink(); ?>">
							<h3 class="card-title"><?php the_title(); ?></h3>
						</a>
						<p class='card-text'>Age: <?php echo $dog_age; ?></p>
						<p class='card-text'>Color: <?php echo $dog_breed; ?></p>
						<p class='card-text'><?php echo $dog_weight; ?></p>
					</div>
					<div class="card-footer">
						<a class='btn btn-primary btn-md' href="<?php the_permalink(); ?>">Read More About <?php the_title(); ?></a>
					</div>
				</div>
			</div>
		<?php }
				/* Restore original Post Data */
				wp_reset_postdata();
			} else { ?>
		<!-- no posts found -->
		<p>There are no cats 😿</p>
<?php }
}; ?>



<?php
function medium_dog()
{
	$mediumdog_query = new WP_Query(
		array(
			'post_type' => 'adoptable_dogs',
			'posts_per_page' => -1,
			'order' => 'ASC',
			'tax_query' => array(
				array(
					'taxonomy' => 'dogs', // what taxonomy are we querying by?
					'field' => 'slug', // what field is the query? (other options are the term_id or name)
					'terms'    => 'medium', // what specific term are we querying by?
				)
			)
		)
	);
	if ($mediumdog_query->have_posts()) { ?>
		<?php while ($mediumdog_query->have_posts()) {
					$mediumdog_query->the_post(); ?>
			<?php $dog_age = get_field('dog_age');
						$dog_weight = get_field('dog_weight');
						$dog_breed = get_field("dog_breed"); ?>
						<div class='col-lg-4 col-md-4 d-flex align-stretch'>
				<div class='card text-center'>
					<a href="<?php the_permalink(); ?>">
						<?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'rectangle', false, array('class' => 'dog-image')); ?>
					</a>
					<div class="card-body">
						<a href="<?php the_permalink(); ?>">
							<h3 class="card-title"><?php the_title(); ?></h3>
						</a>
						<p class='card-text'>Age: <?php echo $dog_age; ?></p>
						<p class='card-text'>Color: <?php echo $dog_breed; ?></p>
						<p class='card-text'><?php echo $dog_weight; ?></p>
					</div>
					<div class="card-footer">
						<a class='btn btn-primary btn-md' href="<?php the_permalink(); ?>">Read More About <?php the_title(); ?></a>
					</div>
				</div>
			</div>
		<?php }
				/* Restore original Post Data */
				wp_reset_postdata();
			} else { ?>
		<!-- no posts found -->
		<p>There are no cats 😿</p>
<?php }
}; ?>

<?php
function large_dog()
{
	$largedog_query = new WP_Query(
		array(
			'post_type' => 'adoptable_dogs',
			'posts_per_page' => -1,
			'order' => 'ASC',
			'tax_query' => array(
				array(
					'taxonomy' => 'dogs', // what taxonomy are we querying by?
					'field' => 'slug', // what field is the query? (other options are the term_id or name)
					'terms'    => 'large', // what specific term are we querying by?
				)
			)
		)
	);

	if ($largedog_query->have_posts()) { ?>
		<?php while ($largedog_query->have_posts()) {
					$largedog_query->the_post(); ?>
			<?php $dog_age = get_field('dog_age');
						$dog_weight = get_field('dog_weight');
						$dog_breed = get_field("dog_breed"); ?>
						<div class='col-lg-4 col-md-4 d-flex align-stretch'>
					<div class='card text-center'>
					<a href="<?php the_permalink(); ?>">
						<?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'rectangle', false, array('class' => 'dog-image')); ?>
					</a>
					<div class="card-body">
						<a href="<?php the_permalink(); ?>">
							<h3 class="card-title"><?php the_title(); ?></h3>
						</a>
						<p class='card-text'>Age: <?php echo $dog_age; ?></p>
						<p class='card-text'>Color: <?php echo $dog_breed; ?></p>
						<p class='card-text'><?php echo $dog_weight; ?></p>
					</div>
					<div class="card-footer">
						<a class='btn btn-primary btn-md' href="<?php the_permalink(); ?>">Read More About <?php the_title(); ?></a>
					</div>
				</div>
			</div>
		<?php }
				/* Restore original Post Data */
				wp_reset_postdata();
			} else { ?>
		<!-- no posts found -->
		<p>There are no cats 😿</p>
<?php }
}; ?>


<section class="adoptable-banner">
	<?php get_template_part( 'global-templates/jumbotron' ); ?>
</section>
<section class='adoptables'>
	<!--Small-->
    <section class='small'>
	<div class='container mb-5'>
	<h3>Small Dogs (0 - 25 LBS)</h3>
			<div class='row'>
		<?php small_dog(); ?>
		</div>
		</div>
	</section>
	<!--Medium-->
	
    <section class='medium'>
	<div class='container mb-5'>
	<h3>Medium Dogs (26 - 50 LBS)</h3>
			<div class='row'>
		<?php medium_dog(); ?>
		</div>
		</div>
	</section>
	<!--Large-->
    <section class='large'>
	<div class='container mb-5'>
	<h3>Large Dogs (56 - 150 LBS)</h3>

			<div class='row'>
		<?php large_dog(); ?>
		</div>
		</div>
    </section>
</section>

<?php get_footer(); ?>