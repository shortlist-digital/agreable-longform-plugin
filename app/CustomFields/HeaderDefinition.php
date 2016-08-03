<?php
namespace AgreableLongformPlugin\CustomFields;

/**
 * This class allows us to load this ACF header definition in to other
 * plugins, such as agreable-partnership-plugin
 */
class HeaderDefinition {
  public static function get($post_type) {
    $key = $post_type . '_header';
    $header_acf = array (
      'key' => $key . '_group',
      'title' => 'Opening Header',
      'fields' => array (
        array (
          'key' => 'longform_header_basic_details_tab',
          'label' => 'Basic Details',
          'type' => 'tab',
          'required' => 0,
          'conditional_logic' => 0,
          'placement' => 'left',
        ),
        array (
          'key' => $key . '_type',
          'label' => 'Type',
          'name' => 'header_type',
          'type' => 'select',
          'instructions' => 'Select the type of header for this content',
          'choices' => array (
            'super-hero' => 'Super Hero',
            'super-hero-video' => 'Super Hero Video',
          ),
          'default_value' => array (
            'super-hero' => 'super-hero',
          ),
          'wrapper' => array (
            'width' => '100%'
          ),
        ),
        array (
          'key' => 'lonform_header_advanced_details_tab',
          'label' => 'Advanced Details',
          'type' => 'tab',
          'required' => 0,
          'conditional_logic' => 0,
          'placement' => 'left',
        ),
        array (
          'key' => $key . '_text_colour',
          'label' => 'Text Colour',
          'name' => 'header_text_colour',
          'type' => 'color_picker',
          'wrapper' => array (
            'width' =>'100%',
          ),
        ),
        array (
          'key' => $key . '_background_colour',
          'label' => 'Background Colour',
          'name' => 'header_background_colour',
          'instructions' => 'Choose a colour if you want to use a colour instead of an image',
          'type' => 'color_picker',
          'wrapper' => array (
            'width' => '100%',
          ),
        ),
        array (
          'key' => $key . '_line_colour',
          'label' => 'Underline Colour',
          'name' => 'header_line_colour',
          'instructions' => 'Choose a colour if you want to underline your heading',
          'type' => 'color_picker',
          'wrapper' => array (
            'width' => '100%',
          ),
        ),
        array (
          'key' => $key . '_other_options',
          'label' => 'Other options',
          'name' => 'header_other_options',
          'type' => 'checkbox',
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
            'value' => $post_type,
          ),
        ),
      ),
      'menu_order' => 1,
      'position' => 'normal',
      'style' => 'default',
      'label_placement' => 'top',
      'instruction_placement' => 'label',
    );
    return $header_acf;
  }
}
