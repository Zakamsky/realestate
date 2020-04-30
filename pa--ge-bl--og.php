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

                        <?php //$args = array( 'posts_per_page' => -1 );
                        //get the current page
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                        //pagination fixes prior to loop
                        $temp =  $query;
                        $query = null;

                        //custom loop using WP_Query
                        $query = new WP_Query( array(
                            'post_status' => 'publish',
                            'orderby' => 'date',
                            'order' => 'ASC'
                        ) );

                        //set our query's pagination to $paged
                        $query -> query('post_type=post&posts_per_page=2'.'&paged='.$paged);
//                        $args = array( 'posts_per_page' => 2 );
//                        $query = new WP_Query( $args );
                        if ( $query->have_posts() ) : ?>

                            <?php /* Start the Loop */

                                ?>
                            <div class="row">

                                <?php while ( $query->have_posts() ) : $query->the_post(); ?>

                                    <?php

                                    get_template_part( 'loop-templates/content', get_post_format() );

                                    ?>

                                <?php endwhile; ?>


                                <!-- The pagination component -->
<!--                                --><?php //understrap_pagination(); ?>
                            </div>

                            <!--                                --><?php
                            //pass in the max_num_pages, which is total pages ?>
<!--                            <div class="pagenav d-flex justify-content-between">-->
<!--                                <div class="btn btn-outline-primary">--><?php //previous_posts_link('Previous', $query->max_num_pages) ?><!--</div>-->
<!--                                <div class="btn btn-outline-primary">--><?php //next_posts_link('Next', $query->max_num_pages) ?><!--</div>-->
<!--                            </div>-->
                        <?php else : ?>

                            <?php get_template_part( 'loop-templates/content', 'none' ); ?>

                        <?php endif; ?>

                        <?php //reset the following that was set above prior to loop
                        $query = null; $query = $temp; ?>

                    </main><!-- #main -->

                    <!-- The pagination component aqui-->
                    <?php understrap_pagination(); ?>

                    <!-- Do the right sidebar check -->
                    <?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

                </div><!-- .row -->

            </div><!-- #content -->

        </div><!-- #page-wrapper -->
    </div><!-- .parallax -->

<?php get_footer();
