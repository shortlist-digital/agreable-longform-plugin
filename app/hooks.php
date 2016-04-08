<?php

/** @var  \Herbert\Framework\Application $container */

use AgreableLongformPlugin\Hooks\BasicDetailsAcf;
use AgreableLongformPlugin\Hooks\SocialMediaAcf;
use AgreableLongformPlugin\Hooks\RelatedContentAcf;
use AgreableLongformPlugin\Hooks\CustomPostTypeLink;

(new BasicDetailsAcf)->init();
(new SocialMediaAcf)->init();
(new RelatedContentAcf)->init();
(new CustomPostTypeLink)->init();
