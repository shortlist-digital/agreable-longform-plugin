<?php

/** @var  \Herbert\Framework\Application $container */

use AgreableLongformPlugin\Hooks\SocialMediaAcf;
use AgreableLongformPlugin\Hooks\RelatedContentAcf;

(new SocialMediaAcf)->init();
(new RelatedContentAcf)->init();
