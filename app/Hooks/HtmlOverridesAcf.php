<?php namespace AgreableLongformPlugin\Hooks;

class HtmlOverridesAcf {

  public function init() {
    \add_filter('agreable_base_theme_html_overrides_acf', array($this, 'html_overrides'), 10);
  }

  public function html_overrides($acf_definition) {
    $acf_definition['location'][] = [
      [
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'longform',
      ],
      [
        'param' => 'current_user_role',
        'operator' => '==',
        'value' => 'administrator',
      ],
    ];

    return $acf_definition;
  }
}
