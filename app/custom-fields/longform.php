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

$articleWidgets = WidgetLoader::findByUsage('longform');

register_field_group(array (
  'key' => $key . '_widgets_group',
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
