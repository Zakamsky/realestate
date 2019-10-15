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
//wp_deregister_script('wpp-jquery-fancybox');
//wp_deregister_script('wpp-jquery-fancybox-css');
?>

<?php get_header(); ?>

<?php the_post(); ?>


<div id="container" class="wrapper main-content-wrapper <?php wpp_css('property::container', array((!empty($post->property_type) ? $post->property_type . "_container" : ""))); ?>">
    <div id="content" class="<?php echo esc_attr( $container ); ?>" tabindex="-1" role="main">
      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <!-- try thumbnail -->
          <img src="<?php echo $post->featured_image_url; ?>" alt="<?php echo $post->featured_image_title; ?>">
          <!-- /try thumbnail -->
          <!-- try galery -->
          <?php foreach ($post->gallery as $slide) : ?>
              <img src="<?php echo $slide['medium']/*$slide['large']*/; ?>" alt="<?php echo $slide['post_title']; ?>">
          <?php endforeach; /** end of the propertyloop. */ ?>

          <!-- /try galery -->
<!--        todo: этот код в файле на рабочем столе =>  --><?php //print_r($post); ?>

          <div class="<?php wpp_css('property::title', "building_title_wrapper"); ?>">
        <h1 class="property-title entry-title"><?php the_title(); ?></h1>
        <h3 class="entry-subtitle"><?php the_tagline(); ?></h3>
      </div>


      <div class="<?php wpp_css('property::entry_content', "entry-content"); ?>">
        <div class="<?php wpp_css('property::the_content', "wpp_the_content"); ?>"><?php @the_content(); ?></div>

        <?php if ( empty($wp_properties['property_groups']) || !isset( $wp_properties['configuration']['property_overview']['sort_stats_by_groups'] ) || $wp_properties['configuration']['property_overview']['sort_stats_by_groups'] != 'true' ) : ?>
          <ul id="property_stats" class="<?php wpp_css('property::property_stats', "property_stats overview_stats list"); ?>">
            <?php @draw_stats("display=list&make_link=true"); ?>
          </ul>
        <?php else: ?>
          <?php @draw_stats("display=list&make_link=true"); ?>
        <?php endif; ?>

        <?php
        if(!empty($wp_properties['taxonomies'])) foreach($wp_properties['taxonomies'] as $tax_slug => $tax_data):
          if( ( isset( $tax_data['unique'] ) && $tax_data['unique'] ) || !empty($tax_data['hidden'])) continue;
        ?>
          <?php if(get_features("type={$tax_slug}&format=count")):  ?>
          <div class="<?php echo $tax_slug; ?>_list">
          <h2><?php echo apply_filters('wpp::attribute::label',$tax_data['label']); ?></h2>
          <ul class="clearfix">
          <?php get_features("type={$tax_slug}&format=list&links=true"); ?>
          </ul>
          </div>
          <?php endif; ?>
        <?php endforeach; ?>

        <?php if(is_array($wp_properties['property_meta'])): ?>
        <?php foreach($wp_properties['property_meta'] as $meta_slug => $meta_title):
          if(empty($post->$meta_slug) || $meta_slug == 'tagline')
            continue;
          ?>
          <h2><?php echo $meta_title; ?></h2>
          <p><?php echo  do_shortcode(html_entity_decode($post->$meta_slug)); ?></p>
        <?php endforeach; ?>
        <?php endif; ?>

        <?php if(WPP_F::get_coordinates()): ?>
          <div id="property_map" class="<?php wpp_css('property::property_map'); ?>" style="width:100%; height:450px"></div>
        <?php endif; ?>

        <?php if($post->post_parent): ?>
          <a href="<?php echo $post->parent_link; ?>" class="<?php wpp_css('btn', "btn btn-return"); ?>"><?php _e('Return to building page.',ud_get_wp_property()->domain) ?></a>
        <?php endif; ?>

      </div><!-- .entry-content -->

    </div><!-- #post-## -->

    </div><!-- #content -->
  </div><!-- #container -->


<?php
  // Primary property-type sidebar.
  if ( isset( $post->property_type ) && is_active_sidebar( "wpp_sidebar_" . $post->property_type ) ) : ?>

    <div id="primary" class="<?php wpp_css('property::primary', "widget-area wpp_sidebar_{$post->property_type}"); ?>" role="complementary">
      <ul class="xoxo">
        <?php dynamic_sidebar( "wpp_sidebar_" . $post->property_type ); ?>
      </ul>
    </div><!-- #primary .widget-area -->

<?php endif; ?>
    <!-- this 5 -->
<?php get_footer(); ?>