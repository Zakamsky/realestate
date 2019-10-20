<?php
// wp property functions overwrite there:

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
