<?php

$key = 'longform';

$acf_groups = acf_get_local_field_groups($key);
foreach($acf_groups as $group){
  // Aready defined in app theme.
  if($group['key'] === $key){
    return false;
  }
}

include_once get_template_directory() . "/custom-fields/WidgetLoader.php";

register_field_group(array (
  'key' => $key . '_group',
  'title' => 'Basic Details',
  'fields' => array (
    array (
      'key' => $key . '_article_type',
      'label' => 'Article Type',
      'name' => 'article_type',
      'prefix' => '',
      'type' => 'select',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'choices' => array (
        'full-bleed' => 'Full Bleed',
        'one-column' => 'Single column'
      ),
      'default_value' => array (
        'one-column' => 'one-column',
      ),
      'allow_null' => 0,
      'multiple' => 0,
      'ui' => 0,
      'ajax' => 0,
      'placeholder' => '',
      'disabled' => 0,
      'readonly' => 0,
    ),
     array (
      'key' => $key . '_short_headline',
      'label' => 'Short Headline',
      'name' => 'short_headline',
      'prefix' => '',
      'type' => 'text',
      'instructions' => 'A concise heading used when space is limited for example in Related Content or Homepage grids.',
      'required' => 1,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
      'readonly' => 0,
      'disabled' => 0,
    ),
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
  'menu_order' => 0,
  'position' => 'normal',
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => array (
    0 => 'the_content',
  ),
));

$articleWidgets = WidgetLoader::findByUsage('longform');

register_field_group(array (
  'key' => $key . '_group',
  'title' => 'Body',
  'fields' => array (
    array (
      'key' => $key . '_widgets',
      'label' => 'Article Widgets',
      'name' => 'article_widgets',
      'prefix' => '',
      'type' => 'flexible_content',
      'instructions' => 'The body of the article is built up with widgets',
      'required' => 1,
      'conditional_logic' => 0,
      'button_label' => 'Add Widget',
      'min' => 1,
      'max' => '',
      'layouts' => $articleWidgets,
    ),
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
  'menu_order' => 0,
  'position' => 'normal',
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => array (
    0 => 'the_content',
    1 => 'discussion',
    2 => 'comments',
  )
));
