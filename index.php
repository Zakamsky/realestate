<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
global $wp_it_num;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php if ( is_front_page() && is_home() ) : ?>
	<?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>

<div class="wrapper main-content-wrapper index-wrapper" id="index-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">
            
			<!-- Do the left sidebar check and opens the primary div -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">
                <section class="property_homepage">

                    <?php echo do_shortcode('[property_overview featured=true template=frontpage]'); ?>

                    <!--<div class="wpp_view_all d-flex justify-content-center pt-3">
                        <?php /*echo sprintf(__('<a class="btn btn-secondary" href="%s">view all</a>', ud_get_wp_property()->domain), site_url() . '/' . $wp_properties['configuration']['base_slug']); */?>
                    </div>-->
                </section>
                <section class="about_homepage">
                    <!-- forhomepage -->
                    <?php $forhomepage = get_page_by_path( 'forhomepage' );?>

                    <header class="entry_header parallax__group">
                        <div class="entry_header--block_img parallax__layer parallax__layer--back">
                            <?php if (has_post_thumbnail($forhomepage->ID)): ?>
                                <?php echo get_the_post_thumbnail( $forhomepage->ID, 'full', array('class' => 'entry_header--img') ); ?>
                            <?php else: ?>
                                <img src="<?php echo ARS_IMG_DIR; ?>/header-bg.jpg " alt="header background" class="entry_header--img">
                            <?php endif; ?>
                        </div>
                        <div class="entry_header--block_title parallax__layer parallax__layer--base">
                            <h2 class="entry_header--title">
                                <?php echo $forhomepage->post_title;?>
                            </h2>
                        </div>

                    </header><!-- .entry-header -->
                    <?php echo $forhomepage->post_content;?>


                </section>
                <section class="benefits_homepage container">
                    <div class="row justify-content-center">
                        <div class="col benefit--col">
                            <div class="benefit text-center">
                                <i class="ico">
                                    <svg class="benefit--ico">
                                        <use xlink:href="#condition"></use>
                                    </svg>
                                    <h3 class="benefit--title">benefit title</h3>
                                    <p class="benefit--text">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum, sapiente?
                                    </p>
                                </i>
                            </div>

                        </div>
                        <div class="col benefit--col">
                            <div class="benefit text-center">
                                <i class="ico">
                                    <svg class="benefit--ico">
                                        <use xlink:href="#condition"></use>
                                    </svg>
                                    <h3 class="benefit--title">benefit title</h3>
                                    <p class="benefit--text">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum, sapiente?
                                    </p>
                                </i>
                            </div>

                        </div>
                        <div class="col benefit--col">
                            <div class="benefit text-center">
                                <i class="ico">
                                    <svg class="benefit--ico">
                                        <use xlink:href="#condition"></use>
                                    </svg>
                                    <h3 class="benefit--title">benefit title</h3>
                                    <p class="benefit--text">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum, sapiente?
                                    </p>
                                </i>
                            </div>

                        </div>
                    </div>
                </section>
                <section class="newpost_homepage">
                    <?php query_posts('showposts=3');?>
                    <?php if ( have_posts() ) : ?>

                        <?php /* Start the Loop */  ?>
                        <?php query_posts('showposts=5'); ?>
                        <div class="row">
                            <?php $wp_it_num = 1; while ( have_posts() ) : the_post(); ?>

                                <?php

                                /*
                                 * Include the Post-Format-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */
                                get_template_part( 'loop-templates/content', get_post_format() );
                                $wp_it_num += 1;
                                ?>

                            <?php endwhile; ?>
                        </div>
                    <?php else : ?>

                        <?php get_template_part( 'loop-templates/content', 'none' ); ?>

                    <?php endif; ?>
                </section>
			</main><!-- #main -->

			<!-- The pagination component -->
<!--			--><?php //understrap_pagination(); ?>

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #index-wrapper -->

<?php get_footer();
