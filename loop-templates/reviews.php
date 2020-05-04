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

				?>

				<li class="reviews__item">
					<div class="reviews__item-wrapper">
						<p class="reviews__item-title">
							<?php echo $review_title; ?>
						</p>
						<p class="reviews__item-text">
							<?php echo $review_text; ?>
						</p>
					</div>
				</li>

			<?php endwhile; ?>

		</ul>

</section> <!-- .property_homepage -->

<?php endif; ?>
