<?php
// todo: IF NEEDED
?>
<?php if( have_rows('reviews') ): ?>

<section class="reviews homepage_block<?php if ( !is_front_page()) echo " col-12"; ?>">
	<h2 class="h1 hompage_header">
		<?php  the_field( 'reviews_title' ); ?>
	</h2>



		<ul class="reviews__list reviews__list_slider-js">

			<?php while( have_rows('reviews') ): the_row();

				// vars
				$review_title = get_sub_field('review_title');
				$review_text = get_sub_field('review_text');
				$review_image = get_sub_field('review_image');

				?>

				<li class="reviews__item">
					<div class="reviews__blockquote">
						<p class="reviews__text">
							<?php echo $review_text; ?>
						</p>
					</div>
					<div class="reviews__author">
						<p class="reviews__author-name">
							<?php echo $review_title; ?>
						</p>
						<?php if( $review_image ): ?>
							<img class="reviews__thumbnails" src="<?php echo $review_image['url']; ?>" alt="<?php echo $review_image['alt'] ?>" />
						<?php else: ?>
							<img class="reviews__thumbnails" src="<?php echo ARS_IMG_DIR; ?>/user.png" alt="review's author photo" >
						<?php endif; ?>
					</div>
				</li>

			<?php endwhile; ?>

		</ul>

</section> <!-- .property_homepage -->

<?php endif; ?>
