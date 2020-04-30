<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

    <div class="parallax">
        <div class="wrapper main-content-wrapper " id="page-wrapper">

            <header class="entry_header parallax__group">
                <?php $blogpage = get_page_by_path( 'blog' );?>
                <div class="entry_header--block_img parallax__layer parallax__layer--back">
                    <?php if (has_post_thumbnail($blogpage->ID)): ?>
                        <?php echo get_the_post_thumbnail( $blogpage->ID, 'full', array('class' => 'entry_header--img') ); ?>
                    <?php else: ?>
                        <img src="<?php echo ARS_IMG_DIR; ?>/header-bg.jpg " alt="header background" class="entry_header--img">
                    <?php endif; ?>
                </div>
                <div class="entry_header--block_title parallax__layer parallax__layer--base">
                    <h1 class="entry_header--title">
                        <?php echo $blogpage->post_title;?>
                    </h1>
                </div>
                <!--<div class="blog--body">
                    <?php /*echo $blogpage->post_content;*/?>
                </div>-->

            </header><!-- .entry-header -->

            <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

                <div class="row">

                    <!-- Do the left sidebar check -->
                    <?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

                    <main class="site-main" id="main">

                        <?php if ( have_posts() ) : ?>

                            <div class="row">
                            <?php /* Start the Loop */ ?>

                                <?php while ( have_posts() ) : the_post(); ?>

                                    <?php
                                    /*
                                     * Include the Post-Format-specific template for the content.
                                     * If you want to override this in a child theme, then include a file
                                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                     */
                                    get_template_part( 'loop-templates/content', get_post_format() );
                                    ?>

                                <?php endwhile; ?>
                            </div>

                            <!-- The pagination component -->
                            <?php understrap_pagination(); ?>

                        <?php else : ?>

                            <?php get_template_part( 'loop-templates/content', 'none' ); ?>

                        <?php endif; ?>

                    </main><!-- #main -->

                    <!-- Do the right sidebar check -->
                    <?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

                </div><!-- .row -->

            </div><!-- #content -->

        </div><!-- #page-wrapper -->
    </div><!-- .parallax -->

<?php get_footer();
