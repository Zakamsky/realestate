<?php
/**
 * Property Default Template for Single Property View
 *
 * Overwrite by creating your own in the theme directory called either:
 * property.php
 * or add the property type to the end to customize further, example:
 * property-building.php or property-floorplan.php, etc.
 *
 * By default the system will look for file with property type suffix first,
 * if none found, will default to: property.php
 *
 * Copyright 2010 Andy Potanin <andy.potanin@twincitiestech.com>
 *
 * @version 1.3
 * @author Andy Potanin <andy.potnain@twincitiestech.com>
 * @package WP-Property
*/
// Uncomment to disable fancybox script being loaded on this page

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="parallax">
<?php the_post(); ?>
<div id="container" class="wrapper main-content-wrapper <?php wpp_css('property::container', array((!empty($post->property_type) ? $post->property_type . "_container" : ""))); ?>">

    <header class="entry_header parallax__group">
        <div class="entry_header--block_img parallax__layer parallax__layer--back">
            <?php if ( !empty($post->featured_image_url)): ?>
                <img src="<?php echo $post->featured_image_url; ?>" alt="<?php echo $post->featured_image_title; ?>" class="entry_header--img">
            <?php else: ?>
                <img src="<?php echo ARS_IMG_DIR; ?>/header-property-bg.png " alt="header background" class="entry_header--img">
            <?php endif; ?>
        </div>
        <div class="entry_header--block_title parallax__layer parallax__layer--base">
            <?php the_title( '<h1 class="entry_header--title single_property--title">', '</h1>' ); ?>
        </div>

    </header><!-- .entry-header -->

    <?php //the_tagline(); ?>


    <!--        todo: этот код в файле на рабочем столе =>  --><?php //print_r($wp_properties['property_stats']['referencia']); ?>


    <div id="content" class="<?php echo esc_attr( $container ); ?>" tabindex="-1" role="main">
        <div class="row">
            <main class="col single_property site-main" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


                <div class="<?php wpp_css('property::entry_content', "entry-content"); ?>">
                  <h4 class="single_property--ref_line">
                      <?php echo $wp_properties['property_stats']['referencia']; ?>:&nbsp;<?php echo $post->referencia; ?> | <?php echo $post->property_type_label; ?> | <?php echo $post->operation; ?> | <?php echo $post->town; ?> | <?php echo $post->region; ?>
                  </h4>
                  <h3 class="single_property--price">
                      <?php echo $wp_properties['property_stats']['price']; ?>:&nbsp;<?php echo $post->price; ?>
                  </h3>
                <div class="<?php wpp_css('property::the_content', "wpp_the_content single_property--content"); ?>">
                    <?php @the_content(); ?>
                </div>
                <div class="single_property--icons-block property__card-icons">
                    <div class="property__card-icons_item">
                        <i class="ico icons-ico area">
                            <svg class="icons-ico_svg" >
                              <use xlink:href="#blueprint"></use>
                            </svg>
                        </i>
                        <?php echo $post->area; ?>
                    </div>
                    <div class="property__card-icons_item">
                        <i class="ico icons-ico bedroom">
                          <svg class="icons-ico_svg" >
                              <use xlink:href="#bedroom"></use>
                          </svg>
                        </i>
                        <?php echo $post->bedroom; ?>
                    </div>
                    <div class="property__card-icons_item">
                      <i class="ico icons-ico bathroom">
                          <svg class="icons-ico_svg" >
                              <use xlink:href="#bathroom"></use>
                          </svg>
                      </i>
                      <?php echo $post->bathroom; ?>
                    </div>
                    <div class="property__card-icons_item">
                      <i class="ico icons-ico condition">
                          <svg class="icons-ico_svg" >
                              <use xlink:href="#condition"></use>
                          </svg>
                      </i>
                      <?php echo $post->condition; ?>
                    </div>
                </div>

                <div class="single_property--additional_info">
                    <?php @draw_stats("display=plain_list&sort_by_groups=true&include=orientation,to_airport,to_sea,view"); ?>
                </div>
                <div class="single_property--stats_block">
                    <?php @draw_stats("sort_by_groups=true&exclude=operation,price,bedroom,bathroom,condition,area,tagline,referencia,town,region,orientation,to_airport,to_sea,view"); ?>
                </div>

                <?php //additional group: orientation,to_airport,to_sea,view?>

                  <div class="single_property--gallery prop_gallery">
                      <?php if ( !empty($post->gallery)): ?>
                          <?php foreach ($post->gallery as $slide) : ?>
                              <a class="prop_gallery--link" href="<?php echo $slide['large']; ?>" data-fancybox="prop-gallery" data-loop="true">
                                <img class="prop_gallery--img" src="<?php echo $slide['medium']/*$slide['large']*/; ?>" alt="<?php echo $slide['post_title']; ?>">
                              </a>
                          <?php endforeach; /** end of the propertyloop. */ ?>
                      <?php endif; ?>
                  </div>


              </div><!-- .entry-content -->

            </main><!-- #post-## -->

            <?php
            // Primary property-type sidebar.
            if ( isset( $post->property_type ) && is_active_sidebar( "wpp_sidebar_" . $post->property_type ) ) : ?>

                <div id="primary" class="<?php wpp_css('property::primary', "widget-area wpp_sidebar_{$post->property_type}"); ?>" role="complementary">
                    <ul class="">
                        <?php dynamic_sidebar( "wpp_sidebar_" . $post->property_type ); ?>
                    </ul>
                </div><!-- #primary .widget-area -->

            <?php endif; ?>

        </div><!-- .row -->
        <?php //[contact-form-7 id="133" title="Контактная форма"]
        echo do_shortcode("[contact-form-7 id=\"133\" title=\"Контактная форма\"]");
        ?>

        <?php
         $shortcode_args = "[property_overview template=frontpage sorter_type=none hide_count=true operation=". $post->operation ." property_type=". $post->property_type." strict_search=true]";
         echo do_shortcode("$shortcode_args");
         ?>

    </div><!-- #content -->

</div><!-- wrapper -->
</div><!-- .parallax -->

<?php get_footer();