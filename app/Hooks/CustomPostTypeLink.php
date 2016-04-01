<?php
namespace AgreableLongformPlugin\Hooks;

class CustomPostTypeLink {

  public function init() {
    \add_filter('post_type_link', [$this, 'custom_post_type_link'], 10, 3);
  }

  /**
   * Remove the base from the custom post type slug
   * /longform/style/mode/shadow-puppets => /style/mode/shadow-puppets
   */
  public function custom_post_type_link($permalink, $post, $leavename) {
    if ($post->post_type !== 'longform') {
      return $permalink;
    }

    // TODO: Need to autoload these classes in AgreableBaseTheme
    include __DIR__ . '/../../../../themes/agreable-base-theme/libs/services/CategoryService.php';
    $category_hierarchy = \AgreableCategoryService::get_post_category_hierarchy($post);

    $permalink = get_home_url();
    if (isset($category_hierarchy->parent)) {
      $permalink .= '/' . $category_hierarchy->parent->slug;
    }

    if (isset($category_hierarchy->child)) {
      $permalink .= '/' . $category_hierarchy->child->slug;
    }

    $permalink .= '/' . $post->post_title . '/';

    return $permalink;
  }
}