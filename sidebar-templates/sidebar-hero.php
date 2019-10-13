<?php
/**
 * Sidebar - hero setup.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php if ( is_active_sidebar( 'hero' ) ) : ?>

	<!-- ******************* The Hero Widget Area ******************* -->

	<div id="carouselExampleControls" class="hero-slider carousel slide carousel-fade" data-ride="carousel">

		<div class="carousel-inner" role="listbox">

			<?php dynamic_sidebar( 'hero' ); ?>

		</div>



	</div><!-- .carousel -->

	<script>
	jQuery( ".carousel-item" ).first().addClass( "active" );
	</script>

<?php endif;
