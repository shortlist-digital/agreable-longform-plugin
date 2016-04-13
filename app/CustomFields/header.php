<?php
use AgreableLongformPlugin\CustomFields\HeaderDefinition;

$post_type = 'longform';

$header_acf = HeaderDefinition::get($post_type);

$header_acf = apply_filters('agreable_longform_plugin_header_acf', $header_acf);
register_field_group($header_acf);