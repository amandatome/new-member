<?php /* Template Name: Adoptable Cats */ ?>

<?php get_header(); ?>

<?php
function small_cat()
{
	$smallcat_query = new WP_Query(
		array(
			'post_type' => 'adoptable_cats',
			'posts_per_page' => -1,
			'order' => 'ASC',
			'tax_query' => array(
				array(
					'taxonomy' => 'cats', // what taxonomy are we querying by?
					'field' => 'slug', // what field is the query? (other options are the term_id or name)
					'terms'    => 'small', // what specific term are we querying by?
				)
			)
		)
	);

	if ($smallcat_query->have_posts()) { ?>
		<?php while ($smallcat_query->have_posts()) {
					$smallcat_query->the_post(); ?>
			<?php $cat_age = get_field('cat_age');
						$cat_weight = get_field('cat_weight');
						$cat_color = get_field("cat_color"); ?>
			<div class='col-lg-4 col-md-4 d-flex align-stretch'>
				<div class='card text-center'>
					<a href="<?php the_permalink(); ?>">
						<?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'rectangle', false, array('class' => 'cat-image')); ?>
					</a>
					<div class="card-body">
						<a href="<?php the_permalink(); ?>">
							<h3 class="card-title"><?php the_title(); ?></h3>
						</a>
						<p class='card-text'>Age: <?php echo $cat_age; ?></p>
						<p class='card-text'>Color: <?php echo $cat_color; ?></p>
						<p class='card-text'><?php echo $cat_weight; ?></p>
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
		no posts found
		<p>There are no cats 😿</p>
<?php }
}; ?>

<?php
function medium_cat()
{
	$mediumcat_query = new WP_Query(
		array(
			'post_type' => 'adoptable_cats',
			'posts_per_page' => -1,
			'order' => 'ASC',
			'tax_query' => array(
				array(
					'taxonomy' => 'cats', // what taxonomy are we querying by?
					'field' => 'slug', // what field is the query? (other options are the term_id or name)
					'terms'    => 'medium', // what specific term are we querying by?
				)
			)
		)
	);
	if ($mediumcat_query->have_posts()) { ?>
		<?php while ($mediumcat_query->have_posts()) {
					$mediumcat_query->the_post(); ?>
			<?php $cat_age = get_field('cat_age');
						$cat_weight = get_field('cat_weight');
						$cat_color = get_field("cat_color"); ?>
			<div class='col-lg-4 col-md-4 d-flex align-stretch'>
				<div class='card text-center'>
					<a href="<?php the_permalink(); ?>">
						<?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'rectangle', false, array('class' => 'cat-image')); ?>
					</a>
					<div class="card-body">
						<a href="<?php the_permalink(); ?>">
							<h3 class="card-title"><?php the_title(); ?></h3>
						</a>

						<p class='card-text'>Age: <?php echo $cat_age; ?></p>
						<p class='card-text'>Color: <?php echo $cat_color; ?></p>
						<p class='card-text'><?php echo $cat_weight; ?></p>
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
function large_cat()
{
	$largecat_query = new WP_Query(
		array(
			'post_type' => 'adoptable_cats',
			'posts_per_page' => -1,
			'order' => 'ASC',
			'tax_query' => array(
				array(
					'taxonomy' => 'cats', // what taxonomy are we querying by?
					'field' => 'slug', // what field is the query? (other options are the term_id or name)
					'terms'  => 'large', // what specific term are we querying by?
				)
			)
		)
	);

	if ($largecat_query->have_posts()) { ?>
		<?php while ($largecat_query->have_posts()) {
					$largecat_query->the_post(); ?>
			<?php $cat_age = get_field('cat_age');
						$cat_weight = get_field('cat_weight');
						$cat_color = get_field("cat_color"); ?>
			<div class='col-lg-4 col-md-4 d-flex align-stretch'>
				<div class='card text-center'>
					<a href="<?php the_permalink(); ?>">
						<?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'rectangle', false, array('class' => 'cat-image')); ?>
					</a>
					<div class="card-body">
						<a href="<?php the_permalink(); ?>">
							<h3 class="card-title"><?php the_title(); ?></h3>
						</a>
						<?php if ($cat_age) { ?>
							<p><span class="pet-color">Age: </span> <?php echo $cat_age; ?></p>
						<?php } ?>
						<?php if ($cat_age) { ?>
							<p><span class="pet-color">Color: </span> <?php echo $cat_color; ?></p>
						<?php } ?>
						<p class='card-text'><?php echo $cat_weight; ?></p>
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
	<?php get_template_part('global-templates/jumbotron'); ?>
</section>

<section class='adoptables'>
	
	<section class='small'>
		<div class='container mb-5'>
		<h3>Small Cats (0 - 8 LBS)</h3>
			<div class='row'>
				<?php small_cat(); ?>
			</div>
		</div>
	</section>
	<section class='medium'>
		<div class='container mb-5'>
		<h3>Medium Cats (9 - 15 LBS)</h3>
			<div class='row'>
				<?php medium_cat(); ?>
			</div>
		</div>
	</section>
	<section class='large'>
		<div class='container mb-5'>
		<h3>Large Cats (16 - 20 LBS)</h3>
			<div class='row'>
				<?php large_cat(); ?>
			</div>
		</div>
	</section>
</section>

<?php get_footer(); ?>