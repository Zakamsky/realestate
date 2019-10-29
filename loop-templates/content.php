<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


?>
<div class="post_card col-md-6">
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
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
        <?php if ( 'post' == get_post_type() ) : ?>
            <div class="entry-meta d-flex justify-content-between">
                <span>
                    <?php understrap_posted_on(); ?>
                </span>
                <span>
                    <?php understrap_entry_footer(); ?>
                </span>

            </div><!-- .entry-meta -->
        <?php endif; ?>

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