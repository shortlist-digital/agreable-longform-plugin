<?php

namespace AgreableLongformPlugin\Controllers;
use AgreableLongformPlugin\Helper;

class LongformDownloadController {

  public function build_dropdown(){
    // Get the current context
    $this->context = new \TimberPost();
    // Check we're not in the admin or on a page
    if (!is_admin() && (in_array($this->context->post_type, array('post', 'features-post', 'partnership-post')))) {
      // Find the longform ID if there is one
      $longform_id = $this->get_longform_id();
      if ($longform_id) {
        // get the post object for longform
        $this->longform_context = new \TimberPost($longform_id);
        // kick of the menu building process
        $this->build_menu();
      }
    }

    /*
     * @AgreableLongformPlugin is a Twig namespace which Herbert generates from
     * values in herbert.config.php.
     * @see http://twig.sensiolabs.org/doc/api.html#loaders
     *
     * Using get_field() which is an ACF function to retrieve theme
     * specific options affecting the style of the longform.
     * ACF definitions for Panel are in app/panels.php.
     */

  }

  public function get_url($format = 'csv') {
    $url_root = "http://" . $this->get_calais_domain() . "/data-record/";
    $passport_id = json_decode($this->longform_context->selected_passport)->id;
    $search = "/criteria/%7B%22PostId%22:".$this->longform_context->ID."%7D/format/".$format."?bypass";
    return $url_root.$passport_id.$search;
  }

  public function get_comp_url() {
    $url_root = "http://" . $this->get_calais_domain() . "/data-record/";
    $passport_id = json_decode($this->longform_context->selected_passport)->id;
    $json_query_array = array(
      'PostId' => $this->longform_context->ID,
      'AnswerCorrect' => true
    );
    $json_query = urlencode(json_encode($json_query_array));
    $search = "/criteria/".$json_query."/";
    $format_query = "format/csv";
    return $url_root.$passport_id.$search.$format_query;
  }

  public function get_optin_url($index) {
    $url_root = "http://" . $this->get_calais_domain() . "/data-record/";
    $passport_id = json_decode($this->longform_context->selected_passport)->id;
    $search = "/criteria/%7B%22PostId%22:".$this->longform_context->ID.",%20%22ThirdPartyOptIn".($index+1)."Value%22:%20true%7D/";
    $format_query = "format/csv";
    return $url_root.$passport_id.$search.$format_query;
  }

  public function build_menu() {
    global $wp_admin_bar;

    $wp_admin_bar->add_menu( array(
      'id'    => 'longform-edit',
      'title' => 'Edit the Longform',
      'href'  => get_edit_post_link($this->longform_context->id)
    ));

    $wp_admin_bar->add_menu( array(
      'id'    => 'longform-downloads',
      'title' => 'Export Longform Entries',
      'href'  => ''
    ));

    $wp_admin_bar->add_menu( array(
      'id'    => 'download-csv',
      'title' => 'Download All - CSV',
      'target' => '_BLANK',
      'href'  => $this->get_url('csv'),
      'parent'=>'longform-downloads'
    ));

    for($i = 0; $i < 3; $i++) {
      $property = "third_party_optins_".$i."_optin_name";
      if (isset($this->longform_context->$property)) {
        $this->add_optin_download($this->longform_context->$property, $i);
      }
    }

    $fields_array = $this->longform_context->custom['data_to_capture'];
    if (in_array("competition", $fields_array, true)) {
      $wp_admin_bar->add_menu( array(
        'id'    => 'download-winners-csv',
        'title' => 'Download Winners - CSV',
        'target' => '_BLANK',
        'href'  => $this->get_comp_url('csv'),
        'parent'=>'longform-downloads'
      ));
    }

  }

  public function add_optin_download($longform_name, $index){
    global $wp_admin_bar;
    $longform_slug = sanitize_title($longform_name);
    $wp_admin_bar->add_menu( array(
      'id'    => "download-".$longform_slug,
      'title' => "Download ".$longform_name." Optins - CSV",
      'target' => '_BLANK',
      'href'  => $this->get_optin_url($index),
      'parent'=>'longform-downloads'
    ));
  }

  public function get_longform_id() {
    $longform_id = false;
    $widgets = get_field('article_widgets');
    foreach($widgets as $index => $widget):
      if ($widget['acf_fc_layout'] == 'longform_plugin'):
        $property = "article_widgets_".$index."_longform_post";
        $longform_id = $this->context->$property;
      endif;
    endforeach;
    return $longform_id;
  }

  protected function get_calais_domain() {
    if (!getenv('CALAIS_DOMAIN')) {
      throw new \Exception('CALAIS_DOMAIN missing from .env file');
    }
    return getenv('CALAIS_DOMAIN');
  }

}
