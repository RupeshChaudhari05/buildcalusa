<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| BuildCalcUSA site settings
| -------------------------------------------------------------------
| Every value can be set in .env (see .env.example); the second argument
| of env() is the default used when the key is missing or empty.
*/

// Publish dates and 'today' are evaluated in this timezone
date_default_timezone_set(env('TIMEZONE', 'America/New_York'));

$config['site_name']    = env('SITE_NAME', 'BuildCalcUSA');
$config['site_tagline'] = env('SITE_TAGLINE', 'Free Contractor & DIY Construction Calculators');
$config['site_domain']  = env('SITE_DOMAIN', 'buildcalcusa.com');
$config['site_email']   = env('CONTACT_EMAIL', 'classstatus0@gmail.com');
$config['theme_color']  = '#f59e0b';

// The year our default material and labor prices were researched for.
// Bump it only after re-checking prices, not just on January 1.
$config['price_year'] = env('PRICE_YEAR', 2026);

// Editorial team for About page / author boxes (E-E-A-T).
// Replace with REAL people and credentials before launch.
$config['author_name']   = env('AUTHOR_NAME', 'BuildCalcUSA Editorial Team');
$config['author_role']   = env('AUTHOR_ROLE', 'Construction estimators & contractors');
$config['reviewer_name'] = env('REVIEWER_NAME', '');
$config['reviewer_role'] = env('REVIEWER_ROLE', '');

// Google AdSense: publisher id like ca-pub-1234567890123456 (empty = ads off)
$config['adsense_client']        = env('ADSENSE_CLIENT', '');
$config['ad_slot_after_calc']    = env('AD_SLOT_AFTER_CALC', '');
$config['ad_slot_after_content'] = env('AD_SLOT_AFTER_CONTENT', '');
// Outline empty ad positions on localhost (layout preview only; never shown on the live site)
$config['show_ad_placeholders'] = env('SHOW_AD_PLACEHOLDERS', FALSE);
// Extra ads.txt lines for other networks, separated by | (AdSense line is added automatically)
$config['ads_txt_extra'] = array_filter(array_map('trim', explode('|', env('ADS_TXT_EXTRA', ''))));

// Search engine verification codes (content="..." value only; empty = omitted)
$config['google_site_verification'] = env('GOOGLE_SITE_VERIFICATION', '');
$config['bing_site_verification']   = env('BING_SITE_VERIFICATION', '');

// Google Analytics 4 measurement id, e.g. G-XXXXXXX (empty = off)
$config['ga_id'] = env('GA_ID', '');
// 'load' = start after the page has loaded (counts nearly every visit, no Core Web Vitals cost)
// 'interaction' = start on first scroll/tap (fastest, but misses quick bounces)
$config['ga_load'] = env('GA_LOAD', 'load');
// Consent Mode v2: analytics/ads storage is denied by default for EEA, UK and
// Switzerland until the visitor accepts in the Google CMP (AdSense > Privacy & messaging).
$config['consent_mode'] = env('CONSENT_MODE', TRUE);

// Affiliate link prefixes; the retailer URL is url-encoded and appended.
// Example Impact link: https://homedepot.sjv.io/c/1234567/456789/8154?u=
$config['aff_homedepot'] = env('AFF_HOMEDEPOT', '');
$config['aff_lowes']     = env('AFF_LOWES', '');
$config['amazon_tag']    = env('AMAZON_TAG', '');

// Lead gen: "Get free local quotes" button under results, per trade (QUOTE_LINK_<TRADE> in .env).
// The partner's own form collects details and consent (TCPA); this site never handles them.
$config['quote_links'] = array();
foreach (array('fence', 'deck', 'roofing', 'siding', 'concrete', 'paving', 'landscaping', 'drywall',
	'painting', 'insulation', 'flooring', 'remodel', 'dumpster', 'junk') as $trade)
{
	$config['quote_links'][$trade] = env('QUOTE_LINK_' . strtoupper($trade), '');
}

// TRUE shows every tool regardless of publish date (preview only; never on the live site)
$config['show_unpublished'] = env('SHOW_UNPUBLISHED', FALSE);

// Full-page cache lifetime in minutes (production only; 0 disables)
$config['page_cache_minutes'] = env('PAGE_CACHE_MINUTES', 60);
