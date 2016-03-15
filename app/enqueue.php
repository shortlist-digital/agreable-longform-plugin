<?php namespace AgreableLongformPlugin;

/** @var \Herbert\Framework\Enqueue $enqueue */

$enqueue->admin([
  'as'     => 'adminJS',
  'src'    => Helper::assetUrl('passport-admin.js') . '?calaisdomain=' . getenv('CALAIS_DOMAIN'),
  'filter' => [ 'postType' => 'longform' ]
], 'footer');
