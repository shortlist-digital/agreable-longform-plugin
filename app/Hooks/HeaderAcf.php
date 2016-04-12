<?php namespace AgreableLongformPlugin\Hooks;

class HeaderAcf {

  protected $acf_modifiers = [];

  public function init() {
    // Borrow the basic header to copy
    // \add_filter('agreable_base_theme_header_acf', array($this, 'header_acf'), 10);
  }

  public function header_acf($original_acf_definition) {
    // Copy ACF group
    $our_acf = $original_acf_definition;

    //
    // Start custom overrides for your post type:
    //

    $this->add_post_type($our_acf);
    $this->update_header_choices($our_acf);
    $this->add_display_options($our_acf);

    //
    // End custom overrides for your post type:
    //

    $our_acf = $this->update_keys('longform', $our_acf);
    register_field_group($our_acf);
    return $original_acf_definition;
  }

  protected function add_post_type(&$our_acf) {
    $our_acf['location'] = [[[
      'param' => 'post_type',
      'operator' => '==',
      'value' => 'longform', // Overwrite ACF group location with out post type
    ]]];
  }

  protected function update_header_choices(&$our_acf) {
    foreach($our_acf['fields'] as &$acf_field) {
      if ($acf_field['key'] === 'article_header_group_type') {
        $acf_field['choices'] = ['super-hero' => 'Super Hero'];
      }
    }
  }

  protected function add_display_options(&$our_acf) {
    $our_acf['fields'][] = array (
      'key' => 'article_header_display_headline',
      'label' => 'Show Headline',
      'name' => 'show_headline',
      'prefix' => '',
      'type' => 'true_false',
      'instructions' => 'Whether the headline is displayed on the site for this article.',
      'required' => 0,
      'conditional_logic' => array (
        array (
          array (
            'field' => $key . '_options',
            'operator' => '==',
            'value' => '1',
          ),
          array (
            'field' => $key . '_type',
            'operator' => '==',
            'value' => 'standard-hero',
          ),
        ),
      ),
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'message' => '',
      'default_value' => 1,
    );

     array (
      'key' => 'article_header_display_headline',
      'label' => 'Underline Colour',
      'name' => 'super_hero_line_colour',
      'type' => 'color_picker',
      'required' => 0,
      'conditional_logic' => array (
        array (
          array (
            'field' => 'widget_super_hero_heading_underline',
            'operator' => '==',
            'value' => '1',
          ),
        ),
      ),
      'wrapper' => array (
        'width' => 50,
        'class' => '',
        'id' => '',
      ),
    ),
  }

  protected function modify_header_types(&$acf_field) {
    return $acf_field;
  }

  /**
   * Update the ACF group key and fields key
   * e.g. article_header_group_type => longform_article_header_group_type
   */
  protected function update_keys($key, array $our_acf) {
    $our_acf['key'] = $key . '_' . $our_acf['key'];
    foreach ($our_acf['fields'] as &$acf_field) {
      $acf_field['key'] = $key . '_' . $acf_field['key'];
    }

    return $our_acf;
  }
}
