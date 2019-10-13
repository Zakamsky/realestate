<?php
/**
 * WP-Property Overview Template
 *
 * To customize this file, copy it into your theme directory, and the plugin will
 * automatically load your version.
 *
 * You can also customize it based on property type.  For example, to create a custom
 * overview page for 'building' property type, create a file called property-overview-building.php
 * into your theme directory.
 *
 *
 * Settings passed via shortcode:
 * $properties: either array of properties or false
 * $show_children: default true
 * $thumbnail_size: slug of thumbnail to use for overview page
 * $thumbnail_sizes: array of image dimensions for the thumbnail_size type
 * $fancybox_preview: default loaded from configuration
 * $child_properties_title: default "Floor plans at location:"
 *
 *
 *
 * @version 1.4
 * @author Andy Potanin <andy.potnain@twincitiestech.com>
 * @package WP-Property
 */ ?>
<?php

if (have_properties()) {

//  $thumbnail_dimentions = WPP_F::get_image_dimensions($wpp_query['thumbnail_size']);

  ?>

<div class="<?php wpp_css('property_overview::row_view', "wpp_row_view wpp_property_view_result"); ?>">
    <div class="<?php wpp_css('property_overview::all_properties', "all-properties"); ?> row">
        <?php foreach (returned_properties('load_gallery=false') as $property) { ?>

<!--            <div class="property__card col-sm-6 col-lg-4">-->
            <div class="col-sm-6 col-lg-4">
                <div class="property__card">
                    <?php if (!empty($property['featured_image_url'])): ?>
                        <?php property_overview_image(); ?>
                    <?php else: ?>
                        <div class="property_image">
                            <svg class="" >
                                <use xlink:href="#blank_thumbnail"></use>
                            </svg>
                        </div>
                    <?php endif; ?>

                    <a class="property__card-description" href="<?php echo $property['permalink']; ?>" <?php echo $in_new_window; ?>>
                        <ul class="property__card-flags">
                            <li class="property__card-flags_item operation">
                                <?php echo $property['operation']; ?>
                            </li>
                            <?php if (!empty($property['tagline'])): ?>
                                <li class="property__card-flags_item tagline">
                                    <?php echo $property['tagline']; ?>
                                </li>
                            <?php endif; ?>
                        </ul>
                        <?php if (!empty($property['town'])): ?>
                            <div class="locations">
                                <i class="ico location-ico"></i>
                                <span class="locations-town"><?php echo $property['town']; ?></span>
                                <?php if (!empty($property['region'])): ?>
                                    <span class="locations-region">
                                        <?php echo $property['region']; ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <h5 class="property__card-title">
                            <?php echo $property['post_title']; ?>
                        </h5>

                        <div class="property__card-price"><?php echo $property['price']; ?></div>
                        <div class="property__card-text">
                                <?php
                                $post_content_kses = wp_kses($property['post_content'], '');
                                $short_description = substr($post_content_kses, 0, 120);
                                echo $short_description, '...'?>
                        </div>

                        <div class="property__card-icons d-flex">
                            <div class="property__card-icons_item">
                                <i class="ico icons-ico area"></i>
                                <?php echo $property['area']; ?>
                            </div>
                            <div class="property__card-icons_item">
                                <i class="ico icons-ico bedroom"></i>
                                <?php echo $property['bedroom']; ?>
                            </div>
                            <div class="property__card-icons_item">
                                <i class="ico icons-ico bathroom"></i>
                                <?php echo $property['bathroom']; ?>
                            </div>
                            <div class="property__card-icons_item">
                                <i class="ico icons-ico condition"></i>
                                <?php echo $property['condition']; ?>
                            </div>
                        </div>




                    </a>




                     <!-- --><?php
/*                      if( is_array($wpp_query[ 'attributes' ]) ){
                          echo '<ul class="attributes">';
                        foreach ($wpp_query[ 'attributes' ] as $attribute){
                          if(!empty($property[$attribute])){
                            $attribute_data = WPP_F::get_attribute_data($attribute);
                            $data = $property[$attribute];
                            if(is_array($data)){
                              $data = implode( ', ', $data);
                            }
                            echo "<li class='property_attributes property_$attribute'><span class='title'>{$attribute_data['title']}:</span> {$property[$attribute]}</li>";
                          }
                        }
                        echo '</ul>';
                      }
                      */?>


                </div><?php // .property__card-item  ?>
            </div> <!-- .property__card -->
        <?php } /** end of the propertyloop. */ ?>
    </div><?php // .all-properties ?>
</div><?php // .wpp_row_view ?>

<div class="wpp_view_all d-flex justify-content-center pt-3">
<?php echo sprintf(__('<a class="btn btn-secondary" href="%s">view all</a>', ud_get_wp_property()->domain), site_url() . '/' . $wp_properties['configuration']['base_slug']); ?>
</div>

<?php } ?>


