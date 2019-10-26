<?php
// wp property functions overwrite there:

function draw_stats($args = false, $property = false)
{
    global $wp_properties, $post;

    if (!$property) {
        $property = $post;
    }

    $property = prepare_property_for_display($property, false, false);

    if (is_array($property)) {
        $property = WPP_F::array_to_object($property);
    }

    $defaults = array(
        'sort_by_groups' => 'false',
        'display' => 'dl_list',
        'show_true_as_image' => 'false',
        'make_link' => 'true',
        'hide_false' => 'false',
        'first_alt' => 'false',
        'return_blank' => 'false',
        'include' => '',
        'exclude' => '',
        'make_terms_links' => 'false',
        'include_taxonomies' => 'false',
        'include_clsf' => 'attribute', // Show attributes or meta ( details ). Available value: "detail"
        'stats_prefix' => sanitize_key(WPP_F::property_label('singular'))
    );

    if (!empty($wp_properties['configuration']['property_overview']['sort_stats_by_groups'])) {
        $defaults['sort_by_groups'] = $wp_properties['configuration']['property_overview']['sort_stats_by_groups'];
    }

    if (!empty($wp_properties['configuration']['property_overview']['show_true_as_image'])) {
        $defaults['show_true_as_image'] = $wp_properties['configuration']['property_overview']['show_true_as_image'];
    }

    extract($args = wp_parse_args($args, $defaults), EXTR_SKIP);

    $property_stats = array();
    $groups = isset($wp_properties['property_groups']) ? (array)$wp_properties['property_groups'] : array();

    /**
     * Determine if we should draw meta data.
     * The functionality below is related to WPP2.0
     * Now it just adds compatibility with new Denali versions
     */
    if ($args['include_clsf'] === 'detail') {
        $sort_by_groups = 'false';
        if (!empty($wp_properties['property_meta'])) {
            foreach ($wp_properties['property_meta'] as $k => $v) {
                if ($k == 'tagline') {
                    continue;
                }
                if (!empty($property->$k)) {
                    $property_stats[$k] = array('label' => $v, 'value' => $property->$k);
                }
            }
        }
    } else {
        $property_stats = WPP_F::get_stat_values_and_labels($property, array('label_as_key' => 'false'));
    }

    /* Extend $property_stats with property taxonomy */
    if (($args['include_taxonomies'] === 'true' || $args['include_taxonomies'] === true) && !empty($wp_properties['taxonomies']) && is_array($wp_properties['taxonomies'])) {
        foreach ($wp_properties['taxonomies'] as $taxonomy => $data) {
            if ($data['public'] && empty($wp_properties['taxonomies'][$taxonomy]['hidden']))
                $property_stats[$taxonomy] = array('label' => $data['label'], 'value' => $property->$taxonomy);
        }
    }

    /** Include only passed attributes */
    if (!empty($include)) {
        $include = !is_array($include) ? explode(',', $include) : $include;
        foreach ((array)$property_stats as $k => $v) {
            if (!in_array($k, $include)) {
                unset($property_stats[$k]);
            }
        }
    }

    /** Exclude specific attributes from list */
    if (!empty($exclude)) {
        $exclude = !is_array($exclude) ? explode(',', $exclude) : $exclude;
        foreach ($exclude as $k) {
            if (isset($property_stats[$k])) {
                unset($property_stats[$k]);
            }
        }
    }

    if (empty($property_stats)) {
        return false;
    }

    //* Prepare values before display */
    $property_stats = apply_filters('wpp::draw_stats::attributes', $property_stats, $property, $args);

    $stats = array();

    foreach ($property_stats as $tag => $data) {

        if (empty($data['value'])) {
            continue;
        }

        $value = $data['value'];

        $attribute_data = UsabilityDynamics\WPP\Attributes::get_attribute_data($tag);

        //print_r($attribute_data);
        //** Do not show attributes that have value of 'value' if enabled */
        if ($args['hide_false'] == 'true' && $value == 'false') {
            continue;
        }

        //* Skip blank values (check after filters have been applied) */
        if ($args['return_blank'] == 'false' && empty($value)) {
            continue;
        }

        if (!is_array($value))
            $value = html_entity_decode($value);

        if (is_array($value) && isset($attribute_data['data_input_type']) && ($attribute_data['data_input_type'] == 'image_advanced' || $attribute_data['data_input_type'] == 'image_upload')) {
            $imgs = implode(',', $value);
            $img_html = do_shortcode("[gallery ids='$imgs']");
            $value = "<ul>" . $img_html . "</ul>";
        } elseif (isset($attribute_data['data_input_type']) && $attribute_data['data_input_type'] == 'oembed') {
            $value = wp_oembed_get(trim($value));
        } elseif (isset($attribute_data['data_input_type']) && $attribute_data['data_input_type'] == 'date') {
            $value = date_i18n(get_option('date_format'), strtotime($value));
        } elseif (isset($attribute_data['data_input_type']) && $attribute_data['data_input_type'] == 'datetime') {
            $value = date_i18n(get_option('date_format') . " " . get_option('time_format'), strtotime($value));
        } elseif (isset($attribute_data['data_input_type']) && $attribute_data['data_input_type'] == 'time') {
            $value = date_i18n(get_option('time_format'), strtotime($value));
        } elseif (isset($attribute_data['data_input_type']) && $attribute_data['data_input_type'] == 'file_advanced') {
            wp_enqueue_style('front-file-style', ud_get_wp_property()->path('static/styles/fields/front-file.css'), array(), ud_get_wp_property('version'));

            $file_html = '';
            $imgs = array();
            $files = array();
            foreach ($value as $file) {
                $isIMG = wp_attachment_is_image($file);
                if ($isIMG) {
                    $imgs[] = $file;
                } else {
                    $files[] = $file;
                }
            }

            if (count($imgs)) {
                $imgs = implode(",", $imgs);
                $file_html .= do_shortcode("[gallery ids='$imgs']");
            }

            if (count($files)) {
                foreach ($files as $file) {
                    $li = '
            <li id="item_%s">
              <div class="rwmb-icon">%s</div>
              <div class="rwmb-info">
                <a href="%s" target="_blank">%s</a>
                <p>%s</p>
              </div>
            </li>';
                    $mime_type = get_post_mime_type($file);
                    $file_html .= sprintf(
                        $li,
                        $file,
                        @wp_get_attachment_image($file, array(60, 60), true), // Wp genereate warning if image not found.
                        wp_get_attachment_url($file),
                        get_the_title($file),
                        $mime_type
                    );
                }
            }

            $value = "<ul class='rwmb-file'>" . $file_html . "</ul>";
        }

        // Taxonomies. Adding terms link, only if multi-value taxonomy.
        if (isset($attribute_data['storage_type']) && $attribute_data['storage_type'] == 'taxonomy' && isset($attribute_data['multiple']) && $attribute_data['multiple']) {

            $terms = wp_get_post_terms($property->ID, $tag);
            if (count($terms) == 0 || is_wp_error($terms)) {
                continue;
            }

            $value = "<ul>";

            foreach ($terms as $key => $term) {
                $term_link = $term->name;
                if (isset($make_terms_links) && $make_terms_links == "true") {
                    $term_link = "<a href='" . get_term_link($term->term_id, $tag) . "'>{$term->name}</a>";
                }
                $value .= "<li class='property-terms property-term-{$term->slug}'>$term_link</li>";
            }

            $value .= "</ul>";

        }

        if ($tag == "property_type" || $tag == "wpp_listing_type") {
            $terms = wp_get_post_terms($property->ID, "wpp_listing_type");
            if (count($terms) && !is_wp_error($terms)) {
                foreach ($terms as $key => $term) {
                    $value = "<a href='" . get_term_link($term->term_id, "wpp_listing_type") . "'>{$term->name}</a>";
                }
            }
        }

        //** Single "true" is converted to 1 by get_properties() we check 1 as well, as long as it isn't a numeric attribute */
        if (isset($attribute_data['data_input_type']) && $attribute_data['data_input_type'] == 'checkbox' && in_array(strtolower($value), array('true', '1', 'yes'))) {
            if ($args['show_true_as_image'] == 'true') {
                $value = '<div class="true-checkbox-image"></div>';
            } else {
                $value = __('Yes', ud_get_wp_property()->domain);
            }
        } else if ($value == 'false') {
            if ($args['show_true_as_image'] == 'true') {
                continue;
            }
            $value = __('No', ud_get_wp_property()->domain);
        }

        //* Make URLs into clickable links */
        $label = $data['label'];
        if (is_array($value)) {
            if ($args['make_link'] == 'true') {
                $link_value = array();
                foreach ($value as $val) {
                    if (WPP_F::isURL($val)) {
                        $link = "<a href='{$val}' title='{$label}' target='_blank'>{$label}</a>";
                    } else {
                        $term = get_term_by('name', $val, $tag);
                        if ($term && !is_wp_error($term)) {
                            $term_url = get_term_link($term->term_taxonomy_id, $term->taxonomy);
                            if (!is_wp_error($term_url)) {
                                $link = "<a href='{$term_url}' title='{$term->name}'>{$term->name}</a>";
                            }
                        } else {
                            $link = $val;
                        }
                    }
                    array_push($link_value, $link);
                }
                $value = $link_value;
            }
            $value = implode(', ', $value);
        } else {
            if ($args['make_link'] == 'true') {
                if (WPP_F::isURL($value)) {
                    $value = str_replace('&ndash;', '-', $value);
                    $value = "<a href='{$value}' title='{$label}' target='_blank'>{$value}</a>";
                } else {
                    $term = get_term_by('name', $value, $tag);
                    if($term && !is_wp_error($term)){
                        $term_url = get_term_link($term->term_taxonomy_id, $term->taxonomy);
                        if (!is_wp_error($term_url)) {
                            $value = "<a href='{$term_url}' title='{$term->name}'>{$term->name}</a>";
                        }
                    }
                }
            }
        }

        //* Make emails into clickable links */
        if ($args['make_link'] == 'true' && WPP_F::is_email($value)) {
            $value = "<a href='mailto:{$value}'>{$value}</a>";
        }

        $data['value'] = $value;
        $stats[$tag] = $data;
    }

    if (empty($stats)) {
        return false;
    }

    if ($args['display'] == 'array') {

        if ($args['sort_by_groups'] == 'true' && is_array($groups)) {

            $stats = sort_stats_by_groups($stats);

            foreach ($stats as $gslug => $gstats) {

                foreach ($gstats as $tag => $data) {
                    $data['label'] = apply_filters('wpp::attribute::label', $data['label']);
                    //check if the tag is property type to get the translated value for it
                    $data['value'] = ($tag == 'property_type') ? apply_filters('wpp_stat_filter_property_type', $data['value']) : apply_filters('wpp::attribute::value', $data['value'], $tag);
                    $gstats[$tag] = $data;
                }

                $stats[$gslug] = $gstats;
            }

        } else {

            foreach ($stats as $tag => $data) {
                $data['label'] = apply_filters('wpp::attribute::label', $data['label']);
                //check if the tag is property type to get the translated value for it
                $data['value'] = ($tag == 'property_type') ? apply_filters('wpp_stat_filter_property_type', $data['value']) : apply_filters('wpp::attribute::value', $data['value'], $tag);
                $stats[$tag] = $data;
            }

        }

        return $stats;

    }

    $alt = $args['first_alt'] == 'true' ? "" : "alt";

    //** Disable regular list if groups are NOT enabled, or if groups is not an array */
    if ($args['sort_by_groups'] != 'true' || !is_array($groups)) {

        if (!WPP_LEGACY_WIDGETS) echo '<div class="wpp_features_box wpp_features_box_without_groups">'; // for v2 widget

        foreach ($stats as $tag => $data) {

            $label = apply_filters('wpp::attribute::label', $data['label']);
            //check if the tag is property type to get the translated value for it
            $value = ($tag == 'property_type') ? apply_filters('wpp_stat_filter_property_type', $data['value']) : apply_filters('wpp::attribute::value', $data['value'], $tag);
            $alt = ($alt == "alt") ? "" : "alt";

            switch ($args['display']) {
                case 'dl_list':
                    ?>
                    <dt
                            class="<?php echo $args['stats_prefix']; ?>_<?php echo $tag; ?> wpp_stat_dt_<?php echo $tag; ?>"><?php echo $label; ?>
                        <span class="wpp_colon">:</span></dt>
                    <dd
                            class="<?php echo $args['stats_prefix']; ?>_<?php echo $tag; ?> wpp_stat_dd_<?php echo $tag; ?> <?php echo $alt; ?>"><?php echo $value; ?>
                        &nbsp;</dd>
                    <?php
                    break;
                case 'list':
                    ?>
                    <li
                            class="<?php echo $args['stats_prefix']; ?>_<?php echo $tag; ?> wpp_stat_plain_list_<?php echo $tag; ?> <?php echo $alt; ?>">
                        <span class="attribute"><?php echo $label; ?><span class="wpp_colon">:</span></span>
                        <span class="value"><?php echo $value; ?>&nbsp;</span>
                    </li>
                    <?php
                    break;
                case 'plain_list':
                    ?>
                    <span class="<?php echo $args['stats_prefix']; ?>_<?php echo $tag; ?> attribute"><?php echo $label; ?>
                        :</span>
                    <span class="<?php echo $args['stats_prefix']; ?>_<?php echo $tag; ?> value"><?php echo $value; ?>
                        &nbsp;</span>
                    <br/>
                    <?php
                    break;
                case 'detail':
                    ?>
                    <h4 class="wpp_attribute"><?php echo $label; ?><span class="separator">:</span></h4>
                    <p class="value"><?php echo $value; ?>&nbsp;</p>
                    <?php
                    break;
            }
        }

        if (!WPP_LEGACY_WIDGETS) echo '</div>'; // for v2 widget

    } else {

        $stats_by_groups = sort_stats_by_groups($stats);
        $main_stats_group = $wp_properties['configuration']['main_stats_group'];

        if (!WPP_LEGACY_WIDGETS) echo '<div class="wpp_features_box">'; // for v2 widget

        foreach ($stats_by_groups as $gslug => $gstats) {
            ?>
            <div class="wpp_feature_list">
                <?php
                if ($main_stats_group != $gslug || !@array_key_exists($gslug, $groups)) {
                    $group_name = (@array_key_exists($gslug, $groups) ? $groups[$gslug]['name'] : __('Other', ud_get_wp_property()->domain));
                    ?>
                    <h5 class="wpp_stats_group"><?php echo $group_name; ?></h5>
                    <?php
                }

                switch ($args['display']) {
                    case 'dl_list':
                        ?>
                        <dl class="wpp_property_stats overview_stats">
                            <?php foreach ($gstats as $tag => $data) : ?>
                                <?php
                                $label = apply_filters('wpp::attribute::label', $data['label']);
                                //check if the tag is property type to get the translated value for it
                                $value = ($tag == 'property_type') ? apply_filters('wpp_stat_filter_property_type', $data['value']) : $data['value'];
                                ?>
                                <?php $alt = ($alt == "alt") ? "" : "alt"; ?>
                                <dt
                                        class="<?php echo $stats_prefix; ?>_<?php echo $tag; ?> wpp_stat_dt_<?php echo $tag; ?>"><?php echo $label; ?></dt>
                                <dd
                                        class="<?php echo $stats_prefix; ?>_<?php echo $tag; ?> wpp_stat_dd_<?php echo $tag; ?> <?php echo $alt; ?>"><?php echo $value; ?>
                                </dd>
                            <?php endforeach; ?>
                        </dl>
                        <?php
                        break;
                    case 'list':
                        ?>
                        <ul class="overview_stats wpp_property_stats list">
                            <?php foreach ($gstats as $tag => $data) : ?>
                                <?php
                                $label = apply_filters('wpp::attribute::label', $data['label']);
                                //check if the tag is property type to get the translated value for it
                                $value = ($tag == 'property_type') ? apply_filters('wpp_stat_filter_property_type', $data['value']) : apply_filters('wpp::attribute::value', $data['value'], $tag);
                                $alt = ($alt == "alt") ? "" : "alt";
                                ?>
                                <li
                                        class="<?php echo $stats_prefix; ?>_<?php echo $tag; ?> wpp_stat_plain_list_<?php echo $tag; ?> <?php echo $alt; ?>">
                                    <span class="attribute"><?php echo $label; ?>:</span>
                                    <span class="value"><?php echo $value; ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php
                        break;
                    case 'plain_list':
                        foreach ($gstats as $tag => $data) {
                            $label = apply_filters('wpp::attribute::label', $data['label']);
                            //check if the tag is property type to get the translated value for it
                            $value = ($tag == 'property_type') ? apply_filters('wpp_stat_filter_property_type', $data['value']) : $data['value'];
                            if (WPP_LEGACY_WIDGETS) { // If use old widget
                                ?>
                                <span class="property_span">
                                    <span class="<?php echo $stats_prefix; ?>_<?php echo $tag; ?> attribute"><?php echo $label; ?>:</span>
                                    <span class="<?php echo $stats_prefix; ?>_<?php echo $tag; ?> value">
                                        <?php echo $value; ?>
                                    </span>
                                </span>



                                <?php
                            } else {
                                ?>
                                <div class="wpp_attribute_row">
                    <span class="<?php echo $stats_prefix; ?>_<?php echo $tag; ?> attribute"><?php echo $label; ?>
                        :</span>
                                    <span class="<?php echo $stats_prefix; ?>_<?php echo $tag; ?> value"><?php echo $value; ?>
                                        &nbsp;</span>
                                </div>
                                <?php
                            }
                        }
                        break;
                    case 'detail':
                        foreach ($gstats as $tag => $data) {
                            $label = apply_filters('wpp::attribute::label', $data['label']);
                            //check if the tag is property type to get the translated value for it
                            $value = ($tag == 'property_type') ? apply_filters('wpp_stat_filter_property_type', $data['value']) : $data['value'];
                            if (WPP_LEGACY_WIDGETS) { // If use old widget
                                ?>
                                <strong class="wpp_attribute <?php echo $stats_prefix; ?>_<?php echo $tag; ?>"><?php echo $label; ?>
                                    <span class="separator">:</span></strong>
                                <p class="value"><?php echo $value; ?>&nbsp;</p>
                                <br/>
                                <?php
                            } else {
                                ?>
                                <div class="wpp_attribute_row">
                                    <strong
                                            class="wpp_attribute <?php echo $stats_prefix; ?>_<?php echo $tag; ?>"><?php echo $label; ?>
                                        <span class="separator">:</span></strong>
                                    <p class="value"><?php echo $value; ?>&nbsp;</p>
                                </div>
                                <?php
                            }
                        }
                        ?>
                        <?php
                        break;
                }
                ?>
            </div>
            <?php
        }

        if (!WPP_LEGACY_WIDGETS) echo '</div>'; // for v2 widget

    }

}

