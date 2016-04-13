<?php
$key = 'longform_header';

$header_acf = array (
  'key' => $key . '_group',
  'title' => 'Opening Header',
  'fields' => array (
    array (
      'key' => $key . '_type',
      'label' => 'Type',
      'name' => 'header_type',
      'prefix' => '',
      'type' => 'select',
      'instructions' => 'Select the type of header for this content',
      'choices' => array (
        'super-hero' => 'Super Hero',
      ),
      'default_value' => array (
        'super-hero' => 'super-hero',
      ),
      'wrapper' => array (
        'width' => '50%'
      ),
    ),
    array (
      'key' => 'agreable-no-store_' . $key . '_options',
      'label' => 'Options',
      'name' => 'header_options',
      'type' => 'true_false',
      'wrapper' => array (
        'class' => 'agreable-options-controller',
        'width' => '50%'
      ),
      'readonly' => 1
    ),
    array (
      'key' => $key . '_text_colour',
      'label' => 'Text Colour',
      'name' => 'header_text_colour',
      'type' => 'color_picker',
      'wrapper' => array (
        'class' => 'agreable-options',
      ),
    ),
    array (
      'key' => $key . '_heading_has_underline',
      'label' => 'Do you want to underline the heading?',
      'name' => 'heading_has_underline',
      'type' => 'true_false',
      'instructions' => '',
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '50%',
        'class' => 'agreable-options',
      ),
      'choices' => array (
        '' => '',
      ),
      'default_value' => 0,
    ),
    array (
      'key' => $key . '_header_has_background_colour',
      'label' => 'Use a background colour instead of an image',
      'name' => 'header_has_background_colour',
      'type' => 'true_false',
      'instructions' => '',
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '50%',
        'class' => 'agreable-options',
      ),
      'default_value' => 0,
    ),
    array (
      'key' => $key . '_background_colour',
      'label' => 'Background Colour',
      'name' => 'header_background_colour',
      'type' => 'color_picker',
      'conditional_logic' => array (
        array (
          array (
            'field' => $key . '_background_selector',
            'operator' => '==',
            'value' => '1',
          ),
        ),
      ),
      'wrapper' => array (
        'width' => 50,
        'class' => 'agreable-options',
      ),
    ),
    array (
      'key' => $key . '_line_colour',
      'label' => 'Underline Colour',
      'name' => 'header_line_colour',
      'type' => 'color_picker',
      'conditional_logic' => array (
        array (
          array (
            'field' => $key . '_heading_underline',
            'operator' => '==',
            'value' => '1',
          ),
        ),
      ),
      'wrapper' => array (
        'class' => 'agreable-options',
      ),
    ),
    array (
      'key' => $key . '_brand',
      'label' => 'Brand',
      'name' => 'header_brand',
      'type' => 'text',
      'instructions' => 'Add a brand specific sell (optional)',
      'default_value' => '',
      'wrapper' => array (
        'width' => '50%',
        'class' => 'agreable-options',
      ),
    ),
    array (
      'key' => $key . '_brand_image',
      'label' => 'Brand Image',
      'name' => 'header_brand_image',
      'type' => 'image',
      'instructions' => 'Add a brand logo (optional)',
      'return_format' => 'array',
      'preview_size' => 'thumbnail',
      'library' => 'all',
      'wrapper' => array (
        'width' => '50%',
        'class' => 'agreable-options',
      ),
    ),
    array (
      'key' => $key . '_other_options',
      'label' => 'Other',
      'name' => 'header_other_options',
      'type' => 'checkbox',
      'instructions' => '',
      'wrapper' => array (
        'class' => 'agreable-options',
      ),
      'choices' => array (
        'full-height' => 'Enable full height (fill the screen)',
        'parallax' => 'Enable parallax effect',
        'carousel-buttons' => 'Enable previous/next carousel buttons (if used)',
        'scroll-down-button' => 'Enable scroll down button (if full-height is used)',
        'display-post-category' => 'Display post category'
      ),
      'default_value' => array (
        'full-height' => '',
        'parallax' => '',
        'carousel-buttons' => 'carousel-buttons',
        'scroll-down-button' => 'scroll-down-button',
        'display-post-category' => 'display-post-category'
        ),
    )
  ),
  'location' => array (
    array (
      array (
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'longform',
      ),
    ),
  ),
  'menu_order' => 1,
  'position' => 'normal',
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
);

$header_acf = apply_filters('agreable_longform_plugin_header_acf', $header_acf);
register_field_group($header_acf);





