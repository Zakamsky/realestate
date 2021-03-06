<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
global $wp_it_num;

?>
<div class="post_card wow <?php if($wp_it_num > 2){echo 'col-md-6 col-lg-4 bounceIn';}elseif($wp_it_num === 1){echo 'col-md-6 bounceInLeft';}elseif($wp_it_num === 2){echo 'col-md-6 bounceInRight';}; ?>" data-wow-delay="0.1<?php echo $wp_it_num; ?>s">
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>" >
<!--    content.php      -->
    <a class="post_card--link" href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark"> <!--esc_url( get_permalink() ) )-->

        <header class="entry_header">

            <?php if (has_post_thumbnail($post->ID)): ?>
                <?php echo get_the_post_thumbnail( $post->ID, 'large', array('class' => 'entry_header--bg_img') ); ?>
            <?php else: ?>
                <img src="<?php echo ARS_IMG_DIR; ?>/post-card-bg.jpg " alt="header background" class="entry_header--bg_img">
            <?php endif; ?>

            <?php the_title( '<h2 class="entry_header--title text-decoration-none">', '</h2>' ); ?>

	    </header><!-- .entry-header -->
    </a>

        <div class="entry-content">

                <?php the_excerpt(); ?>

            <?php
            wp_link_pages(
                array(
                    'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
                    'after'  => '</div>',
                )
            );
            ?>

        </div><!-- .entry-content -->

</article><!-- #post-## -->
</div>
