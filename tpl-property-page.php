<?php
/*tpl-property-page.php
Template Name: Страница Недвижимости
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="parallax">
<div class="wrapper main-content-wrapper " id="page-wrapper">

    <header class="entry_header parallax__group">
        <div class="entry_header--block_img parallax__layer parallax__layer--back">
            <?php if (has_post_thumbnail()): ?>
                <?php echo get_the_post_thumbnail( $post->ID, 'full', array('class' => 'entry_header--img') ); ?>
            <?php else: ?>
                <img src="<?php echo ARS_IMG_DIR; ?>/header-bg.jpg " alt="header background" class="entry_header--img">
            <?php endif; ?>
        </div>
        <div class="entry_header--block_title parallax__layer parallax__layer--base">
            <?php the_title( '<h1 class="entry_header--title">', '</h1>' ); ?>
        </div>

    </header><!-- .entry-header -->

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

                <div class="custom-widget wpp_shortcode_search">
                    <?php
                    if ( function_exists('dynamic_sidebar') )
                        dynamic_sidebar('property-sidebar');
                    ?>
                </div>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'loop-templates/content', 'page' ); ?>

<!--					--><?php
//					// If comments are open or we have at least one comment, load up the comment template.
//					if ( comments_open() || get_comments_number() ) :
//						comments_template();
//					endif;
//					?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->
</div><!-- .parallax -->

<?php get_footer();
