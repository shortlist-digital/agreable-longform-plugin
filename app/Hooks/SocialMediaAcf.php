<?php namespace AgreableLongformPlugin\Hooks;

class SocialMediaAcf {

  public function init() {
    \add_filter('agreable_base_theme_social_media_acf', array($this, 'social_media_acf'), 10);
    \add_filter('agreable_base_theme_related_acf', array($this, 'related_acf'), 11);
  }

  public function social_media_acf($acf_definition) {
    $acf_definition['location'][] = [
      [
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'longform',
      ]
    ];

    return $acf_definition;
  }

  public function related_acf($acf_definition) {
    $acf_definition['location'][] = [
      [
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'longform',
      ]
    ];

    return $acf_definition;
  }
}
