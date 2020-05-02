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
$property_condition = array(
    "ru" => array(
        "Новостройка" => "Новостройка",
        "Хорошее состояние" => "Хорошее состояние",
        "Под ремонт" => "Под ремонт",
    ),
    "en" => array(
        "Новостройка" => "New construction",
        "Хорошее состояние" => "Good condition",
        "Под ремонт" => "Under repair",
    ),
    "es" => array(
        "Новостройка" => "obra nueva",
        "Хорошее состояние" => "buen estado",
        "Под ремонт" => "reformar",
    ),
);
$property_operation = array(
    "ru" => array(
        "Аренда" => "Аренда",
        "Продажа" => "Продажа",
        "Туристическая аренда" => "Туристическая аренда",
    ),
    "en" => array(
        "Аренда" => "For rent",
        "Продажа" => "For sale",
        "Туристическая аренда" => "For tourist rent",
    ),
    "es" => array(
        "Аренда" => "Alquiler",
        "Продажа" => "Venta",
        "Туристическая аренда" => "Alquiler turístico",
    ),
);
$current_lang = "ru";

if(ICL_LANGUAGE_CODE == 'en'){
    $current_lang = "en";
};
if(ICL_LANGUAGE_CODE == 'es'){
    $current_lang = "es";
};
?>
<div class="<?php wpp_css('property_overview::row_view', "wpp_row_view wpp_property_view_result"); ?>">
<div class="<?php wpp_css('property_overview::all_properties', "all-properties"); ?> row">
    <?php foreach (returned_properties('load_gallery=false') as $property) { ?>

        <div class="col-sm-6 col-lg-4">
            <div class="property__card">
                <?php if (!empty($property['featured_image_url'])): ?>
                    <?php property_overview_image(); ?>
                <?php else: ?>
                    <div class="property_image">
                        <a class="property__card-image_blanked" href="<?php echo $property['permalink']; ?>" <?php echo $in_new_window; ?>>
                            <svg class="image_blanked" >
                                <use xlink:href="#blank_thumbnail"></use>
                            </svg>
                        </a>
                    </div>
                <?php endif; ?>

                <a class="property__card-description" href="<?php echo $property['permalink']; ?>" <?php echo $in_new_window; ?>>
                    <ul class="property__card-flags">
                        <li class="property__card-flags_item operation">
                            <span><?php
                                $operation = $property['operation'];
                                echo $property_operation[$current_lang][$operation];
                                ?></span>
                        </li>
                        <?php if (!empty($property['tagline'])): ?>
                            <li class="property__card-flags_item tagline">
                                <span><?php echo $property['tagline']; ?></span>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <?php if (!empty($property['town'])): ?>
                        <div class="locations">
                            <i class="ico location-ico">
                                <svg class="location-ico_svg" >
                                    <use xlink:href="#location"></use>
                                </svg>
                            </i>
                            <span class="locations-town">
                                    <?php echo $property['town']; ?><?php if (!empty($property['region'])) echo ',' ?>
                                </span>
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
                        $post_content_kses = wp_kses($property['post_content'], 'default');
                        $short_description = substr($post_content_kses, 0, 200);
                        echo $short_description, '...'?>
                    </div>

                    <div class="property__card-icons d-flex justify-content-between">
                        <div class="property__card-icons_item">
                            <i class="ico icons-ico area">
                                <svg class="icons-ico_svg" >
                                    <use xlink:href="#blueprint"></use>
                                </svg>
                            </i>
                            <?php echo $property['area']; ?>
                        </div>
                        <div class="property__card-icons_item">
                            <i class="ico icons-ico bedroom">
                                <svg class="icons-ico_svg" >
                                    <use xlink:href="#bedroom"></use>
                                </svg>
                            </i>
                            <?php echo $property['bedroom']; ?>
                        </div>
                        <div class="property__card-icons_item">
                            <i class="ico icons-ico bathroom">
                                <svg class="icons-ico_svg" >
                                    <use xlink:href="#bathroom"></use>
                                </svg>
                            </i>
                            <?php echo $property['bathroom']; ?>
                        </div>
                        <div class="property__card-icons_item">
                            <i class="ico icons-ico condition">
                                <svg class="icons-ico_svg" >
                                    <use xlink:href="#condition"></use>
                                </svg>
                            </i>
                            <?php $condition = $property['condition']; echo $property_condition[$current_lang][$condition]; ?>
                        </div>
                    </div>
                </a>

            </div><?php // .property__card-item  ?>
        </div> <!-- .property__card -->

    <?php } /** end of the propertyloop. */ ?>
  </div><?php // .all-properties ?>
  </div><?php // .wpp_row_view ?>
<?php } else { ?>
  <div class="wpp_nothing_found">
    <p><?php echo sprintf(__('Sorry, no properties found - try expanding your search, or <a href="%s">view all</a>.', ud_get_wp_property()->domain), site_url() . '/' . $wp_properties['configuration']['base_slug']); ?></p>
  </div>
<?php } ?>