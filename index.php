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
                <section class="property_homepage homepage_block">
                    <h2 class="h1 hompage_header">
                        <?php the_field( 'properties_title', 'option' ); ?>
                    </h2>

                    <?php echo do_shortcode('[property_overview featured=true template=frontpage]'); ?>

                    <!--<div class="wpp_view_all d-flex justify-content-center pt-3">
                        <?php /*echo sprintf(__('<a class="btn btn-secondary" href="%s">view all</a>', ud_get_wp_property()->domain), site_url() . '/' . $wp_properties['configuration']['base_slug']); */?>
                    </div>-->
                </section>
                <section class="about_homepage homepage_block">
                    <!-- forhomepage -->
                    <?php $forhomepage = get_page_by_path( 'forhomepage' );?>

                    <header class="entry_header about_homepage--header">
                        <div class="entry_header--block_img about_homepage--header_img"
                            style="
                            <?php if (has_post_thumbnail($forhomepage->ID)): ?>
                                    background-image: url('<?php echo get_the_post_thumbnail_url( $forhomepage->ID, 'full'); ?>');
                            <?php else: ?>
                                    background-image: url('<?php echo ARS_IMG_DIR; ?>/header-bg.jpg');
                            <?php endif; ?>
                                    ">
                        </div>
                        <div class="entry_header--block_title about_homepage--header_title">
                            <h2 class="h1 entry_header--title">
                                <?php echo $forhomepage->post_title;?>
                            </h2>
                        </div>

                    </header><!-- .entry-header -->
                    <div class="about_homepage--body">
                        <?php echo $forhomepage->post_content;?>
                    </div>


                </section>
                <section class="benefits_homepage homepage_block container">
                    <h2 class="h1 hompage_header">
                        <?php the_field( 'benefits_title', 'option' ); ?>
                    </h2>
                    <?php if( have_rows('preimushhestvo', 'option') ): ?>
                        <div class="row justify-content-center">

                            <?php $benef_i = 1; while( have_rows('preimushhestvo', 'option') ): the_row();
                                //  data-wow-delay="0.1s"
                                // vars
                                $image = get_sub_field('ikonka');
                                $title = get_sub_field('title');
                                $description = get_sub_field('description');

                                ?>
                                <div class="col benefit">
                                    <div class="benefit--card wow bounceInUp"
                                           <?php if (($benef_i % 2) == 0) { echo 'data-wow-delay="0.5s"' ;}; ?> >
                                        <i class="benefit--ico">
                                            <img class="benefit--ico_img" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
                                        </i>
                                        <h3 class="benefit--title"><?php echo $title; ?></h3>
                                        <p class="benefit--text">
                                            <?php echo $description; ?>
                                        </p>
                                    </div>
                                </div>

                            <?php $benef_i += 1; endwhile; ?>
                        </div>
                    <?php endif; ?>
                </section>
                <section class="newpost_homepage homepage_block">
                    <h2 class="h1 hompage_header">
                        <?php the_field( 'posts_title', 'option' ); ?>
                    </h2>
<!--                    --><?php //query_posts('showposts=5');?>
                    <?php if ( have_posts() ) : ?>

                        <?php /* Start the Loop */
                        $args = array( 'posts_per_page' => 5 );
                        $query = new WP_Query( $args );
                        ?>

                        <div class="row">
                            <?php $wp_it_num = 1; while ( $query->have_posts() ) : $query->the_post(); ?>

                                <?php
                                /*
                                 * Include the Post-Format-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */
                                get_template_part( 'loop-templates/content', 'homepage'/*get_post_format()*/ );
                                $wp_it_num += 1;
                                ?>

                            <?php endwhile; ?>
                        </div>
                    <?php else : ?>

                        <?php get_template_part( 'loop-templates/content', 'none' ); ?>

                    <?php endif; ?>
                </section>
			</main><!-- #main -->


			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #index-wrapper -->


<?php get_footer();
