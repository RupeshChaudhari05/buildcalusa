<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| BuildCalcUSA site settings
| -------------------------------------------------------------------
| Local overrides live in application/config/development/site.php
| (loaded automatically when CI_ENV = development).
*/

// Publish dates and 'today' are evaluated in U.S. Eastern time
date_default_timezone_set('America/New_York');

$config['site_name']    = 'BuildCalcUSA';
$config['site_tagline'] = 'Free Contractor & DIY Construction Calculators';
$config['site_domain']  = 'buildcalcusa.com';
$config['site_email']   = 'hello@buildcalcusa.com';
$config['theme_color']  = '#f59e0b';

// The year our default material and labor prices were researched for.
// Bump it only after re-checking prices, not just on January 1.
$config['price_year'] = 2026;

// Editorial team for About page / author boxes (E-E-A-T).
// Replace with REAL people and credentials before launch.
$config['author_name']   = 'BuildCalcUSA Editorial Team';
$config['author_role']   = 'Construction estimators & contractors';
$config['reviewer_name'] = '';
$config['reviewer_role'] = '';

// Google AdSense: publisher id like ca-pub-1234567890123456 (empty = ads off)
$config['adsense_client']        = '';
$config['ad_slot_after_calc']    = '';
$config['ad_slot_after_content'] = '';

// Search engine verification codes (content="..." value only; empty = omitted)
$config['google_site_verification'] = '';
$config['bing_site_verification']   = '';

// Google Analytics 4 measurement id, e.g. G-XXXXXXX (empty = off)
$config['ga_id'] = '';

// Affiliate link prefixes; the retailer URL is url-encoded and appended.
// Example Impact link: https://homedepot.sjv.io/c/1234567/456789/8154?u=
$config['aff_homedepot'] = '';
$config['aff_lowes']     = '';
$config['amazon_tag']    = '';

// Lead gen: "Get free local quotes" button under results, per trade.
// Paste your partner's tracking link (Angi/HomeAdvisor, Modernize, Networx...). Empty = button hidden.
// The partner's own form collects details and consent (TCPA); this site never handles them.
$config['quote_links'] = array(
	'fence'       => '',
	'deck'        => '',
	'roofing'     => '',
	'siding'      => '',
	'concrete'    => '',
	'paving'      => '',
	'landscaping' => '',
	'drywall'     => '',
	'painting'    => '',
	'insulation'  => '',
	'flooring'    => '',
	'remodel'     => '',
);

// TRUE shows every tool regardless of publish date (preview only)
$config['show_unpublished'] = FALSE;

// Full-page cache lifetime in minutes (production only)
$config['page_cache_minutes'] = 60;