function wpp_render_search_input($args = false)
{
    global $wp_properties;
    extract($args = wp_parse_args($args, array(
        'type' => 'input',
        'input_type' => false,
        'search_values' => false,
        'attrib' => false,
        'random_element_id' => 'wpp_search_element_' . rand(1000, 9999),
        'value' => false,
        'placeholder' => false
    )));

    $attribute_data = UsabilityDynamics\WPP\Attributes::get_attribute_data($args['attrib']);

    if (!empty($args['input_type'])) {
        $use_input_type = $args['input_type'];
    } else {
        $use_input_type = isset($wp_properties['searchable_attr_fields'][$attrib]) ? $wp_properties['searchable_attr_fields'][$attrib] : false;
    }

    ob_start();

    if (!empty($use_input_type)) {
        switch ($use_input_type) {
            case 'input':
                ?>
                <input id="<?php echo $random_element_id; ?>" class="form-control <?php echo $attribute_data['ui_class']; ?>"
                       name="wpp_search[<?php echo $attrib; ?>]" value="<?php echo $value; ?>"
                       placeholder="<?php echo $placeholder; ?>" type="text"/>
                <?php
                break;
            case 'range_input':
                /* Determine if $value has correct format, and if not - fix it. */
                $value = (!is_array($value) ? array('min' => '', 'max' => '') : $value);
                $value['min'] = (in_array('min', $value) ? $value['min'] : '');
                $value['max'] = (in_array('max', $value) ? $value['max'] : '');
                ?>
                <input id="<?php echo $random_element_id; ?>"
                       class="form-control wpp_search_input_field wpp_range_field wpp_search_input_field_min wpp_search_input_field_<?php echo $attrib; ?> <?php echo $attribute_data['ui_class']; ?>"
                       type="text" name="wpp_search[<?php echo $attrib; ?>][min]" value="<?php echo $value['min']; ?>"
                       placeholder="<?php _e('Min', ud_get_wp_property()->domain); ?>"/>
                <span class="wpp_dash">-</span>
                <input
                    class="form-control wpp_search_input_field wpp_range_field wpp_search_input_field_max wpp_search_input_field_<?php echo $attrib; ?> <?php echo $attribute_data['ui_class']; ?>"
                    type="text" name="wpp_search[<?php echo $attrib; ?>][max]" value="<?php echo $value['max']; ?>"
                    placeholder="<?php _e('Max', ud_get_wp_property()->domain); ?>"/>
                <?php
                break;
            case 'range_dropdown':
                ?>
                <?php $grouped_values = group_search_values($search_values[$attrib]); ?>
                <select id="<?php echo $random_element_id; ?>"
                        class="form-control wpp_search_select_field wpp_search_select_field_<?php echo $attrib; ?> <?php echo $attribute_data['ui_class']; ?>"
                        name="wpp_search[<?php echo $attrib; ?>][min]">
                    <option value="-1"><?php _e('Any', ud_get_wp_property()->domain) ?></option>
                    <?php foreach ($grouped_values as $v) : ?>
                        <option
                            value='<?php echo (int)$v; ?>' <?php if (isset($value['min']) && $value['min'] == $v) echo " selected='true' "; ?>>
                            <?php echo apply_filters("wpp_stat_filter_{$attrib}", $v); ?> +
                        </option>
                    <?php endforeach; ?>
                </select>
                <?php
                break;
            case 'advanced_range_dropdown':
                ?>
                <?php $grouped_values = !empty($search_values[$attrib]) ? $search_values[$attrib] : group_search_values($search_values[$attrib]); ?>
                <select id="<?php echo $random_element_id; ?>"
                        class="form-control wpp_search_select_field wpp_range_field wpp_search_select_field_<?php echo $attrib; ?> <?php echo $attribute_data['ui_class']; ?>"
                        name="form-control wpp_search[<?php echo $attrib; ?>][min]">
                    <option value=""><?php _e('Min', ud_get_wp_property()->domain) ?></option>
                    <?php foreach ($grouped_values as $v) : ?>
                        <option
                            value='<?php echo (int)$v; ?>' <?php if (isset($value['min']) && $value['min'] == (int)$v) echo " selected='selected' "; ?>>
                            <?php echo apply_filters("wpp_stat_filter_{$attrib}", $v); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <span class="delimiter">-</span>
                <select id="<?php echo $random_element_id; ?>"
                        class="form-control wpp_search_select_field wpp_range_field wpp_search_select_field_<?php echo $attrib; ?> <?php echo $attribute_data['ui_class']; ?>"
                        name="wpp_search[<?php echo $attrib; ?>][max]">
                    <option value=""><?php _e('Max', ud_get_wp_property()->domain) ?></option>
                    <?php foreach ($grouped_values as $v) : ?>
                        <option
                            value='<?php echo (int)$v; ?>' <?php if (isset($value['max']) && $value['max'] == (int)$v) echo " selected='selected' "; ?>>
                            <?php echo apply_filters("wpp_stat_filter_{$attrib}", $v); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <?php
                break;
            case 'dropdown':
                ?>
                <select id="<?php echo $random_element_id; ?>"
                        class="form-control wpp_search_select_field wpp_search_select_field_<?php echo $attrib; ?> <?php echo $attribute_data['ui_class']; ?>"
                        name="wpp_search[<?php echo $attrib; ?>]">
                    <option value="-1"><?php _e('Any', ud_get_wp_property()->domain) ?></option>
                    <?php foreach ($search_values[$attrib] as $v) : ?>
                        <option
                            value="<?php echo esc_attr($v); ?>" <?php selected($value, $v); ?>><?php echo esc_attr(apply_filters("wpp_stat_filter_{$attrib}", $v)); ?></option>
                    <?php endforeach; ?>
                </select>
                <?php
                break;
            case 'multi_checkbox':
                ?>
                <ul id="wpp_multi_checkbox" class="wpp_multi_checkbox <?php echo $attribute_data['ui_class']; ?>">
                    <?php foreach ($search_values[$attrib] as $value_label) : ?>
                        <?php $unique_id = rand(10000, 99999); ?>
                        <li>
                            <input
                                name="wpp_search[<?php echo $attrib; ?>][]" <?php echo(is_array($value) && in_array($value_label, $value) ? 'checked="true"' : ''); ?>
                                id="wpp_attribute_checkbox_<?php echo $unique_id; ?>" type="checkbox"
                                value="<?php echo $value_label; ?>"/>
                            <label for="wpp_attribute_checkbox_<?php echo $unique_id; ?>"
                                   class="wpp_search_label_second_level"><?php echo $value_label; ?></label>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <?php
                break;
            case 'checkbox':
                ?>
                <input id="<?php echo $random_element_id; ?>" type="checkbox"
                       class="<?php echo $attribute_data['ui_class']; ?>"
                       name="wpp_search[<?php echo $attrib; ?>]" <?php checked($value, 'true'); ?> value="true"/>
                <?php
                break;
            case 'range_date':
                ?>
                <input id="<?php echo $random_element_id; ?>"
                       class="form-control uisf-date wpp_search_input_field wpp_range_field wpp_search_date_field_from wpp_search_date_field_<?php echo $attrib; ?> <?php echo $attribute_data['ui_class']; ?>"
                       type="text" name="wpp_search[<?php echo $attrib; ?>][from]" value="" placeholder=""/>
                <span class="wpp_dash">-</span>
                <input
                    class="form-control uisf-date wpp_search_input_field wpp_range_field wpp_search_date_field_to wpp_search_date_field_<?php echo $attrib; ?> <?php echo $attribute_data['ui_class']; ?>"
                    type="text" name="wpp_search[<?php echo $attrib; ?>][to]" value="" placeholder=""/>
                <?php
                break;
            default:
                echo apply_filters('wpp::render_search_input::custom', '', $args);
                break;
        }
    } else {
        ?>
        <?php if (empty($search_values[$attrib])) : ?>
            <input id="<?php echo $random_element_id; ?>"
                   class="form-control wpp_search_input_field wpp_search_input_field_<?php echo $attrib; ?>"
                   name="wpp_search[<?php echo $attrib; ?>]" value="<?php echo $value; ?>" type="text"/>
            <?php //* Determine if attribute is a numeric range */ ?>
        <?php elseif (WPP_F::is_numeric_range($search_values[$attrib])) : ?>
            <input
                class="form-control wpp_search_input_field wpp_range_field wpp_range_input wpp_search_input_field_min wpp_search_input_field_<?php echo $attrib; ?> <?php echo $attribute_data['ui_class']; ?>"
                type="text" name="wpp_search[<?php echo $attrib; ?>][min]"
                value="<?php echo isset($value['min']) ? $value['min'] : ''; ?>"/>
            <span class="wpp_dash">-</span>
            <input
                class="form-control wpp_search_input_field wpp_range_field wpp_range_input wpp_search_input_field_max wpp_search_input_field_<?php echo $attrib; ?> <?php echo $attribute_data['ui_class']; ?>"
                type="text" name="wpp_search[<?php echo $attrib; ?>][max]"
                value="<?php echo isset($value['max']) ? $value['max'] : ''; ?>"/>
        <?php else : ?>
            <?php /* Not a numeric range */ ?>
            <select id="<?php echo $random_element_id; ?>"
                    class="form-control wpp_search_select_field wpp_search_select_field_<?php echo $attrib; ?> <?php echo $attribute_data['ui_class']; ?>"
                    name="wpp_search[<?php echo $attrib; ?>]">
                <option
                    value="<?php echo(($attrib == 'property_type' && is_array($search_values[$attrib])) ? implode(',', (array_flip($search_values[$attrib]))) : '-1'); ?>"><?php _e('Any', ud_get_wp_property()->domain) ?></option>
                <?php foreach ($search_values[$attrib] as $key => $v) : ?>
                    <option
                        value='<?php echo(($attrib == 'property_type') ? $key : $v); ?>' <?php if ($value == (($attrib == 'property_type') ? $key : $v)) echo " selected='true' "; ?>>
                        <?php echo apply_filters("wpp_stat_filter_{$attrib}", $v); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        <?php endif; ?>
        <?php
    }

    echo apply_filters('wpp_render_search_input', ob_get_clean(), $args);
}
